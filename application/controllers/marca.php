<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class Marca extends CI_Controller
    {   
        
        function __construct(){
            parent::__construct();
            $this->load->model('marca_model');           
        }
        
        public function index()
        {   
            $dato_header= array ( 'titulo'=> 'Marcas');
            $dato_foother= array ( 'add_table'=> 'si');

            $this->load->view("/layout/header.php",$dato_header);
            $this->load->view("/marca/index.php");
            $this->load->view("/layout/foother.php",$dato_foother);            
        }

        public function guardar()
        {   
            if(!empty($_POST['id'])) {
                $data= array ( 'id'=> $this->input->post('id'),
                                'descripcion'=> $this->input->post('descripcion'),
                                'abreviatura'=> $this->input->post('abreviatura'));
                $guardar=$this->marca_model->editar($data);   

            }else{
                $data= array ( 'descripcion'=> $this->input->post('descripcion'),
                                'abreviatura'=> $this->input->post('abreviatura') );
                $guardar=$this->marca_model->crear($data);
                
            } 
            echo json_encode($guardar);            
            
        }
     
        public function eliminar()
        {            
            $guardar=$this->marca_model->eliminar($_POST['id']);
            echo json_encode($guardar);            
            
        }

        public function cargar_datos($tabla='marca')
        {   
            $consulta=$this->marca_model->select($tabla);
            //echo "<pre>";            print_r($consulta);exit();
            $result= array("draw"=>1,
                "recordsTotal"=>$consulta->num_rows(),
                 "recordsFiltered"=>$consulta->num_rows(),
                 "data"=>$consulta->result());
            
            
            echo json_encode($result);
        }



    }
 ?>

