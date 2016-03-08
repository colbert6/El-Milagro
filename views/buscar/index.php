<div class="navbar-inner">
<?php if (isset($this->datos) && count($this->datos)) { ?>
    
    <table id="table" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th style="width: 25px;">Cod</th>
                <th>Cod. Barra</th>
                <th>Marca Descripcion</th>
                <th>Tipo de Producto</th>
                <th style="width: 100px;">Marca</th>
                <th style="width: 100px;">Tipo</th>
                <th style="width: 350px;">Descripcion</th>
                <th style="width: 15px;" >Fraccion.</th>
                <th style="width: 15px;">P. Venta</th>
                <th style="width: 15px;">P. Unitario</th>
            </tr>
        </thead>
         <tbody>
            <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td><?php echo "0000".((int)$this->datos[$i]['id_producto']);//id ?></td>
                <td><?php echo $this->datos[$i]['codigo_barra'];//barra ?></td>
                <td><?php echo $this->datos[$i]['marca_desc'];// ?></td>
                <td><?php echo $this->datos[$i]['tipo_producto_desc'];// ?></td>
                <td><?php echo $this->datos[$i]['marca'];// ?></td> 
                <td><?php echo $this->datos[$i]['tipo_producto'];// ?></td> 
                <td><?php if(trim($this->datos[$i]['contenido'])<>""){
                           echo $this->datos[$i]['descripcion']." ".trim($this->datos[$i]['contenido']);// 
                          }else{
                           echo $this->datos[$i]['descripcion'];   
                          }
                        
                        ?></td> 
                <td><?php echo $this->datos[$i]['fraccion'];// ?></td> 
                <?php $precio_venta=  number_format(round($this->datos[$i]['ult_precio_venta']*10)/10, 2, '.', '');?>
                <td style="color: black;font-weight: bold;"><?php echo $precio_venta;//nombre ?></td> 
                <?php $precio_venta_uni= number_format(round(($precio_venta/(int)$this->datos[$i]['fraccion'])*10)/10, 2, '.', '');?>
                <td style="color: blue;font-weight: bold;" ><?php echo $precio_venta_uni;//nombre ?></td> 
                
            </tr>
        <?php } ?>
        </tbody>
    </table>  
    <div class="btn-group">
    </div>      
<?php } else { ?>
    <p>NO SE ENCONTRARON DATOS</p>
<?php } ?>
        
