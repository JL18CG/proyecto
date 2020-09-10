<?php

use App\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::truncate();
   
            for($i = 1; $i<=10; $i++){
                Categoria::create([
                    'nombre' => "Categoría".$i
                ]);
            }
    }
}
