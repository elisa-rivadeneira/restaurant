$('body').on('click', '#VerInsumosMenu', function (event) {
    var id = $(this).data('id');
    $.ajax({
        url: 'menu/'+id+'/porciones',
        method: "GET",
        dataType: "JSON",
        success: function (porcionesmenu) {
            $.each(porcionesmenu, function (key, diti) {
                var rows ='';
                var rows2='';


                $.each(diti, function (key, value) {
                    rows = rows + '<div class="col-md-12 text-primary d-flex justify-content-center"><B>INSUMOS ('+value.porciones+' PORCIONES)</B></br></br></div>';

                    rows2 = rows2 + '<div class="col-md-12 float-right text-primary"><B> </B></br></br></div>';

                    rows2 = rows2 + '<div class="col-md-10 align-content-center text-primary"><B>COSTO X PORCION </B></br></br></div>';
                    rows2 = rows2 + '<div class="col-md-2 float-right text-primary"><B> S/.'+value.costo+' </B></br></br></div>';

                });



                $("#porcionesmenu"+id).html(rows);
                $("#costoxporcion"+id).html(rows2);
            })


        }

    });

    $.ajax({
        url: 'menu/'+id+'/mirar',
        method: "GET",
        dataType: "JSON",
        success: function (datamenu) {
            $.each(datamenu, function (key, diti) {
                var	rows = '';

                rows = rows +'<div class="col-md-2 text-primary ">Item</div>';
                rows = rows +'<div class="col-md-2 text-primary ">Cantidad</div>';
                rows = rows +'<div class="col-md-4 text-primary">Insumo</div>';
                rows = rows +'<div class="col-md-2 text-primary">Costo </div>';
                rows = rows +'<div class="col-md-2 text-primary">SubTotal</div>';

                var i = '1';
                var totalcompra = 0;
                var subtotal=0;
                $.each(diti, function (key, value) {
                    rows = rows + '<div class="col-md-2 item" >'+i+'</div>';
                    rows = rows + '<div class="col-md-2 ">'+value.cantidad+'</div>';
                    rows = rows + '<div class="col-md-4 ">'+value.nombre+'</div>';
                    rows = rows + '<div class="col-md-2 "> S/. '+parseFloat(value.costo).toFixed(2)+'</div>';
                    rows = rows + '<div class="col-md-2 "> S/. '+parseFloat(parseFloat(value.costo).toFixed(2) * parseFloat(value.cantidad)).toFixed(2)+'</div>';
                    i++;

                    subtotal = parseFloat(parseFloat(value.costo).toFixed(2) * parseFloat(value.cantidad)).toFixed(2)

                    totalcompra = parseFloat(totalcompra) + parseFloat(subtotal);


                });
                rows = rows +'<div class="col-md-12 text-primary"><HR></div>';
                rows = rows + '<div class="col-md-10 align-content-center text-primary">COSTO TOTAL</div>';



                 rows = rows + '<div class="col-md-2 align-content-center text-primary">S/. '+parseFloat(totalcompra).toFixed(2)+'</div>';



                $("#dataorden"+id).html(rows);
            })


        }

    });






});
