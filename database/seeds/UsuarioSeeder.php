<?php

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
        // Llenamos la tabla users, llenamos name, email, password, url
        DB::table('users')->insert([
            'name' => 'Luis',
            'email' => 'correo1@correo.com',
            'password' => Hash::make('12345678'),
            'url' => 'http://sacu.es',

        ]);
        DB::table('users')->insert([
            'name' => 'Dana',
            'email' => 'correo2@correo.com',
            'password' => Hash::make('12345678'),
            'url' => 'http://sacu.es',

        ]);
        DB::table('users')->insert([
            'name' => 'Noa',
            'email' => 'correo3@correo.com',
            'password' => Hash::make('12345678'),
            'url' => 'http://sacu.es',

        ]);
        DB::table('users')->insert([
            'name' => 'Narcy',
            'email' => 'correo4@correo.com',
            'password' => Hash::make('12345678'),
            'url' => 'http://sacu.es',

        ]);
        DB::table('users')->insert([
            'name' => 'Aurora',
            'email' => 'correo5@correo.com',
            'password' => Hash::make('12345678'),
            'url' => 'http://sacu.es',

        ]);
    }
}
