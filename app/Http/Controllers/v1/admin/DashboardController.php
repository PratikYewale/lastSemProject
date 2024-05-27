<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\Donation;
use App\Models\News;
use App\Models\Team;
use App\Models\TeamProfiles;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function getAllDashboardCount(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'start_date' => 'nullable|date|before_or_equal:end_date',
                'end_date' => 'nullable|date|after_or_equal:start_date',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');

            // Helper function to apply date filter
            $applyDateFilter = function ($query) use ($startDate, $endDate) {
                if ($startDate && $endDate) {
                    $query->whereBetween('created_at', [$startDate, $endDate]);
                }
                return $query;
            };


            $athletes = $applyDateFilter(User::query()->where('role', 'athlete'))->count();
            $activeAthletes = $applyDateFilter(User::query()->where('role', 'athlete')->where('status', true))->count();
            $InactiveAthletes = $applyDateFilter(User::query()->where('role', 'athlete')->where('status', false))->count();
            $members = $applyDateFilter(User::query()->where('role', 'member'))->count();
            $activeMembers = $applyDateFilter(User::query()->where('role', 'member')->where('status', true))->count();
            $InactiveMembers = $applyDateFilter(User::query()->where('role', 'member')->where('status', false))->count();
            $teams = $applyDateFilter(TeamProfiles::query())->count();
            $queriesNotSolved = $applyDateFilter(ContactUs::query()->where('is_solved', false))->count();
            $queriesSolved = $applyDateFilter(ContactUs::query()->where('is_solved', true))->count();
            $news = $applyDateFilter(News::query()->where('type', 'news'))->count();
            $announcements = $applyDateFilter(News::query()->where('type', 'announcement'))->count();
            $achievements = $applyDateFilter(News::query()->where('type', 'achievements'))->count();
            $donations = $applyDateFilter(Donation::query())->count();
            $response = [
                'totalAthletes' => $athletes,
                'activeAthletes' => $activeAthletes,
                'InactiveAthletes' => $InactiveAthletes,
                'totalMembers' => $members,
                'activeMembers' => $activeMembers,
                'InactiveMembers' => $InactiveMembers,
                'teams' => $teams,
                'queriesNotSolved' => $queriesNotSolved,
                'queriesSolved' => $queriesSolved,
                'news' => $news,
                'announcements' => $announcements,
                'achievements' => $achievements,
                'donations' => $donations,
            ];
            return $this->sendResponse($response, 'Data fetched successfully.', true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
}
