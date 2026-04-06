<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsImage extends Model
{
    protected $table = 'news_images';

    protected $fillable = [
        'news_id',
        'image',
        'order',
    ];

    public function news()
    {
        return $this->belongsTo(News::class);
    }

    public function getImageUrlAttribute()
    {
        return asset('storage/news-images/' . $this->image);
    }
}
