<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

	public function __construct(){
        parent::__construct();
		$this->load->model('invoice_model');
		if($_SESSION['id_user'] == ''){
            redirect('welcome');
        }
	}

	public function index()
	{
		$transactionInvoices = $this->invoice_model->getTransactinInvoice()->result();
        $claimsInvoices = $this->invoice_model->getClaimsInvoice()->result();
        $data['invoices'] = array_merge($transactionInvoices, $claimsInvoices);
        $this->load->view('back/invoice', $data);
    }
    
    public function getInvoiceContent($invoice_nos){
        $data =  $this->invoice_model->getInvoiceContent($invoice_nos)->result();
        echo json_encode($data);
    }

    public function getClaimsInvoiceContent($invoice_nos){
        $data =  $this->invoice_model->getClaimsInvoiceContent($invoice_nos)->result();
        echo json_encode($data);
    }



}
