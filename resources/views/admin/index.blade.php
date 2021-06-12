<!--PLANTILLAS DE ADMIN. DE AQUÍ VAN A HEREDAR TODAS LAS VISTAS DE ADMIN -->
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="text-center">GESTIÓN DE LIGAS DE VOLEIBOL</h1>
@stop

<!--AQUÍ ES DONDE SE MUESTRA EL COTENIDO DE LA PAGINA -->
@section('content')
    <h1 class="text-center mt-5"> BIENVENIDO </br> {{Auth::user()->name}}</h1>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
        #men{
            font-size: 10em;
            text-align: center;
        }
    </style>
@stop

@section('js')
@stop
