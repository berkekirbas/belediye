<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Limit extends Model
{

    public $primaryKey = 'id';

    public $table = 'limit';

    public $fillable = [
        'project_limit',
        'news_limit',
        'notice_limit',
        'photo_limit'
    ];
}
