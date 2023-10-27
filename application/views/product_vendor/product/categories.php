<?php

?>
<style>
.filter-summary-selectedFilterContainer {
    /* padding-bottom: 4px; */
    padding-top: 15px;
}
.filter-summary-filterList {
    display: flex;
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
    flex-flow: row wrap;
    -webkit-box-align: baseline;
    align-items: baseline;
    margin: 0px;
    padding-left: 17px !important;
}
.filter-summary-filter {
    position: relative;
    background-color: #fff;
    text-transform: capitalize;
    color: #3e4152;
    cursor: default;
    font-size: 12px;
    padding: 6px 10px 6px 10px;
    border-radius: 20px;
    border: solid 1px #d4d5d9;
    margin: 3px;    
}
.filter-summary-removeFilter {
    position: absolute;
    top: 4px;
    right: 4px;
    width: 18px;
    height: 20px;
    z-index: 1;
    text-align: center;
    cursor: pointer;
}
.input[type="checkbox" i] {
    background-color: initial;
    cursor: default;
    -webkit-appearance: checkbox;
    box-sizing: border-box;
    margin: 3px 3px 3px 4px;
    padding: initial;
    border: initial;
}
.filter-summary-removeIcon {
    vertical-align: middle;
    opacity: 0.7;
    transform: scale(0.7);
}
.sprites-remove {
    width: 14px;
    height: 14px;
    background-position: -1083px 0;
}
.btn.btn-xs {
    font-size: 11px;
    padding: 3px 8px;
}
.btn-primary {
    background-color: #4489e4;
    border-color: #4489e4;
    color: #fff;
}
.badge, .btn {
    font-weight: 600;
    text-transform: uppercase;
}
.pull-right {
    float: right !important;
    padding:5px;
}
.row {
    margin-right: -10px;
    margin-left: -10px;
}
.btn {
    display: inline-block;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    touch-action: manipulation;
    cursor: pointer;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
}
</style>
<div class="row">
    <?php echo form_open_multipart() ?>
    <hr/>
    <div class="pull-right" style="display: none;">
        <?php echo $this->pagination->create_links(); ?>
     <a data-toggle="modal" data-target="#myModal3"
                           onclick="document.getElementById('deliverid').value='<?php echo $e->id ?>'"
                           class="btn btn-primary btn-xs"><i class="fa fa-plus"></i>ADD FLAG</a>
    </div>
    <div class="pull-right">
        <?php echo $this->pagination->create_links(); ?>
     <a data-toggle="modal" data-target="#myModal2"
                           onclick="document.getElementById('deliverid').value='<?php echo $e->id ?>'"
                           class="btn btn-primary btn-xs"><i class="fa fa-plus"></i>ADD SUB CATEGORY</a>
    </div>
    <div class="pull-right">
        <?php echo $this->pagination->create_links(); ?>
     <a data-toggle="modal" data-target="#myModal1"
                           onclick="document.getElementById('deliverid').value='<?php echo $e->id ?>'"
                           class="btn btn-primary btn-xs"><i class="fa fa-plus"></i>ADD CATEGORY</a>
    </div>
    <div class="pull-right" style="display:none;">
        <?php echo $this->pagination->create_links(); ?>
     <a data-toggle="modal" data-target="#myModal"
                           onclick="document.getElementById('deliverid').value='<?php echo $e->id ?>'"
                           class="btn btn-primary btn-xs"><i class="fa fa-plus"></i>ADD PARENT CATEGORY</a>
    </div>

</div>
    <?php echo form_close() ?>
<div class="table-responsive">
    <label> Category </label>
    <table class="table table-striped table-bordered">
        <tr>
            <th>SN</th>
            <th>Category</th>
            <th>Parent Category</th>
            <th>Sub Category</th>
        </tr>
        <?php
        $sn = 1;
        foreach ($category as $c) { 
             $this->db->select('sub_cat_name');
             $this->db->where('cat_id', $c['cat_id'])->where('parent_category',$c['parent_cat']);
             $q = $this->db->get('product_sub_category');
             $sub_cat = $q->result_array();
             ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $c['cat_name']; ?></td>
                <td><?php echo $c['parent_cat'] ?></td>
                <td>
                <?php foreach ($sub_cat as $s) {
                echo $s['sub_cat_name'];
                } ?>
                </td>
            </tr>
        <?php } ?>
       
    </table>
    <div class="pull-right">
        <?php echo $this->pagination->create_links(); ?>
    </div>
</div>
    
    <?php echo form_close() ?>

    <div class="pull-right">
        <?php echo $this->pagination->create_links(); ?>
     <a href="<?php echo site_url('vendor/manage_sub_category') ?>"
                           class="btn btn-primary btn-xs"><i class="fa fa-minus"></i>Manage Sub CATEGORY</a>
    </div>
    <div class="pull-right">
        <?php echo $this->pagination->create_links(); ?>
     <a href="<?php echo site_url('vendor/manage_category') ?>"
                           class="btn btn-primary btn-xs"><i class="fa fa-minus"></i>Manage CATEGORY</a>
    </div>
    <div class="pull-right" style="display:none;">
        <?php echo $this->pagination->create_links(); ?>
     <a href="<?php echo site_url('vendor/delete_parent_cat/') ?>"
                           class="btn btn-primary btn-xs"><i class="fa fa-minus"></i>Manage Parent CATEGORY</a>
    </div>

    
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Parent Category</h4>
            </div>
            <div class="modal-body">

                <?php echo form_open('vendor/parent_category') ?>
                <label>Parent Category Name</label>
                <input  name="parent_name" value="" id="parent_name"/>
                <label>Brand Name</label>
                 <select class="form-control" name="brand_id">
                   <?php foreach ($brand as $b) {
                    echo '<option value="' . $b['brand_id'] . '">' . $b['brand_name'] . '</option>';
                  } ?>
                 </select>
             <div>
                <button type="submit" class="btn btn-success">Save</button>
                   <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->  
             </div>
                <?php echo form_close() ?>  
              <div class="modal-footer">
                <button type="close" class="btn btn-primary" data-dismiss="modal">Close</button>
              </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Category</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('vendor/manage_cat') ?>

                <label>Category Name</label>
                <input type="text" name="category_name" value="" id="category_name">
                <label>Parent Category Name</label>
                 <select class="form-control" name="parent_category">
                   <?php foreach ($parents as $val) {
                    echo '<option value="' . $val['parent_cat_id'] . '">' . $val['parent_cat_name'] . '</option>';
                } ?>
            </select>
       <!-- </div>-->
             <!--   <textarea class="form-control" name="tdetail"></textarea>-->
                <div class="pull-right">
                    <button type="submit" class="btn btn-success">Save</button>
                   <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->  
                </div>
                <?php echo form_close() ?>  
                <div class="modal-footer">
                    <button type="close" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Sub Category</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('vendor/sub_category') ?>
                <label>Sub Category Name</label>
                <input type="text" name="subcategory_name" value="" id="subcategory_name">
                <label>Parent - Category Name</label>
                 <select class="form-control" name="parent_category_names">
                    <?php foreach ($category as $val) {
                      echo '<option value="' . $val['cat_name'] ."-". $val['parent_cat'] . '">' . $val['cat_name'] ."-". $val['parent_cat'].  '</option>';
                    } ?>
                 </select>
                
                 

             <!--   <textarea class="form-control" name="tdetail"></textarea>-->
                <div class="pull-right">
                    <button type="submit" class="btn btn-success">Save</button>
                   <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->  
                </div>
                <?php echo form_close() ?>  
            <div class="modal-footer">
                <button type="close" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</div>
<div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Flag</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('vendor/add_flag') ?>
                <label>Flag Name</label>
                <input type="text" name="flag_name" value="" id="flag_name">
                 <!--   <textarea class="form-control" name="tdetail"></textarea>-->
                <div class="pull-right">
                    <button type="submit" class="btn btn-success">Save</button>
                   <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->  
                </div>
                <?php echo form_close() ?>  
                <div class="modal-footer">
                  <button type="close" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("prodservices").classList.add('active');
        document.querySelector("#prodservices > ul > li:nth-child(2) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>
<script>
    $(document).ready(function () {
    $('#agree').change(function() {
    if( $(this).prop('checked')) {
        $("#subcategory").show();
    } else {
        $("#subcategory").hide();
    }
});
});
</script>
