<?php
defined('BASEPATH') OR exit('no direct script access allowed');

    class My_profile extends CI_Controller{

        public function __construct(){
            parent:: __construct();
            
            if($_SESSION['id_user'] == ''){
                redirect('welcome');
            }
        }

        public function index(){
            $this->load->view('back/admin/myProfile');
        }
    }