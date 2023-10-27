<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of MY_Controller
 */
class MY_Controller extends CI_Controller
{
	function __construct()
    {
        parent::__construct();

        $this->load->model('downline_model');
        $this->load->model('earning');
        $this->load->model('registration_model');
        $this->load->model('plan_model');
        $this->load->model('payments_model');
        //$this->output->enable_profiler(TRUE);
		if((strpos($_SERVER['HTTP_HOST'], 'globalmlmsolution.com') === false)&&$_SERVER["HTTP_HOST"]!='localhost'){
			$this->config->set_item('enable_admin_theme', 'No');
			$this->config->set_item('enable_user_theme', 'No');
		}
		if(config_item('is_theme_change')=='Yes'){
			$query	= $this->db->select(array('theme_name','path'));
			$where	= array('enabled'=>1,'is_active'=>1);
			$query	= $this->db->where($where);
			$query	= $this->db->get('themes_setting');
			$result	= $query->row();
			if($result){
				$this->config->set_item('homepage', $result->path);
			}
		}
		config_item('admin_theme') != '' ? 1 : $this->config->set_item('admin_theme', 'admin/default/base');
		if(config_item('enable_admin_theme')=='Yes'){
			$query	= $this->db->select(array('theme_name','path'));
			$where	= array('enabled'=>1,'is_active'=>1,'type'=>'admin');
			$query	= $this->db->where($where);
			$query	= $this->db->get('admin_theme');
			$result	= $query->row();
			if($result){
				$this->config->set_item('admin_theme', $result->path);
			}
		}
        config_item('member') != '' ? 1 : $this->config->set_item('member', 'member/default/base');
        config_item('member_affiliate') != '' ? 1 : $this->config->set_item('member_affiliate', 'member/default/base');
        config_item('member_customer') != '' ? 1 : $this->config->set_item('member_customer', 'member/customer/base');

		if(config_item('enable_user_theme')=='Yes'){
			$query	= $this->db->select(array('theme_name','path'));
			$where	= array('enabled'=>1,'is_active'=>1,'type'=>'user');
			$query	= $this->db->where($where);
			$query	= $this->db->get('admin_theme');
			$result	= $query->row();
			if($result){
				$this->config->set_item('member', $result->path);
				$this->config->set_item('member_affiliate', $result->path);
				$this->config->set_item('member_customer', $result->path);
			}
		}
    }

}