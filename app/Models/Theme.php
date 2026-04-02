<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{

    public $primaryKey = 'id';

    public $table = 'theme';

    public $fillable = [
        'color1',
        'color2',
        'color3'
    ];
}
