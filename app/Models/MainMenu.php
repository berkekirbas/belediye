<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MainMenu extends Model
{
    use SoftDeletes;

    public $primaryKey = 'id';

    public $table = 'main_menu';

    public $fillable = [
        'name',
        'parent_id',
        'menu_type',
        'url',
        'language_code',
        'order',
        'is_active',
        'open_type',
        'page_id',
    ];

    public function children()
    {
        return $this->hasMany(MainMenu::class, 'parent_id')->orderBy('order');
    }

    public function allChildren()
    {
        return $this->children()->with('allChildren');
    }

    public function parent()
    {
        return $this->belongsTo(MainMenu::class, 'parent_id');
    }

    public function page()
    {
        return $this->belongsTo(Page::class, 'page_id');
    }
}
