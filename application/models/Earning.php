<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Earning extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->common_model->__session();
        $this->load->model('downline_model');
        $this->load->model('plan_model');
        $this->load->model('gmlm_model');

    }   

    // get all types of ads for create ads by session id
    function get_all_ads_types($member_ads_types="")
    {
      
        $this->db->distinct();
        $this->db->select('id, type');
        if(!empty($member_ads_types)) {
          $arr = array();
          $arr = (explode(",",$member_ads_types));
          for($i=0; $i<count($arr);$i++) {
            $this->db->or_where('id', $arr[$i]);
          }
        }
        $this->db->from('ads_type');
        return $this->db->get();
    } 
  
    public function debit_epin($epin, $user_id, $amount, $type, $pid='')
    {

      if (trim($epin) !== "") {
          $epin_value = $this->db_model->select('amount', 'epin', array(
              'epin' => $epin,
              'status' => 'Un-used',
          ));

          $epin_type = $this->db_model->select('type', 'epin', array(
              'epin' => $epin,
              'status' => 'Un-used',
          ));

          if ($epin_value <= 0) {
              return 100;
          } else if ($epin_value < $amount) {
              return 200;
          } else {
            if ($epin_type == "Multi Use"):
                $remaining_amount = $epin_value - $amount;
                if ($remaining_amount <= 0):
                    $data = array(
                        'status' => 'Used',
                        'used_by' => $user_id,
                        'used_time' => date('Y-m-d H:i:s'),
                        'remarks' =>$type,
                    );
                else:
                    $data = array(
                        'amount' => $remaining_amount,
                        'used_by' => $user_id,
                        'used_time' => date('Y-m-d H:i:s'),
                        'remarks' =>$type,
                    );
                endif;
                $this->db->where('epin', $epin);
                $this->db->update('epin', $data);
            else:
                $data = array(
                    'status' => 'Used',
                    'used_by' => $user_id,
                    'used_time' => date('Y-m-d H:i:s'),
                    'remarks' =>$type,
                );
                $this->db->where('epin', $epin);
                $this->db->update('epin', $data);
            endif;

            //debug_log($this->db->last_query());

            $this->earning->add_deduction($user_id,'Admin',$amount,$type,$type,$pid,'epin',$epin);

            //debug_log($this->db->last_query());
            //debug_log('Renewal successful ' . $user_id);
              return 500;
          }
      }
      else {
        return 200;
      }
    }


    public function debit_renewal_fee($user_id, $amount, $get_user_balance)
    {

      $rand = mt_rand(10000000, 99999999);
      $epin = $this->db_model->select("epin", "epin", array("epin" => $rand));
      while($epin==$rand){
          $rand = $rand + 1;    
          $epin = $this->db_model->select("epin", "epin", array("epin" => $rand));
      }
      $array = array(
          'epin' => $rand,
          'amount' => $amount,
          'issue_to' => $user_id,
          'generated_by' => $user_id,
          'generate_time' => date('Y-m-d H:i:s'),
      );

      $this->db->insert('epin', $array);
      //debug_log($this->db->last_query());

      $arra = array('balance' => ($get_user_balance - $amount),);
      $this->db->where('userid', $user_id);
      $this->db->update('wallet', $arra);
      wallet_log($this->db->last_query());

      $status = $this->debit_epin($rand, $user_id, $amount, 'renewal');
      return $status;
    }

    public function update_status()
    {
      $this->db->select('id,signup_package')->from('member')->where(array('topup >' => "0",'id !=' => config_item('top_id'), 'position !=' => ''))->order_by(config_item('member_order_by'), 'ASC');
      $users = $this->db->get()->result();
      foreach ($users as $user):
          $user_id        = $user->id;
          $renewal  = $this->db_model->select_multi('roi,roi_limit, recurring_fee,recurring_duration', 'plans', array('id' => $user->signup_package));
          $roi = $renewal->roi;
          $roi_limit     = $renewal->roi_limit;
          $recurring_fee = $renewal->recurring_fee;
          $recurring_duration = $renewal->recurring_duration;

          if($recurring_fee > 0) {

            $get_last_renewal = $this->db_model->select('date', 'deductions', array(
            'user_id' => $user_id,
            'type'   => 'renewal',
            ));

            $roi_sum = $this->db_model->sum('amount', 'earning', array('userid' => $user_id,
                    'type'   => 'ROI','secret' => $user->signup_package,));

            $activate_time = $this->db_model->select('activate_time', 'member', array('id' => $user_id));
            $last_due_date = date('Y-m-d', time() - (86400 * $recurring_duration));

            $roi_limit = $roi_limit > 0 ? $roi_limit : 0;
            $roi_sum = $roi_sum > 0 ? $roi_sum : 0;

            if($roi_limit > 0)
            {
              $get_last_roi = $this->db_model->select('date', 'earning', array(
              'userid' => $user_id, 'type'   => 'ROI', 'secret' => $user->signup_package,));
            }
            else {
              $get_last_roi = date('Y-m-d', time() - (86400 * 1));
            }

            //debug_log('$get_last_renewal '.$get_last_renewal.',$last_due_date '.$last_due_date.',$activate_time '.$activate_time.',$last_due_date '.$last_due_date.',$roi_sum '.$roi_sum.',$roi_limit'.$roi_limit);

            if(($get_last_renewal < $last_due_date) && ($activate_time <= $last_due_date) && ($roi_sum >= $roi_limit) && ($get_last_roi <  date('Y-m-d')))
            {
              $get_user_balance = $this->db_model->select('balance', 'wallet', array('userid' => $user_id));
              //debug_log('$get_user_balance '.$get_user_balance);
              if($get_user_balance >= $recurring_fee)
              {
                $status = $this->debit_renewal_fee($user_id, $recurring_fee, $get_user_balance);
                if($status == 500)
                {
                  $top_up = $this->db_model->select('topup', 'member', array('id' => $user_id));
                  $data = array('status' => 'Active','topup' => $recurring_fee + $top_up);
                  $this->db->where('id', $user_id);
                  $this->db->update('member', $data);
                }
                else{
                  $data = array('status' => 'Suspend');
                  $this->db->where('id', $user_id);
                  $this->db->update('member', $data);
                  //debug_log('Renewal Not successful account Suspended' . $user_id);
                }
              }
              else {
                $data = array('status' => 'Suspend');
                $this->db->where('id', $user_id);
                $this->db->update('member', $data);
                //debug_log('Renewal Not successful account Suspended' . $user_id);
              }
           }
        }
      endforeach;
    }

    public function credit_joining_commission($pd,$md)
    {
      $cjm_t1 = time();
      $this->downline_model->update_total_downline_active($md->id, $pd, $md->status);

      if (config_item('enable_based_pv')=='Yes')
      {
          debug_log("enable_based_pv1");
          $this->gmlm_model->get_current_package($md);
      }
      
      if($pd->joining_fee > 0)
      {
          // Update Tax Report
          if($this->session->userdata('_id_upgrade_')!='Yes'){
            $tax_amount = round($pd->joining_fee - ($pd->joining_fee / (1 + $pd->gst / 100)), 2);
            $invoice_id = $this->db_model->select('id', 'invoice', array('invoice_name'=>$pd->invoice_name, 'userid'=>$md->id)); 
            if($tax_amount > 0)
            {
                $taxdata=array(
                     'userid'=>$md->id,
                     'invoice_id' => $invoice_id,
                     'amount'=>$pd->joining_fee,
                     'tax_amount' =>$tax_amount, 
                     'tax_percnt' =>$pd->gst,
                     'date' => date('Y-m-d H:i:s'),
                     'transaction_id'=>$pd->invoice_name . ' - Registration',
                 );
              $this->db->insert('tax_report', $taxdata);
            }
            //debug_log($this->db->last_query());
          }

          $this->earning->credit_direct_referral_income($md,$pd);
          $this->earning->credit_level_referral_income($md,$pd);
          //$this->earning->credit_binary_points_new($md,$pd);
          
          #$this->earning->credit_binary_commission($md->id, $pd);
          
          //temprorly not needed 
          /*if (config_item('ecomm_theme')=='gmart') {
            $this->earning->credit_product_comm_gmart($md,$pd,array(),array(),'Joining Purchase Commission');
          } else {
            $this->earning->credit_product_comm($md,$pd,array(),array(),'Joining Purchase Commission');
          }*/

          //$this->earning->credit_binary_commission_all();

          $main_users_id=$md->id;
          $main_plan_pv=$pd->pv;
          $this->earning->update_pv_for_all($main_users_id,$main_plan_pv);
          
          $this->earning->credit_binary_commission_all_new($md,$pd);
          
          
          $this->user_model->update_user_rank();
          

          if((config_item('enable_crowdfund')=='Yes') && (config_item('crowdfund_type')=='Automatic'))
          {
            $cs = $this->db_model->select_multi('*', 'level_upgrade', array('plan_id'=>$pd->id, 'upgrade_type'=>1));
            $upline_id = $md->position;
            if(config_item('unlimited_cycle_level')!='')
            {
              $upline_id = $this->plan_model->unlimited_cycle_upline($md,$pd,$cs);
              debug_log('$upline_id ' . $upline_id);
            }
              $member_amount = $this->db_model->select('upgrade_amount', 'level_upgrade', array('plan_id'=>$pd->id, 'upgrade_type'=>1));

              $admin_amount = $this->db_model->select('admin_charge', 'level_upgrade', array('plan_id'=>$pd->id, 'upgrade_type'=>1));

              $this->pay_earning('admin', $md->id, 'Joining Admin Fee', 'Joining Admin Fee from '.$md->name, $admin_amount, '', $pd->id,$pd->id);
              $this->pay_earning($upline_id, $md->id, 'Level 1 Income', 'joining Amount from '.$md->name, $member_amount, '', $pd->id,$pd->id);

              $this->earning->payout(array($upline_id));

              $array = array('gift_level'=> 1,);
              $this->db->where(array('id'=>$md->id));
              $this->db->update('member', $array);

              $this->earning->crowdfund_income($pd->id, $pd->max_width, $md->id, $upline_id, $level=1);
          }

          #Below function is used for Binary Plan Level Completion Income
          $this->earning->binary_level_completion_income($md->position, $pd);
          $this->earning->single_leg_income();
         // $this->earning->credit_referal_comm_sponsor($md->id,$md->sponsor,$pd->id);
          
          #Below Function is used for Level Completion Income
          $this->earning->level_completion_income();
          $this->earning->board_completion_income($md->signup_package);
          $this->earning->target_reach_income();
          $this->earning->level_completion_roi_income();
          $this->earning->payout(array());
      }

      $this->earning->reward_process();
      $this->earning->rank_process();
      //$this->downline_model->update_legs(array());

      if (config_item('enable_based_pv')=='Yes')
      {
          debug_log("enable_based_pv1");
          $this->gmlm_model->get_current_package($md);
      }

      if ($pd->qty !== "-1")
      {
          $array = array('qty' => ($pd->qty - 1));
          $this->db->where('id', $pd->id);
          $this->db->update('plans', $array);
      } else {}

      $array = array('sold_qty' => ($pd->sold_qty + 1));
      $this->db->where('id', $pd->id);
      $this->db->update('plans', $array);
      debug_log('After complete credit joining commission ' . (time()-$cjm_t1));
    }

    public function credit_binary_commission_all()
    {
      $gid = $this->db_model->select('group_id','plans',array('max_width'=>2,'type!='=>'Repurchase'));
      #assign a random high value, if there are no binary plans set in the database
      $gid = $gid > 0 ? $gid : 100; 

      $data = $this->db->query("select t1.user_id as id,t1.left_unpaid, t1.right_unpaid, t1.first_pair_paid, t2.pid, t2.total_a, t2.total_b FROM binarydata as t1
                                LEFT JOIN
                                (select userid, pid, gid, total_a, total_b from level_details where gid = $gid ) as t2 ON t1.user_id = t2.userid
                                where length(t1.left_unpaid) > 2 and length(t1.right_unpaid) > 2
                               ")->result();
      debug_log($this->db->last_query());
      debug_log($data);

      foreach ($data as $result) {
        $pd = $this->db_model->select_multi('*', 'plans',array('id'=>$result->pid));
        $this->credit_binary_commission_updated($result, $pd);
      }
    }

    public function credit_binary_commission_updated($md, $pd)
    {
        $left_unpaid = $md->left_unpaid;
        $right_unpaid = $md->right_unpaid;

        debug_log("credit_binary_commission_updated");
        debug_log($md);
        debug_log($pd);


        foreach(explode(",",substr($left_unpaid,1)) as $secret)
        {
            $left_node = $this->db_model->select('id','member', array('secret' => $secret));
            $left_secret = $secret;
            if($left_node == '' && $secret >= 0) {
                #$status = $this->common_model->remove_binary_data($secret,$md->id,1);
                $left_unpaid = str_replace(','.$secret,'',$left_unpaid);
            }
            if($left_node > 0) {break;}
        }
        foreach(explode(",",substr($right_unpaid,1)) as $secret)
        {
            $right_node = $this->db_model->select('id','member', array('secret' => $secret));
            $right_secret = $secret;
            if($right_node == '' && $secret >= 0) {
                #$status = $this->common_model->remove_binary_data($secret,$md->id,2);
                $right_unpaid = str_replace(','.$secret,'',$right_unpaid);
            }
            if($right_node > 0) {break;}
        }

        debug_log('legs - Member id '.$md->id.' '.$left_unpaid.' '.$right_unpaid.' '.$left_node.' '.$right_node);

        if($md->first_pair_paid == 0)
        {
            if($left_node && $right_node)
            {
                $this->credit_first_pair_commission($md->pid,$md->id,$left_node, $right_node,$left_unpaid,$right_unpaid);
            }

        }
        if($md->first_pair_paid == 1)
        {
            $cappingpairs = $pd->capping;
            $cappingamount = $pd->cappingamount;

            debug_log('cappingpairs '.$cappingpairs . ' cappingamount '.$cappingamount);

            $cappingpairs = $cappingpairs > 0 ? $cappingpairs : 10000;
            $cappingamount = $cappingamount > 0 ? $cappingamount : 100000;

            debug_log("error1");
            debug_log($md->id);
            debug_log($md->pid);

            $pairs_comm = $this->get_pairs_comm($md->id,$md->pid);
            $total_pairs = $pairs_comm[0];
            $cappingpairs = $pairs_comm[1];
            $total_comm = $pairs_comm[2];

            debug_log('Capping_check - User ID'.$md->id.' '. $total_pairs . ' ' . $total_comm . ' ' . $cappingpairs . ' '. $cappingamount . ' '.$pd->carry_forward . ' ' . $upline_leg . ' ');

            //left_count
            $count_left = $md->total_a;
            //right_count
            $count_right = $md->total_b;
            $power_leg=$count_left >=$count_right ? "left" :"right";

            if($total_pairs < $cappingpairs && $total_comm < $cappingamount)
            {
                if($left_node && $right_node)
                {
                   $left_plan = $this->db_model->select('pid', 'level_details',array('userid' => $left_node, 'gid'=>$pd->group_id));
                  debug_log($this->db->last_query());
                  $right_plan = $this->db_model->select('pid', 'level_details',array('userid' => $right_node, 'gid'=>$pd->group_id));
                  debug_log($this->db->last_query());
                   if($pd->config_comm_pv == 'percentage'){
                    $right_comm= $this->db_model->select('pv', 'plans', array( 'id' =>$right_plan));
                    $left_comm= $this->db_model->select('pv', 'plans', array( 'id' =>$left_plan));
                    $second_pair_comm = $left_comm >= $right_comm ? $right_comm : $left_comm;
                    $pd_plan = $left_comm >= $right_comm ? $right_plan : $left_plan;
                    $pd_plan = $this->db_model->select('second_pair_commission', 'plans',array('id' => $pd_plan));
                    $second_pair_comm = $second_pair_comm*$pd_plan/100;
                   }else{
                    /*$second_pair_comm= $pd->second_pair_commission > $pd->second_pair_commission ? $pd->second_pair_commission : $pd->second_pair_commission;*/
                    /*$right_comm= $this->db_model->select('second_pair_commission', 'plans', array( 'id' =>$right_plan));
                    $left_comm= $this->db_model->select('second_pair_commission', 'plans', array( 'id' =>$left_plan));*/

                    $second_pair_comm1= $this->db_model->select('second_pair_commission', 'plans', array( 'id' =>$pd->id));
                    
                    $second_pair_comm = $second_pair_comm1;
                  }

                    $second_pair_comm = ($cappingamount - $total_comm) >= $second_pair_comm ? $second_pair_comm : $cappingamount - $total_comm;

                    $left_name = $this->db_model->select('name', 'member',array('id' => $left_node));
                    $right_name = $this->db_model->select('name', 'member',array('id' => $right_node));
                    $matching_pair=$left_name.'('.$left_node.')'.", ".$right_name.'('.$right_node.')';
                    $status = $this->pay_binary_commission($md->id,$left_node,$right_node,$matching_pair,$second_pair_comm, $left_secret,$right_secret,$md->pid);
                
              }
            }
            else if($pd->carry_forward == 'no')
            {
                //debug_log('Power Leg ' . $power_leg. ' ' . $md->right_leg . ' ' .$md->secret);
                if($power_leg == 'left')
                {
                    foreach(explode(",",substr($right_unpaid,1)) as $secret)
                    {
                        if($secret > 0)
                        {
                            $flushed = $secret.',';
                            $this->db->query("UPDATE binarydata SET flushed = CONCAT_WS('', flushed, '$flushed'), right_unpaid = REPLACE(right_unpaid, ',$flushed',',') where user_id = ".$md->id);

                            debug_log('Carry Forward No and Left Leg - '.$this->db->last_query());
                        }
                    }
                }
                else
                {
                    foreach(explode(",",substr($left_unpaid,1)) as $secret)
                    {
                        if($secret > 0)
                        {
                            $flushed = $secret.',';
                            $this->db->query("UPDATE binarydata SET flushed = CONCAT_WS('', flushed, '$flushed'), left_unpaid = REPLACE(left_unpaid, ',$flushed',',') where user_id = ".$md->id);
                            
                            debug_log('Carry Forward No and Right Leg - '.$this->db->last_query());
                        }
                    }
                }
            }
        }

    }

    public function credit_binary_commission_old($user_id, $pd)
    {
      if(($pd->second_pair_commission > 0) || ($pd->first_pair_commission > 0)){

        $md = $this->db_model->select_multi('*','member', array('id'=>$user_id));
        
        $upd = $this->db_model->select_multi('*', 'member', array('id'=>$md->position));
        $up_pd = $this->db_model->select_multi('*', 'plans', array('id'=>$upd->signup_package));
        $up_bd = $this->db_model->select_multi('*', 'binarydata', array('user_id'=>$upd->id));

        while(1)
        {
            if($upd->status == 'Active')
            {

                $left_paid = $up_bd->left_paid . substr($up_bd->flushed,1);
                $right_paid = $up_bd->right_paid . substr($up_bd->flushed,1);

                $left_unpaid = $up_bd->left_unpaid;
                $right_unpaid = $up_bd->right_unpaid;

                // Find left unpaid and right unpaid
                /*
                foreach(explode(",",$left_paid) as $secret)
                {
                    $left_unpaid = strlen($secret)>0 ? str_replace(','.$secret.',',',',$left_unpaid):$left_unpaid;
                }

                foreach(explode(",",$right_paid) as $secret)
                {
                    $right_unpaid = strlen($secret)>0 ? str_replace(','.$secret.',',',',$right_unpaid):$right_unpaid;
                }
                */

                if(config_item('sep_tree')=='Yes1')
                {
                  foreach(explode(",",substr($left_unpaid,1)) as $secret)
                  {
                      $left_plan_node = $this->db_model->select('id','member', array('secret' => $secret, 'signup_package'=>$md->signup_package));
                      $left_node = $this->db_model->select('id','member', array('secret' => $secret));
                      $left_secret = $secret;
                      if($left_node == '' && $secret >= 0) {
                          $status = $this->common_model->remove_binary_data($secret,$upd->id,1);
                          $left_unpaid = str_replace(','.$secret,'',$left_unpaid);
                      }
                      if($left_plan_node > 0) {
                        $left_node = $left_plan_node;
                        break;}
                  }
                  foreach(explode(",",substr($right_unpaid,1)) as $secret)
                  {
                      $right_plan_node = $this->db_model->select('id','member', array('secret' => $secret, 'signup_package'=>$md->signup_package));
                      $right_node = $this->db_model->select('id','member', array('secret' => $secret));
                      $right_secret = $secret;
                      if($right_node == '' && $secret >= 0) {
                          $status = $this->common_model->remove_binary_data($secret,$upd->id,2);
                          $right_unpaid = str_replace(','.$secret,'',$right_unpaid);
                      }
                      if($right_plan_node > 0) {
                        $right_node = $right_plan_node;
                        break;}
                  }

                }
                else
                {
                  foreach(explode(",",substr($left_unpaid,1)) as $secret)
                  {
                      $left_node = $this->db_model->select('id','member', array('secret' => $secret));
                      $left_secret = $secret;
                      if($left_node == '' && $secret >= 0) {
                          $status = $this->common_model->remove_binary_data($secret,$upd->id,1);
                          $left_unpaid = str_replace(','.$secret,'',$left_unpaid);
                      }
                      if($left_node > 0) {break;}
                  }
                  foreach(explode(",",substr($right_unpaid,1)) as $secret)
                  {
                      $right_node = $this->db_model->select('id','member', array('secret' => $secret));
                      $right_secret = $secret;
                      if($right_node == '' && $secret >= 0) {
                          $status = $this->common_model->remove_binary_data($secret,$upd->id,2);
                          $right_unpaid = str_replace(','.$secret,'',$right_unpaid);
                      }
                      if($right_node > 0) {break;}
                  }
                }

                debug_log('legs - Userid '.$upd->id.' '.$up_bd->left_leg.' '.$up_bd->right_leg.' '.$left_paid.' '.$right_paid.' '.$left_unpaid.' '.$right_unpaid.' '.$left_node.' '.$right_node);

                if($up_bd->first_pair_paid == 0)
                {
                    if($left_node && $right_node)
                    {
                        $this->credit_first_pair_commission($md->signup_package,$upd->id,$left_node, $right_node,$left_unpaid,$right_unpaid);
                    }

                }
                if($up_bd->first_pair_paid == 1)
                {
                    $cappingpairs = $up_pd->capping;
                    $cappingamount = $up_pd->cappingamount;

                    debug_log('cappingpairs '.$cappingpairs . ' cappingamount '.$cappingamount);

                    $cappingpairs = $cappingpairs > 0 ? $cappingpairs : 10000;
                    $cappingamount = $cappingamount > 0 ? $cappingamount : 100000;

                    debug_log("error1");
                    debug_log($upd->id);
                    debug_log($upd->signup_package);
                    
                    $pairs_comm = $this->get_pairs_comm($upd->id,$upd->signup_package);
                    $total_pairs = $pairs_comm[0];
                    $cappingpairs = $pairs_comm[1];
                    $total_comm = $pairs_comm[2];

                    debug_log('Capping_check '.$upd->id.' '. $total_pairs . ' ' . $total_comm . ' ' . $cappingpairs . ' '. $cappingamount . ' '.$pd->carry_forward . ' ' . $upline_leg . ' ');

                    //left_count
                    $count_left = $upd->total_a;
                    //right_count
                    $count_right = $upd->total_b;
                    $power_leg=$count_left >=$count_right ? "left" :"right";

                    if($total_pairs < $cappingpairs && $total_comm < $cappingamount)
                    {

                        if($left_node && $right_node)
                        {
                            $second_pair_comm= $pd->second_pair_commission > $up_pd->second_pair_commission ? $up_pd->second_pair_commission : $pd->second_pair_commission;

                            $second_pair_comm = ($cappingamount - $total_comm) >= $second_pair_comm ? $second_pair_comm : $cappingamount - $total_comm;

                            $left_name = $this->db_model->select('name', 'member',array('id' => $left_node));
                            $right_name = $this->db_model->select('name', 'member',array('id' => $right_node));
                            $matching_pair=$left_name.'('.$left_node.')'.", ".$right_name.'('.$right_node.')';
                            $status = $this->pay_binary_commission($upd->id,$left_node,$right_node,$matching_pair,$second_pair_comm, $left_secret,$right_secret,$md->signup_package);
                            if($upd->secret == 1){break;}
                            else
                            {
                                $upd = $this->db_model->select_multi('*', 'member', array('id'=>$upd->position));
                                $up_pd = $this->db_model->select_multi('*', 'plans', array('id'=>$upd->signup_package));
                                $up_bd = $this->db_model->select_multi('*', 'binarydata', array('user_id'=>$upd->id));
                            }
                        }
                        else if($upd->secret == 1){
                            //debug_log('Total Pairs ' . $total_pairs . ' ' . $total_comm . ' ' . $cappingpairs . ' '. $cappingamount . ' '.$pd->carry_forward . ' ' . $upline_leg . ' ');
                            break;}
                        else
                        {
                            $upd = $this->db_model->select_multi('*', 'member', array('id'=>$upd->position));
                            $up_pd = $this->db_model->select_multi('*', 'plans', array('id'=>$upd->signup_package));
                            $up_bd = $this->db_model->select_multi('*', 'binarydata', array('user_id'=>$upd->id));
                        }
                    }
                    else if($pd->carry_forward == 'no')
                    {
                        //debug_log('Power Leg ' . $power_leg. ' ' . $up_bd->right_leg . ' ' .$md->secret);
                        if($power_leg == 'left')
                        {
                            foreach(explode(",",substr($right_unpaid,1)) as $secret)
                            {
                                if($secret > 0)
                                {
                                    $flushed = $secret.',';
                                    $this->db->query("UPDATE binarydata SET flushed = CONCAT_WS('', flushed, '$flushed'), right_unpaid = REPLACE(right_unpaid, '$flushed','') where user_id = ".$upd->id);

                                    debug_log($this->db->last_query());

                                    #$data = array('flushed' => $this->db_model->select('flushed','binarydata',array('user_id'=>$upd->id))  . $secret . ',');
                                    #$this->db->where('user_id', $upd->id);
                                    #$this->db->update('binarydata', $data);
                                }
                            }
                            if($upd->secret == 1) {break;}
                            else
                            {
                                $upd = $this->db_model->select_multi('*', 'member', array('id'=>$upd->position));
                                $up_pd = $this->db_model->select_multi('*', 'plans', array('id'=>$upd->signup_package));
                                $up_bd = $this->db_model->select_multi('*', 'binarydata', array('user_id'=>$upd->id));
                            }
                        }
                        else
                        {
                            foreach(explode(",",substr($left_unpaid,1)) as $secret)
                            {
                                if($secret > 0)
                                {
                                    $flushed = $secret.',';
                                    $this->db->query("UPDATE binarydata SET flushed = CONCAT_WS('', flushed, '$flushed'), left_unpaid = REPLACE(left_unpaid, '$flushed','') where user_id = ".$upd->id);

                                    debug_log($this->db->last_query());

                                    #$data = array('flushed' => $this->db_model->select('flushed','binarydata',array('user_id'=>$upd->id))  . $secret . ',');
                                    #$this->db->where('user_id', $upd->id);
                                    #$this->db->update('binarydata', $data);
                                }
                            }
                            if($upd->secret == 1) {break;}
                            else
                            {
                                $upd = $this->db_model->select_multi('*', 'member', array('id'=>$upd->position));
                                $up_pd = $this->db_model->select_multi('*', 'plans', array('id'=>$upd->signup_package));
                                $up_bd = $this->db_model->select_multi('*', 'binarydata', array('user_id'=>$upd->id));
                            }
                        }
                    }
                    else if($upd->secret == 1) {break;}
                    else
                    {
                        $upd = $this->db_model->select_multi('*', 'member', array('id'=>$upd->position));
                        $up_pd = $this->db_model->select_multi('*', 'plans', array('id'=>$upd->signup_package));
                        $up_bd = $this->db_model->select_multi('*', 'binarydata', array('user_id'=>$upd->id));
                    }
                }
                else if($upd->secret == 1){break;}
                else
                {
                    $upd = $this->db_model->select_multi('*', 'member', array('id'=>$upd->position));
                    $up_pd = $this->db_model->select_multi('*', 'plans', array('id'=>$upd->signup_package));
                    $up_bd = $this->db_model->select_multi('*', 'binarydata', array('user_id'=>$upd->id));
                }
            }
            else if($upd->secret == 1){break;}
            else
            {
                $upd = $this->db_model->select_multi('*', 'member', array('id'=>$upd->position));
                $up_pd = $this->db_model->select_multi('*', 'plans', array('id'=>$upd->signup_package));
                $up_bd = $this->db_model->select_multi('*', 'binarydata', array('user_id'=>$upd->id));
            }
        }
      }
    }

    private function get_pairs_comm($upline_id,$plan_id)
    {
        debug_log("earning plan");
        debug_log($plan_id);



        $pay_out_frequency = $this->db_model->select('payout_frequency', 'plans',
            array('id' => $plan_id));
        $cp=$this->db_model->select('capping', 'plans',array('id' =>$plan_id));
        $cp = $cp == 0 ? 1000 : $cp;

        $pairs_comm = array();

        if($pay_out_frequency=="daily")
        {
           $ex = explode(',', $cp);

           if(count($ex)>=1){
            $hour = date("H");


            debug_log("hour==>>");
            debug_log($hour);

            if($hour < 12){

              debug_log("earning1");
              /*$total_pairs=$this->db_model->count_all('earning',
              array('type' => 'First Pair Matching Comm','userid'=>$upline_id,
                    'date >=' =>  date('Y-m-d'),'hour(date) <' =>  12)); */
              //debug_log($this->db->last_query());
              $total_pairs=$this->db_model->count_all('earning',
              array('type' => 'First Pair Matching Comm','userid'=>$upline_id,
                    'date >=' =>  date('Y-m-d'),'hour(date) <' =>  12 ) ) + 
              $this->db_model->count_all('earning',
              array('type' => 'Binary Commission','userid'=>$upline_id,
                    'date >=' =>  date('Y-m-d'),'hour(date) <' =>  12 ));
              
              debug_log("earning=============>1111");
              debug_log($this->db->last_query());
              
              array_push($pairs_comm, $total_pairs);
              debug_log($cp);
              debug_log($pairs_comm);

              array_push($pairs_comm, $cp);

              debug_log($pairs_comm);

            } else{

              debug_log("earning2");
              /*$a = $this->db_model->count_all('earning',
              array('type' => 'First Pair Matching Comm','userid'=>$upline_id,
                    'date >=' =>  date('Y-m-d'),'hour(date) >=' =>  12));*/
              //debug_log($this->db->last_query());
              $total_pairs=$this->db_model->count_all('earning',
              array('type' => 'First Pair Matching Comm','userid'=>$upline_id,
                    'date >=' =>  date('Y-m-d'),'hour(date) >=' =>  12 )) + 
              $this->db_model->count_all('earning',
              array('type' => 'Binary Commission','userid'=>$upline_id,
                    'date >=' =>  date('Y-m-d'),'hour(date) >=' =>  12 ));
              

              debug_log("earning=============>2222");

              debug_log($total_pairs);
              debug_log($this->db->last_query());
              
              //array_push($pairs_comm, $total_pairs);
              //array_push($pairs_comm, $ex[1]);


              array_push($pairs_comm, $total_pairs);
              debug_log($cp);
              debug_log($pairs_comm);

              array_push($pairs_comm, $cp);

              debug_log($pairs_comm);


            } 
           } else{

              debug_log("earning3");
              debug_log($plan_id);
              $total_pairs=$this->db_model->count_all('earning',
              array('type' => 'First Pair Matching Comm','userid'=>$upline_id,
                    'date >=' =>  date('Y-m-d'),'secret =' =>$plan_id )) + $this->db_model->count_all('earning',
              array('type' => 'Binary Commission','userid'=>$upline_id,
                    'date >=' =>  date('Y-m-d'),'secret =' =>$plan_id ));

              debug_log($total_pairs);

              array_push($pairs_comm, $total_pairs);
              debug_log($cp);
              debug_log($pairs_comm);

              array_push($pairs_comm, $cp);

              debug_log($pairs_comm);
          }

          if (config_item('enable_based_pv')=='Yes')
          {
              debug_log("welcome to earning model pv");
              $total_comm=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $upline_id , 'date >=' => date('Y-m-d'), 'secret =' =>$plan_id )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $upline_id , 'date >=' => date('Y-m-d'), 'secret =' =>$plan_id ));

              debug_log($this->db->last_query());
              debug_log($total_comm);
              debug_log($pairs_comm);
              array_push($pairs_comm, $total_comm);
              return $pairs_comm;
          }
          else
          {
              debug_log("welcome to earning model pv1");
              $total_comm=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $upline_id , 'date >=' => date('Y-m-d'))) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $upline_id , 'date >=' => date('Y-m-d')));

              array_push($pairs_comm, $total_comm);
              return $pairs_comm;

          }
          

        }
        else if($pay_out_frequency=="weekly")
        {
            $day = date('w');
            $week_start = date('m-d-Y', strtotime('-'.$day.' days'));

            $total_pairs=$this->db_model->count_all('earning',
            array('type' => 'First Pair Matching Comm','userid'=>$upline_id,
                  'date >=' => $week_start)) + $this->db_model->count_all('earning',
            array('type' => 'Binary Commission','userid'=>$upline_id,
                  'date >=' => $week_start));

            array_push($pairs_comm, $total_pairs);
            array_push($pairs_comm, $cp);

            $total_comm=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $upline_id , 'date >=' => $week_start)) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $upline_id , 'date >=' => $week_start));

            array_push($pairs_comm, $total_comm);
            return $pairs_comm;

        }
        else if($pay_out_frequency=="monthly")
        {
            $total_pairs=$this->db_model->count_all('earning',
            array('type' => 'First Pair Matching Comm','userid'=>$upline_id,
                  'date >=' =>  date('Y-m-1'))) + $this->db_model->count_all('earning',
            array('type' => 'Binary Commission','userid'=>$upline_id,'date >=' =>  date('Y-m-1')
               ));

            array_push($pairs_comm, $total_pairs);
            array_push($pairs_comm, $cp);

            $total_comm=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $upline_id , 'date' => date('Y-m-1'))) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $upline_id , 'date' => date('Y-m-1')));

            array_push($pairs_comm, $total_comm);
            return $pairs_comm;

        }
    }

    private function credit_first_pair_commission($plan_id, $upline_id,$left_node, $right_node,$left_unpaid,$right_unpaid)
    {

        debug_log('credit_first_pair_commission -'.$plan_id.' '.$upline_id.' '.$left_node.' '.$right_node.' '.$left_unpaid.' '.$right_unpaid);

        $pd = $this->db_model->select_multi('*', 'plans', array('id' =>$plan_id));

        $first_pair_commission= $pd->first_pair_commission;

        debug_log($this->db->last_query());

        $left_plan = $this->db_model->select('pid', 'level_details',array('userid' => $left_node, 'gid'=>$pd->group_id));
        debug_log($this->db->last_query());
        $right_plan = $this->db_model->select('pid', 'level_details',array('userid' => $right_node, 'gid'=>$pd->group_id));
        debug_log($this->db->last_query());
        if($pd->config_comm_pv == 'percentage'){
         $first_pair_commission= $this->db_model->select('pv', 'plans', array( 'id' =>$left_plan));
          $pd_plan = $left_plan;
        if($left_plan != $right_plan){
          $left_comm = $this->db_model->select('pv', 'plans', array( 'id' =>$left_plan));
          debug_log($this->db->last_query());
          $right_comm = $this->db_model->select('pv', 'plans', array( 'id' =>$right_plan));
          debug_log($this->db->last_query());
          $first_pair_commission = $left_comm >= $right_comm ? $right_comm : $left_comm;
          $pd_plan = $left_comm >= $right_comm ? $right_plan : $left_plan;
        }
        $pd_plan = $this->db_model->select('first_pair_commission', 'plans',array('id' => $pd_plan));
        $first_pair_commission = $first_pair_commission*$pd_plan/100;

        }else{
          $first_pair_commission= $this->db_model->select('first_pair_commission', 'plans', array( 'id' =>$left_plan));
        if($left_plan != $right_plan){
          $left_comm = $this->db_model->select('first_pair_commission', 'plans', array( 'id' =>$left_plan));
          debug_log($this->db->last_query());
          $right_comm = $this->db_model->select('first_pair_commission', 'plans', array( 'id' =>$right_plan));
          debug_log($this->db->last_query());
          $first_pair_commission = $left_comm >= $right_comm ? $right_comm : $left_comm;
        }
      }
        $up_plan_id = $this->db_model->select('pid', 'level_details',array('userid' => $upline_id, 'gid'=>$pd->group_id));
        debug_log($this->db->last_query());
        $up_pd = $this->db_model->select_multi('*', 'plans', array('id'=>$up_plan_id));
        debug_log($this->db->last_query());
        if($up_pd->cappingamount >0){
          $first_pair_commission = $first_pair_commission > $up_pd->cappingamount ? $up_pd->cappingamount : $first_pair_commission;  
        }

        $first_pair_ratio=$pd->first_pair_ratio;
        $left_name = $this->db_model->select('name', 'member',array('id' => $left_node));
        debug_log($this->db->last_query());
        $right_name = $this->db_model->select('name', 'member',array('id' => $right_node));
        debug_log($this->db->last_query());
        if($first_pair_ratio=="1:1")
        {
            $matching_pair=$left_name.'('.$left_node.')'.", ".$right_name.'('.$right_node.')';
            $status=$this->pay_first_commission($upline_id,$left_node,0,$right_node,0,$matching_pair,$first_pair_commission,$plan_id);
        }//if($first_pair_ratio=="1:1")
        else if($first_pair_ratio=="1:2/2:1")
        {

            $left_unpaid_count = count(explode(",",substr($left_unpaid,1)))-1;
            $right_unpaid_count = count(explode(",",substr($right_unpaid,1)))-1;

            $matching_pair = '';

            //debug_log('left_unpaid ' . $left_unpaid . ' right_unpaid ' . $right_unpaid);

            $left_tail_paid = 0;
            $right_tail_paid = 0;
            if($left_unpaid_count >1)
            {
                $left_secret = $this->db_model->select('secret', 'member',array('id' => $left_node));
                $left_node_1 = explode(",",str_replace(','.$left_secret,'',$left_unpaid))[1];
                $left_tail_paid = $left_node_1;
                $left_name_1 = $this->db_model->select('name', 'member',array('secret' => $left_node_1));
                $left_node_1_id = $this->db_model->select('id', 'member',array('secret' => $left_node_1));
                $matching_pair=$left_name.'('.$left_node.')'.", ".$left_name_1.'('.$left_node_1_id.')'.", ".$right_name.'('.$right_node.')';
            }
            else if($right_unpaid_count >1)
            {
                $right_secret = $this->db_model->select('secret', 'member',array('id' => $right_node));
                $right_node_1 = explode(",",str_replace(','.$right_secret,'',$right_unpaid))[1];
                $right_tail_paid = $right_node_1;
                $right_name_1 = $this->db_model->select('name', 'member',array('secret' => $right_node_1));
                $right_node_1_id = $this->db_model->select('id', 'member',array('secret' => $right_node_1));
                $matching_pair=$left_name.'('.$left_node.')'.", ".$right_name.'('.$right_node.')'.",".$right_name_1.'('.$right_node_1_id.')';
            }

            if($matching_pair != '')
            {
                $status=$this->pay_first_commission($upline_id,$left_node,$left_tail_paid, $right_node,$right_tail_paid,$matching_pair,$first_pair_commission,$plan_id);
            }
        }//else if($first_pair_ratio=="1:2/2:1")
    }

    public function pay_first_commission($upline_id,$left_node,$left_tail_paid, $right_node,$right_tail_paid, $matching_pair,$commission_amount,$plan_id)
    {
        debug_log('pay_first_commission - '.$upline_id.' '.$left_node.' '.$left_tail_paid.' '. $right_node.' '.$right_tail_paid.' '. $matching_pair.' '.$commission_amount.' '.$plan_id);
        $status = $this->pay_matching($upline_id, '',$left_node,$right_node, 'First Pair Matching Comm',$matching_pair, $commission_amount, $pair_match = '', $secret = $plan_id);
        $left_paid = $this->db_model->select('secret', 'member',array('id' =>$left_node));
        $right_paid = $this->db_model->select('secret', 'member',array('id' =>$right_node));
        $this->plan_model->update_binary_data($upline_id,$left_paid,$left_tail_paid,$right_paid,$right_tail_paid,1);
    }

    public function pay_binary_commission($upline_id,$left_node,$right_node,$matching_pair,$second_pair_comm, $left_paid, $right_paid,$plan_id)
    {
        debug_log('pay_binary_commission - '.$upline_id.' '.$left_node.' '.$right_node.' '.$matching_pair.' '.$second_pair_comm.' '. $left_paid.' '. $right_paid.' '.$plan_id);

        $status = $this->pay_matching($upline_id, '',$left_node,$right_node,'Binary Commission',$matching_pair, $second_pair_comm, $pair_match = '', $secret = $plan_id);
        $this->plan_model->update_binary_data($upline_id,$left_paid,0,$right_paid,0,2);
         $comm_detail = $this->db_model->select_multi('*','plans', array( 'id' =>$plan_id));
        $smc = ($comm_detail->second_pair_commission * $comm_detail->sponsor_pair_match) /100;
         $sponsor_detail = $this->db_model->select_multi('*', 'member', array('id' => $upline_id));
        $referal_text="Sponsor Pair Matching Commission from " .$sponsor_detail ->name;
        $paysp = $this->pay_earning($sponsor_detail->sponsor,$upline_id,'Sponsor Pair Matching Income',$referal_text,$smc);
    }

    //Sponsor matching commission
    public function sponsor_matching($plan_id,$upline_id){
      debug_log("entered into sponsor_matching");
      debug_log($plan_id);
      debug_log($upline_id);
        $comm_detail = $this->db_model->select_multi('*','plans', array( 'id' =>$plan_id));
        $smc = ($comm_detail->direct_commission * $comm_detail->sponsor_match_commission) /100;
        $sponsor_detail = $this->db_model->select_multi('*', 'member', array('id' => $upline_id));
        $referal_text="Sponsor Matching Commission from " .$sponsor_detail ->name;
        if($upline_id != config_item('top_id')){
        $paysp = $this->pay_earning($sponsor_detail->sponsor,$upline_id,'Sponsor Matching Income',$referal_text,$smc);
      }
      debug_log("exiting from sponsor_matching");
    }

    //credit matching commission with pair names
    public function pay_matching($userid, $ref_id,$left,$right, $income_name,$matching_pair, $amount, $pair_match = 0, $secret = 0)
    {

        debug_log('pay_matching -'.$userid.' '. $ref_id.' '.$left.' '.$right.' '. $income_name.' '.$matching_pair.' '. $amount.' '. $pair_match.' '. $secret);

        $this->db->select('name')->from('member')->where(array('id' => $userid));
        $user_name = $this->db->get()->row();
        $name       = $user_name->name;

        if($amount > 0) 
        {
          $data = array(
              'userid'     => $userid,
              'name'       => $name,
              'left_node'  => $left,
              'right_node' => $right,
              'amount'     => $amount,
              'type'       => $income_name,
              'pair_names' => $matching_pair,
              'ref_id'     => $ref_id,
              'date'       => date('Y-m-d H:i:s'),
              'pair_match' => $pair_match,
              'secret'     => $secret,
          );

          $this->db->insert('earning', $data);
          debug_log("pay matching ". $this->db->last_query());

          if (config_item('enable_pair_deduct')=='Yes') 
          {  
            $condition = False;
            $F_count = $this->db_model->count_all('earning', array('userid' => $userid, 'type'=>'First Pair Matching Comm', 'pid' =>$pid));
            $S_count = $this->db_model->count_all('earning', array('userid' => $userid, 'type'=>'Binary Commission', 'pid' =>$pid));
            $count = $F_count + $S_count;
            debug_log("count ".$count);
            $pairsdeduct = config_item('pairsdeduct');
            debug_log($pairsdeduct);
            
            foreach ($pairsdeduct as $key => $value) {
              if ($count==$value) {
                $text = "Deduction of ".$key." pair income ";
                $query = $this->db->query("SELECT id FROM deductions where user_id = $userid and  type = '$income_name' and text ='$text' and amount = $amount ");
                if(!$query->num_rows()>0){
                  $this->add_deduction($userid,'admin',$amount,$income_name,$text,$pid,'account_transfer','account_transfer');
                  debug_log("pair ".$key." income");
                  $condition = True;
                }
              }
            }
              
            if ($condition) {
              $get_user_balance = $this->db_model->select('balance', 'wallet', array('userid' => $userid));
              wallet_log('$get_user_balance ' . $get_user_balance);
              $arra = array('balance' => ($get_user_balance - $amount),);
              $this->db->where('userid', $userid);
              $this->db->update('wallet', $arra);
              wallet_log($this->db->last_query());
            }
          }
          
        }

        return true;
    }

    public function credit_binary_commission_all_new($md,$pd)
    {
        debug_log("welcome to binary======>");
        $upline_id = $this->downline_model->calculate_upline($md->id,$pd->id,'');
        debug_log("uplines id====>");
        debug_log($upline_id);
        $binary_comm_amount = config_item('binary_comm_amount');
        debug_log($binary_comm_amount);

        foreach($upline_id as $upline_userid)
        {

            $main_user_details =  $this->db_model->select_multi('*', 'member', array('id' =>$upline_userid));
            $main_user_details_rank=$main_user_details->signup_package;
            $main_user_details_pairs=$main_user_details->pairs_count;

            $plan_details1 =  $this->db_model->select_multi('*', 'plans', array('id' => '1'));
            $plan_details2 =  $this->db_model->select_multi('*', 'plans', array('id' => '2'));
            $plan_details3 =  $this->db_model->select_multi('*', 'plans', array('id' => '3'));
            $plan_details4 =  $this->db_model->select_multi('*', 'plans', array('id' => '4'));
            $plan_details5 =  $this->db_model->select_multi('*', 'plans', array('id' => '5'));
            $plan_details6 =  $this->db_model->select_multi('*', 'plans', array('id' => '6'));
            $plan_details7 =  $this->db_model->select_multi('*', 'plans', array('id' => '7'));

            debug_log("All plan details");
            debug_log($plan_details1->capping);
            debug_log($plan_details2->capping);
            debug_log($plan_details3->capping);
            debug_log($plan_details4->capping);
            debug_log($plan_details5->capping);
            debug_log($plan_details6->capping);
            debug_log($plan_details7->capping);

            debug_log("earning details condition");
            debug_log('main_user_details_rank -'. $main_user_details_rank);
            debug_log('main_user_details_pairs -'. $main_user_details_pairs);
            debug_log('pairs_count -'. $main_user_details->pairs_count);

            if( ($main_user_details_rank == 1 && $main_user_details_pairs <$plan_details1->capping ) ||
                ($main_user_details_rank == 2 && $main_user_details_pairs <$plan_details2->capping ) ||
                ($main_user_details_rank == 3 && $main_user_details_pairs <$plan_details3->capping ) ||
                ($main_user_details_rank == 4 && $main_user_details_pairs <$plan_details4->capping ) ||
                ($main_user_details_rank == 5 && $main_user_details_pairs <$plan_details5->capping ) ||
                ($main_user_details_rank == 6 && $main_user_details_pairs <$plan_details6->capping ) ||
                ($main_user_details_rank == 7 && $main_user_details_pairs <$plan_details7->capping )

              )
            {

                if (1==1)
                {

                    debug_log(" control comes to binary commission");
                    debug_log($userid);
                    $user_detail =  $this->db_model->select_multi('*', 'member', array('id' =>$upline_userid));
                    //$userid_binary_points = $user_detail->binary_points;
                    $left_binary_points = $user_detail->total_a_pv;
                    $right_binary_points = $user_detail->total_b_pv;
                    $user_binary_pairs = $user_detail->pairs_count;




                    debug_log("binary points");
                    //debug_log('userid_binary_points -'. $userid_binary_points);
                    debug_log('left_binary_points -'. $left_binary_points);
                    debug_log('right_binary_points -'. $right_binary_points);
                    debug_log('user_binary_pairs -'. $user_binary_pairs);


                }

                if($left_binary_points < $right_binary_points)
                {

                  debug_log("left side");
                  //$total_diff_binary_points= $right_binary_points-$left_binary_points;
                  $diff_num_pairs=$left_binary_points/3;
                  $diff_num_pairs1=$user_detail->pairs_count+$diff_num_pairs;

                  //debug_log($total_diff_binary_points);
                  debug_log($diff_num_pairs);
                  debug_log($diff_num_pairs1);


                  //getting amount based on pairs
                   if(1==1)
                   {



                      if($user_detail->signup_package==1)
                      {

                          if($diff_num_pairs<=$plan_details1->capping && $diff_num_pairs1 <=$plan_details1->capping)
                          {
                              $num_pairs=$left_binary_points/3;
                              $amount_commission=$num_pairs * $binary_comm_amount;
                          }
                          else
                          {

                              $actual_num_pairs=$user_detail->pairs_count;
                              $num_pairs= $plan_details1->capping-$actual_num_pairs;
                              $amount_commission=$num_pairs * $binary_comm_amount;
                          }

                      }
                      elseif($user_detail->signup_package==2)
                      {

                          if($diff_num_pairs<=$plan_details2->capping && $diff_num_pairs1 <=$plan_details2->capping)
                          {
                              $num_pairs=$left_binary_points/3;
                              $amount_commission=$num_pairs * $binary_comm_amount;
                          }
                          else
                          {
                              $actual_num_pairs=$user_detail->pairs_count;
                              $num_pairs= $plan_details2->capping-$actual_num_pairs;
                              $amount_commission=$num_pairs * $binary_comm_amount;
                          }

                      }
                      elseif($user_detail->signup_package==3)
                      {

                          if($diff_num_pairs<=$plan_details3->capping && $diff_num_pairs1 <=$plan_details3->capping)
                          {
                              $num_pairs=$left_binary_points/3;
                              $amount_commission=$num_pairs * $binary_comm_amount;
                          }
                          else
                          {
                              $actual_num_pairs=$user_detail->pairs_count;
                              $num_pairs= $plan_details3->capping-$actual_num_pairs;
                              $amount_commission=$num_pairs * $binary_comm_amount;
                          }

                      }
                      elseif($user_detail->signup_package==4)
                      {

                          if($diff_num_pairs<=$plan_details4->capping && $diff_num_pairs1 <=$plan_details4->capping)
                          {
                              $num_pairs=$left_binary_points/3;
                              $amount_commission=$num_pairs * $binary_comm_amount;
                          }
                          else
                          {
                              $actual_num_pairs=$user_detail->pairs_count;
                              $num_pairs= $plan_details4->capping-$actual_num_pairs;
                              $amount_commission=$num_pairs * $binary_comm_amount;
                          }

                      }
                      elseif($user_detail->signup_package==5)
                      {

                          if($diff_num_pairs<=$plan_details5->capping && $diff_num_pairs1 <=$plan_details5->capping)
                          {
                              $num_pairs=$left_binary_points/3;
                              $amount_commission=$num_pairs * $binary_comm_amount;
                          }
                          else
                          {
                              $actual_num_pairs=$user_detail->pairs_count;
                              $num_pairs= $plan_details5->capping-$actual_num_pairs;
                              $amount_commission=$num_pairs * $binary_comm_amount;
                          }

                      }
                      elseif($user_detail->signup_package==6)
                      {

                          if($diff_num_pairs<=$plan_details6->capping && $diff_num_pairs1 <=$plan_details6->capping)
                          {
                              $num_pairs=$left_binary_points/3;
                              $amount_commission=$num_pairs * $binary_comm_amount;
                          }
                          else
                          {
                              $actual_num_pairs=$user_detail->pairs_count;
                              $num_pairs= $plan_details6->capping-$actual_num_pairs;
                              $amount_commission=$num_pairs * $binary_comm_amount;
                          }

                      }
                      elseif($user_detail->signup_package==7)
                      {

                          if($diff_num_pairs<=$plan_details7->capping && $diff_num_pairs1 <=$plan_details7->capping)
                          {
                              $num_pairs=$left_binary_points/3;
                              $amount_commission=$num_pairs * $binary_comm_amount;
                          }
                          else
                          {
                              $actual_num_pairs=$user_detail->pairs_count;
                              $num_pairs= $plan_details7->capping-$actual_num_pairs;
                              $amount_commission=$num_pairs * $binary_comm_amount;
                          }

                      }


                   }

                  //update the binary points for both left and right users
                  $left_binary_pairs = $left_binary_points - $left_binary_points;
                  $right_binary_pairs = $right_binary_points - $left_binary_points ;

                  //update the pairs to main user
                  debug_log("update pairs got");
                  debug_log($left_binary_points);

                  $user_detail_for_pair =  $this->db_model->select_multi('*', 'member', array('id' =>$upline_userid));
                  $user_detail_for_pair_count = $user_detail_for_pair->pairs_count;

                  $pairs_count = $user_detail_for_pair_count + $num_pairs;

                  $arra2 = array('pairs_count' => $pairs_count,'total_a_pv' => $left_binary_pairs,'total_b_pv' => $right_binary_pairs);
                  $this->db->where('id', $upline_userid);
                  $this->db->update('member', $arra2);


                }
                elseif($left_binary_points > $right_binary_points)
                {

                  debug_log("right side");

                  //$total_diff_binary_points= $left_binary_points-$right_binary_points;
                  $diff_num_pairs=$right_binary_points/3;
                  $diff_num_pairs1=$user_detail->pairs_count+$diff_num_pairs;

                  //getting amount based on pairs
                  if(1==1)
                   {

                      if($user_detail->signup_package==1)
                      {

                          if($diff_num_pairs<=$plan_details1->capping && $diff_num_pairs1 <=$plan_details1->capping)
                          {
                              $num_pairs=$right_binary_points/3;
                              $amount_commission=$num_pairs * $binary_comm_amount;
                          }
                          else
                          {

                              $actual_num_pairs=$user_detail->pairs_count;
                              $num_pairs= $plan_details1->capping-$actual_num_pairs;
                              $amount_commission=$num_pairs * $binary_comm_amount;
                          }

                      }
                      elseif($user_detail->signup_package==2)
                      {

                          if($diff_num_pairs<=$plan_details2->capping && $diff_num_pairs1 <=$plan_details2->capping)
                          {
                              $num_pairs=$right_binary_points/3;
                              $amount_commission=$num_pairs * $binary_comm_amount;
                          }
                          else
                          {
                              $actual_num_pairs=$user_detail->pairs_count;
                              $num_pairs= $plan_details2->capping-$actual_num_pairs;
                              $amount_commission=$num_pairs * $binary_comm_amount;
                          }

                      }
                      elseif($user_detail->signup_package==3)
                      {

                          if($diff_num_pairs<=$plan_details3->capping && $diff_num_pairs1 <=$plan_details3->capping)
                          {
                              $num_pairs=$right_binary_points/3;
                              $amount_commission=$num_pairs * $binary_comm_amount;
                          }
                          else
                          {
                              $actual_num_pairs=$user_detail->pairs_count;
                              $num_pairs= $plan_details3->capping-$actual_num_pairs;
                              $amount_commission=$num_pairs * $binary_comm_amount;
                          }

                      }
                      elseif($user_detail->signup_package==4)
                      {

                          if($diff_num_pairs<=$plan_details4->capping && $diff_num_pairs1 <=$plan_details4->capping)
                          {
                              $num_pairs=$right_binary_points/3;
                              $amount_commission=$num_pairs * $binary_comm_amount;
                          }
                          else
                          {
                              $actual_num_pairs=$user_detail->pairs_count;
                              $num_pairs= $plan_details4->capping-$actual_num_pairs;
                              $amount_commission=$num_pairs * $binary_comm_amount;
                          }

                      }
                      elseif($user_detail->signup_package==5)
                      {

                          if($diff_num_pairs<=$plan_details5->capping && $diff_num_pairs1 <=$plan_details5->capping)
                          {
                              $num_pairs=$right_binary_points/3;
                              $amount_commission=$num_pairs * $binary_comm_amount;
                          }
                          else
                          {
                              $actual_num_pairs=$user_detail->pairs_count;
                              $num_pairs= $plan_details5->capping-$actual_num_pairs;
                              $amount_commission=$num_pairs * $binary_comm_amount;
                          }

                      }
                      elseif($user_detail->signup_package==6)
                      {

                          if($diff_num_pairs<=$plan_details6->capping && $diff_num_pairs1 <=$plan_details6->capping)
                          {
                              $num_pairs=$right_binary_points/3;
                              $amount_commission=$num_pairs * $binary_comm_amount;
                          }
                          else
                          {
                              $actual_num_pairs=$user_detail->pairs_count;
                              $num_pairs= $plan_details6->capping-$actual_num_pairs;
                              $amount_commission=$num_pairs * $binary_comm_amount;
                          }

                      }
                      elseif($user_detail->signup_package==7)
                      {

                          if($diff_num_pairs<=$plan_details7->capping && $diff_num_pairs1 <=$plan_details7->capping)
                          {
                              $num_pairs=$right_binary_points/3;
                              $amount_commission=$num_pairs * $binary_comm_amount;
                          }
                          else
                          {
                              $actual_num_pairs=$user_detail->pairs_count;
                              $num_pairs= $plan_details7->capping-$actual_num_pairs;
                              $amount_commission=$num_pairs * $binary_comm_amount;
                          }

                      }


                   }

                  //update the binary points for both left and right users

                  $left_binary_pairs = $left_binary_points - $right_binary_points;
                  $right_binary_pairs = $right_binary_points - $right_binary_points;


                  $user_detail_for_pair =  $this->db_model->select_multi('*', 'member', array('id' =>$upline_userid));
                  $user_detail_for_pair_count = $user_detail_for_pair->pairs_count;
                  debug_log("update pairs got");
                  debug_log($right_binary_points);
                  debug_log($user_detail_for_pair_count);
                  debug_log($num_pairs);
                  debug_log($user_detail_for_pair);

                  $pairs_count1 = $user_detail_for_pair_count + $num_pairs;
                  $arra2 = array('pairs_count' => $pairs_count1,'total_a_pv' => $left_binary_pairs,'total_b_pv' => $right_binary_pairs);


                  debug_log("111111111111111111111111");
                  debug_log($pairs_count1);
                  debug_log($arra2);
                  $this->db->where('id', $upline_userid);
                  $this->db->update('member', $arra2);


                }

                elseif($left_binary_points == $left_binary_points)
                {

                  debug_log("both side");

                  //$total_diff_binary_points= $left_binary_points;
                  $diff_num_pairs1=$left_binary_points/3;
                  $diff_num_pairs=$user_detail->pairs_count+$diff_num_pairs;

                  //getting amount based on pairs
                   if(1==1)
                   {



                      if($user_detail->signup_package==1)
                      {

                          if($diff_num_pairs<=$plan_details1->capping && $diff_num_pairs1 <=$plan_details1->capping)
                          {
                              $num_pairs=$left_binary_points/3;
                              $amount_commission=$num_pairs * $binary_comm_amount;
                          }
                          else
                          {

                              $actual_num_pairs=$user_detail->pairs_count;
                              $num_pairs= $plan_details1->capping-$actual_num_pairs;
                              $amount_commission=$num_pairs * $binary_comm_amount;
                          }

                      }
                      elseif($user_detail->signup_package==2)
                      {

                          if($diff_num_pairs<=$plan_details2->capping && $diff_num_pairs1 <=$plan_details2->capping)
                          {
                              $num_pairs=$left_binary_points/3;
                              $amount_commission=$num_pairs * $binary_comm_amount;
                          }
                          else
                          {
                              $actual_num_pairs=$user_detail->pairs_count;
                              $num_pairs= $plan_details2->capping-$actual_num_pairs;
                              $amount_commission=$num_pairs * $binary_comm_amount;
                          }

                      }
                      elseif($user_detail->signup_package==3)
                      {

                          if($diff_num_pairs<=$plan_details3->capping && $diff_num_pairs1 <=$plan_details3->capping)
                          {
                              $num_pairs=$left_binary_points/3;
                              $amount_commission=$num_pairs * $binary_comm_amount;
                          }
                          else
                          {
                              $actual_num_pairs=$user_detail->pairs_count;
                              $num_pairs= $plan_details3->capping-$actual_num_pairs;
                              $amount_commission=$num_pairs * $binary_comm_amount;
                          }

                      }
                      elseif($user_detail->signup_package==4)
                      {

                          if($diff_num_pairs<=$plan_details4->capping && $diff_num_pairs1 <=$plan_details4->capping)
                          {
                              $num_pairs=$left_binary_points/3;
                              $amount_commission=$num_pairs * $binary_comm_amount;
                          }
                          else
                          {
                              $actual_num_pairs=$user_detail->pairs_count;
                              $num_pairs= $plan_details4->capping-$actual_num_pairs;
                              $amount_commission=$num_pairs * $binary_comm_amount;
                          }

                      }
                      elseif($user_detail->signup_package==5)
                      {

                          if($diff_num_pairs<=$plan_details5->capping && $diff_num_pairs1 <=$plan_details5->capping)
                          {
                              $num_pairs=$left_binary_points/3;
                              $amount_commission=$num_pairs * $binary_comm_amount;
                          }
                          else
                          {
                              $actual_num_pairs=$user_detail->pairs_count;
                              $num_pairs= $plan_details5->capping-$actual_num_pairs;
                              $amount_commission=$num_pairs * $binary_comm_amount;
                          }

                      }
                      elseif($user_detail->signup_package==6)
                      {

                          if($diff_num_pairs<=$plan_details6->capping && $diff_num_pairs1 <=$plan_details6->capping)
                          {
                              $num_pairs=$left_binary_points/3;
                              $amount_commission=$num_pairs * $binary_comm_amount;
                          }
                          else
                          {
                              $actual_num_pairs=$user_detail->pairs_count;
                              $num_pairs= $plan_details6->capping-$actual_num_pairs;
                              $amount_commission=$num_pairs * $binary_comm_amount;
                          }

                      }
                      elseif($user_detail->signup_package==7)
                      {

                          if($diff_num_pairs<=$plan_details7->capping && $diff_num_pairs1 <=$plan_details7->capping)
                          {
                              $num_pairs=$left_binary_points/3;
                              $amount_commission=$num_pairs * $binary_comm_amount;
                          }
                          else
                          {
                              $actual_num_pairs=$user_detail->pairs_count;
                              $num_pairs= $plan_details7->capping-$actual_num_pairs;
                              $amount_commission=$num_pairs * $binary_comm_amount;
                          }

                      }


                  }



                  debug_log("update pairs got");
                  debug_log($left_binary_points);

                  $left_binary_pairs=0;
                  $right_binary_pairs=0;

                  $user_detail_for_pair =  $this->db_model->select_multi('*', 'member', array('id' =>$upline_userid));
                  $user_detail_for_pair_count = $user_detail_for_pair->pairs_count;

                  $pairs_count = $user_detail_for_pair_count + $num_pairs;
                  $arra2_new = array('pairs_count' => $pairs_count,'total_a_pv' => $left_binary_pairs,'total_b_pv' => $right_binary_pairs);

                  debug_log("error=============>");
                  debug_log($arra2_new);

                  $this->db->where('id', $upline_userid);
                  $this->db->update('member', $arra2_new);


                }


      //wallet and voucher count and commission update

      if($amount_commission > 0)
      {

          $member_details =  $this->db_model->select_multi('*', 'member', array('id' =>$upline_userid));
          if($member_details->signup_package == 1)
          {

            
            $total_comm = $amount_commission;

            if($total_comm>0)
            {


              $actual_wallet_count= $total_comm / $binary_comm_amount;
              $actual_wallet_amount=$total_comm;

              $get_user_wallet_balance1 = $this->db_model->select('balance', 'wallet', array('userid' => $member_details->id));

              $arra2 = array('balance' => ($get_user_wallet_balance1 + $actual_wallet_amount),);
              $this->db->where('userid', $member_details->id);
              $this->db->update('wallet', $arra2);
              debug_log($this->db->last_query());

              debug_log("wallet_count");
              debug_log($wallet_count);
              $arra1 = array('wallet_count1' => $member_details->wallet_count1+$actual_wallet_count);
              $this->db->where('id', $member_details->id);
              $this->db->update('member', $arra1);
              debug_log($this->db->last_query());


              $this->db->select('name')->from('member')->where(array('id' => $upline_userid));
              $user_name = $this->db->get()->row();
              $name       = $user_name->name;

              $matching_pair1= $actual_wallet_count. " Binary Matching Commission : To Wallet";
              if($actual_wallet_amount > 0)
              {
                $data = array(
                    'userid'     => $upline_userid,
                    'name'       => $name,
                    'left_node'  => 0,
                    'right_node' => 0,
                    'amount'     => $actual_wallet_amount,
                    'type'       => "Binary Commission",
                    'pair_names' => $matching_pair1,
                    'ref_id'     => 0,
                    'date'       => date('Y-m-d H:i:s'),
                    'pair_match' => 0,
                    'secret'     => 0,
                    'status'     => "Paid",
                );

                $this->db->insert('earning', $data);
                debug_log("pay matching ". $this->db->last_query());
              }

            }

          }
          else
          {

              $total_comm = $amount_commission;
              debug_log("total sum Commission==>else");
              debug_log($total_comm);
              
              if ($total_comm>0)
              {

                  $user_wallet_count = $member_details->wallet_count1;
                  $user_voucher_count = $member_details->voucher_count;

                  $total_comm_count =$total_comm/$binary_comm_amount;
                  
                  /*$total_wallet_and_voucher_count=$total_sum_count + $total_comm_count;*/

                  //$t=17;

                  if($user_wallet_count==0 && $user_voucher_count==0)
                  {
                      debug_log("control comes to wallet==>");
                      $total_wallet_and_voucher_count=$total_comm_count;
                      
                      if($member_details->temp_voucher==1) 
                      {
                          $flag="false";
                          if(1==1)
                          {
                              $arra15 = array('temp_voucher'=>0);
                              $this->db->where('id', $member_details->id);
                              $this->db->update('member', $arra15);
                          }
                      }
                      else
                      {
                          $flag="true";
                      }

                      //$flag="true";
                  }
                  elseif($user_wallet_count!=0 && $user_voucher_count==0)
                  {
                      debug_log("control comes to wallet1111==>");

                      $total_wallet_and_voucher_count=$total_comm_count + $user_wallet_count;
                      $flag="true";
                      debug_log($total_comm_count);
                      debug_log($user_wallet_count);
                      debug_log($total_wallet_and_voucher_count);
                  }
                  elseif($user_wallet_count==0 && $user_voucher_count!=0 )
                  {
                      debug_log("control comes to voucher==>");
                      $total_wallet_and_voucher_count=$total_comm_count + $user_voucher_count;
                      $flag="false";
                  }
                  elseif($user_wallet_count!=0 && $user_voucher_count!=0 )
                  {
                      debug_log("control comes to voucher==>");
                      $total_wallet_and_voucher_count=$total_comm_count + $user_voucher_count + $user_wallet_count;
                      $flag="true";
                  }

                  debug_log("Total wallet pair count");
                  debug_log($user_wallet_count);
                  debug_log($user_voucher_count);
                  debug_log($total_wallet_and_voucher_count);
                  debug_log($flag);


                  for ($i=0;$i<100 ;$i++ )
                  {
                    
                    if($total_wallet_and_voucher_count>0 )
                    {
                        if($flag=="true" && $total_wallet_and_voucher_count>0)
                        {
                            if($total_wallet_and_voucher_count>=20)
                            {
                                if($user_wallet_count!=0)
                                {
                                  
                                  $update_wallet=20-$user_wallet_count;
                                  
                                  $this->db->select('name')->from('member')->where(array('id' => $upline_userid));
                                  $user_name = $this->db->get()->row();
                                    $name       = $user_name->name;

                                  $count_binary=$update_wallet;
                                  $matching_pair1= $count_binary. " Binary Matching Commission : To Wallet";

                                  $actual_wallet_amount_new=$update_wallet*$binary_comm_amount;
                                  
                                    $data = array(
                                        'userid'     => $upline_userid,
                                        'name'       => $name,
                                        'left_node'  => 0,
                                        'right_node' => 0,
                                        'amount'     => $actual_wallet_amount_new,
                                        'type'       => "Binary Commission",
                                        'pair_names' => $matching_pair1,
                                        'ref_id'     => 0,
                                        'date'       => date('Y-m-d H:i:s'),
                                        'pair_match' => 0,
                                        'secret'     => 0,
                                        'status'     => "Paid",
                                    );

                                  $this->db->insert('earning', $data);
                                  debug_log("pay matching ". $this->db->last_query());
                                  

                                  $total_wallet_and_voucher_count=$total_wallet_and_voucher_count-20;

                                  if(1==1)
                                  {

                                      debug_log("wallet_count");
                                      debug_log($update_wallet);
                                      $wallet_count_update=0;
                                      $arra1 = array('wallet_count1' => $wallet_count_update);
                                      $this->db->where('id', $member_details->id);
                                      $this->db->update('member', $arra1);
                                      debug_log($this->db->last_query());


                                      $get_user_wallet_balance1 = $this->db_model->select('balance', 'wallet', array('userid' => $member_details->id));

                                      $arra2 = array('balance' => ($get_user_wallet_balance1 + $actual_wallet_amount_new),);
                                      $this->db->where('userid', $member_details->id);
                                      $this->db->update('wallet', $arra2);
                                      debug_log($this->db->last_query());

                                  }
                                  $user_wallet_count=0;
                                  $flag="false";

                                  if($total_wallet_and_voucher_count==0)
                                  {
                                      $arra11 = array('temp_voucher'=>1);
                                      $this->db->where('id', $member_details->id);
                                      $this->db->update('member', $arra11);
                                  }
                                }
                                else
                                {

                                  $this->db->select('name')->from('member')->where(array('id' => $upline_userid));
                                  $user_name = $this->db->get()->row();
                                    $name       = $user_name->name;

                                  $count_binary1=20;
                                  $matching_pair1= $count_binary1. " Binary Matching Commission : To Wallet";

                                  $actual_wallet_amount_new1=$count_binary1*$binary_comm_amount;
                                  
                                    $data = array(
                                        'userid'     => $upline_userid,
                                        'name'       => $name,
                                        'left_node'  => 0,
                                        'right_node' => 0,
                                        'amount'     => $actual_wallet_amount_new1,
                                        'type'       => "Binary Commission",
                                        'pair_names' => $matching_pair1,
                                        'ref_id'     => 0,
                                        'date'       => date('Y-m-d H:i:s'),
                                        'pair_match' => 0,
                                        'secret'     => 0,
                                        'status'     => "Paid",
                                    );

                                  $this->db->insert('earning', $data);
                                  debug_log("pay matching ". $this->db->last_query());
                                  
                                  if(1==1)
                                  {

                                      debug_log("wallet_count");
                                      debug_log($count_binary1);
                                      $wallet_count_update1=0;
                                      $arra1 = array('wallet_count1' => $wallet_count_update1);
                                      $this->db->where('id', $member_details->id);
                                      $this->db->update('member', $arra1);
                                      debug_log($this->db->last_query());


                                      $get_user_wallet_balance1 = $this->db_model->select('balance', 'wallet', array('userid' => $member_details->id));

                                      $arra2 = array('balance' => ($get_user_wallet_balance1 + $actual_wallet_amount_new1),);
                                      $this->db->where('userid', $member_details->id);
                                      $this->db->update('wallet', $arra2);
                                      debug_log($this->db->last_query());

                                  }

                                  //echo "20==>".$total_wallet_and_voucher_count." ,";
                                  
                                  $total_wallet_and_voucher_count=$total_wallet_and_voucher_count-20;                                  
                                  $flag="false";

                                  if($total_wallet_and_voucher_count==0)
                                  {
                                      $arra11 = array('temp_voucher'=>1);
                                      $this->db->where('id', $member_details->id);
                                      $this->db->update('member', $arra11);
                                  }
                                }
                            }
                            else
                            {

                                if($user_wallet_count!=0)
                                {
                                  
                                  $update_wallet_count1=$total_wallet_and_voucher_count-$user_wallet_count;
                                  
                                  $this->db->select('name')->from('member')->where(array('id' => $upline_userid));
                                  $user_name = $this->db->get()->row();
                                    $name       = $user_name->name;

                                  
                                  $matching_pair1= $update_wallet_count1. " Binary Matching Commission : To Wallet";

                                  $actual_wallet_amount_new2_new=$update_wallet_count1*$binary_comm_amount;
                                  
                                    $data = array(
                                        'userid'     => $upline_userid,
                                        'name'       => $name,
                                        'left_node'  => 0,
                                        'right_node' => 0,
                                        'amount'     => $actual_wallet_amount_new2_new,
                                        'type'       => "Binary Commission",
                                        'pair_names' => $matching_pair1,
                                        'ref_id'     => 0,
                                        'date'       => date('Y-m-d H:i:s'),
                                        'pair_match' => 0,
                                        'secret'     => 0,
                                        'status'     => "Paid",
                                    );

                                  $this->db->insert('earning', $data);
                                  debug_log("pay matching ". $this->db->last_query());
                                                
                                  if(1==1)
                                  {
                                    debug_log("wallet_count");
                                    debug_log($update_wallet_count1);
                                    $wallet_count_update22=$update_wallet_count1+$user_wallet_count;
                                    $arra1 = array('wallet_count1' => $wallet_count_update22);
                                    $this->db->where('id', $member_details->id);
                                    $this->db->update('member', $arra1);
                                    debug_log($this->db->last_query());

                                    $get_user_wallet_balance1 = $this->db_model->select('balance', 'wallet', array('userid' => $member_details->id));

                                    $arra2 = array('balance' => ($get_user_wallet_balance1 + $actual_wallet_amount_new2_new),);
                                    $this->db->where('userid', $member_details->id);
                                    $this->db->update('wallet', $arra2);
                                    debug_log($this->db->last_query());
                                  }
                                  
                                  //echo "20==>".$t1.",";
                                  $total_wallet_and_voucher_count=0;
                                  $user_wallet_count=0;
                                  $flag="false";
                                }
                                else
                                {
                                  debug_log("1111111q111111");
                                  $this->db->select('name')->from('member')->where(array('id' => $upline_userid));
                                  $user_name = $this->db->get()->row();
                                    $name       = $user_name->name;

                                  $count_binary29=$total_wallet_and_voucher_count-$user_wallet_count;
                                  $matching_pair1= $count_binary29. " Binary Matching Commission : To Wallet";

                                  $actual_wallet_amount_new2=$count_binary29*$binary_comm_amount;
                                  
                                    $data = array(
                                        'userid'     => $upline_userid,
                                        'name'       => $name,
                                        'left_node'  => 0,
                                        'right_node' => 0,
                                        'amount'     => $actual_wallet_amount_new2,
                                        'type'       => "Binary Commission",
                                        'pair_names' => $matching_pair1,
                                        'ref_id'     => 0,
                                        'date'       => date('Y-m-d H:i:s'),
                                        'pair_match' => 0,
                                        'secret'     => 0,
                                        'status'     => "Paid",
                                    );

                                  $this->db->insert('earning', $data);
                                  debug_log("pay matching ". $this->db->last_query());
                                  
                                  if(1==1)
                                  {

                                      debug_log("wallet_count");
                                      debug_log($count_binary2);
                                      $wallet_count_update2=$count_binary29+$user_wallet_count;
                                      $arra1 = array('wallet_count1' => $wallet_count_update2);
                                      $this->db->where('id', $member_details->id);
                                      $this->db->update('member', $arra1);
                                      debug_log($this->db->last_query());

                                      $get_user_wallet_balance1 = $this->db_model->select('balance', 'wallet', array('userid' => $member_details->id));

                                      $arra2 = array('balance' => ($get_user_wallet_balance1 + $actual_wallet_amount_new2),);
                                      $this->db->where('userid', $member_details->id);
                                      $this->db->update('wallet', $arra2);
                                      debug_log($this->db->last_query());

                                  }
                                  //echo "20==>".$total_wallet_and_voucher_count.",";
                                  
                                  $total_wallet_and_voucher_count=0;
                                  $flag="false";
                                }
                            }
                          
                        }
                        elseif($flag=="false" && $total_wallet_and_voucher_count>=0)
                        {
                            if($user_voucher_count!=0)
                            {
                                
                                if($total_wallet_and_voucher_count >=5)
                                {
                                    $update_vocuher=5-$user_voucher_count;
                                    
                                    $this->db->select('name')->from('member')->where(array('id' => $upline_userid));
                                    $user_name = $this->db->get()->row();
                                    $name       = $user_name->name;

                                    $voucher_binary_count=$update_vocuher;
                                    $matching_pair1= $voucher_binary_count. " Binary Matching Commission : To Voucher";

                                    $actual_voucher_amount_new_voucher=$update_vocuher*$binary_comm_amount;
                                    $data = array(
                                        'userid'     => $upline_userid,
                                        'name'       => $name,
                                        'left_node'  => 0,
                                        'right_node' => 0,
                                        'amount'     => $actual_voucher_amount_new_voucher,
                                        'type'       => "Binary Commission Voucher",
                                        'pair_names' => $matching_pair1,
                                        'ref_id'     => 0,
                                        'date'       => date('Y-m-d H:i:s'),
                                        'pair_match' => 0,
                                        'secret'     => 0,
                                        'status'     => "Paid",
                                    );

                                    $this->db->insert('earning', $data);
                                    debug_log("pay matching ". $this->db->last_query());
                                    
                                    if(1==1)
                                    {

                                        debug_log("voucher_count");
                                        debug_log($update_vocuher);
                                        $voucher_count_update1=0;
                                        $arra1 = array('voucher_count' => $voucher_count_update1);
                                        $this->db->where('id', $member_details->id);
                                        $this->db->update('member', $arra1);
                                        debug_log($this->db->last_query());

                                        $get_user_balance1 = $this->db_model->select('balance', 'voucher', array('userid' => $member_details->id));
                                        debug_log('$get_user_balance ' . $get_user_balance1);
                                        debug_log('voucher ' . $amount);
                                        $arra2 = array('balance' => ($get_user_balance1 + $actual_voucher_amount_new_voucher),);
                                        $this->db->where('userid', $member_details->id);
                                        $this->db->update('voucher', $arra2);
                                        debug_log($this->db->last_query());

                                    }
                                    //echo "5==>".$update_vocuher." last,";



                                    $total_wallet_and_voucher_count=$total_wallet_and_voucher_count-5;
                                    $user_voucher_count=0;
                                    $flag="true";

                                }
                                else
                                {


                                    $update_vocuher=$total_wallet_and_voucher_count-$user_voucher_count;
                                    
                                    $this->db->select('name')->from('member')->where(array('id' => $upline_userid));
                                    $user_name = $this->db->get()->row();
                                    $name       = $user_name->name;

                                    $voucher_binary_count=$update_vocuher;
                                    $matching_pair1= $voucher_binary_count. " Binary Matching Commission : To Voucher";

                                    $actual_voucher_amount_new_voucher=$update_vocuher*$binary_comm_amount;
                                    $data = array(
                                        'userid'     => $upline_userid,
                                        'name'       => $name,
                                        'left_node'  => 0,
                                        'right_node' => 0,
                                        'amount'     => $actual_voucher_amount_new_voucher,
                                        'type'       => "Binary Commission Voucher",
                                        'pair_names' => $matching_pair1,
                                        'ref_id'     => 0,
                                        'date'       => date('Y-m-d H:i:s'),
                                        'pair_match' => 0,
                                        'secret'     => 0,
                                        'status'     => "Paid",
                                    );

                                    $this->db->insert('earning', $data);
                                    debug_log("pay matching ". $this->db->last_query());
                                    
                                    if(1==1)
                                    {

                                        debug_log("voucher_count");
                                        debug_log($update_vocuher);
                                        $voucher_count_update1=$update_vocuher+$user_voucher_count;
                                        $arra1 = array('voucher_count' => $voucher_count_update1);
                                        $this->db->where('id', $member_details->id);
                                        $this->db->update('member', $arra1);
                                        debug_log($this->db->last_query());

                                        $get_user_balance1 = $this->db_model->select('balance', 'voucher', array('userid' => $member_details->id));
                                        debug_log('$get_user_balance ' . $get_user_balance1);
                                        debug_log('voucher ' . $amount);
                                        $arra2 = array('balance' => ($get_user_balance1 + $actual_voucher_amount_new_voucher),);
                                        $this->db->where('userid', $member_details->id);
                                        $this->db->update('voucher', $arra2);
                                        debug_log($this->db->last_query());

                                    }
                                    //echo "5==>".$update_vocuher." last,";



                                    $total_wallet_and_voucher_count=0;
                                    $flag="true";
                                }
                            }
                            else
                            {

                               

                                //$update_vocuher=5-$user_voucher_count;
                                if($total_wallet_and_voucher_count >= 5)
                                {

                                  $this->db->select('name')->from('member')->where(array('id' => $upline_userid));
                                  $user_name = $this->db->get()->row();
                                  $name       = $user_name->name;

                                  $voucher_binary_count1=5;
                                  $matching_pair1= $voucher_binary_count1. " Binary Matching Commission : To Voucher";

                                  $actual_voucher_amount_new_voucher1=$voucher_binary_count1*$binary_comm_amount;
                                  $data = array(
                                      'userid'     => $upline_userid,
                                      'name'       => $name,
                                      'left_node'  => 0,
                                      'right_node' => 0,
                                      'amount'     => $actual_voucher_amount_new_voucher1,
                                      'type'       => "Binary Commission Voucher",
                                      'pair_names' => $matching_pair1,
                                      'ref_id'     => 0,
                                      'date'       => date('Y-m-d H:i:s'),
                                      'pair_match' => 0,
                                      'secret'     => 0,
                                      'status'     => "Paid",
                                  );

                                  $this->db->insert('earning', $data);
                                  debug_log("pay matching ". $this->db->last_query());
                                  
                                  if(1==1)
                                  {

                                      debug_log("voucher_count");
                                      debug_log($voucher_binary_count1);
                                      $voucher_count_update2=0;
                                      $arra1 = array('voucher_count' => $voucher_count_update2);
                                      $this->db->where('id', $member_details->id);
                                      $this->db->update('member', $arra1);
                                      debug_log($this->db->last_query());

                                      $get_user_balance1 = $this->db_model->select('balance', 'voucher', array('userid' => $member_details->id));
                                      debug_log('$get_user_balance ' . $get_user_balance1);
                                      debug_log('voucher ' . $amount);
                                      $arra2 = array('balance' => ($get_user_balance1 + $actual_voucher_amount_new_voucher1),);
                                      $this->db->where('userid', $member_details->id);
                                      $this->db->update('voucher', $arra2);
                                      debug_log($this->db->last_query());

                                  }
                                 
                                  $total_wallet_and_voucher_count=$total_wallet_and_voucher_count-5;
                                  $flag="true";  
                                }
                                else
                                {

                                  $this->db->select('name')->from('member')->where(array('id' => $upline_userid));
                                  $user_name = $this->db->get()->row();
                                  $name       = $user_name->name;

                                  $voucher_binary_count5=$total_wallet_and_voucher_count-$user_voucher_count;
                                  $matching_pair1= $voucher_binary_count5. " Binary Matching Commission : To Voucher";

                                  $actual_voucher_amount_new_voucher5=$voucher_binary_count5*$binary_comm_amount;
                                  $data = array(
                                      'userid'     => $upline_userid,
                                      'name'       => $name,
                                      'left_node'  => 0,
                                      'right_node' => 0,
                                      'amount'     => $actual_voucher_amount_new_voucher5,
                                      'type'       => "Binary Commission Voucher",
                                      'pair_names' => $matching_pair1,
                                      'ref_id'     => 0,
                                      'date'       => date('Y-m-d H:i:s'),
                                      'pair_match' => 0,
                                      'secret'     => 0,
                                      'status'     => "Paid",
                                  );

                                  $this->db->insert('earning', $data);
                                  debug_log("pay matching ". $this->db->last_query());
                                  
                                  if(1==1)
                                  {

                                      debug_log("voucher_count");
                                      debug_log($voucher_binary_count1);
                                      $voucher_count_update5=$voucher_binary_count5+$user_voucher_count;
                                      $arra1 = array('voucher_count' => $voucher_count_update5);
                                      $this->db->where('id', $member_details->id);
                                      $this->db->update('member', $arra1);
                                      debug_log($this->db->last_query());

                                      $get_user_balance1 = $this->db_model->select('balance', 'voucher', array('userid' => $member_details->id));
                                      debug_log('$get_user_balance ' . $get_user_balance1);
                                      debug_log('voucher ' . $amount);
                                      $arra2 = array('balance' => ($get_user_balance1 + $actual_voucher_amount_new_voucher5),);
                                      $this->db->where('userid', $member_details->id);
                                      $this->db->update('voucher', $arra2);
                                      debug_log($this->db->last_query());

                                  }
                                  
                                  //echo "5==>".$total_wallet_and_voucher_count.",";
                                  $total_wallet_and_voucher_count=0;
                                 
                                  $flag="true"; 

                                }
                            }
                        }
                        
                        $total_wallet_and_voucher_count=$total_wallet_and_voucher_count;
                        
                      
                      }
                  }



              }
              
              //wallet and voucher update

              // if(1==1)
              // {

              //     $get_user_wallet_balance1 = $this->db_model->select('balance', 'wallet', array('userid' => $member_details->id));

              //     $arra2 = array('balance' => ($get_user_wallet_balance1 + $actual_wallet_amount),);
              //     $this->db->where('userid', $member_details->id);
              //     $this->db->update('wallet', $arra2);
              //     debug_log($this->db->last_query());
              // }

          }

      }

                /*if($amount_commission > 0)
                {

                      $member_details =  $this->db_model->select_multi('*', 'member', array('id' =>$upline_userid));
                      if($member_details->signup_package == 1)
                      {

                        
                        $total_comm = $amount_commission;

                        if($total_comm>0)
                        {


                          $actual_wallet_count= $total_comm / 7;
                          $actual_wallet_amount=$total_comm;

                          $get_user_wallet_balance1 = $this->db_model->select('balance', 'wallet', array('userid' => $member_details->id));

                          $arra2 = array('balance' => ($get_user_wallet_balance1 + $actual_wallet_amount),);
                          $this->db->where('userid', $member_details->id);
                          $this->db->update('wallet', $arra2);
                          debug_log($this->db->last_query());

                          debug_log("wallet_count");
                          debug_log($wallet_count);
                          $arra1 = array('wallet_count1' => $member_details->wallet_count1+$actual_wallet_count);
                          $this->db->where('id', $member_details->id);
                          $this->db->update('member', $arra1);
                          debug_log($this->db->last_query());


                          $this->db->select('name')->from('member')->where(array('id' => $upline_userid));
                          $user_name = $this->db->get()->row();
                          $name       = $user_name->name;

                          $matching_pair1= $actual_wallet_count. " Binary Matching Commission : To Wallet";
                          if($actual_wallet_amount > 0)
                          {
                            $data = array(
                                'userid'     => $upline_userid,
                                'name'       => $name,
                                'left_node'  => 0,
                                'right_node' => 0,
                                'amount'     => $actual_wallet_amount,
                                'type'       => "Binary Commission",
                                'pair_names' => $matching_pair1,
                                'ref_id'     => 0,
                                'date'       => date('Y-m-d H:i:s'),
                                'pair_match' => 0,
                                'secret'     => 0,
                                'status'     => "Paid",
                            );

                            $this->db->insert('earning', $data);
                            debug_log("pay matching ". $this->db->last_query());
                          }

                        }

                      }
                      else
                      {

                          $total_comm = $amount_commission;
                          debug_log("total sum Commission");
                          debug_log($total_comm);
                          
                          if ($total_comm>0)
                          {

                              $total_sum_count = $member_details->wallet_count1 + $member_details->voucher_count ;
                              $total_comm_count =$total_comm/7;
                              $total_wallet_and_voucher_count=$total_sum_count + $total_comm_count;


                              debug_log("Total wallet pair count");
                              debug_log($total_sum_count);
                              debug_log($total_comm_count);
                              debug_log($total_wallet_and_voucher_count);

                              $get_both_pairs=$this->get_number_wallet_and_vocher_pair($total_wallet_and_voucher_count);

                              debug_log("get_both_pairs");
                              debug_log($get_both_pairs);



                              $get_count_5_pairs = $get_both_pairs['count_5'];
                              $get_count_20_pairs = $get_both_pairs['count_20'];

                              $actual_wallet_count=$get_count_20_pairs - $member_details->wallet_count1;

                              $actual_vocher_count=$get_count_5_pairs - $member_details->voucher_count ;


                              
                              
                              debug_log("getting======>");
                              debug_log($actual_wallet_count);


                              $first_wallet_count = $member_details->wallet_count1 % 20;
                              
                              $first_voucher_count = $member_details->voucher_count % 5;


                              if(1==1)
                              {

                                $wallet_num=$first_wallet_count;
                                $voucher_num=$first_voucher_count;
                                $wallet_count_total1 = intdiv($actual_wallet_count, 20);
                                $wallet_count_total2 = ($actual_wallet_count % 20) + $wallet_num ;

                                $voucher_count_total1 = intdiv($actual_vocher_count, 5);
                                $voucher_count_total2 = ($actual_vocher_count % 5)+$voucher_num;
                                
                                debug_log($wallet_count_total1);
                                debug_log($wallet_count_total2);
                                debug_log($voucher_count_total1);
                                debug_log($voucher_count_total2);

                                $flag="true";
                                $total_counts=$wallet_count_total1+$voucher_count_total1+4;
                              
                              }

                              for ($i=0;$i<$total_counts ;$i++ )
                              {
                                
                                if($flag=="true" && $wallet_count_total1!=0)
                                {
                                  if($wallet_num!=0)
                                  {
                                    $twenty=20;
                                    $diff_wallet=$twenty-$wallet_num;
                                    

                                    $this->db->select('name')->from('member')->where(array('id' => $upline_userid));
                                    $user_name = $this->db->get()->row();
                                    $name       = $user_name->name;

                                    $count_binary=$diff_wallet;
                                    $matching_pair1= $count_binary. " Binary Matching Commission : To Wallet";

                                    $actual_wallet_amount_new=$diff_wallet*7;
                                    if($actual_wallet_amount_new > 0)
                                    {
                                      $data = array(
                                          'userid'     => $upline_userid,
                                          'name'       => $name,
                                          'left_node'  => 0,
                                          'right_node' => 0,
                                          'amount'     => $actual_wallet_amount_new,
                                          'type'       => "Binary Commission",
                                          'pair_names' => $matching_pair1,
                                          'ref_id'     => 0,
                                          'date'       => date('Y-m-d H:i:s'),
                                          'pair_match' => 0,
                                          'secret'     => 0,
                                          'status'     => "Paid",
                                      );

                                      $this->db->insert('earning', $data);
                                      debug_log("pay matching ". $this->db->last_query());
                                    }

                                    $wallet_count_total1=$wallet_count_total1-1;
                                    $wallet_num=0;
                                    $flag="false";  
                                  }
                                  elseif($wallet_num==0)
                                  {

                                    $this->db->select('name')->from('member')->where(array('id' => $upline_userid));
                                    $user_name = $this->db->get()->row();
                                    $name       = $user_name->name;

                                    $count_binary=20;
                                    $matching_pair1= $count_binary. " Binary Matching Commission : To Wallet";

                                    $actual_wallet_amount_new=20*7;
                                    if($actual_wallet_amount_new > 0)
                                    {
                                      $data = array(
                                          'userid'     => $upline_userid,
                                          'name'       => $name,
                                          'left_node'  => 0,
                                          'right_node' => 0,
                                          'amount'     => $actual_wallet_amount_new,
                                          'type'       => "Binary Commission",
                                          'pair_names' => $matching_pair1,
                                          'ref_id'     => 0,
                                          'date'       => date('Y-m-d H:i:s'),
                                          'pair_match' => 0,
                                          'secret'     => 0,
                                          'status'     => "Paid",
                                      );

                                      $this->db->insert('earning', $data);
                                      debug_log("pay matching ". $this->db->last_query());
                                    }


                                    $wallet_count_total1=$wallet_count_total1-1;
                                    $flag="false";
                                    
                                    
                                  }
                                  
                                  
                                  
                                  
                                  
                                  
                                }
                                elseif($flag=="true" && $wallet_count_total1==0 && $wallet_count_total2!=0 )
                                {
                                  //echo $b.",";

                                  $this->db->select('name')->from('member')->where(array('id' => $upline_userid));
                                  $user_name = $this->db->get()->row();
                                  $name       = $user_name->name;

                                  $count_binary=$wallet_count_total2;
                                  $matching_pair1= $count_binary. " Binary Matching Commission : To Wallet";

                                  $actual_wallet_amount_new5=$wallet_count_total2*7;
                                  if($actual_wallet_amount_new5 > 0)
                                  {
                                    $data = array(
                                        'userid'     => $upline_userid,
                                        'name'       => $name,
                                        'left_node'  => 0,
                                        'right_node' => 0,
                                        'amount'     => $actual_wallet_amount_new5,
                                        'type'       => "Binary Commission",
                                        'pair_names' => $matching_pair1,
                                        'ref_id'     => 0,
                                        'date'       => date('Y-m-d H:i:s'),
                                        'pair_match' => 0,
                                        'secret'     => 0,
                                        'status'     => "Paid",
                                    );

                                    $this->db->insert('earning', $data);
                                    debug_log("pay matching ". $this->db->last_query());
                                  }
                                  $wallet_count_total2=0;
                                  $flag="false";
                                }
                                elseif($flag=="false"&& $voucher_count_total1!=0)
                                {
                                  
                                  if($voucher_num!=0)
                                  {
                                    $five=5;
                                    $voucer_diff= $five-$voucher_num;



                                    $this->db->select('name')->from('member')->where(array('id' => $upline_userid));
                                    $user_name = $this->db->get()->row();
                                    $name       = $user_name->name;

                                    $voucher_binary_count=$voucer_diff;
                                    $matching_pair1= $voucher_binary_count. " Binary Matching Commission : To Voucher";

                                    $actual_voucher_amount_new5=$voucer_diff*7;
                                    if($actual_voucher_amount_new5 > 0)
                                    {
                                      $data = array(
                                          'userid'     => $upline_userid,
                                          'name'       => $name,
                                          'left_node'  => 0,
                                          'right_node' => 0,
                                          'amount'     => $actual_voucher_amount_new5,
                                          'type'       => "Binary Commission Voucher",
                                          'pair_names' => $matching_pair1,
                                          'ref_id'     => 0,
                                          'date'       => date('Y-m-d H:i:s'),
                                          'pair_match' => 0,
                                          'secret'     => 0,
                                          'status'     => "Paid",
                                      );

                                      $this->db->insert('earning', $data);
                                      debug_log("pay matching ". $this->db->last_query());
                                    }

                                    $voucher_count_total1=$voucher_count_total1-1;
                                    $voucher_num=0;
                                    $flag="true";  
                                  }
                                  elseif($voucher_num==0)
                                  {
                                    
                                    //echo "5,";
                                    $this->db->select('name')->from('member')->where(array('id' => $upline_userid));
                                    $user_name = $this->db->get()->row();
                                    $name       = $user_name->name;

                                    $voucher_binary_count=5;
                                    $matching_pair1= $voucher_binary_count. " Binary Matching Commission : To Voucher";

                                    $actual_voucher_amount_new=5*7;
                                    if($actual_voucher_amount_new > 0)
                                    {
                                      $data = array(
                                          'userid'     => $upline_userid,
                                          'name'       => $name,
                                          'left_node'  => 0,
                                          'right_node' => 0,
                                          'amount'     => $actual_voucher_amount_new,
                                          'type'       => "Binary Commission Voucher",
                                          'pair_names' => $matching_pair1,
                                          'ref_id'     => 0,
                                          'date'       => date('Y-m-d H:i:s'),
                                          'pair_match' => 0,
                                          'secret'     => 0,
                                          'status'     => "Paid",
                                      );

                                      $this->db->insert('earning', $data);
                                      debug_log("pay matching ". $this->db->last_query());
                                    }

                                    $voucher_count_total1=$voucher_count_total1-1;
                                    $flag="true";
                                  }
                                  
                                  
                                  
                                  
                                }
                                elseif($flag=="false" && $voucher_count_total1==0 && $voucher_count_total2!=0 )
                                {
                                  //echo $d.",";
                                  //$voucer_diff= $five-$voucher_num;

                                  $this->db->select('name')->from('member')->where(array('id' => $upline_userid));
                                  $user_name = $this->db->get()->row();
                                  $name       = $user_name->name;

                                  $voucher_binary_count=$voucher_count_total2;
                                  $matching_pair1= $voucher_binary_count. " Binary Matching Commission : To Voucher";

                                  $actual_voucher_amount_new6=$voucher_count_total2*7;
                                  if($actual_voucher_amount_new6 > 0)
                                  {
                                    $data = array(
                                        'userid'     => $upline_userid,
                                        'name'       => $name,
                                        'left_node'  => 0,
                                        'right_node' => 0,
                                        'amount'     => $actual_voucher_amount_new6,
                                        'type'       => "Binary Commission Voucher",
                                        'pair_names' => $matching_pair1,
                                        'ref_id'     => 0,
                                        'date'       => date('Y-m-d H:i:s'),
                                        'pair_match' => 0,
                                        'secret'     => 0,
                                        'status'     => "Paid",
                                    );

                                    $this->db->insert('earning', $data);
                                    debug_log("pay matching ". $this->db->last_query());
                                  }
                                  
                                  $voucher_count_total2=0;
                                  $flag="true";
                                }
                                elseif($voucher_count_total1==0 )
                                {
                                  $flag="true";
                                }
                                

                              }




                              //wallet start

                              $actual_wallet_amount=$actual_wallet_count *7;

                              $wallet_count_update=$actual_wallet_count + $member_details->wallet_count1;

                              debug_log("voucher_count");
                              debug_log($get_count_20_pairs);
                              debug_log($actual_wallet_count);
                              debug_log($actual_wallet_amount);
                              debug_log($wallet_count_update);


                              //if($wallet_count_update <=30)
                              debug_log("wallet_count");
                              debug_log($wallet_count);
                              $arra1 = array('wallet_count1' => $wallet_count_update);
                              $this->db->where('id', $member_details->id);
                              $this->db->update('member', $arra1);
                              debug_log($this->db->last_query());



                              $get_user_wallet_balance1 = $this->db_model->select('balance', 'wallet', array('userid' => $member_details->id));

                              $arra2 = array('balance' => ($get_user_wallet_balance1 + $actual_wallet_amount),);
                              $this->db->where('userid', $member_details->id);
                              $this->db->update('wallet', $arra2);
                              debug_log($this->db->last_query());

                              //wallet end

                              //voucher start
                              $actual_vocher_amount=$actual_vocher_count *7;
                              $vocher_count_update=$actual_vocher_count + $member_details->voucher_count;


                              debug_log("voucher_count");
                              debug_log($get_count_5_pairs);
                              debug_log($actual_vocher_count);
                              debug_log($actual_vocher_amount);
                              debug_log($vocher_count_update);

                              $arra1 = array('voucher_count' => $vocher_count_update);
                              $this->db->where('id', $member_details->id);
                              $this->db->update('member', $arra1);
                              debug_log($this->db->last_query());



                              $get_user_balance1 = $this->db_model->select('balance', 'voucher', array('userid' => $member_details->id));
                              debug_log('$get_user_balance ' . $get_user_balance1);
                              debug_log('voucher ' . $amount);
                              $arra2 = array('balance' => ($get_user_balance1 + $actual_vocher_amount),);
                              $this->db->where('userid', $member_details->id);
                              $this->db->update('voucher', $arra2);
                              debug_log($this->db->last_query());


                              //voucher end



                          }
                      }



                }*/




            }

        }

    }

    //credit matching commission with pair names
    public function pay_matching_old($userid, $ref_id,$left,$right, $income_name,$matching_pair, $amount, $pair_match = 0, $secret = 0)
    {



        debug_log('pay_matching -'.$userid.' '. $ref_id.' '.$left.' '.$right.' '. $income_name.' '.$matching_pair.' '. $amount.' '. $pair_match.' '. $secret);


        $main_user_details =  $this->db_model->select_multi('*', 'member', array('id' =>$userid));
        $main_user_details_rank=$main_user_details->signup_package;
        $main_user_details_pairs=$main_user_details->pairs_count;


        debug_log("earning details condition");
        debug_log('main_user_details_rank -'. $main_user_details_rank);
        debug_log('main_user_details_pairs -'. $main_user_details_pairs);
        debug_log('pairs_count -'. $main_user_details->pairs_count);
        //debug_log('main_user_details -'. $main_user_details);


        if( ($main_user_details_rank == 1 && $main_user_details_pairs <=5 ) ||
            ($main_user_details_rank == 2 && $main_user_details_pairs <=15 ) ||
            ($main_user_details_rank == 3 && $main_user_details_pairs <=25 ) ||
            ($main_user_details_rank == 4 && $main_user_details_pairs <=45 ) ||
            ($main_user_details_rank == 5 && $main_user_details_pairs <=85 ) ||
            ($main_user_details_rank == 6 && $main_user_details_pairs <=170 ) ||
            ($main_user_details_rank == 7 && $main_user_details_pairs <=340 )

         )
         {

            debug_log("successfully entered into the earning");
            if(1==1)
            {
                debug_log("before --> control comes to binary commission");
                debug_log($userid);


                $user_detail1 =  $this->db_model->select_multi('*', 'member', array('id' =>$userid));
                $userid_binary_points = $user_detail1->binary_points;
                $userid_left_binary_points = $user_detail1->left_carry_points;
                $userid_right_binary_points = $user_detail1->right_carry_points;

                if( 1==1 )
                {
                    //$main_user_binary_left_points= $userid_left_binary_points;
                    //$main_user_binary_right_points= $userid_right_binary_points;


                    $user_detail_right1 =  $this->db_model->select_multi('*', 'member', array('id' =>$right));
                    $right_binary_points_new1 = $user_detail_right1->binary_points;


                    $user_detail_left1 =  $this->db_model->select_multi('*', 'member', array('id' =>$left));
                    $left_binary_points_new1 = $user_detail_left1->binary_points;


                    debug_log("1111111111111111");
                    debug_log($right_binary_points_new1);
                    debug_log($left_binary_points_new1);

                    if(1==1)
                    {

                        $update_total_left_binary_points= $userid_left_binary_points + $left_binary_points_new1;


                        $update_total_right_binary_points= $userid_right_binary_points + $right_binary_points_new1;

                        $arra21 = array('right_carry_points' => $update_total_right_binary_points,'left_carry_points' => $update_total_left_binary_points);

                        debug_log("1111111111111111");
                        debug_log($arra21);
                        debug_log($userid);


                        $this->db->where('id', $userid);
                        $this->db->update('member', $arra21);

                        debug_log($this->db->last_query());
                        debug_log($this->db->error());
                    }

                }


            }


            if (1==1)
            {

                debug_log(" control comes to binary commission");
                debug_log($userid);
                $user_detail =  $this->db_model->select_multi('*', 'member', array('id' =>$userid));
                $userid_binary_points = $user_detail->binary_points;
                $left_binary_points = $user_detail->left_carry_points;
                $right_binary_points = $user_detail->right_carry_points;
                $user_binary_pairs = $user_detail->pairs_count;




                debug_log("binary points");
                debug_log('userid_binary_points -'. $userid_binary_points);
                debug_log('left_binary_points -'. $left_binary_points);
                debug_log('right_binary_points -'. $right_binary_points);
                debug_log('user_binary_pairs -'. $user_binary_pairs);


                if($left_binary_points < $right_binary_points)
                {

                  debug_log("left side");
                  //$total_diff_binary_points= $right_binary_points-$left_binary_points;
                  $diff_num_pairs=$left_binary_points/3;
                  $diff_num_pairs1=$user_detail->pairs_count+$diff_num_pairs;

                  //debug_log($total_diff_binary_points);
                  debug_log($diff_num_pairs);
                  debug_log($diff_num_pairs1);


                  //getting amount based on pairs
                   if(1==1)
                   {



                      if($user_detail->signup_package==1)
                      {

                          if($diff_num_pairs<=5 && $diff_num_pairs1 <=5)
                          {
                              $num_pairs=$left_binary_points/3;
                              $amount_commission=$num_pairs * 7;
                          }
                          else
                          {

                              $actual_num_pairs=$user_detail->pairs_count;
                              $num_pairs= 5-$actual_num_pairs;
                              $amount_commission=$num_pairs * 7;
                          }

                      }
                      elseif($user_detail->signup_package==2)
                      {

                          if($diff_num_pairs<=15 && $diff_num_pairs1 <=15)
                          {
                              $num_pairs=$left_binary_points/3;
                              $amount_commission=$num_pairs * 7;
                          }
                          else
                          {
                              $actual_num_pairs=$user_detail->pairs_count;
                              $num_pairs= 15-$actual_num_pairs;
                              $amount_commission=$num_pairs * 7;
                          }

                      }
                      elseif($user_detail->signup_package==3)
                      {

                          if($diff_num_pairs<=25 && $diff_num_pairs1 <=25)
                          {
                              $num_pairs=$left_binary_points/3;
                              $amount_commission=$num_pairs * 7;
                          }
                          else
                          {
                              $actual_num_pairs=$user_detail->pairs_count;
                              $num_pairs= 25-$actual_num_pairs;
                              $amount_commission=$num_pairs * 7;
                          }

                      }
                      elseif($user_detail->signup_package==4)
                      {

                          if($diff_num_pairs<=45 && $diff_num_pairs1 <=45)
                          {
                              $num_pairs=$left_binary_points/3;
                              $amount_commission=$num_pairs * 7;
                          }
                          else
                          {
                              $actual_num_pairs=$user_detail->pairs_count;
                              $num_pairs= 45-$actual_num_pairs;
                              $amount_commission=$num_pairs * 7;
                          }

                      }
                      elseif($user_detail->signup_package==5)
                      {

                          if($diff_num_pairs<=85 && $diff_num_pairs1 <=85)
                          {
                              $num_pairs=$left_binary_points/3;
                              $amount_commission=$num_pairs * 7;
                          }
                          else
                          {
                              $actual_num_pairs=$user_detail->pairs_count;
                              $num_pairs= 85-$actual_num_pairs;
                              $amount_commission=$num_pairs * 7;
                          }

                      }
                      elseif($user_detail->signup_package==6)
                      {

                          if($diff_num_pairs<=170 && $diff_num_pairs1 <=170)
                          {
                              $num_pairs=$left_binary_points/3;
                              $amount_commission=$num_pairs * 7;
                          }
                          else
                          {
                              $actual_num_pairs=$user_detail->pairs_count;
                              $num_pairs= 170-$actual_num_pairs;
                              $amount_commission=$num_pairs * 7;
                          }

                      }
                      elseif($user_detail->signup_package==7)
                      {

                          if($diff_num_pairs<=340 && $diff_num_pairs1 <=340)
                          {
                              $num_pairs=$left_binary_points/3;
                              $amount_commission=$num_pairs * 7;
                          }
                          else
                          {
                              $actual_num_pairs=$user_detail->pairs_count;
                              $num_pairs= 340-$actual_num_pairs;
                              $amount_commission=$num_pairs * 7;
                          }

                      }


                   }

                  //update the binary points for both left and right users
                  $left_binary_pairs = $left_binary_points - $left_binary_points;
                  $right_binary_pairs = $right_binary_points - $left_binary_points ;

                  //update the pairs to main user
                  debug_log("update pairs got");
                  debug_log($left_binary_points);

                  $user_detail_for_pair =  $this->db_model->select_multi('*', 'member', array('id' =>$userid));
                  $user_detail_for_pair_count = $user_detail_for_pair->pairs_count;

                  $pairs_count = $user_detail_for_pair_count + $num_pairs;
                  $arra2 = array('pairs_count' => $pairs_count,'left_carry_points' => $left_binary_pairs,'right_carry_points' => $right_binary_pairs);
                  $this->db->where('id', $userid);
                  $this->db->update('member', $arra2);


                }
                elseif($left_binary_points > $right_binary_points)
                {

                  debug_log("right side");

                  //$total_diff_binary_points= $left_binary_points-$right_binary_points;
                  $diff_num_pairs=$right_binary_points/3;
                  $diff_num_pairs1=$user_detail->pairs_count+$diff_num_pairs1;

                  //getting amount based on pairs
                  if(1==1)
                   {

                      if($user_detail->signup_package==1)
                      {

                          if($diff_num_pairs<=5 && $diff_num_pairs1 <=5)
                          {
                              $num_pairs=$right_binary_points/3;
                              $amount_commission=$num_pairs * 7;
                          }
                          else
                          {

                              $actual_num_pairs=$user_detail->pairs_count;
                              $num_pairs= 5-$actual_num_pairs;
                              $amount_commission=$num_pairs * 7;
                          }

                      }
                      elseif($user_detail->signup_package==2)
                      {

                          if($diff_num_pairs<=15 && $diff_num_pairs1 <=15)
                          {
                              $num_pairs=$right_binary_points/3;
                              $amount_commission=$num_pairs * 7;
                          }
                          else
                          {
                              $actual_num_pairs=$user_detail->pairs_count;
                              $num_pairs= 15-$actual_num_pairs;
                              $amount_commission=$num_pairs * 7;
                          }

                      }
                      elseif($user_detail->signup_package==3)
                      {

                          if($diff_num_pairs<=25 && $diff_num_pairs1 <=25)
                          {
                              $num_pairs=$right_binary_points/3;
                              $amount_commission=$num_pairs * 7;
                          }
                          else
                          {
                              $actual_num_pairs=$user_detail->pairs_count;
                              $num_pairs= 25-$actual_num_pairs;
                              $amount_commission=$num_pairs * 7;
                          }

                      }
                      elseif($user_detail->signup_package==4)
                      {

                          if($diff_num_pairs<=45 && $diff_num_pairs1 <=45)
                          {
                              $num_pairs=$right_binary_points/3;
                              $amount_commission=$num_pairs * 7;
                          }
                          else
                          {
                              $actual_num_pairs=$user_detail->pairs_count;
                              $num_pairs= 45-$actual_num_pairs;
                              $amount_commission=$num_pairs * 7;
                          }

                      }
                      elseif($user_detail->signup_package==5)
                      {

                          if($diff_num_pairs<=85 && $diff_num_pairs1 <=85)
                          {
                              $num_pairs=$right_binary_points/3;
                              $amount_commission=$num_pairs * 7;
                          }
                          else
                          {
                              $actual_num_pairs=$user_detail->pairs_count;
                              $num_pairs= 85-$actual_num_pairs;
                              $amount_commission=$num_pairs * 7;
                          }

                      }
                      elseif($user_detail->signup_package==6)
                      {

                          if($diff_num_pairs<=170 && $diff_num_pairs1 <=170)
                          {
                              $num_pairs=$right_binary_points/3;
                              $amount_commission=$num_pairs * 7;
                          }
                          else
                          {
                              $actual_num_pairs=$user_detail->pairs_count;
                              $num_pairs= 170-$actual_num_pairs;
                              $amount_commission=$num_pairs * 7;
                          }

                      }
                      elseif($user_detail->signup_package==7)
                      {

                          if($diff_num_pairs<=340 && $diff_num_pairs1 <=340)
                          {
                              $num_pairs=$right_binary_points/3;
                              $amount_commission=$num_pairs * 7;
                          }
                          else
                          {
                              $actual_num_pairs=$user_detail->pairs_count;
                              $num_pairs= 340-$actual_num_pairs;
                              $amount_commission=$num_pairs * 7;
                          }

                      }


                   }

                  //update the binary points for both left and right users

                  $left_binary_pairs = $left_binary_points - $right_binary_points;
                  $right_binary_pairs = $right_binary_points - $right_binary_points;


                  $user_detail_for_pair =  $this->db_model->select_multi('*', 'member', array('id' =>$userid));
                  $user_detail_for_pair_count = $user_detail_for_pair->pairs_count;
                  debug_log("update pairs got");
                  debug_log($right_binary_points);
                  debug_log($user_detail_for_pair_count);
                  debug_log($num_pairs);
                  debug_log($user_detail_for_pair);

                  $pairs_count1 = $user_detail_for_pair_count + $num_pairs;
                  $arra2 = array('pairs_count' => $pairs_count1,'left_carry_points' => $left_binary_pairs,'right_carry_points' => $right_binary_pairs);


                  debug_log("111111111111111111111111");
                  debug_log($pairs_count1);
                  debug_log($arra2);
                  $this->db->where('id', $userid);
                  $this->db->update('member', $arra2);


                }
                elseif($left_binary_points == $left_binary_points)
                {

                  debug_log("both side");

                  //$total_diff_binary_points= $left_binary_points;
                  $diff_num_pairs1=$left_binary_points/3;
                  $diff_num_pairs=$user_detail->pairs_count+$diff_num_pairs1;

                  //getting amount based on pairs
                   if(1==1)
                   {



                      if($user_detail->signup_package==1)
                      {

                          if($diff_num_pairs<=5 && $diff_num_pairs1 <=5)
                          {
                              $num_pairs=$left_binary_points/3;
                              $amount_commission=$num_pairs * 7;
                          }
                          else
                          {

                              $actual_num_pairs=$user_detail->pairs_count;
                              $num_pairs= 5-$actual_num_pairs;
                              $amount_commission=$num_pairs * 7;
                          }

                      }
                      elseif($user_detail->signup_package==2)
                      {

                          if($diff_num_pairs<=15 && $diff_num_pairs1 <=15)
                          {
                              $num_pairs=$left_binary_points/3;
                              $amount_commission=$num_pairs * 7;
                          }
                          else
                          {
                              $actual_num_pairs=$user_detail->pairs_count;
                              $num_pairs= 15-$actual_num_pairs;
                              $amount_commission=$num_pairs * 7;
                          }

                      }
                      elseif($user_detail->signup_package==3)
                      {

                          if($diff_num_pairs<=25 && $diff_num_pairs1 <=25)
                          {
                              $num_pairs=$left_binary_points/3;
                              $amount_commission=$num_pairs * 7;
                          }
                          else
                          {
                              $actual_num_pairs=$user_detail->pairs_count;
                              $num_pairs= 25-$actual_num_pairs;
                              $amount_commission=$num_pairs * 7;
                          }

                      }
                      elseif($user_detail->signup_package==4)
                      {

                          if($diff_num_pairs<=45 && $diff_num_pairs1 <=45)
                          {
                              $num_pairs=$left_binary_points/3;
                              $amount_commission=$num_pairs * 7;
                          }
                          else
                          {
                              $actual_num_pairs=$user_detail->pairs_count;
                              $num_pairs= 45-$actual_num_pairs;
                              $amount_commission=$num_pairs * 7;
                          }

                      }
                      elseif($user_detail->signup_package==5)
                      {

                          if($diff_num_pairs<=85 && $diff_num_pairs1 <=85)
                          {
                              $num_pairs=$left_binary_points/3;
                              $amount_commission=$num_pairs * 7;
                          }
                          else
                          {
                              $actual_num_pairs=$user_detail->pairs_count;
                              $num_pairs= 85-$actual_num_pairs;
                              $amount_commission=$num_pairs * 7;
                          }

                      }
                      elseif($user_detail->signup_package==6)
                      {

                          if($diff_num_pairs<=170 && $diff_num_pairs1 <=170)
                          {
                              $num_pairs=$left_binary_points/3;
                              $amount_commission=$num_pairs * 7;
                          }
                          else
                          {
                              $actual_num_pairs=$user_detail->pairs_count;
                              $num_pairs= 170-$actual_num_pairs;
                              $amount_commission=$num_pairs * 7;
                          }

                      }
                      elseif($user_detail->signup_package==7)
                      {

                          if($diff_num_pairs<=340 && $diff_num_pairs1 <=340)
                          {
                              $num_pairs=$left_binary_points/3;
                              $amount_commission=$num_pairs * 7;
                          }
                          else
                          {
                              $actual_num_pairs=$user_detail->pairs_count;
                              $num_pairs= 340-$actual_num_pairs;
                              $amount_commission=$num_pairs * 7;
                          }

                      }


                  }



                  debug_log("update pairs got");
                  debug_log($left_binary_points);

                  $left_binary_pairs=0;
                  $right_binary_pairs=0;

                  $user_detail_for_pair =  $this->db_model->select_multi('*', 'member', array('id' =>$userid));
                  $user_detail_for_pair_count = $user_detail_for_pair->pairs_count;

                  $pairs_count = $user_detail_for_pair_count + $num_pairs;
                  $arra2_new = array('pairs_count' => $pairs_count,'left_carry_points' => $left_binary_pairs,'right_carry_points' => $right_binary_pairs);

                  debug_log("error=============>");
                  debug_log($arra2_new);

                  $this->db->where('id', $userid);
                  $this->db->update('member', $arra2_new);


            }

            debug_log("earning ammount latest");
            debug_log($amount_commission);
            if($amount_commission>0)
            {


                $user_detail_for_pair_pv =  $this->db_model->select_multi('*', 'member', array('id' =>$userid));
                
                  debug_log("1111111111111111111111111111111111111");
                  debug_log($user_detail_for_pair_pv);

                /*$this->db->select('name')->from('member')->where(array('id' => $userid));
                $user_name = $this->db->get()->row();
                $name       = $user_name->name;

                if($amount > 0)
                {
                  $data = array(
                      'userid'     => $userid,
                      'name'       => $name,
                      'left_node'  => $left,
                      'right_node' => $right,
                      'amount'     => $amount_commission,
                      'type'       => $income_name,
                      'pair_names' => $matching_pair,
                      'ref_id'     => $ref_id,
                      'date'       => date('Y-m-d H:i:s'),
                      'pair_match' => $pair_match,
                      'secret'     => $secret,
                      'status'     => "Paid",
                  );

                  $this->db->insert('earning', $data);
                  debug_log("pay matching ". $this->db->last_query());

                }*/


                $number_pairs=$amount_commission/7; 
                $diff_pv = $number_pairs * 3;

                $left_pv = $user_detail_for_pair_pv->total_a_pv - $diff_pv;
                $right_pv = $user_detail_for_pair_pv->total_b_pv - $diff_pv;


                $arra2 = array('total_a_pv' => $left_pv,'total_b_pv' => $right_pv);


                debug_log("pv update function success");
                debug_log($arra2);
                $this->db->where('id', $userid);
                $this->db->update('member', $arra2);
                debug_log($this->db->last_query());

            }



            if($amount_commission > 0)
            {

                  $member_details =  $this->db_model->select_multi('*', 'member', array('id' =>$userid));
                  if($member_details->signup_package == 1)
                  {

                    
                    $total_comm = $amount_commission;

                    if($total_comm>0)
                    {


                      $actual_wallet_count= $total_comm / 7;
                      $actual_wallet_amount=$total_comm;

                      $get_user_wallet_balance1 = $this->db_model->select('balance', 'wallet', array('userid' => $member_details->id));

                      $arra2 = array('balance' => ($get_user_wallet_balance1 + $actual_wallet_amount),);
                      $this->db->where('userid', $member_details->id);
                      $this->db->update('wallet', $arra2);
                      debug_log($this->db->last_query());

                      debug_log("wallet_count");
                      debug_log($wallet_count);
                      $arra1 = array('wallet_count1' => $member_details->wallet_count1+$actual_wallet_count);
                      $this->db->where('id', $member_details->id);
                      $this->db->update('member', $arra1);
                      debug_log($this->db->last_query());


                      $this->db->select('name')->from('member')->where(array('id' => $userid));
                      $user_name = $this->db->get()->row();
                      $name       = $user_name->name;

                      $matching_pair1= $matching_pair." : To Wallet";
                      if($actual_wallet_amount > 0)
                      {
                        $data = array(
                            'userid'     => $userid,
                            'name'       => $name,
                            'left_node'  => $left,
                            'right_node' => $right,
                            'amount'     => $actual_wallet_amount,
                            'type'       => $income_name,
                            'pair_names' => $matching_pair1,
                            'ref_id'     => $ref_id,
                            'date'       => date('Y-m-d H:i:s'),
                            'pair_match' => $pair_match,
                            'secret'     => $secret,
                            'status'     => "Paid",
                        );

                        $this->db->insert('earning', $data);
                        debug_log("pay matching ". $this->db->last_query());
                      }

                    }

                  }
                  else
                  {

                      $total_comm = $amount_commission;
                      debug_log("total sum Commission");
                      debug_log($total_comm);
                      
                      if ($total_comm>0)
                      {

                          $total_sum_count = $member_details->wallet_count1 + $member_details->voucher_count ;
                          $total_comm_count =$total_comm/7;
                          $total_wallet_and_voucher_count=$total_sum_count + $total_comm_count;


                          debug_log("Total wallet pair count");
                          debug_log($total_sum_count);
                          debug_log($total_comm_count);
                          debug_log($total_wallet_and_voucher_count);

                          $get_both_pairs=$this->get_number_wallet_and_vocher_pair($total_wallet_and_voucher_count);

                          debug_log("get_both_pairs");
                          debug_log($get_both_pairs);



                          $get_count_5_pairs = $get_both_pairs['count_5'];
                          $get_count_20_pairs = $get_both_pairs['count_20'];

                          $actual_wallet_count=$get_count_20_pairs - $member_details->wallet_count1;

                          $actual_wallet_amount=$actual_wallet_count *7;

                          $wallet_count_update=$actual_wallet_count + $member_details->wallet_count1;

                          debug_log("voucher_count");
                          debug_log($get_count_20_pairs);
                          debug_log($actual_wallet_count);
                          debug_log($actual_wallet_amount);
                          debug_log($wallet_count_update);


                          //if($wallet_count_update <=30)
                          debug_log("wallet_count");
                          debug_log($wallet_count);
                          $arra1 = array('wallet_count1' => $wallet_count_update);
                          $this->db->where('id', $member_details->id);
                          $this->db->update('member', $arra1);
                          debug_log($this->db->last_query());



                          $get_user_wallet_balance1 = $this->db_model->select('balance', 'wallet', array('userid' => $member_details->id));

                          $arra2 = array('balance' => ($get_user_wallet_balance1 + $actual_wallet_amount),);
                          $this->db->where('userid', $member_details->id);
                          $this->db->update('wallet', $arra2);
                          debug_log($this->db->last_query());


                          $this->db->select('name')->from('member')->where(array('id' => $userid));
                          $user_name = $this->db->get()->row();
                          $name       = $user_name->name;
                          $matching_pair1= $matching_pair." : To Wallet";
                          if($actual_wallet_amount > 0)
                          {
                            $data = array(
                                'userid'     => $userid,
                                'name'       => $name,
                                'left_node'  => $left,
                                'right_node' => $right,
                                'amount'     => $actual_wallet_amount,
                                'type'       => $income_name,
                                'pair_names' => $matching_pair1,
                                'ref_id'     => $ref_id,
                                'date'       => date('Y-m-d H:i:s'),
                                'pair_match' => $pair_match,
                                'secret'     => $secret,
                                'status'     => "Paid",
                            );

                            $this->db->insert('earning', $data);
                            debug_log("pay matching ". $this->db->last_query());
                          }



                          $get_count_5_pairs = $get_both_pairs['count_5'];
                          $actual_vocher_count=$get_count_5_pairs - $member_details->voucher_count ;

                          $actual_vocher_amount=$actual_vocher_count *7;
                          

                          $vocher_count_update=$actual_vocher_count + $member_details->voucher_count;


                          debug_log("voucher_count");
                          debug_log($get_count_5_pairs);
                          debug_log($actual_vocher_count);
                          debug_log($actual_vocher_amount);
                          debug_log($vocher_count_update);

                          $arra1 = array('voucher_count' => $vocher_count_update);
                          $this->db->where('id', $member_details->id);
                          $this->db->update('member', $arra1);
                          debug_log($this->db->last_query());



                          $get_user_balance1 = $this->db_model->select('balance', 'voucher', array('userid' => $member_details->id));
                          debug_log('$get_user_balance ' . $get_user_balance1);
                          debug_log('voucher ' . $amount);
                          $arra2 = array('balance' => ($get_user_balance1 + $actual_vocher_amount),);
                          $this->db->where('userid', $member_details->id);
                          $this->db->update('voucher', $arra2);
                          debug_log($this->db->last_query());

                          $this->db->select('name')->from('member')->where(array('id' => $userid));
                          $user_name = $this->db->get()->row();
                          $name       = $user_name->name;
                          $matching_pair2= $matching_pair." : To voucher";
                          if($actual_vocher_amount > 0)
                          {
                            $data = array(
                                'userid'     => $userid,
                                'name'       => $name,
                                'left_node'  => $left,
                                'right_node' => $right,
                                'amount'     => $actual_vocher_amount,
                                'type'       => $income_name,
                                'pair_names' => $matching_pair2,
                                'ref_id'     => $ref_id,
                                'date'       => date('Y-m-d H:i:s'),
                                'pair_match' => $pair_match,
                                'secret'     => $secret,
                                'status'     => "Paid",
                            );

                            $this->db->insert('earning', $data);
                            debug_log("pay matching ". $this->db->last_query());
                          }




                      }
                  }



            }




              if (config_item('enable_pair_deduct')=='Yes')
              {


                debug_log("checking=======================");
                $condition = False;
                $F_count = $this->db_model->count_all('earning', array('userid' => $userid, 'type'=>'First Pair Matching Comm', 'pid' =>$pid));
                $S_count = $this->db_model->count_all('earning', array('userid' => $userid, 'type'=>'Binary Commission', 'pid' =>$pid));
                $count = $F_count + $S_count;
                debug_log("count ".$count);
                $pairsdeduct = config_item('pairsdeduct');
                debug_log($pairsdeduct);

                foreach ($pairsdeduct as $key => $value) {
                  if ($count==$value) {
                    $text = "Deduction of ".$key." pair income ";
                    $query = $this->db->query("SELECT id FROM deductions where user_id = $userid and  type = '$income_name' and text ='$text' and amount = $amount ");
                    if(!$query->num_rows()>0){
                      $this->add_deduction($userid,'admin',$amount,$income_name,$text,$pid,'account_transfer','account_transfer');
                      debug_log("pair ".$key." income");
                      $condition = True;
                    }
                  }
                }

                if ($condition) {
                  $get_user_balance = $this->db_model->select('balance', 'wallet', array('userid' => $userid));
                  wallet_log('$get_user_balance ' . $get_user_balance);
                  $arra = array('balance' => ($get_user_balance - $amount),);
                  $this->db->where('userid', $userid);
                  $this->db->update('wallet', $arra);
                  wallet_log($this->db->last_query());
                 }
               }

            }

            return true;
         }



     }

    //carry forward
    public function pay_carry_forward($userid, $ref_id, $income_name,$matching_pair, $amount, $pair_match = 0, $secret = 0)
    {
        $this->db->select('name')->from('member')->where(array('id' => $userid));
        $user_name = $this->db->get()->row();
        $name       = $user_name->name;
        $data = array(
            'userid'     => $userid,
            'name'       => $name,
            'amount'     => $amount,
            'type'       => $income_name,
            'pair_names' => $matching_pair,
            'ref_id'     => $ref_id,
            'date'       => date('Y-m-d H:i:s'),
            'pair_match' => $pair_match,
            'secret'     => $secret,
        );

        $this->db->insert('earning_carry_forward', $data);

        return true;

    }

    public function pay_earning_updated($userid, $name, $ref_id,$type, $text, $amount, $pair_match = 0, $secret = 0,$pid=1)
    {

        $new_up=$userid;
        $up1 =  $this->db_model->select('position','member',array('id'=>$new_up));
        $this->db->select('A,B');
        $this->db->where('id',$up1);
        $user_AB  = $this->db->get('member')->row();
        if($new_up&&$user_AB->A!=0&&$user_AB->B!=0){
          while(true){
            $new_up =  $this->db_model->select('position','member',array('id'=>$new_up));
            $user1_pair =  $this->db_model->select('pair_count','member',array('id'=>$new_up));
            $this->db->where('id',$new_up);
            $this->db->update('member',array('pair_count'=>$user1_pair+1));
            if($new_up==''||!$new_up){
              break;
            }
          }
        }
        
        $data = array(
              'userid'     => $userid,
              'name'       => $name,
              'amount'     => $amount,
              'type'       => $type,
              'pair_names' => $text,
              'ref_id'     => $ref_id,
              'date'       => date('Y-m-d H:i:s'),
              'pair_match' => $pair_match,
              'secret'     => $secret,
              'pid'        => $pid,
          );

          $this->db->insert('earning', $data);
          $insert_id = $this->db->insert_id();
          debug_log('this insert_id = '.$this->db->insert_id()); 

          $e_status =  $this->db_model->select('e_status','level_details',array('userid'=>$userid,'pid'=>$pid));
          debug_log($this->db->last_query()); 
          
          if(config_item('same_tree')=='Yes')
          {
            if ($e_status==0) {
             $update_earning = "UPDATE earning SET status = 'Hold' WHERE id = ".$insert_id;
             $this->db->query($update_earning);
             debug_log($this->db->last_query()); 
            }
          }

           if(config_item('crowdfund_type')=='Manual_Peer_to_Peer')
           {
             $update_earning = "UPDATE earning SET status = 'Paid' WHERE id = ".$insert_id;
            $this->db->query($update_earning);
            debug_log($this->db->last_query()); 
          }
          //debug_log("pay earning".$this->db->last_query());
    }


    public function pay_earning($userid, $ref_id,$type, $text, $amount, $pair_match = 0, $secret = 0,$pid=1)
    {
        $this->db->select('t1.name, t1.status, t1.signup_package, t1.role, t2.admin_charge, t2.admin_charge_type')->from('member as t1')->where(array('t1.id'=>$userid, 't1.role !='=>'customer'))
          ->join("(SELECT plan_id, admin_charge, admin_charge_type FROM payout) as t2", 't1.signup_package = t2.plan_id', 'LEFT');

        $details = $this->db->get()->result()[0];
        $name = $userid =='admin' ? 'admin' : $details->name;

        $status = ($userid =='admin') || ($type =='Referral Income') ? 'Active' : $details->status;
        $status = config_item('inactive_in_tree') == 'Yes' ? 'Active' : $status;

        if(($status == 'Active') && ($amount > 0)) {

          if($details->admin_charge_type=='DDE'){
            $net_earning = $amount*(1-($details->admin_charge/100));
            $admin_amount = $amount - $net_earning;

            $this->pay_earning_updated($userid,$name,$ref_id,$type, $text, $net_earning, $pair_match, $secret,$pid);
            $this->add_deduction($userid,'Admin',$admin_amount,'Admin Charge','Admin Charge for '.$text,$details->signup_package,'','');
            $this->pay_earning_updated('Admin','Admin',$userid,'Admin Charge from '.$name, 'Admin Charge for '.$text, $admin_amount, '', '');
          }
          else{
           debug_log('cycle_level ' .config_item('cycle_level'));
            if (config_item('cycle_level')=='') {
            $this->pay_earning_updated($userid,$name,$ref_id,$type, $text, $amount, $pair_match, $secret,$pid);
            }
            else
            {
               $this->add_deduction($ref_id,$userid,$amount,$type,'User ReUpgrade Amount to '.$userid,$details->signup_package,'Account Transfer','');
             debug_log('deductions');
             debug_log($this->db->last_query());
            $this->pay_earning_updated($userid,$name,$ref_id,$type, $text, $amount, $pair_match, $secret,$pid);
            debug_log('earnings');
            debug_log($this->db->last_query());
            }
          }
        }
        debug_log("Flag : ".$flag);
        if($flag!=''){
          debug_log("omkar");
          debug_log("In Pay Earnings :");
          debug_log($userid);
          debug_log($amount);
          /*$level_array=array(
                      "userid"=>$userid,
                      "amount"=>$amount,
                      "remark"=>$level_text              
                  );*/
          }
        return true;

    }


    public function add_deduction($userid,$to_user,$amount,$type,$text,$pid,$pm,$tid)
    {
        if($amount>0){
            $array = array(
            'user_id' =>$userid,
            'to_user' => $to_user,
            'amount' => $amount,
            'type' => $type,
            'text' => $text,
            'plan_id' => $pid,
            'payment_mode' => $pm,
            'transaction_id' => $tid,
            'date' => date('Y-m-d H:i:s')
          );

          $this->db->insert('deductions', $array);

          return true;
        }
    }

    public function cycle_earning_updated($userid,$amount,$cs_id)
    {
      debug_log('cycle earning function open');
      $aupline=$this->db_model->select('level3', 'crowdfund_queue', array('userid' => $userid));
      debug_log($this->db->last_query());

      $aupline_array = explode(',', $aupline);
      debug_log($aupline_array);
                    
      $fcount = 0;
      $tcount = 1;
      while (true) {
        debug_log('enterd into loop');
        $count = 1;
        $bcount = 1;
                    
        foreach ($aupline_array as $key => $value) 
        {   
                            
          debug_log($count);
          debug_log($fcount);

          if (($count>=0)&&($count>$fcount)) {
              debug_log('from id');
              $from_id =  $value;
              debug_log($from_id);
              break;
          }
          $count = $count+1;
        }
        $fcount = $fcount+1;

        foreach ($aupline_array as $key => $value) 
        {   
                            
        debug_log($bcount);
        debug_log($tcount);

          if (($bcount>=2)&&($bcount>$tcount)) {
            debug_log('to id');
            $to_id =  $value;
            $cto_id =  $value;
            debug_log($to_id );
            break;
          }
          $bcount = $bcount+1;
        }
        $tcount = $tcount+1;

        if ($cto_id=='') break;
          $cto_id = '';
          $amd = $this->db_model->select_multi('*', 'member', array('id' => $from_id));
          debug_log($this->db->last_query());
          $rank = 'fire';
          $update_level = "UPDATE member SET gift_level =".$tcount." , last_upgrade = ".time()." , rank = '".$rank."', rank_upgrade = ".time()." WHERE id = $amd->id";
          $this->db->query($update_level);
          debug_log($this->db->last_query());
          //$update_rank_level = "UPDATE level_details SET  last_upgrade = ".time()." WHERE userid = $amd->id and pid =  $amd->signup_package";
          //$this->db->query($update_rank_level);
          //debug_log($this->db->last_query());
          $this->earning->pay_earning( $to_id, $amd->id, 'level '.$tcount.' Income', 'User ReUpgrade Amount from '.$amd->name, $amount, '', $cs_id);
                debug_log($this->db->last_query());                
      }
      debug_log('cycle earning function close');
    }

    public function deduct_wallet($md, $amount, $purpose='', $tid='', $prd='', $remarks='')
    {
        $this->db->query("UPDATE wallet SET balance = balance - ".$amount." where userid = ".$md->id);
        wallet_log($this->db->last_query());

        $array = array(
          'userid' => $md->id,
          'to_userid'=> 'Admin',
          'name'   => $md->name,
          'amount' => $amount,
          'gateway' => 'eWallet',
          'time' =>time(),
          'purpose' => $purpose,
          'transaction_id'=>$tid,
          'payment_request_id'=>$prd,
          'secret' => $md->signup_package,
          'status' => 'Completed',
          'remarks' => $remarks
        );
        $this->db->insert('transaction', $array);
        debug_log($this->db->last_query());
    }


    public function process_binary($id, $data)
    {
        //echo "hello";
        //echo "binary";
        $min              = min(($data['total_a_matching_incm'] - $data['paid_a_matching_incm']), ($data['total_b_matching_incm'] - $data['paid_b_matching_incm']));
        $pair_match       = min(($data['total_a'] - $data['paid_a']), ($data['total_b'] - $data['paid_b']));
        $pair_max         = max(($data['total_a'] - $data['paid_a']), ($data['total_b'] - $data['paid_b']));
        $paid_pair        = min($data['paid_a'], $data['paid_b']);
        $per_user_earning = $min / $pair_match;

        #$sponsor = $this->db_model->select('sponsor', 'member', array('id'=>$id));
        if ($paid_pair <= 0 && $pair_max >= config_item('binary_frst_ratio') && $pair_match >= config_item('binary_2nd_ratio')) {
            # First Binary.
           # $this->pay_earning($sponsor, '', 'Referral Income', ($min*50/100), $pair_match);
            $this->pay_earning($id, '','Matching Commission', 'Matching Income', $min, $pair_match);
            if ($data['total_a'] > 0) {
                $paid_a       = config_item('binary_frst_ratio');
                $paid_b       = 1;
                $paid_a_match = ($per_user_earning * config_item('binary_frst_ratio'));
                $paid_b_match = $per_user_earning;
            } else {
                $paid_a       = 1;
                $paid_b       = config_item('binary_frst_ratio');
                $paid_a_match = $per_user_earning;
                $paid_b_match = $per_user_earning * config_item('binary_frst_ratio');
            }
            $array = array(
                'paid_a'               => $paid_a,
                'paid_b'               => $paid_b,
                'paid_a_matching_incm' => $paid_a_match,
                'paid_b_matching_incm' => $paid_b_match,
            );
            $this->db->where('id', $id);
            $this->db->update('member', $array);

        } else if ($pair_match >= config_item('binary_2nd_ratio') && $paid_pair > 0) {
            $cappping   = $this->db_model->select('capping', 'product', array('id' => $this->db_model->select('signup_package', 'member', array('id' => $id))));
            $total_paid = $this->db_model->sum('amount', 'earning', array('userid' => $id, 'type' => 'Matching Income', 'date'=>date('Y-m-d')));
            # Second and after ward binary


            /* ******************* For Conditional Binary ********************

             for ($i = 0; $i < $pair_match; $i++) {
                            $paid_pair = $paid_pair + 1;
                            if ($paid_pair == "4") {
                                $this->pay_earning($id, '', 'Matching Income', '1', '1');
                            } else {
                                $this->pay_earning($id, '', 'Matching Income', $per_user_earning, '1');
                            }
                        }


              ****************************************************************/

            if ($cappping <= 0 || $total_paid < $cappping) {
                $avl_cap = $cappping - $total_paid;
                if ($min > $avl_cap && $cappping > 0) {
                   // $min = $min = $avl_cap;
                    $min = $min - $avl_cap;
                }
                # $this->pay_earning($sponsor, '', 'Referral Income', ($min*50/100), $pair_match);
                $this->pay_earning($id, '','Matching Income', 'Matching Income', $min, $pair_match);
            }
            $array = array(
                'paid_a'               => $data['paid_a'] + $pair_match,
                'paid_b'               => $data['paid_b'] + $pair_match,
                'paid_a_matching_incm' => $data['paid_a_matching_incm'] + $min,
                'paid_b_matching_incm' => $data['paid_b_matching_incm'] + $min,
            );
            $this->db->where('id', $id);
            $this->db->update('member', $array);
        } else {

        }

    }

    /*
    public function repurchase($order_id)
    {
        $this->db->select('product_id, userid, cost, qty')->from('product_sale')->where(array('id' => $order_id));
        $order_detail = $this->db->get()->row();
        $userid       = $order_detail->userid;
        $product_id   = $order_detail->product_id;
        $qty          = $order_detail->qty;

        $sponsor = $this->db_model->select('sponsor', 'member', array('id' => $userid));
        $this->repurchase_earning($userid, $sponsor, $product_id, $qty);

    }

    public function repurchase_earning($userid, $sponsor, $packageid, $qty)
    {
        if (config_item('enable_gap_commission') !== "Yes") {
            $this->credit_direct_referral_income($userid, $sponsor, $packageid, false, $qty);
        } else {
            $data     = $this->db_model->select_multi('mypv, total_a_pv, total_b_pv', 'member', array('id' => $userid));
            $total_pv = $data->total_a_pv + $data->total_b_pv + $data->mypv;

            $this->db->where(array('total_pv <=' =>$total_pv,));
            $this->db->order_by('id', 'DESC');
            $result        = $this->db->get('gap_commission_setting')->row();
            $dataxs        = $this->db_model->select_multi('prod_price,pv,direct_income, level_income', 'product', array('id' => $packageid));
            $pv            = $dataxs->pv;
            $product_price = $dataxs->prod_price;
            if ($pv > "0") {
                $mypv = $data->mypv + ($pv * $qty);
                $arr  = array('mypv' => $mypv);
                $this->db->where('id', $userid);
                $this->db->update('member', $arr);
            }
            if ($dataxs->direct_income > "0" && trim($sponsor) !== '') {
                $this->pay_earning($sponsor, $userid,'Referral Income', 'Referral Income', $dataxs->direct_income);
            }

            $earning = ($product_price * $result->amount / 100) * $qty;
            $this->pay_earning($userid, 'Self','Self', $result->income_name, $earning);

            $this->db->select('amount, income_name');
            $this->db->where(array(
                                 'total_pv <=' =>
                                     $total_pv,
                             ));
            $this->db->order_by('id', 'DESC');
            $ex = $this->db->get('gap_commission_setting')->result();

            $i = 0;
            foreach ($ex as $e) {
                $e = trim($e);
                if ($i == 0) {
                    $pay_sponsor = $sponsor;
                } else {
                    $pay_sponsor = $this->find_level_sponsor($sponsor, $i);
                }
                if ($pay_sponsor > 0) {
                    $amt = ($product_price * ($result->amount - $e->amount) / 100) * $qty;
                    if ($amt > 0) {
                        $this->pay_earning($pay_sponsor, $userid,'Referral Income', $e->income_name, $amt);
                    }
                }
                $i++;
            }

        }
    }
    */

    public function credit_direct_referral_income($md,$pd)
    {
        $referal_text="Direct Referral Commission from " .$md->name;
        if ($md->topup > "0"):

            ###############################################################
            #
            # Direct or Referal Income First
            #
            ##############################################################
            if ($pd->pv > "0") {
                $this->db->query("UPDATE member SET mypv = mypv + ".$pd->pv." where id = ".$md->id);
            }

            $query = $this->db->query("select id, (CHAR_LENGTH(direct_commission) - CHAR_LENGTH(REPLACE(direct_commission, ',','')) + 1) as df from plans having df > 1");

            $pd = $query->num_rows()>0 ? $this->db->query("select * from plans where id IN (select signup_package from member where id =".$md->sponsor.")")->result()[0] : $pd;
            debug_log($this->db->last_query());


            if (trim($pd->direct_commission) !== "") {
              $ex = explode(',', $pd->direct_commission);
              //debug_log(count($ex));
              //$sponsor_pd_id = $this->db_model->select('signup_package', 'member', array('id' =>$md->sponsor));
              $md_pd = $this->db_model->select_multi('*', 'plans', array('id' =>$md->signup_package));
              

              $sponsor_deatils = $this->db_model->select_multi('*', 'member', array('id' =>$md->sponsor));
              $sponsor_pd_details = $this->db_model->select_multi('*', 'plans', array('id' =>$sponsor_deatils->signup_package));
              

              debug_log('md_id'.$md_id);
              debug_log('md_id'.$md->signup_package);
              /*if(count($ex)>1){
                $comm = $ex[$md->signup_package-1];
              }*/
              if(count($ex)>=1){
                $comm = $sponsor_pd_details->direct_commission;
              }
             
               // $comm = $ex[$md->signup_package-1];
                debug_log($comm);
                debug_log($md->topup);
                debug_log($pd->joining_fee);
                debug_log($pd->ref_plan);
                if($pd->config_ref_comm=='mrp_percent'){
                  $temp = $pd->ref_plan == 'joining' ? $comm * $md->topup : $comm * $pd->joining_fee;   
                  debug_log($temp);
                  $comm = $temp/100;
                  if($comm>0){
                  $this->pay_earning($md->sponsor, $md->id,"Referral Income", $referal_text, $comm);
                }
                }
                //debug_log($ex[$sponsor_plan-1]);
                
               else {
                if ($pd->direct_commission > "0.00" && trim($md->sponsor) !== '') {
                $this->pay_earning($md->sponsor, $md->id,"Referral Income", $referal_text, $pd->direct_commission);
                }
              }
              
            }

            ## NOW Level Income
            if (trim($pd->level_income) !== "") {
                $ex = explode(',', $pd->level_income);
                $i  = 0;
                foreach ($ex as $e) {
                    $e = trim($e);
                    if ($i == 0) {
                        $pay_sponsor = $sponsor;
                    } else {
                        $pay_sponsor = $this->find_level_sponsor($sponsor, $i);
                    }
                    if ($pay_sponsor > 0 && $e > 0) {
                        $this->pay_earning($pay_sponsor, $userid, 'Referral Income', 'Level Income', $e);
                    }
                    $i++;
                }
            }

            $position =  $this->db_model->select('position', 'level_details', array('userid' =>$md->id,'pid'=>$pd->id));
            // $position_data =  $this->db_model->select('*', 'member', array('id' =>$sponsor));
            if ($position == $md->sponsor) {
              $this->sponsor_matching($pd->id, $position);
            }

            // debug_log('sponsor_matching',$this->db->last_query());

        endif;

        return true;

    }

    //function to credit levelwise referal commission to the users
    private function credit_level_referral_income($md, $pd)
    {
         $i=1;
         $userid = $md->id;
         $temp_id = $userid;

         #The following query checks if level referral income has comma separated values. If it is comma separated then income must be paid based on sponsorer plan and joining member plan combination

         $query = $this->db->query("select id, (CHAR_LENGTH(ref_level1_comm) - CHAR_LENGTH(REPLACE(ref_level1_comm, ',','')) + 1) as ref1, (CHAR_LENGTH(ref_level2_comm) - CHAR_LENGTH(REPLACE(ref_level2_comm, ',','')) + 1) as ref2 from plans having ref1 >1 or ref2 >1");

         $multi_plans = $query->num_rows()>0 ? True : False;

         while(1)
         {
            $upline= $md->role=='customer' ? $this->db_model->select('sponsor', 'member', array('id' => $temp_id)) : $this->db_model->select('position', 'level_details', array('userid' => $temp_id, 'gid'=>$pd->group_id));
            if(($i <= 15 ) && (strlen($upline) > 2))
            {
              $upd = $multi_plans == True ? $this->db->query("select * from plans where id IN (select signup_package from member where id =".$upline.")")->result()[0] : $pd;
              debug_log($this->db->last_query());

              $ref_comm = "ref_level".$i."_comm";
              $comm = $upd->$ref_comm;
              $ex = explode(',', $comm);
              if(count($ex)>1){
                $comm = $ex[$md->signup_package-1];
              }

              debug_log($comm);
              if($upd->config_ref_comm=='mrp_percent'){
                debug_log($md->topup);
                debug_log($pd->joining_fee);
                debug_log($pd->ref_plan);
                
                #IF referral plan is based on Member Joining Fee then $comm must be multiplied by member topup value otherwise it should be based on upline topup value

                $temp = $upd->ref_plan == 'joining' ? $comm * $md->topup : $comm * $upd->joining_fee;   
                $comm = $temp/100;
              }

              $level_text="Level" . $i . " Referral commission from " . $md->name;

              $check_earnings = $this->db_model->sum('amount', 'earning', array('userid' => $upline, 'ref_id'=>$userid, 'pair_names'=>$level_text, 'amount'=>$comm));
              debug_log('check_earnings '.$check_earnings);

              if(($upd->pay_ref_lev == 'onlyref')&&($upline != $md->sponsor)){
                  //$count = $this->db->query("select count(*) as count from earning where userid = ".$upline." and pair_names like '%Level".$i." Referral%'")->result_array()[0]['count'];
                  //$limit_count = pow(4,$i);
                  if($check_earnings <=0){
                    $status = $this->pay_earning($upline,$userid,'Level Referral Income', $level_text, $comm, '','',$pd->id);
                  }
                  $temp_id=$upline;
                  $i=$i+1;
              }
              elseif ($upd->pay_ref_lev != 'onlyref') {
                  //$count = $this->db->query("select count(*) as count from earning where userid = ".$upline." and pair_names like '%Level".$i." Referral%'")->result_array()[0]['count'];
                  //$limit_count = pow(4,$i);
                  if($check_earnings <=0){
                    $status = $this->pay_earning($upline,$userid,'Level Referral Income', $level_text, $comm, '','',$pd->id);
                  }
                  $temp_id=$upline;
                  $i=$i+1;
              }else{
                  $temp_id=$upline;
                  $i=$i+1;
              }
            }
            else {
              break;
            }
         }
    }//function credit_level_referral_income($userid,$sponsor,$plan)

    private function credit_referal_comm_sponsor($userid,$sponsor,$plan)
    {
      debug_log("userid".$userid."sponsor".$sponsor."plan".$plan);
         $i=1;
         $username= $this->db_model->select('name', 'member', array('id' => $userid));
         $sponsor = $this->db_model->select('sponsor', 'member', array('id' => $userid));
         $pay_ref_lev = $this->db_model->select('pay_ref_lev', 'plans', array('id' => $plan));
         $temp_id = $userid;

         while(1)
         {
            $upline= $this->db_model->select('sponsor', 'member', array('id' => $temp_id));
            #debug_log("upline member".$upline);
            if(($i <= 4 ) && ($upline > 0))
            {
              $ref_comm = "ref_level". $i ."_comm"; 
            }
            else {
              break;
            }
            $comm = $this->db_model->select($ref_comm, 'plans',array( 'id' =>$plan));
            #debug_log($this->db->last_query());
            #debug_log($comm);
            $ex = explode(',', $comm);
            if(count($ex)>1){
              $upline_plan = $this->db_model->select('signup_package', 'member', array('id' => $upline));
              $comm = $ex[$upline_plan-1];              
            }
            //debug_log($comm);
            if($comm > 0)
            {
                
                if($pay_ref_lev == 'onlyref')
                {
                  #debug_log("pay only ref");
                    if((($upline==config_item('top_id')) && ($i==1)) || (($upline==config_item('top_id')) && ($sponsor==config_item('top_id'))))
                    {
                            break;
                    }
                    if($upline==config_item('top_id'))
                    {
                       
                        $level_text="Level" . $i . " Referral commission from " . $username;
                        debug_log("leveltext from if". $level_text);
                        #$status = $this->pay_earning($upline,$userid,'Level Referral Income', $level_text, $comm);
                        break;
                    }
                    /*else if($upline == $sponsor)
                    {
                        $temp_id=$upline;
                        $i=$i+1;
                    }*/
                    else 
                    {
                      #debug_log("else part executing". $i);
                        $level_text="Level" . $i . " Referral commission from " . $username;
                        #debug_log("this is level text".$level_text);
                        #$status = $this->pay_earning($upline,$userid,'Level Referral Income', $level_text, $comm);
                        $temp_id=$upline;
                        $i=$i+1;
                    }
                }
                else
                {
                    if($upline==config_item('top_id'))
                    {
                       
                        $level_text="Level" . $i . " Referral commission from " . $username;
                        #$status = $this->pay_earning($upline,$userid,'Level Referral Income', $level_text, $comm);
                        break;
                    }
                    else 
                    {
                        
                        $level_text="Level" . $i . " Referral commission from " . $username;
                        #$status = $this->pay_earning($upline,$userid,'Level Referral Income', $level_text, $comm);
                        $temp_id=$upline;
                        $i=$i+1;
                    }
                }
            }
            else
            {
                $temp_id=$upline;
                $i=$i+1;
            }
         }
    }//function credit_referal_comm_sponsor($userid,$sponsor,$plan)

    private function find_level_sponsor($sponsor, $i)
    {
        if ($i > 0) {
            $this->db->select('sponsor')->from('member')->where(array('id' => $sponsor));
            $result = $this->db->get()->row();
            if (!$result) {
                return false;
            } else {
                $i = ($i - 1);

                return $this->find_level_sponsor($result->sponsor, $i);
            }
        } else {
            return $sponsor;
        }
    }

    public function fix_income($userid, $sponsor, $amount)
    {
        $get_topup = $this->db_model->select('topup', 'member', array('id' => $userid));
        if ($get_topup > "0"):

            ###############################################################
            #
            # Direct or Referal Income First
            #
            ##############################################################
            $data = $this->db_model->select_multi('direct_income, level_income, binary_income', 'fix_income', array('1' => 1));
            if ($data->binary_income > "0") {
                $my_business = $amount * $data->binary_income / 100;
                $arr         = array('my_business' => $my_business);
                $this->db->where('id', $userid);
                $this->db->update('member', $arr);
            }
            if ($data->direct_income > "0") {
                $this->pay_earning($sponsor, $userid,'Direct Referral Commission', 'Referral Income', ($amount * $data->direct_income / 100));
            }

            ## NOW Level Income
            if (trim($data->level_income) !== "") {
                $ex = explode(',', $data->level_income);
                $i  = 0;
                foreach ($ex as $e) {
                    $e = trim($e);
                    if ($i == 0) {
                        $pay_sponsor = $sponsor;
                    } else {
                        $pay_sponsor = $this->find_level_sponsor($sponsor, $i);
                    }
                    if ($pay_sponsor > 0 && $e > 0) {
                        $this->pay_earning($pay_sponsor, $userid,'Level Purchase Commission', 'Level Income', ($amount * $e / 100));
                    }
                    $i++;
                }
            }

        endif;

        return true;

    }

    public function advt_level($userid, $ad_id, $level_income, $need_topup = true)
    {
        $get_topup = $this->db_model->select_multi('sponsor,topup', 'member', array('id' => $userid));
        $sponsor   = $get_topup->sponsor;
        $get_topup = $get_topup->topup;
        if ($get_topup > "0.00" or $need_topup !== true):

            ###############################################################
            #
            # Direct or Referal Income For Ads. Also check whether
            # he/she has received ad income before for this ad
            #
            ##############################################################
            $data = $this->db_model->count_all('ad_user', array(
                'ad_id'  => $ad_id,
                'userid' => $userid,
            ));
            if ($data <= 0) {
                ## NOW Level Income
                $ex = explode(',', $level_income);
                $i  = 0;
                foreach ($ex as $e) {
                    $e = trim($e);
                    if ($i == 0) {
                        $pay_sponsor = $this->session->user_id;
                    } else {
                        $pay_sponsor = $this->find_level_sponsor($sponsor, $i);
                    }
                    if ($pay_sponsor > 0 && $e > 0) {
                        $this->pay_earning($pay_sponsor, $userid,'Advt Commission', 'Advt Income', $e);
                    }
                    $i++;
                }

                $array = array(
                    'ad_id'  => $ad_id,
                    'userid' => $userid,
                    'date'   => time(),
                );
                $this->db->insert('ad_user', $array);
            }

        endif;

        return true;

    }

    public function survey_level($userid, $survey_id, $level_income, $data_arr = "", $need_topup = true)
    {
        $get_topup = $this->db_model->select_multi('sponsor,topup', 'member', array('id' => $userid));
        $sponsor   = $get_topup->sponsor;
        $get_topup = $get_topup->topup;
        if ($get_topup > "0.00" or $need_topup !== true):

            ###############################################################
            #
            # Direct or Referal Income For Completed Surveys. Also check whether
            # he/she has received ad income before for this ad
            #
            ##############################################################
            $data = $this->db_model->count_all('survey_user', array(
                'survey_id' => $survey_id,
                'userid'    => $userid,
            ));
            if ($data <= 0) {
                ## NOW Level Income
                $ex = explode(',', $level_income);
                $i  = 0;
                foreach ($ex as $e) {
                    $e = trim($e);
                    if ($i == 0) {
                        $pay_sponsor = $this->session->user_id;
                    } else {
                        $pay_sponsor = $this->find_level_sponsor($sponsor, $i);
                    }
                    if ($pay_sponsor > 0 && $e > 0) {
                        $this->pay_earning($pay_sponsor, $userid,'Survey Commission', 'Survey Income', $e);
                    }
                    $i++;
                }

                $array = array(
                    'survey_id' => $survey_id,
                    'userid'    => $userid,
                    'date'      => time(),
                    'data'      => $data_arr,
                );
                $this->db->insert('survey_user', $array);
            }

        endif;

        return true;

    }

    public function reward_process()
    {
        $reward = $this->db->get('reward_setting')->result();
        foreach ($reward as $res) {
            $duration = $res->reward_duration > 0 ? date('Y-m-d', strtotime('-'.$res->reward_duration.' days')) : date('Y-m-d', '-20 Years');

            $td_join = $res->total_downline > 0 ? 'INNER' : 'LEFT'; 
            $tlc_join = $res->total_member_level > 0 ? 'INNER' : 'LEFT';
            $dc_join = $res->direct > 0 ? 'INNER' : 'LEFT';

            if ($res->based_on == "Member"):
                $this->db->select("t1.id as id, IFNULL(t4.dc,0) as total_direct_count,IFNULL(t5.cnt,0) as count,SUBSTR(t2.level".$res->level_no.",2) as level_ids")
                    ->from('member as t1')
                    ->where(array('total_a_active >=' => $res->A,'total_b_active >=' => $res->B,
                                   'activate_time >=' => $duration,'topup >' => '0',
                                   'topup >='=>'0', 'role !=' => 'customer',))
                    ->join("(select userid,pid,e_status, level".$res->level_no." from level_details where total_active >= ".$res->total_downline.") as t2","t1.id = t2.userid","$td_join")
                    ->join("(SELECT userid,pid,e_status, (length(level".$res->level_no.") - length(replace(level".$res->level_no.", ',', '')) + 1)-2 as count from level_details having count >=".$res->total_member_level.") as t3", 't1.id = t3.userid', "$tlc_join")
                    ->join("(select sponsor, count(*) as dc from member where status = 'Active' group by 1 having dc >= ".$res->direct.") as t4","t1.id = t4.sponsor","$dc_join")
                    ->join("(select userid, count(*) as cnt from rewards where reward_id =".$res->id." group by 1) as t5", "t1.id = t5.userid","LEFT")
                    ->having(array('count <='=>0))
                    ->group_by('1,2,3');
            else:
              $this->db->select("t1.id as id,IFNULL(t3.cnt,0) as count, IFNULL(t4.dc,0) as total_direct_count, sum(mypv+downline_pv) as pv")->from('member as t1')
                  ->where(array('mypv >='      => $res->mypv,'downline_pv >=' => $res->total_downline,  
                            'total_a_pv >=' => $res->A,'total_b_pv >=' => $res->B,
                            'activate_time >=' => $duration,
                            'topup >='       => '0','role !=' => 'customer'))
                  ->join("(select userid,pid from level_details where total_active >= ".$res->total_downline.") as t2","t1.id = t2.userid","$td_join")
                  ->join("(select sponsor, count(*) as dc from member where status = 'Active' group by 1 having dc >= ".$res->direct.") as t4","t1.id = t4.sponsor","$dc_join")
                  ->join("(select userid, count(*) as cnt from rewards where reward_id =".$res->id." group by 1) as t3", "t1.id = t3.userid","LEFT")
                  ->group_by('1,2,3')->having(array('count <='=>0, 'pv >='=>$res->total_downline));
          endif;
          if ($res->based_on == "Member") {
          $res->plan_id >0 ? $this->db->where(array('t2.e_status' => '1' ,'t2.pid' => $res->plan_id)): '';
          $res->plan_id >0 ? $this->db->where(array('t3.e_status' => '1' ,'t3.pid' => $res->plan_id)): '';
          }
          else
          {
            $res->plan_id >0 ? $this->db->where(array('t2.pid' => $res->plan_id)): '';
          }
          $data = $this->db->get()->result();
          debug_log($this->db->last_query());
          debug_log($data);
          foreach ($data as $result) {
            debug_log($result->id);

            $condition_flag = True ;
            if(config_item('level_by_count')=='Yes'){
                  $level_ids = rtrim($result->level_ids,',');
                  if(strlen($level_ids)>0){
                          $level_active_count = $this->db->query("
                       SELECT count(*) as active FROM level_details
                       WHERE secret IN (" .$level_ids .") and e_status = 1 and pid = '".$res->plan_id."'")->result_array()[0]['active'];
                          debug_log($this->db->last_query());
                  }else{
                    $level_active_count = 0;
                  }
                  $condition_flag = $level_active_count >= $res->total_member_level ? $condition_flag : False;
            }
            debug_log('condition_flag '.$condition_flag);
            
            if($condition_flag){
              $array = array(
                    'reward_id' => $res->id,
                    'userid'    => $result->id,
                    'date'      => date('Y-m-d H:i:s'),
                );
              $this->db->insert('rewards', $array);
            }
        }
      }
    }

    public function rank_process()
    {
      $this->db->order_by('id', 'ASC');
      $rank = $this->db->get('rank_system')->result();
      foreach ($rank as $res) {
        $duration = $res->rank_duration > 0 ? date('Y-m-d', strtotime('-'.$res->rank_duration.' days')) : date('Y-m-d', '-20 Years');

        $td_join = $res->total_downline > 0 ? 'INNER' : 'LEFT'; 
        $tlc_join = $res->total_member_level > 0 ? 'INNER' : 'LEFT';
        $dc_join = $res->direct > 0 ? 'INNER' : 'LEFT';

        if ($res->based_on == "Member"):
             $this->db->select("t1.id as id, t1.rank, IFNULL(t4.dc,0) as total_direct_count,IFNULL(t5.id,0) as current_rank , t1.last_upgrade , t1.gift_level,SUBSTR(t2.level".$res->level_no.",2) as level_ids")
                ->from('member as t1')
                ->where(array('total_a_active >=' => $res->A,'total_b_active >=' => $res->B,
                               'activate_time >=' => $duration,'topup >=' => '0',
                               'rank !=' => $res->rank_name,'role !=' => 'customer',))
                ->join("(select userid,pid,last_upgrade,gift_level,e_status,level".$res->level_no." from level_details where total_active >= ".$res->total_downline.") as t2","t1.id = t2.userid","$td_join")
                ->join("(SELECT userid,pid, e_status, (length(level".$res->level_no.") - length(replace(level".$res->level_no.", ',', '')) + 1)-2 as count from level_details having count >=".$res->total_member_level.") as t3", 't1.id = t3.userid', "$tlc_join")
                ->join("(select sponsor, count(*) as dc from member where status = 'Active' group by 1 having dc >= ".$res->direct.") as t4","t1.id = t4.sponsor","$dc_join")
                ->join('(select id, rank_name from rank_system) as t5', 't1.rank = t5.rank_name', 'LEFT')
                ->having(array('current_rank <'=>$res->id))
                ->group_by('id');
        else:
            $this->db->select('t1.id as id, IFNULL(t3.id,0) as current_rank, sum(mypv+downline_pv) as pv')->from('member as t1')
              ->where(array('mypv >='     => $res->mypv,'total_a_pv >=' => $res->A,
                           'total_b_pv >=' => $res->B,
                           'activate_time >=' => $duration, 'topup >=' => '0',
                           'rank !=' => $res->rank_name,'role !=' => 'customer',
                       ))
              ->join("(select userid,pid from level_details) as t2","t1.id = t2.userid","INNER")
              ->join('(select id, rank_name from rank_system) as t3', 't1.rank = t3.rank_name','LEFT')
              ->group_by('1,2')->having(array('pv >='=>$res->total_downline, 'current_rank <'=>$res->id));
        endif;
        if ($res->based_on == "Member") {
          $res->plan_id >0 ? $this->db->where(array('t2.e_status' => '1' ,'t2.pid' => $res->plan_id)): '';
          $res->plan_id >0 ? $this->db->where(array('t3.e_status' => '1' ,'t3.pid' => $res->plan_id)): '';
        }
        else
        {
          $res->plan_id >0 ? $this->db->where(array('t2.pid' => $res->plan_id)): '';
        }
        
        $data = $this->db->get()->result();
        debug_log($this->db->last_query());
        debug_log($data);
        foreach ($data as $result){
          $userid = $result->id;
          $user_upgrade = $result->last_upgrade;
          $user_gift_level = $result->gift_level;

          $condition_flag = True;

          if(strlen($res->downline_rank)>0){
            $key_value = explode(',', $res->downline_rank);
                #debug_log($key_value);
                foreach ($key_value as $key => $value) {
                    $rank_count = explode(':', $value);
                    #debug_log($rank_count);
                    $rank_name = $this->db_model->select('rank_name', 'rank_system', array('id' => $rank_count[0]));
                    $total_rank_count = 0;

                    $this->db->select('CONCAT_WS("",SUBSTR(level1,2),SUBSTR(level2,2),SUBSTR(level3,2),SUBSTR(level4,2),SUBSTR(level5,2),SUBSTR(level6,2),SUBSTR(level7,2),SUBSTR(level8,2),SUBSTR(level9,2),SUBSTR(level10 ,2),SUBSTR(level11,2),SUBSTR(level12,2),SUBSTR(level13,2),SUBSTR(level14,2),SUBSTR(level15,2),SUBSTR(level16,2),SUBSTR(level17,2),SUBSTR(level18,2),SUBSTR(level19,2),SUBSTR(level20,2)) as ids')->where('userid',$userid);
                    $level_ids=$this->db->get('level_details')->result_array()[0]['ids'];

                    $level_ids = rtrim($level_ids,',');

                    if(strlen($level_ids)>0){
                        $total_rank_count = $this->db->query("
                     SELECT count(*) as active FROM member 
                     WHERE secret IN (" .$level_ids .") and status = 'Active' and rank = '".$rank_name."'")->result_array()[0]['active'];
                    }
                    //debug_log($this->db->last_query());

                    $condition_flag = !($total_rank_count>=$rank_count[1]) ? False : $condition_flag;

                    //debug_log('Rank ID '.$rank_count[0].' Rank Name '.$rank_name.' Total Rank Count '.$total_rank_count.' Required Count '.$rank_count[1]);
                }
          }

           if ((config_item('cycle_level')!='')||(config_item('unlimited_cycle_level')!='')) {

              debug_log('$user_gift_level');
              debug_log($user_gift_level);
              if ($user_gift_level>=2) { 
                $cycle_rank_count=$this->db->query(
                     "select count(*) as active from member where status = 'Active' and sponsor = ".$userid." and last_upgrade > ".$user_upgrade)->result_array()[0]['active'];
                debug_log($this->db->last_query());
                debug_log($cycle_rank_count);

                  if ($cycle_rank_count>=$res->direct) {
                  $condition_flag = True;
                  }
                  else  $condition_flag = False;

                  $downline_ids = rtrim($this->db->query("select SUBSTR(level".$res->level_no.",2) as ids from level_details where userid =".$userid." and pid =".$res->plan_id)->result_array()[0]['ids'],',');
                  debug_log($this->db->last_query()); 

                  if ($downline_ids!='') { 
                    $total = $this->db->query("
                    SELECT count(*) as total FROM member
                    WHERE secret IN (" .$downline_ids.")   and  last_upgrade > ".$user_upgrade." and gift_level = ".$user_gift_level)->result_array()[0]['total'];
                    debug_log($this->db->last_query());
                    debug_log($total);
                    $condition_flag = $total >= $res->total_member_level ? $condition_flag : False; 
                  }  
              }
            }

                if ($userid==config_item('top_id')) {
                  $condition_flag = True;
                }

          if ((config_item('cycle_level')=='')&&(config_item('unlimited_cycle_level')=='')) {

            if(config_item('level_by_count')=='Yes'){
              $level_ids = rtrim($result->level_ids,',');

              if(strlen($level_ids)>0){
                      $level_active_count = $this->db->query("
                   SELECT count(*) as active FROM level_details
                   WHERE secret IN (" .$level_ids .") and e_status = 1 and pid = '".$res->plan_id."'")->result_array()[0]['active'];
              }else{
                $level_active_count = 0;
              } 

              $condition_flag = $level_active_count >= $res->total_member ? $condition_flag : False;
            }

            if($condition_flag) {    
            $array = array(
                'rank' => $res->rank_name,
                ' rank_upgrade' => time(),
            );
            $this->db->where('id', $result->id);
            $this->db->update('member', $array);
            }

          }
          else{
            if($condition_flag) {    
            if ($user_gift_level>=2) {
             $array = array(
                'rank' => $res->rank_name,
                ' rank_upgrade' => time(),
                ' last_upgrade' => time(),
            );
            $this->db->where('id', $result->id);
            $this->db->update('member', $array);
            debug_log($this->db->last_query());
            }
            else{
             $array = array(
                 'rank' => $res->rank_name,
                 ' rank_upgrade' => time(),
             );
             $this->db->where('id', $result->id);
             $this->db->update('member', $array);
            debug_log($this->db->last_query()); }
            }
          }

        }
      }
    }

    public function target_reach_income()
    {
        //debug_log('inside flexi income');
        $reward = $this->db->get('flexible_income')->result();
        foreach ($reward as $res){
           $duration = $res->income_duration > 0 ? date('Y-m-d', strtotime('-'.$res->income_duration.' days')) : date('Y-m-d', '-20 Years');
          if ($res->based_on == "Member"):
              $this->db->select("t1.id as id, t1.name, IFNULL(t4.tc,0) as count")->from('member as t1')
                ->where(array('total_active >=' => $res->downline,
                               'total_a_active >=' => $res->A,'total_b_active >=' => $res->B,
                               'activate_time >= '=>$duration,
                               'topup >='    => '0','role !=' => 'customer',
                             ))
                ->join("(select userid, count(*) as tc from earning where secret = ".$res->id." and type = '".$res->income_name."' group by 1) as t4","t1.id = t4.userid","LEFT")
                ->having(array('count <='=>0));
          else:
              $this->db->select("t1.id as id, t1.name, IFNULL(t4.tc,0) as count,sum(mypv+downline_pv) as pv")
                ->from('member as t1')
                ->where(array('mypv >=' => $res->mypv, 'total_a_pv >=' => $res->A,
                               'total_b_pv >=' => $res->B,
                               'activate_time >=' => $duration, 'topup >=' => '0',
                               'role !=' => 'customer',
                             ))
                ->join("(select userid, count(*) as tc from earning where secret = ".$res->id." and type = '".$res->income_name."' group by 1) as t4","t1.id = t4.userid","LEFT")
                ->group_by('id')->having(array('count <='=>0,'pv >='=>$res->downline));

          endif;
          $data = $this->db->get()->result();
          debug_log($this->db->last_query());
          foreach ($data as $result) {
            //debug_log($result->id);
              if($res->direct_commission > 0){
                $amt = $res->direct_commission;
              $this->pay_earning($result->id, '', $res->income_name, 'Downline Target Reach Commission', $res->direct_commission, '', $res->id);
              }

              if($res->binary_matching > 0){
                $amt = $res->binary_matching;
              $this->pay_earning($result->id, '', $res->income_name, 'Target Reach Binary Matching Commission', $res->binary_matching, '', $res->id);
              }

              if($res->amount > 0){
                $amt = $res->amount;
               $this->pay_earning($result->id, '', $res->income_name, 'Self Target Reach Commission', $res->amount, '', $res->id);
              }

              $temp_id = $result->id;

              $i=1;
              while($i<16){
                if($temp_id ==config_item('top_id')){
                  break;
                }
                else{
                  $upline= $this->db_model->select('position', 'member', array('id' => $temp_id));
                  $product_comm = "product_pur_level".$i."_comm";
                  $comm = $this->db_model->select($product_comm , 'flexible_income', array( 'id' =>$res->id));
                  // debug_log($comm);
                  // debug_log($amt);
                  $comm = $res->config_comm == 'percent' ? ($amt/100)*$comm : $comm*1 ;
                  $comm = $comm ? $comm : 0;
                  debug_log('target_reach_income '.$comm);
                  if($comm > 0){
                    if($upline==config_item('top_id')){
                      $level_text="Target Reach Level-". $i . " Income from " . $result->name;
                      $status = $this->pay_earning($upline,$result->id,$res->income_name, $level_text, $comm);
                      break;
                    }
                    else{
                        $level_text="Target Reach Level-". $i . " Income from " . $result->name;
                        $status = $this->pay_earning($upline,$result->id,$res->income_name, $level_text, $comm);
                        $temp_id=$upline;
                        $i=$i+1;
                    }
                  }
                  else{
                    $i=$i+1;
                  }
                }
              }
          }
        }
    }

    public function level_completion_income_vstoreapp($plan_id='')
    {
      if (in_array(date("l"), array("Saturday")))
      {
       if(config_item('width') != '1'){
        $plan_id > 0 ? $this->db->where(array('plan_id'=>$plan_id)) : ''; 
        $level_income = $this->db->get('level_wise_income')->result();
        foreach ($level_income as $res) {
           $duration = $res->income_duration > 0 ? date('Y-m-d', strtotime('-'.$res->income_duration.' days')) : date('Y-m-d', '-20 Years');          

            $total_mem = $this->db_model->sum('total_member', 'level_wise_income', array('level_no <=' => $res->level_no, 'plan_id'=>$res->plan_id));
            $level_total_direct_count = $this->db_model->sum('direct', 'level_wise_income', array('level_no <=' => $res->level_no, 'plan_id'=>$res->plan_id));

            $join_condition = $level_total_direct_count > 0 ? 'INNER' : 'LEFT';

            $this->db->select("t1.secret, t1.id, t1.name, t1.last_upgrade, t1.gift_level, t1.phone, IFNULL(t3.am,0) as amount, IFNULL(t4.dc,0) as total_direct_count")
                ->from('member as t1')
                ->where(array('join_time >= ' => $duration,'signup_package'=>$res->plan_id,'gift_level <' => $res->level_no,'gift_level >=' => $res->level_no-1,'total_active >=' => $total_mem,))
                ->join("(select sponsor, count(*) as dc from member where status = 'Active' group by 1 having dc >= ".$level_total_direct_count.") as t4","t1.id = t4.sponsor","$join_condition")
                ->join("(select userid, sum(amount) as am from earning where secret =".$res->id." and type='".$res->income_name."' group by 1 ) as t3", "t1.id = t3.userid", "LEFT")
                ->having(array('amount <='=>0));
            $data = $this->db->get()->result();
            debug_log($this->db->last_query());
            debug_log($data);

            foreach ($data as $result) {
                $userid = $result->id;
                $secret = $result->secret;
                $username = $result->name;
                $phone = $result->phone;
                $total_direct_count = $result->total_direct_count;

                $condition_flag = False;
                if(config_item('level_income_sponsor_carry')=='Yes'){
                  if($total_direct_count >= $level_total_direct_count){
                    $condition_flag = True;
                  }
                }else{
                  $level_direct_count=0;
                  if($res->direct > 0){
                     $level_direct_count = $this->db_model->count_all('member', array('sponsor' => $userid,'status'=>'Active','activate_time >' => date('Y-m-d H:i:s',$result->last_upgrade)));
                   }
                  if(($level_direct_count >= $res->direct) && ($total_direct_count >= $level_total_direct_count)){
                    $condition_flag = True; 
                  }
                }

                debug_log('Level Wise Income Details '.$userid . ' , ' . $res->id . ' , ' . $res->income_name . ' , ' . $res->direct . ' , ' . $level_direct_count . ' , ' . $total_direct_count . ' , ' . $level_total_direct_count);

                if($condition_flag){

                  $check_earnings = $this->db_model->sum('amount', 'earning', array('userid' => $userid, 'secret'=>$res->id, 'type'=>$res->income_name));

                  debug_log('check_earnings '.$check_earnings);

                  if($check_earnings <=0){

                    if($res->amount > 0) 
                    {
                      $last_due_date = date('Y-m-d', time() - (86400 * $recurring_duration));
                      $date=date('Y-m-d', strtotime('-7 days'));
                      $total_purchase=$this->db_model->sum('total_cost', 'product_sale', array('userid' => $userid, 'status' => 'Completed','date >=' => $date ));
                        debug_log("this is the total purchase made".$total_purchase);
                      //$this->pay_earning($userid, '', $res->income_name, 'Level ' . $res->level_no . ' Completion Income', $res->amount, '', $res->id);
                      $this->pay_earning($userid, '', $res->income_name, 'Level ' . $res->level_no . ' Completion Income', $res->amount, '', $res->id);
                    }
                  
                    if(($res->upgrade > 0)&&($res->auto_upgrade == 'Yes')){

                      $this->pay_earning('admin', $userid, 'Level Upgrade Fee', 'Level ' . $res->level_no . ' Upgrade Fee From - '.$username, $res->upgrade, '', $res->id);

                      $this->add_deduction($userid,'admin',$res->upgrade,'Level ' . $res->level_no . ' Upgrade Fee','Level ' . $res->level_no . ' Upgrade Fee',$res->id,'account_transfer','account_transfer');

                      $get_user_balance = $this->db_model->select('balance', 'wallet', array('userid' => $userid));
                      wallet_log('$get_user_balance ' . $get_user_balance);
                      $arra = array('balance' => ($get_user_balance - $res->upgrade),);
                      $this->db->where('userid', $userid);
                      $this->db->update('wallet', $arra);
                      wallet_log($this->db->last_query());
                   }   

                   if($result->gift_level < $res->level_no) {
                      $arr = array(
                      'gift_level' => $res->level_no,
                      'last_upgrade' => time(),
                      );
                      $this->db->where('id', $userid);
                      $this->db->update('member', $arr);
                      debug_log($this->db->last_query());

                      if (config_item('sms_on_join') == "Yes"){
                          $sms = "Hello ".$username.", Congratulations!!!\nYour ID ".$userid." Has Successfully Completed Level ".$res->level_no."\nRegards:\n".config_item('company_name');
                          $messvar="Ok";
                          $phone="91".$phone;
                          $status = $this->common_model->sms($phone, urlencode($sms));
                          debug_log($status);
                      }
                    }
                    
                    debug_log('$res->new_id '.$res->new_id. ' $userid '.$userid.' $res->plan_new_id '.$res->plan_new_id.' $res->auto_upgrade '.$res->auto_upgrade);                
                    if(($res->new_id == 'Yes') && ($userid != config_item('top_id')) && ($res->plan_new_id > 0) && ($res->auto_upgrade == 'Yes')) {
                      $this->session->set_userdata('_id_upgrade_', 'Yes');
                      $this->registration_model->register_new($userid, $res->plan_new_id);
                    }

                  }
                }
            }
        }
       }
      }
    }

    /*vstore app royalty income and level income */
    public function royalty_income_vstoreapp()
    {
      if (in_array(date("l"), array("Saturday")))
      {
        $this->db->select('*')->from('member')->where(array('status' =>"Active"))->order_by('id', 'ASC');
        $users = $this->db->get()->result();
        //debug_log($this->db->last_query());
        debug_log("list of users from royalty_income function");
        //debug_log($users);
        $total_purchase = 0;
        foreach($users as $user)
        {
            $this->db->select('*')->from('member')->where(array('status' =>"Active",'sponsor'=>$user->id))->order_by('id', 'ASC');
            $referred_user = $this->db->get()->result();
            debug_log($this->db->last_query());
            debug_log("list of referred users");
            debug_log($referred_user);
            $self_purchase=$this->db_model->sum('total_cost', 'product_sale', array('status' =>'Completed','userid'=>$user->id));
            
            foreach($referred_user as $ruser)
            {
              //$total_purchase=$this->db_model->sum('total_cost', 'product_sale', array('userid' => $ruser->id, 'status' => 'Completed'));
              $lastdate=date('Y-m-d', strtotime('-7 days'));
              //$todaydate=date("Y-m-d");
              $product_purchase=$this->db_model->sum('total_cost', 'product_sale', array('status' =>'Completed','userid'=>$ruser->id,'date >='=>$lastdate));
              debug_log($this->db->last_query());
              
              $total_purchase = $total_purchase + $product_purchase;
              debug_log("product purchase");
              debug_log($product_purchase);
              if($product_purchase>=1500)
              {
                debug_log("total purchase is greater than 1500".$product_purchase);
                if($self_purchase>=250)
                {
                 $credit_royalty_income = (10/100)*($product_purchase) ;
                 debug_log("credit royalty income".$credit_royalty_income);
                 //$this->pay_earning($userid, '', $res->income_name, 'Level ' . $res->level_no . ' Completion Income', $res->amount, '', $res->id);
                 $this->pay_earning($user->id, '', 'Royalty_income', 'Royalty Income',$credit_royalty_income, '', $ruser->id);
                 //break;
                }
              }

            }
        }
      }
    }

    public function level_completion_income($plan_id='')
    {
      if((config_item('width') != '1')&&(config_item('enable_board') != 'Yes')){
        $plan_id > 0 ? $this->db->where(array('plan_id'=>$plan_id)) : ''; 
        $level_income = $this->db->get('level_wise_income')->result();
        foreach ($level_income as $res) {
           $duration = $res->income_duration > 0 ? date('Y-m-d', strtotime('-'.$res->income_duration.' days')) : date('Y-m-d', '-20 Years');          

            $total_mem = $this->db_model->sum('total_member', 'level_wise_income', array('level_no <=' => $res->level_no, 'plan_id'=>$res->plan_id));
            $level_total_direct_count = $this->db_model->sum('direct', 'level_wise_income', array('level_no <=' => $res->level_no, 'plan_id'=>$res->plan_id));

            $join_condition = $level_total_direct_count > 0 ? 'INNER' : 'LEFT';

            $this->db->select("t1.secret, t1.id, t1.name, t1.phone, t2.last_upgrade, t2.gift_level,SUBSTR(t2.level".$res->level_no.",2) as level_ids, IFNULL(t3.am,0) as amount, IFNULL(t4.dc,0) as total_direct_count")
                ->from('member as t1')->where(array('join_time >='=>$duration,))
                ->join("(select userid,last_upgrade,gift_level,level".$res->level_no." from level_details where pid = ".$res->plan_id." and total_active >= $total_mem and gift_level < ".$res->level_no." and gift_level >= ".($res->level_no-1).") as t2","t1.id = t2.userid","INNER")
                ->join("(select sponsor, count(*) as dc from member where status = 'Active' group by 1 having dc >= ".$level_total_direct_count.") as t4","t1.id = t4.sponsor","$join_condition")
                ->join("(select userid, sum(amount) as am from earning where secret =".$res->id." and type='".$res->income_name."' group by 1 ) as t3", "t1.id = t3.userid", "LEFT")
                ->having(array('amount <='=>0))
                ->group_by('1,2,3,4,5,6,7,8');
            $data = $this->db->get()->result();

            #->join("(select userid from level where pid = ".$res->plan_id." and level".$res->level_no.">=".$res->total_member.") as t5","t1.id = t5.userid","INNER")

            debug_log($this->db->last_query());
            debug_log($data);

            foreach ($data as $result) {
                $userid = $result->id;
                $secret = $result->secret;
                $username = $result->name;
                $phone = $result->phone;
                $total_direct_count = $result->total_direct_count;

                $condition_flag = False;
                if(config_item('level_income_sponsor_carry')=='Yes'){
                  if($total_direct_count >= $level_total_direct_count){
                    $condition_flag = True;
                  }
                }else{
                  $level_direct_count=0;
                  if($res->direct > 0){
                     $level_direct_count = $this->db_model->count_all('member', array('sponsor' => $userid,'status'=>'Active','activate_time >' => date('Y-m-d H:i:s',$result->last_upgrade)));
                   }
                  if(($level_direct_count >= $res->direct) && ($total_direct_count >= $level_total_direct_count)){
                    $condition_flag = True; 
                  }
                }

                if(config_item('level_by_count')=='Yes'){
                  $level_ids = rtrim($result->level_ids,',');

                  if(strlen($level_ids)>0){
                          $level_active_count = $this->db->query("
                       SELECT count(*) as active FROM level_details
                       WHERE secret IN (" .$level_ids .") and e_status = 1 and pid = '".$res->plan_id."'")->result_array()[0]['active'];
                  }else{
                    $level_active_count = 0;
                  } 

                  $condition_flag = $level_active_count >= $res->total_member ? $condition_flag : False;
                }

                debug_log('Level Wise Income Details '.$userid . ' , ' . $res->id . ' , ' . $res->income_name . ' , ' . $res->direct . ' , ' . $level_direct_count . ' , ' . $total_direct_count . ' , ' . $level_total_direct_count.' '.$level_active_count);

                if($condition_flag){

                  $check_earnings = $this->db_model->sum('amount', 'earning', array('userid' => $userid, 'secret'=>$res->id, 'type'=>$res->income_name));

                  debug_log('check_earnings '.$check_earnings);

                  if($check_earnings <=0){

                    if($res->amount > 0) {
                      $this->pay_earning($userid, '', $res->income_name, 'Level ' . $res->level_no . ' Completion Income', $res->amount, '', $res->id);
                    }
                  
                    if(($res->upgrade > 0)&&($res->auto_upgrade == 'Yes')){

                      $this->pay_earning('admin', $userid, 'Level Upgrade Fee', 'Level ' . $res->level_no . ' Upgrade Fee From - '.$username, $res->upgrade, '', $res->id);

                      $this->add_deduction($userid,'admin',$res->upgrade,'Level ' . $res->level_no . ' Upgrade Fee','Level ' . $res->level_no . ' Upgrade Fee',$res->id,'account_transfer','account_transfer');

                      $get_user_balance = $this->db_model->select('balance', 'wallet', array('userid' => $userid));
                      wallet_log('$get_user_balance ' . $get_user_balance);
                      $arra = array('balance' => ($get_user_balance - $res->upgrade),);
                      $this->db->where('userid', $userid);
                      $this->db->update('wallet', $arra);
                      wallet_log($this->db->last_query());
                   }   

                   if($result->gift_level < $res->level_no) {
                      $arr = array(
                      'gift_level' => $res->level_no,
                      'last_upgrade' => time(),
                      );
                      $this->db->where('id', $userid);
                      $this->db->update('member', $arr);
                      debug_log($this->db->last_query());

                      $arr = array(
                      'gift_level' => $res->level_no,
                      'last_upgrade' => time(),
                      );
                      $this->db->where(array('userid'=>$userid, 'pid'=>$res->plan_id));
                      $this->db->update('level_details', $arr);

                      debug_log($this->db->last_query());

                      if (config_item('sms_on_join') == "Yes"){
                          $sms = "Hello ".$username.", Congratulations!!!\nYour ID ".$userid." Has Successfully Completed Level ".$res->level_no."\nRegards:\n".config_item('company_name');
                          $messvar="Ok";
                          $phone="91".$phone;
                          $status = $this->common_model->sms($phone, urlencode($sms));
                          debug_log($status);
                      }
                    }
                    
                    debug_log('$res->new_id '.$res->new_id. ' $userid '.$userid.' $res->plan_new_id '.$res->plan_new_id.' $res->auto_upgrade '.$res->auto_upgrade);

                    if(($res->new_id == 'Yes') && ($userid != config_item('top_id')) && ($res->plan_new_id > 0) && ($res->auto_upgrade == 'Yes')) {
                      $this->session->set_userdata('_id_upgrade_', 'Yes');
                      if(config_item('same_tree')=='Yes'){                      
                        $md = $this->db_model->select_multi('*','member',array('id'=>$userid));
                        $pd = $this->db_model->select_multi('*','plans',array('id'=>$res->plan_new_id));
                        $data = array(
                          'status'=>'Active', 
                          'activate_time'=>date('Y-m-d H:i:s'),
                          'signup_package'=>$res->plan_new_id,
                        );
                        $this->db->where('secret', $md->secret);
                        $this->db->update('member', $data);
                        debug_log($this->db->last_query()); 

                        $e_status = 1;
                        $update_status = "UPDATE level_details SET e_status = ".$e_status." WHERE userid = ".$md->id." and pid  = ".$res->plan_new_id." ";
                        $this->db->query($update_status);
                        debug_log($this->db->last_query());  

                        $update_status = "UPDATE earning SET status = 'Pending' WHERE userid = ".$md->id." and pid  = ".$res->plan_new_id." and status = 'Hold'";
                        $this->db->query($update_status);
                        debug_log($this->db->last_query());

                        $this->credit_joining_commission($pd,$md);  
                        
                      }else{
                        $this->registration_model->upgrade_member($userid, $res->plan_new_id, 'Auto');
                      }
                    }

                  }
                }
            }
        }
      }
    }

    public function board_completion_income($plan_id='')
    {
      if(config_item('enable_board') == 'Yes'){
        $plan_id > 0 ? $this->db->where(array('plan_id'=>$plan_id)) : ''; 
        $level_income = $this->db->get('level_wise_income')->result();
        foreach ($level_income as $res) {
           $duration = $res->income_duration > 0 ? date('Y-m-d', strtotime('-'.$res->income_duration.' days')) : date('Y-m-d', '-20 Years');          

            $total_mem = $this->db_model->sum('total_member', 'level_wise_income', array('level_no <=' => $res->level_no, 'plan_id'=>$res->plan_id));
            $level_total_direct_count = $this->db_model->sum('direct', 'level_wise_income', array('level_no <=' => $res->level_no, 'plan_id'=>$res->plan_id));

            $join_condition = $level_total_direct_count > 0 ? 'INNER' : 'LEFT';

            $this->db->select("t1.secret, t1.id, t1.name, t1.phone, t2.last_upgrade, t2.gift_level, IFNULL(t3.am,0) as amount, IFNULL(t4.dc,0) as total_direct_count")
                ->from('member as t1')->where(array('join_time >='=>$duration,))
                ->join("(select userid,last_upgrade,gift_level from level_details where pid = ".$res->plan_id." and total_active >= $total_mem and gift_level < ".$res->level_no.") as t2","t1.id = t2.userid","INNER")
                ->join("(select sponsor, count(*) as dc from member where status = 'Active' group by 1 having dc >= ".$level_total_direct_count.") as t4","t1.id = t4.sponsor","$join_condition")
                ->join("(select userid, sum(amount) as am from earning where secret =".$res->id." and type='".$res->income_name."' group by 1 ) as t3", "t1.id = t3.userid", "LEFT")
                ->having(array('amount <='=>0));
            $data = $this->db->get()->result();

            debug_log($this->db->last_query());
            debug_log($data);

            foreach ($data as $result) {
                $userid = $result->id;
                $secret = $result->secret;
                $username = $result->name;
                $phone = $result->phone;
                $total_direct_count = $result->total_direct_count;

                $condition_flag = False;
                if(config_item('level_income_sponsor_carry')=='Yes'){
                  if($total_direct_count >= $level_total_direct_count){
                    $condition_flag = True;
                  }
                }else{
                  $level_direct_count=0;
                  if($res->direct > 0){
                     $level_direct_count = $this->db_model->count_all('member', array('sponsor' => $userid,'status'=>'Active','activate_time >' => date('Y-m-d H:i:s',$result->last_upgrade)));
                   }
                  if(($level_direct_count >= $res->direct) && ($total_direct_count >= $level_total_direct_count)){
                    $condition_flag = True; 
                  }
                }

                $downline_ids = rtrim($this->db->query("select SUBSTR(level".$res->level_no.",2) as ids from level_details where userid =".$userid." and pid =".$res->plan_id)->result_array()[0]['ids'],',');
                debug_log($this->db->last_query());

                #In case of Board, user must achieve specific number of users at a specific level. Below code is checking count of users at a specific level

                $condition_flag = count(explode(',', $downline_ids)) >= $res->total_member ? $condition_flag : False;

                debug_log('Board Completion Details '.$userid . ' , ' . $res->id . ' , ' . $res->income_name . ' , ' . $res->direct . ' , ' . $level_direct_count . ' , ' . $total_direct_count . ' , ' . $level_total_direct_count);

                debug_log("count(explode(',', $downline_ids)) ".count(explode(',', $downline_ids)));
                debug_log('$res->total_member '.$res->total_member);
                debug_log('$condition_flag '.$condition_flag);

                if($condition_flag)
                {
                  $check_earnings = $this->db_model->sum('amount', 'earning', array('userid' => $userid, 'secret'=>$res->id, 'type'=>$res->income_name));

                  debug_log('check_earnings '.$check_earnings);

                  if($check_earnings <=0){

                    if($res->amount > 0) {
                      $this->pay_earning($userid, '', $res->income_name, 'Board Completion Income', $res->amount, '', $res->id);
                    }
                  
                    if(($res->upgrade > 0)&&($res->auto_upgrade == 'Yes')){

                      $this->pay_earning('admin', $userid, 'Board Upgrade Fee', 'Board Upgrade Fee From - '.$username, $res->upgrade, '', $res->id);

                      $this->add_deduction($userid,'admin',$res->upgrade,'Board Upgrade Fee','Board Upgrade Fee',$res->id,'account_transfer','account_transfer');

                      $get_user_balance = $this->db_model->select('balance', 'wallet', array('userid' => $userid));
                      wallet_log('$get_user_balance ' . $get_user_balance);
                      $arra = array('balance' => ($get_user_balance - $res->upgrade),);
                      $this->db->where('userid', $userid);
                      $this->db->update('wallet', $arra);
                      wallet_log($this->db->last_query());
                   }   

                   if($result->gift_level < $res->level_no) {
                      $arr = array(
                      'gift_level' => $res->level_no,
                      'last_upgrade' => time(),
                      );
                      $this->db->where('id', $userid);
                      $this->db->update('member', $arr);
                      debug_log($this->db->last_query());

                      $arr = array(
                      'gift_level' => $res->level_no,
                      'last_upgrade' => time(),
                      );
                      $this->db->where(array('userid'=>$userid, 'pid'=>$res->plan_id));
                      $this->db->update('level_details', $arr);

                      debug_log($this->db->last_query());

                      if (config_item('sms_on_join') == "Yes"){
                          $sms = "Hello ".$username.", Congratulations!!!\nYour ID ".$userid." Has Successfully Completed Board \nRegards:\n".config_item('company_name');
                          $messvar="Ok";
                          $phone="91".$phone;
                          $status = $this->common_model->sms($phone, urlencode($sms));
                          debug_log($status);
                      }
                    }
                    
                    debug_log('$res->new_id '.$res->new_id. ' $userid '.$userid.' $res->plan_new_id '.$res->plan_new_id.' $res->auto_upgrade '.$res->auto_upgrade);                
                    if(($res->new_id == 'Yes') && ($userid != config_item('top_id')) && ($res->plan_new_id > 0) && ($res->auto_upgrade == 'Yes')) {
                        $this->session->set_userdata('_id_upgrade_', 'Yes');
                        $this->registration_model->upgrade_member($userid, $res->plan_new_id, 'Auto');
                    }
                  }
                }
              }
          }
      }
    }

    public function single_leg_income()
    {
      //debug_log('Single Leg Income');
      if(config_item('width')=='1'){
        $this->db->select('*')->order_by('level_no', 'ASC');
        $single_leg = $this->db->get('level_wise_income')->result();
        foreach ($single_leg as $res) {
            $duration = $res->income_duration > 0 ? date('Y-m-d', strtotime('-'.$res->income_duration.' days')) : date('Y-m-d', '-20 Years');

            $total_mem = $this->db_model->sum('total_member', 'level_wise_income', array('level_no <=' => $res->level_no));
            $level_total_direct_count = $this->db_model->sum('direct', 'level_wise_income', array('level_no <=' => $res->level_no, 'plan_id'=>$res->plan_id));

            $join_condition = $level_total_direct_count > 0 ? 'INNER' : 'LEFT';

            $this->db->select("t1.secret, t1.id, t1.name, t1.last_upgrade, t1.gift_level, IFNULL(t3.am,0) as amount, IFNULL(t4.dc,0) as total_direct_count")->from('member as t1')
                ->where(array('join_time >= ' => $duration,'signup_package'=>$res->plan_id,'gift_level <' => $res->level_no,'gift_level >=' => $res->level_no-1,'total_active >=' => $total_mem,))
                ->join("(select sponsor, count(*) as dc from member where status = 'Active' group by 1 having dc >= ".$level_total_direct_count.") as t4","t1.id = t4.sponsor","$join_condition")
                ->join("(select userid, sum(amount) as am from earning where secret =".$res->id." and type='".$res->income_name."' group by 1 ) as t3", "t1.id = t3.userid", "LEFT")
                ->having(array('amount <='=>0));
            $data = $this->db->get()->result();
            debug_log($this->db->last_query());
            debug_log($data);

            foreach ($data as $result) {
              $userid = $result->id;
              $secret = $result->secret;
              $username = $result->name;
              $total_direct_count = $result->total_direct_count;

              $prev_total = $this->db_model->select('total_member', 'level_wise_income', array('level_no =' => $res->level_no-1));
              
              $condition_flag = False;
              if(config_item('level_income_sponsor_carry')=='Yes'){
                if($total_direct_count >= $level_total_direct_count){
                  $condition_flag = True;
                }
              }else{
                $level_direct_count=0;
                if($res->direct > 0){
                   $level_direct_count = $this->db_model->count_all('member', array('sponsor' => $userid, 'activate_time >' => date('Y-m-d H:i:s',$result->last_upgrade)));
                 }
                if(($level_direct_count >= $res->direct) && ($total_direct_count >= $level_total_direct_count)){
                  $condition_flag = True; 
                }
              }

              //debug_log($userid . ' , ' . $res->id . ' , ' . $res->income_name . ' , ' . $count);
              if ($condition_flag) {
                
                if($res->amount > 0){

                  $this->pay_earning($userid, '', $res->income_name, 'Target Reach Single Leg Income', $res->amount, '', $res->id);
                  //debug_log($this->db->last_query());
                }

                $this->earning->payout(array($userid));

                if($res->upgrade > 0){

                  $this->pay_earning('admin', $userid, 'Level Upgrade Fee', 'Single Leg Upgrade Admin Fee - '.$username, $res->upgrade, '', $res->id);

                  $this->add_deduction($userid,'admin',$res->upgrade,'Single Leg Upgrade - Admin Fee','Single Leg Upgrade - Admin Fee',$res->id,'account_transfer','account_transfer');

                  $get_user_balance = $this->db_model->select('balance', 'wallet', array('userid' => $userid));
                  //debug_log('$get_user_balance ' . $get_user_balance);
                  $arra = array('balance' => ($get_user_balance - $res->upgrade),);
                  $this->db->where('userid', $userid);
                  $this->db->update('wallet', $arra);
                  wallet_log($this->db->last_query());
                }                    
                  //debug_log($this->db->last_query());

                if($result->gift_level < $res->level_no) {
                    $arr = array(
                    'gift_level' => $res->level_no,
                    'last_upgrade' => time(),
                    );
                    $this->db->where('id', $userid);
                    $this->db->update('member', $arr);  
                    debug_log($this->db->last_query());              
                }
              }
          }
        }
      }
    }


    public function crowdfund_income($signup_package, $width, $from_id, $to_id, $level)
    {
      if((config_item('enable_crowdfund')=='Yes') && (config_item('crowdfund_type')=='Automatic'))
      {
        $pd = $this->db_model->select_multi('*','plans',array('id'=>$signup_package));
        $md = $this->db_model->select_multi('*', 'member', array('id' => $to_id));
        $to_name = $this->db_model->select('name', 'member', array('id' => $to_id));
        $income_count = $this->db_model->count_all('earning', array('userid' => $to_id, 'type'=>'Level ' . $level . ' Income', 'secret'=>$signup_package));
        debug_log($this->db->last_query());
        debug_log('income_count ' . $income_count);
        $config = $level;
        if(config_item('unlimited_cycle_level')!='')
        {
            //$config = ($width==3) ? config_item('unlimited_cycle_level') : 3 ;
            $config = config_item('unlimited_cycle_level');
            debug_log('config ' .$config);
        }

        if($income_count == pow($width, $config))
        {
            $next_level = $level+1;
            $cs=$this->db_model->select_multi('*', 'level_upgrade', array('upgrade_type' => $level, 'plan_id'=>$signup_package));
            $level_details=$this->db_model->select_multi('admin_charge, upgrade_amount', 'level_upgrade', array('upgrade_type' => $next_level, 'plan_id'=>$signup_package));

            debug_log($level_details);
          if (($cs->plan_upgrade != 'Yes')&&($cs->plan_new_id <= 1)) {

            if($level_details->admin_charge >0) 
            { 
                 
                $this->pay_earning('admin',$to_id, 'level ' . $next_level . ' Upgrade  - Admin Fee', 'Upgrade Admin Fee from '.$to_name, $level_details->admin_charge, '', $signup_package); 

                $this->add_deduction($to_id,'admin',$level_details->admin_charge,'Level ' . $next_level . ' Upgrade','level ' . $next_level . ' Upgrade  - Admin Fee',$signup_package,'account_transfer','account_transfer'); 

                $get_user_balance = $this->db_model->select('balance', 'wallet', array('userid' => $to_id)); 
                debug_log('$get_user_balance ' . $get_user_balance); 
                $arra = array('balance' => ($get_user_balance - $level_details->admin_charge),); 
                $this->db->where('userid', $to_id); 
                $this->db->update('wallet', $arra); 
                wallet_log($this->db->last_query()); 
            } 
            debug_log('upgrade_amount ' . $level_details->upgrade_amount); 
            if($level_details->upgrade_amount > 0) 
            { 
                $this->db->select('id')->from('member')->where(array('gift_level' => $next_level,'status' => 'Active', 'signup_package'=>$signup_package))->order_by('last_upgrade', 'ASC')->limit(1);
                $upline_id = $this->db->get()->result_array()[0]['id'];
                debug_log($this->db->last_query());
                if(config_item('unlimited_cycle_level')!='')
                {
                  $upline_id = $this->plan_model->unlimited_cycle_upline($md,$pd,$cs);
                  debug_log('$upline_id ' . $upline_id);
                } 
                debug_log('$next level ' . $next_level); 
                debug_log('$upline_id ' . $upline_id); 
                if((strlen($upline_id) > 2) && ($upline_id != $to_id)) 
                { 
                    $this->pay_earning($upline_id,$to_id, 'level ' . $next_level . ' Income', 'User Upgrade Amount from '.$to_name, $level_details->upgrade_amount, '', $signup_package); 

                    $this->earning->payout(array($upline_id)); 

                    $this->add_deduction($to_id,$upline_id,$level_details->upgrade_amount,'Level ' . $next_level . ' Upgrade','level ' . $next_level . ' Upgrade - User Fee',$signup_package,'account_transfer','account_transfer'); 
                }
                else
                {
                    $this->pay_earning('admin',$to_id, 'level ' . $next_level . ' Income', 'User Upgrade Amount from '.$to_name, $level_details->upgrade_amount, '', $signup_package);

                    $this->add_deduction($to_id,'admin',$level_details->upgrade_amount,'Level ' . $next_level . ' Upgrade','level ' . $next_level . ' Upgrade - User Fee',$signup_package,'account_transfer','account_transfer');

                    $upline_id = '';

                }
                $get_user_balance = $this->db_model->select('balance', 'wallet', array('userid' => $to_id));
                debug_log('$get_user_balance ' . $get_user_balance);
                $arra = array('balance' => ($get_user_balance - $level_details->upgrade_amount),);
                $this->db->where('userid', $to_id);
                $this->db->update('wallet', $arra);
                wallet_log($this->db->last_query());
            }

            $arra = array('gift_level' => $next_level,'last_upgrade'=>time());
            $this->db->where('id', $to_id);
            $this->db->update('member', $arra);
            debug_log($this->db->last_query());
            
            $this->crowdfund_income($signup_package, $width, $to_id, $upline_id, $next_level);
          }
          else
          {
            if ($to_id != config_item('top_id')) {
              $arra = array('gift_level' => 0,'last_upgrade'=>time());
              $this->db->where('id', $to_id);
              $this->db->update('member', $arra);
              debug_log($this->db->last_query());
              $this->registration_model->upgrade_member($to_id,$cs->plan_new_id);
            }
            else
            {
              $arra = array('gift_level' => 0,'last_upgrade'=>time(),'signup_package'=>$cs->plan_new_id,);
              $this->db->where('id', $to_id);
              $this->db->update('member', $arra);
              debug_log($this->db->last_query());
            }
            
          }
        }
      }
    }
    
    //function to credit level wise product commission to the users
    public function credit_product_comm($md,$pd,$prd, $od, $type,$flag='')
    {
      if($flag!=''){
        $incomes = array();
      }
       $userid = $md->id;
       $total_amount = ($od->cost-$od->tax)*$od->qty;
       $total_pv = $prd->pv ? $prd->pv*$od->qty : $pd->pv;

       if($pd->self_product_purchase_comm > "0.00") 
       {
          $amount = $pd->self_product_purchase_comm*$od->qty;
          $amount = $pd->config_comm == 'mrp_percent' ? ($pd->self_product_purchase_comm*$total_amount)/100 : $amount;
          $amount = $pd->config_comm == 'pv_percent' ? ($pd->self_product_purchase_comm*$total_pv)/100 : $amount;
          $status = $this->pay_earning($userid,$userid,"Self Purchase Commission","Self Purchase Commission", $amount);
          if($flag!='' && $amount!=0){
            $self_array=array(
                    "userid"=>$userid,
                    "amount"=>$amount,
                    "remark"=>"Self Purchase Commission from ".$md->name           
                );
            array_push($incomes,$self_array);
          }
       }

       if($total_pv>0)
       {
          $ar = array('mypv' => $md->mypv + $total_pv);
          $this->db->where('id', $userid);
          $this->db->update('member', $ar);
          //debug_log($this->db->last_query());

          $md = $this->db_model->select_multi('*', 'member', array('id' => $userid));

          if ($md->placement_leg == 'A') {
            $ar = array('total_a_pv' => $md->mypv + $md->downline_pv);
            $this->db->where('id', $md->position);
            $this->db->update('member', $ar);
          }
          else
          {
            $ar = array('total_b_pv' => $md->mypv + $md->downline_pv);
            $this->db->where('id', $md->position);
            $this->db->update('member', $ar);
          }

          $pvdata = array(
                   'userid'=> $userid,
                   'name'  => $md->name,
                   'pv'    => $total_pv,
                   'type' =>  $prd->prod_name ? 'Repurchase' : 'Registration',
                   'notes' => $prd->prod_name ? $prd->prod_name.' - Purchase' : $pd->plan_name.' - Registration',
                   'date' =>  date('Y-m-d H:i:s'),
                   'secret'=> $prd->id ? $prd->id : $pd->id,
                   'status'=>'Credited',
          );
          $this->db->insert('pv', $pvdata);
          //debug_log($this->db->last_query());
          $this->downline_model->update_downline_pv($md->id, $total_pv, $md->role);

       }

       /*if(($total_pv>=500) && ($this->db_model->sum('amount', 'earning', array('userid' => $md->position,'ref_id'=>$md->id))<=0)){
          $status = $this->pay_earning($md->position,$md->id,'New Joining Income','New Joining Income from '.$md->name,100);
       }

       debug_log($this->db->last_query());

       $mpd = $this->db_model->select_multi('*','member_profile',array('userid'=>$md->id));
       if((strlen($mpd->aadhar_no)>0)&&($mpd->status=='completed')){
          $status = $this->pay_earning($userid,$userid,"Arogya Card Retail Income","Arogya Card Retail Income", $amount*.06);
          $status = $this->pay_earning($md->sponsor,$userid,"Arogya Card Retail Income","Arogya Card Retail Income from ".$md->name, $amount*.06);
       }
        
       */
        
       $temp_id = $userid;
       $i=1;
       while(1)
       {
          $upline= $md->role=='customer' ? $this->db_model->select('sponsor', 'member', array('id' => $temp_id)) : $this->db_model->select('position', 'level_details', array('userid' => $temp_id, 'gid'=>$md->plan_gid));
          #debug_log($this->db->last_query());
          if(($i <= 15 ) && (strlen($upline) > 2))
          { 
            $product_comm = "product_pur_level".$i."_comm";

            $amount = $pd->$product_comm*$od->qty;
            $amount = $pd->config_comm == 'mrp_percent' ? ($pd->$product_comm*$total_amount)/100 : $amount;
            $amount = $pd->config_comm == 'pv_percent' ? ($pd->$product_comm*$total_pv)/100 : $amount;

            $level_text = "Level-".$i." Product Purchase Commission from ".$md->name;
            $status = $this->pay_earning($upline,$userid,$type,$level_text, $amount);
            if($flag!='' && $amount!=0){
              $level_array=array(
                    "userid"=>$upline,
                    "amount"=>$amount,
                    "remark"=>$level_text              
                );
            }
            $temp_id=$upline;
            $i=$i+1;
            if($flag!='' && $amount!=0){
              array_push($incomes,$level_array);
            }
          } else {
            break;
          }
        }
        if($flag!=''){
          return $incomes;
        }
    }

    //function to credit level wise product commission to the users
    public function credit_product_comm_gmart($md,$pd,$prd, $od, $type,$flag='')
    {
      if($flag!=''){
        $incomes = array();
      }
       $userid = $md->id;
       $total_amount = ($od->total_price)*$od->product_qty;
       $total_pv = $prd->pv ? $prd->pv*$od->product_qty : $pd->pv;
       debug_log("Inside credit_product_comm");
       debug_log( $userid);
       debug_log($total_amount);
       debug_log($total_pv);
       
       /*$text = "Direct Referal Commission From ".$md->name." For Purchasing ".$prd->product_title;
       $income_name = "Direct Referral Commission";
       $comm = $pd->direct_commission;
       $query = $this->db->query("SELECT id FROM earning where userid = $md->sponsor and  type = '$income_name' and pair_names ='$text' ");
       if(!$query->num_rows()>0)
       {
          $this->earning->pay_earning($md->sponsor,'Admin',$income_name, $text, $comm);
          debug_log("eligible for direct_commission income".$userid);
       }*/

       if($pd->self_product_purchase_comm > "0.00")
       {
          $amount = $pd->self_product_purchase_comm*$od->product_qty;
          $amount = $pd->config_comm == 'mrp_percent' ? ($pd->self_product_purchase_comm*$total_amount)/100 : $amount;
          $amount = $pd->config_comm == 'pv_percent' ? ($pd->self_product_purchase_comm*$total_pv)/100 : $amount;
          $status = $this->pay_earning($userid,$userid,"Self Purchase Commission","Self Purchase Commission", $amount);
          if($flag!='' && $amount!=0){
            $self_array=array(
                    "userid"=>$userid,
                    "amount"=>$amount,
                    "remark"=>"Self Purchase Commission from ".$md->name
                );
            array_push($incomes,$self_array);
          }
       }
       if($total_pv>0)
       {
          $ar = array('mypv' => $md->mypv + $total_pv);
          $this->db->where('id', $userid);
          $this->db->update('member', $ar);
          //debug_log($this->db->last_query());
          $md = $this->db_model->select_multi('*', 'member', array('id' => $userid));

          if ($md->placement_leg == 'A') {
            $ar = array('total_a_pv' => $md->mypv + $md->downline_pv);
            $this->db->where('id', $md->position);
            $this->db->update('member', $ar);
          }
          else
          {
            $ar = array('total_b_pv' => $md->mypv + $md->downline_pv);
            $this->db->where('id', $md->position);
            $this->db->update('member', $ar);
          }
          $pvdata = array(
                   'userid'=> $userid,
                   'name'  => $md->name,
                   'pv'    => $total_pv,
                   'type' =>  $prd->prod_name ? 'Repurchase' : 'Registration',
                   'notes' => $prd->prod_name ? $prd->prod_name.' - Purchase' : $pd->plan_name.' - Registration',
                   'date' =>  date('Y-m-d H:i:s'),
                   'secret'=> $prd->id ? $prd->id : $pd->id,
                   'status'=>'Credited',
          );
          $this->db->insert('pv', $pvdata);
          //debug_log($this->db->last_query());
          $this->downline_model->update_downline_pv($md->id, $total_pv, $md->role);
       }
       $temp_id = $userid;
       $i=1;
       while(1)
       {
          $upline= $md->role=='customer' ? $this->db_model->select('sponsor', 'member', array('id' => $temp_id)) : $this->db_model->select('position', 'level_details', array('userid' => $temp_id, 'gid'=>$md->plan_gid));
          #debug_log($this->db->last_query());
          if(($i <= 15 ) && (strlen($upline) > 2))
          {
            $product_comm = "product_pur_level".$i."_comm";
            $amount = $pd->$product_comm*$od->product_qty;
            $amount = $pd->config_comm == 'mrp_percent' ? ($pd->$product_comm*$total_amount)/100 : $amount;
            $amount = $pd->config_comm == 'pv_percent' ? ($pd->$product_comm*$total_pv)/100 : $amount;
            
            
            $level_text = "Level-".$i." Product Purchase Commission from ".$md->name;
            $status = $this->pay_earning($upline,$userid,$type,$level_text, $amount);

            
            if($flag!='' && $amount!=0){
              $level_array=array(
                    "userid"=>$upline,
                    "amount"=>$amount,
                    "remark"=>$level_text
                );
            }
            $temp_id=$upline;
            $i=$i+1;
            if($flag!='' && $amount!=0){
              array_push($incomes,$level_array);
            }
          } else {
            break;
          }
        }
        if($flag!=''){
          return $incomes;
        }
    }

    public function credit_binary_points_new($md,$pd)
    {

       $userid = $md->id;
       $total_pv = $pd->pv;
       debug_log("Inside credit binary points");
       debug_log( $userid);
       debug_log($total_pv);

       $total_points=$md->mypv + $total_pv;
       if($total_pv>0)
       {
          $ar = array('binary_points' => $total_points);
          $this->db->where('id', $userid);
          $this->db->update('member', $ar);

        }

    }

    public function add_invoice($user_id, $plan, $plan_price, $order_id=0)
    {
        //debug_log("this is from earnings model");
        $member_detail = $this->db_model->select_multi('name, address, phone, topup', 'member', array('id' => $user_id));
        $dd = $this->db_model->select_multi('*', 'shipping_address', array('userid' => $user_id));

        $plan_details = $this->db_model->select_multi('*', 'plans', array('id' => $plan));

        $invoice_name = $plan_details->invoice_name;
        $user_id      = $user_id;
        $invoice_date = date('Y-m-d H:i:s');
        $user_type    = 'Member';
        $company_add  = config_item('company_address') . "<br/>" . config_item('company_city') .', ' . config_item('company_state') .' - ' . config_item('company_zipcode') . ', ' . config_item('company_country') ;
        $ship_adress  = $dd->s_name. "<br/>" .$dd->s_phone. "<br/>" .$dd->s_address. "<br/>" .$dd->s_city. "<br/>" .$dd->s_state. "-" .$dd->s_zipcode;
        $bill_add  = $dd->b_name. "<br/>" .$dd->b_phone. "<br/>" .$dd->b_address. "<br/>" .$dd->b_city. "<br/>" .$dd->b_state. "-" .$dd->b_zipcode;
        $total_amt    = $plan_price;
        $paid_amt     = $plan_price;
        $item_name    = $plan_details->invoice_name;
        $price        = round($plan_details->joining_fee / (1 + $plan_details->gst / 100), 2);
        $tax          = round($plan_price - $price,2);
        $qty          = 1;

        $array  = array($item_name => $price);
        $array2 = array($item_name => $tax);
        $array3 = array($item_name => $qty);

        $array  = serialize($array);
        $array2 = serialize($array2);
        $array3 = serialize($array3);
        $params = array(
            'order_id'         => $order_id,
            'invoice_name'     => $invoice_name,
            'userid'           => $user_id,
            'invoice_data'     => $array,
            'invoice_data_tax' => $array2,
            'invoice_data_qty' => $array3,
            'company_address'  => $company_add,
            'bill_to_address'  => $bill_add,
            'ship_to_address'  => $ship_adress,
            'total_amt'        => $total_amt,
            'paid_amt'         => $paid_amt,
            'date'             => $invoice_date,
            'user_type'        => $user_type,
        );
        $this->db->insert('invoice', $params);
    }

    

    public function binary_level_completion_income($id, $pd, $e = 1)
    {
      if($pd->level_income >0) {
        $md = $this->db_model->select_multi('*', 'member', array('id' =>$id));
        $get_level_count = $this->db_model->select('level' . $e, 'level', array('userid' => $md->id));
        //debug_log($this->db->last_query());
        if(($get_level_count == pow($pd->max_width, $e)) && ($e != 1)) {       
            if($this->db_model->count_all('earning',
            array('userid' => $md->id,'type'=>'level ' . $e. ' Completion Income', 'secret' => $pd->id)) < 1) {

              $this->pay_earning($md->id, '', 'level ' . $e. ' Completion Income', 'level ' . $e. ' Completion Income',$pd->level_income, '', $pd->id);

            }
          }
        if($md->id != config_item('top_id')){
          $this->binary_level_completion_income($md->position, $pd, $e+1);
        }
      }
    }

    public function level_completion_roi_income()
    {

      $this->db->select('plan_id')->from('level_wise_income')->group_by('plan_id')->order_by('plan_id', 'ASC');
      $plans = $this->db->get()->result_array();

      foreach ($plans as $plan):
        $this->db->select('*')->from('level_wise_income')->where(array('roi >' => "0",'plan_id' => $plan['plan_id']))->order_by('level_no', 'ASC');
        $inc = $this->db->get()->result();
      
        foreach ($inc as $e):

          $this->db->select("t1.id as id,IFNULL(t3.am,0) as amount")->from('member as t1')
            ->where(array('signup_package'=>$plan['plan_id'],'status'=>'Active', 'gift_level >='=>$e->level_no,'id !=' => config_item('top_id')))
            ->join("(select userid, sum(amount) as am from earning where secret =".$e->id." and type='".$e->income_name."' and pair_names = 'Level ".$e->level_no." Completion ROI Income' group by 1 ) as t3", "t1.id = t3.userid", "LEFT")->having(array('amount <'=>$e->roi_limit));
          $users = $this->db->get()->result();        
          #debug_log($this->db->last_query());

          foreach ($users as $user):
            $user_id        = $user->id;
            $get_last_roi = $this->db_model->select('date', 'earning', array(
            'userid' => $user_id, 'type'   => $e->income_name, 'secret' => $e->id, 'pair_names'=>'Level '.$e->level_no.' Completion ROI Income'));

            #debug_log($this->db->last_query());

            $credit_date = ($e->roi_frequency == 1) || ($e->roi_frequency == 2) ? date('Y-m-d', strtotime($get_last_roi) + (86400 * 1)) : date('Y-m-d', strtotime('+1 month', strtotime($get_last_roi)));

            debug_log('Userid ' . $user_id . ' Last ROI '.$get_last_roi.' Today ' . date('Y-m-d') . ' Due Day ' . $credit_date);
          
            if(($e->roi_frequency == 1) && (in_array(date("l"), array("Saturday", "Sunday"))))
            {
              debug_log('It is Weekend and ROI is configured only for Working Day!!!');
            } 
            else if (date('Y-m-d') >= $credit_date)
            {
              $remaining_amount = $e->roi_limit-$user->amount > $e->roi ? $e->roi : $e->roi_limit-$user->amount;
              debug_log('Total Amount Credited ' . $user->amount . ' Limit ' . $e->roi_limit.' Remaining '.$remaining_amount);
              if($remaining_amount > 0) {
              $this->pay_earning($user_id, '', $e->income_name, 'Level '.$e->level_no.' Completion ROI Income',$remaining_amount, '', $e->id);

                if(($this->db_model->sum('amount', 'earning', array('userid' => $user_id,'type'=>$e->income_name,'secret' => $e->id,'pair_names'=>'Level '.$e->level_no.' Completion ROI Income')) - $e->roi_limit >= 0) && ($e->recurring_fee >0 || $this->db_model->select('recurring_fee', 'plans', array('id' => $plan['plan_id'])) >0)){
                  $data = array('status' => 'Suspend');
                  $this->db->where('id', $user_id);
                  $this->db->update('member', $data);
                }
              }
            }
          endforeach;
        endforeach;
      endforeach;
    }

    public function payout($ids)
    {
        if(count($ids) != 0)
        {
            foreach ($ids as $id) {
            $this->db->select('id, userid, amount')->where(array('userid'=>$id, 'status' => 'Pending'));
            $data = $this->db->get('earning')->result();
            }
        }
        else
        {
            $this->db->select('id, userid, amount')->where('status', 'Pending');
            $data = $this->db->get('earning')->result();
        }
        foreach ($data as $e) {
            $cur_balance = $this->db_model->select('balance', 'wallet', array('userid' => $e->userid));
            $data = array('balance' => $e->amount + $cur_balance);
            $this->db->where('userid', $e->userid);
            $this->db->update('wallet', $data);
            wallet_log($this->db->last_query());
            $data = array('status' => 'Paid');
            $this->db->where('id', $e->id);
            $this->db->update('earning', $data);
            wallet_log($this->db->last_query());
        }
    }

    public function deduct_wallet_all()
    {
        $this->db->select('t1.userid, t1.balance, t2.name')->from('wallet as t1')
        ->where('t1.balance >', 0)->order_by('t1.id','ASC')
        ->join("(SELECT id, name FROM member) as t2", 't1.userid = t2.id', 'LEFT');
        $users = $this->db->get()->result();

        debug_log($users);

        foreach ($users as $user) {

          $amount = $user->balance;
          $userid = $user->userid;
          $name = $user->name;

          $net_earning = $amount*0.9;
          $admin_amount = $amount - $net_earning;

          $this->add_deduction($userid,'Admin',$admin_amount,'Admin Charge','Admin Charge','','','');
          $this->pay_earning_updated('Admin','Admin',$userid,'Admin Charge','Admin Charge from '.$name, $admin_amount, '', '');

          $data = array('balance' => $net_earning);
          $this->db->where('userid', $userid);
          $this->db->update('wallet', $data);
          
        }

    }

    //insert into transaction table when user clicks on pay using coinpayment button
    public function insert_into_transaction($uid)
    {
      
      debug_log("inside insert into transaction purpose  ".$this->session->_type_);
      $type = $this->session->_type_ == 'wallet' ? 'Online Wallet Topup' : 'Registration Fee';
      debug_log("this is the purpose ".$type);

      $userid = $this->session->_user_id_;
      $name = trim($this->session->_user_name_);
      $email = trim($this->session->_email_);
      $phone = $this->session->_phone_;
      $amount = $this->session->_price_;

      $timestamp = time();
      $transaction_id = '';
      $REQUEST_SIGNATURE = '';
      $payment_request_id = '';

      debug_log(config_item('enable_bankonnect'));

      if(config_item('enable_bankonnect') == "Yes"){
          $client_request_method = 'POST';
          $transaction_id = explode(" ", $name)[0].$timestamp;
          $client_body ='{
          "amount": "'.$amount.'",
          "contact_number": "'.$phone.'",
          "currency": "INR",
          "email_id": "'.$email.'",
          "mtx": "'.$transaction_id.'"
          }';
          debug_log($client_body);
          $string = $timestamp.$client_request_method.$client_body;
          $string = preg_replace('/\s+/', '', $string);
          debug_log($string);
          $REQUEST_SIGNATURE =  hash_hmac('sha256', $string, config_item('openbank_secret_key'));
          debug_log($REQUEST_SIGNATURE);

          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, config_item('openbank_url'));
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($ch, CURLOPT_POST, 1);
          $headers = array("Authorization:Bearer ".config_item('openbank_access_key').":".$REQUEST_SIGNATURE."",
                "X-O-Timestamp:" . $timestamp . "",
                "Content-Type:application/json"
               );
          curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
          curl_setopt ($ch, CURLOPT_POSTFIELDS,$client_body);
          $result = curl_exec($ch);
          if (curl_errno($ch)) {
              debug_log('Error:' . curl_error($ch));
          }
          $result_decode=json_decode($result);
          curl_close($ch);
          debug_log($result);
          debug_log($result_decode);
          $payment_request_id = $result_decode->id;
        }

        $sponsor = $this->session->_sponsor_;

        if($type != 'Online Wallet Topup'){
          $details_arr=array("userid"=>$userid,"name"=>$name,"phone"=>$phone,"sponsor"=>$sponsor,"email"=>$email,'password'=>$this->session->_password_,'plan'=>$this->session->_plan_,'position'=>$this->session->_position_,'address'=>$this->session->_address_,'city'=>$this->session->_city_,'state'=>$this->session->_state_,'zipcode'=>$this->session->_zipcode_,'country'=>$this->session->_country_,'price'=>$this->session->_price_,'password'=>$this->session->_password_,'secure_password'=>$this->session->_secure_password_,'join_time'=>$this->session->_join_time_,'placement_leg'=>$this->session->_placement_leg_,'topup'=>$this->session->_topup_,'mybusiness'=>$this->session->_my_business_,'plan_detail'=>$this->session->_plan_detail_,'width'=>$this->session->_width_,'tax_amount'=>$this->session->_tax_amount_,'member_status'=>$this->session->_member_status_,'pan'=>$this->session->_pan_,'role'=>$this->session->role,'d_password_'=>$this->session->_d_password_,'d_secure_password_'=>$this->session->_d_secure_password_,'_type_'=>$this->session->_type_);

        }else{
          $details_arr = '';
        }

        $new_array=json_encode($details_arr);

        $array = array('userid'         => $userid,
                        'name'           => $name,
                        'email_id'       =>$email,
                        'phone'          => $phone,
                        'amount'         => $amount,
                        'gateway'        => 'To Be Selected',
                        'time'           => $timestamp,
                        'purpose'        => $type,
                        'transaction_id'  => $transaction_id != '' ? $transaction_id : '',
                        'payment_request_id' => $payment_request_id != '' ? $payment_request_id : $userid.time(),
                        'status'         => "Started",
                        'details' => $new_array,
                        );
       $this->db->insert('transaction', $array);
       //debug_log($this->db->last_query());
       $payment_request_id = $this->db_model->select('payment_request_id','transaction',array('id'=>$this->db->insert_id()));
       $this->session->set_userdata(array('payment_request_id' => $payment_request_id));
       
    }

    public function credit_cashback($md,$pd,$amount)
    {
      debug_log('entered in cashback');
      debug_log('amount '.$amount);
      debug_log('md '.$md->id);
      debug_log('pd '.$pd->id);
       $userid = $md->id;
       $type= "Product Purchase Commission";

       if($pd->self_product_purchase_comm > "0.00") 
       {
          $amount = $pd->config_comm == 'mrp_percent' ? ($pd->self_product_purchase_comm*$amount)/100 : $pd->self_product_purchase_comm;
          $status = $this->pay_earning($userid,$userid,"Self Purchase Commission","Self Purchase Commission", $amount);
       }
        
       $temp_id = $userid;
       $i=1;
       while(1)
       {
          $upline= $md->role=='customer' ? $this->db_model->select('sponsor', 'member', array('id' => $temp_id)) : $this->db_model->select('position', 'level_details', array('userid' => $temp_id, 'gid'=>$md->plan_gid));
          #debug_log($this->db->last_query());
          if(($i <= 15 ) && (strlen($upline) > 2))
          { 
            $product_comm = "product_pur_level".$i."_comm";
            $amount = $pd->config_comm == 'mrp_percent' ? ($pd->$product_comm*$amount)/100 : $pd->$product_comm;

            $level_text = "Level-".$i." Product Purchase Commission from ".$md->name;
            $status = $this->pay_earning($upline,$userid,$type,$level_text, $amount);
            $temp_id=$upline;
            $i=$i+1;
          } 
          else {
            break;
          } 
        }
    }
	public function credit_binary_points($md,$pd,$pv=false){
       $userid = $md->id;
       $total_pv = $pv;
       debug_log("Inside credit binary points");
       debug_log( $userid);
       debug_log($total_pv);
       $ar = array('mypv' => $md->mypv + $total_pv);
       $this->db->where('id', $userid);
       $this->db->update('member', $ar);
       //debug_log($this->db->last_query());

       $md = $this->db_model->select_multi('*', 'member', array('id' => $userid));

       if ($md->placement_leg == 'A') {
         $ar = array('total_a_pv' => $md->mypv + $md->downline_pv);
         $this->db->where('id', $md->position);
         $this->db->update('member', $ar);
       }
       else
       {
         $ar = array('total_b_pv' => $md->mypv + $md->downline_pv);
         $this->db->where('id', $md->position);
         $this->db->update('member', $ar);
       }

       $pvdata = array(
                'userid'=> $userid,
                'name'  => $md->name,
                'pv'    => $total_pv,
                'type' =>  'plan upgrade',
                'notes' => 'plan upgrade',
                'date' =>  date('Y-m-d H:i:s'),
                'secret'=> $pd->id,
                'status'=>'Credited',
       );
       $this->db->insert('pv', $pvdata);
       //debug_log($this->db->last_query());
       $this->downline_model->update_downline_pv($md->id, $total_pv, $md->role);

    }


    public function get_number_wallet_and_vocher_pair($amount)
    {
      
        $i  = 0;
        $a  = 0;
        $c  = 5;
        $count_5= 0;
        $count_20= 0;
        while($amount>$i){
          $i++;
          if((($i-1)+$c)%25==0){
            $a++;
          }
          else{
          }
          if($a==0||$a>5){
      //      echo $i.'<br>'; 
            $a  = 0;
            $count_20++;
          }
          else{
            $count_5++;
            $a++;
      //      echo $a.'20-25 like value '.$i.'<br>';  
          }
        }
      //  echo 'count'.$count_5.'<br>';
      //  echo 'count'.$count_20.'<br>';


        $result_array= array('count_5' => $count_5 ,'count_20' => $count_20 );
        return $result_array;
    }



    //update the all pv's to upline users

    public function update_pv_for_all($id,$pd)
    {


        debug_log("enterd into pv update to all users");
        //print_r($id);
        //echo "<br>";
        //$id = $md->id;
        $total_pv=$pd;
        $userid = $this->db->select('id,A,B')->from('member')->where('A', $id)->or_where('B',$id)->get()->row();

          if($userid->A == $id )
          {
              $user_details =  $this->db_model->select_multi('*', 'member', array('id' =>$userid->id));

              $left_pv = $user_details->total_a_pv + $total_pv ;
              $right_pv = $user_details->total_b_pv;

              $arra2 = array('total_a_pv' => $left_pv,'total_b_pv' => $right_pv);
              $this->db->where('id', $userid->id);
              $this->db->update('member', $arra2);

              debug_log($this->db->last_query());
              
            
          }
          elseif($userid->B == $id )
          {
              $user_details =  $this->db_model->select_multi('*', 'member', array('id' =>$userid->id));

              $left_pv = $user_details->total_a_pv  ;
              $right_pv = $user_details->total_b_pv + $total_pv;

              $arra4 = array('total_a_pv' => $left_pv,'total_b_pv' => $right_pv);
              $this->db->where('id', $userid->id);
              $this->db->update('member', $arra4);
              debug_log($this->db->last_query());
            
          }

          $total_pv=$pd;
          if($userid->id)
          {
            $this->update_pv_for_all($userid->id,$total_pv);
          }
    }


}