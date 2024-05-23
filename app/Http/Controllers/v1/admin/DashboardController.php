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
            $athletes = User::query()->where('role','athlete')->count();
            $activeAthletes = User::query()->where('role','athlete')->where('status',true)->count();
            $InactiveAthletes = User::query()->where('role','athlete')->where('status',false)->count();
            $members = User::query()->where('role','member')->count();
            $activeMembers = User::query()->where('role','member')->where('status',true)->count();
            $InactiveMembers = User::query()->where('role','member')->where('status',false)->count();
            $teams = TeamProfiles::count();
            $queriesNotSolved = ContactUs::query()->where('is_solved',false)->count();
            $queriesSolved = ContactUs::query()->where('is_solved',true)->count();
            $news = News::query()->where('type','news')->count();
            $announcements = News::query()->where('type','announcement')->count();
            $achievements = News::query()->where('type','achievements')->count();
            $donations = Donation::query()->count();
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
