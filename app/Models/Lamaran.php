<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lamaran extends Model
{
    protected $guarded = ['id'];

    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class);
    }
    public function seeker(){
        return $this->belongsTo(Seeker::class);
    }
}
