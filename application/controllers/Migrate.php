<?php
class Migrate extends MY_Controller
{
      public function __construct()
    {
        parent::__construct();
        $this->load->library('migration');  // load migration library
    }

    public function index() 
    {        
       if ($this->migration->current() === FALSE)
        {
            echo $this->migration->error_string();
        }else{
            echo "Table Migrated Successfully.";
        }
    }  

}
