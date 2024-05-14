<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table='news';
    public function newsImages()
    {
        return $this->hasMany(NewsImage::class, 'news_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
   
}
