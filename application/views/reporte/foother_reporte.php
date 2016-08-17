<!-- pie -->
        
                    
                
            

        <footer>        
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    <!-- Copyright info  Colbert Calampa Tantachuco-->
                        <p class="copy">Copyright &copy; 2016 | 
                            <a href="javascript:alert('Programador: Colbert Moises Bryan Calampa Tantachuco');">El Milagro-Yurimaguas </a> 
                        </p>
                    </div>
                </div>
            </div>
        </footer> 
    </div>

    <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Iniciar Sesión</h4>
                        </div>

                            <div class="modal-body">
                                <form action="/Olympo/login" method="post" id="loginForm">
                                     <input type="hidden" value="1" name="enviar" />
                                  <div class="form-group has-feedback">
                                    <input type="text" class="form-control" required placeholder="Usuario" name="usuario">
                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                  </div>
                                  <div class="form-group has-feedback">
                                    <input type="password" class="form-control" required placeholder="Contraseña"  name="clave" >
                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                      <button type="submit" class="btn btn-primary">Entrar</button>
                                  </div>
                                </form>  
                      </div>
                    </div>
                 </div>
    

    
</body>

<span class="totop"><a href="#"><i class="icon-chevron-up"></i></a></span>
<?php
    if(isset ($add_table) && $add_table=='si'){    
?>    
   <link href="<?= base_url(); ?>public/css/datatables/jquery.dataTables.origin.css" rel="stylesheet" type="text/css" />       
   <link href="<?= base_url(); ?>public/css/datatables/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />       
   
   <script src="<?= base_url(); ?>public/js/datatables/jquery.dataTables.js" type="text/javascript"></script>
   <script src="<?= base_url(); ?>public/js/datatables/dataTables.buttons.min.js" type="text/javascript"></script>
   <script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js" type="text/javascript"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js" type="text/javascript"></script>
   <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js" type="text/javascript"></script>  
   <script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js" type="text/javascript"></script>
   <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js" type="text/javascript"></script>
   <script src="<?= base_url(); ?>public/js/datatables/buttons.print.min.js" type="text/javascript"></script>
   <script src="<?= base_url(); ?>public/js/datatables/buttons.colVis.min.js" type="text/javascript"></script>
   

   <script src="<?= base_url(); ?>application/views/reporte/run_table_<?=$table?>.js" type="text/javascript"></script>
<?php
    }
?>







 