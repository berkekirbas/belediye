<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use SoftDeletes;

    public $primaryKey = 'id';

    public $table = 'message';

    public $fillable = [
        'fullname',
        'email',
        'title',
        'content',
        'is_read'
    ];
}
