@extends('adminlte::page')


@section('title', 'Compras')

@section('content_header')
    <h1>COMPRAS</h1>
@stop



@section('content')


    <a href="/compras/create" class="btn btn-primary mb-4" >REGISTRAR UNA COMPRA DE INSUMOS</a>


    <table id="ordenes" class="display responsive nowrap table table-striped mt-4 shadow-lg " style="width:100%" >
        <thead class="bg-primary text-white">
        <th scope="col" style="width:5%;">ID</th>
        <th scope="col" style="width:20%;">Proveedor</th>
        <th scope="col" style="width:20%;">Fecha</th>
        <th scope="col" style="width:20%;">Monto de Compra</th>
        <th scope="col" style="width:20%;">Medio de Pago</th>
        <th scope="col" style="width:20%;">Acciones</th>


        </thead>

        <tbody>

        @foreach ($items as $key => $item)


            <tr>
                <td>{{ $item->id}}</td>
                <td> {{ $item->proveedor}}</td>
                <td>{{ $item->dia_compra}}        </td>
                <td> S/. {{ $item->total}} </td>
                <td>{{ $item->metododepago}}        </td>
                <td>   <!-- Button trigger modal -->
                    <form action="{{route ('compras.destroy', $item->id) }}" method="POST" class="formelimi">
                        <div class="row" >
                                       <div  >
                            <a class="btn btn-info" id="mirarCompra" data-id={{$item->id}} data-toggle="modal"  data-target="#compra{{$item->id}}" >Ver</a>
                                           <!-- Button trigger modal -->


                                  @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger ">Borrar</button></div>
                        </div>
                    </form>
                </td>
            </tr>

            <div class="modal fade" id="compra{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary" style="text-align:center;">
                            <h5 class="modal-title" style="font-weight: bold;"> {{ $item->proveedor}} [ {{ $item->dia_compra}}]  </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" >

                                <div class="row" id="dataorden{{ $item->id}}">
                                </div>

                                <div class="row" id="menuorden{{ $item->id}}">
                                </div>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade sipicerrar" id="ordenplatocobrar{{ $item->id }}" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title" id="exampleModalLabel">MONTO A CANCELAR</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" >

                            <div class="row" id="platoordencobrar{{ $item->id}}">
                            </div>

                            <div class="row" id="menuordencobrar{{ $item->id}}">
                            </div>

                            <div class="row" id="cobrarorden{{ $item->id}}">
                            </div>


                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="javascript:window.location.reload()"
                            >CERRAR</button>
                            <a href="/orden/{{ $item->id}}/cobrar" target="_parent"> <button type="button" class="btn btn-primary">COBRAR</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Cambiar Estado-->
            <div class="modal fade" id="ordenplatostatus{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">CAMBIAR ESTADO</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" >
                            <div class="row center-block"  style="width: 100%;">
                                <div class="col-md-12"><a href="/orden/{{$item->id}}/status0" class="btn btn-warning btn-block m-1" id="changeStatus" data-id={{$item->id}} >  PENDIENTE</a> </div>
                                <div class="col-md-12"> <a href="/orden/{{$item->id}}/status1" class="btn btn-primary btn-block m-1" id="changeStatus" data-id={{$item->id}}>  SERVIDO</a></div>

                            </div>
                            <div class="row" id="dataordencobrar{{ $item->id}}">
                            </div>





                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                            <button type="button" class="btn btn-primary">COBRAR</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Crear Orden-->
            <div class="modal fade" id="eligecrear" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ELEGIR</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" >
                            <div class="row center-block"  style="width: 100%;">
                                <div class="col-md-12"><a href="/orden/crear-menu" class="btn btn-success btn-block m-1" id="changeStatus" data-id={{$item->id}} >  MENU </a> </div>
                                <div class="col-md-12"> <a href="/orden/create" class="btn btn-primary btn-block m-1" id="changeStatus" data-id={{$item->id}}>  A LA CARTA</a></div>

                            </div>
                            <div class="row" id="dataordencobrar{{ $item->id}}">
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                            <button type="button" class="btn btn-primary">COBRAR</button>
                        </div>
                    </div>
                </div>
            </div>




        @endforeach
        </tbody>
    </table>


@stop

@section('css')
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css" rel="stylesheet">

    <style>
        body{
            text-transform: uppercase;

        }
    </style>


@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('js/ajax.js') }}"></script>

    @if(session('eliminar')=='ok')
        <script>
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
        </script>

    @endif

    <script>
        $('.formelimi').submit(function(e){
            e.preventDefault();
            Swal.fire({
                title: 'Estás seguro?',
                text: "No podrás deshacer ésta acción!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, bórralo!'
            }).then((result) => {
                if (result.isConfirmed) {
                    /* Swal.fire(
                         'Borrado!',
                         'Tu registro ha sido borrado',
                         'success'
                     )*/

                    this.submit();
                }
            })
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#ordenes').DataTable({
                responsive: true,
                "lengthMenu":[[5,10,20,50,-1], [5,10,20,50,"All"]]
            });




        } );
    </script>
@stop

