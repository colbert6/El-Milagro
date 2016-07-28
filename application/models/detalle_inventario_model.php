<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Detalle_inventario_model extends CI_Model{
        
        function __construct(){
            parent::__construct();            
            $this->db=$this->load->database('mysql',TRUE);  
        }

        function select(){
            $query=$this->db->get("detalle_inventario");      
            return $query;            
        }

        function select_inventario_personal($id_inventario,$id_personal){
            $sql="SELECT p.id_producto,p.codigo_barra,p.ult_precio_venta as precio,m.descripcion as marca_desc ,m.abreviatura as marca,
                     tp.descripcion as tipo_producto_desc, tp.abreviado as tipo_producto,
                     CONCAT(p.descripcion,p.contenido)as descripcion, p.fraccion , p.ult_precio_venta,
                     (SELECT SUM(pro_cantidad_mayor) FROM detalle_inventario WHERE pro_id=id_producto and inv_id=$id_inventario and per_id=$id_personal GROUP BY pro_id ) as cant_e, 
                     (SELECT SUM(pro_cantidad_menor) FROM detalle_inventario WHERE pro_id=id_producto and inv_id=$id_inventario and per_id=$id_personal GROUP BY pro_id) as cant_f 
                FROM marca as m, tipo_producto as tp, producto as p 
                WHERE p.estado=1 and p.id_marca=m.id_marca and p.id_tipo_producto=tp.id_tipo_producto ";  
            $query=$this->db->query($sql);      
            return $query;            
        }

        function crear($data){
            $datos=array('pro_id' => $data['pro_id'],
                            'inv_id' => $data['inv_id'],
                            'per_id' => $data['per_id'],
                            'pro_cantidad_mayor' => $data['pro_cantidad_mayor'],
                            'pro_cantidad_menor' => $data['pro_cantidad_menor']
                             );
            if($this->db->insert('detalle_inventario',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;            
        }

        function editar($data){
            $datos=array('descripcion' => $data['descripcion'],
                        'abreviatura' => $data['abreviatura'] );
            $this->db->where("id_detalle_inventario",$data['id']);
            if($this->db->update('detalle_inventario',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

        function eliminar($id){
            $datos=array('estado' => 0 );
            $this->db->where("id_detalle_inventario",$id);
            if($this->db->update('detalle_inventario',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

    }
?>