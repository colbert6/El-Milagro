<?php

class indexController extends Controller
{
    public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
        $this->_vista->titulo = 'Bienvenido';
        $this->_vista->renderizar('index', 'inicio');
    }
    

}
?>
