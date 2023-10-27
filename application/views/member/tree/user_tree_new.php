<?php if(config_item('id_upgrade')=='Yes') { 

$top_id = $this->uri->segment('3') ? $this->uri->segment('3') : $this->session->user_id;

if($this->uri->segment('4') >0){
    $uid = $this->db_model->select('id','level_details',array('userid'=>$this->session->user_id, 'gid'=>$this->uri->segment('4')));

    //debug_log($uid);
    //debug_log($this->db->last_query());

    $sid = $this->db_model->select('id','level_details',array('userid'=>$this->uri->segment('3'), 'gid'=>$this->uri->segment('4')));

    //debug_log($sid);
    //debug_log($this->db->last_query());

    if($sid < $uid){
        $top_id = $this->session->user_id;
    }
}

$top_id_dd = $this->db_model->select_multi('*', 'member', array('id' => $top_id));
$plan_id = $this->uri->segment('4') ? $this->uri->segment('4') : $top_id_dd->plan_gid;
$pd = $this->db->query("SELECT group_id as id,max_width,
                    GROUP_CONCAT(plan_name SEPARATOR ', ') as plan_name
                    FROM plans
                    where group_id IN (".$plan_id.")
                    GROUP BY 1,2"
                    )->result()[0];;
$width = $pd->max_width;

//debug_log('Tree Details');
//debug_log('$top_id '.$top_id);
//debug_log('$plan_id '.$plan_id);
//debug_log('$width '.$width);

?>

<div class="row">
    <div class="col-sm-4">
        <table class="table">
            <tr>
                <td style="font-size: 12px" width="33.33%">
                    <img src="<?php echo base_url('uploads/site_img/green.png') ?>"><br/>
                    Green User
                </td>
                <td style="font-size: 12px" width="33.33%">
                    <img src="<?php echo base_url('uploads/site_img/new.png') ?>"><br/>
                    No User
                </td>
            </tr>
        </table>
    </div>    
    <div class="col-sm-8">
        <form method="post" action="<?php echo site_url('tree/my_tree_upgrade') ?>">
            <div class="col-sm-4">
                <label>Enter User Id</label>
                <input type="text" name="top_id" class="form-control" value="<?php echo $top_id ?>" required>
            </div>
            <div class="col-sm-4">
                <label>Select Plan</label>
                <select class="form-control" name="plan" required>
                    <option value="<?php echo $plan_id ?>" selected> <?php echo $pd->plan_name; ?> </option>
                    <?php foreach ($plans as $val) {
                        echo '<option value="' . $val['id'] . '">' . $val['plan_name'] . '</option>';
                    } ?>
                </select>
            </div>
            <div class="col-sm-4">
                <button class="btn btn-xs btn-danger" type="submit" style="margin-top: 35px;">Search</button>
            </div>
        </form>
    </div>
    <hr/>
</div> 

<?php if($width==2) { ?>
    <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tbody>
                        <tr>
                            <td colspan="8" align="center"><?php $U = $this->plan_model->create_binary_tree($top_id);
                                echo $U['data'] ?><br/><img src="<?php echo base_url('uploads/site_img/line_bg.gif') ?>"
                                                            class="img-responsive">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4"
                                align="center"><?php $A = $this->plan_model->create_binary_tree($U['A'], $U['id'], 'A');
                                echo $A['data'] ?><br/><img src="<?php echo base_url('uploads/site_img/line_sm.gif') ?>"
                                                            class="img-responsive">
                            </td>
                            <td colspan="4"
                                align="center"><?php $B = $this->plan_model->create_binary_tree($U['B'], $U['id'], 'B');
                                echo $B['data'] ?><br/><img src="<?php echo base_url('uploads/site_img/line_sm.gif') ?>"
                                                            class="img-responsive">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"
                                align="center"><?php $A_1 = $this->plan_model->create_binary_tree($A['A'], $A['id'], 'A');
                                echo $A_1['data'] ?><br/><img src="<?php echo base_url('uploads/site_img/line_sm.gif') ?>"
                                                              class="img-responsive">
                            </td>
                            <td colspan="2"
                                align="center"><?php $A_2 = $this->plan_model->create_binary_tree($A['B'], $A['id'], 'B');
                                echo $A_2['data'] ?><br/><img src="<?php echo base_url('uploads/site_img/line_sm.gif') ?>"
                                                              class="img-responsive">
                            </td>
                            <td colspan="2"
                                align="center"><?php $B_1 = $this->plan_model->create_binary_tree($B['A'], $B['id'], 'A');
                                echo $B_1['data'] ?><br/><img src="<?php echo base_url('uploads/site_img/line_sm.gif') ?>"
                                                              class="img-responsive">
                            </td>
                            <td colspan="2"
                                align="center"><?php $B_2 = $this->plan_model->create_binary_tree($B['B'], $B['id'], 'B');
                                echo $B_2['data'] ?><br/><img src="<?php echo base_url('uploads/site_img/line_sm.gif') ?>"
                                                              class="img-responsive">
                            </td>
                        </tr>
                        <tr>
                            <td align="left"><?php $A1_1 = $this->plan_model->create_binary_tree($A_1['A'], $A_1['id'], 'A');
                                echo $A1_1['data'] ?></td>
                            <td align="right"><?php $A1_2 = $this->plan_model->create_binary_tree($A_1['B'], $A_1['id'], 'B');
                                echo $A1_2['data'] ?></td>
                            <td align="left"><?php $A2_1 = $this->plan_model->create_binary_tree($A_2['A'], $A_2['id'], 'A');
                                echo $A2_1['data'] ?></td>
                            <td align="right"><?php $A2_2 = $this->plan_model->create_binary_tree($A_2['B'], $A_2['id'], 'B');
                                echo $A2_2['data'] ?></td>
                            <td align="left"><?php $B1_1 = $this->plan_model->create_binary_tree($B_1['A'], $B_1['id'], 'A');
                                echo $B1_1['data'] ?></td>
                            <td align="right"><?php $B1_2 = $this->plan_model->create_binary_tree($B_1['B'], $B_1['id'], 'B');
                                echo $B1_2['data'] ?></td>
                            <td align="left"><?php $B2_1 = $this->plan_model->create_binary_tree($B_2['A'], $B_2['id'], 'A');
                                echo $B2_1['data'] ?></td>
                            <td align="right"><?php $B2_2 = $this->plan_model->create_binary_tree($B_2['B'], $B_2['id'], 'B');
                                echo $B2_2['data'] ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
        </div>
<?php } else { ?>

<div class="row">
    <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-borderless">
                    <tbody>
                        <?php 
                        $l1 = $plan_id > 0 ? substr($this->db->query("SELECT SUBSTR(level1,2) as ids from level_details where userid = $top_id and gid =".$plan_id)->result_array()[0]['ids'],0,-1) : substr($this->db->query("SELECT GROUP_CONCAT(SUBSTR(level1,2) SEPARATOR '') as ids FROM level_details where userid =".$top_id)->result_array()[0]['ids'],0,-1);
                        //debug_log($this->db->last_query());
                        $l1_data = strval($l1) > 0 ? $this->db->query("select id from member where secret in (".$l1.") order by field(secret,".$l1.")")->result() : array();
                        $l1_width = count($l1_data) > $width ? count($l1_data) : $width;
                        ?>
                    <tr>
                        <?php $c_width = $width <3 ? pow($l1_width,3) : pow($l1_width,2); ?>
                        <td colspan="<?php echo $c_width; ?>" align="center">
                            <?php $U = $this->plan_model->create_tree($top_id,'','',$plan_id);
                            echo $U['data'] ?><br/>
                            <img src="<?php echo base_url('uploads/site_img/line_bg.gif') ?>" class="img-responsive">
                        </td>
                    </tr>
                    <tr>
                        <?php $c_width = $width <3 ? pow($l1_width,2) : pow($l1_width,1); ?>
                        <?php for ($x = 0; $x <= $l1_width-1; $x++) { ?>
                            <td colspan="<?php echo $c_width; ?>" align="center">
                            <?php if(strlen($l1_data[$x]->id)>2) { ?>
                                    <?php $A = $this->plan_model->create_tree($l1_data[$x]->id,'','',$plan_id);
                                    echo $A['data']; ?>
                                <?php }else { 
                                    echo '<a target="blank" title="Register New Member." href="' . site_url('tree/new_user/'.$top_id.'/') . '"><img style="height: 50px" src="' . base_url('uploads/site_img/new.png') . '"></a><br>' ; ?>
                                <?php } ?>
                                <br/>
                                <img src="<?php echo base_url('uploads/site_img/line_sm.gif') ?>" class="img-responsive">
                                </td>
                        <?php } ?>
                    </tr>
                    <?php if($l1_width <= $width) { ?>
                    <tr>
                        <?php for ($x = 0; $x <= $l1_width-1; $x++) { ?>
                            <?php if(strlen($l1_data[$x]->id)>2) { 
                                $l2 = $plan_id > 0 ? substr($this->db->query("SELECT SUBSTR(level1,2) as ids from level_details where userid = ".$l1_data[$x]->id." and gid =".$plan_id)->result_array()[0]['ids'],0,-1) : substr($this->db->query("SELECT GROUP_CONCAT(SUBSTR(level1,2) SEPARATOR '') as ids FROM level_details where userid =".$l1_data[$x]->id)->result_array()[0]['ids'],0,-1);
                                $l2_data = strval($l2) > 0 ? $this->db->query("select id from member where secret in (".$l2.") order by field(secret,".$l2.")")->result() : array(); ?>
                                <?php $l2_width = count($l2_data) > $width ? count($l2_data) : $width; ?>
                                <?php $c_width = $width <3 ? pow($l2_width,1) : pow($l2width,0); ?>
                                <?php for ($y = 0; $y <= $l2_width-1; $y++) { ?>
                                    <td colspan="<?php echo $c_width; ?>" align="center">
                                        <?php if(strlen($l2_data[$y]->id)>2) { ?>
                                            <?php $A = $this->plan_model->create_tree($l2_data[$y]->id,'','',$plan_id);
                                            echo $A['data']; ?>
                                        <?php }else { 
                                            echo '<a target="blank" title="Register New Member." href="' . site_url('tree/new_user/'.$l1_data[$x]->id.'/') . '"><img style="height: 50px" src="' . base_url('uploads/site_img/new.png') . '"></a><br>' ; ?>
                                        <?php } ?>
                                        <br/>
                                        <?php if($width <3) { ?>
                                            <img src="<?php echo base_url('uploads/site_img/line_sm.gif') ?>" class="img-responsive">
                                        <?php } ?>
                                    </td>
                                <?php } ?>
                            <?php } else { ?>
                                <?php for ($y = 0; $y <= $width-1; $y++) { ?>
                                    <?php $c_width = $width <3 ? pow($width,1) : pow($width,0); ?>
                                    <td colspan="<?php echo $c_width; ?>" align="center">
                                            <?php echo '<a target="blank" title="Register New Member." href="' . site_url('tree/new_user/') . '"><img style="height: 50px" src="' . base_url('uploads/site_img/new.png') . '"></a><br>' ; ?>
                                        <br/>
                                        <?php if($width <3) { ?>
                                            <img src="<?php echo base_url('uploads/site_img/line_sm.gif') ?>" class="img-responsive">
                                        <?php } ?>
                                    </td>
                                <?php } ?>
                        <?php } ?>
                        <?php } ?>
                    </tr>
                    <?php if($width <3) { ?>
                    <tr>
                        <?php for ($x = 0; $x <= $l1_width-1; $x++) { ?>
                            <?php if(strlen($l1_data[$x]->id)>2) { 
                                $l2 = $plan_id > 0 ? substr($this->db->query("SELECT SUBSTR(level1,2) as ids from level_details where userid = ".$l1_data[$x]->id." and gid =".$plan_id)->result_array()[0]['ids'],0,-1) : substr($this->db->query("SELECT GROUP_CONCAT(SUBSTR(level1,2) SEPARATOR '') as ids FROM level_details where userid =".$l1_data[$x]->id)->result_array()[0]['ids'],0,-1);
                                $l2_data = strval($l2) > 0 ? $this->db->query("select id from member where secret in (".$l2.") order by field(secret,".$l2.")")->result() : array(); ?>
                                <?php $l2_width = count($l2_data) > $width ? count($l2_data) : $width; ?>
                                <?php for ($y = 0; $y <= $l2_width-1; $y++) { ?>
                                    <?php if(strlen($l2_data[$y]->id)>2) { 
                                        $l3 = $plan_id > 0 ? substr($this->db->query("SELECT SUBSTR(level1,2) as ids from level_details where userid = ".$l2_data[$y]->id." and gid =".$plan_id)->result_array()[0]['ids'],0,-1) : substr($this->db->query("SELECT GROUP_CONCAT(SUBSTR(level1,2) SEPARATOR '') as ids FROM level_details where userid =".$l2_data[$y]->id)->result_array()[0]['ids'],0,-1);
                                        $l3_data = strval($l3) > 0 ? $this->db->query("select id from member where secret in (".$l3.") order by field(secret,".$l3.")")->result() : array(); ?>
                                        <?php $l3_width = count($l3_data) > $width ? count($l3_data) : $width; ?>
                                        <?php for ($z = 0; $z <= $l3_width-1; $z++) { ?>
                                            <td align="<?php if(fmod($z,2)==0){ echo 'left';} else{echo 'right';} ?>">
                                                <?php if(strlen($l3_data[$z]->id)>2) { ?>
                                                    <?php $A = $this->plan_model->create_tree($l3_data[$z]->id,'','',$plan_id);
                                                    echo $A['data']; ?>
                                                <?php }else { 
                                                echo '<a target="blank" title="Register New Member." href="' . site_url('tree/new_user/'.$l2_data[$y]->id.'/') . '"><img style="height: 50px" src="' . base_url('uploads/site_img/new.png') . '"></a>' ; ?>
                                                <?php } ?>
                                            </td>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <?php for ($z = 0; $z <= $width-1; $z++) { ?>
                                            <td align="<?php if(fmod($z,2)==0){ echo 'left';} else{echo 'right';} ?>">
                                                <?php echo '<a target="blank" title="Register New Member." href="' . site_url('tree/new_user/') . '"><img style="height: 50px" src="' . base_url('uploads/site_img/new.png') . '"></a>' ; ?>
                                            </td>
                                        <?php } ?>
                                    <?php } ?>
                                <?php } ?>
                            <?php } else { ?>
                                <?php for ($y = 0; $y <= $width-1; $y++) { ?>
                                    <?php for ($z = 0; $z <= $width-1; $z++) { ?>
                                        <td align="<?php if(fmod($z,2)==0){ echo 'left';} else{echo 'right';} ?>">
                                                <?php echo '<a target="blank" title="Register New Member." href="' . site_url('tree/new_user/') . '"><img style="height: 50px" src="' . base_url('uploads/site_img/new.png') . '"></a>' ; ?>
                                            </td>
                                        <?php } ?>
                                    <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    </tr>
                    <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php } ?>

<?php } else { ?>
<?php
$top_id = $this->uri->segment('3') ? $this->uri->segment('3') : $this->session->user_id;
$top_id_dd = $this->db_model->select_multi('*', 'member', array('id' => $top_id));
$signup_package = $this->db_model->select('signup_package', 'member', array('id' => $top_id));
$secret_id = $this->db_model->select('secret', 'member', array('id' => $top_id));
$width = $this->db_model->select('max_width', 'plans', array('id' => $signup_package));

$this->db->select('id, topup, status, signup_package')->where(array('position'=>$top_id));
$member = $this->db->get('member')->result();

$width = $top_id == config_item('top_id') ? $this->db_model->select('max_width', 'plans') : $width ;

?>
<div class="row">

    <div class="col-sm-5">
        <table class="table">
            <tr>
                <td style="font-size: 12px" width="33.33%">
                    <img src="<?php echo base_url('uploads/site_img/green.png') ?>"><br/>
                    Green User
                </td>
                <td style="font-size: 12px" width="33.33%">
                    <img src="<?php echo base_url('uploads/site_img/red.png') ?>"><br/>
                    Red User
                </td>
                <td style="font-size: 12px" width="33.33%">
                    <img src="<?php echo base_url('uploads/site_img/new.png') ?>"><br/>
                    No User
                </td>
            </tr>
        </table>
    </div>
    <div class="col-sm-5">
        <form method="post" action="<?php echo site_url('tree/my_tree') ?>">
            <label>Enter User Id</label>
            <input type="text" name="top_id" class="form-control">
            <button class="btn btn-xs btn-danger" type="submit">Search</button>
        </form>
    </div>
    <div class="col-sm-5" style="display: none;">
        <form method="post" action="<?php echo site_url('tree/my_tree') ?>">
            <label>Enter Plan Name</label>
            <input type="text" name="plan" class="form-control">
            <button class="btn btn-xs btn-danger" type="submit">Search</button>
        </form>
    </div>
    <hr/>
</div>
<div class="row">
    <?php if($width == "1") { ?>
        <div class="hr_divider" style="text-align: center"><p>&nbsp;</p>
            <div class="table-responsive" style="overflow-x: auto; text-align: left" id='mono'>
                <table align="center" class="table" style="max-width: 500px">
                    <tr>
                        <td colspan="3" class="alert alert-warning"> 
                            <?php $U = $this->plan_model->create_tree($top_id);
                            echo $U['data'] ?>
                        </td>
                    </tr>
                    <?php
                    if (config_item('inactive_in_tree')=='Yes'){
                        $this->db->select('*')->where(array('secret >'=>$top_id_dd->secret,'signup_package'=>$top_id_dd->signup_package))->order_by(config_item('member_order_by'), 'ASC')->limit(10);
                    }else{
                        $this->db->select('*')->where(array('activate_time >'=>$top_id_dd->activate_time, 'status !='=>'Inactive', 'signup_package'=>$top_id_dd->signup_package))->order_by(config_item('member_order_by'), 'ASC')->limit(10);
                    }
                    $data = $this->db->get('member')->result();
                    foreach ($data as $e) {
                        if ($e->status == 'Active') {
                            if($this->db->count_all('rank_system')>0){
                                $id = $this->db_model->select('id','rank_system',array('rank_name'=>$e->rank));
                                $color = $id >0 ? $id : 'green';
                            }else{ $color = 'green';}
                        }
                        else { $color = 'red';}

                        $total_node = '';

                        if(config_item('sep_tree')=='No'){
                            $total_node = $total_node . 'Plan Name : ' . $this->db_model->select('plan_name','plans', array('id'=>$e->signup_package)) . '<br/> ';
                        }

                        if($this->db->count_all('rank_system')>0){
                            $total_node = $total_node . 'Rank : ' . $e->rank . '<br/> ';
                        }

                        $total_node = $total_node.'Total Downline: ' . ($e->total_downline) . '<br/>';
                        if (config_item('inactive_in_tree')=='Yes'){
                            $total_node = $total_node.'Total Active Downline: ' . ($e->total_active) . '<br/>';
                        }
                        if(config_item('enable_pv')=='Yes'){
                            $total_node = $total_node . 'My Business: ' . ($e->mypv) . '<br/> ';   
                            $total_node = $total_node . 'Downline Business: ' . ($e->downline_pv) . '<br/> ';  
                        }

                        $myimg = $e->my_img ? base_url('uploads/profile/' . $e->my_img) : base_url('uploads/site_img/' . $color . '.png');
                        echo '
                        <tr>
                            <td></td>
                            <td></td>
                            <td style="border-left: 4px dashed #006aeb;">
                                <span style="color: #006aeb"> -----------></span>
                                <span style="text-align: center">
                                    <a href="' . site_url('tree/my_tree/' . $e->id). '" title="' . config_item('ID_EXT') . $e->id . '" style="text-decoration: none; color: ' . $color . '; margin: 5px" data-toggle="popover" data-trigger="hover" data-html="true" data-placement="top" data-content="' . "\n" . $total_node . '<br/>' . "\n\n" . '"><img class="img-circle" style="max-height: 70px" src="' . $myimg . '"><br/>' . $e->name . '<br/>(' . config_item('ID_EXT') . $e->id . ')
                                    </a>
                                </span> 
                            </td>
                        </tr>';
                    }
                    ?>
                </table>
            </div>
        </div>
    <?php } else if (($width == "2") && (count($member) <= $width)) { ?>
        <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tbody>
                        <tr>
                            <td colspan="8" align="center"><?php $U = $this->plan_model->create_binary_tree($top_id);
                                echo $U['data'] ?><br/><img src="<?php echo base_url('uploads/site_img/line_bg.gif') ?>"
                                                            class="img-responsive">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4"
                                align="center"><?php $A = $this->plan_model->create_binary_tree($U['A'], $U['id'], 'A');
                                echo $A['data'] ?><br/><img src="<?php echo base_url('uploads/site_img/line_sm.gif') ?>"
                                                            class="img-responsive">
                            </td>
                            <td colspan="4"
                                align="center"><?php $B = $this->plan_model->create_binary_tree($U['B'], $U['id'], 'B');
                                echo $B['data'] ?><br/><img src="<?php echo base_url('uploads/site_img/line_sm.gif') ?>"
                                                            class="img-responsive">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"
                                align="center"><?php $A_1 = $this->plan_model->create_binary_tree($A['A'], $A['id'], 'A');
                                echo $A_1['data'] ?><br/><img src="<?php echo base_url('uploads/site_img/line_sm.gif') ?>"
                                                              class="img-responsive">
                            </td>
                            <td colspan="2"
                                align="center"><?php $A_2 = $this->plan_model->create_binary_tree($A['B'], $A['id'], 'B');
                                echo $A_2['data'] ?><br/><img src="<?php echo base_url('uploads/site_img/line_sm.gif') ?>"
                                                              class="img-responsive">
                            </td>
                            <td colspan="2"
                                align="center"><?php $B_1 = $this->plan_model->create_binary_tree($B['A'], $B['id'], 'A');
                                echo $B_1['data'] ?><br/><img src="<?php echo base_url('uploads/site_img/line_sm.gif') ?>"
                                                              class="img-responsive">
                            </td>
                            <td colspan="2"
                                align="center"><?php $B_2 = $this->plan_model->create_binary_tree($B['B'], $B['id'], 'B');
                                echo $B_2['data'] ?><br/><img src="<?php echo base_url('uploads/site_img/line_sm.gif') ?>"
                                                              class="img-responsive">
                            </td>
                        </tr>
                        <tr>
                            <td align="left"><?php $A1_1 = $this->plan_model->create_binary_tree($A_1['A'], $A_1['id'], 'A');
                                echo $A1_1['data'] ?></td>
                            <td align="right"><?php $A1_2 = $this->plan_model->create_binary_tree($A_1['B'], $A_1['id'], 'B');
                                echo $A1_2['data'] ?></td>
                            <td align="left"><?php $A2_1 = $this->plan_model->create_binary_tree($A_2['A'], $A_2['id'], 'A');
                                echo $A2_1['data'] ?></td>
                            <td align="right"><?php $A2_2 = $this->plan_model->create_binary_tree($A_2['B'], $A_2['id'], 'B');
                                echo $A2_2['data'] ?></td>
                            <td align="left"><?php $B1_1 = $this->plan_model->create_binary_tree($B_1['A'], $B_1['id'], 'A');
                                echo $B1_1['data'] ?></td>
                            <td align="right"><?php $B1_2 = $this->plan_model->create_binary_tree($B_1['B'], $B_1['id'], 'B');
                                echo $B1_2['data'] ?></td>
                            <td align="left"><?php $B2_1 = $this->plan_model->create_binary_tree($B_2['A'], $B_2['id'], 'A');
                                echo $B2_1['data'] ?></td>
                            <td align="right"><?php $B2_2 = $this->plan_model->create_binary_tree($B_2['B'], $B_2['id'], 'B');
                                echo $B2_2['data'] ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
        </div>
    <?php } 
    else if (($width == "3") && (count($member) <= $width)) { ?>
        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-borderless">
                    <tbody>
                    <tr>
                        <td colspan="9" align="center"><?php $U = $this->plan_model->create_tree($top_id);
                            echo $U['data'] ?><br/><img src="<?php echo base_url('uploads/site_img/line_bg.gif') ?>"
                                                        class="img-responsive">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"
                            align="center"><?php $A = $this->plan_model->create_tree($U['A'], $U['id'], 'A');
                            echo $A['data'] ?><br/><img src="<?php echo base_url('uploads/site_img/line_sm.gif') ?>"
                                                        class="img-responsive">
                        </td>
                        <td colspan="3"
                            align="center"><?php $B = $this->plan_model->create_tree($U['B'], $U['id'], 'B');
                            echo $B['data'] ?><br/><img src="<?php echo base_url('uploads/site_img/line_sm.gif') ?>"
                                                        class="img-responsive">
                        </td>
                        <td colspan="3"
                            align="center"><?php $C = $this->plan_model->create_tree($U['C'], $U['id'], 'C');
                            echo $C['data'] ?><br/><img src="<?php echo base_url('uploads/site_img/line_sm.gif') ?>"
                                                        class="img-responsive">
                        </td>
                    </tr>
                    <tr style="display: none;">
                        <td colspan="1"
                            align="left"><?php $A_1 = $this->plan_model->create_tree($A['A'], $A['id'], 'A');
                            echo $A_1['data'] ?><br/>
                        </td>
                        <td colspan="1"
                            align="center"><?php $A_2 = $this->plan_model->create_tree($A['B'], $A['id'], 'B');
                            echo $A_2['data'] ?><br/>
                        </td>
                        <td colspan="1"
                            align="right"><?php $A_3 = $this->plan_model->create_tree($A['C'], $A['id'], 'C');
                            echo $A_3['data'] ?><br/>
                        </td>
                        <td colspan="1"
                            align="left"><?php $B_1 = $this->plan_model->create_tree($B['A'], $B['id'], 'A');
                            echo $B_1['data'] ?><br/>
                        </td>
                        <td colspan="1"
                            align="center"><?php $B_2 = $this->plan_model->create_tree($B['B'], $B['id'], 'B');
                            echo $B_2['data'] ?><br/>
                        </td>
                        <td colspan="1"
                            align="right"><?php $B_3 = $this->plan_model->create_tree($B['C'], $B['id'], 'C');
                            echo $B_3['data'] ?><br/>
                        </td>
                        <td colspan="1"
                            align="left"><?php $C_1 = $this->plan_model->create_tree($C['A'], $C['id'], 'A');
                            echo $C_1['data'] ?><br/>
                        </td>
                        <td colspan="1"
                            align="center"><?php $C_2 = $this->plan_model->create_tree($C['B'], $C['id'], 'B');
                            echo $C_2['data'] ?><br/>
                        </td>
                        <td colspan="1"
                            align="right"><?php $C_3 = $this->plan_model->create_tree($C['C'], $C['id'], 'C');
                            echo $C_3['data'] ?><br/>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    <?php } 
    else if (($width == "4") && (count($member) <= $width)) { ?>
        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-borderless">
                    <tbody>
                    <tr>
                        <td colspan="16" align="center"><?php $U = $this->plan_model->create_tree($top_id);
                            echo $U['data'] ?><br/><img src="<?php echo base_url('uploads/site_img/line_bg.gif') ?>"
                                                        class="img-responsive">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4"
                            align="center"><?php $A = $this->plan_model->create_tree($U['A'], $U['id'], 'A');
                            echo $A['data'] ?><br/><img src="<?php echo base_url('uploads/site_img/line_sm.gif') ?>"
                                                        class="img-responsive">
                        </td>
                        <td colspan="4"
                            align="center"><?php $B = $this->plan_model->create_tree($U['B'], $U['id'], 'B');
                            echo $B['data'] ?><br/><img src="<?php echo base_url('uploads/site_img/line_sm.gif') ?>"
                                                        class="img-responsive">
                        </td>
                        <td colspan="4"
                            align="center"><?php $C = $this->plan_model->create_tree($U['C'], $U['id'], 'C');
                            echo $C['data'] ?><br/><img src="<?php echo base_url('uploads/site_img/line_sm.gif') ?>"
                                                        class="img-responsive">
                        </td>
                        <td colspan="4"
                            align="center"><?php $D = $this->plan_model->create_tree($U['D'], $U['id'], 'D');
                            echo $D['data'] ?><br/><img src="<?php echo base_url('uploads/site_img/line_sm.gif') ?>"
                                                        class="img-responsive">
                        </td>
                    </tr>
                    <tr style="display: none;">
                        <td colspan="1"
                            align="left"><?php $A_1 = $this->plan_model->create_tree($A['A'], $A['id'], 'A');
                            echo $A_1['data'] ?><br/>
                        </td>
                        <td colspan="1"
                            align="center"><?php $A_2 = $this->plan_model->create_tree($A['B'], $A['id'], 'B');
                            echo $A_2['data'] ?><br/>
                        </td>
                        <td colspan="1"
                            align="center"><?php $A_3 = $this->plan_model->create_tree($A['C'], $A['id'], 'C');
                            echo $A_3['data'] ?><br/>
                        </td>
                        <td colspan="1"
                            align="right"><?php $A_4 = $this->plan_model->create_tree($A['D'], $A['id'], 'D');
                            echo $A_4['data'] ?><br/>
                        </td>
                        <td colspan="1"
                            align="left"><?php $B_1 = $this->plan_model->create_tree($B['A'], $B['id'], 'A');
                            echo $B_1['data'] ?><br/>
                        </td>
                        <td colspan="1"
                            align="center"><?php $B_2 = $this->plan_model->create_tree($B['B'], $B['id'], 'B');
                            echo $B_2['data'] ?><br/>
                        </td>
                        <td colspan="1"
                            align="center"><?php $B_3 = $this->plan_model->create_tree($B['C'], $B['id'], 'C');
                            echo $B_3['data'] ?><br/>
                        </td>
                        <td colspan="1"
                            align="right"><?php $B_4 = $this->plan_model->create_tree($B['D'], $B['id'], 'D');
                            echo $B_4['data'] ?><br/>
                        </td>
                        <td colspan="1"
                            align="left"><?php $C_1 = $this->plan_model->create_tree($C['A'], $C['id'], 'A');
                            echo $C_1['data'] ?><br/>
                        </td>
                        <td colspan="1"
                            align="center"><?php $C_2 = $this->plan_model->create_tree($C['B'], $C['id'], 'B');
                            echo $C_2['data'] ?><br/>
                        </td>
                        <td colspan="1"
                            align="center"><?php $C_3 = $this->plan_model->create_tree($C['C'], $C['id'], 'C');
                            echo $C_3['data'] ?><br/>
                        </td>
                        <td colspan="1"
                            align="right"><?php $C_4 = $this->plan_model->create_tree($C['D'], $C['id'], 'D');
                            echo $C_4['data'] ?><br/>
                        </td>

                        <td colspan="1"
                            align="left"><?php $D_1 = $this->plan_model->create_tree($D['A'], $D['id'], 'A');
                            echo $D_1['data'] ?><br/>
                        </td>
                        <td colspan="1"
                            align="center"><?php $D_2 = $this->plan_model->create_tree($D['B'], $D['id'], 'B');
                            echo $D_2['data'] ?><br/>
                        </td>
                        <td colspan="1"
                            align="center"><?php $D_3 = $this->plan_model->create_tree($D['C'], $D['id'], 'C');
                            echo $D_3['data'] ?><br/>
                        </td>
                        <td colspan="1"
                            align="right"><?php $D_4 = $this->plan_model->create_tree($D['D'], $D['id'], 'D');
                            echo $D_4['data'] ?><br/>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    <?php } 
    else if (($width == "5") && (count($member) <= $width)) { ?>
        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-borderless">
                    <tbody>
                    <tr>
                        <td colspan="20" align="center"><?php $U = $this->plan_model->create_tree($top_id);
                            echo $U['data'] ?><br/><img src="<?php echo base_url('uploads/site_img/line_bg.gif') ?>"
                                                        class="img-responsive">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4"
                            align="center"><?php $A = $this->plan_model->create_tree($U['A'], $U['id'], 'A');
                            echo $A['data'] ?><br/>
                        </td>
                        <td colspan="4"
                            align="center"><?php $B = $this->plan_model->create_tree($U['B'], $U['id'], 'B');
                            echo $B['data'] ?><br/>
                        </td>
                        <td colspan="4"
                            align="center"><?php $C = $this->plan_model->create_tree($U['C'], $U['id'], 'C');
                            echo $C['data'] ?><br/>
                        </td>
                        <td colspan="4"
                            align="center"><?php $D = $this->plan_model->create_tree($U['D'], $U['id'], 'D');
                            echo $D['data'] ?><br/>
                        </td>
                        <td colspan="4"
                            align="center"><?php $E = $this->plan_model->create_tree($U['E'], $U['id'], 'E');
                            echo $E['data'] ?><br/>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    <?php } else if (count($member)<=10) { ?>
        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-borderless">
                    <tbody>
                    <?php 
                    $query = $this->db->query("select * from member where position = ".$top_id." order by ".config_item('member_order_by'). " ASC");
                    $data = $query->result(); ?>
                    <tr>
                        <td colspan="<?php echo $query->num_rows()*3; ?>" align="center"><?php $U = $this->plan_model->create_tree($top_id);
                            echo $U['data'] ?><br/><img src="<?php echo base_url('uploads/site_img/line_bg.gif') ?>" class="img-responsive">
                        </td>
                    </tr>
                    <tr>
                        <?php foreach ($data as $value) { ?>
                            <td colspan="3" align="center">
                                <?php $A = $this->plan_model->create_tree($value->id);
                                echo $A['data'] ?><br/>
                            </td>
                        <?php } ?>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    <?php } else {?>
        <div class="hr_divider" style="text-align: center"><p>&nbsp;</p>
            <div class="table-responsive" style="overflow-x: auto; text-align: left" id="table">
                <table align="center" class="table" style="max-width: 500px">
                    <tr>
                        <td colspan="3" class="alert alert-warning"> 
                            <?php $U = $this->plan_model->create_tree($top_id);
                            echo $U['data'] ?>
                        </td>
                    </tr>
                    <?php
                    $this->db->select('*')->where(array('position'=>$top_id))
                    ->order_by(config_item('member_order_by'), 'ASC');
                    $data = $this->db->get('member')->result();
                    foreach ($data as $e) {
                        if ($e->status == 'Active') {
                            if($this->db->count_all('rank_system')>0){
                                $id = $this->db_model->select('id','rank_system',array('rank_name'=>$e->rank));
                                $color = $id >0 ? $id : 'green';
                            }else{ $color = 'green';}
                        }
                        else { $color = 'red';}

                        $total_node = '';

                        if(config_item('sep_tree')=='No'){
                            $total_node = $total_node . 'Plan Name : ' . $this->db_model->select('plan_name','plans', array('id'=>$e->signup_package)) . '<br/> ';
                        }

                        if($this->db->count_all('rank_system')>0){
                            $total_node = $total_node . 'Rank : ' . $e->rank . '<br/> ';
                        }

                        $total_node = $total_node.'Total Downline: ' . ($e->total_downline) . '<br/>';
                        if (config_item('inactive_in_tree')=='Yes'){
                            $total_node = $total_node.'Total Active Downline: ' . ($e->total_active) . '<br/>';
                        }
                        if(config_item('enable_pv')=='Yes'){
                            $total_node = $total_node . 'My Business: ' . ($e->mypv) . '<br/> ';   
                            $total_node = $total_node . 'Downline Business: ' . ($e->downline_pv) . '<br/> ';  
                        }
                        $myimg = $e->my_img ? base_url('uploads/profile/' . $e->my_img) : base_url('uploads/site_img/' . $color . '.png');
                        echo '
                        <tr>
                            <td></td>
                            <td></td>
                            <td style="border-left: 4px dashed #006aeb;">
                                <span style="color: #006aeb"> -----------></span>
                                <span style="text-align: center">
                                    <a href="' . site_url('tree/my_tree/' . $e->id). '" title="' . config_item('ID_EXT') . $e->id . '" style="text-decoration: none; color: ' . $color . '; margin: 5px" data-toggle="popover" data-trigger="hover" data-html="true" data-placement="top" data-content="' . "\n" . $total_node . '<br/>' . "\n\n" . '"><img class="img-circle" style="max-height: 70px" src="' . $myimg . '"><br/>' . $e->name . '<br/>(' . config_item('ID_EXT') . $e->id . ')
                                    </a>
                                </span> 
                            </td>
                        </tr>';
                    }
                    ?>
                </table>
            </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function () {

                var page_height = document.getElementById('content').offsetHeight;
                var sidebar_height = document.getElementById('aside').offsetHeight;
                var table_height = document.getElementById('table').offsetHeight+600;
                
                document.getElementById("aside").setAttribute('style', 'height:' + table_height + 'px' + '!important');
                document.getElementById("content").setAttribute('style', 'height:' + table_height + 'px' + '!important');
                                
            });
        </script> 


    <?php } ?>
</div>

<?php } ?>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("tree").classList.add('active');
        document.querySelector("#tree > ul > li:nth-child(1) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>

<?php if(config_item('width')=='1'){ ?>
    <script type="text/javascript">
        $(document).ready(function () {

            var page_height = document.getElementById('content').offsetHeight;
            var sidebar_height = document.getElementById('aside').offsetHeight;
            var mono_height = document.getElementById('mono').offsetHeight+600;
            
            document.getElementById("aside").setAttribute('style', 'height:' + mono_height + 'px' + '!important');
            document.getElementById("content").setAttribute('style', 'height:' + mono_height + 'px' + '!important');
            
        });
    </script>    
<?php } ?>




