@extends('layouts.app')


@section('botones')

@endsection

@section('content')

    {{ $receta }}


    <article class="contenido-receta bg-white p-5 shadow">
        <h1 class="text-center mb-4">{{$receta->titulo}}</h1>

        <div class="imagen-receta">
            <img src="/storage/{{ $receta->imagen }}" class="w-100">
        </div>

        <div class="receta-meta mt-3">
            <p>
                <span class="font-weight-bold text-primary">Escrito en:</span>
                <a class="text-dark" href="">
                    {{ $receta->categoria->nombre }}
                </a>

            </p>

            <p>
                <span class="font-weight-bold text-primary">Autor:</span>
                <a class="text-dark" href="">
                    {{ $receta->user_id }}

                </a>

            </p>

            <p>
                <span class="font-weight-bold text-primary">Fecha:</span>
            </p>

            <div class="ingredientes">
                <h2 class="my-3 text-primary">Ingredientes</h2>

                {!! $receta->ingredientes !!}
            </div>

            <div class="preparacion">
                <h2 class="my-3 text-primary">Preparación</h2>

                {!! $receta->preparacion !!}
            </div>






        </div>
    </article>




@endsection
