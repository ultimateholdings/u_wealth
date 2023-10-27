<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BBPS_recharge extends MY_Controller
{
    /**
     * Check Valid Login or display login page.
     */
    public function __construct()
    {
        parent::__construct();
        if ($this->login->check_session() == FALSE && $this->login->check_member() == FALSE) {
            redirect(site_url('site/login'));
        }
        $this->load->library('pagination');
        // Load Stripe library 
        $this->load->library('stripe_lib'); 
        $this->load->model('payments_model');
        $this->load->model('bbps_model');
        $this->config->load('bbps_api');
        if($this->session->role =='customer'){
            $this->config->set_item("member",config_item('member_customer'));
        }else{
            $this->config->set_item("member",config_item('member_affiliate'));
        }
    } 

    public function index()
    {
      $userid = $this->session->user_id;
      $walletBalance=$this->db_model->select_multi('balance', 'wallet', array('userid' => $userid));
      $balance=$walletBalance->balance;
      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => config_item('biller_categories_api'),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
         'axis-channel-id: SAISEVAK',
         'axis-client-id: 57a2d0c1-5d26-4d80-987a-4793e7d7987a',
         'axis-client-secret: 528b16b9-4f3c-497e-8539-6cfcd41810f4',
         'axis-encryption-key: axisbankaxisbank',
         'axis-salt-key: axisbankaxisbank',
         'axis-channel-password: 5f78716f-8789-4863-8127-1b67bd6b2848',
         'axis-body-channel-id: 664'
       ),
     ));

   $outputdata = curl_exec($curl);
   curl_close($curl);

   $myArray = json_decode($outputdata,true);
   $myInnerArray = $myArray['data'];

   $data['myInnerArray']=$myInnerArray;
   $data['balance']=$balance;

   $this->load->view('templates/bbps_recharge/bbpsrechargepage', $data );
} 

public function getBillerlist($param='')
{
  $postData='{"categoryCode": "'.$param.'"}';
  $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => config_item('biller_list_api'),
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>$postData,
  CURLOPT_HTTPHEADER => array(
    'axis-channel-id: SAISEVAK',
    'axis-client-id: 57a2d0c1-5d26-4d80-987a-4793e7d7987a',
    'axis-client-secret: 528b16b9-4f3c-497e-8539-6cfcd41810f4',
    'axis-encryption-key: axisbankaxisbank',
    'axis-salt-key: axisbankaxisbank',
    'axis-channel-password: 5f78716f-8789-4863-8127-1b67bd6b2848',
    'axis-body-channel-id: 664',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);
curl_close($curl);

$myArray = json_decode($response,true);
$myInnerArray = $myArray['data'];

$response='<label><b>Select Biller</b></label><br /><select class="form-control" id="exampleFormControlSelect"><option>Select Biller </option>';
foreach($myInnerArray as $element){
  $response=$response.'<option value="'.$element['billerId'].'">'.$element['name'].'</option>';
}
$response=$response.'<select>';
echo $response;
}

public function getBillerFields($param1='',$param2='')
{

  $postData='{
    "billerId": "'.$param1.'",
    "categoryCode": "'.$param2.'"
  }';

  $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => config_item('biller_fields_api'),
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>$postData,
  CURLOPT_HTTPHEADER => array(
    'axis-channel-id: SAISEVAK',
    'axis-client-id: 57a2d0c1-5d26-4d80-987a-4793e7d7987a',
    'axis-client-secret: 528b16b9-4f3c-497e-8539-6cfcd41810f4',
    'axis-encryption-key: axisbankaxisbank',
    'axis-salt-key: axisbankaxisbank',
    'axis-channel-password: 5f78716f-8789-4863-8127-1b67bd6b2848',
    'axis-body-channel-id: 664',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);

$myArray = json_decode($response,true);
$myInnerArray = $myArray['data'];

$response='<label><b>Mobile Number</b></label><br /><input type="text" class="form-control" placeholder="Enter Mobile number" required="required" id="mobileNumber" name="mobileNumber"></input><br />';
$i=0;
foreach($myInnerArray as $element){
$i++;
$response=$response.'<label><b>'.$element['name'].'</b></label><br /><input type="text" class="form-control" placeholder="Enter '.$element['name'].'" required="required" id="param'.$i.'" name="'.$element['name'].'"></input>';
}
$response=$response.'<input type="hidden" name="totalParameters" id="totalParameters" value="'.$i.'"></input>';
echo $response;
}

public function getBillFetchRequest($param1='',$param2='',$param3='',$param4='')
{
  $data=str_replace("____",",",$param3);
  $data=urldecode($data);
  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => config_item('bill_fetch_api'),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>'{
      "agent": {
          "app": "",
          "channel": "INT",
          "geocode": "",
          "id": "AX01AI06512391457204",
          "ifsc": "",
          "imei": "",
          "ip": "124.170.23.24",
          "mac": "48-4D-7E-CB-DB-6F",
          "mobile": "",
          "os": "",
          "postalCode": "",
          "terminalId": ""
      },
      "billerId": "'.strval($param1).'",
      "mobileNumber":"'.strval($param2).'",
      "categoryCode": "'.strval($param4).'",
      "customerParams":  [
        '.$data.'
    ]}',
    CURLOPT_HTTPHEADER => array(
      'axis-channel-id: SAISEVAK',
      'axis-client-id: 57a2d0c1-5d26-4d80-987a-4793e7d7987a',
      'axis-client-secret: 528b16b9-4f3c-497e-8539-6cfcd41810f4',
      'axis-encryption-key: axisbankaxisbank',
      'axis-salt-key: axisbankaxisbank',
      'axis-channel-password: 5f78716f-8789-4863-8127-1b67bd6b2848',
      'axis-body-channel-id: 664',
      'Content-Type: application/json'
    ),
  ));
  
  $response = curl_exec($curl);    
  curl_close($curl);
    
  $responseArray = json_decode($response,true);
  $context=$responseArray['data']['context'];
  $this->getFetchedBillRequest($context);
}

public function getFetchedBillRequest($param1='')
{
  $json = array("context" => $param1);
  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => config_item('get_fetched_bill_api'),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_VERBOSE => true,
          CURLOPT_POST => true,
          CURLINFO_HEADER_OUT => true,
    CURLOPT_POSTFIELDS =>json_encode($json),
    CURLOPT_HTTPHEADER => array(
      'axis-channel-id: SAISEVAK',
      'axis-client-id: 57a2d0c1-5d26-4d80-987a-4793e7d7987a',
      'axis-client-secret: 528b16b9-4f3c-497e-8539-6cfcd41810f4',
      'axis-encryption-key: axisbankaxisbank',
      'axis-salt-key: axisbankaxisbank',
      'axis-channel-password: 5f78716f-8789-4863-8127-1b67bd6b2848',
      'axis-body-channel-id: 664',
      'Content-Type: application/json'
    ),
  ));
  $response = curl_exec($curl);
  curl_close($curl);
  $myArray = json_decode($response,true); 
  if(isset($myArray['data']['fetchAPIStatus']))
  {
  $myresponse=$myArray['data']['fetchAPIStatus'];
  $i=0;
  if($myresponse==='Active')
  {
    $billResponse='<br /><b>Bill Date : </b>'.$myArray['data']['bill']['billDate'].'<br/><b>Bill Number : </b>'.$myArray['data']['bill']['billNumber'].'<br/><b>Due Date : </b>'.$myArray['data']['bill']['dueDate'].'<br/><b>Bill Amount :  </b>'.$myArray['data']['bill']['amount'];
    $billResponse=$billResponse.'<input type="hidden" id="amount" name="amount" value="'.$myArray['data']['bill']['amount'].'"></input><textarea  class="form-control" name="contextValue" id="contextValue" style="display:none">'.$myArray['data']['context'].'</textarea>';
    echo $billResponse;         
  }
  else
  {
     if($i<3)
     {
     $this->getFetchedBillRequest($param1);
     $i++;
     }
     else
     {
       echo "<p style='color:red'>No Data Found. Please try again later!!!</p>";
     }
  }
}
else{
  echo "<p style='color:red'>".$response."</p>";
  http_response_code(500);
  
}
}

public function makePayment()
{
  $contextData = $this->input->post('context');
  $amount = $this->input->post('amount');
  $catCode = $this->input->post('catCode');
  $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => config_item('make_payment_api'),
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "amount": "'.$amount.'",
    "txnMode": "INTERNET BANKING",
    "remittanceDetails": {
        "accountNumber": "063010100183666",
        "accountHolderName": "Anand"
    },
    "referenceId": ""BD{{txnID}}"",
    "context": "'.$contextData.'"
}',
  CURLOPT_HTTPHEADER => array(
    'axis-channel-id: SAISEVAK',
    'axis-client-id: 57a2d0c1-5d26-4d80-987a-4793e7d7987a',
    'axis-client-secret: 528b16b9-4f3c-497e-8539-6cfcd41810f4',
    'axis-encryption-key: axisbankaxisbank',
    'axis-salt-key: axisbankaxisbank',
    'axis-channel-password: 5f78716f-8789-4863-8127-1b67bd6b2848',
    'axis-body-channel-id: 664',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);
curl_close($curl);

$myArray = json_decode($response,true); 
$time = time();
$userid = $this->session->user_id;

if($myArray['statusCode']=='success')
{
  $array = array(
    'userid'         => $userid,
    'amount'         => $amount,
    'time'           => $time,
    'categoryCode'           => $catCode,
    'bbps_transaction_id' =>$myArray['data']['bbpsTxnId'],
    'statusCode'         => $myArray['statusCode'],
    'statusMessage'         => $myArray['statusMessage'],
    'context'=>$myArray['data']['context'],
    'sourceRefNum'=>$myArray['data']['sourceRefNum'],
    'trace_id'=> $myArray['traceId']
  );
   
  $this->bbps_model->add_bbps_transaction($array);
  //$this->db->insert('bbps_transaction', $array);
  $result="<p style='color:Green;font-size:30px;'>Payment is successfull!!!</p>";
  echo $result;
}
else
{
  $array = array(
    'userid'         => $userid,
    'amount'         => $amount,
    'time'           => $time,
    'categoryCode'           => $catCode,
    'statusCode'         => $myArray['statusCode'],
    'statusMessage'         => $myArray['statusMessage'],
    'trace_id'=> $myArray['traceId']
  );
   
 $result="<p style='color:red;font-size:20px;'> Error: ".$myArray['statusMessage']."</p>";
 echo $result;
 http_response_code(500);
}

}

public function makepayments()
{
  $contextData = $this->input->post('context');
  $amount = $this->input->post('amount');
  $catCode = $this->input->post('catCode');
  $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => config_item('make_payment_api'),
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "amount": "'.$amount.'",
    "txnMode": "INTERNET BANKING",
    "remittanceDetails": {
        "accountNumber": "063010100183666",
        "accountHolderName": "Anand"
    },
    "referenceId": "BD{{txnID}}",
    "context": "'.$contextData.'"
}',
  CURLOPT_HTTPHEADER => array(
    'axis-channel-id: SAISEVAK',
    'axis-client-id: 57a2d0c1-5d26-4d80-987a-4793e7d7987a',
    'axis-client-secret: 528b16b9-4f3c-497e-8539-6cfcd41810f4',
    'axis-encryption-key: axisbankaxisbank',
    'axis-salt-key: axisbankaxisbank',
    'axis-channel-password: 5f78716f-8789-4863-8127-1b67bd6b2848',
    'axis-body-channel-id: 664',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);
curl_close($curl);
$myArray = json_decode($response,true); 

$time = time();
$userid = $this->session->user_id;

if($myArray['statusCode']=='success')
{
  $array = array(
    'userid'         => $userid,
    'amount'         => $amount,
    'time'           => $time,
    'categoryCode'           => $catCode,
    'bbps_transaction_id' =>$myArray['data']['bbpsTxnId'],
    'statusCode'         => $myArray['statusCode'],
    'statusMessage'         => $myArray['statusMessage'],
    'context'=>$myArray['data']['context'],
    'sourceRefNum'=>$myArray['data']['sourceRefNum'],
    'trace_id'=> $myArray['traceId']
  );
   
  //$this->db->insert('bbps_transaction', $array);
  $this->bbps_model->add_bbps_transaction($array);
  //$this->db->insert('bbps_transaction', $array);
  $result="<p style='color:Green;font-size:30px;'>Payment is successfull!!!</p>";
  echo $result;
}
else
{
  $array = array(
    'userid'         => $userid,
    'amount'         => $amount,
    'time'           => $time,
    'categoryCode'           => $catCode,
    'statusCode'         => $myArray['statusCode'],
    'statusMessage'         => $myArray['statusMessage'],
    'trace_id'=> $myArray['traceId']
  );
  $result="<p style='color:red;font-size:20px;'> Error: ".$myArray['statusMessage']."</p>";
  echo $result;
  http_response_code(500);
}
  
}

//public function raiseCompliantRequest($param='',$param1='')
public function raiseCompliantRequest($param='',$param1='')
    {
     // $param= $this->input->post("exampleFormControlSelect1");
      
      $param1= urldecode($param1);
      $param1 = str_replace('"', '', $param1);
     //$param1=htmlspecialchars($this->input->post("issue"));
      $this->db->where('bbps_transaction_id',$param);
      $data=$this->db->get('bbps_transaction')->row_array();
      $paramReq=explode(" ",$data['time']);
      $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => config_item('raise_complaint_api'),
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "transactionId": "'.$param.'",
    "transactionDate": "'.$paramReq[0].'",
    "issueType": "1",
    "description": "'.$param1.'"
}',
  CURLOPT_HTTPHEADER => array(
    'axis-channel-id: SAISEVAK',
    'axis-client-id: 57a2d0c1-5d26-4d80-987a-4793e7d7987a',
    'axis-client-secret: 528b16b9-4f3c-497e-8539-6cfcd41810f4',
    'axis-encryption-key: axisbankaxisbank',
    'axis-salt-key: axisbankaxisbank',
    'axis-channel-password: 5f78716f-8789-4863-8127-1b67bd6b2848',
    'axis-body-channel-id: 664',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl); 

$myArray = json_decode($response,true);
$userid = $this->session->user_id;

if($myArray['statusCode']=='success')
{
  $array = array(
    'user_id'         => $userid,
    'reference_id'=> $myArray['data']['referenceId'],
    'compliant_message'=>$param1,
    'bill_id'=>$param,
    'bill_date'=>$data['time']
  );
 // $this->db->insert('compliant_request', $array);
  $this->bbps_model->add_complaint_request($array);
  $result="<p style='color:Green;font-size:22px;'>Complaint raised successfully!!!<br /><p style='color:black;font-size:20px;'>Reference id <span style='color:purple;font-size:22px;'><b>".$myArray['data']['referenceId']."</b></span> is created.</p></p>";
  echo $result;
}
else
{
 $result="<p style='color:red;font-size:20px;'> Error: ".$myArray['statusMessage']."</p>";
 echo $result;
 http_response_code(500);
}      
}

public function getCompliantStatus($param1='',$param2='')
{
  $this->db->where('reference_id',$param1.'/'.$param2);
  $data=$this->db->get('compliant_request')->row_array();
  $paramReq=explode(" ",$data['date']);
  $reference_id=$param1.'/'.$param2.'/'.$paramReq[0];

  $curl = curl_init();
  curl_setopt_array($curl, array(
  CURLOPT_URL => config_item('complaint_status_api'),
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "referenceId": "'.$reference_id.'"
  }',
  CURLOPT_HTTPHEADER => array(
    'axis-channel-id: SAISEVAK',
    'axis-client-id: 57a2d0c1-5d26-4d80-987a-4793e7d7987a',
    'axis-client-secret: 528b16b9-4f3c-497e-8539-6cfcd41810f4',
    'axis-encryption-key: axisbankaxisbank',
    'axis-salt-key: axisbankaxisbank',
    'axis-channel-password: 5f78716f-8789-4863-8127-1b67bd6b2848',
    'axis-body-channel-id: 664',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);
curl_close($curl);

$myArray = json_decode($response,true); 
if($myArray['statusCode']=='success')
{
$billResponse='<p style="color:Green;font-size:30px;">Please find the compliant status below.</p><b>Reference Number : </b>'.$param1.'/'.$param2.'<br /><b>AssignedTo : </b>'.$myArray['data']['assignedTo'].'<br/><b>isComplaintOpen : </b>'.$myArray['data']['isComplaintOpen'].'<br /><b>AssignedTo : </b>'.$myArray['data']['assignedTo'].'<br/><b>complaintID : </b>'.$myArray['data']['complaintID'].'<br/><b>isComplaintOpen : </b>'.$myArray['data']['isComplaintOpen'].'<br/><b>npciMessageId :  </b>'.$myArray['data']['npciMessageId'];
$billResponse=$billResponse.'<br/><b>npciRefId : </b>'.$myArray['data']['npciRefId'].'<br/><b>sequenceNumber : </b>'.$myArray['data']['sequenceNumber'];
$billResponse=$billResponse.'<br/><b>status : </b>'.$myArray['data']['status'].'<br/><b>transactionResponseCode : </b>'.$myArray['data']['transactionResponseCode'].'<br/><b>transactionResponseReason : </b>'.$myArray['data']['transactionResponseReason'];
echo $billResponse;
}
else{
  echo "Could not get the Compliant Status!!";
}
}

public function getReceiptDetails($param='')
{
  $this->db->where('id',$param);
  $data=$this->db->get('bbps_transaction')->row_array();
  $curl = curl_init();
  curl_setopt_array($curl, array(
  CURLOPT_URL => config_item('get_payment_status_api'),
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "context": "'. $data['context'].'"
  }',
  CURLOPT_HTTPHEADER => array(
    'axis-channel-id: SAISEVAK',
    'axis-client-id: 57a2d0c1-5d26-4d80-987a-4793e7d7987a',
    'axis-client-secret: 528b16b9-4f3c-497e-8539-6cfcd41810f4',
    'axis-encryption-key: axisbankaxisbank',
    'axis-salt-key: axisbankaxisbank',
    'axis-channel-password: 5f78716f-8789-4863-8127-1b67bd6b2848',
    'axis-body-channel-id: 664',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);
curl_close($curl);

$myArray = json_decode($response,true); 
$billResponse='<br /><b>Amount : </b>'.$myArray['data']['amount'].'<br/><b>Biller ID : </b>'.$myArray['data']['billerId'].'<br/><b>status : </b>'.$myArray['data']['status'].'<br/><b>txnId :  </b>'.$myArray['data']['txnId'];
$billResponse=$billResponse.'<br/><b>txnMode : </b>'.$myArray['data']['txnMode'];
echo $billResponse;        
}


public function getReceipt()
{
 $userid = $this->session->user_id;
 $this->db->where('userid',$userid);
 $data['result']= $this->db->get('bbps_transaction')->result_array();
 $this->load->view('templates/bbps_recharge/bbpsrechargereceiptpage', $data );
} 

public function raiseCompliant()
{
 $userid = $this->session->user_id;
 $this->db->where('userid',$userid);
 $data['result']= $this->db->get('bbps_transaction')->result_array();
 $this->load->view('templates/bbps_recharge/raiseComplaint', $data );
} 

public function compliantStatus()
{
 $userid = $this->session->user_id;
 $this->db->where('user_id',$userid);
 $data['result']= $this->db->get('compliant_request')->result_array();
 $this->load->view('templates/bbps_recharge/complaintStatus', $data );
} 

public function customerReceipt()
{
 $userid = $this->session->user_id;
 $this->db->where('userid',$userid);
 $data['result']= $this->db->get('bbps_transaction')->result_array();
 $this->load->view('templates/bbps_recharge/customerReceiptpage', $data );
} 

public function billPayment()
{
  $userid = $this->session->user_id;
  $this->db->where('userid',$userid);
  $data['result']= $this->db->get('bbps_transaction')->result_array();
  $this->load->view('templates/bbps_recharge/billPayment', $data );
} 

public function paymentConfirmation()
{
 $contextData = $this->input->post('contextValue');
 $amount = $this->input->post('amount');
 $catCode = $this->input->post('catCode');
 $billerName = $this->input->post('billerName');
 $curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => config_item('make_payment_api'),
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "amount": "'.$amount.'",
    "txnMode": "INTERNET BANKING",
    "remittanceDetails": {
        "accountNumber": "063010100183666",
        "accountHolderName": "Anand"
    },
    "referenceId": "BD{{txnID}}",
    "context": "'.$contextData.'"
}',
  CURLOPT_HTTPHEADER => array(
    'axis-channel-id: SAISEVAK',
    'axis-client-id: 57a2d0c1-5d26-4d80-987a-4793e7d7987a',
    'axis-client-secret: 528b16b9-4f3c-497e-8539-6cfcd41810f4',
    'axis-encryption-key: axisbankaxisbank',
    'axis-salt-key: axisbankaxisbank',
    'axis-channel-password: 5f78716f-8789-4863-8127-1b67bd6b2848',
    'axis-body-channel-id: 664',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);
curl_close($curl);

$myArray = json_decode($response,true); 

$time = time();
$userid = $this->session->user_id;

if($myArray['statusCode']=='success')
{
  $array = array(
    'userid'         => $userid,
    'amount'         => $amount,
    'categoryCode'   => $catCode,
    'bbps_transaction_id' =>$myArray['data']['bbpsTxnId'],
    'statusCode'         => $myArray['statusCode'],
    'statusMessage'      => $myArray['statusMessage'],
    'context'=>$myArray['data']['context'],
    'sourceRefNum'=>$myArray['data']['sourceRefNum'],
    'trace_id'=> $myArray['traceId']
  );
  $data['statusCode']=$myArray['statusCode'];
  $data['statusMessage']=$myArray['statusMessage'];
  $data['trace_id']=$myArray['traceId'];
  $data['billerName']=$billerName;
  $data['catCode']=$catCode;
  $data['amount']=$amount;
  $data['bbps_transaction_id']=$myArray['data']['bbpsTxnId'];
  $data['sourceRefNum']=$myArray['data']['sourceRefNum'];
  $data['amount']=$amount;  

  //$this->db->insert('bbps_transaction', $array);

  $this->bbps_model->add_bbps_transaction($array);

  $walletBalance=$this->db_model->select_multi('balance', 'wallet', array('userid' => $this->session->user_id));
  $balance=$walletBalance->balance;
  $balance_data = array(
     'balance' => ($balance - $amount),
  );
      
  $this->bbps_model->update_balance($balance_data);
  $result="<p style='color:Green;font-size:30px;'>Payment is successfull!!!</p>";
  $data['resultMessage']=$result;
  $view='/paymentconfirmationpage';
}
else
{
  $array = array(
    'userid'         => $userid,
    'amount'         => $amount,
    'categoryCode'           => $catCode,
    'statusCode'         => $myArray['statusCode'],
    'statusMessage'         => $myArray['statusMessage'],
    'trace_id'=> $myArray['traceId']
  );
  $data['statusCode']=$myArray['statusCode'];
  $data['statusMessage']=$myArray['statusMessage'];
  $data['trace_id']=$myArray['traceId'];
  $data['billerName']=$billerName;
  $data['catCode']=$catCode;
  $data['amount']=$amount;
  $result="<p style='color:red;font-size:20px;'> Error: ".$myArray['statusMessage']."</p>";
  $data['resultMessage']=$result;
  $view='/bbpsrechargepage';
  http_response_code(500);
} 
$this->load->view('templates/bbps_recharge'.$view, $data );
}
}