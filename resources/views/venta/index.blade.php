@extends('adminlte::page')


@section('title', 'LARAJET: Ordenes')

@section('content_header')
    <h1>RESUMEN DE VENTAS</h1>
@stop

@section('content')



    <table id="ordenes" class="display responsive nowrap table table-striped mt-4 shadow-lg " style="width:100%" >
        <thead class="bg-primary text-white">
        <th scope="col" style="width:5%;">Item</th>
        <th scope="col" style="width:5%;">CodOrden</th>
        <th scope="col" style="width:5%;">Día</th>
        <th scope="col" style="width:20%;">SubTotal</th>
        <th scope="col" style="width:20%;">Tiempo de Mesa</th>
        <th scope="col" style="width:20%;">Acciones</th>


        </thead>

        <tbody>
        @php
            $num='1';
            @endphp

        @foreach ($items as $item)
            @if($item->status==2)

            <tr>
                <td>{{ $num }}</td>
                <td>{{ $item->id }}</td>
                <td> {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y')}} </td>
                <td> {{ $item->total}} </td>
                <td class="time">
                    @if(isset( $item->tiempo_cobro))
                        {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->tiempo_cobro)->diffInMinutes($item->created_at)}} min
                    @else
                        {{ $hoy->diffInMinutes($item->created_at)}} min
                    @endif
                </td>
                <td>   <!-- Button trigger modal -->
                    <form action="{{route ('ordens.destroy', $item->id) }}" method="POST" class="formelimi">
                        <div class="row" >
                                       <div  >
                                           <!-- Button trigger modal -->
                           <button class="btn btn-primary" type="button" id="verVenta" data-id={{$item->id}}  data-toggle="modal" data-target="#verventa{{$item->id}}">
                                             VER DETALLE
                                           </button>

                                  @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger ">Borrar</button></div>
                        </div>
                    </form>
                </td>
            </tr>



            <!-- Modal -->
            <div class="modal fade" id="verventa{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title" style="font-weight: bold;">VER VENTA {{ $item->id}} - MESA {{ $item->mesa}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" >

                            <div class="row" id="datamenusventa{{ $item->id}}">
                            </div>

                            <div class="row" id="dataentradasventa{{ $item->id}}">
                            </div>

                            <div class="row" id="ventatotal{{ $item->id}}">
                            </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="javascript:window.location.reload()">CERRAR</button>
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

            @endif
            @php
            $num++;
                @endphp
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
                "lengthMenu":[[10,20,50,-1], [10,20,50,"All"]]
            });




        } );




    </script>




@stop

