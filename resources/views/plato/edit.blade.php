@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <H2>EDITAR PLATO</H2>

    <form action="/platos/{{$plato->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Descripción </label>
            <input id="descripcion" name="descripcion" type="text" class="form-control" tabindex="1" value="{{$plato->descripcion}}">
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Precio </label>
            <input id="precio" name="precio" type="text" class="form-control" value="{{$plato->precio}}" tabindex="2">
        </div>

        <a href="/platos" class="btn btn-secondary" tabindex="5"> Cancelar </a>
        <button type="submit" class="btn btn-primary" tabindex="4"> Guardar </button>
    </form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

