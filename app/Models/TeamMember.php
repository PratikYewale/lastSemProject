<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;
    protected $table = 'team_member';

    public function team()
    {
        return $this->belongsTo(Team::class);
    }   

    public function teamprofiles()
    {
        return $this->belongsTo(TeamProfiles::class,'team_profile_id');
    }
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
