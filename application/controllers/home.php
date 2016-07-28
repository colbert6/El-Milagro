<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Home extends CI_Controller
    {

        public function index()
        {   

            /*if($this->session->userdata('login')){
                $dato= array ( 'titulo'=> 'Menu Principal'); 
                $this->load->view("/layout/header.php",$dato);
                $this->load->view("home");
                $this->load->view("/layout/foother.php");
            }else{
                redirect('login', 'refresh');            
            }*/
            $dato_header= array ( 'titulo'=> 'BIENVENIDO');

            $this->load->view("/layout/header.php",$dato_header);
            $this->load->view("index.php");     
            $this->load->view("/layout/foother.php");
            
        }

    }
 ?>