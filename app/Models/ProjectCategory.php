<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectCategory extends Model
{
    use SoftDeletes;

    protected $table = 'project_categories';

    protected $fillable = [
        'name',
        'slug',
        'meta_keywords',
        'meta_description',
        'is_active',
        'order',
    ];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
