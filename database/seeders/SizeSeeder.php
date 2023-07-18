<?php

namespace Database\Seeders;

use App\Models\size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $size = [
            ['size' => 'Chico'],
            ['size' => 'Mediano'],
            ['size' => 'Grande']
        ];
        size::insert($size);
    }
}
