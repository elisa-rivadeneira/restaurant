@extends('adminlte::page')


@section('title', 'Reporte Diario de Ventas')

@section('css')
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
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


<div class="wrapper " >



    <!-- Content Wrapper. Contains page content -->
    <div class="container" >

        <!-- Main content -->
        <section class="content p-3">

            <div class="row bg-pink p-2 col-md-12 rounded justify-content-center" >
                <div class="col-md-4 col-auto  ">Reporte del Día:<b> {{$fecha}} </b></div>
                <div class="col-md-2 col-auto " id="diaseleccionado"> </div>
            </div>



                <div class="container">
                    <h5 class="mb-2 mt-3 text-center text-secondary "><b>VENTAS DE HOY</b></h5>
                <div class="row  p-1 mt-2 mb-2 justify-content-center" >
                    <div class="col col-6">

                        <div class="small-box bg-rose">
                            <div class="inner" id="nroventas">
                                <h5>{{$ventas}}</h5>
                                <p class="text-center">Menus Vendidos</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                            <a href="#" class="small-box-footer">

                            </a>
                        </div>
                    </div>

                    <div class="col col-6" >

                        <div class="small-box bg-warning" id="ventadia">
                            <div class="inner">
                                <h5>S/.{{$totalmenusvendidos}}</h5>
                                <p class="text-center">Ventas Totales</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-shopping-cart"></i>

                            </div>
                            <a href="#" class="small-box-footer">

                            </a>
                        </div>
                    </div>
                </div>
                </div>



                    <div class="card">
                            <div class="card-header bg-gray">EGRESOS DE HOY</div>

                            <div class="card-body">
                            <table width="100%">
                                <thead>  <tr>
                                    <td scope="col" class="small"><h6>Menus preparados</h6></td>
                                    <td scope="col" class="small"><h6>Costos Totales</h6></td>
                                </tr></thead>

                                <tr>
                                    <td>{{$menuspreparados}}</td>
                                    <td>S/.{{$sumatotal}}</td>
                                </tr>
                            </table>
                            </div>



                        </div>



                    <div class="col-md-12 bg-clarito p-2 text-center" >




                            <h6><b>MENUS PREPARADOS</b></h6>



                                <table class="letrita display responsive nowrap table table-striped mt-4 shadow-lg " >
                                    <thead class="bg-primary text-white">
                                    <tr>
                                        <td>Prep.</td>
                                        <td>Vend.</td>
                                        <td>Plato de Fondo</td>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach ($datosmenur as $dato)
                                    <tr>
                                        <td>{{$dato['cantidadmenuini']}}</td>
                                        <td>{{$dato['cantidadmenuven']}}</td>
                                        <td>{{$dato['plato']}}</td>
                                    </tr>
                                                 @endforeach
                                    </tbody>
                                </table>



                        <table class="letrita display responsive nowrap table table-striped mt-4 shadow-lg " >
                            <thead class="bg-primary text-white">
                            <tr>
                                <td>Prep.</td>
                                <td>Vend.</td>
                                <td>Entradas</td>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($datosentradar as $dato)
                                <tr>
                                    <td>{{$dato['cantidadini']}}</td>
                                    <td>{{$dato['cantidadven']}}</td>
                                    <td>{{$dato['plato']}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>


                            </div>



                        </div>







                    </div>

                </div>



            </div>
            </div>
            <!-- =========================================================== -->


        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->


</div><!-- ./wrapper -->

@endsection

@section("js")
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<script>
    function establecer_dia(dia) {
        $("#diaseleccionado").html(dia);



        jQuery.ajax({
            url: '/ventas/' + dia,
            type: "GET",
            dataType: "json",
            success: function (data) {
                var insertnroventas = '';
                var insertventadia = '';

                $.each(data, function (key, datoos) {

                    $.each(datoos, function (key, value) {

                        insertnroventas = insertnroventas + '<div class="col-md-2">' + value.nroventas + '</div>';
                        insertventadia = insertventadia + '<div class="col-md-2">' + value.ventassoles + '</div>';


                    });
                });

                $("#nroventas h3").html(insertnroventas);
                $("#ventadia h3").html(insertventadia);


            }


        });

        jQuery.ajax({
            url: '/ventasplatos/' + dia,
            type: "GET",
            dataType: "json",
            success: function (data) {
                console.log(data);

                var insertplatos = '';

                $.each(data, function (key, datoos) {
                    insertplatos = insertplatos + '<div class="row bg-primary">';
                    insertplatos = insertplatos + '<div class="col-md-2 "> CANT</div>';
                    insertplatos = insertplatos + '<div class="col-md-2">PLATOS</div>';
                    insertplatos = insertplatos + '</div>';

                    $.each(datoos, function (key, value) {

                            insertplatos = insertplatos + '<div class="row">';


                                console.log('este es el value:', value);

                                insertplatos = insertplatos + '<div class="col-md-2">' + value.cantidad + '</div>';
                                insertplatos = insertplatos + '<div class="col-md-5">' + value.nombre + '</div>';


                            insertplatos = insertplatos + '</div>';

                    });
                });

                $("#platosvendidos").html(insertplatos);




            }


        });

    }

function establecereldia(dia){
    $("#diaseleccionado").html(dia);
    $("#buttomday").attr("href", "/seleccionardia/"+dia);

    }
</script>


<script>

    $('body').on('click', '#dia', function (event) {
        var dia = $("#dia").val();
        console.log('Hola Mundo');
                jQuery.ajax({
                    url : '/ventas/' +dia,
                    type : "GET",
                    dataType : "json",
                    success : function(data)
                    {

                        $.each(datamenus, function (key, diti) {

                            $.each(diti, function (key, value) {


                            }

                        }

                    }


                             });
                    }
                });

        });




    });
</script>




@endsection
