<?php

namespace App\Http\Controllers;

use App\Perfil;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except'=>'show']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function show(Perfil $perfil)
    {
        return view('perfiles.show', compact('perfil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit(Perfil $perfil)
    {
        // Ejecutar el Policy
        $this->authorize('view', $perfil);

        return view('perfiles.edit', compact('perfil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perfil $perfil)
    {

        // Ejecutar el Policy
        $this->authorize('update', $perfil);

        // Validar lo que viene del formulario de perfiles.edit.blade
        $data = request()->validate([
            'nombre' => 'required',
            'url' => 'required',
            'biografia' => 'required'
        ]);

        // Si el usuario sube una imagen
        if( $request['imagen'] ) {
            // obtener la ruta de la imagen
            $ruta_imagen = $request['imagen']->store('upload-perfiles', 'public');

            // Resize de la imagen
            $img = Image::make( public_path("storage/{$ruta_imagen}"))->fit(600, 600 );
            $img->save();

            // Crear un arreglo de imagen
            $array_imagen = ['imagen' => $ruta_imagen];
        }

        // Asignar nombre y URL
        auth()->user()->url = $data['url'];
        auth()->user()->name = $data['nombre'];
        auth()->user()->save();

        // Eliminar url y name de $data, para poder guardar datos en perfiles
        // porque en perfiles no existe esos dos campos
        unset($data['url']);
        unset($data['nombre']);


        // Guardar información
        // Asignar Biografia e imagen
        auth()->user()->perfil()->update( array_merge( //une dos array, en este caso, $data y $array_imagen
            $data,
            $array_imagen ?? [] //si no existe array_imagen, entonces ponle un array vacio
        ) );


        // redireccionar
        return redirect()->action('RecetaController@index');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perfil $perfil)
    {
        //
    }
}
