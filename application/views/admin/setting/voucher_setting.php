<?php
?>

<script src="<?php echo base_url('axxets/base/js/jquery_v3.2.1.min.js') ?>" type="text/javascript"></script>

<div class="container">
    <?php echo form_open_multipart() ?>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-5">
            <label>Plan *</label>
            <select class="form-control" name="plan_id" required>
                <option value="0">Select A Plan</option>
                <?php foreach ($plans as $val) {
                    echo '<option value="' . $val['id'] . '">' . $val['plan_name'] . '</option>';
                } ?>
            </select>
            </div>
            <div class="col-sm-5">
                <label>Voucher Reward Name</label>
                <input type="text" class="form-control" value="<?php echo set_value('reward_name') ?>" name="reward_name" required>
            </div>
        </div>
        <div>&nbsp;</div>
        <div class="row">
            <div class="col-sm-5">
              <label>Voucher Reward Based On</label>
               <select class="form-control" id="reward_type" name="reward_type" required>
                <option value="Voucher">Voucher</option>
               </select>
            </div> 
            <div class="col-sm-5" id="based_on_id">
                <label>Number of Voucher</label>
                <input type="text" name="total_voucher" class="form-control" value="" required>
            </div>
        </div>
        <div>&nbsp;</div>

        <div class="row" > 
        
            <div class="col-lg-4" >
                <div class="panel panel-primary shadow-lg" data-collapsed="0" style="background-color: #fff;">
                    <div class="panel-heading" style="background-color: #337ab7">
                       <div class="panel-title ml-2" style="color: white; padding-top: 8px;padding-bottom: 8px;">
                          Upload image :
                       </div>
                    </div>
                    <div class="panel-body">
                       <div class="form-group">
                          <div class="col-md-12 text-center">
                             <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview fileinput-exists thumbnail mt-2 ml-2" style="max-width: 200px; max-height: 150px; display: block;padding: 4px;margin-bottom: 20px;line-height: 1.5;background-color: #fff;border:  1px solid  #ddd;border-radius: 4px;transition: border .2s ease-in-out;overflow: hidden;"></div>
                                <div>
                                   <span class="btn btn-file shadow" style="width: 90%;">
                                   <span class="fileinput-new" style="color: #6d6d6d;font-weight: 600;text-transform: uppercase;font-size: 12px;">Select Image</span>
                                   <input type="file" name="image" accept="image/*" style="width: 100%; font-size: 11px;" required >
                                  
                                   </span>
                                   
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>

        <div>&nbsp;</div>
        <div class="row">
            <div class="col-sm-12"><br/>
                <input type="submit" class="btn btn-success" value="Save" onclick="this.value='Saving..'">
            </div>
        </div>
        <div>&nbsp;</div>
        
    </div>
    <?php echo form_close() ?>
</div><!------------- MANAGE REWARDS -------------------------------->

<p>&nbsp;</p>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr>
            <th>SN</th>
            <th>Reward Name</th>
            <th>Reward Image</th>
            <th>Plan ID</th>
            <th>Reward Based On</th>
            <th>Number of Vouchers</th>
            <th>#</th>
        </tr>
        <?php
        $sn = 1;

        foreach ($results as $e) { ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $e->name; ?></td>
                <td>
                    <img src="<?php echo $e->image ? base_url('uploads/' . $e->image) : base_url('uploads/default.jpg'); ?>"
                         class="img-thumbnail img-responsive" style="max-height: 100px">
                </td>
                <td><?php echo $e->plan_id; ?></td>
                <td><?php echo $e->type; ?></td>
                <td><?php echo $e->number_vouchers; ?></td>
    
                <td>
                    <div style="display: flex;">

                        <!-- <a href="<?php echo site_url('income/pay-rewards/' . $e->id); ?>"
                           class="btn btn-info btn-sm glyphicon glyphicon-pencil" style="margin-right: 10px;" >view achievers</a>
                        -->
                        <a href="<?php echo site_url('setting/edit_voucher_reward/' . $e->id); ?>"
                           class="btn btn-info btn-sm glyphicon glyphicon-pencil" style="margin-right: 10px;display: flex;align-items: center;" >edit</a>
                        <a onclick="return confirm('Are you sure you want to delete this Voucher Setting ?')"
                           href="<?php echo site_url('setting/remove_voucher/' . $e->id); ?>"
                           class="btn btn-danger btn-sm glyphicon glyphicon-remove" style="display: flex;align-items: center;">delete</a>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("rewards").classList.add('active');
        document.querySelector("#rewards > ul > li:nth-child(4) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    if($('#reward_type').val() =="Downline"){
        $('#mypv').val('0');
        $('#mypv_id').hide();
        $('#downline_id').show();
        $("#based_on_id").show();
        $('#level_id').show();
    }
    $('#reward_type').change(function(){
      if(this.value=='Downline')
      {
        $('#mypv').val('0');
        $('#mypv_id').hide();
        $('#downline_id').show();
        $("#based_on_id").show();
        $('#level_id').show();
       }
      else{
        $('#mypv_id').show();
        $('#downline_id').hide();
        $('#level_id').hide();
        $("#based_on_id").hide();
        $('#based_on').val('PV');
      }
    });
  });
</script>