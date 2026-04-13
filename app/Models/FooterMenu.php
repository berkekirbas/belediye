<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FooterMenu extends Model
{
    use SoftDeletes;

    public $primaryKey = 'id';

    public $table = 'footer_menu';

    public $fillable = [
        'name',
        'parent_id',
        'url',
        'language_code',
        'order',
        'is_active',
        'open_type',
    ];

    public function children()
    {
        return $this->hasMany(FooterMenu::class, 'parent_id')->orderBy('order');
    }

    public function allChildren()
    {
        return $this->children()->with('allChildren');
    }

    public function parent()
    {
        return $this->belongsTo(FooterMenu::class, 'parent_id');
    }
}
