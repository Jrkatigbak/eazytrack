<?php
defined('BASEPATH') OR exit('no direct script access allowed'); 

class StaffMngmnt extends CI_Controller{

    public function __construct(){
        parent:: __construct();
        if($_SESSION['id_user'] == ''){
            redirect('welcome');
        }
        $this->load->model('staffManagement_model');
    }

    public function index(){
        $data['staffs'] = $this->staffManagement_model->get_staff()->result();   
        $this->load->view('back/admin/staff',$data);
    }

    public function save_staff(){
        $_POST['id_user_type'] = 2;
        $data = $this->input->post();
        $this->staffManagement_model->save_staff($data);

        //RETURN A SUCCESS MESSAGE
        $this->session->set_flashdata('SUCCESS','New account was successfully saved!');

        redirect ('back/admin/staffMngmnt/index'); 

    }
    public function delete_staff(){
        $id_user = $this->input->post('id_user');
        $this->staffManagement_model->delete_staff($id_user);

        $this->session->set_flashdata('DLT_SUCCESS','Record Deleted');
    }

    public function call_editStaff(){
        $this->load->view('back/admin/edit_staff');
    }

    public function update_staff(){
        $this->staffManagement_model->update_staff();
		$this->session->set_flashdata('UPDATED','Record successfully updated');
        redirect ('back/admin/StaffMngmnt/index');
    }

    public function getStaffById(){
        $id_user = $this->input->post('id_user');
        $data = $this->staffManagement_model->get_staff($id_user)->result(); 
        echo json_encode($data);
    }

}


