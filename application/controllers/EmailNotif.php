<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmailNotif extends CI_Controller {

  public function __construct(){
      parent::__construct();
	}

  public function receive_email()
  {
      $type = $this->input->post('type');

      $this->form_validation->set_rules('full_name', 'Full name', 'trim|required|xss_clean');
      $this->form_validation->set_rules('contact', 'Contact Number', 'trim|required|xss_clean');
      $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
      $this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean');

      if ($this->form_validation->run() == FALSE) {
        $data = array(
          'full_name' => $this->input->post('full_name'),
          'contact' => $this->input->post('contact'),
          'email' => $this->input->post('email'),
          'message' => $this->input->post('message'),
        );

        
        if($type == 'contact'){
          $this->load->view('front/index',$data);
        }

      }else{

       
        $full_name = $this->input->post('full_name');
        $contact = $this->input->post('contact');
        $email = $this->input->post('email');
        $message = $this->input->post('message');
  
        $to =  'info@eazytrack.co.uk';  // User email pass here
        
        $subject = 'New Message from the website';
    
        $from = 'system@eazytrack.co.uk';              // Pass here your mail id
    
        $emailContent = '<h1><b>Inquiry Details</b></h1>
        <br>
        <p>Full name: '.$full_name.'</p>
        <p>Contact Number: '.$contact.'</p>
        <p>Email: '.$email.'</p>
        <p>Message: '.$message.'</p>
        ';
                  
        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'smtp.hostinger.com'; // ssl://smtp.gmail.com //hostinger
        $config['smtp_port']    = '587'; //465 //587
        $config['smtp_timeout'] = '60';
    
        $config['smtp_user']    = 'system@eazytrack.co.uk';    //Important
        $config['smtp_pass']    = '3>XmQpVf';  //Important
    
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
    
        // $this->session->set_flashdata('msg',"Mail has been sent successfully to ()");
        // $this->session->set_flashdata('msg_class','alert-success');

        $this->session->set_flashdata('SUCCESS',"Mail has been sent successfully");
  
        if(! $this->email->print_debugger()){
          show_error($this->email->print_debugger());
          // echo 'Email not send';
        }else{
          // echo 'sended successfully';
        }
       
        return redirect('welcome');
       
      }

  }


}
