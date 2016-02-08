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
    $("#ult_precio_venta").blur(function(){
        var precio = parseFloat($(this).val());
        if (isNaN(precio)) {
            precio = 0;
        }
        $(this).val(precio.toFixed(2));
    });
    
    $( "#save" ).click(function(){
         if( $("#codigo_barra").val()!='' && $("#codigo_barra").val().length!=13){
                return false;
        }
        
        bval = true;  
        bval = bval && $("#id_marca").required();
        bval = bval && $("#id_tipo_producto").required();
        bval = bval && $("#descripcion").required();
        if (bval) 
        {   
            
        
            $("#frm").submit();
        }
        return false;
    }); 
    
    function Calc_p_venta() {
        var utilidad = $("#utilidad").val();
        utilidad = parseInt(utilidad);
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
    
    $("#codigo_barra").blur(function(){
        
        if($(this).val()!='' && $(this).val().length==13){
            $.post(url+'producto/buscador','codigo_barra='+$(this).val(),function(datos){
                if(datos.length>0 ){
                    if($("#id_producto").val()==datos[0].id_producto){   
                        
                    }else{
                        alert("El producto ya existe");
                        $("#codigo_barra").focus();
                    }
                    
                }
            },'json');
        }
    });
    
    
    
});