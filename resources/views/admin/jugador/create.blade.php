@inject('equipos', 'App\Http\Controllers\EquiposController')
<?php
    $todosequipos = $equipos->todos_equipos();
?>
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="text-center">CREAR UN NUEVO JUGADOR</h1>
@stop

<!--AQUÍ ES DONDE SE MUESTRA EL COTENIDO DE LA PAGINA -->
@section('content')
    <form action="/admin/jugadors" method="POST">
    @csrf
        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Michael">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Apellidos</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Jordan">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Dorsal</label>
            <input type="text" class="form-control" id="dorsal" name="dorsal" placeholder="23">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Nombre del Equipo</label>
            <select name="equipo_id" id="equipo_id" class="form-control">
                @foreach ($todosequipos as $equipo)
                <option value="{{$equipo->id}}">{{$equipo->nombre}}</option>
                @endforeach
            </select>
        </div>
        <a href="/admin/jugadors" class="btn btn-secondary" tabindex="5">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
    </form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

@stop