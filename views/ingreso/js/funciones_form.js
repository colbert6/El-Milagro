$(function() {
   
    $("#subtotal,#total,#igv").val('0.00');
    
    $("#chbx_igv").click(function() {
        if ($("#chbx_igv").is(':checked')) {
           $("#igv").val(datos[0].VALOR); 
             
        } else {
           $("#igv").val('0.00');
        }
        setTotal(0, 1);
      
    });
     
    $("#save").click(function() {
        bval = true;
        bval = bval && $("#nrodoc").required();
        bval = bval && $("#proveedor").required();
        bval = bval && $("#id_tipopago").required();
        if ($("#id_tipopago").val() == 2) {
            bval = bval && $("#cuotas").required();
            bval = bval && $("#intervalo").required();
        }
        if (bval) {
            if ($(".row_tmp").length) {
                if($("#id_tipopago").val()==2){
                    if (!$("#CronogramaAbierto").is(':checked') || $("#estado_cronograma").val()=='0') {
                        crearCuotas();
                    }
                    if ($("#restante_cuota").val()!=0 && $("#restante_cuota").val()!='0.00') {
                        mostrar_ver_cuotas();
                        return false;
                    }
                }
                
                bootbox.confirm("¿Está seguro que desea guardar la compra?", function(result) {
                    if (result) {
                        
                        $("#celda_cronograma").html($("#grillaCuotas").html()); 
                        $("#frm").submit();
                    }
                });
                
                                
            } else {
                bootbox.alert("Agregue los Productos al detalle");
            }
        }
        return false;
    });
    
    
    $("#producto").click(function() {
        buscarInsumo();
        $("#VtnBuscarInsumo").show();
    });
    $("#AbrirVtnBuscarInsumo").click(function() {
        buscarInsumo();
        $("#VtnBuscarInsumo").show();
    });
    
    $("#proveedor").focus(function() {
        buscarProveedor();
        $("#VtnBuscarProveedor").show();
    });
    $("#AbrirVtnBuscarProveedor").click(function() {
        buscarProveedor();
        $("#VtnBuscarProveedor").show();
    });
  

    $("#cantidad").keyup(function() {
        setImporte();
    });    
    $("#precio").keyup(function() {
        setImporte();
    });
    $("#precio").blur(function(){
        var precio = parseFloat($(this).val());
        if (isNaN(precio)) {
            precio = 0;
        }
        $(this).val(precio.toFixed(2));
    });

    $("#addDetalle").click(function() {
        bval = true;
        bval = bval && $("#producto").required();
        bval = bval && $("#cantidad").required();
        bval = bval && $("#precio").required();

        if (bval) {
            if ($(".id_prod[value=" + $("#id_producto").val() + "]").length && $(".id_alm[value=" + $("#id_almacen").val() + "]").length) {
                alert("Este producto ya fue agregado");
                return false;
            }
            var html = '<tr class="row_tmp">';
            html += '<td>';
            html += '   <input type="hidden" name="id_producto[]" class="id_prod" value="' + $("#id_producto").val() + '" />' + $("#producto").val();
            html += '</td>';
            html += '<td>';
            html += '   <input type="hidden" name="cantidad[]" value="' + $("#cantidad").val() + '" />' + $("#cantidad").val();
            html += '</td>';
            html += '<td>';
            html += '   <input type="hidden" name="precio[]" value="' + $("#precio").val() + '" />' + $("#precio").val();
            html += '</td>';
            html += '<td>';
            html += '   <input type="hidden" name="importe[]" class="importe" value="' + $("#importe").val() + '" />' + $("#importe").val();
            html += '</td>';
            html += '<td>';
            html += '   <a class="btn btn-danger delete"><i class="icon-trash icon-white"></i></a>';
            html += '</td>';
            html += '</tr>';

            $("#tblDetalle").append(html);
            setTotal($("#importe").val(), 1);
            limpiar();
            quitar_cronograma_abierto()
        }
    });

    $(".delete").live('click', function() {
        var i = $(this).parent().parent().index();
        var importe = $("#tblDetalle tr:eq(" + i + ") td .importe").val();
        $("#tblDetalle tr:eq(" + i + ")").remove();
        setTotal(importe, 0);
    });
    
    $("#reg_proveedor").click(function() {
        rs = $("#razonsocialprov").val();
        prov = $("#nombreprov").val();
        ruc = $("#rucprov").val();
        dir = $("#direccionprov").val();
        tel = $("#telefmovilprov").val();
        email = $("#emailprov").val();
        if (rs == "") {
            alert("Ingrese Razon Social");
            $("#razonsocialprov").focus();
        }
        else {
            if (ruc == "") {
                alert("Ingrese Ruc");
                $("#rucprov").focus();
            }
            else {
                if (dir == "") {
                    alert("Ingrese Direccion");
                    $("#direccionprov").focus();
                }
                else {
                    if (tel == "") {
                        alert("Ingrese Telefono");
                        $("#telefmovilprov").focus();
                    }
                    else {
                        if (email == "") {
                            alert("Ingrese Email");
                            $("#emailprov").focus();
                        }
                        else {
                                $.post(url + 'compra/inserta_prov', 'dir=' + $("#direccionprov").val() + '&rs=' + $("#razonsocialprov").val() +
                                        '&em=' + $("#emailprov").val() + '&ciu=' + $("#ciudadprov").val() + '&ruc=' + $("#rucprov").val() + '&tel=' + $("#telefmovilprov").val(), function(datos) {
                                    $("#id_proveedor").val(datos.id_proveedor);
                                    $("#proveedor").val($("#razonsocialprov").val());
                                    $("#ruc_prov").val($("#rucprov").val());
                                    $('#modalNuevoProveedor').modal('hide');
                                    $("#razonsocialprov,#rucprov,#direccionprov,#telefmovilprov,#emailprov,#ciudadprov").val('');
                                }, 'json')
                            
                        }
                    }
                }
            }
        }
    });
});

function setImporte() {
    var cantidad = $("#cantidad").val();
    cantidad = parseInt(cantidad);
    if (isNaN(cantidad)) {
        cantidad = 0;
    }
    var precio = $("#precio").val();
    precio = parseFloat(precio);
    if (isNaN(precio)) {
        precio = 0;
    }
    var importe;
    importe = cantidad * precio;
    $("#importe").val(importe.toFixed(2));
}

function setTotal(importe, aumenta) {
    var subtotal = $("#subtotal").val();
    subtotal = parseFloat(subtotal);
    if (isNaN(subtotal)) {
        subtotal = 0;
    }
    var igv = $("#igv").val();
    igv = parseFloat(igv);
    if (isNaN(igv)) {
        igv = 0;
    }
    if (aumenta) {
        subtotal = subtotal + parseFloat(importe);
    } else {
        subtotal = subtotal - parseFloat(importe);
    }
    $("#subtotal").val(subtotal.toFixed(2));
    var total = subtotal + subtotal * igv;
    $("#total").val(total.toFixed(2));
}
function buscarInsumo() {
    $("#grillaInsumo").html('<div class="page-header"><img src="'+url+'public/img/loading.gif" /></div>');
    $("#grillaProveedor").html('<div class="page-header"><img src="'+url+'public/img/loading.gif" /></div>');
    
    $.post(url + 'producto/buscador', function(datos) {
        var HTML = '<table id="table2" class="display" cellspacing="0" width="100%">' +
                '<thead>' +
                '<tr>' +
                '<th>Cod</th>'+
                '<th>Cod Barra</th>'+
                '<th>Descripcion</th>'+
                '<th>Precio Costo</th>'+
                '<th>Acciones</th>'+
                '</tr>' +
                '</thead>' +
                '<tbody>';

        for (var i = 0; i < datos.length; i++) {
            HTML = HTML + '<tr>';
            HTML = HTML + '<td>0000'+datos[i].id_producto+'</td>';
            HTML = HTML + '<td>'+datos[i].codigo_barra+'</td>';
            var nombre = datos[i].marca+' '+datos[i].tipo_producto+' '+datos[i].descripcion+' '+datos[i].contenido;
            HTML = HTML + '<td>'+nombre+'</td>';
            HTML = HTML + '<td>'+datos[i].ult_precio_compra;+'</td>';
            var id_producto = datos[i].id_producto;
            var precioc = datos[i].ult_precio_compra;
            HTML = HTML + '<td><a style="margin-right:4px" href="javascript:void(0)" onclick="sel_insumo(\'' + id_producto + '\',\'' + nombre + '\',\'' + precioc + '\')" class="btn btn-success"><i class="icon-ok icon-white"></i> </a>';
            HTML = HTML + '</td>';
            HTML = HTML + '</tr>';
        }
        HTML = HTML + '</tbody></table>'
        $("#grillaInsumo").html(HTML);
        $("#jsfoot").html('<script src="' + url + 'views/ingreso/js/run_table.js"></script>');
    }, 'json');
    
}

function buscarProveedor() {
    $("#grillaInsumo").html('<div class="page-header"><img src="'+url+'public/img/loading.gif" /></div>');
    $("#grillaProveedor").html('<div class="page-header"><img src="'+url+'public/img/loading.gif" /></div>');
    $.post(url + 'proveedor/buscador', function(datos) {
        var HTML = '<table id="table2" class="display" cellspacing="0" width="100%">' +
                '<thead>' +
                '<tr>' +
                '<th>Item</th>' +
                '<th>Razon Social</th>' +
                '<th>Ruc</th>' +
                '<th>Acciones</th>' +
                '</tr>' +
                '</thead>' +
                '<tbody>';

        for (var i = 0; i < datos.length; i++) {
            HTML = HTML + '<tr>';
            HTML = HTML + '<td>' + (i + 1) + '</td>';
            HTML = HTML + '<td>' + datos[i].razon_social + '</td>';
            HTML = HTML + '<td>' + datos[i].ruc + '</td>';
            var idproveedor = datos[i].id_proveedor;
            var descripcion = $.trim(datos[i].razon_social);
            var ruc         = datos[i].ruc;
            HTML = HTML + '<td><a style="margin-right:4px" href="javascript:void(0)" onclick="sel_proveedor(\'' + idproveedor + '\',\'' + descripcion + '\',\'' + ruc + '\')" class="btn btn-success"><i class="icon-ok icon-white"></i> </a>';
            HTML = HTML + '</td>';
            HTML = HTML + '</tr>';
        }
        HTML = HTML + '</tbody></table>';
        $("#grillaProveedor").html(HTML);
        $("#jsfoot").html('<script src="' + url + 'views/ingreso/js/run_table.js"></script>');
    }, 'json');
}

function sel_insumo(id_p,d, pc) {
    $("#cantidad,#precio").attr('disabled', false);
    $("#id_producto").val(id_p);
    $("#producto").val(d);
    $("#precio").val(parseFloat(pc).toFixed(2));
    $('#modalInsumo').modal('hide');
    $("#cantidad").focus();
    setImporte()
}

function sel_proveedor(id_p, d,ruc) {
    $("#id_proveedor").val(id_p);
    $("#proveedor").val(d);
    $("#ruc_prov").val(ruc);
    $('#modalProveedor').modal('hide');
    $("#id_tipopago").focus();
}

function limpiar() {
    $("#id_producto,#producto,#id_almacen,#stockactual,#producto,#cantidad,#precio,#importe").val('');
    $("#cantidad,#precio").attr('disabled', true);
    
}

function limpiar_cuotas() {
    for(var i=1;i<=$("#cuotas").val();i++){
        $("#monto_cuota"+i).val('0.00');
    }
    $("#restante_cuota").val($("#total").val());
    
}

function montoCuota(num) {
    var restante,
        suma_monto_cuotas=0,
        total=$("#total").val();
    
    if (isNaN($("#monto_cuota"+num).val()) || $("#monto_cuota"+num).val()=='') {
        $("#monto_cuota"+num).val('0.00');
    }else{
         var valor=(parseFloat($("#monto_cuota"+num).val()).toFixed(2));
        $("#monto_cuota"+num).val(valor);
    }

    for(var i=1;i<=$("#cuotas").val();i++){
        suma_monto_cuotas=(parseFloat(suma_monto_cuotas)+parseFloat($("#monto_cuota"+i).val())).toFixed(2);
    }
    restante=(parseFloat(total)-parseFloat(suma_monto_cuotas)).toFixed(2);
    
    if(restante<0){
       var exceso= (parseFloat($("#monto_cuota"+num).val())+parseFloat(restante)).toFixed(2);
       $("#monto_cuota"+num).val(exceso)
       $("#restante_cuota").val('0.00');
       $("#guardar_cuotas").show();
    }else{
       $("#restante_cuota").val(restante);
       if(restante==0){
           $("#guardar_cuotas").show();
       }else{
          $("#guardar_cuotas").hide();
       }
       
    }
    
}
