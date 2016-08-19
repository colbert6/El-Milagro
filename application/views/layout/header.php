 <!DOCTYPE html>

<head>
	<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    
    <link rel="shortcut icon" href="<?= base_url(); ?>public/img/logo_pest.png"  />
    
    <link href="<?= base_url(); ?>public/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>public/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>public/css/style.css" rel="stylesheet" />
    <!--link href="<?= base_url(); ?>public/css/estilos.css" rel="stylesheet" /-->

    <script src="<?= base_url(); ?>public/js/jquery-1.12.3.min.js"></script> 
    <script src="<?= base_url(); ?>public/js/bootstrap.js"></script>
    <script src="<?= base_url(); ?>public/js/custom.js"></script>
    <script src="<?= base_url(); ?>public/js/validaciones.js"></script>

            
</head>
<body>
    <div class="navbar bs-docs-nav" role="banner" id="headerSection" style="min-height: 10px;">
        <a href="<?=base_url();?>">
           <img src="<?= base_url(); ?>public/img/logo_1.png" width="200px" height="38px" class="logo" >
        </a>
    </div>
    <div class="content" id="cuerpo">
        <div class="sidebar">

            <div class="sidebar-dropdown"><a href="#">Menú</a></div>
            <script>
                var base_url="<?= base_url(); ?>";
            </script>
        <!-- menu     -->
            <ul id="nav">

                <li><a href="<?= base_url(); ?>"><i class=' fa fa-home'></i><span>Inicio</span></a></li>
                
                <li class='has_sub'><a href='javascript:void' class='opcion_menu' ><i class='fa fa-plus'></i><span>Agregar</span><span class='pull-right'><i class='fa fa-chevron-right'></i></span></a>
                    <ul class='lista_menu'>
                       <li><a href="<?= base_url(); ?>producto/">Producto</a></li>
                       <li><a href="<?= base_url(); ?>marca/">Marca</a></li>
                       <li><a href="<?= base_url(); ?>tipo_producto/">Tipo Producto</a></li>
                    </ul>
                </li>

                <li><a href="<?= base_url(); ?>buscador/"><i class=' fa fa-search'></i><span>Buscar</span></a></li>    
                
                <li class='has_sub'><a href='javascript:void' class='opcion_menu' ><i class='fa fa-info-circle'></i><span>Inventario</span><span class='pull-right'><i class='fa fa-chevron-right'></i></span></a>
                    <ul class='lista_menu'>
                       <li><a href="<?= base_url(); ?>inventario/">Ver Inventarios</a></li>
                       <li><a href="<?= base_url(); ?>detalle_inventario/">Realizar Inventario</a></li>
                    </ul>
                </li>

                <li class='has_sub'><a href='javascript:void' class='opcion_menu' ><i class='fa fa-book'></i><span>Reportes</span><span class='pull-right'><i class='fa fa-chevron-right'></i></span></a>
                    <ul class='lista_menu'>
                       <li><a href="<?= base_url(); ?>reporte/inventario">De Inventario</a></li>
                       <!--li><a href="<?= base_url(); ?>reporte/producto">De Producto</a></li-->
                    </ul>
                </li> 

            </ul>
        </div>
        
        <div class="mainbar">
            <div class="page-head">
                <h2 class="pull-left">  <?= @$titulo;?>   </h2>
                <div class="clearfix">
                </div>
            </div><!--/.page-header-->

            




    


