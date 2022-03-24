
function agregar_menu() {
    let menu_id = $("#menu option:selected").val();
    let menu_text = $("#menu option:selected").text();
    let porciones = $("#porciones").val();
    let preciomenu = $("#preciomenu").val();
    if (porciones> 0) {
        $("#tblMenus").append(`
                    <tr id="tr-${menu_id}">

                            <input type="hidden" name="menu_id[]" value="${menu_id}" precio=${preciomenu}  /> ${menu_text}
                            <input type="hidden" name="porciones[]" value="${porciones}"   /> ${porciones}


                        <td >${menu_text}</td>
                        <td name="porciones[]" porciones=${porciones}>${porciones}</td>
                        <td class="text-right py-0 align-middle">
                        <a href="#" class="btn btn-info" onclick=""><i class="fas fa-eye"></i></a>
                        <a href="#" class="btn btn-danger" onclick="eliminar_menu(${menu_id})" ><i class="fas fa-trash"></i></a>

                        </td>
                    </tr>
                `);
    } else {
        alert("Se debe ingresar un precio valido");
    }
}

function agregar_entrada() {
    let entrada_id = $("#entrada option:selected").val();
    let entrada_text = $("#entrada option:selected").text();
    let porcionesentrada = $("#porcionesentrada").val();
    if (porcionesentrada> 0) {
        $("#tblEntradas").append(`
                    <tr id="tr-${entrada_id}">

                        <input type="hidden" name="entrada_id[]"  value=${entrada_id}> ${entrada_text}</input>
                        <input type="hidden" name="porcionesentrada[]"  value=${porcionesentrada}> ${porcionesentrada}</input>

                        <td >${entrada_text}</td>
                        <td name="porcionesentrada[]" value=${porcionesentrada}>${porcionesentrada}</td>
                        <td class="text-right py-0 align-middle">
                             <button type="button" class="btn btn-danger" id="{{$entrada->id}}" onclick="eliminar_entrada(${entrada_id})"><i class="fas fa-trash"></i></button>
                             <a href="#" class="btn btn-info" onclick=""><i class="fas fa-eye"></i></a>

                        </td>
                    </tr>
                `);
    } else {
        alert("Se debe ingresar una cantidad válida");
    }
}
function agregar_plato() {
    let plato_id = $("#plato option:selected").val();
    let plato_text = $("#plato option:selected").text();
    let precio = $("#precio").val();
    if (precio > 0) {
        $("#tblPlatos").append(`
                    <tr id="tr-${plato_id}">
                        <td>
                            <input type="hidden" name="plato_id[]" value="${plato_id}" precio=${precio} /> ${plato_text}

                        </td>


                        <td>S/. ${precio}</td>
                        <td class="text-right py-0 align-middle">
                        <a href="#" class="btn btn-info" onclick="eliminar_plato(${plato_id})"><i class="fas fa-eye"></i></a>
                        <a href="#" class="btn btn-danger" onclick="eliminar_plato(${plato_id})" ><i class="fas fa-trash"></i></a>

                        </td>
                    </tr>
                `);
    } else {
        alert("Se debe ingresar un precio valido");
    }
}


function eliminar_menu(id) {
    console.log('eliminando entrada', id);
    $("#tr-" + id).remove();
}


function eliminar_entrada(id) {
    console.log('eliminando entrada', id);
    $("#tr-" + id+'.entrada').remove();
}

