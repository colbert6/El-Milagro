<?php

class proveedorModel extends Model
{
    public $id_proveedor;
    public $razon_social;
    public $ruc;
    public $direccion;
    public $telefono;
    public $estado;
    
    public function __construct() {
        parent::__construct();
    }
    
    
    public function selecciona()
    {
        $datos = $this->_db->query("select * from proveedor");
        return $datos->fetchall();
    }
    public function selecciona_id()
    {
        $datos = $this->_db->query("select * from proveedor where id_proveedor=".$this->id_proveedor);
        return $datos->fetchall();
    }
    
    public function buscar_ruc($ruc)
    {
        $datos = $this->_db->query("select * from proveedor where ruc='".$ruc."'");
        return $datos->fetchall();
    }
    
    public function insertar()
    {
        $this->_db->prepare("INSERT INTO proveedor (razon_social,ruc,direccion,telefono,estado) "
                            . " VALUES ( :razon_social,:ruc,:direccion,:telefono,:estado)")
                ->execute(
                        array(
                           ':razon_social' => $this->razon_social,
                           ':ruc' => $this->ruc,
                           ':direccion' => $this->direccion,
                           ':telefono' => $this->telefono,
                           ':estado' => '1'
                            
                        ));
    }
    
    public function actualizar()
    {
       
        
        $this->_db->prepare("UPDATE proveedor "
                            . "SET razon_social = :razon_social,ruc=:ruc,direccion=:direccion,telefono=:telefono "
                            . " WHERE id_proveedor = :id")
                ->execute(
                        array(
                           ':id' =>  $this->id_proveedor,
                           ':razon_social' => $this->razon_social,
                           ':ruc' => $this->ruc,
                           ':direccion' => $this->direccion,
                           ':telefono' => $this->telefono
                        ));
    }
    
    public function eliminar($id)
    {
        $id = (int) $id;
        $this->_db->query("DELETE FROM posts WHERE id = $id");
    }
}
?>