<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhotoGalleryTranslation extends Model
{
    protected $table = 'photo_gallery_translations';

    protected $fillable = [
        'photo_gallery_id',
        'language_code',
        'title',
        'slug',
        'content',
        'meta_keywords',
        'meta_description',
    ];

    public function photo_gallery()
    {
        return $this->belongsTo(PhotoGallery::class);
    }
}
