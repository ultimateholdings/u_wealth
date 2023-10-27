<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Site
 */
class Ticket extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->login->check_session() == FALSE && $this->login->check_member() == FALSE) {
            redirect(site_url('site/login'));
        }
        $this->load->model('plan_model');
        if($this->session->role =='customer'){
            $this->config->set_item("member",config_item('member_customer'));
        }else{
            $this->config->set_item("member",config_item('member_affiliate'));
        }
    }

    public function admin_ticket()
    {
        $this->form_validation->set_rules('ticket_title', 'Ticket Title', 'trim|required');
        $this->form_validation->set_rules('ticket_data', 'Ticket Data', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
             $data['title']  = 'New Support Request';
             $data['layout'] = 'support/admin_raise_ticket.php';
             $this->load->view(config_item('admin_theme'), $data);
            //echo "string";
        }
        else {
            $array = array(
                'ticket_title'  => $this->input->post('ticket_title'),
                'ticket_detail' => date('Y-m-d') . '<br>'.$this->input->post('ticket_data'),
                'userid'        => 1000,
                'user_type'     =>"Admin",
                'date'          => date('Y-m-d H:i:s'),
            );
            $this->db->insert('ticket', $array);

            $this->session->set_flashdata('common_flash', '<div class="alert alert-success">A New Ticket has been opened.</div>');
            redirect('ticket/admin_old_Supports');
        }
    }

    public function new_ticket()
    {
        $this->form_validation->set_rules('ticket_title', 'Ticket Title', 'trim|required');
        $this->form_validation->set_rules('ticket_data', 'Ticket Data', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $data['title']  = 'New Support Request';
            $data['layout'] = 'support/new.php';
            $this->load->view(config_item('member'), $data);
        }
        else {
            $array = array(
                'ticket_title'  => $this->input->post('ticket_title'),
                'ticket_detail' => date('Y-m-d') . '<br>'.$this->input->post('ticket_data'),
                'userid'        => $this->session->user_id,
                'user_type'     =>"User",
                'date'          => date('Y-m-d H:i:s'),
            );
            $url = APIURL . 'Api/support_request_add';
            debug_log('url');
            debug_log($url);
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
            $ticket_data=json_decode($response);
            debug_log('ticket');
            debug_log($ticket_data);
            $this->db->insert('ticket', $array);

            $this->session->set_flashdata('common_flash', '<div class="alert alert-success">A New Ticket has been opened.</div>');
            redirect('ticket/old-Supports');
        }
    }

    public function admin_old_Supports()
    {
        $this->load->library('pagination');
        $config['per_page']   = 50;
        $config['total_rows'] = $this->db_model->count_all('ticket', array('userid' => $this->session->user_id));
        $page                 = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->pagination->initialize($config);
        $this->db->select('*');
        $this->db->where(array('userid' => 1000));
        $this->db->order_by('id', 'DESC');
        $this->db->limit($config['per_page'], $page);
        $data['data']   = $this->db->get('ticket')->result();
        $data['title'] = 'Tickets';
        $data['layout'] = 'support/all_ticket.php';
        $this->load->view(config_item('admin_theme'), $data);
    }

    public function old_Supports()
    {
        $this->load->library('pagination');
        $config['per_page']   = 50;
        $config['total_rows'] = $this->db_model->count_all('ticket', array('userid' => $this->session->user_id));
        $page                 = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->pagination->initialize($config);
        $this->db->select('*');
        $this->db->where(array('userid' => $this->session->user_id));
        $this->db->order_by('id', 'DESC');
        $this->db->limit($config['per_page'], $page);
        $data['data']   = $this->db->get('ticket')->result();
        $data['title'] = 'Tickets';
        $data['layout'] = 'support/all_ticket.php';
        $this->load->view(config_item('member'), $data);
    }

    public function view($id)
    {
        $this->form_validation->set_rules('ticket_reply', 'Ticket Reply Message', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $data['detail'] = $this->db_model->select_multi('*', 'ticket', array('id' => $id));
            $data['title'] = 'View Ticket';
            $data['layout'] = 'support/ticket_view.php';
            $folder         = $this->session->user_id > 0 ? config_item('member') : config_item('admin_theme');
            $this->load->view($folder, $data);
        }
        else {
            $array = array(
                'ticket_id' => $this->input->post('ticket_id'),
                'msg_from'  => $this->session->user_id ? $this->session->user_id : 'Admin',
                'msg'       => date('Y-m-d') . '<br>'. $this->input->post('ticket_reply'),
            );

            $this->db->insert('ticket_reply', $array);

            $array = array(
                'status' => $this->session->user_id ? 'Customer Reply' : 'Waiting User Reply',
            );
            $this->db->where('id', $this->input->post('ticket_id'));
            $this->db->update('ticket', $array);
             $array=array(
                'ticket_id' => $this->input->post('ticket_id'),
                'msg_from'  => $this->session->user_id ? $this->session->user_id : 'Admin',
                'msg'       => date('Y-m-d') . '<br>'. $this->input->post('ticket_reply'),
                'status' => $this->session->user_id ? 'Customer Reply' : 'Waiting User Reply',
            );
            $url = APIURL . 'Api/view_ticket/';
                    $ch = curl_init($url);
                    # Form data string
                    $postString = http_build_query($array, '', '&');
                    # Setting our options
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    # Get the response
                    $response = curl_exec($ch);
                    debug_log("response");
                    debug_log($response);
                    curl_close($ch);
                    $ticket_data=json_decode($response);
                    debug_log($ticket_data);
            $this->session->set_flashdata('common_flash', '<div class="alert alert-success">Message sent.</div>');
            redirect('ticket/view/' . $this->input->post('ticket_id'));
        }

    }

    public function close($id)
    {
        $array = array(
            'id'=>$id,
            'status' => 'Closed',
        );
         $url = APIURL . 'Api/ticket_closed/';
                    $ch = curl_init($url);
                    # Form data string
                    $postString = http_build_query($array, '', '&');
                    # Setting our options
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    # Get the response
                    $response = curl_exec($ch);
                    debug_log("response");
                    debug_log($response);
                    curl_close($ch);
                    $ticket_data=json_decode($response);
                    debug_log($ticket_data);
        $this->db->where('id', $id);
        $this->db->update('ticket', $array);

        $this->session->set_flashdata('common_flash', '<div class="alert alert-success">Ticket Marked as solved and closed..</div>');
        $this->session->user_id ? redirect('ticket/old-Supports') : redirect('ticket/resolved');
    }

    ################# ADMIN WORKS #########################

    public function unsolved()
    {   
        $data['title'] = 'Unsolved Tickets';
        $this->load->library('pagination');
        $config['per_page']   = 50;
        $config['total_rows'] = $this->db_model->count_all('ticket', array('status !=' => 'Closed'));
        $page                 = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->pagination->initialize($config);
        $this->db->select('*');
        $this->db->where(array('status !=' => 'Closed'));
        $this->db->order_by('id', 'DESC');
        $this->db->limit($config['per_page'], $page);
        $data['data']   = $this->db->get('ticket')->result();
        $data['layout'] = 'support/all_ticket.php';
        $this->load->view(config_item('admin_theme'), $data);

    }

    public function resolved()
    {   
        $data['title'] = 'Resolved Tickets';
        $this->load->library('pagination');
        $config['per_page']   = 50;
        $config['total_rows'] = $this->db_model->count_all('ticket', array('status' => 'Closed'));
        $page                 = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->pagination->initialize($config);
        $this->db->select('*');
        $this->db->where(array('status' => 'Closed'));
        $this->db->order_by('id', 'DESC');
        $this->db->limit($config['per_page'], $page);
        $data['data']   = $this->db->get('ticket')->result();
        $data['layout'] = 'support/resolved.php';
        $this->load->view(config_item('admin_theme'), $data);

    }
    public function ticket_read($id)
    {
       $data = array(
                          'notification' => 2,
                          
                      );
                
                  $this->db->where('id', $id);
                  $this->db->update('ticket', $data);
                  /*$this->old_Supports();*/
                  redirect(site_url('ticket/old_Supports/'));
    }
    public function ticket_read_admin($id)
    {
       $data = array(
                          'notification' => 1,
                          
                      );
                
                  $this->db->where('id', $id);
                  $this->db->update('ticket', $data);
                  /*$this->old_Supports();*/
                  redirect(site_url('ticket/unsolved/'));
    }

}
