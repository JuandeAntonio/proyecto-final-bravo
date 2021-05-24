<?php

namespace Database\Factories;

use App\Models\Equipo;
use App\Models\Liga;
use Illuminate\Database\Eloquent\Factories\Factory;

class EquipoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Equipo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->unique()->word(10),
            'direccion' =>$this->faker->text(50),
            'telefono' => $this->faker->phoneNumber,
            'liga_id' => Liga::factory()

        ];
    }
}
