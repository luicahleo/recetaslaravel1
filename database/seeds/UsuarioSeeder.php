<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Luis',
            'email' => 'correo1@correo.com',
            'password' => Hash::make('12345678'),
            'url' => 'http://sacu.es',
        ]);

        User::create([
            'name' => 'Dana',
            'email' => 'correo2@correo.com',
            'password' => Hash::make('12345678'),
            'url' => 'http://sacu.es',
        ]);

        User::create([
            'name' => 'Noa',
            'email' => 'correo3@correo.com',
            'password' => Hash::make('12345678'),
            'url' => 'http://sacu.es',
        ]);

    }
}
