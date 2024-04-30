<?php

namespace App\Http\Controllers\v1\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Exception;

class JobController extends Controller
{
    public function createJob(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'company_name' => 'required',
                'position' => 'required',
                'description' => 'nullable',
                'company_email' => 'nullable',
                'company_contact_no' => 'nullable',
                'experience' => 'nullable',
                'location' => 'nullable',
                'created_by' => 'nullable',
                'application_end_date' => 'nullable',
                'job_type' => [Rule::in(['internship', 'full_time'])],
                'salary_range' => 'nullable',
                'hiring_manager_name' => 'nullable',
                'hiring_manager_contact_no' => 'nullable',
                'hiring_manager_email' => 'nullable',
                'status' => [Rule::in(['Active', 'Closed', 'Pending', 'Draft', 'Expired', 'On Hold', 'Filled', 'Cancelled', 'Other'])],
                'vacancy' => 'nullable'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $addjob = new Job;
            $addjob->company_name = $request->company_name;
            $addjob->position = $request->position;
            $addjob->description = $request->description;
            $addjob->company_email = $request->company_email;
            $addjob->company_contact_no = $request->company_contact_no;
            $addjob->experience = $request->experience;
            $addjob->location = $request->location;
            $addjob->created_by = Auth::user()->id;
            $addjob->application_end_date = $request->application_end_date;
            $addjob->job_type = $request->job_type;
            $addjob->salary_range = $request->salary_range;
            $addjob->hiring_manager_name = $request->hiring_manager_name;
            $addjob->hiring_manager_contact_no = $request->hiring_manager_contact_no;
            $addjob->hiring_manager_email = $request->hiring_manager_email;
            $addjob->vacancy = $request->vacancy;
            $addjob->status = "active";
            $addjob->save();
            return $this->sendResponse($addjob, 'Job saved successfully.', true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
    public function deleteJob(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:job,id'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $deleteJob = Job::query()->where('id', $request->id)->first();
            $deleteJob->delete();
            return $this->sendResponse($deleteJob, 'Job deleted successfully.', true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
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
            $Job = Job::query()->where('id', $request->id)->with('jobApplications')->first();
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
    public function updateJob(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:job,id'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $updateJob = Job::query()->where('id', $request->id)->first();
            if ($request->filled('company_name')) {
                $updateJob->company_name = $request->company_name;
            }
            if ($request->filled('position')) {
                $updateJob->position = $request->position;
            }
            if ($request->filled('description')) {
                $updateJob->description = $request->description;
            }
            if ($request->filled('company_email')) {
                $updateJob->company_email = $request->company_email;
            }
            if ($request->filled('company_contact_no')) {
                $updateJob->company_contact_no = $request->company_contact_no;
            }
            if ($request->filled('experience')) {
                $updateJob->experience = $request->experience;
            }
            if ($request->filled('location')) {
                $updateJob->location = $request->location;
            }
            if ($request->filled('created_by')) {
                $updateJob->created_by = $request->created_by;
            }
            if ($request->filled('application_end_date')) {
                $updateJob->application_end_date = $request->application_end_date;
            }
            if ($request->filled('job_type')) {
                $updateJob->job_type = $request->job_type;
            }
            if ($request->filled('salary_range')) {
                $updateJob->salary_range = $request->salary_range;
            }
            if ($request->filled('hiring_manager_name')) {
                $updateJob->hiring_manager_name = $request->hiring_manager_name;
            }
            if ($request->filled('hiring_manager_contact_no')) {
                $updateJob->hiring_manager_contact_no = $request->hiring_manager_contact_no;
            }
            if ($request->filled('hiring_manager_email')) {
                $updateJob->hiring_manager_email = $request->hiring_manager_email;
            }
            if ($request->filled('status')) {
                $updateJob->status = $request->status;
            }
            if ($request->filled('vacancy')) {
                $updateJob->vacancy = $request->vacancy;
            }
            $updateJob->save();
            return $this->sendResponse($updateJob, 'Job updated successfully.', true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
}
