<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    use HasFactory;
    protected $table='donors';

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }
    public function honors()
    {
        return  $this->hasOne(Honor::class);
    }
}
