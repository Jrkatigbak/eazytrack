<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->library('upload'); 
        $this->load->model('profile_model');
	}

	public function index()
	{
		$this->load->view('back/profile');
    }
    
    public function update_display_profile(){
        $config['upload_path']          = 'public/uploads/dp/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png|GIF|JPG|PNG|JPEG';
        $config['max_size']             = 0; // INFINIT 0
        $config['max_width']            = 0; // INFINIT 0
        $config['max_height']           = 0; // INFINIT 0

        $this->upload->initialize($config); 

        if($this->upload->do_upload())
        {
            // IMAGE UPLOADED SUCCESSFULLY
            $data = array('upload_data' => $this->upload->data());

            $this->profile_model->update_display_profile($data['upload_data']['file_name']);
            $msg = "Display picture was succesfully updated";
            $this->session->set_userdata('acctg_msg',$msg);
            $this->session->set_userdata('acctg_msg_type','success');
            redirect('profile/');
        }
        else
        {
            // FAILED TO UPLOAD PRODUCT IMAGE
            $msg = "There was a problem uploading product image";
            $this->session->set_userdata('acctg_msg',$msg);
            $this->session->set_userdata('acctg_msg_type','success');
            redirect('profile/');
        }
    }

    public function update_user_account(){
        if($this->profile_model->check_duplicate_user_acc()){
            $msg = "Check email or username, already used by the other user";
            $this->session->set_userdata('acctg_msg',$msg);
            $this->session->set_userdata('acctg_msg_type','danger');
            redirect('profile/');
        }else{
            $result = $this->profile_model->update_user_account();

            $_SESSION['first_name'] = $this->input->post('first_name');
            $_SESSION['middle_name'] = $this->input->post('middle_name');
            $_SESSION['last_name'] = $this->input->post('last_name');
            $_SESSION['email'] = $this->input->post('email');
            $_SESSION['contact'] = $this->input->post('contact');
            $_SESSION['username'] = $this->input->post('username');

            $msg = "Your account was succesfully updated";
            $this->session->set_userdata('acctg_msg',$msg);
            $this->session->set_userdata('acctg_msg_type','success');
            redirect('profile/');
        } 
    }

    public function update_account_password(){

        $current_password = $this->input->post('current_password');
        $new_password = $this->input->post('new_password');
        $confirm_password = $this->input->post('confirm_password');

        // die(password_unhash($_SESSION['password'], PASSWORD_DEFAULT));
        // die(password_hash('password', PASSWORD_DEFAULT));
        
        if(!password_verify($current_password,$_SESSION['password'])){
            $msg = "Please check your current password";
            $this->session->set_userdata('acctg_msg',$msg);
            $this->session->set_userdata('acctg_msg_type','danger');
            redirect('profile/');
        }else{
            if($new_password != $confirm_password){
                $msg = "Password don't match";
                $this->session->set_userdata('acctg_msg',$msg);
                $this->session->set_userdata('acctg_msg_type','danger');
                redirect('profile/');
            }else{
                $result = $this->profile_model->update_account_password($new_password);
                $msg = "Account password was succesfully updated";
                $this->session->set_userdata('acctg_msg',$msg);
                $this->session->set_userdata('acctg_msg_type','success');
                redirect('profile/');
            }
        }
    }

}
