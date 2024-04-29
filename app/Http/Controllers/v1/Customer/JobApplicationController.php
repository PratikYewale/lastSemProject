<?php

namespace App\Http\Controllers\v1\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use App\Models\JobApplicationDocuments;
use Illuminate\Validation\Rule;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Facades\Auth;

class JobApplicationController extends Controller
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
    public function addJobApplication(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'job_id' => 'required|exists:job,id',
                'name' => 'nullable|string',
                'email' => [
                    'required',
                    'email',
                    Rule::unique('job_application')->where(function ($query) use ($request) {
                        return $query->where('job_id', $request->job_id);
                    }),
                ],
                'mobile' => 'nullable',
                'experience' => 'nullable',
                'document_type.*' => [Rule::in(['Resume', 'CV', 'Cover Letter', 'Other'])],
                'document.*' => 'nullable|mimes:pdf',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $jobApplication = new JobApplication();
            $jobApplication->job_id = $request->job_id;
            $jobApplication->name = $request->name;
            $jobApplication->email = $request->email;
            $jobApplication->mobile = $request->mobile;
            $jobApplication->experience = $request->experience;
            $jobApplication->status = 'Applied';
            $jobApplication->save();

            foreach ($request->file('document') as $key => $file) {
                $jobApplicationDoc = new JobApplicationDocuments();
                $jobApplicationDoc->job_application_id = $jobApplication->id;
                $jobApplicationDoc->document_type = $request->document_type[$key];
                $jobApplicationDoc->document = $this->saveFile($file, 'NewsDocument'); // Pass a single file object

                $jobApplicationDoc->save();
            }
            return $this->sendResponse([$jobApplication], 'Job application and document added successfully.');
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }
}
