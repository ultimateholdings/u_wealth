<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Payments_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->common_model->__session();
	}

	 public function get_providers()
    {
        $access_token=$this->get_accesstoken();
        //print_r($access_token);exit();
        $ch = curl_init();
        $url='https://api.pay2all.in/v1/app/providers';
        
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $headers = array('Authorization:Bearer '.$access_token,
                         'Accept:application/json');
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
        $data = json_decode($response, true);
        //print_r($data);exit();
        $services=$data['services'];
        $providers=$data['providers'];
        $count=sizeof($providers);
        //print_r( $providers);
        for($i=0;$i<$count;$i++){
        //$providers=$data['providers']['0']['id'];
        $service_id=$data['providers'][$i]['service_id'];
        }
        //$profile = $data['access_token'];

        //print_r($profile);
        curl_close($ch);
        return $providers;
    }

    public function get_services()
    {
        $access_token=$this->get_accesstoken();
        $ch = curl_init();
        $url='https://api.pay2all.in/v1/app/providers';
        
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $headers = array('Authorization:Bearer '.$access_token,
                         'Accept:application/json');
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
        $data = json_decode($response, true);
        //print_r($data);exit();
        $services=$data['services'];
        //$providers=$data['providers'];
        //print_r($services);
        //$profile = $data['access_token'];

        //print_r($profile);
        curl_close($ch);
        return $services;
    }

    public function get_accesstoken()
    {
        if(!strlen($this->session->userdata('_pay2all_accesstoken_'))>0){
          $ch = curl_init();
          $url='https://api.pay2all.in/token';
          $post = ['email' => config_item('pay2allemail'),
                   'password' => config_item('pay2allpassword')];                 
          
          curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          $headers = array('Accept:application/json');
          curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
          curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
          $response = curl_exec($ch);
          $data = json_decode($response, true);
          $profile = $data['access_token'];
          curl_close($ch);

          $this->session->set_userdata('_pay2all_accesstoken_', $profile);  
        }
        else{
          $profile = $this->session->userdata('_pay2all_accesstoken_');
        }

        return $profile;
        
    }

    /*public function get_response()
    {
        $access_token=$this->get_accesstoken();
        $ch = curl_init();
        $url='https://api.pay2all.in/v1/payment/recharge';
        $post = [
            //'api_token'='';
              'number' => '8884983969',
              'amount' => '10',
              'provider_id'   => '8',
               'client_id' =>'123456'];
        
        curl_setopt($ch, CURLOPT_URL, $url);
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $headers = array('Authorization:Bearer '.$access_token,
                         'Accept:application/json');
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
        $response = curl_exec($ch);
        
        $data = json_decode($response, true);
        curl_close($ch);
        
        debug_log($response);

    }
    */

    public function electricity_details($operator,$customer)
    {
      //print_r('inside electricity');
       $uid     = $this->session->user_id;
       $accesstoken=$this->payments_model->get_accesstoken();

       $ch = curl_init();
       $url='https://api.pay2all.in/v1/payment/verification';
       $post = ['number' => $customer,
                'provider_id'  => $operator];

       curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
       $headers = array('Authorization:Bearer '.$accesstoken,'Accept:application/json');
       curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
       curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
       $response = curl_exec($ch);
       $response = json_decode($response, true);
       curl_close($ch);
       debug_log($response);
       
       return($response);

    }

    public function add_transaction($data){
      $this->db->insert('transaction', $data);
      $insert_id = $this->db->insert_id();
      return $insert_id;
    }
    
    /*public function get_response_electricity()
    {
        $access_token=$this->get_accesstoken();
        $ch = curl_init();
        $url='https://api.pay2all.in/v1/payment/verification';
        $post = [
            //'api_token'='';
              'number' => '8884983969',
              'amount' => '100',
              'provider_id'   => '8',
               'client_id' =>'123456'];
        
        curl_setopt($ch, CURLOPT_URL, $url);
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $headers = array('Authorization:Bearer '.$access_token,
                         'Accept:application/json');
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
        $response = curl_exec($ch);
        
        $data = json_decode($response, true);
        curl_close($ch);
        
    }*/


}
defined('BASEPATH') || true;
?>