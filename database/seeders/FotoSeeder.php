<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fotos; 
use App\Models\User; 
use App\Models\Categoria; 

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
        $categoria = Categoria::all()[0];
        $fotos = [                                                              //Asocio un id de usuario aleatorio a cada foto
            Fotos::create(['Nombre'=>'Foto','id_categoria'=>$categoria->id,'Descripcion'=>'Luna llena', 'user_id' => $users->random()->id]),
            Fotos::create(['Nombre'=>'Foto2','id_categoria'=>$categoria->id,'Descripcion'=>'Ciudad de noche', 'user_id' => $users->random()->id]),
            Fotos::create(['Nombre'=>'Foto3','id_categoria'=>$categoria->id,'Descripcion'=>'Amanecer en la playa', 'user_id' => $users->random()->id]),
            Fotos::create(['Nombre'=>'Foto4','id_categoria'=>$categoria->id,'Descripcion'=>'Atardecer', 'user_id' => $users->random()->id]),
            Fotos::create(['Nombre'=>'Foto5','id_categoria'=>$categoria->id,'Descripcion'=>'Aurora Boreal', 'user_id' => $users->random()->id]),
        ];

       
      
    }
}
