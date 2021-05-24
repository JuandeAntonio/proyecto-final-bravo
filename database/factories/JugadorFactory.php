<?php

namespace Database\Factories;

use App\Models\Jugador;
use App\Models\Equipo;
use Illuminate\Database\Eloquent\Factories\Factory;

class JugadorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Jugador::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->unique()->word(10),
            'apellidos' =>$this->faker->word(15),
            'dorsal' => $this->faker->unique()->numberBetween($min = 1, $max = 99),
            'equipo_id' => Equipo::factory()
        ];
    }
}
