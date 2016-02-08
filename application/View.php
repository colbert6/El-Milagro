<?php
class View
{
    private $_controlador;
    private $_js;
    private $_css;
    
    public function __construct(Request $peticion) {
        $this->_controlador = $peticion->getControlador();
        $this->_js = array();
        $this->_css = array();
    }
    
    public function renderizar($vista, $item = false)
    {
        $menu = array(
            array(
                'id' => 'inicio',
                'titulo' => 'Inicio',
                'enlace' => BASE_URL
                ),
            
            array(
                'id' => 'post',
                'titulo' => 'Post',
                'enlace' => BASE_URL . 'post'
                )
        );
        $js = array();
        $css = array();

        if (count($this->_js)) {
            $js = $this->_js;
        }
        if (count($this->_css)) {
            $css = $this->_css;
        }
        $_layoutParams = array(
            'ruta_css' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/css/',
            'ruta_img' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/img/',
            'ruta_js' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/js/',
            'menu' => $menu,
            'js'=>$js,
            'css' => $css
        );
              
        $rutaView = ROOT . 'views' . DS . $this->_controlador . DS . $vista . '.php';
        
        if(is_readable($rutaView)){
            include_once ROOT . 'views'. DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'cabecera.php';
            include_once ROOT . 'views'. DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'menu.php';
                $page=$_SERVER['REQUEST_URI'];
                $pieces = explode("/", $page);
                $uri2 = $pieces[2];
                echo '<div class="page-head">';
                    echo '<h2 class="pull-left">'.$this->titulo.'</h2>';
                    
                echo '<div class="clearfix"></div>'
                    . '</div><!--/.page-header-->';
                
                echo '<div class="matter">'
                    . ' <div class="container">';
                echo '<script type="text/javascript">
                            $(function() {
                                var mp = $("li.active span").html();
                                $("#name_modulo_padre").html(mp);
                                var mh = $(".mh_'.$uri2.'").html();
                                $(".mh_'.$uri2.'").css("color","#0993d3");
                                $("#name_modulo_hijo").html(mh);
                            });
                        </script>';
                
                include_once $rutaView;
            include_once ROOT . 'views'. DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'pie.php';
         } 
        else {
            throw new Exception($rutaView.' Error de vista');
        }
    }
    public function setJs(array $js)
    {
        if(is_array($js) && count($js)){
            for($i=0; $i < count($js); $i++){
                $this->_js[] = BASE_URL . 'public/js/' . $js[$i] . '.js';
            }
        } else {
            throw new Exception('Error de js');
        }
    }
    public function setCss(array $css)
    {
        if(is_array($css) && count($css)){
            for($i=0; $i < count($css); $i++){
                $this->_css[] = BASE_URL . 'public/css/' . $css[$i] . '.css';
            }
        } else {
            throw new Exception('Error de css');
        }
    }
    public function setJs_(array $js)
    {
        if(is_array($js) && count($js)){
            for($i=0; $i < count($js); $i++){
                 $this->_js[] = BASE_URL . 'views/' . $this->_controlador . "/js/" . $js[$i] . '.js';
            }
        } else {
            throw new Exception('Error de js');
        }
    }
    public function setCss_(array $css) {
        if (is_array($css) && count($css)) {
            for ($i = 0; $i < count($css); $i++) {
                $this->_css[] = BASE_URL . 'views/' . $this->_controlador . "/css/" . $css[$i] . '.css';
            }
        } else {
            throw new Exception('Error de css');
        }
    }
    
}

?>