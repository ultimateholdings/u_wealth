<style type="text/css">
    .zoom:hover {
    transform: scale(3.5);
    }
</style>
<div class="table-responsive" >
    <table class="table table-striped table-bordered" style="font-size:13px;" id="DTable" data-page-length='100' data-name="pending_bankdetils_list" data-export='Yes'>
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
            <th class="noExport">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sn = 1;
        foreach ($members as $e) { ?>
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
<!--                 <td><?php echo $e['bank_name']; ?></td>
                <td><?php echo $e['bank_ac_no']; ?></td>
                <td><?php echo $e['bank_branch']; ?></td>
                <td><?php echo $e['bank_branch_code']; ?></td>
                <td><?php echo $e['account_type']; ?></td> -->
                <td><?php echo $e['status']; ?></td>
               
                <td>
                    <div style="display: flex;">
                        
                    <a href="<?php echo site_url('users/approve_bankdetails/' . $e['id'] .'/'.$e['userid']); ?>" class="btn btn-success btn-sm mr-1">Approve</a>
                    <a href="<?php echo site_url('users/edit_bankdetails/' . $e['id'] .'/'.$e['userid']); ?>" class="btn btn-info btn-xs">Edit</a>

                    <a  data-toggle="modal" data-target="#kyc_modal"
                           onclick="document.getElementById('id').value='<?php echo $e['id'] ?>'"
                           class="btn btn-danger btn-sm" >Resubmit</a> 
                    
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

<a href="<?php echo site_url('admin') ?>" class="btn btn-xs btn-danger">&larr; Go Back</a>

<div class="modal fade" id="kyc_modal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <?php echo form_open('users/reject_bankdetails') ?>
            <div class="modal-header">
                 <h4 class="modal-title">Please Provide Comments!!</h4>

                <button type="button" class="close" data-dismiss="modal">&times;</button>
                           </div>
            <div class="modal-body">
                <label>Enter Comments for the member</label>
                <input type="hidden" name="id" id="id">
                <textarea class="form-control" name="comments" required></textarea>

            </div>
            <div class="modal-footer">
                 <button type="submit" class="btn  btn-success pull-left mt-2 mb-2">Resubmit</button>   
                 <button type="button" class="btn btn-warning pull-right mt-2 mb-2" data-dismiss="modal">Close</button>
             </div>
        
            <?php echo form_close() ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("kyc").classList.add('active');
        document.querySelector("#kyc > ul > li:nth-child(1) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>
