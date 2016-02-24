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
            <tr>
                <td><?php echo "0000".((int)$this->datos[$i]['id_producto']);//id ?></td>
                <td><?php echo $this->datos[$i]['codigo_barra'];// ?></td> 
                <td><?php echo $this->datos[$i]['marca'];// ?></td> 
                <td><?php echo $this->datos[$i]['tipo_producto'];// ?></td> 
                <td><?php if(trim($this->datos[$i]['contenido'])<>""){
                           echo $this->datos[$i]['descripcion']." ".trim($this->datos[$i]['contenido']);//nombre 
                          }else{
                           echo $this->datos[$i]['descripcion'];   
                          }
                        
                        ?></td> 
                <td><?php echo $this->datos[$i]['fraccion'];//nombre ?></td> 
                <td><?php echo $this->datos[$i]['ult_precio_compra'];//nombre ?></td> 
                <td><?php echo $this->datos[$i]['utilidad'];//nombre ?></td> 
                <td><?php echo $this->datos[$i]['ult_precio_venta'];//nombre ?></td> 
                <td>
                    <a href="javascript:void(0)" onclick="editar('<?php echo BASE_URL?>producto/editar/<?php echo $this->datos[$i]['id_producto'] ?>')" class="btn btn-success btn-minier"><i class="icon-pencil icon-white"></i></a>
                    
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
        
