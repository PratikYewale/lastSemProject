<?php

namespace App\Http\Controllers\v1\Admin\FaqController;

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

            if ($request->filled('questions')) {
                $updateFaq->questions = $request->questions;
            }
            if ($request->filled('answers')) {
                $updateFaq->answers = $request->answers;
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
                'id' => 'required|integer|exists:faqs,id'

            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $getFaq = FAQ::query()->where('id', $request->id)->where('is_active', true)->first();

            return $this->sendResponse($getFaq, 'FAQ Fetched Successfully', true);

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


}
