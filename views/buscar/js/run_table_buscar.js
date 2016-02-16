   $(document).ready(function() {
                $('#table').dataTable({
                    "scrollY":        "400px",
                    "scrollCollapse": true,
                    "paging":         false,
                    'sPaginationType': 'full_numbers',
                    'oLanguage':{
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
                        'oAria': {
                            'sSortAscending':  ': Activar para ordenar la columna de manera ascendente',
                            'sSortDescending': ': Activar para ordenar la columna de manera descendente'
                        }
                    },
                    "columnDefs": [
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
                    }
                    ],
                    
                    'aaSorting': [[ 2, 'asc' ]],//ordenar
                    'iDisplayLength': 15,
                    'aLengthMenu': [[5, 15, 20, -1], [5, 15, 20, 'All']]
                    
                    
                });
                $('div.dataTables_filter input').focus()
            }); 
            
           
        
   
