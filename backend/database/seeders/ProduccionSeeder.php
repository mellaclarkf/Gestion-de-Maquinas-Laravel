<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProduccionSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        for ($i = 1; $i <= 10; $i++) { // 10 producciones
            DB::table('produccion')->insert([
                'tiempo_produccion' => rand(8, 12) + rand(0, 59)/60, // entre 8 y 12 horas con decimales
                'tiempo_inactividad' => rand(0, 3) + rand(0, 59)/60, // entre 0 y 3 horas
                'fecha_hora_inicio_inactividad' => $now->copy()->subDays(rand(0,5))->subHours(rand(0,12)),
                'fecha_hora_termino_inactividad' => $now->copy()->subDays(rand(0,5))->subHours(rand(0,12))->addMinutes(rand(30, 120)),
            ]);
        }
    }
}
