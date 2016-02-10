<div class="navbar-inner">
<?php if (isset($this->datos) && count($this->datos)) { ?>
    
    <table id="table" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Fecha Recibida</th>
                <th>Proveedor</th>
                <th>Fecha Emision</th>
                <th>Fecha Vencimiento</th>
                <th>Subtotal</th>
                <th>IGV</th>
                <th>Total</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
         <tbody>
            <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td><?php echo $this->datos[$i]['fecha_actual'];// ?></td> 
                <td><?php echo $this->datos[$i]['razon_social'];// ?></td> 
                <td><?php echo $this->datos[$i]['fecha_emision'];//?></td> 
                <td><?php echo $this->datos[$i]['fecha_vencimiento'];//?></td> 
                <td><?php echo $this->datos[$i]['subtotal'];// ?></td> 
                <td><?php echo $this->datos[$i]['igv'];// ?></td> 
                <td><?php echo number_format($this->datos[$i]['igv']+$this->datos[$i]['subtotal'], 2, '.', '');//?></td> 
                
                <td>
                    <a href="javascript:void(0)" onclick="eliminar('<?php echo BASE_URL?>ingreso/editar/<?php echo $this->datos[$i]['id_ingreso'] ?>')" class="btn btn-danger btn-minier"><i class="icon-remove icon-white"></i></a>
                    
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>  
    <div class="btn-group">
        <a class="btn btn-primary" href="<?php echo BASE_URL?>ingreso/nuevo" class="k-button">Nuevo</a>
    </div>      
    <?php } else { ?>
    <p>NO SE ENCONTRARON DATOS</p>
        <a class="btn btn-primary" href="<?php echo BASE_URL?>ingreso/nuevo" class="k-button">Nuevo</a>
    <?php } ?>
        
