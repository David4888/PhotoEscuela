<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
        Categoria::create(['Nombre'=>'Nocturna']);
        Categoria::create(['Nombre'=>'Animal']);
        Categoria::create(['Nombre'=>'Paisaje']);
        Categoria::create(['Nombre'=>'Acuatica']);
        Categoria::create(['Nombre'=>'Blanco y negro']);
        Categoria::create(['Nombre'=>'Urbana']);
        Categoria::create(['Nombre'=>'Gastronomica']);
        Categoria::create(['Nombre'=>'Deportiva']);
        Categoria::create(['Nombre'=>'Aerea']);
        
    }
}
