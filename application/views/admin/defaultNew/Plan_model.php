<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Plan_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->common_model->__session();
	}
	
	public function create_leg()
	{
		$leg = config_item('leg');

		if ($leg == '1') {
			return array('A' => 'Left');
		}

		if ($leg == '2') {
			return array('A' => 'Left', 'B' => 'Right');
		}

		if ($leg == '3') {
			return array('A' => 'A', 'B' => 'B', 'C' => 'C');
		}

		if ($leg == '4') {
			return array('A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D');
		}

		if ($leg == '5') {
			return array('A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D', 'E' => 'E');
		}

		if ($leg == '6') {
			return array('A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D', 'E' => 'E', 'F' => 'F');
		}
	}

      public function unlimited_cycle_upline($md,$pd,$cs)
    {
        ##### Check if for assigned IDs still have time to make the payment other wise remove the id from queue
        if($cs->sponsor_fee>0){
            #Timer will start from the time member paid the sponsor fee
            $assigned_ids = $this->db->query("SELECT t1.userid as id, t1.level".($md->gift_level+1).", t2.signup_package, t2.gift_level, IFNULL(t3.status,'Not Paid') as status , t4.date FROM crowdfund_queue t1 
            LEFT JOIN 
            (SELECT * FROM member) as t2 ON t2.id = t1.userid
            LEFT JOIN
            (select userid, status from transaction where secret = ".$cs->id." and remarks like '%Member Fee%') as t3 ON t3.userid = t1.userid
            LEFT JOIN
            (select ref_id, max(date) as date from earning where secret = ".$cs->id." group by 1) as t4 ON t4.ref_id = t1.userid
            WHERE t1.level".($md->gift_level+1)." > 0 and
            t2.gift_level < ".($md->gift_level+1)." 
            HAVING status != 'Completed'"
            )->result();   
        }
        elseif($cs->admin_charge>0){
            #Timer will start from the time member paid the admin fee
            $assigned_ids = $this->db->query("SELECT t1.userid as id, t1.level".($md->gift_level+1).", t2.signup_package, t2.gift_level, IFNULL(t3.status,'Not Paid') as status , t4.date FROM crowdfund_queue t1 
            LEFT JOIN 
            (SELECT * FROM member) as t2 ON t2.id = t1.userid
            LEFT JOIN
            (select userid, status from transaction where secret = ".$cs->id." and remarks like '%Member Fee%') as t3 ON t3.userid = t1.userid
            LEFT JOIN
            (select ref_id, max(date) as date from earning where userid = 'admin' and secret = ".$cs->id." group by 1) as t4 ON t4.ref_id = t1.userid
            WHERE t1.level".($md->gift_level+1)." > 0 and
            t2.gift_level < ".($md->gift_level+1)."  
            HAVING status != 'Completed'"
            )->result();   
        }
        else{
            if($md->gift_level==0){
                #Timer will start from member joining time
                $assigned_ids = $this->db->query("SELECT t1.userid as id, t1.level".($md->gift_level+1).", t2.signup_package, t2.gift_level, IFNULL(t3.status,'Not Paid') as status , t2.join_time as date FROM crowdfund_queue t1 
                LEFT JOIN 
                (SELECT * FROM member) as t2 ON t2.id = t1.userid
                LEFT JOIN
                (select userid, status from transaction where secret = ".$cs->id." and remarks like '%Member Fee%') as t3 ON t3.userid = t1.userid
                WHERE t1.level".($md->gift_level+1)." > 0 and
                t2.gift_level < ".($md->gift_level+1)."  
                HAVING status != 'Completed'"
                )->result();           
            }
            else{
                #Timer will start from last time user received the income
                $assigned_ids = $this->db->query("SELECT t1.userid as id, t1.level".($md->gift_level+1).", t2.signup_package, t2.gift_level, IFNULL(t3.status,'Not Paid') as status , t4.date FROM crowdfund_queue t1 
                    LEFT JOIN 
                    (SELECT * FROM member) as t2 ON t2.id = t1.userid
                    LEFT JOIN
                    (select userid, status from transaction where secret = ".$cs->id." and remarks like '%Member Fee%') as t3 ON t3.userid = t1.userid
                    LEFT JOIN
                    (select userid, max(date) as date from earning group by 1) as t4 ON t4.userid = t1.userid
                    WHERE t1.level".($md->gift_level+1)." > 0 and
                    t2.gift_level < ".($md->gift_level+1)."
                    HAVING status != 'Completed'"
                )->result();
            }
        }

        //debug_log($assigned_ids);
        debug_log($this->db->last_query());

        foreach ($assigned_ids as $key => $aid) {
            #Add crowd fund member fee payment time to last admin fee paid time
            $newdate = date("Y-m-d H:i:s", strtotime('+ '.$cs->upgrade_amount_time.' hours', strtotime($aid->date)));
            $diff = strtotime($newdate) - strtotime(date('Y-m-d H:i:s'));

            debug_log("Userid ".$aid->id); 
            debug_log("Timer Started at ".$aid->date); 
            debug_log("Remaining Time ".$diff); 

            if((!($diff >0))){
              $update_queue = "UPDATE crowdfund_queue SET level".($aid->gift_level+1)." = '' WHERE userid = ".$aid->id." and pid = ".$aid->signup_package;
              $this->db->query($update_queue);
              debug_log($this->db->last_query());
              if ($aid->gift_level==0) {
                   $update_sponsor = "UPDATE member SET sponsor = '' WHERE id = ".$aid->id." and signup_package = ".$aid->signup_package;
              $this->db->query($update_sponsor);
              debug_log($this->db->last_query());
              }
              
            }
        }

                debug_log('Front line for Root user is already filled');
                $userid=$md->id;
                debug_log($userid);
                $upline='';
                $ud=$this->db_model->select('sponsor','member',array('id'=>$userid ,'signup_package'=>$md->signup_package));
                debug_log($this->db->last_query());
                $position= $ud;
                while (strlen($position)>2) {
                    $upline = $upline=='' ? $position : $upline.','.$position;
                    $position = $this->db_model->select('sponsor','member',array('id'=>$position ,'signup_package'=>$md->signup_package));
                    debug_log($this->db->last_query());
                }
                debug_log($this->db->last_query());
                 debug_log($upline);
                $upline_array = explode(',', $upline);

                //identifying upline id   
                        $count= 1;
                        $config=config_item('unlimited_cycle_level');
                        foreach ($upline_array as $key => $value) 
                        {   
                            debug_log('count');
                            debug_log($count);
                            debug_log($config);
                             if($count==$config)
                            {  
                        
                            $umd = $this->db_model->select('gift_level','member',array('id'=>$value));
                            debug_log($this->db->last_query());
                            $queue_count = $this->db->query(" SELECT count(*) as count 
                                FROM crowdfund_queue 
                                WHERE level".($md->gift_level+1)." IN (" .$value .") 
                                and pid = ".$pd->id)->result_array()[0]['count'];
                            debug_log('$queue_count'.$queue_count);
                            debug_log($umd);
                            debug_log(($md->gift_level+1));
                            if(($umd ==($md->gift_level+1))&&
                            ($queue_count<pow($pd->max_width,config_item('unlimited_cycle_level'))))
                               { debug_log('executed');
                                $upline_id =  $value;
                                break; }
                                if($upline_id !='') break;
                                $config = $config + $config ; 

                            }
                               $count = $count + 1; 
                        }

                        if($upline_id =='')
                            {
                            $upline_id = config_item('top_id');  
                            }
                        
                     debug_log($this->db->last_query());
                     debug_log('$upline_id '.$upline_id);

        

        ############################# End of the Block to Identify the Upline ID ##########################

        return $upline_id;
    }


    public function cycle_upline($md,$pd,$cs)
    {
        debug_log('cycle upline function open');
        debug_log($md->git_level);


            if($md->gift_level==0){
                #Timer will start from member joining time
                $assigned_ids = $this->db->query("SELECT t1.userid as id, t1.level".($md->gift_level+1).", t2.signup_package, t2.gift_level, IFNULL(t3.status,'Not Paid') as status , t2.join_time as date FROM crowdfund_queue t1 
                LEFT JOIN 
                (SELECT * FROM member) as t2 ON t2.id = t1.userid
                LEFT JOIN
                (select userid, status from transaction where secret = ".$cs->id." and remarks like '%Member Fee%') as t3 ON t3.userid = t1.userid
                WHERE t1.level".($md->gift_level+1)." > 0 and
                t2.gift_level < ".($md->gift_level+1)."  
                HAVING status != 'Completed'"
                )->result(); 

                  //debug_log($assigned_ids);
        debug_log($this->db->last_query()); }

        foreach ($assigned_ids as $key => $aid) {
            #Add crowd fund member fee payment time to last admin fee paid time
            $newdate = date("Y-m-d H:i:s", strtotime('+ '.$cs->upgrade_amount_time.' hours', strtotime($aid->date)));
            $diff = strtotime($newdate) - strtotime(date('Y-m-d H:i:s'));

            debug_log("Userid ".$aid->id); 
            debug_log("Timer Started at ".$aid->date); 
            debug_log("Remaining Time ".$diff); 

            if((!($diff >0))){
              $update_queue = "UPDATE crowdfund_queue SET level1 = '' , level2 = '' , level3 = '' WHERE userid = ".$aid->id." and pid = ".$aid->signup_package;
    
              $this->db->query($update_queue);
              debug_log($this->db->last_query());
               $update_sponsor = "UPDATE member SET sponsor = '' WHERE id = ".$aid->id." and signup_package = ".$aid->signup_package;
              $this->db->query($update_sponsor);
              debug_log($this->db->last_query());
            }
        }

                //identifying upline id        
        
                 debug_log('Front line for Root user is already filled');
                $userid=$md->id;
                debug_log($userid);
                $upline='';
                $ud=$this->db_model->select('sponsor','member',array('id'=>$userid ,'signup_package'=>$md->signup_package));
                debug_log($this->db->last_query());
                $position= $ud;
                while (strlen($position)>2) {
                    $upline = $upline=='' ? $position : $upline.','.$position;
                    $position = $this->db_model->select('sponsor','member',array('id'=>$position ,'signup_package'=>$md->signup_package));
                    debug_log($this->db->last_query());
                }
                debug_log($this->db->last_query());
                debug_log($upline);
                $upline_array = explode(',', $upline);

                //identifying upline id   
                        $count= 1;
                        $config=config_item('cycle_level');
                        foreach ($upline_array as $key => $value) 
                        {   
                            debug_log('count');
                            debug_log($count);
                            debug_log($config);
                             if($count==$config)
                            {  
                        
                                debug_log('executed');
                                $upline_id =  $value;
                                $original_upline_id =  $upline_id;
                                $update_queue = "UPDATE crowdfund_queue SET level2 = ".$original_upline_id." WHERE userid = ".$userid." and pid = ".$md->signup_package;
                        $this->db->query($update_queue);
                        debug_log($this->db->last_query());
                                break;

                            }
                                $count = $count + 1; 
                        }

                         if(strlen($upline_id)== '')
                            {
                              $upline_id = config_item('top_id');  
                               $update_queue = "UPDATE crowdfund_queue SET level2 = ".$upline_id." WHERE userid = ".$userid." and pid = ".$md->signup_package;
                        $this->db->query($update_queue);
                        debug_log($this->db->last_query());

                            }
                            //ALTER TABLE `crowdfund_queue` CHANGE `level3` `level3` VARCHAR(500) NULL DEFAULT NULL;


                         //identifying the queuecount
                            if($upline_id != config_item('top_id')){
                         $queue_count = $this->db->query(" SELECT count(*) as count FROM crowdfund_queue 
                WHERE level1 IN (" .$upline_id .") and pid = ".$pd->id)->result_array()[0]['count'];
                  debug_log($this->db->last_query());
                  debug_log('queue_count');
                  debug_log($queue_count);
                  debug_log('width_count');
                  debug_log(pow($pd->max_width, $config));  }

                  //assigning upline
                  if(($queue_count+1)>=pow($pd->max_width, $config))
                  {
                    //identifying uplines
                     $aupline='';
                $ud=$this->db_model->select('level2','crowdfund_queue',array('userid'=>$upline_id ,'pid'=>$md->signup_package));
                debug_log($this->db->last_query());
                $position= $ud;
                while (strlen($position)>2) {
                    $aupline = $aupline=='' ? $position : $aupline.','.$position;
                    $position = $this->db_model->select('level2','crowdfund_queue',array('userid'=>$position,'pid'=>$md->signup_package));
                    debug_log($this->db->last_query());
                }
                debug_log($this->db->last_query());
                debug_log($aupline);
                $aupline_array = explode(',', $aupline);
                    //end of identifying uplines
                  $qcount=1;
                  $width=(pow($pd->max_width, $config)+pow($pd->max_width, $config));
                  $width1=pow($pd->max_width, $config);
                  $aconfig= $config+ $config;
                  $bconfig= $config+ $config;
                 
                        foreach ($aupline_array as $key => $value) 
                        {   
                            
                                debug_log('executed');
                                $all_ids = $all_ids=='' ? $value: $all_ids.','.$value;
                                debug_log($all_ids);

                                 $queue_count = $this->db->query(" SELECT count(*) as count FROM crowdfund_queue 
                WHERE level1 IN (" .$value .") and pid = ".$pd->id)->result_array()[0]['count'];
                  debug_log($this->db->last_query());
                  debug_log('value');
                  debug_log($value );
                  debug_log('queue_count');
                  debug_log($queue_count);
                  debug_log('ifconditions');
                  debug_log(($queue_count+$qcount));
                  debug_log($width1);
                  debug_log(($queue_count+($qcount+1)));
                  debug_log($width);
                  if($value == config_item('top_id'))
                  {
                    $aupline_id = config_item('top_id');
                  }

                  if ((($queue_count+$qcount)>= $width1)&&(($queue_count+($qcount+1))<$width)){
                    //identifying upline id  if count is  7
                        debug_log('enter into loop');
                        $count= 1;
                        foreach ($upline_array as $key => $value) 
                        {   
                            debug_log('acount');
                            debug_log($count);
                            debug_log($aconfig);
                             if($count==$aconfig)
                            {  
                        
                                debug_log('executed');
                                $upline_id =  $value;
                                $aupline_id = $upline_id;
                                break;

                            }
                                $count = $count + 1; 
                        }
                            debug_log('cycle');
                            debug_log($qcount);
                        if( $aupline_id != '') break;
                        }
                  $qcount=$qcount+1;
                  $width=$width+pow($pd->max_width, $config);
                  $width1=$width1+pow($pd->max_width, $config);
                  $aconfig= $aconfig+ $config; 
                  }
                  }
                

                    $all_ids = $original_upline_id.','.$all_ids;
                     debug_log('all ids');            
                    debug_log($all_ids);
                    if ($all_ids!='') {
                        $update_queue = "UPDATE crowdfund_queue SET level3 = '".$all_ids."' WHERE userid = ".$userid." and pid = ".$md->signup_package;
                        $this->db->query($update_queue);
                        debug_log($this->db->last_query());
                    }
                    

                   
                         if( $aupline_id == config_item('top_id'))
                    {
                      $upline_id = config_item('top_id');  
                    }
                        
                    debug_log($this->db->last_query());
                    debug_log('$upline_id '.$upline_id);
                   //  $all_ids = $upline_id.','.$original_upline_id.','.$all_ids;
                    ####### End of the block to remove expired IDs from Queue
        
        ###### Identify the Upline ID for Member to Make the Payment

        #Identify the upline for Joining Plan and if gift_level is 0. Only joining plan and git_level 0 can be either working or autopool plan
        
        ############################# End of the Block to Identify the Upline ID ##########################

        return $upline_id;
        debug_log('cycle upline function close');
    }

     public function crowdfund_upline_new($md,$pd,$cs)
    {
        ##### Check if for assigned IDs still have time to make the payment other wise remove the id from queue
        if($cs->sponsor_fee>0){
            #Timer will start from the time member paid the sponsor fee
            $assigned_ids = $this->db->query("SELECT t1.userid as id, t1.level".($md->gift_level+1).", t2.signup_package, t2.gift_level, IFNULL(t3.status,'Not Paid') as status , t4.date FROM crowdfund_queue t1 
            LEFT JOIN 
            (SELECT * FROM member) as t2 ON t2.id = t1.userid
            LEFT JOIN
            (select userid, status from transaction where secret = ".$cs->id." and remarks like '%Member Fee%') as t3 ON t3.userid = t1.userid
            LEFT JOIN
            (select ref_id, max(date) as date from earning where secret = ".$cs->id." group by 1) as t4 ON t4.ref_id = t1.userid
            WHERE t1.level".($md->gift_level+1)." > 0 and
            t2.gift_level < ".($md->gift_level+1)." 
            HAVING status != 'Completed'"
            )->result();   
        }
        elseif($cs->admin_charge>0){
            #Timer will start from the time member paid the admin fee
            $assigned_ids = $this->db->query("SELECT t1.userid as id, t1.level".($md->gift_level+1).", t2.signup_package, t2.gift_level, IFNULL(t3.status,'Not Paid') as status , t4.date FROM crowdfund_queue t1 
            LEFT JOIN 
            (SELECT * FROM member) as t2 ON t2.id = t1.userid
            LEFT JOIN
            (select userid, status from transaction where secret = ".$cs->id." and remarks like '%Member Fee%') as t3 ON t3.userid = t1.userid
            LEFT JOIN
            (select ref_id, max(date) as date from earning where userid = 'admin' and secret = ".$cs->id." group by 1) as t4 ON t4.ref_id = t1.userid
            WHERE t1.level".($md->gift_level+1)." > 0 and
            t2.gift_level < ".($md->gift_level+1)."  
            HAVING status != 'Completed'"
            )->result();   
        }
        else{
            if($md->gift_level==0){
                #Timer will start from member joining time
                $assigned_ids = $this->db->query("SELECT t1.userid as id, t1.level".($md->gift_level+1).", t2.signup_package, t2.gift_level, IFNULL(t3.status,'Not Paid') as status , t2.join_time as date FROM crowdfund_queue t1 
                LEFT JOIN 
                (SELECT * FROM member) as t2 ON t2.id = t1.userid
                LEFT JOIN
                (select userid, status from transaction where secret = ".$cs->id." and remarks like '%Member Fee%') as t3 ON t3.userid = t1.userid
                WHERE t1.level".($md->gift_level+1)." > 0 and
                t2.gift_level < ".($md->gift_level+1)."  
                HAVING status != 'Completed'"
                )->result();           
            }
            else{
                #Timer will start from last time user received the income
                $assigned_ids = $this->db->query("SELECT t1.userid as id, t1.level".($md->gift_level+1).", t2.signup_package, t2.gift_level, IFNULL(t3.status,'Not Paid') as status , t4.date FROM crowdfund_queue t1 
                    LEFT JOIN 
                    (SELECT * FROM member) as t2 ON t2.id = t1.userid
                    LEFT JOIN
                    (select userid, status from transaction where secret = ".$cs->id." and remarks like '%Member Fee%') as t3 ON t3.userid = t1.userid
                    LEFT JOIN
                    (select userid, max(date) as date from earning group by 1) as t4 ON t4.userid = t1.userid
                    WHERE t1.level".($md->gift_level+1)." > 0 and
                    t2.gift_level < ".($md->gift_level+1)."
                    HAVING status != 'Completed'"
                )->result();
            }
        }

        //debug_log($assigned_ids);
        debug_log($this->db->last_query());

        foreach ($assigned_ids as $key => $aid) {
            #Add crowd fund member fee payment time to last admin fee paid time
            $newdate = date("Y-m-d H:i:s", strtotime('+ '.$cs->upgrade_amount_time.' hours', strtotime($aid->date)));
            $diff = strtotime($newdate) - strtotime(date('Y-m-d H:i:s'));

            debug_log("Userid ".$aid->id); 
            debug_log("Timer Started at ".$aid->date); 
            debug_log("Remaining Time ".$diff); 

            if((!($diff >0))){
              $update_queue = "UPDATE crowdfund_queue SET level".($aid->gift_level+1)." = '' WHERE userid = ".$aid->id." and pid = ".$aid->signup_package;
              $this->db->query($update_queue);
              debug_log($this->db->last_query());
            }
        }

        ####### End of the block to remove expired IDs from Queue
        
        ###### Identify the Upline ID for Member to Make the Payment

        #Identify the upline for Joining Plan and if gift_level is 0. Only joining plan and git_level 0 can be either working or autopool plan
        if(($md->gift_level == 0) && ($pd->auto_pool != 'Yes')){
            debug_log('Level One Count for Joining Plan');
            #If Sponsor has less than plan width assigned in queue then assign sponsor as upline
            $queue_count = $this->db->query(" SELECT count(*) as count FROM crowdfund_queue 
                WHERE level".($md->gift_level+1)." IN (" .$md->sponsor .") and pid = ".$pd->id)->result_array()[0]['count'];
            debug_log($this->db->last_query());
            debug_log('Maximum Width allowed '.$pd->max_width);

            if($queue_count<$pd->max_width){
                debug_log('Sponsor Front line not yet filled and assigning sponsor as upline');
                $upline_id = $md->sponsor;  
            }else{

                debug_log('Sponsor front line is already filled');

                $downline_ids = rtrim($this->db->query("select CONCAT_WS('',SUBSTR(level1,2),SUBSTR(level2,2),SUBSTR(level3,2),SUBSTR(level4,2),SUBSTR(level5,2),SUBSTR(level6,2),SUBSTR(level7,2),SUBSTR(level8,2),SUBSTR(level9,2),SUBSTR(level10 ,2),SUBSTR(level11,2),SUBSTR(level12,2),SUBSTR(level13,2),SUBSTR(level14,2),SUBSTR(level15,2),SUBSTR(level16,2),SUBSTR(level17,2),SUBSTR(level18,2),SUBSTR(level19,2),SUBSTR(level20,2)) as ids from level_details where userid =".$md->sponsor." and pid =".$md->signup_package)->result_array()[0]['ids'],',');
                
                debug_log($this->db->last_query());
                debug_log($downline_ids);
                #If there are any downline IDs check for vacant position under that user
                if(strval($downline_ids)>0){
                    $upline_id = $this->db->query("
                    select t1.id, IFNULL(t2.cnt,0) as count 
                    from member as t1
                    LEFT JOIN
                    (select level".($md->gift_level+1)." as cid, count(level".($md->gift_level+1).") as cnt from crowdfund_queue group by 1) as t2 on t1.id = t2.cid
                    where status = 'Active' and signup_package = ".$pd->id." 
                    and secret IN (".$downline_ids.")
                    having count < ".$pd->max_width."
                    order by last_upgrade ASC limit 1")->result_array()[0]['id'];    
                }else{
                    $upline_id = $this->db->query("
                    select t1.id, IFNULL(t2.cnt,0) as count 
                    from member as t1
                    LEFT JOIN
                    (select level".($md->gift_level+1)." as cid, count(level".($md->gift_level+1).") as cnt from crowdfund_queue group by 1) as t2 on t1.id = t2.cid
                    where status = 'Active' and signup_package = ".$pd->id." 
                    having count < ".$pd->max_width."
                    order by last_upgrade ASC limit 1")->result_array()[0]['id'];    
                }
                debug_log($this->db->last_query());
            }
        }
        else
        {
           debug_log('Either gift_level greater than 0 or Auto Pool Registration');
            
               // $upline_id = config_item('top_id');          
            
                debug_log('Front line for Root user is already filled');
                $userid=$md->id;
                debug_log($userid);
                $upline='';
                $ud=$this->db_model->select('position','level_details',array('userid'=>$userid,'pid'=>$pd->id));
                debug_log($this->db->last_query());
                $position= $ud;
                while (strlen($position)>2) {
                    $upline = $upline=='' ? $position : $upline.','.$position;
                    $position = $this->db_model->select('position','level_details',array('userid'=>$position ,'pid'=>$pd->id));
                    debug_log($this->db->last_query());
                }
                debug_log($this->db->last_query());
                debug_log($upline);
                $upline_array = explode(',', $upline);
                    

                        $count= 0;

                        foreach ($upline_array as $key => $value) 
                        {   
                            debug_log('count');
                            debug_log($count);
                            debug_log('md_count');

                            debug_log($md->gift_level);
                             if($count>=$md->gift_level)
                            {  
                            $umd = $this->db_model->select('gift_level','member',array('id'=>$value));
                            debug_log($this->db->last_query());
                            $queue_count = $this->db->query(" SELECT count(*) as count FROM crowdfund_queue 
                WHERE level".($md->gift_level+1)." IN (" .$value .") and pid = ".$pd->id)->result_array()[0]['count'];

                         debug_log($this->db->last_query());
                         debug_log('queue_count');
                         debug_log( $queue_count);
                            debug_log('upline-gift_level');
                            debug_log($umd);
                            debug_log('member-gift_level');
                            debug_log($md->gift_level+1);
                                if($umd ==($md->gift_level+1)&&($queue_count<pow($pd->max_width, $md->gift_level+1)))
                                {
                                    debug_log('executed');
                                $upline_id =  $value;
                                break;

                                }
                            }
                                $count = $count + 1; 
                                 
                           }

                         if(strlen($upline_id)== '')
                    {
                      $upline_id = config_item('top_id');  
                    }
                        
                    debug_log($this->db->last_query());
                    debug_log('$upline_id '.$upline_id);
        }

        ############################# End of the Block to Identify the Upline ID ##########################

        return $upline_id;
    }

    public function crowdfund_upline($md,$pd,$cs)
    {
		##### Check if for assigned IDs still have time to make the payment other wise remove the id from queue
        if($cs->sponsor_fee>0){
            #Timer will start from the time member paid the sponsor fee
            $assigned_ids = $this->db->query("SELECT t1.userid as id, t1.level".($md->gift_level+1).", t2.signup_package, t2.gift_level, IFNULL(t3.status,'Not Paid') as status , t4.date FROM crowdfund_queue t1 
            LEFT JOIN 
            (SELECT * FROM member) as t2 ON t2.id = t1.userid
            LEFT JOIN
            (select userid, status from transaction where secret = ".$cs->id." and remarks like '%Member Fee%') as t3 ON t3.userid = t1.userid
            LEFT JOIN
            (select ref_id, max(date) as date from earning where secret = ".$cs->id." group by 1) as t4 ON t4.ref_id = t1.userid
            WHERE t1.level".($md->gift_level+1)." > 0 and
            t2.gift_level < ".($md->gift_level+1)." 
            HAVING status != 'Completed'"
            )->result();   
        }
        elseif($cs->admin_charge>0){
            #Timer will start from the time member paid the admin fee
            $assigned_ids = $this->db->query("SELECT t1.userid as id, t1.level".($md->gift_level+1).", t2.signup_package, t2.gift_level, IFNULL(t3.status,'Not Paid') as status , t4.date FROM crowdfund_queue t1 
            LEFT JOIN 
            (SELECT * FROM member) as t2 ON t2.id = t1.userid
            LEFT JOIN
            (select userid, status from transaction where secret = ".$cs->id." and remarks like '%Member Fee%') as t3 ON t3.userid = t1.userid
            LEFT JOIN
            (select ref_id, max(date) as date from earning where userid = 'admin' and secret = ".$cs->id." group by 1) as t4 ON t4.ref_id = t1.userid
            WHERE t1.level".($md->gift_level+1)." > 0 and
            t2.gift_level < ".($md->gift_level+1)."  
            HAVING status != 'Completed'"
            )->result();   
        }
        else{
            if($md->gift_level==0){
                #Timer will start from member joining time
                $assigned_ids = $this->db->query("SELECT t1.userid as id, t1.level".($md->gift_level+1).", t2.signup_package, t2.gift_level, IFNULL(t3.status,'Not Paid') as status , t2.join_time as date FROM crowdfund_queue t1 
                LEFT JOIN 
                (SELECT * FROM member) as t2 ON t2.id = t1.userid
                LEFT JOIN
                (select userid, status from transaction where secret = ".$cs->id." and remarks like '%Member Fee%') as t3 ON t3.userid = t1.userid
                WHERE t1.level".($md->gift_level+1)." > 0 and
                t2.gift_level < ".($md->gift_level+1)."  
                HAVING status != 'Completed'"
                )->result();           
            }
            else{
                #Timer will start from last time user received the income
                $assigned_ids = $this->db->query("SELECT t1.userid as id, t1.level".($md->gift_level+1).", t2.signup_package, t2.gift_level, IFNULL(t3.status,'Not Paid') as status , t4.date FROM crowdfund_queue t1 
                    LEFT JOIN 
                    (SELECT * FROM member) as t2 ON t2.id = t1.userid
                    LEFT JOIN
                    (select userid, status from transaction where secret = ".$cs->id." and remarks like '%Member Fee%') as t3 ON t3.userid = t1.userid
                    LEFT JOIN
                    (select userid, max(date) as date from earning group by 1) as t4 ON t4.userid = t1.userid
                    WHERE t1.level".($md->gift_level+1)." > 0 and
                    t2.gift_level < ".($md->gift_level+1)."
                    HAVING status != 'Completed'"
                )->result();
            }
        }

        //debug_log($assigned_ids);
        debug_log($this->db->last_query());

        foreach ($assigned_ids as $key => $aid) {
            #Add crowd fund member fee payment time to last admin fee paid time
            $newdate = date("Y-m-d H:i:s", strtotime('+ '.$cs->upgrade_amount_time.' hours', strtotime($aid->date)));
            $diff = strtotime($newdate) - strtotime(date('Y-m-d H:i:s'));

            debug_log("Userid ".$aid->id); 
            debug_log("Timer Started at ".$aid->date); 
            debug_log("Remaining Time ".$diff); 

            if((!($diff >0))){
              $update_queue = "UPDATE crowdfund_queue SET level".($aid->gift_level+1)." = '' WHERE userid = ".$aid->id." and pid = ".$aid->signup_package;
              $this->db->query($update_queue);
              debug_log($this->db->last_query());
            }
        }

        ####### End of the block to remove expired IDs from Queue
        
        ###### Identify the Upline ID for Member to Make the Payment

        #Identify the upline for Joining Plan and if gift_level is 0. Only joining plan and git_level 0 can be either working or autopool plan
        if(($md->gift_level == 0) && ($pd->auto_pool != 'Yes')){
        	debug_log('Level One Count for Joining Plan');
            #If Sponsor has less than plan width assigned in queue then assign sponsor as upline
        	$queue_count = $this->db->query(" SELECT count(*) as count FROM crowdfund_queue 
	            WHERE level".($md->gift_level+1)." IN (" .$md->sponsor .") and pid = ".$pd->id)->result_array()[0]['count'];
	        debug_log($this->db->last_query());
            debug_log('Maximum Width allowed '.$pd->max_width);

        	if($queue_count<$pd->max_width){
                debug_log('Sponsor Front line not yet filled and assigning sponsor as upline');
        		$upline_id = $md->sponsor;	
        	}else{

                debug_log('Sponsor front line is already filled');

                $downline_ids = rtrim($this->db->query("select CONCAT_WS('',SUBSTR(level1,2),SUBSTR(level2,2),SUBSTR(level3,2),SUBSTR(level4,2),SUBSTR(level5,2),SUBSTR(level6,2),SUBSTR(level7,2),SUBSTR(level8,2),SUBSTR(level9,2),SUBSTR(level10 ,2),SUBSTR(level11,2),SUBSTR(level12,2),SUBSTR(level13,2),SUBSTR(level14,2),SUBSTR(level15,2),SUBSTR(level16,2),SUBSTR(level17,2),SUBSTR(level18,2),SUBSTR(level19,2),SUBSTR(level20,2)) as ids from level_details where userid =".$md->sponsor." and pid =".$md->signup_package)->result_array()[0]['ids'],',');
                
                debug_log($this->db->last_query());
                debug_log($downline_ids);
                #If there are any downline IDs check for vacant position under that user
                if(strval($downline_ids)>0){
                    $upline_id = $this->db->query("
                    select t1.id, IFNULL(t2.cnt,0) as count 
                    from member as t1
                    LEFT JOIN
                    (select level".($md->gift_level+1)." as cid, count(level".($md->gift_level+1).") as cnt from crowdfund_queue group by 1) as t2 on t1.id = t2.cid
                    where status = 'Active' and signup_package = ".$pd->id." 
                    and secret IN (".$downline_ids.")
                    having count < ".$pd->max_width."
                    order by last_upgrade ASC limit 1")->result_array()[0]['id'];    
                }else{
                    $upline_id = $this->db->query("
                    select t1.id, IFNULL(t2.cnt,0) as count 
                    from member as t1
                    LEFT JOIN
                    (select level".($md->gift_level+1)." as cid, count(level".($md->gift_level+1).") as cnt from crowdfund_queue group by 1) as t2 on t1.id = t2.cid
                    where status = 'Active' and signup_package = ".$pd->id." 
                    having count < ".$pd->max_width."
                    order by last_upgrade ASC limit 1")->result_array()[0]['id'];    
                }
                debug_log($this->db->last_query());
            }
        }
        else
        {
            debug_log('Either gift_level greater than 0 or Auto Pool Registration');
            $queue_count = $this->db->query(" SELECT count(*) as count FROM crowdfund_queue 
                WHERE level".($md->gift_level+1)." IN (" .config_item('top_id') .") and pid = ".$pd->id)->result_array()[0]['count'];

            debug_log($this->db->last_query());
            debug_log('Queue Count for Root User '.$queue_count);
            debug_log('Maximum Allowed '.pow($pd->max_width, ($md->gift_level+1)));

            if($queue_count < pow($pd->max_width, ($md->gift_level+1)))
            {
                $upline_id = config_item('top_id');
            }
            else
            {
                debug_log('Front line for Root user is already filled');

                $include = '';
                $i = 2;
                $position = $md->position;
                while(1){
                    $position = $this->db_model->select('position','level_details',array('userid'=>$position,'pid'=>$md->signup_package));
                    if((strlen($position)>2)&&($i>=($md->gift_level+1))){
                        $include = $include == '' ? $position : $include.','.$position;
                    }
                    if(!(strlen($position)>2)){
                        break;
                    }
                }

                $exclude = '';
                while(1){
                    if($exclude != ''){
                        $upline_id = $this->db->query("
                        SELECT id FROM member 
                        WHERE gift_level =".($md->gift_level+1)." AND status = 'Active' AND signup_package = ".$md->signup_package." AND id not IN (".$exclude .") order by last_upgrade ASC limit 1")->result_array()[0]['id'];
                    }else{
                        $upline_id = $this->db->query("
                        SELECT id FROM member 
                        WHERE gift_level =".($md->gift_level+1)." AND status = 'Active' AND signup_package = ".$md->signup_package." order by last_upgrade ASC limit 1")->result_array()[0]['id'];
                    }
                    debug_log($this->db->last_query());
                    debug_log('$upline_id '.$upline_id);
                    
                    $queue_count = $this->db->query("
                     SELECT count(*) as count FROM crowdfund_queue 
                     WHERE level".($md->gift_level+1)." IN (" .$upline_id .") AND pid = ".$md->signup_package)->result_array()[0]['count'];
                    debug_log($this->db->last_query());
                    debug_log('$upline Curren Queue Count '.$queue_count);
                    debug_log('Maximum allowed queue_count');
                    debug_log(pow($pd->max_width, $md->gift_level+1));

                    if(!(strlen($upline_id) > 2)){
                        break;
                    }
                    else if($queue_count < pow($pd->max_width, $md->gift_level+1)){
                        break;
                    } else{
                        if($exclude ==''){
                            $exclude = $upline_id;
                        }else{
                            $exclude = $exclude.','.$upline_id;    
                        }
                    }
                }
            }
        }

        ############################# End of the Block to Identify the Upline ID ##########################

        return $upline_id;
    }

    public function level_one_count($id,$pd)
    {
        $count = $this->db->query("SELECT count(*) as count from level_details where position = $id AND gid = ".$pd->group_id)->result_array()[0]['count'];
        
        debug_log($this->db->last_query());

        return $count;
    }

    public function find_position($sponsor,$pd)
    {
        $sponsor_secret = $this->db_model->select('secret', 'member', array('id' => $sponsor,));
        $max_width = $pd->max_width;
        #If unilimited users can be placed in Front line for root user in Matrix Plan
        if(config_item('root_sponsor_unlimited')=='Yes'){
        	if(($sponsor==config_item('top_id')) && ($max_width > "2"))
	        {
	            return $sponsor;   
	        }	
        }
        elseif($max_width==0){
        	return $sponsor;	
        }	
        
        if($this->level_one_count($sponsor,$pd) < $max_width)
        {
            return $sponsor;
        }
        else
        {
            if(config_item('sep_tree')=='Yes'){
                $this->db->select('userid')->where(array('position'=>$sponsor, 'pid'=>$pd->id))->order_by('id', 'ASC');
                $users = $this->db->get('level_details')->result_array();    
            }else{
                $this->db->select('userid')->where(array('position'=>$sponsor))->order_by('id', 'ASC');
                $users = $this->db->get('level_details')->result_array();    
            }
            
            $check_spons = $users;
            while(1)
            {
                if(count($users))
                {   $i = 0;
                    foreach ($users as $user)
                    {   
                        
                        if($this->level_one_count($user['userid'], $pd) < $max_width)
                        {
                            return $user['userid'];
                        }
                        if(config_item('sep_tree')=='Yes'){
                            $this->db->select('userid')->where(array('position'=>$user['userid'], 'pid'=>$pd->id))->order_by('id', 'ASC');
                            $list1 = $this->db->get('level_details')->result_array();
                        }else{
                            $this->db->select('userid')->where(array('position'=>$user['userid']))->order_by('id', 'ASC');
                            $list1 = $this->db->get('level_details')->result_array();
                        }
                        $check_spons = array_merge($check_spons,$list1);
                        $check_spons = array_slice($check_spons,1);
                        $i++;
                    }
                    $users = $check_spons;  
                }
                else
                {
                    break;
                }
            }
        }
    }

    public function insert_binary_data($md, $pd)
    {        
        $exists = $this->db->where('user_id', $md->id)->get('binarydata');
        if($exists->num_rows() == 0){
          $data = array(
           'user_id' => $md->id,
           'secret' =>$md->secret,
           'left_leg' =>',',
           'right_leg' =>',',
           'left_paid' =>',',
           'right_paid' => ',',
           'left_unpaid' => ',',
           'right_unpaid' => ',',
           'flushed' =>',',
          );
          $this->db->insert('binarydata', $data);
        }

        $secret = $md->secret.',';
        $isleft = $md->placement_leg == 'A' ? 1:0;
        $ud = $this->db_model->select_multi('*','level_details',array('userid'=>$md->position, 'gid'=>$pd->group_id));

        while(1)
        {
          if(strlen($ud->userid)>2){
              if($isleft)
              {
                 
                $this->db->query("UPDATE binarydata SET left_leg = CONCAT_WS('', left_leg, '$secret'), left_unpaid = CONCAT_WS('', left_unpaid, '$secret') where user_id = ".$ud->userid);

                debug_log($this->db->last_query());

                 #$data=array('left_leg' => $this->db_model->select('left_leg','binarydata',array('user_id'=>$ud->id)).$md->secret.',', 'left_unpaid' => $this->db_model->select('left_unpaid','binarydata',array('user_id'=>$ud->id)).$md->secret.',');
              }
              else
              {
                $this->db->query("UPDATE binarydata SET right_leg = CONCAT_WS('', right_leg, '$secret'), right_unpaid = CONCAT_WS('', right_unpaid, '$secret') where user_id = ".$ud->userid);

                debug_log($this->db->last_query());

                #$data=array('right_leg' => $this->db_model->select('right_leg','binarydata',array('user_id'=>$ud->id)).$md->secret.',', 'right_unpaid' => $this->db_model->select('right_unpaid','binarydata',array('user_id'=>$ud->id)).$md->secret.',');
              }
              #$this->db->where('user_id', $ud->id);
              #$this->db->update('binarydata', $data);
              
              $isleft = $ud->leg == 'A' ? 1:0;
              $ud = $this->db_model->select_multi('*','level_details',array('userid'=>$ud->position, 'gid'=>$pd->group_id));

          }else{
              break;
          }
        }
    }

  public function update_binary_data($upline_id,$left_paid,$left_tail_paid, $right_paid, $right_tail_paid, $commission_type)
    {
        if($commission_type == 1)
        {
            $data = array('first_pair_paid' => 1);
            $this->db->where('user_id', $upline_id);
            $this->db->update('binarydata', $data);
        }

        debug_log('Update Binary Data');

        $left_paid = $left_paid.',';
        $this->db->query("UPDATE binarydata SET left_paid = CONCAT_WS('', left_paid, '$left_paid'), left_unpaid = REPLACE(left_unpaid, '$left_paid','') where user_id = $upline_id");

        debug_log($this->db->last_query());

        $right_paid = $right_paid.',';
        $this->db->query("UPDATE binarydata SET right_paid = CONCAT_WS('', right_paid, '$right_paid'), right_unpaid = REPLACE(right_unpaid, '$right_paid','') where user_id = $upline_id");

        debug_log($this->db->last_query());

        if($left_tail_paid > 0)
        {
          $left_tail_paid = $left_tail_paid.',';  
          $this->db->query("UPDATE binarydata SET left_paid = CONCAT_WS('', left_paid, '$left_tail_paid'), left_unpaid = REPLACE(left_unpaid, '$left_tail_paid','') where user_id = $upline_id");

          debug_log($this->db->last_query());

        }

        if($right_tail_paid > 0)
        {
          $right_tail_paid = $right_tail_paid.',';  
          $this->db->query("UPDATE binarydata SET right_paid = CONCAT_WS('', right_paid, '$right_tail_paid'), right_unpaid = REPLACE(right_unpaid, '$right_tail_paid','') where user_id = $upline_id");

          debug_log($this->db->last_query());

        }

        /*

        $data = array('left_paid' => $this->db_model->select('left_paid','binarydata',array('user_id'=>$upline_id))  . $left_paid . ',');
        $this->db->where('user_id', $upline_id);
        $this->db->update('binarydata', $data);

        if($left_tail_paid > 0)
        {
          $data = array('left_paid' => $this->db_model->select('left_paid','binarydata',array('user_id'=>$upline_id))  . $left_tail_paid . ',');
        $this->db->where('user_id', $upline_id);
        $this->db->update('binarydata', $data);
        }

        $data = array('right_paid' => $this->db_model->select('right_paid','binarydata',array('user_id'=>$upline_id))  . $right_paid . ',');
        $this->db->where('user_id', $upline_id);
        $this->db->update('binarydata', $data);

        if($right_tail_paid > 0)
        {
          $data = array('right_paid' => $this->db_model->select('right_paid','binarydata',array('user_id'=>$upline_id))  . $right_tail_paid . ',');
          $this->db->where('user_id', $upline_id);
          $this->db->update('binarydata', $data);
        }

        */

    }


	public function get_leg_position($pd, $sponsor, $leg, $position)
	{
		
		debug_log('sponsor '.$sponsor);
		debug_log('position '.$position);

		if((config_item('sep_tree')=='Yes') && (config_item('width') != '2')){
			$check_id = $this->db_model->select('userid','level_details',array('userid'=>$sponsor,'pid'=>$pd->id));

			if(!(strlen($check_id)>2)){
				$position = $sponsor==$position ? config_item('top_id') : $position;
				$sponsor = config_item('top_id');
			}
		}

		debug_log('sponsor '.$sponsor);
		debug_log('position '.$position);

		if ($pd->auto_pool !== "Yes"):
	      if (trim($position) == ""):
	          $position = $sponsor;
	      endif;

	      if ($position == $sponsor):
	          if(($pd->max_width) == 2 && (config_item('show_leg_choose') == 'Yes'))
	          {
	              $position = $this->plan_model->find_extreme_position($sponsor, $leg);
	          }
	          else
	          {
	              $position = $this->plan_model->find_position($sponsor,$pd);
	              $l1_count = $this->plan_model->level_one_count($position, $pd);
	              $leg = 'A';
	       		  $leg = $l1_count == 1 ? 'B' : $leg;
	       		  $leg = $l1_count == 2 ? 'C' : $leg;
	       		  $leg = $l1_count == 3 ? 'D' : $leg;
	       		  $leg = $l1_count == 4 ? 'E' : $leg;
	       		  $leg = $l1_count == 5 ? 'F' : $leg;
		          $leg = $l1_count == 6 ? 'G' : $leg;
	          } 
	      else:
	          if ($this->plan_model->check_position($position, $leg) !== $position):
	              return 400;
	          endif;
	      endif;
		else:
	    $autopool_data = $this->plan_model->find_autopool_field($pd);
	    $position = $autopool_data['id'];
	    $leg = $autopool_data['leg'];

	    endif;
        debug_log($this->db->last_query());
	    return array('leg'=>$leg, 'position'=>$position);

	}

	public function find_extreme_position($id, $leg)
	{
		
		$this->db->select($leg)->from('member')->where(array('id' => $id));
		$result = $this->db->get()->row();
		if ($result->{$leg} == 0) {
			return $id;
		}

		return $this->find_extreme_position($result->{$leg}, $leg);
	}

	public function check_position($position, $leg)
	{
		$this->db->select($leg)->from('member')->where('id', $position);
		$result = $this->db->get()->row();

		if ($result->{$leg} == 0) {
			return $position;
		}

		return false;
	}

	public function find_autopool_field($pd)
	{
		$ld = $this->db->query("SELECT userid, (length(level1) - length(replace(level1, ',', '')) + 1)-2 as cnt from level_details where (length(level1) - length(replace(level1, ',', '')) + 1)-2 < ".$pd->max_width." AND pid = ".$pd->id." order BY id ASC LIMIT 1")->result_array()[0];

        $id = $ld['userid'];
        $l1_count = $ld['cnt'];

        $leg = 'A';
        $leg = $l1_count == 1 ? 'B' : $leg;
        $leg = $l1_count == 2 ? 'C' : $leg;
        $leg = $l1_count == 3 ? 'D' : $leg;
        $leg = $l1_count == 4 ? 'E' : $leg;
        $leg = $l1_count == 5 ? 'F' : $leg;
        $leg = $l1_count == 6 ? 'G' : $leg;

		return array('id' => $id, 'leg' => $leg);
	}

	public function create_tree($id, $above_id = '', $position = 'A',$plan='')
	{
		$my_tree = 'my_tree';

		if ($this->session->admin_id) {
			$my_tree = 'user_tree';
		}

		$data = $this->db_model->select_multi('*', 'member', array('id' => $id));
    $status = $this->db_model->select_multi('*', 'level_details', array('userid' => $id,'gid'=>$plan));

    #debug_log($status);

    if($plan != ''){
        $lds = $this->db_model->select_multi('*', 'level_details', array('userid' => $id, 'gid'=>$plan));
        $total_downline = $lds->total_downline;
        $total_active = $lds->total_active;
        $this->db->select('id')->where(array('position'=>$id, 'signup_package'=>$plan))->order_by(config_item('member_order_by'), 'ASC');
    } else{
        $total_downline = $data->total_downline;
        $total_active = $data->total_active;    
        $this->db->select('id')->where(array('position'=>$id))->order_by(config_item('member_order_by'), 'ASC');
    }

    $dl =  $this->db->get('member')->result_array();

		if ($plan!='') {
      if ($status->e_status == 1) {
  			if($this->db->count_all('rank_system')>0){
  				$rank_id = $this->db_model->select('id','rank_system',array('rank_name'=>$data->rank));
  				$color = $rank_id >0 ? $rank_id : 'green';
  			}else{
  				$color = 'green';	
  			}
  		}
  	
    	else {
  			$color = 'red';
  		}
    }
    else
    {
      if ($data->status == 'Active') {
        if($this->db->count_all('rank_system')>0){
          $rank_id = $this->db_model->select('id','rank_system',array('rank_name'=>$data->rank));
          $color = $rank_id >0 ? $rank_id : 'green';
        }else{
          $color = 'green'; 
        }
      }
      else {
        $color = 'red';
      }
    }

    $color = (($id == config_item('top_id')) && ($color == 'red')) ? 'green' : $color;

		$myimg = $data->photo ? base_url('uploads/profile/' . $data->photo) : base_url('uploads/site_img/' . $color . '.png');

		$total_node = "<span style='font-size:14px;font-weight:600;'>";
   // $img="<img class="img-circle' style='height: 40px' src='". $myimg . "'>"

		if(config_item('sep_tree')=='No'){
	        $total_node = $total_node . 'Plan Name : ' . $this->db_model->select('plan_name','plans', array('id'=>$data->signup_package)) . '<br/> ';
	    }

		if($this->db->count_all('rank_system')>0){
			$total_node = $total_node . 'Rank : ' . $data->rank . '<br/>';
		}

		$total_node = $total_node.'Total Downline: ' . ($total_downline) . '<br/>';


		if (config_item('inactive_in_tree')=='Yes'){
			$total_node = $total_node.'Total Active Downline: ' . ($total_active) . '<br/>';
		}

		if(config_item('enable_pv')=='Yes'){
			$total_node = $total_node . 'My Business: ' . ($data->mypv) . '<br/> ';	
			$total_node = $total_node . 'Downline Business: ' . ($data->downline_pv) . '<br/> ';	
		}
		
        $total_node = $total_node . '<span>';

		//debug_log($this->db->last_query());

		if ($data->id == config_item('top_id')) {
			$echo = '<a href="' . site_url('tree/'.$my_tree.'/'.$id.'/'.$plan) . '" title="' . config_item('ID_EXT') . $data->id . '" style="text-decoration: none; color: ' . $color . '; margin: 5px; " data-toggle="popover" data-trigger="hover" data-html="true" data-placement="top" data-content="' . "\n" . $total_node . '<br/>' . "\n\n" . '"><img class="img-circle" style="height: 40px" src="' . $myimg . '"><br/>' . $data->name . '<br/></a>';
			return array('A' => $dl[0]['id'], 'B' => $dl[1]['id'], 'C' => $dl[2]['id'], 'D' => $dl[3]['id'], 'E' => $dl[4]['id'], 'data' => $echo, 'id' => $data->id);
		} else if($data->id){
			$echo = '<a href="' . site_url('tree/'.$my_tree.'/'.$id.'/'.$plan) . '" title="' . config_item('ID_EXT') . $data->id . '" style="text-decoration: none; color: ' . $color . '; margin: 5px;" data-toggle="popover" data-trigger="hover" data-html="true" data-placement="top" data-content="' . "\n" . $total_node . '<br/>' . "\n\n" . '"><img class="img-circle" style="height: 40px;width:50px;" src="' . $myimg . '"><br/>' . $data->name . '<br/>(' . config_item('ID_EXT') . $data->id . ')</a>';
			return array('A' => $dl[0]['id'], 'B' => $dl[1]['id'], 'C' => $dl[2]['id'], 'D' => $dl[3]['id'], 'E' => $dl[4]['id'], 'data' => $echo, 'id' => $data->id);

		}

		return array('data' => '<a target="blank" data-placement="top" data-toggle="tooltip"title="Add Member." href="' . site_url('tree/new_user/' . $position . '/' . $above_id) . '"><img style="height: 50px" src="' . base_url('uploads/site_img/new.png') . '"></a>');
	}

	public function create_binary_tree($id, $above_id = '', $position = 'A',$plan='')
	{
        if(config_item('sep_tree')=='1')
        {
            $my_tree = 'my_tree';

            if ($this->session->admin_id) {
                $my_tree = 'user_tree';
            }

            $data = $this->db_model->select_multi('*', 'member', array('id' => $id));

            if ($data->status == 'Active') {
                if($this->db->count_all('rank_system')>0){
                    $rank_id = $this->db_model->select('id','rank_system',array('rank_name'=>$data->rank));
                    $color = $rank_id >0 ? $rank_id : 'green';
                }else{
                    $color = 'green';   
                }
            }
            else {
                $color = 'red';
            }

            $myimg = ($data->photo ? base_url('uploads/profile/' . $data->photo) : base_url('uploads/site_img/' . $color . '.png'));

            $total_node = "<span style='font-size:14px;font-weight:600;'>";

            if(config_item('sep_tree')=='No'){
                $total_node = $total_node . 'Plan Name : ' . $this->db_model->select('plan_name','plans', array('id'=>$data->signup_package)) . '<br/> ';
            }

            if($this->db->count_all('rank_system')>0){
                $total_node = $total_node . 'Rank : ' . $data->rank . '<br/> ';
            }

            $total_node = $total_node.'Total Downline: ' . ($data->total_downline) . '<br/>';

            if (config_item('inactive_in_tree')=='Yes'){
                $total_node = $total_node.'Total Active Downline: ' . ($data->total_active) . '<br/>';
            }

            if(config_item('enable_pv')=='Yes'){
                $total_node = $total_node . 'My Business: ' . ($data->mypv) . '<br/> '; 
                $total_node = $total_node . 'Downline Business: ' . ($data->downline_pv) . '<br/> ';    
            }
            
            if($plan != ''){
                $this->db->select('id')->where(array('position'=>$id, 'signup_package'=>$plan))->order_by(config_item('member_order_by'), 'ASC');

            } else{
                $this->db->select('id')->where(array('position'=>$id))->order_by(config_item('member_order_by'), 'ASC');    
            }
            
            $total_node = $total_node . '<span>';

            $dl =  $this->db->get('member')->result_array();
            //debug_log($this->db->last_query());

            if ($data->id == config_item('top_id')) {
                $echo = '<a href="' . site_url('tree/' . $my_tree . '/' . $id) . '" title="' . config_item('ID_EXT') . $data->id . '" style="text-decoration: none; color: ' . $color . '; margin: 5px" data-toggle="popover" data-trigger="hover" data-html="true" data-placement="top" data-content="' . "\n" . $total_node . '<br/>' . "\n\n" . '"><img class="img-circle" style="height: 40px" src="' . $myimg . '"><br/>' .$data->secret.' '.$data->name . '<br/></a>';
                return array('A' => $dl[0]['id'], 'B' => $dl[1]['id'], 'C' => $dl[2]['id'], 'D' => $dl[3]['id'], 'E' => $dl[4]['id'], 'data' => $echo, 'id' => $data->id);
            } else if($data->id){
                $echo = '<a href="' . site_url('tree/' . $my_tree . '/' . $id) . '" title="' . config_item('ID_EXT') . $data->id .' " style="text-decoration: none; color: ' . $color . '; margin: 5px" data-toggle="popover" data-trigger="hover" data-html="true" data-placement="top" data-content="' . "\n" . $total_node . '<br/>' . "\n\n" . '"><img class="img-circle" style="height: 40px" src="' . $myimg . '"><br/>' .$data->secret.' '.$data->name . '<br/>(' . config_item('ID_EXT') . $data->id . ')</a>';
                return array('A' => $dl[0]['id'], 'B' => $dl[1]['id'], 'C' => $dl[2]['id'], 'D' => $dl[3]['id'], 'E' => $dl[4]['id'], 'data' => $echo, 'id' => $data->id);

            }

            return array('data' => '<a target="blank" data-toggle="tooltip" title="Add Member." href="' . site_url('tree/new_user/' . $position . '/' . $above_id) . '"><img style="height: 50px" src="' . base_url('uploads/site_img/new.png') . '"></a>');
        }
        else
        {
            $my_tree = 'my_tree';

            if ($this->session->admin_id) {
                $my_tree = 'user_tree';
            }

            $data = $this->db_model->select_multi('*', 'member', array('id' => $id,));

            if ($data->status == 'Active') {
                if($this->db->count_all('rank_system')>0){
                    $rank_id = $this->db_model->select('id','rank_system',array('rank_name'=>$data->rank));
                    $color = $rank_id >0 ? $rank_id : 'green';
                }else{
                    $color = 'green';   
                }
            }
            else {
                $color = 'red';
            }

            $myimg = ($data->photo ? base_url('uploads/profile/' . $data->photo) : base_url('uploads/site_img/' . $color . '.png'));
            
            $total_node = "<span style='font-size:14px;font-weight:600;'>";

            if(config_item('sep_tree')=='No'){
                $total_node = $total_node . 'Plan Name : ' . $this->db_model->select('plan_name','plans', array('id'=>$data->signup_package)) . '<br/> ';
            }

            if($this->db->count_all('rank_system')>0){
                $total_node = $total_node . 'Rank : ' . $data->rank . '<br/> ';
            }

            if ((config_item('leg') == '2')) {
                $total_node = $total_node .'Total Left: ' . $data->total_a . '<br/> Total Right: ' . $data->total_b . '<br/> ';
                if (config_item('inactive_in_tree')=='Yes'){
                    $total_node = $total_node .'Total Left Active: '.$data->total_a_active.'<br/> Total Right Active: '.$data->total_b_active.'<br/>';
                }

                if(config_item('enable_pv')=="Yes") {
                    $total_node = $total_node . 'My Business: ' . $data->mypv . '<br/> ';
                    $total_node = $total_node . 'Total Business Left: ' . $data->total_a_pv . '<br/> ';
                    $total_node = $total_node . 'Total Business Right: ' . $data->total_b_pv . '<br/> ';
                }

                if (config_item('enable_investment') == 'Yes') {
                    $total_node = $total_node . 'My Investment Left: ' . $data->total_a_investment. '<br/> ';
                    $total_node = $total_node . 'My Investment Right: ' . $data->total_b_investment. '<br/> ';
                }

            } else{
                $total_node = $total_node .'Total Downline: ' . ($data->total_downline) . '<br/>';
                if (config_item('inactive_in_tree')=='Yes'){
                    $total_node = $total_node.'Total Active Downline: '.$data->total_active.'<br/>';
                }
                if(config_item('enable_pv')=="Yes") {
                    $total_node = $total_node.'Downline Business: '.$data->downline_pv.'<br/> ';
                }   
            }

            $total_node = $total_node . '<span>';

            if ($data->id == config_item('top_id')) {
                $echo = '<a href="' . site_url('tree/' . $my_tree . '/' . $id) . '" title="' . config_item('ID_EXT') . $data->id . '" style="text-decoration: none; color: ' . $color . '; margin: 5px" data-toggle="popover" data-trigger="hover" data-html="true" data-placement="top" data-content="' . "\n" . $total_node . '<br/>' . "\n" . '"><img class="img-circle" style="height: 40px" src="' . $myimg . '"><br/>' .$data->secret.'. '. $data->name.'<br/></a>';
                return array('A' => $data->A, 'B' => $data->B, 'C' => $data->C, 'D' => $data->D, 'E' => $data->E, 'data' => $echo, 'id' => $data->id);
            } else if($data->id) {
                $echo = '<a href="' . site_url('tree/' . $my_tree . '/' . $id) . '" title="' . config_item('ID_EXT') . $data->id . '" style="text-decoration: none; color: ' . $color . '; margin: 5px" data-toggle="popover" data-trigger="hover" data-html="true" data-placement="top" data-content="' . "\n" . $total_node . '<br/>' . "\n" . '"><img class="img-circle" style="height: 40px" src="' . $myimg . '"><br/>' .$data->secret.'. '. $data->name.'<br/>(' . config_item('ID_EXT') . $data->id . ')</a>';
                return array('A' => $data->A, 'B' => $data->B, 'C' => $data->C, 'D' => $data->D, 'E' => $data->E, 'data' => $echo, 'id' => $data->id);
            }

            return array('data' => '<a target="blank" data-placement="top" data-toggle="tooltip" title="Add Member." href="' . site_url('tree/new_user/' . $position . '/' . $above_id) . '"><img style="height: 50px" src="' . base_url('uploads/site_img/new.png') . '"></a>');
        }
        
	}

	public function create_tree_old($id, $above_id = '', $position = 'A')
	{
		$my_tree = 'my_tree';

		if ($this->session->admin_id) {
			$my_tree = 'user_tree';
		}

		$data = $this->db_model->select_multi('id,name,A,B,C,D,E,total_a,total_b,topup,total_c,total_d,total_e,mypv,total_a_pv,total_b_pv,my_img,total_a_investment,total_b_investment', 'member', array('id' => $id));

		if ($data->topup == '0.00') {
			$color = 'red';
		}
		else {
			$color = 'green';
		}

		$myimg = ($data->photo ? base_url('uploads/profile/' . $data->photo) : base_url('uploads/site_img/' . $color . '.png'));
		$total_node = "<span style='font-size:14px;font-weight:600;'>";

		if(config_item('sep_tree')=='No'){
            $total_node = $total_node . 'Plan Name : ' . $this->db_model->select('plan_name','plans', array('id'=>$data->signup_package)) . '<br/> ';
        }

		if (config_item('leg') == '1') {
			$total_node = 'Total Downline: ' . ($data->total_a + $data->total_b + $data->total_c + $data->total_d + $data->total_e) . '';
		}

		if (config_item('leg') == '2') {
			$total_a_pv = 'Total Business Left: ' . $data->total_a_pv;
			$total_b_pv = 'Total Business Right: ' . $data->total_b_pv;

			if (config_item('enable_investment') == 'Yes') {
				$total_a_pv = 'My Investment Left: ' . $data->total_a_investment;
				$total_b_pv = 'My Investment Right: ' . $data->total_b_investment;
			}

			$total_node = 'Total Left: ' . $data->total_a . '<br/>' . 'Total Right: ' . $data->total_b . '<br/> ' . $total_a_pv . '<br/>' . $total_b_pv . '';
		}
		else if (config_item('leg') == '3') {
			$total_node = 'Total A: ' . $data->total_a . '<br/>' . 'Total B: ' . $data->total_b . '<br/>Total C: ' . $data->total_c . '<br/>';
		}
		else if (config_item('leg') == '4') {
			$total_node = 'Total A: ' . $data->total_a . '<br/>' . 'Total B: ' . $data->total_b . '<br/>Total C: ' . $data->total_c . '<br/>Total D: ' . $data->total_d . '<br/>';
		}
		else if (config_item('leg') == '5') {
			$total_node = 'Total A: ' . $data->total_a . '<br/>' . 'Total B: ' . $data->total_b . '<br/>Total C: ' . $data->total_c . '<br/>Total D: ' . $data->total_d . '<br/>Total E: ' . $data->total_e . '<br/>';
		}

		if ($data->id) {
			$echo = '<a href="' . site_url('tree/' . $my_tree . '/' . $id) . '" title="' . config_item('ID_EXT') . $data->id . '" style="text-decoration: none; color: ' . $color . '; margin: 5px" data-toggle="popover" data-trigger="hover" data-html="true" data-placement="top" data-content="' . "\n" . $total_node . '<br/>' . "\n" . 'My Business: ' . $data->mypv . "\n\n" . '"><img class="img-circle" style="height: 40px" src="' . $myimg . '"><br/>' . $data->name . '<br/></a>';
			return array('A' => $data->A, 'B' => $data->B, 'C' => $data->C, 'D' => $data->D, 'E' => $data->E, 'data' => $echo, 'id' => $data->id);
		}

		return array('data' => '<a target="blank" title="Add Member." data-placement="top"data-toggle="tooltip" href="' . site_url('tree/new_user/' . $position . '/' . $above_id) . '"><img style="height: 50px" src="' . base_url('uploads/site_img/new.png') . '"></a>');
	}

	public function ref_list($id, $sn = 1)
	{
		$this->db->select('*')->from('member')->where(array('sponsor' => htmlentities($id)));
		$data = $this->db->get()->result();

		foreach ($data as $e) {
			echo '<tr>' . "\n" . '        <td>' . $sn++ . '</td>' . "\n" . '        <td>' . $e->name . '</td>' . "\n" . '        <td>' . date('Y-m-d', strtotime($e->activate_time)) . '</td>' . "\n" . '        <td>' . $e->total_downline . '</td>' . "\n" . '        <td>' . config_item('ID_EXT') . $e->sponsor . '</td>' . "\n" . '    </tr>';
			$last_id = $e->id;
		}

		if (trim($last_id) !== '') {
			$this->ref_list($last_id, $sn);
		}
	}
}
defined('BASEPATH') || true;
?>