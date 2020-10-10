<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Claims extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('claim_model');
        if($_SESSION['id_user'] == ''){
            redirect('welcome');
        }
	}

	public function index()
	{
        $data['claim_type'] = $this->claim_model->get()->result();
		$this->load->view('front/claims',$data);
    }

    public function index1()
	{
        $data['claim_type'] = $this->claim_model->get()->result();
		$this->load->view('front/claims',$data);
    }

    public function dashboard()
	{
        $data['claim_order'] = $this->claim_model->claim_order()->result();
		$this->load->view('back/claims',$data);
    }
    
    public function getClaimsUpdate($id){
        $data = $this->claim_model->getClaimsUpdate($id)->result();
        echo json_encode($data);
    }

    public function getClaimsByRefNo($reference_nos){
        $data = $this->claim_model->getClaimsByRefNo($reference_nos)->result();
        echo json_encode($data);
    }

    public function AddClaimsUpdate(){
        $email_to = $this->input->post('email');
        $reference_nos = $this->input->post('reference_nos');
        unset($_POST['email']);
        unset($_POST['reference_nos']);
        $data = $this->claim_model->AddClaimsUpdate();

        //SEND EMAIL NOTIFICATION
        $this->sendMail_claimsUpdte($email_to, $reference_nos);
        
        return $this->getClaimsUpdate($this->input->post('id_claim'));
    }

    public function add(){
        $reference_nos = $this->customlib->generate_reference_number();
        $parcel_reference_number = $this->input->post('parcel_reference_number');
        $this->claim_model->add($reference_nos);

        //SEND EMAIL NOTIFICATION
		$this->sendMail($reference_nos, $reference_nos);
    }

    //upload.php
    function upload_evidence($temp_photo_arr = NULL){
        if($_FILES["evidence"]["name"] != '')
        {
        $raw_name = explode('.', $_FILES["evidence"]["name"]);
        $ext = end($raw_name);
        $name = $this->customlib->generate_reference_number() . '.' . $ext;
        $location = './public/claims-upload/' . $name;  
        move_uploaded_file($_FILES["evidence"]["tmp_name"], $location);
        echo $name;
        }
    }

    //upload.php
    function attached_file_update($temp_photo_arr = NULL){
        if($_FILES["file"]["name"] != '')
        {
        $raw_name = explode('.', $_FILES["file"]["name"]);
        $ext = end($raw_name);
        $name = $this->customlib->generate_reference_number() . '.' . $ext;
        $location = './public/claim-response/' . $name;  
        move_uploaded_file($_FILES["file"]["tmp_name"], $location);
        echo $name;
        }
    }

    public function sendMail($reference_nos, $parcel_reference_number){
        if($_SESSION['id_user_type'] == 1){
			$nav_url = base_url().'back/admin/dashboard';
		}else if($_SESSION['id_user_type'] == 3){
			$nav_url = base_url().'back/customer/dashboard';
		}

		$link = base_url().'#plans&pricing';


        $emailContent = '<h3>Welcome<h3> <br>
        Thank you for your subscription!<br>

        <p>You have purchased the following</p><br>
        CLAIMS  - Ref No. '.$reference_nos.'<br>
        Case ID No. '.$reference_nos.'<br>
        Price: £1.00 <br>
        Update: Case is being reviewed<br>

        <a href="'.$nav_url.'">View more</a>

        <br>
        <br>
        <br>

        Eazytrack will help you get the best result possible!<br>
        If you have any questions, please contact us at info@eazytrack.co.uk .<br>
        ';
						

		// Email Sender order placed
		$to =  $_SESSION['email'];  // User email pass here
        $subject = 'Eazytrack | Order Successfully Placed';
        $from = 'system@eazytrack.co.uk';              // Pass here your mail id
                  
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
		// Email Sender order placed
    }

    public function sendMail_claimsUpdte($email_to, $reference_nos){
        if($_SESSION['id_user_type'] == 1){
			$nav_url = base_url().'back/admin/dashboard';
		}else if($_SESSION['id_user_type'] == 3){
			$nav_url = base_url().'back/customer/dashboard';
		}

		$link = base_url().'#plans&pricing';


        $emailContent = '
        CLAIMS  - Ref No. '.$reference_nos.'<br>
        Date: '.$this->input->post('update_date').'<br>
        Updates: '.$this->input->post('message').'<br>
        <a href="'.$nav_url.'">View more</a>
        <br>
        <br>
        <br>

        Eazytrack will help you get the best result possible!<br>
        If you have any questions, please contact us at info@eazytrack.co.uk .<br>
        ';
						

		// Email Sender order placed
		$to =  $email_to;  // User email pass here
        $subject = "Claims Update ($reference_nos) | Eazytrack ";
        $from = 'system@eazytrack.co.uk';              // Pass here your mail id
                  
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
		// Email Sender order placed
    }


}
