
<div class="navbar-inner">
    
    <div class="col-md-2"></div>
    <div class="col-md-7" style="color:#000">
    <form class="form-horizontal" role="form" id="frm" method="post" action="<?php echo $this->action; ?>">
        <input name="guardar" id="guardar" type="hidden" value="1">
        
        <?php if(isset ($this->datos[0]['inv_id'])) {?>  
        <div class="form-group">
            <label class="control-label col-sm-6" >Item:</label>
            <div class="col-sm-6">
                <input name="id" id="id" class="form-control"  readonly="readonly"
                   value="<?php echo $this->datos[0]['inv_id'];?>">
            </div>
        </div>  
        <?php } ?>  
        
        <div class="form-group">
            <label class="control-label col-sm-6" >Descripcion:</label>
            <div class="col-sm-9">
                <input name="descripcion" id="descripcion" class="form-control"  placeholder="Descripcion" autofocus
                maxlength="50"  value="<?php if(isset ($this->datos[0]['inv_descripcion']))echo $this->datos[0]['inv_descripcion']?>">
            </div>
        </div>
       
        <div class="form-group">
            <label class="control-label col-sm-6" >Año:</label>
            <div class="col-sm-9">
                <input name="ano" id="ano" class="form-control"  placeholder="Abreviado"  type="number"
                maxlength="4" minlength="3"  value="<?php if(isset ($this->datos[0]['inv_ano'])){echo $this->datos[0]['inv_ano'];}else{echo 2016;}?>">
            </div>
        </div>
        
        <div class="form-group" style="margin-top: 8%"> 
            <div class="col-sm-offset-3 col-sm-8">
            <button type="button" class="btn btn-primary" id="save"> Guardar</button>
                <a style="margin-left: 8%" href="<?php echo BASE_URL?>inventario"  class="btn btn-danger">Cancelar</a>
            </div>
        </div>

    </form>
    </div>