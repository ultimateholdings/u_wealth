<?php
?>
<?php echo form_open('franchisee/sale_product') ?>
<div class="row">
    <div class="col-sm-6 ui-widget">
        <label>Product Name</label>
        <select name="pname" id="pname" class="form-control">
            <?php
            $this->db->select('product_id, available_qty')->where('franchisee_id', $this->session->fran_id)
                     ->where('available_qty >', 0);
            $data = $this->db->get('franchisee_stock')->result();
            foreach ($data as $e) {
                echo '<option value="' . $e->product_id . '">' . $this->db_model->select('prod_name', 'product', array('id' => $e->product_id)) . ' (Available Qty: ' . $e->available_qty . ')</option>';
            }
            ?>
        </select>
    </div>
    <div class="col-sm-6">
        <br/>
        <button type="button" onclick="populate()" class="btn btn-info">Populate</button>
    </div>
</div>
<div class="row" id="hidden" style="display: none">
    <div class="col-sm-12">
        <h3 class="hr_divider"><br/>
        </h3>
        <p style="margin-top:50px;">
        <div id="res"></div>
        <p>
            <label>Member ID</label>
            <input style="max-width: 200px" type="text" class="form-control" name="userid" id="userid" required>
        </p>
        <div class="row" id="name_hidden" style="display: none">
            <div class="col-sm-6">
                <h3 class="hr_divider">
                    <strong style="color: #3a80d7">Name:
                            <span id="name"></span></strong>
                </h3><br>
            </div>
        </div>
        <button type="button" onclick="get_name()" class="btn btn-info">Get Member Details</button>
        <button class="btn btn-success" name="submit" value="add">Sale</button>
        </p>
    </div>
</div>

<script>
    function remove(id) {
        $(id).remove();
    }

    function populate() {

        $("#hidden").show('slow');
        var prod_id = $("#pname").val();
        var prod_title = $("#pname option:selected").text();

        $("#res").append(
            '<div id="' + prod_id + '" style="border-bottom: 1px solid #ccc; padding: 5px"> <strong>Product Name :</strong> ' + prod_title + ' <br><br><input type="hidden' +
            '" name="prod_name[]" value="' + prod_id + '">' +
            '<strong><br/>Qty</strong> <input style="max-width: 40px" value="1" name="qty[]"> <a href="javascript:;" onclick="remove(\'#' + prod_id + '\')" class="btn btn-danger glyphicon glyphicon-remove"></a></div>'
        );
    }
</script>

<script type="text/javascript">
    function get_name() {
        var uid = $('#userid').val();
        //alert(uid);
        if (uid == "" || isNaN(uid)) {
            alert('Please enter valid User ID');
        } else {
            $.get("<?php echo site_url('site/get_user_name/') ?>" + uid, function (data) {
                $("#name_hidden").show('slow');
                $("#name").html(data);
               
            });
        }
    }
</script>


<?php echo form_close() ?>
