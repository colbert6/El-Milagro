<div class="matter">
    <div class="container">
        <div class="navbar-inner">  

            <div class="row" style="margin-bottom:10px" >
                <div class="col-md-5" >
                    <div class="form-group"  >
                        <label class="col-md-2 control-label" > Inventario:</label>
                        <div class="col-md-10" >
                            <select class="form-control" name='inv_id' id='inv_id' placeholder="">
                                <option value='' >Seleccione...</option>
                                <?php for($i=0;$i<count($inventario);$i++){ //Aca va la lista de los modulos padres ?> 
                                        <option value="<?php echo $inventario[$i]['inv_id'];?>"><?php echo $inventario[$i]['inv_descripcion']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-5" >
                    <div class="form-group" >
                        <label class="col-md-2 control-label" > Personal:</label>
                        <div class="col-md-10" >
                            <select class="form-control" name='per_id' id='per_id' placeholder="">
                                <option value='' >Seleccione...</option>
                                <?php for($i=0;$i<count($personal);$i++){ //Aca va la lista de los modulos padres ?> 
                                        <option value="<?php echo $personal[$i]['per_id'];?>"><?php echo $personal[$i]['per_nombre']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <input id="mostrar_tabla" type="button" class="btn btn-info" value="CARGAR" >  

            </div>

            <div class="row col-md-12" >    
                <table id="table" class="display" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Cod</th>
                            <th>Cod. Barra</th>
                            <th>Marca Descripcion</th>
                            <th>Marca</th>
                            <th>Tipo Producto</th>                            
                            <th>Tipo</th>
                            <th>Descripcion</th>
                            <th>Fraccion</th>
                            <th>Cant Ent </th>
                            <th>Cant Fra </th>
                            <th>Accion </th>
                        </tr>
                    </thead>
                </table>  

            </div>

            <div class="row col-md-12 resaltar"  >  
                <div class="form-group"  >
                    <label class="col-md-1 control-label" > Ultimo ingreso:</label>
                    <div class="col-md-11" >
                        <input class="form-control" id='ultimo_ingreso' readonly="true" >
                    </div>
                </div>
            </div>

        </div>
    </div> 
</div> 

</div><!--/.mainbar-->

    <style>
        #modalInventario .modal-content {
            width: 900px;
            left: -20%;
        }
    </style>

    <div id="modalInventario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel"></h3><h3 id="titulo_modal"></h3>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" role="form" id="frm" method="post" action="">
                <input name="guardar" id="guardar" type="hidden" value="1">
                <div class="row" >
                    <div class="col-md-6">
                        <div class="form-group"  >
                            <label class="col-md-4 control-label" > Codigo:</label>
                            <div class="col-md-6">
                                <input name="id_producto" id="id_producto" class="form-control" readonly="true" value="" >
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-md-offset-2" >
                        <div class="form-group"  >
                            <label class="col-md-4 control-label" > Fraccion:</label>
                            <div class="col-md-6">
                                <input name="fraccion" id="fraccion" class="form-control" readonly="true" value="" >
                            </div>
                        </div>                                    
                    </div>
                </div>  
                            
                <div class="row" >
                    <div class="col-md-8">
                        <div class="form-group" >
                            <label class="col-md-4 control-label" > Descripcion:</label>
                            <div class="col-md-8">
                                <input name="descripcion" id="descripcion" class="form-control" readonly="true" placeholder="Descripcion"  value=""  >
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group"  >
                            <label class="col-md-2 control-label" > Precio Venta:</label>
                            <div class="col-md-7">
                                <input name="precio_venta" id="precio_venta" class="form-control" readonly="true" value="" >
                            </div>
                        </div>
                    </div>
                </div>
                            
                <div class="row" >
                    <div class="col-md-12" style="border-bottom: solid 1px #D8D8D8;margin: 0px 0px 10px 0px;">
                        <label  class="col-md-4" ><h3>Agregar al Inventario </h3></label>
                    </div>                           
                    
                    <div class="col-md-12" >
                        <div class="col-md-4">
                            <div class="form-group"  >
                                <label class="col-md-4 control-label" >Entero:</label>
                                <div class="col-md-6">
                                    <input name="cantidad_entero" id="cantidad_entero" class="form-control" onkeypress="return soloNumeros(event,this)" >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group"  >
                                <label class="col-md-4 control-label" > Fraccion:</label>
                                <div class="col-md-6">
                                    <input name="cantidad_fraccion" id="cantidad_fraccion" class="form-control" onkeypress="return soloNumeros(event,this)" >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group"  > 
                                <label class="col-md-2" id="gif_loading" ></label>                                       
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-success" id="cargar_inventario"> CARGAR AL INVENTARIO</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </form>
            <div class="row center">
                <div id="respuesta" class="col-md-8 col-md-offset-2 ">                        
                </div>    
            </div>
                
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Cerrar</button>
        </div>
        </div>
        </div>
    </div>

        
