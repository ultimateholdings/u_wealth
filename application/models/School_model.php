<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class School_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->common_model->__session();
    }
   
    public function add_transaction($data){
        $this->db->insert('transaction', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function update_balance($data){  
        $this->db->where('userid', $this->session->user_id);
        $this->db->update('wallet', $data);
    }

      public function update_transaction($rid,$status){
        $data = array('status' => $status);       
        $this->db->where(array('transaction_id'=>$rid));
		$this->db->update('transaction', $data);
        return $rid;
    }
}


