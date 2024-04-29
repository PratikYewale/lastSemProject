<?php

namespace App\Http\Controllers\v1\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Sponsorship;
use Illuminate\Support\Facades\File;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Exception;


class SponsorshipController extends Controller
{
    public function createSponsorship(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'description' => 'nullable',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $addSponsorship = new Sponsorship;
            $addSponsorship->name = $request->name;
            $addSponsorship->description = $request->description;

            $addSponsorship->save();

            return $this->sendResponse($addSponsorship, 'Sponsorship saved successfully.', true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }

    public function updateSponsorship(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:sponsorships,id'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $updateSponsorship = Sponsorship::query()->where('id', $request->id)->first();

            if ($request->filled('name')) {
                $updateSponsorship->name = $request->name;
            }
            if ($request->filled('description')) {
                $updateSponsorship->description = $request->description;
            }

            $updateSponsorship->save();
            return $this->sendResponse($updateSponsorship, 'Sponsorship updated successfully.', true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }

    public function getAllSponsorship(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'pageNo' => 'numeric',
                'limit' => 'numeric',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors(), 400);
            }
            $query = Sponsorship::query();
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
                $response['Sponsorship'] = $data;
                return $this->sendResponse($response, 'Data fetched successfully', true);
            } else {
                return $this->sendError("No data found.");
            }
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }

    public function deleteSponsorship(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:sponsorships,id'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $deleteSponsorship = Sponsorship::query()->where('id', $request->id)->first();
            $deleteSponsorship->delete();

            return $this->sendResponse($deleteSponsorship, 'Sponsorship deleted successfully.', true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }

    public function getSponsorshipById(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:sponsorships,id'
            ]);

            if ($validator->fails()) {
                return $this->sendError("Validation failed.", $validator->errors());
            }
            $sponsorship = Sponsorship::query()->where('id', $request->id)->first();
            if (!$sponsorship) {
                return $this->sendError('No data available.');
            }
            return $this->sendResponse($sponsorship, "Sponsorship fetched successfully.", true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
}
