<?php

namespace Database\Seeders;

use App\Models\sex;
use Illuminate\Database\Seeder;

class SexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sex = [
            ['sex' => 'Masculino'],
            ['sex' => 'Femenino'],
        ];
        sex::insert($sex);
    }
}
