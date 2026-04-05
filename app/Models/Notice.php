<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notice extends Model
{
    use SoftDeletes;

    protected $table = 'notice';

    protected $fillable = [
        'image',
        'is_active',
        'order',
    ];

    public function notice_translations()
    {
        return $this->hasMany(NoticeTranslation::class);
    }

    public function notice_translation($languageCode = 'tr')
    {
        return $this->notice_translations()->where('language_code', $languageCode)->first();
    }

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/notice/' . $this->image);
        }
        return null;
    }
}
