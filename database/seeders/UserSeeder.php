<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Romerico Junior',
            'lastname' => 'Orozco Vasquez',
            'sex_id' => 1,
            'role_id' => 1,
            'phone' => '5555555555',
            'email' => 'rom@example.com',
            'password' => Hash::make('password1'),
        ]);
    }
}
