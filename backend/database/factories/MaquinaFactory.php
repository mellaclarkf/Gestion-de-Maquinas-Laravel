<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Maquina;

class MaquinaFactory extends Factory
{
    protected $model = Maquina::class;

    public function definition(): array
    {
        return [
            'nombre' => $this->faker->unique()->company(), // o "Máquina 1, 2, 3..."
            'coeficiente' => $this->faker->randomFloat(2, 1, 3), // aleatorio entre 1 y 3
        ];
    }
}
