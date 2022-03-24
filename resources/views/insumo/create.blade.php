@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <H2>CREAR INSUMO</H2>

    <form action="/insumos" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Nombre </label>
            <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1">
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Costo </label>
            <input id="costo" name="costo" type="text" class="form-control" tabindex="2">
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Unidad</label>
            <input id="unidad" name="unidad" type="text" class="form-control" tabindex="2">
        </div>

        <a href="/insumos" class="btn btn-secondary" tabindex="5"> Cancelar </a>
        <button type="submit" class="btn btn-primary" tabindex="4"> Guardar </button>
    </form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

