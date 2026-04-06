<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    protected $table = 'projects';

    protected $fillable = [
        'project_category_id',
        'image',
        'is_active',
        'order',
    ];

    public function category()
    {
        return $this->belongsTo(ProjectCategory::class, 'project_category_id');
    }

    public function project_translations()
    {
        return $this->hasMany(ProjectTranslation::class);
    }

    public function project_translation($languageCode = 'tr')
    {
        return $this->project_translations()->where('language_code', $languageCode)->first();
    }

    public function images()
    {
        return $this->hasMany(ProjectImage::class)->orderBy('order');
    }

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/projects/' . $this->image);
        }
        return null;
    }
}
