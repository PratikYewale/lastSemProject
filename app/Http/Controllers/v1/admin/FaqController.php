<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FAQ;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Exception;

class FaqController extends Controller
{
    public function createFaq(Request $request): JsonResponse
    {
        try{
            $validator = Validator::make($request->all(),[
                'question' => 'nullable',
                'answer'=>'nullable',
                'for_whom'=>'nullable'
                    
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $faq = new FAQ;
            $faq->question = $request->question;
            $faq->answer=$request->answer;
            $faq->for_whom=$request->for_whom;
            $faq->save();
            
            return $this->sendResponse([],'FAQ saved successfully',true);

        }catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }


}
