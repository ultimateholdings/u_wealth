<?php

?>
<style>
.row {
    margin-right: -15px;
    margin-left: -15px;
}
.row::after, .row::before {
    display: table;
    content: " ";
}
.form-group {
    margin-bottom: 15px;
}
label {
    font-weight: 400;
    display: inline-block;
    max-width: 100%;
    margin-bottom: 5px;
}
.panel-primary > .panel-heading {
    color: #fff;
    background-color: #337ab7;
    border-color: #337ab7;
}
.btn {
    outline: 0 !important;
    font-size: 12px;
    transition: box-shadow .28s cubic-bezier(.4,0,.2,1);
    border-radius: 2px;
    overflow: hidden;
    position: relative;
    padding: 8px 14px 7px;
    margin: 0 5px 10px 0;
}
.badge, .btn {
    font-weight: 600;
    text-transform: uppercase;
}
.alert, .badge, .btn, .btn-group > .btn, .btn.btn-link:hover, .icon-btn, .label, .note, .overview-panel, .panel {
    box-shadow: 0 1px 3px rgba(0,0,0,.1),0 1px 2px rgba(0,0,0,.18);
}
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="<?php echo base_url();?>axxets/admin/js/fileinput.js"></script>
<script src="<?php echo base_url();?>axxets/admin/js/component.fileupload.js');?>" charset="utf-8"></script>
<script src="<?php echo base_url();?>axxets/admin/js/jquery-2.2.4.min.js')"></script>
<div class="row">
    <?php echo form_open_multipart() ?>
    <div class="form-group">
        <div class="col-sm-6">
            <label>Product Name</label>
            <input type="text" class="form-control" name="prod_name" value="<?php echo $data->prod_name ?>">
        </div>
        <div class="col-sm-6">
            <label>Plan Commission</label>
            <select class="form-control" name="plan_id">
                <option value="<?php echo $data->plan_id ?>" selected> <?php echo $this->db_model->select('plan_name', 'plans', array('id' => $data->plan_id)); ?> </option>
                <?php foreach ($plans as $val) {
                    echo '<option value="' . $val['id'] . '">' . $val['plan_name'] . '</option>';
                } ?>
            </select>
        </div>
        <div class="col-sm-6">
            <label>Product Category</label>
            <select class="form-control" name="category">
                <?php foreach ($parents as $val) {
                    echo '<option value="' . $val['cat_id'] . '">' . $val['cat_name'] . "-" .$val['parent_cat'] . '</option>';
                } ?>
            </select>
        </div>
        <div class="col-sm-6">
            <label>Sub-Category</label>
            <select class="form-control" name="sub_category">
                <?php foreach ($subcat as $val) {
                    echo '<option value="' . $val['sub_cat_id'] . '">' . $val['sub_cat_name'] . '</option>';
                } ?>
            </select>
        </div>
        <div class="col-sm-6">
            <label>Product Brand</label>
            <select class="form-control" name="brand">

                <?php foreach ($brands as $val) {
                    echo '<option value="' . $val['brand_id'] . '">' . $val['brand_name'] . '</option>';
                } ?>
            </select>
        </div>
        <input type="hidden" name="id" value="<?php echo $data->id ?>">
       <input type="hidden" name="image" value="<?php echo $data->image ?>">
       
        <div class="col-sm-6">
            <label>Product price</label>
            <input type="text" class="form-control" name="prod_price" value="<?php echo $data->prod_price ?>">
        </div>
        <div class="col-sm-6">
            <label>Discount</label>
            <input type="text" class="form-control" name="discount" value="<?php echo $data->discount ?>">
        </div>
        <!--<div class="col-sm-6">
            <label>Product Old Price</label>
            <input type="text" class="form-control" name="dealer_price" value="<?php echo $data->dealer_price ?>">
        </div>-->
        <div class="col-sm-6" style="display:none;">
            <label>Dealer Price (Franchisee Price)</label>
            <input type="text" class="form-control" name="dealer_price" value="<?php echo $data->dealer_price?>">
        </div>
        <div class="col-sm-6" style="display:none;">
            <label>Product Cost</label>
            <input type="text" class="form-control" name="product_cost" value="<?php echo $data->product_cost ?>">
        </div>
        <div class="col-sm-6" style="display:none;">
            <label>Business Value or PV</label>
            <input type="text" class="form-control" name="pv" value="<?php echo $data->pv ?>">
        </div>
        <div class="col-sm-6">
            <!--<label>Available Qty (-1 for no limit)</label>-->
            <label>Available Qty</label>
            <input type="number" class="form-control" placeholder="Number" name="qty"
                   value="<?php echo $data->qty ?>">
        </div>
         
        <div class="col-sm-6">
            <label>GST/TAX (%)</label>
            <input type="text" class="form-control" name="gst" value="<?php echo $data->gst ?>">
        </div>
        
        <div class="col-sm-12">
            <label>Product/Service Description</label>
            <textarea class="form-control" id="editor" name="prod_desc"><?php echo $data->prod_desc ?></textarea>
        </div>
        <div class="col-sm-10">
            <label>Product Image</label>
            <input type="file" name="img">
        </div> 
        <br></br>
        <br><br>
        <br><br>        
        <div class="col-lg-4">
          <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
              <div class="panel-title">
                  Upload image(900x1167)
              </div>
            </div>
            <div class="panel-body">
              <div class="form-group">
                <div class="col-md-12 text-center">
                  <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-preview fileinput-exists thumbnail" style="width: 50px; height: 50px"><img src="<?php echo base_url('uploads/'.$data->image2);?>"/></div>
                      <div>
                        <span class="btn btn-white btn-file">
                        <span class="fileinput-new">Select Image</span>
                        <input type="file" name="img2" accept="image/*">
                        </span>
                        <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><!-- end col-->  
        <div class="col-lg-4">
          <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
              <div class="panel-title">
                  Upload image(900x1167)
              </div>
            </div>
            <div class="panel-body">
              <div class="form-group">
                <div class="col-md-12 text-center">
                  <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-preview fileinput-exists thumbnail" style="width: 50px; height: 50px"><img src="<?php echo base_url('uploads/'.$data->image3);?>"/></div>
                      <div>
                        <span class="btn btn-white btn-file">
                        <span class="fileinput-new">Select Image</span>
                        <input type="file" name="img3" accept="image/*">
                        </span>
                        <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><!-- end col--> 
        <div class="col-lg-4">
          <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
              <div class="panel-title">
                  Upload image(900x1167)
              </div>
            </div>
            <div class="panel-body">
              <div class="form-group">
                <div class="col-md-12 text-center">
                  <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-preview fileinput-exists thumbnail" style="width: 50px; height: 50px"><img src="<?php echo base_url('uploads/'.$data->image4);?>"/></div>
                      <div>
                        <span class="btn btn-white btn-file">
                        <span class="fileinput-new">Select Image</span>
                        <input type="file" name="img4" accept="image/*">
                        </span>
                        <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><!-- end col-->     
        <div class="col-lg-4">
          <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
              <div class="panel-title">
                  Upload image(900x1167)
              </div>
            </div>
            <div class="panel-body">
              <div class="form-group">
                <div class="col-md-12 text-center">
                  <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-preview fileinput-exists thumbnail" style="width: 50px; height: 50px"><img src="<?php echo base_url('uploads/'.$data->image5);?>"/></div>
                      <div>
                        <span class="btn btn-white btn-file">
                        <span class="fileinput-new">Select Image</span>
                        <input type="file" name="img5" accept="image/*">
                        </span>
                        <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><!-- end col-->       
      </div>
  </div>
<div class="row">
    <div class="col-sm-12"><br/>
        <input type="submit" class="btn btn-success" value="Update" onclick="this.value='Updating..'">
        <a href="<?php echo site_url('product/manage_products');?>" id="cancel" name="cancel" class="btn btn-default">Cancel</a>
    </div>
    <?php echo form_close() ?>
</div>


<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("prodservices").classList.add('active');
        document.querySelector("#prodservices > ul > li:nth-child(2) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>

<script>
    $(document).ready(function(){
        $("#button1").on("click", function(){
               var count = $('#BinaryLevels tr').length;
               //window.alert(count);
               if(count<25){
               var new_count = count+1;
               var row = "<tr><td><input type='text' class='form-control' name='new_level[]' value= " +  new_count + " placeholder='Level' required></input></td><td><input type='number' class='form-control' name='new_commission[]' value='' placeholder='Commission' required></input></td></tr>";
             $("#BinaryLevels").append(row);
             //window.alert(row);
               }
           });
         
         }); 
</script>


<!---->
            <!--<div class="col-sm-5">
                <label>Dealer Price (Franchisee Price)</label>
                <input type="text" class="form-control" name="dealer_price" value="<?php echo set_value('dealer_price') ?>">
            </div>-->            
            <!--  <div>&nbsp;</div>
          <div class="row">
            <div class="col-sm-5">
                <label>Business Value or PV</label>
                <input type="text" class="form-control" name="pv" value="<?php echo set_value('pv') ?>">
            </div>
            <div class="col-sm-5">
                <label>Available Qty (-1 for no limit)</label>
                <input type="number" class="form-control" placeholder="-1 for unlimited" name="qty"
                       value="<?php echo set_value('qty', '-1') ?>">
            </div>
          </div>-->

          <!--    <div class="col-sm-6" id="level">
                    <label> Matching Income for each Level:</label>
                        <?php if($level_detail){  ?>
                        <table id = 'BinaryLevels'>
                          <?php
                           foreach($level_detail as $detail){ ?>
                            <tr>
                             <td><input type="text" class="form-control" 
                              value="<?php echo $detail['level']; ?>" name="new_level[]" required></td>
                             <td><input type="text" class="form-control" 
                              value="<?php echo $detail['commission']; ?>" placeholder="Commission" 
                              name="new_commission[]" required></td>
                            </tr>
                        <?php } ?>
                        </table>
                    <?php }

                      else{
                        ?>
                        <table id = 'BinaryLevels'>
                            <tr>
                             <td><input type="text" class="form-control" 
                              value="1" name="new_level[]"></td>
                              <td><input type="text" class="form-control" 
                              value="" placeholder="Commission" name="new_commission[]"></td>
                            </tr>
                        </table>
                      <?php } ?>

                    <div class="col-sm-6"><br/>
                        <button type="button" id="button1" class="btn btn-default" data-dismiss="modal">Add More!!</button>
                    </div>
                </div> id=level-->


                <!--<div class="col-sm-6">
                    <label>Capping Amount (In <?php echo config_item('currency') ?>)</label>
                    <input type="text" class="form-control" name="capping" value="<?php echo set_value('capping') ?>">
                </div>-->
                <!--<div class="col-sm-6">
                    <label>ROI (In <?php echo config_item('currency') ?>)</label>
                    <input type="text" class="form-control" placeholder="Return of Investment"
                           value="<?php echo set_value('roi') ?>" name="roi">
                </div>
                <div class="col-sm-6">
                    <label>ROI Frequency (In Days)</label>
                    <input type="number" class="form-control" placeholder="How frequently you'll pay ROI" name="roi_frequency"
                           value="<?php echo set_value('roi_frequency') ?>">
                </div>
                <div class="col-sm-6">
                    <label>ROI Limit (In Number)</label>
                    <input type="number" class="form-control" placeholder="How many time you'll pay ROI ?" name="roi_limit"
                           value="<?php echo set_value('roi_limit') ?>">
                </div>-->

                <!--- END ----------------->



            
            <!--<div class="col-sm-6">
                <button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#commission">Add Commission?</button>
            </div>-->
            <!-- <div class="col-sm-5">
                <label>Show on Registration Form ?</label>
                <input type="checkbox" value="Yes" checked name="join_form"> Yes
            </div>-->
            
           <!-- <div class="col-sm-5" style="display: none;">
                 <label>Is Binary income based on package?</label>
                 <select class="form-control" name="binary_income_package" id="binary_income_package">
                 <option value="1" selected="">Yes</option>
                 </select>
            </div>-->
            <!-- <select class="form-control" name="category">
                    <?php foreach ($parents as $val) {
                        echo '<option value="' . $val['id'] . '">' . $val['cat_name'] . '</option>';
                    } ?>
                </select>-->
                              <!--<select class="form-control" name="pairs" id="pairs">
                <input type="text" class="form-control" name="prod_price" value="<?php echo set_value('prod_price') ?>">
                 <option value="pairs" selected="">Pairs</option>
              </select> -->