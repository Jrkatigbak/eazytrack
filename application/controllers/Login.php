<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('login_model');
	}

	public function index()
	{
		$this->load->view('front/login.php');
	}

	public function login()
	{
		$this->form_validation->set_rules('email', 'email', 'required|trim|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|xss_clean');
		
		if($this->form_validation->run() == false){
			echo 'false';return;
		}

		$users = $this->login_model->check_username_email();
		if(count($users) <= 0){ 
			echo 'false_email';return;
		}

		foreach($users as $user){
			
			// Kapag 1 ito ay inactive
			if($user->status == 1){
				echo 'inactive';return;
			}

			if(password_verify($this->input->post('password'),$user->password) ){
				$user_sess = array(
					'id_user'       => $user->id_user,
					'first_name'    => $user->first_name,
					'middle_name'   => $user->middle_name,
					'last_name'     => $user->last_name,
					'name'			=> $user->last_name .', '. $user->first_name .', '. $user->middle_name,
					'contact'       => $user->contact,
					'email'         => $user->email,
					'address'       => $user->address,
					'username'      => $user->username,
					'password'      => $user->password,
					'picture'       => $user->picture,
					'status'        => $user->status,
					'id_user_type'  => $user->id_user_type,
					'code'        	=> $user->code,
					'type'        	=> $user->type,
				);
				$this->session->set_userdata($user_sess);
				echo $user->id_user_type;return;
			}else{
				echo 'false_password';return;
			}
		}

	}
	
	public function logout(){
		$this->session->sess_destroy();
		$msg = "Thank you for using the system!";
		$this->session->set_flashdata('sys_msg',$msg);
		$this->session->set_flashdata('sys_msg_type','success');
        redirect('welcome');
	}
	
	// protected function credentials(Request $Request){

	// 	$credentials = $Request->only($this->username(),'password'); // getting data from login form
	// 	return array_add($credentials,'status',0); // 0 means all fine and can login
	// }
}
