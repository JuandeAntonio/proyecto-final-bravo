<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Liga;
use App\Models\Equipo;
use App\Models\Jugador;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RoleSeeder::class);

        $this->call(UserSeeder::class);

        //Liga::factory()->has(Equipo::factory()->count(8))->create();

        //PARA RELLENAR LA BASE DE DATOS CON 2 LIGAS, CON SUS CORRESPONDIENTES EQUIPOS Y SUS CORRESPONDIENTES JUGADORES

        Liga::factory()->has(Equipo::factory()->has(Jugador::factory()->count(12))->count(8))->create();
        Liga::factory()->has(Equipo::factory()->has(Jugador::factory()->count(12))->count(8))->create();

    }
}
