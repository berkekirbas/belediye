<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuickMenu extends Model
{
    use SoftDeletes;

    public $primaryKey = 'id';

    public $table = 'quick_menu';

    public $fillable = [
        'name',
        'url',
        'language_code',
        'order',
        'is_active',
        'open_type',
    ];

    public function page()
    {
        return $this->belongsTo(Page::class, 'page_id');
    }
}
