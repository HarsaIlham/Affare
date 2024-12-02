<?php

namespace App\Models;
use App\Http\Controllers\HomepageController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Province extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'nama'];

    // public function cities()
    // {
    //     return $this->hasMany(Kota::class);
    // }
}
