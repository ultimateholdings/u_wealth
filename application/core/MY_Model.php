<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
        $this->common_model->__session();
    }

    // CURD FUNCTION

    public function array_from_post($fields)
    {

        $data = array();
        foreach ($fields as $field) {
            $data[$field] = $this->input->post($field, true);
        }
        return $data;
    }

    

}