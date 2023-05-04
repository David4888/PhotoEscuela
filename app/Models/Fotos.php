<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fotos extends Model
{
    use HasFactory;

    protected $fillable = ['Nombre','Genero','Descripcion, img'];  //Campos modificables con el método fill

    public function user(){
        return $this->belongsTo(User::class);
    }
    
}
