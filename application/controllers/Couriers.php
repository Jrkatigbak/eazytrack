<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Couriers extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('couriers_model');
	}

	public function index()
	{
		// $this->load->view('front/registration');
	}

    public function get()
	{
        $data = $this->couriers_model->get()->result();
        echo json_encode($data);
    }
    
}
