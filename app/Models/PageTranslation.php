<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageTranslation extends Model
{
    protected $table = 'page_translations';

    protected $fillable = [
        'page_id',
        'language_code',
        'title',
        'slug',
        'content',
        'meta_keywords',
        'meta_description',
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
