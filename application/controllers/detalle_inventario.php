<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class detalle_inventario extends CI_Controller
    {   
        
        function __construct(){
            parent::__construct();
            $this->load->model('detalle_inventario_model');
            $this->load->model('inventario_model'); 
            $this->load->model('personal_model');            
        }
        
        public function index()
        {   
            $dato_header= array ( 'titulo'=> 'Registrar Inventario');
            $dato_foother= array ( 'add_table'=> 'si');

            $data=array (   'inventario' => $this->inventario_model->select()->result_array(),
                            'personal' =>$this->personal_model->select()->result_array() );
            //echo "<pre>";print_r($data['inventario']);exit();

            $this->load->view("/layout/header.php",$dato_header);
            $this->load->view("/detalle_inventario/realizar_inventario.php",$data);
            $this->load->view("/layout/foother.php",$dato_foother);            
        }


        public function guardar_inventario()
        {   
            if(!empty($_POST['pro'])) {
                $data= array (  'pro_id'=> $this->input->post('pro'),
                                'inv_id'=> $this->input->post('inv'),
                                'per_id'=> $this->input->post('per'),
                                'pro_cantidad_mayor'=> $this->input->post('c_e'),
                                'pro_cantidad_menor'=> $this->input->post('c_f'));
                $guardar=$this->detalle_inventario_model->crear($data);    
            } 
            
            echo json_encode($guardar);            
            
        }
     
        public function eliminar()
        {            
            $guardar=$this->detalle_inventario_model->eliminar($_POST['id']);
            echo json_encode($guardar);            
            
        }

        public function cargar_datos_filtro_inv_per($id_inventario=1,$id_personal=1)
        {   
            $consulta= $this->detalle_inventario_model->select_inventario_personal($id_inventario,$id_personal);
            $resultados=$consulta->result_array();
            //echo "<pre>";   print_r($consulta->result_array());exit();

            for ($i=0; $i <count($resultados) ; $i++) { 
                if(is_null($resultados[$i]['cant_e'])){
                    $resultados[$i]['cant_e']=0;
                }
                if(is_null($resultados[$i]['cant_f'])){
                    $resultados[$i]['cant_f']=0;
                }
            }
            //echo "<pre>";   print_r($resultados);exit();

            $result= array("draw"=>1,
                "recordsTotal"=>$consulta->num_rows(),
                 "recordsFiltered"=>$consulta->num_rows(),
                 "data"=>$resultados);
            
            
            echo json_encode($result);
        }


    }
 ?>

