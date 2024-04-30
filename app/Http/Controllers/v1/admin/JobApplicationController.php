<?php

namespace App\Http\Controllers\v1\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use App\Models\JobApplicationDocuments;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Exception;

class JobApplicationController extends Controller
{
    public function getJobApplicationByJobId(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'job_id' => 'required|integer',
                'pageNo' => 'numeric',
                'limit' => 'numeric',
            ]);
            if ($validator->fails()) {
                return $this->sendError("Validation failed.", $validator->errors());
            }
            $query = JobApplication::where('job_id', $request->job_id)->with('documents');
            $count = $query->count();
            if ($request->has('pageNo') && $request->has('limit')) {
                $limit = $request->limit;
                $pageNo = $request->pageNo;
                $skip = $limit * ($pageNo - 1);
                $query = $query->skip($skip)->take($limit);
            }
            $jobApplications = $query->get();
            if (!$jobApplications->isEmpty()) {
                $response['count'] = $count;
                $response['job_applications'] = $jobApplications;
                return $this->sendResponse($response, "Job applications fetched successfully.", true);
            } else {
                return $this->sendError('No data available.');
            }
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
    public function getJobApplicationById(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:job_application,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError("Validation failed.", $validator->errors());
            }
            $JobApplication = JobApplication::query()->where('id', $request->id)->with('documents')->first();
            if (!$JobApplication) {
                return $this->sendError('No data available.');
            }
            return $this->sendResponse($JobApplication, "Job Application fetched successfully.", true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
}
