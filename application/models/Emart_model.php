<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Emart_model extends CI_Model
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

    public function deliver($orderid='',$tdetail='',$flag='')
    {
            //$orderid = $this->input->post('deliverid');
            //$tdetail = $this->input->post('tdetail');
        debug_log("O id:".$orderid);
        debug_log("T detail:".$tdetail);
        $before_tid = $this->db_model->select('tid', 'product_sale', array('id' => $orderid));

        if($before_tid != '')
        {
            $after_tid = $before_tid . "<br/><br/>" .  date('Y-m-d') . "<br/> Notes:<br/>" . $tdetail; 
        } else {
            $after_tid = date('Y-m-d') . "<br/> Notes: " . $tdetail; 
        }

        $data = array(
            'status'       => 'Completed',
            'deliver_date' => date('Y-m-d H:i:s'),
            'tid'          => $after_tid,
        );
        $this->db->where('id', $orderid);
        $this->db->update('product_sale', $data);

        $od  = $this->db_model->select_multi('*', 'product_sale', array('id' => $orderid));
        $md = $this->db_model->select_multi('*', 'member', array('id' => $od->userid));
        $prd = $this->db_model->select_multi('*', 'product', array('id' => $od->product_id));
        $pd = $od->product_id == 0 ? $this->db_model->select_multi('*', 'plans', array('id' => $md->signup_package)) : $this->db_model->select_multi('*', 'plans', array('id' => $prd->plan_id));

        if($od->product_id == 0)
        {   
            $status = $this->earning->credit_joining_commission($pd,$md);

        }
        else 
        {
            $array = array('sold_qty' => ($prd->sold_qty + $od->qty));
            $this->db->where('id', $od->product_id);
            $this->db->update('product', $array);

            if($flag==''){
	            $this->earning->credit_product_comm($md,$pd,$prd,$od,'Repurchase Commission');
	        }
	        else{
	        	$incomes=$this->earning->credit_product_comm($md,$pd,$prd,$od,'Repurchase Commission',$flag);debug_log($incomes);	
	        }
            //$this->downline_model->update_downline_pv($od->userid,$prd->pv*$od->qty,$md->role);
            $this->earning->target_reach_income();
            $this->earning->reward_process();
            $this->earning->rank_process();
            $this->earning->payout(array());


            ############ INVOICE ENTRY #################################

            if(!$this->db_model->select('id', 'invoice', array('order_id'=>$od->id))>0){
                debug_log($this->db->last_query());
                $dd = $this->db_model->select_multi('*', 'shipping_address', array('userid' => $od->userid));

                $gettop = $md->topup + ($od->cost*$od->qty);
                $topup  = array(
                    'topup' => $gettop,
                );
                $this->db->where('id', $od->userid);
                $this->db->update('member', $topup);
                
                $invoice_name = $prd->prod_name;
                $user_id      = $od->userid;
                $vendor_id    = $od->vendor_id;
                $invoice_date = date('Y-m-d H:i:s');
                $user_type    = 'Member';
                $company_add  = config_item('company_address') . "<br/>" . config_item('company_city') .', ' . config_item('company_state') .' - ' . config_item('company_zipcode') . ', ' . config_item('company_country');
                $ship_adress  = $dd->s_name. "<br/>" .$dd->s_phone. "<br/>" .$dd->s_address. "<br/>" .$dd->s_city. "<br/>" .$dd->s_state. "-" .$dd->s_zipcode;
                $bill_add  = $dd->b_name. "<br/>" .$dd->b_phone. "<br/>" .$dd->b_address. "<br/>" .$dd->b_city. "<br/>" .$dd->b_state. "-" .$dd->b_zipcode;
                $total_amt    = $od->cost*$od->qty;
                $paid_amt     = $od->cost*$od->qty;
                $item_name    = $prd->prod_name;

                $price        = round($prd->prod_price*(1-($prd->discount/100)) / (1 + $prd->gst / 100), 2);
                $tax_rate     = $prd->gst;
                $tax          = round($od->cost - $price,2);
                $qty          = $od->qty;

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

            if($od->tax > 0)
            {     //($values["item_price"]-($values["item_price"]*($values["item_discount"]/100)))*$values["item_quantity"]
                $taxdata=array(
                     'userid'=>$od->userid,
                     'invoice_id' =>  $this->db_model->select('id', 'invoice', array('order_id'=>$od->id)),
                     'amount'=>($prd->prod_price-($prd->prod_price*($prd->discount/100)))*$od->qty,
                     'tax_amount' =>$od->tax*$od->qty, 
                     'vendor_id'=> $od->vendor_id,
                     'tax_percnt' =>$prd->gst,
                     'date' =>date('Y-m-d H:i:s'),
                     'transaction_id'=>$prd->prod_name . ': Order ID - ' . $orderid,
                 );
                $this->db->insert('tax_report', $taxdata);
            }

        }
        if($flag!=''){
        	$data=array(
                'status'=>'1',
                'incomes'=>$incomes
	            );
            debug_log($data);
    	    return $data;
        }

    }


}