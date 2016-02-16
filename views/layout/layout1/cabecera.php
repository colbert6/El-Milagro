 <!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
    	<meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>El Milagro</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" >
        <meta name="viewport" content="width=device-width">
        
        <link rel="shortcut icon" href="<?php echo BASE_URL?>public/img/olympo.png"  />
        
        <link href="<?php echo BASE_URL ?>public/css/bootstrap.css" rel="stylesheet" />
        <link href="<?php echo BASE_URL ?>public/css/font-awesome.css" rel="stylesheet" />
        <link href="<?php echo BASE_URL ?>public/css/style.css" rel="stylesheet" />
        
        <script src="<?php echo BASE_URL ?>public/js/jquery.min.js"></script>
        <script src="<?php echo BASE_URL ?>public/js/validaciones.js"></script>
        
        <?php if(isset($_layoutParams['js']) && count($_layoutParams['js'])){ ?>
            <?php for($i=0; $i < count($_layoutParams['js']); $i++){ ?>
                <script src="<?php echo $_layoutParams['js'][$i] ?>" type="text/javascript"></script>
            <?php }; ?>
        <?php }; ?>
        
        <?php if(isset($_layoutParams['css']) && count($_layoutParams['css'])){ ?>
            <?php for($i=0; $i < count($_layoutParams['css']); $i++){ ?>  
                <link href="<?php echo $_layoutParams['css'][$i] ?>" type="text/css" rel="stylesheet" media="screen" />
            <?php }; ?>
        <?php }; ?>
                
    </head>
    <body>
        <div class="navbar navbar-fixed-top bs-docs-nav" role="banner" id="headerSection" style="min-height: 10px;">
  <?php /*          <div class="conjtainer">
                <div class="navbar-header">
		    <button class="navbar-toggle btn-navbar" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
			<span>El Milagro</span>
		  </button>
		</div>		
	      <!-- Navigation starts -->
	      <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">  
		  <ul class="nav navbar-nav">  
		      <!-- Upload to server link. Class "dropdown-big" creates big dropdown -->
		      <li class="dropdown dropdown-big">
			<a href="<?php echo BASE_URL ?>inicio">
                            
			    <!--img src="<?php echo BASE_URL ?>lib/img/logo/logo_sin_fondo.png" width="150px" alt=""/!-->
			</a>
		      </li>
		  </ul>
		  <ul class="nav navbar-nav pull-right">
                  </ul>    
              </nav>
            </div>
   
   */?>	
        </div>
        <div class="content" id="cuerpo">
            <div class="sidebar">
                <div class="sidebar-dropdown"><a href="#">Menú</a></div>
                <script>
                    var url="<?php echo BASE_URL ?>";
                </script>
