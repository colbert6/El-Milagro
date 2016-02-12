
<?php

class marcaController extends Controller
{
    private $_model;
    
    public function __construct() {
        parent::__construct();
        $this->_model = $this->cargar_modelo('marca');
    }
    
    
    public function index() {
        $this->_vista->titulo = 'Lista de Marcas';
        $this->_vista->datos = $this->_model->selecciona();
        $this->_vista->setCss(array('jquery.dataTables'));
        $this->_vista->setJs(array('jquery.dataTables.min','run_table'));
        $this->_vista->renderizar('index');
    }
    
    public function nuevo() {
        if ($_POST['guardar'] == 1) {
            
            $this->_model->descripcion =  $_POST['descripcion'];
            if($_POST['abreviatura']!=''){
              $this->_model->abreviatura =  $_POST['abreviatura'];
            }else{
              $this->_model->abreviatura =  $_POST['descripcion'];  
            }
            
            $this->_model->insertar();
            $this->redireccionar('marca');
        }
        $this->_vista->titulo = 'Registrar Marca';
        $this->_vista->action = BASE_URL . 'marca/nuevo';
        $this->_vista->setJs_(array('funciones_form'));
        $this->_vista->renderizar('form');
    }
    public function editar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('marca');
        }

        if ($_POST['guardar'] == 1) {
            $this->_model->id_marca = $_POST['id_marca'];
            $this->_model->descripcion =  $_POST['descripcion'];
            if($_POST['abreviatura']!=''){
              $this->_model->abreviatura =  $_POST['abreviatura'];
            }else{
              $this->_model->abreviatura =  $_POST['descripcion'];  
            }
            $this->_model->actualizar();
            $this->redireccionar('marca');
        }
        $this->_model->id_marca = $this->filtrarInt($id);
        $this->_vista->datos = $this->_model->selecciona_id();
        
        $this->_vista->titulo = 'Actualizar Marca';
        $this->_vista->action = BASE_URL . 'marca/editar/'.$id;
        $this->_vista->setJs_(array('funciones_form'));
        $this->_vista->renderizar('form');
    }
}
?>
