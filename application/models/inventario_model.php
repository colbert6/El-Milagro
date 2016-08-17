<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Inventario_model extends CI_Model{
        
        function __construct(){
            parent::__construct();            
            $this->db=$this->load->database('mysql',TRUE);        
    
        }

        function select(){
            $this->db->where("inv_estado",1);  
            $query=$this->db->get("inventario");      
            return $query;            
        }

        function crear($data){
            $datos=array('inv_descripcion' => $data['descripcion'],
                        'inv_ano' => $data['ano'],
                        'inv_estado' => 1
                         );
            if($this->db->insert('inventario',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;            
        }

        function editar($data){
            $datos=array('inv_descripcion' => $data['descripcion'],
                        'inv_ano' => $data['ano'],
                        'inv_estado' => 1
                         );
            $this->db->where("inv_id",$data['id']);
            if($this->db->update('inventario',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

        function eliminar($id){
            $datos=array('inv_estado' => 0 );
            $this->db->where("inv_id",$id);
            if($this->db->update('inventario',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

        function db_backup()        {
               date_default_timezone_set("Europe/Madrid");
        // Carga la clase de utilidades de base de datos
        $back=$this->load->dbutil();
        $fecha_hora = date("Ymd_His");

        $prefs = array(
            'tables'      => array(),              // Arreglo de tablas para respaldar.
            'ignore'      => array(),           // Lista de tablas para omitir en la copia de seguridad
            'format'      => 'txt',             // gzip, zip, txt
            'filename'    => 'backup_'.$fecha_hora.'.sql',    // Nombre de archivo - NECESARIO SOLO CON ARCHIVOS ZIP
            'add_drop'    => TRUE,              // Agregar o no la sentencia DROP TABLE al archivo de respaldo
            'add_insert'  => TRUE,              // Agregar o no datos de INSERT al archivo de respaldo
            'newline'     => "\n"               // Caracter de nueva línea usado en el archivo de respaldo
        );

        // Crea una copia de seguridad de toda la base de datos y la asigna a una variable
        $copia_de_seguridad = $this->dbutil->backup($prefs); 

        //print_r($copia_de_seguridad);
        // Carga el asistente de archivos y escribe el archivo en su servidor
        $this->load->helper('file');

        if ( ! write_file('./backup/backup_'.$fecha_hora.'.zip', $copia_de_seguridad))
        {
             $this->smarty->assign('error','No se ha podido crear la copia.');
        }
        else
        {
            $this->smarty->assign('success','Copia creada satisfactoriamente');
        }

        // Carga el asistente de descarga y envía el archivo a su escritorio
        //$this->load->helper('download');
        //force_download('copia_de_seguridad.zip', $copia_de_seguridad);
        $this->smarty->view('index');
        }

    }
?>