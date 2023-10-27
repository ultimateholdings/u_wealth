<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Custom_income extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->common_model->__session();
        $this->load->model('earning');
        $this->load->model('downline_model');
        $this->load->model('user_model');

    }

    public function global_club_income()
    {
        $campain_start_date = date('2020-08-03');
        $earning_start_date = date('2020-08-11');
        $cut_off_date = date('2020-08-03');
        $cutoff_count = 4;

        if(date('d')<=10){
            $credit_date = date('Y-m-1');
        }else if((date('d')>10) && (date('d')<=20)){
            $credit_date = date('Y-m-11');
        }else{
            $credit_date = date('Y-m-21');
        }

        #$credit_date = date('Y-m-d H:00:00');

        $earnings_count = $this->db_model->count_all('earning',array('date >=' => $credit_date, 'type'=>'Club Income'));
        debug_log($this->db->last_query());

        if(($earnings_count <= 0) && (date('Y-m-d')>=$earning_start_date)){

            $p1_level = array(0=>0);
            $this->db->select('*')->from('level_wise_income')->where(array('plan_id' =>1))->order_by('level_no', 'ASC');
            $inc = $this->db->get()->result();

            foreach ($inc as $e){
                array_push($p1_level, $this->db_model->select('direct', 'level_wise_income', array('level_no' => $e->level_no, 'plan_id'=>1)));
            }

            $p2_level = array(0=>0);
            $this->db->select('*')->from('level_wise_income')->where(array('plan_id' =>2))->order_by('level_no', 'ASC');
            $inc = $this->db->get()->result();

            foreach ($inc as $e){
                array_push($p2_level, $this->db_model->select('direct', 'level_wise_income', array('level_no <=' => $e->level_no, 'plan_id'=>2)));
            }

            $p4_level = array(0=>0);
            $this->db->select('*')->from('level_wise_income')->where(array('plan_id' =>4))->order_by('level_no', 'ASC');
            $inc = $this->db->get()->result();

            foreach ($inc as $e){
                array_push($p4_level, $this->db_model->sum('direct', 'level_wise_income', array('level_no <=' => $e->level_no, 'plan_id'=>4)));
            }

            $total_reg_old = $this->db_model->count_all('member', array('activate_time >=' => $cut_off_date, 'status'=>'Active', 'CAST(activate_time AS DATE) <=' => '2020-10-10'));

            $total_reg_new = $this->db_model->count_all('member', array('activate_time >=' => $cut_off_date, 'status'=>'Active', 'CAST(activate_time AS DATE) <=' => date('Y-m-d',strtotime("-1 days")), 'CAST(activate_time AS DATE) >=' =>'2020-10-11'));

            $total_amount = ($total_reg_old*100)+($total_reg_new*90);
            $pay_per_club = round($total_amount/7,2);

            $_4_star_ids = array();

            $this->db->select("t1.secret, t1.id , t1.signup_package, t1.gift_level, IFNULL(t2.cnt,0) as count")->from('member as t1')
                ->where(array('status'=>'Active', 'id !='=>config_item('top_id')))->order_by('secret', 'ASC')
                ->join("(SELECT sponsor as userid, count(sponsor) as cnt FROM member where activate_time >= '".$campain_start_date."' group by 1) as t2", 't1.id = t2.userid', 'LEFT')->having(array('count >='=>2));

            $members =  $this->db->get()->result();
            debug_log($this->db->last_query());

            foreach ($members as $user) {
                $userid = $user->id;
                $secret = $user->secret;

                $income_count = $this->db_model->count_all('earning',array('userid' => $userid, 'pair_names'=>'4 Star Club Income'));

                $user_count = $this->db_model->club_members_count(1,$userid);

                $req_count = 4;

                //$req_count = $user->signup_package == 1 ? $p1_level[$user->gift_level+1]+$cutoff_count : $req_count;
                //$req_count = $user->signup_package == 2 ? $p2_level[$user->gift_level+1]+$cutoff_count : $p4_level[$user->gift_level+1]+$cutoff_count;
                debug_log('inside club userid: '.$userid.' user_count: '.$user_count.' req_count: '.$req_count);

                if(($income_count < 9) && ($user_count >= $req_count)){
                    array_push($_4_star_ids, array('secret'=>$secret, 'userid'=>$userid));
                }

            }

            $_4_star_paid = $this->db_model->sum('amount', 'earning', array('pair_names'=>'4 Star Club Income')) + $this->db_model->sum('amount', 'earning', array('pair_names'=>'Admin Charge for 4 Star Club Income'));
            $_4_star_remaining = $pay_per_club - $_4_star_paid;
            $_4_star_pay = count($_4_star_ids) > 0 ? round($_4_star_remaining/count($_4_star_ids),2) :0;

            debug_log('Total Registration: '.$total_registrations.' Pay Per Club: '.$pay_per_club.' _4_star_count: '.count($_4_star_ids).' _4_star_paid: '.$_4_star_paid.' _4_star_remaining: '.$_4_star_remaining.' _4_star_pay: '.$_4_star_pay);            

            foreach ($_4_star_ids as $member) {
                $this->earning->pay_earning($member['userid'], '', 'Club Income', '4 Star Club Income',$_4_star_pay, '', $member['secret']);
            }

            $this->db->select('secret, userid')->where(array('pair_names'=>'4 Star Club Income'))->order_by('secret', 'ASC')->group_by('secret','userid');
            $_4_star_members = $this->db->get('earning')->result_array();

            debug_log('$_4_star_members: ');
            debug_log($_4_star_members);

            $_16_star_ids = array();

            foreach ($_4_star_members as $member) {
                $userid = $member['userid'];
                $secret = $member['secret'];
                $secrets = $this->db_model->select('level1', 'level_sponsor', array('userid' => $userid,));              
                $secrets = substr(substr($secrets, 1),0,-1);
                //debug_log($this->db->last_query());
                //debug_log('$secrets: '.$secrets);

                $total1 = 0;
                if(count($p1_level)>1){
                    $total1 = $this->get_total($p1_level[1], 1, $secrets,$campain_start_date);
                    debug_log('$total1: '.$total1);
                }

                $total2 = 0;
                if(count($p2_level)>1){
                    $total2 = $this->get_total($p2_level[1], 2, $secrets,$campain_start_date);
                    debug_log('$total2: '.$total2);

                }

                $total3 = 0;
                if(count($p4_level)>1){
                    $total3 = $this->get_total($p4_level[1], 4, $secrets,$campain_start_date);
                    debug_log('$total3: '.$total3);

                }

                $count = $total1+$total2+$total3;
                debug_log('$count: '.$count);

                $income_count = $this->db_model->count_all('earning',array('userid' => $userid, 'pair_names'=>'16 Star Club Income'));
                 
                if(($count>=4*$cutoff_count) && ($income_count <9)){
                    array_push($_16_star_ids, array('secret'=>$secret, 'userid'=>$userid));
                }
            }

            $_16_star_paid = $this->db_model->sum('amount', 'earning', array('pair_names'=>'16 Star Club Income')) + $this->db_model->sum('amount', 'earning', array('pair_names'=>'Admin Charge for 16 Star Club Income'));;
            $_16_star_remaining = $pay_per_club - $_16_star_paid;
            $_16_star_pay = count($_16_star_ids) > 0 ? round($_16_star_remaining/count($_16_star_ids),2) :0;

            debug_log('Total Registration: '.$total_registrations.' Pay Per Club: '.$pay_per_club.' _16_star_count: '.count($_16_star_ids).' _16_star_paid: '.$_16_star_paid.' _16_star_remaining: '.$_16_star_remaining.' _16_star_pay: '.$_16_star_pay);
            debug_log('$_16_star_ids: ');
            debug_log($_16_star_ids);

            foreach ($_16_star_ids as $member) {
                    $this->earning->pay_earning($member['userid'], '', 'Club Income', '16 Star Club Income',$_16_star_pay, '', $member['secret']);
            }

            $this->db->select('secret, userid')->where(array('pair_names'=>'16 Star Club Income'))->order_by('secret', 'ASC')->group_by('secret','userid');
            $_16_star_members = $this->db->get('earning')->result_array();

            debug_log('$_16_star_members: ');
            debug_log($_16_star_members);

            $_64_star_ids = array();

            foreach ($_16_star_members as $member) {
                $userid = $member['userid'];
                $secret = $member['secret'];
                $secrets = $this->db_model->select('level2', 'level_sponsor', array('userid' => $userid,));              
                $secrets = substr(substr($secrets, 1),0,-1);
                //debug_log($this->db->last_query());
                //debug_log('$secrets: '.$secrets);

                $total1 = 0;
                if(count($p1_level)>1){
                    $total1 = $this->get_total($p1_level[1], 1, $secrets,$campain_start_date);
                    debug_log('$total1: '.$total1);
                }

                $total2 = 0;
                if(count($p2_level)>1){
                    $total2 = $this->get_total($p2_level[1], 2, $secrets,$campain_start_date);
                    debug_log('$total2: '.$total2);

                }

                $total3 = 0;
                if(count($p4_level)>1){
                    $total3 = $this->get_total($p4_level[1], 4, $secrets,$campain_start_date);
                    debug_log('$total3: '.$total3);

                }

                $count = $total1+$total2+$total3;
                debug_log('$count: '.$count);

                $income_count = $this->db_model->count_all('earning',array('userid' => $userid, 'pair_names'=>'64 Star Club Income'));
                 
                if(($count>=16*$cutoff_count) && ($income_count <9)){
                    array_push($_64_star_ids, array('secret'=>$secret, 'userid'=>$userid));
                }
            }
            $_64_star_paid = $this->db_model->sum('amount', 'earning', array('pair_names'=>'64 Star Club Income'))+ $this->db_model->sum('amount', 'earning', array('pair_names'=>'Admin Charge for 64 Star Club Income'));
            $_64_star_remaining = $pay_per_club - $_64_star_paid;
            $_64_star_pay = count($_64_star_ids) > 0 ? round($_64_star_remaining/count($_64_star_ids),2) :0;

            debug_log('Total Registration: '.$total_registrations.' Pay Per Club: '.$pay_per_club.' _64_star_count: '.count($_64_star_ids).' _64_star_paid: '.$_64_star_paid.' _64_star_remaining: '.$_64_star_remaining.' _64_star_pay: '.$_64_star_pay);
            debug_log('$_64_star_ids: ');
            debug_log($_64_star_ids);

            foreach ($_64_star_ids as $member) {
                $this->earning->pay_earning($member['userid'], '', 'Club Income', '64 Star Club Income',$_64_star_pay, '', $member['secret']);
            }

            $this->db->select('secret, userid')->where(array('pair_names'=>'64 Star Club Income'))->order_by('secret', 'ASC')->group_by('secret','userid');
            $_64_star_members = $this->db->get('earning')->result_array();

            debug_log('$_64_star_members: ');
            debug_log($_64_star_members);

            $_256_star_ids = array();

            foreach ($_64_star_members as $member) {
                $userid = $member['userid'];
                $secret = $member['secret'];
                $secrets = $this->db_model->select('level3', 'level_sponsor', array('userid' => $userid,));              
                $secrets = substr(substr($secrets, 1),0,-1);
                //debug_log($this->db->last_query());
                //debug_log('$secrets: '.$secrets);

                $total1 = 0;
                if(count($p1_level)>1){
                    $total1 = $this->get_total($p1_level[1], 1, $secrets,$campain_start_date);
                    debug_log('$total1: '.$total1);
                }

                $total2 = 0;
                if(count($p2_level)>1){
                    $total2 = $this->get_total($p2_level[1], 2, $secrets,$campain_start_date);
                    debug_log('$total2: '.$total2);

                }

                $total3 = 0;
                if(count($p4_level)>1){
                    $total3 = $this->get_total($p4_level[1], 4, $secrets,$campain_start_date);
                    debug_log('$total3: '.$total3);

                }

                $count = $total1+$total2+$total3;
                debug_log('$count: '.$count);

                $income_count = $this->db_model->count_all('earning',array('userid' => $userid, 'pair_names'=>'256 Star Club Income'));
                 
                if(($count>=64*$cutoff_count) && ($income_count <9)){
                    array_push($_256_star_ids, array('secret'=>$secret, 'userid'=>$userid));
                }
            }

            $_256_star_paid = $this->db_model->sum('amount', 'earning', array('pair_names'=>'256 Star Club Income')) + $this->db_model->sum('amount', 'earning', array('pair_names'=>'Admin Charge for 256 Star Club Income'));
            $_256_star_remaining = $pay_per_club - $_256_star_paid;
            $_256_star_pay = count($_256_star_ids) > 0 ? round($_256_star_remaining/count($_256_star_ids),2) :0;

            debug_log('Total Registration: '.$total_registrations.' Pay Per Club: '.$pay_per_club.' _256_star_count: '.count($_256_star_ids).' _256_star_paid: '.$_256_star_paid.' _256_star_remaining: '.$_256_star_remaining.' _256_star_pay: '.$_256_star_pay);
            debug_log('$_256_star_ids: ');
            debug_log($_256_star_ids);

            foreach ($_256_star_ids as $member) {
                $this->earning->pay_earning($member['userid'], '', 'Club Income', '256 Star Club Income',$_256_star_pay, '', $member['secret']);
            }

            $this->db->select('secret, userid')->where(array('pair_names'=>'256 Star Club Income'))->order_by('secret', 'ASC')->group_by('secret','userid');
            $_256_star_members = $this->db->get('earning')->result_array();

            debug_log('$_256_star_members: ');
            debug_log($_256_star_members);

            $_1024_star_ids = array();

            foreach ($_256_star_members as $member) {
                $userid = $member['userid'];
                $secret = $member['secret'];
                $secrets = $this->db_model->select('level4', 'level_sponsor', array('userid' => $userid,));              
                $secrets = substr(substr($secrets, 1),0,-1);
                //debug_log($this->db->last_query());
                //debug_log('$secrets: '.$secrets);

                $total1 = 0;
                if(count($p1_level)>1){
                    $total1 = $this->get_total($p1_level[1], 1, $secrets,$campain_start_date);
                    debug_log('$total1: '.$total1);
                }

                $total2 = 0;
                if(count($p2_level)>1){
                    $total2 = $this->get_total($p2_level[1], 2, $secrets,$campain_start_date);
                    debug_log('$total2: '.$total2);

                }

                $total3 = 0;
                if(count($p4_level)>1){
                    $total3 = $this->get_total($p4_level[1], 4, $secrets,$campain_start_date);
                    debug_log('$total3: '.$total3);

                }

                $count = $total1+$total2+$total3;
                debug_log('$count: '.$count);
                
                $income_count = $this->db_model->count_all('earning',array('userid' => $userid, 'pair_names'=>'1024 Star Club Income'));

                if(($count>=256*$cutoff_count) && ($income_count <9)){
                    array_push($_1024_star_ids, array('secret'=>$secret, 'userid'=>$userid));
                }
            }
            $_1024_star_paid = $this->db_model->sum('amount', 'earning', array('pair_names'=>'1024 Star Club Income'))+ $this->db_model->sum('amount', 'earning', array('pair_names'=>'Admin Charge for 1024 Star Club Income'));
            $_1024_star_remaining = $pay_per_club - $_1024_star_paid;
            $_1024_star_pay = count($_1024_star_ids) > 0 ? round($_1024_star_remaining/count($_1024_star_ids),2) :0;

            debug_log('Total Registration: '.$total_registrations.' Pay Per Club: '.$pay_per_club.' _1024_star_count: '.count($_1024_star_ids).' _1024_star_paid: '.$_1024_star_paid.' _1024_star_remaining: '.$_1024_star_remaining.' _1024_star_pay: '.$_1024_star_pay);
            debug_log('$_1024_star_ids: ');
            debug_log($_1024_star_ids);

            foreach ($_1024_star_ids as $member) {
                $this->earning->pay_earning($member['userid'], '', 'Club Income', '1024 Star Club Income',$_1024_star_pay, '', $member['secret']);
            }

        }
    }

    private function get_total($exclude, $plan_id, $secrets,$campain_start_date){
        $total = $this->db->query("
        select IFNULL(sum(c),0) as total from (
            SELECT t1.id, 
            case 
                when t2.cnt-".$exclude." > 0 THEN t2.cnt-".$exclude."
                ELSE 0
            END as c
            FROM member as t1
            LEFT JOIN (SELECT sponsor as userid, count(sponsor) as cnt FROM member where activate_time >= '".$campain_start_date."' group by 1) as t2 ON t1.id = t2.userid
            WHERE status = 'Active' and signup_package = ".$plan_id." and secret IN (" .$secrets .") 
        ) a")->result_array()[0]['total'];
        //debug_log($this->db->last_query());

        return $total;

    }

    public function mission_arogyam_group_income()
    {
        $earnings_count = $this->db_model->count_all('earning',array('YEAR(date) =' => date("Y"), 'MONTH(date) =' => date("m"), 'type'=>'Group Income'));
        #debug_log($this->db->last_query());
        debug_log($earnings_count);

        if($earnings_count <= 0) {

            $data = $this->user_model->load_admin_data();

            $total_turnover = $data['earnings_last_month'];

            //$total_turnover = 10000000;

            $query = $this->db->query("select id,signup_package,rank,
                CASE 
                    WHEN point between 15 AND 29 THEN 15 
                    WHEN point between 30 AND 49 THEN 30 
                    WHEN point between 50 AND 79 THEN 50 
                    WHEN point between 80 AND 99 THEN 80 
                    WHEN point between 100 AND 119 THEN 100 
                    WHEN point between 120 AND 10000 THEN 120 
                END as active_point
                from (
                select id, floor(mypv/6000) as point, signup_package, LOWER(rank) as rank from member having point >= 15 )a
                ");
            $users = $query->result();

            debug_log($users);

            $count = $this->db->query("select rank,
             count(CASE WHEN point BETWEEN 15 AND 29 THEN 1 END) as c15,
             count(CASE WHEN point BETWEEN 30 AND 49 THEN 1 END) as c30,
             count(CASE WHEN point BETWEEN 50 AND 79 THEN 1 END) as c50,
             count(CASE WHEN point BETWEEN 80 AND 99 THEN 1 END) as c80,
             count(CASE WHEN point BETWEEN 100 AND 119 THEN 1 END) as c100,
             count(CASE WHEN point BETWEEN 120 AND 100000 THEN 1 END) as c120
                from (
                select id, LOWER(rank) as rank, floor(mypv/6000) as point from member having point >= 15 )a
                group by rank
                ");
            $rank_count = $count->result();

            debug_log($rank_count);

            $sea_users = array_filter($users, function ($item){
                return $item->rank == 'senior executive advisor';
            });

            debug_log($sea_users);

            $sea_count = array_values(array_filter($rank_count, function ($item){
                return $item->rank == 'senior executive advisor';
            }))[0];

            debug_log($sea_count);

            $sea_edu = array('15'=>0.005,'30'=>0.01,'50'=>0.015,'80'=>0.02,'100'=>0,'120'=>0);

            foreach ($sea_users as $user) {
                $var_name = 'c'.$user->active_point;
                $sea_count->$var_name>0 ? $this->earning->pay_earning($user->id, '', 'Group Income', 'Education Fund', round(($total_turnover*$sea_edu[$user->active_point])/$sea_count->$var_name,2), '', $user->signup_package) : '';
            }

            $sa_users = array_filter($users, function ($item){
                return $item->rank == 'silver advisor';
            });

            debug_log($sa_users);

            $sa_count = array_values(array_filter($rank_count, function ($item){
                return $item->rank == 'silver advisor';
            }))[0];

            debug_log($sa_count);

            $sa_edu = array('15'=>0.005,'30'=>0.01,'50'=>0.005,'80'=>0.02,'100'=>0,'120'=>0);
            $sa_tour = array('15'=>0.005,'30'=>0.01,'50'=>0.02,'80'=>0,'100'=>0,'120'=>0);

            foreach ($sa_users as $user) {
                $var_name = 'c'.$user->active_point;
                if($sa_count->$var_name>0){
                    $this->earning->pay_earning($user->id, '', 'Group Income', 'Education Fund', round(($total_turnover*$sa_edu[$user->active_point])/$sa_count->$var_name,2), '', $user->signup_package);
                    $this->earning->pay_earning($user->id, '', 'Group Income', 'Tour Fund', round(($total_turnover*$sa_tour[$user->active_point])/$sa_count->$var_name,2), '', $user->signup_package);
                }
            }

            $ga_users = array_filter($users, function ($item){
                return $item->rank == 'gold advisor';
            });

            debug_log($ga_users);

            $ga_count = array_values(array_filter($rank_count, function ($item){
                return $item->rank == 'gold advisor';
            }))[0];

            debug_log($ga_count);

            $ga_edu = array('15'=>0.005,'30'=>0.01,'50'=>0.005,'80'=>0.02,'100'=>0,'120'=>0);
            $ga_tour = array('15'=>0.005,'30'=>0.01,'50'=>0.02,'80'=>0,'100'=>0,'120'=>0);
            $ga_royalty = array('15'=>0.01,'30'=>0.02,'50'=>0.03,'80'=>0.04,'100'=>0.05,'120'=>0.06);

            foreach ($ga_users as $user) {
                $var_name = 'c'.$user->active_point;
                if($ga_count->$var_name>0){
                    $this->earning->pay_earning($user->id, '', 'Group Income', 'Education Fund', round(($total_turnover*$ga_edu[$user->active_point])/$ga_count->$var_name,2), '', $user->signup_package);
                    $this->earning->pay_earning($user->id, '', 'Group Income', 'Tour Fund', round(($total_turnover*$ga_tour[$user->active_point])/$ga_count->$var_name,2), '', $user->signup_package);
                    $this->earning->pay_earning($user->id, '', 'Group Income', 'Royalty Fund', round(($total_turnover*$ga_royalty[$user->active_point])/$ga_count->$var_name,2), '', $user->signup_package);
                }
            }

            $pa_users = array_filter($users, function ($item){
                return $item->rank == 'platinum advisor';
            });

            debug_log($pa_users);

            $pa_count = array_values(array_filter($rank_count, function ($item){
                return $item->rank == 'platinum advisor';
            }))[0];

            debug_log($pa_count);

            $pa_edu = array('15'=>0.005,'30'=>0.01,'50'=>0.005,'80'=>0.02,'100'=>0.02,'120'=>0.02);
            $pa_tour = array('15'=>0.005,'30'=>0.01,'50'=>0.02,'80'=>0,'100'=>0.02,'120'=>0.02);
            $pa_royalty = array('15'=>0.01,'30'=>0.02,'50'=>0.03,'80'=>0.04,'100'=>0.05,'120'=>0.06);
            $pa_car = array('15'=>0,'30'=>0.01,'50'=>0.02,'80'=>0.03,'100'=>0,'120'=>0.04);

            foreach ($pa_users as $user) {
                $var_name = 'c'.$user->active_point;
                if($pa_count->$var_name>0){
                    $this->earning->pay_earning($user->id, '', 'Group Income', 'Education Fund', round(($total_turnover*$pa_edu[$user->active_point])/$pa_count->$var_name,2), '', $user->signup_package);
                    $this->earning->pay_earning($user->id, '', 'Group Income', 'Tour Fund', round(($total_turnover*$pa_tour[$user->active_point])/$pa_count->$var_name,2), '', $user->signup_package);
                    $this->earning->pay_earning($user->id, '', 'Group Income', 'Royalty Fund', round(($total_turnover*$pa_royalty[$user->active_point])/$pa_count->$var_name,2), '', $user->signup_package);
                    $this->earning->pay_earning($user->id, '', 'Group Income', 'CAR Fund', round(($total_turnover*$pa_car[$user->active_point])/$pa_count->$var_name,2), '', $user->signup_package);
                }
            }

            $da_users = array_filter($users, function ($item){
                return $item->rank == 'diamond advisor';
            });

            debug_log($da_users);

            $da_count = array_values(array_filter($rank_count, function ($item){
                return $item->rank == 'diamond advisor';
            }))[0];

            debug_log($da_count);

            $da_edu = array('15'=>0.005,'30'=>0.01,'50'=>0.005,'80'=>0.02,'100'=>0.02,'120'=>0.02);
            $da_tour = array('15'=>0.005,'30'=>0.01,'50'=>0.02,'80'=>0,'100'=>0.02,'120'=>0.02);
            $da_royalty = array('15'=>0.01,'30'=>0.02,'50'=>0.03,'80'=>0.04,'100'=>0.05,'120'=>0.06);
            $da_car = array('15'=>0,'30'=>0.01,'50'=>0.02,'80'=>0.03,'100'=>0,'120'=>0.04);
            $da_home = array('15'=>0,'30'=>0.01,'50'=>0.02,'80'=>0.03,'100'=>0,'120'=>0.03);

            foreach ($da_users as $user) {
                $var_name = 'c'.$user->active_point;
                if($da_count->$var_name>0){
                    $this->earning->pay_earning($user->id, '', 'Group Income', 'Education Fund', round(($total_turnover*$da_edu[$user->active_point])/$da_count->$var_name,2), '', $user->signup_package);
                    $this->earning->pay_earning($user->id, '', 'Group Income', 'Tour Fund', round(($total_turnover*$da_tour[$user->active_point])/$da_count->$var_name,2), '', $user->signup_package);
                    $this->earning->pay_earning($user->id, '', 'Group Income', 'Royalty Fund', round(($total_turnover*$da_royalty[$user->active_point])/$da_count->$var_name,2), '', $user->signup_package);
                    $this->earning->pay_earning($user->id, '', 'Group Income', 'CAR Fund', round(($total_turnover*$da_car[$user->active_point])/$da_count->$var_name,2), '', $user->signup_package);
                    $this->earning->pay_earning($user->id, '', 'Group Income', 'HOME Fund', round(($total_turnover*$da_home[$user->active_point])/$da_count->$var_name,2), '', $user->signup_package);
                }
            }

            exit();

            $query = $this->db->query("select id, floor(mypv/6000) as point from member where LOWER(rank) = 'senior executive advisor' having point >= 15 )a
                ");
            $data = $query->result();

            $sea_subset_15 = array_filter($data, function ($item){
                return ($item['point'] >= 15)&&($item['point'] < 30);
            });
            
            $sea_subset_15_pay = count($sea_subset_15) >0 ? ($total_turnover*0.5/100)/count($sea_subset_15) : 0;

            foreach ($sea_subset_15 as $user) {
                $this->earning->pay_earning($user->id, '', 'Group Income', 'Education Fund',$sea_subset_15_pay, '', $user->signup_package);
            }

            $sea_subset_30 = array_filter($data, function ($item){
                return ($item['point'] >= 30)&&($item['point'] < 50);
            });
            
            $sea_subset_30_pay = count($sea_subset_30) >0 ? ($total_turnover*0.01)/count($sea_subset_30) : 0;

            foreach ($sea_subset_30 as $user) {
                $this->earning->pay_earning($user->id, '', 'Group Income', 'Education Fund',$sea_subset_30_pay, '', $user->signup_package);
            }

            $sea_subset_50 = array_filter($data, function ($item){
                return ($item['point'] >= 50)&&($item['point'] < 80);
            });
            
            $sea_subset_50_pay = count($sea_subset_50) >0 ? ($total_turnover*0.015)/count($sea_subset_50) : 0;

            foreach ($sea_subset_50 as $user) {
                $this->earning->pay_earning($user->id, '', 'Group Income', 'Education Fund',$sea_subset_50_pay, '', $user->signup_package);
            }

            $sea_subset_80 = array_filter($data, function ($item){
                return ($item['point'] >= 80)&&($item['point'] < 100);
            });
            
            $sea_subset_80_pay = count($sea_subset_80) >0 ? ($total_turnover*0.02)/count($sea_subset_80) : 0;

            foreach ($sea_subset_80 as $user) {
                $this->earning->pay_earning($user->id, '', 'Group Income', 'Education Fund',$sea_subset_80_pay, '', $user->signup_package);
            }

            $sea_subset_100 = array_filter($data, function ($item){
                return ($item['point'] >= 100)&&($item['point'] < 120);
            });
            
            $sea_subset_100_pay = count($sea_subset_100) >0 ? ($total_turnover*0.02)/count($sea_subset_100) : 0;

            foreach ($sea_subset_100 as $user) {
                $this->earning->pay_earning($user->id, '', 'Group Income', 'Education Fund',$sea_subset_100_pay, '', $user->signup_package);
            }

            $sea_subset_120 = array_filter($data, function ($item){
                return $item['point'] >= 120;
            });
            
            $sea_subset_120_pay = count($sea_subset_120) >0 ? ($total_turnover*0.01)/count($sea_subset_120) : 0;

            foreach ($sea_subset_120 as $user) {
                $this->earning->pay_earning($user->id, '', 'Group Income', 'Education Fund',$sea_subset_120_pay, '', $user->signup_package);
            }
            
            



            $total_edu_fund = $total_turnover*0.02;
            $total_tour_fund = $total_turnover*0.02;
            $total_royalty_fund = $total_turnover*0.06;
            $total_car_fund = $total_turnover*0.04;
            $total_home_fund = $total_turnover*0.03;

            $senior_executive_advisor = $this->db->select('id,signup_package')->from('member')->where(array('rank'=>'senior executive advisor'))->get()->result();         
            $silver_advisor = $this->db->select('id,signup_package')->from('member')->where(array('LOWER(rank)'=>'silver advisor'))->get()->result();
            $gold_advisor = $this->db->select('id,signup_package')->from('member')->where(array('LOWER(rank)'=>'gold advisor'))->get()->result();
            $platinum_advisor = $this->db->select('id,signup_package')->from('member')->where(array('LOWER(rank)'=>'platinum advisor'))->get()->result();
            $diamond_advisor = $this->db->select('id,signup_package')->from('member')->where(array('LOWER(rank)'=>'diamond advisor'))->get()->result();
            $green_diamond_advisor = $this->db->select('id,signup_package')->from('member')->where(array('LOWER(rank)'=>'green diamond advisor'))->get()->result();
            $double_diamond_advisor = $this->db->select('id,signup_package')->from('member')->where(array('LOWER(rank)'=>'double diamond advisor'))->get()->result();
            $crown_advisor = $this->db->select('id,signup_package')->from('member')->where(array('LOWER(rank)'=>'crown advisor'))->get()->result();
            $crown_ambassador = $this->db->select('id,signup_package')->from('member')->where(array('LOWER(rank)'=>'crown ambassador'))->get()->result();

            $edu_count = count($senior_executive_advisor)+count($silver_advisor)+count($gold_advisor)+count($platinum_advisor)+count($diamond_advisor)+count($green_diamond_advisor)+count($double_diamond_advisor)+count($crown_advisor)+count($crown_ambassador);

            $edu_pay = $edu_count>0 ? round($total_edu_fund/$edu_count,2) : 0;

            $tour_count = count($silver_advisor)+count($gold_advisor)+count($platinum_advisor)+count($diamond_advisor)+count($green_diamond_advisor)+count($double_diamond_advisor)+count($crown_advisor)+count($crown_ambassador);

            $tour_pay = $tour_count >0 ? round($total_tour_fund/$tour_count,2) :0;

            $royalty_count = count($gold_advisor)+count($platinum_advisor)+count($diamond_advisor)+count($green_diamond_advisor)+count($double_diamond_advisor)+count($crown_advisor)+count($crown_ambassador);

            $royalty_pay = $royalty_count >0 ? round($total_royalty_fund/$royalty_count,2) :0;

            $car_count = count($platinum_advisor)+count($diamond_advisor)+count($green_diamond_advisor)+count($double_diamond_advisor)+count($crown_advisor)+count($crown_ambassador);

            $car_pay = $car_count >0 ? round($total_car_fund/$car_count,2) : 0;

            $home_count = count($diamond_advisor)+count($green_diamond_advisor)+count($double_diamond_advisor)+count($crown_advisor)+count($crown_ambassador);

            $home_pay = $home_count>0 ? round($total_home_fund/$home_count,2) : 0;

            debug_log('Total Turnover '.$total_turnover);
            debug_log('Total Ranks 9');
            debug_log('$total_edu_fund '.$total_edu_fund.' edu_pay '.$edu_pay.' $total_tour_fund '.$total_tour_fund.' tour_pay '.$tour_pay.' $total_royalty_fund '.$total_royalty_fund.' royalty_pay '.$royalty_pay.' $total_car_fund '.$total_car_fund.' car_pay '.$car_pay.' $total_home_fund '.$total_home_fund.' home_pay '.$home_pay);
            
            debug_log('$senior_executive_advisor');
            debug_log($senior_executive_advisor);
            foreach ($senior_executive_advisor as $user) {
                $this->earning->pay_earning($user->id, '', 'Group Income', 'Education Fund',$edu_pay, '', $user->signup_package);
            }

            debug_log('$silver_advisor');
            debug_log($silver_advisor);
            foreach ($silver_advisor as $user) {
                $this->earning->pay_earning($user->id, '', 'Group Income', 'Education Fund',$edu_pay, '', $user->signup_package);
                $this->earning->pay_earning($user->id, '', 'Group Income', 'Tour Fund',$tour_pay, '', $user->signup_package);
            }

            debug_log('$gold_advisor');
            debug_log($gold_advisor);
            foreach ($gold_advisor as $user) {
                $this->earning->pay_earning($user->id, '', 'Group Income', 'Education Fund',$edu_pay, '', $user->signup_package);
                $this->earning->pay_earning($user->id, '', 'Group Income', 'Tour Fund',$tour_pay, '', $user->signup_package);
                $this->earning->pay_earning($user->id, '', 'Group Income', 'Royalty Fund',$royalty_pay, '', $user->signup_package);
            }

            debug_log('$platinum_advisor');
            debug_log($platinum_advisor);
            foreach ($platinum_advisor as $user) {
                $this->earning->pay_earning($user->id, '', 'Group Income', 'Education Fund',$edu_pay, '', $user->signup_package);
                $this->earning->pay_earning($user->id, '', 'Group Income', 'Tour Fund',$tour_pay, '', $user->signup_package);
                $this->earning->pay_earning($user->id, '', 'Group Income', 'Royalty Fund',$royalty_pay, '', $user->signup_package);
                $this->earning->pay_earning($user->id, '', 'Group Income', 'Car Fund',$car_pay, '', $user->signup_package);
            }

            debug_log('$diamond_advisor');
            debug_log($diamond_advisor);
            foreach ($diamond_advisor as $user) {
                $this->earning->pay_earning($user->id, '', 'Group Income', 'Education Fund',$edu_pay, '', $user->signup_package);
                $this->earning->pay_earning($user->id, '', 'Group Income', 'Tour Fund',$tour_pay, '', $user->signup_package);
                $this->earning->pay_earning($user->id, '', 'Group Income', 'Royalty Fund',$royalty_pay, '', $user->signup_package);
                $this->earning->pay_earning($user->id, '', 'Group Income', 'Car Fund',$car_pay, '', $user->signup_package);
                $this->earning->pay_earning($user->id, '', 'Group Income', 'Home Fund',$home_pay, '', $user->signup_package);
            }

            debug_log('$green_diamond_advisor');
            debug_log($green_diamond_advisor);
            foreach ($green_diamond_advisor as $user) {
                $this->earning->pay_earning($user->id, '', 'Group Income', 'Education Fund',$edu_pay, '', $user->signup_package);
                $this->earning->pay_earning($user->id, '', 'Group Income', 'Tour Fund',$tour_pay, '', $user->signup_package);
                $this->earning->pay_earning($user->id, '', 'Group Income', 'Royalty Fund',$royalty_pay, '', $user->signup_package);
                $this->earning->pay_earning($user->id, '', 'Group Income', 'Car Fund',$car_pay, '', $user->signup_package);
                $this->earning->pay_earning($user->id, '', 'Group Income', 'Home Fund',$home_pay, '', $user->signup_package);
            }

            debug_log('$double_diamond_advisor');
            debug_log($double_diamond_advisor);
            foreach ($double_diamond_advisor as $user) {
                $this->earning->pay_earning($user->id, '', 'Group Income', 'Education Fund',$edu_pay, '', $user->signup_package);
                $this->earning->pay_earning($user->id, '', 'Group Income', 'Tour Fund',$tour_pay, '', $user->signup_package);
                $this->earning->pay_earning($user->id, '', 'Group Income', 'Royalty Fund',$royalty_pay, '', $user->signup_package);
                $this->earning->pay_earning($user->id, '', 'Group Income', 'Car Fund',$car_pay, '', $user->signup_package);
                $this->earning->pay_earning($user->id, '', 'Group Income', 'Home Fund',$home_pay, '', $user->signup_package);
            }

            debug_log('$crown_advisor');
            debug_log($crown_advisor);
            foreach ($crown_advisor as $user) {
                $this->earning->pay_earning($user->id, '', 'Group Income', 'Education Fund',$edu_pay, '', $user->signup_package);
                $this->earning->pay_earning($user->id, '', 'Group Income', 'Tour Fund',$tour_pay, '', $user->signup_package);
                $this->earning->pay_earning($user->id, '', 'Group Income', 'Royalty Fund',$royalty_pay, '', $user->signup_package);
                $this->earning->pay_earning($user->id, '', 'Group Income', 'Car Fund',$car_pay, '', $user->signup_package);
                $this->earning->pay_earning($user->id, '', 'Group Income', 'Home Fund',$home_pay, '', $user->signup_package);
            }

            debug_log('$crown_ambassador');
            debug_log($crown_ambassador);
            foreach ($crown_ambassador as $user) {
                $this->earning->pay_earning($user->id, '', 'Group Income', 'Education Fund',$edu_pay, '', $user->signup_package);
                $this->earning->pay_earning($user->id, '', 'Group Income', 'Tour Fund',$tour_pay, '', $user->signup_package);
                $this->earning->pay_earning($user->id, '', 'Group Income', 'Royalty Fund',$royalty_pay, '', $user->signup_package);
                $this->earning->pay_earning($user->id, '', 'Group Income', 'Car Fund',$car_pay, '', $user->signup_package);
                $this->earning->pay_earning($user->id, '', 'Group Income', 'Home Fund',$home_pay, '', $user->signup_package);
            }

            $active_members = $this->db->select('id,mypv, signup_package')->from('member')->where(array('mypv >='=>90000))->order_by('mypv','DESC')->get()->result();
            debug_log('$Active member');
            debug_log($active_members);

            foreach ($active_members as $key => $value) {
                $userid = $value->id;
                $mypv = $value->mypv;
                $query = $this->db->select('userid')->where(array('type'=>'Group Income', 'userid'=>$userid))->get('earning');

                if($query->num_rows()>0){
                    
                    if($mypv >=720000){
                    $this->earning->pay_earning($userid, '', 'Group Income', 'Extra Royalty Fund for Active Point of 120',$total_turnover*0.06, '', $user->signup_package);
                    }
                    elseif($mypv >=600000){
                        $this->earning->pay_earning($userid, '', 'Group Income', 'Extra Royalty Fund for Active Point of 100',$total_turnover*0.05, '', $user->signup_package);
                    }
                    elseif($mypv >=480000){
                        $this->earning->pay_earning($userid, '', 'Group Income', 'Extra Education Fund for Active Point of 80',$total_turnover*0.02, '', $user->signup_package);
                        $this->earning->pay_earning($userid, '', 'Group Income', 'Extra Royalty Fund for Active Point of 80',$total_turnover*0.04, '', $user->signup_package);
                        $this->earning->pay_earning($userid, '', 'Group Income', 'Extra Car Fund for Active Point of 80',$total_turnover*0.03, '', $user->signup_package);
                        $this->earning->pay_earning($userid, '', 'Group Income', 'Extra Home Fund for Active Point of 80',$total_turnover*0.03, '', $user->signup_package);
                    }    
                    elseif($mypv >=300000){
                        $this->earning->pay_earning($userid, '', 'Group Income', 'Extra Education Fund for Active Point of 50',$total_turnover*0.005, '', $user->signup_package);
                        $this->earning->pay_earning($userid, '', 'Group Income', 'Extra Tour Fund for Active Point of 50',$total_turnover*0.02, '', $user->signup_package);
                        $this->earning->pay_earning($userid, '', 'Group Income', 'Extra Royalty Fund for Active Point of 50',$total_turnover*0.03, '', $user->signup_package);
                        $this->earning->pay_earning($userid, '', 'Group Income', 'Extra Car Fund for Active Point of 50',$total_turnover*0.02, '', $user->signup_package);
                        $this->earning->pay_earning($userid, '', 'Group Income', 'Extra Home Fund for Active Point of 50',$total_turnover*0.02, '', $user->signup_package);
                    }    
                    elseif($mypv >=180000){
                        $this->earning->pay_earning($userid, '', 'Group Income', 'Extra Education Fund for Active Point of 30',$total_turnover*0.01, '', $user->signup_package);
                        $this->earning->pay_earning($userid, '', 'Group Income', 'Extra Tour Fund for Active Point of 30',$total_turnover*0.01, '', $user->signup_package);
                        $this->earning->pay_earning($userid, '', 'Group Income', 'Extra Royalty Fund for Active Point of 30',$total_turnover*0.02, '', $user->signup_package);
                        $this->earning->pay_earning($userid, '', 'Group Income', 'Extra Car Fund for Active Point of 30',$total_turnover*0.01, '', $user->signup_package);
                        $this->earning->pay_earning($userid, '', 'Group Income', 'Extra Home Fund for Active Point of 30',$total_turnover*0.01, '', $user->signup_package);
                    }    
                    elseif($mypv >=90000){
                        $this->earning->pay_earning($userid, '', 'Group Income', 'Extra Education Fund for Active Point of 15',$total_turnover*0.005, '', $user->signup_package);
                        $this->earning->pay_earning($userid, '', 'Group Income', 'Extra Tour Fund for Active Point of 15',$total_turnover*0.005, '', $user->signup_package);
                        $this->earning->pay_earning($userid, '', 'Group Income', 'Extra Royalty Fund for Active Point of 15',$total_turnover*0.01, '', $user->signup_package);
                    }        
                
                }

            }

        }

    }

    public function mission_arogyam_club_income()
    {
        $level_ids_array = $this->db->query("select userid, CONCAT_WS('',SUBSTR(level1,2),SUBSTR(level2,2),SUBSTR(level3,2),SUBSTR(level4,2),SUBSTR(level5,2),SUBSTR(level6,2),SUBSTR(level7,2),SUBSTR(level8,2),SUBSTR(level9,2),SUBSTR(level10 ,2),SUBSTR(level11,2),SUBSTR(level12,2),SUBSTR(level13,2),SUBSTR(level14,2),SUBSTR(level15,2),SUBSTR(level16,2),SUBSTR(level17,2),SUBSTR(level18,2),SUBSTR(level19,2),SUBSTR(level20,2)) as ids, SUBSTR(level20,2) as l20 from level_details group by 1")->result();

        debug_log($level_ids_array);

        foreach ($level_ids_array as $key => $value) {

            $userid = $value->userid;
            $level_ids = rtrim($value->ids,',');

            if(strlen($level_ids)>0){
                $total_count = $this->db->query("
                 SELECT count(*) as count FROM member 
                 WHERE secret IN (" .$level_ids .") and status = 'Active' and mypv >= 2000")->result_array()[0]['count'];
                debug_log($this->db->last_query());

                $earning_query = $this->db->select('userid')->where(array('userid'=>$userid,'pair_names'=>'Club Income - 2 advisors achieved the 2000pv'))->get('earning');
                
                if(($earning_query->num_rows()<=0)&&($total_count>=2)){
                    $this->earning->pay_earning($userid, '', 'Club Income', 'Club Income - 2 advisors achieved the 2000pv', 250, '', '');
                }
                debug_log($this->db->last_query());

                $earning_query = $this->db->select('userid')->where(array('userid'=>$userid,'pair_names'=>'Club Income - 4 advisors achieved the 2000pv'))->get('earning');
                
                if(($earning_query->num_rows()<=0)&&($total_count>=4)){
                    $this->earning->pay_earning($userid, '', 'Club Income', 'Club Income - 4 advisors achieved the 2000pv', 500, '', '');
                }
                debug_log($this->db->last_query());

                $earning_query = $this->db->select('userid')->where(array('userid'=>$userid,'pair_names'=>'Club Income - 8 advisors achieved the 2000pv'))->get('earning');
                
                if(($earning_query->num_rows()<=0)&&($total_count>=8)){
                    $this->earning->pay_earning($userid, '', 'Club Income', 'Club Income - 8 advisors achieved the 2000pv', 1000, '', '');
                }
                debug_log($this->db->last_query());

                $earning_query = $this->db->select('userid')->where(array('userid'=>$userid,'pair_names'=>'Club Income - 16 advisors achieved the 2000pv'))->get('earning');
                
                if(($earning_query->num_rows()<=0)&&($total_count>=16)){
                    $this->earning->pay_earning($userid, '', 'Club Income', 'Club Income - 16 advisors achieved the 2000pv', 2000, '', '');
                }
                debug_log($this->db->last_query());

                $earning_query = $this->db->select('userid')->where(array('userid'=>$userid,'pair_names'=>'Club Income - 32 advisors achieved the 2000pv'))->get('earning');
                
                if(($earning_query->num_rows()<=0)&&($total_count>=32)){
                    $this->earning->pay_earning($userid, '', 'Club Income', 'Club Income - 32 advisors achieved the 2000pv', 4000, '', '');
                }
                debug_log($this->db->last_query());

            }
            
        }

    }


    public function p2n_rank_income()
    {
      
      $earnings_count = $this->db_model->count_all('earning',array('YEAR(date) =' => date("Y"), 'MONTH(date) =' => date("m"), 'type'=>'Royalty Income'));
      debug_log($this->db->last_query());
      debug_log($earnings_count);

      if($earnings_count <= 0) {

      $count = $this->db_model->count_all('member',array('topup >' => "0",'status'=>'Active','CAST(activate_time AS DATE) <=' => date('Y-m-d', strtotime('last day of previous month')), 'CAST(activate_time AS DATE) >=' => date('Y-m-d', strtotime('first day of last month'))));

      $total = $this->db_model->sum('topup', 'member', array('topup >' => "0",'status'=>'Active','CAST(activate_time AS DATE) <=' => date('Y-m-d', strtotime('last day of previous month')), 'CAST(activate_time AS DATE) >=' => date('Y-m-d', strtotime('first day of last month'))));

      $matching = $this->db_model->sum('amount', 'earning', array('userid !=' => 'admin','type'=>'First Pair Matching Comm','CAST(date AS DATE) <=' => date('Y-m-d', strtotime('last day of previous month')), 'CAST(date AS DATE) >=' => date('Y-m-d', strtotime('first day of last month')))) + $this->db_model->sum('amount', 'earning', array('userid !=' => 'admin','type'=>'Binary Commission','CAST(date AS DATE) <=' => date('Y-m-d', strtotime('last day of previous month')), 'CAST(date AS DATE) >=' => date('Y-m-d', strtotime('first day of last month'))));

      debug_log($this->db->last_query());

      $amount = $total - $matching;

      debug_log('$total '.$total.' $matching '.$matching);

      $this->db->select("t1.secret, t1.id, t1.signup_package, IFNULL(t2.cnt,0) as count")->from('member as t1')
                ->where(array('topup >' => "0",'status'=>'Active', 'rank'=>'Diamond'))->order_by('activate_time', 'ASC')
                ->join("(select userid, count(*) as cnt from earning where type ='Binary Commission' and date <= '".date('Y-m-d', strtotime('last day of previous month'))."' and date >='".date('Y-m-d', strtotime('first day of last month'))."' group by 1) as t2", 't1.id = t2.userid', 'LEFT')->having(array('count >='=>0));
      $diamond_users = $this->db->get()->result();
      debug_log($this->db->last_query());
      
      $diamond_count = count($diamond_users);

      $diamond_pay = $diamond_count >0 ? ($amount*0.02)/$diamond_count : 0;

      $this->db->select("t1.secret, t1.id, t1.signup_package, IFNULL(t2.cnt,0) as count")->from('member as t1')
                ->where(array('topup >' => "0",'status'=>'Active', 'rank'=>'Gold'))->order_by('activate_time', 'ASC')
                ->join("(select userid, count(*) as cnt from earning where type ='Binary Commission' and date <= '".date('Y-m-d', strtotime('last day of previous month'))."' and date >='".date('Y-m-d', strtotime('first day of last month'))."' group by 1) as t2", 't1.id = t2.userid', 'LEFT')->having(array('count >='=>0));
      $gold_users = $this->db->get()->result();
      debug_log($this->db->last_query());

      $gold_count = count($gold_users);

      $gold_pay = ($diamond_count + $gold_count) >0 ?($amount*0.015)/($diamond_count + $gold_count) : 0;

      $this->db->select("t1.secret, t1.id, t1.signup_package, IFNULL(t2.cnt,0) as count")->from('member as t1')
                ->where(array('topup >' => "0",'status'=>'Active', 'rank'=>'Silver'))->order_by('activate_time', 'ASC')
                ->join("(select userid, count(*) as cnt from earning where type ='Binary Commission' and date <= '".date('Y-m-d', strtotime('last day of previous month'))."' and date >='".date('Y-m-d', strtotime('first day of last month'))."' group by 1) as t2", 't1.id = t2.userid', 'LEFT')->having(array('count >='=>0));
      $silver_users = $this->db->get()->result();
      debug_log($this->db->last_query()); 

      $silver_count = count($silver_users);

      $silver_pay = ($diamond_count + $gold_count + $silver_count)>0 ? ($amount*0.01)/($diamond_count + $gold_count + $silver_count) :0;

      foreach ($diamond_users as $user):
        $user_id   = $user->id;
        $get_last_pay = $this->db_model->select('date', 'earning', array(
          'userid' => $user_id, 'type'   => 'Royalty Income'));
        $credit_date = date('Y-m-d', strtotime('+1 month', strtotime($get_last_pay)));

        debug_log('userid '.$user_id.' $get_last_pay '.$get_last_pay.' $diamond_pay '.$diamond_pay.' $Credit_date '.$credit_date);

        if(date('Y-m-d') >= $credit_date)
        {
          $this->earning->pay_earning($user_id, '', 'Royalty Income', 'Diamond Income',$diamond_pay, '', $user->signup_package);
          $this->earning->pay_earning($user_id, '', 'Royalty Income', 'Gold Income',$gold_pay, '', $user->signup_package);
          $this->earning->pay_earning($user_id, '', 'Royalty Income', 'Silver Income',$silver_pay, '', $user->signup_package);
        }
      endforeach;

      foreach ($gold_users as $user):
        $user_id   = $user->id;
        $get_last_pay = $this->db_model->select('date', 'earning', array(
          'userid' => $user_id, 'type'   => 'Royalty Income'));
        $credit_date = date('Y-m-d', strtotime('+1 month', strtotime($get_last_pay)));

        debug_log('userid '.$user_id.' $get_last_pay '.$get_last_pay.' $gold_pay '.$gold_pay.' $Credit_date '.$credit_date);

        if(date('Y-m-d') >= $credit_date)
        {
          $this->earning->pay_earning($user_id, '', 'Royalty Income', 'Gold Income',$gold_pay, '', $user->signup_package);
          $this->earning->pay_earning($user_id, '', 'Royalty Income', 'Silver Income',$silver_pay, '', $user->signup_package);  
        }
      endforeach;

      foreach ($silver_users as $user):
        $user_id   = $user->id;
        $get_last_pay = $this->db_model->select('date', 'earning', array(
          'userid' => $user_id, 'type'   => 'Royalty Income'));
        $credit_date = date('Y-m-d', strtotime('+1 month', strtotime($get_last_pay)));

        debug_log('userid '.$user_id.' $get_last_pay '.$get_last_pay.' $silver_pay '.$silver_pay.' $Credit_date '.$credit_date);

        if(date('Y-m-d') >=$credit_date)
        {
          $this->earning->pay_earning($user_id, '', 'Royalty Income', 'Silver Income',$silver_pay, '', $user->signup_package);
            
        }
      endforeach;
      
      }
    }

    public function idle_non_working_income()
    {
      $count = $this->db_model->count_all('member',array('topup >' => "0",'status'=>'Active','CAST(activate_time AS DATE) =' => date('Y-m-d', time() - (86400 * 1))));

      $diamond_count = $this->db_model->count_all('member',array('topup >' => "0",'status'=>'Active','rank'=>'Diamond', 'CAST(FROM_UNIXTIME(last_upgrade) as DATE) =' => date('Y-m-d', time() - (86400 * 1))));

      $non_working_income = ($count*5) + ($diamond_count*40);

      $this->db->select("t1.secret, t1.id, t1.signup_package, IFNULL(t2.am,0) as amount")->from('member as t1')
                ->where(array('topup >' => '0','status'=>'Active', 'CAST(activate_time AS DATE) <=' => date('Y-m-d', time() - (86400 * 2))))->order_by('activate_time', 'ASC')
                ->join('(select userid, sum(amount) as am from earning group by 1 ) as t2', 't1.id = t2.userid', 'LEFT')->having(array('amount <'=>60));
      $users = $this->db->get()->result();
      
      $dist_count = count($users);

      $pay = $dist_count > 0 ? round($non_working_income/$dist_count,2) : 0;
      
      //debug_log(' $count '.$count.' $diamond_count '.$diamond_count.' $non_working_income '.$non_working_income.' $dist_count '.$dist_count.' $pay '.$pay);

      if($pay > 0) {
      foreach ($users as $user):
        $user_id   = $user->id;
        $activate_time = $this->db_model->select('activate_time', 'member', array('id' => $user_id));
        $get_last_pay = $this->db_model->select('date', 'earning', array('userid' => $user_id, 'type' => 'Non Working Income',));

        //debug_log('userid '.$user_id.' $get_last_pay '.$get_last_pay.' $pay '.$pay);

        if($get_last_pay <  date('Y-m-d'))
        {
          
          $amount_paid = $this->db_model->sum('amount', 'earning', array('userid' => $user_id,));
          $amount_paid = $amount_paid > 0 ? $amount_paid : 0;
          //debug_log($this->db->last_query());
          //debug_log($amount_paid);
          $remaining_amount = 60-$amount_paid > $pay ? $pay : 60-$amount_paid;
          if($remaining_amount > 0) {
          $this->earning->pay_earning($user_id, '', 'Non Working Income', 'Non Working Income',$remaining_amount, '', $user->signup_package);
          }

        }
      endforeach;
      }
    }

    public function idle_rank_income()
    {
      
      $diamond_count = $this->db_model->count_all('member',array('topup >' => "0",'status'=>'Active','rank'=>'Diamond', 'CAST(FROM_UNIXTIME(last_upgrade) as DATE) =' => date('Y-m-d', time() - (86400 * 1))));

      $diamond_income = $diamond_count*40;

      $this->db->select("t1.secret, t1.id, t1.signup_package, t2.amount")->from('member as t1')
                ->where(array('topup >' => '0','status'=>'Active', 'CAST(FROM_UNIXTIME(last_upgrade) as DATE) <=' => date('Y-m-d', time() - (86400 * 2)), 'Rank'=>'Diamond'))->order_by('activate_time', 'ASC')
                ->join('(select userid, sum(amount) as amount from earning group by 1 ) as t2', 't1.id = t2.userid', 'LEFT');//->where(array('amount <'=>2000));
      $diamond_users = $this->db->get()->result_array();

      $diamond_dis_count = count($diamond_users);

      $diamond_pay = $diamond_dis_count > 0 ? round($diamond_income/$diamond_dis_count,2) : 0;

      $count = $this->db_model->count_all('member',array('topup >' => "0",'status'=>'Active','CAST(activate_time AS DATE) =' => date('Y-m-d', time() - (86400 * 1))));

      $emerald_income = $count*4;

      $this->db->select("t1.secret, t1.id, t1.signup_package, t2.amount")->from('member as t1')
                ->where(array('topup >' => '0','status'=>'Active', 'Emerald <=' => date('Y-m-d', time() - (86400 * 2)), 'Emerald >' => date('Y-m-d', time() - (86400 * 90))))->order_by('activate_time', 'ASC')
                ->join('(select userid, sum(amount) as amount from earning group by 1 ) as t2', 't1.id = t2.userid', 'LEFT');//->where(array('amount <'=>700));
      $emerald_users = $this->db->get()->result_array();
        
      //print_r($emerald_users);
    
      $emerald_dis_count = count($emerald_users);

      $emerald_pay = $emerald_dis_count  > 0 ? round($emerald_income/$emerald_dis_count,2):0;

      $coral_income = $count*3;

      $this->db->select("t1.secret, t1.id, t1.signup_package, t2.amount")->from('member as t1')
                ->where(array('topup >' => '0','status'=>'Active', 'Coral <=' => date('Y-m-d', time() - (86400 * 2)), 'Coral >' => date('Y-m-d', time() - (86400 * 90))))->order_by('activate_time', 'ASC')
                ->join('(select userid, sum(amount) as amount from earning group by 1 ) as t2', 't1.id = t2.userid', 'LEFT');//->where(array('amount <'=>400));
      $coral_users = $this->db->get()->result_array();
      
      //debug_log($this->db->last_query());
      //print_r($coral_users);

      $coral_dis_count = count($coral_users);

      $coral_pay = $coral_dis_count > 0 ? round($coral_income/$coral_dis_count,2): 0;

      $pearl_income = $count*2;

      $this->db->select("t1.secret, t1.id, t1.signup_package, t2.amount")->from('member as t1')
                ->where(array('topup >' => '0','status'=>'Active', 'Pearl <=' => date('Y-m-d', time() - (86400 * 2)), 'Pearl >' => date('Y-m-d', time() - (86400 * 90))))->order_by('activate_time', 'ASC')
                ->join('(select userid, sum(amount) as amount from earning group by 1 ) as t2', 't1.id = t2.userid', 'LEFT');//->where(array('amount <'=>200));
      $pearl_users = $this->db->get()->result_array();

      $pearl_dis_count = count($pearl_users);

      $pearl_pay = $pearl_dis_count > 0 ? round($pearl_income/$pearl_dis_count,2) : 0;

      //debug_log(' $diamond_count '.$diamond_count.' $diamond_income '.$diamond_income.' $diamond_dis_count '.$diamond_dis_count.' $diamond_pay '.$diamond_pay.'  $count '.$count.' $emerald_income '.$emerald_income.' $emerald_dis_count '.$emerald_dis_count.' $emerald_pay '.$emerald_pay.' $coral_income '.$coral_income.' $coral_dis_count '.$coral_dis_count.' $coral_pay '.$coral_pay.' $pearl_income '.$pearl_income.' $pearl_dis_count '.$pearl_dis_count.' $pearl_pay '.$pearl_pay);

      $this->db->select('id,signup_package,CAST(FROM_UNIXTIME(last_upgrade) as DATE) as date, Pearl, Emerald, Coral')->from('member')->where(array('topup >' => "0",'status'=>'Active', 'rank'=>'Diamond'))->order_by('activate_time', 'ASC');
      $diamond_users = $this->db->get()->result();
      //print_r($diamond_users);
      foreach ($diamond_users as $user):
        $user_id   = $user->id;
        $get_last_pay = $this->db_model->select('date', 'earning', array(
          'userid' => $user_id, 'type'   => 'Royalty Income', 'pair_names !='=>'Senior Diamond Income'));

        //debug_log('userid '.$user_id.' $get_last_pay '.$get_last_pay.' $diamond_pay '.$diamond_pay);

        if($get_last_pay <  date('Y-m-d'))
        {
          
          if($user->date < date('Y-m-d', time() - (86400 * 1)))
          {
            $amount_paid = $this->db_model->sum('amount', 'earning', array('userid' => $user_id));
            $amount_paid = $amount_paid > 0 ? $amount_paid : 0;
            $remaining_amount = 2000-$amount_paid > $diamond_pay ? $diamond_pay : 2000-$amount_paid;
            if($remaining_amount > 0) {
            $this->pay_earning($user_id, '', 'Royalty Income', 'Diamond Income',$remaining_amount, '', $user->signup_package);
            }
          }
            
          if($user->Emerald < date('Y-m-d', time() - (86400 * 1)))
          {
          $remaining_amount = $emerald_pay;
          if($remaining_amount > 0) {
          $this->pay_earning($user_id, '', 'Royalty Income', 'Emerald Income',$remaining_amount, '', $user->signup_package);
          }
          }
          
          if($user->Coral < date('Y-m-d', time() - (86400 * 1)))
          {
          $remaining_amount = $coral_pay;
          if($remaining_amount > 0) {
          $this->pay_earning($user_id, '', 'Royalty Income', 'Coral Income',$remaining_amount, '', $user->signup_package);
          }
          }
          
          if($user->Pearl < date('Y-m-d', time() - (86400 * 1)))
          {
          $remaining_amount = $pearl_pay;
          if($remaining_amount > 0) {
          $this->pay_earning($user_id, '', 'Royalty Income', 'Pearl Income',$remaining_amount, '', $user->signup_package);
          }
          }
          
        }
      endforeach;

      $this->db->select('id,signup_package,CAST(FROM_UNIXTIME(last_upgrade) as DATE) as date, Pearl, Emerald, Coral')->from('member')->where(array('topup >' => "0",'status'=>'Active', 'rank'=>'Emerald'))->order_by('activate_time', 'ASC');
      $emerald_users = $this->db->get()->result();
      //print_r($emerald_users);
      foreach ($emerald_users as $user):
        $user_id   = $user->id;
        $get_last_pay = $this->db_model->select('date', 'earning', array(
          'userid' => $user_id, 'type'   => 'Royalty Income', 'pair_names !='=>'Senior Diamond Income'));

        //debug_log('userid '.$user_id.' $get_last_pay '.$get_last_pay.' $emerald_pay '.$emerald_pay);

        if($get_last_pay <  date('Y-m-d'))
        {
          if($user->Emerald < date('Y-m-d', time() - (86400 * 1)))
          {
            $amount_paid = $this->db_model->sum('amount', 'earning', array('userid' => $user_id));
            $amount_paid = $amount_paid > 0 ? $amount_paid : 0;
            $remaining_amount = 700-$amount_paid > $emerald_pay ? $emerald_pay : 700-$amount_paid;
            if($remaining_amount > 0) {
            $this->pay_earning($user_id, '', 'Royalty Income', 'Emerald Income',$remaining_amount, '', $user->signup_package);
            }
          }
          
          
          if($user->Coral < date('Y-m-d', time() - (86400 * 1)))
          {
          $remaining_amount = $coral_pay;
          if($remaining_amount > 0) {
          $this->pay_earning($user_id, '', 'Royalty Income', 'Coral Income',$remaining_amount, '', $user->signup_package);
          }
          }
          
          if($user->Pearl < date('Y-m-d', time() - (86400 * 1)))
          {
          $remaining_amount = $pearl_pay;
          if($remaining_amount > 0) {
          $this->pay_earning($user_id, '', 'Royalty Income', 'Pearl Income',$remaining_amount, '', $user->signup_package);
          }
          }
          
        }
      endforeach;

      $this->db->select('id,signup_package,CAST(FROM_UNIXTIME(last_upgrade) as DATE) as date, Pearl, Emerald, Coral')->from('member')->where(array('topup >' => "0",'status'=>'Active', 'rank'=>'Coral'))->order_by('activate_time', 'ASC');
      $coral_users = $this->db->get()->result();
      //print_r($coral_users);
      foreach ($coral_users as $user):
        $user_id   = $user->id;
        $get_last_pay = $this->db_model->select('date', 'earning', array(
          'userid' => $user_id, 'type'   => 'Royalty Income', 'pair_names !='=>'Senior Diamond Income'));

        //debug_log('userid '.$user_id.' $get_last_pay '.$get_last_pay.' $coral_pay '.$coral_pay);

        if($get_last_pay <  date('Y-m-d'))
        {
          
          if($user->Coral < date('Y-m-d', time() - (86400 * 1)))
          {
            $amount_paid = $this->db_model->sum('amount', 'earning', array('userid' => $user_id));
            $amount_paid = $amount_paid > 0 ? $amount_paid : 0;
            $remaining_amount = 400-$amount_paid > $coral_pay ? $coral_pay : 400-$amount_paid;
            if($remaining_amount > 0) {
            $this->pay_earning($user_id, '', 'Royalty Income', 'Coral Income',$remaining_amount, '', $user->signup_package);
            }
          }
          
          if($user->Pearl < date('Y-m-d', time() - (86400 * 1)))
          {
          $remaining_amount = $pearl_pay;
          if($remaining_amount > 0) {
          $this->pay_earning($user_id, '', 'Royalty Income', 'Pearl Income',$remaining_amount, '', $user->signup_package);
          }
          }

        }
      endforeach;

      $this->db->select('id,signup_package,CAST(FROM_UNIXTIME(last_upgrade) as DATE) as date, Pearl, Emerald, Coral')->from('member')->where(array('topup >' => "0",'status'=>'Active', 'rank'=>'Pearl'))->order_by('activate_time', 'ASC');
      $pearl_users = $this->db->get()->result();
      //print_r($pearl_users);
      foreach ($pearl_users as $user):
        $user_id   = $user->id;
        $get_last_pay = $this->db_model->select('date', 'earning', array(
          'userid' => $user_id, 'type'   => 'Royalty Income', 'pair_names !='=>'Senior Diamond Income'));

        //debug_log('userid '.$user_id.' $get_last_pay '.$get_last_pay.' $pearl_pay '.$pearl_pay);

        if($get_last_pay <  date('Y-m-d'))
        {
          //debug_log($user->date);
          //debug_log(date('Y-m-d', time() - (86400 * 1)));
          if($user->Pearl < date('Y-m-d', time() - (86400 * 1)))
          {
            $amount_paid = $this->db_model->sum('amount', 'earning', array('userid' => $user_id));
            $amount_paid = $amount_paid > 0 ? $amount_paid : 0;
            $remaining_amount = 200-$amount_paid > $pearl_pay ? $pearl_pay : 200-$amount_paid;
            if($remaining_amount > 0) {
            $this->pay_earning($user_id, '', 'Royalty Income', 'Pearl Income',$remaining_amount, '', $user->signup_package);
            }
          }
        }
      endforeach;
    }

    public function custom_binary()
    {
        //echo "hello";
        $this->db->select('id,total_a,total_b,total_c,total_d,paid_a,paid_b,signup_package,mypv,total_a_matching_incm,total_b_matching_incm,total_c_matching_incm,total_d_matching_incm, total_c_matching_incm, paid_a_matching_incm, paid_b_matching_incm')
                 ->from('member')->where('topup >', '0')->where('total_a >', 0)->where('total_b >', 0)
                 ->where('paid_a <', 'total_a', FALSE)->where('paid_b <', 'total_b', FALSE);
        $result = $this->db->get()->row_array();
        foreach ($result as $data) {
            $min              = min(($data['total_a_matching_incm'] - $data['paid_a_matching_incm']), ($data['total_b_matching_incm'] - $data['paid_b_matching_incm']));
            $pair_match       = min(($data['total_a'] - $data['paid_a']), ($data['total_b'] - $data['paid_b']));
            $pair_max         = max(($data['total_a'] - $data['paid_a']), ($data['total_b'] - $data['paid_b']));
            $paid_pair        = min($data['paid_a'], $data['paid_b']);
            $per_user_earning = $min / $pair_match;

            if ($paid_pair <= 0 && $pair_max >= config_item('binary_frst_ratio') && $pair_match >= config_item('binary_2nd_ratio')) {
                # First Binary.
                $this->pay_earning($data['id'], '', 'Matching Income', $min, $pair_match);
                if ($data['total_a'] > 0) {
                    $paid_a       = config_item('binary_frst_ratio');
                    $paid_b       = 1;
                    $paid_a_match = ($per_user_earning * config_item('binary_frst_ratio'));
                    $paid_b_match = $per_user_earning;
                }
                else {
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
                $this->db->where('id', $data['id']);
                $this->db->update('member', $array);

            }
            else if ($pair_match >= config_item('binary_2nd_ratio') && $paid_pair > 0) {
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


                $this->pay_earning($data['id'], '', 'Matching Income', $min, $pair_match);
                $array = array(
                    'paid_a'               => $data['paid_a'] + $pair_match,
                    'paid_b'               => $data['paid_b'] + $pair_match,
                    'paid_a_matching_incm' => $data['paid_a_matching_incm'] + $min,
                    'paid_b_matching_incm' => $data['paid_b_matching_incm'] + $min,
                );
                $this->db->where('id', $data['id']);
                $this->db->update('member', $array);
            }
            else {

            }
        }

    }


    public function epin_model_for_admin($id,$amt,$qty,$type,$is_free,$flag='')
    {
        debug_log($this->input->post('type'));
        $userid = $id;
        $amount = $amt;
        $qty  = $qty;
        $is_free  = $is_free;
        $userid = $this->common_model->filter($userid);
        debug_log("aaaa");
        if(!$this->db_model->check_user($userid)>0){
                if($flag!=''){
                    return 2;
                }
                $this->session->set_flashdata('common_flash', '<div class="alert alert-danger">The User ID does not exist !!!</div>') ;
                redirect('admin/generate_epin');
            }            $amount = $this->common_model->filter($amount);
            $qty    = $this->common_model->filter($qty);
            $data = array();
            for ($i = 0; $i < $qty; $i++) {
                $rand = mt_rand(10000000, 99999999);
                $epin = $this->db_model->select("epin", "epin", array("epin" => $rand));
                while($epin==$rand){
                    $rand = $rand + 1;
                    $epin = $this->db_model->select("epin", "epin", array("epin" => $rand));
                }
                $array = array(
                    'epin'          => $rand,
                    'amount'        => $amount,
                    'issue_to'      => $userid,
                    'generate_time' => date('Y-m-d H:i:s'),
                    'type'          => $type,
                    'is_free'          => $is_free,
                );
                array_push($data, $array);
            }
                    debug_log("bbbb");
            debug_log($data);
            $status = $this->db->insert_batch('epin', $data);
            //debug_log($this->db->last_query());
            //debug_log('Admin Epin Insert status ');
            //debug_log($status);
                    debug_log("ccc");

            if($status>0){
                if($flag==''){
                    $this->session->set_flashdata("common_flash", "<div class='alert alert-success'>$qty e-PIN created successfully.</div>");
                }
                if (trim(config_item('smtp_host')) !== "") {
                    $this->db_model->mail($this->db_model->select('email', 'member', array('id' => $userid)), 'e-PIN Issued', 'Dear Sir, <br/> e-PIN of Qty ' . $qty . ', has been issued to your account from us.<br/><br/>---<br/>Regards,<br/>' . config_item('company_name'));
                }
                if($flag!=''){
                    return 1;
                }
				return 1;
//                redirect('admin/unused_epin');
            }else{
                if($flag!=''){
                    return 0;
                }
                $this->session->set_flashdata("common_flash", "<div class='alert alert-danger'>There is some issue generating the ePins. Please try again later !!!</div>");
                redirect('admin/generate_epin');
            }
        }
    public function upgrade_epin_model_for_admin($data){
        $userid = $data['userid'];
        $qty  = $data['qty'];
        $userid = $this->common_model->filter($userid);
        debug_log("aaaa");
        if(!$this->db_model->check_user($userid)>0){
			if($flag!=''){
				return 2;
			}
			$this->session->set_flashdata('common_flash', '<div class="alert alert-danger">The User ID does not exist !!!</div>') ;
			redirect('admin/generate_epin');
		}
		$qty    = $this->common_model->filter($qty);
		$data1 = array();
		for ($i = 0; $i < $qty; $i++) {
			$rand = mt_rand(10000000, 99999999);
			$epin = $this->db_model->select("epin", "epin", array("epin" => $rand));
			while($epin==$rand){
				$rand = $rand + 1;
				$epin = $this->db_model->select("epin", "epin", array("epin" => $rand));
			}
			$array = array(
				'epin'			=> $rand,
				'binary_points'   => $data['binary_points'],
				'upgrade_from'	=> $data['upgrade_from'],
				'upgrade_to'	  => $data['upgrade_to'],
				'amount'	  	  => $data['amount'],
				'is_upgrade' 	  => 1,
				'issue_to'		=> $userid,
				'generate_time'   => date('Y-m-d H:i:s'),
			);
			array_push($data1, $array);
		}
		debug_log("bbbb");
		debug_log($data1);
		//print_r($data1);die;
		$status = $this->db->insert_batch('epin', $data1);
		//echo ($this->db->last_query());
		//debug_log('Admin Epin Insert status ');
		//debug_log($status);
		debug_log("ccc");

		if($status>0){
			if($flag==''){
				$this->session->set_flashdata("common_flash", "<div class='alert alert-success'>$qty e-PIN created successfully.</div>");
			}
			if (trim(config_item('smtp_host')) !== "") {
				$this->db_model->mail($this->db_model->select('email', 'member', array('id' => $userid)), 'e-PIN Issued', 'Dear Sir, <br/> e-PIN of Qty ' . $qty . ', has been issued to your account from us.<br/><br/>---<br/>Regards,<br/>' . config_item('company_name'));
			}
			if($flag!=''){
				return 1;
			}
			redirect('admin/unused_epin');
		}else{
			if($flag!=''){
				return 0;
			}
			$this->session->set_flashdata("common_flash", "<div class='alert alert-danger'>There is some issue generating the ePins. Please try again later !!!</div>");
			redirect('admin/generate_epin');
		}
	}


    public function epin_model_for_user($id,$issue_id,$qty,$plan_id,$flag='')
    {
            $userid = $this->common_model->filter($issue_id);
            if(!$this->db_model->check_user($userid)>0){
                if($flag!=''){
                    return 2;
                }
                $this->session->set_flashdata('common_flash', '<div class="alert alert-danger">The User ID does not exist !!!</div>') ;
                redirect('member/generate_epin');
            }

            $member=$this->db_model->select_multi('*', 'member', array('id' => $id));
            $payout=$this->db_model->select_multi('*', 'payout', array('plan_id' => $member->signup_package));
            
            $plan = $this->db_model->select_multi('*', 'plans', array('id' =>$this->common_model->filter($plan_id)));
            $epin_settings = $this->db_model->select_multi('user_epin_charge, user_epin_cashback, user_epin_plus', 'payout', array('plan_id' =>$this->common_model->filter($plan_id)));

            $amount = $plan->joining_fee;
            $userid = $this->common_model->filter($issue_id);
            $qty = $this->common_model->filter($qty, 'number');
            $total_amt = ($amount * $qty) + ($amount * $qty)*($epin_settings->user_epin_charge/100);
            $get_user_balance = $this->db_model->select('balance', 'wallet', array('userid' => $id));

            if ($get_user_balance < $total_amt) {
                if($flag!=''){
                    return 3;
                }
                $this->session->set_flashdata("common_flash", "<div class='alert alert-danger'>You wallet donot have sufficient balance to generate $qty e-PIN. Your wallet need to have " . config_item('currency') . $total_amt .  "<br><a style='color:blue;' href=" . site_url('member/topup_wallet').">Click here</a> to Topup your wallet</div>");
                redirect('member/generate-epin');
            }

            $total_cashback = 0;
            $cashback = 0;
            if(strlen($epin_settings->user_epin_cashback)!=0){
                $key_value = explode(',', $epin_settings->user_epin_cashback);
                debug_log($key_value);
                foreach ($key_value as $key => $value) {
                    $qt_amnt = explode(':', $value);
                    debug_log($qt_amnt);
                    if($qty >= $qt_amnt[0]){
                        $cashback = $qt_amnt[1];
                    }
                }
                $total_cashback = $cashback*$qty;
            }

            debug_log($cashback);
            debug_log($total_cashback);

            $total_qty = $qty;
            $extra = 0;
            if(strlen($epin_settings->user_epin_plus)!=0){
                $key_value = explode(',', $epin_settings->user_epin_plus);
                debug_log($key_value);
                foreach ($key_value as $key => $value) {
                    $qt_plus = explode(':', $value);
                    debug_log($qt_plus);
                    if($qty >= $qt_plus[0]){
                        $extra = $qt_plus[1];
                    }
                }
                $total_qty = $qty+$extra;
            }

            debug_log($extra);
            debug_log($total_qty);

            $data = array();
            for ($i = 0; $i < $total_qty; $i++) {
                $rand = mt_rand(10000000, 99999999);
                $epin = $this->db_model->select("epin", "epin", array("epin" => $rand));
                while($epin==$rand){
                    $rand = $rand + 1;    
                    $epin = $this->db_model->select("epin", "epin", array("epin" => $rand));
                }
                $array = array(
                    'epin' => $rand,
                    'amount' => $amount,
                    'issue_to' => $userid,
                    'generated_by' => $id,
                    'generate_time' => date('Y-m-d H:i:s'),
                );
                array_push($data, $array);
            }
            $status = $this->db->insert_batch('epin', $data);
            debug_log($this->db->last_query());
            debug_log('Member generate Epin Insert status ');
            debug_log($status);

            if($status>0){
                $arra = array('balance' => ($get_user_balance - $total_amt),);
                $this->db->where('userid', $id);
                $this->db->update('wallet', $arra);
                wallet_log($this->db->last_query());

                $this->earning->add_deduction($id, 'admin', $total_amt, 'ePin', 'Member ePin Generation',$member->signup_package, 'Account Transfer', '');

                $this->earning->pay_earning($this->session->user_id, '', 'Cashback from Epin Generation', 'Cashback from Epin Generation', $total_cashback, '', $plan->id);
                
                $this->earning->payout(array($id));
                if($flag==''){
                    $this->session->set_flashdata("common_flash", "<div class='alert alert-success'>$total_qty e-PIN created successfully.</div>");
                }
                if (trim(config_item('smtp_host')) !== "") {
                    $this->db_model->mail($this->db_model->select('email', 'member', array('id' => $userid)), 'e-PIN Issued', 'Dear Sir, <br/> e-PIN of Qty ' . $total_qty . ', has been issued to your account from user id: ' . config_item('ID_EXT') . $this->session->user_id . ' on behalf of us.<br/><br/>---<br/>Regards,<br/>' . config_item('company_name'));
                }
                if($flag!=''){
                    return 1;
                }
                redirect('member/generate_epin');    
            }else{
                if($flag!=''){
                    return 0;
                }
                $this->session->set_flashdata("common_flash", "<div class='alert alert-danger'>There is some issue generating the issue. Please contact support</div>");
                redirect('member/generate_epin');    
            }
    }





    public function reset_secure_password($user_id,$phone,$email,$pass,$flag=''){
        $data = $this->db_model->select_multi("name, password, phone,email", 'member', array('id' => $user_id));
        debug_log($user_id);
        debug_log($phone);
        debug_log($email);
        debug_log($pass);
        if(((!(strlen($phone)>2)) && (!(strlen($email)>2))) || ((password_verify($pass, $data->password) != true))){
            if($flag!=''){
                return 2;
            }
            $this->session->set_flashdata('common_flash', '<div class="alert alert-danger">Invalid details. Please Enter Valid Details.<br> 3 Consecutive Incorrect Attempts will block your account !!!</div>');
                  redirect(site_url('member/settings'));
        }
        if ((trim(config_item('smtp_host')) !== "") || (config_item('sms_on_join') == "Yes")) {
            debug_log(strlen($phone));
            debug_log($data->phone);
            
            if((strlen($phone)>2)&&($phone == $data->phone))
            {
                $randompassword=$this->common_model->randomPassword();
                $password = password_hash($randompassword, PASSWORD_DEFAULT);
                $data2 = array(
                      'secure_password' => $password,
                      'last_login_ip' => $this->input->ip_address(),
                      'last_login' => time(),
                  );
                  $this->db_model->update($data2, 'member', array('id' => $user_id));

                  $sms = "Hello " . $data->name . ", \nYou have requested for Secure Password Reset. \n Your Temporary Secure Password is: " . $randompassword . "\n".config_item('company_name');
                  $messvar="Ok";
                  $phone="91".$phone;
                  $this->common_model->sms($phone, urlencode($sms));
                  if($flag!=''){
                        return 3;
                  }

                  $this->session->set_flashdata('common_flash', '<div class="alert alert-success">Success - Temporary Secure password is sent to your registered Phone Number. </div>');
                  redirect('member/settings');
            }
            elseif ((strlen($email)>2) && ($email == $data->email)) 
            {
                $randompassword=$this->common_model->randomPassword();
                $password = password_hash($randompassword, PASSWORD_DEFAULT);
                
                $sub = "Secure Password Reset";
                $msg = "Hello " . $data->name . ", <br><br>You have requested for Secure Password Reset. <br><br> Temporary Secure Password is: " . $randompassword . "<br><br>Kindly update password soon after login <br><br> Regards <br>Support Team<br>".config_item('company_name');
                $status = $this->db_model->mail($data->email, $sub, $msg);

                debug_log('Email Status '.$status);

                if($status == 'Success')
                {
                    $data2 = array(
                      'secure_password' => $password,
                      'last_login_ip' => $this->input->ip_address(),
                      'last_login' => time(),
                    );
                    $this->db_model->update($data2, 'member', array('id' => $user_id));    
                    if($flag!=''){
                        return 1;
                    }

                    $this->session->set_flashdata('common_flash', '<div class="alert alert-success">Success - Temporary Secure password is sent to your registered Email. </div>');
                    redirect('member/settings');
                }
                else
                {
                   if($flag!=''){
                        return 4;
                    }

                    $this->session->set_flashdata('common_flash', '<div class="alert alert-danger">Password couldnot reset at the moment. Please try later !!!</div>');
                    redirect('member/settings');
                }
            }
            else
            {
                if($flag!=''){
                    return 5;
                }

              $this->session->set_flashdata('common_flash', '<div class="alert alert-danger">Invalid Details. Please Enter Correct Details !!!</div>');
              redirect('member/settings');
            }
        }
        else
        {
            if($flag!=''){
                return 4;
            }
            $this->session->set_flashdata('common_flash', '<div class="alert alert-danger">Password couldnot reset at the moment. Please try later !!!</div>');
            redirect('member/settings');
        }
    }


    public function voucher_model_for_user($id,$to_user,$amount1)
    {

        debug_log("enter the voucher====>");
        $userid = $this->common_model->filter($to_user);
        if(!$this->db_model->check_user($userid)>0){
            if($flag!=''){
                return 2;
            }
            $this->session->set_flashdata('common_flash', '<div class="alert alert-danger">The User ID does not exist !!!</div>') ;
            redirect('member/transfer_voucher');
        }

        if($amount1==0){
            
            $this->session->set_flashdata('common_flash', '<div class="alert alert-danger">Please Enter the Valid Amount !!!</div>') ;
            redirect('member/transfer_voucher');
        }

        $get_user_balance = $this->db_model->select('balance', 'voucher', array('userid' => $id));
        
        $get_user_voucher_balance = number_format($get_user_balance/35, 2, '.', '');
        if($amount1 > $get_user_voucher_balance){
            
            $this->session->set_flashdata('common_flash', '<div class="alert alert-danger">You do not have sufficient voucher, Please check the Voucher!!!</div>') ;
            redirect('member/transfer_voucher');
        }

        $amount = $amount1 *35;
        $array = array(
            'amount' => $amount1,
            'user_id' => $id,
            'to_user_id' => $to_user,
            'date' => date('Y-m-d H:i:s'),
        );
        $status = $this->db->insert('voucher_transfer', $array);
        debug_log($this->db->last_query());
        debug_log('Member generate Epin Insert status ');
        debug_log($status);

        if($status>0){

            $get_user_balance = $this->db_model->select('balance', 'voucher', array('userid' => $id));
            $arra = array('balance' => ($get_user_balance - $amount),);
            $this->db->where('userid', $id);
            $this->db->update('voucher', $arra);
            wallet_log($this->db->last_query());

            $get_user_balance1 = $this->db_model->select('balance', 'voucher', array('userid' => $to_user));
            $arra1 = array('balance' => ($get_user_balance1 + $amount),);
            $this->db->where('userid', $to_user);
            $this->db->update('voucher', $arra1);
            wallet_log($this->db->last_query());

            
            
            $this->session->set_flashdata("common_flash", "<div class='alert alert-success'>$amount1 Voucher Transferred successfully.</div>");
            redirect('member/transfer-voucher');    

        }else{
            if($flag!=''){
                return 0;
            }
            $this->session->set_flashdata("common_flash", "<div class='alert alert-danger'>Fiailed to Transfer the Voucher</div>");
            redirect('member/transfer-voucher');    
        }




    }

}
