   $(document).ready(function() {
                $('#table').dataTable({
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
                        "targets": [ 1 ],
                        "visible": false
                    },
                                        
                    {
                        "targets": [ 0 ],
                        "searchable": false
                    }
                    ],
                    'aaSorting': [[ 0, 'desc' ]],//ordenar
                    'iDisplayLength': 10,
                    'aLengthMenu': [[5, 10, 20, -1], [5, 10, 20, 'All']]
                    
                    
                });
    $('div.dataTables_filter input').focus()
    
    $("#nuevo_precio_compra").keyup(function() {
        Calc_p_venta();
    });
    
    $("#nuevo_utilidad").keyup(function() {
        Calc_p_venta();
    });
    
    $("#nuevo_precio_venta").keyup(function() {
        Calc_utilidad();
    });
    
    function Calc_p_venta() {
        var utilidad = $("#nuevo_utilidad").val();
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
    
    function Calc_utilidad() {
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
            $("#nuevo_utilidad").val(utilidad.toFixed(2));
        }
    }
   
       
   $( "#save" ).click(function(){
  
    var id=$("#id_producto").val();
    var npc=$("#nuevo_precio_compra").val();
    var nu=$("#nuevo_utilidad").val();
    var npv=$("#nuevo_precio_venta").val();
    
    if (isNaN(npc) || npc=='') {    npc = 0;  }
    if (isNaN(nu)  || nu=='')  {    nu  = 0;  }
    if (isNaN(npv) || npv=='') {    npv = 0;  }

    $.post(url+'producto/act_precios',{id:id,p_compra:npc,uti:nu,p_venta:npv});
    
    
    var npc2=parseFloat(npc).toFixed(3);
    var nu2=parseFloat(nu).toFixed(2);
    var npv2=parseFloat(npv).toFixed(3);

    $("#"+id+"_pc").html(""+npc2+"");
    $("#"+id+"_u").html(""+nu2+"");
    $("#"+id+"_pv").html(""+npv2+"");

     alert('PRECIO ACTUALIZADO!');

     $("#modalActPrecios").modal('hide');

    
   });


              
 }); 

   function act_precios(id,desc){
   
      $("#modalActPrecios").modal('show');
      
       $.post(url+'producto/buscador',{id_producto:id},function(pro){
           
        var prec_c ,uti ,prec_v ;
        
        prec_c =parseFloat(pro[0].ult_precio_compra).toFixed(3);
        uti =parseFloat(pro[0].utilidad).toFixed(2);
        prec_v =parseFloat(pro[0].ult_precio_venta).toFixed(3);
         
        $("#id_producto").val(id);
        $("#descripcion").val(desc);
        $("#precio_compra").val(prec_c);
        $("#utilidad").val(uti);
        $("#precio_venta").val(prec_v);

        $("#nuevo_precio_compra").val(prec_c);
        $("#nuevo_utilidad").val(uti);
        $("#nuevo_precio_venta").val(prec_v);
                   
    }, 'json');
      
   $("#VtnActPrecios").show();
   $("#nuevo_precio_compra").focus(); 
}    




    
    