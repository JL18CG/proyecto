<?php

use App\Reporte;
use Illuminate\Database\Seeder;

class ReporteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reporte::truncate();

        for($i = 1; $i<=30; $i++){
            Reporte::create([
            'tipo'=> 'sevac ', 
            'clas_reporte'=> '', 
            'titulo' =>'Reporte SEVAC'.$i , 
            'archivo'=> 'reporte_2020_09_10_23_52_36.pdf',
            ]);
        }

        for($i = 1; $i<=30; $i++){
            Reporte::create([
            'tipo'=> 'general ', 
            'clas_reporte'=> 'mensual', 
            'titulo' =>'Reporte Mensual'.$i , 
            'archivo'=> 'reporte_2020_09_10_23_52_36.pdf',
            ]);
        }

        for($i = 1; $i<=30; $i++){
            Reporte::create([
            'tipo'=> 'general ', 
            'clas_reporte'=> 'trimestral', 
            'titulo' =>'Reporte Trimestral'.$i , 
            'archivo'=> 'reporte_2020_09_10_23_52_36.pdf',
            ]);
        }

        for($i = 1; $i<=30; $i++){
            Reporte::create([
            'tipo'=> 'general ', 
            'clas_reporte'=> 'anual', 
            'titulo' =>'Reporte Anual'.$i , 
            'archivo'=> 'reporte_2020_09_10_23_52_36.pdf',
            ]);
        }

    }
}
