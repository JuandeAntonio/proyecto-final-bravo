@inject('partido', 'App\Http\Controllers\PartidosController')
use \App\Http\Controllers\PartidosController;
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="text-center">LIGAS DE VOLEIBOL</h1>
@stop

<!--AQUÍ ES DONDE SE MUESTRA EL COTENIDO DE LA PAGINA -->
@section('content')
    
    <a href="ligas/create" class="btn btn-warning">CREAR NUEVA LIGA</a>
    <table class="table table-light table-striped text-center mt-4">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Categoria</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ligas as $liga)
                <tr>
                    <td>{{$liga->id}}</td>
                    <td>{{$liga->nombre}}</td>
                    <td>{{$liga->categoria}}</td>
                    <td>
                        <a href="ligas/{{$liga->id}}/edit" class="btn btn-info">Editar</a>
                        <button class="btn btn-danger">Borrar</button>
                        <button class="btn btn-success" onclick="generar_partidos()">Crear Partidos</button>
                    </td>
                </tr>
            @endforeach
        </tbody>    
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script>
        function generar_partidos(){
            alert('Hello');
        }
    </script>
@stop