<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\TeamMember;

class TeamController extends Controller
{
    public function teams()
    {
        try {
            $games = Team::query();
            $games = $games->with([])->paginate(9);
            return view('frontend.teams', compact('games'));
        } catch (Exception $e) {

            return view('frontend.teams');
        }
    }

    public function teamDetails($id)
    {
        $team = Team::with('teamprofiles','teamprofiles.teammember')->findOrFail($id);
        // $team = Team::with('teammembers.users')->findOrFail($id);
    
        return view('frontend.teamDetails', compact('team'));
    }
    
    
}
