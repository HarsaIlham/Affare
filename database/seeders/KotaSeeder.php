<?php

namespace Database\Seeders;

use App\Models\Kota;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = storage_path('app/private/kota.json');
        $data = json_decode(File::get($file), true);

        // Masukkan ke database
        foreach ($data as $kota) {
            Kota::create([
                'id' => $kota['id'], 
                'province_id' => $kota['province_id'],
                'nama' => $kota['nama'],
            ]);
        }
    }
}
