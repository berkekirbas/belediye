<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StaffGroup extends Model
{
    use SoftDeletes;

    protected $table = 'staff_groups';

    protected $fillable = [
        'name',
        'slug',
        'meta_keywords',
        'meta_description',
        'is_active',
        'order',
    ];

    public function staffs()
    {
        return $this->hasMany(Staff::class);
    }
}
