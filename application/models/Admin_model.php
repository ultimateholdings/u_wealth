<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    public function __construct()
    {

    }
    public function admin_password($datas){
         $data = $this->db_model->select_multi("password, secure_password", 'admin', array('id' => $datas['id']));
        if (password_verify($datas['oldpass'], $data->password) == true)
        {
            if(password_verify($datas['securepass'],$data->secure_password)){
            $new_pass = array(
                'password' => password_hash($datas['newpass'], PASSWORD_DEFAULT),
            );
                  $success = $this->db_model->update($new_pass, 'admin', array('id' => $datas['id']));
                  return array(
                    'success' => "true",
                    'message' => 'Password Updated Successfully.'
                );   
            }else{
                return array(
                    'success' => "false",
                    'message' => 'Incorrect Secure Password.'
                );//incorrect secure password
                }
        }else{
            return array(
                'success' => "false",
                'message' => 'Incorrect Password.'
            ); //incorrect password
            }
    }

    public function reset_secure_pass($username,$email,$password)
    {
        $data = $this->db_model->select_multi("name, username, password, phone,email", 'admin', array('username' => $username));
        debug_log($username);
        debug_log($email);
        debug_log($password);
        if(((!(strlen($email)>2))) || ((password_verify($password, $data->password) != true))){
            if($flag!=''){
                return 2;
            }
            $this->session->set_flashdata('common_flash', '<div class="alert alert-danger">Invalid details. Please Enter Valid Details.<br> 3 Consecutive Incorrect Attempts will block your account !!!</div>');
                  redirect(site_url('admin/settings'));
        }
        if ((trim(config_item('smtp_host')) !== "")) {
            if ((strlen($email)>2) && ($email == $data->email)) 
            {
                $randompassword=$this->common_model->randomPassword();
                $password = password_hash($randompassword, PASSWORD_DEFAULT);
                debug_log('randompassword '.$randompassword);
                debug_log('password '.$password);
                
                $sub = "Secure Password Reset";
                $msg = "Hello " . $data->name . ", <br><br>You have requested for Secure Password Reset. <br><br> Temporary Secure Password is: " . $randompassword . "<br><br>Kindly update password soon after login <br><br> Regards <br>Support Team<br>".config_item('company_name');
                $status = $this->db_model->mail($data->email, $sub, $msg);

                debug_log('Email Status '.$status);

                if($status == 'Success')
                {
                    $data2 = array(
                      'secure_password' => $password,
                      'last_login' => time(),
                    );
                    $this->db_model->update($data2, 'admin', array('username' => $username));    
                    if($flag!=''){
                        return 1;
                    }

                    $this->session->set_flashdata('common_flash', '<div class="alert alert-success">Success - Temporary Secure password is sent to your registered Email. </div>');
                    redirect('admin/settings');
                }
                else
                {
                   if($flag!=''){
                        return 4;
                    }

                    $this->session->set_flashdata('common_flash', '<div class="alert alert-danger">Password couldnot reset at the moment. Please try later !!!</div>');
                    redirect('admin/settings');
                }
            }
            else
            {
                if($flag!=''){
                    return 5;
                }

              $this->session->set_flashdata('common_flash', '<div class="alert alert-danger">Invalid Details. Please Enter Correct Details !!!</div>');
              redirect('admin/settings');
            }
        }
        else
        {
            if($flag!=''){
                return 4;
            }
            $this->session->set_flashdata('common_flash', '<div class="alert alert-danger">Password couldnot reset at the moment. Please try later !!!</div>');
            redirect('admin/settings');
        }
    }
    public function profile_update($data){
        $mypass = $this->db_model->select('secure_password', 'admin', array('id' => $data['id']));

            if(password_verify($data['securepass'], $mypass) == true){
                
                $array = array(
                    'name' => $data['name'],
                    'phone' => $data['phone'],
                    'email' => $data['email'],
                );
                $this->db_model->update($array, 'admin', array('id' => $data['id']));
                return array(
                    "status"    =>  "true",
                    "message"   =>  'Profile Updated Successfully.'
                );
            }else{
                return array(
                    "status"    =>  "false",
                    "message"   =>  'The entered Secure Password is wrong.'
                );
                
            }
    }
    public function admin_login($user,$password){
        $data = $this->db_model->select_multi("id, name, password, email, ip, last_login", 'admin', array('username' => $user));

        if (password_verify($password, $data->password)) {
            session_unset();
            $session = md5($user . time());
            $this->session->set_userdata(array(
                'admin_id' => $data->id,
                'email' => $data->email,
                'name' => $data->name,
                'ip' => $data->ip,
                'last_login' => $data->last_login,
                'session' => $session,
            ));
            $data2 = array(
                'ip' => $this->input->ip_address(),
                'last_login' => time(),
                'session' => $session,
            );
            $this->db_model->update($data2, 'admin', array('id' => $data->id));
            return array(
                "status"    =>  "true",
                "message" => "successfull login"
            );
        }else{
            return array(
                "status" => "false",
                "message" => 'Invalid Username or Password'
            );
        }
    }
    public function transfer_epin($data){
        if(!$this->db_model->check_user($data['from'])>0){
            return array(
                "status" => "false",
                "message" => "The Sender User ID does not exist !!!"
            );
        }
        if(!$this->db_model->check_user($data['to'])>0){
            return array(
                "status" => "false",
                "message" => "The To User ID does not exist !!!"
            );
        }

        $avl_qty = $this->db_model->count_all('epin', array(
            'issue_to' => $data['from'],
            'amount'   => $data['amount'],
            'status'   => 'Un-used',
        ));

        if ($avl_qty < $data['qty']) {
            return array(
                "status" => "false",
                "message" => "The User ID have only ' . $avl_qty . ' Un-used epin of  ' . $data[amount] . '."
            );
        }else{

        $level_sponsor_sql = "UPDATE `epin` SET `issue_to` = ".$data['to'].", 
            `transfer_by` = 
                CASE 
                WHEN CHAR_LENGTH(transfer_by) >0 THEN CONCAT(transfer_by,',',".$data['from'].") 
                ELSE CONCAT(',',".$data['from'].")
                END, 
                `transfer_time` = '".date('Y-m-d H:i:s')."'
                WHERE `issue_to` = ".$data['from']." AND `amount` = ".$data['amount']." AND `status` = 'Un-used' 
            LIMIT ".$data['qty']."";
        $this->db->query($level_sponsor_sql);

        //debug_log($this->db->last_query());
        $data =  "' . $data[qty] . ' e-PIN transferred from  ' . $data[from] . ' to ' . $data[to] . ' of  ' . $data[amount] . '."; 
        return array(
            "status"    =>  "true",
            "message"   =>  $data
        ); 
    }
    }
}