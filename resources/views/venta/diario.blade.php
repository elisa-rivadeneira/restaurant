@extends('adminlte::page')


@section('title', 'Reporte Diario de Ventas')

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
    <h1>REPORTE DIARIO</h1>
@stop

@section("content")


<div class="wrapper">



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">


              <h5 class="mb-2 mt-4">VENTAS DIARIAS</h5>
            <div class="row">
                <div class="col-lg-6 col-12 m-3"  >
                 SELECCIONA EL DÍA: <input type="date" name="dia" id="dia" onchange="establecer_dia(this.value)">

                </div>
            </div>
            <div class="row bg-info p-3 col-md-9">
                <div class="col-md-4">DIA SELECCIONADO: </div>
                <div class="col-md-2" id="diaseleccionado"> </div>
            </div>

            <div class="row">


            <h5 class="mb-2 mt-4">VENTAS DE HOY</h5>
            </div>
            <div class="row">
                <div class="col-md-4">

                    <div class="small-box bg-info">
                        <div class="inner" id="nroventas">
                            <h3>{{$nroventas}}</h3>
                            <p>Ordenes</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            Mas info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-md-5">

                    <div class="small-box bg-warning" id="ventadia">
                        <div class="inner">
                            <h3>S/.{{$ventadia}}</h3>
                            <p>Ventas Totales</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>


          <!--
                <div class="col-md-9">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">PLATO MAS VENDIDO</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body">
                            Mazamorra Morada
                        </div>



                    </div>

                    -->

                </div>
                <div class="col-md-9" id="platos">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">PLATOS A LA CARTA VENDIDOS</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body" id="platosvendidos">


                            <div class="row bg-primary">
                            <div class="col-md-2 "> CANT</div>
                            <div class="col-md-10">PLATOS</div>
                            </div>
                            <div class="row">

                           @foreach ($datos as $dato)
                                <div class="col-md-2"> {{$dato['cantidad']}}</div>
                                <div class="col-md-10">{{$dato['plato']}}</div>




                            @endforeach
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
