<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamProfiles extends Model
{
    use HasFactory;
    protected $table='team_profiles';

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    public function teammember()
    {
        return $this->hasMany(TeamMember::class,'team_profile_id')->with('users')->select(['id','team_profile_id','athlete_id']);
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'team_member', 'team_profile_id', 'athlete_id');
    }
}
