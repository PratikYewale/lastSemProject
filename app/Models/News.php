<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table='news';
    public function newsAnnouncementImages()
    {
        return $this->hasMany(NewsAnnouncementImages::class, 'news_id');
    }
   
}
