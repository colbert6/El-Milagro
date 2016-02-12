<div class="navbar-inner">
    
    <div class="col-md-2"></div>
    <div class="col-md-7" style="color:#000">
    <form class="form-horizontal" role="form" id="frm" method="post" action="<?php echo $this->action; ?>">
        <input name="guardar" id="guardar" type="hidden" value="1">
        
        <?php if(isset ($this->datos[0]['id_tipo_producto'])) {?>  
        <div class="form-group">
            <label class="control-label col-sm-6" >Item:</label>
            <div class="col-sm-6">
                <input name="id_tipo_producto" id="id_tipo_producto" class="form-control"  readonly="readonly"
                   value="<?php echo $this->datos[0]['id_tipo_producto'];?>">
            </div>
        </div>  
        <?php } ?>  
        
        <div class="form-group">
            <label class="control-label col-sm-6" >Descripcion:</label>
            <div class="col-sm-6">
                <input name="descripcion" id="descripcion" class="form-control"  placeholder="Descripcion" autofocus
                maxlength="30"  value="<?php if(isset ($this->datos[0]['descripcion']))echo $this->datos[0]['descripcion']?>">
            </div>
        </div>
        
        <div class="form-group">
            <label class="control-label col-sm-6" >Abreviatura:</label>
            <div class="col-sm-6">
                <input name="abreviado" id="abreviado" class="form-control"  placeholder="Abreviado" autofocus
                maxlength="30"  value="<?php if(isset ($this->datos[0]['abreviado']))echo $this->datos[0]['abreviado']?>">
            </div>
        </div>
       
        <div class="form-group" style="margin-top: 8%"> 
            <div class="col-sm-offset-3 col-sm-8">
            <button type="button" class="btn btn-primary" id="save"> Guardar</button>
                <a style="margin-left: 8%" href="<?php echo BASE_URL?>tipo_producto"  class="btn btn-danger">Cancelar</a>
            </div>
        </div>

    </form>
    </div>