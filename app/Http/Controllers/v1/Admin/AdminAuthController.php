<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Controllers\Controller;
use App\Models\Parents;
use App\Models\Student;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Tymon\JWTAuth\Facades\JWTAuth;

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

        return "/$fileName/" . $newFileName;
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
            $newUser->name = $request->name;
            $newUser->email = $request->email;
            $newUser->password = Hash::make($request->password);
            $newUser->mobile_no = $request->mobile_no;
            $newUser->is_admin = true;
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
            $user['role'] = 'admin';
            if ($user && Hash::check($request->password, $user->password)) {
                Auth::login($user);
                $token = JWTAuth::fromUser($user, ['role' => 'admin']);
                $response = ['token' => $token];
                $response['userData'] = $user;
                $response['role'] = 'admin';
                return $this->sendResponse($response, 'Admin logged in successfully.');
            }
            return $this->sendError("Invalid credentials", [], 401);
        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }

    //approve or reject student
    public function getStudentStatus(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $waitingStudents = Student::where('is_approved', null)->orderBy('id', 'desc')->get();
            $waitingStudentsCount = $waitingStudents->count();

            $approvedStudents = Student::where('is_approved', true)->orderBy('id', 'desc')->get();
            $approvedStudentsCount = $approvedStudents->count();

            $rejectedStudents = Student::where('is_approved', false)->orderBy('id', 'desc')->get();
            $rejectedStudentsCount = $rejectedStudents->count();
            return $this->sendResponse([
                "Waiting_count" => $waitingStudentsCount,
                "Waiting_For_Approval" => $waitingStudents,
                "Approved_count" => $approvedStudentsCount,
                "Approved_Students" => $approvedStudents,
                "Rejected_count" => $rejectedStudentsCount,
                "Rejected_Students" => $rejectedStudents,

            ], "Students status fetched successfully.");
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }
    public function updateApproveStatus(Request $request, $length = 6): \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:students,id',
                'status' => 'required|boolean',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $lowercase = 'abcdefghijklmnopqrstuvwxyz';
            $digits = '0123456789';
            $specialChars = '@#*';
            $allChars = $uppercase . $lowercase . $digits . $specialChars;
            $password =
                substr(str_shuffle($uppercase), 0, 1) .
                substr(str_shuffle($lowercase), 0, 1) .
                substr(str_shuffle($digits), 0, 1) .
                substr(str_shuffle($specialChars), 0, 1);
            $password .= substr(str_shuffle($allChars), 0, $length - 4);
            $pass = str_shuffle($password);

            if ($request->status == true) {
                $status = "Approved";
                $reason = "Congratulations";
                $parents = Parents::query()->where('student_id', $request->id)->pluck('user_id');
                $users = User::query()->whereIn('id', $parents)->get();
                foreach ($users as $user) {
                    $user->password = Hash::make($pass);
                    $user->save();
                }
            } else {
                $status = "Rejected";
                $parents = Parents::query()->where('student_id', $request->id)->pluck('user_id');
                $users = User::query()->whereIn('id', $parents)->get();
                foreach ($users as $user) {
                    $user->password = null;
                    $user->save();
                }
                if (!$request->reason) {
                    return $this->sendError("Enter reason for rejection.");
                } else {
                    $reason = $request->reason;
                }
            }
            $students = Student::find($request->id);
            $students->is_approved = $request->status;
            if ($request->status == true) {
                $students->reason_to_reject = null;
            } else {
                $students->reason_to_reject = $request->reason;
            }
            $students->save();


            $parents = Parents::query()->where('student_id', $request->id)->pluck('user_id');
            $users = User::query()->whereIn('id', $parents)->get();
            foreach ($users as $user) {
                $email = $user->email;
                $data = [
                    'to_name' => $user['name'],
                    'pass' => $pass,
                    'email' => $email,
                    'status' => $status,
                    'reason' => $reason
                ];

                Mail::send('emails.statusupdate', $data, function ($message) use ($data) {
                    $message->to($data['email'], $data['to_name'])
                        ->subject('Status Update');
                    $message->from(env('MAIL_FROM_ADDRESS'), 'Dhi-Vidyadham School System Mail');
                });
            }
            return $this->sendResponse([], "Mail Sent Successfully");
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }
}
