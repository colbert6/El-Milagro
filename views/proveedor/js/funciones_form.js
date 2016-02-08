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
});