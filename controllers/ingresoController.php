<?php

class ingresoController extends Controller
{
    private $_model;
    
    
    public function __construct() {
        parent::__construct();
        $this->_model = $this->cargar_modelo('ingreso');
    }
    
    
    public function index() {
        $this->_vista->titulo = 'Lista de Ingresos';
        $this->_vista->datos = $this->_model->selecciona();
        $this->_vista->setCss(array('jquery.dataTables'));
        $this->_vista->setJs(array('jquery.dataTables.min','run_table'));
        $this->_vista->renderizar('index');
    }
    
    public function nuevo() {
        if ($_POST['guardar'] == 1) {
            
                
                $this->_model->codigo_barra =  $_POST['codigo_barra'];

                $this->_model->insertar();
                $this->redireccionar('ingreso');
            
            
        }
        
        $this->_vista->titulo = 'Registrar Ingreso';
        $this->_vista->action = BASE_URL . 'ingreso/nuevo';
        $this->_vista->setJs_(array('funciones_form'));
        $this->_vista->setCss(array('jquery.dataTables'));
        $this->_vista->setJs(array('jquery.dataTables.min'));
        $this->_vista->renderizar('form');
    }
    
}
?>
