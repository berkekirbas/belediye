<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    use SoftDeletes;

    protected $table = 'activity';

    protected $fillable = [
        'image',
        'is_active',
        'order',
    ];

    public function activity_translations()
    {
        return $this->hasMany(ActivityTranslation::class);
    }

    public function activity_translation($languageCode = 'tr')
    {
        return $this->activity_translations()->where('language_code', $languageCode)->first();
    }

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/activity/' . $this->image);
        }
        return null;
    }
}
