<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Sex extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        App\Models\Sex::factory()->create([
            'sex'=> 'Femenino'
        ]);

        App\Models\Sex::factory()->create([
            'sex' => 'Masculino'
        ]);
    }
}
