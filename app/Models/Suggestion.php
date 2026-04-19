<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Suggestion extends Model
{
    use SoftDeletes;

    public $primaryKey = 'id';

    public $table = 'suggestion';

    public $fillable = [
        'fullname',
        'tc',
        'email',
        'birthdate',
        'answer_type',
        'disability_status',
        'education_status',
        'job',
        'gender',
        'address',
        'is_read',
        'content'
    ];
}
