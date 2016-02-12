<div class="navbar-inner">
<?php if (isset($this->datos) && count($this->datos)) { ?>
    
    <table id="table" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th >Cod</th>
                <th>Cod. Barra</th>
                <th style="width: 120px;">Marca</th>
                <th style="width: 150px;">Tipo</th>
                <th style="width: 200px;">Descripcion</th>
                <th style="width: 15px;" >Fraccion</th>
                
                <th>P. Compra</th>
                <th>P. Venta</th>
            </tr>
        </thead>
         <tbody>
            <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td><?php echo "0000".((int)$this->datos[$i]['id_producto']);//id ?></td>
                <td><?php echo $this->datos[$i]['codigo_barra'];//barra ?></td>
                <td><?php echo $this->datos[$i]['marca'];// ?></td> 
                <td><?php echo $this->datos[$i]['tipo_producto'];// ?></td> 
                <td><?php if(trim($this->datos[$i]['contenido'])<>""){
                           echo $this->datos[$i]['descripcion']." ".trim($this->datos[$i]['contenido']);// 
                          }else{
                           echo $this->datos[$i]['descripcion'];   
                          }
                        
                        ?></td> 
                <td><?php echo $this->datos[$i]['fraccion'];// ?></td> 
                <?php $precio_compra=  number_format(round($this->datos[$i]['ult_precio_compra']*100)/100, 2, '.', '');?>
                <td><?php echo $precio_compra;//nombre ?></td> 
                <?php $precio_venta=  number_format(round($this->datos[$i]['ult_precio_venta']*100)/100, 2, '.', '');?>
                <td style="color: black;font-weight: bold;" ><?php echo $precio_venta;//nombre ?></td> 
                
            </tr>
        <?php } ?>
        </tbody>
    </table>  
    <div class="btn-group">
    </div>      
    <?php } else { ?>
    <p>NO SE ENCONTRARON DATOS</p>
         <?php } ?>
        
