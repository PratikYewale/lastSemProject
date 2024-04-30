<?php

namespace App\Http\Controllers\v1\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\File;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Exception;

class ProgramController extends Controller
{
    public function saveFile($file, $fileName)
    {
        $fileExtension = $file->getClientOriginalExtension();
        $newFileName = Str::uuid() . '-' . rand(100, 9999) . '.' . $fileExtension;
        $uploadsPath = public_path('uploads');
        $directoryPath = "$uploadsPath/$fileName";

        if (!File::exists($uploadsPath)) {
            File::makeDirectory($uploadsPath, 0755, true);
        }

        if (!File::exists($directoryPath)) {
            File::makeDirectory($directoryPath, 0755, true);
        }

        $destinationPath = "$directoryPath/$newFileName";
        $file->move($directoryPath, $newFileName);

        return "/$fileName/" . $newFileName;
    }

    public function createPrograms(Request $request): JsonResponse
    {

        try {
            $validator = Validator::make($request->all(), [
                'type' => [Rule::in(['sport', 'development', 'training'])],
                'title' => 'nullable',
                'primary_img' => 'required|image|mimes:png,jpg,jpeg|max:2048',
                'secondary_img' => 'required|image|mimes:png,jpg,jpeg|max:2048',
                'intro_para' => 'nullable',
                'body_para' => 'nullable',
                'conclusion' => 'nullable',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $addprograms = new Program();
            $addprograms->type = $request->type;
            $addprograms->title = $request->title;

            if ($request->hasFile('primary_img')) {
                $addprograms->primary_img = $this->saveFile($request->file('primary_img'), 'ProgramPrimaryImage');
            }
            if ($request->hasFile('secondary_img')) {
                $addprograms->secondary_img = $this->saveFile($request->file('secondary_img'), 'ProgramSecondaryImage');
            }
            $addprograms->intro_para = $request->intro_para;
            $addprograms->body_para = $request->body_para;
            $addprograms->conclusion = $request->conclusion;

            $addprograms->save();

            return $this->sendResponse($addprograms->id, 'Programs uploaded successfully.', true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
    public function updateProgram(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:programs,id',
                'primary_img' => 'image|mimes:png,jpg,jpeg|max:2048',
                'secondary_img' => 'image|mimes:png,jpg,jpeg|max:2048',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $updateProgram = Program::query()->where('id', $request->id)->first();
            if ($request->has('type')) {
                $updateProgram->type = $request->type;
            }
            if ($request->has('title')) {
                $updateProgram->title = $request->title;
            }
            if ($request->has('intro_para')) {
                $updateProgram->intro_para = $request->intro_para;
            }
            if ($request->has('body_para')) {
                $updateProgram->body_para = $request->body_para;
            }
            if ($request->has('conclusion')) {
                $updateProgram->conclusion = $request->conclusion;
            }
            if ($request->hasFile('primary_img')) {
                $updateProgram->primary_img = $this->saveFile($request->file('primary_img'), 'ProgramPrimaryImage');
            }
            if ($request->hasFile('secondary_img')) {
                $updateProgram->secondary_img = $this->saveFile($request->file('secondary_img'), 'ProgramSecondaryImage');
            }
            $updateProgram->save();

            return $this->sendResponse($updateProgram, "Program updated successfully.");
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }


    public function getAllProgram(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'pageNo' => 'numeric',
                'limit' => 'numeric',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors(), 400);
            }
            $query = Program::query();
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
                $response['Program'] = $data;
                return $this->sendResponse($response, 'Data Fetched Successfully', true);
            } else {
                return $this->sendResponse('No Data Available', [], false);
            }
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }

    public function deletePrograms(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:programs,id'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $deleteProgram = Program::query()->where('id', $request->id)->first();
            $deleteProgram->delete();

            return $this->sendResponse($deleteProgram, 'Program Deleted Successfully', true);
        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }

    public function getProgramById(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer',
            ]);

            if ($validator->fails()) {
                return $this->sendError("Validation failed", $validator->errors());
            }
            $Program = Program::query()->where('id', $request->id)->first();
            if (!$Program) {
                return $this->sendError('No data available.');
            }
            return $this->sendResponse($Program, "Program fetched successfully", true);
        } catch (Exception $e) {
            return $this->sendError('Something went wrong', $e->getMessage(), 500);
        }
    }
}
