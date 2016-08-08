<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Inventario_model extends CI_Model{
        
        function __construct(){
            parent::__construct();            
            $this->db=$this->load->database('mysql',TRUE);        
    
        }

        function select(){
            $this->db->where("inv_estado",1);  
            $query=$this->db->get("inventario");      
            return $query;            
        }

        function crear($data){
            $datos=array('inv_descripcion' => $data['descripcion'],
                        'inv_ano' => $data['ano'],
                        'inv_estado' => 1
                         );
            if($this->db->insert('inventario',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;            
        }

        function editar($data){
            $datos=array('inv_descripcion' => $data['descripcion'],
                        'inv_ano' => $data['ano'],
                        'inv_estado' => 1
                         );
            $this->db->where("inv_id",$data['id']);
            if($this->db->update('inventario',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

        function eliminar($id){
            $datos=array('inv_estado' => 0 );
            $this->db->where("inv_id",$id);
            if($this->db->update('inventario',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

    }
?>