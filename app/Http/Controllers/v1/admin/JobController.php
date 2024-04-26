<?php

namespace App\Http\Controllers\v1\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Validator;
use Exception;

class JobController extends Controller
{

    public function createJob(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'company_name' => 'required',
                'position'=>'required',
                'description' => 'nullable',
                'company_email'=>'nullable',
                'company_contact_no'=>'nullable',
                'experience'=>'nullable',
                'location'=>'nullable',
                'created_by'=>'nullable',
                'application_end_date'=>'nullable',
                'job_type' => [Rule::in(['internship', 'full_time'])],
                'salary_range'=>'nullable',
                'hiring_manager_name'=>'nullable',
                'hiring_manager_contact_no'=>'nullable',
                'hiring_manager_email'=>'nullable',
                'status' => [Rule::in(['Active','Closed','Pending','Draft','Expired','On Hold','Filled','Cancelled','Other'])],

                 ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $addjob = new Job;
            
            $addjob->company_name = $request->company_name;
            $addjob->position = $request->position;
            $addjob->description=$request->description;
            $addjob->company_email=$request->company_email;
            $addjob->company_contact_no=$request->company_contact_no;
            $addjob->experience=$request->experience;
            $addjob->location=$request->location;
            $addjob->created_by=$request->created_by;
            $addjob->application_end_date=$request->application_end_date;
            $addjob->job_type=$request->job_type;
            $addjob->salary_range=$request->salary_range;
            $addjob->hiring_manager_name=$request->hiring_manager_name;
            $addjob->hiring_manager_contact_no=$request->hiring_manager_contact_no;
            $addjob->hiring_manager_email=$request->hiring_manager_email;
            $addjob->status=$request->status;

            $addjob->save();

            return $this->sendResponse($addjob, 'Job Saved Successfully', true);

        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
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

            return $this->sendResponse($deleteJob, 'Job Deleted Successfully', true);


        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }
    public function getJobById(Request $request): JsonResponse
    {
        try{
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:job,id',
            ]);

            if ($validator->fails()) {
                return $this->sendError("Validation failed", $validator->errors());
            }
            $Job = Job::query()->where('id',$request->id)->first();

            return $this->sendResponse($Job, "Job fetched successfully", true);
        }catch(Exception $e){
            return $this->sendError('Something went wrong',$e->getMessage(),500);
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
                $response['Job'] = $data;
                $response['count'] = $count;
                return $this->sendResponse($response, 'Data Fetched Successfully', true);
            } else {
                return $this->sendResponse('No Data Available', [], false);
            }
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
}
