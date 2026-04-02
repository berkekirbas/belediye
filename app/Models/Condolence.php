<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Condolence extends Model
{
    use SoftDeletes;

    public $primaryKey = 'id';

    public $table = 'condolence';

    public $fillable = [
        'fullname',
        'job',
        'is_active',
        'language_code',
        'message',
    ];
}
