<?php

?>
<hr/>
<div class="table-responsive">
    <table class="table table-bordered" id="DTable" data-name="reward_list" data-export = 'Yes'>
        <thead>
        <tr style="font-weight: bold">
            <th>S.N.</th>
            <th>User ID</th>
            <th>Reward Name</th>
            <?php if(config_item('width')=='2') { ?>
            <th>A</th>
            <th>B</th>
            <?php } else { ?>
            <th>Downline Value</th>
            <?php } ?>
            <?php if(config_item('enable_pv')=='Yes') { ?>
            <th>My PV </th>
            <?php } ?>
            <th class="datefilter">Achieve Date</th>
            <th>Paid Date</th>
            <th>Details</th>
            <th class="noExport">#</th>
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
                           class="btn btn-primary btn-sm"   style="color: white;">Pay</a>
                        <a href="<?php echo site_url('income/reward_remove/' . $e->id) ?>" class="btn btn-danger btn-sm"
                       onclick="return confirm('Are you sure want to delete this reward ?')">Delete</a>
                    <?php } ?>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                 <h4 class="modal-title">Delivery Detail</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
               
            </div>
            <div class="modal-body">
                <?php echo form_open('income/reward_pay') ?>
                <label>Enter Delivery/Courier Detail</label>
                <input type="hidden" name="payid" value="" id="payid">
                <textarea class="form-control" name="tdetail"></textarea> 
                <div class="pull-left" style="margin-top: 10px;">
                    <button type="submit" class="btn btn-success">Pay Reward Now</button>

                </div>
                <div class="pull-right" style="margin-top: 10px;">
                     <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                    
                </div>
                <?php echo form_close() ?>
            </div>
           
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("rewards").classList.add('active');
        document.querySelector("#rewards > ul > li:nth-child(1) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>