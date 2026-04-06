<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectTranslation extends Model
{
    protected $table = 'project_translations';

    protected $fillable = [
        'project_id',
        'language_code',
        'title',
        'slug',
        'content',
        'meta_keywords',
        'meta_description',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
