<?php

class Transaction_model extends CI_Model{  

    public function get($id_plans = null,$status = ''){
        $this->db->select('a.*,b.name,c.name as courier_name');
        if($id_plans != ''){
            $this->db->where('a.id_plans',$id_plans);
        }
        if($_SESSION['id_user_type'] != 1){
            $this->db->where('a.id_user',$_SESSION['id_user']);
        }
        if($status != ''){
            $this->db->where('a.status',$status);
        }
        $this->db->join('couriers c','a.courier_code = c.slug');
        $this->db->join('plans b','a.id_plans = b.id');
        $this->db->order_by('id','desc');
        return $this->db->get('transactions a');
    }

    public function add ($tracking_number, $id_plans, $courier_code){
        $status = 1;
        if($id_plans == 1){
            $status = 2;
        }
        $data = array(
            'invoice_nos'       => $this->customlib->getInvoiceNumber(),
            'reference_nos'     => $this->customlib->generate_reference_number(),
            'id_user'           => $_SESSION['id_user'],
            'id_plans'          => $id_plans,
            'tracking_number'   => $tracking_number,
            'courier_code'      => $courier_code,
            'payment_method'    => $_SESSION['transaction_payment_method'] ?? 'paypal',
            'status'            => $status,
            'created_at'        => date("Y-m-d h:i:sa"),
        );
        $this->db->insert('transactions',$data);
        $last_id = $this->db->insert_id();
        return ($this->db->affected_rows() != 1) ? false : $last_id;
    }

    public function saveBulkShipments ($details){

        $data = array(
            'invoice_nos'       => $details['invoice_nos'],
            'reference_nos'     => $this->customlib->generate_reference_number(),
            'id_user'           => $_SESSION['id_user'],
            'id_plans'          => $details['id_plans'],
            'tracking_number'   => $details['tracking_number'],
            'courier_code'      => $details['courier_code'],
            'payment_method'    => $details['payment_method'],
            'status'            => $details['status'],
            'created_at'        => $details['created_at'],
        );
        $this->db->insert('transactions',$data);
        $last_id = $this->db->insert_id();
        return ($this->db->affected_rows() != 1) ? false : $last_id;
    }

    public function trackingUpdates_saveBatch($batch_data){
        $this->db->insert_batch('transaction_update',$batch_data);
    }

    public function getLatestShipmentUpdate($id){
        $this->db->limit(1);
        $this->db->order_by('id','desc');
        $this->db->where('id_transaction',$id);
        return $this->db->get('transaction_update')->row();
    }

    public function getParcelUpdate($id){
        $this->db->order_by('id','desc');
        $this->db->where('id_transaction',$id);
        return $this->db->get('transaction_update')->result();
    }

    public function getInvoiceNumber(){
        return $this->db->query("SELECT id FROM claims UNION ALL select id FROM transactions")->result();
    }

    public function searchByTransactionNumber($tracking_number){
        $this->db->where('tracking_number',$tracking_number);
        if($_SESSION['id_user_type'] != 1){
            $this->db->where('id_user',$_SESSION['id_user']);
        }
        return $this->db->get('transactions')->result();
    }
	
}