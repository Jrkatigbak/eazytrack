<?php

class Claim_model extends CI_Model{  

    public function get ($id = ''){
        if($id != ''){
            $this->db->where("id",$id);
        }
        return $this->db->get("claim_type");
    }

    public function add ($reference_nos) {
        $_POST['invoice_nos'] = $this->customlib->getInvoiceNumber();
        $_POST['reference_nos'] = $reference_nos;
        $_POST['id_user'] = $_SESSION['id_user'];
        $_POST['created_at'] = date('Y-m-d H:i:s a');
        $this->db->insert('claims',$this->input->post());
    }

    public function AddClaimsUpdate () {
        $_POST['created_at'] = date('Y-m-d H:i:s a');
        $this->db->insert('claims_update',$this->input->post());
    }

    public function claim_order($id = '', $claim_status = ''){
        $this->db->select("a.*, b.type");
        if($id != ''){
            $this->db->where("a.id",$id);
        }
        if($claim_status != ''){
            $this->db->where("a.claim_status",$claim_status);
        }
        if($_SESSION['id_user_type'] != 1){ //ADMIN SHOW ALL CLAIMS
            $this->db->where("a.id_user",$_SESSION['id_user']);
        }
        $this->db->join("claim_type b","a.id_claim_type = b.id");
        return $this->db->get("claims a");
    }

    public function getClaimsUpdate($id){
        $this->db->order_by('id','desc');
        $this->db->where('id_claim',$id);
        return $this->db->get('claims_update');
    }

    public function getEmailByClaimReference($reference_nos){
        $this->db->select('a.email');
        $this->db->where('a.reference_nos', $reference_nos);
        $this->db->join('users b','a.id_user = b.id_user');
        return $this->db->get('claims a')->row();
    }

    public function getClaimsByRefNo($reference_nos){
        $this->db->select('a.*, c.type');
        $this->db->where('a.reference_nos', $reference_nos);
        $this->db->join('claim_type c','c.id = a.id_claim_type');
        $this->db->join('users b','a.id_user = b.id_user');
        return $this->db->get('claims a');
    }
	
}