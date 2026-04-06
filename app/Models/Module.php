<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{

    public $primaryKey = 'id';

    protected $table = 'module';

    public $fillable = [
        'activity_status',
        'notice_status',
        'project_status',
        'baskan_status',
        'baskanmessage_status',
        'photo_status',
        'contactform_status'
    ];
}

