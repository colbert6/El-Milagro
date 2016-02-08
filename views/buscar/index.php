<div class="navbar-inner">
<?php if (isset($this->datos) && count($this->datos)) { ?>
    
    <table id="table" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Cod. Barra</th>
                <th>Marca</th>
                <th>Tipo</th>
                <th>Descripcion</th>
                <th>Fraccion</th>
                <th>P. Compra</th>
                <th>P. Venta</th>
            </tr>
        </thead>
         <tbody>
            <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td><?php echo "0000".((int)$this->datos[$i]['id_producto']);//id ?></td>
                <td><?php echo $this->datos[$i]['codigo_barra'];//barra ?></td>
                <td><?php echo $this->datos[$i]['marca'];//nombre ?></td> 
                <td><?php echo $this->datos[$i]['tipo_producto'];//nombre ?></td> 
                <td><?php if(trim($this->datos[$i]['contenido'])<>""){
                           echo $this->datos[$i]['descripcion']." x".trim($this->datos[$i]['contenido']);//nombre 
                          }else{
                           echo $this->datos[$i]['descripcion'];   
                          }
                        
                        ?></td> 
                <td><?php echo $this->datos[$i]['fraccion'];//nombre ?></td> 
                <td><?php echo $this->datos[$i]['ult_precio_compra'];//nombre ?></td> 
                <td style="color: black;font-weight: bold;" ><?php echo $this->datos[$i]['ult_precio_venta'];//nombre ?></td> 
                
            </tr>
        <?php } ?>
        </tbody>
    </table>  
    <div class="btn-group">
    </div>      
    <?php } else { ?>
    <p>NO SE ENCONTRARON DATOS</p>
         <?php } ?>
        
