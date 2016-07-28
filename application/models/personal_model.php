<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Personal_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
            
            $this->db=$this->load->database('mysql',TRUE);        
    
        }

        function select(){
            $this->db->where("per_estado",1);  
            $query=$this->db->get("personal");      
            return $query;            
        }

        function crear($data){
            $datos=array('per_dni' => $data['dni'],
                        'per_nombre' => $data['nombre'] );
            if($this->db->insert('personal',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;            
        }

        function editar($data){
            $datos=array('descripcion' => $data['descripcion'],
                        'abreviatura' => $data['abreviatura'] );
            $this->db->where("id_personal",$data['id']);
            if($this->db->update('personal',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

        function eliminar($id){
            $datos=array('estado' => 0 );
            $this->db->where("id_personal",$id);
            if($this->db->update('personal',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

    }
?>