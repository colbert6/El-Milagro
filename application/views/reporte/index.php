<style type="text/css">
tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }

.descp{width: 200px;}
</style>

<div class="matter">
    <div class="container">
        <div class="navbar-inner">  
            <div class="row" style="margin-bottom:10px" >
                <div class="col-md-7" >
                    <div class="form-group"  >
                        <label class="col-md-2 control-label" > Opcion:</label>
                        <div class="col-md-10" >
                            <select class="form-control" name='opcion' id='opcion' placeholder="">
                                <!--option value='' >Seleccione...</option-->
                                <?php 
                                for($i=0;$i<count($opcion);$i++){ //Aca va la lista de los modulos padres ?> 
                                        <option value="<?php echo $opcion[$i]['inv_id'];?>"><?php echo $opcion[$i]['inv_descripcion']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>                
                <input id="cargar_tabla" type="button" class="btn btn-info" value="CARGAR" >  

            </div>

            <div class="row col-md-12" >    
                <table id="table" class="display compact" cellspacing="0" width="100%">
                    <thead>
                        <tr>

                            <th>Cod</th>
                            <th>Cod. Barra</th>
                            <th>Marca</th>                        
                            <th>Tipo</th>
                            <th>Descripcion</th>
                            <th>Fraccion</th>
                            <th>P Comp</th>
                            <th>Utilidad</th>
                            <th>P Vent</th>
                            <th>Cant E</th>
                            <th>Cant F</th>
                            <th>Prec Inv</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    
                </table>  

            </div>

        </div>
    </div> 
</div> 