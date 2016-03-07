<div class="navbar-inner">
<?php if (isset($this->datos) && count($this->datos)) { ?>
    
    <table id="table" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Item</th>
                <th>CodBarras</th>
                <th>Marca</th>
                <th>Tipo</th>
                <th>Descripcion</th>
                <th>Fraccion</th>
                <th>P. Compra</th>
                <th>Utilidad</th>
                <th>P. Venta</th>
                <th>Acciones</th>
            </tr>
        </thead>
         <tbody>
            <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <?php 
                $id_p= $this->datos[$i]['id_producto'];
            
            ?> 
            <tr>
                <td><?php echo "0000".$id_p;//id ?></td>
                <td><?php echo $this->datos[$i]['codigo_barra'];// ?></td> 
                <td><?php echo $this->datos[$i]['marca'];// ?></td> 
                <td><?php echo $this->datos[$i]['tipo_producto'];// ?></td> 
                <td><?php if(trim($this->datos[$i]['contenido'])<>""){
                           echo $this->datos[$i]['descripcion']." ".trim($this->datos[$i]['contenido']);//nombre 
                          }else{
                           echo $this->datos[$i]['descripcion'];   
                          }
                        
                        ?></td> 
                <td><?php echo $this->datos[$i]['fraccion'];// ?></td> 
                <td id="<?php echo $id_p."_pc";//nombre ?>"><?php echo $this->datos[$i]['ult_precio_compra'];//nombre ?></td> 
                <td id="<?php echo $id_p."_u";//nombre ?>"><?php echo $this->datos[$i]['utilidad'];//nombre ?></td> 
                <td id="<?php echo $id_p."_pv";//nombre ?>"><?php echo $this->datos[$i]['ult_precio_venta'];//nombre ?></td> 
                <td>
                    <a href="javascript:void(0)" onclick="editar('<?php echo BASE_URL?>producto/editar/<?php echo $this->datos[$i]['id_producto'] ?>')" title="Editar Producto" class="btn btn-success btn-minier"><i class="icon-pencil icon-white"></i></a>
                    
                    
                    <button type="button" data-toggle="modal" 
                            onclick="act_precios('<?php echo $this->datos[$i]['id_producto'] ?>',
                                                '<?php echo $this->datos[$i]['marca']." ".$this->datos[$i]['tipo_producto']." ".$this->datos[$i]['descripcion']; ?>',
                                                '<?php echo $this->datos[$i]['ult_precio_compra'] ?>',
                                                '<?php echo $this->datos[$i]['utilidad'] ?>',
                                                '<?php echo $this->datos[$i]['ult_precio_venta'] ?>')"  class="btn btn-primary btn-sm" title="Actualizar Precios" id="AbrirVtnActPrecios"><i class="icon-money icon-white"></i></button>
            
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>  
    <div class="btn-group">
        <a class="btn btn-primary" href="<?php echo BASE_URL?>producto/nuevo" class="k-button">Nuevo</a>
    </div>      
    <?php } else { ?>
    <p>NO SE ENCONTRARON DATOS</p>
        <a class="btn btn-primary" href="<?php echo BASE_URL?>producto/nuevo" class="k-button">Nuevo</a>
    <?php } ?>
        
 <style>
        #modalActPrecios .modal-content {
            width: 800px;
            left: -18%;
        }
    </style>
    <div id="modalActPrecios" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Actualizar Precios</h3><h3 id="title_modal"></h3>
        </div>
        <div class="modal-body">
            <div id="VtnActPrecios">
                <div class="navbar-inner text-center">
                    <div id="grillaActPrecios">
                        <form class="form-horizontal" role="form" id="frm" method="post" action="<?php echo $this->action; ?>">
                            <input name="guardar" id="guardar" type="hidden" value="1">
                            <div class="col-md-12" >
                                <div class="col-md-4">
                                    <div class="form-group"  >
                                        <label class="col-md-4 control-label" > Codigo:</label>
                                        <div class="col-md-6">
                                            <input name="id_producto" id="id_producto" class="form-control" readonly="true" value="" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group" >
                                        <label class="col-md-4 control-label" > Descripcion:</label>
                                        <div class="col-md-8" style="padding-right:0px">
                                            <input name="descripcion" id="descripcion" class="form-control" readonly="true" placeholder="Descripcion"  value=""  >
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            
                            <div class="col-md-12" >
                                <div class="col-md-4">
                                    <div class="form-group"  >
                                        <label class="col-md-4 control-label" > Precio Compra:</label>
                                        <div class="col-md-6">
                                            <input name="precio_compra" id="precio_compra" class="form-control" readonly="true" value="" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group"  >
                                        <label class="col-md-4 control-label" > Utilidad:</label>
                                        <div class="col-md-6">
                                            <input name="utilidad" id="utilidad" class="form-control" readonly="true" value="" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group"  >
                                        <label class="col-md-4 control-label" > Precio Venta:</label>
                                        <div class="col-md-6">
                                            <input name="precio_venta" id="precio_venta" class="form-control" readonly="true" value="" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12" style="border-bottom: solid 1px #D8D8D8;margin: 0px 0px 10px 0px;">
                                <label> ACTUALIZAR PRECIO </label>
                            
                            </div>
                            
                            <div class="col-md-12" >
                                <div class="col-md-4">
                                    <div class="form-group"  >
                                        <label class="col-md-4 control-label" > Precio Compra:</label>
                                        <div class="col-md-6">
                                            <input name="nuevo_precio_compra" id="nuevo_precio_compra" class="form-control" onkeypress="return dosDecimales(event,this)" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group"  >
                                        <label class="col-md-4 control-label" > Utilidad:</label>
                                        <div class="col-md-6">
                                            <input name="nuevo_utilidad" id="nuevo_utilidad" class="form-control" onkeypress="return dosDecimales(event,this)" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group"  >
                                        <label class="col-md-4 control-label" > Precio Venta:</label>
                                        <div class="col-md-6">
                                            <input name="nuevo_precio_venta" id="nuevo_precio_venta" class="form-control" onkeypress="return dosDecimales(event,this)" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="form-group" style="margin-top: 8%"> 
                                <div class="col-sm-offset-3 col-sm-8">
                                    <button type="button" class="btn btn-primary" id="save"> Guardar</button>
                                </div>
                            </div>

                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Cerrar</button>
        </div>
        </div>
        </div>
    </div>
    