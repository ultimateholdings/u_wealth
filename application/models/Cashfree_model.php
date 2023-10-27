<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cashfree_model extends CI_Model
{
	   public function __construct()
    {
        parent::__construct();  
        $this->common_model->__session();
        $this->load->config('pg');
 
        $member  = $this->db_model->select_multi('*', 'member', array('id' =>$this->session->user_id));
        $member_profile  = $this->db_model->select_multi('*', 'member_profile', array('userid' =>$this->session->user_id));
        $netpaidforcashfreepayout=$_SESSION['cashfree_netpaid_topayamount'];
        
        debug_log("netpaid".$netpaidforcashfreepayout);
        debug_log($amount_after_admin_charge);
        
        $this->clientId = config_item('cashfree_clientId');
        $this->clientSecret = config_item('cashfree_Secret');
        $this->env = config_item('cashfree_env');

        $this->baseUrls = array(
                           'prod' => 'https://payout-api.cashfree.com',
                           'test' => 'https://payout-gamma.cashfree.com',
                          );
        $this->urls = array(
                      'auth' => '/payout/v1/authorize',
                      'getBene' => '/payout/v1/getBeneficiary/',
                      'addBene' => '/payout/v1/addBeneficiary',
                      'getBeneId'=>'/payout/v1/getBeneId',
                      'requestTransfer' => '/payout/v1/requestTransfer',
                      'getTransferStatus' => '/payout/v1/getTransferStatus?transferId='
                     );
       $this->beneficiary = array(
                              'beneId' => $member->id,
                              'name' => $member->name,
                              'email' => $member->email,
                              'phone' => $member->phone,
                              'bankAccount' => $member_profile->bank_ac_no,
                              'ifsc' => $member_profile->bank_ifsc,
                              'address1' => $member_profile->address,
                              'city' => $member_profile->city,
                              'state' => $member_profile->state,
                              'pincode' => $member_profile->zip,
                             );
        debug_log($this->beneficiary);

                    /*  $this->beneficiary = array(
                       'beneId' => '1001',
                       'name' => 'sowmya',
                       'email' => 'sowmyaknsunil@gmail.com',
                       'phone' => '7760732734',
                       'bankAccount' => '026291800001191',
                       'ifsc' => 'YESB0000262',
                       'address1' => 'address1',
                       'city' => 'bangalore',
                       'state' => 'karnataka',
                       'pincode' => '560001',
                     );*/
         
        $this->transfer = array(
                             'beneId' => $member->id,
                             'amount' => $netpaidforcashfreepayout,
                             'transferId' => time(),
                           );
        debug_log($this->transfer);

        $this->header = array(
                             'X-Client-Id: '.$this->clientId,
                             'X-Client-Secret: '.$this->clientSecret, 
                             'Content-Type: application/json',
                           );
        $this->baseurl = $this->baseUrls[$this->env];
     }

    public function create_header($token)
    {
        global $header;
        $headers = $this->header;
        if(!is_null($token))
        {
         array_push($headers, 'Authorization: Bearer '.$token);
        }
        return $headers;
    }
    public function getBeneId($token){
      try
      {
        global $beneficiary;
        $beneficiary=$this->beneficiary;
        $response = $this->post_helper('getBeneId', $beneficiary, $token);
        error_log('getBeneficiary ID not found');
      }
      catch(Exception $ex)
      {
        $msg = $ex->getMessage();
        debug_log('error in creating beneficiary');
        debug_log($msg);
      }
    }
    public function post_helper($action, $data, $token)
    {
     $baseurl=$this->baseurl;
     $urls=$this->urls;
     $finalUrl = $baseurl.$urls[$action];
     
     $headers = $this->create_header($token);
     $ch = curl_init();
     curl_setopt($ch, CURLOPT_POST, 1);
     curl_setopt($ch, CURLOPT_URL, $finalUrl);
     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
     curl_setopt($ch,  CURLOPT_RETURNTRANSFER, true);
     if(!is_null($data)) curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); 
    
     $r = curl_exec($ch);
    
     if(curl_errno($ch)){
        print('error in posting in post helper');
        print(curl_error($ch));
        exit(); //send error message to user
     }
     curl_close($ch);
     $rObj = json_decode($r, true);
     
     if($rObj['status'] != 'SUCCESS' || $rObj['subCode'] != '200') 
     {
       throw new Exception('incorrect response: '.$rObj['message']);
        //display 
     }
     else
     {
         return $rObj;
     }
    }

    public function get_helper($finalUrl, $token)
    {
      $headers = $this->create_header($token);

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $finalUrl);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch,  CURLOPT_RETURNTRANSFER, true);
    
      $r = curl_exec($ch);
    
      if(curl_errno($ch)){
        debug_log('error in posting in Cashfree');
        debug_log(curl_error($ch));
        exit();
       }
       curl_close($ch);

       $rObj = json_decode($r, true);  
     
       if($rObj['status'] != 'SUCCESS' || $rObj['subCode'] != '200') throw new Exception('incorrect response: '.$rObj['message']);
        return $rObj;
    }

    #get auth token
    public function getToken()
    {
      
      try{
           $response = $this->post_helper('auth', null, null);
           return $response['data']['token'];
         }
      catch(Exception $ex)
      {
        debug_log('error in getting token');
        debug_log($ex->getMessage());
        return 100;
      }
    }

    #get beneficiary details
    public function getBeneficiary($token)
    {
      try
      {
        $baseurl=$this->baseurl;
        $urls=$this->urls;
        $beneficiary=$this->beneficiary;
        $beneId = $beneficiary['beneId'];
        $finalUrl = $baseurl.$urls['getBene'].$beneId;
        $response = $this->get_helper($finalUrl, $token);
        return true;
       }
      catch(Exception $ex)
      {
        $msg = $ex->getMessage();
        if(strstr($msg, 'Beneficiary does not exist')) return false;
        debug_log("error in getting beneficiary details");
        debug_log($msg);
        return 100;
      }    
    }

    #add beneficiary
    public function addBeneficiary($token)
    {
      try{
        $beneficiary=$this->beneficiary;
        $response = $this->post_helper('addBene', $beneficiary, $token);
        debug_log('beneficiary created');
       }
      catch(Exception $ex)
      {
        $msg = $ex->getMessage();
        debug_log('error in creating beneficiary');
        debug_log($msg);
        return 100;
      }    
    }

    #request transfer
    public function requestTransfer($token)
    {
       try
       {
        global $transfer;
        $transfer=$this->transfer;
        $response = $this->post_helper('requestTransfer', $transfer, $token);
        debug_log('transfer requested successfully');
       }
       catch(Exception $ex)
       {
         $msg = $ex->getMessage();
         debug_log('error in requesting transfer');
         debug_log($msg);
         return 100;
        }
    }

    #get transfer status
    public function getTransferStatus($token)
    {
      try
      {
         global $baseurl, $urls, $transfer;

         $baseurl=$this->baseurl;
         $urls=$this->urls;
         $transfer=$this->transfer;
         $transferId = $transfer['transferId'];
         $finalUrl = $baseurl.$urls['getTransferStatus'].$transferId;
         $response = $this->get_helper($finalUrl, $token);
         return $response;
      }
      catch(Exception $ex)
      {
        $msg = $ex->getMessage();
        debug_log('error in getting transfer status');
        debug_log($msg);
        return 100;
      }
    }
}
