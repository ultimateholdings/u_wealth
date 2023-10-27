<div class="row" style="float: right; margin-bottom: 10px;">
   <div class="col-md-12">
     <form method="post" action='export_list_member'>
         <input type="submit"  name="export_list_member" value="Download Full Member Details" class="btn btn-primary pull-right" />
    </form>
  </div> <!-- File upload form-->
   <div>&nbsp;</div>
</div>
<div class="table-responsive" style="width: 100%;">
<table class="display table table-striped table-bordered" style="font-size:13px;margin-top: 10px;" id="DTable" data-name="member_list" data-page-length='100'>
        <thead>
        <tr>
            <th>SN</th>
            <th>User ID</th>
            <th>Name</th>
            <th>Sponsor ID</th>
            <th>Plan Name</th>
            <th>Earnings</th>
            <th>Phone</th>
            <th class="datefilter">Join Date</th>
            <th>Total Downline</th>
            <th class="noExport">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sn = count($members);
        foreach ($members as $e) { ?>
            <tr>
                <td><?php echo $sn--; ?></td>
                <td><a href="<?php echo site_url('users/user_detail/' . $e['id']) ?>"
                       target="_blank"><?php echo config_item('ID_EXT') . $e['id']; ?></a></td>
                <td><?php echo $e['name']; ?></td>
                <td><a href="<?php echo site_url('users/user_detail/' . $e['sponsor']) ?>"
                       target="_blank"><?php echo $e['sponsor'] ? config_item('ID_EXT') . $e['sponsor'] : ''; ?></td>
                <td>

                    <?php /*if (config_item('enable_based_pv')=='Yes') { ?>
                        <?php
                            $md=$this->db_model->select_multi('*','member',array('id'=>$e['id']));
                            $package_details=$this->gmlm_model->get_current_package($md);
                            echo !empty($package_details->plan_name) ? $package_details->plan_name : $this->db_model->select('plan_name', 'plans', array('id' => $e['signup_package']));
                        ?>
                          
                    <?php } else {*/ ?>

                            <?php echo $this->db_model->select('plan_name', 'plans', array('id' => $e['signup_package'])); ?>
                      
                    <?php //}?>

                </td>
                <td><?php $data=$this->db_model->sum('amount', 'earning', array('userid' => $e['id']));
                $data = $data > 0 ? $data : 0;
                echo config_item('currency') . $data; ?>
                </td>
                <td><?php echo $e['phone']; ?></td>
                <td><?php echo date('Y-m-d', strtotime($e['activate_time'])); ?></td>
                <td><?php echo($e['total_downline']); ?></td>
               <td>
                <div style="display: flex;" >
                <a href="<?php echo site_url('users/user_detail/' . $e['id']); ?>" class="btn btn-warning btn-sm " style="margin-right: 10px;">View</a>
                <a href="<?php echo site_url('users/edit_user/' . $e['id']); ?>" class="btn btn-info btn-sm" style="margin-right: 10px;" >Edit</a>
                <a href="<?php echo site_url('users/login_member/' . $e['id']); ?>" target="_blank"
                   class="btn btn-danger btn-sm">Login</a>
                    </div>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
        
</div>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>
</div>
<br><br>
<?php if($title == 'Search Results'){ ?>
<a href="<?php echo site_url('users/search_user') ?>" class="btn btn-xs btn-danger">&larr; Go Back</a>
<?php } else { ?>
<a href="<?php echo site_url('admin') ?>" class="btn btn-xs btn-danger">&larr; Go Back</a>
<?php } ?>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("members").classList.add('active');
        document.querySelector("#members > ul > li:nth-child(1) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>