<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        
        for($i = 1; $i<=20; $i++){
            Role::create([
                'token' => "Rol $i ",
                'nombre' => "Este rol Puede hacer el número -$i"
            ]);
        }
    }
}
