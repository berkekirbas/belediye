<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhotoGalleryImage extends Model
{
    protected $table = 'photo_gallery_images';

    protected $fillable = [
        'photo_gallery_id',
        'image',
        'order',
    ];

    public function photo_gallery()
    {
        return $this->belongsTo(PhotoGallery::class);
    }

    public function getImageUrlAttribute()
    {
        return asset('storage/photo-gallery-images/' . $this->image);
    }
}
