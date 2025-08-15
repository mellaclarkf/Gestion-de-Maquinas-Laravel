<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TareasSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();
        $maquinas = DB::table('maquinas')->pluck('coeficiente', 'id'); // id => coeficiente
        $producciones = DB::table('produccion')->pluck('id'); // lista de producciones

        foreach ($producciones as $produccion_id) {
            $num_tareas = rand(3, 6); // cada producción tiene entre 3 y 6 tareas

            for ($i = 0; $i < $num_tareas; $i++) {
                $maquina_id = $maquinas->keys()->random();
                $coef = $maquinas[$maquina_id];

                $inicio = $now->copy()->subDays(rand(0,5))->subHours(rand(0,12))->subMinutes(rand(0,59));
                $fin = $inicio->copy()->addMinutes(rand(30, 180)); // entre 30 min y 3 horas

                $tiempo_empleado = round($fin->diffInMinutes($inicio) / 60, 2);

                DB::table('tareas')->insert([
                    'id_produccion' => $produccion_id,
                    'fecha_hora_inicio' => $inicio,
                    'fecha_hora_termino' => $fin,
                    'tiempo_empleado' => $tiempo_empleado,
                    'tiempo_produccion' => round($tiempo_empleado * $coef, 2),
                    'estado' => rand(0,1) ? 'COMPLETADA' : 'PENDIENTE',
                ]);
            }
        }
    }
}
