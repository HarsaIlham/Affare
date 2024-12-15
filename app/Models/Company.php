<?php

namespace App\Models;

use Illuminate\Container\Attributes\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;



class Company extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $guarded = [
        "id",
        "created_at",
        "updated_at",
    ];

    protected $hidden = [
        "password",
    ];

    public function lowongans()
    {
        return $this->hasMany(Lowongan::class);
    }
    public function kota()
    {
        return $this->belongsTo(Kota::class);
    }
    public function province()
    {
        return $this->belongsTo(Province::class);
    }
    public function lamarans()
    {
        return $this->hasManyThrough(Lamaran::class, Lowongan::class);
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
