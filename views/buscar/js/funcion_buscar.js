$(function() {  
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