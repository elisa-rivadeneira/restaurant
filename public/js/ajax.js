

$('body').on('click', '#mirarOrden', function (event) {
    var id = $(this).data('id');
    $.ajax({
        url: 'orden/' + id + '/mirarmenus',
        method: "GET",
        dataType: "JSON",
        success: function (datamenus) {
            console.log(datamenus);
            $.each(datamenus, function (key, diti) {
                var rows = '';
                rows = rows + '<div class="col-md-12 text-primary d-flex justify-content-center">MENUS PEDIDOS</div>';

                rows = rows + '<div class="col-md-4 text-primary ">Cantidad</div>';
                rows = rows + '<div class="col-md-8 text-primary">Plato de Fondo</div>';
                var i = '1';

                $.each(diti, function (key, value) {
                    rows = rows + '<div class="col-md-4 ">' + value.cantidad + '</div>';
                    rows = rows + '<div class="col-md-8 ">' + value.nombre + '</div>';
                    i++;
                });


                $("#datamenus" + id).html(rows);
            })


        }

    });

    $.ajax({
        url: 'orden/' + id + '/mirarentradas',
        method: "GET",
        dataType: "JSON",
        success: function (dataentradas) {
            console.log(dataentradas);
            $.each(dataentradas, function (key, diti) {
                var rows = '';
                rows = rows + '<div class="col-md-12 text-primary d-flex justify-content-center">ENTRADAS PEDIDOS</div>';

                rows = rows + '<div class="col-md-4 text-primary ">Cantidad</div>';
                rows = rows + '<div class="col-md-8 text-primary">Entrada</div>';
                var i = '1';

                $.each(diti, function (key, value) {
                    rows = rows + '<div class="col-md-4 ">' + value.cantidad + '</div>';
                    rows = rows + '<div class="col-md-8 ">' + value.nombre + '</div>';
                    i++;
                });


                $("#dataentradas" + id).html(rows);
            })


        }

    });
});



    $('body').on('click', '#mirarMenusss', function (event) {
        var id = $(this).data('id');
        $.ajax({
            url: 'orden/'+id+'/mirar',
            method: "GET",
            dataType: "JSON",
            success: function (dataorden) {
                console.log(dataorden);
                $.each(dataorden, function (key, diti) {
                    var	rows = '';
                    rows = rows + '<div class="col-md-12 text-primary d-flex justify-content-center">PLATOS A LA CARTA</div>';

                    rows = rows +'<div class="col-md-2 text-primary ">Item</div>';
                    rows = rows +'<div class="col-md-2 text-primary ">Cantidad</div>';
                    rows = rows +'<div class="col-md-8 text-primary">Plato</div>';
                    var i = '1';

                    $.each(diti, function (key, value) {
                        rows = rows + '<div class="col-md-2 item" >'+i+'</div>';
                        rows = rows + '<div class="col-md-2 ">'+value.cantidad+'</div>';
                        rows = rows + '<div class="col-md-8 ">'+value.plato+'</div>';
                        i++;
                    });


                    $("#dataorden"+id).html(rows);
                })


            }

        });

    $.ajax({
        url: 'orden/'+id+'/mirarmenus',
        method: "GET",
        dataType: "JSON",
        success: function (datamenu) {
            console.log(datamenu);
            $.each(datamenu, function (key, diti) {


                var	rows = '';

                rows = rows + '<div class="col-md-12 text-primary d-flex justify-content-center">MENUS</div>';

                rows = rows +'<div class="col-md-2 text-primary">Item</div>';
                rows = rows +'<div class="col-md-2 text-primary ">Cantidad</div>';
                rows = rows +'<div class="col-md-4 text-primary">Entrada</div>';
                rows = rows +'<div class="col-md-4 text-primary">Menu</div>';

                var maximum = null;

                $('.item').each(function() {
                    var value = parseFloat($(this).text());
                    maximum = (value > maximum) ? value : maximum;
                });
                var i = parseInt(maximum + 1);


                $.each(diti, function (key, value) {

                    rows = rows + '<div class="col-md-2 ">'+i+'</div>';
                    rows = rows + '<div class="col-md-2 ">'+value.cantidad+'</div>';
                    rows = rows + '<div class="col-md-4 ">'+value.entrada+'</div>';
                    rows = rows + '<div class="col-md-4 ">'+value.menu+'</div>';
                    i++;
                    $("#menuorden"+id).html(rows);

                });


            })


        }

    });




});



$('body').on('click', '#cobrarOrden', function (event) {
    var id = $(this).data('id');
    $.ajax({
        url: 'orden/' + id + '/mirarmenus',
        method: "GET",
        dataType: "JSON",
        success: function (datamenus) {
            console.log('esta es la datamenus',datamenus);
            $.each(datamenus, function (key, diti) {
                var rows = '';

                rows = rows + '<div class="col-4  bg-orange text-primary ">Cantidad</div>';
                rows = rows + '<div class="col-8  bg-orange text-primary">Plato de Fondo</div>';
                var i = '1';

                $.each(diti, function (key, value) {
                    rows = rows + '<div class="col-4 ">' + value.cantidad + '</div>';
                    rows = rows + '<div class="col-8 ">' + value.nombre + '</div>';
                    i++;
                });


                $("#datamenuscobrar" + id).html(rows);
            })


        }

    });

    $.ajax({
        url: 'orden/' + id + '/mirarentradas',
        method: "GET",
        dataType: "JSON",
        success: function (dataentradas) {
            console.log(dataentradas);
            $.each(dataentradas, function (key, diti) {
                var rows = '';

                rows = rows + '<div class="col-4 bg-geranio text-primary ">Cantidad</div>';
                rows = rows + '<div class="col-8 bg-geranio text-primary">Entrada</div>';
                var i = '1';

                $.each(diti, function (key, value) {
                    rows = rows + '<div class="col-4 ">' + value.cantidad + '</div>';
                    rows = rows + '<div class="col-8 ">' + value.nombre + '</div>';
                    i++;
                });


                $("#dataentradascobrar" + id).html(rows);
            })


        }

    });

    $.ajax({
        url: 'orden/' + id + '/montoacobrar',
        method: "GET",
        dataType: "JSON",
        success: function (montoacobrar) {
            console.log('Monto a cobrar',montoacobrar);
            $.each(montoacobrar, function (key, diti) {
                var rows = '';

                rows = rows + '<div class="col-6 bg-primary ">Nro de Menus</div>';
                rows = rows + '<div class="col-6 bg-primary">MONTO A COBRAR</div>';
                var i = '1';

                $.each(diti, function (key, value) {
                    rows = rows + '<div class="col-6 ">' + value.cantidad + '</div>';
                    rows = rows + '<div class="col-6 ">S/. ' + value.total + '</div>';
                    i++;
                });


                $("#datacobrar" + id).html(rows);
            })


        }

    });


});

$('body').on('click', '#verVenta', function (event) {
    var id = $(this).data('id');
    $.ajax({
        url: 'orden/' + id + '/mirarmenus',
        method: "GET",
        dataType: "JSON",
        success: function (datamenus) {
            console.log('esta es la datamenus',datamenus);
            $.each(datamenus, function (key, diti) {
                var rows = '';
                rows = rows + '<div class="col-md-12 text-primary d-flex justify-content-center">MENUS PEDIDOS</div>';

                rows = rows + '<div class="col-md-4 text-primary ">Cantidad</div>';
                rows = rows + '<div class="col-md-8 text-primary">Plato de Fondo</div>';
                var i = '1';

                $.each(diti, function (key, value) {
                    rows = rows + '<div class="col-md-4 ">' + value.cantidad + '</div>';
                    rows = rows + '<div class="col-md-8 ">' + value.nombre + '</div>';
                    i++;
                });


                $("#datamenusventa" + id).html(rows);
            })


        }

    });

    $.ajax({
        url: 'orden/' + id + '/mirarentradas',
        method: "GET",
        dataType: "JSON",
        success: function (dataentradas) {
            console.log(dataentradas);
            $.each(dataentradas, function (key, diti) {
                var rows = '';
                rows = rows + '<div class="col-md-12 text-primary d-flex justify-content-center">ENTRADAS PEDIDOS</div>';

                rows = rows + '<div class="col-md-4 text-primary ">Cantidad</div>';
                rows = rows + '<div class="col-md-8 text-primary">Entrada</div>';
                var i = '1';

                $.each(diti, function (key, value) {
                    rows = rows + '<div class="col-md-4 ">' + value.cantidad + '</div>';
                    rows = rows + '<div class="col-md-8 ">' + value.nombre + '</div>';
                    i++;
                });


                $("#dataentradasventa" + id).html(rows);
            })


        }

    });

    $.ajax({
        url: 'orden/' + id + '/montoacobrar',
        method: "GET",
        dataType: "JSON",
        success: function (montoacobrar) {
            console.log('Monto a cobrar',montoacobrar);
            $.each(montoacobrar, function (key, diti) {
                var rows = '';
                rows = rows + '<div class="col-md-12 text-primary d-flex justify-content-center">MONTO A COBRAR</div>';

                rows = rows + '<div class="col-md-6 text-primary ">Nro de Menus</div>';
                rows = rows + '<div class="col-md-6 text-primary">TOTAL</div>';
                var i = '1';

                $.each(diti, function (key, value) {
                    rows = rows + '<div class="col-md-6 ">' + value.cantidad + '</div>';
                    rows = rows + '<div class="col-md-6 ">' + value.total + '</div>';
                    i++;
                });


                $("#ventatotal" + id).html(rows);
            })


        }

    });


});


$('body').on('click', '#cobrarOrdenBackup', function (event) {
    var id = $(this).data('id');
    $.ajax({
        url: 'orden/'+id+'/mostrarcobrarmenus',
        method: "GET",
        dataType: "JSON",
        success: function (dataplatos) {
            $.each(dataplatos, function (key, diti) {
                var	rows = '';
                var	totalplatos = 0;

                var i = '1';
                console.log('esta es la variable diti', diti.length)

                if (diti.length!=0){

                    rows = rows + '<div class="row col-md-12 text-primary font-weight-bold mb-3" >';
                    rows = rows + '<div class="col-md-1 text-primary">Item</div>';
                    rows = rows + '<div class="col-md-1">Cant.</div>';
                    rows = rows + '<div class="col-md-6">Descripcion</div>';
                    rows = rows + '<div class="col-md-2">P. Unit.</div>';
                    rows = rows + '<div class="col-md-2">Subtotal</div>';

                    rows = rows + '</div>';



                    $.each(diti,function (key, value) {

                    rows = rows + '<div class="col-md-1 itemplato">' + i + '</div>';
                    rows = rows + '<div class="col-md-1 ">' + value.cantidadplato + '</div>';
                    rows = rows + '<div class="col-md-6 ">' + value.nombreplato + '</div>';
                    rows = rows + '<div class="col-md-2 ">S/.' + value.precioplato + '</div>';

                    rows = rows + '<div class="col-md-2 mb-3">S/.' + parseFloat(value.precioplato * value.cantidadplato).toFixed(2) + '</div> '
                    totalplatos = parseFloat(totalplatos +  parseFloat(parseFloat(value.precioplato) * parseFloat(value.cantidadplato))) ;

                    i++;
                });

                }
                rows = rows + '<div class="col-md-12 mb-3 d-none" id="totalplatos" suma="'+totalplatos+'" > TOTALPLATOS: ' + totalplatos+ '</div> '

                $("#platoordencobrar"+id).html(rows);

            })


        }

    });


    $.ajax({
        url: 'orden/'+id+'/mostrarcobrarmenusbackup',
        method: "GET",
        dataType: "JSON",
        success: function (datamenus) {
            $.each(datamenus, function (key, diti) {
                var	rows = '';
                var	totalmenus = 0;

                var totalplatos= $('#totalplatos').html();
                var i = '1';
                if(diti.length != 0)  {
                    rows = rows + '<div class="row col-md-12 text-primary font-weight-bold mb-3">';
                    rows = rows + '<div class="col-md-1 text-primary">Item</div>';
                    rows = rows + '<div class="col-md-1">Cant.</div>';
                    rows = rows + '<div class="col-md-3">Entrada</div>';
                    rows = rows + '<div class="col-md-3">Menu</div>';
                    rows = rows + '<div class="col-md-2">P. Unit</div>';
                    rows = rows + '<div class="col-md-2">SubTotal</div>';
                    rows = rows + '</div>';



                    $.each(diti, function (key, value) {
                        console.log(value);

                        rows = rows + '<div class="col-md-1 ">' + i + '</div>';
                        rows = rows + '<div class="col-md-1 ">' + value.cantidadmenu + '</div>';
                        rows = rows + '<div class="col-md-3 ">' + value.entrada + '</div>';
                        rows = rows + '<div class="col-md-3 ">' + value.menu + '</div>';
                        rows = rows + '<div class="col-md-2 float-right ">S/.' + parseFloat(value.precio).toFixed(2) + '</div>';
                        rows = rows + '<div class="col-md-2 float-right ">S/.' + parseFloat(value.precio * value.cantidadmenu).toFixed(2) + '</div>';


                        totalmenus = parseFloat(totalmenus + parseFloat(parseFloat(value.precio) * parseFloat(value.cantidadmenu)));

                        i++;

                    });

              }

                    rows = rows + '<div class="col-md-12 mb-3 d-none " id="totalmenus" suma="'+totalmenus+'"> TOTAL MENUS:' + totalmenus+ '</div> '




                $("#menuordencobrar"+id).html(rows);

            })

        }
    });



    function sumamenu(){



        var sumamenus =parseFloat($("#totalmenus").attr('suma'));
        console.log('variable sumatoria de sumac ', sumamenus);

        var sumaplatos = parseFloat($('#totalplatos').attr('suma'));
        console.log('variable sumatoria de sumaplatos ', sumaplatos);

        if(typeof(sumaplatos) == "undefined" || sumaplatos == null || sumaplatos =='') {
            sumaplatos=0;
        }
        if(typeof(sumamenus) == "undefined" || sumamenus == null || sumamenus =='') {
            sumamenus=0;
        }

        var total='';
        total = parseFloat(sumamenus +  sumaplatos).toFixed(2) ;

        var	rows = '';

        console.log('variable total es ', total)

        rows = rows + '<div class="col-md-10 font-weight-bold bg-light p-3 mt-2"> TOTAL A COBRAR:</div>';
        rows = rows + '<div class="col-md-2 font-weight-bold bg-light p-3 mt-2">S/.'+ total +'</div>';

        $("#cobrarorden"+id).html(rows);



    }
    setTimeout(sumamenu, 1000);













});







$('body').on('click', '#verVentaborrar', function (event) {
    var id = $(this).data('id');
    $.ajax({
        url: 'orden/'+id+'/mirar',
        method: "GET",
        dataType: "JSON",
        success: function (data) {
            console.log(data);
            $.each(data, function (key, diti) {
                var	rows = '';
                var	total = '';
                $.each(diti,function (key, value) {
                    rows = rows + '<div class="col-md-2 ">' + value.cantidad + '</div>';
                    rows = rows + '<div class="col-md-9 ">' + value.nombre + '</div>';
                    rows = rows + '<div class="col-md-1 mb-3">' + value.precio * value.cantidad + '</div> '
                    total = parseFloat(total +  parseFloat(parseFloat(value.precio) * parseFloat(value.cantidad))) ;
                });
                rows = rows + '<div class="col-md-11 font-weight-bold "> TOTAL A COBRAR : </div>';
                rows = rows + '<div class="col-md-1 font-weight-bold ">'+ total +'</div>';

                $("#dataordencobrar"+id).html(rows);
            })


        }

    });

});

$('body').on('click', '#verVentaBACKUP', function (event) {
    var id = $(this).data('id');
    $.ajax({
        url: 'orden/'+id+'/mostrarcobrarplatos',
        method: "GET",
        dataType: "JSON",
        success: function (dataplatos) {
            $.each(dataplatos, function (key, diti) {
                var	rows = '';
                var	totalplatos = 0;

                var i = '1';
                console.log('esta es la variable diti de platos', diti.length, diti)

                if (diti.length!=0){

                    rows = rows + '<div class="row col-md-12 text-primary font-weight-bold mb-3" >';
                    rows = rows + '<div class="col-md-1 text-primary">Item</div>';
                    rows = rows + '<div class="col-md-1">Cant.</div>';
                    rows = rows + '<div class="col-md-6">Descripcion</div>';
                    rows = rows + '<div class="col-md-2">P. Unit.</div>';
                    rows = rows + '<div class="col-md-2">Subtotal</div>';

                    rows = rows + '</div>';



                    $.each(diti,function (key, value) {

                        rows = rows + '<div class="col-md-1 itemplato">' + i + '</div>';
                        rows = rows + '<div class="col-md-1 ">' + value.cantidadplato + '</div>';
                        rows = rows + '<div class="col-md-6 ">' + value.nombreplato + '</div>';
                        rows = rows + '<div class="col-md-2 ">S/.' + value.precioplato + '</div>';

                        rows = rows + '<div class="col-md-2 mb-3">S/.' + parseFloat(value.precioplato * value.cantidadplato).toFixed(2) + '</div> '
                        totalplatos = parseFloat(totalplatos +  parseFloat(parseFloat(value.precioplato) * parseFloat(value.cantidadplato))) ;

                        i++;
                    });

                }
                rows = rows + '<div class="col-md-12 mb-3 d-none" id="totalplatos" suma="'+totalplatos+'" > TOTALPLATOS: ' + totalplatos+ '</div> '

                $("#platosventa"+id).html(rows);

            })


        }

    });


    $.ajax({
        url: 'orden/'+id+'/mostrarcobrarmenus',
        method: "GET",
        dataType: "JSON",
        success: function (datamenus) {
            $.each(datamenus, function (key, diti) {
                var	rows = '';
                var	totalmenus = 0;

                var totalplatos= $('#totalplatos').html();


                var i = '1';

                console.log('esta es la variable diti de menus', diti.length, diti)


                if(diti.length != 0)  {
                    rows = rows + '<div class="row col-md-12 text-primary font-weight-bold mb-3">';
                    rows = rows + '<div class="col-md-1 text-primary">Item</div>';
                    rows = rows + '<div class="col-md-1">Cant.</div>';
                    rows = rows + '<div class="col-md-3">Entrada</div>';
                    rows = rows + '<div class="col-md-3">Menu</div>';
                    rows = rows + '<div class="col-md-2">P. Unit</div>';
                    rows = rows + '<div class="col-md-2">SubTotal</div>';
                    rows = rows + '</div>';



                    $.each(diti, function (key, value) {
                        console.log(value);

                        rows = rows + '<div class="col-md-1 ">' + i + '</div>';
                        rows = rows + '<div class="col-md-1 ">' + value.cantidadmenu + '</div>';
                        rows = rows + '<div class="col-md-3 ">' + value.entrada + '</div>';
                        rows = rows + '<div class="col-md-3 ">' + value.menu + '</div>';
                        rows = rows + '<div class="col-md-2 float-right ">S/.' + parseFloat(value.precio).toFixed(2) + '</div>';
                        rows = rows + '<div class="col-md-2 float-right ">S/.' + parseFloat(value.precio * value.cantidadmenu).toFixed(2) + '</div>';


                        totalmenus = parseFloat(totalmenus + parseFloat(parseFloat(value.precio) * parseFloat(value.cantidadmenu)));

                        i++;

                    });

                }

                rows = rows + '<div class="col-md-12 mb-3 d-none " id="totalmenus" suma="'+totalmenus+'"> TOTAL MENUS:' + totalmenus+ '</div> '




                $("#menusventa"+id).html(rows);

            })

        }
    });

    function sumamenu(){

        var sumamenus =parseFloat($("#totalmenus").attr('suma'));
        console.log('variable sumatoria de sumac ', sumamenus);

        var sumaplatos = parseFloat($('#totalplatos').attr('suma'));
        console.log('variable sumatoria de sumaplatos ', sumaplatos);

        if(typeof(sumaplatos) == "undefined" || sumaplatos == null || sumaplatos =='') {
            sumaplatos=0;
        }
        if(typeof(sumamenus) == "undefined" || sumamenus == null || sumamenus =='') {
            sumamenus=0;
        }

        var total='';
        total = parseFloat(sumamenus +  sumaplatos).toFixed(2) ;

        var	rows = '';

        console.log('variable total es ', total)

        rows = rows + '<div class="col-md-10 font-weight-bold bg-light p-3 mt-2"> MONTO DE VENTA :</div>';
        rows = rows + '<div class="col-md-2 font-weight-bold bg-light p-3 mt-2">S/.'+ total +'</div>';

        $("#ventatotal"+id).html(rows);



    }
    setTimeout(sumamenu, 1000);













});





// FUNCIONES PARA COMPRAS

$('body').on('click', '#mirarCompra', function (event) {
    var id = $(this).data('id');
    $.ajax({
        url: 'compra/'+id+'/mirar',
        method: "GET",
        dataType: "JSON",
        success: function (dataplato) {
            console.log(dataplato);
            $.each(dataplato, function (key, diti) {
                var	rows = '';
                rows = rows + '<div class="col-md-12 text-primary d-flex justify-content-center"><B>LISTADO DE COMPRA</B></br></br></div>';

                rows = rows +'<div class="col-md-2 text-primary ">Item</div>';
                rows = rows +'<div class="col-md-2 text-primary ">Cantidad</div>';
                rows = rows +'<div class="col-md-4 text-primary">Insumo</div>';
                rows = rows +'<div class="col-md-2 text-primary">Costo</div>';
                rows = rows +'<div class="col-md-2 text-primary">SubTotal</div>';

                var i = '1';
                var totalcompra = 0;
                $.each(diti, function (key, value) {
                    rows = rows + '<div class="col-md-2 item" >'+i+'</div>';
                    rows = rows + '<div class="col-md-2 ">'+value.cantidad+'</div>';
                    rows = rows + '<div class="col-md-4 ">'+value.nombre+'</div>';
                    rows = rows + '<div class="col-md-2 "> S/. '+parseFloat(value.costo).toFixed(2)+'</div>';
                    rows = rows + '<div class="col-md-2 "> S/. '+parseFloat(parseFloat(value.costo).toFixed(2) * parseFloat(value.cantidad)).toFixed(2)+'</div>';
                    i++;
                    totalcompra = parseFloat(parseFloat(parseFloat(value.costo) * parseFloat(value.cantidad)) + parseFloat(totalcompra)).toFixed(2);

                });
                rows = rows +'<div class="col-md-12 text-primary"><HR></div>';
                rows = rows + '<div class="col-md-10 align-content-center text-primary">TOTAL</div>';
                rows = rows + '<div class="col-md-2 align-content-center text-primary">S/. '+totalcompra+'</div>';



                $("#dataorden"+id).html(rows);
            })


        }

    });


    $.ajax({
        url: 'orden/'+id+'/mirarmenus',
        method: "GET",
        dataType: "JSON",
        success: function (datamenu) {
            console.log(datamenu);
            $.each(datamenu, function (key, diti) {


                var	rows = '';

                rows = rows + '<div class="col-md-12 text-primary d-flex justify-content-center">MENUS</div>';

                rows = rows +'<div class="col-md-2 text-primary">Item</div>';
                rows = rows +'<div class="col-md-2 text-primary ">Cantidad</div>';
                rows = rows +'<div class="col-md-4 text-primary">Entrada</div>';
                rows = rows +'<div class="col-md-4 text-primary">Menu</div>';

                var maximum = null;

                $('.item').each(function() {
                    var value = parseFloat($(this).text());
                    maximum = (value > maximum) ? value : maximum;
                });
                var i = parseInt(maximum + 1);


                $.each(diti, function (key, value) {

                    rows = rows + '<div class="col-md-2 ">'+i+'</div>';
                    rows = rows + '<div class="col-md-2 ">'+value.cantidad+'</div>';
                    rows = rows + '<div class="col-md-4 ">'+value.entrada+'</div>';
                    rows = rows + '<div class="col-md-4 ">'+value.menu+'</div>';
                    i++;
                    $("#menuorden"+id).html(rows);

                });


            })


        }

    });




});



