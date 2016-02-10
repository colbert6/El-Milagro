
<?php

class proveedorController extends Controller
{
    private $_model;
    
    public function __construct() {
        parent::__construct();
        $this->_model = $this->cargar_modelo('proveedor');
    }
    
    
    public function index() {
        $this->_vista->titulo = 'Lista de proveedor';
        $this->_vista->datos = $this->_model->selecciona();
        $this->_vista->setCss(array('jquery.dataTables'));
        $this->_vista->setJs(array('jquery.dataTables.min','run_table'));
        $this->_vista->renderizar('index');
    }
    
    public function nuevo() {
        if ($_POST['guardar'] == 1) {
            
            $this->_model->razon_social = ucwords(strtolower( $_POST['razon_social']));
            $this->_model->ruc = $_POST['ruc'];
            $this->_model->direccion = $_POST['direccion'];
            $this->_model->telefono = $_POST['telefono'];
            $this->_model->insertar();
            $this->redireccionar('proveedor');
        }
        $this->_vista->titulo = 'Registrar proveedor';
        $this->_vista->action = BASE_URL . 'proveedor/nuevo';
        $this->_vista->setJs_(array('funciones_form'));
        $this->_vista->renderizar('form');
    }
    public function editar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('proveedor');
        }

        if ($_POST['guardar'] == 1) {
            $this->_model->id_proveedor = $_POST['id_proveedor'];
            $this->_model->razon_social = ucwords(strtolower( $_POST['razon_social']));
            $this->_model->ruc = $_POST['ruc'];
            $this->_model->direccion = $_POST['direccion'];
            $this->_model->telefono = $_POST['telefono'];
            $this->_model->actualizar();
            $this->redireccionar('proveedor');
        }
        $this->_model->id_proveedor = $this->filtrarInt($id);
        $this->_vista->datos = $this->_model->selecciona_id();
        
        $this->_vista->titulo = 'Actualizar proveedor';
        $this->_vista->action = BASE_URL . 'proveedor/editar/'.$id;
        $this->_vista->setJs_(array('funciones_form'));
        $this->_vista->renderizar('form');
    }
    public function buscador(){
        if(isset($_POST['ruc'])){
            $busqueda = $this->_model->buscar_ruc(trim($_POST['ruc']));
            
        }else{
            $busqueda = $this->_model->selecciona();
        }
        echo json_encode($busqueda);
    }
}
?>
