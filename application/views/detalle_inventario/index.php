<div class="navbar-inner">
<?php if (isset($this->datos) && count($this->datos)) { ?>
    
    <table id="table" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ITEM</th>
                <th>DESCRIPCION</th>
                <th>AÑO</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
         <tbody>
            <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td><?php echo ($i+1);//id ?></td>
                <td><?php echo $this->datos[$i]['inv_descripcion'];//nombre ?></td> 
                <td><?php echo $this->datos[$i]['inv_ano'];//año ?></td> 
                <td>
                    <a href="javascript:void(0)" onclick="editar('<?php echo BASE_URL?>inventario/editar/<?php echo $this->datos[$i]['inv_id'] ?>')" class="btn btn-success btn-minier" title="Editar Inventario"><i class="icon-pencil icon-white"></i></a>
                    <a href="javascript:void(0)" onclick="reportar('<?php echo BASE_URL?>inventario/reportar/<?php echo $this->datos[$i]['inv_id'] ?>')" class="btn btn-primary btn-minier" title="Ver Inventario"><i class="icon-list icon-white"></i></a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>  
    <div class="btn-group">
        <a class="btn btn-primary" href="<?php echo BASE_URL?>inventario/nuevo" class="k-button">Nuevo</a>
    </div>      
    <?php } else { ?>
    <p>NO SE ENCONTRARON DATOS</p>
        <a class="btn btn-primary" href="<?php echo BASE_URL?>inventario/nuevo" class="k-button">Nuevo</a>
    <?php } ?>
        
