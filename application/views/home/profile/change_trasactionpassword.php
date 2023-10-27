<div class="container frame">
	<p><strong><?php echo $this->db_model->select('name', 'member', array('id' => $this->session->user_id)); ?></strong>, This is where you may change your 
	transaction password
	</p> 
	<form name="frm" id="frm" method="post" action="#" onsubmit="return validate(this)">
		<input type="hidden" name="com" value="changetranpass">
		<div class="table-responsive"> 
			<table class="table table-bordered">
				<thead>
					<tr>
						<td colspan="2"><h3 style="text-align:center"><b>Change My Transaction Password</b></h3></td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><label><strong>Current Password:</strong><font color="red" size="3">*</font></label></td>
						<td><input size="10" maxlength="12" name="oldpass" id="oldpass" type="password"></td>
					</tr>
					<tr>
						<td><label><strong>New Password:</strong><font color="red" size="3">*</font></label></td>
						<td><input size="10" maxlength="12" id="newpass" name="newpass" type="password"></td>
					</tr>
					<tr>
						<td><strong>Confirm</strong><label><strong> Password:</strong><font color="red" size="3">*</font></label></td>
						<td><input size="10" maxlength="12" name="confirm_pass" id="confirm_pass" type="password"></td>
					</tr>
				</tbody>
			</table>
		  </div>					
		<input class="btn btn-primary" name="btnsave" value="Change Password" type="submit">
	</form>
</div>