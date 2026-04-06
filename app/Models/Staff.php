<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{
    use SoftDeletes;

    protected $table = 'staff';

    protected $fillable = [
        'staff_group_id',
        'full_name',
        'slug',
        'title',
        'image',
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'email',
        'meta_keywords',
        'meta_description',
        'content',
        'is_active',
        'order',
    ];

    public function staff_group()
    {
        return $this->belongsTo(StaffGroup::class);
    }

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/staff/' . $this->image);
        }
        return null;
    }
}
