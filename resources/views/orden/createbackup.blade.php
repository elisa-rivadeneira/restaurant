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

                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mesas">
                                        SELECCIONAR MESA
                                    </button>

                                <input id="mesa" name="mesa" readonly>
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

                    <div class="row">
                        <div class="col-md-6"><a  class="btn btn-success btn-block m-1" onclick="divMenu()"  >  MENU </a> </div>
                        <div class="col-md-6"> <a  class="btn btn-primary btn-block m-1" onclick="divAlaCarta()" >  A LA CARTA</a></div>
                    </div>
                    <div class="row card-body" id="crearmenu" style="display: none">
                        CREANDO MENU

                        <div class="col-md-12 row">

                            <div class="col-md-6" id="entrada">
                                <label for="">ENTRADA</label>

                                <select name="entrada" id="entrada" class="form-control form-select" onchange="mostrarconsola()">
                                    <option selected="false" value="">ENTRADA</option>
                                    @foreach($entradas as $entrada)
                                        <option value="{{ $entrada->id}}">{{ $entrada->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6" id="platodefondo">

                                <label for="">PLATO DE FONDO</label>
                                    <select name="menu" id="menu" class="form-control form-select" onchange="colocar_precio()" >
                                        <option selected="false" >PLATO DE FONDO</option>
                                        @foreach($menus as $menu)
                                            <option value="{{ $menu->id }}">{{ $menu->nombre }}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </div>

                        <div class="col-md-12 row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Cantidad</label>
                                    <input type="number" id="cantidadmenu"  name="cantidadmenu" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Precio</label>
                                    <input id="preciomenu" name="preciomenu" type="text" class="form-control" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-3 mx-auto">
                            <button onclick="agregar_menu()" type="button"
                                    class="btn btn-success float-right">Agregar</button>
                        </div>
                    </div>
                    <div class="row card-body" id="crearplatoalacarta" style="display: none">
                        CREAR PLATO A LA CARTA

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
                                <label for="">Cantidad</label>
                                <input type="number" id="cantidad"  name="cantidad" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Precio</label>
                                    <input id="precio" name="precio" type="text" class="form-control" readonly>
                                </div>
                            </div>

                        </div>

                        <div class="col-12 mt-3 mx-auto">
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


        <div class="modal fade" id="mesas" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="text-align:center;">
                        <h5 class="modal-title" style="font-weight: bold;">SELECCIONAR MESA</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">x</span>
                        </button>
                    </div>


                    <div class="modal-body">

                        <div class="col-md-12 row" >
                        @foreach ($mesas as $mesa)

                                @if($mesa->estado =='0')
                                <a type="button" class="btn btn-primary m-4 p-4" >

                                <div class="col-md-3 close" data-dismiss="modal" id="{{$mesa->id}}" style="display: flex;
justify-content: center;" name="mesa{{$mesa->id}}" onclick="seleccionarmesa(this.id)">
                               {{$mesa->id}}
                                </div>
                                </a>
                                @else
                                    <a type="button" class="btn btn-secondary m-4 p-4" style="pointer-events:none; ">

                                        <div class="col-md-3  mx-auto close" style="display: flex; justify-content: center;" id="{{$mesa->id}}" name="mesa{{$mesa->id}}" onclick="">
                                          <span style="text-align: center">{{$mesa->id}}</span>
                                        </div>
                                    </a>
                                @endif

                        @endforeach
                        </div>
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

        function colocar_preciomenu() {
            let preciomenu = '9';
            $("#preciomenu").val(preciomenu);
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
                        <td>S/. ${precio}</td>
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
