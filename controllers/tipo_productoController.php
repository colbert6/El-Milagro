
<?php

class tipo_productoController extends Controller
{
    private $_model;
    
    public function __construct() {
        parent::__construct();
        $this->_model = $this->cargar_modelo('tipo_producto');
    }
    
    
    public function index() {
        $this->_vista->titulo = 'Lista de Tipos de Productos';
        $this->_vista->datos = $this->_model->selecciona();
        $this->_vista->setCss(array('jquery.dataTables'));
        $this->_vista->setJs(array('jquery.dataTables.min','run_table'));
        $this->_vista->renderizar('index');
    }
    
    public function nuevo() {
        if ($_POST['guardar'] == 1) {
            
            $this->_model->descripcion = ucwords(strtolower( $_POST['descripcion']));
            $this->_model->insertar();
            $this->redireccionar('tipo_producto');
        }
        $this->_vista->titulo = 'Registrar Tipo Producto';
        $this->_vista->action = BASE_URL . 'tipo_producto/nuevo';
        $this->_vista->setJs_(array('funciones_form'));
        $this->_vista->renderizar('form');
    }
    public function editar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('tipo_producto');
        }

        if ($_POST['guardar'] == 1) {
            $this->_model->id_tipo_producto = $_POST['id_tipo_producto'];
            $this->_model->descripcion = ucwords(strtolower( $_POST['descripcion']));
            $this->_model->actualizar();
            $this->redireccionar('tipo_producto');
        }
        $this->_model->id_tipo_producto = $this->filtrarInt($id);
        $this->_vista->datos = $this->_model->selecciona_id();
        
        $this->_vista->titulo = 'Actualizar Tipo Producto';
        $this->_vista->action = BASE_URL . 'tipo_producto/editar/'.$id;
        $this->_vista->setJs_(array('funciones_form'));
        $this->_vista->renderizar('form');
    }
}
?>
