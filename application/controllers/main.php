<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Site
 */
class Main extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->common_model->__session();
     
        $this->load->model("modal");
      $this->load->library('form_validation');
    }
 
public function variable($admin="1000"){

    $this->form_validation->set_rules('name','name','required');
    $this->form_validation->set_rules('phonenumber','phonenumber','required');
    $this->form_validation->set_rules('email','email','required');
    $this->form_validation->set_rules('feedback','feedback','required');
    if ($this->form_validation->run() == TRUE ) {
         $data= ['name' =>$this->input->post('name'),
    'phonenumber' =>$this->input->post('phonenumber'),
    'email' =>$this->input->post('email'),
    'feedback' =>$this->input->post('feedback'),

    ];
   // print_r($data);
     $data['userid']=$admin;
    
    $this->modal->insert_data($data);
    debug_log('url '.$_SESSION['page']);

            $data['site'] = $_SESSION['page'];  
            $data = json_encode($data);
            debug_log('data');
            debug_log($data);

            $url = 'https://www.demo.globalmlmsolution.com/api/feedback/';
            $ch = curl_init($url);
            curl_setopt( $ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            # Return response instead of printing.
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
            # Send request.
            $response = curl_exec($ch);
            curl_close($ch);

            debug_log('response');
            debug_log($response);

     redirect(base_url('admin'));    
    }
    redirect(base_url('admin'));
    
}
  public function variable_member($member){
    $this->form_validation->set_rules('name','name','required');
    $this->form_validation->set_rules('phonenumber','phonenumber','required');
    $this->form_validation->set_rules('email','email','required');
    $this->form_validation->set_rules('feedback','feedback','required');
    if ($this->form_validation->run() == TRUE ) {
         $data= ['name' =>$this->input->post('name'),
    'phonenumber' =>$this->input->post('phonenumber'),
    'email' =>$this->input->post('email'),
    'feedback' =>$this->input->post('feedback'),
    ];
    $data['userid']=$member;
   
    
    $this->modal->insert_data($data);
     redirect(base_url('member'));

    
    }

}
}
