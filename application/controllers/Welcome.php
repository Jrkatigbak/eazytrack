<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('plans_model');
        $this->load->model('couriers_model');
	}

	public function index()
	{
		$data['plans'] = $this->plans_model->getPlans()->result();
		$data['couriers'] = $this->couriers_model->get()->result();
		$this->load->view('front/index', $data);
	}

}
