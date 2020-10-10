<?php
defined('BASEPATH') OR exit('no direct script access allowed');


class Invoice_model extends CI_Model{  

    public function getTransactinInvoice(){
        $this->db->select('transactions.id,plans.name,plans.id as id_plan,invoice_nos');

        if($_SESSION['id_user_type'] == 3){
            $this->db->where('id_user', $_SESSION['id_user']);
        }

        $this->db->group_by('invoice_nos');
        $this->db->order_by('id','desc');
        $this->db->join('plans','plans.id = transactions.id_plans');
        return $this->db->get('transactions');
    }

    public function getClaimsInvoice(){
        $this->db->select('claims.id,plans.name,plans.id as id_plan,invoice_nos');

        if($_SESSION['id_user_type'] == 3){
            $this->db->where('id_user', $_SESSION['id_user']);
        }

        $this->db->group_by('invoice_nos');
        $this->db->order_by('id','desc');
        $this->db->join('plans','plans.id = 3');
        return $this->db->get('claims');
    }

    ########################

    public function getInvoiceContent($invoice_nos){
        $this->db->select('transactions.reference_nos,transactions.created_at,
                            plans.name as plan_name,plans.actual_price as plan_price');
        $this->db->join('plans', 'plans.id = transactions.id_plans');
        $this->db->where('invoice_nos', $invoice_nos);
        return $this->db->get('transactions');
    }

    public function getClaimsInvoiceContent($invoice_nos){
        $this->db->select('claims.reference_nos,claims.created_at,
                            plans.name as plan_name,plans.actual_price as plan_price');
        $this->db->join('plans', 'plans.id = 3');
        $this->db->where('invoice_nos', $invoice_nos);
        return $this->db->get('claims');
    }
	
}