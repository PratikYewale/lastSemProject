<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classes extends Model
{
    use SoftDeletes;
    protected $table = 'classes';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        "name",
        "description",
        "is_active",
        "class_teacher_id",
        "division"
    ];
}
