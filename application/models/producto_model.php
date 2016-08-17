<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Producto_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
            
            $this->db=$this->load->database('mysql',TRUE);        
    
        }

        function select(){
            $sql="  SELECT p.*,CONCAT(p.descripcion,p.contenido)as descripcion_2, m.descripcion as marca_desc ,m.abreviatura as marca , tp.abreviado as tipo_producto,tp.descripcion as tipo_producto_desc 
                    FROM producto as p , marca as m, tipo_producto as tp 
                    WHERE p.estado=1 and p.id_marca=m.id_marca and p.id_tipo_producto=tp.id_tipo_producto";
            $query=$this->db->query($sql);      
            return $query;            
        }

        function select_por_barra($cod){
            $sql="SELECT id_producto FROM producto WHERE codigo_barra=$cod AND estado=1" ;             
            $query=$this->db->query($sql);      
            return $query;                  
        }

        function crear($data){
            $datos=array('codigo_barra' => $data['barra'],
                            'id_marca' => $data['marca'],
                            'id_tipo_producto' => $data['tipo'],
                            'descripcion' => $data['descripcion'],
                            'presentacion' => $data['presentacion'],
                            'contenido' => $data['contenido'],
                            'fraccion' => $data['fraccion'],
                            'ult_precio_compra' => $data['precio_compra'],
                            'ult_precio_venta' => $data['precio_venta'],
                            'estado' => 1,
                            'utilidad' => $data['utilidad'],
                            'ult_modificacion' => date("Y-m-d H:i:s")                         
                         );
            if($this->db->insert('producto',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;            
        }

        function editar($data){
            $datos=array('codigo_barra' => $data['barra'],
                            'id_marca' => $data['marca'],
                            'id_tipo_producto' => $data['tipo'],
                            'descripcion' => $data['descripcion'],
                            'presentacion' => $data['presentacion'],
                            'contenido' => $data['contenido'],                    
                            'fraccion' => $data['fraccion'],
                            'ult_precio_compra' => $data['precio_compra'],
                            'ult_precio_venta' => $data['precio_venta'],
                            'utilidad' => $data['utilidad']                               
                         );
            $this->db->where("id_producto",$data['id']);
            if($this->db->update('producto',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

        function editar_precio($data){
            $datos=array(   'ult_precio_compra' => $data['precio_compra'],
                            'ult_precio_venta' => $data['precio_venta'],
                            'utilidad' => $data['utilidad'],
                            'ult_modificacion' => date("Y-m-d H:i:s")                              
                         );
            $this->db->where("id_producto",$data['id']);
            if($this->db->update('producto',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

        function eliminar($id){
            $datos=array('estado' => 0 );
            $this->db->where("id_producto",$id);
            if($this->db->update('producto',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

    }
?>