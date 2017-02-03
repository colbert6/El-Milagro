<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class Reporte extends CI_Controller
    {   
        
        function __construct(){
            parent::__construct();
            $this->load->model('producto_model');
            $this->load->model('inventario_model');   
            $this->load->model('detalle_inventario_model');           
        }
        
        public function index()
        {   
            $dato_header= array ( 'titulo'=> 'Buscar Productos');
            $dato_foother= array ( 'add_table'=> 'si');

            $this->load->view("/layout/header.php",$dato_header);
            $this->load->view("/reporte/index.php");
            $this->load->view("/reporte/foother_reporte.php",$dato_foother);
        }

        public function inventario()
        {   
            $dato_header= array ( 'titulo'=> 'Reporte de Inventario');
            $dato_foother= array ( 'add_table'=> 'si');
            $data= array ( 'reporte'=> 'inventario','opcion'=>$this->inventario_model->select()->result_array());
            
            $this->load->view("/layout/header.php",$dato_header);
            $this->load->view("/reporte/index.php",$data);
            $this->load->view("/reporte/foother_reporte.php",$dato_foother);
        }



        public function cargar_reporte($opcion)

        {   
            $consulta= $this->detalle_inventario_model->reporte_inventario($opcion);
            $data=$consulta->result_array();

            for ($i=0; $i <count($data) ; $i++) { 
                $data[$i]["id_producto"]=str_pad($data[$i]["id_producto"], 8, "0", STR_PAD_LEFT);  
                $data[$i]["descrip"]=$data[$i]["marca"]." ".$data[$i]["tipo"]." ".$data[$i]["descripcion"];

                $pre=$data[$i]["presentacion"];
                if($pre=="Caja"){ $data[$i]["presentacion"]='12';}
                else{ $data[$i]["presentacion"]='07';}

                $fraccion=$data[$i]["fraccion"];
                $cant_e=$data[$i]["cant_e"];
                $cant_f=$data[$i]["cant_f"];
                
                if($cant_f>=$fraccion && $fraccion<>1){
                    $cant_e=$cant_e+(  floor($cant_f/$fraccion) );
                    $cant_f=($cant_f % $fraccion); 
                }

                $data[$i]["cantidad"]=number_format($cant_e+($cant_f/$fraccion), 2, ',', ' ');


                $pre_inv=$data[$i]["p_inventario"];

                $data[$i]["total"]=number_format(($cant_e+($cant_f/$fraccion))*$pre_inv, 3);
            }

            //echo "<pre>";   print_r($data);exit();
            $result= array("draw"=>1,
                "recordsTotal"=>$consulta->num_rows(),
                 "recordsFiltered"=>$consulta->num_rows(),
                 "data"=>$data);
            
            
            echo json_encode($result);
        }


    }
 ?>

