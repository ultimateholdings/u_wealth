<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Modal extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->common_model->__session();
        
    }
    public function insert_data($data){
       return $this->db->insert('modal',$data);
    }
    
    
}