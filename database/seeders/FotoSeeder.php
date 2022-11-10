<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fotos; 
use App\Models\User; 

class FotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   //Creamos un seeder con los Datos iniciales para la base
        $users = User::all();
        $fotos = [                                                              //Asocio un id de usuario aleatorio a cada foto
            Fotos::create(['Nombre'=>'Foto','Genero'=>'Paisaje','Descripcion'=>'Puesta de sol', 'user_id' => $users->random()->id]),
            Fotos::create(['Nombre'=>'Foto2','Genero'=>'Urbano','Descripcion'=>'Ciudad', 'user_id' => $users->random()->id]),
            Fotos::create(['Nombre'=>'Foto3','Genero'=>'Paisaje','Descripcion'=>'Playa', 'user_id' => $users->random()->id]),
            Fotos::create(['Nombre'=>'Foto4','Genero'=>'Paisaje','Descripcion'=>'Desierto', 'user_id' => $users->random()->id]),
            Fotos::create(['Nombre'=>'Foto5','Genero'=>'Paisaje','Descripcion'=>'Luna llena', 'user_id' => $users->random()->id]),
        ];

       
      
    }
}
