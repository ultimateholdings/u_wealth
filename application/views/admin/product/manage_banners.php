<?php

?>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr>
            <th>SN</th>
            <th>Banner Name</th>
            <th>Product Name</th>
            <th>Flag</th>
            <th>Actions</th>
        </tr>
        <?php
        $sn = 1;
        foreach ($data as $e) { ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $e['banner_name']; ?></td>
                <td><?php echo $this->db_model->select('prod_name', 'product', array('id' => $e['prod_id']));?></td>
                <td><?php echo $e['flag']; ?></td>
                <td>
                    <a href="<?php echo site_url('product/view_banner/' . $e['id']); ?>" class="btn btn-success btn-xs">View</a>
                    <a onclick="return confirm('Are you sure you want to delete this Product ?')"
                       href="<?php echo site_url('product/remove_banner/' . $e['id']); ?>"
                       class="btn btn-danger btn-xs">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <div class="pull-right">
        <?php echo $this->pagination->create_links(); ?>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("ecomm").classList.add('active');
        document.querySelector("#ecomm > ul:nth-child(2) > li:nth-child(3) > a:nth-child(1) > span:nth-child(1)").setAttribute('style', 'color: darkorange !important;');
    });
</script>