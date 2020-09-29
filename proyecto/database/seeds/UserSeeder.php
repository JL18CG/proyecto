<?php

use App\Role;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        for($i = 1; $i<=30; $i++){
            User::create([
            'name'=> 'Usuario '.$i, 
            'apellidos'=> 'Apellido del Usuario '.$i,  
            'password'=> '147852369', 
            'email'=> 'usuario'.$i.'@gmail.com',
            'telefono'=> '636100000'
            ]);
        }

    }
}
