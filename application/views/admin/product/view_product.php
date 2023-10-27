<?php

?>
<div class="row view" style="line-height: 40px;">
    <div class="col-sm-6"><strong>Product Name: </strong> <?php echo $data->prod_name ?></div>
    <div class="col-sm-6"><strong>Plan Commission: </strong> <?php echo $this->db_model->select('plan_name', 'plans', array('id' => $data->plan_id)); ?></div>
    <div class="col-sm-6"><strong>Member Price: </strong> <?php echo config_item('currency') . $data->prod_price ?>
    </div>
    <?php if(config_item('enable_franchisee')=='Yes'){ ?>
    <div class="col-sm-6"><strong>Dealer/Franchisee
            Price: </strong> <?php echo config_item('currency') . $data->dealer_price ?></div>
    <?php } ?>
    <?php if(config_item('enable_pv')=='Yes'){ ?>
    <div class="col-sm-6"><strong>BV/PV: </strong> <?php echo $data->pv ?></div>
    <?php } ?>
    <div class="col-sm-6"><strong>Discount: </strong> <?php echo $data->discount ?></div>
    <div class="col-sm-6"><strong>GST / Tax: </strong> <?php echo $data->gst ?></div>
    <div class="col-sm-6"><strong>Available Qty: </strong> <?php if($data->qty==-1){echo 'Unlimited';}else{echo $data->qty;}?></div>
</div><p class="hr_divider">&nbsp;</p>
<div class="row view">
    <div class="col-sm-12"><strong>Product Detail: </strong> <?php echo $data->prod_desc ?></div>
</div><p class="hr_divider">&nbsp;</p>
<div class="row view">
    <div class="col-sm-6"><strong>Total Sold: </strong> <?php echo $data->sold_qty ?> qty</div>
    <div class="col-sm-6"><strong>Selling Status: </strong> <?php echo $data->status ?></div>
    <!--<div class="col-sm-6"><strong>Direct Referral Income: </strong> <?php echo $data->direct_income ?></div>
    <div class="col-sm-6"><strong>Level Incomes: </strong> <?php echo $data->level_income ?></div>
    <div class="col-sm-6"><strong>Matching Incomes: </strong> <?php echo $data->matching_income ?></div>
    <div class="col-sm-6"><strong>Matching Income Capping: </strong> <?php echo $data->capping ?></div>-->
</div>
<div>&nbsp;</div>
<div class="row">
    
<div class="col-lg-4">
    <div align="center">
       <br><label>Product Image-1</label>
    <img src="<?php echo $data->image ? base_url('uploads/' . $data->image) : base_url('uploads/default.jpg'); ?>"
         class="img-responsive img-rounded" style="width: 300px; height: 300px;">
    </div>
</div>
<div class="col-lg-4">
    <div align="center">
       <br><label>Product Image-2</label>
    <img src="<?php echo $data->image2 ? base_url('uploads/' . $data->image2) : base_url('uploads/default.jpg'); ?>"
         class="img-responsive img-rounded" style="width: 300px; height: 300px;">
    </div>
</div>
<div class="col-lg-4">
    <div align="center">
       <br><label>Product Image-3</label>
    <img src="<?php echo $data->image3 ? base_url('uploads/' . $data->image3) : base_url('uploads/default.jpg'); ?>"
         class="img-responsive img-rounded" style="width: 300px; height: 300px;">
    </div>
</div>
<div class="col-lg-4">
    <div align="center">
       <br><label>Product Image-4</label>
    <img src="<?php echo $data->image4 ? base_url('uploads/' . $data->image4) : base_url('uploads/default.jpg'); ?>"
         class="img-responsive img-rounded" style="width: 300px; height: 300px;">
    </div>
</div>
<div class="col-lg-4">
    <div align="center">
       <br><label>Product Image-5</label>
    <img src="<?php echo $data->image5 ? base_url('uploads/' . $data->image5) : base_url('uploads/default.jpg'); ?>"
         class="img-responsive img-rounded" style="width: 300px; height: 300px;">
    </div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("prodservices").classList.add('active');
        document.querySelector("#prodservices > ul:nth-child(2) > li:nth-child(3) > a:nth-child(1) > span:nth-child(1)").setAttribute('style', 'color: darkorange !important;');
    });
</script>