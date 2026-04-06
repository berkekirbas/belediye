<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsTranslation extends Model
{
    protected $table = 'news_translations';

    protected $fillable = [
        'news_id',
        'language_code',
        'title',
        'slug',
        'content',
        'meta_keywords',
        'meta_description',
    ];

    public function news()
    {
        return $this->belongsTo(News::class);
    }
}
