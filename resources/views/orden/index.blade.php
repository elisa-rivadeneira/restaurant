@extends('adminlte::page')


@section('title', 'LARAJET: Ordenes')

@section('content_header')
    <h1>ORDENES</h1>
@stop



@section('content')


    <a href="/ordens/create" class="btn btn-primary mb-4" >REALIZAR UNA ORDEN</a>


    <table id="ordenes" class="display fontsmallest responsive nowrap table table-striped table-condensed mt-4 shadow-lg " style="width:100%" >
        <thead class="bg-primary text-white">

        <th>Mesa</th>
        <th>Status</th>
        <th>Cant.</th>
        <th>Tiempo</th>
        <th>Total</th>
        <th>Acciones</th>


        </thead>

        <tbody>

        @foreach ($items as $item)
            @if($item->status!=2)

            <tr>

                <td>{{ $item->mesa}}</td>
                <td>@if($item->status =='0')
                        <a class="btn btn-warning" id="changeStatus" data-id={{$item->id}} data-toggle="modal"  data-target="#ordenplatostatus{{$item->id}}">  PENDIENTE</a>
                    @elseif( $item->status=='1')
                        <a  class="btn btn-primary" data-id={{$item->id}} data-toggle="modal"  data-target="#ordenplatostatus{{$item->id}}">  SERVIDO</a>
                    @endif
                 </td>
                <td> {{ $item->porciones}} </td>
                <td class="time">
                    @if(isset( $item->tiempo_despacho))
                        {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->tiempo_despacho)->diffInMinutes($item->created_at)}} min
                    @else
                        {{ $hoy->diffInMinutes($item->created_at)}} min
                    @endif
                </td>
                <td> {{ $item->total}} </td>
                <td>   <!-- Button trigger modal -->
                    <form action="{{route ('ordens.destroy', $item->id) }}" method="POST" class="formelimi">
                        <div class="row" >
                                       <div  >
                            <a class="btn btn-info" id="mirarOrden" data-id={{$item->id}} data-toggle="modal"  data-target="#orden{{$item->id}}" >Ver</a>
                                           <!-- Button trigger modal -->
                           <button class="btn btn-primary" type="button" id="cobrarOrden" data-id={{$item->id}}  data-toggle="modal" data-target="#cobrarorden{{$item->id}}">
                                              COBRAR
                                           </button>

                                  @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger ">Borrar</button></div>
                        </div>
                    </form>
                </td>
            </tr>

            <div class="modal fade" id="orden{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary" style="text-align:center;">
                            <h5 class="modal-title" style="font-weight: bold;">ORDEN {{ $item->id}} - MESA {{ $item->mesa}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" >

                                <div class="row" id="datamenus{{ $item->id}}">
                                </div>

                                <div class="row" id="dataentradas{{ $item->id}}">
                                </div>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="cobrarorden{{ $item->id }}" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary" style="text-align:center;">
                            <h5 class="modal-title" style="font-weight: bold;">COBRAR ORDEN {{ $item->id}} - MESA {{ $item->mesa}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" >

                            <div class="row" id="datamenuscobrar{{ $item->id}}">
                            </div>

                            <div class="row" id="dataentradascobrar{{ $item->id}}">
                            </div>

                            <div class="row" id="datacobrar{{ $item->id}}">
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



            @endif
        @endforeach
        </tbody>
    </table>


@stop

@section('css')
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css" rel="stylesheet">

    <style>
        body{
        /*    text-transform: uppercase; */

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
                "lengthMenu":[[10,20,50,-1], [10,20,50,"All"]],
                "autoWidth": false,
                "fixedHeader": {
                    "header": false,
                    "footer": false
                },
                "columnDefs": [
                    { "width": "10%", "targets": 0 },
                    { "width": "20%", "targets": 1 },
                    { "width": "20%", "targets": 2 },
                    { "width": "10%", "targets": 3 },
                    { "width": "10%", "targets": 4 },
                    { "width": "30%", "targets": 5 }
                ],


            });







        } );
    </script>
@stop

