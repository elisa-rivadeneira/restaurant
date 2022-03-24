@extends('adminlte::page')

@section('title', 'Proveedores')

@section('content_header')
    <h1>PROVEEDORES</h1>
@stop

@section('content')
    <H2>CREAR PROVEEDOR</H2>

    <form action="/proveedores" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Nombre </label>
            <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1">
        </div>

        <a href="/proveedores" class="btn btn-secondary" tabindex="5"> Cancelar </a>
        <button type="submit" class="btn btn-primary" tabindex="4"> Guardar </button>
    </form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

