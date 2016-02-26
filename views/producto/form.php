<?php 

  $presentacion = array('Unidad','Estuche','Pack','Caja','Paquete','Tubo','Pote','Frasco','Sachet','Tira');
?>

<div class="navbar-inner">
    
    <form class="form-horizontal" role="form" id="frm" method="post" action="<?php echo $this->action; ?>">
        <input name="guardar" id="guardar" type="hidden" value="1">
        
        <div class="row"  style="border-bottom: solid 1px #D8D8D8;margin: 0px 0px 0px 0px;">
            <div class="col-md-5">
                <div class="form-group"  style="margin: 5px auto 5px auto">
                    <label class="col-md-4 control-label" > Codigo:</label>
                    <div class="col-md-8">
                        <input name="id_producto" id="id_producto" class="form-control"   readonly="true"
                               value="<?php if(isset ($this->datos[0]['id_producto']))echo $this->datos[0]['id_producto']?>" >
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="form-group"  style="margin: 5px auto 5px auto">
                    <label class="col-md-4 control-label" > Codigo de Barras:</label>
                    <div class="col-md-8">
                        <input name="codigo_barra" id="codigo_barra" class="form-control" onkeypress="return soloNumeros(event)"  
                               placeholder="Codigo Barra" autofocus maxlength="13" value="<?php if(isset ($this->datos[0]['codigo_barra']))echo $this->datos[0]['codigo_barra']?>"  >
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
                            <?php for($i=0;$i<count($this->marca);$i++){ //Aca va la lista de los modulos padres ?> 
                                <?php if( $this->marca[$i]['id_marca']==$this->datos[0]['id_marca']){?>
                                    <option selected value="<?php echo $this->marca[$i]['id_marca'];?>"><?php echo $this->marca[$i]['descripcion']?></option>
                               <?php }else{?>
                                    <option value="<?php echo $this->marca[$i]['id_marca'];?>"><?php echo $this->marca[$i]['descripcion']?></option>
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
                            <?php for($i=0;$i<count($this->tipo_producto);$i++){ //Aca va la lista de los modulos padres ?> 
                                <?php if( $this->tipo_producto[$i]['id_tipo_producto']==$this->datos[0]['id_tipo_producto']){?>
                                    <option selected value="<?php echo $this->tipo_producto[$i]['id_tipo_producto'];?>"><?php echo $this->tipo_producto[$i]['descripcion']?></option>
                               <?php }else{?>
                                    <option value="<?php echo $this->tipo_producto[$i]['id_tipo_producto'];?>"><?php echo $this->tipo_producto[$i]['descripcion']?></option>
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
                                <?php if( $presentacion[$i]==$this->datos[0]['presentacion']){?>
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
                        maxlength="35"  value="<?php if(isset ($this->datos[0]['descripcion']))echo $this->datos[0]['descripcion']?>">
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
                        maxlength="10"  value="<?php if(isset ($this->datos[0]['contenido']))echo $this->datos[0]['contenido']?>">
                    </div>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group"  style="margin: 5px auto 5px auto">
                    <div class="checkbox">
                        <label>
                            <input name="solo_entero" id="solo_entero" type="checkbox" value="" <?php if(!isset ($this->datos[0]['fraccion']) || $this->datos[0]['fraccion']==1)echo 'checked'?>>
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
                        maxlength="4"  <?php if(isset ($this->datos[0]['fraccion']) && $this->datos[0]['fraccion']<>1 ){echo "value='".$this->datos[0]['fraccion']."' ";}else{echo "value='1' readonly";}?>>
                    </div>
                </div>
            </div>
            
        </div> 
        
        <div class="row"  style="border-bottom: solid 1px #D8D8D8;margin: 0px 0px 0px 0px;">
            <div class="col-md-4">
                <div class="form-group"  style="margin: 5px auto 5px auto">
                    <label class="col-md-4 control-label" >Costo:</label>
                    <div class="col-md-8">
                        <input name="ult_precio_compra" id="ult_precio_compra" class="form-control"  placeholder="Compra" onkeypress="return dosDecimales(event,this)"
                        maxlength="10"  value="<?php if(isset ($this->datos[0]['ult_precio_compra'])){echo $this->datos[0]['ult_precio_compra'];}else{echo "0.00";}?>">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group"  style="margin: 5px auto 5px auto">
                    <label class="col-md-4 control-label" >Utilidad:</label>
                    <div class="col-md-8">
                        <input name="utilidad" id="utilidad" class="form-control"  placeholder="Utilidad" onkeypress="return dosDecimales(event)"
                        maxlength="10"  value="<?php if(isset ($this->datos[0]['utilidad'])){echo $this->datos[0]['utilidad'];}else{echo '15';}?>">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group"  style="margin: 5px auto 5px auto">
                    <label class="col-md-4 control-label" >Precio:</label>
                    <div class="col-md-8">
                        <input name="ult_precio_venta" id="ult_precio_venta" class="form-control"  placeholder="Venta" onkeypress="return dosDecimales(event,this)"
                        maxlength="10"  <?php if(isset ($this->datos[0]['ult_precio_venta'])){echo "value='".$this->datos[0]['ult_precio_venta']."'";}else{ echo "value='0.00'";}?>>
                    </div>
                </div>
            </div>
            
        </div> 
        
       
        <div class="form-group" style="margin-top: 8%"> 
            <div class="col-sm-offset-3 col-sm-8">
            <button type="button" class="btn btn-primary" id="save"> Guardar</button>
                <a style="margin-left: 8%" href="<?php echo BASE_URL?>producto"  class="btn btn-danger">Cancelar</a>
            </div>
        </div>

    </form>
    </div>