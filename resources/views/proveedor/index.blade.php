@extends('adminlte::page')


@section('title', 'Proveedores')

@section('content_header')
    <h1>PROVEEDORES</h1>
@stop

@section('content')


    <a href="proveedores/create" class="btn btn-primary mb-4">CREAR</a>

    <table id="insumos" class="table table-striped mt-4 shadow-lg" style="width:100%" ">
        <thead class="bg-primary text-white">
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scrop="col">Acciones</th>
            </thead>

        <tbody>
            @foreach ($proveedores as $proveedor)
            <tr>
                <td>{{ $proveedor->id}}</td>
                <td>{{ $proveedor->nombre}}</td>

                <td>
                    <form action="{{route ('insumos.destroy', $proveedor->id) }}" method="POST">
                    <a href="/proveedores/{{$proveedor->id}}/edit" class="btn btn-info"> Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('css')
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">

@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#insumos').DataTable({
                "lengthMenu":[[5,10,20,50,-1], [5,10,20,50,"All"]]
            });
        } );
    </script>
@stop

