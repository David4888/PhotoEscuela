<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Fotos;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()  //La vista del administrador
    {
        return view ('admin.index');
    }

    public function list_users (){  //Listamos usuarios
        $users= User::all();

         return view ('admin.list-users',compact('users'));
    }

    public function list_fotos (){  //Listamos fotos
        $fotos= Fotos::all();

         return view ('admin.list-fotos',compact('fotos'));
    }
}
