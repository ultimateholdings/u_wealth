<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->common_model->__session();
    }

	public function getEmail($dummy_side) 
	{
		$s = $this->db->where("dummy_side", $dummy_side)->get("dummy");
		$r = $s->row();
		if($r)
		{
			return $r->dummy_side;
		}
		else
		{
			return false;
		}
	}

    public function load_member_data($userid)
    {
    	$data['member']=$this->db_model->select_multi('*', 'member', array('id' => $userid));
    	$data['level_details']=$this->db_model->select_multi('*', 'level_details', array('userid' => $userid, 'pid'=>$data['member']->signup_package));
    	$data['mp'] = $this->db_model->select_multi('*', 'member_profile', array('userid' => $userid));
		$data['payout']=$this->db_model->select_multi('*', 'payout', array('plan_id' => $data['member']->signup_package));
		$data['pd'] = $this->db_model->select_multi('*', 'plans', array('id' => $data['member']->signup_package));
		
		$data['paid_payout'] = $this->db_model->sum('amount', 'withdraw_request', array('status' => 'Paid', 'userid' => $userid));
		if ($data['paid_payout'] == "") {
		$data['paid_payout'] = 0;
		}

		$data['leadership_paid']=$this->db_model->sum('amount', 'earning', array('type'=>"Leadership bonus", 'userid' => $userid ));


		$data['pending_payout'] = $this->db_model->sum('amount', 'withdraw_request', array('status' => 'Un-Paid', 'userid' => $userid)) + $this->db_model->sum('amount', 'withdraw_request', array('status' => 'Hold', 'userid' => $userid));
		if ($data['pending_payout'] == "") {
		$data['pending_payout'] = 0;
		}

		$data['direct_team'] = $this->db_model->count_all('member', array('sponsor' => $userid));
		$data['active_team'] = $this->db_model->count_all('member', array('sponsor' => $userid, 'status'=>'Active'));
		$data['recharge'] = $this->db_model->select('balance', 'other_wallet', array('userid' => $userid, 'type'=>'Repurchase'));

		$data['level_income'] = $this->db_model->sum('amount', 'earning', array('userid' => $userid, 'type' => 'Joining Purchase Commission')) + $this->db_model->sum('amount', 'earning', array('userid' => $userid, 'type' => 'Level Completion Income')) + $this->db_model->sum('amount', 'earning', array('userid' => $userid, 'type' => 'Self Purchase Commission')) + $this->db_model->sum('amount', 'earning', array('userid' => $userid, 'type' => 'Repurchase Commission'))+ $this->db_model->sum('amount', 'earning', array('userid' => $userid, 'type' => 'Level Referral Income')) + $this->db_model->sum('amount', 'earning', array('userid' => $userid, 'type' => 'Single Leg Income'));

		$data['level_income'] = $data['level_income'] == '' ? '0' : $data['level_income'];
		$data['wallet_balance'] = $this->db_model->select('balance', 'wallet', array('userid' => $userid));
		$data['wallet_balance'] = $data['wallet_balance'] =='' ? 0 : $data['wallet_balance'];


		$data['binary_income']=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $userid )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $userid ));

		$data['upgrade_income']=$this->db_model->sum('amount', 'earning', array('type'=>"User plan upgrade fee commission", 'userid' => $userid ));

		$data['voucher_balance'] = $this->db_model->select('balance', 'voucher', array('userid' => $userid));
		$data['voucher_balance'] = $data['voucher_balance'] =='' ? 0 : $data['voucher_balance'];

		$data['total_earned'] = $this->db_model->sum('amount', 'earning', array('userid' => $userid));
		$data['total_earned'] = $data['total_earned'] == '' ? 0 : $data['total_earned'];

		$this->db->select('id');
		$this->db->where(array('email' =>$data['member']->email ));
		$allMember	= $this->db->get('member')->result();
		$myaccount_total_earned	= 0;
		if($allMember){
			foreach($allMember as $set_mem){
				$myaccount_total_earned	= $this->db_model->sum('amount', 'earning', array('userid' => $set_mem->id))+$myaccount_total_earned;
			}
		}
		$data['myaccount_total_earned'] = $myaccount_total_earned;

		$data['Further_earned'] = $this->db_model->sum('amount', 'earning', array('userid' => $userid,'status'=>'Hold'));

		//wallet and all transctions

		

		$data['wallet_transaction'] = $this->db_model->sum('payment_amt', 'tbl_transaction', array('user_id' => $userid,'gateway'=>'wallet_balance'));
		$data['wallet_transaction'] = $data['wallet_transaction'] =='' ? 0 : $data['wallet_transaction'];

		$data['all_transaction'] = $this->db_model->sum('payment_amt', 'tbl_transaction', array('user_id' => $userid,'gateway !='=>'voucher'));
		$data['all_transaction'] = $data['all_transaction'] =='' ? 0 : $data['all_transaction'];

		$plan_id2=$data['member']->signup_package;
		$data['total_downline_income'] = $this->db_model->total_downline_income($userid,$plan_id2);

		$data['total_downline_income'] = $data['total_downline_income'] =='' ? 0 : $data['total_downline_income'];

		$data['potential_earnings'] = $this->db->query("
         SELECT IFNULL(sum(direct_commission),0) as potenital_earning FROM 
         (SELECT t1.id, t1.signup_package, t2.direct_commission as direct_commission from member as t1  
         LEFT JOIN
         (select id, direct_commission from plans) as t2 ON t1.signup_package = t2.id 
         WHERE sponsor = ".$data['member']->id." and status = 'Inactive')a")->result_array()[0]['potenital_earning'];

		$data['referral_income'] = $this->db_model->sum('amount', 'earning', array('userid' => $userid, 'type' => 'Referral Income')) + $this->db_model->sum('amount', 'earning', array('userid' => $userid, 'type' => 'Direct Referral Commission'));

		$data['sm_light_logo'] = file_exists(FCPATH ."axxets/client/logo-light.png") ? base_url().'axxets/client/logo-light.png' : base_url().'uploads/site_img/logo-light.png';
		$data['sm_dark_logo'] = file_exists(FCPATH ."axxets/client/logo-dark.png") ? base_url().'axxets/client/logo-dark.png' : base_url().'uploads/site_img/logo-dark.png';
		$data['lg_light_logo'] = file_exists(FCPATH ."axxets/client/logo_light.png") ? base_url().'axxets/client/logo_light.png' : base_url().'uploads/site_img/logo-light-text.png';
		$data['lg_dark_logo'] = file_exists(FCPATH .'axxets/client/logo_dark.png') ? base_url().'axxets/client/logo_dark.png' : base_url().'uploads/site_img/logo-dark-text.png';

		if(config_item('crowdfund_type')=='Manual_Peer_to_Peer')
		{

			$data['diff'] = '';
			$data['alert_message'] = '';
			$data['deposit_message'] = '';

			$data['crowdfund_setting'] = $this->db_model->select_multi('*','level_upgrade',array('plan_id'=>$data['member']->signup_package, 'upgrade_type'=>($data['member']->gift_level+1)));

			$data['ccs'] = $this->db_model->select_multi('*','level_upgrade',array('plan_id'=>$data['member']->signup_package, 'upgrade_type'=>($data['member']->gift_level)));

			if($this->db_model->count_all('transaction', array('to_userid'=>$data['member']->id, 'status'=>'Processing'))>0)
			{
				if($data['pd']->auto_pool != 'Yes'){
				  $data['deposit_message'] = "You have received Deposit from Member !!! Please <a href=". site_url('member/approve_deposit')." style='color: blue;'> Click Here </a> to Approve the payment !!!";  
				}else{
				  //$data['deposit_message'] = "You have received Your Level ".($data['member']->gift_level)." Member Fee !!! Please <a href=". site_url('member/approve_deposit')." style='color: blue;'> Click Here </a> to Approve the payment !!!";
				  $data['deposit_message'] = "You have received Deposit from Member !!! Please <a href=". site_url('member/approve_deposit')." style='color: blue;'> Click Here </a> to Approve the payment !!!";  
				}
			}

			$data['level_complete'] = '';
			if(($data['member']->gift_level>0) && ($data['ccs']->id >0))
			{
				 #update level complete as no only if there is config unlimeted cycle is  null
				if (config_item('unlimited_cycle_level')=='') {
				$data['income_count'] = $this->db->query("select count(distinct userid) as count from transaction where to_userid = ".$data['member']->id." and secret = ".$data['ccs']->id." and status = 'Completed' and remarks like '%Member Fee%'")->result_array()[0]['count'];

				debug_log('Current Income_count ' . $data['income_count']);
				debug_log('Maximum Income To be Received');
				debug_log(pow($data['pd']->max_width, $data['member']->gift_level));

				if($data['income_count'] < pow($data['pd']->max_width, $data['member']->gift_level)){
					$data['level_complete'] = 'No';
				}
				}
				else{
					$data['income_count'] = $this->db->query("select count(distinct userid) as count from transaction where to_userid = ".$data['member']->id." and secret = ".$data['ccs']->id." and status = 'Completed' and remarks like '%Level ".$data['member']->gift_level." Member Fee%'")->result_array()[0]['count'];
				debug_log($this->db->last_query());
 
 				debug_log('Current Income_count ' . $data['income_count']);
 				debug_log('Maximum Income To be Received');
				debug_log(pow($data['pd']->max_width, config_item('unlimited_cycle_level')));
 
				
					if($data['income_count'] < pow($data['pd']->max_width, config_item('unlimited_cycle_level'))){
 					$data['level_complete'] = 'No';
 					}

 				}
			}

			# We need display timer only when a member at level 0 or some other level and yet to make the admin/sponsor/member fee. It should not be displayed when a member waiting to receive the payment from downline
			if($data['level_complete'] != 'No')
			{
				#Check if any Crowd Fund Income configured for member current level 
				if($data['crowdfund_setting'] != '')
				{
				  #Check admin fee status if admin_charge is greater than 0 else initialize it as paid
				  if($data['crowdfund_setting']->admin_charge>0)
				  {
				  	$data['admin_fee_status'] = $this->db_model->select('status','transaction', array('userid'=>$data['member']->id,'to_userid'=>'admin','secret'=>$data['crowdfund_setting']->id));
				  	$admin_fee_paid_date = $this->db_model->select('date', 'earning', array('userid'=>'admin', 'ref_id' => $data['member']->id, 'secret'=>$data['crowdfund_setting']->id));	
				  }
				  else
				  {
				  	if ($data['member']->gift_level==0) {
				      		$data['admin_fee_status'] = 'Completed';
				      		$admin_fee_paid_date = $data['member']->join_time;
				    	}
					    else{
					      	$data['admin_fee_status'] = 'Completed';
					      	#The timer will start from the time user got his/her earnings
					      	$admin_fee_paid_date = $this->db_model->select('date', 'earning', array('userid' => $data['member']->id, 'level '.$data['member']->gift_level.' Income'));	
					    }
				  }

				  //debug_log('admin_fee_status '.$data['admin_fee_status']);
				  debug_log($this->db->last_query());

				  if($data['admin_fee_status']=='Processing')
				  {
				     $data['alert_message'] = "Your Level ".($data['member']->gift_level+1)." Admin Fee is under Process!!! Please <a href=". site_url('member/online_transactions')." style='color: blue;'> Click Here </a> to check the status !!!";
				  }
				  #If admin Fee is Paid then check if Sponsor and Member Fee paid and also find the cutoff time
				  else if($data['admin_fee_status']=='Completed')
				  {
				  	#If member has paid the admin fee and if there is any sponsor fee to be paid
				  	if($data['crowdfund_setting']->sponsor_fee>0)
				  	{
				  			$data['sponsor_fee_status'] = $this->db->query("select status from transaction where userid = ".$data['member']->id." and to_userid = ".$data['member']->sponsor." and secret = ".$data['crowdfund_setting']->id." and remarks like '%Sponsor Fee%'")->result_array()[0]['status'];

					        if($data['sponsor_fee_status']=='Processing')
					        {
					          $data['alert_message'] = "Your Level ".($data['member']->gift_level+1)." Sponsor Fee is under Process!!! Please <a href=". site_url('member/online_transactions')." style='color: blue;'> Click Here </a> to check the status !!!";
					        }
					        elseif($data['sponsor_fee_status']=='Completed')
					        {
				        		#Sponsor Fee is paid then check for member fee and cut off
				        		$data['member_fee_status'] = $this->db->query("select status from transaction where userid = ".$data['member']->id." and secret = ".$data['crowdfund_setting']->id." and remarks like '%Member Fee%'")->result_array()[0]['status'];

						        if($data['member_fee_status']=='Processing')
						        {
						          $data['alert_message'] = "Your Level ".($data['member']->gift_level+1)." Member Fee is under Process!!! Please <a href=". site_url('member/online_transactions')." style='color: blue;'> Click Here </a> to check the status !!!";
						        }
						        #If a member fee status is completed, then gift_level would have updated and hence no need to explicitly validate if($data['member_fee_status']!='Completed')
						        else
						        {
						          #We need to consider Last Sponsor Fee Paid date for cut-off
						          $sponsor_fee_paid_date = $this->db_model->select('date', 'earning', array('userid'=>$data['member']->sponsor, 'ref_id' => $data['member']->id, 'secret'=>$data['crowdfund_setting']->id));
						          $data['newdate'] = date("Y-m-d H:i:s", strtotime('+ '.$data['crowdfund_setting']->upgrade_amount_time.' hours', strtotime($sponsor_fee_paid_date)));
						          $data['new_time'] = strtotime($data['newdate'])* 1000;
						          $data['diff'] = strtotime($data['newdate']) - strtotime(date('Y-m-d H:i:s'));

						          if(!($data['diff'] >0))
						          {
						              $update_queue = "UPDATE crowdfund_queue SET level".($data['member']->gift_level+1)." = '' WHERE userid = ".$data['member']->id." and pid = ".$data['member']->signup_package;
						              $this->db->query($update_queue);
						              debug_log($this->db->last_query());
						          }
						          else
						          {
						              $data['upline_id'] = $this->db_model->select('level'.($data['member']->gift_level+1),'crowdfund_queue', array('userid'=>$data['member']->id, 'pid'=>$data['member']->signup_package));
						              $data['upline_id'] = strlen($data['upline_id'])>2 ? $data['upline_id'] : config_item('top_id');  
						              $data['url'] = 'member/topup-wallet/'.$data['crowdfund_setting']->upgrade_amount.'/'.$data['upline_id'];
						              $data['payment_remarks'] = 'Level '.($data['member']->gift_level+1).' Member Fee';
						              $data['cs_secret'] = $data['crowdfund_setting']->id;   
						          }
						        }
					        }
					        #If member yet to make to sponsor fee then identify the cutoff time
					        else
					        {
				    			#Assiging cut-off time for Sponsor Fee Payment. Cut off Based on Admin Fee Payment
					          $data['newdate'] = date("Y-m-d H:i:s", strtotime('+ '.$data['crowdfund_setting']->upgrade_amount_time.' hours', strtotime($admin_fee_paid_date)));
					          $data['new_time'] = strtotime($data['newdate'])* 1000;
					          $data['diff'] = strtotime($data['newdate']) - strtotime(date('Y-m-d H:i:s'));
					          if($data['diff']>0){
					              $data['url'] = 'member/topup-wallet/'.$data['crowdfund_setting']->sponsor_fee.'/'.$data['member']->sponsor;
					              $data['payment_remarks'] = 'Level '.($data['member']->gift_level+1).' Sponsor Fee';
					              $data['cs_secret'] = $data['crowdfund_setting']->id;
					          }
					        }
					}
				    #If there is no Sponsor Fee, check for Member Fee and identify the cutoff timining 
				    else
				    {
				        $data['member_fee_status'] = $this->db->query("select status from transaction where userid = ".$data['member']->id." and secret = ".$data['crowdfund_setting']->id." and remarks like '%Member Fee%'")->result_array()[0]['status'];
				      	debug_log($this->db->last_query());
				    	if($data['member_fee_status']=='Processing')
				    	{
				      	 $data['alert_message'] = "Your Level ".($data['member']->gift_level+1)." Member Fee is under Process!!! Please <a href=". site_url('member/online_transactions')." style='color: blue;'> Click Here </a> to check the status !!!";
				    	}
				    	else
				    	{
				          $data['newdate'] = date("Y-m-d H:i:s", strtotime('+ '.$data['crowdfund_setting']->upgrade_amount_time.' hours', strtotime($admin_fee_paid_date)));
				          $data['new_time'] = strtotime($data['newdate'])* 1000;
				          $data['diff'] = strtotime($data['newdate']) - strtotime(date('Y-m-d H:i:s'));

				          if(!($data['diff'] >0))
				          {
				              $update_queue = "UPDATE crowdfund_queue SET level".($data['member']->gift_level+1)." = '' WHERE userid = ".$data['member']->id;
				              $this->db->query($update_queue);
				              debug_log($this->db->last_query());
				          }
				          else
				          {
				              $data['upline_id'] = $this->db_model->select('level'.($data['member']->gift_level+1),'crowdfund_queue', array('userid'=>$data['member']->id, 'pid'=>$data['member']->signup_package));
				              $data['upline_id'] = strlen($data['upline_id'])>2 ? $data['upline_id'] : config_item('top_id');  
				              $data['url'] = 'member/topup-wallet/'.$data['crowdfund_setting']->upgrade_amount.'/'.$data['upline_id'];
				              $data['payment_remarks'] = 'Level '.($data['member']->gift_level+1).' Member Fee';
				              $data['cs_secret'] = $data['crowdfund_setting']->id;    
				          }
				    	}
				  	}
				  }
				  #if the admin fee is not paid then 
				  else
				  {
				  	##If member has not paid admin fee and at level 0. User will have admin_charge_time hrs time from joining time
				    if($data['member']->gift_level==0){
				      $data['newdate'] = date("Y-m-d H:i:s", strtotime('+ '.$data['crowdfund_setting']->admin_charge_time.' hours', strtotime($data['member']->join_time)));  
				    }else{
				    	##If member has not paid admin fee and at level more than 0. User will have admin_charge_time hrs time from last member fee paid time
				      $data['newdate'] = date("Y-m-d H:i:s", strtotime('+ '.$data['crowdfund_setting']->admin_charge_time.' hours', strtotime($this->db_model->select('date','earning', array('userid'=>$data['member']->id, 'type'=>'Level '.$data['member']->gift_level.' Income')))));  
				    }
				    
				    $data['new_time'] = strtotime($data['newdate'])* 1000;  
				    $data['diff'] = strtotime($data['newdate']) - strtotime(date('Y-m-d H:i:s'));
				    $data['url'] = 'member/topup-wallet/'.$data['crowdfund_setting']->admin_charge;
				    $data['payment_remarks'] = 'Level '.($data['member']->gift_level+1).' Admin Fee';
				    $data['cs_secret'] = $data['crowdfund_setting']->id;
				  } 
				}
			}
		}
		else
		{
				#Check if there is any deposit made by member and it is pending with admin for Approval	

				$data['admin_fee_status'] = $this->db_model->select('status','transaction', array('userid'=>$data['member']->id,'to_userid'=>'admin'));

		      if($data['admin_fee_status']=='Processing'){
		        $data['alert_message'] = "Your Deposit is under Process!!! Please <a href=". site_url('member/online_transactions')." style='color: blue;'> Click Here </a> to check the status !!!";
		      }

		      #Showing member to activate the account two hours from registration incase of Free Registration

		      if((config_item('free_registration')=='Yes')&&($data['member']->status != 'Active')){
		      	$data['newdate'] = date("Y-m-d H:i:s", strtotime('+ 2 hours', strtotime($data['member']->join_time)));
		      	$data['new_time'] = strtotime($data['newdate'])* 1000;  
		        $data['diff'] = strtotime($data['newdate']) - strtotime(date('Y-m-d H:i:s'));
		        $data['url'] = 'member/topup-wallet/'.$data['pd']->joining_fee;
		        $data['payment_remarks'] = 'Member Activatation Fee';
		      }

		}

		$data['income_name'] = array('Referral' => 'Referral Income');

		if(config_item('width')==1){
		    $data['income_name'] = array_merge($data['income_name'], array('Single Leg Income'=>'Single Leg Income'));
		}elseif(config_item('width')==2){
		    $data['income_name'] = array_merge($data['income_name'], array('First Pair Matching Comm' => 'First Pair Matching Comm', 'Binary Commission' => 'Binary Commission'));

		    $data['today_pairs'] = $this->db_model->count_all('earning',array('type' => 'First Pair Matching Comm','userid'=>$userid, 'date >=' =>  date('Y-m-d'))) + $this->db_model->count_all('earning',array('type' => 'Binary Commission','userid'=>$userid,'date >=' =>  date('Y-m-d')));

		    $data['direct_left'] = $this->db_model->count_all('member', array('sponsor' => $userid, 'placement_leg'=>'A'));

		    $data['direct_right'] = $this->db_model->count_all('member', array('sponsor' => $userid, 'placement_leg'=>'B'));

		    $data['matching_income'] = $this->db_model->sum('amount', 'earning', array('userid' => $userid, 'type' => 'Binary Commission')) + $this->db_model->sum('amount', 'earning', array('userid' => $userid, 'type' => 'First Pair Matching Comm'));
		}

		if((config_item('width') !=1)&&(config_item('level_income')=='Yes')){
		    $data['income_name'] = array_merge($data['income_name'], array('Level Completion Income' => "Level Completion Income"));
		}

		if(config_item('enable_roi')=='Yes'){
		    $data['income_name'] = array_merge($data['income_name'], array('ROI Income' => "ROI"));   
		}

		if(config_item('enable_repurchase')=='Yes'){
		    $data['income_name'] = array_merge($data['income_name'], array("Self Purchase Commission"=>"Self Purchase Commission","Repurchase Commission"=>"Repurchase Commission"));      
		}

		if(config_item('target_income')=='Yes'){
		    $data['income_name'] = array_merge($data['income_name'],array("Target"=>"Target Income"));   
		}

		$this->db->select('type, amount, date, pair_names')
		->where('userid', $userid)->order_by('id', 'DESC');
		$this->db->limit(5);
        $data['latest_earnings'] = $this->db->get('earning')->result();

        if($this->db_model->select('description', 'settings', array('type'=>'footer'))!=1) {
			if(config_item('footer_name') != '')
			{ 
			    $data['footer']  = "&copy;".date('Y')." All Rights Reserved by ".config_item('footer_name');
			} 
			else 
			{
				$data['footer']  = "&copy;".date('Y')." All Rights Reserved | Powered by <a href='https://www.globalmlmsolution.com' alt='_blank' style='color: blue;'> Global MLM Software </a>";
			}
		} 
		else
		{
			if(config_item('footer_name') != '')
			{ 
			    $data['footer']  = "&copy;".date('Y')." All Rights Reserved by ".config_item('footer_name');
			} 
			else 
			{
				$data['footer']  = "&copy;".date('Y')." All Rights Reserved | Powered by <a href='https://www.globalmlmsolution.com' alt='_blank' style='color: blue;'> Global MLM Software </a>";
			}
		}

		$data['style'] = config_item('member')=='member/default/base' ? array('element'=>'in', 'offset'=>'col-sm-offset-2') : array('element'=>'show', 'offset'=>'offset-sm-2') ; 

		return $data;

    }

    public function load_admin_data()
    {
		$data['paid_payout'] = $this->db_model->sum('amount', 'withdraw_request', array('status' => 'Paid'));

		$data['leadership_paid']=$this->db_model->sum('amount', 'earning', array('type'=>"Leadership bonus"));

		$data['pending_payout'] = $this->db_model->sum('amount', 'withdraw_request', array('status' => 'Un-Paid')) + $this->db_model->sum('amount', 'withdraw_request', array('status' => 'Hold'));
		
		$this->db->select('amount')->from('earning');
		$this->db->like('type', 'Target', 'both');
		$data['target_income'] = array_sum(array_column($this->db->get()->result_array(), 'amount'));
		
		$data['roi'] = $this->db_model->sum('amount', 'earning', array('type' => 'ROI'));

		if((config_item('free_registration')=='Yes') &&(config_item('inactive_in_tree')=='No')){
			$data['packages'] = $this->db->query("
					select t1.pid, t4.plan_name, count(*)-1 as active_count, IFNULL(t3.Ic,0) as inactive_count from level_details as t1
					INNER JOIN
					(select id from member where STATUS = 'ACTIVE') as t2 on t1.userid = t2.id
                    LEFT JOIN
                    (select signup_package, count(*) as Ic from member where STATUS = 'Inactive') as t3 on t1.pid = t3.signup_package
                    INNER JOIN
                    (select id, plan_name from plans where type != 'Repurchase') as t4 on t1.pid = t4.id
                    group by 1
					")->result_array();	
		}else{
			$data['packages'] = $this->db->query("
					select t1.pid, t4.plan_name, count(*)-1 as active_count, 0 as inactive_count from level_details as t1
					INNER JOIN
                    (select id, plan_name from plans where type != 'Repurchase') as t4 on t1.pid = t4.id
                    where e_status = 1
                    group by 1
					")->result_array();	
		}

		$this->db->select('*')->where(array('type !=' =>'Repurchase'))->order_by('id', 'ASC');
		$plan=$this->db->get('plans')->result_array();

		$data['earnings'] = 0;
		$data['earnings_today'] = 0;
		$data['earnings_last_month'] = 0;
		
		$data['reg_income'] = 0;
		$data['reg_income_today'] = 0;
		$data['reg_income_last_month'] = 0;
		
		$data['admin_earnings'] = 0;
		$data['admin_earnings_today'] = 0;
		$data['admin_earnings_last_month'] = 0;
		
		$data['reg_income'] = $this->db_model->sum('amount','deductions',array('to_user'=>'admin', 'type'=>'Registration Fee'))+$this->db_model->sum('amount','deductions',array('to_user'=>'admin', 'type'=>'Account Activation')) + $this->db_model->sum('amount','transaction',array('to_userid'=>'admin', 'purpose'=>'Registration Fee','status'=>'Completed'))+ $this->db_model->sum('amount','deductions',array('to_user'=>'admin', 'type'=>'Upgrade Fee'));

		$data['reg_income_today'] = $this->db_model->sum('amount','deductions',array('to_user'=>'admin', 'type'=>'Registration Fee','CAST(date as DATE) ='=>date('Y-m-d')))+$this->db_model->sum('amount','deductions',array('to_user'=>'admin', 'type'=>'Upgrade Fee','CAST(date as DATE) ='=>date('Y-m-d')))+$this->db_model->sum('amount','deductions',array('to_user'=>'admin', 'type'=>'Account Activation', 'CAST(date as DATE) ='=>date('Y-m-d'))) + $this->db_model->sum('amount','transaction',array('to_userid'=>'admin', 'purpose'=>'Registration Fee','CAST(FROM_UNIXTIME(time) as DATE) ='=>date('Y-m-d'),'status'=>'Completed'));

		$data['reg_income_last_month'] = $this->db_model->sum('amount','deductions',array('to_user'=>'admin', 'type'=>'Registration Fee', 'CAST(date as DATE) <='=>date('Y-m-d', strtotime('last day of previous month')), 'CAST(date as DATE) >='=>date('Y-m-d', strtotime('first day of last month'))))+$this->db_model->sum('amount','deductions',array('to_user'=>'admin', 'type'=>'Account Activation', 'CAST(date as DATE) <='=>date('Y-m-d', strtotime('last day of previous month')), 'CAST(date as DATE) >='=>date('Y-m-d', strtotime('first day of last month')))) + $this->db_model->sum('amount','transaction',array('to_userid'=>'admin', 'purpose'=>'Registration Fee','CAST(FROM_UNIXTIME(time) as DATE) <='=>date('Y-m-d', strtotime('last day of previous month')),'CAST(FROM_UNIXTIME(time) as DATE) >='=>date('Y-m-d', strtotime('first day of last month')),'status'=>'Completed'));


		$data['admin_earnings'] = $data['admin_earnings'] + $this->db_model->sum('amount', 'earning',  array('userid' => 'admin'));
		$data['admin_earnings_today'] = $data['admin_earnings_today'] + $this->db_model->sum('amount', 'earning',  array('userid' => 'admin', 'date >=' => date('Y-m-d')));
		$data['admin_earnings_last_month'] = $data['admin_earnings_last_month'] + $this->db_model->sum('amount', 'earning',  array('userid' => 'admin', 'date <=' => date('Y-m-d', strtotime('last day of previous month')), 'date >=' => date('Y-m-d', strtotime('first day of last month'))));

		//debug_log('admineartoday' .$admin_earnings_today);
		//debug_log('adminear' .$admin_earnings);
		if(config_item('enable_crowdfund') != 'Yes'){
		   $data['earnings'] = $data['reg_income'] + $data['admin_earnings'];
		   $data['earnings_today'] = $data['reg_income_today'] + $data['admin_earnings_today'];
		   $data['earnings_last_month'] = $data['reg_income_last_month'] + $data['admin_earnings_last_month'];
		}else{
		    $data['earnings'] = $data['admin_earnings'];
		    $data['earnings_today'] = $data['admin_earnings_today'];
		    $data['earnings_last_month'] = $data['admin_earnings_last_month'];
		}
		//debug_log('earb4prdtoday' .$earnings_today);
		//debug_log('earb4prd' .$earnings);

		$data['earnings'] = $data['earnings'] + $this->db_model->sum('total_cost', 'product_sale',  array('product_id >' => 0, 'status'=>'completed'));
		//debug_log($this->db->last_query());
		//debug_log('adminear' .$earnings);
		$data['earnings_today'] = $data['earnings_today'] + $this->db_model->sum('total_cost', 'product_sale',  array('product_id >' => 0, 'status'=>'completed', 'deliver_date>=' => date('Y-m-d')));

		$data['earnings_last_month'] = $data['earnings_last_month'] + $this->db_model->sum('total_cost', 'product_sale',  array('product_id >' => 0, 'status'=>'completed', 'deliver_date <=' => date('Y-m-d', strtotime('last day of previous month')), 'deliver_date >=' => date('Y-m-d', strtotime('first day of last month'))));

		//debug_log($this->db->last_query());
		//debug_log('todaysear' .$earnings_today);

		$data['level_income'] = $this->db_model->sum('amount', 'earning', array('type' => 'Joining Purchase Commission')) + $this->db_model->sum('amount', 'earning', array('type' => 'Level Completion Income')) + $this->db_model->sum('amount', 'earning', array('type' => 'Self Purchase Commission')) + $this->db_model->sum('amount', 'earning', array('type' => 'Repurchase Commission'))+ $this->db_model->sum('amount', 'earning', array('type' => 'Level Referral Income')) + $this->db_model->sum('amount', 'earning', array('type' => 'Single Leg Income'));

		$data['direct_referral_income'] = $this->db_model->sum('amount', 'earning', array('type' => 'Referral Income')) + $this->db_model->sum('amount', 'earning', array('type' => 'Direct Referral Commission'));

		$data['upgrade_income'] = $this->db_model->sum('amount', 'earning', array('type' => 'User plan upgrade fee commission'));

		$data['first_pair_income'] = $this->db_model->sum('amount', 'earning', array('type' => 'First Pair Matching Comm'));
		$data['matching_income'] = $this->db_model->sum('amount', 'earning', array('type' => 'Binary Commission'));

		$data['admin_charge_income'] = $this->db_model->sum('amount', 'earning', array('type' => 'Admin Charge for the Payout'));

		$this->db->select('amount')->from('deductions');
		$this->db->like('type', 'Upgrade', 'both');
		$data['deductions'] = array_sum(array_column($this->db->get()->result_array(), 'amount'));

		$data['member_income'] = $this->db_model->sum('amount', 'earning', array('name !=' =>'admin'));

		$data['wallet_balance'] = $this->db_model->sum('balance', 'wallet');
		$data['voucher_balance'] = $this->db_model->sum('balance', 'voucher');

		$data['member_purchase']=$this->db_model->sum('payment_amt', 'tbl_transaction', array('gateway !='=>'voucher'));
		$data['shop_wallet'] = $this->db_model->sum('balance', 'other_wallet',  array('type' => 'Repurchase'));
		$data['repurchase_deduct'] = $this->db_model->select('repurchase_deduct', 'payout');

		$data['root_user'] = $this->db_model->select_multi('*','member', array('id'=>config_item('top_id')));
		$data['total_active'] = $this->db_model->count_all('member', array('status'=>'Active'))-1;
		$data['total_inactive'] = $this->db_model->count_all('member', array('status'=>'Inactive'));

		$this->db->select('*')->from('member')->order_by('secret', 'DESC')->limit(10);
        $data['latest_members']    = $this->db->get()->result_array();

        $data['style'] = config_item('admin_theme')=='admin/default/base' ? array('element'=>'in', 'offset'=>'col-sm-offset-2') : array('element'=>'show', 'offset'=>'offset-sm-2') ; 

		$sql = "select * from dummy where address = '".$_SERVER['REMOTE_ADDR']."' limit 1";
		debug_log($sql);
		$data['dummydata'] = $this->db->query($sql)->result_array()[0];
		return $data;
	}
	
	public function checkUser($userid){
		$check = $this->db_model->select('id', 'member', array('id' => $userid));
    
        if($check>0){
			return true;
		}else{
			return false;
		}
	}

	public function checkAdmin($username){
		$check = $this->db_model->select('id', 'admin', array('username' => $username));
    
        if($check>0){
			return true;
		}else{
			return false;
		}
	}
	function get_Alltheme(){
		$query	= $this->db->select(array('*'));
		$where	= array('enabled'=>1);
		$query	= $this->db->where($where);
		$query	= $this->db->get('themes_setting');
		$result	= $query->result();
		return $result;
	}
	function select_themebyid($id){
		$query	= $this->db->select(array('*'));
		$where	= array('id'=>$id,'enabled'=>1);
		$query	= $this->db->where($where);
		$query	= $this->db->get('themes_setting');
		$result	= $query->row();
		return $result;
	}

    public function get_Dbdata($table,$where, $order = false, $single = FALSE){
		if($order){
			foreach($order as $set =>$value){				
	            $this->db->order_by($set,$value);
			}
		}
        $this->db->where($where);
		$this->_table_name = $table;
      	if($single == TRUE) {
            $method = 'row';
        }
        else {
            $method = 'result';
        }
        return $this->db->get($this->_table_name)->$method();
    }

    public function get_meeting_member_details($id)
    {

        $this->db->where('id', $id);
        return $this->db->get('member');
    }

    public function get_all_member_details($id)
    {

        $this->db->where('id', '1');
        return $this->db->get('admin');
    }
    public function get_live_meeting_details($id)
    {
    	return $this->db->get_where('live_meeting', array('id' => $id))->row_array();
    }

    public function get_member_detils($user_id)
    {
        
        $this->db->where('id', $user_id);
        return $this->db->get('member');
    }
    public function get_admin_detils($userid)
    {
        $this->db->where('id', $userid);
        return $this->db->get('admin');
    }

    public function register_user($data12)
    {
        debug_log('register_user');
        debug_log($data12);
        $result=$this->register_at_lms($data12);
    }

    public function register_at_lms($data12)
    {
        $data = array(
            "id" => $data12['id'],
            "first_name"=>$data12['name'],
            "sponsor_id"=>$data12['sponsor'],
            "position"=>$data12['position'],
            "leg"=>$data12['leg'],
            "email"=>$data12['email'],
            "password"=>$data12['password'],
            "affiliate_password"=>$data12['affiliate_password'],
            );

        debug_log('register_at_lms');
        debug_log($value);
        debug_log('APIURL');
        debug_log(APIURL);

        $curl = curl_init();

	      curl_setopt_array($curl, array(
	        CURLOPT_URL =>APIURL."Api/registerr_from_mlms",
	        CURLOPT_RETURNTRANSFER => true,
	        CURLOPT_ENCODING => "",
	        CURLOPT_MAXREDIRS => 10,
	        CURLOPT_TIMEOUT => 30,
	        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	        CURLOPT_CUSTOMREQUEST => "POST",
	        CURLOPT_POSTFIELDS => json_encode($data),
	        CURLOPT_HTTPHEADER => array(
	          "cache-control: no-cache",
	          "content-type: application/json"
	        ),
	      ));

	      $response = curl_exec($curl);
	      debug_log('lms response');
	        debug_log($response);
	      $err = curl_error($curl);
	       debug_log('lms response errors');
	       debug_log($err);
	      $response= \json_decode($response);
	      curl_close($curl);
        return $result;
    }
	function update_user_rank(){


		debug_log("welcome to user upgrade:=>>>>>>");
		$this->db->select('*');
		$this->db->where(array('status'=>'Active'));
		$this->db->order_by('id','ASC');
		$data	= $this->db->get('member')->result();
		if($data){
			foreach($data as $set_data){
				$array	= array('Silver Diamond','Gold Diamond','Blue Diamond','Green Diamond','Purple Diamond','Red Diamond','Black Diamond','Crown Diamond');
				if($set_data->signup_package==1){
					$rank	= 'Starter';
				}
				elseif($set_data->signup_package==2){
					$rank	= 'Jade';
				}
				elseif($set_data->signup_package==3){
					$rank	= 'Pearl';
				}
				elseif($set_data->signup_package==4){
					$rank	= 'Sapphire';
				}
				elseif($set_data->signup_package==5){
					$rank	= 'Ruby';
				}
				elseif($set_data->signup_package==6){
					$rank	= 'Emrald';
				}
				elseif($set_data->signup_package==7){
					$rank	= 'Diamond';
					$count_pur	= $this->db_model->sum('total_amt', 'tbl_order_details',array('user_id' => $set_data->id));
					$userA	= $this->db_model->select('A', 'member',array('id' => $set_data->id));
					$userB	= $this->db_model->select('B', 'member',array('id' => $set_data->id));
					$signup_packageA	= $this->db_model->select('signup_package', 'member',array('id' => $userA));
					$signup_packageB	= $this->db_model->select('signup_package', 'member',array('id' => $userB));
					$userA_S  = $this->db_model->select('secret', 'member',array('id' => $userA));
					$userB_S  = $this->db_model->select('secret', 'member',array('id' => $userB));
					$A_down   = $this->downline_model->calculate_downline($userA,$signup_packageA);
					$B_down   = $this->downline_model->calculate_downline($userB,$signup_packageB);
					if(!empty($userA_S)){
						if(!empty($A_down)){
							$A_down  .= ','.$userA_S;
						}
						else{
							$A_down  .= $userA_S;
						}
					}
					//echo $A_down;die;
					if(!empty($userB_S)){
						if(!empty($B_down)){
							$B_down  .= ','.$userB_S;
						}
						else{
							$B_down  .= $userB_S;
						}
					}
					//echo $B_down.'<br>';
					if(!empty($A_down)&&!empty($B_down)){
						//Check blue diamond in downline
						$query	= "SELECT COUNT(id) as r_count from member WHERE rank='Blue Diamond' and secret IN(".$A_down.")";
						$blue_rank_downA	= $this->db->query($query)->row();
						$sql	= "SELECT COUNT(id) as r_count from member WHERE rank='Blue Diamond' and secret IN(".$B_down.") and placement_leg='B'";
						$blue_rank_downB	= $this->db->query($sql)->row();
	
						//Check Green diamond in downline
						$query	= "SELECT COUNT(id) as r_count from member WHERE rank='Green Diamond' and secret IN(".$A_down.") and placement_leg='A'";
						$green_rank_downA	= $this->db->query($query)->row();
						$sql	= "SELECT COUNT(id) as r_count from member WHERE rank='Green Diamond' and secret IN(".$B_down.") and placement_leg='B'";
						$green_rank_downB	= $this->db->query($sql)->row();
	
						//Check Purple diamond in downline
						$query	= "SELECT COUNT(id) as r_count from member WHERE rank='Purple Diamond' and secret IN(".$A_down.") and placement_leg='A'";
						$purple_rank_downA	= $this->db->query($query)->row();
						$sql	= "SELECT COUNT(id) as r_count from member WHERE rank='Purple Diamond' and secret IN(".$B_down.") and placement_leg='B'";
						$purple_rank_downB	= $this->db->query($sql)->row();
	
						//Check Red diamond in downline
						$query	= "SELECT COUNT(id) as r_count from member WHERE rank='Red Diamond' and secret IN(".$A_down.") and placement_leg='A'";
						$red_rank_downA	= $this->db->query($query)->row();
						$sql	= "SELECT COUNT(id) as r_count from member WHERE rank='Red Diamond' and secret IN(".$B_down.") and placement_leg='B'";
						//Check Black diamond in downline
						$query	= "SELECT COUNT(id) as r_count from member WHERE rank='Black Diamond' and secret IN(".$A_down.") and placement_leg='A'";
						$red_rank_downA	= $this->db->query($query)->row();
						$sql	= "SELECT COUNT(id) as r_count from member WHERE rank='Black Diamond' and secret IN(".$B_down.") and placement_leg='B'";
						$red_rank_downB	= $this->db->query($sql)->row();
					}

					$user_ID	= $this->downline_model->calculate_downline($set_data->id,$set_data->signup_package);
					$user_ids	= explode(',',$user_ID);
					$gcount_pur	= 0;
					if($user_ids){
						foreach($user_ids as $set_id){
							$U_id	= $this->db_model->select('id','member',array('secret'=>$set_id));
							$g_pur	= $this->db_model->sum('total_amt', 'tbl_order_details',array('user_id' => $U_id));
							$gcount_pur	= ($gcount_pur+$g_pur);
						}
					}
					$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_data->id )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_data->id ));
					if($binary_income>=1050&&$count_pur>=100){
						$rank	= 'Silver Diamond';
					}
					if($binary_income>=5200&&$count_pur>=500){
						$rank	= 'Gold Diamond';
					}
					if($binary_income>=10500&&$count_pur>=500&&$gcount_pur>=1000){
						$rank	= 'Blue Diamond';
					}
					if($blue_rank_downA->r_count>=1&&$blue_rank_downB->count>=1){
						$rank	= 'Green Diamond';
					}
					if($green_rank_downA->r_count>=1&&$green_rank_downB->r_count>=1){
						$rank	= 'Purple Diamond';
					}
					if($purple_rank_downA->r_count>=1&&$purple_rank_downB->r_count>=1){
						$rank	= 'Red Diamond';
					}
					if($red_rank_downA->r_count>=1&&$red_rank_downB->r_count>=1){
						$rank	= 'Black Diamond'; 
					}
					if($black_rank_downA->r_count>=1&&$black_rank_downB->r_count>=1){
						$rank	= 'Crown Diamond';
					}
				}
				$this->db->where(array('id'=>$set_data->id));
				$this->db->set(array('rank'=>$rank));
				$this->db->update('member');
			}
		}
	}
}
