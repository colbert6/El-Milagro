$(document).ready(function() {
    //var base_url definida en header
    var table =$('#table').DataTable({  
        "processing": true,
        "ajax": {
            "url": base_url+"producto/cargar_datos/",
            "type": "POST"
        },     
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
            { "data": "ult_precio_venta" }
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
        }
        ],        
        'iDisplayLength': 15,
        'aLengthMenu': [[5, 15, 20, -1], [5, 15, 20, 'All']]
        
        
    });


    limpiar_filtro();

    var html = '';
        html += '<input  type="button" class="btn btn-primary" class="k-button" onclick="limpiar_filtro()" value="LIMPIAR">';
        html += ' ';
    $('div.dataTables_filter').append(html);
    
    
    $(document).keydown(function(tecla){
        if (tecla.keyCode == 113) { 
            $('div.dataTables_filter input[type=search]').val("");
            $('div.dataTables_filter input[type=search]').focus();
        }
    });
    
    $('div.dataTables_filter input[type=search]').blur(function(){
        $('div.dataTables_filter input[type=search]').focus();
    });
    
    
});

function limpiar_filtro() {
        $('div.dataTables_filter input[type=search]').val("");
        $('div.dataTables_filter input[type=search]').focus();
}
