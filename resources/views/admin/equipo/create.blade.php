@inject('ligas', 'App\Http\Controllers\LigasController')
<?php
    $todasligas = $ligas->nombres_liga();
?>
<!--ESTA ES LA LLAMADA DEL ADMINLTE PARA QUE LA VISTA DEL ADMINISTRADOR, SIEMPRE TENGA ESTA PLANTILLA  -->
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="text-center">CREAR UN NUEVO EQUIPO</h1>
@stop

<!--AQUÍ ES DONDE SE MUESTRA EL COTENIDO DE LA PAGINA -->
@section('content')
    <form action="/admin/equipos" method="POST">
    @csrf
        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Santa Maria del Pilar">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Calle Doctor Esquerdo">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Telefono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="676771423">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Nombre de la Liga</label>
            <select name="liga_id" id="liga_id" class="form-control">
                @foreach ($todasligas as $liga)
                <option value="{{$liga->id}}">{{$liga->nombre}}</option>
                @endforeach
            </select>
        </div>
        <a href="/admin/equipos" class="btn btn-secondary" tabindex="5">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
    </form>

@stop
<!--LLAMADA DE LOS CSS -->
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
@stop
<!--LLAMADA DE LOS JS -->
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

@stop