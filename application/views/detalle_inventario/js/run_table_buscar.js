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
            { "data": "contenido" },
            { "data": "fraccion" },
            { "data": "cant_e" },
            { "data": "cant_f" },
            { "data": "accion" }

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
            "targets": [ 3 ],
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
        
        'aaSorting': [[ 2, 'asc' ],[3,'asc'],[6,'asc']],//ordenar
        'iDisplayLength': 15,
        'aLengthMenu': [[5, 15, 20, -1], [5, 15, 20, 'All']]
        
        
    });

    function actualizar_cantidad(inv){
         $.post(base_url+"/El-Milagro/inventario/cargar_inventario",{inv:inv},function(datos){
            var obj = JSON.parse(datos);
            for (var i = 0; i < obj.length; i++) {
                //me falta añadir por fracciones
                $("#cant_e_"+obj[i].pro_id).text(obj[i].cant_e);
                $("#cant_f_"+obj[i].pro_id).text(obj[i].cant_f);       
            }

        });
    };

    $("#inv_id").change(function(){
        var inv=$( "#inv_id" ).val();
        actualizar_cantidad(inv);
       
    });

    $('#modal-inventario').on('click', function () {        
        $("#id_producto").val('');
        $("#descripcion").val('');
        $("#fraccion").val('');
        $("#precio_venta").val('');
    } );

    $('#table tbody').on('click', 'td.modal-inventario', function () {

        $( "#inv_id" ).required();
        $( "#per_id" ).required();
        if($( "#inv_id" ).val()=='' || $( "#per_id" ).val()==''){
            return false;
        }
        var tr = $(this).closest('tr');
        var row = table.row( tr );

        $("#titulo_modal" ).text('Cargar Inventario: '+ $( "#inv_id option:selected" ).text()+' --- '+ $( "#per_id option:selected" ).text())

        $("#id_producto").val(row.data().id_producto);
        $("#descripcion").val(row.data().marca_desc+' '+row.data().tipo_producto_desc+' '+row.data().contenido);
        $("#fraccion").val(row.data().fraccion);
        
        if(row.data().fraccion==1){
            document.getElementById("cantidad_fraccion").readOnly = true;
        }else{
            document.getElementById("cantidad_fraccion").readOnly = false;
        }

        $("#cantidad_entero").val('');
        $("#cantidad_fraccion").val('');
        $("#modalInventario").modal({show: true});
    } );


    $('#save').on('click', function () {        
        var inv=$( "#inv_id" ).val();
        var per=$( "#per_id" ).val();
        var pro=$( "#id_producto" ).val();
        var cant_e=$("#cantidad_entero").val();
        var cant_f=$("#cantidad_fraccion").val();

        $.post(base_url+"/El-Milagro/inventario/guardar_inventario",{inv:inv,per:per,pro:pro,cant_e:cant_e,cant_f:cant_f},function(valor){
            $("#modalInventario").modal('hide');
            actualizar_cantidad(inv);
        });
        
    } );


        
 });   
