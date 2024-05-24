<?php

namespace App\Http\Controllers\v1\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function addContactUs(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email',
                'mobile_no' => 'required|min:10|max:10',
                'message' => 'nullable',
            ]);
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
                // return $this->sendError('Validation Error.', $validator->errors());
            }
            $ContactUs = new ContactUs;
            $ContactUs->name = $request->name;
            $ContactUs->email = $request->email;
            $ContactUs->mobile_no = $request->mobile_no;
            $ContactUs->message = $request->message;
            $ContactUs->created_by = "guest";
            $ContactUs->save();
            $data = [
                'to_name' => $request->name,
                'email' => $request->email,
                'message' => $request->message,
            ];

            Mail::send('emails.confirmationMail', $data, function ($message) use ($data) {
                $message->to($data['email'], $data['to_name'])
                    ->subject('Confirmation email');
                $message->from(env('MAIL_FROM_ADDRESS'), 'SKI AND SNOWBOARD INDIA');
            });
            $adminData = [
                'to_name' => 'Admin',
                'email' => 'achalbhujbal2003@gmail.com', 
                'message' => 'A new contact query has been received.',
                'query' => $ContactUs,
            ];
            Mail::send('emails.contactQuery', $adminData, function ($message) use ($adminData) {
                $message->to($adminData['email'], $adminData['to_name'])
                    ->subject('New Contact Query');
                $message->from(env('MAIL_FROM_ADDRESS'), 'SKI AND SNOWBOARD INDIA');
            });
            return back()->with('success', 'Enquiry added Successfully');
            // return $this->sendResponse($ContactUs, 'Contact added successfully.', true);
           
        } catch (Exception $e) {
            // dd($e);
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
   
   
    public function addContactUsVerified(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'nullable',
                'email' => 'required|email',
                'mobile_no' => 'required|min:10|max:10',
                'message' => 'nullable',
            ]);
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
                // return $this->sendError('Validation Error.', $validator->errors());
            }
            $user = Auth::user();
            $ContactUs = new ContactUs;
            $ContactUs->name = $request->name;
            $ContactUs->email = $request->email;
            $ContactUs->mobile_no = $request->mobile_no;
            $ContactUs->message = $request->message;
            $ContactUs->created_by = $user->role;
            $ContactUs->save();
            $data = [
                'to_name' => $request->name,
                'email' => $request->email,
                'message' => $request->message,
            ];

            Mail::send('emails.confirmationMail', $data, function ($message) use ($data) {
                $message->to($data['email'], $data['to_name'])
                    ->subject('Confirmation email');
                $message->from(env('MAIL_FROM_ADDRESS'), 'SKI AND SNOWBOARD INDIA');
            });
            return back()->with('success', 'Enquiry added Successfully');
            // return $this->sendResponse($ContactUs, 'Contact added successfully.', true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }

    // public function ContactUs(Request $request)
    // {
    //     try {
    //         $validator = Validator::make($request->all(), [
    //             'name' => 'nullable',
    //             'email' => 'required|string|email|max:255',
    //             'mobile_no' => 'required|min:10|max:10',

    //             'message' => 'nullable',
    //         ]);

    //         if ($validator->fails()) {
    //             return back()->withErrors($validator)->withInput();
    //             // return $this->sendError('Validation Error.', $validator->errors());
    //         }
    //         $ContactUs = new ContactUs;
    //         $ContactUs->name = $request->name;
    //         $ContactUs->mobile_number = $request->mobile_number;
    //         $ContactUs->message = $request->message;
    //         $ContactUs->email = $request->email;
    //         $ContactUs->save();
    //         return back()->with('success', 'Enquiry added Successfully');
    //         // return $this->sendResponse([], 'Contact added Successfully.', true);
    //     } catch (Exception $e) {
    //         return back()->with('false', 'Something went wrong. Please try again later.');
    //     }
    // }
}
