<?php

namespace App\Http\Controllers\v1\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Models\Association;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Exception;

class AssociationController extends Controller
{
    public function saveFile($file, $process)
    {
        $extension = $file->getClientOriginalExtension();
        $cur = Str::uuid();
        $fileName = $process . '-' . $cur . '.' . $extension;
        $basePath = public_path('\\Image\\');
        if (env('APP_ENV') == 'prod') {
            $basePath = public_path('/Image/');
        }
        if (!is_dir($basePath)) {
            mkdir($basePath, 0755, true);
        }
        if (env('APP_ENV') == 'prod') {
            $destinationPath = public_path('/Image');
        } else {
            $destinationPath = public_path('\\Image');
        }

        $file->move($destinationPath, $fileName);

        return '/Image/' . $fileName;
    }
    // public function createAssociaction(Request $request): JsonResponse
    // {
    //     try {
    //         $validator = Validator::make($request->all(), [
    //             'association_name' => 'required',
    //             'logo' => 'nullable|mimes:jpg,png,jpeg',
    //             'association_contact' => 'required',
    //             'association_mail' => 'required',
    //             'address' => 'nullable'

    //         ]);
    //         if ($validator->fails()) {
    //             return $this->sendError('Validation Error.', $validator->errors());
    //         }
    //         DB::beginTransaction();

    //         $addAssociation = new Association;
    //         if ($request->logo) {
    //             $addAssociation->logo = $this->saveFile($request->logo, 'AssociationLogo');
    //         }
    //         $addAssociation->association_name = $request->association_name;
    //         $addAssociation->association_mail = $request->association_mail;
    //         $addAssociation->association_contact = $request->association_contact;
    //         $addAssociation->address = $request->address;
    //         $addAssociation->save();
    //         DB::commit();

    //         return $this->sendResponse($addAssociation, 'Association saved successfully.', true);
    //     } catch (Exception $e) {
    //         DB::rollBack();

    //         return $this->sendError($e->getMessage(), $e->getTrace(), 413);
    //     }
    // }

    // public function updateAssociation(Request $request): JsonResponse
    // {
    //     try {
    //         $validator = Validator::make($request->all(), [
    //             'id' => 'required|integer|exists:association,id'
    //         ]);
    //         if ($validator->fails()) {
    //             return $this->sendError('Validation Error.', $validator->errors());
    //         }
    //         DB::beginTransaction();

    //         $updateAssociation = Association::query()->where('id', $request->id)->first();
    //         if ($request->filled('association_name')) {
    //             $updateAssociation->association_name = $request->association_name;
    //         }
    //         if ($request->filled('association_mail')) {
    //             $updateAssociation->association_mail = $request->association_mail;
    //         }
    //         if ($request->filled('association_contact')) {
    //             $updateAssociation->association_contact = $request->association_contact;
    //         }
    //         if ($request->filled('address')) {
    //             $updateAssociation->address = $request->address;
    //         }
    //         if ($request->hasFile('logo')) {
    //             $updateAssociation->logo = $this->saveFile($request->file('logo'), 'AssociationLogo');
    //         }
    //         $updateAssociation->save();
    //         DB::commit();

    //         return $this->sendResponse($updateAssociation, 'Association updated successfully.', true);
    //     } catch (Exception $e) {
    //         DB::rollBack();

    //         return $this->sendError($e->getMessage(), $e->getTrace(), 500);
    //     }
    // }
    // public function getAllAssociation(Request $request)
    // {
    //     try {
    //         $validator = Validator::make($request->all(), [
    //             'pageNo' => 'numeric',
    //             'limit' => 'numeric',
    //         ]);
    //         if ($validator->fails()) {
    //             return $this->sendError('Validation Error.', $validator->errors(), 400);
    //         }
    //         $query = Association::query();
    //         $count = $query->count();
    //         if ($request->has('pageNo') && $request->has('limit')) {
    //             $limit = $request->limit;
    //             $pageNo = $request->pageNo;
    //             $skip = $limit * $pageNo;
    //             $query = $query->skip($skip)->limit($limit);
    //         }
    //         $data = $query->orderBy('id', 'DESC')->get();
    //         if (count($data) > 0) {
    //             $response['count'] = $count;
    //             $response['Association'] = $data;
    //             return $this->sendResponse($response, 'Data fetched successfully.', true);
    //         } else {
    //             return $this->sendError('No Data Available.');
    //         }
    //     } catch (Exception $e) {
    //         return $this->sendError($e->getMessage(), $e->getTrace(), 500);
    //     }
    // }
    // public function deleteAssociation(Request $request): JsonResponse
    // {
    //     try {
    //         $validator = Validator::make($request->all(), [
    //             'id' => 'required|integer|exists:association,id'
    //         ]);
    //         if ($validator->fails()) {
    //             return $this->sendError('Validation Error.', $validator->errors());
    //         }

    //         $deleteAssociation = Association::query()->where('id', $request->id)->first();
    //         $deleteAssociation->delete();

    //         return $this->sendResponse($deleteAssociation, 'Association deleted successfully.', true);
    //     } catch (Exception $e) {
    //         return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
    //     }
    // }
    // public function getAssociationById(Request $request): JsonResponse
    // {
    //     try {
    //         $validator = Validator::make($request->all(), [
    //             'id' => 'required|integer|exists:users,id'
    //         ]);

    //         if ($validator->fails()) {
    //             return $this->sendError("Validation failed", $validator->errors());
    //         }
    //         $association = User::query()->where('id', $request->id)->with('payment_history')->where('role','member')->first();
    //         if (!$association) {
    //             return $this->sendError('No data available.');
    //         }
    //         return $this->sendResponse($association, "Association fetched successfully.", true);
    //     } catch (Exception $e) {
    //         return $this->sendError($e->getMessage(), $e->getTrace(), 500);
    //     }
    // }
}
