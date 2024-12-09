<?php

namespace Database\Seeders;

use App\Models\TipeJob;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipeJobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipeJob::factory()->create([
            'tipe' => 'Remote',
        ]);
        TipeJob::factory()->create([
            'tipe' => 'Onsite',
        ]);
        TipeJob::factory()->create([
            'tipe' => 'Hybrid'
        ]);
    }
}
