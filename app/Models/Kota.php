<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kota extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'province_id', 'nama'];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
    public function seekers()
    {
        return $this->hasMany(Seeker::class);
    }
    public function lowongans()
    {
        return $this->hasMany(Lowongan::class);
    }
    public function companies()
    {
        return $this->hasMany(Company::class);
    }
}
