@extends('adminlte::page')


@section('title', 'Ordenes')

@section('css')
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>

    <style>
        .select2-selection {
            height: calc(2.25rem + 2px) !important;
        }


        .valida {
            margin-top: -14px;
            color: red;
            font-size: 11px;
        }

        @media screen and (max-width: 768px) {
            h1 {
                font-size: 18px;
                font-weight: bold;
            }
        }


        #boton {

            padding: 10px;

            background: orange;

            width: 95px;

            cursor: pointer;

            margin-top: 10px;

            margin-bottom: 10px;

            box-shadow: 0px 0px 1px #000;

            display: inline-block;

        }


        #boton:hover {

            opacity: .8;

        }


        #cajamenu {

            width: 100%;

            margin: auto;

            background: #3fc574;

            box-shadow: 10px 10px 3px #D8D8D8;

            transition: height .4s;

        }

        #cajaalacarta {

            width: 100%;

            margin: auto;

            background: #3f4ac5;

            box-shadow: 10px 10px 3px #D8D8D8;

            transition: height .4s;

        }


    </style>







@stop



@section('content_header')

@stop

@section("content")
    <div class="row">

    </div>
    <form action="/compra/guardar" method="post" class="grabado">
        @csrf

        <div class="card">
          <div class="col-12 mt-2">
                    <div class="card">
                        <div class="card-head">
                            <h4 class="text-center">DATOS DE LA COMPRA</h4>
                        </div>
                            <div class="row card-body">

                                <div class="form-group col-md-6">
                                <label for="">DIA DE LA COMPRA</label>
                                <input id="dia_compra" type="date" class="form-control" name="dia_compra" value="{{ old('dia_compra') }}">
                                    @error('dia_compra')
                                    <br>
                                    <div class="valida">*{{ $message }}</div>
                                    <br>
                                    @enderror

                                </div>


                                <div class="form-group col-md-6">
                                    <label for="">MEDIO DE PAGO</label>
                                    <select name="mediodepago" id="mediodepago" class="form-control form-select"  >
                                        <option selected="false" value="{{ old('mediodepago') }}">Seleccionar Medio de Pago</option>
                                            <option value="EFECTIVO" {{ old('mediodepago') == "EFECTIVO" ? "selected" : "" }} >EFECTIVO</option>
                                            <option value="CASH" {{ old('mediodepago') == "CASH" ? "selected" : "" }} >TARJETA</option>
                                    </select>
                                    @error('mediodepago')
                                    <br>
                                    <div class="valida">*{{ $message }}</div>
                                    <br>
                                    @enderror
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="">CENTRO DE ABASTOS (PROVEEDOR):</label>
                                    <select name="proveedor" id="proveedor" class="form-control form-select"  >
                                        <option selected="false" value="{{ old('proveedor') }}">Proveedor</option>
                                        @foreach($proveedores as $proveedor)
                                            <option value="{{ $proveedor->id}}" >{{ $proveedor->nombre }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('proveedor')
                                    <br>
                                    <div class="valida">*{{ $message }}</div>
                                    <br>
                                    @enderror

                                </div>


                                <div class="form-group col-md-6">
                                    <label for="">TOTAL</label>
                                    <input id="precio_total" type="text" class="form-control" name="precio_total" readonly>


                                </div>
                            </div>
                    </div>
                </div>

         <div class="col-12 mt-3 ">
                <div class="card col-md-12 d-flex justify-content-center">
                    <div class="card-head">
                        <h4 class="text-center">2. ITEMS</h4>
                    </div>

                    <div class="row card-body" id="crearplatoalacarta" >

                        <div class="col-md-12 row">
                            <div class="col-md-7">
                                <label for="">INSUMOS</label>
                                <select name="insumo" id="insumo" class="form-control form-select" onchange="colocar_unidad()" >
                                    <option selected="false" value="">Insumo</option>
                                    @foreach($insumos as $insumo)
                                        <option value="{{ $insumo->id}}" unidad="{{$insumo->unidad}}">{{ $insumo->nombre }}
                                        </option>
                                    @endforeach
                                </select>


                            </div>




                            <div class="col-md-2">
                                <label for="">Cantidad</label>
                                <input type="number" id="cantidad"  name="cantidad" class="form-control" value="$insumo->unidad">
                            </div>

                            <div class="col-md-1">
                                <label for="">Unidad</label>
                                <input type="text" id="unidad"  name="unidad" class="form-control" readonly>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Precio</label>
                                    <input id="precio" name="precio" type="text" class="form-control">
                                </div>
                            </div>

                        </div>

                        <div class="col-12 mt-3 mx-auto">
                            <button onclick="agregar_insumo()" type="button"
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

                    <div class="card col-md-12 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary pl-5 pr-5 m-4">Guardar</button>
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




        function mostrarconsola() {
            let entra = $("#entrada option:selected").val();
            console.log("Entraada seleccionada: " + entra); //banco origen



        }

        function colocar_precio() {
            let men = $("#menu option:selected").val();
            console.log("Entraada seleccionada: " , men); //banco origen


            let platoid = $("#plato option:selected").attr('precio');
            $("#precio").val(platoid);
        }

        function colocar_unidad() {
            let unidad = $("#insumo option:selected").attr('unidad');;
            $("#unidad").val(unidad);
        }

        function colocar_preciomenu() {
            let preciomenu = '9';
            $("#preciomenu").val(preciomenu);
        }

        function agregar_insumo() {
            console.log('Agregando Insumo');
            let insumo_id = $("#insumo option:selected").val();
            let insumo_text = $("#insumo option:selected").text();
            let cantidad = $("#cantidad").val();
            let precio = $("#precio").val();
            if (cantidad > 0 && precio > 0) {
                $("#tblPlatos").append(`
                    <tr id="tr-${insumo_id}">
                        <td>
                            <input type="hidden" name="insumo_id[]" value="${insumo_id}" />
                            <input type="hidden" name="cantidades[]" value="${cantidad}" />
                            <input type="hidden" name="costos[]" value="${precio}" />
                            ${insumo_text}
                        </td>
                        <td>${cantidad}</td>
                        <td>S/. ${precio}</td>
                        <td>${parseFloat((parseFloat(cantidad)) * parseFloat(parseFloat(precio))).toFixed(2)}</td>
                        <td>
                            <button type="button" class="btn btn-danger" onclick="eliminar_plato(${insumo_id}, ${parseInt(cantidad) * parseInt(precio)})">X</button>
                        </td>
                    </tr>
                `);
                let precio_total = $("#precio_total").val() || 0;
                $("#precio_total").val(parseFloat(parseFloat(precio_total) + parseFloat(cantidad) * parseFloat(precio)).toFixed(2));
            } else {
                alert("Se debe ingresar una cantidad o precio valido");
            }
        }







        let item = 1

        function agregar_menu() {
            let entrada_id = $("#entrada option:selected").val();
            let entrada_text = $("#entrada option:selected").text();

            let menu_id = $("#menu option:selected").val();
            let menu_text = $("#menu option:selected").text();

            let cantidadmenu = $("#cantidadmenu").val();
            let preciomenu = $("#preciomenu").val();
            if (cantidadmenu > 0 && preciomenu > 0) {
                $("#tblPlatos").append(`
                    <tr id="tr-${item}">
                        <td>
                            <input type="hidden" name="menu_id[]" value="${menu_id}" />
                            <input type="hidden" name="entrada_id[]" value="${entrada_id}" />
                            <input type="hidden" name="cantidadmenu[]" value="${cantidadmenu}" />
                            ${entrada_text} - ${menu_text}
                        </td>
                        <td>${cantidadmenu}</td>
                        <td>S/. ${preciomenu}</td>
                        <td>${parseFloat((parseFloat(cantidadmenu)) * parseFloat(parseFloat(preciomenu))).toFixed(2)}</td>
                        <td>
                            <button type="button" class="btn btn-danger" onclick="eliminar_menu(${item}, ${parseInt(cantidadmenu) * parseInt(preciomenu)})">X</button>
                        </td>
                    </tr>
                `);
                let precio_total = $("#precio_total").val() || 0;
                $("#precio_total").val(parseFloat(parseFloat(precio_total) + parseFloat(cantidadmenu) * parseFloat(preciomenu)).toFixed(2));
                item++;
            } else {
                alert("Se debe ingresar una cantidad o precio valido");

            }

        }

        function eliminar_menu(id, subtotal) {
            console.log('eliminando un menu');
            $("#tr-" + id).remove();
            let precio_total = $("#precio_total").val() || 0;
            $("#precio_total").val(parseInt(precio_total) - subtotal);
        }


        function eliminar_plato(id, subtotal) {
            $("#tr-" + id).remove();
            let precio_total = $("#precio_total").val() || 0;
            $("#precio_total").val(parseInt(precio_total) - subtotal);
        }


        function seleccionarmesa(id){
            console.log(" Nro de Mesa = " + id);
            $("#mesa").val(id);


        }

        $(document).ready(function () {




        });


    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>



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

    <script>
        var clicmenu = 1;
        var cliccarta = 1;
        var preciomenu =9;



        function divMenu(){
            $("#preciomenu").val(preciomenu);



                document.getElementById("crearmenu").style.display = "block";
                document.getElementById("crearplatoalacarta").style.display = "none";



        }

        function divAlaCarta(){

                document.getElementById("crearplatoalacarta").style.display = "block";
                document.getElementById("crearmenu").style.display = "none";
       }


    </script>
@endsection
