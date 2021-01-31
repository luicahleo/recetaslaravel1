@extends('layouts.app')


@section('botones')

@endsection

@section('content')

    {{ $receta }}


    <article class="contenido-receta">
        <h1 class="text-center mb-4"> {{ $receta->titulo }}</h1>

        <div class="receta-meta">
            <p>
                <span class="font-weight-bold text-primary">Escrito en: </span>
                {{ $receta->categoria->nombre }}
            </p>

        </div>
    </article>




@endsection
