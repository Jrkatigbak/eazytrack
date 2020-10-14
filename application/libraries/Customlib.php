<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Customlib
{
    public $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->model('transaction_model', '', true);
        $this->CI->load->model('claim_model', '', true);
        $this->CI->load->model('plans_model', '', true);
    }

    public function getStatus($status){
        if($status == 1){
            return 'Ongoing';
        }

        if($status == 2){
            return 'Done';
        }
    }

    public function getLatestShipmentUpdate($id){
        $result = $this->CI->transaction_model->getLatestShipmentUpdate($id);
        return $result;
    }

    public function generate_reference_number(){
        $random_numbers = time() . rand(10*45, 100*98);

        $length = 3;
        $random_letter = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, $length);
        return strtoupper('EZT').$random_numbers;
    }

    public function generate_temp_password(){
        $random_numbers = time() . rand(10*45, 100*98);

        $length = 3;
        $random_letter = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, $length);
        return $random_letter.$random_numbers;
    }

    public function getEmailByClaimReference(){
        $data =  $this->CI->claim_model->getEmailByClaimReference($reference_nos);
        return $data->email;
    }

    public function getInvoiceNumber(){
		$data = $this->CI->transaction_model->getInvoiceNumber();
		return 'EZT-'.'INV-'.'100'.(count($data) + 1);
    }
    
    public function getPlanByID($id_plan){
		return $this->CI->plans_model->getPlans($id_plan)->row();
    }


    // Aftership Keys
    public function getCourierByTrackingNumber($tracking_number){ // POST
		
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

    public function getTransactionTotal($id_plan){
        $discount_details = $this->CI->plans_model->getPlans($id_plan)->row();
        return $discount_details->actual_price;
    }

    public function getTransactionDiscount($id_plan, $count, $total){
        $discount = 0;
        $discount_details = $this->CI->plans_model->getPlansDiscount($id_plan, $count );
        if($discount_details->num_rows() > 0){
            $discount = $discount_details->row()->discount;
        }
        return  $total_discount =  $total * ($discount/100); // GET DISCOUNT BY PERCENTAGE
    }
    
    
}
