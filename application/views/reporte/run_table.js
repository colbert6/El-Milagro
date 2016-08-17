$(document).ready(function() {
    //var base_url definida en header
    var table =$('#table').DataTable({  
        "processing": true,
        "ajax": {
            "url": base_url+"reporte/cargar_reporte/",
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
            { "data": "marca" }, 
            { "data": "tipo" },
            { "data": "descripcion" },
            { "data": "fraccion" },
            { "data": "p_compra" },
            { "data": "utilidad" },
            { "data": "p_venta" },
            { "data": "cant_e" },
            { "data": "cant_f" },
            { "data": "p_inventario" },
            { "data": "total" }
        ],
        "columnDefs": [
        {
            "targets": [ 1 ],
            "visible": false
        },
        {
            "targets": [ 6 ],
            "visible": false
        },
        {
            "targets": [ 7 ],
            "visible": false
        },
        {
            "targets": [ 8 ],
            "visible": false
        }
        ],  
        'iDisplayLength': 15,
        'aLengthMenu': [[5, 15, 20, -1], [5, 15, 20, 'All']],     

        dom: 'Bfrtip',

        buttons: [
            {
                extend: 'colvis',
                text: 'Colum Visibles'
            },
            {
                extend: 'print',
                text: 'Imprimir',
                message: 'Inventario de Botica El Milagro',
                exportOptions: {
                    columns: ':visible'
                },
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' )
                        .prepend(
                            '<img src="<?=base_url();?>/public/img/logo_pest.png" style="position:absolute; top:0; left:0;" />'
                        );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                }

            },
            'copy',
            'csv', 
            'excel', 
            'pdf'
                        
        ]

        
    });

    
});


