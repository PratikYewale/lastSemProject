<?php

namespace App\Http\Controllers\v1\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use App\Models\JobApplicationDocuments;
use Illuminate\Validation\Rule;
use App\Models\Job;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Facades\Auth;

class JobApplicationController extends Controller
{
    public function saveFile($file, $process)
    {
        $extension = $file->getClientOriginalExtension();
        $cur = Str::uuid();
        $fileName = $process . '-' . $cur . '.' . $extension;
        $basePath = public_path('\\Image\\');
        if (env('APP_ENV') == 'prod') {
            $basePath =  public_path('/Image/');
        }
        if (!is_dir($basePath)) {
            mkdir($basePath, 0755, true);
        }
        if (env('APP_ENV') == 'prod') {
            $destinationPath =  public_path('/Image');
        } else {
            $destinationPath = public_path('\\Image');
        }

        $file->move($destinationPath, $fileName);

        return '/Image/' . $fileName;
    }

    public function getJobById(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:job,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError("Validation failed.", $validator->errors());
            }
            $Job = Job::query()->where('id', $request->id)->first();
            if (!$Job) {
                return $this->sendError('No data available.');
            }
            return $this->sendResponse($Job, "Job fetched successfully.", true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
    public function getAllJob(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'pageNo' => 'numeric',
                'limit' => 'numeric',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors(), 400);
            }
            $query = Job::query();
            $count = $query->count();
            if ($request->has('pageNo') && $request->has('limit')) {
                $limit = $request->limit;
                $pageNo = $request->pageNo;
                $skip = $limit * $pageNo;
                $query = $query->skip($skip)->limit($limit);
            }
            $data = $query->orderBy('id', 'DESC')->get();
            if (count($data) > 0) {
                $response['count'] = $count;
                $response['Job'] = $data;
                return $this->sendResponse($response, 'Data fetched successfully.', true);
            } else {
                return $this->sendError("No data available.");
            }
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
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
            $documents = $request->file('document');
            if (!is_array($documents)) {
                return $this->sendError('Documents cannot be null.');
            }
            foreach ($request->file('document') as $key => $file) {
                $jobApplicationDoc = new JobApplicationDocuments();
                $jobApplicationDoc->job_application_id = $jobApplication->id;
                $jobApplicationDoc->document_type = $request->document_type[$key];
                $jobApplicationDoc->document = $this->saveFile($file, 'NewsDocument'); 
                $jobApplicationDoc->save();
            }
            return $this->sendResponse([$jobApplication], 'Job application and document added successfully.');
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }
}
