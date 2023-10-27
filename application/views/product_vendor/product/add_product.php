<?php

?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<?php if(config_item('enable_vendor_management')=="Yes"){?>
<div class="row">
  <div class="pull-right">
    <a href="javascript:void(0);" data-toggle="modal" data-target="#myModal" class="btn btn-success"><i class="plus"></i> Import CSV Data</a>
  </div>

  <div class="pull-right">
   <!-- <a class="btn btn-success" href=<?php echo site_url("/uploads/csv_template.csv"); ?> download><i class="plus"></i> Download CSV Template</a>-->
   <form method="post" action='export_product_details'>
        <input type="submit" class="btn btn-success" name="export_product_details" value="Download CSV Template" class="btn btn-primary" />
    </form>
  </div>
    
        <!-- File upload form -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Import CSV</h4>
            </div>
            <div class="modal-body">
              <form action="<?php echo base_url('vendor/import'); ?>" 
                method="post" enctype="multipart/form-data">
               <input type="file" name="file" />
               <input type="submit" class="btn btn-primary" 
                name="importSubmit" value="IMPORT">
              </form>
              <div class="modal-footer">
                <button type="close" class="btn btn-primary" data-dismiss="modal">Close</button>
              </div>
            </div>
        </div>
    </div>
  </div>
</div>
<?php } ?>


<script src="<?php echo base_url();?>axxets/admin/js/fileinput.js"></script>
<script src="<?php echo base_url();?>axxets/admin/js/component.fileupload.js');?>" charset="utf-8"></script>
<script src="<?php echo base_url();?>axxets/admin/js/jquery-2.2.4.min.js')"></script>
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
<div class="row">
    <?php echo form_open_multipart() ?>
    <div class="form-group">
        <div class="col-sm-6">
            <label>Product/Service Name*</label>
            <input type="text" class="form-control" name="prod_name" value="<?php echo set_value('prod_name') ?>">
        </div>
        
        <div class="col-sm-6">
            <label>Product Category *(Category name - Parent Category Name)</label>
            <select class="form-control" name="category">
                <?php foreach ($parents as $val) {
                    echo '<option value="' . $val['cat_id'] . '">' . $val['cat_name'] . "-" .$val['parent_cat'] . '</option>';
                } ?>
            </select>
        </div>
         <div class="col-sm-6">
            <label>Sub-Category*</label>
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
                    echo '<option value="' . $val['brand_name'] . '">' . $val['brand_name'] . '</option>';
                } ?>
            </select>
        </div>
        
        <!--<div class="col-sm-6">
            <label>Product Flag</label>
            <select class="form-control" name="flag">
              <option value="0">None</option>
                <?php foreach ($flags as $f) {
                    echo '<option value="' . $f['flag_name'] . '">' . $f['flag_name'] . '</option>';
                } ?>
            </select>
        </div>-->
        <div class="col-sm-6">
            <label>Product Price(Inclusive of all taxes)</label>
            <input type="text" class="form-control" name="prod_price" value="<?php echo set_value('prod_price') ?>">
        </div>
        <div class="col-sm-6" style="display:none;">
            <label>Product Cost</label>
            <input type="text" class="form-control" name="product_cost" value="<?php echo set_value('product_cost') ?>">
        </div>
        <div class="col-sm-6">
            <label>Discount (%)</label>
            <input type="text" class="form-control" name="discount" id="discount" value="<?php echo set_value('discount') ?>">
        </div>

        <div class="col-sm-6">
            <label>Plan Commission *</label>
            <select class="form-control" name="plan_id" required>
                <?php foreach ($plans as $val) {
                    echo '<option value="' . $val['id'] . '">' . $val['plan_name'] . '</option>';
                } ?>
            </select>
        </div>
        <!--<div class="col-sm-6">
            <label>Product Old Price</label>
            <input type="text" class="form-control" name="old_price" value="<?php echo set_value('old_price') ?>">
        </div>-->
        <div class="col-sm-6" style="display:none;">
            <label>Dealer Price (Franchisee Price)</label>
            <input type="text" class="form-control" name="dealer_price" value="<?php echo set_value('dealer_price') ?>">
        </div>
        
        <div class="col-sm-6"  style="display:none;">
            <label>Business Value or PV</label>
            <input type="text" class="form-control" name="pv" value="<?php echo set_value('pv') ?>">
        </div>
        <div class="col-sm-6">
            <!--<label>Available Qty (-1 for no limit)</label>-->
            <label>Available Qty </label>
            <input type="number" class="form-control" placeholder="Number" name="qty"
                   value="<?php echo set_value('qty', '1') ?>">
        </div>
        <div class="col-sm-6">
            <label>GST/TAX (%)</label>
            <input type="text" class="form-control" name="gst" value="<?php echo set_value('gst') ?>">
        </div>
        <div>&nbsp;</div>
        <br> 
        <div class="col-sm-10">
            <label>Product Image (Please upload image of size 900 x 1167)</label>
            <input type="file" name="img">
        </div>
        <br></br>
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
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
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
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileinput-new">Select Image</span>
                                    <!--    <span class="fileinput-exists">Change</span>-->
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
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
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
            </div><!-- end col-->
        <div>&nbsp;</div>
    </div>
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
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
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
        </div><!-- end col-->
        <div>&nbsp;</div>
    </div>
        <div class="col-sm-10">
            <br>
            <label>Product/Service Description</label>
            <textarea class="form-control" id="editor" name="prod_desc"><?php echo set_value('prod_desc') ?></textarea>
        </div>
        
    </div>
<!--- COMMISSION PART ----->
<?php if (config_item('fix_income') == 'Yes') { ?>
    <div class="alert alert-danger">
        <strong>Warning !</strong> You have enabled "Give Fix Income" option at Advance Setting section of Business
        Setting. This means, product/service based income setting will not work now. So Income Setting is disabled
        Here..
    </div>
<?php } else { ?>
    <div class="row">
        <div class="form-group collapse" id="commission">
            <p>
                &nbsp;&nbsp;&nbsp;<span style="color: #90111A">(Please leave unnecessary fields blank)</span>
            </p>
            <div class="col-sm-6">
                <label>Direct Income (In <?php echo config_item('currency') ?>)</label>
                <input type="text" class="form-control" name="direct_income"
                       value="<?php echo set_value('direct_income') ?>">
            </div>
            <div class="col-sm-6">
                <label>Level Income (In <?php echo config_item('currency') ?>)</label>
                <input type="text" class="form-control" placeholder="Comma separate each level income. eg: 12,3,4"
                       name="level_income" value="<?php echo set_value('level_income') ?>">
            </div>
            <div class="col-sm-6">
                <label>Matching Income (In <?php echo config_item('currency') ?>)</label>
                <input type="text" class="form-control" name="matching_income"
                       value="<?php echo set_value('matching_income') ?>">
            </div>
            <div class="col-sm-6">
                <label>Capping Amount (In <?php echo config_item('currency') ?>)</label>
                <input type="text" class="form-control" name="capping" value="<?php echo set_value('capping') ?>">
            </div>
            <div class="col-sm-6">
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
            </div>

            <!--- END ----------------->
        </div>
    </div>
<?php } ?>
    <div class="col-sm-10"><br/>
        <input type="submit" class="btn btn-success" value="Create" onclick="this.value='Creating..'">
        <a href="<?php echo site_url('site/admin');?>" id="cancel" name="cancel" class="btn btn-default">Cancel</a>
    </div>
  <?php echo form_close() ?>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("prodservices").classList.add('active');
        document.querySelector("#prodservices > ul > li:nth-child(3) > a > span").setAttribute('style', 'color: darkorange !important;');
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
<script>
function formToggle(ID){
    var element = document.getElementById(ID);
    if(element.style.display === "none"){
        element.style.display = "block";
    }else{
        element.style.display = "none";
    }
}
</script>