<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class CustomerMngmnt_model extends CI_Model{

        public function save_customer($data){
            $this->db->insert('users',$data);
        }

        public function get_customer($id_user = ""){
            if($id_user != ""){
                $this->db->where('id_user',$id_user);
            } 
            $this->db->where('id_user_type',3);
            return $this->db->get('users');
        }

        public function delete_customer($id_user){
            $this->db->where('id_user',$id_user);
            $this->db->delete('users');
        }

        public function update_customer(){
            $id_user = $this->input->post('id_user');
            $data = $this->input->post();
            $this->db->where('id_user',$id_user);
            return $this->db->update('users',$data);
        }
        
        
      
}