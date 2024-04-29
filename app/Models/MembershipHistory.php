<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipHistory extends Model
{
    use HasFactory;
    protected $table='membership_history';

    public function member()
    {
        return $this->hasMany(Member::class)->with('user');
    }
}
