<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class DegreesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $degrees = [
            [
                'name' => 'Licenciatura en Física',
                'abbreviation_name' => 'LF'
            ],
            [
                'name' => 'Licenciatura en Matemáticas',
                'abbreviation_name' => 'LM'
            ],
            [
                'name' => 'Licenciatura en Química',
                'abbreviation_name' => 'LQ'
            ],
            [
                'name' => 'Licenciatura en Químico Farmacéutico Biólogo',
                'abbreviation_name' => 'QFB'
            ],
            [
                'name' => 'Licenciatura en Ciencia de Materiales',
                'abbreviation_name' => 'LCM'
            ],
            [
                'name' => 'Licenciatura en Ingeniería Civil',
                'abbreviation_name' => 'IC'
            ],
            [
                'name' => 'Ingeniería en Alimentos y Biotecnología',
                'abbreviation_name' => 'IAB'
            ],
            [
                'name' => 'Ingeniería en Topografía Geomática',
                'abbreviation_name' => 'ITG'
            ],
            [
                'name' => 'Ingeniería Industrial',
                'abbreviation_name' => 'II'
            ],
            [
                'name' => 'Ingeniería Mecánica Eléctrica',
                'abbreviation_name' => 'IME'
            ],
            [
                'name' => 'Ingeniería Química',
                'abbreviation_name' => 'IQ'
            ],
            [
                'name' => 'Ingeniería en Logística y Transporte',
                'abbreviation_name' => 'ILT'
            ],
            [
                'name' => 'Ingeniería Informática',
                'abbreviation_name' => 'IINF'
            ],
            [
                'name' => 'Ingeniería Biomédica',
                'abbreviation_name' => 'IB'
            ],
            [
                'name' => 'Ingeniería en Computación',
                'abbreviation_name' => 'ICOMP'
            ],
            [
                'name' => 'Ingeniería en Comunicaciones y Electrónica',
                'abbreviation_name' => 'ICE'
            ],
            [
                'name' => 'Ingeniería Robótica',
                'abbreviation_name' => 'IR'
            ],
            [
                'name' => 'Ingeniería Fotónica',
                'abbreviation_name' => 'IF'
            ],
        ];


        foreach ($degrees as $degree) {
            DB::table('degrees')->insert([
                'name' => $degree['name'],
                'abbreviation_name' => $degree['abbreviation_name'],
            ]);
        }
    }
}
