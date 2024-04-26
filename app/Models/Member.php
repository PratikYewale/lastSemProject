<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table='members';

    protected $casts = [
        "achievements" => "array"
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function teamMember()
    {
        return $this->hasOne(TeamMember::class);
    }
    public function getAchievementsAttribute($value){
        return json_decode($value,true);
    }
}
