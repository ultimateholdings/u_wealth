<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Gmart_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('earning');
        $this->load->library('cart');
        $this->load->model('downline_model');
        $this->load->helper('file_helper');
    }

    public function clear_all_gmart_data(){
        // don't change this
        $this->db->truncate('tbl_addresses');
        $this->db->truncate('tbl_applied_coupon');
        $this->db->truncate('tbl_bank_details');
        $this->db->truncate('tbl_cart');
        $this->db->truncate('tbl_cart_tmp');
        $this->db->truncate('tbl_order_details');
        $this->db->truncate('tbl_order_items');
        $this->db->truncate('tbl_order_status');
        $this->db->truncate('tbl_product');
        $this->db->truncate('tbl_product_images');
        $this->db->truncate('tbl_rating');
        $this->db->truncate('tbl_recent_viewed');
        $this->db->truncate('tbl_refund');
        $this->db->truncate('tbl_transaction');
        $this->db->truncate('tbl_users');
        $this->db->truncate('tbl_wishlist');
        $this->db->truncate('tbl_point_setting');
        $this->db->truncate('tbl_roles');
    }

    public function clear_all_user_data(){
        // don't change this
        $this->db->truncate('tbl_addresses');
        $this->db->truncate('tbl_applied_coupon');
        $this->db->truncate('tbl_bank_details');
        $this->db->truncate('tbl_cart');
        $this->db->truncate('tbl_cart_tmp');
        $this->db->truncate('tbl_order_details');
        $this->db->truncate('tbl_order_items');
        $this->db->truncate('tbl_order_status');
        $this->db->truncate('tbl_rating');
        $this->db->truncate('tbl_refund');
        $this->db->truncate('tbl_transaction');
        $this->db->truncate('tbl_users');
        $this->db->truncate('tbl_wishlist');
    }

    public function deliver_gmart($id,$tdetail){
        $orderid = $id;
            debug_log("inside deliver_gmart".$orderid);
            $tdetail = $tdetail;
            if(config_item('ecomm_theme')=='gmart')
            {
              $before_tid = $this->db_model->select('tid', 'tbl_order_items', array('id' => $orderid));
            }
            else
            {
              $before_tid = $this->db_model->select('tid', 'product_sale', array('id' => $orderid));
            }
            if($before_tid != '')
            {
                $after_tid = $before_tid . "<br/><br/>" .  date('Y-m-d') . "<br/> Notes:<br/>" . $tdetail;
            } else {
                $after_tid = date('Y-m-d') . "<br/> Notes: " . $tdetail;
            }
            if(config_item('ecomm_theme')=='gmart')
            {
                $od  = $this->db_model->select_multi('*', 'tbl_order_items', array('id' => $orderid));
               $data = array(
                'pro_order_status'       => '6',
                //'deliver_date' => date('Y-m-d H:i:s'),
                'tid'          => $after_tid,
                );
                $this->db->where('id', $orderid);
                $this->db->update('tbl_order_items', $data);
                $data = array(
                'order_status'       => '6',
                //'deliver_date' => date('Y-m-d H:i:s'),
                );
                $this->db->where('id', $od->order_id);
                $this->db->update('tbl_order_details', $data);
                $order_detail  = $this->db_model->select_multi('*', 'tbl_order_items', array('order_id' => $orderid));
                debug_log("Details");
                debug_log($order_detail);
                
                debug_log($od);
                $prd = $this->db_model->select_multi('*', 'tbl_product', array('id' => $od->product_id));
                debug_log($prd);
                $md = $this->db_model->select_multi('*', 'member', array('id' => $od->user_id));
                $user_details= $this->db_model->select_multi('*', 'tbl_users', array('affiliate_id' => $od->user_id));

                 $data_arr = array(
                    'order_id' => $od->id,
                    'user_id' => $od->user_id,
                    'product_id' => '0',
                    'status_title' => '6',
                    'status_desc' => 'Your Order is Completed',
                    'created_at' => strtotime(date('Y-m-d H:i:s'))
                );
                //$data_usr = $this->security->xss_clean($data_arr);
                $this->db->insert('tbl_order_status',$data_arr);
                debug_log($md);
                debug_log('deliver_user'.$od->user_id);
                //print_r("hello isndie config_item");
                //print_r($od->user_id);

                // $md_data = array(
                //     'status' =>'Active', 
                // );
                // $this->db->where('id', $md->id);


                //     if($md->mypv >= 50) {
                //             $this->db->update('member', $md_data);
                //        }
                /*$memberData = $this->db_model->select_multi('*', 'member', array('status'=>'Active','id'=>$od->user_id));
                $planData = $this->db_model->select_multi('*', 'plans', array('type' =>'Registration'));
                $this->plan_model->insert_binary_data($memberData, $planData);*/
                //$this->earning->credit_binary_commission_all();
                $this->earning->payout(array());
            }
            else
            {
                $data = array(
                'status'       => 'Completed',
                'deliver_date' => date('Y-m-d H:i:s'),
                'tid'          => $after_tid,
                );
                $this->db->where('id', $orderid);
                $this->db->update('product_sale', $data);
                $od  = $this->db_model->select_multi('*', 'product_sale', array('id' => $orderid));
                $prd = $this->db_model->select_multi('*', 'product', array('id' => $od->product_id));
                $md = $this->db_model->select_multi('*', 'member', array('id' => $od->user_id));
            }
            $pd = $od->product_id == 0 ? $this->db_model->select_multi('*', 'plans', array('id' => $md->signup_package)) : $this->db_model->select_multi('*', 'plans', array('id' => $prd->plan_id));
            $pd_joining=$this->db_model->select_multi('*', 'plans', array('id' => $md->signup_package));
            //print_r($pd);exit();
            if($od->product_id == 0)
            {
                $status = $this->earning->credit_joining_commission($pd_joining,$md);
            }
            else
            {
                if(config_item('ecomm_theme')=='gmart')
                {
                    /*$array=array('total_sale' => ($prd->total_sale + $od->product_qty));
                  $this->db->where('id', $od->product_id);
                  $this->db->update('tbl_product', $array);*/
                }
                else
                {
                  $array = array('sold_qty' => ($prd->sold_qty + $od->qty));
                  $this->db->where('id', $od->product_id);
                  $this->db->update('product', $array);
                }
                //$this->earning->credit_product_comm($md,$pd,$prd,$od,'Repurchase Commission');
                //$this->downline_model->update_downline_pv($od->userid,$prd->pv*$od->qty,$md->role);
                $this->earning->credit_product_comm_gmart($md,$pd,$prd,$od,'Repurchase Commission');

                
                
                debug_log($this->db->last_query());
               
                //$this->earning->credit_product_comm($md,$pd,$prd,$od,'Repurchase Commission');
                  $this->downline_model->update_legs(array());
                  $this->earning->target_reach_income();
                  $this->earning->reward_process();
                  $this->earning->rank_process();
                  $this->earning->payout(array());
            }
            ########## END ENTRY #######################################
            return true;
    }
}