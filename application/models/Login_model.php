<?php

class Login_model extends CI_Model{  

    public function check_username_email(){
        $this->db->select('u.*, t.code, t.type');
        $this->db->where('u.email',$this->input->post('email'));
        $this->db->or_where('u.username',$this->input->post('email'));
        $this->db->join('user_type t','u.id_user_type = t.id');
        return $this->db->get('users u')->result();
    }
	
}