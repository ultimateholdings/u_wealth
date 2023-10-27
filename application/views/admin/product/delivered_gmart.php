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
            <!--<th class="noExport">Shipping Address</th>-->
            <!--<th class="noExport">Billing Address</th>-->

            <!--<th>Tracking details</th>-->
            <th class="noExport">#</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sn = 1;
        foreach ($orders as $key=>$e) {
          $resultMember=$this->db->query('select id from member where id="'
                      .$e->user_id.'"')->result();
          // print_r($resultMember[$key]->id);
          if ($resultMember[0]->id) { ?>       
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo config_item('ID_EXT') . $e->user_id; ?></td>
                <?php if(config_item('enable_vendor_management')=='Yes'){ 
                $vendor=$this->db_model->select('vendor_id', 'tbl_order_details', array('id'=>$e->order_id));    ?>   
                  <td><?php echo config_item('ID_EXT') . $vendor;?></td>
                <?php } ?>
                <td><?php echo $e->product_title ; ?></td>
                <td><?php echo  config_item('currency') . $e->product_price; ?></td>
                <td><?php echo  $e->product_qty; ?></td>
                <td><?php echo  config_item('currency') . ($e->product_price)*($e->product_qty);?></td>
                <td><?php 
                $date=$this->db_model->select('delivery_date', 'tbl_order_details', array('id'=>$e->order_id));                //echo $date;

                echo date("M d Y",$date); ?></td>
                <td><?php 
                  $payment_method=$this->db_model->select('gateway', 'tbl_transaction', array('order_id'=>$e->order_id));
                  echo $payment_method;
                if($e->vendor_id==''){ ?> 
                   <td>
                    <?php if ($e->pro_order_status !== "3") { 
                        if($e->pro_order_status == '2') { ?>
                        <a style="display:none;" data-toggle="modal" data-target="#shipped_modal"
                           onclick="document.getElementById('shippedid').value='<?php echo $e->id ?>'"
                           class="btn btn-primary btn-xs" >Update Tracking</a> <br>
                        <a style="display:none;" data-toggle="modal" data-target=""
                           onclick="document.getElementById('mark_deliverid').value='<?php echo $e->id ?>'"
                           class="btn btn-primary btn-xs" disabled >MarK Delivered</a>
                        
                        <a data-toggle="modal" data-target="#myModal"
                           onclick="document.getElementById('deliverid').value='<?php echo $e->id ?>'"
                           class="btn btn-primary btn-xs">Mark Completed</a> <br>
                        <?php  } else { ?>
                        <a  data-toggle="modal" data-target="#shipped_modal"
                           onclick="document.getElementById('shippedid').value='<?php echo $e->id ?>'"
                           class="btn btn-primary btn-xs" >Update Tracking</a> <br>
                        <a  data-toggle="modal" data-target="#delivered_modal"
                           onclick="document.getElementById('mark_deliverid').value='<?php echo $e->id ?>'"
                           class="btn btn-primary btn-xs" >Mark Delivered</a>
                            
                        <a data-toggle="modal" data-target="#myModal"
                           onclick="document.getElementById('deliverid').value='<?php echo $e->id ?>'"
                           class="btn btn-primary btn-xs">Mark Completed</a> <br>
                        <?php  }} ?>
                    
                    <?php if($e->product_id > 0) { ?>
                    <a style="display:none;" onclick="return confirm('Are you sure you want to delete this Order ?')"
                       href="<?php echo site_url('product/remove_order/' . $e->id); ?>" class="btn btn-danger btn-xs">Delete</a>
                    <?php } ?>
                   </td>
                <?php } 
                elseif($e->vendor_id!='')
                { 
                  if(config_item('enable_vendor_management')=="Yes"){ ?>
                  <td>
                    <?php if ($e->pro_order_status !== "5") { 
                        if($e->pro_order_status == '4') { ?>
                        <a style="display:none;" data-toggle="modal" data-target="#shipped_modal"
                           onclick="document.getElementById('shippedid').value='<?php echo $e->id ?>'"
                           class="btn btn-primary btn-xs" >Update Tracking</a> <br>
                        <a style="display:none;" data-toggle="modal" data-target=""
                           onclick="document.getElementById('mark_deliverid').value='<?php echo $e->id ?>'"
                           class="btn btn-primary btn-xs" disabled >MarK Delivered</a>
                        
                        <a data-toggle="modal" data-target="#myModal"
                           onclick="document.getElementById('deliverid').value='<?php echo $e->id ?>'"
                           class="btn btn-primary btn-xs">Mark Completed</a> <br>
                        <?php  } else { ?>
                        <a style="display:none;" data-toggle="modal" data-target="#shipped_modal"
                           onclick="document.getElementById('shippedid').value='<?php echo $e->id ?>'"
                           class="btn btn-primary btn-xs" >Update Tracking</a> <br>
                        <a style="display:none;" data-toggle="modal" data-target="#delivered_modal"
                           onclick="document.getElementById('mark_deliverid').value='<?php echo $e->id ?>'"
                           class="btn btn-primary btn-xs" >Mark Delivered</a>
                            <?php if(1){ ?>
                        <a data-toggle="modal" data-target="#myModal"
                           onclick="document.getElementById('deliverid').value='<?php echo $e->id ?>'"
                           class="btn btn-primary btn-xs">Mark Completed</a> <br>
                    <?php } }} ?>
                    <a href="<?php echo site_url('product/view_order/' . $e->id); ?>"
                       class="btn btn-success btn-xs">View</a>
                    <a target='_blank' href="<?php echo site_url('product/print_order/' . $e->id); ?>" class="btn btn-info btn-xs">Print Label</a>
                          <!--<a target="_blank" href="<?php echo site_url('accounting/invoice_view/' . $this->db_model->select('id', 'invoice', array('order_id'=>$e->id))); ?>" class="btn btn-info btn-xs">Print Invoice</a>-->
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
                        <!--<a style="display:none;" data-toggle="modal" data-target="#shipped_modal"
                           onclick="document.getElementById('shippedid').value='<?php echo $e->id ?>'"
                           class="btn btn-primary btn-xs" >Update Tracking</a> <br>
                        <a data-toggle="modal" data-target=""
                           onclick="document.getElementById('mark_deliverid').value='<?php echo $e->id ?>'"
                           class="btn btn-primary btn-xs" disabled >MarK Delivered</a>-->
                        <a data-toggle="modal" data-target="#myModal"
                           onclick="document.getElementById('deliverid').value='<?php echo $e->id ?>'"
                           class="btn btn-primary btn-xs">Mark Completed</a> <br>
                        <?php } else { ?>
                        <!--<a data-toggle="modal" data-target="#shipped_modal"
                           onclick="document.getElementById('shippedid').value='<?php echo $e->id ?>'"
                           class="btn btn-primary btn-xs" >Update Tracking</a> <br>
                        <a data-toggle="modal" data-target="#delivered_modal"
                           onclick="document.getElementById('mark_deliverid').value='<?php echo $e->id ?>'"
                           class="btn btn-primary btn-xs" >Mark Delivered</a>-->
                        <a data-toggle="modal" data-target="#myModal"
                           onclick="document.getElementById('deliverid').value='<?php echo $e->id ?>'"
                           class="btn btn-primary btn-xs">Mark Completed</a> <br>
                    <?php }} ?>
                    <a href="<?php echo site_url('product/view_order/' . $e->id); ?>"
                       class="btn btn-success btn-xs">View</a>
                    <a target='_blank' href="<?php echo site_url('product/print_order/' . $e->id); ?>" class="btn btn-info btn-xs">Print Label</a>
                          <!--<a target="_blank" href="<?php echo site_url('accounting/invoice_view/' . $this->db_model->select('id', 'invoice', array('order_id'=>$e->id))); ?>" class="btn btn-warning btn-xs">Print Invoice</a>-->
                    <?php if($e->product_id > 0) { ?>
                    <a style="display:none;" onclick="return confirm('Are you sure you want to delete this Order ?')"
                       href="<?php echo site_url('product/remove_order/' . $e->id); ?>" class="btn btn-danger btn-xs">Delete</a>
                    <?php } ?>
                  </td>
                  <?php }
                } ?>

            </tr>
        <?php } }?>
        </tbody>
    </table>
</div>
<div class="modal fade" id="shipped_modal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Shipping Details</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('product/shipped') ?>
                <label>Enter Shipping Detail (eg: Tracking No)</label>
                <input type="hidden" name="shippedid" id="shippedid">
                <textarea class="form-control" name="sdetail"></textarea>
                <div class="pull-right">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="delivered_modal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Delivery Details</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('product/mark_delivered') ?>
                <label>Enter Delivery Details (eg: Tracking No)</label>
                <input type="hidden" name="mark_deliverid" id="mark_deliverid">
                <textarea class="form-control" name="sdetail"></textarea>
                <div class="pull-right">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Details</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('product/deliver_gmart') ?>
                <label>Enter Notes:</label>
                <input type="hidden" name="deliverid" value="" id="deliverid">
                <textarea class="form-control" name="tdetail"></textarea>
                <div class="pull-right">
                    <button type="submit" class="btn btn-success">Mark Complete</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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