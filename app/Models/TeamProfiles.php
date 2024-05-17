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
        return $this->hasMany(TeamMember::class,'team_profile_id');
    }

    
}
