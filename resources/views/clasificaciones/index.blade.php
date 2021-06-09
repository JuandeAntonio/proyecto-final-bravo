@inject('equipos', 'App\Http\Controllers\EquiposController')
@extends('layouts.plantilla_inicio')

@section('tablaClasificacion')
    <h1 class="text-center text-uppercase">CLASIFICACIÓN DE {{$nombreliga}}</h1>
    <table class="table table-light table-striped mt-4 text-center">
        <thead class="table-warning">
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

    @for ($i = 1; $i < 15; $i++)
        <table class="table table-light table-striped table-bordered mt-4 text-center">
            <h2 class="text-center">Jornada {{$i}} </h2>
            <thead class="table-info">
                <tr>
                    <th scope="col">Equipo Local</th>
                    <th scope="col">SetsLocal</th>
                    <th scope="col">SetsVisitante</th>
                    <th scope="col">Equipo Visitante</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora</th>
                </tr>
            </thead>    
            @for ($j = 0; $j < 4; $j++)
                <tbody>
                        <tr>
                            <td>{{($equipos->nombre_equipo($todaslasjornadas[$i][$j]->equipo_local_id))[0]->nombre}}</td>
                            <td>{{$todaslasjornadas[$i][$j]->sets_equipo_local}}</td>
                            <td>{{$todaslasjornadas[$i][$j]->sets_equipo_visitante}}</td>
                            <td>{{($equipos->nombre_equipo($todaslasjornadas[$i][$j]->equipo_visitante_id))[0]->nombre}}</td>
                            <td>{{$todaslasjornadas[$i][$j]->fecha_partido}}</td>
                            <td>{{$todaslasjornadas[$i][$j]->hora_partido}}</td>
                        </tr>
                </tbody> 
            @endfor
        </table>
    @endfor

@endsection