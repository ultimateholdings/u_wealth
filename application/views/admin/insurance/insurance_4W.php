<?php

?>
<div class="table-responsive">
<!--<?php echo form_open() ?>
<div class="row">
    <div class="form-group">
        <div class="col-sm-4">
            <select class="form-control" name="plan_name" id="plan_name">
                <?php foreach($prod_name as $p){ ?>
                    <option value="<?php echo $p['prod_name'];?>"><?php echo $p['prod_name'];?></option>
                <?php } ?>
               </select>
            <input placeholder="Enter User ID" class="form-control" name="plan_name">
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-sm-4">
            <input type="submit" class="btn btn-primary" value="Search" onclick="this.value='Searching..'"></div>
    </div>
</div>-->
<?php echo form_close() ?>
<!--<div class="row">
  <div class="pull-right">
     <form method="post" action='export_list_member'>
        <input type="submit" class="btn btn-success" name="export_list_member" value="Download Report" class="btn btn-primary" />
    </form>
  </div><!-- File upload form 
</div>-->

    <table class="table table-striped table-bordered" style="font-size:13px">
        <tr>
            <th>SN</th>
            <th>User Details</th>
            <th>Address</th>
            <th>City</th>
            <th>State</th>
            <th>Pincode</th>
            <th>Premium Amount</th>
            <th>Insurer</th>
            <th>Vehicle Model</th>
            <th>Vehicle Type</th>
            <th>Date</th>
            
        </tr>
        <?php
        $sn = count($details);
        
        foreach ($details as $e) { ?>
            <tr>
                <td><?php echo $sn--; ?></td>
                <td><?php echo $e['first_name']."<br/>";
                          echo $e['user_id']."<br/>";
                          echo $e['phone']."<br/>";
                          echo $e['email']."<br/>";
                    ?></td>
                
                <td><?php echo $e['Address']; ?></td>
                
                <td><?php echo $e['City']; ?></td>
                <td><?php echo $e['State']; ?></td>
                <td><?php echo $e['PinCode']; ?></td>
                <td><?php echo $e['PremiumDetails_Premium']; ?></td>
                <td><?php echo $e['PremiumDetails_Insurer']; ?></td>
                <td><?php echo $e['PremiumDetails_Model']; ?></td>
                <td><?php echo $e['PremiumDetails_VehicleType']; ?></td>
                <td><?php echo $e['date']; ?></td>
            </tr>
        <?php } ?>
    </table>
        
</div>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>
</div>
<?php if($title == 'Search Results'){ ?>
<a href="<?php echo site_url('users/search_user') ?>" class="btn btn-xs btn-danger">&larr; Go Back</a>
<?php } else { ?>
<a href="<?php echo site_url('admin') ?>" class="btn btn-xs btn-danger">&larr; Go Back</a>
<?php } ?>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("members").classList.add('active');
        document.querySelector("#members > ul > li:nth-child(1) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>