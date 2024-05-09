<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Athlete extends Model
{
    use HasFactory;
    protected $table = 'athletes';

    public function achievements()
    {
        return $this->hasMany(Achievement::class,'id');
    }
    public function sport_certificates()
    {
        return $this->hasMany(SportCertificate::class,'id');
    }
}
