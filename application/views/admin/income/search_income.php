<?php
    $income_name = array('Referral' => 'Referral Income');
    if(config_item('width')==1){
        $income_name = array_merge($income_name, array('Single Leg Income'=>'Single Leg Income'));
    }elseif(config_item('width')==2){
        $income_name = array_merge($income_name, array('First Pair Matching Comm' => 'First Pair Matching Comm', 'Binary Commission' => 'Binary Commission'));
    }
    
    if((config_item('width') !=1)&&(config_item('level_income')=='Yes')){
        $income_name = array_merge($income_name, array('Level Completion Income' => "Level Completion Income", 'Level Upgrade Fee'=>'Level Upgrade Fee'));
    }
    
    if(config_item('enable_roi')=='Yes'){
        $income_name = array_merge($income_name, array('ROI Income' => "ROI"));   
    }
    
    if(config_item('enable_repurchase')=='Yes'){
        $income_name = array_merge($income_name, array("Self Purchase Commission"=>"Self Purchase Commission",'Joining Purchase Commission'=>'Joining Purchase Commission',"Repurchase Commission"=>"Repurchase Commission"));      
    }
    
    if(config_item('target_income')=='Yes'){
        $income_name = array_merge($income_name, array("Target"=>"Target Income"));   
    }
?>

<?php echo form_open('income/search') ?>
<div class="row">
    <div class="col-sm-6">
        <label>Income Type</label>
        <select class="form-control" name="income_name">
            <option selected>All</option>
            <?php foreach ($income_name as $key => $val) {
                echo '<option value="' . $key . '">' . $val . '</option>';
                } ?>
        </select>
    </div>
    <div class="col-sm-6">
        <label>User ID</label>
        <input type="text" class="form-control" id="userid" name="userid">
    </div>
    <div class="col-sm-6">
        <label>Start Date</label>
        <input type="text" class="form-control datepicker" readonly id="startdate" name="startdate">
    </div>
    <div class="col-sm-6">
        <label>End Date</label>
        <input type="text" class="form-control datepicker" readonly id="enddate" name="enddate">
    </div>
    <div class="col-sm-12"><br/>
        <input type="submit" class="btn btn-success" value="Search" onclick="this.value='Searching..'">
    </div>
</div>
<?php echo form_close() ?>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("earningpay").classList.add('active');
        document.querySelector("#earningpay > ul > li:nth-child(2) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>