<?php

?>
<a href="<?php echo site_url('product/add_variation') ?>" class="btn btn-xs btn-success ml-2 mb-1">Add New Variation</a>
<section style="padding-left: 25px;padding-right: 25px">
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr>
            <th>SN</th>
            <th>Variant Name</th>
            <th>Variant Value</th>
            <th>Actions</th>
        </tr>
        <?php
        $sn = 1;
        foreach ($prod_variant as $e) { ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $e['variant_name']; ?></td>
                <td><?php echo $e['variant_value']; ?></td>
                <td>
                    
                    <!--<a href="<?php echo site_url('product/edit_variant/' . $e['id']); ?>" class="btn btn-info btn-xs">Edit</a>-->
                    <a onclick="return confirm('Are you sure you want to delete this Variant ?')"
                       href="<?php echo site_url('product/remove_variant/' . $e['id']); ?>"
                       class="btn btn-danger btn-xs">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <div class="pull-right">
        <?php echo $this->pagination->create_links(); ?>
    </div>
</div>
</section>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("prodservices").classList.add('active');
        document.querySelector("#prodservices > ul > li:nth-child(4) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>