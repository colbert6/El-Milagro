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
    
    $( "#save" ).click(function(){
         if( $("#codigo_barra").val()!='' && ($("#codigo_barra").val().length!=13 && $("#codigo_barra").val().length!=12 && $("#codigo_barra").val().length!=8 && $("#codigo_barra").val().length!=7)){
           $("#codigo_barra").css('border','solid 1px red');
            $("#codigo_barra").html('<label class="lbl_msg">Debes llenar todos los campos necesarios</label>');
            $("#codigo_barra").focus();    
            return false;
        } else {
            $("#codigo_barra").css('border','solid 1px #ccc');
            $('#msg').html('');
        }
        
        bval = true;  
        bval = bval && $("#id_marca").required();
        bval = bval && $("#id_tipo_producto").required();
        if (bval) 
        {              
        
            $("#frm").submit();
        }
        return false;
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
    
    $("#codigo_barra").blur(function(){
        
        if($(this).val()!='' && ($(this).val().length==13 || $(this).val().length==12 || $(this).val().length==8 || $(this).val().length==7)){
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
    /*
     * Para obtener digito de control
    function ean13_checksum(message) {
    var checksum = 0;
    message = message.split('').reverse();
    for(var pos in message){
        checksum += message[pos] * (3 - 2 * (pos % 2));
    }
    return ((10 - (checksum % 10 )) % 10);
    }
    // Valor de prueba (sin dígito de control)
    var ean = '123456789041';
    console.log(ean13_checksum(ean));*/
    
});