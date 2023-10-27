<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Playground extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('earning');
		$this->load->model('downline_model');
		$this->load->model('custom_income');
		$this->load->model('plan_model');
	}

	
	public function index()
	{
		
	}
		
}