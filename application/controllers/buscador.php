<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class Buscador extends CI_Controller
    {   
        
        function __construct(){
            parent::__construct();
            $this->load->model('producto_model');           
        }
        
        public function index()
        {   
            $dato_header= array ( 'titulo'=> 'Buscar Productos');
            $dato_foother= array ( 'add_table'=> 'si');

            $this->load->view("/layout/header.php",$dato_header);
            $this->load->view("/buscador/index.php");
            $this->load->view("/layout/foother.php",$dato_foother);

            
        }


    }
 ?>

