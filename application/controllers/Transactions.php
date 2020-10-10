<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transactions extends CI_Controller {

	public function __construct(){
        parent::__construct();
		$this->load->model('transaction_model');
		$this->load->model('couriers_model');
		if($_SESSION['id_user'] == ''){
            redirect('welcome');
        }
	}

	public function index($id_plan)
	{
		$data['transactions'] = $this->transaction_model->get($id_plan)->result();
        $this->load->view('back/customer/transactions', $data);
	}

	public function frontCheckout(){
		$data['claim_type'] = $this->claim_model->get()->result();
		$this->load->view('front/checkout',$data);
	}

	public function getParcelUpdate($id){
		$data = $this->transaction_model->getParcelUpdate($id);
		echo json_encode($data);
	}

	/*
	* 1. SAVE IN SHIPMENTS
	* 2. GET TRACKING UPDATES
	* 3. SAVE IN TRANSACTION
	* 4. SEND EMAIL NOTIFICATION FOR ORDER PLACEMENT
	* 5. SEND EMAIL NOTIFICATION PARCEL UPDATE
	*/

	public function test(){
		echo $this->customlib->getInvoiceNumber();
	}

	public function add($tracking_number, $id_plans, $courier_code)
	{

		// SAVE SHIPMENTS ON AFTERSHIP DASHBOARD
		$this->call_api_saveShipment($courier_code , $tracking_number); //POST
		// SAVE SHIPMENTS ON AFTERSHIP DASHBOARD

		$last_id = $this->transaction_model->add($tracking_number, $id_plans, $courier_code);

		// sleep(10);

		// GET TRACKING UPDATES
		// $foremail = $this->getTrackingUpdates($courier_code , $tracking_number ,$last_id);
		// GET TRACKING UPDATES

		//SEND EMAIL NOTIFICATION
		// $this->sendMail($foremail, $reference_nos, $tracking_number);

		$msg = "Your order was successfully added to your account, Click Track parcel button to check your parcel updates.";
		$this->session->set_flashdata('sys_msg',$msg);
		$this->session->set_flashdata('sys_msg_type','success');

		if($this->session->flashdata('transaction_payment_method') == 'stripe'){
			redirect(base_url()."transactions/index/".$id_plans);
		}
		return true;
	}

	public function saveBulkShipments($id_plans){
		$status = 1;
        if($id_plans == 1){
            $status = 2;
		}
		
		$data = $this->input->post();
		$details['invoice_nos'] = $this->customlib->getInvoiceNumber();
		$details['id_plans'] = $id_plans;
		$details['status'] = $status; 
		$details['payment_method'] = $_SESSION['transaction_payment_method'] ?? 'paypal';
		$details['created_at'] = date("Y-m-d h:i:sa");

		foreach($data['data']['data_shipments'] as $shipment){
			// SAVE SHIPMENTS ON AFTERSHIP DASHBOARD
			$this->call_api_saveShipment($shipment['tracking_number'] , $shipment['courier_slug']);

			$details['tracking_number'] = $shipment['tracking_number'];
			$details['courier_code'] = $shipment['courier_slug'];

			$last_id = $this->transaction_model->saveBulkShipments($details);
		}

	}

	public function call_api_saveShipment($tracking_number, $courier_code){ // POST
		
		/* API URL */
		$url = 'https://api.aftership.com/v4/trackings/';
			
		/* Init cURL resource */
		$ch = curl_init($url);
			
		/* Array Parameter Data */
		$data = [];

		$data =  
		'
			{
				"tracking": {
					"slug": "'.$courier_code.'",
					"tracking_number": "'.$tracking_number.'",
					"emails": [
						"'.$_SESSION['email'].'"
					]
				}
			}
		';
		


			 
		 /* pass encoded JSON string to the POST fields */
		 curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // SEND POST DATA

		// curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET'); //GET DATA
			
		/* set the content type json */
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
					'Content-Type:application/json',
					'aftership-api-key: deb5b1b7-b285-4a95-949e-7e98b6a14922'
				//  'App-Secret: 1233'
				));
			
		/* set return type json */
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			
		/* execute request */
		$result = curl_exec($ch);
		//  echo $result;
	
		/* close cURL resource */
		curl_close($ch);
	}

	public function getTrackingUpdates($courier_code , $tracking_number, $id_transaction = ''){
		/* API URL */
		$url = "https://api.aftership.com/v4/trackings/$courier_code/$tracking_number";
			
		/* Init cURL resource */
		$ch = curl_init($url);
			 
		/* Array Parameter Data */
		$data = [];
		
		/* pass encoded JSON string to the POST fields */
		//  curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // SEND POST DATA
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET'); //GET DATA
			
		 /* set the content type json */
		 curl_setopt($ch, CURLOPT_HTTPHEADER, array(
					 'Content-Type:application/json',
					 'aftership-api-key: deb5b1b7-b285-4a95-949e-7e98b6a14922'
					//  'App-Secret: 1233'
				 ));
			 
		 /* set return type json */
		 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			 
		 /* execute request */
		$result = curl_exec($ch);
		$result = json_decode($result); 

		$batch_data = array();
		$foremail = array();		 
		foreach($result->data as $tracking){
			foreach($tracking->checkpoints as $status){

				$batch_data[] = array(
					"id_transaction" => $id_transaction,
					"message" => $status->message,
					"checkpoint_time" => $status->checkpoint_time,
					"location" => $status->location
				);

				$foremail = array(
					$status->message,
					$status->checkpoint_time,
					$status->location
				);
			}
		}

		$this->transaction_model->trackingUpdates_saveBatch($batch_data);

		return $foremail;
		 /* close cURL resource */
		 curl_close($ch);

	}

	public function sendMail($foremail, $reference_nos, $tracking_number){
		if($_SESSION['id_user_type'] == 1){
			$nav_url = base_url().'back/admin/dashboard';
		}else if($_SESSION['id_user_type'] == 3){
			$nav_url = base_url().'back/customer/dashboard';
		}

		$link = base_url().'#plans&pricing';

		$message = $foremail[0];
		$checkpoint_time = $foremail[1];
		$location = $foremail[2];

		$id_plans = $this->input->post('id_plans');
		if($id_plans == 1){
				$emailContent = '<h3>Welcome<h3> <br>
				Thank you for your subscription!<br>
				You have purchased the following<br>

				Parcel Tracking - Ref No. '.$reference_nos.'<br>
				Tracking Number '.$tracking_number.'<br>
				Price: £1.00<br>

				<b><h3>Update Status:</h3></b>
				Status: '.$message.' <br>
				Time and Date: '.$checkpoint_time.' <br>
				Location: '.$location.' <br>
				<a href="'.$nav_url.'">View more</a>

				<br>
				<br>
				<br>

				Do you want to automatically monitor your tracking? We can help you. <br>

				Subscribe on  <a href="'.$link.'">Parcel Monitoring</a> Plan.<br>

				If you have any questions, please contact us at info@eazytrack.co.uk .<br>
				';
		}else if($id_plans == 2){
			$emailContent = '<h3>Welcome<h3> <br>

			Thank you for your subscription!<br>
			You have purchased the following<br>

			Parcel Monitoring - Ref No. '.$reference_nos.'<br>
			Tracking Number '.$tracking_number.'<br>
			Price: £5.00<br>

			<b><h3>Update Status:</h3></b>
			Status: '.$message.' <br>
			Time and Date: '.$checkpoint_time.' <br>
			Location: '.$location.' <br>
			<a href="'.$nav_url.'">View more</a>
			<br>
			<br>
			<br>

			Eazytrack automatically tracks the latest status for you!<br>
			If you have any questions, please contact us at info@eazytrack.co.uk .<br>
			';
		}

						

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

	public function TrackingUpdate($courier_code , $tracking_number){
		/* API URL */
		$url = "https://api.aftership.com/v4/trackings/$courier_code/$tracking_number";
			
		/* Init cURL resource */
		$ch = curl_init($url);
			 
		/* Array Parameter Data */
		$data = [];
		
		/* pass encoded JSON string to the POST fields */
		//  curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // SEND POST DATA
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET'); //GET DATA
			
		 /* set the content type json */
		 curl_setopt($ch, CURLOPT_HTTPHEADER, array(
					 'Content-Type:application/json',
					 'aftership-api-key: deb5b1b7-b285-4a95-949e-7e98b6a14922'
					//  'App-Secret: 1233'
				 ));
			 
		 /* set return type json */
		 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			 
		 /* execute request */
		 $result = curl_exec($ch);
		 $result = json_decode($result); 
 
		 $batch_data = array();
		 $foremail = array();	
		 
		 foreach($result->data as $tracking){
			 foreach($tracking->checkpoints as $status){
				 $batch_data[] = array(
					 "message" => $status->message,
					 "checkpoint_time" => $status->checkpoint_time,
					 "location" => $status->location
				 );
			 }
		 }
		 echo json_encode($batch_data);

		 /* close cURL resource */
		 curl_close($ch);

	}

	public function searchByTransactionNumber(){
		$tracking_number = $this->input->post('tracking_number');
		$result = $this->transaction_model->searchByTransactionNumber($tracking_number);
		if(count($result) != 0){
			$this->session->set_flashdata('HEADER_SEARCH_TRACKING',"GG");
			foreach($result as $row){
				$this->session->set_flashdata('invoice_nos',"$row->invoice_nos");
				$this->session->set_flashdata('reference_nos',"$row->reference_nos");
				$this->session->set_flashdata('tracking_number',"$row->tracking_number");
			}

			redirect($_SERVER['HTTP_REFERER']);
		}else{
			$this->session->set_flashdata('HEADER_ERRORSEARCH_TRACKING',"There is no Tracking number ($tracking_number) found in your account.");
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function createMultipleShipments(){
		$this->load->view('back/customer/create-multiple-shipments.php');
	}

	public function exportformat()
    {
        $this->load->helper('download');
        $filepath = "./public/docs/add-shipments-here.csv";
        $data     = file_get_contents($filepath);
        $name     = 'add-shipments-here.csv';

        force_download($name, $data);
    }

	public function addMultipleShipments($id_plan){

		if (isset($_FILES["file"]) && !empty($_FILES['file']['name'])) {
			$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
			if ($ext == 'csv') {
				$file = $_FILES['file']['tmp_name'];
				$this->load->library('CSVReader');
				$raw_shipments = $this->csvreader->parse_file($file);
				$data['couriers'] = $this->couriers_model->get()->result();
				$plans = $this->customlib->getPlanByID($id_plan);
				$data['total'] = count($raw_shipments) * $plans->actual_price;

				$batch_data = array();
				foreach($raw_shipments as $shipment){
					$couriers = $this->customlib->getCourierByTrackingNumber( $shipment['tracking_number'] );
					$couriers = json_decode($couriers, true);
					$courier = $couriers['data']['couriers'][0]['name'];
					$courier_slug = $couriers['data']['couriers'][0]['slug'];

					$batch_data[] = array(
						"tracking_number" => $shipment['tracking_number'],
						"courier" => $courier,
						"courier_slug" => $courier_slug
					);
				}

				$data['shipments'] = $batch_data;

				$this->load->view('back/customer/create-multiple-shipments.php', $data);
				
			} else {
				die('Must be CSV');
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">' . $this->lang->line('please_upload_CSV_file_only') . '</div>');
			}
		}else{
			$this->load->view('back/customer/create-multiple-shipments.php');
		}

	}

}
