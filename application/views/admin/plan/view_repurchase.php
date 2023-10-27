<?php
?>
<div style="margin-left: 20px;">
<div class="row view" style="line-height: 30px;">
    <div class="col-sm-6"><strong>Income Type: </strong> <?php if($data->type=='Downline') {echo 'Downline Target';} else {echo 'MY Target';}?></div>
    <div class="col-sm-6"><strong>Income Name: </strong> <?php echo $data->income_name ?></div>
    <div class="col-sm-6"><strong>Income Based on : </strong> <?php echo $data->based_on; ?></div>
</div>
<p class="hr_divider">&nbsp;</p>
<div class="row view" style="line-height: 30px;">
    <?php if($data->type=='Downline') {
    if(config_item('width')=='2') { ?>
    <div class="col-sm-6"><strong>Left Value: </strong> <?php echo $data->A ?></div>
    <div class="col-sm-6"><strong>Right Value: </strong> <?php echo $data->B ?></div>
    <div class="col-sm-6"><strong>Commission: </strong> <?php echo config_item('currency') . $data->binary_matching ?></div>
    <?php } else { ?>
    <div class="col-sm-6"><strong>Downline Value: </strong> <?php echo $data->downline ?></div>
    <div class="col-sm-6"><strong>Commission: </strong> <?php echo config_item('currency') . $data->direct_commission ?></div>
    <?php }} else { ?>
    <div class="col-sm-6"><strong>MY PV: </strong> <?php echo $data->mypv ?></div>
    <div class="col-sm-6"><strong>Commission: </strong> <?php echo config_item('currency') . $data->amount ?></div>
    <?php } ?>
</div>
<p class="hr_divider">&nbsp;</p>
<div class="row view" style="line-height: 40px;">
    <div class="col-sm-6"><strong>Level1 Product Purchase Commission: </strong> <?php echo $data->product_pur_level1_comm  ?></div>
    <div class="col-sm-6"><strong>Level2 Product Purchase Commission: </strong> <?php echo $data->product_pur_level2_comm  ?></div>
    <div class="col-sm-6"><strong>Level3 Product Purchase Commission: </strong> <?php echo $data->product_pur_level3_comm  ?></div>
    <div class="col-sm-6"><strong>Level4 Product Purchase Commission: </strong> <?php echo $data->product_pur_level4_comm  ?></div>
    <div class="col-sm-6"><strong>Level5 Product Purchase Commission: </strong> <?php echo $data->product_pur_level5_comm  ?></div>
    <div class="col-sm-6"><strong>Level6 Product Purchase Commission: </strong> <?php echo $data->product_pur_level6_comm  ?></div>
    <div class="col-sm-6"><strong>Level7 Product Purchase Commission: </strong> <?php echo $data->product_pur_level7_comm  ?></div>
    <div class="col-sm-6"><strong>Level8 Product Purchase Commission: </strong> <?php echo $data->product_pur_level8_comm  ?></div>
    <div class="col-sm-6"><strong>Level9 Product Purchase Commission: </strong> <?php echo $data->product_pur_level9_comm  ?></div>
    <div class="col-sm-6"><strong>Level10 Product Purchase Commission: </strong> <?php echo $data->product_pur_level10_comm  ?></div>
    <div class="col-sm-6"><strong>Level11 Product Purchase Commission: </strong> <?php echo $data->product_pur_level11_comm  ?></div>
    <div class="col-sm-6"><strong>Level12 Product Purchase Commission: </strong> <?php echo $data->product_pur_level12_comm  ?></div>
    <div class="col-sm-6"><strong>Level13 Product Purchase Commission: </strong> <?php echo $data->product_pur_level13_comm  ?></div>
    <div class="col-sm-6"><strong>Level14 Product Purchase Commission: </strong> <?php echo $data->product_pur_level14_comm  ?></div>
    <div class="col-sm-6"><strong>Level15 Product Purchase Commission: </strong> <?php echo $data->product_pur_level15_comm  ?></div>
</div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("plans").classList.add('active');
        document.querySelector("#edit_target").setAttribute('style', 'color: darkorange !important;');
    });
</script>

