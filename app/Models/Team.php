<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $table='teams';
    public function teamprofiles()
    {
        return $this->hasMany(TeamProfiles::class);
    }
    public function teammembers()
    {
        return $this->hasMany(TeamMember::class);
    }
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
