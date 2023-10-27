<?php

?>


<style type="text/css">
    .mg{
        margin-top: 10px;
    }
  @media only screen and (max-width: 400px) {
   #dummy_otp_verify {
     margin-top: 10px;
  }
 @media only screen and (max-width: 300px) { 
    #resend{
        margin-top: 10px;
    }
     @media only screen and (max-width: 300px) {
   #conti_nue {
     margin-top: 10px;
  }


}
}
</style>

<style>
.filter-summary-selectedFilterContainer {
    /* padding-bottom: 4px; */
    padding-top: 15px;
}
.filter-summary-filterList {
    display: flex;
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
    flex-flow: row wrap;
    -webkit-box-align: baseline;
    align-items: baseline;
    margin: 0px;
    padding-left: 17px !important;
}
.filter-summary-filter {
    position: relative;
    background-color: #fff;
    text-transform: capitalize;
    color: #3e4152;
    cursor: default;
    font-size: 12px;
    padding: 6px 10px 6px 10px;
    border-radius: 20px;
    border: solid 1px #d4d5d9;
    margin: 3px;    
}
.filter-summary-removeFilter {
    position: absolute;
    top: 4px;
    right: 4px;
    width: 18px;
    height: 20px;
    z-index: 1;
    text-align: center;
    cursor: pointer;
}
.input[type="checkbox" i] {
    background-color: initial;
    cursor: default;
    -webkit-appearance: checkbox;
    box-sizing: border-box;
    margin: 3px 3px 3px 4px;
    padding: initial;
    border: initial;
}
.filter-summary-removeIcon {
    vertical-align: middle;
    opacity: 0.7;
    transform: scale(0.7);
}
.sprites-remove {
    width: 14px;
    height: 14px;
    background-position: -1083px 0;
}
</style>
<div class="container-fluid">
    <?php echo form_open_multipart() ?>
    <hr/>
    <div class="pull-right" style="display: none;">
        <?php echo $this->pagination->create_links(); ?>
     <a data-toggle="modal" data-target="#myModal3"
                           onclick="document.getElementById('deliverid').value='<?php echo $e->id ?>'"
                           class="btn btn-primary btn-xs mr-2"><i class="fa fa-plus"></i>ADD FLAG</a>
    </div>
    <div class="pull-right" >
        <?php echo $this->pagination->create_links(); ?>
     <a data-toggle="modal" data-target="#myModal2"
                           onclick="document.getElementById('deliverid').value='<?php echo $e->id ?>'"
                           class="btn btn-primary btn-xs mr-2 mb-1"><i class="fa fa-plus"></i>ADD SUB CATEGORY</a>
    </div>
    <div class="pull-right">
        <?php echo $this->pagination->create_links(); ?>
     <a data-toggle="modal" data-target="#myModal1"
                           onclick="document.getElementById('deliverid').value='<?php echo $e->id ?>'"
                           class="btn btn-primary btn-xs mr-2 mb-1"><i class="fa fa-plus"></i>ADD CATEGORY</a>
    </div>
    <div class="pull-right">
        <?php echo $this->pagination->create_links(); ?>
     <a  data-toggle="modal" data-target="#myModal"
                           onclick="document.getElementById('deliverid').value='<?php echo $e->id ?>'"
                           class="btn btn-primary btn-xs mr-2 mb-1"><i class="fa fa-plus"></i>ADD PARENT CATEGORY</a>
    </div>

</div>
    <?php echo form_close() ?>
<div class="table-responsive">
    <label> Category </label>
    <table class="table table-striped table-bordered">
        <tr>
            <th>SN</th>
            <th>Category</th>
            <th>Parent Category</th>
            <th>Sub Category</th>
        </tr>
        <?php
        $sn = 1;
        foreach ($category as $c) { 
             $this->db->select('sub_cat_name');
             $this->db->where('cat_id', $c['cat_id'])->where('parent_category',$c['parent_cat']);
             $q = $this->db->get('product_sub_category');
             $sub_cat = $q->result_array();
             ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $c['cat_name']; ?></td>
                <td><?php echo $c['parent_cat'] ?></td>
                <td>
                <?php foreach ($sub_cat as $s) {
                echo $s['sub_cat_name'];
                } ?>
                </td>
            </tr>
        <?php } ?>
       
    </table>
    <div class="pull-right">
        <?php echo $this->pagination->create_links(); ?>
    </div>
</div>
    
    <?php echo form_close() ?>
    <div class="pull-right">
        <?php echo $this->pagination->create_links(); ?>
     <a href="<?php echo site_url('admin/manage_sub_category') ?>"
                           class="btn btn-primary btn-xs mb-1"><i class="fa fa-minus"></i>Manage Sub CATEGORY</a>
    </div>
    <div class="pull-right">
        <?php echo $this->pagination->create_links(); ?>
     <a  href="<?php echo site_url('admin/manage_category') ?>"
                           class="btn btn-primary btn-xs mr-2mb-1"><i class="fa fa-minus "></i>Manage CATEGORY</a>
    </div>
    <div class="pull-right" style="display:none;">
        <?php echo $this->pagination->create_links(); ?>
     <a href="<?php echo site_url('admin/manage_parent_cat/') ?>"
                           class="btn btn-primary btn-xs mb-1"><i class="fa fa-minus"></i>Manage Parent CATEGORY</a>
    </div>


    
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                 <h4 class="modal-title ">Parent Category</h4>


 
                <button type="button" class="close" data-dismiss="modal">&times;</button>
               
            </div>
            <div class="modal-body">

                <?php echo form_open('admin/parent_category') ?>
                <label>Parent Category Name</label>
                <input  name="parent_name" value="" id="parent_name"/>
                <label class="my-1">Brand Name</label>
                 <select class="form-control" name="brand_id">
                    <?php foreach ($brand as $b) {
                    echo '<option value="' . $b['brand_id'] . '">' . $b['brand_name'] . '</option>';
                  } ?>
                 </select>
             <div style="margin-top: 5px;">
                <button type="submit" class="btn btn-success ">Save</button>
                   <button type="close" class="btn btn-primary pull-right" data-dismiss="modal">Close</button>  
             </div>
                <?php echo form_close() ?>  
           <!--  <div class="modal-footer" style=" padding-top: 0px;">
                <button type="close" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div> -->
        </div>
    </div>
</div>
</div>
<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                  <h4 class="modal-title">Category</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              
            </div>
            <div class="modal-body">
                <?php echo form_open('admin/manage_cat') ?>

                <label>Category Name</label>
                <input type="text" name="category_name" value="" id="category_name">
                <label class="my-1">Parent Category Name</label>
                 <select class="form-control" name="parent_category">
                   <?php foreach ($parents as $val) {
                    echo '<option value="' . $val['parent_cat_id'] . '">' . $val['parent_cat_name'] . '</option>';
                } ?>
            </select>
       <!-- </div>-->
             <!--   <textarea class="form-control" name="tdetail"></textarea>-->
                <div style="margin-top: 5px;">
                    <button type="submit" class="btn btn-success">Save</button>
                   <button type="button" class="btn btn-primary pull-right" data-dismiss="modal">Close</button>  
                </div>
                <?php echo form_close() ?>  
                <!-- <div class="modal-footer">
                    <button type="close" class="btn btn-primary " data-dismiss="modal">Close</button>
                </div> -->
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                 <h4 class="modal-title">Sub Category</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
               
            </div>
            <div class="modal-body">
                <?php echo form_open('admin/sub_category') ?>
                <label>Sub Category Name</label>
                <input type="text" name="subcategory_name" value="" id="subcategory_name">
                <label class="my-1">Parent - Category Name</label>
                 <select class="form-control" name="parent_category_names">
                    <?php foreach ($category as $val) {
                      echo '<option value="' . $val['cat_name'] ."-". $val['parent_cat'] . '">' . $val['cat_name'] ."-". $val['parent_cat'].  '</option>';
                    } ?>
                 </select>
                
                 

             <!--   <textarea class="form-control" name="tdetail"></textarea>-->
                <div style="margin-top: 5px;">
                    <button type="submit" class="btn btn-success">Save</button>
                   <button type="button" class="btn btn-primary pull-right" data-dismiss="modal">Close</button>  
                </div>
                <?php echo form_close() ?>  
            <!-- <div class="modal-footer">
                <button type="close" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div> -->
        </div>
    </div>
</div>
</div>
<div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Flag</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('admin/add_flag') ?>
                <label>Flag Name</label>
                <input type="text" name="flag_name" value="" id="flag_name">
             <!--   <textarea class="form-control" name="tdetail"></textarea>-->
                <div class="pull-right">
                    <button type="submit" class="btn btn-success">Save</button>
                   <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->  
                </div>
                <?php echo form_close() ?>  
            <div class="modal-footer">
                <button type="close" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("prodservices").classList.add('active');
        document.querySelector("#prodservices > ul > li:nth-child(1) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>
<script>
    $(document).ready(function () {
    $('#agree').change(function() {
    if( $(this).prop('checked')) {
        $("#subcategory").show();
    } else {
        $("#subcategory").hide();
    }
});
});
</script>
<script>
   <?php if((config_item('admin_theme')=='admin/default/base') ) { ?>
     $(document).ready(function () {
   // $("#cont_act").css("margin-top","10px");
     //document.getElementById("cont_act").style.marginTop = "10px";
     document.getElementById("cont_act").classList.add('mg');
     });
            
      <?php } ?>
        <?php if((config_item('member')=='member/mega/index') ) { ?>
     $(document).ready(function () {
   // $("#conti_nue").css("margin-top","10px"); 
     //document.getElementById("conti_nue").style.marginTop = "10px";
     document.getElementById("conti_nue").classList.add('mg');
     });
            
      <?php } ?>
</script>




<div class="modal modal-visible" id="lead_details" role="dialog">
    <div class="modal-dialog vertical-align-center">
        <div class="modal-content">
            <div class="modal-header bg bg-warning">
                <h4 class="modal-title">Please fill the form for better User Experience</h4>
            </div>
            <?php echo form_open('site/captureLead/Member') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" id='name' class="form-control" name="dummy_text" pattern=".{3,}" title="Enter Valid Name" required>
                    <br>
                    <label>Phone Number</label>
                    <div class="input-group-prepend" >
                        <input type="text" class="form-control" id ='phone' name="dummy_values" pattern=".{7,10}" title="Enter Valid Phone Number" onkeypress="return keyRestrict(event, &#39;1234567890&#39;)" placeholder='Mobile Number' required>
                      </div>
                    <br>
                    <label>Email</label>
                    <input type="email" id="email" name="dummy_side" class="form-control" title="Enter Valid Email" placeholder='Email Address' required>
                    <br>
                    <label>* Approximate Budget</label>
                    <select class="form-control" id='budget_1' name="budget" required>
                       <option value="">Please Select</option>
                       <option value="< $2000"> < $2000</option>
                       <option value="$2000-$5000">$2000-$5000</option>
                       <option value="$5000-$10000">$5000-$10000</option>
                       <option value="$10000+">$10000+</option>
                    </select>
                </div>
                <br>
                <label>Country</label>
                <input type="hidden" id="countryCallingCode" name="dummy_country_code">
                <select id="country" name="dummy_country" class="form-control" required></select>
                    <br>
            </div>
            <div class="modal-footer">
                <a href="https://api.whatsapp.com/send?phone=919113511765&text=Welcome%20to%20Global%20MLM%20Software%20-%20%231%20Network%20Marketing%20Software.%20Need%20help%20accessing%20demo%20server." target="_blank" class="btn btn-warning" type="button" id="cont_act"  value="Contact Support" >Contact Support</a>
                <button class="btn btn-primary" type="submit" id="conti_nue">Continue</button>               
               
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

<div class="modal modal-visible" id="otp_verify" role="dialog">
    <div class="modal-dialog vertical-align-center">
        <div class="modal-content">
            <div class="modal-header bg bg-warning">
                <h4 class="modal-title">Please fill the form for better User Experience</h4>
            </div>
            <?php echo form_open('Site/captureLead/Admin') ?>
            <div class="modal-body">
                <div class="form-group ">
                OTP has been Sent your Email. Please enter OTP to proceed further !!! <br>
                <span id="change_email" style="display:none;">
                <span id="resent"></span>
                <label>Name</label>
                <input type="text" class="form-control" id="dummy_text" name="dummy_text" pattern=".{3,}" title="Enter Valid Name" required>
                <br>
                <label>Phone Number</label>
                <div class="input-group" style="display: flex;border-color: rgb(204, 204, 204);">
                    <input type="text" class="form-control" id="dummy_values" name="dummy_values" pattern=".{7,10}" title="Enter Valid Phone Number" onkeypress="return keyRestrict(event, &#39;1234567890&#39;)" placeholder='Mobile Number' required>
                  </div>
                <br>
                <label>Enter Email</label>
                <input type="email" id="dummy_side" name="dummy_side" class="form-control" title="Enter valid email" placeholder='Enter Email' required>
                <br>
                    <label>* Approximate Budget</label>
                    <select class="form-control" id="budget" name="budget" required>
                      <option value="">Please Select</option>
                       <option value="< $2000"> < $2000</option>
                       <option value="$2000-$5000">$2000-$5000</option>
                       <option value="$5000-$10000">$5000-$10000</option>
                       <option value="$10000+">$10000+</option>
                    </select>
                </span>
                <br>
                <label>Enter OTP</label>
                <input type="otp" id="dummy_otp_value" name="dummy_otp" class="form-control" title="Enter Otp" placeholder='Enter Otp' required> 
                <span id="wrong_otp"></span>
                <br>    
                </div>
            </div>
            <div class="modal-footer">
            <a href="https://api.whatsapp.com/send?phone=919113511765&text=Welcome%20to%20Global%20MLM%20Software%20-%20%231%20Network%20Marketing%20Software.%20Need%20help%20accessing%20demo%20server." target="_blank" class="btn btn-warning" type="button" value="Contact Support" style="margin:0px; margin-right: 10px;">Contact Support</a>
            <input onClick="edit_email(this.value)" class="btn btn-primary" type="button" value="Edit Details" id="resend" style="margin:0px;"></input>
            <button onclick="check_otp()" class="btn btn-success" type="button" value="Verify OTP" id="dummy_otp_verify">Submit</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

<div class="modal modal-visible" id="confirm" role="dialog" style="margin-top: 100px;">
    <div class="modal-dialog vertical-align-center">
        <div class="modal-content">
            <div class="modal-header bg bg-warning">
                <h4 class="modal-title">Let’s grow your Business !!!</h4>
            </div>
            <div class="modal-body">
                <div class="form-group ">
                Thanks for sharing your details. Our Consultant will reach out to you to schedule a <b> Live demo </b> of <b>Global MLM Pro </b>shortly. You can contact our Cusomter Relationship Manager for Quicker Demo !!!
                </div>
            </div>
            <div class="modal-footer" style="overflow-x: auto;">
            <a href="https://api.whatsapp.com/send?phone=919113511765&text=Welcome%20to%20Global%20MLM%20Software%20-%20%231%20Network%20Marketing%20Software.%20I%20Want%20Live%20demo%20of%20Global%20MLM%20Pro." target="_blank" class="btn btn-info" type="button" value="Contact Support" style="margin:0px;">Contact Customer Relationship Manager</a>
            </div>
        </div>
    </div>
</div>



