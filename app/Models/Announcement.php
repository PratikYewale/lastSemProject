<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;
    protected $table='announcement';
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function AnnouncementImages()
    {
        return $this->hasMany(NewsAnnouncementImages::class, 'announcement_id');
    }
}
