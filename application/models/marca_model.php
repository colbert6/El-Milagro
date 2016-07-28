<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Marca_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
            
            $this->db=$this->load->database('mysql',TRUE);        
    
        }

        function select(){
            $this->db->where("estado",1);  
            $query=$this->db->get("marca");      
            return $query;            
        }

        function crear($data){
            $datos=array('descripcion' => $data['descripcion'],
                        'abreviatura' => $data['abreviatura'] );
            if($this->db->insert('marca',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;            
        }

        function editar($data){
            $datos=array('descripcion' => $data['descripcion'],
                        'abreviatura' => $data['abreviatura'] );
            $this->db->where("id_marca",$data['id']);
            if($this->db->update('marca',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

        function eliminar($id){
            $datos=array('estado' => 0 );
            $this->db->where("id_marca",$id);
            if($this->db->update('marca',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

    }
?>