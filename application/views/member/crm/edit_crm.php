<h2 align="center">View CRM Details</h2>

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
</div>
 <a href="<?php echo site_url('member/manage_crm');?>" id="cancel" name="cancel" class="btn btn-danger">Cancel</a>  
<?php echo form_close() ?>
</div>
<div class="tab-pane fade" id="note" role="tabpanel" aria-labelledby="note-tab" style="height: 350px; overflow-y: scroll;">
            <div class="row">
            <div class="col-sm-12">
    </br>
     </br>
   
   
   <a href="<?php echo site_url('member/manage_crm');?>" id="cancel" name="cancel" class="btn btn-danger pull-right" style="margin-right: 60px;">Go Back</a> 
            <?php

            $this->db->select('*')->order_by('id', 'DESC');
            foreach ($this->db->get('crm_note')->result() as $dataa) {?>
                 
                    <?php 
                if ($dataa->userid == $data->id) {?>
                 
                    <?php
               
                $from  = $this->db_model->select('name', 'member', array('id' => $dataa->userid));
                echo '<p >Note:- '. $dataa->note . '</p> <p style="color:blue;">Time: '.$dataa->date.'&nbsp;&nbsp;&nbsp;&nbsp; By:'.$from.'('.$dataa->userid.')</p>'; ?>
           
           <?php    }
            elseif($dataa->userid == "Admin" && $dataa->to_userid == $data->id)  { ?>
                 
                <?php 
                $from = "Admin";
                echo '<p>Note:- '. $dataa->note . '</p> <p style="color:blue;">Time: '.$dataa->date.'&nbsp;&nbsp;&nbsp;&nbsp; By:'.$from.'</p>'; ?>
           
               
                
      <?php    }?>
     
            

           <?php  }

            ?>

        
</div>
</div>
</div>
</div>

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