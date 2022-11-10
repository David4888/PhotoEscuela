<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User; 
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrador = User::create([
            'name'=>'David',
            'email'=>'davidgf22@educastur.es',
            'email_verified_at'=>now(),
            'password'=> Hash::make('password')
        ]);
        $administrador->assignRole('admin');
        
        $roles=Role::all();
        for($i=0;$i<9;){
        $rol=$roles->random()->name;
        if($rol!="admin"){
        User::factory()->create()->assignRole($rol);  //Asignamos los roles a los usuarios que no sean admin
        $i++;
            }
        }
    }
}
