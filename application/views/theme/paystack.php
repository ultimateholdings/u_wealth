<?php

  $tid = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
  debug_log('tid '.$tid);
  $curl = curl_init();
  
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/".rawurlencode($tid),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer sk_test_e29d1a5c7f72eadd57d9284290319479a9f4394a",
      "Cache-Control: no-cache",
    ),
  ));
  
  $response = curl_exec($curl);
  $err = curl_error($curl);
  curl_close($curl);
  
  if ($err) {

    //echo "cURL Error #:" . $err;
    debug_log('err');
    debug_log($err);

  } 
  else {
     debug_log('response');
     debug_log($response);
    //echo $response;
    $result = json_decode($response);
  }
  debug_log('status');
  debug_log($result->data->status);
  if ($result->data->status =='success') {
     $td = $this->db_model->select_multi('*', 'transaction', array(
            'userid' => $this->session->_user_id_,'amount'=>$this->session->_price_, 'time >=' =>strtotime('now') - 3600));
      $tid = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
      debug_log('uri segment '.$tid);

         $data = array('gateway'=>'paystack','status'=>'processing', 
                    'transaction_id'=>$tid);
                $this->db->where('id',$td->id);
                $this->db->update('transaction', $data);

                debug_log($this->db->last_query()); 

      redirect(site_url('member/complete_add_fund'));
  }
  else
  {
     $td = $this->db_model->select_multi('*', 'transaction', array(
            'userid' => $this->session->_user_id_,'amount'=>$this->session->_price_, 'time >=' =>strtotime('now') - 3600));
      $tid = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
      debug_log('uri segment '.$tid);

         $data = array('gateway'=>'paystack','status'=>'started', 
                    'transaction_id'=>$tid);
                $this->db->where('id',$td->id);
                $this->db->update('transaction', $data);

                debug_log($this->db->last_query()); 

    redirect(site_url('member/failed_fund'));

  }

?>