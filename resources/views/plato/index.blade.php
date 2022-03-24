@extends('adminlte::page')


@section('title', 'Platos')

@section('content_header')
    <h1>Platos con sus Insumos</h1>
@stop

@section("content")
    <a href="/platos/create" class="btn btn-primary mb-4">CREAR</a>
    <div class="row">
        <div class="col">
            @if (session('status'))
                @if(session('status') == '1')
                    <div class="alert alert-success">
                        Se guardó
                    </div>
                @else
                    <div class="alert alert-danger">
                        {{ session('status') }}
                    </div>
                @endif
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table id="platos" class="table">
                <thead  class="bg-primary text-white">
                <tr>
                    <th> # </th>
                    <th>Nombre</th>
                    <th>Categoria</th>
                    <th>Porciones</th>
                    <th>Costo</th>
                    <th>Precio</th>
                    <th>Insumos</th>
                </tr>
                </thead>
                <tbody>
                @foreach($platos as $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->nombre }}</td>
                        <td>{{ $value->categoria }}</td>
                        <td>{{ $value->porciones }}</td>
                        <td>{{ $value->costo }}</td>
                        <td>{{ $value->precio }}</td>
                        <td>

                            <form action="{{route ('platos.destroy', $value->id) }}" method="POST">
                                @csrf
                                <a href="/plato/listar?id={{$value->id}}" class="btn btn-info"> Costos </a>
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Borrar</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @if(count($insumos) > 0)
        <div class="row">
            <div class="col">
                <table id="platos" class="table">

                    <thead>
                    <tr>
                        <th colspan="4" class="text-center">Insumos</th>
                    </tr>

                    <tr>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Costo</th>
                        <th>Subtotal</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($insumos as $value)
                        <tr>
                            <td>{{$value->nombre}}</td>
                            <td>{{$value->cantidad_c}}</td>
                            <td>{{$value->costo}}</td>
                            <td>{{$value->costo * $value->cantidad_c }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

@endsection

@section('css')
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">

@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#platos').DataTable({
                "lengthMenu":[[5,10,20,50,-1], [5,10,20,50,"All"]]
            });
        } );
    </script>
@stop
