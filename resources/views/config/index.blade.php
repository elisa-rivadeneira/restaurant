@extends('adminlte::page')


@section('title', 'Configuración del Día')
@section('css')
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">



@endsection

@section('content_header')
    <section class="content p-3">
       <div class="card ">
                <div class="card-header text-center">
                  <b> CONFIGURACIÓN DEL DÍA</b>
                    <div class="card-tools  ">
                        <button class="btn small">
                            @can('config.create')
                                <a href="/config/edit/{{$last_config_id}}" class=" btn btn-primary small" >EDITAR DÍA</a>
                            @endcan
                        </button>
                    </div>
                </div>

                <div class="card-body small p-2"> Menús del Día:<b> {{$fecha}} </b> <div class="col-xs-12">Precio del Menú: S/.  {{number_format($preciomenu, 2)}}</div>
            </div>




    <form action="/config/guardar" method="post" class="grabado">
    @csrf

        <!-- Main content -->



            <div class="row">

                    <!-- /.card -->
                <div class="col-md-6">
                    <div class="card ml-2 mr-2">
                        <div class="card-header bg-orangetitle">
                            <h3 class="card-title fontsmall"><B>PLATOS DE FONDO</B></h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                          <table id="tblMenus" class="table display responsive nowrap table table-striped mt-4 shadow-lg">
                                <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Porciones</th>
                                </tr>
                                </thead>
                                <tbody>

                                @if($configmenus!='')


                                    @foreach($configmenus as $menu)
                                    <tr id="tr-{{$menu->id}}">

                                        <td>  {{$menu->nombre}}</td>
                                        <td >{{$menu->porciones}}</td>

                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                    <!-- /.card -->
                <div class="col-md-6">
                    <div class="card mr-2 ml-2">
                        <div class="card-header bg-titlegeranio">
                            <h3 class="card-title text-white fontsmall"><B>ENTRADAS</B></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                         <table id="tblEntradas" class="table display responsive nowrap table table-striped mt-4 shadow-lg">
                                <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Porciones</th>
                                </tr>
                                </thead>
                                <tbody>

                                @if($configentradas!='')
                               @foreach($configentradas as $entrada)
                                    <tr id="tr-{{$entrada->id}}">
                                        <td>  {{$entrada->nombre}}</td>
                                        <td >{{$entrada->porciones}}</td>

                                    </tr>
                                @endforeach
                                    @endif


                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
        </div>



        <!-- /.content -->


</form>

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

    <script src="{{ asset('../js/functionsconfig.js')}}"></script>




@stop


