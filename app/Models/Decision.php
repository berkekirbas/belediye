<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Decision extends Model
{
    use SoftDeletes;

    public $primaryKey = 'id';
    protected $table = 'decision';

    protected $fillable = [
        'title',
        'filename',
        'is_active',
        'month',
        'year',
    ];

    public function getFileUrlAttribute()
    {
        if ($this->filename) {
            return asset('storage/decision/' . $this->filename);
        }
        return null;
    }
}
