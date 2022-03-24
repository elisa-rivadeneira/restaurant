@extends('adminlte::page')


@section('title', 'Menús')

@section('content_header')
<h1>Menus</h1>
@stop

@section("content")
<a href="/menus/create" class="btn btn-primary mb-4">CREAR</a>
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
                        <th>Estado</th>
                        <th>Costo</th>
                        <th>Insumos</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($menus as $key=>$value)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $value->nombre }}</td>
                            <td>@if($value->status =='0')
                                    <a class="btn btn-warning" id="changeStatus" data-id={{$value->id}} data-toggle="modal"  data-target="#ordenplatostatus{{$value->id}}">  INACTIVO</a>
                                @elseif( $value->status=='1')
                                    <a  class="btn btn-primary" data-id={{$value->id}} data-toggle="modal"  data-target="#ordenplatostatus{{$value->id}}">  ACTIVO</a>
                                @endif</td>
                            <td>{{ $value->costo }}</td>
                            <td>

                            <form action="{{route ('menus.destroy', $value->id) }}" method="POST">
                                @csrf
                                <a class="btn btn-info" id="VerInsumosMenu" data-id={{$value->id}} data-toggle="modal"  data-target="#VerInsumosMenu{{$value->id}}" >Ver Insumos</a>
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Borrar</button>
                            </form>

                            </td>
                        </tr>


                        <div class="modal fade" id="VerInsumosMenu{{ $value->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary" style="text-align:center;">
                                        <h5 class="modal-title" style="font-weight: bold;">INSUMOS [ {{ $value->nombre}}]  </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" >
                                        <div class="row" id="porcionesmenu{{ $value->id}}">
                                        </div>
                                        <div class="row" id="dataorden{{ $value->id}}">
                                        </div>

                                        <div class="row" id="menuorden{{ $value->id}}">
                                        </div>

                                        <div class="row" id="costoxporcion{{ $value->id}}">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                    </div>
                                </div>
                            </div>
                        </div>

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
                        @foreach($insumos as $item)
                            <tr>
                                <td>{{$item->nombre}}</td>
                                <td>{{$item->cantidad_c}}</td>
                                <td>{{$item->costo}}</td>
                                <td>{{$item->costo * $item->cantidad_c }}</td>
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
    <script src="{{ asset('js/menus.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#platos').DataTable({
                "lengthMenu":[[10,20,50,-1], [10,20,50,"All"]],
                "ordering": false

            });
        } );
    </script>
@stop
