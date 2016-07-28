<?php 

  $presentacion = array('Unidad','Estuche','Pack','Caja','Paquete','Tubo','Pote','Frasco','Sachet','Tira');
?>
    <div class="matter">
        <div class="container">
            <div class="navbar-inner">  
                <div class="col-md-12">
                    <table  id="tab" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Marca</th>
                                <th>Tipo Producto</th>
                                <th>Descripcion</th>
                                <th>Fraccion</th>
                                <th>Precio Compra</th>
                                <th>Precio Venta</th>
                                <th colspan="2">Acciones</th>
                            </tr>
                        </thead>                         
                    </table>
                    <div class="btn-group">
                            <a class="btn btn-primary k-button" id="nuevo_modal" data-toggle="modal" data-target="#modal_form"><i class="fa  fa-plus"></i> Nuevo</a>
                    </div>
                </div>
            </div>
        </div> 
    </div> 
</div><!--/.mainbar-->

<style>
        #modal_form .modal-content {
            width: 900px;
            left: -20%;
        }
    </style>

<!-- MODAL  -->
<div class="modal fade" id="modal_form" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Formulario Producto</h4>
            </div>
            
            <div class="modal-body">
                <form class="form-horizontal" role="form" id="frm" method="post" action="">
                    <input name="guardar" id="guardar" type="hidden" value="1">
                    
                    <div class="row"  style="border-bottom: solid 1px #D8D8D8;margin: 0px 0px 0px 0px;">
                        <div class="col-md-5">
                            <div class="form-group"  style="margin: 5px auto 5px auto">
                                <label class="col-md-4 control-label" > Codigo:</label>
                                <div class="col-md-8">
                                    <input name="id_producto" id="id_producto" class="form-control" readonly="true">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="form-group"  style="margin: 5px auto 5px auto">
                                <label class="col-md-4 control-label" > Codigo de Barras:</label>
                                <div class="col-md-8">
                                    <input name="codigo_barra" id="codigo_barra" class="form-control" onkeypress="return soloNumeros(event)" placeholder="Codigo Barra" autofocus maxlength="13"  >
                                </div>
                            </div>
                        </div>
                    </div>  
                    
                    <div class="row"  style="border-bottom: solid 1px #D8D8D8;margin: 0px 0px 0px 0px;">
                        <div class="col-md-4" style="padding-right: 0px">
                            <div class="form-group"  style="margin: 5px auto 5px auto">
                                <label class="col-md-4 control-label" > *Marca:</label>
                                <div class="col-md-7" style="padding-right: 0px;">
                                    <select class="form-control" name='id_marca' id='id_marca' placeholder="">
                                        <option value='' ></option>
                                        <?php for($i=0;$i<count($marca);$i++){ //Aca va la lista de los modulos padres ?> 
                                            <?php if( $marca[$i]['id_marca']==$datos[0]['id_marca']){?>
                                                <option selected value="<?php echo $marca[$i]['id_marca'];?>"><?php echo $marca[$i]['descripcion']?></option>
                                           <?php }else{?>
                                                <option value="<?php echo $marca[$i]['id_marca'];?>"><?php echo $marca[$i]['descripcion']?></option>
                                           <?php } ?>
                                            
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4" style="padding-right: 0px;padding-left: 0px">
                            <div class="form-group"  style="margin: 5px auto 5px auto">
                                <label class="col-md-4 control-label" > *Tipo:</label>
                                <div class="col-md-7" style="padding-right: 0px;padding-left: 0px">
                                    <select class="form-control" name='id_tipo_producto' id='id_tipo_producto' placeholder="">
                                        <option value='' ></option>
                                        <?php for($i=0;$i<count($tipo_producto);$i++){ //Aca va la lista de los modulos padres ?> 
                                            <?php if( $tipo_producto[$i]['id_tipo_producto']==$datos[0]['id_tipo_producto']){?>
                                                <option selected value="<?php echo $tipo_producto[$i]['id_tipo_producto'];?>"><?php echo $tipo_producto[$i]['descripcion']?></option>
                                           <?php }else{?>
                                                <option value="<?php echo $tipo_producto[$i]['id_tipo_producto'];?>"><?php echo $tipo_producto[$i]['descripcion']?></option>
                                           <?php } ?>
                                            
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4" style="padding-right: 0px;padding-left: 0px">
                            <div class="form-group"  style="margin: 5px auto 5px auto">
                                <label class="col-md-4 control-label" > Presentacion:</label>
                                <div class="col-md-7">
                                    <select class="form-control" name='presentacion' id='presentacion' placeholder="">
                                        <option value='' ></option>
                                        <?php for($i=0;$i<count($presentacion);$i++){ //Aca va la lista de los modulos padres ?> 
                                            <?php if( $presentacion[$i]==$datos[0]['presentacion']){?>
                                                <option selected value="<?php echo $presentacion[$i];?>"><?php echo $presentacion[$i]?></option>
                                           <?php }else{?>
                                                <option value="<?php echo $presentacion[$i];?>"><?php echo $presentacion[$i]?></option>
                                           <?php } ?>
                                            
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="row"  style="border-bottom: solid 1px #D8D8D8;margin: 0px 0px 0px 0px;">
                        <div class="col-md-7">
                            <div class="form-group"  style="margin: 5px auto 5px auto">
                                <label class="col-md-4 control-label" >Descripcion:</label>
                                <div class="col-md-8">
                                    <input name="descripcion" id="descripcion" class="form-control"  placeholder="Descripcion" 
                                    maxlength="35"  value="<?php if(isset ($datos[0]['descripcion']))echo $datos[0]['descripcion']?>">
                                </div>
                            </div>
                        </div>
                        
                    </div> 
                    <div class="row"  style="border-bottom: solid 1px #D8D8D8;margin: 0px 0px 0px 0px;">
                        <div class="col-md-5">
                            <div class="form-group"  style="margin: 5px auto 5px auto">
                                <label class="col-md-4 control-label" >Contenido:</label>
                                <div class="col-md-8">
                                    <input name="contenido" id="contenido" class="form-control"  placeholder="1gr - 1ml - 1lt - 1onz" 
                                    maxlength="10"  value="<?php if(isset ($datos[0]['contenido']))echo $datos[0]['contenido']?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group"  style="margin: 5px auto 5px auto">
                                <div class="checkbox">
                                    <label>
                                        <input name="solo_entero" id="solo_entero" type="checkbox" value="" <?php if(!isset ($datos[0]['fraccion']) || $datos[0]['fraccion']==1)echo 'checked'?>>
                                      Entero
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group"  style="margin: 5px auto 5px auto">
                                <label class="col-md-4 control-label" >Fraccion:</label>
                                <div class="col-md-5">
                                    <input name="fraccion" id="fraccion" class="form-control"  placeholder="Fraccion" onkeypress="return soloNumeros(event)"
                                    maxlength="4"  <?php if(isset ($datos[0]['fraccion']) && $datos[0]['fraccion']<>1 ){echo "value='".$datos[0]['fraccion']."' ";}else{echo "value='1' readonly";}?>>
                                </div>
                            </div>
                        </div>
                        
                    </div> 
                    
                    <div class="row" >
                        <div class="col-md-4">
                            <div class="form-group"  style="margin: 5px auto 5px auto">
                                <label class="col-md-4 control-label" >Costo:</label>
                                <div class="col-md-8">
                                    <input name="ult_precio_compra" id="ult_precio_compra" class="form-control"  placeholder="Compra" onkeypress="return dosDecimales(event,this)"
                                    maxlength="10"  value="<?php if(isset ($datos[0]['ult_precio_compra'])){echo $datos[0]['ult_precio_compra'];}else{echo "0.00";}?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group"  style="margin: 5px auto 5px auto">
                                <label class="col-md-4 control-label" >Utilidad:</label>
                                <div class="col-md-8">
                                    <input name="utilidad" id="utilidad" class="form-control"  placeholder="Utilidad" onkeypress="return dosDecimales(event,this)"
                                    maxlength="10"  value="<?php if(isset ($datos[0]['utilidad'])){echo $datos[0]['utilidad'];}else{echo '15';}?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group"  style="margin: 5px auto 5px auto">
                                <label class="col-md-4 control-label" >Precio:</label>
                                <div class="col-md-8">
                                    <input name="ult_precio_venta" id="ult_precio_venta" class="form-control"  placeholder="Venta" onkeypress="return dosDecimales(event,this)"
                                    maxlength="10"  <?php if(isset ($datos[0]['ult_precio_venta'])){echo "value='".$datos[0]['ult_precio_venta']."'";}else{ echo "value='0.00'";}?>>
                                </div>
                            </div>
                        </div>
                        
                    </div> 
                    
                </form>
               
            </div>
            <div class="modal-footer clearfix">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                <button type="button" id='submit_form' class="btn btn-primary pull-left"><i class="fa fa-check"></i> Guardar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->                

<div class="modal fade" id="modal_delete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-exclamation-circle"></i> Alerta eliminar </h4>
            </div>
            <form role="form" action="" method="post">
                <input type="hidden" id='id_dato_eliminar'></input>
               
                <div class="modal-body" >
                    <div class="alert alert-danger alert-dismissable">
                        <i class="fa fa-warning"></i>
                        <h4>Estas seguro que desea eliminar el dato?</h4><h4 id="desc_dato_eliminar"></h4>
                    </div>
                </div>
                <div class="modal-footer clearfix">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                    <button type="button" id="delete_click" class="btn btn-primary pull-left"><i class="fa fa-check"></i> Aceptar</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->                
        
