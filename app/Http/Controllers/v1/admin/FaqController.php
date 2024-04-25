<?php

namespace App\Http\Controllers\v1\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FAQ;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Exception;


class FaqController extends Controller
{
    public function createFaq(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'question' => 'nullable',
                'answer' => 'nullable',
                'for_whom' => 'nullable'

            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $faq = new FAQ;
            $faq->question = $request->question;
            $faq->answer = $request->answer;
            $faq->for_whom = $request->for_whom;
            $faq->is_active = $request->is_active;
            $faq->save();

            return $this->sendResponse($faq, 'FAQ Saved Successfully', true);

        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }


    public function updateFaq(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $updateFaq = FAQ::query()->where('id', $request->id)->first();

            if ($request->filled('question')) {
                $updateFaq->question= $request->question;
            }
            if ($request->filled('answer')) {
                $updateFaq->answer= $request->answer;
            }
            if ($request->filled('for_whom')) {
                $updateFaq->for_whom = $request->for_whom;
            }
            if ($request->filled('is_active')) {
                $updateFaq->is_active = $request->is_active;
            }
            $updateFaq->save();
            return $this->sendResponse($updateFaq, 'FAQ Updated Successfully', true);

        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }

    public function getFaq(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                //'id' => 'required|integer|exists:faqs,id'

            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $getFaq = FAQ::query()->get();
            $countfaq=FAQ::query()->count();

            return $this->sendResponse($getFaq,$countfaq, 'FAQ Fetched Successfully', true);

        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }
    public function deleteFaq(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:faqs,id'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $deleteFaq = FAQ::query()->where('id', $request->id)->first();
            $deleteFaq->delete();

            return $this->sendResponse($deleteFaq, 'FAQ Deleted Successfully', true);


        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }

    public function getFaqById(Request $request): JsonResponse
    {
        try{
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer',
            ]);

            if ($validator->fails()) {
                return $this->sendError("Validation failed", $validator->errors());
            }
            $faq = FAQ::query()->where('id',$request->id)->first();

            return $this->sendResponse($faq, "Faq fetched successfully", true);
        }catch(Exception $e){
            return $this->sendError('Something went wrong',$e->getMessage(),500);
        }
    }


}
