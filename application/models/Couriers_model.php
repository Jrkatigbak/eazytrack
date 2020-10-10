<?php

class Couriers_model extends CI_Model{  

    function get ($id = ''){
        if($id != ''){
            $this->db->where("id",$id);
        }
        $this->db->order_by("name",'asc');
        return $this->db->get("couriers");
    }
	
}