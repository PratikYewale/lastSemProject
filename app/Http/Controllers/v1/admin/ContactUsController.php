<?php

namespace App\Http\Controllers\v1\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use App\Models\ContactUs;
use App\Models\SolvedQueries;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ContactUsController extends Controller
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

    public function getAllContactUs(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'pageNo' => 'numeric',
                'limit' => 'numeric',
                'is_solved' => 'boolean'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors(), 400);
            }
            $query = ContactUs::query();
            if ($request->has('is_solved')) {
                if ($request->is_solved == true) {
                    $query->where('is_solved', true);
                }
                if ($request->is_solved == false) {
                    $query->where('is_solved', false);
                }
            }
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
                $response['Contact_us'] = $data;
                return $this->sendResponse($response, 'Data fetched successfully.', true);
            } else {
                return $this->sendError("No data available.");
            }
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }

    public function getContactUsById(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:contact_us,id',
            ]);

            if ($validator->fails()) {
                return $this->sendError("Validation failed", $validator->errors());
            }
            $ContactUs = ContactUs::query()->where('id', $request->id)->first();
            if (!$ContactUs) {
                return $this->sendError('No data available.');
            }
            return $this->sendResponse($ContactUs, "Contact us fetched successfully.", true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
    public function resolveQuery(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'query_id' => 'required|exists:contact_us,id',
                'message' => 'required|nullable',
            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors(), 422);
            }
            DB::beginTransaction();
            $userId = Auth::id();
            $query = ContactUs::findOrFail($request->query_id);
            if ($query->is_solved) {
                return $this->sendError("Query already solved.", [], 409);
            }
            $resolveQuery = new SolvedQueries();
            $resolveQuery->user_id = $userId;
            $resolveQuery->query_id = $request->query_id;
            $resolveQuery->answer = $request->message;
            $resolveQuery->save();
            $data = [
                'to_name' => $query->name,
                'email' => $query->email,
                'query' => $query->message,
                'answer' => $resolveQuery->answer,
            ];
            $query->is_solved = true;
            $query->save();
            Mail::send('emails.resolvedQueries', $data, function ($message) use ($data) {
                $message->to($data['email'], $data['to_name'])
                    ->subject('Response to your query');
                $message->from(env('MAIL_FROM_ADDRESS'), 'INDIAN SKI AND SNOWBOARD');
            });
            DB::commit();
            return $this->sendResponse($resolveQuery, 'Mail sent successfully.', true);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
}
