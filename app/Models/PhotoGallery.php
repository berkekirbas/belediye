<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhotoGallery extends Model
{
    use SoftDeletes;

    protected $table = 'photo_galleries';

    protected $fillable = [
        'image',
        'is_active',
        'order',
    ];

    public function photo_gallery_translations()
    {
        return $this->hasMany(PhotoGalleryTranslation::class);
    }

    public function photo_gallery_translation($languageCode = 'tr')
    {
        return $this->photo_gallery_translations()->where('language_code', $languageCode)->first();
    }

    public function images()
    {
        return $this->hasMany(PhotoGalleryImage::class)->orderBy('order');
    }

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/photo-galleries/' . $this->image);
        }
        return null;
    }
}
