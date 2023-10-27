<style type="text/css">
    .zoom:hover {
    transform: scale(3.5);
    }
</style>
<div class="table-responsive" >
    <table class="table table-striped table-bordered" style="font-size:13px;" id="DTable" data-page-length='100' data-name="pending_kyc_list" data-export='Yes'>
        <thead>
        <tr>
            <th>SI NO</th>
            <th>User ID</th>
            <th>Name</th>
            <!-- <th>PAN Number</th> -->
            <!--<th>Aadhar Number</th>-->
<!--             <th>Bank A/C No</th>
            <th>Bank IFSC</th> -->
            <th>Status</th>
            <th class="noExport">User Photo</th>
            <!--<th>Aadhar Photo</th>-->
            <th class="noExport">ID Proof</th>
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
<!--                 <td><?php echo $e['tax_no']; ?></td> -->
                <!--<td><?php echo $e['aadhar_no']; ?></td>-->
<!--                 <td><?php echo $e['bank_ac_no']; ?></td>
                <td><?php echo $e['bank_ifsc']; ?></td> -->
                <td><?php echo $e['status']; ?></td>
                <td><a href="<?php echo base_url('uploads/kyc/' . $e['id_proof']); ?>"><img class="zoom" src="<?php echo $e['id_proof'] ? base_url('uploads/kyc/' . $e['id_proof']) : base_url('uploads/default.jpg'); ?>"
                         class="img-thumbnail img-responsive" style="max-height: 100px"></a></td>
                <!--<td><a href="<?php echo base_url('uploads/kyc/' . $e['add_proof']); ?>"><img class="zoom" src="<?php echo $e['add_proof'] ? base_url('uploads/kyc/' . $e['add_proof']) : base_url('uploads/default.jpg'); ?>"
                         class="img-thumbnail img-responsive" style="max-height: 100px"></a></td>    -->
                <!--<td><?php $video=$this->db_model->select('video', 'member', array('id' => $e['userid'])); ?>
                   <video width="120" height="120" controls>
                      <source src="<?php echo base_url('uploads/profile/'.$video)?>" type="video/mp4">
                   </video>
               </td>-->
                <td><a href="<?php echo base_url('uploads/kyc/' . $e['cheque']); ?>"><img class="zoom" src="<?php echo $e['cheque'] ? base_url('uploads/kyc/' . $e['cheque']) : base_url('uploads/default.jpg'); ?>"
                         class="img-thumbnail img-responsive" style="max-height: 100px"></a></td>
                <td>
                    <div style="display: flex;">
                        
                    <a href="<?php echo site_url('users/approve_kyc/' . $e['id'] .'/'.$e['userid']); ?>" class="btn btn-success btn-sm mr-1">Approve</a>
                    <a  data-toggle="modal" data-target="#kyc_modal"
                           onclick="document.getElementById('userid').value='<?php echo $e['userid'] ?>'"
                           class="btn btn-danger btn-sm" >Resubmit</a> 
                    <!--<a href="<?php echo site_url('users/reject_kyc/' . $e['id'] .'/'.$e['userid']); ?>" class="btn btn-danger btn-xs">Resubmit</a>-->
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
            <?php echo form_open('users/reject_kyc') ?>
            <div class="modal-header">
                 <h4 class="modal-title">Please Provide Comments!!</h4>

                <button type="button" class="close" data-dismiss="modal">&times;</button>
                           </div>
            <div class="modal-body">
                <label>Enter Comments for the member</label>
                <input type="hidden" name="userid" id="userid">
                <textarea class="form-control" name="comments" required></textarea>
                
                 <button type="submit" class="btn  btn-success pull-left mt-2 mb-2">Resubmit</button>
             
             
                 <button type="button" class="btn btn-warning pull-right mt-2 mb-2" data-dismiss="modal">Close</button>
                
            
            
            
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
