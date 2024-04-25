<?php

namespace App\Http\Controllers\v1\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use App\Models\ContactUs;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Exception;

class ContactUsController extends Controller
{
    // public function addContactUs(Request $request)
    // {
    //     try {
    //         $validator = Validator::make($request->all(), [
    //             'name' => 'nullable',
    //             'email' => 'required|email',
    //             'mobile_no' => 'required|nullable',
    //             'message' => 'nullable',
    //         ]);

    //         if ($validator->fails()) {
    //             return $this->sendError('Validation Error.', $validator->errors());
    //         }
    //         $ContactUs = new ContactUs;
    //         $ContactUs->name = $request->name;
    //         $ContactUs->email = $request->email;
    //         $ContactUs->mobile_no = $request->mobile_no;
    //         $ContactUs->message = $request->message;
            
    //         $ContactUs->save();
    //         return $this->sendResponse($ContactUs, 'Contact added Successfully.', true);
    //     } catch (Exception $e) {
    //         return $this->sendError('Something went wrong', $e->getTrace(), 413);
    //     }
    // }

    public function getAllContactUs(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'pageNo' => 'numeric',
                'limit' => 'numeric',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors(), 400);
            }
            $query = ContactUs::query();
            $count = $query->count();
            if ($request->has('pageNo') && $request->has('limit')) {
                $limit = $request->limit;
                $pageNo = $request->pageNo;
                $skip = $limit * $pageNo;
                $query = $query->skip($skip)->limit($limit);
            }
            $data = $query->orderBy('id', 'DESC')->get();
            if (count($data) > 0) {
                $response['Contact_us'] = $data;
                $response['count'] = $count;
                return $this->sendResponse($response, 'Data Fetched Successfully', true);
            } else {
                return $this->sendResponse('No Data Available', [], false);
            }
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), 500);
        }
    }

    public function getContactUsById(Request $request): JsonResponse
    {
        try{
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer',
            ]);

            if ($validator->fails()) {
                return $this->sendError("Validation failed", $validator->errors());
            }
            $ContactUs = ContactUs::query()->where('id',$request->id)->first();

            return $this->sendResponse($ContactUs, "Contact us fetched successfully", true);
        }catch(Exception $e){
            return $this->sendError('Something went wrong',$e->getMessage(),500);
        }
    }
}
