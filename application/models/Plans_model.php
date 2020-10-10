<?php
defined('BASEPATH') OR exit('no direct script access allowed');


class Plans_model extends CI_Model{  

    public function save_plan($data){
        $this->db->insert('plans',$data);
    }

    function getPlans ($id_plan = null, $del_status = null)
    {
        if($id_plan != ''){
            $this->db->where("id",$id_plan);    
    }

        $this->db->where("del_status",1);
        return $this->db->get("plans");
    }
    
    public function get_plan(){
        $data = $this->db->get('plans');
        return $data->result();
    }

    public function delete_plan($id){
        $this->db->where('id',$id);
        $this->db->delete('plans');
    }

    public function update_plans(){
        $id = $this->input->post('id');
        $data = $this->input->post();
        $this->db->where('id',$id);
        return $this->db->update('plans',$data);
      }

	
}