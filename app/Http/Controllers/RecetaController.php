<?php

namespace App\Http\Controllers;

use App\CategoriaReceta;
use App\Receta;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RecetaController extends Controller
{

    // Contructor para proteger URL con el middleware
    // Con esta function constructor le decimos que solo accedan los usuarios autenticados, excepto el metodo show, que
    // quiero que sea publico, para que puedan ver usuario no autenticados
    public function __construct() {
        $this->middleware('auth', ['except' => 'show']);

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recetas = auth()->user()->recetas;

        return view('recetas.index', compact('recetas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //esto nos trae todos los campos, pero solo necesitamos id y nombre
//        DB::table('categoria_recetas')->get()->dd();

        // Sin modelo
        //$categorias = DB::table('categoria_recetas')->get()->pluck('id', 'nombre');

        // Con modelo
        $categorias = CategoriaReceta::all(['id','nombre']);

        return view('recetas.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validamos el formulario de Crear Receta
        $data = $request->validate([
            'titulo' => 'required|min:6',
            'preparacion' => 'required',
            'ingredientes' => 'required',
            'imagen' => 'required',
            'categoria' => 'required',
        ]);

        // Obtener la ruta de la imagen
        $ruta_imagen =  $request['imagen']->store('upload-recetas','public' );

        // Resize de la imagen
        $img = Image::make( public_path("storage/{$ruta_imagen}"))->fit(1000, 550);
        $img->save();


       /* $data = request();
        DB::table('recetas')->insert([
            'titulo'=>$data['titulo'],
            'preparacion'=>$data['preparacion'],
            'ingredientes'=>$data['ingredientes'],
            'imagen' => $ruta_imagen,
            'user_id'=> Auth::user()->id,
            'categoria_id' => $data['categoria'],
        ]);*/

        // almacenar en la BD (con modelo)
        auth()->user()->recetas()->create([
            'titulo' => $data['titulo'],
            'preparacion' => $data['preparacion'],
            'ingredientes' => $data['ingredientes'],
            'imagen' => $ruta_imagen,
            'categoria_id' => $data['categoria']
        ]);


        // Redirigimos al action
        return redirect()->action('RecetaController@index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function show(Receta $receta)
    {

        return view('recetas.show', compact('receta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function edit(Receta $receta)
    {
        $categorias = CategoriaReceta::all(['id','nombre']);

        return view('recetas.edit', compact('categorias','receta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {
        // Revisa el policy
        $this->authorize('update',$receta);

        // Validamos el formulario de Crear Receta
        $data = $request->validate([
            'titulo' => 'required|min:6',
            'preparacion' => 'required',
            'ingredientes' => 'required',
            'categoria' => 'required',
        ]);

        // Actualizamos la variable $receta, porque es quien tiene toda la informacion
        $receta->titulo = $data['titulo'];
        $receta->preparacion = $data['preparacion'];
        $receta->ingredientes = $data['ingredientes'];
        $receta->categoria_id = $data['categoria'];

        // ahora detectamos si el usuario a subido una nueva imagem
        if (request('imagen')) {
            // Obtener la ruta de la imagen
            $ruta_imagen =  $request['imagen']->store('upload-recetas','public' );

            // Resize de la imagen
            $img = Image::make( public_path("storage/{$ruta_imagen}"))->fit(1000, 550);
            $img->save();

        // agregamos al objeto
            $receta->imagen = $ruta_imagen;

        }



        $receta->save();


        // redireccionar para que la pantalla no se quede en blanco
        return redirect()->action('RecetaController@index');






    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta $receta)
    {
        //
    }
}
