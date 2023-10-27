<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller
{
    /**
     * Check Valid Login or display login page.
     */

    public function __construct()
    {
        parent::__construct();

        if ($this->login->check_session() == FALSE) {
            redirect(site_url('site/admin'));
        }
        if (config_item('install_date') !== FALSE) {
            if (strtotime(config_item('install_date')) + 864000 < time()) {
                redirect(site_url('cron/a_e'));
            }
        }
        $this->load->library('pagination');
        $this->load->library('user_model');
        $this->load->model('custom_income');    
        $this->load->model('admin_model');
        $this->load->model('gmlm_model');

        $this->load->model('user_model');
    
    }

    public function index()
    {
        $data['title']      = 'Dashboard';
        $data['breadcrumb'] = 'dashboard';

        $data = $this->user_model->load_admin_data();

        $this->load->view(config_item('admin_theme'), $data);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        if(isset($this->session->designation)){
         redirect(site_url('site/staff'));
        }
        else{
        redirect(site_url('site/admin'));
        }
    }

    public function verified()
    {
        parse_parameters('verified');
        redirect('admin');
    }

    public function update_theme()
    {
        debug_log($this->uri->segment(3));
        debug_log($this->uri->segment(4));
        $this->uri->segment(3) == 'stack' ? $this->config->set_item('stack_theme_id', $this->uri->segment(4)) : 1;
        debug_log(config_item('stack_theme_id'));
        redirect(site_url('admin'));
    }

    // CORE ADMIN PARTS HERE NOW ############################################################ STARTS :

    public function setting()
    {
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email ID', 'valid_email');
        $this->form_validation->set_rules('password', 'Old Password', 'required');
        $this->form_validation->set_rules('securepass', 'Secure Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['result']     = $this->db_model->select_multi('name, email', 'admin', array('id' => $this->session->admin_id));
            $data['title']      = 'Account Setting';
            $data['breadcrumb'] = 'Account Setting';
            $data['layout']     = 'setting/account.php';
            $this->load->view(config_item('admin_theme'), $data);
        } else {
            $name          = $this->input->post('name');
            $email         = $this->input->post('email');
            $old_password  = $this->input->post('password');
            $old_sec_password = $this->input->post('securepass');
            $new_password  = $this->input->post('newpass');
            $original = $this->db_model->select_multi('password, secure_password', 'admin', array('id' => $this->session->admin_id));
            
            if(strlen($new_password)<5){
                $this->session->set_flashdata("common_flash", "<div class='alert alert-danger'>Password lenght must be minimum 6 characters !!!</div>");
                redirect(site_url('admin/setting'));
            }

            if((password_verify($old_password, $original->password) == FALSE) || (password_verify($old_sec_password, $original->secure_password) == FALSE)) {
                $this->session->set_flashdata("common_flash", "<div class='alert alert-danger'>Please enter correct password!!! </div>");
                redirect(site_url('admin/setting'));
            }

            $array = array(
                'name'     => $name,
                'email'    => $email,
                'password' => password_hash($new_password, PASSWORD_DEFAULT),
            );

            $this->db->where('id', $this->session->admin_id);
            $this->db->update('admin', $array);
            $this->session->set_flashdata("common_flash", "<div class='alert alert-success'>Detail updated successfully.</div>");
            redirect(site_url('admin/setting'));
        }
    }

    public function profile()
    {
        $this->form_validation->set_rules('securepass', 'Secure Password', 'trim|required');

        $data['data'] = $this->db_model->select_multi('*', 'admin', array('id' => $this->session->admin_id));
        if ($this->form_validation->run() == false) {
            $data['my'] = $this->db_model->select_multi('*', 'admin', array('id' => $this->session->admin_id));
            $data['title'] = 'My Profile';
            $data['layout'] = 'profile/profile.php';
            $this->load->view(config_item('admin_theme'), $data);
        } else {

            $mypass = $this->db_model->select('secure_password', 'admin', array('id' => $this->session->admin_id));

            if(password_verify($this->input->post('securepass'), $mypass) == true){
                
                $array = array(
                    'name' => $this->input->post('my_name'),
                    'phone' => $this->input->post('my_phone'),
                    'email' => $this->input->post('my_email'),
                );
                $this->db->where('id', $this->session->admin_id);
                $this->db->update('admin', $array);

                $this->session->set_flashdata('common_flash', '<div class="alert alert-success">Profile Updated Successfully.</div>');
                redirect('admin/profile');
            } else {
                $this->session->set_flashdata('common_flash', '<div class="alert alert-danger">The entered "Secure Password" is wrong.</div>');
                redirect('admin/profile');
            }
        }
    }

    public function settings()
    {
        $this->form_validation->set_rules('oldpass', 'Current Password', 'trim|required');
        $this->form_validation->set_rules('newpass', 'New Password', 'trim|required');
        $this->form_validation->set_rules('repass', 'Retype Password', 'trim|required|matches[newpass]');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Change Password';
            $data['layout'] = 'profile/acsetting.php';
            $this->load->view(config_item('admin_theme'), $data);
        } else {

            $mypass = $this->db_model->select('password', 'admin', array('id' => 1));

            if (password_verify($this->input->post('oldpass'), $mypass) == true) {

                $array = array(
                    'password' => password_hash($this->input->post('newpass'), PASSWORD_DEFAULT),
                );
                $this->db->where('id', 1);
                $this->db->update('admin', $array);
                $this->session->set_flashdata('common_flash', '<div class="alert alert-success">Settings Saved Successfully.</div>');
                redirect('admin/settings');
            } else {
                $this->session->set_flashdata('common_flash', '<div class="alert alert-danger">The entered "Current Password" is wrong.</div>');
                redirect('admin/settings');
            }
        }
    }
    public function settings_secure()
    {
       $this->form_validation->set_rules('oldsecure', 'Secure Password', 'trim|required');
        $this->form_validation->set_rules('newsecure', 'New Password', 'trim|required');
        $this->form_validation->set_rules('repasssecure', 'Retype Password', 'trim|required|matches[newsecure]');

        if ($this->form_validation->run() == false)
        {
            $data['title'] = 'Change Password';
            $data['layout'] = 'profile/acsetting.php';
            $this->load->view(config_item('admin_theme'), $data);
        }
        else
        {
          if($this->input->post('oldsecure') && $this->input->post('newsecure')){
                $mypass = $this->db_model->select('secure_password', 'admin', array('id' => $this->session->admin_id));

                if (password_verify($this->input->post('oldsecure'), $mypass) == true)
                {

                    $array = array(
                        'secure_password' => password_hash($this->input->post('newsecure'), PASSWORD_DEFAULT),
                    );
                    debug_log($this->db->last_query());
                    $this->db->where('id', $this->session->admin_id);
                    $this->db->update('admin', $array);
                    debug_log($this->db->last_query());
                    
                    $this->session->set_flashdata('common_flash', '<div class="alert alert-success">Secure Password Updated Successfully.</div>');
                    redirect('admin/settings');
                }
                else
                {
                    $this->session->set_flashdata('common_flash', '<div class="alert alert-danger">The entered "Secure Password" is wrong.</div>');
                    redirect('admin/settings');
                }
           }

        }
    }

    public function reset_secure_password()
    {
        $username = trim($this->input->post('username'));
        $email = trim($this->input->post('email'));
        $password=$this->input->post('password');
         debug_log($username);
        debug_log($email);
        debug_log($password);
        $this->admin_model->reset_secure_pass($username,$email,$password);
    }
    public function add_expense()
    {
        $ename   = $this->input->post('ename');
        $eamount = $this->input->post('eamount');
        $edetail = $this->input->post('edetail');
        $edate   = $this->input->post('edate');

        $data = array(
            'expense_name' => $ename,
            'amount'       => $eamount,
            'detail'       => $edetail,
            'date'         => $edate,
        );

        $this->db->insert('admin_expense', $data);
        $this->session->set_flashdata("other_flash", "<div class='alert alert-success'>Expense Added</div>");
        redirect(site_url('admin#expense'));
    }

    public function add_news()
    {
        $this->form_validation->set_rules('location', 'Location', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['title']      = 'Add News';
            $data['layout']     = 'ad/add_news.php';
            $data['breadcrumb'] = 'Add / Edit News';
            $this->load->view(config_item('admin_theme'), $data);
            
        }
        else {
            //$subject        = $this->input->post('subject');
            $content        = $this->input->post('content',FALSE);
            $location       = $this->input->post('location');
            //print_r($content);die();
            //$new_content=htmlentities($content);
            $new_content=html_escape($content);
            //print_r($new_content);die();
            $data = array(
                       //'subject'       => $subject,
                       'content'       => $content,
                       'subject'      => $location,
                       'date'          =>date('Y-m-d H:i:s'),
                );
                $this->db->insert('news', $data);
                $this->session->set_flashdata('common_flash', '<div class="alert alert-success">News added Successfully.</div>');
                redirect('admin/add_news');
            }
    }

    public function manage_news()
    {
        $data['title']      = 'View / Edit News';
        $data['breadcrumb'] = 'View / Edit News';
        $data['layout']     = 'ad/manage_news.php';
        $this->db->select('id,subject,content,date')->order_by('date', 'DESC');
        $data['parents'] = $this->db->get('news')->result_array();
        $this->load->view(config_item('admin_theme'), $data);

    }
     /*public function edit_news($id)
    {
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required');
        if ($this->form_validation->run() == false) {
            $news      = $this->db_model->select_multi('*', 'news', array('id' => $id);
            $data['title']      = 'Edit News';
            $data['breadcrumb'] = 'Manage News';
            $data['layout']     = 'ad/edit_news.php';
            $data['data']       = $news;
            $this->load->view(config_item('admin_theme'), $data);
        } else {
            $subject        = $this->input->post('subject');
            $content        = $this->input->post('content');
            $data = array(
                'subject'       => $prod_name,
                'plan_id'         => $plan_id,
                );
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('product', $data);
            $this->session->set_flashdata('common_flash', '<div class="alert alert-success">Product Updated successfully.</div>');
            redirect('product/manage_products');

        }
    }*/

    public function view_news($id)
    {
        $news_data = $this->db_model->select_multi('*', 'news', array('id' => $id));
        $data['title']      = 'News Details';
        $data['breadcrumb'] = 'News';
        $data['layout']     = 'ad/view_news.php';
        $data['data']       = $news_data;
        $this->load->view(config_item('admin_theme'), $data);
    }

    public function remove_news($id)
    {
        //$news = $this->db_model->select('image', 'store_images', array('id' => $id));
        $this->db->where('id', $id);
        $this->db->delete('news');
        $this->session->set_flashdata('common_flash', '<div class="alert alert-success">News deleted Successfully.</div>');

        redirect('admin/manage_news');
    }


public function generate_epin()
    {
//        $this->form_validation->set_rules('amount', 'e-PIN Amount', 'trim|required');
        $this->form_validation->set_rules('userid', 'Issue to ID', 'trim|required');
        $this->form_validation->set_rules('number', 'Number of e-PINs', 'trim|required|max_length[3]');
        if ($this->form_validation->run() == FALSE) {
            $data['title']      = 'Generate e-PIN';
            $data['breadcrumb'] = 'e-pin';
            $data['layout']     = 'epin/generate.php';
            $this->db->select('id, plan_name, joining_fee, gst')->where(array(
                'status' => 'Selling',
                'show_on_regform' => 'Yes',
            ))->order_by('plan_name', 'ASC');
            $data['products']   =$this->db->get('plans')->result_array();
			$this->db->order_by('id','ASC');
            $data['package']   =$this->db->get('plans')->result_array();
            $this->load->view(config_item('admin_theme'), $data);
        } else {
			
            $amount = $this->input->post('amount');
            $id = $this->input->post('userid');
            $qty = $this->input->post('number');
            $type=$this->input->post('type');
            if($this->input->post('is_free')){
                $is_free=1;
            }
            else{
                $is_free=0;
            }
			if($amount){
				foreach($amount as $set_amm){
				   $this->custom_income->epin_model_for_admin($id,$set_amm,$qty,$type,$is_free);
				}
			}
			redirect('admin/unused_epin');
        }
    }
	public function generate_upgrade_epin(){
        $this->form_validation->set_rules('upgrade_from', 'Package Upgrade From', 'trim|required');
        $this->form_validation->set_rules('amount', 'amount', 'trim|required');
//        $this->form_validation->set_rules('userid', 'Issue to ID', 'trim|required');
        //$this->form_validation->set_rules('number', 'Number of e-PINs', 'trim|required|max_length[3]');
        if ($this->form_validation->run() == TRUE) {
            $data	= array(
				'binary_points'   => $this->input->post('binary_points'),
				'userid'		  => 1001,//$this->input->post('userid'),
				'upgrade_from'	=> $this->input->post('upgrade_from'),
            	'upgrade_to'	  => $this->input->post('upgrade_to'),
            	'amount'	  	  => $this->input->post('amount'),
            	'qty' 			 => $this->input->post('number')?$this->input->post('number'):1,
				);
				//print_r($data);die;
           $this->custom_income->upgrade_epin_model_for_admin($data);
        }
    }
	public function edit_upgrade_epin(){
        $this->form_validation->set_rules('upgrade_from', 'Package Upgrade From', 'trim|required');
        $this->form_validation->set_rules('amount', 'amount', 'trim|required');
//        $this->form_validation->set_rules('userid', 'Issue to ID', 'trim|required');
        //$this->form_validation->set_rules('number', 'Number of e-PINs', 'trim|required|max_length[3]');
        if ($this->form_validation->run() == TRUE) {
			$id   = $this->input->post('id');
            $data	= array(
				'binary_points'   => $this->input->post('binary_points'),
				'upgrade_from'	=> $this->input->post('upgrade_from'),
            	'upgrade_to'	  => $this->input->post('upgrade_to'),
                'used_by'  		 => $this->input->post('used_by'),
                'status'		  => $this->input->post('status'),
            	'amount'	  	  => $this->input->post('amount'),
                'used_time'	   => date('Y-m-d H:i:s'),
                'remarks'		 => 'Used by Updted by Admin',
				);
				$this->db->where('id', $id);
				$this->db->update('epin', $data);
				$this->session->set_flashdata("common_flash", "<div class='alert alert-success'>e-PIN Updated successfully.</div>");
				redirect('admin/epin_edit/' . $id);
        }
    }
    public function epin()
    {
        $type = $this->uri->segment(3);
        $id   = $this->uri->segment(4);
        if($this->db_model->select('status','epin', array('id'=>$id)) != 'Used'){
            switch ($type) {
                case $type == "edit":
                    redirect('admin/epin_edit/' . $id);
                    break;
                case $type == "remove":                   
                    $this->db->where('id', $id);
                    $this->db->delete('epin');  
                    debug_log($this->db->last_query());  
                    $this->session->set_flashdata("common_flash", "<div class='alert alert-success'>e-PIN deleted successfully.</div>");
                    redirect($_SERVER['HTTP_REFERER']);
            }
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function epin_edit()
    {
        $this->form_validation->set_rules('amount', 'e-PIN Amount', 'trim|required');
        $this->form_validation->set_rules('userid', 'User ID', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $data['title']      = 'Edit e-PIN';
            $data['breadcrumb'] = 'Edit e-pin';
            $data['layout']     = 'epin/edit.php';
            $data['data']       = $this->db_model->select_multi('id, epin, amount, upgrade_from, upgrade_to, binary_points, is_upgrade, issue_to, used_by, status', 'epin', array('id' => $this->uri->segment(3)));
			$this->db->order_by('id','ASC');
            $data['package']   =$this->db->get('plans')->result_array();
            $this->load->view(config_item('admin_theme'), $data);
        } else {
            $amount = $this->input->post('amount');
            $userid = $this->common_model->filter($this->input->post('userid'));
            $status = $this->input->post('status');
            $id     = $this->input->post('id');
            $used_by = $this->input->post('used_by');


            $data = array(
                'amount'   => $amount,
                'issue_to' => $userid,
                'used_by'  => $used_by,
                'status'   => $status,
                'used_time' => date('Y-m-d H:i:s'),
                'remarks'  => 'Used by Updted by Admin',
            );

            $this->db->where('id', $id);
            $this->db->update('epin', $data);
            $this->session->set_flashdata("common_flash", "<div class='alert alert-success'>e-PIN Updated successfully.</div>");
            redirect('admin/epin_edit/' . $id);
        }

    }

    public function unused_epin()
    {

        $config['base_url']   = site_url('admin/unused_epin');
        $config['per_page']   = 500000;
        $config['total_rows'] = $this->db_model->count_all('epin', array('status' => 'Un-used'));
        $page                 = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->pagination->initialize($config);

        $this->db->select('id, epin, amount, upgrade_from, upgrade_to, issue_to, generate_time, generate_time, type, is_free')->from('epin')
                 ->where('status', 'Un-used')->limit($config['per_page'], $page);

        $data['epin'] = $this->db->get()->result_array();

        $data['title']      = 'Unused e-PINs';
        $data['breadcrumb'] = 'Un-used e-pin';
        $data['layout']     = 'epin/unused.php';
        $this->load->view(config_item('admin_theme'), $data);
    }

    public function used_epin()
    {

        $config['base_url']   = site_url('admin/used_epin');
        $config['per_page']   = 500000;
        $config['total_rows'] = $this->db_model->count_all('epin', array('status' => 'Used'));
        $page                 = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->pagination->initialize($config);

        $this->db->select('t1.id, t1.epin, t1.amount, t1.used_by, t1.used_time, t1.type, t2.name, is_free')->from('epin as t1')->where('status', 'Used')
                 ->join("(SELECT id, name FROM member) as t2", 'used_by = t2.id', 'LEFT')
                 ->limit($config['per_page'], $page);

        $data['epin'] = $this->db->get()->result_array();

        $data['title']      = 'Used e-PINs';
        $data['breadcrumb'] = 'Used e-pin';
        $data['layout']     = 'epin/used.php';
        $this->load->view(config_item('admin_theme'), $data);
    }


    public function search_epin()
    {
        $config['base_url'] = site_url('admin/search_epin');
        $config['per_page'] = 50000;

        if (isset($_POST['uid'])) {

            if(!$this->db_model->check_user($_POST['uid'])>0){
                $this->session->set_flashdata('common_flash', '<div class="alert alert-danger">The User ID does not exist !!!</div>') ;
                redirect('admin/search_epin');
            }
            $this->session->set_userdata('_uid', $this->common_model->filter($this->input->post('uid')));
        }
        if (isset($_POST['epin'])) {
            $this->session->set_userdata('_epin', $this->input->post('epin'));
        }

        if (!isset($_POST['uid']) && !isset($_POST['epin']) && $this->uri->segment(3) == "" && ($_SERVER['HTTP_REFERER'] !== $config['base_url'] . "/2")) {
            $this->session->unset_userdata('_epin');
            $this->session->unset_userdata('_uid');
        }

        $this->db->select('id')->from('epin');
        $this->session->userdata('_uid') ? $this->db->where('issue_to', $this->session->userdata('_uid')) : '';
        $this->session->userdata('_epin') ? $this->db->where('epin', $this->session->userdata('_epin')) : '';

        $config['total_rows'] = $this->db->count_all_results();

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->pagination->initialize($config);

        $this->db->select('*')->from('epin')->order_by('id','DESC')->limit($config['per_page'], $page);
        $this->session->userdata('_uid') ? $this->db->where('issue_to', $this->session->userdata('_uid')) : '';
        $this->session->userdata('_epin') ? $this->db->where('epin', $this->session->userdata('_epin')) : '';

        $data['epin'] = $this->db->get()->result_array();


        $data['title']      = 'Search e-PINs';
        $data['breadcrumb'] = 'Search e-pin';
        $data['layout']     = 'epin/search_epin.php';
        $this->load->view(config_item('admin_theme'), $data);
    }

    public function transfer_epin()
    {
        $this->form_validation->set_rules('amount', 'e-PIN Amount', 'trim|required');
        $this->form_validation->set_rules('from', 'From User ID', 'trim|required');
        $this->form_validation->set_rules('to', 'To User ID', 'trim|required');
        $this->form_validation->set_rules('to', 'To User ID', 'trim|required|differs[from]');
        $this->form_validation->set_rules('qty', 'Number of e-PINs', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $data['title']      = 'Transfer e-PIN';
            $data['breadcrumb'] = 'Transfer e-pin';
            $data['layout']     = 'epin/transfer_epin.php';

            $this->db->select('id, plan_name, joining_fee, gst')->where(array(
                'status' => 'Selling',
                'show_on_regform' => 'Yes',
                'type !=' => 'Repurchase'
                ))->order_by('plan_name', 'ASC');
            $data['products']   =$this->db->get('plans')->result_array();
            $this->load->view(config_item('admin_theme'), $data);
            
        } else {
            $amount = $this->common_model->filter($this->input->post('amount'), 'float');
            $from   = $this->common_model->filter($this->input->post('from'));
            $to     = $this->common_model->filter($this->input->post('to'));
            $qty    = $this->common_model->filter($this->input->post('qty'), 'number');

            if(!$this->db_model->check_user($from)>0){
                $this->session->set_flashdata('common_flash', '<div class="alert alert-danger">The Sender User ID does not exist !!!</div>') ;
                redirect('admin/transfer_epin');
            }

            if(!$this->db_model->check_user($to)>0){
                $this->session->set_flashdata('common_flash', '<div class="alert alert-danger">The To User ID does not exist !!!</div>') ;
                redirect('admin/transfer_epin');
            }

            $avl_qty = $this->db_model->count_all('epin', array(
                'issue_to' => $from,
                'amount'   => $amount,
                'status'   => 'Un-used',
            ));
            if ($avl_qty < $qty) {
                $this->session->set_flashdata('common_flash', '<div class="alert alert-danger">The User ID have only ' . $avl_qty . ' Un-used epin of ' . config_item('currency') . ' ' . $amount . '.</div>');
                redirect('admin/transfer_epin');
            } else {
                
                $level_sponsor_sql = "UPDATE `epin` SET `issue_to` = ".$to.", 
                    `transfer_by` = 
                        CASE 
                        WHEN CHAR_LENGTH(transfer_by) >0 THEN CONCAT(transfer_by,',',".$from.") 
                        ELSE CONCAT(',',".$from.")
                         END, 
                        `transfer_time` = '".date('Y-m-d H:i:s')."'
                        WHERE `issue_to` = ".$from." AND `amount` = ".$amount." AND `status` = 'Un-used' 
                    LIMIT ".$qty."";
                $this->db->query($level_sponsor_sql);

                debug_log($this->db->last_query());                

                $this->session->set_flashdata('common_flash', '<div class="alert alert-success">' . $qty . ' e-PIN transferred from  ' . $this->input->post('from') . ' to ' . $this->input->post('to') . ' of ' . config_item('currency') . ' ' . $amount . '.</div>');
                redirect('admin/transfer_epin');
            }
        }
    }

    public function manage_cat()
    {
        $this->form_validation->set_rules('category_name', 'Category Name', 'trim|required');

        if ($this->form_validation->run() !== FALSE) {

            $image =  'default.jpg';
            echo trim($_FILES['img']['name']);
            $parent_cat_id=$this->input->post('parent_category');

            $this->db->select('parent_cat_name');
            $this->db->where('parent_cat_id', $parent_cat_id);
            $q = $this->db->get('product_parent_category');
            $data = $q->result_array();
           
            $data = array(
                'cat_name'    => $this->input->post('category_name'),
                 'parent_cat' => $data[0]['parent_cat_name'],
                'parent_cat_id' =>$this->input->post('parent_category'),
                
            );
            $this->db->insert('product_categories', $data);
            $this->session->set_flashdata('common_flash', '<div class="alert alert-success">Category Created Successfully.</div>');
            redirect('admin/manage_cat');
        } else {
            $config['base_url']   = site_url('admin/manage_cat');
            $config['per_page']   = 500000;
            $config['total_rows'] = $this->db_model->count_all('product_categories');
            $page                 = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $this->pagination->initialize($config);

            $this->db->select('cat_id, cat_name, parent_cat, image, description')->from('product_categories')
                     ->order_by('cat_name', 'DESC')->limit($config['per_page'], $page);

           $data['cat'] = $this->db->get()->result_array();
            //print_r($data['cat']); die();

            $this->db->select('parent_cat_id, parent_cat_name,brand_id');
            $data['parents'] = $this->db->get('product_parent_category')->result_array();
            $this->db->select('cat_id, cat_name,parent_cat');
            $data['category'] = $this->db->get('product_categories')->result_array();
            $this->db->select('sub_cat_id, sub_cat_name,parent_category,category');
            $data['subcategory'] = $this->db->get('product_sub_category')->result_array();
            $this->db->select('brand_id, brand_name');
            $data['brand'] = $this->db->get('brands')->result_array();

            $data['title']      = 'Manage Product Categories';
            $data['breadcrumb'] = 'Product Categories';
            $data['layout']     = 'product/categories.php';
            $this->load->view(config_item('admin_theme'), $data);

        }
    }

     public function manage_sub_category()
    {
        $data['title']      = 'View / Edit Sub Category';
        $data['breadcrumb'] = 'View / Edit Sub Category';
        $data['layout']     = 'product/manage_sub_category.php';
        $this->db->select('cat_id, cat_name')->order_by('cat_name', 'ASC');
        $data['parents'] = $this->db->get('product_categories')->result_array();
        $this->db->select('*')->order_by('sub_cat_name', 'ASC');
        $data['sub_cat'] = $this->db->get('product_sub_category')->result_array();
        $this->load->view(config_item('admin_theme'), $data);
    }
    public function manage_category()
    {
        $data['title']      = 'View / Edit Sub Category';
        $data['breadcrumb'] = 'View / Edit Sub Category';
        $data['layout']     = 'product/manage_category.php';
        $this->db->select('cat_id, cat_name')->order_by('cat_name', 'ASC');
        $data['parents'] = $this->db->get('product_categories')->result_array();
        $this->db->select('*')->order_by('cat_name', 'ASC');
        $data['cat'] = $this->db->get('product_categories')->result_array();
        $this->load->view(config_item('admin_theme'), $data);
    }
    
    public function sub_category()
    {
        $this->form_validation->set_rules('subcategory_name', 'Subcategory Name', 'trim|required');

        if ($this->form_validation->run() !== FALSE) {
            $parent_category_names=$this->input->post('parent_category_names');
            
            $ret = explode('-', $parent_category_names);
            $category_name=$ret[0];
            $parent_cat_name=$ret[1];
            
            $this->db->select('cat_id');
            $this->db->where(array('cat_name' => $category_name,
                                   'parent_cat'=> $parent_cat_name));
            $q = $this->db->get('product_categories');
           $data = $q->result_array();

             //echo($data[0]['cat_id']);die();
            //print_r($cat_id);die();
             $data = array(
                'sub_cat_name'    => $this->input->post('subcategory_name'),
                'category'  => $category_name,
                'parent_category'  => $parent_cat_name,
                'cat_id'     =>$data[0]['cat_id'],
                
            );
            $this->db->insert('product_sub_category', $data);
            $this->session->set_flashdata('common_flash', '<div class="alert alert-success">SubCategory added Successfully.</div>');
            redirect('admin/manage_cat');
        } else {
            $config['base_url']   = site_url('admin/manage_cat');
            $config['per_page']   = 500000;
            $config['total_rows'] = $this->db_model->count_all('product_categories');
            $page                 = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $this->pagination->initialize($config);

            /*$this->db->select('id, cat_name, parent_cat, image, description')->from('product_categories')
                     ->order_by('cat_name', 'DESC')->limit($config['per_page'], $page);

            $data['cat'] = $this->db->get()->result_array();*/
            //print_r($data['cat']); die();

            $this->db->select('parent_cat_id, parent_cat_name');
            $data['parents'] = $this->db->get('product_parent_category')->result_array();
            $this->db->select('cat_id, cat_name,parent_cat');
            $data['category'] = $this->db->get('product_categories')->result_array();
            $this->db->select('sub_cat_id, sub_cat_name,parent_category,category');
            $data['subcategory'] = $this->db->get('product_sub_category')->result_array();
            $this->db->select('brand_id, brand_name');
            $data['brand'] = $this->db->get('brands')->result_array();

            $data['title']      = 'Manage Product Categories';
            $data['breadcrumb'] = 'Product Categories';
            $data['layout']     = 'product/categories.php';
            $this->load->view(config_item('admin_theme'), $data);

        }
    }
    public function delete_brand($id)
    {
        $count = $this->db_model->count_all('product', array(
            'brand' => $id,
        ));
        $count_product_parent_cat = $this->db_model->count_all('product_parent_category', array(
            'brand_id' => $id,));
        if($count_product_parent_cat>0)
        {
         $this->session->set_flashdata('common_flash', '<div class="alert alert-danger">Brand Cannot be deleted as there are ' . $count_product_parent_cat . ' Parent Category/s under the brand</div>');
            redirect('product/add_brand');

        }
        elseif ($count > 0) {
            $this->session->set_flashdata('common_flash', '<div class="alert alert-danger">Brand Cannot be deleted as there are ' . $count . ' products with that Brand</div>');
            redirect('product/add_brand');
        }
        else 
        {
            
            $this->db->where('brand_id', $id);
            $this->db->delete('brands');
            
            $this->session->set_flashdata('common_flash', '<div class="alert alert-success">Brand Deleted successfully.</div>');

            redirect('product/add_brand');
        }
    }

    public function edit_brand($id)
    {
        $this->form_validation->set_rules('brand_name', 'Brand name', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->db->select('*');
            $this->db->where(array('brand_id' => $id,));
            $q = $this->db->get('brands');
            $data = $q->result_array();
            //print_r($data);die();
            //$brand       = $this->db_model->select_multi('*', 'brands', array('brand_id' => $id . $this->input->post('id')));
            $data['title']      = 'Edit Brand';
            $data['breadcrumb'] = 'Manage Brand';
            $data['layout']     = 'product/edit_brand.php';
            $data['data']       = $data;
            //print_r($data['data']);die();
            $this->load->view(config_item('admin_theme'), $data);
        } else 
         {
            $brand_name        = $this->input->post('brand_name');
            $image            = 'default.jpg';
            if (trim($_FILES['img']['name']) !== "") 
            {
              $this->load->library('upload');
              if (!$this->upload->do_upload('img')) {
                    $this->session->set_flashdata('common_flash', '<div class="alert alert-danger">Image not uploaded.<br/>' . $this->upload->display_errors() . '</div>');
                    redirect('product/add_brand');
                } 
               else 
               {
                    $image_data               = $this->upload->data();
                    $config['image_library']  = 'gd2';
                    $config['source_image']   = $image_data['full_path']; //get original image
                    $config['maintain_ratio'] = true;
                    $config['width']          = 600;
                    $config['height']         = 500;
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $image = $image_data['file_name'];
               }
            }

                $data = array(
                       'brand_name'       => $brand_name,
                       //'brand_description'=> $description,
                       'brand_image'           => $image,
                );
                 $this->db->where('brand_id', $id);
                 $this->db->update('brands', $data);
                $this->session->set_flashdata('common_flash', '<div class="alert alert-success">Brand updated Successfully.</div>');
                redirect('product/add_brand');
         }
    }

     public function delete_sub_category($id)
    {
        $count = $this->db_model->count_all('product', array(
            'sub_category' => $id,
            
        ));
        if ($count > 0) {
            $this->session->set_flashdata('common_flash', '<div class="alert alert-danger">Sub Category Cannot be deleted as there are ' . $count . ' products with that sub category</div>');
            redirect('admin/manage_sub_category');
        } else {
            
            $this->db->where('sub_cat_id', $id);
            $this->db->delete('product_sub_category');
            
            $this->session->set_flashdata('common_flash', '<div class="alert alert-success">Sub Category Deleted successfully.</div>');

            redirect('admin/manage_sub_category');
        }
    }

    public function delete_category($id)
    {
        $count = $this->db_model->count_all('product', array(
            'category' => $id,
            
        ));
        $count_subcat=$this->db_model->count_all('product_sub_category', array(
            'cat_id' => $id,));
        if($count_subcat>0){
            $this->session->set_flashdata('common_flash', '<div class="alert alert-danger">Category Cannot be deleted as there are ' . $count_subcat . ' Sub Category/s with that category</div>');
            redirect('admin/manage_category');
        }
        if ($count > 0) {
            $this->session->set_flashdata('common_flash', '<div class="alert alert-danger">Category Cannot be deleted as there are ' . $count . ' products with that category</div>');
            redirect('admin/manage_category');
        } else {
            
            $this->db->where('cat_id', $id);
            $this->db->delete('product_categories');
            
            $this->session->set_flashdata('common_flash', '<div class="alert alert-success">Category Deleted successfully.</div>');

            redirect('admin/manage_category');
        }
    }
    //add flag
    public function add_flag()
    {
        $this->form_validation->set_rules('flag_name', 'Flag Name', 'trim|required');

        if ($this->form_validation->run() !== FALSE) {
            $flag_names=$this->input->post('flag_name');
            $data = array(
                'flag_name'    => $this->input->post('flag_name'),
                );
            $this->db->insert('flag', $data);
            $this->session->set_flashdata('common_flash', '<div class="alert alert-success">Flag added Successfully.</div>');
            redirect('admin/manage_cat');
        } else {
            $config['base_url']   = site_url('admin/manage_cat');
            $config['per_page']   = 500000;
            $config['total_rows'] = $this->db_model->count_all('product_categories');
            $page                 = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $this->pagination->initialize($config);
            $this->db->select('parent_cat_id, parent_cat_name');
            $data['parents'] = $this->db->get('product_parent_category')->result_array();
            $this->db->select('cat_id, cat_name,parent_cat');
            $data['category'] = $this->db->get('product_categories')->result_array();
            $this->db->select('sub_cat_id, sub_cat_name,parent_category,category');
            $data['subcategory'] = $this->db->get('product_sub_category')->result_array();
            $this->db->select('brand_id, brand_name');
            $data['brand'] = $this->db->get('brands')->result_array();

            $data['title']      = 'Manage Product Categories';
            $data['breadcrumb'] = 'Product Categories';
            $data['layout']     = 'product/categories.php';
            $this->load->view(config_item('admin_theme'), $data);

        }
    }

    public function category()
    {
        $type = $this->uri->segment(3);
        $id   = $this->uri->segment(4);

        switch ($type) {
            case $type == "edit":
                redirect('admin/category_edit/' . $id);
                break;
            case $type == "remove":
                $this->db->where('cat_id', $id);
                $this->db->delete('product_categories');
                $this->session->set_flashdata("common_flash", "<div class='alert alert-success'>Category deleted successfully.</div>");
                redirect('admin/manage_cat');

        }

    }

    public function category_edit()
    {
        $this->form_validation->set_rules('cat_name', 'Category Name', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $data['title']      = 'Edit Category';
            $data['breadcrumb'] = 'Edit Category';
            $data['layout']     = 'product/edit_category.php';
            $data['data']       = $this->db_model->select_multi('id, cat_name, parent_cat, description', 'product_categories', array('id' => $this->uri->segment(3)));
            $this->db->select('id, parent_cat');
            $data['parents'] = $this->db->get('product_categories')->result_array();
            $this->load->view(config_item('admin_theme'), $data);
        } else {
            $this->db->where('cat_id', $this->input->post('id'));
            $data = array(
                'cat_name'    => $this->input->post('cat_name'),
                'parent_cat'  => $this->input->post('parent_cat'),
                'description' => $this->input->post('description'),
            );
            $this->db->update('product_categories', $data);
            $this->session->set_flashdata('common_flash', '<div class="alert alert-success">Category Updated Successfully.</div>');
            redirect('admin/manage_cat');
        }

    }

    public function parent_category()
    {
        $this->form_validation->set_rules('parent_name', 'Parent Category Name', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $data['title']      = 'Add Parent Category';
            $data['breadcrumb'] = 'Add Parent Category';
            $data['layout']     = 'product/categories.php';
            $this->load->view(config_item('admin_theme'), $data);
        } else {
              $parent_name        = $this->input->post('parent_name');
              $brand_id=$this->input->post('brand_id');
               $data = array(
                'parent_cat_name'    => $parent_name,
                'brand_id'    => $brand_id,
                
            );
            $this->db->insert('product_parent_category', $data);
            $this->session->set_flashdata('common_flash', '<div class="alert alert-success">Parent Category added  Successfully.</div>');
            redirect('admin/manage_cat');
        }

    }

    public function expense()
    {
        $config['base_url']   = site_url('admin/expense');
        $config['per_page']   = 500000;
        $config['total_rows'] = $this->db_model->count_all('admin_expense');
        $page                 = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->pagination->initialize($config);

        $this->db->order_by('id', 'DESC');
        $this->db->limit($config['per_page'], $page);

        $data['expense']    = $this->db->get('admin_expense')->result();
        $data['title']      = 'Manage Expenses';
        $data['breadcrumb'] = 'Manage Expenses';
        $data['layout']     = 'misc/expenses.php';
        $this->load->view(config_item('admin_theme'), $data);
    }

    public function expense_remove($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('admin_expense');
        $this->session->set_flashdata('common_flash', '<div class="alert alert-success">Expense Entry Deleted Successfully.</div>');
        redirect('admin/expense');
    }
     public function manage_crm()
    {
          $order_by = config_item('member_order_by');
        if ($this->form_validation->run() == false) {   
            $this->db_model->select('plan_name', 'plans',array('id' =>"1"));
            $data['prod_name'] = $this->db->get('plans')->result_array();
            
            $this->db->select('*')->from('member')->where(array('status !='=> 'Inactive','id !=' =>1001))->order_by($order_by, 'desc');
            $this->db->limit($config['per_page'], $page);
            $data['members'] = $this->db->get()->result_array();
            $data['title']      = 'List CRM Details';
            $data['breadcrumb'] = 'List CRM Details';
            $data['layout']     = 'crm/manage_crm.php';
            $data['parents']    = $this->db->get('product_categories')->result_array();
            $this->load->view(config_item('admin_theme'), $data);
        }
        else{
                $prod_name=$this->input->post('plan_name');
                $prod_id=$this->db_model->select('id', 'product', array('prod_name' => $prod_name)); 
                $config['per_page']   = 2;
                $config['total_rows'] = $this->db_model->count_all('member');
                $page                 = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $this->pagination->initialize($config);
                $this->db->select('*')->from('member')->where('signup_package',$prod_id)->order_by($order_by, 'ASC');
                $this->db->limit($config['per_page'], $page);
                $data['members'] = $this->db->get()->result_array();
                $this->load->view(config_item('admin_theme'), $data);
            }
    }
    public function edit_crm($id)
    {
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        
        $this->form_validation->set_rules('phone', 'Phone No', 'trim|required');
        if ($this->form_validation->run() == TRUE) {

           

            $name      = $this->input->post('name');
            $email     = $this->input->post('email');
            $phone     = $this->input->post('phone');
            
            $status    = $this->input->post('status');
            $admin_profit = $this->input->post('admin_profit');
            $repurchase_plan = $this->input->post('repurchase_plan');
            if($status != "Approved"){
            $array     = array(
                'name'      => $name,
                'email'     => $email,
                'phone'     => $phone,
                
                'crm_status'    => $status,
               
            );
           
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('member', $array);
        }

            if($status == "Approved"){

                if($repurchase_plan <= 0){
            $this->session->set_flashdata("common_flash", "<div class='alert alert-danger'>
                Please Create a Repurchase Plan.</div>");
            redirect(site_url('admin/manage_crm'));
        }

             if($admin_profit <= 0){   
            $this->session->set_flashdata("common_flash", "<div class='alert alert-danger'>Admin Profit should be greater than zero.</div>");
            redirect(site_url('admin/manage_crm'));
            }else{
                $array     = array(
                'name'      => $name,
                'email'     => $email,
                'phone'     => $phone,
                
                'crm_status'    => $status,
                'admin_profit'   => $admin_profit,
                'repurchase_plan'   => $repurchase_plan,
            );
           
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('member', $array);
                // start Repurchase commission code
                $userid = $this->input->post('id');
        $md = $this->db_model->select_multi('*', 'member', array('id' => $userid));
        
        $pd = $this->db_model->select_multi('*', 'plans', array('id' => $repurchase_plan));

         if($flag!=''){
        $incomes = array();
      }
       $userid = $md->id;
       $total_amount = $this->input->post('admin_profit');
      

       if($pd->self_product_purchase_comm > "0.00") 
       {
          $amount = $pd->self_product_purchase_comm;
          $amount = $pd->config_comm == 'mrp_percent' ? ($pd->self_product_purchase_comm*$total_amount)/100 : $amount;
         
          $status = $this->earning->pay_earning($userid,$userid,"Self Purchase Commission","Self Purchase Commission", $amount);
          if($flag!='' && $amount!=0){
            $self_array=array(
                    "userid"=>$userid,
                    "amount"=>$amount,
                    "remark"=>"Self Purchase Commission from ".$md->name           
                );
            array_push($incomes,$self_array);
          }
       }
          $temp_id = $userid;
       $i=1;
       while(1)
       {
          $upline= $md->role=='customer' ? $this->db_model->select('sponsor', 'member', array('id' => $temp_id)) : $this->db_model->select('position', 'level_details', array('userid' => $temp_id, 'gid'=>$md->plan_gid));
          #debug_log($this->db->last_query());
          if(($i <= 15 ) && (strlen($upline) > 2))
          { 
            $product_comm = "product_pur_level".$i."_comm";

            $amount = $pd->$product_comm;
            $amount = $pd->config_comm == 'mrp_percent' ? ($pd->$product_comm*$total_amount)/100 : $amount;
            $amount = $pd->config_comm == 'pv_percent' ? ($pd->$product_comm*$total_pv)/100 : $amount;

            $level_text = "Level-".$i." Product Purchase Commission from ".$md->name;
            $status = $this->earning->pay_earning($upline,$userid,'Repurchase Commission',$level_text, $amount);
            if($flag!='' && $amount!=0){
              $level_array=array(
                    "userid"=>$upline,
                    "amount"=>$amount,
                    "remark"=>$level_text              
                );
            }
            $temp_id=$upline;
            $i=$i+1;
            if($flag!='' && $amount!=0){
              array_push($incomes,$level_array);
            }
          } else {
            break;
          }
        }
        if($flag!=''){
          return $incomes;
        }
        $this->earning->payout(array());


        // end Repurchase commission code
            }
        }

            

            $this->session->set_flashdata("common_flash", "<div class='alert alert-success'>CRM Details has been updated.</div>");
            redirect(site_url('admin/manage_crm'));
        }
        else {
            $data['data']    = $this->db_model->select_multi('*', 'member', array('id' => $id));
           $this->db_model->select('*', 'plans',array('type' =>"Repurchase"));
            $this->db->select('*')->where(array(
                'type' => 'Repurchase'
                ));
            $data['plans'] = $this->db->get('plans')->result_array();

            $data['title']      = 'Edit CRM Details';
            $data['breadcrumb'] = 'Edit CRM Details';
            $data['layout']     = 'crm/edit_crm.php';
            $this->load->view(config_item('admin_theme'), $data);
        }
    }
    public function approved_crm()
    {
          $order_by = config_item('member_order_by');
        if ($this->form_validation->run() == false) {   
            $this->db_model->select('plan_name', 'plans',array('id' =>"1"));
            $data['prod_name'] = $this->db->get('plans')->result_array();
            
            $this->db->select('*')->from('member')->where(array('status !='=> 'Inactive','crm_status'=>'Approved','id !=' =>1001))->order_by($order_by, 'desc');
            $this->db->limit($config['per_page'], $page);
            $data['members'] = $this->db->get()->result_array();
            $data['title']      = 'List CRM Details';
            $data['breadcrumb'] = 'List CRM Details';
            $data['layout']     = 'crm/approved_crm.php';
            $data['parents']    = $this->db->get('product_categories')->result_array();
            $this->load->view(config_item('admin_theme'), $data);
        }
        else{
                $prod_name=$this->input->post('plan_name');
                $prod_id=$this->db_model->select('id', 'product', array('prod_name' => $prod_name)); 
                $config['per_page']   = 2;
                $config['total_rows'] = $this->db_model->count_all('member');
                $page                 = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $this->pagination->initialize($config);
                $this->db->select('*')->from('member')->where('signup_package',$prod_id)->order_by($order_by, 'ASC');
                $this->db->limit($config['per_page'], $page);
                $data['members'] = $this->db->get()->result_array();
                $this->load->view(config_item('admin_theme'), $data);
            }
    }
    public function rejected_crm()
    {
          $order_by = config_item('member_order_by');
        if ($this->form_validation->run() == false) {   
            $this->db_model->select('plan_name', 'plans',array('id' =>"1"));
            $data['prod_name'] = $this->db->get('plans')->result_array();
            
            $this->db->select('*')->from('member')->where(array('status !='=> 'Inactive','crm_status'=>'Rejected','id !=' =>1001))->order_by($order_by, 'desc');
            $this->db->limit($config['per_page'], $page);
            $data['members'] = $this->db->get()->result_array();
            $data['title']      = 'List CRM Details';
            $data['breadcrumb'] = 'List CRM Details';
            $data['layout']     = 'crm/rejected_crm.php';
            $data['parents']    = $this->db->get('product_categories')->result_array();
            $this->load->view(config_item('admin_theme'), $data);
        }
        else{
                $prod_name=$this->input->post('plan_name');
                $prod_id=$this->db_model->select('id', 'product', array('prod_name' => $prod_name)); 
                $config['per_page']   = 2;
                $config['total_rows'] = $this->db_model->count_all('member');
                $page                 = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $this->pagination->initialize($config);
                $this->db->select('*')->from('member')->where('signup_package',$prod_id)->order_by($order_by, 'ASC');
                $this->db->limit($config['per_page'], $page);
                $data['members'] = $this->db->get()->result_array();
                $this->load->view(config_item('admin_theme'), $data);
            }
    }

      public function crm_note()
    {
        
        $this->form_validation->set_rules('note', 'note', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $data['title']      = 'Edit CRM Details';
            $data['breadcrumb'] = 'Edit CRM Details';
            $data['layout']     = 'crm/edit_crm.php';
            $this->load->view(config_item('admin_theme'), $data);
            //echo "string";
        }
        else {
        
      $id = $this->input->post('id');
            $array = array(
                
                'userid'        => "Admin",
                'to_userid'     =>$this->input->post('id'),
                'note'        =>$this->input->post('note'),
                'date'          => date('Y-m-d H:i:s'),
            );
            $this->db->insert('crm_note', $array);
             $this->session->set_flashdata("common_flash", "<div class='alert alert-success'>Note has been updated.</div>");
            redirect(site_url().'admin/edit_crm/'.$id);
}
            
        
    }
    public function note_edit()
    {   

        $fileDesc_id = $_POST['fileDesc_id'];  
        $res = $this->db->where('id', $fileDesc_id)->get('crm_note');
        $d['res'] = $res->row(); 
        
      
    
        $this->load->view('admin/crm/ajax_note_edit',$d);
      }
      public function ajax_note_update()
    {
        if($this->input->post()){
            $desc_id = $this->input->post('id');
        $data = array(
        'note' =>$this->input->post('note'),
      
    
        );

                
        $update = $this->db->where('id', $desc_id)->update('crm_note', $data);   
       /* return $this->db->affected_rows();*/
            $add = $this->db->affected_rows();
            if($add == 1){  
                
                redirect(site_url().'admin/edit_crm/'.$this->input->post('userid'));
        }else{
            redirect(site_url().'admin/edit_crm/'.$this->input->post('userid'));
        }
        }
    }
    public function t_delete($id,$userid)
    {
        $this->db->where('id',$id);
           $add= $this->db->delete('crm_note');
            
            if($add == 1){  
                $this->session->set_flashdata("common_flash", "<div class='alert alert-success'>Note has been Deleted.</div>");
                redirect(site_url().'admin/edit_crm/'.$userid);
        }else{
            redirect(site_url().'admin/edit_crm/'.$userid);
        }
    }
    function select_defult_theme(){
       $data   = array(
                  'status'    => 'error',
                   'msg'      => 'Please select theme'
               );
      $id = $this->input->get('id');
       if($id){
           $theme_data = $this->user_model->select_themebyid($id);
           $data['status']  = 'error';
           $data['msg']        = 'Theme already activated';
           if($theme_data->is_active!=1){
               //inactive theme these active already.
               $this->db->where('is_active',1);
               $this->db->update('themes_setting', array('is_active'=>0));


               //active theme.
               $this->db->where('id', $theme_data->id);
               $this->db->update('themes_setting', array('is_active'=>1));         
               $data['status']  = 'ok';
               $data['msg']        = 'Selected Theme activated successfully';
           }
       }
       echo json_encode($data);
   }

   function select_admin_theme(){
       $data   = array(
                   'status'    => 'error',
                   'msg'      => 'Please select theme'
               );
       $id = $this->input->get('id');
       if($id){
           $where  = array('id'=>$id,'type'=>'admin','enabled'=>1);
           $theme_data = $this->user_model->get_Dbdata('admin_theme',$where,false,true);
           $data['status']  = 'error';
           $data['msg']        = 'Theme already activated';
           if($theme_data->is_active!=1){
               //inactive theme these active already.
               $this->db->where(array('is_active'=>1,'type'=>'admin'));
               $this->db->update('admin_theme', array('is_active'=>0));

               //active theme.
               $this->db->where('id', $theme_data->id);
               $this->db->update('admin_theme', array('is_active'=>1));
               $data['status']  = 'ok';
              $data['msg']        = 'Selected Theme activated successfully';
           }
       }
       echo json_encode($data);
   }

    //list of couses

    public function list_courses()
    {

        $array=array(
            'id'=>0,
        );

        $url = APIURL . 'Api/course_overview/';

        $ch = curl_init($url);
        # Form data string
        $postString = http_build_query($array, '', '&');
        # Setting our options
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        # Get the response
        $response = curl_exec($ch);
        
        curl_close($ch);

        $response= \json_decode($response);
        $data['course_deatils'] = $response->message;
        $data['status'] = $response->status;

       
        $data['title']      = 'List Courses';
        $data['breadcrumb'] = 'List Courses';
        $data['layout']     = 'course_overview/list_courses.php';
        $this->load->view(config_item('admin_theme'), $data);

    }

    public function course_enrolled_members()
    {

        $array=array(
            'id'=>0,
        );

        $url = APIURL . 'Api/course_enrolled_members/';

        $ch = curl_init($url);
        # Form data string
        $postString = http_build_query($array, '', '&');
        # Setting our options
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        # Get the response
        $response = curl_exec($ch);
        
        curl_close($ch);

        $response= \json_decode($response);
        $data['course_deatils'] = $response->message;
        $data['status'] = $response->status;

        $data['title']      = 'Enrolled Members';
        $data['breadcrumb'] = 'Enrolled Members';
        $data['layout']     = 'course_overview/enrolled_members.php';
        $this->load->view(config_item('admin_theme'), $data);

    }

    // ZOOM Meeting code
    
    public function upcomming_meetings()
    {
        $data['upcomming']   = $this->db->query("select * from live_meeting")->result();
        $data['title']      = 'Upcomming Meetings';
        $data['breadcrumb'] = 'Upcomming Meetings';
        $data['layout']     = 'upcomming_meetings.php';
        $this->load->view(config_item('admin_theme'), $data);
    }

    public function manage_meetings()
    {
        $data['title']      = 'Manage Meetings';
        $data['breadcrumb'] = 'Manage Meetings';
        $data['layout']     = 'Meetings/manage_meetings.php';
        
        if(config_item('enable_live_meeting')=='Yes'){
            $this->db->where('user_id','1');
            $this->db->order_by('id','desc');
            $data['meetings'] = $this->db->get('live_meeting')->result_array();    
        }
        $this->load->view(config_item('admin_theme'), $data);
       
    }

    public function add_meeting()
    {

        $this->form_validation->set_rules('meeting_date','meeting_date','required');
        $this->form_validation->set_rules('meeting_time','meeting_time','required');
        $this->form_validation->set_rules('meeting_id','meeting_id','required');
        $this->form_validation->set_rules('meeting_password','meeting_password','required');
        $this->form_validation->set_rules('meeting_name','meeting_name','required');
        
        if ($this->form_validation->run() == TRUE ) {


            $date1=$this->input->post('meeting_date');
           $date=strtotime($date1);
            $time1=$this->input->post('meeting_time');
            $time=strtotime($time1);
            
            $zoom_meeting_id               = $this->input->post('meeting_id');
            $trimmed_meeting_id            = preg_replace('/\s+/', '', $zoom_meeting_id);
           $zoom_meeting_id       = str_replace("-", "", $trimmed_meeting_id);

            $data= [
                    'date' =>$this->input->post('meeting_date'),
                    'time' =>$time,
                    'description' =>$this->input->post('meeting_description'),
                    'zoom_meeting_id' =>$zoom_meeting_id,
                    'zoom_meeting_password' =>$this->input->post('meeting_password'),
                    'zoom_meeting_link' => $this->input->post('meeting_link'),
                    'user_id' =>$this->session->admin_id,
                    'meet_name' =>$this->input->post('meeting_name'),

                ];

        
            $this->gmlm_model->insert_meeting_data($data);
            $this->session->set_flashdata('common_flash', '<div class="alert alert-success">Meeting Created Successfully.</div>');            
            redirect(base_url('admin/manage_meetings'));    
        }
        $this->session->set_flashdata("common_flash", "<div class='alert alert-danger'>Failed to Create the Meeting!!! </div>");
        redirect(base_url('admin/manage_meetings'));
    }

    public function edit_meeting($id)
    {
        
        $data['ads'] = $this->db_model->select_multi('*', 'live_meeting', array('id' => $id));

       $data['title']      = 'Edit Meeting';
       $data['breadcrumb'] = 'Edit Meeting';
        $data['layout']     = 'meetings/edit_meeting.php';
        $this->load->view(config_item('admin_theme'), $data);

    }

    public function update_meeting()
    {
 
        $this->form_validation->set_rules('meeting_date','meeting_date','required');
        $this->form_validation->set_rules('meeting_time','meeting_time','required');
        $this->form_validation->set_rules('meeting_id','meeting_id','required');
       $this->form_validation->set_rules('meeting_password','meeting_password','required');
        if ($this->form_validation->run() == TRUE ) {

            $time1=$this->input->post('meeting_time');
            $time=strtotime($time1);

            $zoom_meeting_id               = $this->input->post('meeting_id');
            $trimmed_meeting_id            = preg_replace('/\s+/', '', $zoom_meeting_id);
            $zoom_meeting_id       = str_replace("-", "", $trimmed_meeting_id);
            
            $data= [
                    'date' =>$this->input->post('meeting_date'),
                    'time' =>$time,
                    'description' =>$this->input->post('meeting_description'),
                    'zoom_meeting_id' =>$zoom_meeting_id,
                    'zoom_meeting_password' =>$this->input->post('meeting_password'),
                    'zoom_meeting_link' => $this->input->post('meeting_link'),
                    'meet_name' =>$this->input->post('meeting_name'),

                ];

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('live_meeting', $data);
        }
        $this->session->set_flashdata('common_flash', '<div class="alert alert-success">Meeting Updated Successfully.</div>');
        redirect('admin/manage_meetings');

    }

    public function delete_meeting($id)
    {

        $this->db->where('id', $id);
        $this->db->delete('live_meeting');
        $this->session->set_flashdata('common_flash', '<div class="alert alert-success">Meeting deleted Successfully.</div>');

        redirect('admin/manage_meetings');


    }


    public function live_meeting_admin($id)
    {

        $data['live_meeting_details']  = $this->user_model->get_live_meeting_details($id);
        $meet_user=$data['live_meeting_details']['user_id'];

        $this->db->select('*');
        $this->db->where('user_id',$meet_user);
        $data['zoom_meeting']     = $this->db->get('zoom_meeting')->row_array();

        if($meet_user!= '1')
        {
            $data['instructor_details']  = $this->user_model->get_meeting_member_details($meet_user)->row_array();    
        }
        else
        {
            $data['instructor_details']  = $this->user_model->get_all_member_details($meet_user)->row_array();   
        } 

        $this->load->view('admin/meetings/live_meeting_admin', $data);
    
    }

    public function all_meetings()
    {

        $data['title']      = 'Manage Member Meetings';
        $data['breadcrumb'] = 'Manage Member Meetings';
        $data['layout']     = 'Meetings/all_meetings.php';
        
        if(config_item('enable_live_meeting')=='Yes'){
            $this->db->where_not_in('user_id','1');
            $this->db->order_by('id','desc');
            $data['meetings'] = $this->db->get('live_meeting')->result_array();    
        }
        $this->load->view(config_item('admin_theme'), $data);
        
    }
    

}
