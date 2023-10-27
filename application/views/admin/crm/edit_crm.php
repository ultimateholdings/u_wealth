<h2 align="center">Update CRM Details</h2>

<ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item active">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><?php echo "CRM Details"; ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="note-tab" data-toggle="tab" href="#note" role="tab" aria-controls="note" aria-selected="false"><?php echo "Note"; ?></a>
      </li>
      
    </ul>

<div class="tab-content" id="myTabContent">
        
 
 <div class="tab-pane active in" id="home" role="tabpanel" aria-labelledby="home-tab" >
            </br>
  <?php echo form_open() ?>
<div class="row">
    <div class="form-group col-sm-6">
        <label for="name" class="control-label">Name*</label>
        <input type="text" class="form-control" id="name" name="name"
               value="<?php echo set_value('name', $data->name) ?>"
               placeholder="Mr Xyz">
    </div>
    <div class="form-group col-sm-6">
        <label for="email" class="control-label">Email</label>
        <input type="email" class="form-control" value="<?php echo set_value('email', $data->email) ?>" id="email" name="email" placeholder="name@domain.com">
    </div>
    <div class="form-group col-sm-6">
        <label for="phone" class="control-label">Phone No*</label>
        <input type="text" class="form-control" value="<?php echo set_value('phone', $data->phone) ?>" id="phone" name="phone" placeholder="9xxxxxxxxx">
    </div>
     
    <div class="form-group col-sm-6">
        <label for="status" class="control-label">CRM Status</label>
        <select class="form-control" id="status"
                name="status" >
                <?php if($data->crm_status == "Approved"){ ?>
            <option value="<?php echo $data->crm_status ?>"><?php echo $data->crm_status ?></option>
        <?php }else{?>
            <option value="<?php echo $data->crm_status ?>"><?php echo $data->crm_status ?></option>
            <option value="Open">Open</option>
            <option value="Processing">Processing</option>
            <option value="Approved">Approved</option>
            <option value="Rejected">Rejected</option>
        <?php } ?>
        </select>
    </div>
    <div class="form-group col-sm-6" id="demo">
         <label for="status" class="control-label">Sale Value</label>
    <input type="text" class="form-control" value="<?php echo  $data->admin_profit ?>" id="admin_profit" name="admin_profit"> 
</div>
<div class="form-group col-sm-6" id="repurchase_plan">
         <label class="control-label">Select Repurchase Plan</label>
    
    <select class="form-control" id="repurchase_plan" name="repurchase_plan" >
        <?php if($data->repurchase_plan > 0){ ?>
        <option value="<?php echo $data->repurchase_plan ?>"><?php echo $this->db_model->select('plan_name', 'plans', array('id' => $data->repurchase_plan)); ?></option>
    <?php }else{ ?>
                        <?php foreach ($plans as $key) {?>
                            <option value="<?php echo $key['id'] ?>"><?php echo $key['plan_name'] ?></option>
                        <?php } } ?>
                    </select>
</div>
<div class="form-group col-sm-12">
 <?php if($data->loan_status != "Approved") {?>
    <input type="hidden" name="id" value="<?php echo $data->id ?>">
    
        <button class="btn btn-primary">Update</button>
     
<?php }?>
<a href="<?php echo site_url('admin/manage_crm');?>" id="cancel" name="cancel" class="btn btn-secondary">Cancel</a>

</div>
</div>
<?php echo form_close() ?>

</div>

  <div class="tab-pane fade" id="note" role="tabpanel" aria-labelledby="note-tab" style="height: 350px; overflow-y: scroll;">
            <div class="row">
            <div class="col-sm-12">
    </br>
     </br>
     <a data-toggle="modal" data-target="#myModal1"
                           
                           class="btn btn-primary btn-xs mr-2 mb-1"><i class="fa fa-plus"></i>ADD Note</a>
   
   <a href="<?php echo site_url('admin/manage_crm');?>" id="cancel" name="cancel" class="btn btn-danger pull-right" style="margin-right: 60px;">Go Back</a> 
            <?php

            $this->db->select('*')->order_by('id', 'DESC');
            foreach ($this->db->get('crm_note')->result() as $dataa) {?>
                
                    <?php 
                if ($dataa->userid == $data->id) { ?>
                    <div class="row">
                <div class="form-group col-sm-10">  
                    <?php
               
                $from  = $this->db_model->select('name', 'member', array('id' => $dataa->userid));
                echo '<p >Note:- '. $dataa->note . '</p> <p style="color:blue;">Time: '.$dataa->date.'&nbsp;&nbsp;&nbsp;&nbsp; By:'.$from.'('.$dataa->userid.')</p>'; ?>
                </div> 
             <div class="form-group col-sm-2">   
          <!--  <a id="<?php echo $dataa->id; ?>" data-toggle="modal" class="btn btn-info btn-xs" data-target="#itemexampleModalScrollable" onclick="itemexampleModalScrollable(this.id);"><i class="fa fa-edit"></i></a>
           <a href="<?= base_url().'admin/t_delete/'.$dataa->id; ?>"><i class="fa fa-remove btn btn-danger btn-xs"></i></a> -->
       </div>
   </div>
           <?php    }
            elseif($dataa->userid == "Admin" && $dataa->to_userid == $data->id)  {?>
                <div class="row">
                <div class="form-group col-sm-10">  
                <?php
                $from = "Admin";
                echo '<p >Note:- '. $dataa->note . '</p> <p style="color:blue;">Time: '.$dataa->date.'&nbsp;&nbsp;&nbsp;&nbsp; By:'.$from.'</p>'; ?>
                </div> 
             <div class="form-group col-sm-2">   
           <!-- <a id="<?php echo $dataa->id; ?>" data-toggle="modal" class="btn btn-info btn-xs" data-target="#itemexampleModalScrollable" onclick="itemexampleModalScrollable(this.id);"><i class="fa fa-edit"></i></a> -->
           <a href="#" data-toggle="itemexampleModalScrollable" data-id="<?php echo $dataa->id; ?>" data-name="<?php echo $dataa->note; ?>" data-code="<?php echo $dataa->to_userid; ?>" class="btn btn-info btn-xs"><i class="fa fa-edit"></i></a>
           <a href="<?= base_url().'admin/t_delete/'.$dataa->id.'/'.$data->id; ?>"><i class="fa fa-remove btn btn-danger btn-xs"></i></a>
       </div>
   </div> 
               
                
      <?php    }?>
     
            

           <?php  }

            ?>

        
</div>
</div>
</div>
</div>

<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                  <h4 class="modal-title">Add Note</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              
            </div>
            <div class="modal-body">
                <?php echo form_open('admin/crm_note') ?>

                <label>Note</label>
              <textarea id="note" name="note" class="form-control" rows="2"></textarea>
               
    
                <div style="margin-top: 10px;">
                    <button type="submit" class="btn btn-success">Save</button>
                   <button type="button" class="btn btn-primary pull-right" data-dismiss="modal">Close</button>  
                </div>
                <input type="hidden" name="id" value="<?php echo $data->id ?>">
                <?php echo form_close() ?>  
              
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="itemexampleModalScrollable" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
              <h5 class="modal-title" id="itemexampleModalScrollable">Edit Note</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        </div>

                                    <div class="modal-body" id="modal_dataa">
                                  <form  method="POST" action="<?= base_url();?>admin/ajax_note_update" >
   
  
 
                                <input type="hidden" name="id" id="id">                      
                                <input type="hidden" name="userid" id="userid" >                           
                              <label>Note</label>
                                      <textarea id="edit_note" name="note" class="form-control" ></textarea>
                                       
                            
                                        <div style="margin-top: 10px;">
                                            <button type="submit" class="btn btn-success">Save</button>
                                           <button type="button" class="btn btn-primary pull-right" data-dismiss="modal">Close</button>  
                                        </div>
                                   </form>
                                    </div>
                                    
                                 </div>
                              </div>
                           </div>


 <script type="text/javascript">

function itemexampleModalScrollable(fileDesc_id) {

debugger;
$('#itemexampleModalScrollable').modal('show');
var url = "<?=base_url('admin/note_edit')?>";

dataString = {'fileDesc_id':fileDesc_id};
$.ajax({
url: url,
type: 'POST',
data: dataString,
success: function(response){

$('#modal_dataa').html(response);
}
});
}
</script>
<script type="text/javascript">
    $(document).ready(function(){
   if($('#status').val() =="Approved"){
        $('#demo').show();
        $('#repurchase_plan').show();
    }else{
        $('#demo').hide();
        $('#repurchase_plan').hide();
    }
    $('#status').change(function(){
        if($('#status').val() =="Approved"){
         $('#demo').show();
         $('#repurchase_plan').show();
     }else{
        $('#demo').hide();
        $('#repurchase_plan').hide();
     }
    });
});
    
</script>

<script>
    $(document).ready(function() {
          $('a[data-toggle=itemexampleModalScrollable], button[data-toggle=itemexampleModalScrollable]').click(function () {
            var id = $(this).data('id');
            var note = $(this).data('name');
            var userid = $(this).data('code');

            
            $('#id').val(id);
            $('#edit_note').val(note);
            $('#userid').val(userid);
            $("#itemexampleModalScrollable").modal("show");
          })
        });
</script>