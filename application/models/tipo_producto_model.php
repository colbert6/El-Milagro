<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class tipo_producto_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
            
            $this->db=$this->load->database('mysql',TRUE);        
    
        }

        function select(){
            $this->db->where("estado",1);  
            $query=$this->db->get("tipo_producto");      
            return $query;            
        }

        function select_orden(){
            $this->db->where("estado",1);  
            $this->db->order_by("descripcion", "asc");
            $query=$this->db->get("tipo_producto");      
            return $query;            
        }

        function crear($data){
            $datos=array('descripcion' => $data['descripcion'],
                        'abreviado' => $data['abreviado'] );
            if($this->db->insert('tipo_producto',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;            
        }

        function editar($data){
            $datos=array('descripcion' => $data['descripcion'],
                        'abreviado' => $data['abreviado'] );
            $this->db->where("id_tipo_producto",$data['id']);
            if($this->db->update('tipo_producto',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

        function eliminar($id){
            $datos=array('estado' => 0 );
            $this->db->where("id_tipo_producto",$id);
            if($this->db->update('tipo_producto',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

    }
?>