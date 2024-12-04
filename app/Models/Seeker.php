<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;



class Seeker extends Authenticatable
{
    use HasFactory, Notifiable;
    
    protected $guarded = [
        "id",
        "created_at",
        "updated_at"
    ];

    protected $hidden = [
        "password",
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

}
