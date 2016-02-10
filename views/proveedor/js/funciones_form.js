$(function() {    
      
    $( "#save" ).click(function(){
        
       
        
        bval = true;  
        bval = bval && $("#ruc").required();
        if($("#ruc").val().length==11){
            $("#ruc").css('border','solid 1px #ccc');
        }else{
            $("#ruc").css('border','solid 1px red');
            $("#ruc").focus();
            return false;
        }
        bval = bval && $("#razon_social").required();
        bval = bval && $("#direccion").required();
        bval = bval && $("#telefono").required();
        
        
        
        if (bval) 
        {
            $("#frm").submit();
        }
        return false;
    }); 
    
    $("#ruc").blur(function(){
        if($(this).val()!='' && $(this).val().length==11){
            
            $.post(url+'proveedor/buscador','ruc='+$(this).val(),function(datos){
                if(datos.length>0 ){
                    if($("#id_proveedor").val()==datos[0].id_proveedor){  
                        
                    }else{
                        alert("El proovedor ya existe");
                        $("#ruc").focus();
                    }
                    
                }
            },'json');
        }
    });
    
});