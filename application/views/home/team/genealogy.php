<?php 
$level = $this->db_model->select_multi('*', 'level_details', array('userid' => $this->session->user_id));
?>
<div class="container frame">
	<p>
	<b><?php echo $this->db_model->select('name', 'member', array('id' => $this->session->user_id));?></b>, This is where you may view your team genealogy.</p>
	<p></p>
	<br>
	<div class="table-responsive">
		<table class="table table-bordered table-hover">
	  		<tbody>

	  			<tr>
					<td style="border:1px solid #663300;">  
						<center>
						<a onclick="document.getElementById('div_name15').style.display='';return false;" href="" style="text-decoration:none;font-weight:bold;font-size:13px; color:#333; text-transform:capitalize"> LEVEL - 1</a>
						</center>
						<div id="div_name15" style="margin: 15px 15px 0px; padding: 5px; border: 1px solid rgb(170, 170, 170); display: none;">
							<table width="100%" cellspacing="1" cellpadding="1" border="0">
								<thead>
									<tr>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="31">&nbsp;Sr.</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="175">
										Joining Date</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="98">
										&nbsp;Associate ID</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center">&nbsp;Name</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="148">
										Top-Up Date</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="111">
										Top-Up Amount</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;Sponsor ID </th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;Placement 
										ID </th>
										<!--<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">
										First Level</th>-->
									</tr>
								</thead>
								<tbody>
									<?php
							        $sn = 1;
							        foreach (explode(",",$level->level1) as $e) { if($e >0) {
							        	$d = $this->db_model->select_multi('*', 'member', array('secret' => $e)); ?>
							            <tr>
							            	<td><?php echo $sn++ ?></td>
							                <td><?php echo date('Y-m-d', strtotime($d->join_time)); ?></td>
							                <td><?php echo $d->id ?></td>
							                <td><?php echo $d->name ?></td>
							                <td><?php echo date('Y-m-d', strtotime($d->activate_time)); ?></td>
							                <td><?php echo config_item('currency') . $d->topup; ?></td>
							                <td><?php echo $d->sponsor; ?></td>
							                <td><?php echo $d->position; ?></td>
							            </tr>
							        <?php } }?>
								</tbody>
							</table>
							<center>
								<a onclick="document.getElementById('div_name15').style.display='none';return false;" href="" style="text-decoration:none;font-weight:bold;font-size:14px;color:red; text-transform:capitalize">HIDE</a>
							</center>
						</div>
						<br>
					</td>
				</tr>
		  		<tr>
					<td style="border:1px solid #663300;">  
						<center>
						<a onclick="document.getElementById('div_name16').style.display='';return false;" href="" style="text-decoration:none;font-weight:bold;font-size:13px; color:#333; text-transform:capitalize"> LEVEL - 2</a>
						</center>
						<div id="div_name16" style="display:none;margin:15px 15px 0px 15px;padding:5px;border:1px solid #aaa;">
							<table width="100%" cellspacing="1" cellpadding="1" border="0">
								<thead>
									<tr>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="31">&nbsp;Sr.</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="175">
										Joining Date</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="98">
										&nbsp;Associate ID</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center">&nbsp;Name</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="148">
										Top-Up Date</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="111">
										Top-Up Coin</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;Sponsor ID </th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;Placement 
										ID </th>
										<!--<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">
										First Level</th>-->
									</tr>
								</thead>
								<tbody>
									<?php
							        $sn = 1;
							        foreach (explode(",",$level->level2) as $e) { if($e >0) {
							        	$d = $this->db_model->select_multi('*', 'member', array('secret' => $e)); ?>
							            <tr>
							            	<td><?php echo $sn++ ?></td>
							                <td><?php echo date('Y-m-d', strtotime($d->join_time)); ?></td>
							                <td><?php echo $d->id ?></td>
							                <td><?php echo $d->name ?></td>
							                <td><?php echo date('Y-m-d', strtotime($d->activate_time)); ?></td>
							                <td><?php echo config_item('currency') . $d->topup; ?></td>
							                <td><?php echo $d->sponsor; ?></td>
							                <td><?php echo $d->position; ?></td>
							            </tr>
							        <?php } }?>
								</tbody>
							</table>
							<center>
								<a onclick="document.getElementById('div_name16').style.display='none';return false;" href="" style="text-decoration:none;font-weight:bold;	font-size:14px;color:red; text-transform:capitalize">HIDE</a>
							</center>
						</div><br>
					</td>
				</tr> 
				<tr>
					<td style="border:1px solid #663300;">  
						<center>
						<a onclick="document.getElementById('div_name17').style.display='';return false;" href="" style="text-decoration:none;font-weight:bold;font-size:13px; color:#333; text-transform:capitalize"> LEVEL - 3</a>
						</center>
						<div id="div_name17" style="display:none;margin:15px 15px 0px 15px;padding:5px;border:1px solid #aaa;">
							<table width="100%" cellspacing="1" cellpadding="1" border="0">
								<thead>
									<tr>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="31">&nbsp;Sr.</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="175">
										Joining Date</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="98">
										&nbsp;Associate ID</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center">&nbsp;Name</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="148">
										Top-Up Date</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="111">
										Top-Up Coin</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;Sponsor ID </th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;Placement 
										ID </th>
										<!--<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">
										First Level</th>-->
									</tr>
								</thead>
								<tbody>
									<?php
							        $sn = 1;
							        foreach (explode(",",$level->level3) as $e) { if($e >0) {
							        	$d = $this->db_model->select_multi('*', 'member', array('secret' => $e)); ?>
							            <tr>
							            	<td><?php echo $sn++ ?></td>
							                <td><?php echo date('Y-m-d', strtotime($d->join_time)); ?></td>
							                <td><?php echo $d->id ?></td>
							                <td><?php echo $d->name ?></td>
							                <td><?php echo date('Y-m-d', strtotime($d->activate_time)); ?></td>
							                <td><?php echo config_item('currency') . $d->topup; ?></td>
							                <td><?php echo $d->sponsor; ?></td>
							                <td><?php echo $d->position; ?></td>
							            </tr>
							        <?php } }?>
								</tbody>
							</table>
							<center>
							<a onclick="document.getElementById('div_name17').style.display='none';return false;" href="" style="text-decoration:none;font-weight:bold;font-size:14px;color:red; text-transform:capitalize">HIDE</a>
							</center>
						</div>
						<br>
					</td>
				</tr>
			 	<tr>
					<td style="border:1px solid #663300;">  
						<center>
						<a onclick="document.getElementById('div_name18').style.display='';return false;" href="" style="text-decoration:none;font-weight:bold;font-size:13px; color:#333; text-transform:capitalize"> LEVEL - 4</a>
						</center>
						<div id="div_name18" style="display:none;margin:15px 15px 0px 15px;padding:5px;border:1px solid #aaa;">
							<table width="100%" cellspacing="1" cellpadding="1" border="0">
								<thead>
									<tr>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="31">&nbsp;Sr.</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="175">
										Joining Date</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="98">
										&nbsp;Associate ID</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center">&nbsp;Name</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="148">
										Top-Up Date</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="111">
										Top-Up Coin</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;Sponsor ID </th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;Placement 
										ID </th>
										<!--<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">
										First Level</th>-->
									</tr>
								</thead>
								<tbody>
									<?php
							        $sn = 1;
							        foreach (explode(",",$level->level4) as $e) { if($e >0) {
							        	$d = $this->db_model->select_multi('*', 'member', array('secret' => $e)); ?>
							            <tr>
							            	<td><?php echo $sn++ ?></td>
							                <td><?php echo date('Y-m-d', strtotime($d->join_time)); ?></td>
							                <td><?php echo $d->id ?></td>
							                <td><?php echo $d->name ?></td>
							                <td><?php echo date('Y-m-d', strtotime($d->activate_time)); ?></td>
							                <td><?php echo config_item('currency') . $d->topup; ?></td>
							                <td><?php echo $d->sponsor; ?></td>
							                <td><?php echo $d->position; ?></td>
							            </tr>
							        <?php } }?>
								</tbody>
							</table>
							<center>
								<a onclick="document.getElementById('div_name18').style.display='none';return false;" href="" style="text-decoration:none;font-weight:bold;font-size:14px;color:red; text-transform:capitalize">HIDE</a>
							</center>
						</div>
						<br>
					</td>
				</tr>
			  	<tr>
					<td style="border:1px solid #663300;">  
						<center>
						<a onclick="document.getElementById('div_name19').style.display='';return false;" href="" style="text-decoration:none;font-weight:bold;font-size:13px; color:#333; text-transform:capitalize"> LEVEL - 5</a>
						</center>
						<div id="div_name19" style="display:none;margin:15px 15px 0px 15px;padding:5px;border:1px solid #aaa;">
							<table width="100%" cellspacing="1" cellpadding="1" border="0">
								<thead>
									<tr>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="31">&nbsp;Sr.</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="175">
										Joining Date</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="98">
										&nbsp;Associate ID</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center">&nbsp;Name</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="148">
										Top-Up Date</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="111">
										Top-Up Coin</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;Sponsor ID </th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;Placement 
										ID </th>
										<!--<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">
										First Level</th>-->
									</tr>
								</thead>
								<tbody>
									<?php
							        $sn = 1;
							        foreach (explode(",",$level->level5) as $e) { if($e >0) {
							        	$d = $this->db_model->select_multi('*', 'member', array('secret' => $e)); ?>
							            <tr>
							            	<td><?php echo $sn++ ?></td>
							                <td><?php echo date('Y-m-d', strtotime($d->join_time)); ?></td>
							                <td><?php echo $d->id ?></td>
							                <td><?php echo $d->name ?></td>
							                <td><?php echo date('Y-m-d', strtotime($d->activate_time)); ?></td>
							                <td><?php echo config_item('currency') . $d->topup; ?></td>
							                <td><?php echo $d->sponsor; ?></td>
							                <td><?php echo $d->position; ?></td>
							            </tr>
							        <?php } }?>
								</tbody>
							</table>
							<center>
								<a onclick="document.getElementById('div_name19').style.display='none';return false;" href="" style="text-decoration:none;font-weight:bold;font-size:14px;color:red; text-transform:capitalize">HIDE</a>
							</center>
						</div><br>
					</td>
				</tr>
			  	<tr>
					<td style="border:1px solid #663300;">  
						<center>
							<a onclick="document.getElementById('div_name20').style.display='';return false;" href="" style="text-decoration:none;font-weight:bold;font-size:13px; color:#333; text-transform:capitalize"> LEVEL - 6</a>
						</center>
						<div id="div_name20" style="display:none;margin:15px 15px 0px 15px;padding:5px;border:1px solid #aaa;">
							<table width="100%" cellspacing="1" cellpadding="1" border="0">
								<thead>
									<tr>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="31">&nbsp;Sr.</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="175">
										Joining Date</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="98">
										&nbsp;Associate ID</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center">&nbsp;Name</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="148">
										Top-Up Date</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="111">
										Top-Up Coin</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;Sponsor ID </th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;Placement 
										ID </th>
										<!--<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">
										First Level</th>-->
									</tr>
								</thead>
								<tbody>
									<?php
							        $sn = 1;
							        foreach (explode(",",$level->level6) as $e) { if($e >0) {
							        	$d = $this->db_model->select_multi('*', 'member', array('secret' => $e)); ?>
							            <tr>
							            	<td><?php echo $sn++ ?></td>
							                <td><?php echo date('Y-m-d', strtotime($d->join_time)); ?></td>
							                <td><?php echo $d->id ?></td>
							                <td><?php echo $d->name ?></td>
							                <td><?php echo date('Y-m-d', strtotime($d->activate_time)); ?></td>
							                <td><?php echo config_item('currency') . $d->topup; ?></td>
							                <td><?php echo $d->sponsor; ?></td>
							                <td><?php echo $d->position; ?></td>
							            </tr>
							        <?php } }?>
								</tbody>
							</table>
							<center>
							<a onclick="document.getElementById('div_name20').style.display='none';return false;" href="" style="text-decoration:none;font-weight:bold;font-size:14px;color:red; text-transform:capitalize">HIDE</a>
							</center>
						</div><br>
					</td>
				</tr>
			  	<tr>
					<td style="border:1px solid #663300;">  
						<center>
						<a onclick="document.getElementById('div_name21').style.display='';return false;" href="" style="text-decoration:none;font-weight:bold;font-size:13px; color:#333; text-transform:capitalize"> LEVEL - 7</a>
						</center>
						<div id="div_name21" style="display:none;margin:15px 15px 0px 15px;padding:5px;border:1px solid #aaa;">
							<table width="100%" cellspacing="1" cellpadding="1" border="0">
								<thead>
									<tr>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="31">&nbsp;Sr.</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="175">
										Joining Date</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="98">
										&nbsp;Associate ID</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center">&nbsp;Name</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="148">
										Top-Up Date</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="111">
										Top-Up Coin</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;Sponsor ID </th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;Placement 
										ID </th>
										<!--<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">
										First Level</th>-->
									</tr>
								</thead>
								<tbody>
									<?php
							        $sn = 1;
							        foreach (explode(",",$level->level7) as $e) { if($e >0) {
							        	$d = $this->db_model->select_multi('*', 'member', array('secret' => $e)); ?>
							            <tr>
							            	<td><?php echo $sn++ ?></td>
							                <td><?php echo date('Y-m-d', strtotime($d->join_time)); ?></td>
							                <td><?php echo $d->id ?></td>
							                <td><?php echo $d->name ?></td>
							                <td><?php echo date('Y-m-d', strtotime($d->activate_time)); ?></td>
							                <td><?php echo config_item('currency') . $d->topup; ?></td>
							                <td><?php echo $d->sponsor; ?></td>
							                <td><?php echo $d->position; ?></td>
							            </tr>
							        <?php } }?>
								</tbody>
							</table>
							<center>
							<a onclick="document.getElementById('div_name21').style.display='none';return false;" href="" style="text-decoration:none;font-weight:bold;font-size:14px;color:red; text-transform:capitalize">HIDE</a>
							</center>
						</div><br>
					</td>
				</tr>
			  	<tr>
					<td style="border:1px solid #663300;">  
						<center>
						<a onclick="document.getElementById('div_name22').style.display='';return false;" href="" style="text-decoration:none;font-weight:bold;font-size:13px; color:#333; text-transform:capitalize"> LEVEL - 8</a>
						</center>
						<div id="div_name22" style="display:none;margin:15px 15px 0px 15px;padding:5px;border:1px solid #aaa;">
							<table width="100%" cellspacing="1" cellpadding="1" border="0">
								<thead>
									<tr>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="31">&nbsp;Sr.</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="175">
										Joining Date</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="98">
										&nbsp;Associate ID</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center">&nbsp;Name</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="148">
										Top-Up Date</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="111">
										Top-Up Coin</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;Sponsor ID </th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;Placement 
										ID </th>
										<!--<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">
										First Level</th>-->
									</tr>
								</thead>
								<tbody>
									<?php
							        $sn = 1;
							        foreach (explode(",",$level->level8) as $e) { if($e >0) {
							        	$d = $this->db_model->select_multi('*', 'member', array('secret' => $e)); ?>
							            <tr>
							            	<td><?php echo $sn++ ?></td>
							                <td><?php echo date('Y-m-d', strtotime($d->join_time)); ?></td>
							                <td><?php echo $d->id ?></td>
							                <td><?php echo $d->name ?></td>
							                <td><?php echo date('Y-m-d', strtotime($d->activate_time)); ?></td>
							                <td><?php echo config_item('currency') . $d->topup; ?></td>
							                <td><?php echo $d->sponsor; ?></td>
							                <td><?php echo $d->position; ?></td>
							            </tr>
							        <?php } }?>
								</tbody>
							</table>
							<center>
							<a onclick="document.getElementById('div_name22').style.display='none';return false;" href="" style="text-decoration:none;font-weight:bold;font-size:14px;color:red; text-transform:capitalize">HIDE</a>
							</center>
						</div><br>
					</td>
				</tr>
			    <tr>
					<td style="border:1px solid #663300;">  
						<center>
						<a onclick="document.getElementById('div_name23').style.display='';return false;" href="" style="text-decoration:none;font-weight:bold;font-size:13px; color:#333; text-transform:capitalize"> LEVEL - 9</a>
						</center>
						<div id="div_name23" style="display:none;margin:15px 15px 0px 15px;padding:5px;border:1px solid #aaa;">
							<table width="100%" cellspacing="1" cellpadding="1" border="0">
								<thead>
									<tr>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="31">&nbsp;Sr.</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="175">
										Joining Date</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="98">
										&nbsp;Associate ID</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center">&nbsp;Name</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="148">
										Top-Up Date</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="111">
										Top-Up Coin</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;Sponsor ID </th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;Placement 
										ID </th>
										<!--<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">
										First Level</th>-->
									</tr>
								</thead>
								<tbody>
									<?php
							        $sn = 1;
							        foreach (explode(",",$level->level9) as $e) { if($e >0) {
							        	$d = $this->db_model->select_multi('*', 'member', array('secret' => $e)); ?>
							            <tr>
							            	<td><?php echo $sn++ ?></td>
							                <td><?php echo date('Y-m-d', strtotime($d->join_time)); ?></td>
							                <td><?php echo $d->id ?></td>
							                <td><?php echo $d->name ?></td>
							                <td><?php echo date('Y-m-d', strtotime($d->activate_time)); ?></td>
							                <td><?php echo config_item('currency') . $d->topup; ?></td>
							                <td><?php echo $d->sponsor; ?></td>
							                <td><?php echo $d->position; ?></td>
							            </tr>
							        <?php } }?>
								</tbody>
							</table>
							<center>
							<a onclick="document.getElementById('div_name23').style.display='none';return false;" href="" style="text-decoration:none;font-weight:bold;font-size:14px;color:red; text-transform:capitalize">HIDE</a>
							</center>
						</div><br>
					</td>
				</tr>
			  	<tr>
					<td style="border:1px solid #663300;">  
						<center>
						<a onclick="document.getElementById('div_name24').style.display='';return false;" href="" style="text-decoration:none;font-weight:bold;font-size:13px; color:#333; text-transform:capitalize"> LEVEL - 10</a>
						</center>
						<div id="div_name24" style="display:none;margin:15px 15px 0px 15px;padding:5px;border:1px solid #aaa;">
							<table width="100%" cellspacing="1" cellpadding="1" border="0">
								<thead>
									<tr>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="31">&nbsp;Sr.</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="175">
										Joining Date</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="98">
										&nbsp;Associate ID</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center">&nbsp;Name</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="148">
										Top-Up Date</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="111">
										Top-Up Coin</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;Sponsor ID </th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;Placement 
										ID </th>
										<!--<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">
										First Level</th>-->
									</tr>
			                    </thead>
			                    <tbody>
									<?php
							        $sn = 1;
							        foreach (explode(",",$level->level10) as $e) { if($e >0) {
							        	$d = $this->db_model->select_multi('*', 'member', array('secret' => $e)); ?>
							            <tr>
							            	<td><?php echo $sn++ ?></td>
							                <td><?php echo date('Y-m-d', strtotime($d->join_time)); ?></td>
							                <td><?php echo $d->id ?></td>
							                <td><?php echo $d->name ?></td>
							                <td><?php echo date('Y-m-d', strtotime($d->activate_time)); ?></td>
							                <td><?php echo config_item('currency') . $d->topup; ?></td>
							                <td><?php echo $d->sponsor; ?></td>
							                <td><?php echo $d->position; ?></td>
							            </tr>
							        <?php } }?>
								</tbody>
			                </table>
							 <center>
							<a onclick="document.getElementById('div_name24').style.display='none';return false;" href="" style="text-decoration:none;font-weight:bold;font-size:14px;color:red; text-transform:capitalize">HIDE</a>
							</center>
						</div><br>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div> <!-- container -->