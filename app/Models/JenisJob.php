<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JenisJob extends Model
{
    use HasFactory;
    protected $fillable = [
        'jenis'
    ];

    public function lowongans()
    {
        return $this->hasMany(Lowongan::class);
    }
}
