<?php

namespace Database\Seeders;

use App\Models\cupones;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CuponesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        cupones::create([
            'codigo' => 'JDKFNID',
            'descuento' => 10,
            'fecha_inicio' => '2023-01-01',
            'fecha_fin' => '2023-12-31',
            'estado' => true,
        ]);
    }
}
