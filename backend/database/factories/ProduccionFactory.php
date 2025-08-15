<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Produccion;
use App\Models\Maquina;
use Carbon\Carbon;

class ProduccionFactory extends Factory
{
    protected $model = Produccion::class;

    public function definition()
    {
        $inicioInactividad = $this->faker->dateTimeBetween('-1 month', 'now');
        $terminoInactividad = (clone $inicioInactividad)->modify('+' . $this->faker->numberBetween(1, 20) . ' hours');

        return [
            'id_maquina' => Maquina::factory(),
            'tiempo_produccion' => $this->faker->numberBetween(25, 120),
            'tiempo_inactividad' => $this->faker->numberBetween(5, 50),
            'fecha_hora_inicio_inactividad' => $inicioInactividad,
            'fecha_hora_termino_inactividad' => $terminoInactividad,
        ];
    }
}
