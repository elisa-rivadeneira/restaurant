@extends('layouts.base')
@section('title', 'Crear Orden')





@section('contenido')

    <form id="ordenador" name="ordenador" action="/orden/guardar" method="post" class="grabado">
        @csrf

    <div id="mesas" class="card mb-4">
        <div class="card-header" style="text-align:center;">
            <h5 style="font-weight: bold;">SELECCIONAR MESA</h5>
        </div>

            <div class="col-md-12 row d-flex justify-content-center" >

                <div id="botonesmesas" role="group" >
                    @foreach ($mesas as $mesa)

                        @if($mesa->estado =='0')

                    <button type="button" class="btn btn-primary col-md-2 btn m-2 p-2 desoc" id="{{$mesa->id}}" value="{{$mesa->id}}" onclick="seleccionarmesa(this.id)">MESA {{$mesa->id}}</button>

                        @else

                            <button type="button" class="btn btn-secondary col-md-2 btn m-2 p-2" value="{{$mesa->id}}">MESA {{$mesa->id}}</button>
                        @endif
                    @endforeach
                </div>

                <input id="mesa" name="mesa" type="hidden" >


                @error('mesa')
                <br>
                <div class="valida">*{{ $message }}</div>
                <br>
                @enderror
            </div>


    </div>

    <div class="d-flex align-items-start">
        <div class="nav flex-column col-md-2 nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <button class="nav-link  active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">ENTRADAS</button>
            <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">PLATOS DE FONDO</button>
            </div>
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <div class="">
                    <div class="card mb-4" id="entradas">

                        <div class="row card-body" id="crearmenu" >

                            @php
                                $content = count($entradas);


                            @endphp
                            <input id="entradaslista" type="hidden" value="{{$content}}">


                                @foreach($entradas as $keye => $entrada)

                                    <div class="form-row row m-4">
                                        <div class="col-md-9 p-1  btn btn-entrada  text-white btn-lg p-3 mb-0" onclick="itemorden(this.id)" id="entrada{{$entrada->id }}"> <h5>{{ $entrada->nombre }}</h5>
                                            <span class="disponibility">Disponibilidad:</span><div id="porciones-entrada{{$entrada->id }}" value="{{$entrada->porciones}}">{{$entrada->porciones  }}</div>
                                        </div>
                                        <div class="inputbig col-md-2  p-1 m-1">
                                            <input id="ceentrada{{$entrada->id }}" name="cantidadentrada[]" class="form-control btn-lg p-3 input-lg" keye="{{$keye}}" value="0" type="number" >
                                        </div>


                                        <input type="hidden" name="entrada_id[]" value="{{$entrada->id }}">






                                    </div>
                                @endforeach
                            <input id="cantentradas" name="cantentradas"  type="hidden" value="0">




                        </div>

                    </div>
                </div>


            </div>
            <div class="tab-pane fade " id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                <div class="">
                    <div class="card " id="platodefondo">

                        <div class="row card-body" id="crearmenu" >

                            @php
                                $contmen = count($menus);


                            @endphp
                            <input id="menuslista" type="hidden" value="{{$contmen}}">

                            @foreach($menus as $key => $menu)



                                <div class="form-row row m-4">
                                    <div class="col-md-9 p-1  btn btn-menu btn-lg p-3" onclick="menuorden(this.id)" id="menu{{$menu->id }}"><h5>{{ $menu->nombre }}</h5>
                                        <span class="disponibility">Disponibilidad:</span><div id="porciones-menu{{$menu->id }}" value="{{$menu->porciones}}">{{$menu->porciones}}</div>
                                    </div>
                                    <div class="inputbig col-md-2 p-1 m-1">
                                        <input id="momenu{{$menu->id  }}" name="cantidadmenu[]" class="form-control btn-lg " key="{{$key}}" value="0" type="number" >

                                    </div>



                                    <input type="hidden" name="menu_id[]" value="{{$menu->id }}">

                                </div>
                            @endforeach
                                <input id="cantmenus" name="cantmenus" value="0" type="hidden">

                        </div>


                    </div>
           </div>
            </div>

        </div>

    </div>

    <div  class="col-12 mt-3 d-flex justify-content-center">
             <!--   <button id="buttonenviar"  type="submit"
                        >EMITIR ORDEN</button> -->

        <div id="pedido" style="display: none" >

        </div>



        <button class="btn btn-primary btn-lg pl-5 pr-5 m-4 float-right" type="submit" value="Submit"  style="visibility:hidden">Enviar</button>

        <button class="btn btn-primary btn-lg pl-5 pr-5 m-4 " type="button" id="btn">EMITIR ORDEN</button>

    </div>

        @endsection

@section('js')




            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

            <script>
$(document).ready(function (){





});


        var cant=0;
                function seleccionarmesa(id){

                    $("#mesa").val(id);
                    $(".desoc").css('background-color', '#007bff');
                    $("#" + id).css('background-color', '#073c74');


console.log(id);

                }

                function itemorden(entradaid){
                    var valor=  $("#ce" + entradaid).val();

                    valor++;
                    $("#ce" + entradaid).val(valor);
                    $("#cantentradas").val(valor);
                    var inicial = $("#porciones-" + entradaid).attr('value');
                    var restante = inicial - 1;

                    document.getElementById("porciones-" + entradaid).setAttribute("value", restante);
                    document.getElementById("porciones-" + entradaid).innerText = restante;

                    console.log('restante es:', restante);

                    $("#" + entradaid).css('background-color', '#073c74');
                    $("#" + entradaid).addClass("selected");

                }

        var menuscant = 0;
        var vara = 0;
        var menusquehay = 0;



        function menuorden(menuid){
            console.log(menuid);

            var valor=  $("#mo" + menuid).val();
            valor++
            $("#mo" + menuid).val(valor);
            $("#mo" + menuid).val(valor);



            var inicial = $("#porciones-" + menuid).attr('value');
            var restante = inicial - 1;

            document.getElementById("porciones-" + menuid).setAttribute("value", restante);
            document.getElementById("porciones-" + menuid).innerText = restante;

            console.log('restante es:', restante);


            $("#" + menuid).css('background-color', '#073c74');
            $("#" + menuid).addClass("selected");

        }

        var k= 0;
        var valo = 0;

       $("#btn").on("click" ,function(e)
        {


            var i=0;
            menuspedidos = 0;
            variable1=0;
            entradaspedidas = 0;
            menuslista=  $("#menuslista").val();
            entradaslista = $("#entradaslista").val();

            for(i=0; i<menuslista; i++) {
                variable1 = $("input[key='" + i + "']").val();
             menuspedidos= parseInt(menuspedidos) + parseInt(variable1);
            }
            console.log('total de menus', menuspedidos);



            $("#cantmenus").val(menuspedidos);



                $("#pedido").append(
                    'Ha ordenado ' +  menuspedidos + ' menus'

                );


            var pedido="";
            pedido = $('#pedido').html();


            for(i=0; i<entradaslista; i++) {
                let variable2 = $("input[keye='" + i + "']").val();
                entradaspedidas= parseInt(entradaspedidas) + parseInt(variable2)
            }

            $("#cantentradas").val(entradaspedidas);



            if(entradaspedidas == menuspedidos){

                /*
                function getFormData(formId){
                    let formValues = {};
                    var form1Inputs =$( ".selected" ).has( "h5" ).text();


                    console.log(form1Inputs);
                }

                getFormData('ordenador');


                 */




                Swal.fire({
                    title: " " + pedido + " " ,
                    text: "¿Desea continuar?" ,
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si continuar!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $("#ordenador").submit()



                        /* Swal.fire(
                             'Deleted!',
                             'Your file has been deleted.',
                             'success'
                         )*/


                    }
                })
            }else{
                Swal.fire({
                    title: "Hay " + menuspedidos + " menus y "+ entradaspedidas + " entradas, los cuales no son iguales! ",
                    text: "¿Desea continuar?" ,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si continuar!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $("#ordenador").submit()



                        /* Swal.fire(
                             'Deleted!',
                             'Your file has been deleted.',
                             'success'
                         )*/

                    }
                })
            }






        });





    </script>

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
