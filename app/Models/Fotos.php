<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fotos extends Model
{
    use HasFactory;

    protected $fillable = ['Nombre','Descripcion', 'id_categoria'];  //Campos modificables con el método fill

    public function user(){
        return $this->belongsTo(User::class); //Creamos la relación La foto pertenece a un usuario
    }

    public function categoria(){
        return $this->belongsTo(Categoria::class, 'id_categoria', 'id'); //La foto pertenece a una categoria
    }

}
