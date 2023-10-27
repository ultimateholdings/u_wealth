<?php

?>
<div class="row view">
    <div class="col-sm-6"><strong>Banner Name: </strong> <?php echo $data->banner_name ?></div>
    <div class="col-sm-6"><strong>Product Name: </strong> <?php echo $this->db_model->select('prod_name', 'product', array('id' => $data->prod_id,)); ?></div>
    <div class="col-sm-6"><strong>Banner Detail: </strong> <?php echo $data->banner_desc ?></div>
    <div class="col-sm-6"><strong>Flag: </strong> <?php echo $data->flag ?></div>
    <a onclick="return confirm('Are you sure you want to delete this Product ?')"
                       href="<?php echo site_url('product/remove_banner/' . $data->id); ?>"
                       class="btn btn-danger btn-xs">Delete</a>
    <div>&nbsp;</div>
    <div align="center">
	<br><label>Banner Image</label>
    <img src="<?php echo $data->image ? base_url('uploads/' . $data->image) : base_url('uploads/default.jpg'); ?>"
         class="img-responsive img-rounded" style="width: 300px; height: 300px;">
	</div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("ecomm").classList.add('active');
        document.querySelector("#ecomm > ul:nth-child(2) > li:nth-child(3) > a:nth-child(1) > span:nth-child(1)").setAttribute('style', 'color: darkorange !important;');
    });
</script>
