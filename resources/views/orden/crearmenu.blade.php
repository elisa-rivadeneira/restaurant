@extends('adminlte::page')


@section('title', 'Ordenar Menu')

@section('css')
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        .select2-selection {
            height: calc(2.25rem + 2px) !important;
        }



        .valida{
            margin-top:-14px ;
            color: red;
            font-size: 11px;
        }

        @media screen and (max-width: 768px) {
            h1{
                font-size:18px;
                font-weight: bold;
            }
        }
    </style>
@stop



@section('content_header')
    <h1>Crear Orden</h1>
@stop

@section("content")
    <div class="row">

    </div>
    <form action="/orden/guardar" method="post" class="grabado">
        @csrf
        <div class="m-0 row justify-content-center">
            <div class="col-md-10">
                <h1 class="text-center">DATOS DE LA ORDEN</h1>
                <h3 class="text-center">DIA: {{ $date_now  }} </h3>

            </div>
        </div>




        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-head">
                        <h4 class="text-center">1. INFO ORDEN</h4>
                    </div>
                      <div class="card">
                        <div class="row card-body">
                            <div class="form-group col-xs-12 col-md-12">
                                <label for="">MESA</label>
                                <input id="mesa"  type="text" class="form-control" name="mesa" value="{{ old('mesa') }}">

                                @error('mesa')
                                <br>
                                <div class="valida">*{{ $message }}</div>
                                <br>
                                @enderror
                            </div>

                            <div class="form-group col-xs-12 col-md-12">
                                <label for="">TOTAL</label>
                                <input id="precio_total" type="text" class="form-control" name="precio_total" readonly>


                            </div>
                        </div>
                      </div>
                </div>
                <div class="col-12" style="margin-top: 3%;">
                    <button type="submit" class="btn btn-success btn-block">Guardar</button>
                </div>
            </div>


            <div class="col-6">
                <div class="card">
                    <div class="card-head">
                        <h4 class="text-center">2. PEDIDO</h4>
                    </div>
                    <div class="row card-body">
                        <div class="col-6">
                            <div class="form-group">

                                <label for="">CATEGORIA</label>
                                <select name="categoria" id="categoria" class="form-control form-select" >
                                    <option selected="false" value="">Categoria</option>
                                    @foreach($categorias as $categoria)
                                        <option value="{{ $categoria->id}}">{{ $categoria->nombre }}
                                        </option>
                                    @endforeach
                                </select>

                                <label for="">PLATO</label>
                                <select name="plato" id="plato" class="form-control form-select" onchange="colocar_precio()" >
                                    <option selected="false" >Plato</option>
                                    @foreach($platos as $plato)
                                        <option value="{{ $plato->nombre }}"></option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Cantidad</label>
                                <input type="number" id="cantidad"  name="cantidad" class="form-control">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Precio</label>
                                <input id="precio" name="precio" type="text" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-12">
                            <button onclick="agregar_plato()" type="button"
                                    class="btn btn-success float-right">Agregar</button>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Costo</th>
                            <th>Sub Total</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody id="tblPlatos">

                        </tbody>
                    </table>
                </div>
            </div>

        </div>




        </div>


    </form>




    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{$error}}</div>
        @endforeach
    @endif

@endsection


@section("js")


    <script>

        function colocar_precio() {
            let platoid = $("#plato option:selected").attr('precio');
            $("#precio").val(platoid);
        }

        function agregar_plato() {
            let plato_id = $("#plato option:selected").val();
            let plato_text = $("#plato option:selected").text();
            let cantidad = $("#cantidad").val();
            let precio = $("#precio").val();
            if (cantidad > 0 && precio > 0) {
                $("#tblPlatos").append(`
                    <tr id="tr-${plato_id}">
                        <td>
                            <input type="hidden" name="plato_id[]" value="${plato_id}" />
                            <input type="hidden" name="cantidades[]" value="${cantidad}" />
                            ${plato_text}
                        </td>
                        <td>${cantidad}</td>
                        <td>${precio}</td>
                        <td>${parseFloat((parseFloat(cantidad)) * parseFloat(parseFloat(precio))).toFixed(2)}</td>
                        <td>
                            <button type="button" class="btn btn-danger" onclick="eliminar_plato(${plato_id}, ${parseInt(cantidad) * parseInt(precio)})">X</button>
                        </td>
                    </tr>
                `);
                let precio_total = $("#precio_total").val() || 0;
                $("#precio_total").val(parseFloat(parseFloat(precio_total) + parseFloat(cantidad) * parseFloat(precio)).toFixed(2));
            } else {
                alert("Se debe ingresar una cantidad o precio valido");
            }
        }
        function eliminar_plato(id, subtotal) {
            $("#tr-" + id).remove();
            let precio_total = $("#precio_total").val() || 0;
            $("#precio_total").val(parseInt(precio_total) - subtotal);
        }


        $(document).ready(function () {




        });


    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('select').select2();
        });


    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>




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
    </script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        $('.grabadjjo').submit(function(e){
            e.preventDefault();
            Swal.fire({
                title: 'Estás seguro?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    /* Swal.fire(
                         'Deleted!',
                         'Your file has been deleted.',
                         'success'
                     )*/

                    this.submit();
                }
            })
        });

    </script>

@endsection
