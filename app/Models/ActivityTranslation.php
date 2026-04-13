<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityTranslation extends Model
{
    protected $table = 'activity_translations';

    protected $fillable = [
        'activity_id',
        'language_code',
        'title',
        'content',
        'meta_keywords',
        'location',
        'meta_description',
        'end_date',
        'start_date',
        'slug'
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
}
