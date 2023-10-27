<div class="container frame" style="height:700px;">
	<p><strong><?php echo $this->db_model->select('name', 'member', array('id' => $this->session->user_id));?></strong>, This is where you may top-up any associate</p> 
	<form name="frm" id="frm" method="post" action="#" onsubmit="return validate(this)" enctype="multipart/form-data">
		<table class="table table-bordered">
			<thead>
				<tr>
					<td colspan="2"><h4 style="text-align:center">Top-Up</h4></td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><b>Balance Top-Up Wallet</b></td>
					<td>&nbsp;<?php echo $this->db_model->select('balance', 'wallet', array('userid' => $this->session->user_id)) ?></td>
				</tr>
				<tr>
					<td><strong>Associate ID</strong>
						<label><strong><font size="3"> </font></strong><font color="red" size="3">*</font>
						</label>
					</td>
					<td>
						<input name="transferid" id="transferid" type="text" class="form-control" onblur="get_user_name('#transferid', '#membername')">
					</td>
				</tr>
				<tr>
					<td>
						<strong>Associate Name</strong>
						<label><strong><font size="3"> </font></strong><font color="red" size="3">*</font></label>
					</td>
					<td>
						<input name="membername" id="membername" type="text" class="form-control" readonly="">
					</td>
				</tr>
				<tr>
					<td>
						<strong>Package</strong>
						<label><strong>:</strong><font color="red" size="3">*</font></label>
					</td>
					<td>
						<select size="1" name="plan" id="plan" class="form-control" required>
							<option value="">---Select One---</option>
							<?php foreach ($plans as $val) {
                            echo '<option value="' . $val['id'] . '"data-value="'. $val['joining_fee'] . '">' . $val['plan_name'] . '. Price :' . config_item('currency') . number_format($val['joining_fee'], 2) . ' </option>';
                        	} ?>
						</select>
				    </td>
				</tr>
				<tr>
					<td>
						<strong>Transaction Password</strong>
						<label><strong><font size="3"> </font></strong><font color="red" size="3">*</font></label>
					</td>
					<td>
						<input name="tranpass" id="tranpass" type="password" class="form-control">
					</td>
				</tr>
			</tbody>
		</table>
		<p align="center"><input class="btn btn-primary" name="Submit" value="Top-Up" type="submit"></p>
	</form>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        var id = $("#transferid").val();
        $.get("<?php echo site_url('site/get_user_name/') ?>" + id, function (data) {
            $('#membername').html(data);
        });
    })

    function get_user_name(id, result) {
        var id = $(id).val();
        $.get("<?php echo site_url('site/get_user_name/') ?>" + id, function (data) {
            $(result).html(data);
            $("input[name='membername'").val(data);
        });
    }

    function keyRestrict(e, validchars) {
		var key='', keychar='';
		key = getKeyCode(e);
		if (key == null) return true;
		keychar = String.fromCharCode(key);
		keychar = keychar.toLowerCase();
		validchars = validchars.toLowerCase();
		if (validchars.indexOf(keychar) != -1)
		return true;
		if ( key==null || key==0 || key==8 || key==9 || key==13 || key==27 )
		return true;
		return false;
	}

	function getKeyCode(e) {
		if (window.event)
		return window.event.keyCode;
		else if (e)
		return e.which;
		else
		return null;
	}

</script>