@extends('adminlte::page')

@section('title', 'Editar Proveedor')

@section('content_header')
    <h1>Editar Proveedor</h1>
@stop

@section('content')
    <H2>EDITAR PROVEEDOR</H2>

    <form action="/proveedores/{{$proveedor->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Descripción </label>
            <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1" value="{{$proveedor->nombre}}">
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

