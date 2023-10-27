<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Email_model extends CI_Model
{
    
    public function __construct()
    {
        parent::__construct();
        $this->common_model->__session();
    }

    function send_mail($arr = "")
    {
        if(!empty($arr['draft_status'])) {
            $data = array(
                'session_id'    => $arr['session_id'],
                'session_name'  => $this->session->name,
                'lables'        => $arr['lables'],
                'from_email'    => $arr['from_email'],
                'to_email'      => $arr['to_email'],
                'subject'       => $arr['subject'],
                'emailCC'       => $arr['emailCC'],
                'emailBCC'      => $arr['emailBCC'],
                'message'       => $arr['message'],
                'attachment'    => $arr['file_name'],
                'draft_status'  => $arr['draft_status'],
                'date'          => date('Y-m-d H:i:s')
            );
        } else {
            $data = array(
                'session_id'    => $arr['session_id'],
                'session_name'  => $this->session->name,
                'lables'        => $arr['lables'],
                'from_email'    => $arr['from_email'],
                'to_email'      => $arr['to_email'],
                'subject'       => $arr['subject'],
                'emailCC'       => $arr['emailCC'],
                'emailBCC'      => $arr['emailBCC'],
                'message'       => $arr['message'],
                'attachment'    => $arr['file_name'],
                'date'          => date('Y-m-d H:i:s')
            );
        }      
        $flag = $this->db->insert('inbox', $data);
        return $flag ? 1 : 0;
    }

    function get_inbox_data($data="") {
        $this->db->select('*');
        $this->db->from('inbox');        

        if(!empty($data['from_email']) && empty($data['sentMail']) && empty($data['draftMail']) && empty($data['starredMail']) && empty($data['trashMail']) && empty($data['search_mail']) && empty($data['product']) && empty($data['work']) && empty($data['misc']) && empty($data['family']) && empty($data['design'])) {
            $this->db->where('to_email =', $data['from_email']);  
            $this->db->where('draft_status =', 0);    
            $this->db->where('trash =', 0);    
        }
        if(!empty($data['sentMail'])) {
            $this->db->where('from_email =', $data['from_email']);
            $this->db->where('draft_status =', 0);    
            $this->db->where('trash =', 0);    
        }  
        if(!empty($data['starredMail'])) {
            $this->db->where('to_email =', $data['from_email']);  
            $this->db->where('starred =', $data['starredMail']);  
            $this->db->where('draft_status =', 0);    
            $this->db->where('trash =', 0);  
        }
        if(!empty($data['draftMail'])) {
            $this->db->where('from_email =', $data['from_email']);  
            $this->db->where('draft_status =', $data['draftMail']);  
            $this->db->where('trash =', 0);
        }
        if(!empty($data['trashMail'])) {
            $this->db->where('to_email =', $data['from_email']); 
            $this->db->where('trash =', $data['trashMail']);  
            //$this->db->or_where('from_email =', $data['from_email']); 
            //$this->db->where('session_id=', $data['session_id']); 
        }

        if(!empty($data['search_mail'])) {
            $this->db->like('message', $data['search_mail']);
            $this->db->or_like('subject', $data['search_mail']);
            $this->db->or_like('attachment', $data['search_mail']);
            $this->db->where('from_email =', $data['from_email']);  
        }

        if(!empty($data['product'])) {
            $this->db->where('lables =', $data['product']);  
            $this->db->where('to_email =', $data['from_email']);  
            $this->db->where('trash =', 0);
        }

        if(!empty($data['work'])) {
            $this->db->where('lables =', $data['work']);  
            $this->db->where('to_email =', $data['from_email']);  
            $this->db->where('trash =', 0);
        }

        if(!empty($data['misc'])) {
            $this->db->where('lables =', $data['misc']);  
            $this->db->where('to_email =', $data['from_email']);  
            $this->db->where('trash =', 0);
        }

        if(!empty($data['family'])) {
            $this->db->where('lables =', $data['family']);  
            $this->db->where('to_email =', $data['from_email']);  
            $this->db->where('trash =', 0);
        }

        if(!empty($data['design'])) {
            $this->db->where('lables =', $data['design']);  
            $this->db->where('to_email =', $data['from_email']);  
            $this->db->where('trash =', 0);
        }
        //$this->db->or_where('session_id=', $data['session_id']);
        $this->db->order_by("date", "desc");
        //$this->db->limit($data['per_page'], $data['uri_segment']);
        $query = $this->db->get();
        return $query;
    }

    function showMessage($arr="") {
        $this->db->set('status', 'read');
        $this->db->where('id', $arr['id']);
        $this->db->update('inbox');

        $this->db->select('*');
        $this->db->from('inbox');
        $this->db->where('id', $arr['id']);
        $query = $this->db->get();
        return $query->row(); 
    }

    function set_starred($arr="") {
        $starred = $this->db_model->select('starred', 'inbox', array('id' => $arr['id']));
        if($starred == 1){            
            $this->db->set('starred', 0);
            $this->db->where('id', $arr['id']);
            $this->db->update('inbox');
            return 1;
        } else {
            $this->db->set('starred', 1);
            $this->db->where('id', $arr['id']);
            $this->db->update('inbox');
            return 2;
        } 
        return 0;       
    }

    public function count_unread_msg($from_email) {
        $this->db->where('status', 'unread');
        $this->db->where('to_email', $from_email);
        return $this->db->count_all_results("inbox");
    }

    public function set_trash_message($arr="") {
        $data = array(
            'starred' => 0,
            'draft_status' => 0,
            'trash'=> 1
        );
        //$this->db->set('trash', 1);
        $this->db->where('id', $arr['id']);
        $flag = $this->db->update('inbox', $data);  
        return $flag ? 1 : 0;      
    }

    public function move_to_trash($arr="") {
        //print_r($arr);
        //echo count($arr['array']);
        
        $i=0;
        $flag=0;
        for($i=0;$i < count($arr['array']); $i++) {
            $trash = $this->db_model->select('trash', 'inbox', array('id' => $arr['array'][$i]));
            
            if($trash == 1) {
                $this->db->where('id', $arr['array'][$i]);
                $this->db->delete('inbox');
                $flag=2;
            } else {
                $data = array(
                    'starred' => 0,
                    'draft_status' => 0,
                    'trash'=> 1
                );
                $this->db->where('id', $arr['array'][$i]);
                $this->db->update('inbox', $data);
                $flag=1;
            }
        }

        if($flag == 0) {
            return 0;
        } else if($flag == 1) {
            return 1;
        } else if($flag == 2){
            return 2;
        }
    }

    public function send_draft_message($arr="") {
        $data = array(
            'starred' => 0,
            'draft_status' => 0,
            'trash'=> 0,
            'status'=> 'unread'
        );
        //$this->db->set('trash', 1);
        $this->db->where('id', $arr['id']);
        $flag = $this->db->update('inbox', $data);  
        return $flag ? 1 : 0;      
    }
    
}