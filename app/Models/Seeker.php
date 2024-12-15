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

    public function province()
    {
        return $this->belongsTo(Province::class,'province_id');
    }
    public function kota()
    {
        return $this->belongsTo(Kota::class,'kota_id');
    }
    public function lamarans()
    {
        return $this->hasMany(Lamaran::class);
    }

}
