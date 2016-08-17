<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class producto extends CI_Controller
    {   
        
        function __construct(){
            parent::__construct();
            $this->load->model('producto_model');
            $this->load->model('marca_model');
            $this->load->model('tipo_producto_model');           
        }
        
        public function index()
        {   
            $dato_header= array ( 'titulo'=> 'Productos');
            $dato_foother= array ( 'add_table'=> 'si');
            $data= array ( 'marca'=> $this->marca_model->select_orden()->result_array(),
                           'tipo_producto'=>$this->tipo_producto_model->select_orden()->result_array());
            //print_r($data);exit();

            $this->load->view("/layout/header.php",$dato_header);
            $this->load->view("/producto/index.php",$data);
            $this->load->view("/layout/foother.php",$dato_foother);
            
        }

        public function guardar()
        {   
            if(!empty($_POST['id'])) {
                $data= array ( 'id'=> $this->input->post('id'),
                                'barra'=> $this->input->post('barra'),
                                'marca'=> $this->input->post('marca'),
                                'tipo'=> $this->input->post('tipo_p'),
                                'descripcion'=> $this->input->post('descripcion'),
                                'presentacion'=> $this->input->post('presentacion'),
                                'contenido'=> $this->input->post('contenido'),
                                'uni_med'=> $this->input->post('uni_med'),
                                'fraccion'=> $this->input->post('fraccion'),
                                'precio_compra'=> $this->input->post('p_compra'),
                                'precio_venta'=> $this->input->post('p_venta'),
                                'utilidad'=> $this->input->post('utilidad')
                                );
                $guardar=$this->producto_model->editar($data);   

            }else{
                $data= array ( 'barra'=> $this->input->post('barra'),
                                'marca'=> $this->input->post('marca'),
                                'tipo'=> $this->input->post('tipo_p'),
                                'descripcion'=> $this->input->post('descripcion'),
                                'presentacion'=> $this->input->post('presentacion'),
                                'contenido'=> $this->input->post('contenido'),
                                'uni_med'=> $this->input->post('uni_med'),
                                'fraccion'=> $this->input->post('fraccion'),
                                'precio_compra'=> $this->input->post('p_compra'),
                                'precio_venta'=> $this->input->post('p_venta'),
                                'utilidad'=> $this->input->post('utilidad')
                                 );
                $guardar=$this->producto_model->crear($data);
                
            } 
            echo json_encode($guardar);            
            
        }
     
        public function editar_precio()
        {            
            $data= array (  'id'=> $this->input->post('id'),
                            'precio_compra'=> $this->input->post('p_compra'),
                            'utilidad'=> $this->input->post('utilidad'),
                            'precio_venta'=> $this->input->post('p_venta')
                                 );
            $guardar=$this->producto_model->editar_precio($data);
            echo json_encode($guardar);            
            
        }

        public function eliminar()
        {            
            $guardar=$this->producto_model->eliminar($_POST['id']);
            echo json_encode($guardar);            
            
        }

        public function cargar_datos($tabla='producto')
        {   
            $consulta=$this->producto_model->select($tabla);
            //echo "<pre>";            print_r($consulta);exit();
            $result= array("draw"=>1,
                "recordsTotal"=>$consulta->num_rows(),
                 "recordsFiltered"=>$consulta->num_rows(),
                 "data"=>$consulta->result());
            
            
            echo json_encode($result);
        }

        public function buscador_codigo_barra($tabla='producto')
        {   //$_POST['codigo_barra']="039800015465";
            if(!empty($_POST['codigo_barra'])){
                $consulta=$this->producto_model->select_por_barra(trim($_POST['codigo_barra']));  
            }                  
            echo json_encode($consulta->result_array());
        }

    }
 ?>

