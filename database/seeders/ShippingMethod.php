<?php

namespace Database\Seeders;

use App\Models\shippingMethod as ShippingMethods;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShippingMethod extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paquete = [
            ['paqueteria' => 'Fedex'],
            ['paqueteria' => 'DHL'],
            ['paqueteria' => 'Estafeta'],
            ['paqueteria' => 'UPS'],
            ['paqueteria' => 'Redpack'],
            ['paqueteria' => 'Paquete Express'],
            ['paqueteria' => 'Paquete Postal'],
            ['paqueteria' => 'Otro']
        ];
        ShippingMethods::insert($paquete);
    }
}
