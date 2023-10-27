<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Gmlm_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->common_model->__session();
        $this->load->model('downline_model');
        $this->load->model('plan_model');
        $this->load->model('earning');
    }

    // public function get_current_package($md){
    //     debug_log('get_current_package');
        
    //     debug_log('mypv:'.$md->mypv);
        
    //     $this->db->select('*')->from('plans')->where(array('group_id='=>'1', 'type'=>'Registration'))->order_by('pv', 'ASC');
    //     $data = $this->db->get()->result();
                
    //     foreach($data as $result){
                
    //         if($md->mypv >= $result->pv)
    //         {
    //             $package_details=$this->db_model->select_multi('*','plans',array('pv='=>$result->pv, 'type'=>'Registration'));
    //             $package_id =$package_details->id;


    //             if($package_id != NULL)
    //             {
    //                 $data=array(
    //                     'signup_package'=>$package_id,
    //                     'activate_time'=> date('Y-m-d'),
    //                     'join_time' => date('Y-m-d'),
    //                 );
    //                 $this->db->where('id', $md->id);
    //                 $this->db->update('member', $data);

    //                 $data1=array(
    //                  'pid'=>$package_id,
    //                 );
    //                 $this->db->where('userid', $md->id);
    //                 $this->db->update('level_details', $data1);
        
    //             }
                
    //         }
            
    //     }
        
    //     $data=$package_details;
    //     return $data;

    // }
    public function get_current_package($md){
        debug_log('get_current_package');
        debug_log('mypv:'.$md->mypv);
        $this->db->select('*')->from('plans')->where(array('group_id='=>'1','type' =>'Registration'))->order_by('pv', 'ASC');
        $data = $this->db->get()->result();
        foreach($data as $result){
            if($md->mypv >= $result->pv)
            {
                $package_details=$this->db_model->select_multi('*','plans',array('pv='=>$result->pv,'type' =>'Registration'));
                $package_level_details=$this->db_model->select_multi('*','level_details',array('userid'=>$md->id));
                debug_log('$package_level_details'.$package_level_details->pid);
                $package_id =$package_details->id;
                if($package_id != NULL)
                {
                    $data=array(
                        'signup_package'=>$package_id,
                        'activate_time'=> date('Y-m-d'),
                        'join_time' => date('Y-m-d'),
                    );
                    $this->db->where('id', $md->id);
                    $this->db->update('member', $data);
                    if($package_details->id != $package_level_details->pid && $md->id != 1001){
                    $dataa=array(
                     'pid'=>$package_id,
                     'gid' =>$package_details->group_id,
                    );
                    $this->db->where('userid', $md->id);
                    $this->db->update('level_details', $dataa);
            }
                }
            }
        }
        $data=$package_details;
        return $data;
    }

    public function update_first_pair_limit($md){
        debug_log('get_current_package');
        
        debug_log('mypv:'.$md->mypv);
        
        $this->db->select('*')->from('plans')->where(array('group_id='=>'1'))->order_by('pv', 'ASC');
        $data = $this->db->get()->result();
                
        foreach($data as $result){
                
            if($md->mypv >= $result->pv)
            {
                $package_details=$this->db_model->select_multi('*','plans',array('pv='=>$result->pv));
                debug_log($this->db->last_query());
                $package_id =$package_details->id;

                
            }


        }

        debug_log("data of result");
        debug_log($package_id);
        debug_log($md->signup_package);
        
        if($package_id != $md->signup_package)
        {
            debug_log("data of result signup_package");
            $data2=array(
             'first_pair_paid'=> '0',
            );
            $this->db->where('user_id', $md->id);
            $this->db->update('binarydata', $data2);

        }

        $data=$package_details;
        return $data;

    }

    public function insert_meeting_data($data)
    {
       return $this->db->insert('live_meeting',$data);
    }


}
