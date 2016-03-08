<?php

class productoModel extends Model
{
    public $id_producto;
    public $codigo_barra;
    public $id_marca;
    public $id_tipo_producto;
    public $presentacion;
    public $descripcion;
    public $contenido;
    public $fraccion;
    public $ult_precio_compra;
    public $ult_precio_venta;
    public $utilidad;
    public $estado;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function selecciona_completo()
    {
        $datos = $this->_db->query("select p.*,m.descripcion as marca , tp.descripcion as tipo_producto "
                                . " from producto as p , marca as m, tipo_producto as tp "
                                . " where estado=1 and p.id_marca=m.id_marca and p.id_tipo_producto=tp.id_tipo_producto ");
        return $datos->fetchall();
    }
    
    public function selecciona_reporte()//todos los productos
    {
        $datos = $this->_db->query("select p.*,m.descripcion as marca , tp.descripcion as tipo_producto "
                                . " from producto as p , marca as m, tipo_producto as tp "
                                . " where estado=1 and p.id_marca=m.id_marca and p.id_tipo_producto=tp.id_tipo_producto "
                                . " order by m.descripcion asc,tp.descripcion,p.descripcion  asc ");
        return $datos->fetchall();
    }
    
    public function selecciona_reporte_order_tipo()//todos los productos ordenados por tipo
    {
        $datos = $this->_db->query("select p.*,m.descripcion as marca , tp.descripcion as tipo_producto "
                                . " from producto as p , marca as m, tipo_producto as tp "
                                . " where estado=1 and p.id_marca=m.id_marca and p.id_tipo_producto=tp.id_tipo_producto "
                                . " order by tp.descripcion asc,m.descripcion,p.descripcion asc ");
        return $datos->fetchall();
    }
    
    public function selecciona_reporte_filtro($m,$t)//productos filtrados
    {
        $sql="";
        $sql.=  "select p.*,m.descripcion as marca , tp.descripcion as tipo_producto "
                . " from producto as p , marca as m, tipo_producto as tp "
                . " where estado=1 and p.id_marca=m.id_marca and p.id_tipo_producto=tp.id_tipo_producto ";
        if($m!=''){
            $sql.=  " and p.id_marca=".$m;
        }
        if($t!=''){
            $sql.=  " and p.id_tipo_producto=".$t;
        }
        
        $sql.= " order by m.descripcion asc,tp.descripcion,p.descripcion asc ";
        
        $datos = $this->_db->query($sql);
        return $datos->fetchall();
    }
    
    public function selecciona()
    {
        $datos = $this->_db->query("select p.*,m.descripcion as marca_desc ,m.abreviatura as marca , tp.abreviado as tipo_producto,tp.descripcion as tipo_producto_desc "
                                . " from producto as p , marca as m, tipo_producto as tp "
                                . " where estado=1 and p.id_marca=m.id_marca and p.id_tipo_producto=tp.id_tipo_producto ");
        return $datos->fetchall();
    }
    
    public function selecciona_id()
    {
        $datos = $this->_db->query("select * "
                                . " from producto "
                                . " where estado=1 and id_producto=".$this->id_producto);
        return $datos->fetchall();
    }
    
    public function insertar()
    {
        $this->_db->prepare("INSERT INTO producto 
            
                ( codigo_barra, id_marca, id_tipo_producto, descripcion,
                presentacion, contenido,  fraccion, ult_precio_compra,
                ult_precio_venta,utilidad,estado,ult_modificacion)
                
                VALUES ( :codigo_barra, :id_marca, :id_tipo_producto, :descripcion,
                :presentacion, :contenido, :fraccion, :ult_precio_compra,
                :ult_precio_venta,:utilidad,:estado,NOW()) ")
                ->execute(
                        array(
                            ':codigo_barra' => $this->codigo_barra,
                            ':id_marca' => $this->id_marca,
                            ':id_tipo_producto' => $this->id_tipo_producto,
                            ':descripcion' => $this->descripcion,
                            ':presentacion' => $this->presentacion,
                            ':contenido' => $this->contenido,
                            ':fraccion' => $this->fraccion,
                            ':ult_precio_compra' => $this->ult_precio_compra,
                            ':ult_precio_venta' => $this->ult_precio_venta,
                            ':utilidad' => $this->utilidad,
                            ':estado' => '1'
                        ));
    }
    
    public function actualizar()
    {
        
        $this->_db->prepare("UPDATE producto SET 
            
                codigo_barra=:codigo_barra , id_marca=:id_marca, id_tipo_producto=:id_tipo_producto,
                descripcion=:descripcion,presentacion=:presentacion, contenido=:contenido,
                fraccion=:fraccion, ult_precio_compra=:ult_precio_compra,
                ult_precio_venta=:ult_precio_venta,utilidad=:utilidad ,ult_modificacion=NOW() 
                
                WHERE id_producto=:id_producto")
                ->execute(
                        array(
                            ':id_producto' => (int)$this->id_producto,
                            ':codigo_barra' => $this->codigo_barra,
                            ':id_marca' => $this->id_marca,
                            ':id_tipo_producto' => $this->id_tipo_producto,
                            ':descripcion' => $this->descripcion,
                            ':presentacion' => $this->presentacion,
                            ':contenido' => $this->contenido,
                            ':fraccion' => $this->fraccion,
                            ':ult_precio_compra' => $this->ult_precio_compra,
                            ':ult_precio_venta' => $this->ult_precio_venta,
                            ':utilidad' => $this->utilidad
                            
                        ));
        
    }
    
    public function act_precios()
    {
        
        $this->_db->prepare("UPDATE producto SET 
            
                ult_precio_compra=:ult_precio_compra,
                ult_precio_venta=:ult_precio_venta,utilidad=:utilidad ,ult_modificacion=NOW() 
                
                WHERE id_producto=:id_producto")
                ->execute(
                        array(
                            ':id_producto' => (int)$this->id_producto,
                            ':ult_precio_compra' => $this->ult_precio_compra,
                            ':ult_precio_venta' => $this->ult_precio_venta,
                            ':utilidad' => $this->utilidad
                            
                        ));
        
    }
    
    public function buscar_codigo_barra($codigo)
    {
        $datos = $this->_db->query("select * from producto where estado=1 and codigo_barra='".$codigo."'");
        return $datos->fetchall();
            
    }
    
}
?>