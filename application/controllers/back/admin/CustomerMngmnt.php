<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class CustomerMngmnt extends CI_Controller{

    public function __construct(){
        parent:: __construct();
        if($_SESSION['id_user'] == ''){
            redirect('welcome');
        }
        $this->load->model('customerMngmnt_model');
    }

    public function index(){
        $data ['customers'] = $this->customerMngmnt_model->get_customer()->result();
        $this->load->view('back/admin/customer_mngmnt',$data);
    }

    public function save_customer(){
        $_POST['id_user_type'] = 3;
        $data = $this->input->post();
        $this->customerMngmnt_model->save_customer($data);
        $this->session->set_flashdata('SUCCESS','New account was successfully saved!');
        redirect ('back/admin/customerMngmnt/index');
    }

    public function delete_customer(){
        // die('adadad');    
        $id_user = $this->input->post('id_user');
        $this->customerMngmnt_model->delete_customer($id_user);
        $this->session->set_flashdata('ERASE','Record Deleted');
    }

    public function update_customer(){
        $this->customerMngmnt_model->update_customer();
		$this->session->set_flashdata('UPDATED','Record successfully updated');
        redirect ('back/admin/customerMngmnt/index');
    }

    public function getcustomerById(){
        $id_user = $this->input->post('id_user');   
        $data = $this->customerMngmnt_model->get_customer($id_user)->result(); 
        echo json_encode($data);
    }


}