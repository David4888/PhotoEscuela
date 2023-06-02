<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fotos;
use App\Models\Categoria;

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
    public function index(Request $request){

        $user = $request->user();
        $fotos = Fotos::with('categoria')
            ->where('user_id', $user->id)->get(); //Mostramos las fotos según el id del usuario para que solo muestre las del usuario logueado

        return view('fotos.lista_fotos', compact('fotos'));
    }


    public function carrusel(){

        $fotos = Fotos::all();

        return view('fotos.carrusel', compact('fotos'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('fotos.crear_foto', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $foto = new Fotos(); //Creamos la nueva película
        $this->validate($request, [ //Validamos los campos
            'Nombre' => 'required|unique:fotos,Nombre',
            'Descripcion' => 'required',
            'id_categoria' => 'required'
        ]);
        $foto->user_id = $request->user()->id; //Asignamos la foto al id del usuario logueado para que la suba
        $foto->fill($request->only("Nombre", 'Descripcion', 'id_categoria'))->save();
        $request->Imagen->move(public_path('images/fotos'), $foto->id.'.jpg'); //asignamos id de la foto
        return redirect('/fotos')->with("success", __("Foto creada!"));
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
        $categorias = Categoria::all();
        return view('fotos.modificar_fotos', compact('foto', 'categorias'));
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
            'Descripcion' => 'required',
            'id_categoria' => 'required'
        ]);
        if ($request->has('Imagen')) {
            $request->Imagen->move(public_path('images/fotos'), $id.'.jpg');
        }
        $foto->fill($request->only("Nombre", 'Descripcion', 'id_categoria'))->save();
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
