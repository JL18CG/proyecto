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

        User::create([
        'name'=> 'José Luis ', 
        'apellidos'=> 'Villalobos Ramírez',  
        'password'=> '789654123', 
        'email'=> 'micorreo@gmail.com',
        'telefono'=> '636100000',
        'admin'=>'si'
        ]);


    }
}
