<?php

namespace App\Http\Controllers\v1\Customer;
use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MemberAuthController extends Controller
{
    public function forgetPasswordMember(Request $request): JsonResponse
    {
        try{
            $validator = Validator::make($request->all(),[
                'email'=>'required|email|exists:users,email',
            ]);
            if($validator->fails()){
                return $this->sendError("Validation failed.",$validator->errors());
            }
            $user = User::query()->where('email',$request->email)->first();
            if(!$user){
                return $this->sendError('User does not exist or user doesn\'t have access', [], 401);
            }
            $otp = rand(100000, 999999);
            $user->email_otp = $otp;
            $user->email_otp_expiry = Carbon::now()->addMinutes(5);;
            $user->save();
            $to_name = $user->first_name;
            $to_email = $user->email;
            $data = array('otp' => $otp);
            Mail::send('emails.sendOtp', $data, function ($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)
                    ->subject('Otp for Login');
                $message->from(env('MAIL_FROM_ADDRESS'), 'SKI AND SNOWBOARD INDIA');
            });
            return $this->sendResponse([],"Otp sent successfully.",true);
        }catch(Exception $e){
            return $this->sendError($e->getMessage(),$e->getTrace(),500);
        }
    }
    public function checkOtpAndVerify(Request $request): JsonResponse
    {
        try{
            $validator = Validator::make($request->all(),[
                'email'=>'required|email|exists:users,email',
                'otp'=>'required|string',
            ]);
            if($validator->fails()){
                return $this->sendError("Validation failed.",$validator->errors());
            }
            $user = User::query()->where('email',$request->email)->first();
            if(!$user){
                return $this->sendError('User does not exist or user doesn\'t have access. ', [], 401);
            }
            if($user->email_otp != $request->otp){
                return $this->sendError("Validation failed.", ['otp' => 'Invalid OTP']);
            }
            if($user->email_otp_expiry < Carbon::now()){
                return $this->sendError("Validation failed.", ['otp' => 'Expired OTP']);
            }
            $user->email_otp = null;
            $user->email_otp_expiry = null;
            $user->save();
            return $this->sendResponse([], 'OTP verified successfully.', 200);
        }catch(Exception $e){
            return $this->sendError($e->getMessage(),$e->getTrace(),500);
        }
    }
    public function updatePassword(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|exists:users,email',
                'password' => 'required|confirmed|min:6',
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
