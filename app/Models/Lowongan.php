<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    protected $guarded = [
        "id",
        "created_at",
        "updated_at"
    ];

    public function company()
    {
        return $this->belongsTo(Company::class , 'company_id');
    }
    public function kota()
    {
        return $this->belongsTo(Kota::class, 'kota_id');
    }
    public function tipejob()
    {
        return $this->belongsTo(TipeJob::class, 'tipe_job_id');
    }
    public function jenisjob()
    {
        return $this->belongsTo(JenisJob::class, 'jenis_job_id');
    }
    public function province()
    {
        return $this->belongsTo(Province::class, 'provinsi_id');
    }
    public function lamarans()
    {
        return $this->hasMany(Lamaran::class);
    }
    public function seekers(){
        return $this->hasManyThrough(Seeker::class, Lamaran::class);
    }
}
