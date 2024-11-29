<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\Province;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = storage_path('app/private/provinsi.json');
        $data = json_decode(File::get($file), true);

        // Masukkan ke database
        foreach ($data as $province) {
            Province::create([
                'id' => $province['id'], 
                'nama' => $province['nama'],
            ]);
        }
    }
}
