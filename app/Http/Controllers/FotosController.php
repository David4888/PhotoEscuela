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
        if ($request->has('id_categoria') && $request->query('id_categoria') != -1) { //Si en el request hay id_categoria  o tiene valor distinto de -1
                $id_categoria = $request->query('id_categoria'); //realiza filtrado por id categoría
                $fotos = Fotos::with('categoria') //Si no, las coge todas las imágenes
                ->where('user_id', $user->id) //Mostramos las fotos según el id del usuario para que solo muestre las del usuario logueado
                ->where('id_categoria', $request->query('id_categoria')) //filtramos por id_categoria
                ->get(); 
        }
        else {
            $id_categoria = -1;
            $fotos = Fotos::with('categoria')
                ->where('user_id', $user->id)->get(); //Mostramos las fotos según el id del usuario para que solo muestre las del usuario logueado
        }
        $categorias = Categoria::all();

        return view('fotos.lista_fotos', compact('fotos', 'categorias', 'id_categoria')); //le pasamos las variables a las que tiene que acceder el compact para la vista
    }


    public function carrusel(Request $request){

        if ($request->has('id_categoria') && $request->query('id_categoria') != -1) { //Si en el request hay id_categoria  o tiene valor -1
            $id_categoria = $request->query('id_categoria'); //Obtenemos el id y lo guardamos en la variable
            $fotos = Fotos::with('categoria') //Obtenemos las fotos con la información de la categoría
                ->where('id_categoria', $request->query('id_categoria')) //filtramos por id_categoria
                ->get(); 
        }
        else {
            $id_categoria = -1; 
            $fotos = Fotos::all(); //cargamos todas las fotos
        }
        $categorias = Categoria::all();

        return view('fotos.carrusel', compact('fotos', 'categorias', 'id_categoria'));
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
            'id_categoria' => 'required',
            'Imagen'=>'required'
        ]);
        $foto->user_id = $request->user()->id; //Asignamos la foto al id del usuario logueado para que la suba
        $foto->fill($request->only("Nombre", 'Descripcion', 'id_categoria'))->save(); //rellenamos los campos de la foto para actualizar la base de datos
        $request->Imagen->move(public_path('images/fotos'), $foto->id.'.jpg'); //Movemos la imagen ala ruta y asignamos el nombre con el id de la foto
        return redirect('/fotos')->with("success", __("Foto creada!"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $user_id = $request->user()->id; //Asignamos la foto al id del usuario logueado para que la suba
        $foto = Fotos::find($id); //Buscamos una foto por id
        if ($foto->user_id != $user_id) abort(403); //Si la foto pertenece a un usuario distinto al logueado generamos un error de acceso no autorizado

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
        $user_id = $request->user()->id; //Asignamos la foto al id del usuario logueado para que la suba
        if ($foto->user_id != $user_id) abort(403); //Si la foto pertenece a un usuario distinto al logueado generamos un error de acceso no autorizado

        $this->validate($request, [ // validamos los campos de la base de datos
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
        $foto=Fotos::find($id); //Mostramos la foto por la id
        $foto->delete(); //Borramos la foto
        return back()->with("warning", __("!Foto eliminada!"));
    }
}
