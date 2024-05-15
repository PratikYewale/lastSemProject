<?php

namespace App\Http\Controllers\v1\Customer;
use App\Http\Controllers\Controller;
use App\Models\Achievement;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class AchivementController extends Controller
{
    public function createAchivement(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
               //'name'=>'required',
               'year'=>'nullable',
               'result'=>'nullable'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            DB::beginTransaction();
            foreach ($request->achievements as $achievement) {
                $addAchievement = new Achievement;
                $addAchievement->user_id = Auth::id();
                $addAchievement->name = $achievement['name'];
                $addAchievement->year = $achievement['year'];
                $addAchievement->result = $achievement['result'];
                $addAchievement->save();
            }

            $addAchievement->save();
            DB::commit();
            return $this->sendResponse($addAchievement, 'Achievement saved successfully.', true);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }
    public function deleteAchivement(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:achievements,id'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $deleteAchivement = Achievement::query()->where('id', $request->id)->first();
            $deleteAchivement->delete();

            return $this->sendResponse($deleteAchivement, 'Achievement deleted successfully.', true);
        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }
}
