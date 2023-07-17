<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Size extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        App\Models\Size::factory()->create([
            'talla' => 'XS'
        ]);
        App\Models\Size::factory()->create([
            'talla' => 'S'
        ]);
        App\Models\Size::factory()->create([
            'talla' => 'M'
        ]);
        App\Models\Size::factory()->create([
            'talla' => 'L'
        ]);
        App\Models\Size::factory()->create([
            'talla' => 'XL'
        ]);
        App\Models\Size::factory()->create([
            'talla' => 'XXL'
        ]);

        //$sizes = [
            //['name' => 'S'],
            //['name' => 'M'],
            //['name' => 'L'],
            //['name' => 'XL'],
            //['name' => 'XXL'],
        //];
        
        //Size::insert($sizes);
    }
}
