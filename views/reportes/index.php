<div class="navbar-inner text-center">
<h3></h3>
    <div id="grilla" class="grilla-min">
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th colspan="3" >*Lista de Reportes</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td style="text-align: center">Productos: Ordenado Segun Marca</td>
                <td style="text-align: center">
                    <a target="_blank" href="<?php echo BASE_URL ?>reportes/productos_todo" class="btn btn-grey"><i class="icon-list icon-white"></i> Reportar</a>
                </td>
            </tr>
            <tr>
                <td style="text-align: center">Productos: Ordenado Segun Tipo de Producto</td>
                <td style="text-align: center">
                    <a target="_blank" href="<?php echo BASE_URL ?>reportes/order_tipo" class="btn btn-grey"><i class="icon-list icon-white"></i> Reportar</a>
                </td>
            </tr>
            <tr>
                <form class="form-horizontal" role="form" target="_blank" id="frm" method="post" action="<?php echo BASE_URL; ?>reportes/filtro">
                <td>
                    <div class="col-md-5 col-md-offset-1" >
                        <div class="form-group"  >
                            <label class="col-md-4 control-label" > Marca:</label>
                            <div class="col-md-7"style="padding-right: 0px;">
                                <select class="form-control" name='id_marca' id='id_marca' placeholder="">
                                    <option value='' >Todos</option>
                                    <?php for($i=0;$i<count($this->marca);$i++){ //Aca va la lista de los modulos padres ?> 
                                        <option value="<?php echo $this->marca[$i]['id_marca'];?>"><?php echo $this->marca[$i]['descripcion']?></option>
                                      
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" >
                        <div class="form-group"  >
                            <label class="col-md-4 control-label" > Tipo Producto:</label>
                            <div class="col-md-7" style="padding-right: 0px;">
                                <select class="form-control" name='id_tipo_producto' id='id_tipo_producto' placeholder="">
                                    <option value='' >Todos</option>
                                    <?php for($i=0;$i<count($this->tipo_producto);$i++){ //Aca va la lista de los modulos padres ?> 
                                            <option value="<?php echo $this->tipo_producto[$i]['id_tipo_producto'];?>"><?php echo $this->tipo_producto[$i]['descripcion']?></option>
                                       
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                
                </td>
                <td style="text-align: center">
                    <a id="generar_reporte_filtro" class="btn btn-grey"><i class="icon-list icon-white"></i> Reportar</a>
                </td>
                </form>
                
            </tr>
            
        </tbody>
    </table>
    
        
        
    </div>