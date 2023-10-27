<?php

?>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr>
            <th>SN</th>
            <th>User ID/Vendor ID</th>
            <th>Name</th>
            <th>User Type</th>
            <th>Ticket Subject</th>
            <th>Date</th>
            <th style="background-color: #d6e9c6">Status</th>
            <th>#</th>
        </tr>
        <?php
        $sn = 1;
        foreach ($data as $e) { ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <?php if($e->userid!=""){?>
                <td><?php echo config_item('ID_EXT') . $e->userid; ?></td>
                <?php } else if($e->vendor_id!=""){ ?>
                <td><?php echo config_item('ID_EXT') . $e->vendor_id; ?></td>  
                <?php } ?>
                <?php if($e->userid!=""){?>
                <td><?php echo $this->db_model->select('name', 'member', array('id' => $e->userid)); ?></td>
                <?php } else if($e->vendor_id!=""){ ?>
                <td><?php echo $this->db_model->select('name', 'vendor', array('vendor_id' => $e->vendor_id)); ?></td>  
                <?php } ?>
                <td><?php echo $e->user_type; ?></td>  

                <td><?php echo $e->ticket_title; ?></td>
                <td><?php echo date("Y-m-d h:i A",strtotime($e->date)); ?></td>
                <td style="background-color: #d6e9c6"><?php echo $e->status; ?></td>
                <td><a href="<?php echo site_url('ticket/view/' . $e->id) ?>" class="btn btn-xs btn-danger">View</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("support").classList.add('active');
        document.querySelector("#support > ul > li:nth-child(1) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>