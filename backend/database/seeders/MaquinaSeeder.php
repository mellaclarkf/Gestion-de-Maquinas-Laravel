<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaquinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('maquinas')->insert([
            ['nombre' => 'Máquina 1', 'coeficiente' => 1.00],
            ['nombre' => 'Máquina 2', 'coeficiente' => 0.95],
            ['nombre' => 'Máquina 3', 'coeficiente' => 1.10],
            ['nombre' => 'Máquina 4', 'coeficiente' => 0.85],
            ['nombre' => 'Máquina 5', 'coeficiente' => 1.05],
        ]);
    }
}
