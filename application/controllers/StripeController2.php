<?php
defined('BASEPATH') OR exit('No direct script access allowed');
   
class StripeController2 extends CI_Controller {
    
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->model('plans_model');
    }
    

    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index()
    {
        $this->load->view('my_stripe2');
    }
       
    
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function stripePost($tracking_number, $id_plans, $courier_code)
    {
        $plan = $this->plans_model->getPlans($id_plans)->row();
        $amount_to_pay = intval($plan->actual_price) . '00';

        $this->session->set_flashdata('transaction_payment_method','stripe');

        require_once('application/libraries/stripe-php/init.php');
        \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));
        header('Content-Type: application/json');
        $YOUR_DOMAIN = 'http://localhost/eazytrack/';
        $checkout_session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [[
            'price_data' => [
            'currency' => 'GBP',
            'unit_amount' => $amount_to_pay,
            'product_data' => [
                'name' => $plan->name,
                'images' => ["https://i.imgur.com/EHyR2nP.png"],
            ],
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',
        'success_url' => base_url() . 'transactions/add/'. $tracking_number  .'/'. $id_plans .'/'. $courier_code,
        'cancel_url' => base_url(),
        ]);
        echo json_encode(['id' => $checkout_session->id]);
    }

    public function saveDataInTableSession(){
		$_SESSION['bulkUploadTableData'] = $this->input->post('data');
	}

    public function stripePaymentBulkShipments($id_plans){
        $plan = $this->plans_model->getPlans($id_plans)->row();
        // print_r($_SESSION['bulkUploadTableData']['data_shipments']);die(count($_SESSION['bulkUploadTableData']['data_shipments']).'xxx');

        $total = $this->customlib->getTransactionTotal($id_plans) *
							count($_SESSION['bulkUploadTableData']['data_shipments']);

        $discount  = $this->customlib->getTransactionDiscount($id_plans, count($_SESSION['bulkUploadTableData']['data_shipments']), $total );
        $unit_amount = (floatval($total ?? 0) - floatval($discount ?? 0)) * 100;


        require_once('application/libraries/stripe-php/init.php');
        \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));
        header('Content-Type: application/json');
        $YOUR_DOMAIN = 'http://localhost/eazytrack/';
        $checkout_session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [[
            'price_data' => [
            'currency' => 'GBP',
            'unit_amount' => $unit_amount,
            'product_data' => [
                'name' => $plan->name,
                'images' => ["https://i.imgur.com/EHyR2nP.png"],
            ],
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',
        'success_url' => base_url() . 'transactions/saveBulkShipments/'. $id_plans  .'/from_stripe',
        'cancel_url' => base_url() . 'transactions/createMultipleShipments/'. $id_plans,
        ]);
        echo json_encode(['id' => $checkout_session->id]);

    }
   
}