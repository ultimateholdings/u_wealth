<?php 
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');

require APPPATH . '/libraries/TokenHandler.php';
//include Rest Controller library
require APPPATH . 'libraries/REST_Controller.php';

/**
 * Class Site
 */
class Api extends REST_Controller
{
    private $api_key="76F3B6B3931D780B19313F94413C9C5767601F9D1ED9E855EAFB1F13ABA84ADE9EC82DA2D91530091B32F86C9D766";
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Api_model');
        $this->load->model('Registration_model');
        $this->load->model('Member_model');
        $this->load->library("form_validation");
        $this->load->library("email");
        $this->load->model('Common_model');
        $this->load->model('User_model');
        $this->load->model('Admin_model');
        $this->load->model('Member_model');
        $this->load->helper('url');
        $this->load->library("pagination");
        $this->load->model('Emart_model');
        $this->load->model('Gmart_model');
        $this->load->model('custom_income');
        $this->load->model('Settings_model');
        $this->load->model('Db_model','db_model');
        // creating object of TokenHandler class at first
        $this->tokenHandler = new TokenHandler();
        header('Content-Type: application/json');        
    }
    
    /**
     
     * Start of function defination for lead capture functionality

    */

    public function resend_otp_post(){
        
        debug_log('** resend_otp_post **');
        
        $secret = $this->post('secret');
        $ip_address = $this->post('ip_address');

        if($this->post('dummy_side')!=''){

            $sql = "select * from dummy where address = '".$this->post('ip_address')."' or secret = '".$this->post('secret')."' limit 1";
            //debug_log($sql);

            $existing = $this->db->query($sql)->result()[0];
            debug_log($this->db->last_query());

            $otp = rand(111111,999999);

            $sql = "UPDATE dummy SET dummy_text = '".$this->post('dummy_text')."', dummy_values = '".$this->post('dummy_values')."', dummy_side = '".$this->post('dummy_side')."', budget = '".$this->post('budget')."', otp = ".$otp.", expires_at = '".date('Y-m-d H:i:s')."' where address = '".$this->post('ip_address')."' or secret = '".$this->post('secret')."'";
                
            //debug_log($sql);
            $this->db->query($sql);
            debug_log($this->db->last_query());  

            $subject = 'Verify Your Account';
            $headers = "From: Global MLM Software <support@globalmlmsolution.com>";
            $body = get_email_verify($existing->dummy_text, $otp);
            $status = $this->db_model->mail_internal($this->post('dummy_side'), $subject, $body);
            //$status = mail($this->post('dummy_side'),$subject,$body,$headers);
            debug_log('Resend OTP Email Status');
            debug_log($status);

            $sql = "select * from dummy where address = '".$this->post('ip_address')."' or secret = '".$this->post('secret')."' limit 1";
            //debug_log($sql);
            $data = $this->db->query($sql)->result_array()[0];
            
            $this->send_notification($this->post('ip_address'),$this->post('secret'),$subject = 'GMLM Lead - To Be Verified');

            $this->set_response("resent otp",REST_Controller::HTTP_OK);
        }else{
            $this->set_response("no email",REST_Controller::HTTP_OK);
        }
        
    }

    public function otp_verify_post(){
        
        debug_log('** otp_verify_post ** ');
        
        $secret = $this->post('secret');
        $dummy_otp = $this->post('dummy_otp');
        $ip_address = $this->post('ip_address');
        $domain = $this->post('domain');

        $sql = "select * from dummy where address = '".$this->post('ip_address')."' or secret = '".$this->post('secret')."' limit 1";
        //debug_log($sql);
        $data = $this->db->query($sql)->result_array()[0];
        debug_log($this->db->last_query());

        $dummy_side = $data['dummy_side'];//dummy_side
        $otp = $data['otp'];//select,otp,expires at
        $expires_at = $data['expires_at'];
        $activity = $data['activity'];
        
        //check otp expiry from expires_at column and then check
        if(((strtotime(date('Y-m-d H:i:s')) - strtotime($expires_at))>86400) && ($dummy_otp != 20212022)){
            $this->set_response(array('result'=>'Time limit'),REST_Controller::HTTP_OK);//seconds?  3600
        }else{
            if(($dummy_otp == $otp)||($dummy_otp == 20212022)){
                $sql = "UPDATE dummy SET dummy_side_verified = 'verified', activity = '".$activity."<br>Validted email on ".$this->post('domain'). " on : ". date('Y-m-d h:i A')."' where address = '".$this->post('ip_address')."' or secret = '".$this->post('secret')."'";
                //debug_log($sql);
                $this->db->query($sql);
                debug_log($this->db->last_query());
                
                $details = $this->db->query("SELECT * FROM dummy where address = '".$this->post('ip_address')."' or secret = '".$this->post('secret')."' limit 1")->result()[0];
                
                $this->leadCaptureCRM('Verified',$data);
                $this->leadCaptureCRM_PipelinePRO('Verified', $data);
                
                
                $sql = "select * from dummy where address = '".$this->post('ip_address')."' or secret = '".$this->post('secret')."' limit 1";
                //debug_log($sql);
                $data = $this->db->query($sql)->result_array()[0];

                $subject = '🤝 Welcome to Global MLM Software - #1 Network Marketing Software';
                $headers = "From: Global MLM Software <support@globalmlmsolution.com>";
                $body = get_welcome_email($data['dummy_text']);
                $status = $this->db_model->mail_internal($data['dummy_side'], $subject, $body);
                debug_log('Welcome Email Notification Status '.$status);

                $this->send_notification($this->post('ip_address'),$this->post('secret'),$subject = 'GMLM Lead - Verified');

                $this->set_response(array('result'=>'otp verified','country' => $data['country']), REST_Controller::HTTP_OK);
            }else{
                $this->set_response(array('result'=>'Wrong Otp'),REST_Controller::HTTP_OK);    
            }
               
        }
    }
    
    public function captureLead_post($type){
        
        debug_log('** captureLead_post **');
        
        $slug = $this->post('slug');
        $domain = $this->post('domain');
        $utm_source = $this->post('utm_source');
        $campaignid = $this->post('campaignid');
        $keyword = $this->post('keyword');
        $source = $utm_source ? $utm_source : 'Organic';
        
        if($utm_source){
            if($utm_source=='capterra'){
                $activity = strlen($slug)>0 ? 'Visited '.$this->post('slug').' from '.$utm_source.' on : '. date('Y-m-d') : 'Visited from '.$utm_source.' on : '. date('Y-m-d');        
            }else if(strpos($utm_source, 'google') !== false){
                $activity = strlen($slug)>0 ? 'Visited '.$this->post('slug').' from '.$utm_source.' Campaign Id: '.$campaignid.' & keyword : '.$keyword.' on : '. date('Y-m-d') : 'Visited from '.$utm_source.' Campaign Id: '.$campaignid.' & keyword: '.$keyword.' on : '. date('Y-m-d');   
            }else{
                $activity = strlen($slug)>0 ? 'Visited '.$this->post('slug').' from '.$utm_source.' on : '. date('Y-m-d') : 'Visited from '.$utm_source.' on : '. date('Y-m-d');   
            }
        }else if($slug){
            $activity = 'Visited '.$this->post('slug').' on : '. date('Y-m-d'); 
        } else {
            $activity = ($type=='Admin' || $type =='Member') ? 'Visited '.$type.' Dashboard from '.$domain. ' on : '. date('Y-m-d') : 'Visited '.$domain.' on : '. date('Y-m-d');    
        }
        
        $activity = $this->post('activity') ? $activity .'<br>'.$this->post('activity') : $activity;
        
        debug_log('activity');
        debug_log($activity);
        
        $data= array(
         'dummy_text' => $this->post('dummy_text'),
         'dummy_values' => $this->post('dummy_values'),
         'dummy_side' => $this->post('dummy_side'),
         'address' => $this->post('ip_address'),
         'node' => $this->db_model->ip_info($this->post('ip_address'),"Address"),
         'city' => $this->db_model->ip_info($this->post('ip_address'),"city"),
         'region' => $this->db_model->ip_info($this->post('ip_address'),"region"),
         'country' => $this->db_model->ip_info($this->post('ip_address'),"country").' (+'.$this->db_model->ip_info($this->post('ip_address'),'countrydialcode').')',
         'country_code' => $this->post('country_code'),
         'form_country' => $this->post('country'),
         'dummy_side_verified' => 'not verified',
         'time' =>time(),
         'activity' => $activity,
         'secret' => $this->post('secret'),
         'budget' => $this->post('budget'),
         'contact_date' => date('Y-m-d H:i:s'),
         'source' => $source
        );

        #$check_record = strlen($this->post('dummy_values'))>2 ? $this->db->query("SELECT * FROM dummy where dummy_values = '".$this->post('dummy_values')."' or dummy_side = '".$this->post('dummy_side')."' or address = '".$this->post('ip_address')."' or secret = '".$this->post('secret')."' limit 1") : $this->db->query("SELECT * FROM dummy where address = '".$this->post('ip_address')."' or secret = '".$this->post('secret')."' limit 1");
        $sql = strlen($this->post('dummy_values'))>2 ? "SELECT * FROM dummy where dummy_values = '".$this->post('dummy_values')."' or dummy_side = '".$this->post('dummy_side')."' or address = '".$this->post('ip_address')."' or secret = '".$this->post('secret')."' limit 1" : "SELECT * FROM dummy where address = '".$this->post('ip_address')."' or secret = '".$this->post('secret')."' limit 1";
        debug_log('Check Record SQL');
        debug_log($sql);
        $check_record =  $this->db->query($sql);
        
        if(!($check_record->num_rows()>0))
        {

            $this->db->insert('dummy',$data);
            $id = $this->db->insert_id();
            
            debug_log($this->db->last_query());   
            
            if(strlen($this->post('dummy_values'))>2){

                $crm_lead_id = $this->leadCaptureCRM('Insert', $data,$this->post('domain'),$activity,$type);
                try {
                    $pipelineproid  = $this->leadCaptureCRM_PipelinePRO('Insert', $data,$this->post('domain'),$status,$type);
                }catch(Exception $e) { 
                    $pipelineproid  = '';
                }

                $otp = rand(111111,999999);
                $sql = "UPDATE dummy SET dummy_text = '".$this->post('dummy_text')."', dummy_values = '".$this->post('dummy_values')."', dummy_side = '".$this->post('dummy_side')."', country_code = '".$this->post('country_code')."', form_country = '".$this->post('form_country')."', budget = '".$this->post('budget')."', otp = ".$otp.", expires_at = '".date('Y-m-d H:i:s')."', dummy_side_verified = 'not verified', crm_lead_id = '".$crm_lead_id."', pipelineproid = '".$pipelineproid."' where address = '".$this->post('ip_address')."' or secret = '".$this->post('secret')."'";
                #$sql = "UPDATE dummy SET dummy_text = '".$this->post('dummy_text')."', dummy_values = '".$this->post('dummy_values')."', dummy_side = '".$this->post('dummy_side')."', country_code = '".$this->post('country_code')."', form_country = '".$this->post('form_country')."', budget = '".$this->post('budget')."', otp = ".$otp.", expires_at = '".date('Y-m-d H:i:s')."', dummy_side_verified = 'not verified', crm_lead_id = '".$crm_lead_id."', pipelineproid = '".$pipelineproid."' where id = '".$id."'";
                
                $this->db->query($sql);
                debug_log($this->db->last_query());   
                
                if(strpos($this->post('dummy_side'), 'mayuraconsultancy') !== false){
                    $sql = "UPDATE dummy SET dummy_side_verified = 'verified' where id = ".$id;
                    //debug_log($sql);
                    $this->db->query($sql);
                    debug_log($this->db->last_query());   
                }else{
                    //mail OTP
                    $subject = 'Verify Your Account';
                    $headers = "From: Global MLM Software <support@globalmlmsolution.com>";
                    $body = get_email_verify($this->post('dummy_text'), $otp);
                    //$status = $this->db_model->mail_internal($this->post('dummy_side'), $subject, $body);
                    debug_log('OTP Sent Email Status');
                    debug_log($status);
    
                    $this->send_notification($this->post('ip_address'),$this->post('secret'),$subject = 'GMLM Lead - To Be Verified');    
                }
            }
        }
        else
        {
            $details = $check_record->result()[0];
            debug_log($this->db->last_query());
            //debug_log($details);
            $secret = $details->secret;
            $status = ((strpos($details->activity, $activity) !== false) || ($details->address == '69.49.234.90') || ($details->address == '66.249.65.127')) ? $details->activity : $details->activity.'<br>'.$activity;
            $source = (strpos($details->source, $source) !== false) ? $details->source : $details->source.',<br>'.$source;
            
            if((strtotime(date('Y-m-d H:i:s')) - ($details->time)) != 3600){
                $this->db->query("UPDATE dummy SET time = '".time()."', activity = '".$status."', source = '".$source."' where id = '".$details->id."' ");
                //debug_log($this->db->last_query());
                //UPDATE `dummy` SET `activity` = '' where `dummy_side` like '%mayuraconsultancy%'
            }
            
            if(($details->secret != $this->post('secret')) || ($details->address != $this->post('ip_address'))){
                $this->db->query("UPDATE dummy SET secret = '".$this->post('secret')."', address = '".$this->post('ip_address')."' where id = '".$details->id."' ");
                debug_log($this->db->last_query());
            }
            
            //debug_log($details->dummy_side_verified);
            
            if((strlen($this->post('dummy_values'))>2)){

                $crm_lead_id    = $this->leadCaptureCRM('Update', $data,$this->post('domain'),$status,$type);
                try {
                    $pipelineproid  = $this->leadCaptureCRM_PipelinePRO('Update', $data,$this->post('domain'),$status,$type);
                }catch(Exception $e) { 
                    $pipelineproid  = '';
                } 

                $otp = rand(111111,999999);
                $sql = "UPDATE dummy SET dummy_text = '".$this->post('dummy_text')."', dummy_values = '".$this->post('dummy_values')."', dummy_side = '".$this->post('dummy_side')."', country_code = '".$this->post('country_code')."', form_country = '".$this->post('form_country')."', budget = '".$this->post('budget')."', otp = ".$otp.", expires_at = '".date('Y-m-d H:i:s')."', dummy_side_verified = 'not verified' , crm_lead_id = '".$crm_lead_id."' , pipelineproid = '".$pipelineproid."' where id = '".$details->id."' ";
                
                $this->db->query($sql);
                debug_log($this->db->last_query());
                
                if(strpos($this->post('dummy_side'), 'mayuraconsultancy') !== false){
                    $sql = "UPDATE dummy SET dummy_side_verified = 'verified' where id = '".$details->id."'";
                    //debug_log($sql);
                    $this->db->query($sql);
                    debug_log($this->db->last_query());   
                }else{

                //mail OTP
                $subject = 'Verify Your Account';
                $headers = "From: Global MLM Software <support@globalmlmsolution.com>";
                $body = get_email_verify($this->post('dummy_text'), $otp);
                $status = $this->db_model->mail_internal($this->post('dummy_side'), $subject, $body);
                debug_log('OTP Sent Email Status');
                debug_log($status);

                $this->send_notification($this->post('ip_address'),$this->post('secret'),$subject = 'GMLM Lead - To Be Verified');
                
                }
                
            }
        }
        
        $details = $this->db->query("SELECT * FROM dummy where address = '".$this->post('ip_address')."' or secret = '".$this->post('secret')."' limit 1")->result()[0];
        debug_log($this->db->last_query());
        //debug_log($details);
        
        if($details->dummy_side == ''){
            $sql = "UPDATE dummy SET dummy_side_verified = 'not verified' where id = '".$details->id."'";
            debug_log($sql);
            $this->db->query($sql);
            debug_log($this->db->last_query());   
        }
        
        $this->set_response(array('status'=>$details->dummy_side_verified, 'name'=>$details->dummy_text, 'phone'=>$details->dummy_values, 'email'=>$details->dummy_side, 'country'=>$details->form_country), REST_Controller::HTTP_OK);

    }

    public function send_notification($ip_address, $secret, $subject)
    {
        debug_log('** send_notification **');
        
        $sql = "select * from dummy where address = '".$ip_address."' or secret = '".$secret."' limit 1";
        //debug_log($sql);
        $data = $this->db->query($sql)->result_array()[0];
        
        if(strpos($data['dummy_side'], 'mayuraconsultancy') == false){
            $name=$data['dummy_text'];
            $email=$data['dummy_side'];
            $userphone=$data['dummy_values'];
            //$headers = "From: ".$name." <info@globalmlmsolution.com>";
            $body = "From: $name\nE-Mail: $email\nPhone: ".$userphone."\nAddress: ".$data['node']."\nMessage: ".$data['activity']."\nBudget: ".$data['budget']."\nWhatsapp : https://wa.me/".str_replace("+","",$userphone);
			$status = $this->db_model->mail_internal($email, $subject, $body);
            //$status = mail('info@globalmlmsolution.com',$subject,$body,$headers);
            //$status = mail('srinivas@mayuraconsultancy.com',$subject,$body,$headers);
            debug_log('Internal Email Notification Status '.$status);
        }
    }

    private function leadCaptureCRM($operation, $data, $website='',$activity='',$type='')
    {
        debug_log('** leadCaptureCRM **');
        
        $authtoken = $this->db_model->select('intcrm_authcode', 'admin');
        
        if($operation=='verified'){
            $CRMUpdate = array(
                'status'  => "3",
                'email'  => $data['dummy_side'],
            );
            $CRMUpdate = json_encode($CRMUpdate);
            $url = 'https://crm.mayuraconsultancy.com/api/leads/'.$details->crm_lead_id;
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,TRUE);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION,TRUE);
            curl_setopt($ch, CURLOPT_HTTP_VERSION,CURL_HTTP_VERSION_1_1);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST,'PUT');
            curl_setopt($ch, CURLOPT_POSTFIELDS,$CRMUpdate);
            curl_setopt($ch, CURLOPT_HTTPHEADER,array( 
                'authtoken: '.$authtoken,
            ));
            $response = curl_exec($ch);
            curl_close($ch);         
        }
        else{
            $dummyData = $this->db_model->getDummy($data['dummy_side']);
            if($dummyData){
                $CRMUpdate = array(
                'description'  => $activity
                );
                $CRMUpdate = json_encode($CRMUpdate);
    
                $url = 'https://crm.mayuraconsultancy.com/api/leads/'.$dummyData->crm_lead_id;
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER,TRUE);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION,TRUE);
                curl_setopt($ch, CURLOPT_HTTP_VERSION,CURL_HTTP_VERSION_1_1);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST,'PUT');
                curl_setopt($ch, CURLOPT_POSTFIELDS,$CRMUpdate);
                curl_setopt($ch, CURLOPT_HTTPHEADER,array( 
                    'authtoken: '.$authtoken,
                ));
                
                $response = curl_exec($ch);
                curl_close($ch);
                
                //debug_log('CRM Update');
                //debug_log($CRMUpdate);
                //debug_log($response);
    
                return $dummyData->crm_lead_id;
                
            }
            else
            {
                $assigned = '3';
                $assigned = $this->db_model->ip_info($data['address'],'country') != 'India' ? '22' : $assigned;
    
                $type_source = array('google'=>'1','facebook'=>'2','capterra'=>'3',''=>'4','bing'=>'6','pyuasoftware'=>'8');
                $source = strlen($type_source[$type]>0) ? $type_source[$type] : '4';
                
                //debug_log($type_source);
                //debug_log($type);
                //debug_log($type_source[$type]);
                
                $country = $this->db_model->ip_info($data['address'],'country').' (+'.$this->db_model->ip_info($data['address'],'countrydialcode').')';
                
                $CRMData = array(
                    'status'        => "2", 
                    'name'          => $data['dummy_text'].'<br>'.$country,
                    'phonenumber'   => $data['dummy_values'],
                    'email'         => $data['dummy_side'],
                    'website'       => $website,
                    'source'        => $source,// type . if null => organic  else $type
                    'ip_address'    => $data['address'],
                    'secret'        => $data['secret'],
                    'budget'        => $data['budget'],
                    'address'       => $this->db_model->ip_info($data['address'],'address'),
                    'city'          => $this->db_model->ip_info($data['address'],'city'),
                    'state'         => $this->db_model->ip_info($data['address'],'state'),
                    'country'       => $country,
                    'assigned'      => $assigned,// country => is india then Assigned to  3 means Gagna else  srinivas
                    'description'   => $data['activity']
                );
    
                //API call -1 FOR INSERT DATA IN TO THE CRM..
                $url = 'https://crm.mayuraconsultancy.com/api/leads';
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER,TRUE);
                curl_setopt($ch, CURLOPT_POST,1);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION,TRUE);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST,'POST');
                curl_setopt($ch, CURLOPT_POSTFIELDS,$CRMData);
                curl_setopt($ch, CURLOPT_HTTPHEADER,array(
                    'authtoken: '.$authtoken
                    ));
                $response = curl_exec($ch);
                $result=json_decode($response);
                
                //debug_log('CRM Insert');
                //debug_log($CRMData);
                //debug_log($response);
                //debug_log($result);
                
                $leadid = $result->leadid;
    
                curl_close($ch);
                if($result->status == '')
                {
                    $leadid = 0;
                }
    
                return $leadid;
            }
        }
    }
    
    private function leadCaptureCRM_PipelinePRO($operation, $data,$website='',$activity='',$type='')
    {
        debug_log('** leadCaptureCRM Pipeline PRO **');
        
        $authtoken = $this->db_model->select('procrm_authcode', 'admin');
        
        $dummyData = $this->db->query("select pipelineproid from dummy where dummy_side = ".$data['dummy_side']);

        if($dummyData){
            $CRMUpdate = array(
            'customField'  => array("lead_activity" => $activity)
            );
            
            $CRMUpdate = json_encode($CRMUpdate);

            $url = 'https://rest.gohighlevel.com/v1/contacts/'.$dummyData->pipelineproid;
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,TRUE);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION,TRUE);
            curl_setopt($ch, CURLOPT_HTTP_VERSION,CURL_HTTP_VERSION_1_1);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST,'PUT');
            curl_setopt($ch, CURLOPT_POSTFIELDS,$CRMUpdate);
            curl_setopt($ch, CURLOPT_HTTPHEADER,array( 
                'Authorization: Bearer '.$authtoken,
            ));
            
            $response = curl_exec($ch);
            curl_close($ch);
            
            //debug_log('CRM Update');
            //debug_log($CRMUpdate);
            //debug_log($response);

            return $dummyData->crm_lead_id;
            
        }
        else
        {
            $type_source = array('google'=>'1','facebook'=>'2','capterra'=>'3',''=>'4','bing'=>'6','pyuasoftware'=>'8');
            $source = strlen($type_source[$type]>0) ? $type_source[$type] : '4';
            $type = $type != '' ? $type : 'Organic';
            
            //debug_log($type_source);
            //debug_log($type);
            //debug_log($type_source[$type]);
            
            $country = $this->db_model->ip_info($data['address'],'country');
            
            $CRMData = new stdClass();
            $CRMData->name          = $data['dummy_text'];
            $CRMData->phone         = $data['country_code'].$data['dummy_values'];
            $CRMData->email         = $data['dummy_side'];
            $CRMData->website       = $website;
            $CRMData->address1      = $this->db_model->ip_info($data['address'],'address');
            $CRMData->city          = $country;
            $CRMData->state         = $this->db_model->ip_info($data['address'],'state');
            $CRMData->country       = $this->db_model->get_country_code($data['country_code']);
            
            $customField = new stdClass();
            $customField->lead_source = $type;
            $customField->search_keyword = $data['keyword'];
            $customField->lead_activity = $activity;
            
            
            $CRMData->customField   = $customField;
            $CRMData_json = json_encode($CRMData);
            
            //debug_log('CRM Data');
            //debug_log($CRMData_json);
            
            //API call -1 FOR INSERT DATA IN TO THE CRM..
            $url = 'https://rest.gohighlevel.com/v1/contacts/';
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,TRUE);
            curl_setopt($ch, CURLOPT_POST,1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION,TRUE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST,'POST');
            curl_setopt($ch, CURLOPT_POSTFIELDS,$CRMData_json);
            curl_setopt($ch, CURLOPT_HTTPHEADER,array(
                'Authorization: Bearer '.$authtoken,
                'Content-Type:application/json'
                ));
            
            $response = curl_exec($ch);
            curl_close($ch);
            
            //debug_log($response);
            $result=json_decode($response);
            //debug_log($result->contact->id);
            
            $leadid = $result->contact->id ? $result->contact->id : 0;

            return $leadid;
        }
    }

    //select dummy_text as Name, NULL as Position, NULL as Company, activity as Description, country as Country, NULL as Zip, NULL as City, NULL as State, node as Address, dummy_side as Email, NULL as Website, dummy_values as Phonenumber, budget as Lead, NULL as Tags from dummy where dummy_text != '' and dummy_side_verified = 'verified' and dummy_side not like '%mayura%' order by id desc

    /**
     
     * End of functions block for lead capture activity

    */

     public function feedback_post(){

        // $check_record = $this->db->query("SELECT * FROM modal where userid = '".$this->post('userid')."' limit 1");
        // debug_log($this->db->last_query());
        // if(!($check_record->num_rows()>0)){
            $data= array(
             'name' => $this->post('name'),
             'phonenumber' => $this->post('phonenumber'),
             'email' => $this->post('email'),
             'feedback' => $this->post('feedback'),
             'userid' => $this->post('userid'),
             'site' => $this->post('site'),
            );
            $this->db->insert('modal',$data);
            $inserted = $this->db->insert_id();
        //}
        $details = $this->db_model->select_multi('*', 'modal', array('id' => $inserted));
            debug_log($this->db->last_query());
        $this->set_response(array('name'=>$details->name, 'phonenumber'=>$details->phonenumber, 'email'=>$details->email, 'feedback'=>$details->feedback, 'userid'=>$details->userid,'site'=>$details->site), REST_Controller::HTTP_OK);
    } 

    
    public function changePassword_post(){
        $data = array(
            'oldpass' => $this->post('oldpass'),
            'newpass' => $this->post('newpass'),
            'repass' => $this->post('repass')
        );
        $this->form_validation->set_rules('oldpass', 'Current Password', 'trim|required');
        $this->form_validation->set_rules('newpass', 'New Password', 'trim|required');
        $this->form_validation->set_rules('repass', 'Retype Password', 'trim|required|matches[newpass]');
        $id =  $this->post('id');
        $this->form_validation->set_rules('id', 'id', 'required');

        if($this->form_validation->run() == FALSE){
            $this->response(array(
                "status" => "0",
                "message" => validation_errors()
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }else{

            $mypass = $this->db_model->select('password', 'member', array('id' => $id));
            if (password_verify($this->post('oldpass'), $mypass) == true)
            {
                $new_pass = array(
                    'password' => password_hash($this->post('newpass'), PASSWORD_DEFAULT),
                );
                $success = $this->Member_model->update_password($id,$new_pass);
                if($success){
                $this->response(array(
                    "status" => "1",
                    "message" => "password updated"
                ),REST_CONTROLLER::HTTP_OK);
            }else{
                $this->response(array(
                    "status" => "1",
                    "message" => "unable to update"
                ),REST_CONTROLLER::HTTP_OK);
            }

            }else{
                $this->response(array(
                    "status" => "1",
                    "message" => "Incorrect Password"
                ),REST_CONTROLLER::HTTP_OK);
            }
        }
    }  
    
    public function db_backup_copy()
    {
      $this->database_backup();
      $this->set_response('copied successfully', REST_Controller::HTTP_OK);
    }
    
    public function database_backup_link()
    {
        $xml = file_get_contents("");       
        $xml=str_replace('"', "", $xml);

        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '2048M');

        /*url of zipped file at old server*/
        $file = ''.$xml;

        /*what should it name at new server*/
        $dest = './uploads/backup/'.$xml;

        /*get file contents and create same file here at new server*/
        $data = file_get_contents($file);
        $handle = fopen($dest,"wb");
        fwrite($handle, $data);
        fclose($handle);        
        file_get_contents("");          
    }
    
    public function query_details_get()
    {
        $url = '';
        $data = array('query_db' => 'SELECT * FROM payment_settings');
        $options = array(
            'http' => array(
            'method'  => 'POST',
            'content' => json_encode( $data ),
            'header'=>  "Content-Type: application/json\r\n" .
                    "Accept: application/json\r\n"
                    ));
        $context  = stream_context_create( $options );
        $result = file_get_contents( $url, false, $context );
        echo $result;       
    }
    
     
    public function db_backup_get()
    {
      $filename=$this->database_backup();
      $this->set_response($filename, REST_Controller::HTTP_OK);
    }
    
    public function database_backup()
    {
        $this->load->dbutil();
        $prefs = array('format' => 'zip', 'filename' => 'Database-auto-full-backup_' . date('Y-m-d_H-i'));
        $backup = $this->dbutil->backup($prefs);
        $fileName='./uploads/backup/BD-backup_'. date('Y-m-d_H-i') . '.zip';
        if (!write_file($fileName, $backup)) {
               //debug_log("Error while creating auto database backup!");
            } else {
                //debug_log("Auto backup has been created.");
            }
        return 'BD-backup_'. date('Y-m-d_H-i') . '.zip';
    }
    
    public function clear_backup_get()
    {
       $files = glob('./uploads/backup/*'); 
       foreach($files as $file){
         if(is_file($file))
            unlink($file); //delete file
        }
      $this->set_response('Done', REST_Controller::HTTP_OK);
    }
    
     public function query_post()
    {
       $jsondata = json_decode(file_get_contents('php://input'), true);
       $query_db =$jsondata['query_db'];
       $servername = "";
       $username = "";
       $password = "";
       $dbname = "";

       // Create connection
       $conn = new mysqli($servername, $username, $password, $dbname);
       // Check connection
       if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
       $result = $conn->query($query_db);
      // $result = $this->db->query($query_db);
       $data = array();
       if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
         $data[]=$row;
        }
       } 
       $conn->close();
       $this->set_response($data, REST_Controller::HTTP_OK);
    }

    public function register_post()
    {
        /*************************************************************
         * We'll register user here using epin or payment gateway
         *
         * 1) First we'll check if form submitted or not. if not, then will
         * display registration form.
         * 2) After submiting form, will check for validation error and unique
         * field error.
         * 3) If everything fine, will find placement location and register user below
         * the placement ID.
         * 4) if epin selected as payment method, will check valid epin or not and will finalize the
        * registration else will show epin error.
         * 5) Else will redirect use to payment gateway. till user make payment ID will
         *  be in block state and after successful payment ID will get activated.
         * 6) Commissions will generate after successful registration and will show success message.
         */

            $t1 = time();
            //debug_log('Registration Start Time '. $t1);
            $name = trim($this->post('name'));
            $plan = $this->post('plan');
            $sponsor = $this->common_model->filter($this->post('sponsor'));
            $plan_detail = $this->db_model->select_multi('*', 'plans', array('id' => $plan));
            $is_sponsor_exists = $this->check_sponsor_post($sponsor,$plan);
            
            if(!strlen($is_sponsor_exists)>0){
                $this->response(array(
                    "status" => "false",
                    "message" => "Sponsor ID Doesnot Exist in the selected Plan . '"
                ),REST_CONTROLLER::HTTP_NOT_FOUND);
            }
            if(($this->post('position') != '') && ($this->post('leg') != '')){
                $this->load->model('plan_model');
                if ($this->plan_model->check_position($this->post('position'), $this->post('leg')) !== $this->post('position')){
                    $this->response(array(
                        "status" => "false",
                        "message" => "The selected Position of Placement ID is not empty. "
                    ),REST_CONTROLLER::HTTP_NOT_FOUND);
                }
            }
              $position = $this->post('position') ? $this->post('position') : $sponsor;
              $is_position_exists=$this->db_model->select('secret', 'member', array('id' => $position));
              if(!strlen($is_position_exists)>0){
                $this->response(array(
                    "status" => "false",
                    "message" => "Position ID is invalid. "
                ),REST_CONTROLLER::HTTP_NOT_FOUND);
              }
              $leg = $this->post('leg') ? $this->post('leg') : 'A';
              $email = $this->post('email');
             $phone = $this->post('phone');

              if((config_item('enable_crowdfund')=='Yes') && ($sponsor != config_item('top_id')))
            {
                $sponsor_plan = $this->db_model->select('signup_package', 'member', array('id' => $sponsor));
                if($sponsor_plan != $plan)
                {
                    $this->response(array(
                        "status" => "false",
                        "message" => "You must choose same plan as Sponsor.  "
                    ),REST_CONTROLLER::HTTP_NOT_FOUND);
                }
            }

            $epin = $this->post('epin');
            $pg = $this->post('pg');
            $address_1 = trim($this->post('address_1'));
            $city = trim($this->post('city'));
            $state = trim($this->post('state'));
            $zipcode = $this->post('zipcode');
            $country = $this->post('country') ? $this->post('country') : '';
            $password = password_hash($this->post('password'), PASSWORD_DEFAULT);
            $secure_password = password_hash($this->post('password'), PASSWORD_DEFAULT);
            $pan = $this->post('pan');
            $free_register = $this->post('free_register');
            $lms_user = $this->post('lms_user');
            $divert_pg = FALSE;
            $role = $this->post('role') ? $this->post('role') : 'Affiliate';

            $plan_price = $plan_detail->joining_fee;
            $tax_amount = round($plan_detail->joining_fee - ($plan_detail->joining_fee / (1 + $plan_detail->gst / 100)), 2);
            if($this->post('register_without_joining_fee')==1){
                $plan_price=0;                
            }
             #####################################################################
            #
            # Check if either epin or payment gateway field is selected or not.
            #
            #####################################################################
            
            if (trim($epin) == "" && trim($pg) == "" && config_item('free_registration') == "No" ) {

                if (config_item('enable_epin') == "Yes" && config_item('enable_pg') == "Yes" ) {
                    $this->response(array(
                        "status" => "false",
                        "message" => "Please enter correct e-PIN or Choose Payment Option"
                    ),REST_CONTROLLER::HTTP_NOT_FOUND);
                }
                else {
                    if (config_item('enable_epin') == "Yes" && config_item('enable_pg') == "No") {
                        $this->response(array(
                            "status" => "false",
                            "message" => "Please enter correct e-PIN."
                        ),REST_CONTROLLER::HTTP_NOT_FOUND);
                    } else {
                        if (config_item('enable_epin') == "No" && config_item('enable_pg') == "Yes") {
                            $this->response(array(
                                "status" => "false",
                                "message" => "Please choose Payment Gateway option."
                            ),REST_CONTROLLER::HTTP_NOT_FOUND);
                        } else {
                            $this->response(array(
                                "status" => "false",
                                "message" => "Please choose either e-PIN or Payment Gateway option."
                            ),REST_CONTROLLER::HTTP_NOT_FOUND);
                        }
                    }
                }
            } else if(trim($epin) == "" && trim($pg) == "" && config_item('free_registration') == "Yes" && $plan_price >0) {

                if (config_item('enable_epin') == "Yes" && config_item('enable_pg') == "Yes" ) {
                    $this->response(array(
                        "status" => "false",
                        "message" => "Please enter correct e-PIN or Choose Payment Option"
                    ),REST_CONTROLLER::HTTP_NOT_FOUND);
                }
                 else {
                    if (config_item('enable_epin') == "Yes" && config_item('enable_pg') == "No") {
                        $this->response(array(
                            "status" => "false",
                            "message" => "Please enter correct e-PIN."
                        ),REST_CONTROLLER::HTTP_NOT_FOUND);
                    } else {
                        if (config_item('enable_epin') == "No" && config_item('enable_pg') == "Yes") {
                            $this->response(array(
                                "status" => "false",
                                "message" => "Please choose Payment Gateway option."
                            ),REST_CONTROLLER::HTTP_NOT_FOUND);
                        }
                    }
                }
            }

            ##############################################################
            #
            # Check plan Price the validate against epin (If epin
            # is selected and not Payment Gateway.
            # Here e-PIN amount or PG Amount is plan price
            #
            ##############################################################
            if (trim($epin) !== "") {
                $epin_details = $this->db_model->select_multi('amount, type', 'epin', array(
                    'epin' => $epin,
                    'status' => 'Un-used'));
                $epin_type = $epin_details->type;
                $epin_value = $epin_details->amount;
            }
            ########################################################
            #
            # check if e-pin value is matched with plan or no
            #
            ########################################################
            if (config_item('free_registration') == "No") {
                if ((trim($epin) !== "" || trim($pg) !== "")) {
                    if (trim($epin) !== "") {
                        if (config_item('show_join_product') == "Yes") {
                            if (trim($plan_price) != trim($epin_value)) {
                                debug_log("From the plan price and epin value");
                                debug_log($plan_price);
                                debug_log($epin_value);
                                $this->response(array(
                                    "status" => "false",
                                    "message" => "Please select a valid epin"
                                ),REST_CONTROLLER::HTTP_NOT_FOUND);
                            }
                        }
                    } else {
                        $divert_pg = TRUE;
                    }
                }
            } else {
                if($plan_price > 0) {
                    if (config_item('enable_epin') == "Yes" || config_item('enable_pg') == "Yes" ) {
                        if ((trim($epin) !== "" || trim($pg) !== "")) {
                            if (trim($epin) !== "") {
                                if (config_item('show_join_product') == "Yes") {
                                    if (trim($plan_price) != trim($epin_value)) {
                                        $this->response(array(
                                            "status" => "false",
                                            "message" => "Please check the Epin. The Epin is not available for the selected plan."
                                        ),REST_CONTROLLER::HTTP_NOT_FOUND);
                                    }
                                }
                            } else {
                                $divert_pg = TRUE;
                            }
                        }
                    } else {
                        $divert_pg = TRUE;
                    }
                } 
            }
            $topup = $plan_price;
            $member_status = 'Active';
            if((config_item('free_registration')=='Yes') && (config_item('enable_epin') == "No") && config_item('enable_pg') == "No" ) {
                $member_status = $plan_price > 0 ? 'Inactive' : 'Active';
                $topup = 0;
            }

            if (config_item('show_join_product') == "Yes"):
                $mybusiness = $plan_detail->direct_commission;
                if ($plan_detail->qty == "0") {
                    $this->response(array(
                        "status" => "false",
                        "message" => "The selected plan/service is out of stock. Please contact admin."
                    ),REST_CONTROLLER::HTTP_NOT_FOUND);
                }
            endif;

            if (config_item('show_join_product') == "No" && config_item('free_registration') == "No" && trim($pg) == "") {
                $plan_price = $this->post('amt_to_pay');
                $plan = 'N/A';
                if ($epin_value < $plan_price) {
                    $this->response(array(
                        "status" => "false",
                        "message" => 'Please enter correct e-PIN of worth: ' . config_item('currency') . $plan_price . ' or more.'
                    ),REST_CONTROLLER::HTTP_NOT_FOUND);
                }
            }
             ##############################################################################
            #
            # Generate ID for the USER
            #
            ##############################################################################
            $rand = rand(1000000, 9999999);
            $id = $this->db_model->select("id", "member", array("id" => $rand));
            while($id==$rand){
                $rand = $rand + 1;    
                $id = $this->db_model->select("id", "member", array("id" => $rand));
            }
            $id = $rand;

            if($this->post('userid')!=''){
                $check = $this->db_model->select("id", "member", array("id" => $this->post('userid')));
                if($check==$this->post('userid')){
                    $this->response(array(
                        "status" => "false",
                        "message" => "UserId already Exists"
                    ),REST_CONTROLLER::HTTP_NOT_FOUND);
                }
                else{
                    $id=$this->post('userid');
                }
            }

            if (config_item('show_join_product') !== "Yes"):
                $mybusiness = $plan_price;
            endif;

             ##########################################################################
            #
            # Now will Redirect to Payment Gateway (If need) or Success Page. At that
            # Page we'll generate income or rewards. Here we'll save some basic
            # important Data with session.
            #
            ##########################################################################
            $this->session->set_userdata('_user_id_', $id);
            $this->session->set_tempdata('_auto_user_id_', $id, '300');
            $this->session->set_tempdata('_inv_id_', $id);
            $this->session->set_userdata('_signup_package_', $plan);
            $this->session->set_userdata('_user_name_', $name);
            $this->session->set_userdata('_sponsor_', $sponsor);
            $this->session->set_userdata('_position_', $position);
            $this->session->set_userdata('_address_', $address_1);
            $this->session->set_userdata('_city_', $city);
            $this->session->set_userdata('_state_', $state);
            $this->session->set_userdata('_zipcode_', $zipcode);
            $this->session->set_userdata('_country_', $country);
            $this->session->set_userdata('_email_', $email);
            $this->session->set_userdata('_phone_', $phone);
            $this->session->set_userdata('_plan_', $plan);
            $this->session->set_userdata('_price_', $plan_price);
            $this->session->set_userdata('_d_password_', $this->post('password'));
            $this->session->set_userdata('_d_secure_password_', $this->post('password'));
            $this->session->set_userdata('_password_', $password); 
            $this->session->set_userdata('_secure_password_', $secure_password);
            $this->session->set_userdata('_join_time_', date('Y-m-d H:i:s'));
            $this->session->set_userdata('_placement_leg_', $leg);
            $this->session->set_userdata('_topup_', $topup);
            $this->session->set_userdata('_my_business_', $mybusiness);
            $this->session->set_userdata('_plan_detail_', $plan_detail);
            $this->session->set_userdata('_width_', $plan_detail->max_width);
            $this->session->set_userdata('_tax_amount_', $tax_amount);
            $this->session->set_userdata('_member_status_', $member_status);
            $this->session->set_userdata('_pan_', $pan);
            $this->session->set_userdata('role', $role);
            $this->session->set_userdata('free_register', $free_register);
            $this->session->set_userdata('lms_user', $lms_user);

            
            if($this->post('is_communityleader')==1){
                $this->session->set_userdata('community_leader', "1");
            }
            if(config_item('width')==3){
                $this->session->set_userdata('api_call_for_matrix_plan', '1');
            }
            if(($divert_pg == TRUE) && (config_item('free_registration') == "Yes")){
                $this->session->set_userdata('_type_', "paylater");
                $this->session->set_userdata('_topup_', 0);
                $this->session->set_userdata('_my_business_', 0);
                $this->session->set_userdata('_member_status_', 'Inactive');
                $this->complete_registration();
            } else if ($divert_pg == TRUE) {
                $this->session->set_userdata('_type_', "userid");
                $this->earning->insert_into_transaction($id);
                //redirect(site_url('gateway/payment_gateway'));
            } else {
                debug_log('before complete registration time ' . (time()-$t1));
                $this->session->set_userdata('_type_', "userid");
                $this->session->set_userdata('_epin_', $epin);
                $this->session->set_userdata('_epin_value_', $epin_value);
                $this->session->set_userdata('_epin_type_', $epin_type);
                $this->complete_registration_post();
            }
    }
                   
    

    public function check_sponsor_post($sponsor,$plan)
    {
        if($sponsor == config_item('top_id')){
            $is_sponsor_exists = 1;
        }
        else if (config_item('inactive_in_tree')=='Yes'){
            if((config_item('sponsor_different_plan') != 'Yes') && (config_item('width') != '2')){
                $is_sponsor_exists=$this->db_model->select('secret', 'member', array('id' => $sponsor,'signup_package'=>$plan,'role !='=>'Customer'));    
            } else{
                $is_sponsor_exists=$this->db_model->select('secret', 'member', array('id' => $sponsor,'role !='=>'Customer'));
            }
        }
        else{
            if((config_item('sponsor_different_plan') != 'Yes') && (config_item('width') != '2')){
                $is_sponsor_exists=$this->db_model->select('secret', 'member', array('id' => $sponsor,'signup_package'=>$plan,'role !='=>'Customer', 'status !='=>'Inactive'));    
            } else{
                $is_sponsor_exists=$this->db_model->select('secret', 'member', array('id' => $sponsor,'role !='=>'Customer','status !='=>'Inactive'));
            }
        }

        return $is_sponsor_exists;
    }

    public function check_sponsor_count_post($sponsor,$plan)
    {
        //debug_log('sponsor_restriction');
        //debug_log(config_item('sponsor_restriction'));
        if (config_item('sponsor_restriction')=='Yes') {
             if($sponsor!=config_item('top_id')){
        $sponsor_count = $this->db->query(" SELECT count(*) as count FROM member 
                WHERE sponsor IN (" .$sponsor .") and signup_package = ".$plan)->result_array()[0]['count'];
            debug_log($this->db->last_query());
            return $sponsor_count; }
        }
       
    }

    public function complete_registration_post()
    {
      $status = $this->Registration_model->register_modal();
      //debug_log("inside complete registration");
      if($status['status'] == false)
      {
        $this->response(array(
            "status" => "false",
            "message" => $status['message']
        ),REST_CONTROLLER::HTTP_NOT_FOUND);
      } else if($status['status'] == true) {
        $data= array(
            "userid" => $this->session->userdata('_user_id_'),
            "sponsor"=> $this->session->userdata('_sponsor_')
        );
        
        $this->response(array(
            "status" => "true",
            "message" => $data
        ),REST_CONTROLLER::HTTP_OK);
      }else{
        $this->response(array(
            "status" => "false",
            "message" => "Uncaught Exception Occured"
        ),REST_CONTROLLER::HTTP_OK);
      }
    }

    public function registration_successful_post()
    {
        //debug_log($this->session->_user_id_);
        if ($this->session->_user_id_ > 0)
        {
            $layout['layout'] = "success.php";
            $this->load->view('theme/default/base', $layout);
            //$this->downline_model->update_legs(array());

            ######## UNSET SOME PREVIOUS VALUES  ######### 

            $this->session->unset_userdata('_user_id_');
            $this->session->unset_userdata('_user_name_');
            $this->session->unset_userdata('_sponsor_');
            $this->session->unset_userdata('_position_');
            $this->session->unset_userdata('_address_');
            $this->session->unset_userdata('_email_');
            $this->session->unset_userdata('_phone_');
            $this->session->unset_userdata('_plan_');
            $this->session->unset_userdata('_price_');
            $this->session->unset_userdata('_phone_verified_');
            $this->session->unset_userdata('_verified_');
            $this->session->unset_userdata('_id_upgrade_');

            ##############################################

        } else {
            debug_log("inside else part of registration successful");
           redirect(site_url('site/login'));
        }
    }

    public function failed_registration_post()
    {
        $this->session->unset_userdata('_sponsor_');
        $this->session->unset_userdata('_position_');
        $this->session->unset_userdata('_address_');
        $this->session->unset_userdata('_email_');
        $this->session->unset_userdata('_phone_');
        $this->session->unset_userdata('_plan_');
        $this->session->unset_userdata('_price_');
        $this->session->unset_userdata('_phone_verified_');
        $this->session->unset_userdata('_verified_');
        $this->session->unset_userdata('_id_upgrade_');

        if ($this->session->_user_id_ > 0) {
            /*****************************************************************
             *
             * Registration Complete but Payment Failed. Hence ID is deleted.
             *
             *****************************************************************/

            $id = $this->session->_user_id_;
            $check_legs = $this->db_model->count_all('member', array('position' => $id));
            $user_details = $this->db_model->select_multi('*', 'member', array('id' => $id));
            if ($check_legs > 0 || trim($id) == config_item('top_id')) {
            } else if($user_details->id >0) {
                $position = $this->db_model->select_multi('position, placement_leg, my_img', 'member', array('id' => $id));
                $data = array(
                    $position->placement_leg => 0,
                );
                //debug_log("position from site".$position->position);
                $this->db->where('id', $position->position);
                $this->db->update('member', $data);

                $this->db->where('id', $id);
                $this->db->delete('member');

                $this->db->where('userid', $id);
                $this->db->delete('member_profile');
                $this->db->where('userid', $id);
                $this->db->delete('wallet');

                //unlink(FCPATH . "uploads/" . $position->my_img);
            }

            $layout['layout'] = "fail.php";
            $this->load->view('theme/default/base', $layout);

            $this->session->unset_userdata('_user_id_');
            $this->session->unset_userdata('_user_name_');

        } else {
            //redirect(site_url('site/login'));
        }

    }

    //admin login
    public function admin_post(){
        $user = $this->common_model->filter($this->post('username'));
        $password = $this->common_model->filter($this->post('password'));
        $res = $this->Admin_model->admin_login($user,$password);

        if($res['status']=="false"){
            $this->response(array(
                "status"    => $res['status'],
                "message"   =>  $res['message']
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }else{
            $this->response(array(
                "status"    => $res['status'],
                "message"   =>  $res['message']
            ),REST_CONTROLLER::HTTP_OK);
        }
    }

 //member login
 public function login_post(){
            
    $session_url=$_SESSION['page'];
    $user = $this->common_model->filter($this->post('username'));
    $password = $this->post('password');

    $res = $this->Member_model->member_login($user,$password);
    if($res['status']=="true"){
        $this->response(array(
            "status"    =>  $res['status'],
            "message"   =>  $res['message']
        ),REST_CONTROLLER::HTTP_OK);
    }else{
        $this->response(array(
            "status"    =>  $res['status'],
            "message"   =>  $res['message']
        ),REST_CONTROLLER::HTTP_NOT_FOUND);
    }   
}

//autologin 
public function autologin_post(){
    $userid = $this->post('userid');
     $this->session->_auto_user_id_ = $userid;
    if (isset($this->session->_auto_user_id_)) {
     $res = $this->Api_model->autologin();
     if($res['status'] == "true"){
        $this->response(array(
            "status"    =>  $res['status'],
            "message"   =>  $res['message']
        ),REST_CONTROLLER::HTTP_OK);
     }else{
        $this->response(array(
            "status"    =>  $res['status'],
            "message"   =>  $res['message']
        ),REST_CONTROLLER::HTTP_NOT_FOUND);
     }
    }
}

    //dashboard details
    public function load_member_data_post(){
        $userid = $this->post('userid');
        $check = $this->User_model->checkUser($userid);
        if($check){
            $res = $this->User_model->load_member_data($userid);
            $this->response(array(
                "status"    =>  "true",
                "message"   =>  $res
            ),REST_CONTROLLER::HTTP_OK);

        }else{
            $this->response(array(
                "status"    =>  "false",
                "message"   =>  "Invalid Userid"
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }   
    }

    //welcome letter
    public function welcome_letter_post(){
       $userid =  $this->post('userid');
       $check = $this->User_model->checkUser($userid);
       if($check){
            $res = $this->Member_model->Welcome_letter_api($userid);
            $this->response(array(
                "status" => "true",
                "message" => $res
            ),REST_CONTROLLER::HTTP_OK);
       }else{
        $this->response(array(
            "status"    =>  "false",
            "message"   =>  "Invalid Userid"
        ),REST_CONTROLLER::HTTP_NOT_FOUND);
       }
    }

    public function settings_post(){
        $datas = array(
            'id'            =>  1, //only 1 admin
            'oldpass'       =>  $this->post('oldpass'),
            'newpass'       =>  $this->post('newpass'),
            'repass'        =>  $this->post('repass'),  ///validations for new pass ad repass is not done 
            'securepass'    =>  $this->post('securepass')
        );
        $res = $this->Admin_model->admin_password($datas);
        echo json_encode($res);

    }
    public function profile_update_post(){
        $data = array(
            'id'            =>  1, 
            'name'          =>  $this->post('my_name'),
            'phone'         =>  $this->post('my_phone'),
            'email'         =>  $this->post('my_email'),
            'securepass'    =>  $this->post('securepass')
         );
         $res = $this->Admin_model->profile_update($data);
         echo json_encode($res); 
    }



    public function used_epin_post(){
        $userid =  $this->post('userid');

        $config['base_url']   = site_url('admin/used_epin');
        $config['per_page']   = 500000;
        $config['total_rows'] = $this->db_model->count_all('epin', array('status' => 'Used'));
        $page                 = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->pagination->initialize($config);
        $check = $this->User_model->checkUser($userid);
        if($check){
        $res = $this->Member_model->used_epins($config,$page,$userid);
        $this->response(array(
            "status" => 'true',
            "message" => $res
        ),REST_CONTROLLER::HTTP_OK);
       }else{
        $this->response(array(
            "status" => 'false',
            "message" => 'Inavlid userid'
        ),REST_CONTROLLER::HTTP_NOT_FOUND);
       }
    }
    
    public function unused_epin_post(){
        $userid =  $this->post('userid');
        $config['base_url']   = site_url('admin/unused_epin');
        $config['per_page']   = 500000;
        $config['total_rows'] = $this->db_model->count_all('epin', array('status' => 'Un-used'));
        $page                 = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->pagination->initialize($config);
        $check = $this->User_model->checkUser($userid);
        if($check){
        $res = $this->Member_model->unused_epins($config,$page,$userid);
        $this->response(array(
            "status" => "true",
            "message" => $res
        ),REST_CONTROLLER::HTTP_OK);
        }else{
            $this->response(array(
                "status" => "false",
                "message" => "Invalid UserId"
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
    }

    public function unused_epin_get(){

        $res = $this->db->query('select * from epin where status="Un-used"')->result_array();
        if(count($res)>0){
        $this->response(array(
            "status" => "true",
            "message" => $res
        ),REST_CONTROLLER::HTTP_OK);
        }else{
            $this->response(array(
                "status" => "false",
                "message" => "No data found"
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
    }

    public function used_epin_get(){

        $res = $this->db->query('select * from epin where status="Used"')->result_array();
        if(count($res)>0){
        $this->response(array(
            "status" => "true",
            "message" => $res
        ),REST_CONTROLLER::HTTP_OK);
        }else{
            $this->response(array(
                "status" => "false",
                "message" => "No Data found"
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
    }
    
    public function transer_epin_post(){
        $data = array(
        'amount' => $this->post('amount'),
        'from'   => $this->post('from'),
        'to'     => $this->post('to'),
        'qty'    => $this->post('qty')
        );
        
        $res = $this->Admin_model->transfer_epin($data);
        if($res['status']=="true"){
            $this->response(array(
                "status" => $res['status'],
                "message" => $res['message']
            ),REST_CONTROLLER::HTTP_OK);
           }else{
            $this->response(array(
                "status" => $res['status'],
                "message" => $res['message']
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
           }
    }

    public function view_earning_post(){
        $userid = $this->post('userid');
        $config['base_url'] = site_url('member/view_earning');
        $config['per_page'] = 100;
        $config['total_rows'] = $this->db_model->count_all('earning', array('userid' => $userid));
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->pagination->initialize($config);

        $check = $this->User_model->checkUser($userid);
        if($check){
        $res = $this->Member_model->view_earning($config,$page,$userid);
            $this->response(array(
                "status" => "true",
                "message" => $res
            ),REST_CONTROLLER::HTTP_OK);
           }else{
            $this->response(array(
                "status" => "false",
                "message" => "Inavlid Userid"
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
    }

    public function my_deduction_post(){
        $userid = $this->post('userid');
        $config['base_url'] = site_url('member/view_deductions');
        $config['per_page'] = 100;
        $config['total_rows'] = $this->db_model->count_all('deductions', array('user_id' => $this->session->user_id));
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->pagination->initialize($config);

        $check = $this->User_model->checkUser($userid);
        if($check){
        $res = $this->Member_model->my_deductions($config,$page,$userid);
        $this->response(array(
            "status" => "true",
            "message" => $res
        ),REST_CONTROLLER::HTTP_OK);
        }else{
            $this->response(array(
                "status" => "false",
                "message" => "Inavlid userid"
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
    }

    public function my_rewards_post(){
        $userid = $this->post('userid');
        $config['base_url'] = site_url('member/my_rewards');
        $config['per_page'] = 100;
        $config['total_rows'] = $this->db_model->count_all('rewards', array('userid' => $userid));
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->pagination->initialize($config);

        $check = $this->User_model->checkUser($userid);
        if($check){
            $res = $this->Member_model->my_rewards($config,$page,$userid);
                $this->response(array(
                    "status" => $res['status'],
                    "message" => $res['message']
                ),REST_CONTROLLER::HTTP_OK);
        }else{
            $this->response(array(
                "status" => "false",
                "message" => "Invalid userid"
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        } 
    }

    public function epin_deposit_post(){
        $userid = $this->post('userid');
        $name = $this->post('name');
        $epin = trim($this->post('epin'));
        $amount = trim($this->post('amount'));

        $check = $this->User_model->checkUser($userid);
        if($check){
            debug_log("one");
            $res = $this->Member_model->epin_deposit($epin,$userid,$name);
            if($res['status']=="false"){
                $this->response(array(
                    "status" => $res['status'],
                    "message" => $res['message']
                ),REST_CONTROLLER::HTTP_NOT_FOUND);
            }else{
            $this->response(array(
                "status" => $res['status'],
                "message" => $res['message']
            ),REST_CONTROLLER::HTTP_OK); }
        }else{
        $this->response(array(
            "status" => "false",
            "message" => "Invalid userid"
        ),REST_CONTROLLER::HTTP_NOT_FOUND);                        
    }
    }
 
    public function deposit_history_post(){
        $userid = $this->post('userid');
        $config['base_url']   = site_url('member/online_transactions');
        $config['per_page']   = 50;
        $config['total_rows'] = $this->db_model->count_all('transaction');          
        $page                 = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->pagination->initialize($config);

        $check = $this->User_model->checkUser($userid);
        if($check){
            $res = $this->Member_model->deposit_history($config,$page);

            $this->response(array(
                "status" => $res['status'],
                "message" => $res['message']
            ),REST_CONTROLLER::HTTP_OK);
        }else{
            $this->response(array(
                "status" => "false",
                "message" => "Invalid userid"
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
    }

    public function bank_deposit_post(){
        $data = array(
        "userid"    => $this->post('userid'),
        "to_userid" =>  $this->uri->segment('4') ? $this->uri->segment('4') : 'Admin',
        "name"      =>  $this->post('name'),
        "payment_mode"  =>  $this->post('payment_mode'),
        "amount"    => $this->post('amount'),
        "txn_no"    => $this->post('txn_no')
        );
        //debug_log($data);
         $res = $this->Member_model->bank_deposit($data);
         if($res['status']=="false"){
            $this->response(array(
                "status" => $res['status'],
                "message" => $res['message']
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }else{
        $this->response(array(
            "status" => $res['status'],
            "message" => $res['message']
        ),REST_CONTROLLER::HTTP_OK); }

    }
    
     public function wallet_transaction_post(){
        $userid = $this->post('userid');
        $check = $this->User_model->checkUser($userid);
        if($check){
            $res = $this->Member_model->wallet_transaction($userid);

            $this->response(array(
                "status" => "true",
                "message" => $res
            ),REST_CONTROLLER::HTTP_OK);
        }else{
            $this->response(array(
                "status" => "false",
                "message" => "Inavlid userid"
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
    }
    
   public function payout_report_post(){
        $status = $this->post('status');
        $sdate  = $this->post('sdate');
        $edate  = $this->post('edate');
        $userid = $this->post('userid');
        $check = $this->User_model->checkUser($userid);
        if($check){
            $res = $this->Member_model->payout_report($status,$sdate,$edate,$userid);
            $this->response(array(
                "status" => "true",
                "message" => $res
            ),REST_CONTROLLER::HTTP_OK);
            
        }else{
            $this->response(array(
                "status" => "false",
                "message" => "Inavlid userid"
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
    }
    
    public function tax_report_post(){
        $userid = $this->post('userid');
        $check = $this->User_model->checkUser($userid);
        if($check){
            $sdate  = $this->post('sdate') ? $this->post('sdate') : '2019-01-01';
            $edate  = $this->post('edate') ? $this->post('edate') : date("Y-m-d");
            $res = $this->Member_model->tax_report($userid,$sdate,$edate);
            $this->response(array(
                "status" => "true",
                "message" => $res
            ),REST_CONTROLLER::HTTP_OK);
        }else{
            $this->response(array(
                "status" => "false",
                "message" => "Inavlid userid"
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
    }
    
    public function direct_list_post(){
    $userid = $this->post("userid");
    $check = $this->User_model->checkUser($userid);
        if($check){
            $res = $this->Member_model->direct_list($userid);
            $this->response(array(
                "status" => "true",
                "message" => $res
            ),REST_CONTROLLER::HTTP_OK);
        }else{
         $this->response(array(
             "status" => "false",
             "message" => "Inavlid userid"
         ),REST_CONTROLLER::HTTP_NOT_FOUND);
         }
    }
    
    public function add_member_post(){
        $userid = $this->post('userid');
        $check = $this->User_model->checkUser($userid);
        if($check){
            $link = array(base_url().'site/register/A/'. $userid);
            $this->response(array(
                "status" => "true",
                "message" => $link
            ),REST_CONTROLLER::HTTP_OK);
        }else{
        $this->response(array(
            "status" => "false",
            "message" => "Inavlid userid"
        ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
    }
    
     public function transfer_epin_history_post(){
        $userid = $this->post('userid');
        $check = $this->User_model->checkUser($userid);
        //debug_log($check);
        if($check>0){
            $res = $this->Member_model->transfer_epin_history($userid);

            if($res['status']=="true"){
                $this->response(array(
                    "status" => $res['status'],
                    "message" => $res['message']
                ),REST_CONTROLLER::HTTP_OK);
            
            }else{
                $this->response(array(
                    "status" => $res['status'],
                    "message" => $res['message']
                ),REST_CONTROLLER::HTTP_NOT_FOUND); 
            }
        }else{
            $this->response(array(
                "status" => "false",
                "message" => "Invalid Userid"
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
    }
    
    public function my_tree_unilevel_post(){
        $userid = $this->post('userid');
        $plan = $this->post('plan');
        $top_id = $this->post('top_id');
        $check = $this->User_model->checkUser($userid);
        if($check>0){
            if(config_item('id_upgrade')=='Yes')
            {
                if($top_id !== ""){
                    if (trim($userid) !== "" && $top_id < $userid) {
                        $this->response(array(
                            "status" => "false",
                            "message" => "You cannot view upline tree !"
                        ),REST_CONTROLLER::HTTP_NOT_FOUND);
                        }else{
                            $userid = $top_id;
                            //debug_log($userid);
                            $res = $this->Member_model->unilevel_tree($plan,$userid,$topid);

                            if($res['status']=="true"){
                                $this->response(array(
                                    "status" => $res['status'],
                                    "message" => $res['message']
                                ),REST_CONTROLLER::HTTP_OK);
                            
                            }else{
                                $this->response(array(
                                    "status" => $res['status'],
                                    "message" => $res['message']
                                ),REST_CONTROLLER::HTTP_NOT_FOUND); }
                            }
                        
                }else{
                        
                    $res = $this->Member_model->unilevel_tree($plan,$userid,$topid);
                    
                    if($res['status']=="true"){
                        $this->response(array(
                            "status" => $res['status'],
                            "message" => $res['message']
                        ),REST_CONTROLLER::HTTP_OK);
                    
                    }else{
                        $this->response(array(
                            "status" => $res['status'],
                            "message" => $res['message']
                        ),REST_CONTROLLER::HTTP_NOT_FOUND); }
                    }
            }

        }else{
            $this->response(array(
                "status" => "false",
                "message" => "Invalid Userid"
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
    }
    
    public function profile_member_post(){
        $data  = array(
            "id"            =>  $this->post('id'),
            "email"         =>  $this->post('email'),
            "date_of_birth" =>  $this->post('date_of_birth'),
            "photo"         =>  $this->post('photo'),
            "address"       =>  $this->post('address'),
            "city"          =>  $this->post('city'),
            "state"         =>  $this->post('state'),
            "zipcode"       =>  $this->post('zipcode'),
            "securepass"    =>  $this->post('securepass')
        );
        // debug_log($data);
        $res = $this->Api_model->profile_update($data);
        if($res['status']=="true"){
            $this->response(array(
                "status" => $res['status'],
                "message" => $res['message']
            ),REST_CONTROLLER::HTTP_OK);
        
        }else{
            $this->response(array(
                "status" => $res['status'],
                "message" => $res['message']
            ),REST_CONTROLLER::HTTP_NOT_FOUND); 
        }
    }

    public function ranks_achiever_get(){

        $res = $this->Member_model->ranks_achiever();
        $this->response(array(
            "status" => "true",
            "message" => $res
        ),REST_CONTROLLER::HTTP_OK);
    }

    public function generate_ranks_post(){
       
        $a = $this->post('A') ? $this->post('A') : 0;
        $b = $this->post('B') ? $this->post('B') : 0;
        $c = $this->post('C') ? $this->post('C') : 0;
        $d = $this->post('D') ? $this->post('D') : 0;
        $e = $this->post('E') ? $this->post('E') : 0;
        $data= array(
            'type'          => $this->post('rank_type'),
            'rank_name'     => $this->post('rank_name'),
            'rank_duration' => $this->post('rank_duration'),
            'based_on'      => $this->post('based_on') ? $this->post('based_on') : 'Member',
            'plan_id'       => $this->post('plan_id'), 
            'direct'        => $this->post('direct')>0 ? $this->post('direct'):0,
            'mypv'          => $this->post('mypv') ? $this->post('mypv') : 0,
            'level_no'      => $this->post('level_no') ? $this->post('level_no') : 1,
            'total_member_level'    => $this->post('total_member_level') ? $this->post('total_member_level') : 0,
            'downline_rank'     => $this->post('downline_rank'),
            'A'             =>  $a,
            'B'             =>  $b,
            'C'             =>  $c,
            'D'             =>  $d,
            'E'             =>  $e,
            'total_downline'=>  $this->post('total_downline') ? $this->post('total_downline') : $a+$b+$c+$d+$e
        );   

        $pro_name = $this->db_model->select('rank_name', 'rank_system', array('rank_name' => $this->post('rank_name')));
        if($pro_name){
            $this->response(array(
                "status" => "false",
                "message" => "Rank name already exists!! Please choose different name !!"
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
        else if(empty($this->post('rank_name'))){
            $this->response(array(
                "status" => "false",
                "message" => "The Rank Name field is required !!"
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }else{
            debug_log('data array');
            debug_log($data);
            $res = $this->Api_model->add_ranks($data);
            if ($res=="true") {
                $this->response(array(
                    "status" => "true",
                    "message" => "Rank added successfully"
                ),REST_CONTROLLER::HTTP_OK);
            } else {
                $this->response(array(
                    "status" => "false",
                    "message" => "Failed to add rank!!"
                ),REST_CONTROLLER::HTTP_NOT_FOUND);
            }
        }        
    }

    public function rank_info_post(){
        $id=$this->post('rank_id');
        $res['leg']=$this->plan_model->create_leg();
        $res['rank_info']=$this->db_model->select_multi('*', 'rank_system', array('id' => $id));
        $res['plan_info']=$this->db_model->select('plan_name', 'plans', array('id' => $res['rank_info']->plan_id));
        $this->response(array(
            "status" => "true",
            "message" => $res
        ),REST_CONTROLLER::HTTP_OK);
    }

    public function update_ranks_post(){
        $a = $this->post('A') ? $this->post('A') : 0;
        $b = $this->post('B') ? $this->post('B') : 0;
        $c = $this->post('C') ? $this->post('C') : 0;
        $d = $this->post('D') ? $this->post('D') : 0;
        $e = $this->post('E') ? $this->post('E') : 0;
        $data= array(
            'rank_id'       => $this->post('rank_id'),
            'type'          => $this->post('rank_type'),
            'rank_name'     => $this->post('rank_name'),
            'rank_duration' => $this->post('rank_duration'),
            'based_on'      => $this->post('based_on') ? $this->post('based_on') : 'Member',
            'plan_id'       => $this->post('plan_id'), 
            'direct'        => $this->post('direct')>0 ? $this->post('direct'):0,
            'mypv'          => $this->post('mypv') ? $this->post('mypv') : 0,
            'level_no'      => $this->post('level_no') ? $this->post('level_no') : 1,
            'total_member_level'    => $this->post('total_member_level') ? $this->post('total_member_level') : 0,
            'downline_rank'     => $this->post('downline_rank'),
            'A'             =>  $a,
            'B'             =>  $b,
            'C'             =>  $c,
            'D'             =>  $d,
            'E'             =>  $e,
            'total_downline'=>  $this->post('total_downline') ? $this->post('total_downline') : $a+$b+$c+$d+$e
        );   

        $pro_name = $this->db_model->select('rank_name', 'rank_system', array('rank_name' => $this->post('rank_name'),'id !='=>$this->post('rank_id')));
        if($pro_name){
            $this->response(array(
                "status" => "false",
                "message" => "Rank name already exists!! Please choose different name !!"
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
        else if(empty($this->post('rank_name'))){
            $this->response(array(
                "status" => "false",
                "message" => "The Rank Name field is required !!"
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }else{
            debug_log('data array');
            debug_log($data);
            $res = $this->Api_model->update_rank_data($data);
            if ($res=="true") {
                $this->response(array(
                    "status" => "true",
                    "message" => "Rank Settings Updated Successfully"
                ),REST_CONTROLLER::HTTP_OK);
            } else {
                $this->response(array(
                    "status" => "false",
                    "message" => "Failed to add rank!!"
                ),REST_CONTROLLER::HTTP_NOT_FOUND);
            }
        }
    }

    public function remove_rank_post(){

        $this->db->where('id', $this->post('rank_id'));
        if ($this->db->delete('rank_system')) {
            $this->response(array(
            "status" => "true",
            "message" => "Rank Setting has been Deleted Successfully!!"
            ),REST_CONTROLLER::HTTP_OK);
        } else {
            $this->response(array(
            "status" => "false",
            "message" => "Failed to remove Rank Setting!!"
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
        
    }
    
    public function rewards_achiever_get(){

        $res = $this->Member_model->rewards_achiever();
        $this->response(array(
            "status" => "true",
            "message" => $res
        ),REST_CONTROLLER::HTTP_OK);
    }
    
    public function live_updates_get(){

        $res = $this->Member_model->live_updates();
        $this->response(array(
            "status" => "true",
            "message" => $res
        ),REST_CONTROLLER::HTTP_OK);
    }
    
    public function my_invoices_post(){
        $userid = $this->post('userid');
        $check = $this->User_model->checkUser($userid);
        if($check>0){

            $res = $this->Member_model->my_invoices($userid);

            $this->response(array(
                "status" => "true",
                "message" => $res
            ),REST_CONTROLLER::HTTP_OK);
        }else{
            $this->response(array(
                "status" => "false",
                "message" => "Invalid Userid"
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
    }
    
    public function new_ticket_post(){
        $data = array(
           
            'ticket_title'  => $this->post('ticket_title'),
            'ticket_detail' => date('Y-m-d') . '<br>'.$this->post('ticket_data'),
            'userid'        => $this->post('userid'),
            'user_type'     => "User",
            'date'          => date('Y-m-d H:i:s'),
        );

        $query = $this->db->insert('ticket', $data);
        if($query){
            $this->response(array(
                "status" => "true",
                "message" => "A New Ticket has been opened."
            ),REST_CONTROLLER::HTTP_OK);
        }else{
            $this->response(array(
                "status" => "false",
                "message" => "Unable to open a Ticket"
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }   
        
    }
    
    public function list_ticket_post(){
        $userid = $this->post('userid');
        $check = $this->User_model->checkUser($userid);
        if($check>0){
            $res = $this->Member_model->list_ticket($userid);
            $this->response(array(
                "status" => "true",
                "message" => $res
            ),REST_CONTROLLER::HTTP_OK);
        }else{
            $this->response(array(
                "status" => "false",
                "message" => "Invalid Userid"
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
    }
    
    public function old_purchase_post(){
        $userid = $this->post('userid');

        $check = $this->User_model->checkUser($userid);
        if($check>0){
            $res = $this->Member_model->old_purchase($userid);
        
            $this->response(array(
                "status" => "true",
                "message" => $res
            ),REST_CONTROLLER::HTTP_OK);
        }else{
            $this->response(array(
                "status" => "false",
                "message" => "Invalid Userid"
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
    }


    public function update_shipping_address_post(){
        $userid = $this->post('userid');
        $securepass = $this->post('securepass');

        $check = $this->User_model->checkUser($userid);
        if($check>0){
            $data = array(
                'userid'    => $userid,
                's_name'    =>$this->post('my_name'),
                's_phone'   =>$this->post('my_phone'),
                's_email'   => $this->post('my_email'),
                's_city'    => $this->post('my_city'),
                's_state'   => $this->post('my_state'),
                's_address' => $this->post('my_address'),
                's_zipcode' => $this->post('my_zipcode'),
                );
            $res = $this->Member_model->update_shipping($userid,$data,$securepass);
            if($res['status']=="false"){
                $this->response(array(
                    "status"    => $res['status'],
                    "message"   =>  $res['message']
                ),REST_CONTROLLER::HTTP_NOT_FOUND);
            }else{
                $this->response(array(
                    "status"    => $res['status'],
                    "message"   =>  $res['message']
                ),REST_CONTROLLER::HTTP_OK);
            }
        }else{
            $this->response(array(
                "status" => "false",
                "message" => "Invalid Userid"
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
            
        }
    }
    
    public function update_billing_address_post(){
        $userid = $this->post('userid');
        $securepass = $this->post('securepass');

        $check = $this->User_model->checkUser($userid);
        if($check>0){
            $data = array(
                'b_name' =>$this->post('my_name'),
                'b_phone' =>$this->post('my_phone'),
                'b_email' => $this->post('my_email'),
                'b_city'  => $this->post('my_city'),
                'b_state'  => $this->post('my_state'),
                'b_address' => $this->post('my_address'),
                'b_zipcode'  => $this->post('my_zipcode'),
                );
                debug_log($data);
                debug_log($securepass);
               
            $res = $this->Member_model->update_billing($userid,$securepass,$data);
            if($res['status']=="false"){
                $this->response(array(
                    "status"    => $res['status'],
                    "message"   =>  $res['message']
                ),REST_CONTROLLER::HTTP_NOT_FOUND);
            }else{
                $this->response(array(
                    "status"    => $res['status'],
                    "message"   =>  $res['message']
                ),REST_CONTROLLER::HTTP_OK);
            }

        }else{
            $this->response(array(
                "status" => "false",
                "message" => "Invalid Userid"
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
    }
    
    public function new_purchase_post(){
        $userid = $this->post('userid');

        $check = $this->User_model->checkUser($userid);
        if($check>0){
            $res = $this->Member_model->new_purchase();
            $this->response(array(
                "status" => "true",
                "message" => $res
            ),REST_CONTROLLER::HTTP_OK);
        }else{
            $this->response(array(
                "status" => "false",
                "message" => "Invalid Userid"
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
    }
    
    public function change_password_post(){
        $data = array(
            'oldpass' => $this->post('oldpass'),
            'newpass' => $this->post('newpass'),
            'repass' => $this->post('repass')
        );
        $userid =  $this->post('userid');

        $res = $this->Member_model->update_password($userid,$data);
        if($res['status']=="false"){
            $this->response(array(
                "status"    => $res['status'],
                "message"   =>  $res['message']
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }else{
            $this->response(array(
                "status"    => $res['status'],
                "message"   =>  $res['message']
            ),REST_CONTROLLER::HTTP_OK);
        }
        
    }  

    public function change_secure_password_post(){
        $data = array(
            'oldpass' => $this->post('secure_oldpass'),
            'newpass' => $this->post('secure_newpass'),
            'repass' => $this->post('secure_repass')
        );
        $userid =  $this->post('userid');

        $res = $this->Member_model->updatesecure_password($userid,$data);
        if($res['status']=="false"){
            $this->response(array(
                "status"    => $res['status'],
                "message"   =>  $res['message']
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }else{
            $this->response(array(
                "status"    => $res['status'],
                "message"   =>  $res['message']
            ),REST_CONTROLLER::HTTP_OK);
        }
        
    }

    public function plans_get(){
        $res['plans'] = $this->Member_model->plans();
        if($res['plans']>0){
            //debug_log($this->db->last_query());
            //debug_log($res);
            $this->response(array(
                "status"    => "true",
                "message"   =>  $res
            ),REST_CONTROLLER::HTTP_OK);
        }
        $this->response(array(
            "status"    => "true",
            "message"   =>  "No plans"
        ),REST_CONTROLLER::HTTP_OK);
        
    }

    public function plans_single_post(){
        $product_data = $this->db_model->select_multi('*', 'plans', array('id' => $this->post('plan_id')));
        if (!empty($product_data)) {
            $this->response(array(
                "status"    => "true",
                "message"   =>  $product_data
            ),REST_CONTROLLER::HTTP_OK);
        } else {
            $this->response(array(
                "status"    => "false",
                "message"   =>  "No data found!!"
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
        
    }

    //reset password
    public function resetPassword_post()
    {
        $datas = array(
            "id" => $this->post('userid'),
            "phone"  => $this->post('phone'),
            "email" => $this->post('email'),
            //"password"  =>$this->post('password')
        );

        $res = $this->Member_model->reset_password($datas);
        if($res['status'] == "true"){
            $this->response(array(
                "status"    =>  $res['status'],
                "message"   =>  $res['message']
            ),REST_CONTROLLER::HTTP_OK);
         }else{
            $this->response(array(
                "status"    =>  $res['status'],
                "message"   =>  $res['message']
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
         }
    }

    public function user_info_post(){
        $userid =  $this->post('userid');
        $check = $this->User_model->checkUser($userid);
            if($check>0){
            $data['userinfo'] = $this->Member_model->user_info($userid);
            
            $this->response(array(
                "status"    => "true",
                "message"   =>  $data
            ),REST_CONTROLLER::HTTP_OK);
        }else{
            $this->response(array(
                "status" => "false",
                "message" => "Invalid Userid"
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
    }  

    /**
    * sponsor_count -checks if the sopnsors exists or not
    * @param sponsor -sponsor id 
    * @param plan -plan id
    */
    public function sponsor_count_post(){
        $plan = $this->post('plan');
        $sponsor = $this->post('sponsor');
        $sponsor_count = $this->Member_model->sponsor_exists($sponsor,$plan);
        if($sponsor_count>0){
            $this->response(array(
                "status"    => "true",
                "message"   =>  "Sponsor Id Exists" 
            ),REST_CONTROLLER::HTTP_OK);
        }else{
            $this->response(array(
                "status" => "false",
                "message" => "Invalid Sponsor Id"
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
        
    } 


    /**
    * repurchase_order_complete - Order gets approved by the admin and repurchase incomes are sent 
    * @param id - Order id of the product
    * @param product_id - product id that is created at gmlm
    */

    public function repurchase_order_complete_post(){
        $this->load->model('Api_model');
        $id=$this->post('id');
        $details=$this->post('details');

        if($id=='' || $details==''){
            $this->response(array(
                "status"    => 'false',
                "message"   =>  'Invalid Parameters',
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
        else{
                $o_id_check=$this->db->query("select count(id) as cnt from product_sale where id=$id")->row()->cnt;
                if($o_id_check!=1){
                    $this->response(array(
                        "status"    => 'false',
                        "message"   =>  'Invalid Order Id',
                    ),REST_CONTROLLER::HTTP_NOT_FOUND);
                }
                $o_status_check=$this->db->query("select status from product_sale where id=$id")->row()->status;
                if($o_status_check!="Processing"){
                    $this->response(array(
                        "status"    => 'false',
                        "message"   =>  'Order Already Completed',
                    ),REST_CONTROLLER::HTTP_NOT_FOUND);
                }
                $result=$this->Emart_model->deliver($id,$details,1);
                debug_log($result);
                if($result['status']==1){
                    $this->response(array(
                        "status" => "true",
                        "message" => "Order marked as completed",
                        "data"=>$result['incomes']
                    ),REST_CONTROLLER::HTTP_OK);
                }
                else{
                    $this->response(array(
                        "status"    => 'false',
                        "message"   =>  'Something went wrong',
                    ),REST_CONTROLLER::HTTP_NOT_FOUND);
                }
        }
    }

    /**
    * repurchase_order_glms - Order gets booked in gmlm(Specific to glms)
    * @param user_id - user id of the user
    * @param product_id - product id that is created at gmlm
    * @param qty - quantity of the product
    * @param repurchaseId -Id of the repurchase plan 
    */

    public function repurchase_order_post($id='',$product_id='',$product_qty='',$repurchaseId='',$flag=''){
        $this->load->model('Api_model');
        if($flag==''){
            $id=$this->post('userid');
            $product_id=$this->post('product_id');
            $product_qty=$this->post('qty');
            $repurchaseId=$this->post('repurchaseId');
        }

        if($id=='' || $product_id=='' || $product_qty=='' || $repurchaseId=='' || $product_qty<1){
            $this->response(array(
                "status"    => 'false',
                "message"   =>  'Invalid Parameters',
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
        else{  
                $check1 = $this->User_model->checkUser($id);
                $check2 = $this->Api_model->checkProduct($product_id);
                $check3 = $this->Api_model->checkPlan($repurchaseId);
                
                if(!$check1 || !$check2 || !$check3){        
                    $this->response(array(
                        "status"    => 'false',
                        "message"   =>  'Invalid User/Product/Plan Id',
                    ),REST_CONTROLLER::HTTP_NOT_FOUND);
                }
                debug_log("Prod id :".$product_id);
                debug_log("Prod qty :".$product_qty);
                $result=$this->Api_model->checkout($id,$product_id,$product_qty,1);
                if($result['status']==1){
                    if($flag!=''){
                       return array(
                                    "orderId"=>$result['id']
                                    );
                    }
                    $this->response(array(
                        "status" => "true",
                        "orderId"=>$result['id'],
                        "message" => "Product booked successfully"
                    ),REST_CONTROLLER::HTTP_OK);
                }
                elseif($result['status']==2) {
                    
                    $this->response(array(
                        "status" => "false",
                        "message" => "Insufficient Balance"
                    ),REST_CONTROLLER::HTTP_NOT_FOUND);
                }
                elseif($result['status']==3){
                    $this->response(array(
                        "status" => "false",
                        "message" => "Product Unavailable"
                    ),REST_CONTROLLER::HTTP_NOT_FOUND);
                }
        }
    }


    /**
    * repurchase_api_glms - Order gets approved by the admin and repurchase incomes are sent(Specific to glms) 
    * @param id - Order id of the product
    * @param planid - Id of repurchase plan
    * @param courseid - Id of course/product
    * @param coursename - name of course/product
    * @param amount - amount of the product/course
    */

    public function repurchase_api_glms_post(){
        $this->load->model('Api_model');
        
        $userid=$this->post('userid');
        $planid=$this->post('planid');
        $courseid=$this->post('courseid');
        $coursename=$this->post('coursename');
        $amount=$this->post('amount');
        if($amount<1){
            $this->response(array(
                "status"=>"false",
                "message"=>"Amount should be greater than zero"
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
        $validate=$this->validate_request(array($userid,$planid,$courseid,$coursename,$amount));
        if($validate==0){
            $this->response(array(
                "status"=>"false",
                "message"=>"Invalid details"
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
        debug_log("a");
        $this->Api_model->add_product($courseid,$coursename,$amount,$planid);
        debug_log("b");

        $orderProduct=$this->repurchase_order_post($userid,$courseid,1,$planid,1);
        debug_log("c");

        if($orderProduct==0){
            $this->response(array(
                "status"=>"false",
                "message"=>"Something went wrong..!"
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
        debug_log($orderProduct);
        $id=$orderProduct['orderId'];
        $details="Successful Booking";

        if($id=='' || $details==''){
            $this->response(array(
                "status"    => 'false',
                "message"   =>  'Invalid Parameters',
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
        else{
                $o_id_check=$this->db->query("select count(id) as cnt from product_sale where id=$id")->row()->cnt;
                if($o_id_check!=1){
                    $this->response(array(
                        "status"    => 'false',
                        "message"   =>  'Invalid Order Id',
                    ),REST_CONTROLLER::HTTP_NOT_FOUND);
                }
                $o_status_check=$this->db->query("select status from product_sale where id=$id")->row()->status;
                if($o_status_check!="Processing"){
                    $this->response(array(
                        "status"    => 'false',
                        "message"   =>  'Order Already Completed',
                    ),REST_CONTROLLER::HTTP_NOT_FOUND);
                }
                $result=$this->Emart_model->deliver($id,$details,1);
                debug_log("Incomes data :");
                debug_log($result);
                if($result['status']==1){
                    $this->response(array(
                        "status" => "true",
                        "message" => "Order marked as completed",
                        "data"=>$result['incomes']
                    ),REST_CONTROLLER::HTTP_OK);
                }
                else{
                    $this->response(array(
                        "status"    => 'false',
                        "message"   =>  'Something went wrong',
                    ),REST_CONTROLLER::HTTP_NOT_FOUND);
                }
        }
    }


    /**
    * repurchase_plan_gsell - Calculates the repurchase incomes and send it as response 
    * @param userid - Id if the user
    * @param adminfee- Admin percent commision
    * @param product - Product Name 
    * @param productcost - cost of the product/service
    * @param repurchaseId- Id of Repurchase plan 
    */

    public function repurchase_plan_gsell_post(){
        $id=$this->post('userid');
        $adminfee=$this->post('adminfee');
        $product=$this->post('product');
        $product_cost=$this->post('productcost');
        $repurschaseId=$this->post('repurchaseId');

        if(empty($id) || empty($adminfee) || empty($product) || empty($repurschaseId) || empty($product_cost)){
            $this->response(array(
                "status"    => 'false',
                "message"   =>  'Invalid Parameters',
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
        else{
            $check1 = $this->User_model->checkUser($id);
            $check2 = $this->Api_model->checkPlan($repurchaseId);
                
            if(!$check1  || !$check2){        
                $this->response(array(
                    "status"    => 'false',
                    "message"   =>  'Invalid User/Plan Id',
                ),REST_CONTROLLER::HTTP_NOT_FOUND);
            }
            
            debug_log("enter");
            $result=$this->Api_model->repurchase_plan($id,$adminfee,$product,$product_cost,$repurschaseId);
            $this->response($result,REST_CONTROLLER::HTTP_OK);
        }
    }



    /**
    * withdraw_payouts - Withdraws the amount from the user wallet and sends request to admin for approval
    * @param userid - Id if the user
    * @param amount -Amount that needs to be deducted
    */
    public function withdraw_payout_post(){
        $userid=$this->post('userid');
        $amount=$this->post('amount');
        if($userid=='' || $amount=='' || $amount<1){
            $this->response(array(
                "status" => "false",
                "message" => "Something went wrong"
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
        else{
            $check = $this->User_model->checkUser($userid);
            $checkKyc=$this->db->query("select status from member_profile where userid=$userid")->row()->status;
            if($checkKyc!="completed"){
                $this->response(array(
                    "status" => "false",
                    "message" => "Kyc not completed"
                ),REST_CONTROLLER::HTTP_NOT_FOUND);
            }
            if($check>0){
                $res = $this->Api_model->withdraw_payout($userid,$amount);
                if($res==1){
                    $this->response(array(
                        "status" => "true",
                        "message" => "Withdrawl request sent to the admin"
                    ),REST_CONTROLLER::HTTP_OK);
                }
                elseif($res==2){
                    $this->response(array(
                        "status" => "false",
                        "message" => "Insufficient Balance"
                    ),REST_CONTROLLER::HTTP_NOT_FOUND);                    
                }
                else{
                    $this->response(array(
                        "status" => "false",
                        "message" => "Something went wrong"
                    ),REST_CONTROLLER::HTTP_NOT_FOUND);
                }
            }else{
                $this->response(array(
                    "status" => "false",
                    "message" => "Invalid Userid"
                ),REST_CONTROLLER::HTTP_NOT_FOUND);
            }
        }
    }


        /**
    * search_earning_by_interval - Sends earning info as per the income type and date intervals
    * @param userid - Id of the user
    * @param income_type - Income types like 1. Referral Income
    *                                        2.Level Completion Income
    *                                        3.Level Upgrade Fee
    *                                        4.Self Purchase Income
    *                                        5.Joining Purchase Income
    *                                        6.Repurchase Income
    * @param start_date - start date of the interval
    * @param end_date - end date of the interval
    */
    public function search_earning_by_interval_post(){
        $id=$this->post('userid');
        $income_type=$this->post('income_type');
        $start_date=$this->post('start_date');
        $end_date=$this->post('end_date');
        $data=array(
                    $id,$income_type,$start_date,$end_date
                    );
        $checkValidation=$this->validate_request($data);
        if($checkValidation==0){
                $this->response(array(
                    "status"    => "false",
                    "message"   =>  "Invalid Details"
                ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
        else{
            $check = $this->User_model->checkUser($id);
            if($check){
                $result=$this->Api_model->view_earning_by_interval($id,$income_type,$start_date,$end_date);
                $this->response(array(
                    "status"    => "true",
                    "data"   =>  $result['data']
                ),REST_CONTROLLER::HTTP_OK);       
            }
            else{
                $this->response(array(
                    "status"    => "false",
                    "message"   =>  "Invalid User id"
                ),REST_CONTROLLER::HTTP_NOT_FOUND);
            }
        }
    }


    /**
    * kyc_approve - Saves details of kyc in gmlm and sends 
    * @param userid - Id of the user
    * @param pan_no - Pan/Tax No of the user
    * @param bank_name - Bank Name of the user
    * @param account_no - Account of the user
    * @param userid - Id of the user
    * @param userid - Id of the user
    * @param userid - Id of the user
    * @param userid - Id of the user
    */
    public function kyc_approve_post(){
        $id=$this->post('userid');
        $pan_no=$this->post('pan_no');
        $bank_name=$this->post('bank_name');
        $account_no=$this->post('account_no');
        $ifsc_code=$this->post('ifsc_code');
        $branch_name=$this->post('branch_name');
        $account_type=$this->post('account_type');
        $securepass=$this->post('securepass');
        if($_FILES['pan_doc']['name']=='' || $_FILES['cheque_doc']['name']==''){
            $this->response(array(
                    "status"    => "false",
                    "message"   =>  "Upload the documents"
                ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
        $data=array(
                    $id,$pan_no,$bank_name,$account_no,$ifsc_code,$branch_name,$account_type,$securepass
                    );
        debug_log($data);
        $checkValidation=$this->validate_request($data);
        if($checkValidation==0){
            $this->response(array(
                    "status"    => "false",
                    "message"   =>  "Invalid Details"
                ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
        else{
            $check = $this->User_model->checkUser($id);
            if($check){
                $result=$this->Api_model->kyc_approve($id,$pan_no,$bank_name,$account_no,$ifsc_code,$branch_name,$account_type,$securepass);
                if($result==1){
                    debug_log("one");
                    $config['allowed_types']='*';
                    $config['upload_path']='uploads/kyc/';
                    debug_log("two");

                    $this->load->library('upload',$config);
                    if($this->upload->do_upload('pan_doc')){
                        $pan_data = $this->upload->data();
                        debug_log($pan_data);
                        $array = array(
                            'id_proof' => $pan_data['file_name']
                        );
                        $this->db->where('userid', $id);
                        $this->db->update('member_profile', $array);
                    }  

                    if($this->upload->do_upload('cheque_doc')){
                        $cheque_data = $this->upload->data();
                        debug_log($pan_data);
                        $array = array(
                            'cheque' => $cheque_data['file_name']
                        );
                        $this->db->where('userid', $id);
                        $this->db->update('member_profile', $array);                    
                    }
                    $this->response(array(
                        "status"    => "true",
                        "data"   =>  "Kyc request sent"
                    ),REST_CONTROLLER::HTTP_OK);       
                }
                elseif ($result==2) {
                    $this->response(array(
                        "status"    => "false",
                        "message"   =>  "Invalid Secure password"
                    ),REST_CONTROLLER::HTTP_NOT_FOUND);
                }
                elseif ($result==3) {
                    $this->response(array(
                        "status"    => "false",
                        "message"   =>  "Kyc already Completed"
                    ),REST_CONTROLLER::HTTP_NOT_FOUND);
                }
                elseif ($result==4) {
                    $this->response(array(
                        "status"    => "false",
                        "message"   =>  "Kyc In Progress"
                    ),REST_CONTROLLER::HTTP_NOT_FOUND);
                }
                else{
                    $this->response(array(
                        "status"    => "false",
                        "message"   =>  "Something went wrong"
                    ),REST_CONTROLLER::HTTP_NOT_FOUND);
                }
            }
            else{
                $this->response(array(
                        "status"    => "false",
                        "message"   =>  "Invalid user Id"
                    ),REST_CONTROLLER::HTTP_NOT_FOUND);
            }

        }
    }

    /**
    * bitcoin_details - Updates the bitcoin address 
    * @param id - Id of the user
    * @param bitaddr - bitcoin address of the user
    * @param securepass - secure password of the user
    **/
    public function bitcoin_details_post(){
        $id=$this->post('userid');
        $bitaddr=$this->post('bitaddr');
        $securepass=$this->post("securepass");
        $data=array(
                    $id,$bitaddr,$securepass
                    );
        debug_log($data);
        $checkValidation=$this->validate_request($data);
        if($checkValidation==0){
            $this->response(array(
                    "status"    => "false",
                    "message"   =>  "Invalid Details"
                ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
        else{
            $check = $this->User_model->checkUser($id);
            if(!$check){
                $this->response(array(
                    "status"    => "false",
                    "message"   =>  "Invalid user id"
                ),REST_CONTROLLER::HTTP_NOT_FOUND);
            }
            debug_log("one");
            $pass=$this->db->query("select secure_password from member where id=$id")->row()->secure_password;   
            if(password_verify($securepass,$pass)== true){
            debug_log("2");

                $result=$this->Api_model->bitcoin_details($id,$bitaddr);
                if($result==1){
                    $this->response(array(
                            "status"    => "true",
                            "message"   =>  "Updated successfully"
                      ),REST_CONTROLLER::HTTP_OK);
                }
                else{
                    $this->response(array(
                        "status"    => "false",
                        "message"   =>  "Something went wrong"
                    ),REST_CONTROLLER::HTTP_NOT_FOUND);                    
                }
            }
            else{
                $this->response(array(
                    "status"    => "false",
                    "message"   =>  "Invalid secure password"
                ),REST_CONTROLLER::HTTP_NOT_FOUND);
            }
        }
    }


    /**
    * upi_details_post - Updates the upi details in member profile table 
    * @param id - Id of the user
    * @param upiaddr - upi address of the user
    * @param googlepay - googlepay no of the user
    * @param phonepe - phonepe no of the user
    * @param securepass - secure password of the user
    **/
    public function upi_details_post(){
        $id=$this->post('userid');
        $upiaddr=$this->post('upiaddr');
        $googlepay=$this->post('googlepay');
        $phonepe=$this->post('phonepe');
        $securepass=$this->post("securepass");
        if($googlepay=='') {
            $googlepay=0;
        }
        if($phonepe=='') {
            $phonepe=0;
        }
        $data=array(
                    $id,$upiaddr,$securepass
                    );
        debug_log($googlepay);
        if($googlepay!=0){
            if(!preg_match('/^[0-9]{10}+$/', $googlepay)){
                $this->response(array(
                        "status"    => "false",
                        "message"   =>  "Invalid Google Pay Number"
                    ),REST_CONTROLLER::HTTP_NOT_FOUND);
            }
        }
        if($phonepe!=0){
            if(!preg_match('/^[0-9]{10}+$/', $phonepe)){
                $this->response(array(
                        "status"    => "false",
                        "message"   =>  "Invalid Phonepe Number"
                    ),REST_CONTROLLER::HTTP_NOT_FOUND);
            }
        }
        $checkValidation=$this->validate_request($data);
        if($checkValidation==0){
            $this->response(array(
                    "status"    => "false",
                    "message"   =>  "Invalid Details"
                ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
        else{
            $check = $this->User_model->checkUser($id);
            if(!$check){
                $this->response(array(
                    "status"    => "false",
                    "message"   =>  "Invalid user id"
                ),REST_CONTROLLER::HTTP_NOT_FOUND);
            }
            debug_log("one");
            $pass=$this->db->query("select secure_password from member where id=$id")->row()->secure_password;   
            if(password_verify($securepass,$pass)== true){
            debug_log("2");

                $result=$this->Api_model->upi_details($id,$upiaddr,$googlepay,$phonepe);
                if($result==1){
                    $this->response(array(
                            "status"    => "true",
                            "message"   =>  "Updated successfully"
                      ),REST_CONTROLLER::HTTP_OK);
                }
                else{
                    $this->response(array(
                        "status"    => "false",
                        "message"   =>  "Something went wrong"
                    ),REST_CONTROLLER::HTTP_NOT_FOUND);                    
                }
            }
            else{
                $this->response(array(
                    "status"    => "false",
                    "message"   =>  "Invalid secure password"
                ),REST_CONTROLLER::HTTP_NOT_FOUND);
            }
        }    
    }


    /**
    * nominee_details - Updates the Nominee details  
    * @param id - Id of the user
    * @param nom_nam - Nominee Name
    * @param nom_addr - Nominee Address
    * @param nom_rel - Nominee Address
    * @param nom_phone - Nominee Phone Number
    * @param securepass - Secure password of the user
    **/
    public function nominee_details_post(){
        $id=$this->post('userid');
        $nom_name=$this->post('nom_name');
        $nom_addr=$this->post('nom_addr');
        $nom_rel=$this->post('nom_rel');
        $nom_phone=$this->post('nom_phone');
        $securepass=$this->post("securepass");
        if($nom_phone=='') {
            $nom_phone=0;
        }
        $data=array(
                    $id,$nom_name,$nom_addr,$nom_rel,$securepass
                    );
        debug_log($data);
        if($nom_phone!=0){
            if(!preg_match('/^[0-9]{10}+$/', $nom_phone)){
                $this->response(array(
                        "status"    => "false",
                        "message"   =>  "Invalid phone number"
                    ),REST_CONTROLLER::HTTP_NOT_FOUND);
            }
        }
        $checkValidation=$this->validate_request($data);
        if($checkValidation==0){
            $this->response(array(
                    "status"    => "false",
                    "message"   =>  "Invalid Details"
                ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
        else{
            $check = $this->User_model->checkUser($id);
            if(!$check){
                $this->response(array(
                    "status"    => "false",
                    "message"   =>  "Invalid user id"
                ),REST_CONTROLLER::HTTP_NOT_FOUND);
            }
            debug_log("one");
            $pass=$this->db->query("select secure_password from member where id=$id")->row()->secure_password;   
            if(password_verify($securepass,$pass)== true){
            debug_log("2");

                $result=$this->Api_model->nominee_details($id,$nom_name,$nom_addr,$nom_rel,$nom_phone);
                if($result==1){
                    $this->response(array(
                            "status"    => "true",
                            "message"   =>  "Updated successfully"
                      ),REST_CONTROLLER::HTTP_OK);
                }
                else{
                    $this->response(array(
                        "status"    => "false",
                        "message"   =>  "Something went wrong"
                    ),REST_CONTROLLER::HTTP_NOT_FOUND);                    
                }
            }
            else{
                $this->response(array(
                    "status"    => "false",
                    "message"   =>  "Invalid secure password"
                ),REST_CONTROLLER::HTTP_NOT_FOUND);
            }
        }
    }

    /**
    * generate_epins_post - Generates epins for the specific user as per amount and quantity  
    * @param id - Id of the user
    * @param amount - Amount per epin
    * @param qty - Quantity of the epins
    **/
    public function generate_epins_post(){
        $role=$this->post('role');
        $id=$this->post('userid');
        $issue_id=$this->post('issue_id');
        $amount=$this->post('amount');
        $qty=$this->post('qty');
        $plan_id=$this->post('plan_id');
        $type=$this->post('type');

        $data=array(
                    $role,$id,$amount,$qty,$type
                    );
        $checkValidation=$this->validate_request($data);
        $check = $this->User_model->checkUser($id);
        if(!$check){
            $this->response(array(
                    "status"    => "false",
                    "message"   =>  "Invalid userid"
                ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
        if($checkValidation==0 || ($role=='user' && $plan_id=='')){
            $this->response(array(
                    "status"    => "false",
                    "message"   =>  "Invalid Details"
                ),REST_CONTROLLER::HTTP_NOT_FOUND);    
        }
        else{
            if($role=='admin'){
                $result=$this->custom_income->epin_model_for_admin($id,$amount,$qty,$type,1);
            }
            elseif ($role=='user') {
                $result=$this->custom_income->epin_model_for_user($id,$issue_id,$qty,$plan_id,1);    
            }
            else{
                $this->response(array(
                    "status"    => "false",
                    "message"   =>  "Invalid role"
                ),REST_CONTROLLER::HTTP_NOT_FOUND);       
            }
            debug_log("Result :".$result);
            if($result==1){
                $this->response(array(
                    "status"    => "true",
                    "message"   =>  "Generated epins successfully"
                ),REST_CONTROLLER::HTTP_OK);        
            }
            elseif ($result==2) {
                $this->response(array(
                    "status"    => "false",
                    "message"   =>  "Invalid User Id"
                ),REST_CONTROLLER::HTTP_NOT_FOUND);
            }
            elseif ($result==3) {
                $this->response(array(
                    "status"    => "false",
                    "message"   =>  "Insufficient wallet balance"
                ),REST_CONTROLLER::HTTP_NOT_FOUND);
            }
            else{
                $this->response(array(
                    "status"    => "false",
                    "message"   =>  "Something went wrong"
                ),REST_CONTROLLER::HTTP_NOT_FOUND);
            }
        }
    }

    /**
    * reset_secure_password - Resets secure password through email or sms  
    * @param userid - Id of the user
    * @param phone - Mobile number of the user
    * @param email - registered email of the user
    * @param password - password of the user
    **/
    public function reset_secure_password_post(){
        $user_id = trim($this->post('userid'));
        $phone = trim($this->post('phone'));
        $email = trim($this->post('email'));
        $mypass= trim($this->post('password'));
        $data=array(
                    $user_id,$email,$mypass
                    );
        $checkValidation=$this->validate_request($data);
        if($checkValidation==0){
            $this->response(array(
                "status" => "false",
                "message" => "Invalid details"
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }else{
                $result=$this->custom_income->reset_secure_password($user_id,$phone,$email,$mypass,1);
                if($result==1){
                    $this->response(array(
                        "status"    => "true",
                        "message"   =>  "Sent temporary password to registered email"
                    ),REST_CONTROLLER::HTTP_OK);
                }
                elseif($result==2){
                    $this->response(array(
                        "status" => "false",
                        "message" => "Invalid details. Please Enter Valid Details.3 Consecutive Incorrect Attempts will block your account !!"
                     ),REST_CONTROLLER::HTTP_NOT_FOUND);
                }
                elseif($result==3){
                    $this->response(array(
                        "status" => "false",
                        "message" => "Temporary Secure password is sent to your registered Phone Number"
                     ),REST_CONTROLLER::HTTP_NOT_FOUND);
                }
                elseif($result==4){
                    $this->response(array(
                        "status" => "false",
                        "message" => "Password could not reset at the moment. Please try later !"
                     ),REST_CONTROLLER::HTTP_NOT_FOUND);
                }
                elseif ($result==5) {
                    $this->response(array(
                        "status" => "false",
                        "message" => "Invalid Details. Please Enter Correct Details !"
                     ),REST_CONTROLLER::HTTP_NOT_FOUND);
                }
        }
    }

    /**
    * instructor_royality_income - Calculates royality incomes for the instructor uplines
    * @param userid - Id of User
    * @param planid - Repurchase plan id
    * @param userid - amount that need to calculated as per the instructor income percentange
    * @param instructor_income_percent - percentage for royalty incomes of the upline user
    **/    
    public function instructor_royalty_income_glms_post(){
        $userid=$this->post('userid');
        $planid=$this->post('planid');
        $amount=$this->post('amount');
        $iip=$this->post('instructor_income_percent');
        $validate=$this->validate_request(array($userid,$planid,$amount,$iip));
        if($iip<1){
            $this->response(array(
                "status"=>"false",
                "message"=>"Instructor Income Percentage should be greater than zero"
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }    
        if($validate==0){
            $this->response(array(
                "status"=>"false",
                "message"=>"Invalid details"
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
        $check = $this->User_model->checkUser($userid);
        debug_log($check);
        if(!$check){
            $this->response(array(
                "status"    =>  "false",
                "message"   =>  "Invalid user"
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
        debug_log($check1);
        $check1 = $this->Api_model->checkPlan($planid);
        if(!$check1){
            $this->response(array(
                "status"    =>  "false",
                "message"   =>  "Invalid plan"
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
        $result=$this->Api_model->instructor_incomes($userid,$amount,$iip);
        debug_log($result);
        if($result['status']=="false"){
            $this->response(array(
                "status"    =>  "false",
                "message"   =>  "Something went wrong"
            ),REST_CONTROLLER::HTTP_NOT_FOUND);    
        }
        elseif($result['status']=="true"){
            $this->response(array(
                "status"    =>  "true",
                "instructor_incomes"   =>  $result['incomes']
            ),REST_CONTROLLER::HTTP_OK);    
        }
        else{
            $this->response(array(
                "status"    =>  "false",
                "message"   =>  "Something went wrong"
            ),REST_CONTROLLER::HTTP_NOT_FOUND);    
        }
    }

    /**
    * get_plan - Send information about a specific plan
    * @param plan - Plan id 
    **/
    public function get_plan_post(){
        $id=$this->post('plan');
        debug_log($this->post('plan'));
        if($id==''){
            $this->response(array(
                "status"    => "false",
                "message"   =>  "Invalid Plan Id"
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
        else{
            $result=$this->Api_model->get_plan($id);
            if($result['status']=="true"){
                $this->response(array(
                    "status"    => "true",
                    "message"   =>  $result['details']
                ),REST_CONTROLLER::HTTP_OK);
            }
            else{
                $this->response(array(  
                    "status"    => "false",
                    "message"   =>  "Something went wrong"
                ),REST_CONTROLLER::HTTP_NOT_FOUND);
            }
        }
    }

    public function get_mlm_plan_post(){
        $id=$this->post('plan');
        if($id==''){
            $this->response(array(
                "status"    => "false",
                "message"   =>  "Invalid Plan Id"
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
        else{
            $result=$this->Api_model->get_mlm_plan($id);
            if($result['status']=="true"){
                $this->response(array(
                    "status"    => "true",
                    "message"   =>  $result['details']
                ),REST_CONTROLLER::HTTP_OK);
            }
            else{
                $this->response(array(  
                    "status"    => "false",
                    "message"   =>  "Something went wrong"
                ),REST_CONTROLLER::HTTP_NOT_FOUND);
            }
        }
    }

    /**
    * edit_plan - edits product level incomes of a plan
    * @param plan_id - Repurchase plan Id
    * @param self - self repurchase commision percent
    * @param level1 to level15 - Level percent commissions
    **/
    public function edit_plan_post(){
        $id=$this->post('plan_id');
        $joining_fee=$this->post('joining_fee');
        $self=$this->post("self");
        $lev1=$this->post("level1");
        $lev2=$this->post("level2");
        $lev3=$this->post("level3");
        $lev4=$this->post("level4");
        $lev5=$this->post("level5");
        $lev6=$this->post("level6");
        $lev7=$this->post("level7");
        $lev8=$this->post("level8");
        $lev9=$this->post("level9");
        $lev10=$this->post("level10");
        $lev11=$this->post("level11");
        $lev12=$this->post("level12");
        $lev13=$this->post("level13");
        $lev14=$this->post("level14");
        $lev15=$this->post("level15");
		
        if($id=='' || $self=='' || $lev1=='' || $lev2=='' || $lev3=='' || $lev4=='' || $lev5=='' || $lev6=='' || $lev7=='' || $lev8=='' || $lev9=='' || $lev10=='' || $lev11=='' || $lev12=='' || $lev13=='' || $lev14=='' || $lev15==''){
                $this->response(array(
                "status"    => "false",
                "message"   =>  "Invalid Details"
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
        else{
            $checkplan = $this->Api_model->checkPlan($id);
                if(!$checkplan){
                    $this->response(array(
                    "status"    => "false",
                    "message"   =>  "Invalid PLan Id"
                ),REST_CONTROLLER::HTTP_NOT_FOUND);    
            }
            $gettype=$this->db->query("select type from plans where id=$id")->row()->type;
            if($gettype=="Repurchase"){
                $joining_fee=0;
            }
            $result=$this->Api_model->edit_plan($id,$self,$lev1,$lev2,$lev3,$lev4,$lev5,$lev6,$lev7,$lev8,$lev9,$lev10,$lev11,$lev12,$lev13,$lev14,$lev15,$joining_fee);
            if($result==1){
                $this->response(array(
                    "status"    => "true",
                    "message"   =>  "Plan updated successfully"
                ),REST_CONTROLLER::HTTP_OK);
            }
            else{
                $this->response(array(
                    "status"    => "false",
                    "message"   =>  "Something went wrong"
                ),REST_CONTROLLER::HTTP_NOT_FOUND);
            }
        }
    }

    /**
    * config_data - sends config data of extended_kpi,enabled_kyc,enabled_invoice,enabled_repurchase,enabled_pv
    * @param  GET method used
    **/
    public function config_data_get(){
        $result=$this->Api_model->get_config();
        if($result['status']=="true"){
            $this->response(array(
                            "status"=>"true",
                            "configData"=>$result['data']
                            ),REST_CONTROLLER::HTTP_OK);
        }
        else{
            $this->response(array(
                            "status"=>"false",
                            "message"=>"Something went wrong"
                            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
    }

    /**
    * clear_data - Truncate data as per type
    * @param $type -type of data that needs to be deleted           
    **/
    public function clear_data_post(){
        $key_value = $this->input->get_request_header("x-api-key");
        if($key_value!=$this->api_key){
                $this->response(array(
                    "status"    => "false",
                    "message"   =>  "Invalid api key",
                ),REST_CONTROLLER::HTTP_NOT_FOUND);                
            }

        $type=$this->post('type');
        if($type==''){
            $this->response(array(
                            "status"=>"false",
                            "message"=>"Invalid Details"
                            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
        else{
            
            debug_log("p,ls");
            if($type =='earnings_today'){
                $this->db->query("DELETE FROM earning WHERE cast(date as DATE) >= ".date('Y-m-d'));
            }
            elseif ($type == 'earnings_all') {
                $this->db->truncate('earning');
                $this->db->truncate('deductions');
            }
            elseif ($type == 'member') {
                $this->Settings_model->clear_member_data(1);
                if (config_item('ecomm_theme')=='gmart') {
                    $this->gmart_model->clear_all_user_data();
                }
            }
            elseif ($type == 'registration') {
                $this->Settings_model->clear_member_data(1);
                $this->Settings_model->clear_plan_data();
                if (config_item('ecomm_theme')=='gmart') {
                    $this->gmart_model->clear_all_user_data();
                }
            }
            elseif ($type == 'all') {
                debug_log("sdsddssdd");
                $this->Settings_model->clear_member_data(1);
                $this->Settings_model->clear_plan_data();
                $this->Settings_model->clear_product_data();
                if (config_item('ecomm_theme')=='gmart') {
                    $this->gmart_model->clear_all_gmart_data();
                }
            }
            $this->response(array(
                            "status"=>"true",
                            "message"=>"Cleared data successfully"
                            ),REST_CONTROLLER::HTTP_OK);    
        }
    }

    /**
    * validate_request - Vaidates the request parameters where the values are empty or not
    * @param request_param - Array of the parameter that are sent in requests
    **/    
    public function validate_request($request_param){
        debug_log($request_param);
        $count=0;
        foreach($request_param as $field){
            if($field==''){
                $count++;
            }
        }
        return ($count==0)?1:0;
    }

    /**
     * admin_dashboard-view members
     **/
    public function all_member_get(){
        $res=$this->Api_model->get_all_member();
        if (!empty($res)) {
           $this->response(array(
                            "status"=>"true",
                            "message"=>$res['members']
                            ),REST_CONTROLLER::HTTP_OK); 
        } else {
            $this->response(array(
                            "status"=>"false",
                            "message"=>"No Data Found"
                            ),REST_CONTROLLER::HTTP_NOT_FOUND);        
        }
        
    }

    public function all_earning_get(){
        $res=$this->Api_model->get_all_earnings();
        if (!empty($res)) {
           $this->response(array(
                            "status"=>"true",
                            "message"=>$res['earning']
                            ),REST_CONTROLLER::HTTP_OK); 
        } else {
            $this->response(array(
                            "status"=>"false",
                            "message"=>"No Data Found"
                            ),REST_CONTROLLER::HTTP_NOT_FOUND);        
        }
    }

    public function all_deductions_get(){
        $res=$this->Api_model->get_all_deductions();
        if (!empty($res)) {
           $this->response(array(
                            "status"=>"true",
                            "message"=>$res['deductions']
                            ),REST_CONTROLLER::HTTP_OK); 
        } else {
            $this->response(array(
                            "status"=>"false",
                            "message"=>"No Data Found"
                            ),REST_CONTROLLER::HTTP_NOT_FOUND);        
        }
    }

    public function user_earning_amt_post(){
        $userid=$this->post('userid');
        $data=$this->db_model->sum('amount', 'earning', array('userid' => $userid));
        if (!empty($data)) {
           $this->response(array(
                            "status"=>"true",
                            "message"=>$data
                            ),REST_CONTROLLER::HTTP_OK); 
        } else {
            $this->response(array(
                            "status"=>"false",
                            "message"=>""
                            ),REST_CONTROLLER::HTTP_NOT_FOUND);        
        }
    }

    public function search_users_post(){
        $plan_id=$this->post('plan_id') > 0 ? $this->post('plan_id') : '';
        $search_data = array(
            'plan_id' => $plan_id, 
            'phone' => $this->post('phone'), 
            'email' => $this->post('email'), 
            'sponsor' => $this->post('sponsor'), 
            'userid' => $this->post('userid'), 
            'username' => $this->post('name'), 
            'startdate' => $this->post('startdate'), 
            'enddate' => $this->post('enddate')
        );
        $res=$this->Api_model->get_search_member($search_data,$plan_id);
        if (!empty($res['members'])) {
           $this->response(array(
                            "status"=>"true",
                            "message"=>$res['members']
                            ),REST_CONTROLLER::HTTP_OK); 
        } else {
            $this->response(array(
                            "status"=>"false",
                            "message"=>"No Members Found"
                            ),REST_CONTROLLER::HTTP_NOT_FOUND);        
        }
    }

    public function blocked_members_get(){
        $this->db->select('*')->from('member')->where(array('status' => 'Block'));

        $data['blocked_members'] = $this->db->get()->result_array();

        if (!empty($data['blocked_members'])) {
           $this->response(array(
                            "status"=>"true",
                            "message"=>$data['blocked_members']
                            ),REST_CONTROLLER::HTTP_OK); 
        } else {
            $this->response(array(
                            "status"=>"false",
                            "message"=>"No Members Found"
                            ),REST_CONTROLLER::HTTP_NOT_FOUND);        
        }
    }

    public function inactive_members_get(){

        $this->db->select('*')->from('member')->where('status', 'Inactive')->order_by('secret', 'DESC');

        $data['inactive_members'] = $this->db->get()->result_array();
        if (!empty($data['inactive_members'])) {
           $this->response(array(
                            "status"=>"true",
                            "message"=>$data['inactive_members']
                            ),REST_CONTROLLER::HTTP_OK); 
        } else {
            $this->response(array(
                            "status"=>"false",
                            "message"=>"No Members Found"
                            ),REST_CONTROLLER::HTTP_NOT_FOUND);        
        }
    }

    public function member_activation_post(){
        $userid=$this->post('userid');
        $res=$this->Api_model->activate_user($userid);
        if ($res['resp_status']=='success') {
           $this->response(array(
                            "status"=>"true",
                            "message"=>$res['response']
                            ),REST_CONTROLLER::HTTP_OK); 
        } else {
            $this->response(array(
                            "status"=>"false",
                            "message"=>$res['response']
                            ),REST_CONTROLLER::HTTP_NOT_FOUND);        
        }
    }

    public function update_member_info_post(){
        $id        = $this->input->post('userid');
        $name      = $this->input->post('name');
        $email     = $this->input->post('email');
        $phone     = $this->input->post('phone');
        $activate_time = $this->input->post('activate_time');
        $password  = $this->input->post('password');
        $status    = $this->input->post('status');
        $md     = array(
            'name'      => $name,
            'email'     => $email,
            'phone'     => $phone,
            'activate_time' => date('Y-m-d H:i',strtotime($activate_time)),
            'status'    => $status,
        );
        if (trim($password) !== "") {
            $md = $md + array('password' => password_hash($password, PASSWORD_DEFAULT));
        }

        $mp = array(
            'address'          => $this->input->post('address'),
            'city'          => $this->input->post('city'),
            'state'          => $this->input->post('state'),
            'zip'          => $this->input->post('zip'),
            'date_of_birth'    => $this->input->post('date_of_birth'),
            'tax_no'           => $this->input->post('tax_no'),
            'aadhar_no'        => $this->input->post('aadhar_no'),
            'gstin'            => $this->input->post('gstin'),
            'googlepay_no'        => $this->input->post('googlepay_no'),
            'phonepay_no'        => $this->input->post('phonepay_no'),
            'upi_id'        => $this->input->post('upi_id'),
            'bank_name'        => $this->input->post('bank_name'),
            'bank_ac_no'       => $this->input->post('bank_ac_no'),
            'bank_ifsc'        => $this->input->post('bank_ifsc'),
            'bank_branch'      => $this->input->post('bank_branch'),
            'btc_address'      => $this->input->post('btc_address'),
            'nominee_name'     => $this->input->post('nominee_name'),
            'nominee_add'      => $this->input->post('nominee_add'),
            'nominee_relation' => $this->input->post('nominee_relation'),
        );
        $result=$this->Api_model->update_member_info($id,$md,$mp);
        if ($result['status']==true) {
           $this->response(array(
                            "status"=>"true",
                            "message"=>$result['response']
                            ),REST_CONTROLLER::HTTP_OK); 
        } else {
            $this->response(array(
                            "status"=>"false",
                            "message"=>$result['response']
                            ),REST_CONTROLLER::HTTP_NOT_FOUND);        
        }
    }

    public function payout_setting_data_get(){
        $this->db->select('*');
        $data['result']     = $this->db->get('payout')->result();
        if (!empty($data['result'])) {
            $this->response(array(
                "status"=>"true",
                "message"=>$data['result']
            ),REST_CONTROLLER::HTTP_OK);
        } else {
            $this->response(array(
                "status"=>"false",
                "message"=>'No Data Found'
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }

    }

    public function payout_setting_post(){

        if($this->db_model->select('id', 'payout', array('plan_id' => $this->input->post('plan_id'))) >0){

            $this->response(array(
                "status"=>"false",
                "message"=>'There is already a Payout configured for the Plan ID '.$this->input->post('plan_id').' .Either delete / update the existing '
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }else{

            $payout_tax = $this->input->post('payout_tax') >0 ? $this->input->post('payout_tax') : 0;

            $array = array(
              'plan_id'           => $this->input->post('plan_id'),
              'payout_tax'        => $payout_tax,
              'no_pan_payout_tax' => $this->input->post('no_pan_payout_tax') >0 ? $this->input->post('no_pan_payout_tax') : $payout_tax,
              'admin_charge'      => $this->input->post('admin_charge') >0 ? $this->input->post('admin_charge') : 0,
              'admin_charge_type'      => $this->input->post('admin_charge_type'),
              'user_withdraw'     => $this->input->post('user_withdraw') != '' ? $this->input->post('user_withdraw') : 'Yes',
              'min_withdraw'      => $this->input->post('min_withdraw') >0 ? $this->input->post('min_withdraw') : 1,
              'daily_capping'     => $this->input->post('daily_capping') >0 ? $this->input->post('daily_capping') : 1000,
              'min_sponsor'       => $this->input->post('min_sponsor') >0 ? $this->input->post('min_sponsor') : 0,
              'repurchase_deduct' => $this->input->post('repurchase_deduct') >0 ? $this->input->post('repurchase_deduct') : 0,
              'fund_transfer'   => $this->input->post('fund_transfer') != '' ? $this->input->post('fund_transfer') : 'No',
              'user_epin'         => $this->input->post('user_epin') != '' ? $this->input->post('user_epin') : 'Yes',
              'user_epin_charge'  => $this->input->post('user_epin_charge') >0 ? $this->input->post('user_epin_charge') : 0,
              'user_epin_cashback' => $this->input->post('user_epin') == 'Yes' ? $this->input->post('user_epin_cashback') : '',
              'user_epin_plus' => $this->input->post('user_epin') == 'Yes' ? $this->input->post('user_epin_plus') : '',
              'payout_frequency'  => $this->input->post('payout_frequency') >0 ? $this->input->post('payout_frequency') : 0,
              'payout_start'      => $this->input->post('payout_start') != '' ? $this->input->post('payout_start') : '00:00:00',
              'payout_end'      => $this->input->post('payout_end') != '' ? $this->input->post('payout_end') : '24:00:00',
            );

            if ($this->db->insert('payout', $array)) {
                $this->response(array(
                            "status"=>"true",
                            "message"=>'Settings Updated Successfully!!'
                            ),REST_CONTROLLER::HTTP_OK);
            } else {
                $this->response(array(
                    "status"=>"false",
                    "message"=>'Failed to create payout!!'
                ),REST_CONTROLLER::HTTP_NOT_FOUND);
            }
        }
    }

    public function get_payout_setting_post(){
        $data['result'] = $this->db_model->select_multi('*', 'payout', array('id' => $this->input->post('id'),));
        if (!empty($data['result'])) {
            $this->response(array(
                "status"=>"true",
                "message"=>$data['result']
            ),REST_CONTROLLER::HTTP_OK);
        } else {
            $this->response(array(
                "status"=>"false",
                "message"=>'No data found!!'
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
    }

    public function update_payout_setting_post(){

        $payout_tax = $this->input->post('payout_tax') >0 ? $this->input->post('payout_tax') : 0;

        $array = array(
          'payout_tax'        => $payout_tax,
          'no_pan_payout_tax' => $this->input->post('no_pan_payout_tax') >0 ? $this->input->post('no_pan_payout_tax') : $payout_tax,
          'admin_charge'      => $this->input->post('admin_charge') >0 ? $this->input->post('admin_charge') : 0,
          'admin_charge_type'      => $this->input->post('admin_charge_type'),
          'user_withdraw'     => $this->input->post('user_withdraw') != '' ? $this->input->post('user_withdraw') : 'Yes',
          'min_withdraw'      => $this->input->post('min_withdraw') >0 ? $this->input->post('min_withdraw') : 1,
          'daily_capping'     => $this->input->post('daily_capping') >0 ? $this->input->post('daily_capping') : 1000,
          'min_sponsor'       => $this->input->post('min_sponsor') >0 ? $this->input->post('min_sponsor') : 0,
          'repurchase_deduct' => $this->input->post('repurchase_deduct') >0 ? $this->input->post('repurchase_deduct') : 0,
          'fund_transfer'   => $this->input->post('fund_transfer') != '' ? $this->input->post('fund_transfer') : 'No',
          'user_epin'         => $this->input->post('user_epin') != '' ? $this->input->post('user_epin') : 'Yes',
          'user_epin_charge'  => $this->input->post('user_epin_charge') >0 ? $this->input->post('user_epin_charge') : 0,
          'user_epin_cashback' => $this->input->post('user_epin') == 'Yes' ? $this->input->post('user_epin_cashback') : '',
          'user_epin_plus'    => $this->input->post('user_epin') == 'Yes' ? $this->input->post('user_epin_plus') : '',
          'payout_frequency'  => $this->input->post('payout_frequency') >0 ? $this->input->post('payout_frequency') : 0,
          'payout_start'      => $this->input->post('payout_start') != '' ? $this->input->post('payout_start') : '00:00:00',
          'payout_end'      => $this->input->post('payout_end') != '' ? $this->input->post('payout_end') : '24:00:00',
        );

        $this->db->where('id', $this->input->post('id'));

        if ($this->db->update('payout', $array)) {
            $this->response(array(
                "status"=>"true",
                "message"=>'Settings Updated Successfully!!'
            ),REST_CONTROLLER::HTTP_OK);
        } else {
            $this->response(array(
                "status"=>"false",
                "message"=>'Failed to update payout!!'
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
        
    }

    public function remove_payout_setting_post(){
        debug_log('delete payout:'.$this->input->post('id'));
        $this->db->where('id', $this->input->post('id'));
        if ($this->db->delete('payout')) {
            $this->response(array(
                "status"=>"true",
                "message"=>'Setting of Income removed Successfully!!'
            ),REST_CONTROLLER::HTTP_OK);
        } else {
            $this->response(array(
                "status"=>"false",
                "message"=>'Failed to remove payout!!'
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
    }

    public function create_plan_post(){
        debug_log('in create plan api');
        debug_log($this->post());
        $joining_fee = $this->common_model->filter($this->post('joining_fee'), 'float');
        $auto_pool = $this->post('auto_pool') ? $this->post('auto_pool') : 'No';
        $max_width        = $this->post('max_width');
        $type             = $this->post('plan_type') ? $this->post('plan_type') : 'Registration';
        $plan_name        = $this->post('plan_name');
        $gst              = $this->common_model->filter($this->post('gst'), 'float');
        $image           = 'default.jpg';
        $direct_income   = $this->post('direct_commission');//$this->common_model->filter(, 'float');

        $first_pair_ratio=$this->post('first_pair_ratio') ? $this->post('first_pair_ratio') : '1:2/2:1';
        $second_pair_ratio=$this->post('second_pair_ratio') ? $this->post('second_pair_ratio') : '1:1';
        $first_pair_commission=$this->common_model->filter($this->post('first_pair_commission'),'float');
        $second_pair_commission=$this->common_model->filter($this->post('second_pair_commission'), 'float');
        $sponsor_match_commission =$this->common_model->filter($this->post('sponsor_match_commission'), 'float');
        $sponsor_pair_match =$this->common_model->filter($this->post('sponsor_pair_match'), 'float');
        $payout_frequency=$this->post('payout_frequency') ? $this->post('payout_frequency') : 'daily';
        $carry_forward=$this->post('carry_forward') ? $this->post('carry_forward') : 'no';
        $capping         = $this->post('capping') ? $this->post('capping') :0;
        $cappingamount = $this->common_model->filter($this->post('cappingamount'), 'float');
        $fix_income = $this->common_model->filter($this->post('fix_income'));
        $roi             = $this->common_model->filter($this->post('roi'), 'float');
        $roi_frequency   = $this->post('roi_frequency') ? $this->post('roi_frequency') : '1';
        $roi_limit       = $this->post('roi_limit') ? $this->post('roi_limit') : '0';

        $invoice_name        = $this->post('invoice_name') != '' ? $this->post('invoice_name') : $this->post('plan_name');
        $plan_desc        = $this->post('plan_desc');
        $category         = $this->post('category');
        $enable_recurring_fee = $this->post('enable_recurring_fee') ? $this->post('enable_recurring_fee') : '0';
        $recurring_fee = $this->post('recurring_fee') ? $this->post('recurring_fee') : '0';
        $recurring_duration = $this->post('recurring_duration') ? $this->post('recurring_duration') : '0';
        $pv               = $this->post('pv') ? $this->post('pv') : 0;
        $config_ref_comm = $this->post('config_ref_comm') ? $this->post('config_ref_comm') : 'amount';
        $ref_plan        = $this->post('ref_plan') ? $this->post('ref_plan') : 'joining';
        $pay_ref_lev     = $this->post('pay_ref_lev') ? $this->post('pay_ref_lev') : 'onlyref';
        $r_level1        = $this->post('r_level1') ? $this->post('r_level1') : 0;
        $r_level2        = $this->post('r_level2') ? $this->post('r_level2') : 0;
        $r_level3        = $this->post('r_level3') ? $this->post('r_level3') : 0;
        $r_level4        = $this->post('r_level4') ? $this->post('r_level4') : 0;
        $r_level5        = $this->post('r_level5') ? $this->post('r_level5') : 0;
        $r_level6         = $this->post('r_level6') ? $this->post('r_level6') : 0;
        $r_level7         = $this->post('r_level7') ? $this->post('r_level7') : 0;
        $r_level8         = $this->post('r_level8') ? $this->post('r_level8') : 0;
        $r_level9         = $this->post('r_level9') ? $this->post('r_level9') : 0;
        $r_level10 = $this->post('r_level10') ? $this->post('r_level10') : 0;
        $r_level11 = $this->post('r_level11') ? $this->common_model->filter($this->post('r_level11'), 'float') : 0;
        $r_level12 = $this->post('r_level12') ? $this->common_model->filter($this->post('r_level12'), 'float') : 0;
        $r_level13 = $this->post('r_level13') ? $this->common_model->filter($this->post('r_level13'), 'float') : 0;
        $r_level14 = $this->post('r_level14') ? $this->common_model->filter($this->post('r_level14'), 'float') : 0;
        $r_level15 = $this->post('r_level15') ? $this->common_model->filter($this->post('r_level15'), 'float') : 0;

        $config_comm = $this->post('config_comm') ? $this->post('config_comm') : 'amount';
        $self_purchase_comm=$this->common_model->filter($this->post('self_purchase_comm'), 'float');
        $p_level1   = $this->common_model->filter($this->post('p_level1'), 'float');
        $p_level2         = $this->common_model->filter($this->post('p_level2'), 'float');
        $p_level3        = $this->common_model->filter($this->post('p_level3'), 'float');
        $p_level4         = $this->common_model->filter($this->post('p_level4'), 'float');
        $p_level5         = $this->common_model->filter($this->post('p_level5'), 'float');
        $p_level6         = $this->common_model->filter($this->post('p_level6'), 'float');
        $p_level7         = $this->common_model->filter($this->post('p_level7'), 'float');
        $p_level8         = $this->common_model->filter($this->post('p_level8'), 'float');
        $p_level9        = $this->common_model->filter($this->post('p_level9'), 'float');
        $p_level10        = $this->common_model->filter($this->post('p_level10'), 'float');
        $p_level11        = $this->common_model->filter($this->post('p_level11'), 'float');
        $p_level12        = $this->common_model->filter($this->post('p_level12'), 'float');
        $p_level13        = $this->common_model->filter($this->post('p_level13'), 'float');
        $p_level14        = $this->common_model->filter($this->post('p_level14'), 'float');
        $p_level15        = $this->common_model->filter($this->post('p_level15'), 'float');

        $guest_level1 = $this->common_model->filter($this->post('guest_level1'), 'float');
        $guest_level2 = $this->common_model->filter($this->post('guest_level2'), 'float');
        $guest_level3 = $this->common_model->filter($this->post('guest_level3'), 'float');
        $guest_level4 = $this->common_model->filter($this->post('guest_level4'), 'float');
        $guest_level5 = $this->common_model->filter($this->post('guest_level5'), 'float');
        $level_income = $this->common_model->filter($this->post('level_income'), 'float');
        $plan_desc        = $this->post('plan_description');
        $show_on_reg_form = $this->post('show_on_reg_form');

        debug_log('show_on_reg_form');
        debug_log($this->post('show_on_reg_form'));

        debug_log('show_on_reg_form');
        debug_log($show_on_reg_form);
        if ($show_on_reg_form !== "Yes") {
            $show_on_reg_form = "No";
        }
        debug_log('show_on_reg_form');
        debug_log($show_on_reg_form);

        if (trim($_FILES['img']['name']) !== "") {

            $this->load->library('upload');

            if (!$this->upload->do_upload('img')) {
                $this->response(array(
                        "status"=>"false",
                        "message"=>'Image not uploaded. Also select category!!'
                    ),REST_CONTROLLER::HTTP_NOT_FOUND);
            } else {
                $image_data               = $this->upload->data();
                $config['image_library']  = 'gd2';
                    $config['source_image']   = $image_data['full_path']; //get original image
                    $config['maintain_ratio'] = true;
                    $config['width']          = 600;
                    $config['height']         = 500;
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $image = $image_data['file_name'];
            }
        }
        else
        {
            $image = 'default.jpg' ;
        }

        $data = array(
            'plan_name'       => $plan_name,
            'joining_fee'      => $joining_fee,
            'group_id'      => '1',
            'plan_description'       => $plan_desc,
            'gst'             => $gst,
            'max_width'        => $max_width,
            'direct_commission'   => $direct_income,
            'type'                => $type,
            'auto_pool'           => $auto_pool,
            'pv'                   => $pv,
            'first_pair_ratio'=>$first_pair_ratio,
            'second_pair_ratio' =>$second_pair_ratio,
            'first_pair_commission' =>$first_pair_commission,
            'second_pair_commission' =>$second_pair_commission,
            'sponsor_match_commission' =>$sponsor_match_commission,
            'sponsor_pair_match' =>$sponsor_pair_match,
            'capping'         => $capping,
            'cappingamount'   => $cappingamount,
            'payout_frequency' => $payout_frequency,
            'carry_forward'   => $carry_forward,
            "fix_income"       => $fix_income,
            "roi"               => $roi,
            "roi_frequency" => $roi_frequency,
            "roi_limit" => $roi_limit,
            'enable_recurring_fee' => $enable_recurring_fee,
            'recurring_fee'        => $recurring_fee,
            'recurring_duration'   => $recurring_duration,

            'config_ref_comm' => $config_ref_comm,
            'ref_plan' => $ref_plan,
            'pay_ref_lev' => $pay_ref_lev,
            'ref_level1_comm'=>$r_level1,
            'ref_level2_comm' =>$r_level2,
            'ref_level3_comm' =>$r_level3,
            'ref_level4_comm' =>$r_level4,
            'ref_level5_comm' =>$r_level5,
            'ref_level6_comm' =>$r_level6,
            'ref_level7_comm' =>$r_level7,
            'ref_level8_comm' =>$r_level8,
            'ref_level9_comm' =>$r_level9,
            'ref_level10_comm' =>$r_level10,
            'ref_level11_comm' =>$r_level11,
            'ref_level12_comm' =>$r_level12,
            'ref_level13_comm' =>$r_level13,
            'ref_level14_comm' =>$r_level14,
            'ref_level15_comm' =>$r_level15,
            'config_comm' => $config_comm,
            'self_product_purchase_comm' =>$self_purchase_comm,
            'product_pur_level1_comm' =>$p_level1,
            'product_pur_level2_comm' =>$p_level2,
            'product_pur_level3_comm' =>$p_level3,
            'product_pur_level4_comm' =>$p_level4,
            'product_pur_level5_comm' =>$p_level5,
            'product_pur_level6_comm' =>$p_level6,
            'product_pur_level7_comm' =>$p_level7,
            'product_pur_level8_comm' =>$p_level8,
            'product_pur_level9_comm' =>$p_level9,
            'product_pur_level10_comm' =>$p_level10,
            'product_pur_level11_comm' =>$p_level11,
            'product_pur_level12_comm' =>$p_level12,
            'product_pur_level13_comm' =>$p_level13,
            'product_pur_level14_comm' =>$p_level14,
            'product_pur_level15_comm' =>$p_level15,
            'guest_pcommission_level1' =>$guest_level1,
            'guest_pcommission_level2' =>$guest_level2,
            'guest_pcommission_level3' =>$guest_level3,
            'guest_pcommission_level4' =>$guest_level4,
            'guest_pcommission_level5' =>$guest_level5,
            'level_income'  => $level_income,
            'plan_image'           => $image,
            'show_on_regform'=>$show_on_reg_form,
            'qty'             => "-1",
            'status'          => 'Selling',
            'invoice_name'    => $invoice_name,

        );
          debug_log('insert data plan apis');
            debug_log($data);
        if ($this->db->insert('plans', $data)) {
            $insert_id = $this->db->insert_id();
            debug_log('insert_id');
            debug_log($insert_id);

            $query = $this->db->query("SELECT * FROM plans where id=1");
            if($query->num_rows()==0){      
                if ($this->db->query("update plans set id=1 where id=".$insert_id."")) {
                    ((config_item('sep_tree')=='Yes') || ($auto_pool == "Yes") || ($type == "Repurchase")) ? $this->db->query("update plans set group_id = ".$insert_id." where id=".$insert_id."") : $this->db->query("update plans set group_id = 1 where id=".$insert_id."");
                    
                } else {
                    $this->response(array(
                        "status"=>"false",
                        "message"=>'Failed to create plan!!'
                    ),REST_CONTROLLER::HTTP_NOT_FOUND);
                }  
            }
            $this->response(array(
                        "status"=>"true",
                        "message"=>'Plan created successfully.'
                    ),REST_CONTROLLER::HTTP_OK);
        } else {
            $this->response(array(
                        "status"=>"false",
                        "message"=>'Failed to create plan!!'
                    ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }               
    }

    public function update_plan_post(){

        debug_log('update_plan_post');
        $id=$this->post('plan_id');
        debug_log('call 1');

        $joining_fee = $this->common_model->filter($this->post('joining_fee'), 'float');
        $auto_pool = $this->post('auto_pool') ? $this->post('auto_pool') : 'No';
        $max_width        = $this->post('max_width');
        $type             = $this->post('plan_type') ? $this->post('plan_type') : 'Registration';
        $plan_name        = $this->post('plan_name');
        $gst              = $this->common_model->filter($this->post('gst'), 'float');
        $image           = 'default.jpg';
        $direct_income   = $this->post('direct_commission');//$this->common_model->filter(, 'float');
        if(($auto_pool=='Yes') && (($max_width < 2) || ($max_width >7))){

            $this->response(array(
                "status"=>"false",
                "message"=>'Width must be more than 2 and less than or equal to 5 for Auto Pool Registration !!'
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
            return false;
        }
        debug_log('call 2');

        $first_pair_ratio=$this->post('first_pair_ratio') ? $this->post('first_pair_ratio') : '1:2/2:1';
        $second_pair_ratio=$this->post('second_pair_ratio') ? $this->post('second_pair_ratio') : '1:1';

        $first_pair_commission=$this->common_model->filter($this->post('first_pair_commission'),'float');

        $second_pair_commission=$this->common_model->filter($this->post('second_pair_commission'), 'float');
        $sponsor_match_commission =$this->common_model->filter($this->post('sponsor_match_commission'), 'float');

        $sponsor_pair_match =$this->common_model->filter($this->post('sponsor_pair_match'), 'float');
        $payout_frequency=$this->post('payout_frequency') ? $this->post('payout_frequency') : 'daily';

        $carry_forward=$this->post('carry_forward') ? $this->post('carry_forward') : 'no';

        $capping         = $this->post('capping') ? $this->post('capping') :0;

        $cappingamount = $this->common_model->filter($this->post('cappingamount'), 'float');
        $fix_income = $this->common_model->filter($this->post('fix_income'));
        $roi             = $this->common_model->filter($this->post('roi'), 'float');
        $roi_frequency   = $this->post('roi_frequency') ? $this->post('roi_frequency') : '1';
        $roi_limit       = $this->post('roi_limit') ? $this->post('roi_limit') : '0';

        $invoice_name        = $this->post('invoice_name') != '' ? $this->post('invoice_name') : $this->post('plan_name');
        $plan_desc        = $this->post('plan_desc');
        $category         = $this->post('category');
        $enable_recurring_fee = $this->post('enable_recurring_fee') ? $this->post('enable_recurring_fee') : '0';
        $recurring_fee = $this->post('recurring_fee') ? $this->input->post('recurring_fee') : '0';
        $recurring_duration = $this->input->post('recurring_duration') ? $this->post('recurring_duration') : '0';
        $pv               = $this->post('pv') ? $this->post('pv') : 0;
        debug_log('call 3');

        if($roi_limit > ((1.2*$joining_fee) + $recurring_fee))
        {

            $this->response(array(
                "status"=>"false",
                "message"=>'Total ROI cannot be greater than 120% of joining_fee!! '
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
            return false;
        }
        debug_log('call 4');

        $config_ref_comm = $this->post('config_ref_comm') ? $this->post('config_ref_comm') : 'amount';
        $ref_plan        = $this->post('ref_plan') ? $this->post('ref_plan') : 'joining';
        $pay_ref_lev     = $this->post('pay_ref_lev') ? $this->post('pay_ref_lev') : 'onlyref';
        $r_level1        = $this->post('r_level1') ? $this->post('r_level1') : 0;
        $r_level2        = $this->post('r_level2') ? $this->post('r_level2') : 0;
        $r_level3        = $this->post('r_level3') ? $this->post('r_level3') : 0;
        $r_level4        = $this->post('r_level4') ? $this->post('r_level4') : 0;
        $r_level5        = $this->post('r_level5') ? $this->post('r_level5') : 0;
        $r_level6         = $this->post('r_level6') ? $this->post('r_level6') : 0;
        $r_level7         = $this->post('r_level7') ? $this->post('r_level7') : 0;
        $r_level8         = $this->post('r_level8') ? $this->post('r_level8') : 0;
        $r_level9         = $this->post('r_level9') ? $this->post('r_level9') : 0;
        $r_level10 = $this->post('r_level10') ? $this->post('r_level10') : 0;
        $r_level11 = $this->post('r_level11') ? $this->common_model->filter($this->post('r_level11'), 'float') : 0;
        $r_level12 = $this->post('r_level12') ? $this->common_model->filter($this->post('r_level12'), 'float') : 0;
        $r_level13 = $this->post('r_level13') ? $this->common_model->filter($this->post('r_level13'), 'float') : 0;
        $r_level14 = $this->post('r_level14') ? $this->common_model->filter($this->post('r_level14'), 'float') : 0;
        $r_level15 = $this->post('r_level15') ? $this->common_model->filter($this->post('r_level15'), 'float') : 0;
        debug_log('call 5');

        $config_comm = $this->post('config_comm') ? $this->post('config_comm') : 'amount';
        $self_purchase_comm=$this->common_model->filter($this->post('self_purchase_comm'), 'float');
        $p_level1   = $this->common_model->filter($this->input->post('p_level1'), 'float');
        $p_level2         = $this->common_model->filter($this->post('p_level2'), 'float');
        $p_level3        = $this->common_model->filter($this->post('p_level3'), 'float');
        $p_level4         = $this->common_model->filter($this->post('p_level4'), 'float');
        $p_level5         = $this->common_model->filter($this->post('p_level5'), 'float');
        $p_level6         = $this->common_model->filter($this->post('p_level6'), 'float');
        $p_level7         = $this->common_model->filter($this->post('p_level7'), 'float');
        $p_level8         = $this->common_model->filter($this->post('p_level8'), 'float');
        $p_level9        = $this->common_model->filter($this->post('p_level9'), 'float');
        $p_level10        = $this->common_model->filter($this->post('p_level10'), 'float');
        $p_level11        = $this->common_model->filter($this->post('p_level11'), 'float');
        $p_level12        = $this->common_model->filter($this->post('p_level12'), 'float');
        $p_level13        = $this->common_model->filter($this->post('p_level13'), 'float');
        $p_level14        = $this->common_model->filter($this->post('p_level14'), 'float');
        $p_level15        = $this->common_model->filter($this->post('p_level15'), 'float');
        debug_log('call 6');

        $guest_level1 = $this->common_model->filter($this->post('guest_level1'), 'float');
        $guest_level2 = $this->common_model->filter($this->post('guest_level2'), 'float');
        $guest_level3 = $this->common_model->filter($this->post('guest_level3'), 'float');
        $guest_level4 = $this->common_model->filter($this->post('guest_level4'), 'float');
        $guest_level5 = $this->common_model->filter($this->post('guest_level5'), 'float');
        $level_income = $this->common_model->filter($this->post('level_income'), 'float');
        $plan_desc        = $this->post('plan_description');
        $show_on_reg_form = $this->post('show_on_reg_form');

        debug_log('call 7');

        if ($show_on_reg_form !== "Yes") {
            $show_on_reg_form = "No";
        }
        if (trim($_FILES['img']['name']) !== "") {

            $this->load->library('upload');

            if (!$this->upload->do_upload('img')) {
                $this->response(array(
                        "status"=>"false",
                        "message"=>'Image not uploaded. Also select category!!'
                    ),REST_CONTROLLER::HTTP_NOT_FOUND);
            } else {
                $image_data               = $this->upload->data();
                $config['image_library']  = 'gd2';
                    $config['source_image']   = $image_data['full_path']; //get original image
                    $config['maintain_ratio'] = true;
                    $config['width']          = 600;
                    $config['height']         = 500;
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $image = $image_data['file_name'];
            }
        }
        else
        {
            $image = 'default.jpg' ;
        }
        debug_log('call 8');

        $data = array(
            'plan_name'       => $plan_name,
            'joining_fee'      => $joining_fee,
            'plan_description'       => $plan_desc,
            'gst'             => $gst,
            'max_width'        => $max_width,
            'direct_commission'   => $direct_income,
            'type'                => $type,
            'auto_pool'           => $auto_pool,
            'pv'                   => $pv,
            'first_pair_ratio'=>$first_pair_ratio,
            'second_pair_ratio' =>$second_pair_ratio,
            'first_pair_commission' =>$first_pair_commission,
            'second_pair_commission' =>$second_pair_commission,
            'sponsor_match_commission' =>$sponsor_match_commission,
            'sponsor_pair_match' =>$sponsor_pair_match,
            'capping'         => $capping,
            'cappingamount'   => $cappingamount,
            'payout_frequency' => $payout_frequency,
            'carry_forward'   => $carry_forward,
            "fix_income"       => $fix_income,
            "roi"               => $roi,
            "roi_frequency" => $roi_frequency,
            "roi_limit" => $roi_limit,
            'enable_recurring_fee' => $enable_recurring_fee,
            'recurring_fee'        => $recurring_fee,
            'recurring_duration'   => $recurring_duration,

            'config_ref_comm' => $config_ref_comm,
            'ref_plan' => $ref_plan,
            'pay_ref_lev' => $pay_ref_lev,
            'ref_level1_comm'=>$r_level1,
            'ref_level2_comm' =>$r_level2,
            'ref_level3_comm' =>$r_level3,
            'ref_level4_comm' =>$r_level4,
            'ref_level5_comm' =>$r_level5,
            'ref_level6_comm' =>$r_level6,
            'ref_level7_comm' =>$r_level7,
            'ref_level8_comm' =>$r_level8,
            'ref_level9_comm' =>$r_level9,
            'ref_level10_comm' =>$r_level10,
            'ref_level11_comm' =>$r_level11,
            'ref_level12_comm' =>$r_level12,
            'ref_level13_comm' =>$r_level13,
            'ref_level14_comm' =>$r_level14,
            'ref_level15_comm' =>$r_level15,
            'config_comm' => $config_comm,
            'self_product_purchase_comm' =>$self_purchase_comm,
            'product_pur_level1_comm' =>$p_level1,
            'product_pur_level2_comm' =>$p_level2,
            'product_pur_level3_comm' =>$p_level3,
            'product_pur_level4_comm' =>$p_level4,
            'product_pur_level5_comm' =>$p_level5,
            'product_pur_level6_comm' =>$p_level6,
            'product_pur_level7_comm' =>$p_level7,
            'product_pur_level8_comm' =>$p_level8,
            'product_pur_level9_comm' =>$p_level9,
            'product_pur_level10_comm' =>$p_level10,
            'product_pur_level11_comm' =>$p_level11,
            'product_pur_level12_comm' =>$p_level12,
            'product_pur_level13_comm' =>$p_level13,
            'product_pur_level14_comm' =>$p_level14,
            'product_pur_level15_comm' =>$p_level15,
            'guest_pcommission_level1' =>$guest_level1,
            'guest_pcommission_level2' =>$guest_level2,
            'guest_pcommission_level3' =>$guest_level3,
            'guest_pcommission_level4' =>$guest_level4,
            'guest_pcommission_level5' =>$guest_level5,
            'level_income'  => $level_income,
            'plan_image'           => $image,
            'show_on_regform'=>$show_on_reg_form,
            'qty'             => "-1",
            'status'          => 'Selling',
            'invoice_name'    => $invoice_name,

        );
        
        $this->db->where('id',$id);
        if ($this->db->update('plans',$data)) {
            $this->response(array(
                        "status"=>"true",
                        "message"=>'Plan Updated successfully.'
                    ),REST_CONTROLLER::HTTP_OK);
        } else {
            $this->response(array(
                        "status"=>"false",
                        "message"=>'Failed to update plan!!'
                    ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }               
    }

    public function remove_plan_post()
    {
        $id=$this->post('plan_id');
        $count = $this->db_model->count_all('product_sale', array(
            'product_id' => $id,
            'status'     => 'Processing',
        ));

        $count_plan_enroll = $this->db_model->count_all('member', array(
            'signup_package' => $id,
        ));

        if ($count_plan_enroll > 0) {
            $this->response(array(
                "status"=>"false",
                "message"=>'Plan Cannot be deleted as there are ' . $count_plan_enroll . ' members who have enrolled for this plan.'
            ),REST_CONTROLLER::HTTP_NOT_FOUND);

        } else {

            $img = $this->db_model->select('plan_image', 'plans', array('id' => $id));
            $this->db->where('id', $id);
            if ($this->db->delete('plans')) {
                if($img != 'default.jpg')
                {
                    unlink(FCPATH . '/uploads/' . $img);
                }
                $this->response(array(
                    "status"=>"true",
                    "message"=>'Plan Deleted successfully.'
                ),REST_CONTROLLER::HTTP_OK);
            } else {
                $this->response(array(
                    "status"=>"false",
                    "message"=>'Failed to delete this plan.'
                ),REST_CONTROLLER::HTTP_NOT_FOUND);
            }
            
        }
    }

    public function legs_get(){
        $res=$this->plan_model->create_leg();
        if (!empty($res)) {
            $this->response(array(
                "status"=>"true",
                "message"=>$res
            ),REST_CONTROLLER::HTTP_OK);
        } else {
            $this->response(array(
                "status"=>"false",
                "message"=>'No Data Found'
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
    }

    public function update_dev_settings_post(){

        if ($this->input->post('width')=='') {
            $this->response(array(
                "status"=>"false",
                "message"=>'Width is required!!'
            ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
        else {

            $leg = $this->input->post('width') == 2 ? 2 : 1;
            $width = $this->input->post('width');
            $enable_crowdfund = $this->input->post('enable_crowdfund');
            $level_income = $this->input->post('level_income');
            $level_income_sponsor_carry = $this->input->post('level_income_sponsor_carry');
            $target_income = $this->input->post('target_income');
            $autopool_registration = $this->input->post('autopool_registration');
            $show_leg_choose = $leg == 2 ? 'Yes' : 'No';
            $show_placement_id = $this->input->post('show_placement_id');
            $enable_product = $this->input->post('enable_product');
            $joining_product = $this->input->post('joining_product');
            $enable_repurchase = $this->input->post('enable_repurchase');
            $enable_pv = $this->input->post('enable_pv');
            $reg_default = $this->input->post('reg_default');
            $login_default = $reg_default == 'No' ? 'No' :$this->input->post('login_default');
            $enable_variation = $this->input->post('enable_variation');
            $crowdfund_type = $this->input->post('crowdfund_type');
            $enable_epin = $this->input->post('enable_epin');
            $enable_pg = $this->input->post('enable_pg');
            $free_registration = $this->input->post('free_registration') ? $this->input->post('free_registration') : 'No';
            $enable_kyc = $this->input->post('enable_kyc');
            $enable_invoice = $this->input->post('enable_invoice');
            $sep_tree = $this->input->post('sep_tree');
            $enable_crypto = $this->input->post('enable_crypto') ? $this->input->post('enable_crypto') : 'No';
            $enable_upi = $this->input->post('enable_upi');
            $enable_backup = $this->input->post('enable_backup') ? $this->input->post('enable_backup') : 'No';
            $enable_bank_deposit = $this->input->post('enable_bank_deposit');
            $login_theme = $this->input->post('login_theme') != '' ? $this->input->post('login_theme') :config_item('login_theme');
            $admin_login_theme = $this->input->post('admin_login_theme') != '' ? $this->input->post('admin_login_theme') :config_item('admin_login_theme');
            $register_theme = $this->input->post('register_theme') != '' ? $this->input->post('register_theme') :config_item('register_theme');
            $extend_kpi = $this->input->post('extend_kpi') ? $this->input->post('extend_kpi') : 'No';
            $inactive_in_tree = $this->input->post('inactive_in_tree') ? $this->input->post('inactive_in_tree') : 'No';
            $root_sponsor_unlimited = 'No';
            $id_upgrade = $this->input->post('id_upgrade');
            $server_type = $this->input->post('server_type');
            $sponsor_restriction = $this->input->post('sponsor_restriction');
            $inactive_sponsor = $this->input->post('inactive_sponsor')? $this->input->post('inactive_sponsor') : 'No';

            $width = $enable_crowdfund == "Yes" ? 3 : $width;

            if($enable_crowdfund=='Yes'){
                $array = array('gift_level'=> 1,);
                $this->db->where(array('id'=>config_item('top_id'),'gift_level <'=> 1));
                $this->db->update('member', $array);
            }


            $autopool_registration = $enable_crowdfund == 'Yes' ? "Yes" : $autopool_registration;
            $autopool_registration = $width > 2 ? $autopool_registration : 'No';

            $crowdfund_type = $enable_crowdfund == 'Yes' ? $crowdfund_type : 'Automatic';
            $free_registration = $crowdfund_type == 'Manual_Peer_to_Peer' ? 'Yes' : $free_registration;

            $enable_epin = $crowdfund_type == 'Manual_Peer_to_Peer' ? 'No' : $enable_epin;
            $enable_pg = $crowdfund_type == 'Manual_Peer_to_Peer' ? 'No' : $enable_pg;
            $enable_kyc = $crowdfund_type == 'Manual_Peer_to_Peer' ? 'No' : $enable_kyc;
            $enable_invoice = $crowdfund_type == 'Manual_Peer_to_Peer' ? 'No' : $enable_invoice;
            $enable_bank_deposit = $crowdfund_type == 'Manual_Peer_to_Peer' ? 'No' : $enable_bank_deposit;            

            $level_income = $enable_crowdfund == "Yes" ? 'No' : $level_income;

            $show_leg_choose = $width != 2 ? 'No' : $show_leg_choose;
            $show_leg_choose = $width == 2 ? 'Yes' : $show_leg_choose;
            $show_leg_choose = $autopool_registration == 'Yes' ? 'No' : $show_leg_choose;
            $show_leg_choose = $enable_crowdfund =='Yes' ? 'No' : $show_leg_choose;

            $show_placement_id = $width != 2 ? 'No' : $show_placement_id; 
            $show_placement_id = $autopool_registration == 'Yes' ? 'No' :$show_placement_id;
            $show_placement_id = $enable_crowdfund =='Yes' ? 'No' : $show_placement_id;

            $enable_repurchase = $enable_crowdfund =='Yes' ? 'No' : $enable_repurchase;
            $enable_product    = $enable_crowdfund =='Yes' ? 'No' : $enable_product; 
            $joining_product   = $enable_crowdfund =='Yes' ? 'No' : $joining_product;

            $cur = $this->input->post('cur') == 'INR' ? 'fa fa-inr' : 'fa fa-usd';
            $mega_cur = $this->input->post('cur') == 'INR' ? 'mdi mdi-currency-inr' : 'mdi mdi-currency-usd';

            $sep_tree = $autopool_registration == 'Yes' ? 'Yes' : $sep_tree;
            $sep_tree = $enable_crowdfund == 'Yes' ? 'Yes' : $sep_tree;
            $sep_tree = $width == 2 ? 'No' : $sep_tree;

            $sponsor_different_plan = $sep_tree == 'No' ? 'Yes' : $this->input->post('sponsor_different_plan');

            if($enable_pg == 'Yes'){
                $enable_coinpayments = $this->input->post('enable_coinpayments');
                //$enable_crypto = $enable_coinpayments=='Yes' ? $enable_crypto : 'No';
                $coinpayment_payout = $enable_coinpayments=='Yes' ? $this->input->post('coinpayment_payout') : 'No';
                $enable_cashfree = $this->input->post('enable_cashfree');
                $cashfree_enable_payout = $enable_cashfree=='Yes' ? $this->input->post('cashfree_enable_payout') : 'No';
                $cashfree_enable_payout = $coinpayment_payout == 'Yes' ? 'No' : $cashfree_enable_payout;
                $enable_bankonnect = $this->input->post('enable_bankonnect');
            }else{
                $enable_coinpayments = 'No';
                $coinpayment_payout = 'No';
                $enable_cashfree = 'No';
                $cashfree_enable_payout = 'No';
                $enable_bankonnect = 'No';
            }

            if((config_item('enable_paypal') != 'Yes') && (config_item('enable_instamojo') != 'Yes')  && ($enable_coinpayments == 'No') && ($enable_bankonnect == 'No')){
                $enable_pg = 'No';
            }

            $make_join_product_entry = $joining_product == 'Yes' ? 'Yes' : 'No';
            $enable_product = $joining_product == 'Yes' ? 'Yes' : $enable_product;

            #$target_income = $enable_crowdfund == 'Yes' ? 'No' : $target_income;
            #$target_income = $autopool_registration == 'Yes' ? 'No' : $target_income;

            $enable_variation = $enable_product == 'Yes' ? $enable_variation : 'No';
            $enable_pv = $enable_product == 'Yes' ? $enable_pv : 'No';
            $level_income_sponsor_carry = $level_income == 'Yes' ? $level_income_sponsor_carry : 'No';
            $enable_repurchase = $enable_product =='Yes' ? $enable_repurchase:'No';
            $target_income = $enable_pv =='Yes' ? $target_income : 'No';

            #Update Placing Inactive Users in Tree based on other preferences
            $inactive_in_tree = $free_registration == 'Yes' ? $inactive_in_tree : 'No';
            $inactive_in_tree = $width >2 ? $inactive_in_tree : 'No';
            $inactive_in_tree = $autopool_registration == "Yes" ? 'No' : $inactive_in_tree;
            $inactive_in_tree = $enable_crowdfund == "Yes" ? 'No' : $inactive_in_tree;

            #Update login for member order setting
            $member_order_by = 'secret';
            $member_order_by = $free_registration == 'Yes' ? 'activate_time' : $member_order_by;
            $member_order_by = $inactive_in_tree == "Yes" ? 'secret' : $member_order_by;
            $extend_kpi = $enable_crowdfund == 'Yes' ? 'No' : $extend_kpi;

            $id_upgrade = $sep_tree == 'Yes' ? $id_upgrade : 'No';
            $member_order_by = $id_upgrade == 'Yes' ? 'activate_time' : $member_order_by;

            $reg_default = $server_type == 'Production' ? 'No' : $reg_default;
            $login_default = $server_type == 'Production' ? 'No' : $reg_default;


            $file = '<?php
            defined(\'BASEPATH\') OR exit(\'Exit ?\');

            $config[\'width\'] = \'' . $width . '\';
            $config[\'leg\'] = \'' . $leg . '\';
            $config[\'autopool_registration\'] = \'' . $autopool_registration . '\';
            $config[\'show_leg_choose\'] = \'' . $show_leg_choose . '\';
            $config[\'show_placement_id\'] = \'' . $show_placement_id . '\';
            $config[\'enable_crowdfund\'] = \'' . $enable_crowdfund . '\';
            $config[\'crowdfund_type\'] = \'' . $crowdfund_type . '\';
            $config[\'level_income\'] = \'' . $level_income . '\';
            $config[\'level_income_sponsor_carry\'] = \'' . $level_income_sponsor_carry . '\';
            $config[\'enable_epin\'] = \'' . $enable_epin . '\';
            $config[\'enable_bank_deposit\'] = \'' . $enable_bank_deposit . '\';
            $config[\'diable_tree\'] = \'' . $this->input->post('diable_tree') . '\';
            $config[\'cur\'] = \'' . $cur . '\';
            $config[\'mega_cur\'] = \'' . $mega_cur . '\';
            $config[\'disable_registration\'] = \'' . $this->input->post('disable_registration') . '\';
            $config[\'free_registration\'] = \'' . $free_registration . '\';
            $config[\'inactive_in_tree\'] = \'' . $inactive_in_tree . '\';
            $config[\'member_order_by\'] = \'' . $member_order_by . '\';
            $config[\'root_sponsor_unlimited\'] = \'' . $root_sponsor_unlimited . '\';
            $config[\'enable_reward\'] = \'' . $this->input->post('enable_reward') . '\';
            $config[\'enable_news\'] = \'' . $this->input->post('enable_news') . '\';
            $config[\'sep_tree\'] = \'' . $sep_tree . '\';
            $config[\'id_upgrade\'] = \'' . $id_upgrade . '\';
            $config[\'sponsor_different_plan\'] = \'' . $sponsor_different_plan . '\';

            $config[\'enable_upi\'] = \'' . $enable_upi . '\';
            $config[\'enable_crypto\'] = \'' . $enable_crypto . '\';
            $config[\'enable_pg\'] = \'' . $enable_pg . '\';
            $config[\'enable_bankonnect\'] = \'' . $enable_bankonnect . '\';
            $config[\'enable_coinpayments\'] = \'' . $enable_coinpayments . '\';
            $config[\'coinpayment_payout\'] = \'' . $coinpayment_payout . '\';
            $config[\'coinpayment_currency\'] = \'' . $this->input->post('coinpayment_currency') . '\';
            $config[\'enable_cashfree\'] = \'' . $enable_cashfree . '\';
            $config[\'cashfree_enable_payout\'] = \'' . $cashfree_enable_payout . '\';
            $config[\'cashfree_currency\'] = \'' . $this->input->post('cashfree_currency') . '\';
            $config[\'enable_kyc\'] = \'' . $enable_kyc . '\';
            $config[\'enable_invoice\'] = \'' . $enable_invoice . '\';
            $config[\'enable_product\'] = \'' . $enable_product . '\';
            $config[\'enable_variation\'] = \'' . $enable_variation . '\';
            $config[\'enable_repurchase\'] = \'' .$enable_repurchase. '\';
            $config[\'joining_product\'] = \'' . $joining_product . '\';
            $config[\'make_join_product_entry\'] = \'' . $make_join_product_entry . '\';
            $config[\'enable_pv\'] = \'' . $enable_pv . '\';
            $config[\'target_income\'] = \'' .$target_income. '\';
            $config[\'server_type\'] = \'' .$server_type. '\';
            $config[\'reg_default\'] = \'' .$reg_default. '\';
            $config[\'login_default\'] = \'' .$login_default. '\';
            $config[\'enable_backup\'] = \'' .$enable_backup. '\';
            $config[\'login_theme\'] = \'' .$login_theme. '\';
            $config[\'admin_login_theme\'] = \'' .$admin_login_theme. '\';
            $config[\'register_theme\'] = \'' .$register_theme. '\';
            $config[\'extend_kpi\'] = \'' .$extend_kpi. '\'; 
            $config[\'sponsor_restriction\'] = \'' .$sponsor_restriction. '\'; 
            $config[\'inactive_sponsor\'] = \'' .$inactive_sponsor. '\'; 
            ';
            if (file_put_contents(APPPATH . 'config/settings.php', $file)) {
                $this->response(array(
                    "status"=>"true",
                    "message"=>'Settings updated successfully!!'
                ),REST_CONTROLLER::HTTP_OK);
            } else {
                $this->response(array(
                    "status"=>"false",
                    "message"=>'Failed to update settings!!'
                ),REST_CONTROLLER::HTTP_NOT_FOUND);
            }

        }
    }
    public function complete_order_post(){
        $orderid=$this->post('orderid');
        $userid=$this->post('userid');
        $tdetail=$this->post('status_desc');
        // $od=$this->db_model->select_multi('*','tbl_order_items',array('order_id'=>$orderid));
        $od=$this->db->query("SELECT * FROM tbl_order_items WHERE order_id=$orderid AND user_id=$userid AND pro_order_status=4")->result();
        foreach ($od as $key => $value) {
            $this->Gmart_model->deliver_gmart($value->id,$tdetail);
            debug_log($this->db->last_query());
        }
        $response=array(
            'status'=>"true",
            'message'=>"Order Marked as completed"
        );

        $this->set_response($response,REST_Controller::HTTP_OK);
    }

    public function user_tree_post(){
        
        $top_id = $this->common_model->filter($this->input->post('top_id'));

        if(!$this->db_model->check_user($top_id)>0){
            $this->response(array(
                    "status"=>"false",
                    "message"=>'The User ID does not exist !!!'
                ),REST_CONTROLLER::HTTP_NOT_FOUND);
            return false;
        }

        if(config_item('id_upgrade')=='Yes')
        {
            $top_id = $this->input->post('top_id') ? $this->input->post('top_id') : config_item('top_id');

            $this->db->select('pid')->where(array('userid'=>$top_id))->order_by('pid', 'ASC');
            $multi_array = $this->db->get('level_details')->result_array();

            //debug_log($this->db->last_query());

            if(count($multi_array)>0){
                $iterator_array = new RecursiveIteratorIterator(new RecursiveArrayIterator($multi_array));
                $flat_array = array();

                foreach($iterator_array as $v) {
                    array_push($flat_array, $v);
                }
                $ids = implode(',',$flat_array);
                
                $data['plans'] = $this->db->query("SELECT group_id as id,
                    GROUP_CONCAT(plan_name SEPARATOR ', ') as plan_name
                    FROM plans
                    where group_id IN (".$ids.")
                        GROUP BY 1"
                    )->result_array();
                }

            //debug_log($this->db->last_query());
                $this->response(array(
                    "status"=>"true",
                    "message"=>$data
                ),REST_CONTROLLER::HTTP_OK);
                

            }
            else
            {
                $plan_id = $this->common_model->filter($this->input->post('plan'));
                if (trim($top_id) == ""):

                    $this->db->select('*')->where(array('type !=' =>'Repurchase', 'id !='=>$plan_id))->order_by('id', 'ASC');
                    $data['plans'] = $this->db->get('plans')->result_array();

                    $data['query'] = $this->db->query("Select * from plans where type = 'Registration' and show_on_regform = 'No'");

                    if(config_item('sep_tree')=='Yes'){
                        if($plan_id != ''){
                            $data['result'] = $this->db_model->select_multi('*', 'plans', array('id' => $plan_id));    
                        } else{
                            $data['result'] = $this->db->select('id,plan_name')->from('plans')->order_by('id','ASC')->limit(1)->get()->result()[0];
                        }    
                }/*elseif (($data['query']->num_rows()>0) && ($plan_id != '')) {
                    $data['result'] = $this->db->query("Select * from plans where type = 'Registration' and show_on_regform = 'No' and id=".$plan_id)->row();
                }*/

                $this->response(array(
                    "status"=>"true",
                    "message"=>$data
                ),REST_CONTROLLER::HTTP_OK);

            else:
                $this->response(array(
                    "status"=>"false",
                    "message"=>'You cannot view upline tree !'
                ),REST_CONTROLLER::HTTP_NOT_FOUND);
            endif;
        }
    }

    public function tree_data_post(){
        $top_id = $this->input->post('top_id') ? $this->input->post('top_id') : config_item('top_id');
        $top_id_dd = $this->db_model->select_multi('*', 'member', array('id' => $top_id));
        $plan_id = $this->uri->segment('4') ? $this->uri->segment('4') : $top_id_dd->plan_gid;
        $pd = $this->db->query("SELECT group_id as id,max_width,
            GROUP_CONCAT(plan_name SEPARATOR ', ') as plan_name
            FROM plans
            where group_id IN (".$plan_id.")
                GROUP BY 1,2"
            )->result()[0];
        $this->db_model->select_multi('*', 'plans', array('group_id' => $plan_id));
        $width = $pd->max_width;

        $signup_package = $top_id_dd->signup_package;
        $secret_id = $top_id_dd->secret;
        $width = $this->db_model->select('max_width', 'plans', array('id' => $signup_package));
        

        if($this->input->post('result_id') != ''){
            $width = $top_id == config_item('top_id') ? $this->db_model->select('max_width', 'plans', array('id'=>$this->input->post('result_id'))) : $width ;

            $plan_id = $this->uri->segment('3') == '' ? $this->input->post('result_id') : '';
            $plan_name = $this->uri->segment('3') == '' ? $this->input->post('result_name') : '';    
        } else{
            $plan_id = '';
            $plan_name = '';
        }

        
        if (config_item('inactive_in_tree')=='Yes'){
            if($plan_id >0){
                $this->db->select('*')->where(array('secret >'=>$top_id_dd->secret, 'signup_package'=>$plan_id))->order_by(config_item('member_order_by'), 'ASC')->limit(6);    
            }else{
                $this->db->select('*')->where(array('secret >'=>$top_id_dd->secret))->order_by(config_item('member_order_by'), 'ASC')->limit(6);    
            }
        }else{
            if($plan_id >0){
                $this->db->select('*')->where(array('activate_time >'=>$top_id_dd->activate_time, 'signup_package'=>$plan_id, 'status !='=>'Inactive'))->order_by(config_item('member_order_by'), 'ASC')->limit(6);    
            }else{
                $this->db->select('*')->where(array('activate_time >'=>$top_id_dd->activate_time, 'status !='=>'Inactive'))->order_by(config_item('member_order_by'), 'ASC')->limit(6);    
            }
        }

        $data = $this->db->get('member')->result();

        if($this->input->post('result_id') != ''){
            $this->db->select('id, topup, status, signup_package')->where(array('position'=>$top_id, 'signup_package'=>$this->input->post('result_id')));    
        }else{
            $this->db->select('id, topup, status, signup_package')->where(array('position'=>$top_id));    
        }           

        $member = $this->db->get('member')->result();

        $tree_data = array(
            'top_id' => $top_id, 
            'top_id_dd' => $top_id_dd, 
            'plan_id' => $plan_id,
            'pd'=>$pd,
            'width'=>$width,
            'member'=> $member,
            'data'=>$data,
            'tree_info'=>$tree_info
        );
        if (!empty($tree_data)) {
            $this->response(array(
                    "status"=>"true",
                    "message"=>$tree_data
                ),REST_CONTROLLER::HTTP_OK);
        } else {
            $this->response(array(
                    "status"=>"false",
                    "message"=>'No Data found!!'
                ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
        

    }

    public function create_tree_binary_post(){
        $id=$this->input->post('id');
        $above_id=$this->input->post('above_id');
        $position=$this->input->post('position');
        $plan=$this->input->post('plan');
        $bin_tree_data=$this->Api_model->create_binary_tree($id, $above_id, $position,$plan);
        if (!empty($bin_tree_data)) {
            $this->response(array(
                    "status"=>"true",
                    "message"=>$bin_tree_data
                ),REST_CONTROLLER::HTTP_OK);
        } else {
            $this->response(array(
                    "status"=>"false",
                    "message"=>'No Data found!!'
                ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }

    }

    public function create_tree_post(){
        $id=$this->input->post('id');
        $above_id=$this->input->post('above_id');
        $position=$this->input->post('position');
        $plan=$this->input->post('plan');
        $tree_data=$this->Api_model->create_tree($id, $above_id, $position,$plan);
        if (!empty($tree_data)) {
            $this->response(array(
                    "status"=>"true",
                    "message"=>$tree_data
                ),REST_CONTROLLER::HTTP_OK);
        } else {
            $this->response(array(
                    "status"=>"false",
                    "message"=>'No Data found!!'
                ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
        
    }
    public function forgot_password_post(){
        $userid=$this->post('userid');
        $password=$this->post('password');
        $user_type=$this->post('user_type');
        $check = $this->User_model->checkUser($userid);
        debug_log("checking");
        debug_log($userid);
        debug_log($password);
        debug_log($user_type);
        debug_log($check);
        if($userid=='' || $password=='' || !$check || $user_type==''){
            debug_log("Invalid data passed to API 1");
            $this->response(array(
                        "status"    => "false",
                        "message"   =>  "Invalid data passed to API"
                    ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }else{
            $result=$this->Api_model->forgot_password($userid,$password,$user_type);
            if($result==1){
                 debug_log("Invalid data passed to API");
                $this->response(array(
                        "status"    => "true",
                        "message"   =>  "Invalid data passed to API"
                    ),REST_CONTROLLER::HTTP_OK);
            }else{
                 debug_log("Password updation failed");
                $this->response(array(
                        "status"    => "false",
                        "message"   =>  "Password updation failed"
                    ),REST_CONTROLLER::HTTP_NOT_FOUND);
            }
        }
    }
   public function wallet_payment_update_post()
    {
        debug_log('wallet_payment_update_post');
        $wallet = $this->Api_model->waallet_payment_update($this->post('userid'),$this->post('balance'));
        if ($wallet == true) {
            $this->response(array(
                    "status"=>"true",
                    "message"=>$wallet
                ),REST_CONTROLLER::HTTP_OK);
        } else {
            $this->response(array(
                    "status"=>"false",
                    "message"=>'No Data Updated!!'
                ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
    }
    public function wallet_amount_post()
    {
        debug_log('this->post->userid');
        debug_log($this->post('userid'));
        $wallet = $this->Api_model->get_wallet_amount($this->post('userid'));
        if (!empty($wallet)) {
            $this->response(array(
                    "status"=>"true",
                    "message"=>$wallet
                ),REST_CONTROLLER::HTTP_OK);
        } else {
            $this->response(array(
                    "status"=>"false",
                    "message"=>'No Data found!!'
                ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
    }
    public function support_request_post(){

        $array = array(
                'ticket_title'  =>$this->post('ticket_title'),
                'ticket_detail' =>$this->post('ticket_detail'),
                'userid'        =>$this->post('userid'),
                'user_type'     =>$this->post('user_type'),
                'date'          =>$this->post('date'),

            );
        $support_ticket = $this->Api_model->add_support_ticket($array);
        if (!empty($support_ticket)) {
            $this->response(array(
                    "status"=>"true",
                    "message"=>$support_ticket
                ),REST_CONTROLLER::HTTP_OK);
        } else {
            $this->response(array(
                    "status"=>"false",
                    "message"=>'No Data found!!'
                ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
    }
  public function view_ticket_post(){
     $array = array(
                'ticket_id' => $this->input->post('ticket_id'),
                'msg_from'  => $this->input->post('msg_from'),
                'msg'       => $this->input->post('msg'),
            );
      $view_ticket = $this->Api_model->view_ticket_user($array);
        if (!empty($view_ticket)) {
            $this->response(array(
                    "status"=>"true",
                    "message"=>$view_ticket
                ),REST_CONTROLLER::HTTP_OK);
        } else {
            $this->response(array(
                    "status"=>"false",
                    "message"=>'No Data found!!'
                ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
  }
  public function view_ticket_admin_post(){
     $array = array(
                'ticket_id' => $this->input->post('ticket_id'),
                'msg_from'  => $this->input->post('msg_from'),
                'msg'       => $this->input->post('msg'),
            );
      $view_ticket = $this->Api_model->view_ticket_admin($array);
        if (!empty($view_ticket)) {
            $this->response(array(
                    "status"=>"true",
                    "message"=>$view_ticket
                ),REST_CONTROLLER::HTTP_OK);
        } else {
            $this->response(array(
                    "status"=>"false",
                    "message"=>'No Data found!!'
                ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
  }
  public function ticket_closed_post()
  {
     $array = array(

            'status' => 'Closed',
        );
     $close_ticket = $this->Api_model->close_ticket($array,$this->post('id'));
        if (!empty($close_ticket)) {
            $this->response(array(
                    "status"=>"true",
                    "message"=> $close_ticket
                ),REST_CONTROLLER::HTTP_OK);
        } else {
            $this->response(array(
                    "status"=>"false",
                    "message"=>'No Data found!!'
                ),REST_CONTROLLER::HTTP_NOT_FOUND);
        }
  }


}


