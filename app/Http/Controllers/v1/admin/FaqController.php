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

            return $this->sendResponse($faq, 'FAQ saved successfully.', true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
    public function updateFaq(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:faqs,id',
                'is_active' => 'boolean'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $updateFaq = FAQ::query()->where('id', $request->id)->first();

            if ($request->filled('question')) {
                $updateFaq->question = $request->question;
            }
            if ($request->filled('answer')) {
                $updateFaq->answer = $request->answer;
            }
            if ($request->filled('for_whom')) {
                $updateFaq->for_whom = $request->for_whom;
            }
            if ($request->filled('is_active')) {
                $updateFaq->is_active = $request->is_active;
            }
            $updateFaq->save();
            return $this->sendResponse($updateFaq, 'FAQ updated successfully.', true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
    public function getAllFaq(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'pageNo' => 'numeric',
                'limit' => 'numeric',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors(), 400);
            }
            $query = FAQ::query();
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
                $response['FAQ'] = $data;
                return $this->sendResponse($response, 'Data fetched successfully.');
            } else {
                return $this->sendError('No data available.');
            }
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
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

            return $this->sendResponse($deleteFaq, 'FAQ deleted successfully.', true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
    public function getFaqById(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:faqs,id'
            ]);

            if ($validator->fails()) {
                return $this->sendError("Validation failed", $validator->errors());
            }
            $faq = FAQ::query()->where('id', $request->id)->first();
            if (!$faq) {
                return $this->sendError('No data available.');
            }
            return $this->sendResponse($faq, "Faq fetched successfully.", true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
}
