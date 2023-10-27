<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Cron extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('earning');
		$this->load->model('downline_model');
		$this->load->model('custom_income');
	}

	public function index()
	{
		
		if(config_item('roi_income')=='Yes'){
			$this->status();
			debug_log('Status Updated');
			$this->roi();
			debug_log('ROI Credited');
		}
		
		$this->update_wallet();
		debug_log('Wallet Updated');
		$this->update_leg();
		debug_log('Leg Count Updated');

		if(config_item('target_income')=='Yes'){
			$this->target_reach_income();
			debug_log('Flexi Income Updated');	
		}
		
		if(config_item('level_income')=='Yes'){
			//$this->level_completion_income();
			//debug_log('Level Wise Income Updated');
			//$this->single_leg_income();
			//debug_log('Single Leg Income Updated');	
		}
		
		if(config_item('roi_income')=='Yes'){
			$this->earning->level_completion_roi_income();
			debug_log('Level Wise ROI Income Updated');
		}

		if(config_item('enable_reward')=='Yes'){
			$this->reward();
			debug_log('Rewards Updated');
			$this->rank_update();
			debug_log('Rank Updated');
		}

		if(config_item('enable_royalty')=='Yes'){
			debug_log('Royalty Income Updated');
		}

		$this->update_wallet();
		debug_log('Wallet Updated');

		debug_log('Cron Executed Successfully');
		
	}

	public function calibrate_users()
	{
		$users = $this->db->query('SELECT userid, count(*) as cnt FROM `level_details` GROUP by 1 having cnt <5')->result();
		$pids = $this->db->query('SELECT distinct id FROM `plans`')->result();

		foreach ($users as $user) {
			$userid = $user->userid;
			foreach ($pids as $pid) {
				$query = $this->db->query("SELECT id FROM level_details where userid = $userid and pid = $pid");
            	if(!$query->num_rows()>0){
            			$this->yourfuncton($userid,$pid);
            	}	
			}
		}
	}




	public function register()
	{
		$this->downline_model->simulate_registration();
	}

	public function globalcart(){
		if(config_item('enable_club_income')=='Yes'){
			debug_log('Globalcart Club Income Started');
			$this->custom_income->global_club_income();
			debug_log('Globalcart Club Income Updated');
		}
	}

	public function credit_binary()
	{
		$this->earning->credit_binary_commission_all();
	}

	public function update_binary_position($from, $to, $leg)
	{
		$this->downline_model->update_binary_position($from, $to, $leg);
	}

	public function calibrate_tree()
	{
		debug_log('calibrate_tree');
		$this->downline_model->calibrate_tree();
	}

	public function calibrate_total_downline()
	{
		debug_log('calibrate_total_downline');
		$this->downline_model->calibrate_total_downline(array());
	}

	public function calibrate_level_details()
	{
		debug_log('calibrate_level_details');
		$this->downline_model->calibrate_level_details();	
	}

	public function mission_arogyam()
	{
		$this->custom_income->mission_arogyam_group_income();
		$this->custom_income->mission_arogyam_club_income();
	}

	private function nwi()
	{
		if(config_item('ideal_plan') == 'Yes') {
			//$this->earning->idle_non_working_income();
			//$this->earning->idle_rank_income();	
			//$this->earning->p2n_rank_income();
		}
		
	}		

	private function status()
	{
		$count_plan_renewal = $this->db_model->count_all('plans', array('recurring_fee >' => 0));

		if (0 < $count_plan_renewal) {
			$this->earning->update_status();
		}
	}

	public function update_leg()
	{
		$this->downline_model->update_legs(array());
	}

	public function custom_income()
	{
		$this->custom_income->index();
	}

	public function target_reach_income()
	{
		
		$this->earning->target_reach_income();
	}

	public function level_completion_income($pd='')
	{
		if(config_item('width') != 1)
		{
		$this->earning->level_completion_income($pd);
		}
	}

	public function single_leg_income()
	{
		if(config_item('width')==1)
		{
			$this->earning->single_leg_income();		
		}
	}

	//insert into transaction table when user clicks on pay using coinpayment button
	public function insert_into_transaction($uid)
	{
		//if details are already inserted into the table dont insert it again
		debug_log("inside insert into transaction");
		//print_r("die");die();
		debug_log($this->session->_type_);
		$type = $this->session->_type_ == 'wallet' ? 'Wallet Topup' : 'Registration Fee';
		debug_log($type);
		if($type=="Registration Fee")
		{
			debug_log("registration fee topup");
			$td = $this->db_model->select_multi("*", 'transaction', array('userid' =>$this->session->_user_id_,'email_id'=>$this->session->_email_,'purpose'=>$type));
			debug_log($this->db->last_query());
			debug_log($td->userid);
            if($td->userid =="")
            {
		       $array = array(
                        'userid'         => $this->session->_user_id_,
                        'name'           => $this->session->_user_name_,
                        'email_id'       =>$this->session->_email_,
                        'amount'         => $this->session->_price_,
                        'gateway'        => 'Coinpayments.net',
                        'time'           => time(),
                        'purpose'        => $type,
                        'status'         => "Started",
                        );
               $this->db->insert('transaction', $array);
               debug_log($this->db->last_query());
            }
            else{
    	        debug_log("td is not null");
                }
        }
        else
        {
        	//$time=date('Y-m-d H:i:s',1589546894 );
        	//debug_log($time);
        	//$td = $this->db_model->select_multi("*", 'transaction', array('userid' =>$this->session->_user_id_,'email_id'=>$this->session->_email_,'purpose'=>$type,'Status'=>"Started"));
        	//debug_log("else part where topup  option");
        	//if($td->userid=="")
        	//{
  	          $array = array(
              'userid'         => $this->session->_user_id_,
              'name'           => $this->session->_user_name_,
              'email_id'       => $this->session->_email_,
              'amount'         => $this->session->_price_,
              'gateway'        => 'Coinpayments.net',
              'time'           => time(),
              'purpose'        => $type,
              'status'         => "Started",
               );
              $this->db->insert('transaction', $array);
              debug_log($this->db->last_query());
            //} 
        } 
	}


	/*private function binary_payout()
	{
		$count_product_binary = $this->db_model->count_all('product', array('matching_income >' => 0));
		$count_fix_binary = $this->db_model->select('binary_income', 'fix_income', array('1 >' => 0));
		$count_invst_binary = $this->db_model->select('matching_income', 'investment_pack', array(0));
		if ((0 < $count_product_binary) || (0 < $count_fix_binary) || (0 < $count_invst_binary)) {
			$this->db->select('id,total_a,total_b,paid_a,paid_b,signup_package,mypv,total_a_matching_incm,total_b_matching_incm, total_c_matching_incm, paid_a_matching_incm, paid_b_matching_incm')->from('member')->where('topup >', '0')->where('total_a >', 0)->where('total_b >', 0)->where('paid_a <', 'total_a', false)->where('paid_b <', 'total_b', false);
			$data = $this->db->get()->result();

			foreach ($data as $result) {
				$this->load->model('earning');
				$data2 = array('total_a' => $result->total_a, 'total_b' => $result->total_b, 'paid_a' => $result->paid_a, 'paid_b' => $result->paid_b, 'signup_package' => $result->signup_package, 'mypv' => $result->mypv, 'total_a_matching_incm' => $result->total_a_matching_incm, 'total_b_matching_incm' => $result->total_b_matching_incm, 'total_c_matching_incm' => $result->total_c_matching_incm, 'paid_a_matching_incm' => $result->paid_a_matching_incm, 'paid_b_matching_incm' => $result->paid_b_matching_incm);
				$this->earning->process_binary($result->id, $data2);
			}
		}
	}*/

	public function roi()
	{
		$count_product_roi = $this->db_model->count_all('plans', array('roi >' => 0));

		if (0 < $count_product_roi) {
			$this->earning->roi_earning();
		}
	}


	public function reward()
	{
		$this->load->model('earning');
		$this->earning->reward_process();
	}

	public function rank_update()
	{
		$this->load->model('earning');
		$this->earning->rank_process();
	}

	public function investment()
	{
		$this->load->model('investment');
		$this->investment->generate();
	}

	public function update_wallet()
	{
		$this->load->model('earning');
		$this->earning->payout(array());	
	}

	/*public function admin_topup()
	{
		redirect('users/topup-member');
	}*/

	public function member()
	{
		redirect('member');
	}

	public function generate_payout()
	{
		redirect('wallet/generate-payout');
	}

	public function complete_registration()
	{
		$this->load->dbutil();
		$this->dbutil->optimize_database();
		redirect('site/complete_registration');
	}

	public function check_user()
	{
		$user = trim($this->input->post('user'));

		if (0 < $this->db_model->count_all('franchisee', array('username' => $user))) {
			echo '<span style="color: red; background-color: moccasin">The Username is Taken !</span>';
		}
		else {
			echo '<span style="color: green; background-color: #d6e9c6">The Username is Available !</span>';
		}
	}

	public function get_stock_qty()
	{
		$fran_id = $this->input->post('fran_id');
		$prod_name = $this->input->post('prod');
		$prodid = $this->db_model->select('id', 'product', array('prod_name' => $prod_name));
		$qty = $this->db_model->select('available_qty', 'franchisee_stock', array('franchisee_id' => $fran_id, 'product_id' => $prodid));

		if ($qty == '') {
			$qty = 0;
		}

		echo $qty;
	}

	public function get_products()
	{
		$data = trim($this->input->get('term'));
		$this->db->select('prod_name')->from('product')->where('status', 'Selling')->where('qty !=', '0')->like('prod_name', $data, 'BOTH');
		$data = $this->db->get()->result();

		foreach ($data as $val) {
			$res[] = $val->prod_name;
		}

		echo json_encode($res);
	}

	public function get_own_products()
	{
		$data = trim($this->input->get('term'));
		$this->db->select('id')->from('product')->like('prod_name', $data, 'BOTH');
		$data = $this->db->get()->result();

		foreach ($data as $val) {
			$res[] = $val->prod_name;
		}

		echo json_encode($res);
	}

	public function get_wallet_balance($uid)
	{	
		debug_log('Enter wallet balance');
		$uid = $this->common_model->filter($uid);
		$balance = $this->db_model->select('balance', 'wallet', array('userid' => $uid));
		debug_log($balance);
		echo $balance;
	}

	public function get_repurchase_balance($uid)
	{
		$uid = $this->common_model->filter($uid);
		$balance = $this->db_model->select('balance', 'other_wallet', array('userid' => $uid, 'type'=>'Repurchase'));
		echo $balance;
	}

	public function dev_mode($type)
	{
		if($type=='0')
		{
			$data = array('description' => '0',);
        	$this->db->where('type', 'dev_mode');
        	$this->db->update('settings', $data);
		}
		else if($type == '1')
		{
			$data = array('description' => '1',);
        	$this->db->where('type', 'dev_mode');
        	$this->db->update('settings', $data);
		}
	}

	public function get_lead_kpis()
	{
	    
	    $kpi1 = $this->db->query("SELECT cast(`contact_date` as date) as contact_date, count(google) as google, count(google_lead) as google_lead, 
                                count(capterra) as capterra, count(capterra_lead) as capterra_lead, 
                                count(*)-count(google)-count(capterra) as organic, 
                                count(total_lead) - count(google_lead) - count(capterra_lead) as organic_lead,
                                count(*) as total, 
                                count(total_lead) as total_lead
                                from
                                	(
                                  		select cast(contact_date as date) as contact_date,address,
                                        Case when `activity` like '%google%' then 1 end google,
                                        Case when `activity` like '%google%' and dummy_text != '' then 1 end google_lead,
                                        Case when `activity` like '%capterra%' then 1 end capterra,
                                        Case when `activity` like '%capterra%' and dummy_text != '' then 1 end capterra_lead,
                                        Case when dummy_text != '' then 1 end total_lead
                                        from dummy
                                        group by 1,2,3,4,5,6,7
                                        #having contact_date = '2022-03-26'
                                        order by 1 desc
                                     )
                                dummy
                                group by 1
                                order by 1 desc
                                limit 10
                            ")->result_array();
	    
	    $col_names = array("id","contact_date","google","google_lead","capterra","capterra_lead","organic","organic_lead","total","total_lead");
	    screen_log($this->db_model->printTable($kpi1,$col_names,$col_names));
	    
	    //$this->db_model->mail('m.sunil@mayuraconsultancy.com','Lead Report',get_table_email($kpi1,$col_names,$col_names,"Lead Report"));
	    
	    $kpi2 = $this->db->query("SELECT yr_month, count(google) as google, count(google_lead) as google_lead, 
                                count(capterra) as capterra, count(capterra_lead) as capterra_lead, 
                                count(*)-count(google)-count(capterra) as organic, 
                                count(total_lead) - count(google_lead) - count(capterra_lead) as organic_lead,
                                count(*) as total, 
                                count(total_lead) as total_lead
                                from
                                	(
                                  		select DATE_FORMAT(cast(contact_date as date),'%Y-%m') AS yr_month,address,
                                        Case when `activity` like '%google%' then 1 end google,
                                        Case when `activity` like '%google%' and dummy_text != '' then 1 end google_lead,
                                        Case when `activity` like '%capterra%' then 1 end capterra,
                                        Case when `activity` like '%capterra%' and dummy_text != '' then 1 end capterra_lead,
                                        Case when dummy_text != '' then 1 end total_lead
                                        from dummy
                                        group by 1,2,3,4,5,6,7
                                        #having contact_date = '2022-03-26'
                                        order by 1 desc
                                     )
                                dummy
                                group by 1
                                order by 1 desc
                                limit 6
                            ")->result_array();
	    
	    $col_names1 = array("id","yr_month","google","google_lead","capterra","capterra_lead","organic","organic_lead","total","total_lead");
	    screen_log($this->db_model->printTable($kpi2,$col_names1,$col_names1));
	    
	    $this->db_model->mail('m.sunil@mayuraconsultancy.com','Lead Report',get_table_email($kpi1,$col_names,$col_names,"Daily Lead Report").'<br>'.get_table_email($kpi2,$col_names1,$col_names1,"Monthly Lead Report"));
	    
	    /*screen_log('Demo Visits by Country by Google Ads');
	    $kpi1 = $this->db->query("SELECT country, count(*) as count FROM `dummy` where activity like '%google%' group by 1 order by 2 desc")->result_array();
	    $col_names = array("country","count");
	    screen_log($this->db_model->printTable($kpi1,$col_names,$col_names));
	    
	    $kpi1 = $this->db->query("SELECT count(*) as Total_Count FROM `dummy` where activity like '%demo%' ")->result_array();
	    $col_names = array("Total_Count");
	    screen_log($this->db_model->printTable($kpi1,$col_names,$col_names));
	    
	    screen_log('Demo Visits by Country by Ads who submitted the details');
	    $kpi1 = $this->db->query("SELECT country, count(*) as count FROM `dummy` where activity like '%demo%' and dummy_text != '' group by 1 order by 2 desc")->result_array();
	    $col_names = array("country","count");
	    screen_log($this->db_model->printTable($kpi1,$col_names,$col_names));
	    
	    $kpi1 = $this->db->query("SELECT count(*) as Total_Count FROM `dummy` where activity like '%demo%' and dummy_text != '' ")->result_array();
	    $col_names = array("Total_Count");
	    screen_log($this->db_model->printTable($kpi1,$col_names,$col_names));
	    
	    screen_log('Demo Visits by Country by Ads who submitted the details and verified');
	    $kpi1 = $this->db->query("SELECT country, count(*) as count FROM `dummy` where activity like '%demo%' and dummy_side_verified = 'verified' group by 1 order by 2 desc")->result_array();
	    $col_names = array("country","count");
	    screen_log($this->db_model->printTable($kpi1,$col_names,$col_names));
	    
	    $kpi1 = $this->db->query("SELECT count(*) as Total_Count FROM `dummy` where activity like '%demo%' and dummy_side_verified = 'verified' ")->result_array();
	    $col_names = array("Total_Count");
	    screen_log($this->db_model->printTable($kpi1,$col_names,$col_names));
	    
	    screen_log('Demo Visits by Country by Organic');
	    $kpi1 = $this->db->query("SELECT country, count(*) as count FROM `dummy` where activity not like '%demo%' group by 1 order by 2 desc")->result_array();
	    $col_names = array("country","count");
	    screen_log($this->db_model->printTable($kpi1,$col_names,$col_names));
	    
	    $kpi1 = $this->db->query("SELECT count(*) as Total_Count FROM `dummy` where activity not like '%demo%' ")->result_array();
	    $col_names = array("Total_Count");
	    screen_log($this->db_model->printTable($kpi1,$col_names,$col_names));
	    
	    screen_log('Demo Visits by Country by Organic who submitted the details');
	    $kpi1 = $this->db->query("SELECT country, count(*) as count FROM `dummy` where activity not like '%demo%' and dummy_text != '' group by 1 order by 2 desc")->result_array();
	    $col_names = array("country","count");
	    screen_log($this->db_model->printTable($kpi1,$col_names,$col_names));
	    
	    $kpi1 = $this->db->query("SELECT count(*) as Total_Count FROM `dummy` where activity not like '%demo%' and dummy_text != '' ")->result_array();
	    $col_names = array("Total_Count");
	    screen_log($this->db_model->printTable($kpi1,$col_names,$col_names));
	    
	    screen_log('Demo Visits by Country by Organic who submitted the details and verified');
	    $kpi1 = $this->db->query("SELECT country, count(*) as count FROM `dummy` where activity not like '%demo%' and dummy_side_verified = 'verified' group by 1 order by 2 desc")->result_array();
	    $col_names = array("country","count");
	    screen_log($this->db_model->printTable($kpi1,$col_names,$col_names));
	    
	    $kpi1 = $this->db->query("SELECT count(*) as Total_Count FROM `dummy` where activity not like '%demo%' and dummy_side_verified = 'verified' ")->result_array();
	    $col_names = array("Total_Count");
	    screen_log($this->db_model->printTable($kpi1,$col_names,$col_names));
	    */
	    
	}
	
	public function get_lead_details($verified='', $exclude_local='', $demo_server = '', $source = '', $start='', $end='')
	{
	    
	    $url_components = parse_url(basename($_SERVER['REQUEST_URI'])); 
	    parse_str($url_components['query'], $data);
	    $verified = $data['verified'];
	    $exclude_local = $data['exclude_local'];
	    $demo_server = $data['demo_server'];
	    $source = $data['source'];
	    $start = $data['start'];
	    $end = $data['end'];
	    $asc = $data['asc'];
	    $limit = $data['limit'];
	    $contact_date = $data['contact_date'];
	    $complete = $data['complete'];
	    $contact_end = $data['contact_end'];
	    $activity = $data['activity'];
	    $date = $data['date'];
	    
	    if($limit==1){
            $this->db->select("id, dummy_text, concat(country_code,dummy_values) as dummy_values, dummy_side,dummy_side_verified,CONCAT(node,'<br>(',form_country,')') as node,  from_unixtime((time+19800), '%D %M %h:%i %p') as time, time as unix_time, substring(activity,-100) as activity")->from('dummy');	        
	    }else if($activity ==''){
	        $this->db->select("id, dummy_text, concat(country_code,dummy_values) as dummy_values, dummy_side,dummy_side_verified,
	        CASE
                WHEN form_country IS NOT NULL THEN CONCAT(node,'<br>(',form_country,')')
                ELSE node
            END AS node, 
            from_unixtime(time+19800, '%D %M %h:%i %p') as time, time as unix_time, activity")->from('dummy');
	    }else{
	        $this->db->select("id, dummy_text, concat(country_code,dummy_values) as dummy_values, dummy_side,dummy_side_verified,CONCAT(node,'<br>(',form_country,')') as node,  from_unixtime((time+19800), '%D %M %h:%i %p') as time, time as unix_time, '' as activity")->from('dummy');	        
	    }
	    
	   
	    if ($verified !== "") {
	        if($verified==1){
	            $this->db->where('dummy_side_verified', 'verified');
	            $this->db->where('dummy_text !=', '');
	        }
	        elseif($verified==2){
	            $this->db->where('dummy_side_verified', 'not verified');
	            $this->db->where('dummy_text !=', '');
	        }
	        elseif($verified==3){
	            $this->db->where('dummy_text !=', '');
	        }
	    }
	    if($exclude_local != ''){
	        if($exclude_local == 1){ 
	            $this->db->where('country !=', 'India');       
	            $this->db->where('country !=', 'India (+91)');       
	        }
	    }
	    if($demo_server != ''){
	        if($demo_server ==1){
	            $this->db->like('activity','demo');    
	        }
	    }
	    
	    if($source != ''){
	        if($source == 'google'){
	            $this->db->where("(activity LIKE '%google %' OR activity LIKE '%google_ads %')", NULL, FALSE);
	        }else{
	            $this->db->like('activity',$source.' ');    
	        }
	    }
	    
	    if($start != ''){
	        $this->db->where('time >=',$start);
	    }
	    
	    if($end != ''){
	        $this->db->where('time <=',$end);
	    }
	    
	    if($contact_date != ''){
	        $this->db->where('contact_date >=',$contact_date);
	    }
	    
	    if($contact_end != ''){
	        $this->db->where('contact_date <=',$contact_end);
	    }
	    
	    if($date != ''){
	        $this->db->where('DATE(contact_date)',$date);
	    }
	    
	    $this->db->not_like('dummy_side', 'mayuraconsultancy');
	    $this->db->where('dummy_side !=', 'shruthi.vr94@gmail.com');       
	    $this->db->where('dummy_side !=', 'm.sunil104@yahoo.co.in');       
	    $this->db->not_like('dummy_side', 'mayura');
	    $this->db->not_like('dummy_side', 'anshulkuntewar1229@gmail.com');
	    $this->db->not_like('dummy_side', 'komalathatati33@gmail.com');
	    $this->db->not_like('dummy_side', 'swatiraj96tly@gmail.com');
	    $this->db->not_like('dummy_side', 'monikakumari27012@gmail.com');
	    $this->db->not_like('dummy_side', 'mayurichaudhari57@gmail.com');
	    $this->db->not_like('dummy_side', 'shraddha.bhoge95@gmail.com');
	    $this->db->not_like('dummy_side', 'test@gmail.com');
	    $this->db->not_like('dummy_side', 'navjottomer@gmail.com');
	    $this->db->not_like('address', '209.85.238');
	    $this->db->not_like('address', '69.49.234.90');
	    $this->db->not_like('address', '66.249.65.127'); #google
	    $this->db->not_like('dummy_side', 'someone@example.com');
	    $this->db->not_like('dummy_side', 'mayurichaudhari57@gmlm.com');
	    $this->db->not_like('dummy_side', 'rubysharub23@gmail.com');
	    $this->db->not_like('dummy_side', 'mayurichaudhari87@gmail.com');
	    $this->db->not_like('dummy_side', 'test@test.com');
	    $this->db->not_like('dummy_side', 'smaya4ma@btcmod.com');
	    $this->db->not_like('dummy_side', 'temanearnplanet@gmail.com');
	    
	    $this->db->not_like('activity', 'www.abhayasena.com');
	    
	    if($asc == 1 ){
	        $this->db->order_by('id','DESC');
	    }else{
	        $this->db->order_by('unix_time','DESC');
	    }
	    
	    if($complete != 1 ){
	        $this->db->limit(500);
	    }
	    
	    $output = $this->db->get()->result_array();
	    
	    //debug_log($this->db->last_query());
	    
	    $col_names = array("id","dummy_text","dummy_values","dummy_side","dummy_side_verified","node","time","activity");
	    $dis_names = array("id","Name","Phone","Email","Verified","Address","Recent Visit","Activity");
	    screen_log($this->db_model->printTable($output,$col_names,$dis_names));
	}
	
	public function get_lead_activity($verified='', $exclude_local='', $demo_server = '', $source = '', $start='', $end='')
	{
	    
	    $url_components = parse_url(basename($_SERVER['REQUEST_URI'])); 
	    parse_str($url_components['query'], $data);
	    $verified = $data['verified'];
	    $exclude_local = $data['exclude_local'];
	    $demo_server = $data['demo_server'];
	    $source = $data['source'];
	    $start = $data['start'];
	    $end = $data['end'];
	    $asc = $data['asc'];
	    $limit = $data['limit'];
	    $contact_date = $data['contact_date'];
	    $complete = $data['complete'];
	    
	    if($limit==1){
            $this->db->select("id, dummy_text, CONCAT(node,'<br>(',form_country,')') as node,  from_unixtime((time+19800), '%D %M %h:%i %p') as time, time as unix_time, substring(activity,-100) as activity")->from('dummy');	        
	    }else{
	        $this->db->select("id, dummy_text,
	        CASE
                WHEN form_country IS NOT NULL THEN CONCAT(node,'<br>(',form_country,')')
                ELSE node
            END AS node, 
            from_unixtime(time+19800, '%D %M %h:%i %p') as time, time as unix_time, activity")->from('dummy');
	    }
	    
	   
	    if ($verified !== "") {
	        if($verified==1){
	            $this->db->where('dummy_side_verified', 'verified');
	            $this->db->where('dummy_text !=', '');
	        }
	        elseif($verified==2){
	            $this->db->where('dummy_side_verified', 'not verified');
	            $this->db->where('dummy_text !=', '');
	        }
	        elseif($verified==3){
	            $this->db->where('dummy_text !=', '');
	        }
	    }
	    if($exclude_local != ''){
	        if($exclude_local == 1){ 
	            $this->db->where('country !=', 'India');       
	            $this->db->where('country !=', 'India (+91)');       
	        }
	    }
	    if($demo_server != ''){
	        if($demo_server ==1){
	            $this->db->like('activity','demo');    
	        }
	    }
	    
	    if($source != ''){
	        if($source == 'google'){
	            $this->db->where("(activity LIKE '%google %' OR activity LIKE '%google_ads %')", NULL, FALSE);
	        }else{
	            $this->db->like('activity',$source.' ');    
	        }
	    }
	    
	    if($start != ''){
	        $this->db->where('time >=',$start);
	    }
	    
	    if($end != ''){
	        $this->db->where('time <=',$end);
	    }
	    
	    if($contact_date != ''){
	        $this->db->where('contact_date >=',$contact_date);
	    }
	    
	    
	    $this->db->not_like('dummy_side', 'mayuraconsultancy');
	    $this->db->where('dummy_side !=', 'shruthi.vr94@gmail.com');       
	    $this->db->where('dummy_side !=', 'm.sunil104@yahoo.co.in');       
	    $this->db->not_like('dummy_side', 'mayura');
	    $this->db->not_like('dummy_side', 'anshulkuntewar1229@gmail.com');
	    $this->db->not_like('dummy_side', 'komalathatati33@gmail.com');
	    $this->db->not_like('dummy_side', 'swatiraj96tly@gmail.com');
	    $this->db->not_like('dummy_side', 'monikakumari27012@gmail.com');
	    $this->db->not_like('dummy_side', 'mayurichaudhari57@gmail.com');
	    $this->db->not_like('dummy_side', 'shraddha.bhoge95@gmail.com');
	    $this->db->not_like('dummy_side', 'test@gmail.com');
	    $this->db->not_like('dummy_side', 'navjottomer@gmail.com');
	    $this->db->not_like('address', '209.85.238');
	    $this->db->not_like('dummy_side', 'someone@example.com');
	    $this->db->not_like('dummy_side', 'mayurichaudhari57@gmlm.com');
	    $this->db->not_like('dummy_side', 'rubysharub23@gmail.com');
	    $this->db->not_like('dummy_side', 'mayurichaudhari87@gmail.com');
	    
	    $this->db->not_like('activity', 'www.abhayasena.com');
	    
	    if($asc == 1 ){
	        $this->db->order_by('id','DESC');
	    }else{
	        $this->db->order_by('unix_time','DESC');
	    }
	    
	    if($complete != 1 ){
	        $this->db->limit(500);
	    }
	    
	    $output = $this->db->get()->result_array();
	    
	    //debug_log($this->db->last_query());
	    
	    $col_names = array("id","dummy_text","node","time","activity");
	    $dis_names = array("id","Name","Address","Recent Visit","Activity");
	    screen_log($this->db_model->printTable($output,$col_names,$dis_names));
	}
    
    public function get_lead_details_local($verified='', $demo_server = '')
    {
        
        $url_components = parse_url(basename($_SERVER['REQUEST_URI'])); 
        parse_str($url_components['query'], $data);
        $verified = $data['verified'];
        $exclude_local = $data['exclude_local'];
        $demo_server = $data['demo_server'];
        
    	$this->db->select('*')->from('dummy');
        if ($verified !== "") {
            if($verified==1){
                $this->db->where('dummy_side_verified', 'verified');       
            }
        }
        
        $this->db->where('dummy_text !=', '');
        $this->db->where('country', 'India');
        
        if($demo_server != ''){
            if($demo_server ==1){
                $this->db->like('activity','demo');    
            }
        }
        
        $this->db->order_by('id','DESC');
        $this->db->not_like('dummy_side', 'mayuraconsultancy');
    
        $output = $this->db->get()->result_array();
        
        debug_log($this->db->last_query());

        /*$this->db->query("
					select * from dummy order by id desc
				")->result_array();*/

        $col_names = array("id","dummy_text","dummy_values","dummy_side","dummy_side_verified","address","node","activity","time");
        $dis_names = array("id","Name","Phone","Email","Verified","IP Address","Address","Activity","Recent Visit");
        screen_log($this->db_model->printTable($output,$col_names,$dis_names));
    }
    
    public function get_lead_summary()
	{
	    
	    $url_components = parse_url(basename($_SERVER['REQUEST_URI'])); 
	    parse_str($url_components['query'], $data);
	    $verified = $data['verified'];
	    $exclude_local = $data['exclude_local'];
	    $demo_server = $data['demo_server'];
	    $source = $data['source'];
	    $start = $data['start'];
	    $end = $data['end'];
	    $asc = $data['asc'];
	    $limit = $data['limit'];
	    $contact_date = $data['contact_date'];
	    $complete = $data['complete'];
	    $contact_end = $data['contact_end'];
	    $activyt = $data['activity'];
	    
	    $this->db->select("dummy_side, dummy_text, max(concat(country_code,dummy_values)) as dummy_values, 
	    form_country as country,
	    CASE
                WHEN source like '%google%' THEN 'Google'
                WHEN source like '%capterra%' THEN 'Capterra'
                ELSE 'Organic'
            END AS source, 
        
        CASE    
                WHEN source like '%google%' THEN substring_index(substring_index(activity, '& keyword', -1),'on', 1)
                ELSE ''
            END AS keyword,
	    DATE(contact_date) as contact_date")->from('dummy');	        
	    
	    $this->db->where('dummy_text !=','');
	    
	    
	    if($contact_date != ''){
	        $this->db->where('contact_date >=',$contact_date);
	    }
	    
	    if($contact_end != ''){
	        $this->db->where('contact_date <=',$contact_end);
	    }
	    
	    
	    $this->db->not_like('dummy_side', 'mayuraconsultancy');
	    $this->db->where('dummy_side !=', 'shruthi.vr94@gmail.com');       
	    $this->db->where('dummy_side !=', 'm.sunil104@yahoo.co.in');       
	    $this->db->not_like('dummy_side', 'mayura');
	    $this->db->not_like('dummy_side', 'anshulkuntewar1229@gmail.com');
	    $this->db->not_like('dummy_side', 'komalathatati33@gmail.com');
	    $this->db->not_like('dummy_side', 'swatiraj96tly@gmail.com');
	    $this->db->not_like('dummy_side', 'monikakumari27012@gmail.com');
	    $this->db->not_like('dummy_side', 'mayurichaudhari57@gmail.com');
	    $this->db->not_like('dummy_side', 'shraddha.bhoge95@gmail.com');
	    $this->db->not_like('dummy_side', 'test@gmail.com');
	    $this->db->not_like('dummy_side', 'navjottomer@gmail.com');
	    $this->db->not_like('address', '209.85.238');
	    $this->db->not_like('dummy_side', 'someone@example.com');
	    $this->db->not_like('dummy_side', 'mayurichaudhari57@gmlm.com');
	    $this->db->not_like('dummy_side', 'rubysharub23@gmail.com');
	    $this->db->not_like('dummy_side', 'mayurichaudhari87@gmail.com');
	    
	    $this->db->not_like('activity', 'www.abhayasena.com');
	    
	    $this->db->group_by('1');
	    
	    $this->db->order_by('id desc');
	    
	    $output = $this->db->get()->result_array();
	    
	    //debug_log($this->db->last_query());
	    
	    $col_names = array("id","dummy_side","dummy_text","dummy_values","country","source","keyword","contact_date");
	    $dis_names = array("id","Email","Name","Phone","country","source","keyword","date");
	    screen_log($this->db_model->printTable($output,$col_names,$dis_names));
	}
    
    public function updateCRM($t='')
	{
	    $authtoken = $t != '' ? $t : $authtoken = $this->db_model->select('intcrm_authcode', 'admin');
	    
	    $leads = $this->db->query("SELECT * FROM `dummy` where dummy_text != '' and id > 2490 and (crm_lead_id is NULL or crm_lead_id = '0') and dummy_side not like '%mayura%' ORDER BY `id`  ASC limit 1")->result();
	    //$leads = $this->db->query("SELECT * FROM `dummy` where dummy_text != '' and (crm_lead_id is NULL or crm_lead_id = '0') and dummy_side_verified = 'verified' and dummy_side not like '%mayura%' ORDER BY `id` DESC limit 100")->result();
	    
	    foreach ($leads as $lead) {
	        print_r('<br>');
	        print_r($lead->dummy_side);
	        print_r('<br>');
	       if($lead->dummy_side != ''){
	           $url = 'https://crm.mayuraconsultancy.com/api/leads/search/'.$lead->dummy_side;
	            $ch = curl_init($url);
	            curl_setopt($ch, CURLOPT_RETURNTRANSFER,TRUE);
	            curl_setopt($ch, CURLOPT_FOLLOWLOCATION,TRUE);
	            curl_setopt($ch, CURLOPT_HTTP_VERSION,CURL_HTTP_VERSION_1_1);
	            curl_setopt($ch, CURLOPT_CUSTOMREQUEST,'GET');
	            curl_setopt($ch, CURLOPT_HTTPHEADER,array( 
	                'authtoken: '.$authtoken,
	            ));
	            
	            $response = curl_exec($ch);
	            curl_close($ch);
	            $result=json_decode($response);
	            
	            print_r('<br>');
	            print_r($result);
	            print_r('<br>');
	            
	            if(array_column($result, 'id')) {
	                $query = "Update dummy set crm_lead_id = ".$result[0]->id." where id = ".$lead->id;
	                $this->db->query($query);
	                print_r('<br>');
	                print_r($this->db->last_query());
	                print_r('<br>');
	            }
	            else{
	                $assigned = strpos($lead->country, 'India') !== false ? 3 : 22;
	                    
	                $source = 4;
	                $source = strpos($lead->activity, 'google Dashboard') !== false ? 1 : $source;
	                $source = strpos($lead->activity, 'facebook Dashboard') !== false ? 2 : $source;
	                $source = strpos($lead->activity, 'capterra Dashboard') !== false ? 3 : $source;
	                $source = strpos($lead->activity, 'bing Dashboard') !== false ? 6 : $source;
	                $source = strpos($lead->activity, 'pyuasoftware Dashboard') !== false ? 8 : $source;
	                
	                $website = strstr(strstr($lead->activity,'www.'),' on',true);
	                
	                $CRMData = array(
	                    'status'        => "2", 
	                    'name'          => $lead->dummy_text.'<br>'.$lead->country,
	                    'phonenumber'   => $lead->dummy_values,
	                    'email'         => $lead->dummy_side,
	                    'website'       => $website,
	                    'source'        => $source,
	                    'ip_address'    => $lead->address,
	                    'secret'        => $lead->secret,
	                    'budget'        => $lead->budget,
	                    'address'       => $lead->node,
	                    'city'          => '',
	                    'state'         => '',
	                    'country'       => $lead->country,
	                    'assigned'      => $assigned,// country => is india then Assigned to  3 means Gagna else  srinivas
	                    'description'   => $lead->activity,
	                );
	                
	                print_r('<br>');
	                print_r('CRM Insert');
	                print_r('<br>');
	                print_r($CRMData);
	                print_r('<br>');
	                
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
	                curl_close($ch);
	                
	                print_r('<br>');
	                print_r($result);
	                print_r('<br>');
	                
	                if($result->status != '')
	                {
	                    $query = "Update dummy set crm_lead_id = ".$result->leadid." where id = ".$lead->id;
	                    $this->db->query($query);
	                    print_r('<br>');
	                    print_r($this->db->last_query());
	                    print_r('<br>');
	                }
	            }
	       }
	    }
	}

    
	public function database_backup()
    {
        // Auto Backup every 7 days
        /*if ((config_item('automatic_database_backup') == 'on') && time() > (config_item('last_autobackup') + 7 * 24 * 60 * 60)) {*/
            $this->load->dbutil();
            $prefs = array('format' => 'zip', 'filename' => 'Database-auto-full-backup_' . date('Y-m-d_H-i'));
            $backup = $this->dbutil->backup($prefs);
            if (!write_file('./uploads/backup/BD-backup_' . date('Y-m-d_H-i') . '.zip', $backup)) {
                debug_log("Error while creating auto database backup!");
            } else {
                /*$input_data['last_autobackup'] = time();
                foreach ($input_data as $key => $value) {
                    $data = array('value' => $value);
                    $this->db->where('config_key', $key)->update('tbl_config', $data);
                    $exists = $this->db->where('config_key', $key)->get('tbl_config');
                    if ($exists->num_rows() == 0) {
                        $this->db->insert('tbl_config', array("config_key" => $key, "value" => $value));
                    }
                }*/
                debug_log("Auto backup has been created.");

            }
        #}
        return TRUE;
    }

    //mark completed
	public function deliver()
    {
        //print_r("deliver");exit();
        $orderid = $this->input->post('deliverid');
        //print_r($orderid);exit();
        $tdetail = $this->input->post('tdetail');

        $before_tid = $this->db_model->select('tid', 'tbl_order_items', array('id' => $orderid));

        if($before_tid != '')
        {
            $after_tid = $before_tid . "<br/><br/>" .  date('Y-m-d') . "<br/> Notes:<br/>" . $tdetail; 
        } 
        else 
        {
            $after_tid = date('Y-m-d') . "<br/> Notes: " . $tdetail; 
        }

        $data = array(
            'pro_order_status'       => '5',
            //'deliver_date' => date('Y-m-d H:i:s'),
            'tid'          => $after_tid,
        );
        $this->db->where('id', $orderid);
        $this->db->update('tbl_order_items', $data);

        $order_detail  = $this->db_model->select_multi('*', 'tbl_order_items', array('id' => $orderid));

        $product_id = $this->db_model->select('product_id', 'tbl_order_items', array('id' => $orderid));
        debug_log($this->db->last_query());

        if($product_id == 0)
        {   

         $plan_detail = $this->db_model->select_multi('*', 'plans', array('invoice_name' => $order_detail->name));
        $member_detail = $this->db_model->select_multi('*', 'member', array('id' => $order_detail->user_id));
        $this->earning->credit_joining_commission($plan_detail,$member_detail);

        }
        else {
            $prod_details = $this->db_model->select_multi('product_title, selling_price,delivery_charge, max_unit_buy', 'tbl_product', array('id' => $product_id));
            //print_r($prod_details);exit();

            /*if ($prod_details->qty !== "-1")
            {
                $array = array('qty' => ($prod_details->qty - $order_detail->qty));
                $this->db->where('id', $product_id);
                $this->db->update('product', $array);
            } else {}*/

            $array = array('max_unit_buy' => ($prod_details->max_unit_buy - $order_detail->product_qty));
            $this->db->where('id', $product_id);
            $this->db->update('tbl_product', $array);
            debug_log($this->db->last_query());
            //print_r($this->db->last_query());
            $plan = $this->db_model->select('plan_id', 'tbl_product', array('id' => $product_id));
            debug_log($this->db->last_query());
            $pv = $this->db_model->select('pv', 'tbl_product', array('id' => $product_id));
            $this->earning->credit_product_comm($order_detail->user_id,$plan,$product_id, $pv*$order_detail->product_qty,($order_detail->product_price-$order_detail->tax)*$order_detail->product_qty, $order_detail->product_qty, 'Repurchase Commission');

            if(config_item('width')==2)
            {
                $this->downline_model->update_legs(array());
                $this->earning->target_reach_income();
            }

            $this->earning->payout(array());


            ############ INVOICE ENTRY #################################

            if(!$this->db_model->select('id', 'invoice', array('order_id'=>$order_detail->id))>0){
                debug_log($this->db->last_query());
                $member_detail = $this->db_model->select_multi('name, address, phone, topup', 'member', array('id' => $order_detail->user_id));
                $dd = $this->db_model->select_multi('*', 'tbl_addresses', array('user_id' => $order_detail->user_id));

                $gettop = $member_detail->topup + ($order_detail->product_price*$order_detail->product_qty);
                $topup  = array(
                    'topup' => $gettop,
                );
                $this->db->where('id', $order_detail->user_id);
                $this->db->update('member', $topup);
                
                $invoice_name = $prod_details->product_title;
                $user_id      = $order_detail->user_id;
                $vendor_id    = $order_detail->vendor_id;
                $invoice_date = date('Y-m-d H:i:s');
                $user_type    = 'Member';
                $company_add  = config_item('company_address') . "<br/>" . config_item('company_city') .', ' . config_item('company_state') .' - ' . config_item('company_zipcode') . ', ' . config_item('company_country');
                $ship_adress  = $dd->name. "<br/>" .$dd->mobile_no. "<br/>" .$dd->road_area_colony. "<br/>" .$dd->city. "<br/>" .$dd->state. "-" .$dd->pincode;
                $bill_add  = $dd->name. "<br/>" .$dd->mobile_no. "<br/>" .$dd->road_area_colony. "<br/>" .$dd->city. "<br/>" .$dd->state. "-" .$dd->pincode;
                $total_amt    = $order_detail->product_price*$order_detail->product_qty;
                $paid_amt     = $order_detail->product_price*$order_detail->product_qty;
                $prod_detail  = $this->db_model->select_multi('*', 'tbl_product', array('id' => $order_detail->product_id));
                $item_name    = $prod_detail->product_title;

                //$price        = round($prod_detail->selling_price*(1-($prod_detail->discount/100)) / (1 + $prod_detail->gst / 100), 2);
                $price=$prod_detail->selling_price;
                //$p_w_tax        = round($prod_detail->prod_price / (1 + $prod_detail->gst / 100), 2);
                $tax_rate     = "0";
                $tax="0";
                //$tax_rate     = $prod_detail->gst;
                //$tax          = round($order_detail->cost - $price,2);
                //$tax=$order_detail->tax;
                $qty          = $order_detail->product_qty;

                $array  = array($item_name => $price);
                $array2 = array($item_name => $tax);
                $array3 = array($item_name => $qty);

                $array  = serialize($array);
                $array2 = serialize($array2);
                $array3 = serialize($array3);

                $params = array(
                    'invoice_name'     => $invoice_name,
                    'userid'           => $user_id,
                    'vendor_id'        =>$vendor_id,
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

            if($order_detail->tax > 0)
            {     //($values["item_price"]-($values["item_price"]*($values["item_discount"]/100)))*$values["item_quantity"]
                $taxdata=array(
                     'userid'=>$order_detail->user_id,
                     'invoice_id' =>  $this->db_model->select('id', 'invoice', array('order_id'=>$order_detail->id)),
                     'amount'=>($prod_details->prod_price-($prod_details->prod_price*($prod_details->discount/100)))*$order_detail->qty,
                     'tax_amount' =>$order_detail->tax*$order_detail->qty, 
                     //'vendor_id'=> $order_detail->vendor_id,
                     'tax_percnt' =>$prod_details->gst,
                     'date' =>date('Y-m-d H:i:s'),
                     'transaction_id'=>$prod_details->prod_name . ': Order ID - ' . $orderid,
                 );
                $this->db->insert('tax_report', $taxdata);
            }

        }

        ########## END ENTRY #######################################
        $this->session->set_flashdata('common_flash', '<div class="alert alert-success">Order Marked as Delivered successfully.</div>');
        redirect('product/pending_orders');
    }

    public function update_binary_count_new()
    {

        $this->db->select('*');
        $this->db->where('status',"Active");
        $member_details=  $this->db->get('member')->result();

        foreach($member_details as $row)
        {
   
	   	if( ($row->total_a_pv == 0 && $row->total_b_pv== 0) || ($row->total_a_pv > 0 && $row->total_b_pv > 0)  )
	   	{
			$pairs_count=0;
			$left_binary_pairs=0;
			$right_binary_pairs=0;
			$temp_flushout=0;


			$arra1 = array('pairs_count' => $pairs_count,'total_a_pv' => $left_binary_pairs,'total_b_pv' => $right_binary_pairs,'temp_flushout' => $temp_flushout);

			$this->db->where('id', $row->id);
			$this->db->update('member', $arra1);
		}
		elseif( ($row->total_a_pv > 0 && $row->total_b_pv == 0) || ($row->total_b_pv > 0 && $row->total_a_pv == 0) )
		{

			$pairs_count=0;
			$temp_flushout=0;


			$arra1 = array('pairs_count' => $pairs_count,'temp_flushout' => $temp_flushout);

			$this->db->where('id', $row->id);
			$this->db->update('member', $arra1);

		}
           

        }


    }


    public function update_binary_count()
    {

        $this->db->select('*');
        $this->db->where('status',"Active");
        $member_details=  $this->db->get('member')->result();

        $plan_details1 =  $this->db_model->select_multi('*', 'plans', array('id' => '1'));
	$plan_details2 =  $this->db_model->select_multi('*', 'plans', array('id' => '2'));
	$plan_details3 =  $this->db_model->select_multi('*', 'plans', array('id' => '3'));
	$plan_details4 =  $this->db_model->select_multi('*', 'plans', array('id' => '4'));
	$plan_details5 =  $this->db_model->select_multi('*', 'plans', array('id' => '5'));
	$plan_details6 =  $this->db_model->select_multi('*', 'plans', array('id' => '6'));
	$plan_details7 =  $this->db_model->select_multi('*', 'plans', array('id' => '7'));


        foreach($member_details as $row)
        {


            if($row->signup_package == 1 )
            {
               if($row->pairs_count >= $plan_details1->capping)
               {

               	   	if( ($row->total_a_pv == 0 && $row->total_b_pv== 0) || ($row->total_a_pv > 0 && $row->total_b_pv > 0)  )
               	   	{
				$pairs_count=0;
				$left_binary_pairs=0;
				$right_binary_pairs=0;
				$temp_flushout=0;


				$arra1 = array('pairs_count' => $pairs_count,'total_a_pv' => $left_binary_pairs,'total_b_pv' => $right_binary_pairs,'temp_flushout' => $temp_flushout);

				$this->db->where('id', $row->id);
				$this->db->update('member', $arra1);
		    	}
		    	elseif( ($row->total_a_pv > 0 && $row->total_b_pv == 0) || ($row->total_b_pv > 0 && $row->total_a_pv == 0) )
		    	{

		    		$pairs_count=0;
				$temp_flushout=0;


				$arra1 = array('pairs_count' => $pairs_count,'temp_flushout' => $temp_flushout);

				$this->db->where('id', $row->id);
				$this->db->update('member', $arra1);

		    	}
               }
            }
            elseif($row->signup_package == 2 )
            {

               if($row->pairs_count >= $plan_details2->capping)
               {
               		if( ($row->total_a_pv == 0 && $row->total_b_pv== 0) || ($row->total_a_pv > 0 && $row->total_b_pv > 0)  )
               	   	{

	                   $pairs_count=0;
	                   $left_binary_pairs=0;
	                   $right_binary_pairs=0;
	                   $temp_flushout=0;

	                   $arra1 = array('pairs_count' => $pairs_count,'total_a_pv' => $left_binary_pairs,'total_b_pv' => $right_binary_pairs,'temp_flushout' => $temp_flushout);

	                    $this->db->where('id', $row->id);
	                    $this->db->update('member', $arra1);
	               	}
	               	elseif( ($row->total_a_pv > 0 && $row->total_b_pv == 0) || ($row->total_b_pv > 0 && $row->total_a_pv == 0) )
		    	{

		    		$pairs_count=0;
				$temp_flushout=0;


				$arra1 = array('pairs_count' => $pairs_count,'temp_flushout' => $temp_flushout);

				$this->db->where('id', $row->id);
				$this->db->update('member', $arra1);

		    	}
               }

            }
            elseif($row->signup_package == 3 )
            {
               if($row->pairs_count >= $plan_details3->capping)
               {
               		if( ($row->total_a_pv == 0 && $row->total_b_pv== 0) || ($row->total_a_pv > 0 && $row->total_b_pv > 0)  )
               	   	{
	                   $pairs_count=0;
	                   $left_binary_pairs=0;
	                   $right_binary_pairs=0;
	                   $temp_flushout=0;

	                   $arra1 = array('pairs_count' => $pairs_count,'total_a_pv' => $left_binary_pairs,'total_b_pv' => $right_binary_pairs,'temp_flushout' => $temp_flushout);

	                    $this->db->where('id', $row->id);
	                    $this->db->update('member', $arra1);
	                }
	                elseif( ($row->total_a_pv > 0 && $row->total_b_pv == 0) || ($row->total_b_pv > 0 && $row->total_a_pv == 0) )
		    	{

		    		$pairs_count=0;
				$temp_flushout=0;


				$arra1 = array('pairs_count' => $pairs_count,'temp_flushout' => $temp_flushout);

				$this->db->where('id', $row->id);
				$this->db->update('member', $arra1);

		    	}

               }
            }
            elseif($row->signup_package == 4 )
            {
               if($row->pairs_count >= $plan_details4->capping)
               {

               		if( ($row->total_a_pv == 0 && $row->total_b_pv== 0) || ($row->total_a_pv > 0 && $row->total_b_pv > 0)  )
               	   	{

	                   $pairs_count=0;
	                   $left_binary_pairs=0;
	                   $right_binary_pairs=0;
	                   $temp_flushout=0;

	                   $arra1 = array('pairs_count' => $pairs_count,'total_a_pv' => $left_binary_pairs,'total_b_pv' => $right_binary_pairs,'temp_flushout' => $temp_flushout);

	                    $this->db->where('id', $row->id);
	                    $this->db->update('member', $arra1);
	                }
	                elseif( ($row->total_a_pv > 0 && $row->total_b_pv == 0) || ($row->total_b_pv > 0 && $row->total_a_pv == 0) )
		    	{

		    		$pairs_count=0;
				$temp_flushout=0;


				$arra1 = array('pairs_count' => $pairs_count,'temp_flushout' => $temp_flushout);

				$this->db->where('id', $row->id);
				$this->db->update('member', $arra1);

		    	}

               }
            }
            elseif($row->signup_package == 5 )
            {
               if($row->pairs_count >= $plan_details5->capping)
               {

               		if( ($row->total_a_pv == 0 && $row->total_b_pv== 0) || ($row->total_a_pv > 0 && $row->total_b_pv > 0)  )
               	   	{
	                   $pairs_count=0;
	                   $left_binary_pairs=0;
	                   $right_binary_pairs=0;
	                   $temp_flushout=0;

	                   $arra1 = array('pairs_count' => $pairs_count,'total_a_pv' => $left_binary_pairs,'total_b_pv' => $right_binary_pairs,'temp_flushout' => $temp_flushout);

	                    $this->db->where('id', $row->id);
	                    $this->db->update('member', $arra1);
	            	}
	            	elseif( ($row->total_a_pv > 0 && $row->total_b_pv == 0) || ($row->total_b_pv > 0 && $row->total_a_pv == 0) )
		    	{

		    		$pairs_count=0;
				$temp_flushout=0;


				$arra1 = array('pairs_count' => $pairs_count,'temp_flushout' => $temp_flushout);

				$this->db->where('id', $row->id);
				$this->db->update('member', $arra1);

		    	}

               }
            }
            elseif($row->signup_package == 6 )
            {
               if($row->pairs_count >= $plan_details6->capping)
               {

               		if( ($row->total_a_pv == 0 && $row->total_b_pv== 0) || ($row->total_a_pv > 0 && $row->total_b_pv > 0)  )
               	   	{
	                   $pairs_count=0;
	                   $left_binary_pairs=0;
	                   $right_binary_pairs=0;
	                   $temp_flushout=0;

	                   $arra1 = array('pairs_count' => $pairs_count,'total_a_pv' => $left_binary_pairs,'total_b_pv' => $right_binary_pairs,'temp_flushout' => $temp_flushout);

	                    $this->db->where('id', $row->id);
	                    $this->db->update('member', $arra1);
	            	}
	            	elseif( ($row->total_a_pv > 0 && $row->total_b_pv == 0) || ($row->total_b_pv > 0 && $row->total_a_pv == 0) )
		    	{

		    		$pairs_count=0;
				$temp_flushout=0;


				$arra1 = array('pairs_count' => $pairs_count,'temp_flushout' => $temp_flushout);

				$this->db->where('id', $row->id);
				$this->db->update('member', $arra1);

		    	}

               }
            }
            elseif($row->signup_package == 7 )
            {
               if($row->pairs_count >= $plan_details7->capping)
               {

               		if( ($row->total_a_pv == 0 && $row->total_b_pv== 0) || ($row->total_a_pv > 0 && $row->total_b_pv > 0)  )
               	   	{
	                   $pairs_count=0;
	                   $left_binary_pairs=0;
	                   $right_binary_pairs=0;
	                   $temp_flushout=0;

	                   $arra1 = array('pairs_count' => $pairs_count,'total_a_pv' => $left_binary_pairs,'total_b_pv' => $right_binary_pairs,'temp_flushout' => $temp_flushout);

	                    $this->db->where('id', $row->id);
	                    $this->db->update('member', $arra1);
	            	}
	            	elseif( ($row->total_a_pv > 0 && $row->total_b_pv == 0) || ($row->total_b_pv > 0 && $row->total_a_pv == 0) )
		    	{

		    		$pairs_count=0;
				$temp_flushout=0;


				$arra1 = array('pairs_count' => $pairs_count,'temp_flushout' => $temp_flushout);

				$this->db->where('id', $row->id);
				$this->db->update('member', $arra1);

		    	}

               }
            }



        }


    }

    public function flushout_pv_second()
    {

        $this->db->select('*');
        $this->db->where('status',"Active");
        $this->db->where('temp_flushout', 1);
        $member_details=  $this->db->get('member')->result();

        $plan_details1 =  $this->db_model->select_multi('*', 'plans', array('id' => '1'));
	$plan_details2 =  $this->db_model->select_multi('*', 'plans', array('id' => '2'));
	$plan_details3 =  $this->db_model->select_multi('*', 'plans', array('id' => '3'));
	$plan_details4 =  $this->db_model->select_multi('*', 'plans', array('id' => '4'));
	$plan_details5 =  $this->db_model->select_multi('*', 'plans', array('id' => '5'));
	$plan_details6 =  $this->db_model->select_multi('*', 'plans', array('id' => '6'));
	$plan_details7 =  $this->db_model->select_multi('*', 'plans', array('id' => '7'));


        foreach($member_details as $row)
        {


            if($row->signup_package == 1 )
            {
               if($row->pairs_count >= $plan_details1->capping)
               {

               	   	if( ($row->total_a_pv == 0 && $row->total_b_pv== 0) || ($row->total_a_pv > 0 && $row->total_b_pv > 0)  )
               	   	{
				
				$left_binary_pairs=0;
				$right_binary_pairs=0;
				$arra1 = array('total_a_pv' => $left_binary_pairs,'total_b_pv' => $right_binary_pairs);

				$this->db->where('id', $row->id);
				$this->db->update('member', $arra1);
		    	}
		    	
               }
            }
            elseif($row->signup_package == 2 )
            {

               if($row->pairs_count >= $plan_details2->capping)
               {
               		if( ($row->total_a_pv == 0 && $row->total_b_pv== 0) || ($row->total_a_pv > 0 && $row->total_b_pv > 0)  )
               	   	{
				
				$left_binary_pairs=0;
				$right_binary_pairs=0;
				$arra1 = array('total_a_pv' => $left_binary_pairs,'total_b_pv' => $right_binary_pairs);

				$this->db->where('id', $row->id);
				$this->db->update('member', $arra1);
		    	}
               }

            }
            elseif($row->signup_package == 3 )
            {
               if($row->pairs_count >= $plan_details3->capping)
               {
               		if( ($row->total_a_pv == 0 && $row->total_b_pv== 0) || ($row->total_a_pv > 0 && $row->total_b_pv > 0)  )
               	   	{
				
				$left_binary_pairs=0;
				$right_binary_pairs=0;
				$arra1 = array('total_a_pv' => $left_binary_pairs,'total_b_pv' => $right_binary_pairs);

				$this->db->where('id', $row->id);
				$this->db->update('member', $arra1);
		    	}

               }
            }
            elseif($row->signup_package == 4 )
            {
               if($row->pairs_count >= $plan_details4->capping)
               {

               		if( ($row->total_a_pv == 0 && $row->total_b_pv== 0) || ($row->total_a_pv > 0 && $row->total_b_pv > 0)  )
               	   	{
				
				$left_binary_pairs=0;
				$right_binary_pairs=0;
				$arra1 = array('total_a_pv' => $left_binary_pairs,'total_b_pv' => $right_binary_pairs);

				$this->db->where('id', $row->id);
				$this->db->update('member', $arra1);
		    	}

               }
            }
            elseif($row->signup_package == 5 )
            {
               if($row->pairs_count >= $plan_details5->capping)
               {

               		if( ($row->total_a_pv == 0 && $row->total_b_pv== 0) || ($row->total_a_pv > 0 && $row->total_b_pv > 0)  )
               	   	{
				
				$left_binary_pairs=0;
				$right_binary_pairs=0;
				$arra1 = array('total_a_pv' => $left_binary_pairs,'total_b_pv' => $right_binary_pairs);

				$this->db->where('id', $row->id);
				$this->db->update('member', $arra1);
		    	}

               }
            }
            elseif($row->signup_package == 6 )
            {
               if($row->pairs_count >= $plan_details6->capping)
               {

               		if( ($row->total_a_pv == 0 && $row->total_b_pv== 0) || ($row->total_a_pv > 0 && $row->total_b_pv > 0)  )
               	   	{
				
				$left_binary_pairs=0;
				$right_binary_pairs=0;
				$arra1 = array('total_a_pv' => $left_binary_pairs,'total_b_pv' => $right_binary_pairs);

				$this->db->where('id', $row->id);
				$this->db->update('member', $arra1);
		    	}

               }
            }
            elseif($row->signup_package == 7 )
            {
               if($row->pairs_count >= $plan_details7->capping)
               {

               		if( ($row->total_a_pv == 0 && $row->total_b_pv== 0) || ($row->total_a_pv > 0 && $row->total_b_pv > 0)  )
               	   	{
				
				$left_binary_pairs=0;
				$right_binary_pairs=0;
				$arra1 = array('total_a_pv' => $left_binary_pairs,'total_b_pv' => $right_binary_pairs);

				$this->db->where('id', $row->id);
				$this->db->update('member', $arra1);
		    	}

               }
            }



        }


    }

    public function flushout_pv_per_minute()
    {

        $this->db->select('*');
        $this->db->where('status',"Active");
        $this->db->where('temp_flushout', 0);
        $member_details=  $this->db->get('member')->result();

        $plan_details1 =  $this->db_model->select_multi('*', 'plans', array('id' => '1'));
	$plan_details2 =  $this->db_model->select_multi('*', 'plans', array('id' => '2'));
	$plan_details3 =  $this->db_model->select_multi('*', 'plans', array('id' => '3'));
	$plan_details4 =  $this->db_model->select_multi('*', 'plans', array('id' => '4'));
	$plan_details5 =  $this->db_model->select_multi('*', 'plans', array('id' => '5'));
	$plan_details6 =  $this->db_model->select_multi('*', 'plans', array('id' => '6'));
	$plan_details7 =  $this->db_model->select_multi('*', 'plans', array('id' => '7'));

        foreach($member_details as $row)
        {


            if($row->signup_package == 1 )
            {
               if($row->pairs_count >= $plan_details1->capping)
               {
                   
                   $left_binary_pairs=0;
                   $right_binary_pairs=0;
                   $temp_flushout=1;
                   $arra1 = array('total_a_pv' => $left_binary_pairs,'total_b_pv' => $right_binary_pairs,'temp_flushout' => $temp_flushout );
                    $this->db->where('id', $row->id);
                    $this->db->update('member', $arra1);

               }
            }
            elseif($row->signup_package == 2 )
            {

               if($row->pairs_count >= $plan_details2->capping)
               {
                    $left_binary_pairs=0;
                    $right_binary_pairs=0;
                    $temp_flushout=1;
                    $arra1 = array('total_a_pv' => $left_binary_pairs,'total_b_pv' => $right_binary_pairs,'temp_flushout' => $temp_flushout);

                    $this->db->where('id', $row->id);
                    $this->db->update('member', $arra1);

               }

            }
            elseif($row->signup_package == 3 )
            {
               if($row->pairs_count >= $plan_details3->capping)
               {

                    $left_binary_pairs=0;
                    $right_binary_pairs=0;
                    $temp_flushout=1;
                    $arra1 = array('total_a_pv' => $left_binary_pairs,'total_b_pv' => $right_binary_pairs,'temp_flushout' => $temp_flushout);

                    $this->db->where('id', $row->id);
                    $this->db->update('member', $arra1);

               }
            }
            elseif($row->signup_package == 4 )
            {
               if($row->pairs_count >= $plan_details4->capping)
               {

                    $left_binary_pairs=0;
                    $right_binary_pairs=0;
                    $temp_flushout=1;
                    $arra1 = array('total_a_pv' => $left_binary_pairs,'total_b_pv' => $right_binary_pairs,'temp_flushout' => $temp_flushout);

                    $this->db->where('id', $row->id);
                    $this->db->update('member', $arra1);

               }
            }
            elseif($row->signup_package == 5 )
            {
               if($row->pairs_count >= $plan_details5->capping)
               {

                    $left_binary_pairs=0;
                    $right_binary_pairs=0;
                    $temp_flushout=1;
                    $arra1 = array('total_a_pv' => $left_binary_pairs,'total_b_pv' => $right_binary_pairs,'temp_flushout' => $temp_flushout);

                    $this->db->where('id', $row->id);
                    $this->db->update('member', $arra1);

               }
            }
            elseif($row->signup_package == 6 )
            {
               if($row->pairs_count >= $plan_details6->capping)
               {

                    $left_binary_pairs=0;
                    $right_binary_pairs=0;
                    $temp_flushout=1;
                    $arra1 = array('total_a_pv' => $left_binary_pairs,'total_b_pv' => $right_binary_pairs,'temp_flushout' => $temp_flushout);

                    $this->db->where('id', $row->id);
                    $this->db->update('member', $arra1);

               }
            }
            elseif($row->signup_package == 7 )
            {
               if($row->pairs_count >= $plan_details7->capping)
               {

                    $left_binary_pairs=0;
                    $right_binary_pairs=0;
                    $temp_flushout=1;
                    $arra1 = array('total_a_pv' => $left_binary_pairs,'total_b_pv' => $right_binary_pairs,'temp_flushout' => $temp_flushout);

                    $this->db->where('id', $row->id);
                    $this->db->update('member', $arra1);

               }
            }



        }


    }





    public function update_binary_legs_flushout()
    {

       $this->db->select('*');
        $this->db->where('status',"Active");
        $member_details=  $this->db->get('member')->result();

        foreach($member_details as $row)
        {
      
           $left_binary_pairs=',';
           $right_binary_pairs=',';


           $arra2 = array('left_unpaid' => $left_binary_pairs,'right_unpaid' => $right_binary_pairs);

            $this->db->where('user_id', $row->id);
            $this->db->update('binarydata', $arra2);

            debug_log("flushout");
            debug_log($this->db->last_query());

        }


    }


    /*public function update_binary_wallet_vocher_amount()
    {

       	$this->db->select('*');
        $this->db->where('status',"Active");
        //$this->db->where_not_in('signup_package',"1");
        $member_details=  $this->db->get('member')->result();

        foreach($member_details as $row)
        {


        	if($member_details->signup_package == 1)
        	{

        		$hour = date("H");
	        	debug_log("hour==>>");
	            	debug_log($hour);


	        	if($hour < 12)
	        	{
	        		debug_log("welcome to earning model pv1");
	              		$total_comm=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $row->id , 'date >=' => date('Y-m-d 00:00:00'), 'date <=' => date('Y-m-d 11:59:59'))) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $row->id , 'date >=' => date('Y-m-d 00:00:00'), 'date <=' => date('Y-m-d 11:59:59')));

	        	}
	        	else
	        	{
	        		debug_log("welcome to earning model pv2");
	              		$total_comm=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $row->id , 'date >=' => date('Y-m-d 12:00:00'), 'date <=' => date('Y-m-d 23:59:59'))) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $row->id , 'date >=' => date('Y-m-d 12:00:00'), 'date <=' => date('Y-m-d 23:59:59')));

	        	}

	        	if($total_comm>0)
	        	{


		        	$actual_wallet_count= $total_comm / 7;
		        	$actual_wallet_amount=$total_comm;

		        	$get_user_wallet_balance1 = $this->db_model->select('balance', 'wallet', array('userid' => $row->id));

				$arra2 = array('balance' => ($get_user_wallet_balance1 + $actual_wallet_amount),);
				$this->db->where('userid', $row->id);
				$this->db->update('wallet', $arra2);
				debug_log($this->db->last_query());

				debug_log("wallet_count");
				debug_log($wallet_count);
				$arra1 = array('wallet_count1' => $member_details->wallet_count1+$actual_wallet_count);
				$this->db->where('id', $row->id);
				$this->db->update('member', $arra1);
				debug_log($this->db->last_query());

			}





        	}
        	else
        	{



	        	$hour = date("H");
	        	debug_log("hour==>>");
	            	debug_log($hour);


	        	if($hour < 12)
	        	{
	        		debug_log("welcome to earning model pv1");
	              		$total_comm=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $row->id , 'date >=' => date('Y-m-d 00:00:00'), 'date <=' => date('Y-m-d 11:59:59'))) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $row->id , 'date >=' => date('Y-m-d 00:00:00'), 'date <=' => date('Y-m-d 11:59:59')));

	        	}
	        	else
	        	{
	        		debug_log("welcome to earning model pv2");
	              		$total_comm=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $row->id , 'date >=' => date('Y-m-d 12:00:00'), 'date <=' => date('Y-m-d 23:59:59'))) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $row->id , 'date >=' => date('Y-m-d 12:00:00'), 'date <=' => date('Y-m-d 23:59:59')));

	        	}

	            	
	        	debug_log("total sum Commission");
	              	debug_log($total_comm);

	              	if ($total_comm>0)
			{

				$total_sum_count = $row->wallet_count1 + $row->voucher_count ;
				$total_comm_count =$total_comm/7;
				$total_wallet_and_voucher_count=$total_sum_count + $total_comm_count;


				$get_both_pairs=$this->get_number_wallet_and_vocher_pair($total_wallet_and_voucher_count);

				debug_log("get_both_pairs");
				debug_log($get_both_pairs);



				$get_count_5_pairs = $get_both_pairs['count_5'];
				$get_count_20_pairs = $get_both_pairs['count_20'];

				$actual_wallet_count=$get_count_20_pairs - $row->wallet_count1;

				$actual_wallet_amount=$actual_wallet_count *7;

				$wallet_count_update=$actual_wallet_count + $row->wallet_count1;

				debug_log("voucher_count");
				debug_log($get_count_20_pairs);
				debug_log($actual_wallet_count);
				debug_log($actual_wallet_amount);
				debug_log($wallet_count_update);


				//if($wallet_count_update <=30)
				debug_log("wallet_count");
				debug_log($wallet_count);
				$arra1 = array('wallet_count1' => $wallet_count_update);
				$this->db->where('id', $row->id);
				$this->db->update('member', $arra1);
				debug_log($this->db->last_query());



				$get_user_wallet_balance1 = $this->db_model->select('balance', 'wallet', array('userid' => $row->id));

				$arra2 = array('balance' => ($get_user_wallet_balance1 + $actual_wallet_amount),);
				$this->db->where('userid', $row->id);
				$this->db->update('wallet', $arra2);
				debug_log($this->db->last_query());



				$get_count_5_pairs = $get_both_pairs['count_5'];
				$actual_vocher_count=$get_count_5_pairs - $row->voucher_count ;

				$actual_vocher_amount=$actual_vocher_count *7;
				

				$vocher_count_update=$actual_vocher_count + $row->voucher_count;


				debug_log("voucher_count");
				debug_log($get_count_5_pairs);
				debug_log($actual_vocher_count);
				debug_log($actual_vocher_amount);
				debug_log($vocher_count_update);

				$arra1 = array('voucher_count' => $vocher_count_update);
				$this->db->where('id', $row->id);
				$this->db->update('member', $arra1);
				debug_log($this->db->last_query());



				$get_user_balance1 = $this->db_model->select('balance', 'voucher', array('userid' => $row->id));
				debug_log('$get_user_balance ' . $get_user_balance1);
				debug_log('voucher ' . $amount);
				$arra2 = array('balance' => ($get_user_balance1 + $actual_vocher_amount),);
				$this->db->where('userid', $row->id);
				$this->db->update('voucher', $arra2);
				debug_log($this->db->last_query());




			}
		}


        }


    }


    public function get_number_wallet_and_vocher_pair($amount)
    {
		
		$i	= 0;
		$a	= 0;
		$c	= 5;
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
	//			echo $i.'<br>';	
				$a	= 0;
				$count_20++;
			}
			else{
				$count_5++;
				$a++;
	//			echo $a.'20-25 like value '.$i.'<br>';	
			}
		}
	//	echo 'count'.$count_5.'<br>';
	//	echo 'count'.$count_20.'<br>';


		$result_array= array('count_5' => $count_5 ,'count_20' => $count_20 );
		return $result_array;
	}*/

	function leadership_bonus(){
		$query	= "SELECT * FROM `member` WHERE rank in('Ruby','Emrald','Diamond','Silver Diamond','Gold Diamond','Blue Diamond','Green Diamond','Red Diamond','Black Diamond','Crown Diamond') and YEAR(leadership_bonus) <= ".date('Y')." AND MONTH(leadership_bonus) <".date('m')." order by id ASC";
		$data	= $this->db->query($query)->result();
		if($data){
			foreach($data as $set_data){
				$pur_from	= new DateTime();
				$pur_from->modify( 'first day of this month 000000' );
				$pur_to	= new DateTime();
				$pur_to->modify( 'last day of this month 235959' );

				$startDate = new DateTime();
				$startDate->modify( 'first day of this month 000000' );
				$endDate	= new DateTime($startDate->format('Y-m-d 23:59:59'));
				$endDate->modify('+14 days'); 
				$sql	= "SELECT SUM(total_amt) as total_pur FROM `tbl_order_details` 
WHERE user_id=".$set_data->id." AND (tbl_order_details.order_date BETWEEN '" . strtotime($startDate->format( 'Y-m-d H:i:s' )) . "' AND '" . strtotime($endDate->format( 'Y-m-d H:i:s') ). "')";
				$count_pur	= $this->db->query($sql)->row();
				$this->db->order_by('id','asc');
				if($count_pur->total_pur>=50){
					if($set_data->rank=='Ruby'){
						$query1	= "SELECT * FROM `member` WHERE sponsor =".$level1;
						$Ndata	= $this->db->query($query1)->result();
						if($Ndata){
							$binary_income	= 0;
							foreach($Ndata as $set_down){
								$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
							}
							$payble_amm	= round((10/100)*$binary_income,1);
							$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 1', 'Leadership Bonus level 1', $payble_amm, '', '');
						}
					
					}
					elseif($set_data->rank=='Emerald'){
						$query1	= "SELECT * FROM `member` WHERE sponsor =".$set_data->id;
						$Ndata	= $this->db->query($query1)->result();
						if($Ndata){
							$binary_income	= 0;
							$level1	= array();
							$i	= 0;
							foreach($Ndata as $set_down){
								$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
								$level1[$i]	= $set_down->id;
								$i++;
							}
							$payble_amm	= round((10/100)*$binary_income,1);
							$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 1', 'Leadership Bonus level 1', $payble_amm, '', '');
							if(!empty($level1)){
								$level1	= implode(',',$level1);
								$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level1.")";
								$Ndata	= $this->db->query($query1)->result();
								if($Ndata){
									$binary_income	= 0;
									foreach($Ndata as $set_down){
										$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
									}
									$payble_amm	= round((5/100)*$binary_income,1);
									$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 2', 'Leadership Bonus level 2', $payble_amm, '', '');
								}
							}
						}
					}
					elseif($set_data->rank=='Diamond'){
						$query1	= "SELECT * FROM `member` WHERE sponsor =".$set_data->id;
						$Ndata	= $this->db->query($query1)->result();
						if($Ndata){
							$binary_income	= 0;
							$level1	= array();
							$i	= 0;
							foreach($Ndata as $set_down){
								$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
								$level1[$i]	= $set_down->id;
								$i++;
							}
							$payble_amm	= round((10/100)*$binary_income,1);
							$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 1', 'Leadership Bonus level 1', $payble_amm, '', '');
							if(!empty($level1)){
								$level1	= implode(',',$level1);
								$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level1.")";
								$Ndata	= $this->db->query($query1)->result();
								if($Ndata){
									$binary_income	= 0;
									foreach($Ndata as $set_down){
										$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
									}
									$payble_amm	= round((7/100)*$binary_income,1);
									$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 2', 'Leadership Bonus level 2', $payble_amm, '', '');
								}
							}
						}
					}
					elseif($set_data->rank=='Silver Diamond'){
						$query1	= "SELECT * FROM `member` WHERE sponsor =".$set_data->id;
						$Ndata	= $this->db->query($query1)->result();
						if($Ndata){
							$binary_income	= 0;
							$level1	= array();
							$i	= 0;
							foreach($Ndata as $set_down){
								$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
								$level1[$i]	= $set_down->id;
								$i++;
							}
							$payble_amm	= round((10/100)*$binary_income,1);
							$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 1', 'Leadership Bonus level 1', $payble_amm, '', '');
							if(!empty($level1)){
								$level1	= implode(',',$level1);
								$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level1.")";
								$Ndata	= $this->db->query($query1)->result();
								if($Ndata){
									$binary_income	= 0;
									foreach($Ndata as $set_down){
										$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
									}
									$payble_amm	= round((10/100)*$binary_income,1);
									$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 2', 'Leadership Bonus level 2', $payble_amm, '', '');
								}
							}
						}
					}
					elseif($set_data->rank=='Gold Diamond'){
						$query1	= "SELECT * FROM `member` WHERE sponsor =".$set_data->id;
						$Ndata	= $this->db->query($query1)->result();
						if($Ndata){
							$binary_income	= 0;
							$level1	= array();
							$i	= 0;
							foreach($Ndata as $set_down){
								$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
								$level1[$i]	= $set_down->id;
								$i++;
							}
							$payble_amm	= round((10/100)*$binary_income,1);
							$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 1', 'Leadership Bonus level 1', $payble_amm, '', '');
							if(!empty($level1)){
								$level1	= implode(',',$level1);
								$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level1.")";
								$Ndata	= $this->db->query($query1)->result();
								if($Ndata){
									$binary_income	= 0;
									$level2	= array();
									$i	= 0;
									foreach($Ndata as $set_down){
										$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
										$level2[$i]	= $set_down->id;
										$i++;
									}
									$payble_amm	= round((10/100)*$binary_income,1);
									$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 2', 'Leadership Bonus level 2', $payble_amm, '', '');
								}
								if(!empty($level2)){
									$level2	= implode(',',$level2);
									$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level2.")";
									$Ndata	= $this->db->query($query1)->result();
									if($Ndata){
										$binary_income	= 0;
										foreach($Ndata as $set_down){
											$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
										}
										$payble_amm	= round((5/100)*$binary_income,1);
										$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 3', 'Leadership Bonus level 3', $payble_amm, '', '');
									}
								}
							}
						}
					}
					elseif($set_data->rank=='Blue Diamond'){
						$query1	= "SELECT * FROM `member` WHERE sponsor =".$set_data->id;
						$Ndata	= $this->db->query($query1)->result();
						if($Ndata){
							$binary_income	= 0;
							$level1	= array();
							$i	= 0;
							foreach($Ndata as $set_down){
								$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
								$level1[$i]	= $set_down->id;
								$i++;
							}
							$payble_amm	= round((10/100)*$binary_income,1);
							$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 1', 'Leadership Bonus level 1', $payble_amm, '', '');
							if(!empty($level1)){
								$level1	= implode(',',$level1);
								$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level1.")";
								$Ndata	= $this->db->query($query1)->result();
								if($Ndata){
									$binary_income	= 0;
									$level2	= array();
									$i	= 0;
									foreach($Ndata as $set_down){
										$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
										$level2[$i]	= $set_down->id;
										$i++;
									}
									$payble_amm	= round((10/100)*$binary_income,1);
									$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 2', 'Leadership Bonus level 2', $payble_amm, '', '');
								}
								if(!empty($level2)){
									$level2	= implode(',',$level2);
									$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level2.")";
									$Ndata	= $this->db->query($query1)->result();
									if($Ndata){
										$binary_income	= 0;
										$level3	= array();
										$i	= 0;
										foreach($Ndata as $set_down){
											$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
											$level3[$i]	= $set_down->id;
											$i++;
										}
										$payble_amm	= round((5/100)*$binary_income,1);
										$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 3', 'Leadership Bonus level 3', $payble_amm, '', '');
									}
									if(!empty($level3)){
										$level3	= implode(',',$level3);
										$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level3.")";
										$Ndata	= $this->db->query($query1)->result();
										if($Ndata){
											$binary_income	= 0;
											foreach($Ndata as $set_down){
												$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
											}
											$payble_amm	= round((5/100)*$binary_income,1);
											$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 4', 'Leadership Bonus level 4', $payble_amm, '', '');
										}
									}

								}
							}
						}
					}
					elseif($set_data->rank=='Green Diamond'){
						$query1	= "SELECT * FROM `member` WHERE sponsor =".$set_data->id;
						$Ndata	= $this->db->query($query1)->result();
						if($Ndata){
							$binary_income	= 0;
							$level1	= array();
							$i	= 0;
							foreach($Ndata as $set_down){
								$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
								$level1[$i]	= $set_down->id;
								$i++;
							}
							$payble_amm	= round((10/100)*$binary_income,1);
							$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 1', 'Leadership Bonus level 1', $payble_amm, '', '');
							if(!empty($level1)){
								$level1	= implode(',',$level1);
								$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level1.")";
								$Ndata	= $this->db->query($query1)->result();
								if($Ndata){
									$binary_income	= 0;
									$level2	= array();
									$i	= 0;
									foreach($Ndata as $set_down){
										$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
										$level2[$i]	= $set_down->id;
										$i++;
									}
									$payble_amm	= round((10/100)*$binary_income,1);
									$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 2', 'Leadership Bonus level 2', $payble_amm, '', '');
								}
								if(!empty($level2)){
									$level2	= implode(',',$level2);
									$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level2.")";
									$Ndata	= $this->db->query($query1)->result();
									if($Ndata){
										$binary_income	= 0;
										$level3	= array();
										$i	= 0;
										foreach($Ndata as $set_down){
											$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
											$level3[$i]	= $set_down->id;
											$i++;
										}
										$payble_amm	= round((5/100)*$binary_income,1);
										$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 3', 'Leadership Bonus level 3', $payble_amm, '', '');
									}
									if(!empty($level3)){
										$level3	= implode(',',$level3);
										$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level3.")";
										$Ndata	= $this->db->query($query1)->result();
										if($Ndata){
											$binary_income	= 0;
											$level4	= array();
											$i	= 0;
											foreach($Ndata as $set_down){
												$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
												$level4[$i]	= $set_down->id;
												$i++;
											}
											$payble_amm	= round((5/100)*$binary_income,1);
											$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 4', 'Leadership Bonus level 4', $payble_amm, '', '');
										}
										if(!empty($level4)){
											$level4	= implode(',',$level4);
											$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level4.")";
											$Ndata	= $this->db->query($query1)->result();
											if($Ndata){
												$binary_income	= 0;
												foreach($Ndata as $set_down){
													$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
												}
												$payble_amm	= round((5/100)*$binary_income,1);
												$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 5', 'Leadership Bonus level 5', $payble_amm, '', '');
											}
										}
									}

								}
							}
						}
					}
					elseif($set_data->rank=='Purple Diamond'){
						$query1	= "SELECT * FROM `member` WHERE sponsor =".$set_data->id;
						$Ndata	= $this->db->query($query1)->result();
						if($Ndata){
							$binary_income	= 0;
							$level1	= array();
							$i	= 0;
							foreach($Ndata as $set_down){
								$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
								$level1[$i]	= $set_down->id;
								$i++;
							}
							$payble_amm	= round((10/100)*$binary_income,1);
							$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 1', 'Leadership Bonus level 1', $payble_amm, '', '');
							if(!empty($level1)){
								$level1	= implode(',',$level1);
								$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level1.")";
								$Ndata	= $this->db->query($query1)->result();
								if($Ndata){
									$binary_income	= 0;
									$level2	= array();
									$i	= 0;
									foreach($Ndata as $set_down){
										$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
										$level2[$i]	= $set_down->id;
										$i++;
									}
									$payble_amm	= round((10/100)*$binary_income,1);
									$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 2', 'Leadership Bonus level 2', $payble_amm, '', '');
								}
								if(!empty($level2)){
									$level2	= implode(',',$level2);
									$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level2.")";
									$Ndata	= $this->db->query($query1)->result();
									if($Ndata){
										$binary_income	= 0;
										$level3	= array();
										$i	= 0;
										foreach($Ndata as $set_down){
											$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
											$level3[$i]	= $set_down->id;
											$i++;
										}
										$payble_amm	= round((10/100)*$binary_income,1);
										$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 3', 'Leadership Bonus level 3', $payble_amm, '', '');
									}
									if(!empty($level3)){
										$level3	= implode(',',$level3);
										$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level3.")";
										$Ndata	= $this->db->query($query1)->result();
										if($Ndata){
											$binary_income	= 0;
											$level4	= array();
											$i	= 0;
											foreach($Ndata as $set_down){
												$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
												$level4[$i]	= $set_down->id;
												$i++;
											}
											$payble_amm	= round((5/100)*$binary_income,1);
											$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 4', 'Leadership Bonus level 4', $payble_amm, '', '');
										}
										if(!empty($level4)){
											$level4	= implode(',',$level4);
											$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level4.")";
											$Ndata	= $this->db->query($query1)->result();
											if($Ndata){
												$binary_income	= 0;
												$level5	= array();
												$i	= 0;
												foreach($Ndata as $set_down){
													$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
													$level5[$i]	= $set_down->id;
													$i++;
												}
												$payble_amm	= round((5/100)*$binary_income,1);
												$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 5', 'Leadership Bonus level 5', $payble_amm, '', '');
											}
											if(!empty($level5)){
												$level5	= implode(',',$level5);
												$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level5.")";
												$Ndata	= $this->db->query($query1)->result();
												if($Ndata){
													$binary_income	= 0;
													foreach($Ndata as $set_down){
														$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
													}
													$payble_amm	= round((5/100)*$binary_income,1);
													$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 6', 'Leadership Bonus level 6', $payble_amm, '', '');
												}
											}
										}
									}

								}
							}
						}
					}
					elseif($set_data->rank=='Red Diamond'){
						$query1	= "SELECT * FROM `member` WHERE sponsor =".$set_data->id;
						$Ndata	= $this->db->query($query1)->result();
						if($Ndata){
							$binary_income	= 0;
							$level1	= array();
							$i	= 0;
							foreach($Ndata as $set_down){
								$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
								$level1[$i]	= $set_down->id;
								$i++;
							}
							$payble_amm	= round((10/100)*$binary_income,1);
							$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 1', 'Leadership Bonus level 1', $payble_amm, '', '');
							if(!empty($level1)){
								$level1	= implode(',',$level1);
								$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level1.")";
								$Ndata	= $this->db->query($query1)->result();
								if($Ndata){
									$binary_income	= 0;
									$level2	= array();
									$i	= 0;
									foreach($Ndata as $set_down){
										$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
										$level2[$i]	= $set_down->id;
										$i++;
									}
									$payble_amm	= round((10/100)*$binary_income,1);
									$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 2', 'Leadership Bonus level 2', $payble_amm, '', '');
								}
								if(!empty($level2)){
									$level2	= implode(',',$level2);
									$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level2.")";
									$Ndata	= $this->db->query($query1)->result();
									if($Ndata){
										$binary_income	= 0;
										$level3	= array();
										$i	= 0;
										foreach($Ndata as $set_down){
											$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
											$level3[$i]	= $set_down->id;
											$i++;
										}
										$payble_amm	= round((10/100)*$binary_income,1);
										$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 3', 'Leadership Bonus level 3', $payble_amm, '', '');
									}
									if(!empty($level3)){
										$level3	= implode(',',$level3);
										$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level3.")";
										$Ndata	= $this->db->query($query1)->result();
										if($Ndata){
											$binary_income	= 0;
											$level4	= array();
											$i	= 0;
											foreach($Ndata as $set_down){
												$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
												$level4[$i]	= $set_down->id;
												$i++;
											}
											$payble_amm	= round((5/100)*$binary_income,1);
											$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 4', 'Leadership Bonus level 4', $payble_amm, '', '');
										}
										if(!empty($level4)){
											$level4	= implode(',',$level4);
											$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level4.")";
											$Ndata	= $this->db->query($query1)->result();
											if($Ndata){
												$binary_income	= 0;
												$level5	= array();
												$i	= 0;
												foreach($Ndata as $set_down){
													$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
													$level5[$i]	= $set_down->id;
													$i++;
												}
												$payble_amm	= round((5/100)*$binary_income,1);
												$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 5', 'Leadership Bonus level 5', $payble_amm, '', '');
											}
											if(!empty($level5)){
												$level5	= implode(',',$level5);
												$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level5.")";
												$Ndata	= $this->db->query($query1)->result();
												if($Ndata){
													$binary_income	= 0;
													$level6	= array();
													$i	= 0;
													foreach($Ndata as $set_down){
														$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
														$level6[$i]	= $set_down->id;
														$i++;
													}
													$payble_amm	= round((5/100)*$binary_income,1);
													$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 6', 'Leadership Bonus level 6', $payble_amm, '', '');
												}
												if(!empty($level6)){
													$level6	= implode(',',$level6);
													$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level6.")";
													$Ndata	= $this->db->query($query1)->result();
													if($Ndata){
														$binary_income	= 0;
														foreach($Ndata as $set_down){
															$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
														}
														$payble_amm	= round((5/100)*$binary_income,1);
														$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 7', 'Leadership Bonus level 7', $payble_amm, '', '');
													}
												}
											}
										}
									}

								}
							}
						}
					}
					elseif($set_data->rank=='Black Diamond'){
						$query1	= "SELECT * FROM `member` WHERE sponsor =".$set_data->id;
						$Ndata	= $this->db->query($query1)->result();
						if($Ndata){
							$binary_income	= 0;
							$level1	= array();
							$i	= 0;
							foreach($Ndata as $set_down){
								$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
								$level1[$i]	= $set_down->id;
								$i++;
							}
							$payble_amm	= round((10/100)*$binary_income,1);
							$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 1', 'Leadership Bonus level 1', $payble_amm, '', '');
							if(!empty($level1)){
								$level1	= implode(',',$level1);
								$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level1.")";
								$Ndata	= $this->db->query($query1)->result();
								if($Ndata){
									$binary_income	= 0;
									$level2	= array();
									$i	= 0;
									foreach($Ndata as $set_down){
										$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
										$level2[$i]	= $set_down->id;
										$i++;
									}
									$payble_amm	= round((10/100)*$binary_income,1);
									$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 2', 'Leadership Bonus level 2', $payble_amm, '', '');
								}
								if(!empty($level2)){
									$level2	= implode(',',$level2);
									$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level2.")";
									$Ndata	= $this->db->query($query1)->result();
									if($Ndata){
										$binary_income	= 0;
										$level3	= array();
										$i	= 0;
										foreach($Ndata as $set_down){
											$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
											$level3[$i]	= $set_down->id;
											$i++;
										}
										$payble_amm	= round((10/100)*$binary_income,1);
										$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 3', 'Leadership Bonus level 3', $payble_amm, '', '');
									}
									if(!empty($level3)){
										$level3	= implode(',',$level3);
										$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level3.")";
										$Ndata	= $this->db->query($query1)->result();
										if($Ndata){
											$binary_income	= 0;
											$level4	= array();
											$i	= 0;
											foreach($Ndata as $set_down){
												$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
												$level4[$i]	= $set_down->id;
												$i++;
											}
											$payble_amm	= round((5/100)*$binary_income,1);
											$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 4', 'Leadership Bonus level 4', $payble_amm, '', '');
										}
										if(!empty($level4)){
											$level4	= implode(',',$level4);
											$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level4.")";
											$Ndata	= $this->db->query($query1)->result();
											if($Ndata){
												$binary_income	= 0;
												$level5	= array();
												$i	= 0;
												foreach($Ndata as $set_down){
													$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
													$level5[$i]	= $set_down->id;
													$i++;
												}
												$payble_amm	= round((5/100)*$binary_income,1);
												$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 5', 'Leadership Bonus level 5', $payble_amm, '', '');
											}
											if(!empty($level5)){
												$level5	= implode(',',$level5);
												$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level5.")";
												$Ndata	= $this->db->query($query1)->result();
												if($Ndata){
													$binary_income	= 0;
													$level6	= array();
													$i	= 0;
													foreach($Ndata as $set_down){
														$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
														$level6[$i]	= $set_down->id;
														$i++;
													}
													$payble_amm	= round((5/100)*$binary_income,1);
													$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 6', 'Leadership Bonus level 6', $payble_amm, '', '');
												}
												if(!empty($level6)){
													$level6	= implode(',',$level6);
													$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level6.")";
													$Ndata	= $this->db->query($query1)->result();
													if($Ndata){
														$binary_income	= 0;
														$level7	= array();
														$i	= 0;
														foreach($Ndata as $set_down){
															$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
															$level7[$i]	= $set_down->id;
															$i++;
														}
														$payble_amm	= round((5/100)*$binary_income,1);
														$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 7', 'Leadership Bonus level 7', $payble_amm, '', '');
													}
												}
												if(!empty($level7)){
													$level7	= implode(',',$level7);
													$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level7.")";
													$Ndata	= $this->db->query($query1)->result();
													if($Ndata){
														$binary_income	= 0;
														foreach($Ndata as $set_down){
															$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
														}
														$payble_amm	= round((5/100)*$binary_income,1);
														$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 8', 'Leadership Bonus level 8', $payble_amm, '', '');
													}
												}
											}
										}
									}

								}
							}
						}
					}
					elseif($set_data->rank=='Crown Diamond'){
						$query1	= "SELECT * FROM `member` WHERE sponsor =".$set_data->id;
						$Ndata	= $this->db->query($query1)->result();
						if($Ndata){
							$binary_income	= 0;
							$level1	= array();
							$i	= 0;
							foreach($Ndata as $set_down){
								$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
								$level1[$i]	= $set_down->id;
								$i++;
							}
							$payble_amm	= round((10/100)*$binary_income,1);
							$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 1', 'Leadership Bonus level 1', $payble_amm, '', '');
							if(!empty($level1)){
								$level1	= implode(',',$level1);
								$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level1.")";
								$Ndata	= $this->db->query($query1)->result();
								if($Ndata){
									$binary_income	= 0;
									$level2	= array();
									$i	= 0;
									foreach($Ndata as $set_down){
										$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
										$level2[$i]	= $set_down->id;
										$i++;
									}
									$payble_amm	= round((10/100)*$binary_income,1);
									$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 2', 'Leadership Bonus level 2', $payble_amm, '', '');
								}
								if(!empty($level2)){
									$level2	= implode(',',$level2);
									$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level2.")";
									$Ndata	= $this->db->query($query1)->result();
									if($Ndata){
										$binary_income	= 0;
										$level3	= array();
										$i	= 0;
										foreach($Ndata as $set_down){
											$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
											$level3[$i]	= $set_down->id;
											$i++;
										}
										$payble_amm	= round((10/100)*$binary_income,1);
										$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 3', 'Leadership Bonus level 3', $payble_amm, '', '');
									}
									if(!empty($level3)){
										$level3	= implode(',',$level3);
										$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level3.")";
										$Ndata	= $this->db->query($query1)->result();
										if($Ndata){
											$binary_income	= 0;
											$level4	= array();
											$i	= 0;
											foreach($Ndata as $set_down){
												$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
												$level4[$i]	= $set_down->id;
												$i++;
											}
											$payble_amm	= round((5/100)*$binary_income,1);
											$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 4', 'Leadership Bonus level 4', $payble_amm, '', '');
										}
										if(!empty($level4)){
											$level4	= implode(',',$level4);
											$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level4.")";
											$Ndata	= $this->db->query($query1)->result();
											if($Ndata){
												$binary_income	= 0;
												$level5	= array();
												$i	= 0;
												foreach($Ndata as $set_down){
													$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
													$level5[$i]	= $set_down->id;
													$i++;
												}
												$payble_amm	= round((5/100)*$binary_income,1);
												$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 5', 'Leadership Bonus level 5', $payble_amm, '', '');
											}
											if(!empty($level5)){
												$level5	= implode(',',$level5);
												$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level5.")";
												$Ndata	= $this->db->query($query1)->result();
												if($Ndata){
													$binary_income	= 0;
													$level6	= array();
													$i	= 0;
													foreach($Ndata as $set_down){
														$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
														$level6[$i]	= $set_down->id;
														$i++;
													}
													$payble_amm	= round((5/100)*$binary_income,1);
													$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 6', 'Leadership Bonus level 6', $payble_amm, '', '');
												}
												if(!empty($level6)){
													$level6	= implode(',',$level6);
													$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level6.")";
													$Ndata	= $this->db->query($query1)->result();
													if($Ndata){
														$binary_income	= 0;
														$level7	= array();
														$i	= 0;
														foreach($Ndata as $set_down){
															$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
															$level7[$i]	= $set_down->id;
															$i++;
														}
														$payble_amm	= round((5/100)*$binary_income,1);
														$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 7', 'Leadership Bonus level 7', $payble_amm, '', '');
													}
												}
												if(!empty($level7)){
													$level7	= implode(',',$level7);
													$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level7.")";
													$Ndata	= $this->db->query($query1)->result();
													if($Ndata){
														$binary_income	= 0;
														$level8	= array();
														$i	= 0;
														foreach($Ndata as $set_down){
															$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
															$level8[$i]	= $set_down->id;
															$i++;
														}
														$payble_amm	= round((5/100)*$binary_income,1);
														$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 8', 'Leadership Bonus level 8', $payble_amm, '', '');
													}
												}
												if(!empty($level8)){
													$level8	= implode(',',$level8);
													$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level8.")";
													$Ndata	= $this->db->query($query1)->result();
													if($Ndata){
														$binary_income	= 0;
														foreach($Ndata as $set_down){
															$binary_income=$this->db_model->sum('amount', 'earning', array('type'=>"First Pair Matching Comm", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) )) + $this->db_model->sum('amount', 'earning', array('type'=>"Binary Commission", 'userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
														}
														$payble_amm	= round((5/100)*$binary_income,1);
														$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 9', 'Leadership Bonus level 9', $payble_amm, '', '');
													}
												}
											}
										}
									}

								}
							}
						}
					}
				}
				$this->db->where('id',$set_data->id);
				$this->db->update('member',array('leadership_bonus'=>date('Y-m-d')));
			}
		}
	}
	function unilevel_bonus(){
		$query	= "SELECT * FROM `member` WHERE rank in('Ruby','Emrald','Diamond','Silver Diamond','Gold Diamond','Blue Diamond','Green Diamond','Red Diamond','Black Diamond','Crown Diamond') and YEAR(unilevel_bonus) <= ".date('Y')." AND MONTH(unilevel_bonus) <".date('m')." order by id ASC";
		$data	= $this->db->query($query)->result();
		if($data){
			foreach($data as $set_data){
				$pur_from	= new DateTime();
				$pur_from->modify( 'first day of this month 000000' );
				$pur_to	= new DateTime();
				$pur_to->modify( 'last day of this month 235959' );

				$startDate = new DateTime();
				$startDate->modify( 'first day of this month 000000' );
				$endDate	= new DateTime($startDate->format('Y-m-d 23:59:59'));
				$endDate->modify('+14 days'); 
				$sql	= "SELECT SUM(total_amt) as total_pur FROM `tbl_order_details` 
WHERE user_id=".$set_data->id." AND (tbl_order_details.order_date BETWEEN '" . strtotime($startDate->format( 'Y-m-d H:i:s' )) . "' AND '" . strtotime($endDate->format( 'Y-m-d H:i:s') ). "')";
				$count_pur	= $this->db->query($sql)->row();
				$this->db->order_by('id','asc');
				if($count_pur->total_pur>=50){
					if($set_data->rank=='Diamond'){
						$query1	= "SELECT * FROM `member` WHERE sponsor =".$set_data->id;
						$Ndata	= $this->db->query($query1)->result();
						if($Ndata){
							$binary_income	= 0;
							$level1	= array();
							$i	= 0;
							foreach($Ndata as $set_down){
								$binary_income=$this->db_model->sum('tbl_order_details', 'total_amt', array('userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
								$level1[$i]	= $set_down->id;
								$i++;
							}
							$payble_amm	= round((15/100)*$binary_income,1);
							$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 1', 'Leadership Bonus level 1', $payble_amm, '', '');
						}
					}
					elseif($set_data->rank=='Silver Diamond'){
						$query1	= "SELECT * FROM `member` WHERE sponsor =".$set_data->id;
						$Ndata	= $this->db->query($query1)->result();
						if($Ndata){
							$binary_income	= 0;
							$level1	= array();
							$i	= 0;
							foreach($Ndata as $set_down){
								$binary_income=$this->db_model->sum('tbl_order_details', 'total_amt', array('userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
								$level1[$i]	= $set_down->id;
								$i++;
							}
							$payble_amm	= round((15/100)*$binary_income,1);
							$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 1', 'Leadership Bonus level 1', $payble_amm, '', '');
							if(!empty($level1)){
								$level1	= implode(',',$level1);
								$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level1.")";
								$Ndata	= $this->db->query($query1)->result();
								if($Ndata){
									$binary_income	= 0;
									foreach($Ndata as $set_down){
										$binary_income=$this->db_model->sum('tbl_order_details', 'total_amt', array('userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
									}
									$payble_amm	= round((10/100)*$binary_income,1);
									$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 2', 'Leadership Bonus level 2', $payble_amm, '', '');
								}
							}
						}
					}
					elseif($set_data->rank=='Gold Diamond'){
						$query1	= "SELECT * FROM `member` WHERE sponsor =".$set_data->id;
						$Ndata	= $this->db->query($query1)->result();
						if($Ndata){
							$binary_income	= 0;
							$level1	= array();
							$i	= 0;
							foreach($Ndata as $set_down){
								$binary_income=$this->db_model->sum('tbl_order_details', 'total_amt', array('userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
								$level1[$i]	= $set_down->id;
								$i++;
							}
							$payble_amm	= round((15/100)*$binary_income,1);
							$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 1', 'Leadership Bonus level 1', $payble_amm, '', '');
							if(!empty($level1)){
								$level1	= implode(',',$level1);
								$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level1.")";
								$Ndata	= $this->db->query($query1)->result();
								if($Ndata){
									$binary_income	= 0;
									$level2	= array();
									$i	= 0;
									foreach($Ndata as $set_down){
										$binary_income=$this->db_model->sum('tbl_order_details', 'total_amt', array('userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
										$level2[$i]	= $set_down->id;
										$i++;
									}
									$payble_amm	= round((10/100)*$binary_income,1);
									$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 2', 'Leadership Bonus level 2', $payble_amm, '', '');
								}
								if(!empty($level2)){
									$level2	= implode(',',$level2);
									$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level2.")";
									$Ndata	= $this->db->query($query1)->result();
									if($Ndata){
										$binary_income	= 0;
										foreach($Ndata as $set_down){
											$binary_income=$this->db_model->sum('tbl_order_details', 'total_amt', array('userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
										}
										$payble_amm	= round((8/100)*$binary_income,1);
										$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 3', 'Leadership Bonus level 3', $payble_amm, '', '');
									}
								}
							}
						}
					}
					elseif($set_data->rank=='Blue Diamond'){
						$query1	= "SELECT * FROM `member` WHERE sponsor =".$set_data->id;
						$Ndata	= $this->db->query($query1)->result();
						if($Ndata){
							$binary_income	= 0;
							$level1	= array();
							$i	= 0;
							foreach($Ndata as $set_down){
								$binary_income=$this->db_model->sum('tbl_order_details', 'total_amt', array('userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
								$level1[$i]	= $set_down->id;
								$i++;
							}
							$payble_amm	= round((15/100)*$binary_income,1);
							$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 1', 'Leadership Bonus level 1', $payble_amm, '', '');
							if(!empty($level1)){
								$level1	= implode(',',$level1);
								$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level1.")";
								$Ndata	= $this->db->query($query1)->result();
								if($Ndata){
									$binary_income	= 0;
									$level2	= array();
									$i	= 0;
									foreach($Ndata as $set_down){
										$binary_income=$this->db_model->sum('tbl_order_details', 'total_amt', array('userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
										$level2[$i]	= $set_down->id;
										$i++;
									}
									$payble_amm	= round((10/100)*$binary_income,1);
									$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 2', 'Leadership Bonus level 2', $payble_amm, '', '');
								}
								if(!empty($level2)){
									$level2	= implode(',',$level2);
									$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level2.")";
									$Ndata	= $this->db->query($query1)->result();
									if($Ndata){
										$binary_income	= 0;
										$level3	= array();
										$i	= 0;
										foreach($Ndata as $set_down){
											$binary_income=$this->db_model->sum('tbl_order_details', 'total_amt', array('userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
											$level3[$i]	= $set_down->id;
											$i++;
										}
										$payble_amm	= round((8/100)*$binary_income,1);
										$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 3', 'Leadership Bonus level 3', $payble_amm, '', '');
									}
									if(!empty($level3)){
										$level3	= implode(',',$level3);
										$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level3.")";
										$Ndata	= $this->db->query($query1)->result();
										if($Ndata){
											$binary_income	= 0;
											foreach($Ndata as $set_down){
												$binary_income=$this->db_model->sum('tbl_order_details', 'total_amt', array('userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
											}
											$payble_amm	= round((6/100)*$binary_income,1);
											$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 4', 'Leadership Bonus level 4', $payble_amm, '', '');
										}
									}

								}
							}
						}
					}
					elseif($set_data->rank=='Green Diamond'){
						$query1	= "SELECT * FROM `member` WHERE sponsor =".$set_data->id;
						$Ndata	= $this->db->query($query1)->result();
						if($Ndata){
							$binary_income	= 0;
							$level1	= array();
							$i	= 0;
							foreach($Ndata as $set_down){
								$binary_income=$this->db_model->sum('tbl_order_details', 'total_amt', array('userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
								$level1[$i]	= $set_down->id;
								$i++;
							}
							$payble_amm	= round((15/100)*$binary_income,1);
							$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 1', 'Leadership Bonus level 1', $payble_amm, '', '');
							if(!empty($level1)){
								$level1	= implode(',',$level1);
								$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level1.")";
								$Ndata	= $this->db->query($query1)->result();
								if($Ndata){
									$binary_income	= 0;
									$level2	= array();
									$i	= 0;
									foreach($Ndata as $set_down){
										$binary_income=$this->db_model->sum('tbl_order_details', 'total_amt', array('userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
										$level2[$i]	= $set_down->id;
										$i++;
									}
									$payble_amm	= round((10/100)*$binary_income,1);
									$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 2', 'Leadership Bonus level 2', $payble_amm, '', '');
								}
								if(!empty($level2)){
									$level2	= implode(',',$level2);
									$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level2.")";
									$Ndata	= $this->db->query($query1)->result();
									if($Ndata){
										$binary_income	= 0;
										$level3	= array();
										$i	= 0;
										foreach($Ndata as $set_down){
											$binary_income=$this->db_model->sum('tbl_order_details', 'total_amt', array('userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
											$level3[$i]	= $set_down->id;
											$i++;
										}
										$payble_amm	= round((8/100)*$binary_income,1);
										$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 3', 'Leadership Bonus level 3', $payble_amm, '', '');
									}
									if(!empty($level3)){
										$level3	= implode(',',$level3);
										$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level3.")";
										$Ndata	= $this->db->query($query1)->result();
										if($Ndata){
											$binary_income	= 0;
											$level4	= array();
											$i	= 0;
											foreach($Ndata as $set_down){
												$binary_income=$this->db_model->sum('tbl_order_details', 'total_amt', array('userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
												$level4[$i]	= $set_down->id;
												$i++;
											}
											$payble_amm	= round((6/100)*$binary_income,1);
											$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 4', 'Leadership Bonus level 4', $payble_amm, '', '');
										}
										if(!empty($level4)){
											$level4	= implode(',',$level4);
											$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level4.")";
											$Ndata	= $this->db->query($query1)->result();
											if($Ndata){
												$binary_income	= 0;
												foreach($Ndata as $set_down){
													$binary_income=$this->db_model->sum('tbl_order_details', 'total_amt', array('userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
												}
												$payble_amm	= round((4/100)*$binary_income,1);
												$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 5', 'Leadership Bonus level 5', $payble_amm, '', '');
											}
										}
									}

								}
							}
						}
					}
					elseif($set_data->rank=='Purple Diamond'){
						$query1	= "SELECT * FROM `member` WHERE sponsor =".$set_data->id;
						$Ndata	= $this->db->query($query1)->result();
						if($Ndata){
							$binary_income	= 0;
							$level1	= array();
							$i	= 0;
							foreach($Ndata as $set_down){
								$binary_income=$this->db_model->sum('tbl_order_details', 'total_amt', array('userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
								$level1[$i]	= $set_down->id;
								$i++;
							}
							$payble_amm	= round((15/100)*$binary_income,1);
							$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 1', 'Leadership Bonus level 1', $payble_amm, '', '');
							if(!empty($level1)){
								$level1	= implode(',',$level1);
								$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level1.")";
								$Ndata	= $this->db->query($query1)->result();
								if($Ndata){
									$binary_income	= 0;
									$level2	= array();
									$i	= 0;
									foreach($Ndata as $set_down){
										$binary_income=$this->db_model->sum('tbl_order_details', 'total_amt', array('userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
										$level2[$i]	= $set_down->id;
										$i++;
									}
									$payble_amm	= round((10/100)*$binary_income,1);
									$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 2', 'Leadership Bonus level 2', $payble_amm, '', '');
								}
								if(!empty($level2)){
									$level2	= implode(',',$level2);
									$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level2.")";
									$Ndata	= $this->db->query($query1)->result();
									if($Ndata){
										$binary_income	= 0;
										$level3	= array();
										$i	= 0;
										foreach($Ndata as $set_down){
											$binary_income=$this->db_model->sum('tbl_order_details', 'total_amt', array('userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
											$level3[$i]	= $set_down->id;
											$i++;
										}
										$payble_amm	= round((8/100)*$binary_income,1);
										$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 3', 'Leadership Bonus level 3', $payble_amm, '', '');
									}
									if(!empty($level3)){
										$level3	= implode(',',$level3);
										$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level3.")";
										$Ndata	= $this->db->query($query1)->result();
										if($Ndata){
											$binary_income	= 0;
											$level4	= array();
											$i	= 0;
											foreach($Ndata as $set_down){
												$binary_income=$this->db_model->sum('tbl_order_details', 'total_amt', array('userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
												$level4[$i]	= $set_down->id;
												$i++;
											}
											$payble_amm	= round((6/100)*$binary_income,1);
											$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 4', 'Leadership Bonus level 4', $payble_amm, '', '');
										}
										if(!empty($level4)){
											$level4	= implode(',',$level4);
											$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level4.")";
											$Ndata	= $this->db->query($query1)->result();
											if($Ndata){
												$binary_income	= 0;
												$level5	= array();
												$i	= 0;
												foreach($Ndata as $set_down){
													$binary_income=$this->db_model->sum('tbl_order_details', 'total_amt', array('userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
													$level5[$i]	= $set_down->id;
													$i++;
												}
												$payble_amm	= round((4/100)*$binary_income,1);
												$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 5', 'Leadership Bonus level 5', $payble_amm, '', '');
											}
											if(!empty($level5)){
												$level5	= implode(',',$level5);
												$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level5.")";
												$Ndata	= $this->db->query($query1)->result();
												if($Ndata){
													$binary_income	= 0;
													foreach($Ndata as $set_down){
														$binary_income=$this->db_model->sum('tbl_order_details', 'total_amt', array('userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
													}
													$payble_amm	= round((4/100)*$binary_income,1);
													$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 6', 'Leadership Bonus level 6', $payble_amm, '', '');
												}
											}
										}
									}

								}
							}
						}
					}
					elseif($set_data->rank=='Red Diamond'||$set_data->rank=='Black Diamond'||$set_data->rank=='Crown Diamond'){
						$query1	= "SELECT * FROM `member` WHERE sponsor =".$set_data->id;
						$Ndata	= $this->db->query($query1)->result();
						if($Ndata){
							$binary_income	= 0;
							$level1	= array();
							$i	= 0;
							foreach($Ndata as $set_down){
								$binary_income=$this->db_model->sum('tbl_order_details', 'total_amt', array('userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
								$level1[$i]	= $set_down->id;
								$i++;
							}
							$payble_amm	= round((15/100)*$binary_income,1);
							$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 1', 'Leadership Bonus level 1', $payble_amm, '', '');
							if(!empty($level1)){
								$level1	= implode(',',$level1);
								$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level1.")";
								$Ndata	= $this->db->query($query1)->result();
								if($Ndata){
									$binary_income	= 0;
									$level2	= array();
									$i	= 0;
									foreach($Ndata as $set_down){
										$binary_income=$this->db_model->sum('tbl_order_details', 'total_amt', array('userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
										$level2[$i]	= $set_down->id;
										$i++;
									}
									$payble_amm	= round((10/100)*$binary_income,1);
									$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 2', 'Leadership Bonus level 2', $payble_amm, '', '');
								}
								if(!empty($level2)){
									$level2	= implode(',',$level2);
									$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level2.")";
									$Ndata	= $this->db->query($query1)->result();
									if($Ndata){
										$binary_income	= 0;
										$level3	= array();
										$i	= 0;
										foreach($Ndata as $set_down){
											$binary_income=$this->db_model->sum('tbl_order_details', 'total_amt', array('userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
											$level3[$i]	= $set_down->id;
											$i++;
										}
										$payble_amm	= round((8/100)*$binary_income,1);
										$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 3', 'Leadership Bonus level 3', $payble_amm, '', '');
									}
									if(!empty($level3)){
										$level3	= implode(',',$level3);
										$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level3.")";
										$Ndata	= $this->db->query($query1)->result();
										if($Ndata){
											$binary_income	= 0;
											$level4	= array();
											$i	= 0;
											foreach($Ndata as $set_down){
												$binary_income=$this->db_model->sum('tbl_order_details', 'total_amt', array('userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
												$level4[$i]	= $set_down->id;
												$i++;
											}
											$payble_amm	= round((6/100)*$binary_income,1);
											$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 4', 'Leadership Bonus level 4', $payble_amm, '', '');
										}
										if(!empty($level4)){
											$level4	= implode(',',$level4);
											$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level4.")";
											$Ndata	= $this->db->query($query1)->result();
											if($Ndata){
												$binary_income	= 0;
												$level5	= array();
												$i	= 0;
												foreach($Ndata as $set_down){
													$binary_income=$this->db_model->sum('tbl_order_details', 'total_amt', array('userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
													$level5[$i]	= $set_down->id;
													$i++;
												}
												$payble_amm	= round((4/100)*$binary_income,1);
												$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 5', 'Leadership Bonus level 5', $payble_amm, '', '');
											}
											if(!empty($level5)){
												$level5	= implode(',',$level5);
												$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level5.")";
												$Ndata	= $this->db->query($query1)->result();
												if($Ndata){
													$binary_income	= 0;
													$level6	= array();
													$i	= 0;
													foreach($Ndata as $set_down){
														$binary_income=$this->db_model->sum('tbl_order_details', 'total_amt', array('userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
														$level6[$i]	= $set_down->id;
														$i++;
													}
													$payble_amm	= round((4/100)*$binary_income,1);
													$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 6', 'Leadership Bonus level 6', $payble_amm, '', '');
												}
												if(!empty($level6)){
													$level6	= implode(',',$level6);
													$query1	= "SELECT * FROM `member` WHERE sponsor in (".$level6.")";
													$Ndata	= $this->db->query($query1)->result();
													if($Ndata){
														$binary_income	= 0;
														foreach($Ndata as $set_down){
															$binary_income=$this->db_model->sum('tbl_order_details', 'total_amt', array('userid' => $set_down->id,'date>='=>$pur_from->format( 'Y-m-d H:i:s' ),'date<='=>$pur_to->format( 'Y-m-d H:i:s' ) ))+$binary_income;
														}
														$payble_amm	= round((3/100)*$binary_income,1);
														$this->earning->pay_earning($set_data->id,'', 'Leadership Bonus level 7', 'Leadership Bonus level 7', $payble_amm, '', '');
													}
												}
											}
										}
									}

								}
							}
						}
					}
				}
				$this->db->where('id',$set_data->id);
				$this->db->update('member',array('unilevel_bonus'=>date('Y-m-d')));
			}
		}
	}
	public function pay_upgradeincome(){
		debug_log('start: '.date('d-m-Y H:i:s'));
		$query	= "SELECT * FROM `epin` WHERE is_upgrade=1 AND is_paid_upgrade=0 AND STATUS='Used'";
		$epins	= $this->db->query($query)->result();
		if($epins){
			foreach($epins as $set_epin){
			  $payble_amm	= $set_epin->amount;
			  if($payble_amm>0){
				$member_data = $this->user_model->load_member_data($set_epin->used_by);
				$upline_data = $this->user_model->load_member_data($member_data['member']->sponsor);
				  if($upline_data['member']->signup_package==1){
					  $per	= 5;
				  }
				  elseif($upline_data['member']->signup_package==2){
					  $per	= 6;
				  }
				  elseif($upline_data['member']->signup_package==3){
					  $per	= 7;
				  }
				  elseif($upline_data['member']->signup_package==4){
					  $per	= 8;
				  }
				  elseif($upline_data['member']->signup_package==5){
					  $per	= 9;
				  }
				  elseif($upline_data['member']->signup_package==6){
					  $per	= 10;
				  }
				  elseif($upline_data['member']->signup_package==7){
					  $per	= 10;
				  }
				$comm = ($per/100) * $payble_amm;
				$this->earning->pay_earning($upline_data['member']->id,$member_data['member']->id, 'User plan upgrade fee commission ', 'User plan upgrade fee commission', $comm, '', '');
					$data	= array('is_paid_upgrade'=>1);
				  $this->db->where('id',$set_epin->id);
				  $this->db->update('epin',$data);
			  }
			}
		}
		debug_log('end: '.date('d-m-Y H:i:s'));	
	}
}


defined('BASEPATH') || true;

?> 
	