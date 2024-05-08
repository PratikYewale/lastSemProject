<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

use Carbon\Carbon;



class AdminAuthController extends Controller
{
    public function saveFile($file, $fileName)
    {
        $fileExtension = $file->getClientOriginalExtension();
        $newFileName = Str::uuid() . '-' . rand(100, 9999) . '.' . $fileExtension;
        $uploadsPath = public_path('uploads');
        $directoryPath = "$uploadsPath/$fileName";
        if (!File::exists($uploadsPath)) {
            File::makeDirectory($uploadsPath, 0755, true);
        }
        if (!File::exists($directoryPath)) {
            File::makeDirectory($directoryPath, 0755, true);
        }
        $destinationPath = "$directoryPath/$newFileName";
        $file->move($directoryPath, $newFileName);
        return "/uploads/$fileName/" . $newFileName;
    }
    public function adminRegister(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6',
                'mobile_no' => 'required|string',
            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $newUser = new User();
            $newUser->first_name = $request->name;
            $newUser->middle_name=$request->middle_name;
            $newUser->last_name = $request->name;
            $newUser->email = $request->email;
            $newUser->password = Hash::make($request->password);
            $newUser->mobile_no = $request->mobile_no;
            $newUser->role = 'admin';
            $newUser->save();
            $response = [
                'userData' => $newUser,
            ];
            return $this->sendResponse($response, 'Admin registered successfully.', true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }
    public function adminLogin(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|exists:users,email',
                'password' => 'required|string|min:6',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $user = User::where('email', $request->email)->first();
            if ($user && Hash::check($request->password, $user->password)) {
                Auth::login($user);
                $token = JWTAuth::fromUser($user);
                $response = ['token' => $token];
                $response['userData'] = $user;
                return $this->sendResponse($response, 'Admin logged in successfully.', 200);
            }
            return $this->sendError("Invalid credentials", [], 401);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
    public function getCurrentProfile(Request $request): JsonResponse
    {
        try {
            $user_id = Auth::user()->id;
            $user = User::query()->where('id', $user_id)->where('role', 'admin')->select('id', 'first_name', 'last_name', 'mobile_no', 'email', 'role')->first();
            if (!$user) {
                return $this->sendError('User does not exist or user doesn\'t have access.', [], 401);
            }
            return $this->sendResponse($user, "User profile fetched successfully.", true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
    public function forgetPasswordAdmin(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|exists:users,email',
            ]);
            if ($validator->fails()) {
                return $this->sendError("Validation failed.", $validator->errors());
            }
            $user = User::query()->where('email', $request->email)->where('role', 'admin')->first();
            if (!$user) {
                return $this->sendError('User does not exist or user doesn\'t have access.', [], 401);
            }
            $otp = rand(100000, 999999);
            $user->email_otp = $otp;
            $user->email_otp_expiry = Carbon::now()->addMinutes(5);
            $user->save();
            $to_email = $user->email;
            $data = array('otp' => $otp);
            Mail::send('emails.sendOtp', $data, function ($message) use ($to_email) {
                $message->to($to_email)
                    ->subject('Otp for Login');
                $message->from(env('MAIL_FROM_ADDRESS'), 'SKI AND SNOWBOARDS INDIA');
            });
            return $this->sendResponse([], "Otp sent successfully.", true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
    public function checkOtpAndLoginEmail(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|exists:users,email',
                'otp' => 'required|string',
            ]);
            if ($validator->fails()) {
                return $this->sendError("Validation failed.", $validator->errors());
            }
            $user = User::query()->where('email', $request->email)->first();
            if (!$user) {
                return $this->sendError('User does not exist or user doesn\'t have access.', [], 401);
            }
            if ($user->email_otp != $request->otp) {
                return $this->sendError("Validation failed.", ['otp' => 'Invalid OTP.']);
            }
            if ($user->email_otp_expiry < Carbon::now()) {
                return $this->sendError("Validation failed.", ['otp' => 'Expired OTP.']);
            }
            $user->email_otp = null;
            $user->email_otp_expiry = null;
            $user->save();
            return $this->sendResponse([], 'Otp verified successfully.', 200);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
    public function updatePassword(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|exists:users,email',
                'password' => 'required|min:6|confirmed',
            ]);

            if ($validator->fails()) {
                return $this->sendError("Validation failed.", $validator->errors());
            }
            $user = User::where('email', $request->email)->first();
            if (!$user) {
                return $this->sendError('User not found.', [], 404);
            }
            $hashedPassword = Hash::make($request->password);
            $user->password = $hashedPassword;
            $user->save();
            return $this->sendResponse([], 'Password updated successfully.', 200);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
}
