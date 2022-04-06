@extends('adminlte::page')


@section('title', 'LARAJET: Ordenes Cocina')

@section('content_header')
    <h1>ORDENES COCINA</h1>
@stop



@section('content')


    <table id="ordenes" class="display responsive nowrap table table-striped mt-4 shadow-lg " style="width:100%" >
        <thead class="bg-primary text-white">
        <th scope="col" style="width:5%;">Mesa</th>
        <th scope="col" style="width:35%;">Nombre</th>
        <th scope="col" style="width:5%;" >Cantidad</th>
        <th scope="col" style="width:25%;">Tiempo Preparación</th>
        <th scope="col" style="width:20%;">Despacho</th>



        </thead>

        <tbody>

        @foreach ($menus as $key=>$menu)

            <tr >
                <td >{{ $menu->mesa}}</td>
                <td>{{ $menu->nombre}}</td>
                <td ><span >{{ $menu->cantidad}}</span></td>
                <td class="time" >
                    @if(isset( $menu->t_preparacion))
                        {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $menu->t_preparacion)->diffInMinutes($menu->tiempo_solicitud)}} min
                    @else
                        {{ $hoy->diffInMinutes($menu->tiempo_solicitud)}} min
                    @endif
                </td>

                <td >@if($menu->estado =='0')
                        <a class="btn btn-warning" id="changeStatus" data-id={{$menu->idordenmenu}} data-toggle="modal"  data-target="#ordenplatostatus{{$menu->idordenmenu}}">  PENDIENTE</a>
                    @elseif( $menu->estado=='1')
                        <a  class="btn btn-primary" data-id={{$menu->idordenmenu}} data-toggle="modal"  data-target="#ordenplatostatus{{$menu->idordenmenu}}"> PREPARADO</a>
                    @endif
                </td>

            </tr>

            <div class="modal fade" id="ordenplatostatus{{ $menu->idordenmenu }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <div class="col-md-12"><a href="/cocina/{{$menu->idordenmenu}}/status0" class="btn btn-warning btn-block m-1" id="changeStatus" data-id={{$menu->idordenmenu}} >  PENDIENTE</a> </div>
                                <div class="col-md-12"> <a href="/cocina/{{$menu->idordenmenu}}/status1" class="btn btn-primary btn-block m-1" id="changeStatus" data-id={{$menu->idordenmenu}}>  PREPARADO</a></div>

                            </div>






                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                        </div>
                    </div>
                </div>
            </div>



        @endforeach

        @foreach ($entradas as $key=>$entrada)

            <tr>
                <td >{{ $entrada->mesa}}</td>
                <td>{{ $entrada->nombre}}</td>
                <td>{{ $entrada->cantidad}}</td>

                <td class="time">
                    @if(isset( $entrada->t_preparacion))
                        {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $entrada->t_preparacion)->diffInMinutes($entrada->tiempo_solicitud)}} min
                    @else
                        {{ $hoy->diffInMinutes($entrada->tiempo_solicitud)}} min
                    @endif
                </td>

                <td>@if($entrada->estado =='0')
                        <a class="btn btn-warning" id="changeStatus" data-id={{$entrada->idordenentrada}} data-toggle="modal"  data-target="#ordenentradastatus{{$entrada->idordenentrada}}">  PENDIENTE</a>
                    @elseif( $entrada->estado=='1')
                        <a  class="btn btn-primary" data-id={{$entrada->idordenentrada}} data-toggle="modal"  data-target="#ordenentradastatus{{$entrada->idordenentrada}}"> PREPARADO</a>
                    @endif
                </td>

            </tr>

            <div class="modal fade" id="ordenplatostatus{{ $menu->idordenmenu }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <div class="col-md-12"><a href="/cocina/{{$menu->idordenmenu}}/status0" class="btn btn-warning btn-block m-1" id="changeStatus" data-id={{$menu->idordenmenu}} >  PENDIENTE</a> </div>
                                <div class="col-md-12"> <a href="/cocina/{{$menu->idordenmenu}}/status1" class="btn btn-primary btn-block m-1" id="changeStatus" data-id={{$menu->idordenmenu}}>  PREPARADO</a></div>

                            </div>






                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                        </div>
                    </div>
                </div>
            </div>



            <div class="modal fade" id="ordenentradastatus{{ $entrada->idordenentrada }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">CAMBIARR ESTADO</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" >
                            <div class="row center-block"  style="width: 100%;">
                                <div class="col-md-12"><a href="/cocina/{{$entrada->idordenentrada}}/statuse0" class="btn btn-warning btn-block m-1" id="changeStatus" data-id={{$entrada->idordenentrada}} >  PENDIENTE</a> </div>
                                <div class="col-md-12"> <a href="/cocina/{{$entrada->idordenentrada}}/statuse1" class="btn btn-primary btn-block m-1" id="changeStatus" data-id={{$entrada->idordenentrada}}>  PREPARADO</a></div>

                            </div>






                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
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
            /*   text-transform: uppercase; */

        }

        .time{
            text-transform:lowercase;
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
                "lengthMenu":[[20,50,-1], [20,50,"All"]]
            });




        } );
    </script>
@stop

