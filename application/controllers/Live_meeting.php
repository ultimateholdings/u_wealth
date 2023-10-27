<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class Site
 */
class Live_meeting extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->login->check_session() == FALSE && $this->login->check_member() == FALSE) {
            redirect(site_url('site/login'));
        }
        $this->load->library('pagination');
        $this->load->library('user_model');
    }

    public function live_meeting_join($id)
    {
        $userid=$this->session->user_id;
        if($userid!= '1')
        {

            $data['title']      = 'Live Meeting';
            $data['breadcrumb'] = 'Live Meeting';
            $data['layout']     = 'meetings/live_meeting.php';


            $userid=$this->session->user_id;
            $data['logged_user_details'] = $this->user_model->get_member_detils($userid)->row_array();    
            

            $this->db->select('*');
            $this->db->where('type','zoom_api_key');
            $data['api']     = $this->db->get('settings')->row_array();

            $this->db->select('*');
            $this->db->where('type','zoom_secret_key');
            $data['secret_key']     = $this->db->get('settings')->row_array();

            $data['live_meeting_details']  = $this->user_model->get_live_meeting_details($id);

            $meet_user=$data['live_meeting_details']['user_id'];

            
            if($meet_user!= '1')
            {
                $data['instructor_details']  = $this->user_model->get_meeting_member_details($meet_user)->row_array();    
            }
            else
            {
                $data['instructor_details']  = $this->user_model->get_all_member_details($meet_user)->row_array();   
            }

                
           

            $this->load->view(config_item('member'), $data);


        }
        
    
    }
    

    // CHECK USER LOGGID IN OR NOT
    public function is_logged_in() {
        if ($this->session->userdata('user_login') != 1 && $this->session->userdata('admin_login') != 1){
            redirect('admin', 'refresh');
        }
    }

    
}
