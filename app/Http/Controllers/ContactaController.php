<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactaMail;
use Illuminate\Support\Facades\Mail;

class ContactaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        
        return view('contacto.index');
    }

    public function store(Request $request)
    { //dd($request);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mensaje'=>'required',
        ]);
        $correo=new ContactaMail($request->all());
        Mail::to('davidgf22@educastur.es')->send($correo);
        return redirect(route('contacto.index'))->with('success','Email Enviado');
    }

}
