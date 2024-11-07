<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Crea un usuario específico
        User::create([
            'name' => 'Test',
            'email' => 'Test@udg.com',
            'password' => Hash::make('password'), // Recuerda encriptar la contraseña
        ]);
    }
}
