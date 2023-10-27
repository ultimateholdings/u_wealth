<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Downline_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->common_model->__session();
        $this->load->model('plan_model');
    }
    
    public function matchin_income($sponsor){
        $this->db->select('A,B');
        $this->db->where('id',$sponsor);
        $data = $this->db->get('member')->result();
       
        if($data[0]->A > 0 || $data[0]->B >0){
        $left_side = $this->get_left_side($data[0]->A);
        $right_side = $this->get_right_side($data[0]->B);
        }
        $all_downline = array();
        array_push($all_downline,$left_side);
        array_push($all_downline,$right_side);
        //echo "<pre>"; print_r($all_downline); die;
        return $all_downline;
    }
    
    public function get_left_side($node){
        $this->db->select('id,name,sponsor,activate_time,A,B,total_a,total_b');
        $this->db->where('id',$node);
        $data[$node] = $this->db->get('member')->result();
        if($data[$node][0]->A > 0 || $data[$node][0]->B >0){
        $data['l'] = $this->get_left_side($data[$node][0]->A);
        $data['r'] = $this->get_right_side($data[$node][0]->B);
        }
        return $data;
    }

    public function update_level_details_lms($secret, $userid, $pd, $position,$leg, $status=1,$gift_level=0, $i = 20, $e = 1)
    {
        $data = array(
            'secret' => $secret, 
            'userid' => $userid, 
           'pd_id' => $pd->id, 
            'pd_group_id' => $pd->group_id, 
            'position' => $position, 
            'leg' => $leg, 
            'status' => $status, 
            'gift_level' => $gift_level, 
            'i' => $i, 
            'e' => $e, 
       );

        $curl = curl_init();
          curl_setopt_array($curl, array(
            CURLOPT_URL =>APIURL."Api/update_level_details",
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
        debug_log('update_level_details_lms response');
        debug_log($response);
        $err = curl_error($curl);
        debug_log('update_level_details_lms response errors');
        debug_log($err);
    }

    public function get_right_side($node){
        $this->db->select('id,name,sponsor,activate_time,A,B,total_a,total_b');
        $this->db->where('id',$node);
        $data[$node] = $this->db->get('member')->result();
        if($data[$node][0]->A > 0 || $data[$node][0]->B >0){
            $data['l'] = $this->get_left_side($data[$node][0]->A);
            $data['r'] = $this->get_right_side($data[$node][0]->B);
        }
        return $data;
    }

    public function update_legs($ids)
    {
        if(count($ids) != 0)
        {
            foreach ($ids as $id) {
            $this->db->select('secret,id,A,B,C,D,E,signup_package,activate_time')->from('member')->where(array('id'=>$id));
            $data = $this->db->get()->result();
            }

        }
        else
        {
            $this->db->select('secret,id,A,B,C,D,E,signup_package,activate_time')->from('member')
            ->where(array('topup >'=>'0', 'position !='=>''))->or_where(array('id'=>config_item('top_id')))
            ->order_by(config_item('member_order_by'), 'DESC');
            $data = $this->db->get()->result();
        }

        if(config_item('width')=='1111') {
            foreach ($data as $result) {
                $total_downline = $this->db_model->count_all('member', array('activate_time >'=>$result->activate_time, 'signup_package'=>$result->signup_package));
                $data = array('total_downline' => $total_downline, 'total_a' => $total_downline);
                $this->db->where('id', $result->id);
                $this->db->update('member', $data);
                if(config_item('inactive_in_tree')=='Yes'){
                    $total_active = $this->db_model->count_all('member', array('activate_time >'=>$result->activate_time, 'signup_package'=>$result->signup_package, 'status'=>'Active'));
                    $data = array('total_active' => $total_active);
                    $this->db->where('id', $result->id);
                    $this->db->update('member', $data);
                }else{
                    $data = array('total_active' => $total_downline);
                    $this->db->where('id', $result->id);
                    $this->db->update('member', $data);
                }

            }
        }
        else if(config_item('width') == '21')
        {
            foreach ($data as $result) {

                #$left_secret = substr($this->db_model->select('left_leg','binarydata',array('user_id'=>$result->id)),1,-1);
                #$right_secret = substr($this->db_model->select('right_leg','binarydata',array('user_id'=>$result->id)),1,-1);

                #$count_a = $left_secret != '' ? count(explode(',', $left_secret)) : 0; 
                #$count_b = $right_secret != '' ? count(explode(',', $right_secret)) : 0;

                $total_a_pv = 0;
                $total_b_pv = 0;

                if(config_item('enable_pv')=='Yes'){

                    if($count_a>0){
                        $total_a_pv = $this->db->query("
                         SELECT sum(mypv) as total FROM member 
                         WHERE secret IN (" .$left_secret .")")->result_array()[0]['total'];    
                    } else{
                        $total_a_pv = 0;
                    }

                    debug_log($this->db->last_query());

                    if($count_b >0){
                        $total_b_pv = $this->db->query("
                        SELECT sum(mypv) as total FROM member 
                        WHERE secret IN (" .$right_secret .")")->result_array()[0]['total'];    
                    }else{
                        $total_b_pv = 0;
                    }
                }

                $total_downline = $count_a+$count_b;
                $downline_pv = $total_a_pv + $total_b_pv;

                $data = array('total_downline'=>$total_downline, 'total_a' => $count_a, 'total_b' => $count_b, 'downline_pv'=>$downline_pv, 'total_a_pv' => $total_a_pv, 'total_b_pv' => $total_b_pv);
                $this->db->where('id', $result->id);
                $this->db->update('member', $data);

                if(config_item('inactive_in_tree')=='Yes'){
                    $total_a_active = $this->db->query("
                     SELECT count(*) as active FROM member 
                     WHERE secret IN (" .$left_secret .") and status = 'Active'")->result_array()[0]['active'];
                    $total_b_active = $this->db->query("
                     SELECT count(*) as active FROM member 
                     WHERE secret IN (" .$right_secret .") and status = 'Active'")->result_array()[0]['active'];
                    $data = array('total_a_active' => $total_a_active, 'total_b_active'=>$total_b_active, 'total_active'=>$total_a_active+$total_b_active);
                    $this->db->where('id', $result->id);
                    $this->db->update('member', $data);
                }else{
                    $data = array('total_a_active' => $count_a,'total_b_active'=>$count_b, 'total_active'=>$total_downline);
                    $this->db->where('id', $result->id);
                    $this->db->update('member', $data);
                }
            }
        } 
    }

    private function count_node($id, $i = 0)
    {
        if ($i == 0) {
            $top_up = $this->db_model->select('topup', 'member', array('id' => $id));

            if (0 < $top_up) {
                $i = $i + 1;
            }
        }

        $this->db->select('id,topup')->where('position', $id);
        $data = $this->db->get('member')->result();
        $countdata = $this->db_model->count_all('member', array('position' => $id, 'topup >' => '0'));
        $i = $i + $countdata;

        foreach ($data as $result) {
            if ($result->id) {
                $i = $this->count_node($result->id, $i);
            }
        }

        return $i;
    }

    private function count_pv($id, $i = 0)
    {
        $this->db->select('id,mypv')->where('position', $id);
        $data = $this->db->get('member')->result();
        $countdata = $this->db_model->sum('mypv', 'member', array('position' => $id, 'mypv !=' => '0'));
        $i = $i + $countdata;

        foreach ($data as $result) {
            if ($result->id) {
                $i = $this->count_pv($result->id, $i);
            }
        }

        return $i;
    }

    private function count_investment($id, $i = 0)
    {
        $this->db->select('id,topup')->where('position', $id);
        $data = $this->db->get('member')->result();
        $countdata = $this->db_model->sum('topup', 'member', array('position' => $id, 'topup >' => '0'));
        $i = $i + $countdata;

        foreach ($data as $result) {
            if ($result->id) {
                $i = $this->count_investment($result->id, $i);
            }
        }

        return $i;
    }

    private function count_matching($id, $i = 0)
    {
        $this->db->select('id,my_business')->where('position', $id);
        $data = $this->db->get('member')->result();
        $countdata = $this->db_model->sum('my_business', 'member', array('position' => $id, 'my_business !=' => '0'));
        $i = $i + $countdata;

        foreach ($data as $result) {
            if ($result->id) {
                $i = $this->count_matching($result->id, $i);
            }
        }

        return $i;
    }

    public function update_leg_positon($userid,$leg,$leg_id){
        
        $update_leg = "UPDATE member SET $leg=$leg_id WHERE id = $userid";
        $this->db->query($update_leg);
        #debug_log($this->db->last_query());

        $update_position = "UPDATE member SET position=$userid WHERE id = $leg_id";
        $this->db->query($update_position);
        #debug_log($this->db->last_query());
    }

    

    public function calibrate_tree(){
        $this->db->select('id,max_width')->from('plans')->where(array('auto_pool'=>'Yes'))->order_by('id', 'ASC');
        $plans = $this->db->get()->result();

        if(count($plans) == $this->db_model->count_all('plans',array('type !=' =>'Repurchase'))){
            $level_sql = "UPDATE level SET level1=0, level2 =0, level3 =0, level4 =0, level5=0, level6=0, level7=0, level8=0, level9=0, level10=0, level11=0, level12=0, level13=0, level14=0, level15=0, level16=0, level17=0, level18=0, level19=0, level20=0 ";
            #$this->db->query($level_sql);

            $level_detail_sql = "UPDATE level_details SET level1=',', level2 =',', level3 =',', level4 =',', level5=',', level6=',', level7=',', level8=',', level9=',', level10=',', level11=',', level12=',', level13=',', level14=',', level15=',', level16=',', level17=',', level18=',', level19=',', level20=','";
            #$this->db->query($level_detail_sql);

            $member_sql = "UPDATE member SET position=0, A=0,B=0,C=0,D=0,total_downline=0";
            $this->db->query($member_sql);

            $order_by = config_item('member_order_by');

            foreach ($plans as $plan){

                $this->db->select('id')->from('member')->where(array('signup_package'=>$plan->id, 'id !='=>config_item('top_id')))->order_by($order_by, 'ASC');
                $users = $this->db->get()->result();

                foreach ($users as $user) {
                    $top_count = $this->db_model->count_all('member', array('position'=>config_item('top_id'), 'signup_package'=>$plan->id,'status'=>'Active'));
                    $total_count = $this->db_model->count_all('member', array('position'=>config_item('top_id'),'status'=>'Active'));
                    if($top_count < $plan->max_width){
                        $update_position = "UPDATE member SET position=".config_item('top_id')." WHERE id = $user->id";
                        $this->db->query($update_position);
                        debug_log($this->db->last_query());

                        $leg = $total_count == 0 ? 'A' : 'A';
                        $leg = $total_count == 1 ? 'B' : $leg;
                        $leg = $total_count == 2 ? 'C' : $leg;
                        $leg = $total_count == 3 ? 'D' : $leg;
                        $leg = $total_count == 4 ? 'E' : $leg;
                        $leg = $total_count > 4 ? '' : $leg;

                        if($leg != ''){
                            $update_leg = "UPDATE member SET $leg = $user->id WHERE id =".config_item('top_id');
                            $this->db->query($update_leg); 
                            debug_log($this->db->last_query());                       
                        }

                    } else{

                        if ($plan->max_width == '2') {
                            $this->db->select('id,A,B')->from('member')->where(array('signup_package'=>$plan->id,'status'=>'Active'))->where("(A=0 OR B=0)")->order_by($order_by, 'ASC')->limit(1);
                            $result = $this->db->get()->row();

                            if (trim($result->A) == '0') {
                                $this->update_leg_positon($result->id,'A',$user->id);
                            }
                            else {
                                $this->update_leg_positon($result->id,'B',$user->id);
                            }
                        }

                        if ($plan->max_width == '3') {
                            $this->db->select('id,A,B,C')->from('member')->where(array('signup_package'=>$plan->id,'status'=>'Active'))->where("(A=0 OR B=0 OR C=0)")->order_by($order_by, 'ASC')->limit(1);
                            $result = $this->db->get()->row();

                            if (trim($result->A) == '0') {
                                $this->update_leg_positon($result->id,'A',$user->id);
                            }
                            else if (trim($result->B) == '0') {
                                $this->update_leg_positon($result->id,'B',$user->id);
                            }
                            else {
                                $this->update_leg_positon($result->id,'C',$user->id);
                            }
                        }

                        if ($plan->max_width == '4') {
                            $this->db->select('id,A,B,C,D')->from('member')->where(array('signup_package'=>$plan->id,'status'=>'Active'))->where("(A=0 OR B=0 OR C=0 OR D=0)")->order_by($order_by, 'ASC')->limit(1);
                            $result = $this->db->get()->row();

                            if (trim($result->A) == '0') {
                                $this->update_leg_positon($result->id,'A',$user->id);
                            }
                            else if (trim($result->B) == '0') {
                                $this->update_leg_positon($result->id,'B',$user->id);
                            }
                            else if (trim($result->C) == '0') {
                                $this->update_leg_positon($result->id,'C',$user->id);
                            }
                            else {
                                $this->update_leg_positon($result->id,'D',$user->id);
                            }
                        }

                        if ($plan->max_width == '5') {
                            $this->db->select('id,A,B,C,D,E')->from('member')->where(array('signup_package'=>$plan->id,'status'=>'Active'))->where("(A=0 OR B=0 OR C=0 OR D=0 OR E=0)")->order_by($order_by, 'ASC')->limit(1);
                            $result = $this->db->get()->row();

                            if (trim($result->A) == '0') {
                                $this->update_leg_positon($result->id,'A',$user->id);
                            }
                            else if (trim($result->B) == '0') {
                                $this->update_leg_positon($result->id,'B',$user->id);
                            }
                            else if (trim($result->C) == '0') {
                                $this->update_leg_positon($result->id,'C',$user->id);
                            }
                            else if (trim($result->D) == '0') {
                                $this->update_leg_positon($result->id,'D',$user->id);
                            }
                            else {
                                $this->update_leg_positon($result->id,'E',$user->id);
                            }
                        }
                    }
                    
                }
            }
        }
    }

    public function update_downline_pv($user_id,$mypv,$role='Affiliate')
    {

        if($role == 'customer'){
            $lvl_sponsor_id = $this->db_model->select('sponsor', 'member', array('id' => $user_id));
            if (strlen($lvl_sponsor_id) > 2) {
                $downline_pv = $this->db_model->select('downline_pv', 'member', array('id' => $lvl_sponsor_id));
                $this->db->set('downline_pv', $downline_pv + $mypv);
                $this->db->where('id', $lvl_sponsor_id);
                $this->db->update('member');
            }    
        }else{
            $lvl_position_id = $this->db_model->select('position', 'member', array('id' => $user_id));
            if (strlen($lvl_position_id) > 2) {
                $downline_pv = $this->db_model->select('downline_pv', 'member', array('id' => $lvl_position_id));
                $this->db->set('downline_pv', $downline_pv + $mypv);
                $this->db->where('id', $lvl_position_id);
                $this->db->update('member');
                $md = $this->db_model->select_multi('*', 'member', array('id' => $lvl_position_id));
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
                $this->update_downline_pv($lvl_position_id,$mypv,$role);
            }    
        }
    }

    public function update_level_details($secret, $userid, $pd, $position,$leg, $status=1,$gift_level=0, $i = 20, $e = 1)
    {
        if(($e==1)&&(strlen($userid)>2))
        {
            $exists = $this->db->where(array('userid'=>$userid, 'pid'=>$pd->id))->get('level_details');
            if($exists->num_rows() == 0){
                $array = array(
                    'secret'     => $secret,
                    'userid'     => $userid,
                    'pid'        => $pd->id,
                    'gid'        => $pd->group_id,
                    'position'   => $position,
                    'leg'        => $leg,
                    'e_status'   => $status,
                    'total_downline' => 0,
                    'total_active'  => 0,
                    'gift_level' => $gift_level,
                    'level1'     => ',',
                    'level2'     => ',',
                    'level3'     => ',',
                    'level4'     => ',',
                    'level5'     => ',',
                    'level6'     => ',',
                    'level7'     => ',',
                    'level8'     => ',',
                    'level9'     => ',',
                    'level10'     => ',',
                    'level11'     => ',',
                    'level12'     => ',',
                    'level13'     => ',',
                    'level14'     => ',',
                    'level15'     => ',',
                    'level16'     => ',',
                    'level17'     => ',',
                    'level18'     => ',',
                    'level19'     => ',',
                    'level20'     => ',',
                    'all_levels'     => ',',
                );
                $this->db->insert('level_details', $array);
            }
        }

        #debug_log($this->db->last_query());

        if ($i > 0) {
            $lvl_details = $this->db_model->select_multi('*', 'level_details', array('userid' => $userid, 'gid'=>$pd->group_id));
            #debug_log($this->db->last_query());
            if (strlen($lvl_details->position) > 2) {
                $this->db->query("UPDATE level_details SET level$e = CONCAT(level$e, $secret, ',') where userid = ".$lvl_details->position." AND gid = ".$pd->group_id);    
                #debug_log($this->db->last_query());
                $this->update_level_details($secret,$lvl_details->position,$pd,$position,$leg,$status,$gift_level, $i - 1, $e + 1);
            }
        }
    }

    public function update_level($userid,$pd, $i = 20, $e = 1)
    {
        if ($i > 0) {
            $lvl_details = $this->db_model->select_multi('*', 'level_details', array('userid' => $userid, 'gid'=>$pd->group_id));
            if (strlen($lvl_details->position) > 2) {
                $this->db->query("UPDATE level SET level$e = level$e + 1 where userid = ".$lvl_details->position." AND gid = ".$pd->group_id);
                #debug_log($this->db->last_query());
                $this->update_level($lvl_details->position,$pd,$i - 1,$e + 1);
            }
        }
    }

    public function update_total_downline_id($userid,$pd)
    {
        $lvl_details = $this->db_model->select_multi('*', 'level_details', array('userid' => $userid, 'gid'=>$pd->group_id));
        #debug_log($this->db->last_query());  
        if (strlen($lvl_details->position) > 2) {

            if($pd->max_width==2){

                $lvl_details->leg == 'A' ? $this->db->query("UPDATE level_details SET total_a = total_a + 1, total_downline = total_downline + 1 where userid = ".$lvl_details->position." AND gid = ".$pd->group_id) : $this->db->query("UPDATE level_details SET total_b = total_b + 1, total_downline = total_downline + 1 where userid = ".$lvl_details->position." AND gid = ".$pd->group_id);
                #debug_log($this->db->last_query());

                $lvl_details->leg == 'A' ? $this->db->query("UPDATE member SET total_a = total_a + 1, total_downline = total_downline + 1 where id = ".$lvl_details->position) : $this->db->query("UPDATE member SET total_b = total_b + 1 , total_downline = total_downline + 1 where id = ".$lvl_details->position);
            }else{

                $this->db->query("UPDATE level_details SET total_downline = total_downline + 1 where userid = ".$lvl_details->position." AND gid = ".$pd->group_id);
                #debug_log($this->db->last_query());

                $this->db->query("UPDATE member SET total_downline = total_downline + 1 where id = ".$lvl_details->position);
                #debug_log($this->db->last_query());
            }

                                   
            $this->update_total_downline_id($lvl_details->position,$pd);
        }

    }

    public function update_total_downline_active($userid,$pd,$status)
    {
        $lvl_details = $this->db_model->select_multi('*', 'level_details', array('userid' => $userid, 'gid'=>$pd->group_id));
        #debug_log($this->db->last_query());  
        if (strlen($lvl_details->position) > 2) {
            if($status=='Active'){

                if($pd->max_width==2){

                    $lvl_details->leg == 'A' ? $this->db->query("UPDATE level_details SET total_a_active = total_a_active+1, total_active = total_active + 1 where userid = ".$lvl_details->position." AND total_active < total_downline AND gid = ".$pd->group_id) : $this->db->query("UPDATE level_details SET total_b_active = total_b_active +1, total_active = total_active + 1 where userid = ".$lvl_details->position." AND total_active < total_downline AND gid = ".$pd->group_id);
                    #debug_log($this->db->last_query());

                    $lvl_details->leg == 'A' ? $this->db->query("UPDATE member SET total_a_active = total_a_active+1, total_active = total_active + 1 where id = ".$lvl_details->position." AND total_active < total_downline") : $this->db->query("UPDATE member SET total_b_active = total_b_active+1, total_active = total_active + 1 where id = ".$lvl_details->position." AND total_active < total_downline");
                    
                }else{

                    $this->db->query("UPDATE level_details SET total_active = total_active + 1 where userid = ".$lvl_details->position." AND total_active < total_downline AND gid = ".$pd->group_id);
                    #debug_log($this->db->last_query());

                    $this->db->query("UPDATE member SET total_active = total_active + 1 where id = ".$lvl_details->position." AND total_active < total_downline");
                    #debug_log($this->db->last_query());
                }
             
            }
            $this->update_total_downline_active($lvl_details->position,$pd,$status);
        }

    }

    public function calibrate_total_downline()
    {
        
        $plans = $this->db->query('select distinct pid from level_details')->result();

        foreach ($plans as $pid) {
            $data = $this->db->query("
                    select t1.userid as id, t1.pid, t1.total_downline, t1.total_active, t2.status, t2.mypv
                    from level_details as t1
                    LEFT JOIN
                    (select id, status, mypv from member) as t2 ON t1.userid = t2.id
                    WHERE t1.pid = ".$pid->pid
                    )->result();

            $this->calibrate_total_downline_pid($data, $pid->pid);   

        }

        $this->db->query("
            UPDATE member t1
            INNER JOIN (
              SELECT userid, SUM(total_downline) as total_downline, SUM(total_active) as total_active 
              FROM level_details
              GROUP BY userid
            ) t2 ON t1.id = t2.userid
            SET t1.total_downline = t2.total_downline, t1.total_active = t2.total_active
            ");

        if(config_item('enable_pv')=='Yes'){

            $this->db->select('id,status,mypv,role')->from('member')
                ->where(array('role'=>'customer', 'status'=>'Active'))->order_by('secret', 'DESC');
            $array = $this->db->get()->result();    

            foreach ($array as $result) {
                $this->downline_model->update_downline_pv($result->id,$result->mypv,$result->role);
            }
        }

    }

    public function calibrate_total_downline_pid($data, $pid)
    {
        $total_downline = array();
        $total_active = array();
        $total_pv = array();
        foreach ($data as $result) {
            if(!array_key_exists(strval($result->id), $total_downline)){
                $total_downline[strval($result->id)]=0;
            }
            if(!array_key_exists(strval($result->id), $total_active)){
                $total_active[strval($result->id)]=0;
            }
            $return = $this->downline_model->get_array($result->id,$pid,$result->status,$result->mypv, $total_downline,$total_active,$total_pv);
            $total_downline = $return['total'];
            $total_active = $return['active'];
            $total_pv = $return['pv'];
        }
        
        foreach ($total_downline as $key => $value) {
            $queue = "UPDATE level_details SET total_downline = ".$value." WHERE userid = ".$key." and pid = ".$pid;
            $this->db->query($queue);
        }
        
        foreach ($total_active as $key => $value) {
            $queue = "UPDATE level_details SET total_active = ".$value." WHERE userid = ".$key." and pid = ".$pid;
            $this->db->query($queue);
        }

        if(config_item('enable_pv')=='Yes'){
            foreach ($total_pv as $key => $value) {
                $this->db->set('downline_pv', $value);
                $this->db->where('id', $key);
                $this->db->update('member');
            }
        }
    }

    public function get_array($id,$pid,$status,$mypv, $total_downline,$total_active, $total_pv)
    {
        $md = $this->db_model->select_multi('*', 'member', array('id'=>$id));
        $ld = $this->db_model->select_multi('*', 'level_details', array('userid'=>$id, 'pid'=>$pid));
        $lvl_position_id = $ld->position;
        if (strlen($lvl_position_id) > 2) {
            if(!array_key_exists(strval($lvl_position_id), $total_downline)){
                $total_downline[strval($lvl_position_id)]=1;
                $total_pv[strval($lvl_position_id)]=$mypv;
            }else{
                $total_downline = array_replace($total_downline, array(strval($lvl_position_id)=>$total_downline[strval($lvl_position_id)]+1));
                $total_pv = array_replace($total_pv, array(strval($lvl_position_id)=>$total_pv[strval($lvl_position_id)]+$mypv));
            }

            if(!array_key_exists(strval($lvl_position_id), $total_active)){
                if($status=='Active'){
                    $total_active[strval($lvl_position_id)]=1;                    
                }else{
                    $total_active[strval($lvl_position_id)]=0;    
                }
            }else{
                if($status=='Active'){
                    $total_active = array_replace($total_active, array(strval($lvl_position_id)=>$total_active[strval($lvl_position_id)]+1));
                }
            }

            $return = $this->get_array($lvl_position_id,$pid,$status,$mypv,$total_downline,$total_active,$total_pv);
            $total_downline = $return['total'];
            $total_active = $return['active'];
            $total_pv = $return['pv'];
        }

        return array('total'=>$total_downline,'active'=>$total_active,'pv'=>$total_pv);
    }

    public function calibrate_level_details()
    {
        
        $this->db->delete('level', array('userid !=' => config_item('top_id')));
        $this->db->query("ALTER TABLE level AUTO_INCREMENT 1");

        $level_sql = "UPDATE level SET level1=0, level2 =0, level3 =0, level4 =0, level5=0, level6=0, level7=0, level8=0, level9=0, level10=0, level11=0, level12=0, level13=0, level14=0, level15=0, level16=0, level17=0, level18=0, level19=0, level20=0";
        $this->db->query($level_sql);

        $this->db->delete('level_details', array('userid !=' => config_item('top_id')));
            $this->db->query("ALTER TABLE level_details AUTO_INCREMENT 1");

        $level_detail_sql = "UPDATE level_details SET position = NULL, total_downline=0, total_active=0, rank = 'Member', gift_level = 1, level1=',', level2 =',', level3 =',', level4 =',', level5=',', level6=',', level7=',', level8=',', level9=',', level10=',', level11=',', level12=',', level13=',', level14=',', level15=',', level16=',', level17=',', level18=',', level19=',', level20=','";
        $this->db->query($level_detail_sql);

        $this->db->delete('level_sponsor', array('userid !=' => config_item('top_id')));
            $this->db->query("ALTER TABLE level_sponsor AUTO_INCREMENT 1");

        $level_sponsor_sql = "UPDATE level_sponsor SET level1=',', level2 =',', level3 =',', level4 =',', level5=',', level6=',', level7=',', level8=',', level9=',', level10=',', level11=',', level12=',', level13=',', level14=',', level15=',', level16=',', level17=',', level18=',', level19=',', level20=','";
        $this->db->query($level_sponsor_sql);

        $order_by = config_item('free_registration')=='Yes' ? 'activate_time':'secret';
        $order_by = config_item('inactive_in_tree')=='Yes' ? 'secret':$order_by;

        $this->db->select('secret,id,signup_package,plan_gid,placement_leg, position,gift_level')->where(array('id !='=>config_item('top_id')))->order_by($order_by, 'ASC');
        $users = $this->db->get('member')->result_array();    

        $member_sql = "UPDATE member SET total_downline=0";
        $this->db->query($member_sql);

        foreach ($users as $user) {
            $userid = $user['id'];
            $secret = $user['secret'];
            $pid = $user['signup_package'];
            $gid = $user['plan_gid'];
            $gift_level = $user['gift_level'];
            $position = $user['position'];
            $leg = $user['placement_leg'];
            
            $this->downline_model->update_level_details($secret,$userid,$pid,$gid,$position,$leg, $gift_level,$i = 20, $e = 1);
            $this->downline_model->update_level($userid,$pid);
            $this->common_model->update_sponsor_level_details($userid,$secret,$i = 1, $e = 1);
            $this->downline_model->update_total_downline_id($userid,$pid);
        }               

    }

    public function update_binary_position($from, $to, $leg)
    {
        $conditon = TRUE;
        $conditon = !$this->db_model->check_user($from) ? FALSE : $conditon;
        $conditon = !$this->db_model->check_user($to) ? FALSE : $conditon;
        $conditon = !($leg == 'A' || $leg == 'B') ? FALSE : $conditon;
        $conditon = $from == $to ? FALSE : $conditon;

        if($conditon)
        {
            $gid = $this->db_model->select('group_id','plans',array('max_width'=>2));
            $fd = $this->db_model->select_multi('*','level_details',array('userid'=>$from, 'gid'=>$gid));

            $position = $this->plan_model->find_extreme_position($to, $leg);

            if($this->db_model->check_user($position))
            {
                debug_log('Removing the user from existing position');
                $this->db->query("UPDATE member SET ".$fd->leg." = 0 where id = ".$fd->position);
                debug_log($this->db->last_query());
                $this->db->query("UPDATE level_details SET ".$fd->leg." = 0 where userid = ".$fd->position." and gid = $gid");
                debug_log($this->db->last_query());

                debug_log('Moving the user to new position');
                $this->db->query("UPDATE member SET position = $position, placement_leg = '$leg' where id = ".$from);
                debug_log($this->db->last_query());
                $this->db->query("UPDATE level_details SET position = $position, leg = '$leg' where userid = ".$from." and gid = $gid");
                debug_log($this->db->last_query());


                $this->db->query("UPDATE member SET ".$leg." = $from where id = ".$position);
                debug_log($this->db->last_query());
                $this->db->query("UPDATE level_details SET ".$leg." = $from where userid = ".$position." and gid = $gid");
                debug_log($this->db->last_query());
            }
            else
            {
                debug_log('Error Getting the position');
            }

            
        }
        else
        {
            debug_log('update_binary_position couldnot be executed. Please check the arguments');
        }
    }


    public function simulate_registration()
    {   

        $temp_count = $this->db_model->count_all('member_temp');
        $main_count = $this->db_model->count_all('member');

        if($temp_count > $main_count){
            $increment = 10;
            $max_secret = $this->db->query('select max(secret) as secret from member')->result_array()[0]['secret'];

            $data =  $this->db->query(" SELECT *
                                     FROM member_temp
                                     where secret > $max_secret and secret <= ($max_secret+$increment) order by secret ASC
                                     ")->result();

             debug_log($this->db->last_query()); 
             //debug_log($data);
             
             foreach ($data as $md) {
                  debug_log('userid = '.$md->id);
                  debug_log('secret = '.$md->secret);
                  debug_log('planid = '.$md->signup_package);
                  $pd =  $this->db_model->select_multi('*', 'plans', array('id' =>$md->signup_package));
                  $mpd =  $this->db_model->select_multi('*', 'member_profile_temp', array('userid' =>$md->id));
                  $status = $this->registration_model->register_modal($md,$mpd,$pd);

                  debug_log($status);
                  if($status['status']=='false'){
                    debug_log('Erron in Registration');
                    debug_log($status['message']);
                    break;
                  }
             }
         }else{
            debug_log('temp table record count is less than main table');
         }        
    }

    public function calculate_upline($userid,$planid,$ucount='')
    {
        debug_log('entered in calculate_upline '); 
        debug_log('ucount '.$ucount);
        $md = $this->db_model->select_multi('*', 'member', array('id'=>$userid)); 
        $pd = $this->db_model->select_multi('*', 'plans', array('id'=>$planid)); 
        $upline='';
        $ud=$this->db_model->select('position','level_details',array('userid'=>$userid ,'gid'=>$pd->group_id));
        $position= $ud;
        while (strlen($position)>2)
        {
            $upline = $upline=='' ? $position : $upline.','.$position;
            $position = $this->db_model->select('position','level_details',array('userid'=>$position ,'gid'=>$pd->group_id));
        }
        debug_log($this->db->last_query());
        debug_log($upline);
        $upline_array = explode(',', $upline);

        #identifying upline id   
        if ($ucount>0) {

            $count = 1;
            foreach ($upline_array as $key => $value) 
            {   
                if ($count==$ucount) {
                    $upline_id = $value;
                }

                $count = $count + 1; 
            }
           
            // if($upline_id =='')
            // {
            //     $upline_id = config_item('top_id');  
            // }

        }
        else
        {
            $upline_id = $upline_array;
        }
            
        debug_log($this->db->last_query());
        debug_log('$upline_id ');
        debug_log($upline_id);

        return $upline_id;
    }

    public function calculate_downline($userid,$planid,$ucount='')
    {
        $md = $this->db_model->select_multi('*', 'member', array('id'=>$userid)); 
        $pd = $this->db_model->select_multi('*', 'plans', array('id'=>$planid)); 
        debug_log('entered in calculate_downline '); 
        $value = $md->id;
        debug_log('ucount '.$ucount);
        if ($ucount=='') {
            $this->db->select('CONCAT_WS("",SUBSTR(level1,2),SUBSTR(level2,2),SUBSTR(level3,2),SUBSTR(level4,2),SUBSTR(level5,2),SUBSTR(level6,2),SUBSTR(level7,2),SUBSTR(level8,2),SUBSTR(level9,2),SUBSTR(level10 ,2),SUBSTR(level11,2),SUBSTR(level12,2),SUBSTR(level13,2),SUBSTR(level14,2),SUBSTR(level15,2),SUBSTR(level16,2),SUBSTR(level17,2),SUBSTR(level18,2),SUBSTR(level19,2),SUBSTR(level20,2)) as ids')->where( array('userid' =>$value,'pid'=>$pd->id));
        }
        else
        {
            $this->db->select('CONCAT_WS("",SUBSTR(level'.$ucount.',2)) as ids')->where( array('userid' =>$value,'pid'=>$pd->id));

        }
        
        $level_ids=$this->db->get('level_details')->result_array()[0]['ids'];
        debug_log($this->db->last_query());
        $level_ids = rtrim($level_ids,',');

        debug_log('level_ids');            
        debug_log($level_ids);
        return $level_ids;
    }

    public function calculate_downline_transaction($userid,$planid,$ucount)
    {

        $md = $this->db_model->select_multi('*', 'member', array('id'=>$userid));
        $pd = $this->db_model->select_multi('*', 'plans', array('id'=>$planid));
        $value = $md->id;
        if ($ucount=='') {
            $this->db->select('CONCAT_WS("",SUBSTR(level1,2),SUBSTR(level2,2),SUBSTR(level3,2),SUBSTR(level4,2),SUBSTR(level5,2),SUBSTR(level6,2),SUBSTR(level7,2),SUBSTR(level8,2),SUBSTR(level9,2),SUBSTR(level10 ,2),SUBSTR(level11,2),SUBSTR(level12,2),SUBSTR(level13,2),SUBSTR(level14,2),SUBSTR(level15,2),SUBSTR(level16,2),SUBSTR(level17,2),SUBSTR(level18,2),SUBSTR(level19,2),SUBSTR(level20,2)) as ids')->where( array('userid' =>$value,'pid'=>$pd->id));
        }
        else
        {
            $this->db->select('CONCAT_WS("",SUBSTR(level'.$ucount.',2)) as ids,')->where( array('userid' =>$value,'pid'=>$pd->id));

        }

        $level_ids=$this->db->get('level_details')->result_array()[0]['ids'];
        $user = rtrim($level_ids,',');
        $ret = explode(',', $user);
        $key=array();
        foreach($ret as $e)
        {

            $users_rank = $this->db_model->select('id', 'member', array('secret'=>$e));
            array_push($key,$users_rank);
          
        }
        return $key;

    }

}
