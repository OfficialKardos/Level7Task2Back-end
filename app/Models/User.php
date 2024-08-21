<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone_number', 'password'
    ];

    protected $hidden = [
        'password',
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class, 'assigned_to');
    }
}
