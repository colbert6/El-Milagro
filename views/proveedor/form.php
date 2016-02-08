<div class="navbar-inner">
    
    <div class="col-md-2"></div>
    <div class="col-md-7" style="color:#000">
    <form class="form-horizontal" role="form" id="frm" method="post" action="<?php echo $this->action; ?>">
        <input name="guardar" id="guardar" type="hidden" value="1">
        
        <?php if(isset ($this->datos[0]['id_proveedor'])) {?>  
        <div class="form-group">
            <label class="control-label col-sm-6" >Item:</label>
            <div class="col-sm-6">
                <input name="id_proveedor" id="id_proveedor" class="form-control"  readonly="readonly"
                   value="<?php echo $this->datos[0]['id_proveedor'];?>">
            </div>
        </div>  
        <?php } ?>  
        
        <div class="form-group">
            <label class="control-label col-sm-6" >RUC:</label>
            <div class="col-sm-6">
                <input name="ruc" id="ruc" class="form-control"  placeholder="RUC" autofocus onkeypress="return soloNumeros(event)"
                maxlength="11"  value="<?php if(isset ($this->datos[0]['ruc']))echo $this->datos[0]['ruc']?>">
            </div>
        </div>
        
        <div class="form-group">
            <label class="control-label col-sm-6" >Razon Social:</label>
            <div class="col-sm-6">
                <input name="razon_social" id="razon_social" class="form-control"  placeholder="Razon Social" 
                maxlength="30"  value="<?php if(isset ($this->datos[0]['razon_social']))echo $this->datos[0]['razon_social']?>">
            </div>
        </div>
        
        <div class="form-group">
            <label class="control-label col-sm-6" >Direccion:</label>
            <div class="col-sm-6">
                <input name="direccion" id="direccion" class="form-control"  placeholder="Direccion" 
                maxlength="30"  value="<?php if(isset ($this->datos[0]['direccion']))echo $this->datos[0]['direccion']?>">
            </div>
        </div>
        
        <div class="form-group">
            <label class="control-label col-sm-6" >Telefono:</label>
            <div class="col-sm-6">
                <input name="telefono" id="telefono" class="form-control"  placeholder="Telefono" onkeypress="return soloNumeros(event)"
                maxlength="10"  value="<?php if(isset ($this->datos[0]['telefono']))echo $this->datos[0]['telefono']?>">
            </div>
        </div>
       
        <div class="form-group" style="margin-top: 8%"> 
            <div class="col-sm-offset-3 col-sm-8">
            <button type="button" class="btn btn-primary" id="save"> Guardar</button>
                <a style="margin-left: 8%" href="<?php echo BASE_URL?>proveedorproveedor"  class="btn btn-danger">Cancelar</a>
            </div>
        </div>

    </form>
    </div>