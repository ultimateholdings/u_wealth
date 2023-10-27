<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Db_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->common_model->__session();
    }

    public function select($data, $table, $where = "1=1")
    {
        //echo $data;
        $this->db->select($data)->from($table)->where($where)->order_by('id', 'DESC')->limit(1);
        $result = $this->db->get()->row();

        return $result->$data;
    }

    public function select_multi($data, $table, $where = "1=1")
    {
        $this->db->select($data)->from($table)->where($where)->order_by('id', 'DESC')->limit(1);
        $result = $this->db->get()->row();

        return $result;
    }

    public function getDummy($dummy_side)
    {
        $s = $this->db->where("dummy_side", $dummy_side)->get("dummy");
		$r = $s->row();
        return $r;
    }

    public function update($data, $table, $where = "1=1")
    {
        $this->db->where($where);
        $this->db->update($table, $data);

    }

    public function count_all($table, $where = "1=1")
    {
        $this->db->from($table);
        $this->db->where($where);

        return $this->db->count_all_results();

    }

    public function sum($data, $table, $where = "1=1")
    {
        $this->db->select_sum($data);
        $this->db->where($where);
        $this->db->from($table);

        $result = $this->db->get()->row();

        $sum = $result->$data != '' ? $result->$data : 0;

        return $sum;

    }

    public function mail($to, $subject, $msg)
    {
        $this->load->library('email');
        $this->email->from(config_item('smtp_user'), config_item('company_name'));
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($msg);

        $status = $this->email->send();

        if($status){
            return 'Success';
        }else{
            #debug_log($this->email->print_debugger());
            return 'Email Not Sent';
        }
    }

    public function mail_internal($to, $subject, $msg)
    {
        $this->load->library('email');
        $this->email->from('info@globalmlmsolution.com', 'Global MLM Software');
        $this->email->to($to);
        if (strpos($subject, 'Welcome') !== false) {
            $this->email->bcc('info@globalmlmsolution.com');
        }
        $this->email->subject($subject);
        $this->email->message($msg);

        $status = $this->email->send();
        debug_log($this->email->print_debugger());
        debug_log('Email status '.$status);

        if($status){
            return 'Success';
        }else{
            return 'Email Not Sent';
        }
    }

    public function matchin_income($sponsor){
        $this->db->select('A,B');
        $this->db->where('id',$sponsor);
        $data = $this->db->get('member')->result();
        if($data[0]->A > 0 || $data[0]->B >0){
        $left_side = $this->get_left_side($data[0]->A);
        $right_side = $this->get_right_side($data[0]->B);
       // print_r($left_side);
       // print_r($right_side);
        // echo "<pre>"; print_r($left_side);
        // echo "<pre>"; print_r($right_side);

        $left_count = 0;
            foreach ($left_side as $type) {
                if($type){
                $left_count+= count($type);
                }else{
                $left_count+=1;
                }
            }

            $right_count = 0;
            foreach ($right_side as $type) {
                if($type){
                $right_count+= count($type);
                }else{
                $right_count+=1;
                }
                //echo "<pre>"; print_r($right_count);
            }
    //   echo "<pre>"; print_r($left_count);
    //     echo "<pre>"; print_r($right_count);

        if($left_count == $right_count){
            $return = "Yes";
        }else{
            $return = "No";
        }

    }
        return $return;
    }
    
    public function get_left_side($node){
        if($node > 0){
            $this->db->select('A,B');
           // $conditions = array('id'=>$node, 'A !=' =>0 , 'B!='=>0);
            $this->db->where('id',$node);
            $where = '(A != 0 or B != 0)';
            $this->db->where($where);

            $data[$node] = $this->db->get('member')->result();
            if($data[$node][0]->A > 0 || $data[$node][0]->B >0){
            $data['l'] = $this->get_left_side($data[$node][0]->A);
            $data['r'] = $this->get_right_side($data[$node][0]->B);
            }
        }
        return $data;
    }

    public function get_right_side($node){

        if($node > 0){
            $this->db->select('A,B');
            $this->db->where('id',$node);
            $where = '(A != 0 or B != 0)';
            $this->db->where($where);
            $data[$node] = $this->db->get('member')->result();
            if($data[$node][0]->A > 0 || $data[$node][0]->B >0){
                $data['l'] = $this->get_left_side($data[$node][0]->A);
                $data['r'] = $this->get_right_side($data[$node][0]->B);
            }
        }
       // echo "<pre>"; print_r($data);
        return $data;
    }

    public function club_members_count($level,$userid='')
    {        
        $campain_start_date = date('2020-08-03');

        $level = $this->uri->segment(3) != '' ? $this->uri->segment(3) : $level;

        $user_id = strlen($userid)>0 ? $userid : $this->session->user_id;

        //$md = $this->db_model->select_multi('*', 'member', array('id'=>$user_id));

        $this->db->select("t1.*, IFNULL(t2.cnt,0) as count, IFNULL(t3.tcnt,0) as total_count, IFNULL(t4.bcnt,0) as before_count")
                ->from('member as t1')
                ->where(array('status'=>'Active', 'id'=>$user_id))->order_by('secret', 'ASC')
                ->join("(SELECT sponsor as userid, count(sponsor) as cnt FROM member where 
                    activate_time >= '".$campain_start_date."' group by 1) as t2", 't1.id = t2.userid', 'LEFT')
                ->join("(SELECT sponsor as userid, count(sponsor) as tcnt FROM member group by 1) as t3", 't1.id = t3.userid', 'LEFT')
                ->join("(SELECT sponsor as userid, count(sponsor) as bcnt FROM member where 
                    activate_time < '".$campain_start_date."' group by 1) as t4", 't1.id = t4.userid', 'LEFT');

        $md =  $this->db->get()->result()[0];

        $p1_level = array(0=>0);
        $this->db->select('*')->from('level_wise_income')->where(array('plan_id' =>1))->order_by('level_no', 'ASC');
        $inc = $this->db->get()->result();

        foreach ($inc as $e){
            array_push($p1_level, $this->db_model->sum('direct', 'level_wise_income', array('level_no <=' => $e->level_no, 'plan_id'=>1)));
        }

        //debug_log($p1_level);

        $p2_level = array(0=>0);
        $this->db->select('*')->from('level_wise_income')->where(array('plan_id' =>2))->order_by('level_no', 'ASC');
        $inc = $this->db->get()->result();

        foreach ($inc as $e){
            array_push($p2_level, $this->db_model->sum('direct', 'level_wise_income', array('level_no <=' => $e->level_no, 'plan_id'=>2)));
        }

        $p4_level = array(0=>0);
        $this->db->select('*')->from('level_wise_income')->where(array('plan_id' =>4))->order_by('level_no', 'ASC');
        $inc = $this->db->get()->result();

        foreach ($inc as $e){
            array_push($p4_level, $this->db_model->sum('direct', 'level_wise_income', array('level_no <=' => $e->level_no, 'plan_id'=>4)));
        }

        if($level ==1){
            $secrets = $this->db_model->select('level'.$level, 'level_sponsor', array('userid' => $user_id,));
            $secrets = substr(substr($secrets, 1),0,-1);
            if($secrets != ''){
                if($md->signup_package==1){
                    if($md->before_count>0){
                        $data['members'] = $this->db->query("
                        select secret,id,name,activate_time,status from member WHERE status = 'Active' and secret IN (" .$secrets .")")->result_array();    
                    }else{
                        $this->db->query('SET @row_number = 0');
                        $data['members'] = $this->db->query("
                        select * FROM (select (@row_number:=@row_number + 1) AS num, secret,id,name,activate_time,status from member WHERE status = 'Active' and secret IN (" .$secrets .") order by activate_time ASC)t where num > ".$p1_level[$md->gift_level+1])->result_array();    
                    }
                    //debug_log($this->db->last_query());    
                }elseif($md->signup_package==2){
                    if($md->before_count>0){
                        $data['members'] = $this->db->query("
                        select secret,id,name,activate_time,status from member WHERE status = 'Active' and secret IN (" .$secrets .")")->result_array();    
                    }else{
                    $this->db->query('SET @row_number = 0');
                    $data['members'] = $this->db->query("
                    select * FROM (select (@row_number:=@row_number + 1) AS num, secret,id,name,activate_time,status from member WHERE status = 'Active' and secret IN (" .$secrets .") order by activate_time ASC)t where num >".$p2_level[$md->gift_level+1])->result_array();
                    }
                    //debug_log($this->db->last_query());    
                }else{
                    if($md->before_count>0){
                        $data['members'] = $this->db->query("
                        select secret,id,name,activate_time,status from member WHERE status = 'Active' and secret IN (" .$secrets .")")->result_array();    
                    }else{
                    $this->db->query('SET @row_number = 0');
                    $data['members'] = $this->db->query("
                    select * FROM (select (@row_number:=@row_number + 1) AS num, secret,id,name,activate_time,status from member WHERE status = 'Active' and secret IN (" .$secrets .") order by activate_time ASC)t where num >".$p4_level[$md->gift_level+1])->result_array();    
                    //debug_log($this->db->last_query());
                    }
                }
            }else{
                $data['members'] = array();
            }
        }else{
            $secrets = $this->db_model->select('level'.($level-1), 'level_sponsor', array('userid' => $user_id,));
            $secrets = substr(substr($secrets, 1),0,-1);

            //debug_log($secrets);

            $downline_secrets = '';

            foreach(explode(",",$secrets) as $secret)
            {   
                //debug_log($downline_secrets);
                //debug_log('\n');
                //debug_log($secret);
                if($secret != ''){
                    $userid = $this->db_model->select('id', 'member', array('secret'=>$secret));
                    //debug_log($userid);
                    $l1_secrets = $this->db_model->select('level1', 'level_sponsor', array('userid' => $userid,));
                    //debug_log($l1_secrets);
                    $l1_secrets = str_replace(' ', '',substr(substr($l1_secrets, 1),0,-1));
                    //debug_log($l1_secrets);

                    ////debug_log(strlen(trim($l1_secrets)));

                    if($l1_secrets != ''){
                        if(count(explode(",",$l1_secrets))==1){
                            $l1_secrets = '';
                        }
                        else if(count(explode(",",$l1_secrets))>1){
                            $temp = explode(",",$l1_secrets);
                            unset($temp[0]);
                            $l1_secrets = implode(',',$temp);
                        }
                        //debug_log($l1_secrets);
                        if(($l1_secrets != '') && ($l1_secrets != ',')){
                            $downline_secrets = $downline_secrets . ','.$l1_secrets;
                        }
                    }
                }
            }

            $downline_secrets = substr($downline_secrets, 1);

            if($downline_secrets != ''){
                $data['members'] = $this->db->query("
                select secret,id,name,activate_time,status from member WHERE status = 'Active' and secret IN (" .$downline_secrets .") order by activate_time ASC")->result_array();     
            }else{
                $data['members'] = array();
            }

        }

        return count($data['members']);
    }

    public function check_user($uid, $pid='', $status='', $role='')
    {
        $this->db->select('id')->from('member');
        $uid != '' ? $this->db->where('id', $uid) : '';
        $pid != '' ? $this->db->where('signup_package', $pid) : '';
        $status != '' ? $this->db->where('status', $status) : '';
        $role != '' ? $this->db->where('role !=', $role) : '';
        
        return $this->db->get()->result_array()[0]['id'];
    }

    public function printTable($results, $col_names, $display_names=array()){

        //Get number of columns
        $col_cnt = count($col_names);

        $display_names = count($display_names) != count($col_names) ? $col_names : $display_names;

        //Setup table - user css class db-table for design
        echo "<table class='db-table' style='border-collapse: collapse;'>";
        echo "<tr colspan='". $col_cnt ."'>". $tbl_name ."</tr>";
        echo "<tr>";

        //Give each table column same name is db column name
        for($i=0;$i<$col_cnt;$i++){
            if($i==0){
                echo "<td style='text-align: left;width:40px;'>". $display_names[$i] ."</td>";    
            }else{
                echo "<td style='text-align: left;width:150px;'>". $display_names[$i] ."</td>";    
            }
            
        }

        echo "</tr>";

        $res_cnt = count($results);
        
        //Print out db table data
        for($i=0;$i<$res_cnt;$i++){
            echo "<tr style='border-bottom: 1pt solid black;'>";
            echo "<td style='text-align: left;'>". ($res_cnt-$i) ."</td>";
            for($y=1;$y<$col_cnt;$y++){
                echo "<td style='text-align: left;'>". $results[$i][$col_names[$y]] ."</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

        
    }
    
    public function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
        $output = NULL;
        if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
            $ip = $_SERVER["REMOTE_ADDR"];
            if ($deep_detect) {
                if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                    $ip = $_SERVER['HTTP_CLIENT_IP'];
            }
        }
        $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
        $support    = array("country", "countrycode", "state", "region", "city", "location", "address","countrydialcode");
        $continents = array(
            "AF" => "Africa",
            "AN" => "Antarctica",
            "AS" => "Asia",
            "EU" => "Europe",
            "OC" => "Australia (Oceania)",
            "NA" => "North America",
            "SA" => "South America"
        );
        
        $Country_code = array('AF'=>'93','AL'=>'355','DZ'=>'213','AS'=>'1684','AN'=>'376','AG'=>'244','AI'=>'1264','AT'=>'672','AT'=>'1268','AR'=>'54','AR'=>'374','AB'=>'297','AU'=>'61','AU'=>'43','AZ'=>'994','BH'=>'1242','BH'=>'973','BG'=>'880','BR'=>'1246','BL'=>'375','BE'=>'32','BL'=>'501','BE'=>'229','BM'=>'1441','BT'=>'975','BO'=>'591','BI'=>'387','BW'=>'267','BV'=>'_55','BR'=>'55','IO'=>'1284','BR'=>'673','BG'=>'359','BF'=>'226','BD'=>'257','KH'=>'855','CM'=>'237','CA'=>'1','CP'=>'238','CY'=>'1345','CA'=>'236','TC'=>'235','CH'=>'56','CH'=>'86','CX'=>'618','CC'=>'61','CO'=>'57','CO'=>'269','CO'=>'242','CO'=>'243','CO'=>'682','CR'=>'506','HR'=>'385','CU'=>'53','CY'=>'357','CZ'=>'420','DN'=>'45','DJ'=>'253','DM'=>'1767','DO'=>'1','EC'=>'593','EG'=>'20','SL'=>'503','GN'=>'240','ER'=>'291','ES'=>'372','ET'=>'251','FL'=>'500','FR'=>'298','FJ'=>'679','FI'=>'358','FR'=>'33','GU'=>'594','PY'=>'689','GA'=>'241','GM'=>'220','GE'=>'995','DE'=>'49','GH'=>'233','GI'=>'350','GR'=>'30','GR'=>'299','GR'=>'1473','GL'=>'590','GU'=>'1671','GT'=>'502','GI'=>'224','GN'=>'245','GU'=>'592','HT'=>'509','HM'=>'61','VA'=>'3','HN'=>'504','HK'=>'852','HU'=>'36','IS'=>'354','IN'=>'91','ID'=>'62','IR'=>'98','IR'=>'964','IR'=>'353','IS'=>'972','IT'=>'39','CI'=>'225','JA'=>'1876','JP'=>'81','JO'=>'962','KA'=>'7','KE'=>'254','KI'=>'686','PR'=>'850','KO'=>'82','KW'=>'965','KG'=>'7','LA'=>'856','LV'=>'371','LB'=>'961','LS'=>'266','LB'=>'231','LB'=>'218','LI'=>'423','LT'=>'370','LU'=>'352','MA'=>'853','MK'=>'389','MD'=>'261','MW'=>'265','MY'=>'60','MD'=>'960','ML'=>'223','ML'=>'356','MH'=>'692','MT'=>'596','MR'=>'222','MU'=>'230','MY'=>'262','ME'=>'52','FS'=>'691','MD'=>'373','MC'=>'377','MN'=>'976','MS'=>'1664','MA'=>'212','MO'=>'258','MM'=>'95','NA'=>'264','NR'=>'674','NP'=>'977','NL'=>'31','AN'=>'599','NC'=>'687','NZ'=>'64','NI'=>'505','NE'=>'227','NG'=>'234','NI'=>'683','NF'=>'672','MN'=>'1670','NO'=>'47','OM'=>'968','PA'=>'92','PL'=>'680','PS'=>'970','PA'=>'507','PN'=>'675','PR'=>'595','PE'=>'51','PH'=>'63','PC'=>'870','PO'=>'48','PR'=>'351','PR'=>'1','QA'=>'974','RE'=>'262','RO'=>'40','RU'=>'7','RW'=>'250','SH'=>'290','KN'=>'1869','LC'=>'1758','SP'=>'508','VC'=>'1758','WS'=>'685','SM'=>'378','ST'=>'239','SA'=>'966','SE'=>'221','SR'=>'381','SY'=>'248','SL'=>'232','SG'=>'65','SV'=>'421','SV'=>'386','SL'=>'677','SO'=>'252','ZA'=>'27','SG'=>'65','ES'=>'34','LK'=>'94','SD'=>'249','SU'=>'597','SJ'=>'47','SW'=>'268','SW'=>'46','CH'=>'41','SY'=>'963','TW'=>'886','TJ'=>'992','TZ'=>'255','TH'=>'66','TL'=>'670','TG'=>'228','TK'=>'690','TO'=>'676','TT'=>'1868','TU'=>'216','TU'=>'90','TK'=>'993','TC'=>'1649','TU'=>'688','UG'=>'256','UK'=>'44','AR'=>'971','GB'=>'44','US'=>'1','UM'=>'1340','UR'=>'598','UZ'=>'998','VU'=>'678','VE'=>'58','VN'=>'84','VG'=>'1284','VI'=>'1340','WL'=>'681','YE'=>'260','ZM'=>'260','ZW'=>'263');
        
        if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
            $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
            if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
                
                //debug_log('country filter');
                //debug_log(@$ipdat->geoplugin_countryCode);
                //debug_log($Country_code[@$ipdat->geoplugin_countryCode]);
                
                switch ($purpose) {
                    case "location":
                        $output = array(
                            "city"           => @$ipdat->geoplugin_city,
                            "state"          => @$ipdat->geoplugin_regionName,
                            "country"        => @$ipdat->geoplugin_countryName,
                            "country_code"   => @$ipdat->geoplugin_countryCode,
                            "country_name"   => @$ipdat->geoplugin_countryName,
                            "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                            "continent_code" => @$ipdat->geoplugin_continentCode
                        );
                        break;
                    case "address":
                        $address = array($ipdat->geoplugin_countryName);
                        if (@strlen($ipdat->geoplugin_regionName) >= 1)
                            $address[] = $ipdat->geoplugin_regionName;
                        if (@strlen($ipdat->geoplugin_city) >= 1)
                            $address[] = $ipdat->geoplugin_city;
                        $output = implode(", ", array_reverse($address));
                        break;
                    case "city":
                        $output = @$ipdat->geoplugin_city;
                        break;
                    case "state":
                        $output = @$ipdat->geoplugin_regionName;
                        break;
                    case "region":
                        $output = @$ipdat->geoplugin_regionName;
                        break;
                    case "country":
                        $output = @$ipdat->geoplugin_countryName;
                        break;
                    case "countrycode":
                        $output = @$ipdat->geoplugin_countryCode;
                        break;
                    case "countrydialcode":
                        $output = $Country_code[@$ipdat->geoplugin_countryCode];
                        break;
                }
            }
        }
        return $output;
    }


    public function total_downline_income($userid,$planid)
    {

        $id=$userid;
        $pdid = $planid;
        $downline_ids = $this->downline_model->calculate_downline_transaction($id,$pdid,'');

        $total_transaction=array();
        foreach($downline_ids as $e)
        {

            $users_affiliate = $this->db_model->select('id', 'member', array('id'=>$e));
           

            $transaction_amount = $this->db_model->sum('payment_amt', 'tbl_transaction', array('user_id' => $users_affiliate,'gateway !='=>'voucher'));

            debug_log("111111111111");
            debug_log($this->db->last_query());
            array_push($total_transaction,$transaction_amount);
            
          
        }

        $total_downline_income=array_sum($total_transaction);
        
        return $total_downline_income;
    }

}
