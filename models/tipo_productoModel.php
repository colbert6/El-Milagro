<?php

class tipo_productoModel extends Model
{
    public $id_tipo_producto;
    public $descripcion;
    public $abreviado;
    
    public function __construct() {
        parent::__construct();
    }
    
    
    public function selecciona()
    {
        $datos = $this->_db->query("select * from tipo_producto");
        return $datos->fetchall();
    }
    
    public function selecciona_prod()
    {
        $datos = $this->_db->query("select * from tipo_producto order by descripcion");
        return $datos->fetchall();
    }
    
    public function selecciona_id()
    {
        $datos = $this->_db->query("select * from tipo_producto where id_tipo_producto=".$this->id_tipo_producto);
        return $datos->fetchall();
    }
    public function seleccion_relacionados()
    {
        $datos = $this->_db->query("select DISTINCT t.* from tipo_producto as t, producto as p where t.id_tipo_producto=p.id_tipo_producto"
                                   . " Order by t.descripcion asc ");
        return $datos->fetchall();
    }
    public function insertar()
    {
        $this->_db->prepare("INSERT INTO tipo_producto (descripcion,abreviado) VALUES ( :descripcion,:abreviado)")
                ->execute(
                        array(
                           ':descripcion' => $this->descripcion,
                           ':abreviado' => $this->abreviado
                        ));
    }
    
    public function actualizar()
    {
        $id = (int) $this->id_tipo_producto;
        $descrip=  $this->descripcion;
        
        $this->_db->prepare("UPDATE tipo_producto SET descripcion = :descripcion,abreviado=:abreviado WHERE id_tipo_producto = :id")
                ->execute(
                        array(
                           ':id' => $id,
                           ':descripcion' => $descrip,
                           ':abreviado' => $this->abreviado
                        ));
    }
    
    public function eliminar($id)
    {
        $id = (int) $id;
        $this->_db->query("DELETE FROM posts WHERE id = $id");
    }
}
?>