<?php

class tipo_productoModel extends Model
{
    public $id_tipo_producto;
    public $descripcion;
    
    public function __construct() {
        parent::__construct();
    }
    
    
    public function selecciona()
    {
        $datos = $this->_db->query("select * from tipo_producto");
        return $datos->fetchall();
    }
    public function selecciona_id()
    {
        $datos = $this->_db->query("select * from tipo_producto where id_tipo_producto=".$this->id_tipo_producto);
        return $datos->fetchall();
    }
    public function insertar()
    {
        $this->_db->prepare("INSERT INTO tipo_producto (descripcion) VALUES ( :descripcion)")
                ->execute(
                        array(
                           ':descripcion' => $this->descripcion
                        ));
    }
    
    public function actualizar()
    {
        $id = (int) $this->id_tipo_producto;
        $descrip=  $this->descripcion;
        
        $this->_db->prepare("UPDATE tipo_producto SET descripcion = :descripcion WHERE id_tipo_producto = :id")
                ->execute(
                        array(
                           ':id' => $id,
                           ':descripcion' => $descrip
                        ));
    }
    
    public function eliminar($id)
    {
        $id = (int) $id;
        $this->_db->query("DELETE FROM posts WHERE id = $id");
    }
}
?>