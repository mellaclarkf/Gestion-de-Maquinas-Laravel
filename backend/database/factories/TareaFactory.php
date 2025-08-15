<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tarea;
use App\Models\Maquina;
use Carbon\Carbon;

class TareaFactory extends Factory
{
    protected $model = Tarea::class;

    public function definition()
    {
        $inicio = $this->faker->dateTimeBetween('-1 month', 'now');
        $fin = (clone $inicio)->modify('+' . $this->faker->numberBetween(5, 120) . ' hours');

        return [
            'id_maquina' => Maquina::factory(),
            'fecha_hora_inicio' => $inicio,
            'fecha_hora_termino' => $fin,
            'tiempo_empleado' => $this->faker->numberBetween(5, 120),
            'tiempo_produccion' => 0, // se calculará después
            'estado' => 'PENDIENTE',
        ];
    }
}
