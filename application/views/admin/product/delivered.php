<?php
$name=$this->db_model->select('username', 'staffs', array('username' =>$this->session->name ));
?>
<div class="table-responsive">
    <table class="table table-striped table-bordered" id="DTable" data-page-length='100' data-name="Delivered_order_list" data-export='Yes'>
      <thead>
        <tr>
            <th>SN</th>
            <th>User ID</th>
            <?php if(config_item('enable_vendor_management')=='Yes'){ ?>
            <th>Vendor ID</th>
            <?php } ?>
            <th>Product</th>
            <th>Price <?php echo config_item('currency'); ?></th>
            <th>Qty</th>
            <th>Total <?php echo config_item('currency'); ?></th>

            <th class="datefilter">Date</th>
            <th>Payment Method</th>
            <th class="noExport">Shipping Address</th>
            <th class="noExport">Billing Address</th>

            <th>Tracking details</th>
            <th class="noExport">#</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sn = count($orders);
        foreach ($orders as $e) { ?>
            <tr>
                <td><?php echo $sn--; ?></td>
                <td><?php echo config_item('ID_EXT') . $e->userid; ?></td>
                <?php if(config_item('enable_vendor_management')=='Yes'){ ?>
                  <td><?php echo config_item('ID_EXT') . $e->vendor_id;?></td>
                <?php } ?>
                <td><?php echo $e->product_id > 0 ? $this->db_model->select('prod_name', 'product', array('id' => $e->product_id)) : $e->name ; ?></td>
                <td><?php echo  config_item('currency') . $e->cost; ?></td>
                <td><?php echo  $e->qty; ?></td>
                <td><?php echo  config_item('currency') . ($e->cost)*($e->qty);?></td>
                <td><?php echo date("Y-m-d h:i A",strtotime($e->date)); ?></td>
                <td><?php echo $e->payment; 
                if(($e->payment != "Ewallet") && ($e->payment !='Registration Purchase') && ($e->payment !='cash')){
                    echo "<br/><br/>Transaction ID:<br/>". $e->bank_trans_id;
                } ?></td>
                <td><?php $member_data = $this->db_model->select_multi('s_name, s_email, s_phone,s_city,s_state,s_zipcode, s_address', 'shipping_address', array('userid' => $e->userid));
                
                 echo "Name:". $member_data->s_name  . "<br/>";   
                 echo "Email:".$member_data->s_email . "<br/>";
                 echo "Phone:".$member_data->s_phone . "<br/>";
                 echo "Address:".$member_data->s_address . "<br/>";
                 echo "City:".$member_data->s_city . "<br/>";
                 echo "State:".$member_data->s_state . "<br/>";
                 echo "Zipcode:".$member_data->s_zipcode . "<br/>";
                  ?>
                </td>
                <td><?php $member_data = $this->db_model->select_multi('b_name, b_email, b_phone,b_city,b_state,b_zipcode, b_address', 'shipping_address', array('userid' => $e->userid));
                 echo "Name:". $member_data->b_name . "<br/>";   
                 echo "Email:".$member_data->b_email . "<br/>";
                 echo "Phone:".$member_data->b_phone . "<br/>";
                 echo "Address:".$member_data->b_address . "<br/>";
                 echo "City:".$member_data->b_city . "<br/>";
                 echo "State:".$member_data->b_state . "<br/>";
                 echo "Zipcode:".$member_data->b_zipcode . "<br/>"; ?>
                </td>
                <td><?php echo $e->tid;?></td>
                <?php if($e->vendor_id=='1'){ ?> 
                   <td>
                    <?php if ($e->status !== "Completed") { 
                        if($e->status == 'Delivered') { ?>
                        <a style="display:none;" data-toggle="modal" data-target="#shipped_modal"
                           onclick="document.getElementById('shippedid').value='<?php echo $e->id ?>'"
                           class="btn btn-primary btn-xs" >Update Tracking</a> <br><br>
                        <a style="display:none;" data-toggle="modal" data-target=""
                           onclick="document.getElementById('mark_deliverid').value='<?php echo $e->id ?>'"
                           class="btn btn-primary btn-xs" disabled >MarK Delivered</a><br><br>
                        
                        <a data-toggle="modal" data-target="#myModal"
                           onclick="document.getElementById('deliverid').value='<?php echo $e->id ?>'"
                           class="btn btn-primary btn-xs">Mark Completed</a> <br><br>
                        <?php  } else { ?>
                        <a  data-toggle="modal" data-target="#shipped_modal"
                           onclick="document.getElementById('shippedid').value='<?php echo $e->id ?>'"
                           class="btn btn-primary btn-xs" >Update Tracking</a> <br><br>
                        <a  data-toggle="modal" data-target="#delivered_modal"
                           onclick="document.getElementById('mark_deliverid').value='<?php echo $e->id ?>'"
                           class="btn btn-primary btn-xs" >Mark Delivered</a><br><br>
                            
                        <a data-toggle="modal" data-target="#myModal"
                           onclick="document.getElementById('deliverid').value='<?php echo $e->id ?>'"
                           class="btn btn-primary btn-xs">Mark Completed</a> <br><br>
                        <?php  }} ?>
                    <a href="<?php echo site_url('product/view_order/' . $e->id); ?>"
                       class="btn btn-success btn-xs">View</a><br><br>
                    <a target='_blank' href="<?php echo site_url('product/print_order/' . $e->id); ?>" class="btn btn-info btn-xs">Print Label</a><br><br>
                        
                    <?php if($e->product_id > 0) { ?>
                    <a style="display:none;" onclick="return confirm('Are you sure you want to delete this Order ?')"
                       href="<?php echo site_url('product/remove_order/' . $e->id); ?>" class="btn btn-danger btn-xs">Delete</a>
                    <?php } ?>
                   </td>
                <?php } 
                elseif($e->vendor_id!='1')
                { 
                  if(config_item('enable_vendor_management')=="Yes"){ ?>
                  <td>
                    <?php if ($e->status !== "Completed") { 
                        if($e->status == 'Delivered') { ?>
                        <a style="display:none;" data-toggle="modal" data-target="#shipped_modal"
                           onclick="document.getElementById('shippedid').value='<?php echo $e->id ?>'"
                           class="btn btn-primary btn-xs" >Update Tracking</a> <br><br>
                        <a style="display:none;" data-toggle="modal" data-target=""
                           onclick="document.getElementById('mark_deliverid').value='<?php echo $e->id ?>'"
                           class="btn btn-primary btn-xs" disabled >MarK Delivered</a><br><br>
                        
                        <a data-toggle="modal" data-target="#myModal"
                           onclick="document.getElementById('deliverid').value='<?php echo $e->id ?>'"
                           class="btn btn-primary btn-xs">Mark Completed</a> <br><br>
                        <?php  } else { ?>
                        <a style="display:none;" data-toggle="modal" data-target="#shipped_modal"
                           onclick="document.getElementById('shippedid').value='<?php echo $e->id ?>'"
                           class="btn btn-primary btn-xs" >Update Tracking</a> <br><br>
                        <a style="display:none;" data-toggle="modal" data-target="#delivered_modal"
                           onclick="document.getElementById('mark_deliverid').value='<?php echo $e->id ?>'"
                           class="btn btn-primary btn-xs" >Mark Delivered</a><br><br>
                            <?php if($name!=""){ ?>
                        <a data-toggle="modal" data-target="#myModal"
                           onclick="document.getElementById('deliverid').value='<?php echo $e->id ?>'"
                           class="btn btn-primary btn-xs">Mark Completed</a> <br><br>
                    <?php } }} ?>
                    <a href="<?php echo site_url('product/view_order/' . $e->id); ?>"
                       class="btn btn-success btn-xs">View</a><br><br>
                    <a target='_blank' href="<?php echo site_url('product/print_order/' . $e->id); ?>" class="btn btn-info btn-xs">Print Label</a><br><br>
                         
                    <?php if($e->product_id > 0) { ?>
                    <a style="display:none;" onclick="return confirm('Are you sure you want to delete this Order ?')"
                       href="<?php echo site_url('product/remove_order/' . $e->id); ?>" class="btn btn-danger btn-xs">Delete</a>
                    <?php } ?>
                  </td>
                  <?php } 
                  else { ?>
                  <td>
                    <?php if ($e->status !== "Completed") { 
                        if($e->status == 'Delivered') { ?>
                    
                        <a data-toggle="modal" data-target="#myModal"
                           onclick="document.getElementById('deliverid').value='<?php echo $e->id ?>'"
                           class="btn btn-primary btn-xs">Mark Completed</a> <br><br>
                        <?php } else { ?>
                       
                        <a data-toggle="modal" data-target="#myModal"
                           onclick="document.getElementById('deliverid').value='<?php echo $e->id ?>'"
                           class="btn btn-primary btn-xs">Mark Completed</a> <br><br>
                    <?php }} ?>
                    <a href="<?php echo site_url('product/view_order/' . $e->id); ?>"
                       class="btn btn-success btn-xs">View</a><br><br>
                    <a target='_blank' href="<?php echo site_url('product/print_order/' . $e->id); ?>" class="btn btn-info btn-xs">Print Label</a><br><br>
                         
                    <?php if($e->product_id > 0) { ?>
                    <a style="display:none;" onclick="return confirm('Are you sure you want to delete this Order ?')"
                       href="<?php echo site_url('product/remove_order/' . $e->id); ?>" class="btn btn-danger btn-xs">Delete</a>
                    <?php } ?>
                  </td>
                  <?php }
                } ?>

            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<div class="modal fade" id="shipped_modal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title">Shipping Details</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <?php echo form_open('product/shipped') ?>
                <label>Enter Shipping Detail (eg: Tracking No)</label>
                <input type="hidden" name="shippedid" id="shippedid">
                <textarea class="form-control" name="sdetail"></textarea>
               <!--  <div class="pull-right">
                    <button type="submit" class="btn btn-success">Update</button>
                </div> -->
                <div class="pull-lef mt-1">
                    <button type="submit" class="btn btn-success">Update</button>
                    <div class="pull-right">
                  <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                  
                </div>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div> -->
        </div>
    </div>
</div>
<div class="modal fade" id="delivered_modal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title">Delivery Details</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <?php echo form_open('product/mark_delivered') ?>
                <label>Enter Delivery Details (eg: Tracking No)</label>
                <input type="hidden" name="mark_deliverid" id="mark_deliverid">
                <textarea class="form-control" name="sdetail"></textarea>
                <div class="pull-lef mt-1">
                    <button type="submit" class="btn btn-success">Update</button>
                    <div class="pull-right">
                  <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                  
                </div>
                </div>
                <?php echo form_close() ?>
            </div>
            
        </div>
    </div>
</div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                
                <h4 align="pull-lef" class="modal-title">Details</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <?php echo form_open('product/deliver'); ?>
                <label>Enter Notes:</label>
                <input type="hidden" name="deliverid" value="" id="deliverid">
                <textarea class="form-control" name="tdetail"></textarea>
                <div class="pull-lef mt-1">
                    <button type="submit" class="btn btn-success">Update</button>
                    <div class="pull-right">
                  <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                  
                </div>
                </div>
                <?php echo form_close(); ?>
            </div>
            
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("prodservices").classList.add('active');
        document.querySelector("#prodservices > ul > li:nth-child(6) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>