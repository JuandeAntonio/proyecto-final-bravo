<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //PARA CREAR UN USUARIO EN LA BASE DE DATOS QUE SIEMPRE ESTE CUANDO HACEMOS UN MIGRATE FRESH
        User::create([
            'name' => 'Juan Antonio Garcia',
            'email' => 'juan@gmail.com',
            'password' => bcrypt('A123a456')
        ])->assignRole('Admin');

    }
}
