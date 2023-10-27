<?php 
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');

require APPPATH . '/libraries/TokenHandler.php';
//include Rest Controller library
require APPPATH . 'libraries/REST_Controller.php';

/**
 * Class Site
 */
class Apii extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        // creating object of TokenHandler class at first
        $this->tokenHandler = new TokenHandler();
        header('Content-Type: application/json');        
    }

    public function firstapi_post()
    {
        $data =  array(
                'name' => $this->post('name'),
                'id' => $this->post('id'),
            );

        $this->set_response(array('name'=>$data['name'], 'id'=>$data['id']), REST_Controller::HTTP_OK);
    }

    public function call_get()
    {
        
        $data =  array(
                'name' => "mani",
                'id' => "1001",
            );
        $data = json_encode($data);       
        $url = 'http://localhost/gmlm/apii/firstapi';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION,TRUE);
        curl_setopt($ch, CURLOPT_HTTP_VERSION,CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch, CURLOPT_HTTPHEADER,array(
                                                "cache-control: no-cache",
                                                "content-type: application/json"));
        $response = curl_exec($ch);
        curl_close($ch); 
        print_r(json_decode($response));  
    }
}