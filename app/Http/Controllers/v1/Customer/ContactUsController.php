<?php

namespace App\Http\Controllers\v1\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Exception;

class ContactUsController extends Controller
{
    public function addContactUs(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'nullable',
                'email' => 'required|email',
                'mobile_no' => 'required|nullable',
                'message' => 'nullable',
            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $ContactUs = new ContactUs;
            $ContactUs->name = $request->name;
            $ContactUs->email = $request->email;
            $ContactUs->mobile_no = $request->mobile_no;
            $ContactUs->message = $request->message;

            $ContactUs->save();
            return $this->sendResponse($ContactUs, 'Contact added successfully.', true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
}
