<?php

?>
<div class="table-responsive">
    <table class="table table-striped table-bordered" style="font-size:13px" id="DTable" data-page-length='100' data-name="approved_kyc_list" data-export='Yes'>
        <thead>
        <tr>
            <th>SI NO</th>
            <th>User ID</th>
            <th>User Name</th>
            <!-- <th>PAN Number</th>
            <th>Bank A/C No</th>
            <th>Bank IFSC</th> -->
            <!--<th>Aadhar Number</th>-->
            <th class="noExport">User Photo</th>
            <th class="noExport">ID Proof</th>
            <!--<th>Address Proof</th>-->
            <th class="noExport">Status</th>
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
                <!-- <td><?php echo $e['tax_no']; ?></td>
                <td><?php echo $e['bank_ac_no']; ?></td>
                <td><?php echo $e['bank_ifsc']; ?></td> -->
                <!--<td><?php echo $e['aadhar_no']; ?></td>-->

                <td><a href="<?php echo base_url('uploads/kyc/' . $e['id_proof']); ?>"><img src="<?php echo $e['id_proof'] ? base_url('uploads/kyc/' . $e['id_proof']) : base_url('uploads/default.jpg'); ?>"
                         class="img-thumbnail img-responsive" style="max-height: 100px"></a></td>
                <!--<td><a href="<?php echo base_url('uploads/kyc/' . $e['add_proof']); ?>"><img src="<?php echo $e['add_proof'] ? base_url('uploads/kyc/' . $e['add_proof']) : base_url('uploads/default.jpg'); ?>"
                         class="img-thumbnail img-responsive" style="max-height: 100px"></a></td>-->
                <td><a href="<?php echo base_url('uploads/kyc/' . $e['cheque']); ?>"><img class="zoom" src="<?php echo $e['cheque'] ? base_url('uploads/kyc/' . $e['cheque']) : base_url('uploads/default.jpg'); ?>"
                         class="img-thumbnail img-responsive" style="max-height: 100px"></a></td>
                <td><?php echo $e['status']; ?></td>
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
        document.querySelector("#kyc > ul > li:nth-child(2) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>
