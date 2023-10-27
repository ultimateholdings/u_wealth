<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->common_model->__session();
        
    }

    public function clear_plan_data()
    {
        $this->db->delete('plans', array('type !='=>'Repurchase'));
        $this->db->query("ALTER TABLE plans AUTO_INCREMENT 1");
        $this->db->query("update product set sold_qty =0, qty=-1");
        $this->db->truncate('level_upgrade');
        $this->db->truncate('level_wise_income');
        $this->db->truncate('epin');
        $this->db->truncate('deductions');
        $this->db->truncate('transaction');
        $this->db->truncate('transfer_balance_records');
    }

    public function clear_product_data()
    {
        $this->db->truncate('plans');
        $this->db->truncate('product');
        $this->db->delete('product_categories', array('cat_id !=' => '1'));
        $this->db->query("ALTER TABLE product_categories AUTO_INCREMENT 1");
        $this->db->delete('product_parent_category', array('parent_cat_id !=' => '1'));
        $this->db->query("ALTER TABLE product_parent_category AUTO_INCREMENT 1");
        $this->db->delete('product_sub_category', array('sub_cat_id !=' => '1'));
        $this->db->query("ALTER TABLE product_sub_category AUTO_INCREMENT 1");
        $this->db->truncate('product_variant');

        $dir         = FCPATH . "uploads/products";
        $leave_files = array('default.jpg', 'favicon.ico', 'logo.png', 'load.gif', 'welcome_letter.txt', 'kyc', 'placeholder.png', 'csv_template.csv', 'default_old.jpg', 'upi.png');
            
        foreach (glob("$dir/*") as $file) {
            if (!in_array(basename($file), $leave_files))
                unlink($file);
        }

    }

    public function clear_member_data($flag='')
    {
            $this->db->truncate('admin_expense');
            $this->db->truncate('ads');
            $this->db->truncate('live_meeting');
            $this->db->truncate('zoom_meeting');
            $this->db->truncate('ad_user');
            $this->db->delete('binarydata', array('user_id !=' => config_item('top_id')));
                		debug_log($this->db->last_query());

            $this->db->query("ALTER TABLE binarydata AUTO_INCREMENT 1");
            $this->db->delete('brands', array('brand_id !=' => '1'));
            $this->db->query("ALTER TABLE brands AUTO_INCREMENT 1");
                		debug_log($this->db->last_query());

            $this->db->truncate('coupon');
            $this->db->truncate('coupon_categories');
            $this->db->truncate('crowdfund_queue');
            $this->db->truncate('modal');
            $this->db->truncate('coupon');
            // $this->db->truncate('crm_note');

            $this->db->query("DELETE from deductions where type = 'Registration Fee' and payment_mode = 'epin'");
            $this->db->query("ALTER TABLE deductions AUTO_INCREMENT 1");
    		debug_log($this->db->last_query());

            $this->db->truncate('donations');
            $this->db->truncate('donation_package');
            $this->db->truncate('earning');
            $this->db->truncate('earning_carry_forward');

            $this->db->query("UPDATE epin set status = 'Un-used' where remarks = 'Registration Fee'");
            $this->db->query("UPDATE epin set remarks = '' where remarks = 'Registration Fee'");
    		debug_log($this->db->last_query());
            
            $this->db->truncate('fix_income');
            $this->db->truncate('flexible_income');
            $this->db->truncate('franchisee');
            $this->db->truncate('franchisee_stock');
            $this->db->truncate('franchisee_stock_sale_bill');
            $this->db->truncate('gap_commission_setting');
            $this->db->truncate('investments');
            $this->db->truncate('investment_pack');
            $this->db->truncate('invoice');
            $this->db->truncate('insurance');
            $this->db->truncate('health_insurance');
            //$this->db->delete('level_details', array('userid !=' => config_item('top_id')));  
            $this->db->delete('member', array('id !=' => config_item('top_id')));
            $this->db->query("ALTER TABLE member AUTO_INCREMENT 1");
                		debug_log($this->db->last_query());

            $this->db->delete('member_profile', array('userid !=' => config_item('top_id')));
            $this->db->query("ALTER TABLE member_profile AUTO_INCREMENT 1");
    		debug_log($this->db->last_query());

            $this->db->truncate('news');
            $this->db->delete('other_wallet', array('userid !=' => config_item('top_id')));
            $this->db->query("ALTER TABLE other_wallet AUTO_INCREMENT 1");
    		debug_log($this->db->last_query());

            $this->db->truncate('payout');
            $this->db->truncate('pending_wallet');
            $this->db->truncate('product_sale');
            $this->db->truncate('purchase');
            $this->db->truncate('pv');
            $this->db->truncate('rank_system');
            $this->db->truncate('recharge_entry');
            $this->db->truncate('rewards');
            $this->db->truncate('reward_setting');
            $this->db->truncate('salary');
            $this->db->truncate('my_purchase');
            $this->db->delete('shipping_address', array('userid !=' => config_item('top_id')));
            $this->db->query("ALTER TABLE shipping_address AUTO_INCREMENT 1");
    		debug_log($this->db->last_query());

            $this->db->truncate('staffs');
            $this->db->truncate('staff_designation'); 
            $this->db->truncate('store_images');
            $this->db->truncate('survey');
            $this->db->truncate('survey_user');
            $this->db->truncate('tax_report');
            $this->db->truncate('ticket');
            $this->db->truncate('ticket_reply');
            
            $this->db->delete('wallet', array('userid !=' => config_item('top_id')));
    		debug_log($this->db->last_query());

            $this->db->query("ALTER TABLE wallet AUTO_INCREMENT 1");
    		debug_log($this->db->last_query());

            $this->db->delete('voucher', array('userid !=' => config_item('top_id')));
            debug_log($this->db->last_query());

            $this->db->query("ALTER TABLE voucher AUTO_INCREMENT 1");
            debug_log($this->db->last_query());

            $this->db->truncate('withdraw_request');
            $this->db->truncate('vendor');
            $this->db->truncate('vendor_profile');

            $array = array(
                'left_leg'     => ',',
                'right_leg'    => ',',
                'left_paid'    => ',',
                'right_paid'   => ',',
                'left_unpaid'  => ',',
                'right_unpaid' => ',',
                'flushed'      => ',',
                'first_pair_paid'=> 0,
            );
            
            $this->db->where('user_id', config_item('top_id'));
            $this->db->update('binarydata', $array);
    		debug_log($this->db->last_query());

            $this->db->delete('level', array('userid !=' => config_item('top_id')));
            $this->db->query("ALTER TABLE level AUTO_INCREMENT 1");
    		debug_log($this->db->last_query());

            $array = array(
                'level1'     => 0,
                'level2'     => 0,
                'level3'     => 0,
                'level4'     => 0,
                'level5'     => 0,
                'level6'     => 0,
                'level7'     => 0,
                'level8'     => 0,
                'level9'     => 0,
                'level10'    => 0,
                'level11'    => 0,
                'level12'    => 0,
                'level13'    => 0,
                'level14'    => 0,
                'level15'    => 0,
                'level16'    => 0,
                'level17'    => 0,
                'level18'    => 0,
                'level19'    => 0,
                'level20'    => 0,
            );
            
            $this->db->where('userid', config_item('top_id'));
            $this->db->update('level', $array);
    		debug_log($this->db->last_query());

    		$this->db->delete('level_details', array('userid !=' => config_item('top_id')));
            $this->db->query("ALTER TABLE level_details AUTO_INCREMENT 1");
    		debug_log($this->db->last_query());
            
            $array = array(
                'level1'     => ',',
                'level2'     => ',',
                'level3'     => ',',
                'level4'     => ',',
                'level5'     => ',',
                'level6'     => ',',
                'level7'     => ',',
                'level8'     => ',',
                'level9'     => ',',
                'level10'    => ',',
                'level11'    => ',',
                'level12'    => ',',
                'level13'    => ',',
                'level14'    => ',',
                'level15'    => ',',
                'level16'    => ',',
                'level17'    => ',',
                'level18'    => ',',
                'level19'    => ',',
                'level20'    => ',',
            );
            
            $this->db->where('userid', config_item('top_id'));
            $this->db->update('level_details', $array);
    		debug_log($this->db->last_query());

            $all_levels = array(
                'all_levels'     => ',',
            );

            $this->db->where('userid', config_item('top_id'));
            $this->db->update('level_details', $all_levels);
            debug_log($this->db->last_query());

            $this->db->delete('level_sponsor', array('userid !=' => config_item('top_id')));
            $this->db->query("ALTER TABLE level_sponsor AUTO_INCREMENT 1");
    		debug_log($this->db->last_query());

            $this->db->where('userid', config_item('top_id'));
            $this->db->update('level_sponsor', $array);
    		debug_log($this->db->last_query());

            $this->db->query("UPDATE level_details SET position = NULL,total_downline = 0, total_active = 0, A = 0, B=0, total_a = 0, total_a_active=0, total_b = 0, total_b_active = 0, rank = 'Member',gift_level=0 where userid = ".config_item('top_id'));
    		debug_log($this->db->last_query());

            $array = array(
                'direct_income' => 0,
                'level_income'  => 0,
                'binary_income' => 0,
            );
            $this->db->update('fix_income', $array);
    		debug_log($this->db->last_query());

            $array = array(
                'balance' => 0,
            );
            $this->db->update('wallet', $array);
            $this->db->update('other_wallet', $array);
    		debug_log($this->db->last_query());

            $array = array(
                'sponsor'               => '',
                'position'              => '',
                'signup_package'        => 1,
                'plan_gid'              => 1,
                'usertime'              => time(),
                'A'                     => 0,
                'B'                     => 0,
                'C'                     => 0,
                'D'                     => 0,
                'E'                     => 0,
                'F'                     => 0,
                'G'                     => 0,
                'total_downline'        => 0,
                'total_active'          => 0,
                'total_a'               => 0,
                'total_a_active'        => 0,
                'total_b'               => 0,
                'total_b_active'        => 0,
                'paid_a'                => 0,
                'paid_b'                => 0,
                'mypv'                  => 0,
                'downline_pv'           => 0,
                'total_a_pv'            => 0,
                'total_b_pv'            => 0,
                'paid_a_matching_incm'  => 0,
                'paid_b_matching_incm'  => 0,
                'total_a_matching_incm' => 0,
                'total_b_matching_incm' => 0,
                'my_business'           => 0,
                'total_a_investment'    => 0,
                'total_b_investment'    => 0,
                'topup'                 => 2,
                'gift_level'            => 0,
                'rank'                  => 'Member',
                'new_id'                => '',
                'role'                  => 'Affiliate',
                'wallet_count1'         => 0,
                'voucher_count'         => 0,
                'binary_points'         => 0,
                'temp_wallet'         => 0,
                'temp_voucher'         => 0,
                'pairs_count'         => 0,


            );
            $this->db->update('member', $array);
    		debug_log($this->db->last_query());

            if(config_item('enable_crowdfund')=='Yes'){
                $array = array('gift_level'=> 1,);
                $this->db->update('member', $array);
                $this->db->update('level_details', $array);
            }


            ############### END CLEARNING #############################

            $dir         = FCPATH . "uploads";
            $leave_files = array('default.jpg', 'favicon.ico', 'logo.png', 'load.gif', 'welcome_letter.txt', 'kyc', 'placeholder.png', 'csv_template.csv', 'default_old.jpg', 'upi.png');

            foreach (glob("$dir/*") as $file) {
                if (!in_array(basename($file), $leave_files))
                    unlink($file);
            }

            $dir         = FCPATH . "uploads/kyc";
            
            foreach (glob("$dir/*") as $file) {
                if (!in_array(basename($file), $leave_files))
                    unlink($file);
            }

            $dir         = FCPATH . "uploads/profile";
            
            foreach (glob("$dir/*") as $file) {
                if (!in_array(basename($file), $leave_files))
                    unlink($file);
            }

            $fh = fopen(FCPATH .'.debug.log', 'w' );
            fclose($fh);

            $fh = fopen(FCPATH .'.debug_repo.log', 'w' );
            fclose($fh);

            $fh = fopen(FCPATH .'.wallet.log', 'w' );
            fclose($fh);
			

            $array = array(
                'userid' => (($flag=='')?$this->session->admin_id:1),
                'log'    => 'Database Cleared',
                'ip'     => $this->input->ip_address(),
                'time'   => date('Y-m-d H:i:s'),
            );
            debug_log($array);
            $this->db->insert('logs', $array);
    		debug_log($this->db->last_query());
return;
            if(config_item('enable_crowdfund')=='Yes'){
                $array = array('gift_level'=> 1,);
                $this->db->update('member', $array);
            }
    }

}