<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cartalyst\Sentinel\Users\EloquentUser;
use Illuminate\Notifications\Notifiable;

class User extends EloquentUser
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    public $primaryKey = 'id';

    public $table = 'users';

    public $fillable = [
        'first_name',
        'last_name',
        'email',
        'password'
    ];

    public $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
