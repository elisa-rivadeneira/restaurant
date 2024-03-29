@extends('adminlte::page')


@section('title', 'Configuración del Día')

@section('css')
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">


    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        .select2-selection {
            height: calc(2.25rem + 2px) !important;
        }
    </style>

@endsection


@section('content_header')


@stop

@section('content')

    <form action="/config/guardar" method="post" class="grabado">
    @csrf






        <!-- Main content -->
        <section class="content">
            <div class="card p-2 m-2">
                <div class="card-header text-center"><B>CONFIGURAR NUEVO DÍA</B></div>




                    <div class="card card-primary  m2 bg-plomito">

                        <div class="card-body row ">

                            <div class="col-md-6">
                                <div class="form-group mx-auto">
                                    <label class="mx-auto">Establecer el Día</label>
                                    <div class="input-group-prepend mx-auto">
                                        <input name="dia" type="date" class="form-control w-100" value={{$dia}}>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">

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
                    </div>
                    <!-- /.card-body -->



            <div class="row">
                <div class="col-md-6">

                        <!-- /.card -->
                        <div class="card ">
                            <div class="card-header bg-orangetitle">
                                <h3 class="card-title fontsmall"><b>PLATOS DE FONDO</b></h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body p-2">
                                <div class="col-md-12" >
                                        <div class="col-md-12 mb-2">
                                             <label for="">SELECCIONE EL PLATO DE FONDO</label>
                                        </div>
                                                    <div class="col-md-12">
                                                        <select name="menu" id="menu" class="form-control form-select" onchange="colocar_precio()" >
                                                            <option selected="false" >Plato de Fondo</option>
                                                            @foreach($menus as $menu)
                                                                <option value="{{ $menu->id }}">{{ $menu->nombre }}</option>
                                                            @endforeach
                                                        </select>

                                                    </div>


                                        <div class="input-group col-md-12 mt-4">
                                            <div class="col-md-12 mb-2">
                                                    <label for="">INDICAR PORCIONES</label>
                                            </div>
                                            <div class="col-md-12 mb-2">
                                                <input class="form-control" id="porciones" name="porciones" value="" />
                                            </div>
                                        </div>
                                </div>

                            </div>
                                                <div class="col-md-12">
                                                    <div class="btn-group w-100 pl-5 pr-5">
                                                  <span class="btn bg-orange mb-2" onclick="agregar_menu()">
                                                    <i class="fas fa-plus"></i>
                                                    <span>Añadir Menú</span>
                                                  </span>
                                                    </div>
                                                </div>

                                    <div class="card m-3">
                                    <table id="tblMenus" class="table">
                                        <thead>
                                        <tr>
                                            <th style="width:50%">Nombre</th>
                                            <th style="width:10%">Porc.</th>
                                            <th style="width:40%"></th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @if(isset($configmenus))

                                            @foreach($configmenus as $menu)
                                                <tr id="tr-{{$menu->id}}">

                                                    <td>  {{$menu->nombre}}</td>
                                                    <td >{{$menu->porciones}}</td>
                                                    <td class="text-right py-0 align-middle">
                                                        <a href="#" class="btn btn-info" onclick="eliminar_plato(${menu_id})"><i class="fas fa-eye"></i></a>
                                                        <a href="#" class="btn btn-danger" onclick="eliminar_plato(${menu_id})" ><i class="fas fa-trash"></i></a>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif


                                        </tbody>
                                    </table>
                                    </div>
                                </div>



                            </div>

                <div class="col-md-6">
                        <div class="card ">
                            <div class="card-header bg-titlegeranio">
                                <h3 class="card-title text-white fontsmall"><b>ENTRADAS</b></h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body p-2">
                                <div class="col-md-12" >
                                        <div class="col-md-12 mb-2">
                                                    <label for="">SELECCIONE LA ENTRADA</label>
                                        </div>
                                        <div class="col-md-12">
                                            <select name="entrada" id="entrada" class="form-control form-select" >
                                                <option selected="false" >Entrada</option>
                                                @foreach($entradas as $entrada)
                                                    <option value="{{ $entrada->id }}">{{ $entrada->nombre }}</option>
                                                @endforeach
                                            </select>

                                        </div>



                                    <div class="input-group col-md-12 mt-4">
                                        <div class="col-md-12 mb-2">
                                                    <label for="">INDICAR PORCIONES</label>
                                        </div>

                                    <div class="col-md-12 mb-2">
                                        <input class="form-control" id="porcionesentrada" name="porcionesentrada" value="" />
                                    </div>
                                </div>
                            </div>

                        </div>
                                        <div class="col-md-12">
                                            <div class="btn-group w-100 pl-5 pr-5">
                                                  <span class="btn bg-geranio  mb-2 " onclick="agregar_entrada()">
                                                    <i class="fas fa-plus"></i>
                                                    <span>Añadir Entrada</span>
                                                  </span>
                                            </div>
                                        </div>




                            <div class="card m-3">
                                <table id="tblEntradas" class="table">
                                    <thead>
                                    <tr>
                                        <th style="width:50%">Nombre</th>
                                        <th style="width:10%">Porc.</th>
                                        <th style="width:40%"></th>
                                    </tr>
                                    </thead>
                                    <tbody>




                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                </div>
            </div>


                <div class="row col-12">
                        <div class="col-6 text-center">
                            <a href="#" class="btn btn-secondary">CANCELAR</a>
                        </div>
                        <div class="col-6 text-center" >
                        <input type="submit" value="GUARDAR CAMBIOS" class="btn btn-primary">
                        </div>
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



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('select').select2();
        });
    </script>
@stop


