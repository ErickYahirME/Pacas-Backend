<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Role extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        App\Models\Role::factory()->create([
            'name' => 'Admin',
            'description' => 'administrator role'
        ]);

        App\Modeks\Role::factory()->create([
            'name' => 'User',
            'description' => 'User role'
        ]);
    }
}
