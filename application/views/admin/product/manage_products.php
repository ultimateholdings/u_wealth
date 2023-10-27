<?php

?>
<a href="<?php echo site_url('product/add_product') ?>" class="btn btn-xs btn-success">Add New Product</a>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr>
            <th>SN</th>
            <th>Name</th>
            <th>Category</th>
            <th>Selling Price</th>
            <th>Dealer Price</th>
            <th>Price after discount</th>
            <?php if(config_item('enable_pv')=='Yes') { ?>
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
                <td><?php echo $e['prod_price']; ?></td>
                <td><?php echo $e['dealer_price']; ?></td>
                <td><?php echo config_item('currency'). " ";?><?php echo $e['prod_price']-($e['prod_price']*($e['discount']/100)); ?></td>
                <?php if(config_item('enable_pv')=='Yes') { ?>
                <td><?php echo $e['pv']; ?></td>
                <?php } ?>
                <td>
                    <img src="<?php echo $e['image'] ? base_url('uploads/' . $e['image']) : base_url('uploads/default.jpg'); ?>"
                         class="img-thumbnail img-responsive" style="max-height: 100px"></td>
                <td><?php echo $e['sold_qty']; ?></td>
                <td><?php if($e['qty']==-1){echo 'Unlimited';}else{echo $e['qty'];} ?></td>
                <td>
                    <div style="display: flex;">
                        
                  
                    <a href="<?php echo site_url('product/view/' . $e['id']); ?>" class="btn btn-danger btn-sm mr-1">View</a>
                    <a href="<?php echo site_url('product/edit/' . $e['id']); ?>" class="btn btn-info btn-sm mr-1">Edit</a>
                    <a onclick="return confirm('Are you sure you want to delete this Product ?')"
                       href="<?php echo site_url('product/remove/' . $e['id']); ?>"
                       class="btn btn-danger btn-sm">Delete</a>
                         </div>
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
        document.querySelector("#prodservices > ul > li:nth-child(3) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>