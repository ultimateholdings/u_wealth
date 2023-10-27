
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
        <form method="post" action="<?php echo site_url('tree/my_unilevel_tree') ?>">
            <label>Enter User Id</label>
            <input type="text" name="top_id" class="form-control">
            <button class="btn btn-xs btn-danger" type="submit">Search</button>
        </form>
    </div>
    <div class="col-sm-5" style="display: none;">
        <form method="post" action="<?php echo site_url('tree/my_unilevel_tree') ?>">
            <label>Enter Plan Name</label>
            <input type="text" name="plan" class="form-control">
            <button class="btn btn-xs btn-danger" type="submit">Search</button>
        </form>
    </div>
    <hr/>
</div>



<div class="row">
    <?php if (count($member)<=10) { ?>
        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-borderless">
                    <tbody>
                    <?php 
                    $query = $this->db->query("select * from member where sponsor = ".$top_id." order by ".config_item('member_order_by'). " ASC");
                    $data = $query->result(); ?>
                    <tr>
                        <td colspan="<?php echo $query->num_rows()*3; ?>" align="center"><?php $U = $this->plan_model->create_tree_unilevel($top_id);
                            echo $U['data'] ?><br/><img src="<?php echo base_url('uploads/site_img/line_bg.gif') ?>" class="img-responsive">
                        </td>
                    </tr>
                    <tr>
                        <?php foreach ($data as $value) { ?>
                            <td colspan="3" align="center">
                                <?php $A = $this->plan_model->create_tree_unilevel($value->id);
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

                            <?php $U = $this->plan_model->create_tree_unilevel($top_id);
                            echo $U['data'] ?>
                        </td>
                    </tr>
                    <?php
                    $this->db->select('*')->where(array('sponsor'=>$top_id))
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
                                    <a href="' . site_url('tree/my_unilevel_tree/' . $e->id). '" title="' . config_item('ID_EXT') . $e->id . '" style="text-decoration: none; color: ' . $color . '; margin: 5px" data-toggle="popover" data-trigger="hover" data-html="true" data-placement="top" data-content="' . "\n" . $total_node . '<br/>' . "\n\n" . '"><img class="img-circle" style="max-height: 70px" src="' . $myimg . '"><br/>' . $e->name . '<br/>(' . config_item('ID_EXT') . $e->id . ')
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



<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("tree").classList.add('active');
        document.querySelector("#tree > ul > li:nth-child(2) > a > span").setAttribute('style', 'color: darkorange !important;');
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