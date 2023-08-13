<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Address::create([
            'calle' => 'Zaragoza',
            'numExt' => 10,
            'numInt' => 10,
            'colonia' => 'Lomas Turbas',
            'municipio' => 'Oaxakanda',
            'estado' => 'Oaxakanda',
            'pais' => 'Mexico',
            'codigoPostal' => 8000,
            'idUser' => 3,
            'nombreCompleto' => 'Juan Perez'
        ]);

        Address::create([
            'calle' => 'Hidalgo',
            'numExt' => 11,
            'numInt' => 11,
            'colonia' => 'Tepiz Koloyo',
            'municipio' => 'Oaxakanda',
            'estado' => 'Oaxakanda',
            'pais' => 'Mexico',
            'codigoPostal' => 8000,
            'idUser' => 3,
            'nombreCompleto' => 'Lalo Perez'
        ]);

        Address::create([
            'calle' => 'Bravo',
            'numExt' => 13,
            'numInt' => 13,
            'colonia' => 'nosabo',
            'municipio' => 'Oaxakanda',
            'estado' => 'Oaxakanda',
            'pais' => 'Mexico',
            'codigoPostal' => 8000,
            'idUser' => 3,
            'nombreCompleto' => 'Ratón Perez'
        ]);
    }
}
