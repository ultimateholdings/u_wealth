<?php
$this->db->select('*')->from('rewards');
$data = $this->db->get()->result();
?>
<!DOCTYPE html>
<html>
<head>
<style>
.nav-tabs-custom {
    margin-bottom: 20px;
    background: #fff;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
    border-radius: 3px;
}
.content {
    min-height: 250px;
    padding: 15px;
    margin-right: auto;
    margin-left: auto;
    padding-left: 15px;
    padding-right: 15px;
}
.row {
    margin-right: -15px;
    margin-left: -15px;
    width:100%;
    padding-left: 20px;
}
.col-md-12{
    position: relative;
    min-height: 1px;
    position: relative;
    border-radius: 3px;
    background: #ffffff;
    border-top: 3px solid #d2d6de;
    margin-bottom: 20px;
    width: 100%;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
}
.box {
    position: relative;
    border-radius: 3px;
    background: #ffffff;
    border-top: 3px solid #d2d6de;
    margin-bottom: 20px;
    width: 100%;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
}
.box-header {
    color: #444;
    display: block;
    padding: 10px;
    padding-top: 10px;
    padding-right: 10px;
    padding-bottom: 10px;
    padding-left: 10px;
    position: relative;
}
.h3{
    font-family: 'Source Sans Pro',sans-serif;
}
.collapse.in {
    display: block;
}
.box-body {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    padding: 10px;
}
.col-md-3{
    position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}
.form-group {
    margin-bottom: 15px;
}
.label{
    display: inline-block;
    max-width: 100%;
    margin-bottom: 5px;
    font-weight: 700;
}
.form-control {
    border-radius: 0;
    box-shadow: none;
    border-color: #d2d6de;
}
.@media screen and (max-width: 767px)
table-responsive{
    width: 100%;
    margin-bottom: 5px;
    overflow-y: hidden;
    border: 1px solid #ddd;
}
</style>
</head>
<body>
<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box  box-primary " id="accordion">
            <div class="box-header with-border" style="cursor: pointer;">
                <h3 class="box-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseFilter">
                    <i class="fa fa-filter" aria-hidden="true"></i>  Filters
                  </a>
                </h3>
            </div>
        </div>
    <div id="collapseFilter" class="panel-collapse active collapse  in " aria-expanded="true">
        <div class="box-body">
            <div class="row">
                <form method="post" action="<?php echo site_url('income/search_rewards') ?>">
                    <div class="col-sm-6">
                        <label>Enter User Id</label>
                        <input type="text" name="user_id" class="form-control">
                    </div>
                    <div class="col-sm-6">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option selected>All</option>
                            <option>Pending</option>
                            <option>Delivered</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label>Start Date</label>
                        <input type="text" readonly class="form-control datepicker" name="sdate">
                    </div>
                    <div class="col-sm-6">
                        <label>End Date</label>
                        <input type="text" readonly class="form-control datepicker" name="edate">
                        <br/>
                        <button type="submit" class="btn btn-primary" style="text-align: center;">Search &rarr;</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
           <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#member_list_tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-cubes" aria-hidden="true"></i> All Rewards</a>
                </li>
            </ul>
        </div>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr style="font-weight: bold">
                    <td>S.N.</td>
                    <td>User ID</td>
                    <td>Reward Name</td>
                    <?php if(config_item('width')=='2') { ?>
                    <td>A</td>
                    <td>B</td>
                    <?php } else { ?>
                    <td>Downline Value</td>
                    <?php } ?>
                    <?php if(config_item('enable_pv')=='Yes') { ?>
                    <td>My PV </td>
                    <?php } ?>
                    <td>Achieve Date</td>
                    <td>Paid Date</td>
                    <td>Details</td>
                    <td>#</td>
                </tr>
                </thead>
                <tbody>
                <?php
                $sn = 1;
                foreach ($data as $e) {

                    ?>
                    <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo config_item('ID_EXT') . $e->userid ?></td>
                        <?php $reward_details = $this->db_model->select_multi('*', 'reward_setting', array('id' => $e->reward_id)) ?>
                        <td><?php echo $reward_details->reward_name ?></td>
                        <?php if($reward_details->type=='Downline') { ?>
                        <?php if(config_item('width')=='2') { ?>
                        <td><?php echo $reward_details->A; ?></td>
                        <td><?php echo $reward_details->B; ?></td>
                        <?php if(config_item('enable_pv')=='Yes') { ?>
                        <td>--</td>
                        <?php } ?>
                        <?php } else { ?>
                        <td><?php echo $reward_details->total_downline; ?> </td>
                        <?php if(config_item('enable_pv')=='Yes') { ?>
                        <td>--</td>
                        <?php } ?>
                        <?php } } else {?>
                        <?php if(config_item('width')=='2') { ?>
                        <td>--</td>
                        <td>--</td>
                        <?php if(config_item('enable_pv')=='Yes') { ?>
                        <td><?php echo $reward_details->mypv; ?></td>
                        <?php } ?>
                        <?php } else { ?>
                        <td>--</td>
                        <?php if(config_item('enable_pv')=='Yes') { ?>
                        <td><?php echo $reward_details->mypv; ?></td>
                        <?php } ?>
                        <?php }}?>
                        <td><?php echo date("Y-m-d",strtotime($e->date)); ?></td>
                        <?php if ($e->status == "Pending") { ?>
                        <td>--</td>
                        <?php } else{ ?>    
                        <td><?php echo date("Y-m-d",strtotime($e->paid_date)); ?></td>
                        <?php } ?>
                        <td><?php echo $e->tid ?></td>
                        <td>
                            <?php if ($e->status == "Pending") { ?>
                                <a data-toggle="modal" data-target="#myModal"
                                   onclick="document.getElementById('payid').value='<?php echo $e->id ?>'"
                                   class="btn btn-primary btn-xs">Pay</a>
                            <?php } ?>
                            <a href="<?php echo site_url('income/reward_remove/' . $e->id) ?>" class="btn btn-danger btn-xs"
                               onclick="return confirm('Are you sure want to delete this reward ?')">Delete</a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
    </div>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>
</div>
</div>
</div>
</section>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Delivery Detail</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('income/reward_pay') ?>
                <label>Enter Delivery/Courier Detail</label>
                <input type="hidden" name="payid" value="" id="payid">
                <textarea class="form-control" name="tdetail"></textarea>
                <div class="pull-right">
                    <button type="submit" class="btn btn-success">Pay Reward Now</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("rewards").classList.add('active');
        document.querySelector("#rewards > ul > li:nth-child(2) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>