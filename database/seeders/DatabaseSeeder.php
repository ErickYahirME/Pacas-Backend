<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CuponesSeeder;
use Database\Seeders\SexSeeder;
use Database\Seeders\SizeSeeder;
use Database\Seeders\TypeClotheSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\AddressSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CuponesSeeder::class);
        $this->call(SizeSeeder::class);
        $this->call(TypeClotheSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(SexSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(AddressSeeder::class);

        $this->call(ShippingMethod::class);

        // \App\Models\User::factory(10)->create();

    }
}
