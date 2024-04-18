<?php

namespace App\Http\Controllers\v1\Student;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\Parents;
use App\Models\Student;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Tymon\JWTAuth\Facades\JWTAuth;

class StudentAuthController extends Controller
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
    public function studentRegister(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'full_name' => 'required|string|max:255',
                'gender' => 'required|string|in:male,female,other',
                'class_id' => 'required|integer|exists:classes,id',
                'city' => 'required|string|max:255',
                'area' => 'required|string|max:255',
                'date_of_birth' => 'required|date',
                'profile_photo' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
                'aadhaar_no' => 'nullable|numeric|digits:12|unique:students,aadhaar_no',
            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $photo = null;
            if ($request->hasFile('profile_photo')) {
                $photo = $this->saveFile($request->profile_photo, 'StudentProfilePhotos');
            }
            $newStudent = new Student();
            $newStudent->full_name = $request->full_name;
            $newStudent->class_id = $request->class_id;
            $newStudent->city = $request->city;
            $newStudent->area = $request->area;
            $newStudent->gender = $request->gender;
            $newStudent->date_of_birth = $request->date_of_birth;
            $newStudent->aadhaar_no = $request->aadhaar_no;
            $newStudent->profile_photo = $photo;
            $studentCode = $this->generateStudentCode($request->city, $request->area, $request->class_id);
            $newStudent->student_code = $studentCode;
            $newStudent->save();
            return $this->sendResponse($newStudent['id'], 'Student registered successfully.', true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }
    private function generateStudentCode($city, $area, $classId)
    {
        $maxStudentCode = Student::where('city', $city)
            ->where('area', $area)
            ->where('class_id', $classId)
            ->max('student_code');
        $newSequence = ($maxStudentCode) ? intval(substr($maxStudentCode, -3)) + 1 : 1;
        $Name = Classes::find($classId)->name;
        return strtoupper(substr($city, 0, 3) . substr($area, 0, 3) . $Name . str_pad($newSequence, 3, '0', STR_PAD_LEFT));
    }
    public function addParent(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'full_name' => 'required|string|max:255',
                'mobile_no' => 'required|string',
                'email' => 'required|email|unique:users,email',
                'occupation' => 'required|string|max:255',
                'student_id' => 'required|integer|exists:students,id',
                'aadhaar_no' => 'nullable|numeric|digits:12',
                'relation' => 'required|string|in:mother,father',
                'profile_photo' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            DB::beginTransaction();
            $newParent = Parents::query()->where('student_id', $request->student_id)->where('relation', $request->relation)->first();
            if (!$newParent) {
                $newParent = new Parents();
            }
            $newUser = User::query()->where('id', $newParent->user_id)->first();
            if (!$newUser) {
                $newUser = new User();
            }
            $newUser->name = $request->full_name;
            $newUser->mobile_no = $request->mobile_no;
            $newUser->email = $request->email;
            $newUser->password = null;
            $newUser->save();
            $newParent->user_id = $newUser->id;
            $newParent->occupation = $request->occupation;
            $newParent->student_id = $request->student_id;
            $newParent->aadhaar_no = $request->aadhaar_no;
            $newParent->pan_no = $request->pan_no;
            $newParent->relation = $request->relation;
            $photo = null;
            if ($request->hasFile('profile_photo')) {
                $photo = $this->saveFile($request->profile_photo, 'ParentProfilePhotos');
            }
            $newParent->profile_photo = $photo;
            $newParent->save();
            $data = [
                'to_name' => $newUser['name'],
                'email' => $newUser['email'],
            ];
            Mail::send('emails.registeredSuccessfully', $data, function ($message) use ($data) {
                $message->to($data['email'], $data['to_name'])
                    ->subject('Registered Successfully');
                $message->from(env('MAIL_FROM_ADDRESS'), 'Dhi-Vidyadham School System Mail');
            });
            DB::commit();
            return $this->sendResponse($newParent['id'], ' parent Register successfully.', true);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }
    public function studentLogin(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|exists:users,email',
                'password' => 'required|string|min:6',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $parent = User::where('email', $request->email)->first();
            if ($parent && Hash::check($request->password, $parent->password)) {
                if ($parent !== null) {
                    $token = JWTAuth::fromUser($parent);
                    $response['token'] = $token;
                    $response['userData'] = $parent;
                    $response['role'] = 'parent';
                    return $this->sendResponse($response, 'Parent logged in successfully.', 200);
                }
                return $this->sendError("No associated students for this parent.", [], 404);
            }
            return $this->sendError("Invalid credentials.", [], 401);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }
}
