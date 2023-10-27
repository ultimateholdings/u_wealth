<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Member_model extends CI_Model
{

    public function __construct()
    {
        $this->load->library('form_validation');
    }
    public function update($data,$userid){
            $this->db->where('userid', $userid);
           return $this->db->update('member_profile', $data);
    }
    public function get_details($userid){
        $this->form_validation->set_rules('userid', 'Userid', 'required');

        if($this->form_validation->run() == FALSE){
            return (array(
                "status" => "0",
                "message" => validation_errors()
            ));
        }else{
           return $this->db->query('SELECT * FROM `member_profile` INNER JOIN member on member_profile.userid=member.id  WHERE userid = "'.$userid.'"')->row();
        }
    }


    public function member_login($user,$password){
        $lms_password = $password;
        
        $data = $this->db_model->select_multi("*", 'member', array('id' => $user));

    if (($data->status !== "Active") && ($data->status !== "Inactive") && ($data->status !== "Suspend")) {
        return array(
            "status" => "false",
            "message" => 'Login is invalid or Your account is not active. Account status is: ' . ($data->status ? $data->status : 'N/A') . ''
        );
    }

    if (password_verify($password, $data->password)) {
        session_unset();
        $session = md5($user . time());
        $this->session->set_userdata(array(
            'user_id' => $data->id,
            'email' => $data->email,
            'name' => $data->name,
            'ip' => $data->last_login_ip,
            'last_login' => $data->last_login,
            'session' => $session,
            'role'=>$data->role,
            'lms_password' => $lms_password,

        ));
        $data2 = array(
            'last_login_ip' => $this->input->ip_address(),
            'last_login' => time(),
            'session' => $session,
        );
        $this->db_model->update($data2, 'member', array('id' => $data->id));
        return array(
            "status" => "true",
            "message" => 'sucessfully login'
        );
    } else {
        return array(
            "status" => "false",
            "message" => 'Invalid Username or Password.'
        );
    }
    }
    
       public function view_earning($config,$page,$userid){
        $this->db->select('id, userid, amount, type, ref_id, date, pair_match,pair_names, secret')->from('earning')
        ->where('userid', $userid)->order_by('id DESC', 'date DESC', 'amount asc')->limit($config['per_page'], $page);

        $data['earning'] = $this->db->get()->result_array();
        return $data;
   }


    public function update_profile($data){
        $this->form_validation->set_rules('userid', 'Userid', 'required');
        $this->form_validation->set_rules('date_of_birth', 'Date of Birth', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if($this->form_validation->run() == FALSE){
            return (array(
                "status" => "0",
                "message" => validation_errors()
            ));
        }else{
            $mypass = $this->db_model->select('password', 'member', array('id' => $data['userid']));
            if (password_verify($data['password'], $mypass) == true)
            {
                $data2 = array(
                    'date_of_birth' => $data['date_of_birth']
                );
                //issue
                $this->db->where('userid', $data['userid']);
                $success = $this->db->update('member_profile', $data2);
                if($success){
                    return (array(
                        "status" => "true",
                        "message" => "Updated"
                    ));
                }else{
                    return (array(
                        "status" => "false",
                        "message" => "Unable to Update at the moment"
                    ));
                }
            }else{
                return (array(
                    "status" => "false",
                    "message" => "Incorrect Password"
                ));
            }
        }
    }
    public function checkdate(){ 
        $d = DateTime::createFromFormat('Y-m-d', $this->post('date_of_birth'));
        if(($d && $d->format('Y-m-d') === $this->post('date_of_birth')) === FALSE){
            $this->form_validation->set_message('checkdate', ''.$this->post('date_of_birth').' is not a valid date format.');
            return FALSE;
        }else{
            if($this->input->post('date_of_birth') > date('Y-m-d')){  
                $this->form_validation->set_message('checkdate', "You can't enter future date as Date of Birth");                      
                return FALSE;
            }else{
                return TRUE;
            }
        } 
    }

    public function update_info($data,$data2){
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('state', 'State', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('zip', 'Zip', 'required');
        $this->form_validation->set_rules('userid', 'Userid', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if($this->form_validation->run() == FALSE){
            return (array(
                "status" => "false",
                "message" => validation_errors()
            ));
        }else{
            $mypass = $this->db_model->select('password', 'member', array('id' => $data['userid']));
            if (password_verify($data['password'], $mypass) == true)
            {
                $this->db->where('userid', $data['userid']);
                $success = $this->db->update('member_profile', $data2);
                if($success){
                    return (array(
                        "status"    => "true",
                        "message"   => "Updated"
                    ));
                }else{
                    return (array(
                        "status"    => "false",
                        "message"   => "Unable to Update at the moment"
                    ));
                 }   
            }else{
                return (array(
                    "status"    => "false",
                    "message"   => "Incorrect password"
                ));
            }
        }
    }

    public function update_bank_details($data2,$data){
        $this->form_validation->set_rules('bank_name', 'Bank Name', 'required');
        $this->form_validation->set_rules('bank_branch', 'Bank Branch', 'required');
        $this->form_validation->set_rules('bank_ac_no', 'Bank Acc No', 'required');
        $this->form_validation->set_rules('bank_ifsc', 'Bank ifsc', 'required');
        $this->form_validation->set_rules('tax_no', 'Tax no', 'required');
        $this->form_validation->set_rules('userid', 'Userid', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run() == FALSE){
            return (array(
                "status" => "0",
                "message" => validation_errors()
            ));
        }else{
            $mypass = $this->db_model->select('password', 'member', array('id' => $data['userid']));
            debug_log($data['password']);
            debug_log($data['userid']);
            if (password_verify($data['password'], $mypass) == true)
            {
                $this->db->where('userid', $data['userid']);
                $success = $this->db->update('member_profile', $data2);
                if($success){
                    return (array(
                        "status"    => "true",
                        "message"   => "Updated"
                    ));
                }else{
                    return (array(
                        "status"    => "false",
                        "message"   => "Unable to Update at the moment"
                    ));
                 }   
            }else{
                return (array(
                    "status"    => "false",
                    "message"   => "Incorrect password"
                ));
            }
        }
    }

    public function change_password($data){
            $mypass = $this->db_model->select('password', 'member', array('id' => $data['id']));
            if (password_verify($data['oldpass'], $mypass) == true)
            {
                $new_pass = array(
                    'password' => password_hash($data['newpass'], PASSWORD_DEFAULT),
                );
                    $this->db->where('id', $data['id']);
                    $success = $this->db->update('member', $new_pass);
                if($success){
                    return array(
                        'success' => "true",
                        'message' => '<div class="alert alert-success">Password Updated Successfully.</div>'
                    ); //request success
            }else{
                return array(
                    'success' => "false",
                    'message' => '<div class="alert alert-danger">Unable to Update at the Moment</div>'
                ); 
            }

            }else{
                return array(
                    'success' => "false",
                    'message' => '<div class="alert alert-danger">Incorrect Password</div>'
                ); //incorrect password
            } 
    }

    public function update_secure_password($data){
            //validations removed
            $mypass = $this->db_model->select('secure_password', 'member', array('id' => $data['id']));
            debug_log($data['current_password']);
            debug_log($mypass);
            if (password_verify($data['newsecure'], $mypass) == true)
            { 
                $new_pass = array(
                    'password' => password_hash($data['newsecure'], PASSWORD_DEFAULT),
                );
                $this->db->where('id',$data['id']);
                $success =  $this->db->update('member',$new_pass);
                if($success){
                    return array(
                        'success' => "true",
                        'message' => '<div class="alert alert-success">Password Updated Successfully.</div>'
                    ); //success
                }else{
                   return  array(
                    'success' => "true",
                    'message' => '<div class="alert alert-danger">Unable to Update at the Moment</div>'
                ); //unable to update at the moment
                }
            }else{
                return  array(
                    'success' => "true",
                    'message' => '<div class="alert alert-danger">Incorrect Password</div>'
                );; //incorrect Password
            }
    }

    public function reset_secure($datas){
        $phone = '123456789';
        $email = $datas['email'];
            $data = $this->db_model->select_multi("name, password, phone,email", 'member', array('id' => $datas['userid']));
            if(((!(strlen($phone)>2)) && (!(strlen($email)>2))) || ((password_verify($datas['password'], $data->password) != true))){
                return array(
                    'success' => "true",
                    'message' => '<div class="alert alert-danger">Entered Password is Incorrect</div>'
                );
            }
            if ((trim(config_item('smtp_host')) !== "") || (config_item('sms_on_join') == "No")) {
                if((strlen($phone)>2)&&($phone == $data->phone))
                {
                    $randompassword=$this->common_model->randomPassword();
                    $password = password_hash($randompassword, PASSWORD_DEFAULT);
                    $data2 = array(
                          'secure_password' => $password,
                          'last_login_ip'   => $this->input->ip_address(),
                          'last_login'      => time(),
                      );
                      //$this->db_model->update($data2, 'member', array('id' => $data['userid]));
                      $sms = "Hello " . $data->name . ", \nYou have requested for Secure Password Reset. \n Your Temporary Secure Password is: " . $randompassword . "\n".config_item('company_name');
                      $messvar="Ok";
                      $phone="91".$phone;
                      $this->common_model->sms($phone, urlencode($sms));
                      return (array(
                        "status" => "true",
                        "message" => "Your requested password is sent on your phone "
                    ));
                    }elseif ((strlen($email)>2) && ($email == $data->email)) 
                    {
                        $randompassword=$this->common_model->randomPassword();
                        $password = password_hash($randompassword, PASSWORD_DEFAULT);
                        
                        $sub = "Secure Password Reset";
                        $msg = "Hello " . $data->name . ", <br><br>You have requested for Secure Password Reset. <br><br> Temporary Secure Password is: " . $randompassword . "<br><br>Kindly update password soon after login <br><br> Regards <br>Support Team<br>".config_item('company_name');
                        //$status = $this->db_model->mail($data->email, $sub, $msg);
        
                        //debug_log('Email Status '.$status);
        
                        if($status == 'Success')
                        {
                            $data2 = array(
                              'secure_password' => $password,
                              'last_login_ip'   => $this->input->ip_address(),
                              'last_login'      => time(),
                            );
                            //$this->db_model->update($data2, 'member', array('id' => $user_id));
                            return (array(
                                'success' => "true",
                                'message' => '<div class="alert alert-success">Password Updated Successfully.</div>'
                            ));
                        }
                        return (array(
                            'success' => "false",
                            'message' => '<div class="alert alert-danger">Unable to send Mail</div>'
                        ));
                    }
                    return array(
                        'success' => "false",
                        'message' => '<div class="alert alert-danger">Incorrect Email</div>'
                    );
                }
        }
    

    
    public function wallet_balance($userid){
        $this->form_validation->set_rules('userid', 'User id', 'trim|required');
        if($this->form_validation->run() == FALSE){
            return (array(
                "status"    => "0",
                "message"   => validation_errors()
            ));
        }else{
            $balance  = $this->db_model->select('balance', 'wallet', array('userid' => $userid));
                if($balance == null){
                    return (array(
                        "status"    => "1",
                        "message"   => "User id doesnot Exists" 
                    ));
                }
                return (array(
                    "status"    => "1",
                    "message"   => $balance 
                ));
            }
        }

        public function admin_password($data){
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_rules('newpass', 'New Password', 'trim|required');
            $this->form_validation->set_rules('repass', 'Retype Password', 'trim|required|matches[newpass]');
            $this->form_validation->set_rules('id', 'id', 'trim|required');
            if($this->form_validation->run() == FALSE){
                return (array(
                    "status" => "0",
                    "message" => validation_errors()
                ));
            }else{
                $mypass = $this->db_model->select('password', 'admin', array('id' => $data['id']));
            if (password_verify($this->input->post('password'), $mypass) == true)
            {
                $new_pass = array(
                    'password' => password_hash($data['newpass'], PASSWORD_DEFAULT),
                );
                      $this->db_model->update($new_pass, 'admin', array('id' => $data['id']));
                             return (array(
                                "status"    => "True",
                                "message"   => "password updated"
                         ));
            }else{
                return (array(
                    "status"    => "0",
                    "message"   => "Incorrect Password"
                ));
                }

            }
        }

        //says secure password is incorrrect
        public function admin_secure_password($data){
            $this->form_validation->set_rules('current_password', 'Current Password', 'trim|required');
            $this->form_validation->set_rules('new_password', 'New Password', 'trim|required');
            $this->form_validation->set_rules('retype_password', 'Retype Password', 'trim|required|matches[new_password]');
            $this->form_validation->set_rules('id', 'id', 'trim|required');
            if($this->form_validation->run() == FALSE){
                return (array(
                    "status" => "false",
                    "message" => validation_errors()
                ));
            }else{
                $mypass = $this->db_model->select('secure_password', 'admin', array('id' => $data['id']));
                //debug_log($data['id']);
                //debug_log($data['current_password']);
                //debug_log($mypass);
                if (password_verify($data['current_password'], $mypass) == true)
                {
                    $new_pass = array(
                        'password' => password_hash($data['new_password'], PASSWORD_DEFAULT),
                    );
                          //$this->db_model->update($new_pass, 'admin', array('id' => $data['id']));
                                 return (array(
                                    "status"    => "True",
                                    "message"   => "password updated"
                             ));
                }else{
                    return (array(
                        "status"    => "0",
                        "message"   => "Incorrect Password"
                    ));
                    }
    
            }
        }
        //says secure password is wrong
        public function admin_reset_secure_password($data){
            $this->form_validation->set_rules('id', 'id ', 'trim|required');
            $this->form_validation->set_rules('phone', 'phone', 'trim|required');
            $this->form_validation->set_rules('email', 'email', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $phone = $data['phone'];
            $email = $data['email'];
            if($this->form_validation->run() == FALSE){
                return (array(
                    "status" => "0",
                    "message" => validation_errors()
                ));
            }else{
                $data = $this->db_model->select_multi("name, password, phone,email", 'member', array('id' => $data['id']));
                //debug_log($data['password']);
                //debug_log($data->password);
                if(((!(strlen($phone)>2)) && (!(strlen($email)>2))) || ((password_verify($data['password'], $data->password) != true))){
                    return (array(
                        "status" => "false",
                        "message" => "Incorrect Password"
                    ));
                }
                if ((trim(config_item('smtp_host')) !== "") || (config_item('sms_on_join') == "No")) {
            
                    if((strlen($phone)>2)&&($phone == $data->phone))
                    {
                        $randompassword=$this->common_model->randomPassword();
                        $password = password_hash($randompassword, PASSWORD_DEFAULT);
                        $data2 = array(
                              'secure_password' => $password,
                              'last_login_ip' => $this->input->ip_address(),
                              'last_login' => time(),
                          );
                          //$this->db_model->update($data2, 'admin', array('id' => $data['id]));
                          $sms = "Hello " . $data->name . ", \nYou have requested for Secure Password Reset. \n Your Temporary Secure Password is: " . $randompassword . "\n".config_item('company_name');
                          $messvar="Ok";
                          $phone="91".$phone;
                          $this->common_model->sms($phone, urlencode($sms));
                          return (array(
                            "status" => "true",
                            "message" => "Your requested password is sent on your phone "
                        ));
                        }elseif ((strlen($email)>2) && ($email == $data->email)) 
                        {
                            $randompassword=$this->common_model->randomPassword();
                            $password = password_hash($randompassword, PASSWORD_DEFAULT);
                            
                            $sub = "Secure Password Reset";
                            $msg = "Hello " . $data->name . ", <br><br>You have requested for Secure Password Reset. <br><br> Temporary Secure Password is: " . $randompassword . "<br><br>Kindly update password soon after login <br><br> Regards <br>Support Team<br>".config_item('company_name');
                            $status = $this->db_model->mail($data->email, $sub, $msg);
            
                            //debug_log('Email Status '.$status);
            
                            if($status == 'Success')
                            {
                                $data2 = array(
                                  'secure_password' => $password,
                                  'last_login_ip' => $this->input->ip_address(),
                                  'last_login' => time(),
                                );
                                //$this->db_model->update($data2, 'admin', array('id' => $data['id']));
                                return (array(
                                    "status"    => "true",
                                    "message"   => "Temporary Password is send on your mail"
                                ));
                            }
                               return (array(
                                    "status"    => "false",
                                    "message"   => "Unable to reset password at the moment"
                                ));
                        }
                           return (array(
                                "status"    => "false",
                                "message"   => "Invalid Details. Please Enter Correct Details !!!"
                            ));
                    }
                    return (array(
                        "status"    => "false",
                        "message"   => "Password couldnot reset at the moment. Please try later !!!"
                    ));
            }
        }
        
        public function profile_update($data){
            debug_log($data);
            $mypass = $this->db_model->select('secure_password', 'member', array('id' => $data['id']));

            if ((password_verify($data['oldpass'], $mypass) == true)) {

                if($data['date_of_birth'] > date('Y-m-d')){ 
                    return (array(
                        "status"    => "false",
                        "message"   => "<div class='alert alert-danger'>You can't enter future date as Date of Birth</div>"
                    ));
                }
                
                if (trim($_FILES['photo']['name'] !== "")) {
                        $this->load->library('upload');
                        if (!$this->upload->do_upload('photo')) {
                            return (array(
                                "status"    => "false",
                                "message"   => "<div class='alert alert-danger'>Photo is not uploaded..<br/>' . $this->upload->display_errors() . '</div>"
                            ));
                        } else {
                            //echo "image_data";
                            $image_data = $this->upload->data();
                            $photo = $this->session->user_id .".".explode(".",$image_data['file_name'])[1];
                            //print_r($image_data);
                            //unlink('uploads/profile/'.$photo);
                            move_uploaded_file($_FILES['photo']['tmp_name'], FCPATH . 'uploads/profile/'.$photo);
                            //unlink('uploads/'.$image_data['file_name']);
                        }
                    }
                    //print_r($photo);die();
                     $array = array(
                    'email' => $data['email'],
                    'photo' => $photo,
                );
                $this->db_model->update($array, 'member', array('id' => $data['id']));

                $array = array(
                'address'          => $data['address'],
                'city'          => $data['city'],
                'state'          => $data['state'],
                'zip'          => $data['zip'],
                'date_of_birth'    => $data['date_of_birth'],
                );
                $this->db_model->update($array, 'member_profile', array('id' => $data['id']));
                return array(
                    "status"    => "true",
                    "message"   => '<div class="alert alert-success">Profile Updated Successfully.</div>'
                );
            }
            return array(
                "status"    => "true",
                "message"   => '<div class="alert alert-danger">The entered "Secure Password" is wrong.</div>'
            );
        }

        public function my_rewards($config,$page,$userid){
                $this->db->select('id, reward_id, date, paid_date, tid')->from('rewards')
                ->where('userid', $userid)->limit($config['per_page'], $page);

                $data['rewards'] = $this->db->get()->result_array();
                
                for($i=0;$i<sizeof($data['rewards']);$i++){
                    $rid=$data['rewards'][$i]['reward_id'];
                     $name=$this->db->query("select reward_name as name from reward_setting where id=$rid")->row()->name;
                    $data['rewards'][$i]['reward_name']=$name;
                }
                return array(
                    "status"    =>  "true",
                    "message"   =>  $data
                );
        }

        public function epin_deposit($epin,$userid){
            debug_log("two");
                $epin_value = $this->db_model->select('amount', 'epin', array(
                    'epin' => $epin,
                    'status' => 'Un-used',
                ));
                debug_log($this->db->last_query());
                if ($epin_value <= 0) {
                    return array(
                        "status"    =>  "false",
                        "message"   =>  "he entered e-PIN is invalid or doesn\'t exist."
                    );
                }
                $wallet_balance = $this->db_model->select('balance', 'wallet', array('userid' => $userid));
                $this->db->where(array('userid' => $userid));
                $this->db->update('wallet', array('balance' => $wallet_balance + $epin_value));
                debug_log($this->db->last_query());
                debug_log('Topup while ePin Deposit');

                $data = array(
                    'status' => 'Used',
                    'used_by' => $userid,
                    'used_time' => date('Y-m-d H:i:s'),
                    'remarks' => 'Member Wallet Topup',
                );

                $this->db->where('epin', $epin);
                $this->db->update('epin', $data);
                debug_log($this->db->last_query());
                $name=$this->db->query("select name from member where id=$userid")->row()->name;
                $bank_details = array(
                'userid' => $userid,
                'to_userid'=> 'Admin',
                'name'   => $name,
                'amount' => $epin_value,
                'gateway' => 'Using Epin',
                'time' =>time(),
                'purpose' => 'Epin Wallet Topup',
                'transaction_id'=>'Epin: '.$epin,
                'payment_request_id'=>'Epin: '.$epin,
                'status' => 'Completed',
                'remarks' => 'Epin Wallet Topup'
                );
                debug_log($bank_details);
                $this->db->insert('transaction', $bank_details);
                                debug_log($this->db->last_query());

                return array(
                    "status"    =>  "true",
                    "message"   =>  "Fund is added to your wallet."
                );
            

        }

        public function deposit_history($config,$page){
            $this->db->order_by('id', 'DESC');
            $this->db->limit($config['per_page'], $page);

            $data['trans']    = $this->db->get('transaction')->result();
            foreach($data['trans'] as $value){
                $value->time=date("Y-m-d h:i A",$value->time);
            }

            return array(
                "status"    =>  "true",
                "message"   =>  $data
            );
        }
        public function Welcome_letter_api($userid){
            $data = $this->db_model->select_multi("name, join_time, id", 'member', array('id' => $userid));
            $date = explode(" ", $data->join_time);
            $data = array(
                'name'   => $data->name,
                'join_time'  =>  $date[0],
                'id'     =>  $data->id,
                );
            return $data;
        } 
        public function used_epins($config,$page,$userid){
            $this->db->select('t1.id, t1.epin, t1.amount, t1.used_by, t1.used_time, t1.type, t2.name')->from('epin as t1')->where(array('used_by'=>$userid ))->or_where(array('issue_to'=>$userid))->where(array('status'=>'Used'))
            ->join("(SELECT id, name FROM member) as t2", 'used_by = t2.id', 'LEFT')
            ->limit($config['per_page'], $page);
    
            $data['epin'] = $this->db->get()->result_array();
            return $data;
       }  
       
       public function unused_epins($config,$page,$userid){

        $this->db->select('id, epin, amount, issue_to, generate_time, generate_time')->from('epin')
            ->where('status', 'Un-used')->where('issue_to', $userid)
            ->limit($config['per_page'], $page);

        $data['epin'] = $this->db->get()->result_array();
    
        return $data;
       }

       public function my_deductions($config,$page,$userid){
        $this->db->select('*')->from('deductions')
        ->where('user_id', $userid)->order_by('id DESC', 'date DESC', 'amount asc')->limit($config['per_page'], $page);

        $data['deductions'] = $this->db->get()->result_array();
        return $data;
   }

   public function bank_deposit($data){
    $check = $this->db_model->select('id', 'member', array('id' => $data['userid']));
    if($check>0){
        $user_data = $this->db_model->select_multi('*', 'member', array('id' => $data['userid']));
        $bank_details = array(
            'userid' => $data['userid'],
            'to_userid'=> $data['to_userid'],
            'name'   => $data['name'],
            'email_id' => $user_data->email,
            'phone'  => $user_data->phone,
            'amount' => $data['amount'],
            'gateway' => $data['payment_mode'],
            'time' =>time(),
            'purpose' => 'Bank Deposit',
            'transaction_id'=>$data['txn_no'],
            'status' => 'Processing',
            'secret' => $data['secret'],
            'remarks' => $data['remarks']
        );
        debug_log($bank_details);

        $result = $this->db->insert('transaction', $bank_details);
        if($result){
            return array(
                "status"    =>"true",
                "message"   => "Your payment is under process!!"
            );
        }else{
            return array(
                "status"    =>"false",
                "message"   => "Your payment could not be processed"
            );
        }
    }else{
        return array(
            "status"    =>"false",
            "message"   => "Invalid userid"
        );
    }
        
   }
   
    public function wallet_transaction($userid){
        $this->db->select('*')->from('transfer_balance_records')
         ->where('transfer_to', htmlentities($userid))->or_where('transfer_from', htmlentities($userid));
        $data = $this->db->get()->result();
        debug_log($data);
        foreach($data as $value){
            $value->remarks=str_replace("<br>",',',$value->remarks);
        }
        return $data;
    }
    
     public function payout_report($status,$sdate,$edate,$userid){
            $status = $this->uri->segment('3') ? $this->uri->segment('3') : '';
            $sdate  = $this->uri->segment('4') ? $this->uri->segment('4') : '';
            $edate  = $this->uri->segment('5') ? $this->uri->segment('5') : '';
            $this->db->where('userid', htmlentities($userid));
            if ($status !== "") {
                $this->db->where('status', $status);
            }
            if ($sdate !== "") {
                $this->db->where('date >=', $sdate);
            }
            if ($edate !== "") {
                $this->db->where('date <=', $edate);
            }

            return $data = $this->db->get('withdraw_request')->result();
    }
    
    public function tax_report($userid,$sdate,$edate){
        $this->db->select('*')->where(array(
            'userid'=>$top_id, 'payout_id !=', '', 'date >=' => $sdate, 'date <=' => $edate,))->order_by('id', 'desc');
        $data['result']     = $this->db->get('tax_report')->result_array();
        if ($sdate !== "") {
            $this->db->where('date >=', $sdate);
        }
        if ($edate !== "") {
            $this->db->where('date <=', $edate);
        }
        $this->db->where('userid', $userid);
        $this->db->limit(100)->order_by('id','DESC');
       return $data = $this->db->get('tax_report')->result();
       debug_log($data);
    }
    
    public function direct_list($userid){
        $this->db->select('*')->from('member')
                ->where(array('sponsor' => htmlentities($userid)))->order_by('secret', 'DESC');
        return $data = $this->db->get()->result();
    }
    
    public function transfer_epin_history($userid){
         $data['epin'] = $this->db->query("SELECT * from epin where transfer_by like 
                '%".','.$userid."%' order by generate_time desc")->result_array();

        return array(
            "status" => "true",
            "message" => $data,
        );
    }
    
    public function unilevel_tree($plan,$userid,$topid){
        $plan_check = $this->db_model->select('id', 'plans', array('plan_name' => $plan));
        //debug_log($plan_check);
        if($plan_check>0){
            $data['userid']    =  $userid;
        $data['Rank'] = $this->db_model->select('rank', 'member', array('id' => $userid));
        $data['Total_Downline'] = $this->db_model->select('total_downline', 'member', array('id' => $userid));
        if($data['Total_Downline']>0){
            $this->db->select('id, total_downline, rank')->where(array('sponsor'=>$userid));
            $data['downline_details']  = $this->db->get('member')->result_array();
        }
        return array(
            "status" => "true",
            "message" => $data,
        );
        
        }else{
            return array(
                "status" => "false",
                "message" => "Please Enter a valid plan "
            );
        }
    }
    
    public function profile_updates($data){
            debug_log($data);
            $mypass = $this->db_model->select('secure_password', 'member', array('id' => $data['id']));

            if ((password_verify($data['securepass'], $mypass) == true)) {

                if($data['date_of_birth'] > date('Y-m-d')){ 
                    return (array(
                        "status"    => "false",
                        "message"   => "You can't enter future date as Date of Birth"
                    ));
                }
                
                if (trim($_FILES['photo']['name'] !== "")) {
                        $this->load->library('upload');
                        if (!$this->upload->do_upload('photo')) {
                            return (array(
                                "status"    => "false",
                                "message"   => "<div class='alert alert-danger'>Photo is not uploaded..<br/>' . $this->upload->display_errors() . '</div>"
                            ));
                        } else {
                            //echo "image_data";
                            $image_data = $this->upload->data();
                            $photo = $data['id'] .".".explode(".",$image_data['file_name'])[1];
                            //print_r($image_data);
                            //unlink('uploads/profile/'.$photo);
                            move_uploaded_file($_FILES['photo']['tmp_name'], FCPATH . 'uploads/profile/'.$photo);
                            //unlink('uploads/'.$image_data['file_name']);
                        }
                    }
                    //print_r($photo);die();
                     $array = array(
                    'email' => $data['email'],
                    'photo' => $photo,
                );
                $this->db_model->update($array, 'member', array('id' => $data['id']));

                $array = array(
                'address'          => $data['address'],
                'city'             => $data['city'],
                'state'            => $data['state'],
                'zip'              => $data['zip'],
                'date_of_birth'    => $data['date_of_birth'],
                );
                $this->db_model->update($array, 'member_profile', array('userid' => $data['id']));
                //debug_log($this->db->last_query());
                return array(
                    "status"    => "true",
                    "message"   => 'Profile Updated Successfully.'
                );
            }
            return array(
                "status"    => "false",
                "message"   => 'The entered "Secure Password" is wrong.'
            );
        }

    public function ranks_achiever(){
        $this->db->select('*')->order_by('rank_name', 'ASC');
        $data['ranks'] = $this->db->get('rank_system')->result();

        $data['leg']=$this->plan_model->create_leg();

        $this->db->select('*')->where(array('rank !=' => 'Member'))->order_by('id','ASC');
        $rank_achiever = $this->db->get('member')->result();

        foreach ($rank_achiever as $key => $value) {
            $plan_name=$this->db_model->select('plan_name', 'plans', array('id' => $value->signup_package));
            $earnings=$this->db_model->sum('amount', 'earning', array('userid' => $value->id));
            $rank_achiever_data[]=
            array(
                'id' => $value->id,
                'name'=>$value->name,
                'sponsor'=>$value->sponsor,
                'plan_name'=>$plan_name,
                'rank'=>$value->rank,
                'earnings'=>$earnings,
                'phone'=>$value->phone,
                'activate_time'=>$value->activate_time,
                'total_downline'=>$value->total_downline,
            );
        }
        $data['rank_achievers']=$rank_achiever_data;


        return $data;

    }
        
    public function rewards_achiever(){
        $this->db->select('id, reward_name, reward_duration, achievers, A,B')->order_by('reward_name', 'ASC');
        $reward = $this->db->get('reward_setting')->result();
        //debug_log($reward);

        $this->db->select('id, reward_id, userid,secret, date, status, paid_date, tid')->order_by('id','DESC');
        $this->db->limit(5);
        $reward_achievers = $this->db->get('rewards')->result();
        //debug_log($this->db->last_query());
        //debug_log($reward_achievers);

       foreach ($reward_achievers as $key => $value) {
            $reward_data=$this->db_model->select_multi('total_downline,reward_name', 'reward_setting', array('id' => $value->reward_id,));
            $reward_achiever_data[]=
            array(
                'id' => $value->id,
                'userid'=>$value->userid,
                'date'=>$value->date,
                'status'=>$value->status,
                'paid_date'=>$value->paid_date,
                'tid'=>$value->tid,
                'downline_target'=>$reward_data->total_downline,
                'reward_name'=>$reward_data->reward_name
            );
        }  
        

        
        $data['reward'] = $this->db->get('reward_setting')->result();
        /*$data['reward_name'] = $reward[0]->reward_name;
        $data['user_name'] = $this->db_model->select('name', 'member', array('id' => $reward_achievers[0]->userid,));*/
        $data['reward_achievers'] = $reward_achiever_data;

        return $data;
    }
    
    public function live_updates(){
        $company_name = config_item('company_name');
        $data['live_message'] = "Welcome to " . $company_name . " !!!!";

        $this->db->select('id, subject, content, date')->where('subject','live_updates')->order_by('id', 'desc');
        $news = $this->db->get('news')->result();

        foreach($news as $value){
            $value->content=trim($value->content,"<p>");
            $value->content=trim($value->content,"</p>\r\n");
        }
        debug_log($news);
        return $news;
        //$data['news'] = $news;
    }
    
    public function my_invoices($userid){
        $config['per_page'] = 50;
        $config['total_rows'] = $this->db_model->count_all('invoice', array(
            'userid' => $this->session->fran_id, //what is fran id ?
            'user_type' => 'Franchisee',
        ));
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->pagination->initialize($config);

        $this->db->from('invoice')->where(array(
            'userid' => $userid,
            'user_type' => 'Member',
        ))->order_by('id', 'DESC')->limit($config['per_page'], $page);
        $data['invoice'] = $this->db->get()->result();
        return $data;
    }
    
    public function list_ticket($userid){
        $this->load->library('pagination');
        $config['per_page']   = 50;
        $config['total_rows'] = $this->db_model->count_all('ticket', array('userid' => $userid));
        $page                 = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->pagination->initialize($config);
        $this->db->select('*');
        $this->db->where(array('userid' => $userid));
        $this->db->order_by('id', 'DESC');
        $this->db->limit($config['per_page'], $page);
        $data['list_ticket']   = $this->db->get('ticket')->result();
        return $data;
    }
    
    public function old_purchase($userid){
        $config['per_page']   = 50;
        $config['total_rows'] = $this->db_model->count_all('product_sale', array('userid' => $userid));
        $page                 = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->pagination->initialize($config);

        $this->db->select('*')->from('product_sale')
                 ->where('userid', $userid)->limit($config['per_page'], $page);

        $data['data']   = $this->db->get()->result();
        debug_log($data['data']);
        foreach($data['data'] as $value){
            $value->address=str_replace("<br/>",'',$value->address);
            $value->tid=str_replace("<br/>",',',$value->tid);

        }
        return $data;
    }
    
    public function update_shipping($userid,$data,$securepass){
        $mypass = $this->db_model->select('secure_password', 'member', array('id' => $userid));
            
                if ((password_verify($securepass, $mypass) == true)) {
                    $this->db->where('userid', $userid);
                    $this->db->update('shipping_address', $data);
                    return array(
                        "status"    => "true",
                        "message"   => "Shipping Address Updated Successfully."
                    );
                }else{
                    return array(
                        "status"    => "false",
                        "message"   => "The entered Secure Password is wrong."
                    );
                }
    }
    public function update_billing($userid,$securepass,$data){
        //debug_log("from Model");
        $mypass = $this->db_model->select('secure_password', 'member', array('id' => $userid));
        //debug_log($securepass);
        //debug_log($mypass);
        if ((password_verify($securepass, $mypass) == true)) {
            $this->db->where('userid', $userid);
            $this->db->update('shipping_address', $data);
            return array(
                "status"    => "true",
                "message"   => "Billing Address Updated Successfully."
            );
        }else{
            return array(
                "status"    => "false",
                "message"   => "The entered Secure Password is wrong."
            );
        }
    }
    
    public function new_purchase(){
        $this->db->select('cat_id,cat_name,description,image');
        $data['categories'] = $this->db->get('product_categories')->result();
        $this->db->select('id,prod_name,image,round(prod_price - prod_price*discount/100,2) as prod_price')->where('status', 'Selling')->group_by('id','prod_name','image')->limit(10);
        $data['product_top'] = $this->db->get('product')->result();
        return $data;
    }
    public function update_password($userid,$data){
        //debug_log($data);
        $mypass = $this->db_model->select('password', 'member', array('id' => $userid));
        //debug_log($mypass);
        if($data['repass'] == $data['newpass']){
            if (password_verify($data['oldpass'], $mypass) == true)
            {
                $new_pass = array(
                    'password' => password_hash($data['newpass'], PASSWORD_DEFAULT),
                );
                $this->db->update('member', $new_pass);
                return array(
                    "status"    =>  "True",
                    "message"   =>  "Login Password Updated Successfully!!."
                );
            }else{
                return array(
                    "status"    =>  "false",
                    "message"   =>  "The entered Current Password is wrong."
                );
            }
        }else{
            return array(
                "status"    =>  "false",
                "message"   =>  "The Retype Password field does not match the New Password field."
            );
        }
    }


    //reset member password
    public function reset_password($datas){
        $phone = $datas['phone'];
        $email = $datas['email'];
        $data = $this->db_model->select_multi("name, password, phone,email", 'member', array('id' => $datas['id']));
            if((config_item('sms_on_join') == "No" ) || (config_item('smtp_host')) !== "") {
                if((strlen($phone)>2)&&($phone == $data->phone)){
                    $randompassword=$this->common_model->randomPassword();
                    $password = password_hash($randompassword, PASSWORD_DEFAULT);
                    $data2 = array(
                            'secure_password'   => $password,
                            'last_login_ip'     => $this->input->ip_address(),
                            'last_login'        => time(),
                            );
                            $this->db_model->update($data2, 'member', array('id'  => $user_id)); //comment
                            debug_log($data2);
                            debug_log($password);

                            $sms = "Hello " . $data->name . ", \nYou have requested for Secure Password Reset. \n Your Temporary Secure Password is: " . $password . "\n".config_item('company_name');
                            $messvar="Ok";
                            $phone="91".$phone;
                            return (array(
                                "status"    => "true",
                                "message"   => "You have requested for Secure Password Reset. Your Request Password is Sent to your Phone " //. $password . " ." 
                            ));
                            }
                            elseif ((strlen($email)>2) && ($email == $data->email)) 
                            {
                                $randompassword=$this->common_model->randomPassword();
                                $password = password_hash($randompassword, PASSWORD_DEFAULT);
                                
                                $sub = "Secure Password Reset";
                                $msg = "Hello " . $data->name . ", <br><br>You have requested for Secure Password Reset. <br><br> Temporary Secure Password is: " . $randompassword . "<br><br>Kindly update password soon after login <br><br> Regards <br>Support Team<br>".config_item('company_name');

                                $status = $this->db_model->mail($data->email, $sub, $msg);
                                //debug_log('Email Status '.$status);
                
                                if($status == 'Success')
                                {
                                    $data2 = array(
                                      'secure_password' => $password,
                                      'last_login_ip'   => $this->input->ip_address(),
                                      'last_login'      => time(),
                                    );
                                    $this->db_model->update($data2, 'member', array('id' => $datas['id'])); 
                                    eturn (array(
                                        "status"    => "true",
                                        "message"   => "You have requested for Secure Password Reset. Your Request Password is Sent on your email " 
                                    ));
                                }
                                    else{
                                        return (array(
                                        "status"    => "false",
                                        "message"   => "Failed to send the email " 
                                    ));
                                }
                                
                            }                 
                    }
                //}                
        }

    public function updatesecure_password($userid,$data){
        $mypass = $this->db_model->select('secure_password', 'member', array('id' => $userid));
         if($data['repass'] == $data['newpass']){
            if (password_verify($data['oldpass'], $mypass) == true)
            {
                $new_pass = array(
                    'secure_password' => password_hash($data['newpass'], PASSWORD_DEFAULT),
                );
                $this->db->update('member', $new_pass);
                return array(
                    "status"    =>  "true",
                    "message"   =>  "Secure Password Updated Successfully!!."
                );
            }else{
                return array(
                    "status"    =>  "false",
                    "message"   =>  "The entered Current Password is wrong."
                );
            }
        }else{
            return array(
                "status"    =>  "false",
                "message"   =>  "The Retype Password field does not match the New Password field."
            );
        }

    }

    public function plans(){
         $this->db->select('*');
        return  $this->db->get('plans')->result();
    }

    public function user_info($userid){
        return $this->db_model->select_multi('name,id,rank,status', 'member', array('id' => $userid));
    }

    public function sponsor_exists($sponsor,$plan){
        $count=$this->db->query("select count(id) as cnt from member where id=$sponsor and signup_package=$plan")->row()->cnt;
        return $count;
    }
   
}