@inject('equipo', 'App\Http\Controllers\EquiposController')
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="text-center">ASIGNACIONES</h1>
@stop

<!--AQUÍ ES DONDE SE MUESTRA EL COTENIDO DE LA PAGINA -->
@section('content')

@foreach($asignaciones as $asignacion)
        <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Local</th>
                            <th scope="col">Sets</th>
                            <th scope="col">Sets</th>
                            <th scope="col">Visitante</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Hora</th>
                            <th scope="col">Opcion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{($equipo->nombre_equipo($asignacion->equipo_local_id))[0]->nombre}}</td>
                                <td>{{$asignacion->sets_equipo_local}}</td>
                                <td>{{$asignacion->sets_equipo_visitante}}</td>
                                <td>{{($equipo->nombre_equipo($asignacion->equipo_visitante_id))[0]->nombre}}</td>
                                <td>{{$asignacion->fecha_partido}}</td>
                                <td>{{$asignacion->hora_partido}}</td>
                                <td>
                                    <a href="asignaciones/{{$asignacion->id}}/edit" class="btn btn-info">Arbitrar</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
    @endforeach
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
@stop