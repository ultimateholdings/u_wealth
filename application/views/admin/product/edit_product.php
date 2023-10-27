<?php

?>
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
<script src="<?php echo base_url();?>axxets/admin/js/fileinput.js"></script>
<script src="<?php echo base_url();?>axxets/admin/js/component.fileupload.js');?>" charset="utf-8"></script>
<script src="<?php echo base_url();?>axxets/admin/js/jquery-2.2.4.min.js')"></script>
<div >
    <?php echo form_open_multipart() ?>
    <div class="form-group row">
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
                <option value="<?php echo $data->category ?>" selected> 
                  <?php echo $selected->cat_name.'-'.$selected->parent_cat; ?> 
                </option>
                <?php foreach ($parents as $val) {
                    echo '<option value="' . $val['cat_id'] . '">' . $val['cat_name'] . "-" .$val['parent_cat'] . '</option>';
                } ?>
            </select>
        </div>
        <div class="col-sm-6">
            <label>Sub-Category</label>
            <select class="form-control" name="sub_category">
              <option value="<?php echo $data->sub_category ?>" selected> <?php echo $selected->sub_cat_name; ?> </option>
                <?php foreach ($subcat as $val) {
                    echo '<option value="' . $val['sub_cat_id'] . '">' . $val['sub_cat_name'] . '</option>';
                } ?>
            </select>
        </div>
        <div class="col-sm-6">
            <label>Product Brand</label>
            <select class="form-control" name="brand">
                <option value="<?php echo $data->brand ?>" selected> <?php echo $selected->brand_name; ?> </option>
                <?php foreach ($brands as $val) {
                    echo '<option value="' . $val['brand_id'] . '">' . $val['brand_name'] . '</option>';
                } ?>
            </select>
        </div>
        <input type="hidden" name="id" value="<?php echo $data->id ?>">
        <input type="hidden" name="image" value="<?php echo $data->image ?>">
       
        <div class="col-sm-6">
            <label>Product Selling Price</label>
            <input type="text" class="form-control" name="prod_price" value="<?php echo $data->prod_price ?>">
        </div>
        <?php if(config_item('enable_franchisee')=='Yes'){ ?>
          <div class="col-sm-6">
              <label>Dealer Price (Franchisee Price)</label>
              <input type="text" class="form-control" name="dealer_price" value="<?php echo $data->dealer_price?>">
          </div>
        <?php } ?>
        <div class="col-sm-6">
            <label>Product Cost</label>
            <input type="text" class="form-control" name="product_cost" value="<?php echo $data->product_cost ?>">
        </div>
        <?php if(config_item('enable_pv')=='Yes'){ ?>
        <div class="col-sm-6">
            <label>Business Value or PV</label>
            <input type="text" class="form-control" name="pv" value="<?php echo $data->pv ?>">
        </div>
        <?php } ?>
        <div class="col-sm-6">
            <label>Available Qty (-1 for no limit)</label>
            <input type="number" class="form-control" placeholder="-1 for unlimited" name="qty"
                   value="<?php echo $data->qty ?>">
        </div>
        <div class="col-sm-6">
            <label>Discount (%)</label>
            <input type="text" class="form-control" name="discount" value="<?php echo $data->discount ?>">
        </div>
        <div class="col-sm-6">
            <label>GST/TAX (%)</label>
            <input type="text" class="form-control" name="gst" value="<?php echo $data->gst ?>">
        </div>
        <div>&nbsp;</div>
        <div class="col-sm-12">
            <label>Product/Service Description</label>
            <textarea class="form-control" id="editor" name="prod_desc"><?php echo $data->prod_desc ?></textarea>
        </div>
      </div>
      <div>&nbsp;</div>
      <br>
    </div>
    <div class="row">
      
   
        <div class="col-lg-4" >
         <div class="panel panel-primary shadow-lg" data-collapsed="0" style="background-color: #fff;">
            <div class="panel-heading" style="background-color: #337ab7">
               <div class="panel-title ml-2" style="color: white; padding-top: 8px;padding-bottom: 8px;">
                  Upload image-1 (900x1167)
               </div>
            </div>
            <div class="panel-body">
               <div class="form-group">
                  <div class="col-md-12 text-center">
                     <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-preview fileinput-exists thumbnail mt-2 ml-2" style="max-width: 200px; max-height: 150px; display: block;padding: 4px;margin-bottom: 20px;line-height: 1.5;background-color: #fff;border:  1px solid  #ddd;border-radius: 4px;transition: border .2s ease-in-out;overflow: hidden;"><img src="<?php echo base_url('uploads/'.$data->image);?>"/></div>
                        <div>
                           <span class="btn btn-file shadow" style="width: 90%;">
                           <span class="fileinput-new" style="color: #6d6d6d;font-weight: 600;text-transform: uppercase;font-size: 12px;">Select Image</span>
                           <input type="file" name="image" accept="image/*" style="width: 100%; font-size: 11px;" >
                          
                           </span>
                           <a href="#" class="btn btn-orange fileinput-exists shadow" data-dismiss="fileinput" style="color: #337ab7;  margin-bottom: 20px; margin-top: 10px;padding: 10px;font-size: 12px;">Remove</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div><!-- end col-->  
         <div class="col-lg-4" >
         <div class="panel panel-primary shadow-lg" data-collapsed="0" style="background-color: #fff;">
            <div class="panel-heading" style="background-color: #337ab7">
               <div class="panel-title ml-2" style="color: white; padding-top: 8px;padding-bottom: 8px;">
                  Upload image-2 (900x1167)
               </div>
            </div>
            <div class="panel-body">
               <div class="form-group">
                  <div class="col-md-12 text-center">
                     <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-preview fileinput-exists thumbnail mt-2 ml-2" style="max-width: 200px; max-height: 150px; display: block;padding: 4px;margin-bottom: 20px;line-height: 1.5;background-color: #fff;border:  1px solid  #ddd;border-radius: 4px;transition: border .2s ease-in-out;overflow: hidden;"><img src="<?php echo base_url('uploads/'.$data->image2);?>"/></div>
                        <div>
                           <span class="btn btn-file shadow" style="width: 90%;">
                           <span class="fileinput-new" style="color: #6d6d6d;font-weight: 600;text-transform: uppercase;font-size: 12px;">Select Image</span>
                           <input type="file" name="image2" accept="image/*" style="width: 100%; font-size: 11px;" >
                          
                           </span>
                           <a href="#" class="btn btn-orange fileinput-exists shadow" data-dismiss="fileinput" style="color: #337ab7;  margin-bottom: 20px; margin-top: 10px;padding: 10px;font-size: 12px;">Remove</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div><!-- end col-->  
        <div class="col-lg-4" >
         <div class="panel panel-primary shadow-lg" data-collapsed="0" style="background-color: #fff;">
            <div class="panel-heading" style="background-color: #337ab7">
               <div class="panel-title ml-2" style="color: white; padding-top: 8px;padding-bottom: 8px;">
                  Upload image-3 (900x1167)
               </div>
            </div>
            <div class="panel-body">
               <div class="form-group">
                  <div class="col-md-12 text-center">
                     <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-preview fileinput-exists thumbnail mt-2 ml-2" style="max-width: 200px; max-height: 150px; display: block;padding: 4px;margin-bottom: 20px;line-height: 1.5;background-color: #fff;border:  1px solid  #ddd;border-radius: 4px;transition: border .2s ease-in-out;overflow: hidden;"><img src="<?php echo base_url('uploads/'.$data->image3);?>"/></div>
                        <div>
                           <span class="btn btn-file shadow" style="width: 90%;">
                           <span class="fileinput-new" style="color: #6d6d6d;font-weight: 600;text-transform: uppercase;font-size: 12px;">Select Image</span>
                           <input type="file" name="image3" accept="image/*" style="width: 100%; font-size: 11px;" >
                          
                           </span>
                           <a href="#" class="btn btn-orange fileinput-exists shadow" data-dismiss="fileinput" style="color: #337ab7;  margin-bottom: 20px; margin-top: 10px;padding: 10px;font-size: 12px;">Remove</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div><!-- end col--> 
         <div class="col-lg-4" >
         <div class="panel panel-primary shadow-lg" data-collapsed="0" style="background-color: #fff;">
            <div class="panel-heading" style="background-color: #337ab7">
               <div class="panel-title ml-2" style="color: white; padding-top: 8px;padding-bottom: 8px;">
                  Upload image-4 (900x1167)
               </div>
            </div>
            <div class="panel-body">
               <div class="form-group">
                  <div class="col-md-12 text-center">
                     <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-preview fileinput-exists thumbnail mt-2 ml-2" style="max-width: 200px; max-height: 150px; display: block;padding: 4px;margin-bottom: 20px;line-height: 1.5;background-color: #fff;border:  1px solid  #ddd;border-radius: 4px;transition: border .2s ease-in-out;overflow: hidden;"><img src="<?php echo base_url('uploads/'.$data->image4);?>"/></div>
                        <div>
                           <span class="btn btn-file shadow" style="width: 90%;">
                           <span class="fileinput-new" style="color: #6d6d6d;font-weight: 600;text-transform: uppercase;font-size: 12px;">Select Image</span>
                           <input type="file" name="image4" accept="image/*" style="width: 100%; font-size: 11px;" >
                          
                           </span>
                           <a href="#" class="btn btn-orange fileinput-exists shadow" data-dismiss="fileinput" style="color: #337ab7;  margin-bottom: 20px; margin-top: 10px;padding: 10px;font-size: 12px;">Remove</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div><!-- end col-->     
 <div class="col-lg-4" >
         <div class="panel panel-primary shadow-lg" data-collapsed="0" style="background-color: #fff;">
            <div class="panel-heading" style="background-color: #337ab7">
               <div class="panel-title ml-2" style="color: white; padding-top: 8px;padding-bottom: 8px;">
                  Upload image-5 (900x1167)
               </div>
            </div>
            <div class="panel-body">
               <div class="form-group">
                  <div class="col-md-12 text-center">
                     <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-preview fileinput-exists thumbnail mt-2 ml-2" style="max-width: 200px; max-height: 150px; display: block;padding: 4px;margin-bottom: 20px;line-height: 1.5;background-color: #fff;border:  1px solid  #ddd;border-radius: 4px;transition: border .2s ease-in-out;overflow: hidden;"><img src="<?php echo base_url('uploads/'.$data->image5);?>"/></div>
                        <div>
                           <span class="btn btn-file shadow" style="width: 90%;">
                           <span class="fileinput-new" style="color: #6d6d6d;font-weight: 600;text-transform: uppercase;font-size: 12px;">Select Image</span>
                           <input type="file" name="image5" accept="image/*" style="width: 100%; font-size: 11px;" >
                          
                           </span>
                           <a href="#" class="btn btn-orange fileinput-exists shadow" data-dismiss="fileinput" style="color: #337ab7;  margin-bottom: 20px; margin-top: 10px;padding: 10px;font-size: 12px;">Remove</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div><!-- end col-->     
      </div>   
        <div class="col-sm-12" style="height: 100px;">
                      <!-- <a href="<?php echo site_url('product/manage_products');?>"  name="cancel" class="btn btn-default">Cancel</a> -->
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