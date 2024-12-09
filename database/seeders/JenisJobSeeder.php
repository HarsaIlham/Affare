<?php

namespace Database\Seeders;

use App\Models\JenisJob;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisJobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JenisJob::factory()->create([
            'jenis' => 'Internship',
        ]);
        JenisJob::factory()->create([
            'jenis' => 'Part Time',
        ]);
    }
}
