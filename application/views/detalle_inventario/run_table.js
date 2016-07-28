$(document).ready(function() {

    
    var table =$('#table').DataTable({       
        "scrollY":        "400px",
        "scrollCollapse": true,
        "paging":         false,
        'sPaginationType': 'full_numbers',
        'oLanguage':{
            'sProcessing':     'Cargando...',
            'sLengthMenu':     'Mostrar _MENU_ registros',
            'sZeroRecords':    'Ingrese Filtro para busquedad',
            'sEmptyTable':     'Ningún dato disponible en esta tabla',
            'sInfo':           'Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros',
            'sInfoEmpty':      'Mostrando registros del 0 al 0 de un total de 0 registros',
            'sInfoFiltered':   '(filtrado de un total de _MAX_ registros)',
            'sInfoPostFix':    '',
            'sSearch':         'Buscar:',
            'sUrl':            '',
            'sInfoThousands':  '',
            'sLoadingRecords': 'Cargando...',
            'oAria': {
                'sSortAscending':  ': Activar para ordenar la columna de manera ascendente',
                'sSortDescending': ': Activar para ordenar la columna de manera descendente'
            }
        },
        "columns": [
            { "data": "id_producto" },
            { "data": "codigo_barra" },
            { "data": "marca_desc" }, 
            { "data": "marca" },
            { "data": "tipo_producto_desc" },
            { "data": "tipo_producto" },
            { "data": "descripcion" },
            { "data": "fraccion" },
            { "data": "cant_e" },
            { "data": "cant_f" },
            {
                "className":      'inventariar-data',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            }

        ],
        "columnDefs": [
        {
            "targets": [ 0 ],
            "searchable": false
        },
        {
            "targets": [ 1 ],
            "visible": false
        },
        {
            "targets": [ 2 ],
            "visible": false
        },
        {
            "targets": [ 4 ],
            "visible": false
        },
        {
            "targets": [ 7 ],
            "searchable": false
        },
        {
            "targets": [ 8 ],
            "searchable": false
        },                    
        {
            "targets": [ 9 ],
            "searchable": false
        }
        ],        
        'iDisplayLength': 15,
        'aLengthMenu': [[5, 15, 20, -1], [5, 15, 20, 'All']]
        
        
    });
    
    // ----------------------------Seleccion de Filtro y cargar Tabla------------------------------------
    function Habilitar_Selects(filtro){
        $("#inv_id").attr('disabled', !filtro);
        $("#per_id").attr('disabled', !filtro);

        if(filtro){
            $("#inv_id").val('');
            $("#per_id").val('');
            $('#mostrar_tabla').val('CARGAR');
        }else{
            $('#mostrar_tabla').val('CAMBIAR');
        }

        $('#mostrar_tabla').toggleClass( "btn-danger" );
        $('#mostrar_tabla').toggleClass('btn-info');       

    }

    $('#mostrar_tabla').on('click', function () {      //Limpiar los datos del modal-form
        
        if($(this).val()=='CARGAR'){
            cargar_tabla();             
        }else if($(this).val()=='CAMBIAR'){
            alert('Cambiar Parametros');
            table.clear().draw();          
            Habilitar_Selects(true);          
        }
    });
       
    function cargar_tabla(){
       
        var campos_form = ["inv_id","per_id"];//campos que queremos que se validen
        if(!validar_form(campos_form)){
            return false;            
        }
        Habilitar_Selects(false);

        var inv_id=$("#inv_id").val();
        var per_id=$("#per_id").val();        

        table.ajax.url(base_url+"detalle_inventario/cargar_datos_filtro_inv_per/"+inv_id+"/"+per_id).load();
    }    
    // ----------------------------FIN------------------------------------


     // ----------------------------Seleccion de producto para inventariar------------------------------------

    $('#table tbody').on('click', 'td.inventariar-data', function () {

        var tr = $(this).closest('tr');
        var row = table.row( tr );
        $("#titulo_modal" ).text('Cargar Inventario: '+ $( "#inv_id option:selected" ).text()+' ('+ $( "#per_id option:selected" ).text()+')')

        $("#id_producto").val(row.data().id_producto);
        $("#descripcion").val(row.data().marca_desc+' '+row.data().tipo_producto_desc+' '+row.data().descripcion);
        $("#fraccion").val(row.data().fraccion);
        $("#precio_venta").val(row.data().precio);
        
        $("#cantidad_entero").val('');
        $("#cantidad_fraccion").val('');
        if(row.data().fraccion==1){
            document.getElementById("cantidad_fraccion").readOnly = true;
        }else{
            document.getElementById("cantidad_fraccion").readOnly = false;
        }
        
        respuesta_cargar('limpiar_todo',true);
        $("#modalInventario").modal({show: true});
        
    });

    $('#cargar_inventario').on('click', function () {  //Enviar los datos del modal-form a guardar en el controlador
        $("#cargar_inventario").attr('disabled', true);
        respuesta_cargar("cargando",true);
        var pro=$("#id_producto").val();
        var inv=$("#inv_id").val();
        var per=$("#per_id").val();
        var c_e=$("#cantidad_entero").val();
        var c_f=$("#cantidad_fraccion").val();


        $.post(base_url+"detalle_inventario/guardar_inventario",{pro:pro,inv:inv,per:per,c_e:c_e,c_f:c_f},function(valor){
            
            if(!isNaN(valor)){                
                table.ajax.reload( function () {   
                   respuesta_cargar("guardado",valor);
                   respuesta_cargar("cargando",false);
                   ultimo_ingreso(c_e,c_f);

                }, false);
            }else{
                respuesta_cargar("error",valor);
            }
        });
        
    });

    function respuesta_cargar(parametro,valor){ //parametro(nombre de la accion),valor(accion)
        switch(parametro) {
            case "cargando":
                if(valor){
                    $("#gif_loading").html('<img src="'+base_url+'public/img/loading.gif">');                    
                }else{
                    $("#gif_loading").html('');                    
                }
                break;
            case "guardado":
                var html='<div class="alert alert-success">';
                    html+='<strong>Exito!</strong> Los datos se guardaron correctamente';          
                    html+='</div>';                
                $("#respuesta").html(html);                
                break;
            case "error":
                var html='<div class="alert alert-danger">';
                    html+='<strong>Error!</strong>Hubo un problema al guardar los datos: <br>';          
                    html+=valor; 
                    html+='</div>';                
                $("#respuesta").html(html);
                break;
            case "limpiar_todo":
                $("#gif_loading").html('');
                $("#respuesta").html('');
                $("#cargar_inventario").attr('disabled', false);
                break;
            default:
                $("#respuesta").html('Sin Respuesta');
        }       
        
    }

    function ultimo_ingreso(c_e,c_f){ //
        var dt = new Date();
        var html=dt.getHours()+":"+dt.getMinutes()+' --- '+$("#descripcion").val()+' >> Entero('+c_e+') Fraccion ('+c_f+')';
        $("#ultimo_ingreso").val(html);
       
    }
    
    



        
 });   
