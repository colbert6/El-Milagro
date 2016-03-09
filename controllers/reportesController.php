<?php


class reportesController extends Controller {
    
    private $_pdf;
    private $_productos;
    private $_marca;
    private $_tipo_producto;
    
    public function __construct() {
        
        parent::__construct();
        $this->get_Libreria('fpdf/fpdf');
        $this->_pdf = new FPDF;
        $this->_productos = $this->cargar_modelo('producto');
        $this->_marca = $this->cargar_modelo('marca');
        $this->_tipo_producto = $this->cargar_modelo('tipo_producto');
    }
    
    public function index(){
        $this->_vista->titulo = 'Reportes de Productos';
        $this->_vista->tipo_producto = $this->_tipo_producto->seleccion_relacionados();
        $this->_vista->marca = $this->_marca->seleccion_relacionados();
        $this->_vista->setJs_(array('funciones_form'));
        $this->_vista->renderizar('index');
    }
    
        
    public function productos_todo(){
        $Y_table_position = 41;
                
        $opp = 47;
        $contapag = 1;
        $abs = 1;
        
        $datos = $this->_productos->selecciona_reporte();
        
//        echo "<pre>";
//        print_r($datos);
//        echo "</pre>";exit;
        
        $datacount = count($datos);
        $contaobj = 0;
        
        $c_codigo[$contapag] = "";
        $c_descripcion[$contapag] = "";
        $c_fraccion[$contapag] = "";
        $c_precio_compra[$contapag] = "";
        $c_utilidad[$contapag] = "";
        $c_precio_venta[$contapag] = "";
        $c_stock[$contapag] = "";
        
            for ($i = 0; $i < $datacount; $i++) {
                $c_codigo[$contapag] = $c_codigo[$contapag] . ($i+1) . "\n";
                $descripcion=$datos[$i]['marca']." ".$datos[$i]['tipo_producto']." ".$datos[$i]['descripcion']." ".$datos[$i]['contenido'];
                $c_descripcion[$contapag] = $c_descripcion[$contapag] . substr(utf8_decode($descripcion), 0, 45) . "\n";
                $c_fraccion[$contapag] = $c_fraccion[$contapag] . substr($datos[$i]['fraccion'], 0, 10) . "\n";
                $c_precio_compra[$contapag] = $c_precio_compra[$contapag] . substr($datos[$i]['ult_precio_compra'], 0, 10) . "\n";
                $c_utilidad[$contapag] = $c_utilidad[$contapag] . substr($datos[$i]['utilidad'], 0, 10) . "\n";
                $c_precio_venta[$contapag] = $c_precio_venta[$contapag] . substr($datos[$i]['ult_precio_venta'],0) . "\n";
                $contaobj = $contaobj + 1;
                if ($contaobj == $opp) {
                    $contaobj = 0;
                    $contapag = $contapag + 1;
                    $c_codigo[$contapag] = "";
                    $c_descripcion[$contapag] = "";
                    $c_fraccion[$contapag] = "";
                    $c_precio_compra[$contapag] = "";
                    $c_precio_venta[$contapag] = "";
                    $c_stock[$contapag] = "";
                }
            }
            if ($contaobj == 0) {
                $contapag = $contapag - 1;
            }
        
            for ($i = $abs; $i <= $contapag; $i++) {
                $this->_pdf->AddPage();
                //ENCABEZADO TITULO DE REPORTE
                $this->_pdf->SetFont('Arial','B',12);
                $this->_pdf->SetY(24);
                $this->_pdf->SetX(0);
                $this->_pdf->Cell(210,5, utf8_decode('PRODUCTOS REGISTRADOS'),0,0,'C');
                $this->_pdf->SetFillColor(96,197,253);
                $this->_pdf->SetFont('Arial','B',10);
                $this->_pdf->SetY(35);
                $this->_pdf->SetX(15);
                $this->_pdf->Cell(13,6,utf8_decode('Item'),'BT',0,'L',1);
                $this->_pdf->SetX(28);
                $this->_pdf->Cell(92,6,utf8_decode('Producto'),'BT',0,'L',1);
                $this->_pdf->SetX(120);
                $this->_pdf->Cell(20,6,utf8_decode('Fraccion'),'BT',0,'L',1);
                $this->_pdf->SetX(140);
                $this->_pdf->Cell(20,6,utf8_decode('Costo'),'BT',0,'C',1);
                $this->_pdf->SetX(160);
                $this->_pdf->Cell(20,6,utf8_decode('Utilidad'),'BT',0,'C',1);
                $this->_pdf->SetX(180);
                $this->_pdf->Cell(20,6,utf8_decode('Venta'),'BT',0,'C',1);
                //MARGEN TOTAL: HASTA=195 (ULTIMO SETX + ANCHO DE ULTIMO CELL)
                //UBICACIÓN:
                $this->_pdf->SetFont('Arial', '', 11);
                $this->_pdf->SetFillColor(255, 255, 255);
                $this->_pdf->SetY(29);
                $this->_pdf->SetX(15);
                $this->_pdf->Cell(30, 5, utf8_decode('Almacen :   Botica El Milagro' ) , 0, 'L', 1);
                $this->_pdf->SetFont('Arial', '', 10);
                $this->_pdf->SetY($Y_table_position);
                $this->_pdf->SetX(15);
                $this->_pdf->MultiCell(13, 5, $c_codigo[$i], 1);
                $this->_pdf->SetY($Y_table_position);
                $this->_pdf->SetX(28);
                $this->_pdf->MultiCell(92, 5, $c_descripcion[$i], 1);
                $this->_pdf->SetY($Y_table_position);
                $this->_pdf->SetX(120);
                $this->_pdf->MultiCell(20, 5, $c_fraccion[$i], 1,"C");
                $this->_pdf->SetY($Y_table_position);
                $this->_pdf->SetX(140);
                $this->_pdf->MultiCell(20, 5, $c_precio_compra[$i], 1,"C");
                $this->_pdf->SetY($Y_table_position);
                $this->_pdf->SetX(160);
                $this->_pdf->MultiCell(20, 5, $c_utilidad[$i], 1,"C");
                $this->_pdf->SetY($Y_table_position);
                $this->_pdf->SetX(180);
                $this->_pdf->MultiCell(20, 5, $c_precio_venta[$i], 1, "C");
                $abs = $abs + 1;
            }
            $abs = 1;
            $contapag = 1;
        
        $this->_pdf->Output();
    }
    
    public function order_tipo(){
        $Y_table_position = 41;
                
        $opp = 47;
        $contapag = 1;
        $abs = 1;
        
        $datos = $this->_productos->selecciona_reporte_order_tipo();
        
//        echo "<pre>";
//        print_r($datos);
//        echo "</pre>";exit;
        
        $datacount = count($datos);
        $contaobj = 0;
        
        $c_codigo[$contapag] = "";
        $c_descripcion[$contapag] = "";
        $c_fraccion[$contapag] = "";
        $c_precio_compra[$contapag] = "";
        $c_utilidad[$contapag] = "";
        $c_precio_venta[$contapag] = "";
        $c_stock[$contapag] = "";
        
            for ($i = 0; $i < $datacount; $i++) {
                $c_codigo[$contapag] = $c_codigo[$contapag] . ($i+1) . "\n";
                $descripcion=$datos[$i]['tipo_producto']." ".$datos[$i]['marca']." ".$datos[$i]['descripcion']." ".$datos[$i]['contenido'];
                $c_descripcion[$contapag] = $c_descripcion[$contapag] . substr(utf8_decode($descripcion), 0, 45) . "\n";
                $c_fraccion[$contapag] = $c_fraccion[$contapag] . substr($datos[$i]['fraccion'], 0, 10) . "\n";
                $c_precio_compra[$contapag] = $c_precio_compra[$contapag] . substr($datos[$i]['ult_precio_compra'], 0, 10) . "\n";
                $c_utilidad[$contapag] = $c_utilidad[$contapag] . substr($datos[$i]['utilidad'], 0, 10) . "\n";
                $c_precio_venta[$contapag] = $c_precio_venta[$contapag] . substr($datos[$i]['ult_precio_venta'],0) . "\n";
                $contaobj = $contaobj + 1;
                if ($contaobj == $opp) {
                    $contaobj = 0;
                    $contapag = $contapag + 1;
                    $c_codigo[$contapag] = "";
                    $c_descripcion[$contapag] = "";
                    $c_fraccion[$contapag] = "";
                    $c_precio_compra[$contapag] = "";
                    $c_precio_venta[$contapag] = "";
                    $c_stock[$contapag] = "";
                }
            }
            if ($contaobj == 0) {
                $contapag = $contapag - 1;
            }
        
            for ($i = $abs; $i <= $contapag; $i++) {
                $this->_pdf->AddPage();
                //ENCABEZADO TITULO DE REPORTE
                $this->_pdf->SetFont('Arial','B',12);
                $this->_pdf->SetY(24);
                $this->_pdf->SetX(0);
                $this->_pdf->Cell(210,5, utf8_decode('PRODUCTOS REGISTRADOS'),0,0,'C');
                $this->_pdf->SetFillColor(96,197,253);
                $this->_pdf->SetFont('Arial','B',10);
                $this->_pdf->SetY(35);
                $this->_pdf->SetX(15);
                $this->_pdf->Cell(13,6,utf8_decode('Item'),'BT',0,'L',1);
                $this->_pdf->SetX(28);
                $this->_pdf->Cell(92,6,utf8_decode('Producto'),'BT',0,'L',1);
                $this->_pdf->SetX(120);
                $this->_pdf->Cell(20,6,utf8_decode('Fraccion'),'BT',0,'L',1);
                $this->_pdf->SetX(140);
                $this->_pdf->Cell(20,6,utf8_decode('Costo'),'BT',0,'C',1);
                $this->_pdf->SetX(160);
                $this->_pdf->Cell(20,6,utf8_decode('Utilidad'),'BT',0,'C',1);
                $this->_pdf->SetX(180);
                $this->_pdf->Cell(20,6,utf8_decode('Venta'),'BT',0,'C',1);
                //MARGEN TOTAL: HASTA=195 (ULTIMO SETX + ANCHO DE ULTIMO CELL)
                //UBICACIÓN:
                $this->_pdf->SetFont('Arial', '', 11);
                $this->_pdf->SetFillColor(255, 255, 255);
                $this->_pdf->SetY(29);
                $this->_pdf->SetX(15);
                $this->_pdf->Cell(30, 5, utf8_decode('Almacen :   Botica El Milagro' ) , 0, 'L', 1);
                $this->_pdf->SetFont('Arial', '', 10);
                $this->_pdf->SetY($Y_table_position);
                $this->_pdf->SetX(15);
                $this->_pdf->MultiCell(13, 5, $c_codigo[$i], 1);
                $this->_pdf->SetY($Y_table_position);
                $this->_pdf->SetX(28);
                $this->_pdf->MultiCell(92, 5, $c_descripcion[$i], 1);
                $this->_pdf->SetY($Y_table_position);
                $this->_pdf->SetX(120);
                $this->_pdf->MultiCell(20, 5, $c_fraccion[$i], 1,"C");
                $this->_pdf->SetY($Y_table_position);
                $this->_pdf->SetX(140);
                $this->_pdf->MultiCell(20, 5, $c_precio_compra[$i], 1,"C");
                $this->_pdf->SetY($Y_table_position);
                $this->_pdf->SetX(160);
                $this->_pdf->MultiCell(20, 5, $c_utilidad[$i], 1,"C");
                $this->_pdf->SetY($Y_table_position);
                $this->_pdf->SetX(180);
                $this->_pdf->MultiCell(20, 5, $c_precio_venta[$i], 1, "C");
                $abs = $abs + 1;
            }
            $abs = 1;
            $contapag = 1;
        
        $this->_pdf->Output();
    }
    
    public function filtro(){
        $Y_table_position = 41;
                
        $opp = 47;
        $contapag = 1;
        $abs = 1;
                
        if(isset($_POST['id_marca'])){
          $id_marca=$_POST['id_marca'];  
        }else{
          $id_marca='';  
        }
        
        if(isset($_POST['id_tipo_producto'])){
            $id_tipo=$_POST['id_tipo_producto'];
        }else{
            $id_tipo='';
        }
        
        $datos = $this->_productos->selecciona_reporte_filtro($id_marca,$id_tipo);
        
//        echo "<pre>";
//        print_r($datos);
//        echo "</pre>";exit;
        
        $datacount = count($datos);
        
        $contaobj = 0;
        
        $c_codigo[$contapag] = "";
        $c_descripcion[$contapag] = "";
        $c_fraccion[$contapag] = "";
        $c_precio_compra[$contapag] = "";
        $c_utilidad[$contapag] = "";
        $c_precio_venta[$contapag] = "";
        $c_stock[$contapag] = "";
        
            for ($i = 0; $i < $datacount; $i++) {
                $c_codigo[$contapag] = $c_codigo[$contapag] . ($i+1) . "\n";
                $descripcion=$datos[$i]['marca']." ".$datos[$i]['tipo_producto']." ".$datos[$i]['descripcion']." ".$datos[$i]['contenido'];
                $c_descripcion[$contapag] = $c_descripcion[$contapag] . substr(utf8_decode($descripcion), 0, 45) . "\n";
                $c_fraccion[$contapag] = $c_fraccion[$contapag] . substr($datos[$i]['fraccion'], 0, 10) . "\n";
                $c_precio_compra[$contapag] = $c_precio_compra[$contapag] . substr($datos[$i]['ult_precio_compra'], 0, 10) . "\n";
                $c_utilidad[$contapag] = $c_utilidad[$contapag] . substr($datos[$i]['utilidad'], 0, 10) . "\n";
                $c_precio_venta[$contapag] = $c_precio_venta[$contapag] . substr($datos[$i]['ult_precio_venta'],0) . "\n";
                $contaobj = $contaobj + 1;
                if ($contaobj == $opp) {
                    $contaobj = 0;
                    $contapag = $contapag + 1;
                    $c_codigo[$contapag] = "";
                    $c_descripcion[$contapag] = "";
                    $c_fraccion[$contapag] = "";
                    $c_precio_compra[$contapag] = "";
                    $c_precio_venta[$contapag] = "";
                    $c_stock[$contapag] = "";
                }
            }
            if ($contaobj == 0) {
                $contapag = $contapag - 1;
            }
        
            for ($i = $abs; $i <= $contapag; $i++) {
                $this->_pdf->AddPage();
                //ENCABEZADO TITULO DE REPORTE
                $this->_pdf->SetFont('Arial','B',12);
                $this->_pdf->SetY(24);
                $this->_pdf->SetX(0);
                $this->_pdf->Cell(210,5, utf8_decode('PRODUCTOS REGISTRADOS'),0,0,'C');
                $this->_pdf->SetFillColor(96,197,253);
                $this->_pdf->SetFont('Arial','B',10);
                $this->_pdf->SetY(35);
                $this->_pdf->SetX(15);
                $this->_pdf->Cell(13,6,utf8_decode('Item'),'BT',0,'L',1);
                $this->_pdf->SetX(28);
                $this->_pdf->Cell(92,6,utf8_decode('Producto'),'BT',0,'L',1);
                $this->_pdf->SetX(120);
                $this->_pdf->Cell(20,6,utf8_decode('Fraccion'),'BT',0,'L',1);
                $this->_pdf->SetX(140);
                $this->_pdf->Cell(20,6,utf8_decode('Costo'),'BT',0,'C',1);
                $this->_pdf->SetX(160);
                $this->_pdf->Cell(20,6,utf8_decode('Utilidad'),'BT',0,'C',1);
                $this->_pdf->SetX(180);
                $this->_pdf->Cell(20,6,utf8_decode('Venta'),'BT',0,'C',1);
                //MARGEN TOTAL: HASTA=195 (ULTIMO SETX + ANCHO DE ULTIMO CELL)
                //UBICACIÓN:
                $this->_pdf->SetFont('Arial', '', 11);
                $this->_pdf->SetFillColor(255, 255, 255);
                $this->_pdf->SetY(29);
                $this->_pdf->SetX(15);
                
                if($id_marca!=''){
                    $marca=$datos[0]['marca'];  
                }else{
                    $marca='Todos';  
                }

                if($id_tipo!=''){
                      $tipo=$datos[0]['tipo_producto'];
                }else{
                      $tipo='Todos';
                }
                
                $this->_pdf->Cell(30, 5, utf8_decode('Almacen :   Botica El Milagro '.'       Marca : '.$marca.'           Tipo :'.$tipo ) , 0, 'L', 1);
                $this->_pdf->SetFont('Arial', '', 10);
                $this->_pdf->SetY($Y_table_position);
                $this->_pdf->SetX(15);
                $this->_pdf->MultiCell(13, 5, $c_codigo[$i], 1);
                $this->_pdf->SetY($Y_table_position);
                $this->_pdf->SetX(28);
                $this->_pdf->MultiCell(92, 5, $c_descripcion[$i], 1);
                $this->_pdf->SetY($Y_table_position);
                $this->_pdf->SetX(120);
                $this->_pdf->MultiCell(20, 5, $c_fraccion[$i], 1,"C");
                $this->_pdf->SetY($Y_table_position);
                $this->_pdf->SetX(140);
                $this->_pdf->MultiCell(20, 5, $c_precio_compra[$i], 1,"C");
                $this->_pdf->SetY($Y_table_position);
                $this->_pdf->SetX(160);
                $this->_pdf->MultiCell(20, 5, $c_utilidad[$i], 1,"C");
                $this->_pdf->SetY($Y_table_position);
                $this->_pdf->SetX(180);
                $this->_pdf->MultiCell(20, 5, $c_precio_venta[$i], 1, "C");
                $abs = $abs + 1;
            }
            $abs = 1;
            $contapag = 1;
        
        $this->_pdf->Output();
    }
    
}
