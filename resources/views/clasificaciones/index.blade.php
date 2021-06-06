
@inject('equipos', 'App\Http\Controllers\EquiposController')
@extends('layouts.plantilla_inicio')

@section('tablaClasificacion')
    <h1>ESTA ES LA CLASIFICACIÓN DE </h1>
    <table class="table table-light table-striped mt-4">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Partidos Ganados</th>
                <th scope="col" class="text-center">Pardidos Perdidos</th>
                <th scope="col">Sets Ganados</th>
                <th scope="col">Sets Perdidos</th>
                <th scope="col">ID Equipo</th>
                <th scope="col">Puntos</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($estadisticas as $estadistica)
                <tr>
                    <td>{{($equipos->nombre_equipo($estadistica->equipo_id))[0]->nombre}}</td>
                    <td>{{$estadistica->partidos_ganados}}</td>
                    <td>{{$estadistica->partidos_perdidos}}</td>
                    <td>{{$estadistica->sets_ganados}}</td>
                    <td>{{$estadistica->sets_perdidos}}</td>
                    <td>{{$estadistica->equipo_id}}</td>
                    <td>{{$estadistica->puntos}}</td>
                </tr>
            @endforeach
        </tbody>    
    </table>

@endsection