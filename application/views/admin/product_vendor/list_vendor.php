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

    <table class="table table-striped table-bordered" style="font-size:13px">
        <tr>
            <th>SN</th>
            <th>Vendor ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
            <th>City</th>
            <th>State</th>
            <th>Zipcode</th>
            <!--<th>Income</th>-->
            <!--<th>Join Date</th>-->
            <th>Actions</th>
        </tr>
        <?php
        $sn = count($vendors);
        
        foreach ($vendors as $e) { ?>
            <tr>
                <td><?php echo $sn--; ?></td>
                <td><a href="<?php echo site_url('manage_vendor/vendor_detail/' . $e['vendor_id']) ?>"
                       target="_blank"><?php echo config_item('ID_EXT') . $e['vendor_id']; ?></a></td>
                <td><?php echo $e['name']; ?></td>
                <td><?php echo $e['phone']; ?></td>
                <td><?php echo $e['email']; ?></td>
                <td><?php echo $e['address']; ?></td>
                <td><?php echo $e['city']; ?></td>
                <td><?php echo $e['state']; ?></td>
                <td><?php echo $e['zipcode']; ?></td>
               <!-- <td><?php echo $e['zipcode']; ?></td>-->
                
                
                
               <td>
                  
                    <a href="<?php echo site_url('Manage_vendor/vendor_detail/' . $e['vendor_id']); ?>" class="btn btn-warning btn-xs">View</a>
                    <a
                            href="<?php echo site_url('Manage_vendor/edit_vendor/' . $e['vendor_id']); ?>" class="btn btn-info btn-xs">Edit</a>
                    <a href="<?php echo site_url('Manage_vendor/login_vendor/' . $e['vendor_id']); ?>" target="_blank"
                       class="btn btn-danger btn-xs">Login</a>
                </td>
            </tr>
        <?php } ?>
    </table>
        
</div>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>
</div>

<a href="<?php echo site_url('admin') ?>" class="btn btn-xs btn-danger">&larr; Go Back</a>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("vendors").classList.add('active');
        document.querySelector("#vendors > ul > li:nth-child(1) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>