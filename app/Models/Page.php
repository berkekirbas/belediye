<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;

    protected $table = 'pages';

    protected $fillable = [
        'image',
        'is_active',
        'order',
    ];

    public function translations()
    {
        return $this->hasMany(PageTranslation::class);
    }

    public function translation($languageCode = 'tr')
    {
        return $this->translations()->where('language_code', $languageCode)->first();
    }

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/pages/' . $this->image);
        }
        return null;
    }
}
