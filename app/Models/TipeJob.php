<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipeJob extends Model
{
    use HasFactory;
    protected $fillable = [
        'tipe'
    ];

    public function lowongans(){
        return $this->hasMany(Lowongan::class);
    }
}
