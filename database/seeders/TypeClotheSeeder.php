<?php

namespace Database\Seeders;

use App\Models\typeClothe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeClotheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $typeRopa = [
            ['name_clothe' => 'Blusa'],
            ['name_clothe' => 'Sudadera'],
            ['name_clothe' => 'Falda'],
            ['name_clothe' => 'Pantalones vaqueros'],
            ['name_clothe' => 'Camisa'],
            ['name_clothe' => 'Jersey'],
            ['name_clothe' => 'Traje'],
            ['name_clothe' => 'Ropa deportiva'],
            ['name_clothe' => 'Abrigo'],
            ['name_clothe' => 'Chaleco'],
            ['name_clothe' => 'Mono'],
            ['name_clothe' => 'Traje de baño'],
            ['name_clothe' => 'Túnica'],
            ['name_clothe' => 'Capa'],
            ['name_clothe' => 'Ropa íntima'],
            ['name_clothe' => 'Calcetines'],
            ['name_clothe' => 'Bufanda'],
            ['name_clothe' => 'Gorro'],
            ['name_clothe' => 'Sombrero'],
            ['name_clothe' => 'Zapatos']
        ];
        typeClothe::insert($typeRopa);
    }
}
