<?php

class ingresoModel extends Model
{
    public $id_ingreso;
    public $id_proveedor;
    public $numero_factura;
    public $fecha_emision;
    public $fecha_actual;
    public $fecha_vencimiento;
    public $subtotal;
    public $igv;
    public $estado;
    
    
    public function __construct() {
        parent::__construct();
    }
    
    
    public function selecciona()
    {
        $datos = $this->_db->query("select i.*,p.razon_social "
                                  . "from ingreso as i,proveedor as p "
                                  . "where i.estado=1 and p.id_proveedor=i.id_proveedor");
        return $datos->fetchall();
    }
    
    public function insertar()
    {
        $this->_db->prepare("INSERT INTO marca (descripcion) VALUES ( :descripcion)")
                ->execute(
                        array(
                           ':descripcion' => $this->descripcion
                        ));
    }
    
    public function actualizar()
    {
        $id = (int) $this->id_marca;
        $descrip=  $this->descripcion;
        
        $this->_db->prepare("UPDATE marca SET descripcion = :descripcion WHERE id_marca = :id")
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