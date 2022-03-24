@extends('adminlte::page')


@section('title', 'Configuración del Día')

@section('content_header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Configuración del Día</h1>
                    <a href="/config/create" class="btn btn-primary mb-4" >CONFIGURAR NUEVO DÍA</a>



                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Configuración del Día</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

@stop

@section('content')

    <form action="/config/{{$id}}" method="post" class="grabado">
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
            <div class="col-md-6">

                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">DATOS DE CONFIGURACIÒN</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="form-group mx-auto">
                            <label class="mx-auto">Establecer el Día</label>
                            <div class="input-group">
                                <div class="input-group-prepend mx-auto">
                                    <input name="dia" type="date" class="form-control w-100" value={{$dia}}>
                                </div>
                                <div class="invalid-feedback">
                                    Por favor ingrese el precio
                                </div>
                            </div>


                        </div>


                        <div class="form-group">
                            <label for="preciomenu">Precio del Menú</label>
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

            <div class="col-md-6">

                    <!-- /.card -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Menús del Día</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="col-md-12" >
                                <div class="input-group col-md-12">
                                    <div class="form-group col-md-12 mb-2">
                                        <div class="input-group">
                                            <div class="col-md-6">
                                            <label for="">SELECCIONE EL MENU</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">INDICAR PORCIONES</label>
                                            </div>

                                            <div class="col-md-6">
                                                <select name="menu" id="menu" class="form-control form-select" onchange="colocar_precio()" >
                                                    <option selected="false" >Menú</option>
                                                    @foreach($menus as $menu)
                                                        <option value="{{ $menu->id }}">{{ $menu->nombre }}</option>
                                                    @endforeach
                                                </select>

                                            </div>

                                            <div class="col-md-6">


                                            <input class="form-control" id="porciones" name="porciones" value="" />

                                            </div>



                                        </div>

                                    </div>
                                            <div class="col-md-12">
                                                <div class="btn-group w-100 pl-5 pr-5">
                                              <span class="btn btn-success col fileinput-button" onclick="agregar_menu()">
                                                <i class="fas fa-plus"></i>
                                                <span>Añadir Menú</span>
                                              </span>
                                                </div>
                                            </div>


                                </div>
                            </div>



                            <table id="tblMenus" class="table">
                                <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Porciones</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                @if(isset($configmenus))

                                    @foreach($configmenus as $menu)
                                    <tr id="tr-{{$menu->id}}">

                                        <td>  {{$menu->nombre}}</td>
                                        <input type="hidden" name="menu_id[]" value="{{$menu->id}}" />

                                        <td >{{$menu->porciones}}</td>
                                        <input type="hidden" name="porciones[]" value="{{$menu->porciones}}"   />

                                        <td class="text-right py-0 align-middle">
                                            <a href="#" class="btn btn-info" onclick=""><i class="fas fa-eye"></i></a>
                                            <a href="#" class="btn btn-danger" id="{{$menu->id}}" onclick="eliminar_menu(this.id)" ><i class="fas fa-trash"></i></a>

                                        </td>
                                    </tr>
                                    @endforeach
                                @endif


                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title text-white">ENTRADAS</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="col-md-12" >
                                <div class="input-group col-md-12">
                                    <div class="form-group col-md-12 mb-2">
                                        <div class="input-group">
                                            <div class="col-md-6">
                                                <label for="">SELECCIONE LA ENTRADA</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">INDICAR PORCIONES</label>
                                            </div>

                                            <div class="col-md-6">
                                                <select name="entrada" id="entrada" class="form-control form-select" >
                                                    <option selected="false" >Entrada</option>
                                                    @foreach($entradas as $entrada)
                                                        <option value="{{ $entrada->id }}">{{ $entrada->nombre }}</option>
                                                    @endforeach
                                                </select>

                                            </div>

                                            <div class="col-md-6">


                                                <input class="form-control" id="porcionesentrada" name="porcionesentrada" value="" />

                                            </div>



                                        </div>

                                    </div>
                                    <div class="col-md-12">
                                        <div class="btn-group w-100 pl-5 pr-5">
                                              <span class="btn btn-success col fileinput-button" onclick="agregar_entrada()">
                                                <i class="fas fa-plus"></i>
                                                <span>Añadir Entrada</span>
                                              </span>
                                        </div>
                                    </div>


                                </div>
                            </div>



                            <table id="tblEntradas" class="table">
                                <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Porciones</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                @if($configentradas!='')
                                    @foreach($configentradas as $entrada)
                                        <tr id="tr-{{$entrada->id}}" class="entrada">
                                            <td>  {{$entrada->nombre}}</td>
                                            <input type="hidden" name="entrada_id[]" value="{{$entrada->id}}" />

                                            <td >{{$entrada->porciones}}</td>
                                            <input type="hidden" name="porcionesentrada[]" value="{{$entrada->porciones}}" />

                                            <td class="text-right py-0 align-middle">

                                                <button type="button" class="btn btn-danger" id="{{$entrada->id}}" onclick="eliminar_entrada(this.id)"><i class="fas fa-trash"></i></button>

                                                <a href="#" class="btn btn-info" onclick=""><i class="fas fa-eye"></i></a>


                                            </td>
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
            <div class="row">
                <div class="col-12">
                    <a href="#" class="btn btn-secondary">Cancelar</a>
                    <input type="submit" value="Guardar Cambios" class="btn btn-success float-right">
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




    <script>

        jQuery(document).ready(function()
        {
            jQuery('select[name="categoria"]').on('change', function(){
                var categoriaID = jQuery(this).val();
                if(categoriaID)
                {
                    jQuery.ajax({
                        url : '/getPlato/' +categoriaID,
                        type : "GET",
                        dataType : "json",
                        success : function(data)
                        {
                            jQuery('select[name="plato"]').empty();
                            jQuery.each(data, function(key,value){
                                $('select[name="plato"]').append('<option precio="'+ value.precio +'" value="'+ value.id +'">'+ value.nombre+ '</option>');
                            });
                        }
                    });
                }
                else
                {
                    $('select[name="plato"]').empty();
                }
            });




        });

        function colocar_precio() {
            let men = $("#menu option:selected").val();
            console.log("Entraada seleccionada: " , men); //banco origen


            let platoid = $("#plato option:selected").attr('precio');
            $("#precio").val(platoid);
        }



    </script>
    <script src="{{ asset('../js/functionsconfig.js')}}"></script>

@stop


