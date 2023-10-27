<div class="container frame" style="height:700px;">
	<p><strong><?php echo $this->db_model->select('name', 'member', array('id' => $this->session->user_id));?></strong>, This is where you withdraw the payouts</p> 
	<?php echo form_open('HomeApp/withdraw_payouts') ?>
        <div class="table-responsive">
		 	<table class="table table-bordered">
				<thead>
					<tr>
						<td colspan="2"><h4 style="text-align:center">Withdraw Payouts</h4></td>
					</tr>
					<tr>
						<?php $d_count = $this->db_model->count_all('member', array('sponsor' => $this->session->user_id, 'status'=>'Active'));
							if($d_count < config_item('min_sponsor')) { ?>
						<td colspan="2"><h4 style="text-align:center;color: red;">You need to Sponsor Minimum <?php echo config_item('min_sponsor') ?> Persons to withdraw Payouts</h4></td>
						<?php } ?>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><strong>Available Wallet Balance</strong>
							<label><strong><font size="3"></font></strong></label>
						</td>
						<td>
						<label><strong><font size="3"></font></strong><font color="red" size="3"><?php echo config_item('currency') . $this->db_model->select('balance', 'wallet', array('userid' => $this->session->user_id)) ?></font></label>
					    </td>
					</tr>
					<tr>
						<td><strong>Minimum withdrawl amount:</strong>
							<label><strong><font size="3"></font></strong></label>
						</td>
						<td>
						<label><strong><font size="3"></font></strong><font color="red" size="3"><?php if(config_item('min_withdraw') >0) {echo config_item('currency') . config_item('min_withdraw'); } else {echo 'No Limit'; }  ?></font></label>
					    </td>
					</tr>
					<tr>
						<td><strong>Daily Capping:</strong>
							<label><strong><font size="3"></font></strong></label>
						</td>
						<td>
						<label><strong><font size="3"></font></strong><font color="red" size="3"><?php if(config_item('daily_capping') >0) {echo config_item('currency') . config_item('daily_capping'); } else {echo 'No Limit'; } ?></font></label>
					    </td>
					</tr>
					<tr>
						<td><strong>Enter Withdrawl Amount:</strong>
							<label><strong><font size="3"></font></strong><font color="red" size="3">*</font></label>
					   	</td>
						<td>
						<input name="amount" id="amount" type="text" class="form-control" >
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<?php if($d_count>=config_item('min_sponsor')) { ?>					
	   <p align="center"><input class="btn btn-primary" name="Submit" value="Withdraw" type="submit"></p>
	   <?php } ?>			
	<?php echo form_close() ?>
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