<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bbps_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->common_model->__session();
    }
   
    public function add_bbps_transaction($data){
        //$this->db->insert('transaction', $data);
        $this->db->insert('bbps_transaction', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function update_balance($data){  
        $this->db->where('userid', $this->session->user_id);
        $this->db->update('wallet', $data);
    }

    public function add_complaint_request($data){  
        $this->db->insert('compliant_request', $data);
    }
}


