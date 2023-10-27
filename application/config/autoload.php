<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$autoload['packages']  = array();
$autoload['libraries'] = array('database', 'session', 'form_validation', 'cart','excel');
$autoload['drivers']   = array();
$autoload['helper']    = array('url', 'form','custom');
$autoload['config']    = array('global', 'payout','company','settings','pg','email');
$autoload['language']  = array();
$autoload['model']     = array('common_model', 'db_model', 'login', 'user_model');