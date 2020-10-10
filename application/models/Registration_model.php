<?php

class Registration_model extends CI_Model{  

    function account_byId ($id_registration){
        $this->db->select("dt,id_registration,CONCAT(last_name,' ',first_name,' ',middle_name) as name");
		if($id_registration != ''){
			$this->db->where("id_registration",$id_registration);
		}
        return $this->db->get("registration");
    }

    function registerAccount($data){
        $this->db->insert('users',$data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    function validate_email($email){
        $this->db->where('del_status',1);
        $this->db->where('email',$email);
        $qry = $this->db->get('users');
        if($qry->num_rows() > 0){
            return true;
        }
        return false;
    }

    public function changePassword($email, $hash_password){
        $this->db->where('email',$email);
        $this->db->update('users',array('password'=>$hash_password));
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function sendNewEmailNotif($email, $temp_pass){
        $emailContent = '
        Kindly use this teporary password ( <b>'.$temp_pass.'</b> ) to login in your Eazytrack account.

        <br>
        <br>
        <br>

        Do you want to automatically monitor your tracking? We can help you. <br>

        Subscribe on  <a href="'.base_url().'#plans">Parcel Monitoring</a> Plan.<br>

        If you have any questions, please contact us at info@eazytrack.co.uk .<br>
        ';
                        
        // Email Sender order placed
        $to =  $email;  // User email pass here
        $subject = "Forgot Passord | Eazytrack Account";
        $from = 'no-reply@eazytrack.co.uk';              // Pass here your mail id
                  
        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'smtp.hostinger.com'; // ssl://smtp.gmail.com //hostinger
        $config['smtp_port']    = '587'; //465 //587
        $config['smtp_timeout'] = '60';
    
        $config['smtp_user']    = 'no-reply@eazytrack.co.uk';    //Important
        $config['smtp_pass']    = 'Z9F&vJw[';  //Important
    
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not
    
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($emailContent);
        $this->email->send();
        // Email Sender order placed
    }
	
}