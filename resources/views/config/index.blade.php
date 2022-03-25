@extends('adminlte::page')


@section('title', 'Configuración del Día')

@section('content_header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Configuración del Día</h1>



                </div>
                <div class="col-sm-6">
                    <div class="col-md-12" >
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Configuración del Día</li>
                    </ol>
                    </div>


                </div>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-md-12 col-lg-6">
            @can('admin.config.create')
                <a href="/config/create" class="col-md-12 col-lg-6 btn btn-primary mb-4" >CONFIGURAR NUEVO DÍA</a>
            @endcan
            </div>

            <div class="col-md-12 col-lg-6">
                @can('admin.config.create')
                    <a href="/config/edit/{{$last_config_id}}" class=" col-md-12 col-lg-6 btn btn-warning float-right" >EDITAR DÍA</a>
                @endcan
            </div>
        </div><!-- /.container-fluid -->
    </section>

@stop

@section('content')

    <form action="/config/guardar" method="post" class="grabado">
    @csrf






        <!-- Main content -->
        <section class="content">
        <!--    <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Platos a la Carta</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="preciomenu">Ingrese Plato a la Carta</label>
                                <div class="input-group">

                                        <div class="col-md-12 row">
                                            <div class="col-md-6">
                                                <label for="">CATEGORIA</label>
                                                <select name="categoria" id="categoria" class="form-control form-select"s >
                                                    <option selected="false" value="">Categoria</option>
                                                    @foreach($categorias as $categoria)
            <option value="{{ $categoria->id}}">{{ $categoria->nombre }}
                </option>
@endforeach
            </select>

        </div>

        <div class="col-md-6">

            <label for="">PLATO</label>
            <select name="plato" id="plato" class="form-control form-select" onchange="colocar_precio()" >
                <option selected="false" >Plato</option>
@foreach($platos as $plato)
            <option value="{{ $plato->id }}">{{ $plato->nombre }}</option>
                                                    @endforeach
            </select>
        </div>



    </div>

<div class="col-md-12 row">
   <div class="col-md-6">
        <div class="form-group">
            <label for="">Precio</label>
            <input id="precio" name="precio" type="text" class="form-control">
        </div>
    </div>
   <div class="col-md-6">
        <div class="w-100">
            <span>&nbsp;</span>
                                              <span class="btn btn-success col fileinput-button" onclick="agregar_plato()">
                                                <i class="fas fa-plus"></i>
                                                <span  >Añadir Plato</span>
                                              </span>
                                            </div>
                                       </div>

                                    </div>


                                </div>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody id="tblPlatos">

                                </tbody>
                            </table>
                        </div>

                    </div>

                        <!-- /.card-body -->


            <div class="row">
            <div class="col-md-12">

                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">DATOS DE CONFIGURACIÒN</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body row">

                        <div class="form-group col-md-6" >
                            <label class="mx-auto">DÍA CONFIGURADO</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <input name="dia" type="date" class="form-control w-100" value={{$configultimo}}>
                                </div>
                                <div class="invalid-feedback">
                                    Por favor ingrese el precio
                                </div>
                            </div>


                        </div>


                        <div class="form-group col-md-6 col-xs-12">
                            <label for="preciomenu">Precio del Menú  {{$configultimo}}</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend">S/.</span>
                                </div>
                                <input id="preciomenu" value="{{number_format($preciomenu, 2)}}" name="preciomenu" class="form-control" id="validationCustomUsername" placeholder="Ingrese el precio" aria-describedby="inputGroupPrepend" required>
                                <div class="invalid-feedback">
                                    Por favor ingrese el precio
                                </div>
                            </div>


                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

            <div class="col-md-12 row">

                    <!-- /.card -->
                    <div class="card card-info col-md-6">
                        <div class="card-header">
                            <h3 class="card-title">Menús del Día</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">



                            <table id="tblMenus" class="table">
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
                    <!-- /.card -->

                    <div class="card card-warning col-md-6">
                        <div class="card-header">
                            <h3 class="card-title text-white">ENTRADAS</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">



                            <table id="tblEntradas" class="table">
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

        </section>
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


