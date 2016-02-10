<div class="navbar-inner">
<?php if (isset($this->datos) && count($this->datos)) { ?>
    
    <table id="table" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ITEM</th>
                <th>Razon Social</th>
                <th>RUC</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
         <tbody>
            <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td><?php echo ($i+1);//id ?></td>
                <td><?php echo $this->datos[$i]['razon_social'];//nombre ?></td> 
                <td><?php echo $this->datos[$i]['ruc'];//nombre ?></td> 
                <td><?php echo $this->datos[$i]['direccion'];//nombre ?></td> 
                <td><?php echo $this->datos[$i]['telefono'];//nombre ?></td> 
                <td>
                    <a href="javascript:void(0)" onclick="editar('<?php echo BASE_URL?>proveedor/editar/<?php echo $this->datos[$i]['id_proveedor'] ?>')" class="btn btn-success btn-minier"><i class="icon-pencil icon-white"></i></a>
                    
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>  
    <div class="btn-group">
        <a class="btn btn-primary" href="<?php echo BASE_URL?>proveedor/nuevo" class="k-button">Nuevo</a>
    </div>      
    <?php } else { ?>
    <p>NO SE ENCONTRARON DATOS</p>
        <a class="btn btn-primary" href="<?php echo BASE_URL?>proveedor/nuevo" class="k-button">Nuevo</a>
    <?php } ?>
        
