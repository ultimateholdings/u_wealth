<?php

class Login extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->common_model->__session();

    }

    public function check_session()
    {
        $id = $this->session->admin_id;

        if (trim($id) == "" || trim($this->session->session) == "") {
            return FALSE;
        }
        else {

            return TRUE;
        }
    }

    public function check_member()
    {
        $id = $this->session->user_id;
        if (trim($id) == "" || trim($this->session->session) == "") {
            return FALSE;
        }
        else {
            return TRUE;
        }
    }

    public function check_vendor()
    {

        $id = $this->session->vendor_id;
        debug_log($id);
        if (trim($id) == "" || trim($this->session->session) == "") {
            return FALSE;
        }
        else {
            return TRUE;
        }
    }

}
