<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
        'profile_image',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // 🔹 Events created by admin
    public function events()
    {
        return $this->hasMany(Event::class, 'created_by');
    }

    // 🔹 Events user registered to
    public function registeredEvents()
    {
        return $this->belongsToMany(Event::class, 'registrations')
                    ->withTimestamps();
    }
}
