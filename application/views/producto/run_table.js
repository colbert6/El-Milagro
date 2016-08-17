$(document).ready(function() {
    //var base_url definida en header
    var table =$('#tab').DataTable( {

        "processing": true,
        "ajax": {
            "url": base_url+"producto/cargar_datos/",
            "type": "POST"
        },
        "columns": [
            { "data": "codigo_barra" },
            { "data": "id_producto" },
            { "data": "marca_desc" },
            { "data": "tipo_producto_desc" }, 
            { "data": "descripcion_2" },
            { "data": "fraccion" },  
            { "data": "ult_precio_compra" }, 
            { "data": "ult_precio_venta" }, 
            { "data": "ult_modificacion" },  
            {
                "className":      'editar-data',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            },  
            {
                "className":      'editar_precio-data',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            }
        ],
        "bPaginate": true,
        "bLengthChange": true,
        "bFilter": true,
        "bSort": true,
        "bInfo": true,
        "bAutoWidth": false,
        "oLanguage" :{
            'sProcessing':     'Cargando...',
            'sLengthMenu':     'Mostrar _MENU_ registros',
            'sZeroRecords':    'No se encontraron resultados',
            'sEmptyTable':     'Ningún dato disponible en esta tabla',
            'sInfo':           'Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros',
            'sInfoEmpty':      'Mostrando registros del 0 al 0 de un total de 0 registros',
            'sInfoFiltered':   '(filtrado de un total de _MAX_ registros)',
            'sInfoPostFix':    '',
            'sSearch':         'Buscar:',
            'sUrl':            '',
            'sInfoThousands':  '',
            'sLoadingRecords': 'Cargando...',
            'oPaginate': {
                'sFirst':    'Primero',
                'sLast':     'Último',
                'sNext':     'Siguiente',
                'sPrevious': 'Anterior'
            },
            'oAria': {
                'sSortAscending':  ': Activar para ordenar la columna de manera ascendente',
                'sSortDescending': ': Activar para ordenar la columna de manera descendente'
            }
        },
        "columnDefs": [
                    {
                        "targets": [ 0 ],
                        "visible": false
                    },
                    {
                        "targets": [ 5 ],
                        "visible": false
                    }],
        'aaSorting': [[ 0, 'asc' ]],//ordenar
        'iDisplayLength': 10,
        'aLengthMenu': [[5, 10, 20], [5, 10, 20]]
    } );
    
    $('#nuevo_modal').on('click', function () {      //Limpiar los datos del modal-form
        $("#id_producto").val('');
        $("#codigo_barra").val('');
        $("#id_marca").val('');
        $("#id_tipo_producto").val('');
        $("#presentacion").val('');
        $("#descripcion").val('');
        $("#contenido").val('');
        $("#solo_entero").prop("checked", "checked");
        $("#fraccion").val('1');
        $("#fraccion").attr('readonly', true);
        $("#ult_precio_compra").val('');
        $("#utilidad").val('15');
        $("#ult_precio_venta").val('');

        var campos_form = ["descripcion","abreviatura"];
        quitar_formato(campos_form);

    } );

    $('#tab tbody').on('click', 'td.editar-data', function () { //Agregar los datos correspondientes al modal-form
        var tr = $(this).closest('tr');
        var row = table.row( tr );
        $("#id_producto").val(row.data().id_producto);
        $("#codigo_barra").val(row.data().codigo_barra);
        $("#id_marca").val(row.data().id_marca);
        $("#id_tipo_producto").val(row.data().id_tipo_producto);
        $("#presentacion").val(row.data().presentacion);
        $("#descripcion").val(row.data().descripcion);
        $("#contenido").val(row.data().contenido);
        $("#fraccion").val(row.data().fraccion);
        $("#ult_precio_compra").val(row.data().ult_precio_compra);
        $("#utilidad").val(row.data().utilidad);
        $("#ult_precio_venta").val(row.data().ult_precio_venta);

        var campos_form = ["id_marca","id_tipo_producto","descripcion"];
        quitar_formato(campos_form);

        $("#modal_form").modal({show: true});
    } );

    $('#tab tbody').on('click', 'td.editar_precio-data', function () { //Agregar los datos correspondientes al modal-delete
        var tr = $(this).closest('tr');
        var row = table.row( tr );
        $("#id_producto_editar_precio").val(row.data().id_producto);
        $("#descripcion_editar_precio").val(row.data().marca_desc+' '+row.data().tipo_producto_desc+' '+row.data().descripcion_2);
        $("#ult_precio_compra_editar_precio").val(row.data().ult_precio_compra);
        $("#utilidad_editar_precio").val(row.data().utilidad);
        $("#ult_precio_venta_editar_precio").val(row.data().ult_precio_venta);

        $("#nuevo_precio_compra").val(row.data().ult_precio_compra);
        $("#nueva_utilidad").val(row.data().utilidad);
        $("#nuevo_precio_venta").val(row.data().ult_precio_venta);

        $("#modal_form_editar_precio").modal({show: true});
    } );

    $('#tab tbody').on('click', 'td.eliminar-data', function () { //Agregar los datos correspondientes al modal-delete
        var tr = $(this).closest('tr');
        var row = table.row( tr );
        $("#modal_delete").modal({show: true});
        $("#id_dato_eliminar").val(row.data().id_producto);
        $('#desc_dato_eliminar').html(row.data().descripcion_2);

    } );

    $('#submit_form').on('click', function () {        //Enviar los datos del modal-form a guardar en el controlador
        var campos_form = ["id_marca","id_tipo_producto","descripcion"];//campos que queremos que se validen
        if(!validar_form(campos_form)){
            return false;            
        }

        i = $("#id_producto").val();
        b = $("#codigo_barra").val();
        m = $("#id_marca").val();
        t_p = $("#id_tipo_producto").val();
        p= $("#presentacion").val();
        d = $("#descripcion").val();
        c = $("#contenido").val();
        f = $("#fraccion").val();
        u_p_c = $("#ult_precio_compra").val();
        u = $("#utilidad").val();
        u_p_v = $("#ult_precio_venta").val();
        
        $.post(base_url+"producto/guardar",{id:i,barra:b,marca:m,tipo_p:t_p,presentacion:p,descripcion:d,
                                            contenido:c,fraccion:f,p_compra:u_p_c,utilidad:u,p_venta:u_p_v},function(valor){
            if(!isNaN(valor)){
                alert('Guardado exitoso');
                table.ajax.reload( null, false);
                $("#modal_form").modal('hide');
            }else{
                alert('guardar error:'+valor);
            }
        });
        
    } );

    $('#submit_form_editar_precio').on('click', function () {        //Enviar los datos del modal-form a guardar en el controlador
        var campos_form = ["nuevo_precio_compra","nueva_utilidad","nueva_precio_venta"];//campos que queremos que se validen
        if(!validar_form(campos_form)){
            return false;            
        }

        i_e_p = $("#id_producto_editar_precio").val();
        n_p_c = $("#nuevo_precio_compra").val();
        n_u = $("#nueva_utilidad").val();
        n_p_v = $("#nuevo_precio_venta").val();

        $.post(base_url+"producto/editar_precio",{id:i_e_p,p_compra:n_p_c,utilidad:n_u,p_venta:n_p_v},function(valor){
            if(!isNaN(valor)){
                alert('Guardado Exitoso : Precio Modificado');
                table.ajax.reload( null, false);
                $("#modal_form_editar_precio").modal('hide');
            }else{
                alert('guardar error:'+valor);
            }
        });
        
    } );

    $('#delete_click').on('click', function () {   //Enviar los datos del modal-form a eliminar en el controlador
        var id = $("#id_dato_eliminar").val();
        $.post(base_url+"producto/eliminar",{id:id},function(valor){
            if(!isNaN(valor)){
                alert('Dato eliminado');
                table.ajax.reload( null, false);
                $("#modal_delete").modal('hide');
            }else{
                alert('eliminar error:'+valor);
            }
        });
    } );

    $("#codigo_barra").blur(function(){
        
        if($(this).val()!='' && ($(this).val().length==13 || $(this).val().length==12 || $(this).val().length==8 || $(this).val().length==7 || $(this).val().length==5)){
            var cod_barra=$(this).val();
            
            $.post(base_url+'producto/buscador_codigo_barra',{codigo_barra:cod_barra},function(datos){
                if(datos.length>0 ){
                    if($("#id_producto").val()!=datos[0].id_producto){   
                        alert("PRODUCTO REPETIDO!! con Codigo:"+datos[0].id_producto);
                        $("#codigo_barra").focus();
                    }                    
                }
            },'json');
        }
    });

} );

$(function() {    
    $("#solo_entero").click(function() {
        if ($("#solo_entero").is(':checked')) {
            $("#fraccion").val('1');
            $("#fraccion").attr('readonly', true);
        } else {
           $("#fraccion").attr('readonly', false);
           $("#fraccion").val('');
           $("#fraccion").focus();
        }
    });
    
    $("#ult_precio_compra").keyup(function() {
        Calc_p_venta();
    });
    
    $("#utilidad").keyup(function() {
        Calc_p_venta();
    });
    
    $("#ult_precio_venta").keyup(function() {
        Calc_utilidad();
    });
    
    $("#ult_precio_venta").blur(function(){
        var precio = parseFloat($(this).val());
        if (isNaN(precio)) {
            precio = 0;
        }
        $(this).val(precio.toFixed(2));
    });
    
    function Calc_p_venta() {
        var utilidad = $("#utilidad").val();
        utilidad = parseFloat(utilidad);
        if (isNaN(utilidad)) {
            utilidad = 0;
        }
        var costo = $("#ult_precio_compra").val();
        costo = parseFloat(costo);
        if (isNaN(costo)) {
            costo = 0;
        }
        var venta;
        venta = costo * ((utilidad/100)+1);
        $("#ult_precio_venta").val(venta.toFixed(2));
    }
    
    function Calc_utilidad() {
        var costo = $("#ult_precio_compra").val();
        costo = parseFloat(costo);
        if (isNaN(costo)) {
            costo = 0;
        }
        if(costo>=0.01){
            var venta = $("#ult_precio_venta").val();
            venta = parseFloat(venta);
            if (isNaN(venta)) {
                venta = 0;
            }

            var utilidad;
            utilidad = 100*((venta-costo)/costo);
            $("#utilidad").val(utilidad.toFixed(2));
        }
    }

    $("#nuevo_precio_compra").keyup(function() {
        Calc_p_venta_edi_pre();
    });
    
    $("#nueva_utilidad").keyup(function() {
        Calc_p_venta_edi_pre();
    });
    
    $("#nuevo_precio_venta").keyup(function() {
        Calc_utilidad_edi_pre();
    });

    function Calc_p_venta_edi_pre() {

        var utilidad = $("#nueva_utilidad").val();
        utilidad = parseFloat(utilidad);
        if (isNaN(utilidad)) {
            utilidad = 0;
        }
        var costo = $("#nuevo_precio_compra").val();
        costo = parseFloat(costo);
        if (isNaN(costo)) {
            costo = 0;
        }
        var venta;
        venta = costo * ((utilidad/100)+1);
        $("#nuevo_precio_venta").val(venta.toFixed(2));
    }
    
    function Calc_utilidad_edi_pre() {
        var costo = $("#nuevo_precio_compra").val();
        costo = parseFloat(costo);
        if (isNaN(costo)) {
            costo = 0;
        }
        if(costo>=0.01){
            var venta = $("#nuevo_precio_venta").val();
            venta = parseFloat(venta);
            if (isNaN(venta)) {
                venta = 0;
            }

            var utilidad;
            utilidad = 100*((venta-costo)/costo);
            $("#nueva_utilidad").val(utilidad.toFixed(2));
        }
    }        
});
