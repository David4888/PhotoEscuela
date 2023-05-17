<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fotos;
//use Illuminate\Support\Facades\Auth;

class FotosController extends Controller
{

    public function __construct(){  //Para comprobar que el usuario esté autentificado
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $fotos = Fotos::all();
        //dd($fotos);

        return view('fotos.lista_fotos', compact('fotos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $foto = Fotos::find($id);
        return view('fotos.modificar_fotos', compact('foto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {   //dd($request);
        $foto = Fotos::find($id); //Coger la id de la request, la foto de la base de datos
        $this->validate($request, [
            'Nombre' => 'required|unique:fotos,Nombre,' . $foto->id,
            'Genero' => 'required',
            'Descripcion' => 'required',
            
            
        ]);
        $request->Imagen->move(public_path('images/fotos'), $id.'.jpg');
        $foto->fill($request->only("Nombre", 'Genero', 'Descripcion'))->save();
        return redirect('/fotos')->with("success", __("Foto actualizada!"));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) 
    {
       
    }
}
