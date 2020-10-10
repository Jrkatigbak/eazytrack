<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FreeTrack extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('transaction_model');
	}

	/*
	* 1. SAVE IN SHIPMENTS
	* 2. GET TRACKING UPDATES
	* 3. SAVE IN TRANSACTION
	* 4. SEND EMAIL NOTIFICATION FOR ORDER PLACEMENT
	* 5. SEND EMAIL NOTIFICATION PARCEL UPDATE
	*/


	public function index()
	{
        $tracking_number = $this->input->post('tracking_number');
		// $courier_code = $this->input->post('courier_code');
		/*
		* GET COURIER CODE/SLUG
		* FIND COURIER USING PAID PLAN
		* SAVE THE SHIPMENT IN FREE PLAN FOR FREE TRACKING
		*/
		$couriers = $this->call_api_detectCourier($tracking_number); //POST
		$couriers = json_decode($couriers, true);
		$courier_code = $couriers['data']['couriers'][0]['slug'];

		// print_r($couriers['data']['couriers'][0]['slug']);die('x');
		// GET COURIER CODE/SLUG

		// // SAVE SHIPMENTS ON AFTERSHIP DASHBOARD
		$result = $this->call_api_saveShipment($courier_code , $tracking_number); //POST
		$result = json_decode($result, true);
		$result_code = $result['meta']['code'];
		// print_r($result['meta']); // | error message eg: already exists
		// print_r($result['meta']['code']);die();// == 4003 | 201
		// // SAVE SHIPMENTS ON AFTERSHIP DASHBOARD
		/*
		*		4003 - ALREADY EXISTS
		*		201 - CREATED
		*/
		// die('x');
		sleep(10);

		if($result_code == '4003' || $result_code == '201'){
		// GET TRACKING UPDATES
			$result_tracking = $this->getTrackingUpdates($courier_code , $tracking_number);
			if(empty($result_tracking)){
				echo 'error1';
				// echo 'Unable to pull updates from your tracking number.';
			}else{
				echo json_encode($result_tracking);
			}
		//GET TRACKING UPDATE
		}else{
			echo 'error2';
		}

	}
	
	/*
	 * REFERENCE: https://stackoverflow.com/questions/12429029/php-get-values-from-json-encode
	 *  deb5b1b7-b285-4a95-949e-7e98b6a14922 //PLAN
	 *  44bce421-c8fd-4ac2-baf1-4e6f1fcdaaa8 // FREE
	 *  e33f3d43-fc33-4de2-964e-1fba1417df7b // FREE // PROJECT TEAM
	*/
	public function call_api_detectCourier($tracking_number){ // POST
		
		/* API URL */
		$url = 'https://api.aftership.com/v4/couriers/detect';
			
		/* Init cURL resource */
		$ch = curl_init($url);
			
		/* Array Parameter Data */
		$data = [];

		$data =  
		'
			{
				"tracking": {
					"tracking_number": "'.$tracking_number.'"
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
		return $result = curl_exec($ch);
		//  echo $result;
	
		/* close cURL resource */
		curl_close($ch);
	}


	public function call_api_saveShipment($courier_code, $tracking_number){ // POST
		
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
					"tracking_number": "'.$tracking_number.'"
				}
			}
		';
			 
		 /* pass encoded JSON string to the POST fields */
		 curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // SEND POST DATA

		// curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET'); //GET DATA
			
		/* set the content type json */
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
					'Content-Type:application/json',
					'aftership-api-key: e33f3d43-fc33-4de2-964e-1fba1417df7b'
				//  'App-Secret: 1233'
				));
			
		/* set return type json */
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			
		/* execute request */
		return $result = curl_exec($ch);
		//  echo $result;
	
		/* close cURL resource */
		curl_close($ch);
	}

	public function getTrackingUpdates($courier_code , $tracking_number){
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
					 'aftership-api-key: e33f3d43-fc33-4de2-964e-1fba1417df7b'
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
		return $batch_data;
		 /* close cURL resource */
		 curl_close($ch);

	}


}
