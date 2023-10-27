<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Api_model extends CI_Model
{


    public function view_earning($config, $page, $userid)
    {
        $this->db->select('id, userid, amount, type, ref_id, date, pair_match,pair_names, secret')->from('earning')
            ->where('userid', $userid)->order_by('id DESC', 'date DESC', 'amount asc')->limit($config['per_page'], $page);

        $data['earning'] = $this->db->get()->result_array();
        return $data;
    }

    public function autologin()
    {

        $data = $this->db_model->select_multi("id, name, password, email, last_login_ip, last_login", 'member', array('id' => $this->session->_auto_user_id_));
        $session = md5($this->session->_auto_user_id_ . time());
        $this->session->set_userdata(array(
            'user_id' => $data->id,
            'email' => $data->email,
            'name' => $data->name,
            'ip' => $data->last_login_ip,
            'last_login' => $data->last_login,
            'session' => $session,
        ));
        $data2 = array(
            'last_login_ip' => $this->input->ip_address(),
            'last_login' => time(),
            'session' => $session,
        );
        $success = $this->db_model->update($data2, 'member', array('id' => $data->id));
        if ($success) {
            return array(
                "status" => "true",
                "message" => 'sucessfully login'
            );
        } else {
            return array(
                "status" => "false",
                "message" => 'user not logged in'
            );
        }
    }


    /**
    * checkProduct - checks for the product 
    * @param id - Id if the user
    */
    public function checkProduct($id){
        $result=$this->db->query("select count(id) as cnt from product where id=$id")->row()->cnt;
        return ($result==0)?0:1;
    }


    /**
    * checkPlan - checks for the plan 
    * @param id - Id if the user
    */
    public function checkPlan($id){
        $result=$this->db->query("select count(id) as cnt from plans where id=$id")->row()->cnt;
        return ($result==0)?0:1;
    }

    public function profile_update($data)
    {
        //debug_log($data);
        $mypass = $this->db_model->select('secure_password', 'member', array('id' => $data['id']));
        //debug_log("point 1");
        //debug_log($mypass);
        //debug_log($data['securepass']);
        if ((password_verify($data['securepass'], $mypass) == true)) {
            debug_log("point 2");
            if ($data['date_of_birth'] > date('Y-m-d')) {
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
                    $photo = $data['id'] . "." . explode(".", $image_data['file_name'])[1];
                    //print_r($image_data);
                    //unlink('uploads/profile/'.$photo);
                    move_uploaded_file($_FILES['photo']['tmp_name'], FCPATH . 'uploads/profile/' . $photo);
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
            debug_log($this->db->last_query());
            return array(
                "status"    => "true",
                "message"   => 'Profile Updated Successfully.'
            );
        }
        return array(
            "status"    => "false",
            "message"   => 'The entered Secure Password is wrong.'
        );
    }

    /**
    * withdraw_payout - database operations for withdraw payouts 
    * @param userid - Id if the user
    * @param amount - Amount that needs to be deducted
    */
    public function withdraw_payout($userid, $amount)
    {
        $bal = $this->db->query("select balance from wallet where userid=$userid")->row()->balance;
        if ($amount > $bal) {
            return 2;
        } else {
            $balance = $bal - $amount;
            debug_log($balance);
            $amount_after_admin_charge = $balance - ($balance * config_item('admin_charge')) / 100;
            $data = array(
                'userid' => $userid,
                'amount' => $amount,
                'admin_charge' => config_item('admin_charge'),
                'tax'          => config_item('payout_tax'),
                'net_paid'     => floor(($amount_after_admin_charge - ($amount_after_admin_charge * config_item('payout_tax')) / 100)),
                'date'   => date('Y-m-d H:i:s'),
                'mode' => "bank",
            );

            $this->db->insert('withdraw_request', $data);
            $data = array(
                "balance" => $balance
            );
            $this->db->where("userid", $userid);
            $this->db->update("wallet", $data);
            return ($this->db->affected_rows() == 1) ? 1 : 0;
        }
    }

    /**
    * checkout - Approves the order by the admin
    * @param id - Id if the user
    * @param product_id - Id of the product
    * @param qty - Quantity of the product
    */
    public function checkout($uid, $product_id, $qty,$flag='')
    {
        $get_balance = $this->db_model->select('balance', 'wallet', array('userid' => $uid));
        $item = $this->db->query("select * from product where id=$product_id")->row_array();
        if($flag=''){
            if ($get_balance < $item['prod_price']) {
                $response_data = array(
                    'status' => '2',
                );
                return $response_data;
            }
            if (($item['qty'] - $qty) < 0) {
                $response_data = array(
                    'status' => '3',
                );
                return $response_data;
            }
        }
        $data = array(
            'balance' => ($get_balance - $item['prod_price']),
        );

        $this->db->where('userid', $uid);
        $this->db->update('wallet', $data);

        debug_log("Quantity : ".$qty);
        debug_log($item);
        $array = array(
            'product_id' => $item['id'],
            'userid'     => $uid,
            'qty'        => $qty,
            'cost'       => $item['prod_price'],
            'tax'        => $item['gst'],
            'date'       => date('Y-m-d H:i:s'),
            'payment'    => 'Ewallet',
            'total_cost' => $item['prod_price'] * $qty,
        );
        debug_log("Prodcut sale data : ");
        debug_log($array);
        $this->db->insert('product_sale', $array);
        $orderid = $this->db->insert_id();
        $order_detail  = $this->db_model->select_multi('*', 'product_sale', array('id' => $this->db->insert_id()));

        $avl_qty = $this->db->query("SELECT CASE WHEN qty = -1 THEN 0 ELSE qty END as available_qty 
                     from product where id = " . $item['id'])->result_array()[0]['available_qty'];

        //Update the quantity in product table                
        $new_qty = $item['qty']-$qty;
        debug_log("aaaa :".$new_qty);
        debug_log("bbbb :".$avl_qty);
        debug_log("cccc :".$item['qty']);
        
        $array = array('qty' => $new_qty);
        $this->db->where('id', $item['id']);
        $this->db->update('product', $array);

        ############ INVOICE ENTRY #################################

        $prod_details = $this->db_model->select_multi('prod_name, prod_price, gst,discount, qty, sold_qty', 'product', array('id' => $order_detail->product_id));

        $member_detail = $this->db_model->select_multi('name, address, phone, topup', 'member', array('id' => $order_detail->userid));

        $dd = $this->db_model->select_multi('*', 'shipping_address', array('userid' => $order_detail->userid));

        $gettop = $member_detail->topup + ($order_detail->cost * $order_detail->qty);
        $topup  = array(
            'topup' => $gettop,
        );
        $this->db->where('id', $order_detail->userid);
        $this->db->update('member', $topup);

        $invoice_name = $prod_details->prod_name;
        $user_id      = $order_detail->userid;
        $vendor_id    = $order_detail->vendor_id;
        $invoice_date = date('Y-m-d H:i:s');
        $user_type    = 'Member';
        $company_add  = config_item('company_address') . "<br/>" . config_item('company_city') . ', ' . config_item('company_state') . ' - ' . config_item('company_zipcode') . ', ' . config_item('company_country');
        $ship_adress  = $dd->s_name . "<br/>" . $dd->s_phone . "<br/>" . $dd->s_address . "<br/>" . $dd->s_city . "<br/>" . $dd->s_state . "-" . $dd->s_zipcode;
        $bill_add  = $dd->b_name . "<br/>" . $dd->b_phone . "<br/>" . $dd->b_address . "<br/>" . $dd->b_city . "<br/>" . $dd->b_state . "-" . $dd->b_zipcode;
        $total_amt    = $order_detail->cost * $order_detail->qty;
        $paid_amt     = $order_detail->cost * $order_detail->qty;
        $prod_detail  = $this->db_model->select_multi('*', 'product', array('id' => $order_detail->product_id));
        $item_name    = $prod_detail->prod_name;

        $price        = round($prod_detail->prod_price * (1 - ($prod_detail->discount / 100)) / (1 + $prod_detail->gst / 100), 2);
        //$p_w_tax        = round($prod_detail->prod_price / (1 + $prod_detail->gst / 100), 2);
        $tax_rate     = $prod_detail->gst;
        $tax          = round($order_detail->cost - $price, 2);
        //$tax=$order_detail->tax;
        $qty          = $order_detail->qty;

        $array  = array($item_name => $price);
        $array2 = array($item_name => $tax);
        $array3 = array($item_name => $qty);

        $array  = serialize($array);
        $array2 = serialize($array2);
        $array3 = serialize($array3);

        $params = array(
            'order_id'         => $order_detail->id,
            'invoice_name'     => $invoice_name,
            'userid'           => $user_id,
            'vendor_id'        => $vendor_id,
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
        ########## END ENTRY #######################################
        $response_data = array(
            'status' => '1',
            'id' => $orderid
        );
        return $response_data;
    }


    /**
    * repurchase_plan - calculates the repurchases plan incomes for gsell 
    * @param userid - Id if the user
    * @param adminfee- Admin percent commision
    * @param product - Product Name 
    * @param productcost - cost of the product/service
    * @param repurchaseId- Id of Repurchase plan 
    */
    public function repurchase_plan($userid,$adminfee,$product,$product_cost,$repurchaseId){
        debug_log("start".$userid);
        $product_cost=($adminfee/100)*$product_cost;
        $name=$this->db->query("select name from member where id= $userid")->row()->name;
        $userArray=array($userid);
        $sponsoruser=$this->db->query("select sponsor from member where id=$userid")->row()->sponsor;
        debug_log($sponsoruser);
        while($sponsoruser!='1001'){
            array_push($userArray,$sponsoruser);
            $sponsoruser=$this->db->query("select sponsor from member where id=$sponsoruser")->row()->sponsor;
        }
        array_push($userArray,'1001'); 
        debug_log($userArray);
        $amount=0;
        $remark="";
        $repurchaseLevel=$this->db->query("select self_product_purchase_comm,product_pur_level1_comm,product_pur_level2_comm,product_pur_level3_comm,product_pur_level4_comm,product_pur_level5_comm,product_pur_level6_comm,product_pur_level7_comm,product_pur_level8_comm,product_pur_level9_comm,product_pur_level10_comm,product_pur_level11_comm,product_pur_level12_comm,product_pur_level13_comm,product_pur_level14_comm,product_pur_level15_comm from plans where id=$repurchaseId")->row_array();
        debug_log($repurchaseLevel);
        $repurchaseLevel=array_values($repurchaseLevel);
        $result=array();
        for($level=0;$level<15;$level++){
            if($level==sizeof($userArray)){
                debug_log($level);
                debug_log("1st if");
                break;
            }
            debug_log("Level Type :".gettype($repurchaseLevel[$level]));
            if($repurchaseLevel[$level]!="0"){
                $amount=(($product_cost-($product_cost/$adminfee))*$repurchaseLevel[$level])/100;      //Calculation needs cost of the product
                if($level==0){
                    $remark="Self Repurchase Income for $product from $userid $name";
                    $inc_type="Self Purchase Commission";
                    $pair="Self Purchase Commission";
                }
                else{
                    $remark="Level $level Income for $product from $userid $name";
                    $inc_type="Repurchase Commission";
                    $pair=$remark;
                }
                $nodeCalc=array(
                                'userid'=>$userArray[$level],
                                'amount'=>$amount,
                                'remark'=>$remark
                                );
                array_push($result,$nodeCalc);
                $usid=$userArray[$level];
                $uname=$this->db->query("select name from member where id= $usid")->row()->name;
                $date = date('y-m-d h:i:s');
                $data=array(
                        'pid'=>0,
                        'userid'=>$usid,
                        'name'=>$uname,
                        'amount'=>$amount,
                        'type'=>$inc_type,
                        'pair_names'=>$pair,
                        'ref_id'=>$userid,
                        'date'=>$date,
                        'status'=>'Paid'
                        );
                $this->db->insert('earning',$data);
                
                $avail_bal=$this->db->query("select balance from wallet where userid=$usid")->row()->balance;
                $avail_bal+=$amount;
                $data=array(
                            "balance"=>$avail_bal,
                        );
                $this->db->where('userid',$usid);
                $this->db->update("wallet",$data);
            }
        }
        debug_log($result);
        return $result;
    }

    /**
    * view_earning_by_interval - fetches earning data from earning table as per the type
    *                            ,start date and end date
    **/
    public function view_earning_by_interval($id,$income_type,$start_date,$end_date){
        $info['data']=$this->db->query("select * from earning where userid=$id and type='$income_type' and (date>='$start_date' and date<='$end_date')")->result_array();
        return $info;
    }

    /**
    * kyc_approve - Sends the approve request to admin by making the status field 
    *                            in db as Pending
    **/
    public function kyc_approve($id,$pan_no,$bank_name,$account_no,$ifsc_code,$branch_name,$account_type,$securepass){
        $mypass = $this->db_model->select('secure_password', 'member', array('id' => $id));
        if(password_verify($this->input->post('oldpass'), $mypass) == false) {
            $checkKycStat=$this->db->query("select status from member_profile where userid=$id")->row()->status;
            if($checkKycStat=="completed"){
                return 3;
            }
            if($checkKycStat=="Pending"){
                return 4;
            }
            $array = array(
                        'tax_no' => $pan_no,
                        'bank_ac_no' => trim($account_no),
                        'bank_name' => trim($bank_name),
                        'bank_ifsc' => trim($ifsc_code),
                        'bank_branch' => trim($branch_name),
                        'account_type' => $account_type,
                        'status'=>'Pending',
                        );
            $this->db->where('userid', $id);
            $this->db->update('member_profile', $array);
            return ($this->db->affected_rows()==1)?1:0;
        }
        else{
            return 2;
        }
    }


    /**
    * bitcoin_details - Updates the bitcoin address in member profile table 
    * @param id - Id of the user
    * @param bitaddr - bitcoin address of the user
    **/
    public function bitcoin_details($id,$bitaddr){
                    debug_log("3");

        $data=array(
                    'btc_address'=>$bitaddr
                );
        $this->db->where('userid',$id);
                    debug_log("4");

        $this->db->update('member_profile',$data);
        return ($this->db->affected_rows()==1)?1:0;
    }

    /**
    * upi_details - Updates the upi details in member profile table 
    * @param id - Id of the user
    * @param upiaddr - upi address of the user
    **/
    public function upi_details($id,$upiaddr,$googlepay='',$phonepe=''){
        debug_log("3");
        $data=array(
                    'upi_id'=>$upiaddr,
                    'googlepay_no'=>$googlepay,
                    'phonepay_no'=>$phonepe
                );
        $this->db->where('userid',$id);
                    debug_log("4");

        $this->db->update('member_profile',$data);
        debug_log($this->db->last_query());
        return ($this->db->affected_rows()==1)?1:0;
    }

    /**
    * nominee_details - Updates the Nominee details in member_profile 
    * @param id - Id of the user
    * @param nom_nam - Nominee Name
    * @param nom_addr - Nominee Address
    * @param nom_rel - Nominee Address
    * @param nom_phone - Nominee Phone Number
    **/
    public function nominee_details($id,$nom_name,$nom_addr,$nom_rel,$nom_phone){
        $data=array(
                    'nominee_name'=>$nom_name,
                    'nominee_add'=>$nom_addr,
                    'nominee_relation'=>$nom_rel,
                    'nominee_phone'=>$nom_phone
                );
        $this->db->where('userid',$id);
                    debug_log("4");
        $this->db->update('member_profile',$data);
        debug_log($this->db->last_query());
        return ($this->db->affected_rows()==1)?1:0;
    }

    public function add_product($id,$cname,$amount,$planid){
        $check=$this->db->query("select prod_name from product where id=$id")->row()->prod_name;
        debug_log($check);
        

        $data=array(
                "id"=>$id,
                "prod_name"=>$cname,
                "prod_price"=>$amount,
                "dealer_price"=>$amount,
                "product_cost"=>$amount,
                "qty"=>"Unlimited",
                "plan_id"=>$planid,
                "category"=>1,
                "sub_category"=>1
                );
        if($check!=''){
            $this->db->where('id',$id);
            $this->db->update('product',$data);            
            return;
        }
        $this->db->insert('product',$data);
        debug_log($this->db->last_query());
        return; 
    }

    public function instructor_incomes($userid,$amount,$iip){
        $this->load->model('Earning');
        debug_log("in func");
        $sponsor=$this->db->query("select sponsor from member where id=$userid")->row()->sponsor;
        debug_log("one");
        $percent=$iip/100;
        $amount=$amount*$percent;
        debug_log($amount);
        $this->Earning->pay_earning($sponsor,$userid,"Instructor Royalty Income","Instructor Royalty Income", $amount);
        return array(
                    "status"=>"true",
                    "incomes"=>array(
                                    "userid"=>$sponsor,
                                    "amount"=>$amount,
                                    "remark"=>"Instructor Royalty Income from ".$userid
                                    ) 
                    );

    }

    /**
    * get_plan - Parses information about a specific plan from plans table
    * @param id - Repurchase plan id 
    **/
    public function get_plan($id){
        $data=array();
        $res=$this->db->query("select count(id) as cnt from plans where id=$id")->row()->cnt;
        if($res==1){
            $data['status']="true";
            $data['details']=$this->db->query("select * from plans where id=$id")->row_array();
        }
        else{
            $data['status']="false";
        }
        return $data;
    }

     public function get_mlm_plan($id){
        debug_log('id');
        debug_log($id);

        $data=array();
        $res=$this->db->query("select count(id) as cnt from plans where id !=$id")->row()->cnt;
        debug_log('res');
        debug_log($res);

        if($res > 0){
            $data['status']="true";
            $data['details']=$this->db->query("select * from plans where id !=$id")->result_array();
        }
        else{
            $data['status']="false";
        }
        return $data;
    }

    /**
    * edit_plan - edits product level incomes of a plan
    * @param id - Repurchase plan Id
    * @param self - self repurchase commision percent
    * @param lev1 to lev15 - Level percent commissions
    **/
    public function edit_plan($id,$self,$lev1,$lev2,$lev3,$lev4,$lev5,$lev6,$lev7,$lev8,$lev9,$lev10,$lev11,$lev12,$lev13,$lev14,$lev15,$joining_fee){
        $p_data=array(
                        'joining_fee'=>$joining_fee,
                        'self_product_purchase_comm'=>$self,
                        'product_pur_level1_comm'=>$lev1,
                        'product_pur_level2_comm'=>$lev2,
                        'product_pur_level3_comm'=>$lev3,
                        'product_pur_level4_comm'=>$lev4,
                        'product_pur_level5_comm'=>$lev5,
                        'product_pur_level6_comm'=>$lev6,
                        'product_pur_level7_comm'=>$lev7,
                        'product_pur_level8_comm'=>$lev8,
                        'product_pur_level9_comm'=>$lev9,
                        'product_pur_level10_comm'=>$lev10,
                        'product_pur_level11_comm'=>$lev11,
                        'product_pur_level12_comm'=>$lev12,
                        'product_pur_level13_comm'=>$lev13,
                        'product_pur_level14_comm'=>$lev14,
                        'product_pur_level15_comm'=>$lev15,
                    );
        $this->db->where('id',$id);
        $this->db->update('plans',$p_data);
        return ($this->db->affected_rows()==1)?1:0;
    }

    /**
    * get_config - parses of extended_kpi,enabled_kyc,enabled_invoice,enabled_repurchase,
    *                enabled_pv from setting.php from config
    **/
    public function get_config(){
        try{
            if(config_item('width')==0){
                $b_plan='Unilevel';
            }
            elseif(config_item('width')==1){
                $b_plan='Single Leg';
            }
            elseif(config_item('width')==2){
                $b_plan='Binary';
            }
            elseif (config_item('width')==3) {
                $b_plan='Matrix';
            }
            $result['status']="true";
            $result['data']=array(
                                "width"=>config_item('width'),
                                'leg'=>config_item('leg'),
                                'autopool_registration'=>config_item('autopool_registration'),
                                'show_leg_choose'=>config_item('show_leg_choose'),
                                'show_placement_id'=>config_item('show_placement_id'),
                                'enabled_crowdfund'=>config_item('enable_crowdfund'),
                                'crowdfund_type'=>config_item('crowdfund_type'),
                                'level_income'=>config_item('level_income'),
                                'level_income_sponsor_carry'=>config_item('level_income_sponsor_carry'),
                                'enabled_group_income'=>config_item('enable_group_income'),
                                'enabled_epin'=>config_item('enable_epin'),
                                'disabled_tree'=>config_item('diable_tree'),
                                'disabled_registration'=>config_item('disable_registration'),
                                'free_registration'=>config_item('free_registration'),
                                'member_order_by'=>config_item('member_order_by'),
                                'root_sponsor_unlimited'=>config_item('root_sponsor_unlimited'),
                                'enabled_reward'=>config_item('enable_reward'),
                                'enabled_news'=>config_item('enable_news'),
                                'sep_tree'=>config_item('sep_tree'),
                                'same_tree'=>config_item('same_tree'),
                                'id_upgrade'=>config_item('id_upgrade'),
                                'sponsor_different_plan'=>config_item('sponsor_different_plan'),
                                'enabled_pg'=>config_item('enable_pg'),
                                'enabled_bankonnect'=>config_item('enable_bankonnect'),
                                'enabled_coinpayments'=>config_item('enable_coinpayments'),
                                'coinpayment_payout'=>config_item('coinpayment_payout'),
                                'coinpayment_currency'=>config_item('coinpayment_currency'),
                                'enabled_cashfree'=>config_item('enable_cashfree'),
                                'cashfree_enable_payout'=>config_item('cashfree_enable_payout'),
                                'cashfree_currency'=>config_item('cashfree_currency'),
                                'enabled_product'=>config_item('enable_product'),
                                'enabled_variation'=>config_item('enable_variation'),
                                'enabled_help_plan'=>config_item('enable_help_plan'),
                                'joining_product'=>config_item('joining_product'),
                                'make_join_product_entry'=>config_item('make_join_product_entry'),
                                'target_income'=>config_item('target_income'),
                                'server_type'=>config_item('server_type'),
                                'reg_default'=>config_item('reg_default'),
                                'login_default'=>config_item('login_default'),
                                'enabled_backup'=>config_item('enable_backup'),
                                'enabled_board'=>config_item('enable_board'),
                                'sponsor_restriction'=>config_item('sponsor_restriction'),
                                'inactive_sponsor'=>config_item('inactive_sponsor'),
                                "business_plan"=>$b_plan,
                                'cur'=>config_item('cur'),
                                "extended_kpi"=>config_item('extend_kpi'),
                                "enabled_kyc"=>config_item('enable_kyc'),
                                "enabled_invoice"=>config_item('enable_invoice'),
                                "enabled_repurchase"=>config_item('enable_repurchase'),
                                "enabled_pv"=>config_item('enable_pv'),
                                "enabled_bank_deposit"=>config_item('enable_bank_deposit'),
                                "enabled_upi"=>config_item('enable_upi'),
                                "enabled_crypto"=>config_item('enable_crypto'),
                                "online_deposit"=>config_item('enable_pg'),
                                "inactive_in_tree"=>config_item('inactive_in_tree'),
                                "fix_income"=>config_item('fix_income'),
                                "roi_income"=>config_item('roi_income'),
                                "enable_non_affiliate"=>config_item('enable_non_affiliate'),
                                "enabled_pg"=>config_item('enable_pg'),
                                "top_id"=>config_item('top_id'),
                                "member_order_by"=>config_item('member_order_by')
                            );
            return $result;
        }catch(Exception $e){
            return array(
                        "status"=>"false"
                    );
        }
    }

    /**
    * add_ranks - creates ranks settings in the rank_system table
    **/

    public function add_ranks($data){

        $array = array(
            'plan_id'       => $data['plan_id'],
            'type'          => $data['type'],
            'rank_name'     => $data['rank_name'],
            'rank_duration' => $data['rank_duration'],
            'based_on'      => $data['based_on'],
            'A'             => $data['A'],
            'B'             => $data['B'],
            'C'             => $data['C'],
            'D'             => $data['D'],
            'E'             => $data['E'],
            'mypv'          => $data['mypv'],
            'total_downline'=> $data['total_downline'],
            'direct'        => $data['direct'],
            'level_no'         => $data['level_no'],
            'total_member_level' => $data['total_member_level'],
            'downline_rank' => $data['downline_rank'],
        );
        if ($this->db->insert('rank_system', $array)) {
            $status="true";
        } else {
            $status="false";
        }

        return $status;
    }

    public function update_rank_data($data){

        $array = array(
            'plan_id'       => $data['plan_id'],
            'type'          => $data['type'],
            'rank_name'     => $data['rank_name'],
            'rank_duration' => $data['rank_duration'],
            'based_on'      => $data['based_on'],
            'A'             => $data['A'],
            'B'             => $data['B'],
            'C'             => $data['C'],
            'D'             => $data['D'],
            'E'             => $data['E'],
            'mypv'          => $data['mypv'],
            'total_downline'=> $data['total_downline'],
            'direct'        => $data['direct'],
            'level_no'         => $data['level_no'],
            'total_member_level' => $data['total_member_level'],
            'downline_rank' => $data['downline_rank'],
        );
        $this->db->where('id', $data['rank_id']);
        if ($this->db->update('rank_system', $array)) {
            $status="true";
        } else {
            $status="false";
        }

        return $status;
    }

    public function get_all_member(){
        $order_by = config_item('member_order_by');  
        $this->db->select('*')->from('member')->where('status !=', 'Inactive')->order_by($order_by, 'desc');
        $data['members'] = $this->db->get()->result_array();
        return $data;
    }

    public function get_all_earnings(){
        $this->db->select('id, userid, name, amount, type, ref_id, date, pair_names')->from('earning')->order_by('id DESC', 'date DESC', 'amount asc');
        
        $data['earning'] = $this->db->get()->result_array();
        return $data;
    }

    public function get_all_deductions(){
        $this->db->select("t1.*, t2.name")->from('deductions as t1')
                ->join("(SELECT id,name FROM member) as t2", 't1.user_id = t2.id', 'LEFT')
                ->where(array('t1.type !='=>'Registration Fee', 't1.type !='=>'Admin Charge', 'CHAR_LENGTH(t1.text)>'=>0))->order_by('t1.id DESC', 't1.date DESC', 't1.amount asc');
        
        $data['deductions'] = $this->db->get()->result_array();

        return $data;
    }

    public function get_search_member($data,$p_id=''){
        $plan_id   = $data['plan_id'] > 0 ? $data['plan_id'] : '';
        $plan_id   = $p_id > 0 ? $p_id : $plan_id;
        $phone     = $data['phone'];
        $email     = $data['email'];
        $sponsor   = $this->common_model->filter($data['sponsor']);
        $userid    = $this->common_model->filter($data['userid']);
        $username =$this->common_model->filter($data['username']);
        $startdate = $data['startdate'];
        $enddate   = $data['enddate'];

        $order_by = config_item('free_registration')=='Yes' ? 'activate_time':'secret';

        if(trim($userid) !== ""){
            if(!$this->db_model->check_user($userid)>0){
                $data['members']="The User ID does not exist !!!";
            }
            $this->db->where('id', $userid);
        }else{
            $this->db->where('status !=', 'Inactive');
        }
        
        $this->db->select('*')->from('member as t1')->where('t1.id !=',config_item('top_id'))->order_by($order_by, 'DESC');
        
        if (trim($plan_id) !== "") {
            $this->db->join('(select userid, pid from level_details where e_status = 1 and pid ='.$plan_id.') as t2', 't1.id = t2.userid','INNER JOIN');
        }
        if (trim($phone) !== "") {
            $this->db->where('phone', $phone);
        }
        if (trim($username) !== "") {
            $this->db->where('name', $username);
        }
        if (trim($startdate) !== "") {
            $this->db->where('cast(activate_time as DATE) >=', $startdate);
        }
        if (trim($enddate) !== "") {
            $this->db->where('cast(activate_time as DATE) <=', $enddate);
        }
        if (trim($email) !== "") {
            $this->db->where('email', $email);
        }
        if (trim($sponsor) !== "") {
            $this->db->where('sponsor', $sponsor);
        }

        $data['members'] = $this->db->get()->result_array();

        return $data;
    }



    public function activate_user($id){

        $md = $this->db_model->select_multi('*', 'member', array('id' => $id));
        $pd = $this->db_model->select_multi('*', 'plans', array('id' => $md->signup_package));

        if($md->status == 'Active'){
            $data['resp_status'] ="fail";
            $data['response']="Member Account is already Active !!";
            return $data;
        }

        if(!$md->position>0){

            $status = $this->plan_model->get_leg_position($pd, $md->sponsor, $md->placement_leg, $md->position);
            debug_log($status);

            if($status ==400){
                $data['resp_status'] ="fail";
                $data['response']="Error Activating the User";
                return $data;
            } else {
                $position = $status['position'];
                $placement_leg = $status['leg'];
            }

            if(!$position>0){
                debug_log('Error getting the position');
  
                $data['resp_status'] ="fail";
                $data['response']="Error Activating the User"; 
                return $data; 
            }

            if($md->role != 'customer'){
                if(($position == config_item('top_id')) && ($this->db_model->count_all('member', array('position' => config_item('top_id'))) <6)){
                    $data = array($placement_leg => $md->id,);
                    $this->db->where('id', $position);
                    $this->db->update('member', $data);    
                } else if($position != config_item('top_id')){
                    $data = array($placement_leg => $md->id,);
                    $this->db->where('id', $position);
                    $this->db->update('member', $data);    
                }
            }

            $data   = array(
              'position' => $position,
              'placement_leg' => $placement_leg,
              'status' => 'Active',
              'activate_time' => date('Y-m-d H:i:s'),
              'topup'  => $pd->joining_fee,
            );
            $this->db->where('id', $md->id);
            $this->db->update('member', $data);

            $this->earning->add_deduction($md->id, 'admin', $pd->joining_fee, 'Account Activation', 'Account Activation',$md->signup_package, 'Activation by Admin', '');

            $md = $this->db_model->select_multi('*', 'member', array('id' => $id));

            $this->registration_model->Update_after_position($md, $pd);

            $data['resp_status'] ="success";
            $data['response']="Successfully Activated User account."; 
            return $data;               

        } else{
            $data   = array(
                'status' => 'Active',
                'activate_time' => date('Y-m-d H:i:s'),
                'topup'  => $pd->joining_fee,
            );
            $this->db->where('id', $id);
            $this->db->update('member', $data);

            $md = $this->db_model->select_multi('*', 'member', array('id' => $id));
            //$this->common_model->update_total_downline_id($md->id, $md->status);

            if ((config_item('joining_product') == 'Yes') && (config_item('make_join_product_entry') == "Yes") && ($md->status == 'Active'))
            {
                if($this->session->userdata('_id_upgrade_')!='Yes'){
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
                $this->earning->credit_joining_commission($pd,$md);
            }
            else if((config_item('joining_product') == 'Yes') && (config_item('make_join_product_entry') == "   No") && ($md->status == 'Active'))
            {
                if($this->session->userdata('_id_upgrade_')!='Yes'){
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
                    $this->earning->add_invoice($md->id, $pd->id, $pd->joining_fee, $this->db->insert_id());
                }
            }
            else if($md->status == 'Active'){
                $this->earning->credit_joining_commission($pd,$md);
                if($this->session->userdata('_id_upgrade_')!='Yes'){
                    $this->earning->add_invoice($md->id, $pd->id, $pd->joining_fee, 0);
                }
            }    
            $data['resp_status'] ="success";
            $data['response']="Successfully Activated User account.";
            return $data;
        }

        // return $data;
    }

    public function update_member_info($id,$md,$mp){
        if($md['date_of_birth'] > date('Y-m-d')){

            $response_data['status']=false;
            $response_data['response']="You can't enter future date as Date of Birth!!";
            return $response_data;
        }
       
        $this->db->where('id', $id);
        if ($this->db->update('member', $md)) {
            $response_data['status']=true;
            $response_data['response']="User has been updated.";
        } else {
            $response_data['status']=false;
            $response_data['response']="Failed to update user data.";
            return $response_data;
        }

        $this->db->where('userid', $id);
        if ($this->db->update('member_profile', $mp)) {
            $response_data['status']=true;
            $response_data['response']="User profile has been updated.";
        } else {
            $response_data['status']=false;
            $response_data['response']="Failed to update user profile.";
            return $response_data;
        }
        return $response_data;
    }

    public function create_tree($id, $above_id = '', $position = 'A',$plan='')
    {
        $my_tree = 'my_tree';

        if ($this->session->admin_id) {
            $my_tree = 'user_tree';
        }

        $data = $this->db_model->select_multi('*', 'member', array('id' => $id));
    $status = $this->db_model->select_multi('*', 'level_details', array('userid' => $id,'gid'=>$plan));

    #debug_log($status);

    if($plan != ''){
        $lds = $this->db_model->select_multi('*', 'level_details', array('userid' => $id, 'gid'=>$plan));
        $total_downline = $lds->total_downline;
        $total_active = $lds->total_active;
        $this->db->select('id')->where(array('position'=>$id, 'signup_package'=>$plan))->order_by(config_item('member_order_by'), 'ASC');
    } else{
        $total_downline = $data->total_downline;
        $total_active = $data->total_active;    
        $this->db->select('id')->where(array('position'=>$id))->order_by(config_item('member_order_by'), 'ASC');
    }

    $dl =  $this->db->get('member')->result_array();

        if ($plan!='') {
      if ($status->e_status == 1) {
            if($this->db->count_all('rank_system')>0){
                $rank_id = $this->db_model->select('id','rank_system',array('rank_name'=>$data->rank));
                $color = $rank_id >0 ? $rank_id : 'green';
            }else{
                $color = 'green';   
            }
        }
        else {
            $color = 'red';
        }
    }
    else
    {
      if ($data->status == 'Active') {
        if($this->db->count_all('rank_system')>0){
          $rank_id = $this->db_model->select('id','rank_system',array('rank_name'=>$data->rank));
          $color = $rank_id >0 ? $rank_id : 'green';
        }else{
          $color = 'green'; 
        }
      }
      else {
        $color = 'red';
      }
    }

    $color = (($id == config_item('top_id')) && ($color == 'red')) ? 'green' : $color;

        $myimg = ($data->my_img ? base_url('uploads/profile/' . $data->my_img) : base_url('uploads/site_img/' . $color . '.png'));

        $total_node = "<span style='font-size:14px;font-weight:600;'>";

        if(config_item('sep_tree')=='No'){
            $total_node = $total_node . 'Plan Name : ' . $this->db_model->select('plan_name','plans', array('id'=>$data->signup_package)) . '<br/> ';
        }

        if($this->db->count_all('rank_system')>0){
            $total_node = $total_node . 'Rank : ' . $data->rank . '<br/> ';
        }

    if(config_item('crowdfund_type')=='Manual_Peer_to_Peer'){
      $total_node = $total_node . 'Level : ' . $this->db_model->select('gift_level','member', array('id'=>$data->id)) . '<br/> ';
    }

        $total_node = $total_node.'Total Downline: ' . ($total_downline) . '<br/>';

        if (config_item('inactive_in_tree')=='Yes'){
            $total_node = $total_node.'Total Active Downline: ' . ($total_active) . '<br/>';
        }

        if(config_item('enable_pv')=='Yes'){
            $total_node = $total_node . 'My Business: ' . ($data->mypv) . '<br/> '; 
            $total_node = $total_node . 'Downline Business: ' . ($data->downline_pv) . '<br/> ';    
        }
        
        $total_node = $total_node . '<span>';

        //debug_log($this->db->last_query());

        if ($data->id == config_item('top_id')) {
            $echo = '<a href="' . site_url('tree/'.$my_tree.'/'.$id.'/'.$plan) . '" title="' . config_item('ID_EXT') . $data->id . '" style="text-decoration: none; color: ' . $color . '; margin: 5px" data-toggle="popover" data-trigger="hover" data-html="true" data-placement="top" data-content="' . "\n" . $total_node . '<br/>' . "\n\n" . '"><img class="img-circle" style="height: 40px" src="' . $myimg . '"><br/>' . $data->name . '<br/></a>';
            return array('A' => $dl[0]['id'], 'B' => $dl[1]['id'], 'C' => $dl[2]['id'], 'D' => $dl[3]['id'], 'E' => $dl[4]['id'], 'data' => $echo, 'id' => $data->id,'color'=>$color,'name'=>$data->name,'secret'=>$data->secret);
        } else if($data->id){
            $echo = '<a href="' . site_url('tree/'.$my_tree.'/'.$id.'/'.$plan) . '" title="' . config_item('ID_EXT') . $data->id . '" style="text-decoration: none; color: ' . $color . '; margin: 5px" data-toggle="popover" data-trigger="hover" data-html="true" data-placement="top" data-content="' . "\n" . $total_node . '<br/>' . "\n\n" . '"><img class="img-circle" style="height: 40px" src="' . $myimg . '"><br/>' . $data->name . '<br/>(' . config_item('ID_EXT') . $data->id . ')</a>';
            return array('A' => $dl[0]['id'], 'B' => $dl[1]['id'], 'C' => $dl[2]['id'], 'D' => $dl[3]['id'], 'E' => $dl[4]['id'], 'data' => $echo, 'id' => $data->id,'color'=>$color,'name'=>$data->name,'secret'=>$data->secret);

        }

        return array('data' => '<a target="blank" title="Register New Member." href="' . site_url('tree/new_user/' . $position . '/' . $above_id) . '"><img style="height: 50px" src="' . base_url('uploads/site_img/new.png') . '" ></a>');
    }

    public function create_binary_tree($id, $above_id = '', $position = 'A',$plan='')
    {
        if(config_item('sep_tree')=='1')
        {
            $my_tree = 'my_tree';

            if ($this->session->admin_id) {
                $my_tree = 'user_tree';
            }

            $data = $this->db_model->select_multi('*', 'member', array('id' => $id));

            if ($data->status == 'Active') {
                if($this->db->count_all('rank_system')>0){
                    $rank_id = $this->db_model->select('id','rank_system',array('rank_name'=>$data->rank));
                    $color = $rank_id >0 ? $rank_id : 'green';
                }else{
                    $color = 'green';   
                }
            }
            else {
                $color = 'red';
            }

            $myimg = ($data->my_img ? base_url('uploads/profile/' . $data->my_img) : base_url('uploads/site_img/' . $color . '.png'));

            $total_node = "<span style='font-size:14px;font-weight:600;'>";

            if(config_item('sep_tree')=='No'){
                $total_node = $total_node . 'Plan Name : ' . $this->db_model->select('plan_name','plans', array('id'=>$data->signup_package)) . '<br/> ';
            }

            if($this->db->count_all('rank_system')>0){
                $total_node = $total_node . 'Rank : ' . $data->rank . '<br/> ';
            }

            $total_node = $total_node.'Total Downline: ' . ($data->total_downline) . '<br/>';

            if (config_item('inactive_in_tree')=='Yes'){
                $total_node = $total_node.'Total Active Downline: ' . ($data->total_active) . '<br/>';
            }

            if(config_item('enable_pv')=='Yes'){
                $total_node = $total_node . 'My Business: ' . ($data->mypv) . '<br/> '; 
                $total_node = $total_node . 'Downline Business: ' . ($data->downline_pv) . '<br/> ';    
            }
            
            if($plan != ''){
                $this->db->select('id')->where(array('position'=>$id, 'signup_package'=>$plan))->order_by(config_item('member_order_by'), 'ASC');

            } else{
                $this->db->select('id')->where(array('position'=>$id))->order_by(config_item('member_order_by'), 'ASC');    
            }
            
            $total_node = $total_node . '<span>';

            $dl =  $this->db->get('member')->result_array();
            //debug_log($this->db->last_query());

            if ($data->id == config_item('top_id')) {
                $echo = '<a href="' . site_url('tree/' . $my_tree . '/' . $id) . '" title="' . config_item('ID_EXT') . $data->id . '" style="text-decoration: none; color: ' . $color . '; margin: 5px" data-toggle="popover" data-trigger="hover" data-html="true" data-placement="top" data-content="' . "\n" . $total_node . '<br/>' . "\n\n" . '"><img class="img-circle" style="height: 40px" src="' . $myimg . '" alt="Member"><br/>' .$data->secret.' '.$data->name . '<br/></a>';
                return array('A' => $dl[0]['id'], 'B' => $dl[1]['id'], 'C' => $dl[2]['id'], 'D' => $dl[3]['id'], 'E' => $dl[4]['id'], 'data' => $echo, 'id' => $data->id,'color'=>$color,'name'=>$data->name,'secret'=>$data->secret);
            } else if($data->id){
                $echo = '<a href="' . site_url('tree/' . $my_tree . '/' . $id) . '" title="' . config_item('ID_EXT') . $data->id . '" style="text-decoration: none; color: ' . $color . '; margin: 5px" data-toggle="popover" data-trigger="hover" data-html="true" data-placement="top" data-content="' . "\n" . $total_node . '<br/>' . "\n\n" . '"><img class="img-circle" style="height: 40px" src="' . $myimg . '" alt="Member"><br/>' .$data->secret.' '.$data->name . '<br/>(' . config_item('ID_EXT') . $data->id . ')</a>';
                return array('A' => $dl[0]['id'], 'B' => $dl[1]['id'], 'C' => $dl[2]['id'], 'D' => $dl[3]['id'], 'E' => $dl[4]['id'], 'data' => $echo, 'id' => $data->id,'color'=>$color,'name'=>$data->name,'secret'=>$data->secret);

            }

            return array('data' => '<a target="blank" title="Register New Member." href="' . site_url('tree/new_user/' . $position . '/' . $above_id) . '"><img style="height: 50px" src="' . base_url('uploads/site_img/new.png') . '" alt="Member"></a>');
        }
        else
        {
            $my_tree = 'my_tree';

            if ($this->session->admin_id) {
                $my_tree = 'user_tree';
            }

            $data = $this->db_model->select_multi('*', 'member', array('id' => $id,));

            if ($data->status == 'Active') {
                if($this->db->count_all('rank_system')>0){
                    $rank_id = $this->db_model->select('id','rank_system',array('rank_name'=>$data->rank));
                    $color = $rank_id >0 ? $rank_id : 'green';
                }else{
                    $color = 'green';   
                }
            }
            else {
                $color = 'red';
            }

            $myimg = ($data->my_img ? base_url('uploads/' . $data->my_img) : base_url('uploads/site_img/' . $color . '.png'));
            
            $total_node = "<span style='font-size:14px;font-weight:600;'>";

            if(config_item('sep_tree')=='No'){
                $total_node = $total_node . 'Plan Name : ' . $this->db_model->select('plan_name','plans', array('id'=>$data->signup_package)) . '<br/> ';
            }

            if(config_item('crowdfund_type')=='Manual_Peer_to_Peer'){
              $total_node = $total_node . 'Level : ' . $this->db_model->select('gift_level','member', array('id'=>$data->id)) . '<br/> ';
            }

            if($this->db->count_all('rank_system')>0){
                $total_node = $total_node . 'Rank : ' . $data->rank . '<br/> ';
            }

            if ((config_item('leg') == '2')) {
                $total_node = $total_node .'Total Left: ' . $data->total_a . '<br/> Total Right: ' . $data->total_b . '<br/> ';
                if (config_item('inactive_in_tree')=='Yes'){
                    $total_node = $total_node .'Total Left Active: '.$data->total_a_active.'<br/> Total Right Active: '.$data->total_b_active.'<br/>';
                }

                if(config_item('enable_pv')=="Yes") {
                    $total_node = $total_node . 'My Business: ' . $data->mypv . '<br/> ';
                    $total_node = $total_node . 'Total Business Left: ' . $data->total_a_pv . '<br/> ';
                    $total_node = $total_node . 'Total Business Right: ' . $data->total_b_pv . '<br/> ';
                }

                if (config_item('enable_investment') == 'Yes') {
                    $total_node = $total_node . 'My Investment Left: ' . $data->total_a_investment. '<br/> ';
                    $total_node = $total_node . 'My Investment Right: ' . $data->total_b_investment. '<br/> ';
                }

            } else{
                $total_node = $total_node .'Total Downline: ' . ($data->total_downline) . '<br/>';
                if (config_item('inactive_in_tree')=='Yes'){
                    $total_node = $total_node.'Total Active Downline: '.$data->total_active.'<br/>';
                }
                if(config_item('enable_pv')=="Yes") {
                    $total_node = $total_node.'Downline Business: '.$data->downline_pv.'<br/> ';
                }   
            }

            $total_node = $total_node . '<span>';

            if ($data->id == config_item('top_id')) {
                $echo = '<a href="' . site_url('tree/' . $my_tree . '/' . $id) . '" title="' . config_item('ID_EXT') . $data->id . '" style="text-decoration: none; color: ' . $color . '; margin: 5px" data-toggle="popover" data-trigger="hover" data-html="true" data-placement="top" data-content="' . "\n" . $total_node . '<br/>' . "\n" . '"><img class="img-circle" style="height: 40px" src="' . $myimg . '"><br/>' .$data->secret.'. '. $data->name.'<br/></a>';
                return array('A' => $data->A, 'B' => $data->B, 'C' => $data->C, 'D' => $data->D, 'E' => $data->E, 'data' => $echo, 'id' => $data->id,'color'=>$color,'name'=>$data->name,'secret'=>$data->secret);
            } else if($data->id) {
                $echo = '<a href="' . site_url('tree/' . $my_tree . '/' . $id) . '" title="' . config_item('ID_EXT') . $data->id . '" style="text-decoration: none; color: ' . $color . '; margin: 5px" data-toggle="popover" data-trigger="hover" data-html="true" data-placement="top" data-content="' . "\n" . $total_node . '<br/>' . "\n" . '"><img class="img-circle" style="height: 40px" src="' . $myimg . '"><br/>' .$data->secret.'. '. $data->name.'<br/>(' . config_item('ID_EXT') . $data->id . ')</a>';
                return array('A' => $data->A, 'B' => $data->B, 'C' => $data->C, 'D' => $data->D, 'E' => $data->E, 'data' => $echo, 'id' => $data->id,'color'=>$color,'name'=>$data->name,'secret'=>$data->secret);
            }

            return array('data' => '<a target="blank" title="Register New Member." href="' . site_url('tree/new_user/' . $position . '/' . $above_id) . '"><img style="height: 50px" src="' . base_url('uploads/site_img/new.png') . '"></a>');
        }
        
    }
     public function forgot_password($userid,$password,$type){
        $this->load->model('db_model');
        $password = password_hash($password, PASSWORD_DEFAULT);
        $data2 = array(
                'password' => $password,
                'secure_password'   => $password,
                'last_login'        => time(),
                );
        if($type=="user"){
            $this->db_model->update($data2, 'member', array('id'  => $userid));
        }else{
            $this->db_model->update($data2, 'admin', array('id' => $userid));
        }
        return $this->db->affected_rows()==1?1:0;
    }
    public function waallet_payment_update($userid,$balance)
    {
        $current_balance = $this->get_wallet_amount($userid);
        $balance = $current_balance + $balance;
        $array = array(
            'balance' => $balance,
        );
        $this->db->where('userid', $userid);
        $this->db->update('wallet', $array);
        debug_log('in model this->db->last_query()');
        debug_log($this->db->last_query());
        return true;
    }
    public function get_wallet_amount($userid)
    {
        $wallet = $this->db_model->select('balance', 'wallet', array('userid' => $userid));
        return $wallet;
    }
    public function add_support_ticket($data){
        $this->db->insert('ticket',$data);
        return $this->db->insert_id();
    }
    public function view_ticket_user($data){
        debug_log("ticket");
        debug_log($data);
        debug_log($data['ticket_id']);
        $this->db->insert('ticket_reply',$data);
        $array = array(
                'status' => 'Customer Reply',
            );
            $this->db->where('id',$data['ticket_id']); 
            $this->db->update('ticket', $array);
            debug_log($this->db->last_query());
        return $this->db->insert_id();
    }
    public function view_ticket_admin($data){
        debug_log("ticket");
        debug_log($data);
        debug_log($data['ticket_id']);
        $this->db->insert('ticket_reply',$data);
        $array = array(
                'status' => 'Waiting User Reply',
            );
            $this->db->where('id',$data['ticket_id']); 
            $this->db->update('ticket', $array);
            debug_log($this->db->last_query());
        return $this->db->insert_id();
    }
 public function close_ticket($array,$id){
    $this->db->where('id', $id);
    $this->db->update('ticket', $array);
 }

}