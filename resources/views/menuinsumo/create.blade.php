@extends('adminlte::page')


@section('title', 'Menus')

@section('css')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<style>
    .select2-selection {
        height: calc(2.25rem + 2px) !important;
    }
</style>
@stop



@section('content_header')
<h1>Menus</h1>
@stop

@section("content")

<form action="/menu/guardar" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-head">
                    <h4 class="text-center">CREAR MENU</h4>
                </div>
                <div class="row card-body">
                    <div class="form-group col-12">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" name="nombre">
                    </div>

                    <div class="form-group col-6">
                        <label for="">Costo x Porción</label>
                        <input id="precio_total" type="text" class="form-control" name="costo" readonly>
                    </div>

                   <div class="form-group col-6">
                        <label for="">Porciones</label>
                        <input id="porciones" type="text" class="form-control" name="porciones" >
                    </div>
                </div>
            </div>

        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-head">
                    <h4 class="text-center">2. Info insumos</h4>
                </div>
                <div class="row card-body">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Nombre</label>
                            <select name="insumos" id="insumos" class="form-control" onchange="colocar_costo()">
                                <option value="">Seleccione</option>
                                @foreach($insumos as $value)
                                <option costo="{{ $value->costo }}" value="{{ $value->id }}">{{ $value->nombre }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="">Cantidad</label>
                            <input type="number" id="cantidad" class="form-control">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="">Costo</label>
                            <input id="costo" type="text" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-12">
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
                    <tbody id="tblInsumos">

                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-12" style="margin-top: 3%;">
            <button type="submit" class="btn btn-success btn-block">Guardar</button>
        </div>
    </div>
</form>
@endsection


@section("js")
<script>
    function colocar_costo() {
        let costo = $("#insumos option:selected").attr("costo");
        $("#costo").val(costo);
    }
    function agregar_insumo() {
        let insumo_id = $("#insumos option:selected").val();
        let insumo_text = $("#insumos option:selected").text();
        let cantidad = $("#cantidad").val();
        let costo = $("#costo").val();
        var costoxitem=0;
        var sumando=0;

//        let costoporcion = costoporciones / porciones;
        if (cantidad > 0 && costo > 0) {
            $("#tblInsumos").append(`
                    <tr id="tr-${insumo_id}">
                        <td>
                            <input type="hidden" name="insumo_id[]" value="${insumo_id}" />
                            <input type="hidden" name="cantidades[]" value="${cantidad}" />
                            ${insumo_text}
                        </td>
                        <td>${cantidad}</td>
                        <td>${costo}</td>
                        <td>${parseFloat((parseFloat(cantidad)) * parseFloat(parseFloat(costo))).toFixed(2)}</td>
                        <td>
                            <button type="button" class="btn btn-danger" onclick="eliminar_insumo(${insumo_id}, ${parseInt(cantidad) * parseInt(costo)})">X</button>
                        </td>
                    </tr>
                `);
            let precio_total = $("#precio_total").val() || 0;
            let porciones = $("#porciones").val();

            costoxitem = parseFloat(parseFloat(cantidad) * parseFloat(costo))/parseFloat(porciones);

            sumando = parseFloat(precio_total) + parseFloat(costoxitem);
            console.log('preciototal', precio_total);
            console.log('costoxitem', costoxitem);
            console.log('sumando: ', parseFloat(sumando));
            var calculocosto = parseFloat(parseFloat(parseFloat(precio_total) + parseFloat(costoxitem)) ).toFixed(2);

            $("#precio_total").val(calculocosto);

            console.log('calculocosto', parseFloat(calculocosto));
        } else {
            alert("Se debe ingresar una cantidad o precio valido");
        }
    }
    function eliminar_insumo(id, subtotal) {
        let porciones = $("#porciones").val();
        $("#tr-" + id).remove();
        let precio_total = $("#precio_total").val() || 0;
        $("#precio_total").val(parseInt(precio_total) - subtotal );
    }


</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('select').select2();
        });
    </script>
@endsection
