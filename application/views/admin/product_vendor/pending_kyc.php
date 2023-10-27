<?php

?>
<div class="table-responsive">
    <table class="table table-striped table-bordered" style="font-size:13px">
        <tr>
            <th>SI NO</th>
            <th>Vendor ID</th>
            <th>Vendor Name</th>
            <th>Aadhar Number</th>
            <th>ID Proof</th>
            <th>Address Proof</th>
            <!--<th>Consent Video</th>-->
            <th>Cheque</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php
        $sn = 1;
        foreach ($vendors as $e) { ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo config_item('ID_EXT') . $e['vendor_id']; ?></td>
                <td><?php echo $this->db_model->select('name', 'vendor', array('vendor_id' => $e['vendor_id'])); ?></td>
                <td><?php echo $e['aadhar_no']; ?></td>

                <td><a href="<?php echo base_url('uploads/kyc/' . $e['id_proof']); ?>"><img src="<?php echo $e['id_proof'] ? base_url('uploads/kyc/' . $e['id_proof']) : base_url('uploads/default.jpg'); ?>"
                         class="img-thumbnail img-responsive" style="max-height: 100px"></a></td>
                <td><a href="<?php echo base_url('uploads/kyc/' . $e['add_proof']); ?>"><img src="<?php echo $e['add_proof'] ? base_url('uploads/kyc/' . $e['add_proof']) : base_url('uploads/default.jpg'); ?>"
                         class="img-thumbnail img-responsive" style="max-height: 100px"></a></td>
                <!--<td><?php $video=$this->db_model->select('video', 'member', array('id' => $e['userid'])); ?>
                   <video width="120" height="120" controls>
                      <source src="<?php echo base_url('uploads/profile/'.$video)?>" type="video/mp4">
                   </video>
               </td>-->
                <td><a href="<?php echo base_url('uploads/kyc/' . $e['cheque']); ?>"><img src="<?php echo $e['cheque'] ? base_url('uploads/kyc/' . $e['cheque']) : base_url('uploads/default.jpg'); ?>"
                         class="img-thumbnail img-responsive" style="max-height: 100px"></a></td>
                <td><?php echo $e['status']; ?></td>
                <td>

                    <a href="<?php echo site_url('Manage_vendor/approve_kyc/' . $e['id'] .'/'.$e['vendor_id']); ?>" class="btn btn-warning btn-xs">Approve</a>
                    <a href="<?php echo site_url('Manage_vendor/reject_kyc/' . $e['id'] .'/'.$e['vendor_id']); ?>" class="btn btn-danger btn-xs">Reject</a>
                    
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>
</div>

<a href="<?php echo site_url('admin') ?>" class="btn btn-xs btn-danger">&larr; Go Back</a>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("vendors").classList.add('active');
        document.querySelector("#vendors > ul > li:nth-child(5) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>
