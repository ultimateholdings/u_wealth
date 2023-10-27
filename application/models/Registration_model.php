<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Registration_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->common_model->__session();
        $this->load->model('downline_model');
        $this->load->model('earning');
        $this->load->model('plan_model');
        $this->load->library('form_validation');
    }
    protected $validationRules    = [
        'name'     => 'required',
    ];

    protected $skipValidations = false;



    public function register_modal($md = '', $mpd = '', $pd = '', $new_id='')
    {
        $rm_t1 = time();
        //debug_log('Complete Registration Start Time '. $t1);
        
        #$user_id =          $new_id > 0 ? $new_id : $this->session->userdata('_user_id_');
        $user_id =          $md->id > 0 ? $md->id : $this->session->userdata('_user_id_');
        $name =             $md->id > 0 ? $md->name :$this->session->userdata('_user_name_');
        $date_of_birth =    $mpd->id > 0 ? $mpd->date_of_birth :$this->session->userdata('_date_of_birth_');
        #$sponsor =          $md->id > 0 ? config_item('top_id') : $this->session->userdata('_sponsor_');
        $sponsor =          $md->id > 0 ? $md->sponsor : $this->session->userdata('_sponsor_');
        #$position =         $this->session->userdata('_position_');
        $position =         $md->id > 0 ? $md->sponsor : $this->session->userdata('_position_');
        $plan =             $pd->id > 0 ? $pd->id : $this->session->userdata('_plan_');
        $phone =            $md->id > 0 ? $md->phone : $this->session->userdata('_phone_');
        $email =            $md->id > 0 ? $md->email : $this->session->userdata('_email_');
        $d_password=        $md->id > 0 ? 'Password@123' : $this->session->userdata('_d_password_');
        $password =         $md->id > 0 ? $md->password : $this->session->userdata('_password_');
        $secure_password =  $md->id > 0 ? $md->secure_password : $this->session->userdata('_secure_password_');
        $epin =             $md->id > 0 ? $md->epin : $this->session->userdata('_epin_');
        $address_1 =        $mpd->address != '' ? $mpd->address : $this->session->userdata('_address_');
        $city =             $mpd->city != '' ? $mpd->city : $this->session->userdata('_city_');
        $state =            $mpd->state != '' ? $mpd->state : $this->session->userdata('_state_');
        $zipcode =          $mpd->zip != '' ? $mpd->zip : $this->session->userdata('_zipcode_');
        $country =          $mpd->country != '' ? $mpd->country : $this->session->userdata('_country_');
        $placement_leg =    $md->id > 0 ? $md->placement_leg : $this->session->userdata('_placement_leg_');
        $mybusiness =       $pd->id > 0 ? $pd->direct_commission : $this->session->userdata('_my_business_');
        $topup =            $pd->id > 0 ? $pd->joining_fee : $this->session->userdata('_topup_');
        $plan_price =       $pd->id > 0 ? $pd->joining_fee : $this->session->userdata('_price_');
        $max_width =        $pd->id > 0 ? $pd->max_width : $this->session->userdata('_width_');
        $pd =               $pd->id > 0 ? $pd : $this->session->userdata('_plan_detail_');
        $account_status =   $md->id > 0 ? $md->status : $this->session->userdata('_member_status_');
        $pan =              $mpd->tax_no != '' ? $mpd->tax_no : $this->session->userdata('_pan_');
        $role =             $md->id > 0 ? $md->role : $this->session->userdata('role');
        $free_register =    $this->session->userdata('free_register');
        $lms_user =    $this->session->userdata('lms_user') ? $this->session->userdata('lms_user') : 0;


        //debug_log($pd->id);
        //debug_log($pd);
        if (config_item('rejoin')=='Yes') {
            if($new_id!='') {
                $placement_leg = 'A';
                $user_id = $new_id;
                $new_position = $this->plan_model->get_leg_position($pd, $sponsor, $placement_leg, $position);
                 $position = '';
                 $placement_leg = $new_position['leg'];
                 $sponsor = $new_position['position'];
                 $account_status = 'Inactive';
            }
        }

        ###############################################################################
        #
        # Now get selected blank Leg (eg: A, B, C) of position ID
        # If Position id is blank, sponsor ID will become position ID
        # If selected leg of position is not blank, will return error.
        #
        ###############################################################################

        debug_log('$user_id ' . $user_id .' ,$name ' . $name . ' ,$sponsor ' . $sponsor . ' ,$position ' . $position . ' ,$plan' . $plan);
        debug_log($placement_leg);

        if($user_id != '' && $name !='' && $sponsor != '' && $plan != '' && $password != '')
        {   
            $usertime = time();
            $query = $this->db->query("SELECT secret FROM member where usertime = ".$usertime);
            while($query->num_rows()>0){
                $same_time_ids = $query->row();
                debug_log('same_time_ids');
                debug_log($same_time_ids);
                sleep(1);
                $usertime = time();
                $query = $this->db->query("SELECT secret FROM member where usertime = ".$usertime);
            }

            $data = array(
                'id' => $user_id,
                'name' => $name,
                'sponsor' => $sponsor,                
                'signup_package' => $plan,
                'plan_gid' => 1,
                'phone' => $phone,
                'email' => $email,
                'password' => $password,
                'secure_password' => $secure_password,
                'usertime' => $usertime,
                'epin' => $epin,
                'join_time' => date('Y-m-d H:i:s'),
                'registration_ip' => $this->input->ip_address(),
                'placement_leg' =>$placement_leg,
                'topup' => $topup,
                'my_business' => $mybusiness,
                'mypv' => 0,
                'status' => 'Inactive',
                'role'=> $role,
                'lms_user'=> $lms_user,
                'leadership_bonus'=>date('Y-m-d'),
                'unilevel_bonus'=>date('Y-m-d'),
            );
            if($this->db->insert('member', $data))
            {
                debug_log($this->db->last_query());
                if(config_item('ecomm_theme')=='gmart'){
                   $data2 = array(
                    'affiliate_id' => $user_id,
                    'user_name' => $name,
                    'user_phone' => $phone,
                    'user_email' => $email,
                    'user_password' => md5($this->input->post('password')),
                    'affiliate_password'=>  $this->input->post('password'),
                    'created_at' => strtotime(date('Y-m-d h:i:s A'))
                );
                   $this->db->insert('tbl_users', $data2);
                   debug_log("tbl_users");
                   debug_log($this->db->last_query());
               }
            }

        }
        else
        {
            return array(
                "status"     => "false",
                "message"   =>  'Please enter correct details'
            );
        }

        $md = $this->db_model->select_multi('*', 'member', array('id' => $user_id, 'usertime' => $usertime));

        if ($md->secret > 0):
            
            #If inactive members not placing in tree means, position value canot be null
            $condition_flag = False;
            $condition_flag = config_item('inactive_in_tree')=='Yes' ? True : $condition_flag;
            $condition_flag = ((config_item('inactive_in_tree')!='Yes')&&($this->session->userdata('_type_') != 'paylater')) ? True : $condition_flag;

            $condition_flag = config_item('Holding_tank')=='Yes' ? False : $condition_flag;

            if (config_item('Holding_tank')=='Yes') {
                $data = array('status'=>$account_status, 'activate_time'=>date('Y-m-d H:i:s'));
                $this->db->where('secret', $md->secret);
                $this->db->update('member', $data);
                debug_log($this->db->last_query());   
            }

            if ($condition_flag){
                
              $query = $this->db->select('secret')->where(array('secret <'=>$md->secret, 'position'=>'', 'id !='=>config_item('top_id')))->get('member');
              while(($query->num_rows()>0) && ($i<5)){
                    $waiting_ids = $query->row();
                    debug_log('waiting_ids');
                    debug_log($waiting_ids);
                    sleep(1);
                    $i=$i+1;
                    $query = $this->db->select('secret')->where(array('secret <'=>$md->secret, 'position'=>'', 'id !='=>config_item('top_id')))->get('member');
              } 

              if ($this->session->userdata('community_leader')=="1" || (config_item('width')==3 && $sponsor==1001 && $_SESSION['api_call_for_matrix_plan']==1)) {
                  $status = array('position' => $sponsor, 'leg'=>'A');
                   $this->session->unset_userdata('community_leader');
              }
              else{
                $status = $this->plan_model->get_leg_position($pd, $sponsor, $placement_leg, $position);
              }
              if($status ==400){
                return array(
                   "status"    =>   "false",
                   "message"   => '<div class="alert alert-danger">Selected position is not available. Please choose other position</div>'
                    );
              } else {
                $position = $status['position'];
                $placement_leg = $status['leg'];
              }

              if((!$position>0)||($position==$user_id)){
                debug_log('Error getting the position - Either Position Empty or Same as Userid');
                return array(
                    "status"    =>   "false",
                    "message"   => 'Selected position is not available. Please choose other position'
                    );
                    
              }
            } else{
              $position = '';
            }

            if (config_item('rejoin')=='Yes') {
                if($new_id!='') {
                    $position = '';
                }
            }

            if(strlen($position)>1){

                // Since Top ID is common for multiple plans, Placement Leg can be updated only for A,B,C,D and E
                if($md->role != 'customer'){

                    if(config_item('enable_free_register')=='Yes')
                    {

                        if($free_register==2)
                        {
                            if(($position == config_item('top_id')) && ($this->db_model->count_all('member', array('position' => config_item('top_id'))) <6)){
                                $data = array($placement_leg => $md->id,);
                                $this->db->where('id', $position);
                                $this->db->update('member', $data);    
                            } else if($position != config_item('top_id')){
                                $data = array($placement_leg => $md->id,);
                                $this->db->where('id', $position);
                                $this->db->update('member', $data);    
                            }
                            if($pd->max_width==2){
                                $data = array($placement_leg => $md->id,);
                                $this->db->where(array('userid'=>$position, 'gid'=>$pd->group_id));
                                $this->db->update('level_details', $data); 
                            }
                        }



                    }
                    else
                    {

                        if(($position == config_item('top_id')) && ($this->db_model->count_all('member', array('position' => config_item('top_id'))) <6))
                        {
                            $data = array($placement_leg => $md->id,);
                            $this->db->where('id', $position);
                            $this->db->update('member', $data);    
                        } else if($position != config_item('top_id')){
                            $data = array($placement_leg => $md->id,);
                            $this->db->where('id', $position);
                            $this->db->update('member', $data);    
                        }
                        if($pd->max_width==2){
                            $data = array($placement_leg => $md->id,);
                            $this->db->where(array('userid'=>$position, 'gid'=>$pd->group_id));
                            $this->db->update('level_details', $data); 
                        }

                    }
                    

                    


                }

                debug_log($this->db->last_query());
                if($_SESSION['api_call_for_matrix_plan']==1){
                    $data = array('sponsor'=>$position,'position'=>$position,'placement_leg'=>$placement_leg, 
                    'status'=>$account_status, 'activate_time'=>date('Y-m-d H:i:s'));

                }else{
                    $data = array('position'=>$position,'placement_leg'=>$placement_leg, 
                    'status'=>$account_status, 'activate_time'=>date('Y-m-d H:i:s'));
                }
                $this->db->where('secret', $md->secret);
                $this->db->update('member', $data);
                if($_SESSION['api_call_for_matrix_plan']==1){
                    $_SESSION['_sponsor_']=$position;
                    $this->session->unset_userdata('api_call_for_matrix_plan');
                }
                debug_log($this->db->last_query()); 

            }

            $md = $this->db_model->select_multi('*', 'member', array('id' => $user_id));

            if($epin != ''){
				$Epin_query   = "SELECT is_free FROM `epin` WHERE epin=".$md->epin;
				$Epin_is_free   = $this->db->query($Epin_query)->row();
				if($Epin_is_free->is_free==0){
					$this->earning->debit_epin($epin,$user_id, $plan_price, 'Registration Fee', $pd->id);    
				}
                else{
                    $data = array(
                        'status' => 'Used',
                        'used_by' => $user_id,
                        'used_time' => date('Y-m-d H:i:s'),
                        'remarks' =>'Registration Fee',
                    );
                    $this->db->where('epin', $md->epin);
                    $this->db->update('epin', $data);
                }
            }            
            
            $data = array(
                'userid' => $user_id,
                'balance' => "0",
            );
            $this->db->insert('wallet', $data);

            $data = array(
                'userid' => $user_id,
                'balance' => "0",
            );
            $this->db->insert('voucher', $data);

            $data = array(
                'userid' => $user_id,
                'balance' => "0.00",
            );
            $this->db->insert('other_wallet', $data);

            $data = array(
                'userid' => $user_id,
                'address' => $address_1,
				'date_of_birth'=>$date_of_birth,
                'city'    => $city,
                'state'   => $state,
                'zip'     => $zipcode,
                'country' => $country,
                'tax_no'  => $pan,
                'last_update' => date('Y-m-d H:i:s'),
            );
            $this->db->insert('member_profile', $data);
            //debug_log($this->db->last_query());

            $data = array(
                'userid' => $user_id,
                's_name' => $name,
                's_email' => $email,
                's_phone' => $phone,
                's_address' => $address_1,
                's_city' => $city,
                's_state' => $state,
                's_zipcode' => $zipcode,
                's_country' => $country,
                'b_name' => $name,
                'b_email' => $email,
                'b_phone' => $phone,
                'b_address' => $address_1,
                'b_city' => $city,
                'b_state' => $state,
                'b_zipcode' => $zipcode,
                'b_country' => $country,
            );

            $this->db->insert('shipping_address', $data);

            $data = array(
                'secret' => $md->secret,
                'userid' => $md->id,
                'pid'    => $pd->id,
                'gid'    => $pd->group_id,
            );
            $this->db->insert('level', $data);

            if(config_item('crowdfund_type')=='Manual_Peer_to_Peer') {
                $data = array('userid' => $user_id,'pid'=>$pd->id);
                $this->db->insert('crowdfund_queue', $data);

                $cs = $this->db_model->select_multi('*','level_upgrade',array('plan_id'=>$md->signup_package, 'upgrade_type'=>($md->gift_level+1)));

                if((!empty($cs->id)) && (strval($cs->admin_charge)==0) && (strval($cs->sponsor_fee)==0)){
                
                     debug_log('cycle_level ' .config_item('cycle_level'));
                     #Assign cycle upline member only if there is config cycle level is not null
                if (config_item('cycle_level')!='') {
                    $upline_id = $this->plan_model->cycle_upline($md,$pd,$cs);
                     debug_log('$upline_id ' . $upline_id);
                }
                #Assign unlimited cycle upline member only if there is  config unlimited_cycle level is not null
                elseif (config_item('unlimited_cycle_level')!=''){
                    $upline_id = $this->plan_model->unlimited_cycle_upline($md,$pd,$cs);
                    debug_log('$upline_id ' . $upline_id);
                }
                 #Assign upline member only if there is  config cycle and config unlimeted cycle is  null
                else{
                    $upline_id = $this->plan_model->crowdfund_upline_new($md,$pd,$cs);
                    debug_log('$upline_id ' . $upline_id); }
                   
                    
                    if(strlen($upline_id) > 2)
                    {
                      $update_queue = "UPDATE crowdfund_queue SET level".($md->gift_level+1)." = $upline_id WHERE userid = $user_id";
                      $this->db->query($update_queue);
                      debug_log($this->db->last_query());   
                    }
                    else
                    {
                      $update_queue = "UPDATE crowdfund_queue SET level".($md->gift_level+1)." = ".config_item('top_id')." WHERE userid = $user_id";
                      $this->db->query($update_queue);
                      debug_log($this->db->last_query());   
                    }
                }              

            }

            ##########################################################################
            #
            # Now will send welcome email and SMS.
            #
            ##########################################################################

            if((config_item('sms_on_join') == "Yes")&&($this->session->userdata('_id_upgrade_')!='Yes')):
                $sms = "Hello " . $name . ", \nThank you for registering with " . config_item('company_name') . "\nYour UserID is: " . config_item('ID_EXT','User Id') . $user_id . " \nPassword is: " . $d_password ;
                $messvar="Ok";
                $phone="91".$phone;
                $this->common_model->sms($phone, urlencode($sms));
            endif;
            $sub = "Welcome to " . config_item('company_name');
            $msg = "Hello " . $name . "<br/> Welcome to " . config_item('company_name') . " Just now you have successfully registered with us. Hope your journey with us will remain exciting and rewarding. <hr/>  <strong>User ID :</strong> " . config_item('ID_EXT') . $user_id . "<br/>
            <strong>Password :</strong> " . $this->input->post('password') . "
            <hr/><br/>Regards,<br/>" . $_SERVER['HTTP_HOST'];

            $this->load->config('email');
            if (trim(config_item('smtp_host')) !== "") {
                $status = $this->db_model->mail($email, $sub, $msg);
                debug_log('Email Status '.$status);
            } 

            if(config_item('enable_free_register')=='Yes')
            {
                $status = $this->Update_after_position($md, $pd);
            }
            else
            {
                $status = $this->Update_after_position($md, $pd);    
            } 


            debug_log('Before Update After Position ' . (time()-$rm_t1));

            
              // $status = $this->Update_after_position($md, $pd);
            
        else:
            return array(
                "status"    =>  "false",
                "message"   =>  'Some error occured while registering. please try again.'//300
            );
        endif;

        return array(
            'status'    =>  "true",
            "message"   =>  "Successfull registration"
        ); //200
    }

    public function Update_after_position($md, $pd)
    {
      $uap_t1 = time(); 
      if($md->position>0){
        
        if($md->role == 'customer'){
            $data = array('position' => '');
            $this->db->where('id', $md->id);
            $this->db->update('member', $data);
        }

        //debug_log($this->db->last_query());
        if(config_item('enable_lms')=='Yes'){
            $this->downline_model->update_level_details_lms($md->secret,$md->id,$pd,$md->position,$md->placement_leg,1);
        }

        $this->downline_model->update_level_details($md->secret,$md->id,$pd,$md->position,$md->placement_leg,1);
        $this->downline_model->update_level($md->id,$pd);
        $this->common_model->update_sponsor_level_details($md->id,$md->secret);
        $this->downline_model->update_total_downline_id($md->id, $pd);

        if(config_item('same_tree')=='Yes'){
            $pids = $this->db->query("select * from plans where id > ".$pd->id." and type = 'Registration'")->result();

            foreach ($pids as $p_d) {
                $this->downline_model->update_level_details($md->secret,$md->id,$p_d,$md->position, $md->placement_leg,0);
                $this->downline_model->update_level($md->id,$p_d);
                $this->downline_model->update_total_downline_id($md->id, $p_d);
            }

        }

        if(config_item('all_downline')=='Yes'){
            $ud = $this->downline_model->calculate_upline($md->id,$pd->id,'');
            $secret = $md->secret;
            foreach ($ud as $key => $upline)
            { 
                debug_log('enter');
                $this->db->query("UPDATE level_details SET all_levels = CONCAT(all_levels, $secret, ',') where userid = ".$upline." AND gid = ".$pd->group_id);
                debug_log($this->db->last_query());
            }
        }


        if(($pd->max_width == 2) && ($pd->auto_pool !== "Yes"))
        {
          $this->plan_model->insert_binary_data($md, $pd);
        }

        if (config_item('enable_help_plan') == "Yes") {
          $this->load->model('help_plan');
          $this->help_plan->first_help($md->id, $md->sponsor, $md->position);
        }

        debug_log('Before Credit Joining Commission ' . (time()-$uap_t1));

        if (config_item('fix_income') == "Yes" && $pd->joining_fee > 0)
        {
          $this->earning->fix_income($md->id, $md->sponsor, $pd->joining_fee);
        }
        else
        {
          //inserting the plan details into product_sale after successful registration, so that the user is eligible for product purchase commission
          
          if ((config_item('joining_product') == 'Yes') && (config_item('make_join_product_entry') == "Yes") && ($md->status == 'Active'))
          {
            if(($this->session->userdata('_id_upgrade_')!='Yes')&&($pd->joining_fee>0)){
                    $array = array(
                    'product_id' => 0,
                    'name'       => $pd->invoice_name,
                    'userid'     => $md->id,
                    'qty'        => 1,
                    'cost'       => $pd->joining_fee,
                    'date'       => date('Y-m-d H:i:s'),
                    'deliver_date'  => date('Y-m-d H:i:s'),
                    'status'     => "Completed",
                    'payment'    => "Registration Purchase",
                );

                $this->db->insert('product_sale', $array);

                $this->earning->add_invoice($md->id, $pd->id, $pd->joining_fee, $this->db->insert_id());    
            }
            $Epin_query   = "SELECT is_free FROM `epin` WHERE epin=".$md->epin;
            $Epin_is_free   = $this->db->query($Epin_query)->row();
            if($Epin_is_free->is_free==0){
                $this->earning->credit_joining_commission($pd,$md);
            }
          }
          else if((config_item('joining_product') == 'Yes') && (config_item('make_join_product_entry') == "No") && ($md->status == 'Active'))
          {
            if(($this->session->userdata('_id_upgrade_')!='Yes')&&($pd->joining_fee>0)){
                $array = array(
                    'product_id' => 0,
                    'name'       => $pd->invoice_name,
                    'userid'     => $md->id,
                    'qty'        => 1,
                    'cost'       => $pd->joining_fee,
                    'date'       => date('Y-m-d H:i:s'),
                    'payment'    => "Registration Purchase",
                );

                $this->db->insert('product_sale', $array);
                //debug_log($this->db->insert_id());
                $this->earning->add_invoice($md->id, $pd->id, $pd->joining_fee, $this->db->insert_id());
            }
          }
          else if($md->status == 'Active'){
                $Epin_query   = "SELECT is_free FROM `epin` WHERE epin=".$md->epin;
                $Epin_is_free   = $this->db->query($Epin_query)->row();
                if($Epin_is_free->is_free==0){
                    $this->earning->credit_joining_commission($pd,$md);
                }
              if(($this->session->userdata('_id_upgrade_')!='Yes')&&($pd->joining_fee>0)){
                $this->earning->add_invoice($md->id, $pd->id, $pd->joining_fee, 0);
              }
          }
        }
      }

    }


    public function register_new($m_id, $p_id)
    {
    	
      $pd = $this->db_model->select_multi('*', 'plans', array('id' => $p_id));

      ##############################################################################
      #
      # Create a New ID for Member
      #
      ##############################################################################
      $rand = rand(1000000, 9999999);
      $id = $this->db_model->select("id", "member", array("id" => $rand));
      while($id==$rand){
          $rand = $rand + 1;    
          $id = $this->db_model->select("id", "member", array("id" => $rand));
      }
      $id = $rand;

      $tax_amount = round($pd->joining_fee - ($pd->joining_fee / (1 + $pd->gst / 100)), 2);

      $array = array(
          'new_id' => $id,
      );
      $this->db->where('id', $m_id);
      $this->db->update('member', $array);

      $md = $this->db_model->select_multi('*', 'member', array('id' => $m_id));
      $mpd = $this->db_model->select_multi('*', 'member_profile', array('userid' => $md->id));

      $this->session->unset_userdata('_tax_amount_');
      $this->session->unset_userdata('_member_status_');
      $this->session->unset_userdata('_type_');
      
      $this->session->set_userdata('_tax_amount_', $tax_amount);
      $this->session->set_userdata('_member_status_', 'Active');
      $this->session->set_userdata('_type_', 'userid');

      debug_log('Creation of New ID for member '.$m_id.' is started and the new ID is '.$id);
      $status = $this->registration_model->register_modal($md, $mpd, $pd, $id);
      if($status['status'] == true)
      {
        
        if (config_item('sms_on_join') == "Yes"){
            $sms = "Hello ".$md->name.", Congratulations!!!\nYour ID ".$m_id."is upgraded to ".$pd->plan_name. "\nYour UserID is: " . config_item('ID_EXT','User Id') . $id . " \nPassword is: Password@123\nRegards:\n".config_item('company_name');
            $messvar="Ok";
            $phone="91".$md->phone;
            $status = $this->common_model->sms($phone, urlencode($sms));
            debug_log($status);
        }

        debug_log('New ID for the user is '.$id);

        return array(
            "status"    =>  "true",
        );

      } else {
        $array = array(
            'new_id' => '',
        );
        $this->db->where('id', $md->id);
        $this->db->update('member', $array);
        debug_log('New ID for the user is removed');

        return $status;
      }

    }

    public function upgrade_member($mid, $pid, $type='Auto')
    {
        debug_log('Upgrading Member Id '.$mid.' Started');

        $md = $this->db_model->select_multi('*','member',array('id'=>$mid));
        $pd = $this->db_model->select_multi('*','plans',array('id'=>$pid));
        
        if($type =='Auto')
        {
            $status = $this->plan_model->get_leg_position($pd, $md->sponsor, '', '');
            debug_log($status);

            if($status ==400){
                return 400;
            }else {
                $position = $status['position'];
                $placement_leg = $status['leg'];
            }

            if((!$position>0)||($position==$mid)){
                debug_log('Error getting the position - Either Position is Empty or Position is same as Userid');
                return 400;
            }
        }else{
            $position = '';
        }

        $update_plan = "UPDATE member SET signup_package=".$pid." WHERE id = ".$md->id;
        $this->db->query($update_plan);

        /*

        #$update_upline = "UPDATE member SET ".$md->placement_leg."=0 where id = ".$md->position;

        $update_plan = "UPDATE member SET gift_level = 0 , position = '', signup_package=".$pid.", A=0, B=0,C=0,D=0,E=0, F=0, G=0, status = 'Inactive' WHERE id = ".$md->id;
        #$this->db->query($update_plan);
        #debug_log($this->db->last_query());

        $md = $this->db_model->select_multi('*','member',array('id'=>$mid));

        $multi_array = $this->db->query('select id from member where position = '.$md->id)->result_array();

        if(count($multi_array)>0){
            $iterator_array = new RecursiveIteratorIterator(new RecursiveArrayIterator($multi_array));
            $flat_array = array();

            foreach($iterator_array as $v) {
              array_push($flat_array, $v);
            }
            $ids = implode(',',$flat_array);

            $update_position = "UPDATE member SET position = 0 WHERE id IN (" .$ids .")";
            #$this->db->query($update_position);
            debug_log($this->db->last_query());
        }
        
        */

        if(strlen($position)>1){

            // Since Top ID is common for multiple plans, Placement Leg can be updated only for A,B,C,D and E
            if($md->role != 'customer'){
                if(($position == config_item('top_id')) && ($this->db_model->count_all('member', array('position' => config_item('top_id'))) <6)){
                    $data = array($placement_leg => $md->id,);
                    #$this->db->where('id', $position);
                    #$this->db->update('member', $data);    
                } else if($position != config_item('top_id')){
                    $data = array($placement_leg => $md->id,);
                    #$this->db->where('id', $position);
                    #$this->db->update('member', $data);    
                }
            }

            debug_log($this->db->last_query());

            $data = array('position'=>$position,'placement_leg'=>$placement_leg, 
                'status'=>'Active', 'activate_time'=>date('Y-m-d H:i:s'));
            $this->db->where('secret', $md->secret);
            $this->db->update('member', $data);

            debug_log($this->db->last_query()); 

            $md = $this->db_model->select_multi('*','member',array('id'=>$mid));
            $this->registration_model->Update_after_position($md,$pd);

        }

        debug_log('Upgrading Member Id '.$mid.' Completed');

        return 200;

    }
	function get_counrty_name(){
		$countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");	
	return $countries;
	}
}


