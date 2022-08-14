<?php


namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'nombre' => 'Usuario',
            'tipo_usuario' => 'SuperAdmin',
            'imagen' => 'admin.jpg',
            'email' => 'demo@example.com',
            'password' => bcrypt('12345'),
            'api_token' => Str::random(80)
        ]);
        /* DB::table('users')->insert([
            'name' => 'Usuario',
            'email' => 'usuario@gmail.com',
            'image' => 'profile.png',
            'password' => bcrypt('123456'),
            'type' => 'user',
        ]); */
    }
}