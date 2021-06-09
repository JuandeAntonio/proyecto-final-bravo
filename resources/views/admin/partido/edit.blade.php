@inject('equipos', 'App\Http\Controllers\EquiposController')
@inject('ligas', 'App\Http\Controllers\LigasController')
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="text-center">EDITAR INFORMACIÓN DE UN PARTIDO</h1>
@stop

<!--AQUÍ ES DONDE SE MUESTRA EL COTENIDO DE LA PAGINA -->
@section('content')
    <form action="/admin/partidos/{{$partido->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group row ml-3 d-flex justify-content-around">
        <div class="col-3 mb-3">
            <label for="" class="form-label">Liga</label>
            <input type="text" disabled="disabled" class="form-control" id="liga" name="liga" value="{{($ligas->nombre_liga($partido->liga_id))[0]->nombre}}">
        </div>
        <div class="col-3 mb-3">
            <label for="" class="form-label">Jornada</label>
            <input type="text" disabled="disabled" class="form-control" id="jornada" name="jornada" value="{{$partido->jornada}}">
        </div>
        <div class="col-3 mb-3">
            <label for="" class="form-label">Fecha</label>
            <input type="date" class="form-control" id="fecha" name="fecha" value="{{$partido->fecha_partido}}">
        </div>
    </div>
    <div class="form-group row ml-3 d-flex justify-content-around">    
        <div class="col-3 mb-3">
            <label for="" class="form-label">Equipo Local</label>
            <input type="text" disabled="disabled" class="form-control" id="equipo_local" name="equipo_local" value="{{($equipos->nombre_equipo($partido->equipo_local_id))[0]->nombre}}">
        </div>
        <div class="col-3 mb-3">
            <label for="" class="form-label">Equipo Visitante</label>
            <input type="text" disabled="disabled" class="form-control" id="equipo_visitante" name="equipo_visitante" value="{{($equipos->nombre_equipo($partido->equipo_visitante_id))[0]->nombre}}">
        </div>
        <div class="col-3 mb-3">
            <label for="" class="form-label">Hora</label>
            <input type="time" class="form-control" id="hora" name="hora" value="{{$partido->hora_partido}}">
        </div>
    </div>
    <div class="form-group row ml-3 d-flex justify-content-around">
        <div class="col-3 mb-3">
            <label for="" class="form-label">Resultado Local</label>
            <input type="text" class="form-control" id="sets_equipo_local" name="sets_equipo_local" value="{{$partido->sets_equipo_local}}">
        </div>
        <div class="col-3 mb-3">
            <label for="" class="form-label">Resultado Visitante</label>
            <input type="text" class="form-control" id="sets_equipo_visitante" name="sets_equipo_visitante" value="{{$partido->sets_equipo_visitante}}">
        </div>
        <div class="col-3 mb-3">
            <label for="" class="form-label">Arbitro</label>
            <input type="text" class="form-control" id="arbitro" name="arbitro" value="{{$partido->arbitros_id}}">
        </div>
    </div>    
        <a href="/admin/partidos" class="btn btn-secondary" tabindex="4">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="3">Guardar</button>
    </form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

@stop