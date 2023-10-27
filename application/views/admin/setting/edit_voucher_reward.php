<div class="container">
    <?php echo form_open_multipart() ?>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-5">
                <label>Plan</label>
                <select class="form-control" name="plan_id1" disabled>
                    <option value="<?php echo $voucher_result->plan_id ?>" selected> <?php echo $this->db_model->select('plan_name', 'plans', array('id' => $voucher_result->plan_id)); ?> </option>
                    <?php foreach ($plans as $val) {
                        echo '<option value="' . $val['id'] . '">' . $val['plan_name'] . '</option>';
                    } ?>
                </select>
            </div>
            <div class="col-sm-5">
                <label>Voucher Reward Name</label>
                <input type="text" class="form-control" value="<?php echo set_value('reward_name', $voucher_result->name) ?>" name="reward_name" >
            </div>
        </div>

        <input type="hidden" name="id" value="<?php echo $voucher_result->id ?>">
        <input type="hidden" name="plan_id" value="<?php echo $voucher_result->plan_id ?>">
        <input type="hidden" name="reward_type" value="<?php echo $voucher_result->type ?>">
        <div>&nbsp;</div>
        <div class="row">
            <div class="col-sm-5">
              <label>Voucher Reward Based On</label>
               <select class="form-control" id="reward_type" name="reward_type" required>
                <option value="Voucher">Voucher</option>
               </select>
            </div> 
            <div class="col-sm-5">
                <label>Number of Voucher</label>
                <input type="text" name="total_voucher" class="form-control" value="<?php echo set_value('total_voucher', $voucher_result->number_vouchers) ?>" required>
            </div>
        </div>
        <div>&nbsp;</div>

        <div class="row" > 
            <div class="col-lg-4" >
         <div class="panel panel-primary shadow-lg" data-collapsed="0" style="background-color: #fff;">
            <div class="panel-heading" style="background-color: #337ab7">
               <div class="panel-title ml-2" style="color: white; padding-top: 8px;padding-bottom: 8px;">
                  Upload image 
               </div>
            </div>
            <div class="panel-body">
               <div class="form-group">
                  <div class="col-md-12 text-center">
                     <div class="fileinput1 fileinput-new" data-provides="fileinput1">
                        <div class="fileinput-preview fileinput-exists thumbnail mt-2 ml-2" style="max-width: 200px; max-height: 150px; display: block;padding: 4px;margin-bottom: 20px;line-height: 1.5;background-color: #fff;border:  1px solid  #ddd;border-radius: 4px;transition: border .2s ease-in-out;overflow: hidden;"><img src="<?php echo base_url('uploads/'.$voucher_result->image);?>"/></div>
                        <div>
                           <span class="btn btn-file shadow" style="width: 90%;">
                           <span class="fileinput-new" style="color: #6d6d6d;font-weight: 600;text-transform: uppercase;font-size: 12px;">Select Image</span>
                           <input type="file" name="image" accept="image/*" style="width: 100%; font-size: 11px;" >
                          
                           </span>
                           
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
                <input type="submit" class="btn btn-success" value="Update" onclick="this.value='Updating..'">
                <a href="<?php echo site_url('setting/voucher_setting');?>" id="cancel" name="cancel" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </div>
    <?php echo form_close() ?>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("rewards").classList.add('active');
        document.querySelector("#rewards > ul > li:nth-child(8) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>

