<style>
   .sec{
      margin-left: -21px;
      width: 110%;
   }
   .third{
      width: 10px;
   }
</style>


<div class="container">
  <div class="row" style="flex-direction: row-reverse;margin-bottom: 20px;">
    

      <div class="pull-right mr-2">
         <a href="javascript:void(0);" data-toggle="modal" data-target="#myModal" class="btn btn-success"><i class="plus"></i> Import CSV Data</a>
           </div>
  
      
      <div class="pull-right mr-2"> 
         <form method="post" action='export_product_details'>
            <input type="submit" class="btn btn-success" name="export_product_details" value="Download CSV Template" class="btn btn-primary"/>
         </form>
      </div>
  </div>
</div> 
   <!-- File upload form -->
   <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog modal-sm">
         <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title">Import CSV</h4>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
              
            </div>
            <div class="modal-body">
               <form action="<?php echo base_url('product/import'); ?>" 
                  method="post" enctype="multipart/form-data">
                  <input type="file" name="file" />
               </form>
               <div class="modal-footer">
                <div class="row"  style="width: 100%;">
                  <div class="col-sm-6" style="text-align-last: left;padding-left: 0px;">
                      <input type="submit" class="btn btn-primary" 
                     name="importSubmit" value="IMPORT">

                    
                  </div>
                  <div class="col-sm-6" style="text-align-last: end;padding-right: 0px;">
                     <button type="close" class="btn btn-primary" data-dismiss="modal">Close</button>
                    
                  </div>
                  
                </div>
                               
               </div>
            </div>
         </div>
      </div>
   </div>

<script src="<?php echo base_url();?>axxets/admin/js/fileinput.js"></script>
<script src="<?php echo base_url();?>axxets/admin/js/component.fileupload.js" charset="utf-8"></script>
<script src="<?php echo base_url();?>axxets/admin/js/jquery-2.2.4.min.js"></script>
<div class="container">
   <?php echo form_open_multipart() ?>
   <div class="form-group container">
      <div class="row">
         <div class="col-sm-6">
            <label>Product/Service Name*</label>
            <input type="text" class="form-control" name="prod_name" value="<?php echo set_value('prod_name') ?>">
         </div>
         <div class="col-sm-6">
            <label>Plan Commission *</label>
            <select class="form-control" name="plan_id" required>
            <?php foreach ($plans as $val) {
               echo '<option value="' . $val['id'] . '">' . $val['plan_name'] . '</option>';
               } ?>
            </select>
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
               echo '<option value="' . $val['brand_id'] . '">' . $val['brand_name'] . '</option>';
               } ?>
            </select>
         </div>
         <div class="col-sm-6">
            <label>Product Selling Price</label>
            <input type="text" class="form-control" name="prod_price" value="<?php echo set_value('prod_price') ?>">
         </div>
         <?php if(config_item('enable_franchisee')=='Yes'){ ?>
         <div class="col-sm-6">
            <label>Dealer Price (Franchisee Price)</label>
            <input type="text" class="form-control" name="dealer_price" value="<?php echo set_value('dealer_price') ?>">
         </div>
         <?php } ?>
         <div class="col-sm-6">
            <label>Product Cost</label>
            <input type="text" class="form-control" name="product_cost" value="<?php echo set_value('product_cost') ?>">
         </div>
         <?php if(config_item('enable_pv')=='Yes'){ ?>
         <div class="col-sm-6">
            <label>Business Value or PV</label>
            <input type="text" class="form-control" name="pv" value="<?php echo set_value('pv') ?>">
         </div>
         <?php } ?>
         <div class="col-sm-6">
            <label>Available Qty (-1 for no limit)</label>
            <input type="number" class="form-control" placeholder="-1 for unlimited" name="qty"
               value="<?php echo set_value('qty', '-1') ?>">
         </div>
         <div class="col-sm-6">
            <label>Discount (%)</label>
            <input type="text" class="form-control" name="discount" value="<?php echo set_value('discount') ?>">
         </div>
         <div class="col-sm-6">
            <label>GST/TAX (%)</label>
            <input type="text" class="form-control" name="gst" value="<?php echo set_value('gst') ?>">
         </div>
         <?php if(config_item('enable_variation')=='Yes') { ?>
         <div class="col-sm-6" style="margin-bottom: 20px;">
            <label>Select Product Type*</label>
            <select class="form-control" name="product_type" id="product_type">
               <option value="single">Single</option>
               <option value="variable">Variable</option>
            </select>
         </div>
         <?php } ?>
         
            <div class="form-group row" id="variable_product" style="width:100%;margin: auto;">
               <div class="col-sm-12">
                  <h4 style="line-height: 35px;">
                     <label>Select Variants<br> <a href="<?php echo site_url('product/add_variation') ?>" class="btn btn-xs btn-success">Add New Variation</a></label> 
                  </h4>
               </div> 
               <div class="col-sm-6"> 
                  <div class="table-responsive">
                     <table id="variant_table" class="table table-condensed table-bordered blue-header variation_value_table">
                        <tr>
                           <td>
                              <select class="form-control input-sm variation_template"  name="variant_value[]" id="vari_ant">
                              <?php foreach ($variant as $val) {
                                 echo '<option value="' . $val['variant_name'] . '">' . $val['variant_name'] . '</option>';
                                 } ?>
                              </select>
                           </td>
                           <td id="second_col"><input type="button" onclick="insRow('variant_table')" class="btn btn-success btn-xs add_variation_value_row" value="+"></td>
                        </tr>
                     </table>
                  </div>
               </div>
            </div>
         <div>&nbsp;</div>
         <br> 
      </div>
      <div class="row" > 
        
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
                        <div class="fileinput-preview fileinput-exists thumbnail mt-2 ml-2" style="max-width: 200px; max-height: 150px; display: block;padding: 4px;margin-bottom: 20px;line-height: 1.5;background-color: #fff;border:  1px solid  #ddd;border-radius: 4px;transition: border .2s ease-in-out;overflow: hidden;"></div>
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
      </div>
      <!-- end col-->
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
                        <div class="fileinput-preview fileinput-exists thumbnail mt-2 ml-2" style="max-width: 200px; max-height: 150px; display: block;padding: 4px;margin-bottom: 20px;line-height: 1.5;background-color: #fff;border:  1px solid  #ddd;border-radius: 4px;transition: border .2s ease-in-out;overflow: hidden;"></div>
                        <div>
                           <span class="btn btn-file shadow" style="width: 90%;">
                           <span class="fileinput-new" style="color: #6d6d6d;font-weight: 600;text-transform: uppercase;font-size: 12px;">Select Image</span>
                           <input type="file" name="image2" accept="image/*" style="width: 100%; font-size: 11px;">
                          
                           </span>
                           <a href="#" class="btn btn-orange fileinput-exists shadow" data-dismiss="fileinput" style="color: #337ab7;  margin-bottom: 20px; margin-top: 10px;padding: 10px;font-size: 12px;">Remove</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end col-->
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
                        <div class="fileinput-preview fileinput-exists thumbnail mt-2 ml-2" style="max-width: 200px; max-height: 150px; display: block;padding: 4px;margin-bottom: 20px;line-height: 1.5;background-color: #fff;border:  1px solid  #ddd;border-radius: 4px;transition: border .2s ease-in-out;overflow: hidden;"></div>
                        <div>
                           <span class="btn btn-file shadow" style="width: 90%;">
                           <span class="fileinput-new" style="color: #6d6d6d;font-weight: 600;text-transform: uppercase;font-size: 12px;">Select Image</span>
                           <input type="file" name="image3" accept="image/*" style="width: 100%; font-size: 11px;">
                          
                           </span>
                           <a href="#" class="btn btn-orange fileinput-exists shadow" data-dismiss="fileinput" style="color: #337ab7;  margin-bottom: 20px; margin-top: 10px;padding: 10px;font-size: 12px;">Remove</a>
                        </div>
                     </div>
                  </div> 
               </div>
            </div>
         </div>
      </div>
      <!-- end col-->
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
                        <div class="fileinput-preview fileinput-exists thumbnail mt-2 ml-2" style="max-width: 200px; max-height: 150px; display: block;padding: 4px;margin-bottom: 20px;line-height: 1.5;background-color: #fff;border:  1px solid  #ddd;border-radius: 4px;transition: border .2s ease-in-out;overflow: hidden;"></div>
                        <div>
                           <span class="btn btn-file shadow" style="width: 90%;">
                           <span class="fileinput-new" style="color: #6d6d6d;font-weight: 600;text-transform: uppercase;font-size: 12px;">Select Image</span>
                           <input type="file" name="image4" accept="image/*" style="width: 100%; font-size: 11px;">
                          
                           </span>
                           <a href="#" class="btn btn-orange fileinput-exists shadow" data-dismiss="fileinput" style="color: #337ab7;  margin-bottom: 20px; margin-top: 10px;padding: 10px;font-size: 12px;">Remove</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
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
                        <div class="fileinput-preview fileinput-exists thumbnail mt-2 ml-2" style="max-width: 200px; max-height: 150px; display: block;padding: 4px;margin-bottom: 20px;line-height: 1.5;background-color: #fff;border:  1px solid  #ddd;border-radius: 4px;transition: border .2s ease-in-out;overflow: hidden;"></div>
                        <div>
                           <span class="btn btn-file shadow" style="width: 90%;">
                           <span class="fileinput-new" style="color: #6d6d6d;font-weight: 600;text-transform: uppercase;font-size: 12px;">Select Image</span>
                           <input type="file" name="image5" accept="image/*" style="width: 100%; font-size: 11px;">
                          
                           </span>
                           <a href="#" class="btn btn-orange fileinput-exists shadow" data-dismiss="fileinput" style="color: #337ab7;  margin-bottom: 20px; margin-top: 10px;padding: 10px;font-size: 12px;">Remove</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

         <!-- end col-->
         <div>&nbsp;</div>
      </div>
      <br>
      <div class="col-sm-5">
         <span>Display Product to Member ?</span>
         <select class="form-control" name="display_product" id="display_product">
            <option value="Yes">Yes</option>
            <option value="No" >No</option>
         </select>
      </div>
      <div class="col-sm-10">
         <br>
         <label>Product/Service Description</label>
         <textarea class="form-control" id="editor" name="prod_desc"><?php echo set_value('prod_desc') ?></textarea>
      </div>
      <div class="col-sm-10"><br/>
          <input type="submit" class="btn btn-success" value="Create" onclick="this.value='Creating..'">
          <a href="<?php echo site_url('admin');?>" id="cancel" name="cancel" class="btn btn-light">Cancel</a>
       </div>
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
<script type="text/javascript">
   $(document).ready(function(){
     if($('#product_type').val() =="variable"){
         //alert("variable is hidden");
         $('#variable_product').show();
         
     }else{
         $('#variable_product').hide();
     }
     $('#product_type').change(function(){
       if(this.value=='variable')
       {
         //$('#single_product').hide(); 
         $('#variable_product').show();
         
        }
       else{
         //$('#single_product').show();
         $('#variable_product').hide();
       }
     });
   });
</script> 
<script>
   function deleteRow() {
       //alert("id");
       document.getElementById("variant_table").deleteRow(1);
   }
   
   function insRow(id) {
       //alert(id);
       var filas = document.getElementById("variant_table");
       //alert(filas);
       var x = document.getElementById(id).insertRow(1);
       //alert(filas);
       var y = x.insertCell(0);
       var z = x.insertCell(1);
       //alert(id);
       y.innerHTML ='<td><select class="form-control input-sm variation_template fourth_stack"  name="variant_value[]"><?php foreach ($variant as $val) {
      echo '<option value="' . $val['variant_name'] . '">' . $val['variant_name'] . '</option>';} ?></select></td>';
       z.innerHTML ='<td><input type="button" onclick="deleteRow()" class="btn btn-danger btn-xs add_variation_value_row" value="-" /></td>';
       <?php if((config_item('admin_theme')=='admin/stack/index') ) { ?>
         document.getElementsByClassName("fourth_stack")[0].classList.add('sec');
                 
      <?php } ?> 

       //z.innerHTML='<td><input type="button" onclick="deleteRow('variant_table')" class="btn btn-success btn-xs add_variation_value_row" value="-"></td>'
       //e.innerHTML ='<td><input type="button" onclick="deleteRow("variant_table",id)" class="btn btn-danger btn-xs add_variation_value_row" value="-"></td>';
      }
</script>
<script>
   <?php if((config_item('admin_theme')=='admin/stack/index') ) { ?>
     $(document).ready(function () {

      document.getElementById("vari_ant").classList.add('sec');
       document.getElementById("second_col").classList.add('third');
     });
            
      <?php } ?> 
      </script>
       

