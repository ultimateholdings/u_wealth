<?php

?>
<style>
.btn.btn-xs {
    font-size: 11px;
    padding: 3px 8px;
}
.btn {
    outline: 0 !important;
    transition: box-shadow .28s cubic-bezier(.4,0,.2,1);
    border-radius: 2px;
    overflow: hidden;
    position: relative;
    margin: 0 5px 10px 0;
}
.btn-success {
    background-color: #32c861 !important;
    border: 1px solid #32c861 !important;
}
.badge, .btn {
    font-weight: 600;
    text-transform: uppercase;
}
.alert, .badge, .btn, .btn-group > .btn, .btn.btn-link:hover, .icon-btn, .label, .note, .overview-panel, .panel {
    box-shadow: 0 1px 3px rgba(0,0,0,.1),0 1px 2px rgba(0,0,0,.18);
}
.table .btn {
    margin-left: 0;
    margin-right: 5px;
}
.btn-danger {
    background-color: #f96a74 !important;
    border: 1px solid #f96a74 !important;
}
.btn-info {
    background-color: #34d3eb !important;
    border: 1px solid #34d3eb !important;
}
</style>
<a href="<?php echo site_url('vendor/add_product') ?>" class="btn btn-xs btn-success">Add New Product</a>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr>
            <th>SN</th>
            <th>Name</th>
            <th>Category</th>
            <th>Product Price</th>
            <th>Price after discount</th>
            <th>Discount(%)</th>
            <?php if(config_item('width') == '2') { ?>
            <th>PV</th>
            <?php } ?>
            <th>Image</th>            
            <th>Qty Sold</th>
            <th>Avl Qty</th> 
            <!--<th>Joining Product ?</th>-->
            <th>Actions</th>
        </tr>
        <?php
        $sn = 1;
        foreach ($prod as $e) { 
            $this->db->select('brand_name');
             $this->db->where('brand_id', $e['brand']);
             $q = $this->db->get('brands');
             $brands = $q->result_array();
             //category name
             $this->db->select('cat_name');
             $this->db->where('cat_id', $e['category']);
             $q = $this->db->get('product_categories');
             $category_name = $q->result_array();

             //print_r($brands);?>
           
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $e['prod_name']; ?></td>
                <td><?php echo $category_name[0]['cat_name'];?></td>
                <td><?php echo config_item('currency'). " ";?><?php echo $e['prod_price']; ?></td>
                <td><?php echo config_item('currency'). " ";?><?php echo $e['prod_price']-($e['prod_price']*($e['discount']/100)); ?></td>
                <td><?php echo $e['discount']; ?></td>
                <?php if(config_item('width') == '2') { ?>
                <td><?php echo $e['pv']; ?></td>
                <?php } ?>
                <td>
                    <img src="<?php echo $e['image'] ? base_url('uploads/' . $e['image']) : base_url('uploads/default.jpg'); ?>"
                         class="img-thumbnail img-responsive" style="max-height: 100px"></td>
                <td><?php echo $e['sold_qty']; ?></td>
                <td><?php echo $e['qty']; ?></td>
                <td>
                    <a href="<?php echo site_url('vendor/view/' . $e['id']); ?>" class="btn btn-danger btn-xs">View</a>
                    <a href="<?php echo site_url('vendor/edit/' . $e['id']); ?>" class="btn btn-info btn-xs">Edit</a>
                    <a onclick="return confirm('Are you sure you want to delete this Product ?')"
                       href="<?php echo site_url('vendor/remove/' . $e['id']); ?>"
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
        document.getElementById("prodservices").classList.add('active');
        document.querySelector("#prodservices > ul > li:nth-child(4) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>