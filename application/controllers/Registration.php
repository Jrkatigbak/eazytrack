<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('registration_model');
	}

	public function index()
	{
		$this->load->view('front/registration');
	}

	public function register_account(){
		$this->form_validation->set_rules('first_name', 'First name', 'required|trim|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|xss_clean');
		$this->form_validation->set_rules('cpassword', 'Confirm password', 'required|trim|xss_clean');

		if($this->form_validation->run() == false){
            $errors = $this->form_validation->error_array();
            echo json_encode($this->form_validation->error_array());
            return;
		}

		$data = $this->input->post();
		unset($data['cpassword']);
		$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
		$data['id_user_type'] = 3;
		$result = $this->registration_model->registerAccount($data);

		if($result == true){
			$msg = "Account is created successfully. Login your account here";
			$this->session->set_flashdata('sys_msg',$msg);
			$this->session->set_flashdata('sys_msg_type','success');
			echo 'true';
		}else{
			echo 'false';
		}
	}

	public function forgotPassword(){
		$email = $this->input->post('email');
		$temp_pass = $this->customlib->generate_temp_password();

		$result = $this->registration_model->validate_email($email);

		if($result == false){
			echo 'false';return;
		}

		$hash_password = password_hash($temp_pass, PASSWORD_DEFAULT);
		$result2 = $this->registration_model->changePassword($email, $hash_password);
		if($result2 == true){

			$this->registration_model->sendNewEmailNotif($email, $temp_pass);
			echo 'true';return;
		}

		echo 'cant_update_password';return;
	}
}
