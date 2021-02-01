@extends('layouts.app')

@section('botones')

    <a href="{{ route('recetas.create') }}" class="btn btn-outline-primary">Crear Receta</a>


@endsection

@section('content')

{{-- {{$recetas  }}--}}
    <h2 class="text-center mb-5">Administra tus recetas</h2>

    <div class="col-md-10 mx-auto bg-white p-3">
        <table class="table">
            <thead class="bg-primary text-light">
            <tr>
                <th scole="col">Titulo</th>
                <th scole="col">Categoría</th>
                <th scole="col">Acciones</th>
            </tr>
            </thead>

            <tbody>

            @foreach ($recetas as $receta)
                <tr>
                    <td> {{$receta->titulo}} </td>
                    <td> {{$receta->categoria->nombre}} </td>
                    <td>
                        <a href="" class="btn btn-danger d-block mb-2">Eliminar</a>
                        <a href="{{ route('recetas.edit', ['receta' => $receta->id]) }}" class="btn btn-dark d-block mb-2">Editar</a>
                        <a href="{{ route('recetas.show', ['receta' => $receta->id]) }} " class="btn btn-success d-block">Ver</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>


@endsection

