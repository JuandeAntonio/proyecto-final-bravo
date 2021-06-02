@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Ligas de Voleibol</h1>
@stop

<!--AQUÍ ES DONDE SE MUESTRA EL COTENIDO DE LA PAGINA -->
@section('content')
    <a href="equipos/create" class="btn btn-success">CREAR</a>
    <table class="table table-light table-striped mt-4">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col" class="text-center">Dirección</th>
                <th scope="col">Telefono</th>
                <th scope="col">Liga</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($equipos as $equipo)
                <tr>
                    <td>{{$equipo->id}}</td>
                    <td>{{$equipo->nombre}}</td>
                    <td>{{$equipo->direccion}}</td>
                    <td>{{$equipo->telefono}}</td>
                    <td>{{$equipo->liga_id}}</td>
                    <td>
                        <a href="equipos/{{$equipo->id}}/edit" class="btn btn-info">Editar</a>
                        <button class="btn btn-danger">Borrar</button>
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

@stop