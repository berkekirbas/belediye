<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use SoftDeletes;

    protected $table = 'news';

    protected $fillable = [
        'image',
        'is_active',
        'is_headline',
        'is_homepage',
        'order',
    ];

    public function news_translations()
    {
        return $this->hasMany(NewsTranslation::class);
    }

    public function news_translation($languageCode = 'tr')
    {
        return $this->news_translations()->where('language_code', $languageCode)->first();
    }

    public function images()
    {
        return $this->hasMany(NewsImage::class)->orderBy('order');
    }

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/news/' . $this->image);
        }
        return null;
    }
}
