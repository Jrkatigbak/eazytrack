<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plans extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('plans_model');
	}

	public function index(){
		$data['plans_pricing'] = $this->plans_model->get_plan();
		$this->load->view('back/admin/plans_pricing',$data);
		
	}

	public function save_plan()
	{
		$data = $this->input->post();
		$this->plans_model->save_plan($data);

		$this->session->set_flashdata('SUCCESS','New account successfully saved!');
		redirect('plans/index');
	}

	public function getPlans($id_plan)
	{
        $data = $this->plans_model->getPlans($id_plan)->result();
        echo json_encode($data);
	}


	public function delete_plan()
	{
		$id = $this->input->post('id');
		$this->plans_model->delete_plan($id);

		$this->session->set_flashdata('DLT_RECORD','Record Deleted');
	}

	public function update_plans()
	{
		$this->plans_model->update_plans();
		$this->session->set_flashdata('UPDATED','Record successfully updated');

		redirect ('plans/index');

	}
	
}
