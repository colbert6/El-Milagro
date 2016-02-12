<?php

class marcaModel extends Model
{
    public $id_marca;
    public $descripcion;
    public $abreviatura;
    
    public function __construct() {
        parent::__construct();
    }
    
    
    public function selecciona()
    {
        $datos = $this->_db->query("select * from marca");
        return $datos->fetchall();
    }
    public function selecciona_prod()
    {
        $datos = $this->_db->query("select * from marca order by abreviatura");
        return $datos->fetchall();
    }
    public function selecciona_id()
    {
        $datos = $this->_db->query("select * from marca where id_marca=".$this->id_marca);
        return $datos->fetchall();
    }
    public function insertar()
    {
        $this->_db->prepare("INSERT INTO marca (descripcion,abreviatura) VALUES ( :descripcion,:abreviatura)")
                ->execute(
                        array(
                           ':descripcion' => $this->descripcion,
                           ':abreviatura' => $this->abreviatura
                        ));
    }
    
    public function actualizar()
    {
        $id = (int) $this->id_marca;
        $descrip=  $this->descripcion;
        $abrevi=  $this->abreviatura;
        
        $this->_db->prepare("UPDATE marca SET descripcion = :descripcion , abreviatura = :abreviatura  WHERE id_marca = :id")
                ->execute(
                        array(
                           ':id' => $id,
                           ':descripcion' => $descrip,
                           ':abreviatura' => $abrevi  
                        ));
    }
    
    public function eliminar($id)
    {
        $id = (int) $id;
        $this->_db->query("DELETE FROM posts WHERE id = $id");
    }
}
?>