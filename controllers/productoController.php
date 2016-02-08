
<?php

class productoController extends Controller
{
    private $_model;
    private $_marca;
    private $_tipo_producto;
    
    
    public function __construct() {
        parent::__construct();
        $this->_model = $this->cargar_modelo('producto');
        $this->_marca = $this->cargar_modelo('marca');
        $this->_tipo_producto = $this->cargar_modelo('tipo_producto');
    }
    
    
    public function index() {
        $this->_vista->titulo = 'Lista de Productos';
        $this->_vista->datos = $this->_model->selecciona();
        $this->_vista->setCss(array('jquery.dataTables'));
        $this->_vista->setJs(array('jquery.dataTables.min','run_table'));
        $this->_vista->renderizar('index');
    }
    
    public function nuevo() {
        if ($_POST['guardar'] == 1) {
            /***        Comprobar codigo de barra              ***/
            $flag_cod_barra=0;
            
            if(trim($_POST['codigo_barra'])){
                $busqueda=$this->_model->buscar_codigo_barra(trim($_POST['codigo_barra']));
                
                if(count($busqueda)<>0){
                    $flag_cod_barra=1;
                }
            }
            
            
            if($flag_cod_barra==0){
                
                $this->_model->codigo_barra =  $_POST['codigo_barra'];
                $this->_model->id_marca = $_POST['id_marca'];
                $this->_model->id_tipo_producto = $_POST['id_tipo_producto'];
                $this->_model->presentacion = ucwords(strtolower( $_POST['presentacion']));
                $this->_model->descripcion = ucwords(strtolower( $_POST['descripcion']));
                $this->_model->contenido = ucwords(strtolower( $_POST['contenido']));
                $this->_model->fraccion = $_POST['fraccion'];
                $this->_model->ult_precio_compra = $_POST['ult_precio_compra'];
                $this->_model->ult_precio_venta = $_POST['ult_precio_venta'];
                $this->_model->utilidad = $_POST['utilidad'];

                $this->_model->insertar();
                $this->redireccionar('producto');
            }else{
                echo "<script>alert('Producto Existente')</script>";
                
            }
            
        }
        
        $this->_vista->marca = $this->_marca->selecciona();
        $this->_vista->tipo_producto = $this->_tipo_producto->selecciona();
        
        
        $this->_vista->titulo = 'Registrar Producto';
        $this->_vista->action = BASE_URL . 'producto/nuevo';
        $this->_vista->setJs_(array('funciones_form'));
        $this->_vista->renderizar('form');
    }
    public function editar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('producto');
        }

        if ($_POST['guardar'] == 1) {
            $this->_model->id_producto = (int)$_POST['id_producto'];
            $this->_model->codigo_barra =  $_POST['codigo_barra'];
            $this->_model->id_marca = $_POST['id_marca'];
            $this->_model->id_tipo_producto = $_POST['id_tipo_producto'];
            $this->_model->presentacion = ucwords(strtolower( $_POST['presentacion']));
            $this->_model->descripcion = ucwords(strtolower( $_POST['descripcion']));
            $this->_model->contenido = ucwords(strtolower( $_POST['contenido']));
            $this->_model->fraccion = $_POST['fraccion'];
            $this->_model->ult_precio_compra = $_POST['ult_precio_compra'];
            $this->_model->ult_precio_venta = $_POST['ult_precio_venta'];
            $this->_model->utilidad = $_POST['utilidad'];
            
            $this->_model->actualizar();
            $this->redireccionar('producto');
        }
        $this->_model->id_producto = $this->filtrarInt((int)$id);
        $this->_vista->datos = $this->_model->selecciona_id();
        
         $this->_vista->marca = $this->_marca->selecciona();
        $this->_vista->tipo_producto = $this->_tipo_producto->selecciona();
        
        
        $this->_vista->titulo = 'Actualizar producto';
        $this->_vista->action = BASE_URL . 'producto/editar/'.$id;
        $this->_vista->setJs_(array('funciones_form'));
        $this->_vista->renderizar('form');
    }
    
    public function buscador(){
        if(isset($_POST['codigo_barra'])){
            $busqueda = $this->_model->buscar_codigo_barra(trim($_POST['codigo_barra']));
        }
        echo json_encode($busqueda);
    }
}
?>
