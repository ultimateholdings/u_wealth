<?php
$profile_data=$this->db_model->select_multi('address,city,state,country,zip,bank_ac_no,bank_name,bank_ifsc,btc_address,paypal,nominee_name,nominee_add,nominee_relation,last_update', 'member_profile', array('userid' => $this->session->user_id)); 
$profile=$this->db_model->select_multi('phone,email,address', 'member', array('id' => $this->session->user_id)); 
?>

<div class="container frame">
	<p>
		 <strong><?php echo $this->db_model->select('name', 'member', array('id' => $this->session->user_id)); ?></strong>, This is where   you may change or edit your personal membership information.
	</p>
	 <br>
         <p><strong><span style="color:red"></span></strong></p>
	       <?php echo form_open('HomeApp/edit_profile') ?>
	  	   <input type="hidden" name="com" value="editprofile">
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<td colspan="2"><h3 style="text-align:center"><b>Edit My Profile</b></h3></td>
			  			</tr>
					</thead>
					<tbody>
						<tr>

							<td><label><strong>Name:</strong><font color="red" size="3">*</font></label></td>
							<td><input size="20" maxlength="32" name="my_name" id="my_name" type="text" value="<?php echo set_value('my_name', $this->session->name) ?>"  disabled></td>
						</tr>
						<tr>
							<td><label><strong>Email:</strong><font color="red" size="3">*</font></label></td>
							<td><input size="20" name="my_email" id="my_email" type="text" value="<?php echo set_value('my_email', $my->email);?>" disabled readonly=""></td>
						</tr>
						<tr>
							<td><label><strong>Mobile:</strong><font color="red" size="3">*</font></label></td>
							<td><input size="20" maxlength="20" name="my_phone" type="text" value="<?php echo $my->phone; ?>" disabled></td>
						</tr>
						<tr>
							<td><label><strong>Address:</strong><font color="red" size="3">*</font></label></td>
							<td><input size="20" maxlength="100" name="my_address" id="my_address" type="text" value="<?php echo $profile_data->address; ?>"></td>
						</tr>
						<tr>
							<td><label><strong>City:</strong><font color="red" size="3">*</font></label></td>
							<td><input size="20" maxlength="40" name="my_city" id="my_city" type="text" value="<?php echo $profile_data->city;?>"></td>
						</tr>
						<tr>
							<td><label><strong>State/Prov:</strong><font color="red" size="3">*</font></label></td>
							<td><input size="20" maxlength="20" name="my_state" id="my_state" type="text" value="<?php echo $profile_data->state;?>"></td>
						</tr>
						<tr>
							<td><label><strong>Zip/Postal:</strong><font color="red" size="3">*</font></label></td>
							<td><input size="20" maxlength="20" name="my_zip" id="my_zip" type="text" value="<?php echo $profile_data->zip;?>"></td>
						</tr>
						<tr>
							<td><label><strong>Country:</strong><font color="red" size="3">*</font></label></td>
							<td> <input size="20" maxlength="30" name="my_country" id="my_country" type="text" value="<?php echo $profile_data->country;?>"></td>
						</tr>
						<tr>
							<td>Nominee Name:</td>
							<td><input size="20" maxlength="128" name="my_nominee" id="my_nominee" type="text" value="<?php echo $profile_data->nominee_name;?>"></td>
						</tr>
						<tr>
							<td>Relation</td>
							<td><input size="20" maxlength="128" name="my_relation" id="my_relation" type="text" value="<?php echo $profile_data->nominee_relation;?>"></td>
						</tr>
						<tr>
							<td>Account No<label>:</label></td>
							<td><input size="20" maxlength="128" name="my_account" id="my_account" type="text" value="<?php echo $profile_data->bank_ac_no;?>"></td>
						</tr>

						<tr>
							<td>Bank Name<label>:</label></td>
							<td><input size="20" maxlength="128" name="my_bankname" id="my_bankname" type="text" value="<?php echo $profile_data->bank_name;?>"></td>
						</tr>
						<tr>
							<td>IFSC Code</td>
							<td><input size="20" maxlength="128" name="my_ifsc" id="my_ifsc" type="text" value="<?php echo $profile_data->bank_ifsc;?>"></td>
						</tr>
						<tr>
							<td>BTC Address</td>
							<td><input size="20" maxlength="128" name="my_btc" id="my_btc" type="text" value="<?php echo $profile_data->btc_address;?>"></td>
						</tr>
						<tr>
							<td>Paypal Account</td>
							<td><input size="20" maxlength="128" name="my_paypal" id="my_paypal" type="text" value="<?php echo $profile_data->paypal;?>"></td>
						</tr>
					</tbody>
				</table>
				<table class="table table-bordered">
					<tbody>
						<tr>
							<td><label>Profile Last Updated on : &nbsp;</label><b><?php echo $profile_data->last_update;?></b></td>
						</tr>
					</tbody>
				</table>
	  		</div>				
		   <input class="btn btn-primary" name="btnsave" value="Save Edits" type="submit">
	<?php echo form_close() ?>			    	
</div>