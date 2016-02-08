<?php

class buscarController extends Controller
{
    private $_model;
    
    
    public function __construct() {
        parent::__construct();
        $this->_model = $this->cargar_modelo('producto');
    }
    
    
    public function index() {
        $this->_vista->titulo = 'Buscar Productos';
        $this->_vista->datos = $this->_model->selecciona();
        $this->_vista->setCss_(array('jquery.dataTables'));
        $this->_vista->setJs(array('jquery.dataTables.min'));
        $this->_vista->setJs_(array('run_table_buscar'));
        
        $this->_vista->renderizar('index');
    }
    
}
?>
