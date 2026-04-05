<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NoticeTranslation extends Model
{
    protected $table = 'notice_translations';

    protected $fillable = [
        'notice_id',
        'language_code',
        'title',
        'content',
        'meta_keywords',
        'meta_description',
    ];

    public function notice()
    {
        return $this->belongsTo(Notice::class);
    }
}
