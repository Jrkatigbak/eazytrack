<?php

class Profile_model extends CI_Model{  

    public function update_display_profile($file_name){
        $id_user = $this->input->post('id_user');
        $_SESSION['picture'] = $file_name;
        $query = $this->db->query("UPDATE users SET picture='$file_name' WHERE id_user='$id_user'");
    }

    function check_duplicate_user_acc(){
        $id_user = $this->input->post('id_user');
        $email = $this->input->post('email');
        $username = $this->input->post('username');
        $result = $this->db->query("SELECT id_user FROM users 
        WHERE (email='$email' OR username='$username' ) AND del_status = 1 AND id_user != '$id_user' ");
        if($result-> num_rows() > 0){
            return true;
        }else{
            return false;
        }
    } 

    public function update_user_account(){

        $id_user = $this->input->post('id_user');
        unset($_POST['id_user']);
        $this->db->where('id_user',$id_user);
        $this->db->where('del_status',1);
        $result = $this->db->update("users",$this->input->post());
    }

    public function update_account_password($new_password){

        $new_hash_password = password_hash($new_password, PASSWORD_DEFAULT);
        $this->db->query("UPDATE users SET password='$new_hash_password' WHERE id_user='$_SESSION[id_user]' ");
    }

	
}