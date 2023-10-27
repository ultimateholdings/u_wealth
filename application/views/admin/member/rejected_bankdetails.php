<?php

?>
<div class="table-responsive">
    <table class="table table-striped table-bordered" style="font-size:13px" id="DTable" data-page-length='100' data-name="rejected_bankdetils_list" data-export='Yes'>
        <thead>
        <tr>
            <th>SI NO</th>
            <th>User ID</th>
            <th>Name</th>
            <th>Payment Method </th>
            <th>Bank Name</th>
            <th>Bank A/C No</th>
            <th>Bank Branch</th>
            <th>Bank Branch Code</th>
            <th>Account Type</th>
            <th>Network Carrier</th>
            <th>Mobile Money No</th>
            <th>Mobile Money Name</th>
            <th>Status</th>
            <th>Comments</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sn = 1;
        foreach ($rejected_bankdetails as $e) { ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo config_item('ID_EXT') . $e['userid']; ?></td>
                <td><?php echo $this->db_model->select('name', 'member', array('id' => $e['userid'])); ?></td>
                <td><?php 
                    if($e['payment_type']== 1)
                    {
                        echo "Bank";
                    }
                    else
                    {
                        echo "Mobile Money";
                    }
                ?></td>
                <td><?php 
                    if($e['bank_name']==NULL)
                    {
                        echo "---";
                    }
                    else
                    {
                        echo $e['bank_name'];
                    }
                ?></td>
                <td><?php 
                    if($e['bank_ac_no']==NULL)
                    {
                        echo "---";
                    }
                    else
                    {
                        echo $e['bank_ac_no'];
                    }
                ?></td>
                <td><?php 
                    if($e['bank_branch']==NULL)
                    {
                        echo "---";
                    }
                    else
                    {
                        echo $e['bank_branch'];
                    }
                ?></td>
                <td><?php 
                    if($e['bank_branch_code']==NULL)
                    {
                        echo "---";
                    }
                    else
                    {
                        echo $e['bank_branch_code'];
                    }
                ?></td>
                <td><?php 
                    if($e['account_type']==NULL)
                    {
                        echo "---";
                    }
                    else
                    {
                        echo $e['account_type'];
                    }
                ?></td>
                <td><?php 
                    if($e['network_carrier']==NULL)
                    {
                        echo "---";
                    }
                    else
                    {
                        echo $e['network_carrier'];
                    }
                ?></td>
                <td><?php 
                    if($e['mobile_no']==NULL)
                    {
                        echo "---";
                    }
                    else
                    {
                        echo $e['mobile_no'];
                    }
                ?></td>
                <td><?php 
                    if($e['mobile_name']==NULL)
                    {
                        echo "---";
                    }
                    else
                    {
                        echo $e['mobile_name'];
                    }
                ?></td>
                <td><a href="#" class="btn btn-warning btn-sm"><?php echo $e['status']; ?></a></td>
                <td><?php echo $e['comment_admin']; ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>
</div>

<a href="<?php echo site_url('admin') ?>" class="btn btn-xs btn-danger">&larr; Go Back</a>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("kyc").classList.add('active');
        document.querySelector("#kyc > ul > li:nth-child(3) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>
