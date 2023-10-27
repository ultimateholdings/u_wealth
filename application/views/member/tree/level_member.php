<?php 
$level = $this->db_model->select_multi('*', 'level_details', array('userid' => $this->session->user_id,'pid'=>1));
?>

<style type="text/css">
	td {
		text-align:center;
	}
</style>

<div class="container frame" style="width: 100%">
	<p>
	<b>Dear <?php echo $this->db_model->select('name', 'member', array('id' => $this->session->user_id));?></b>, This is where you may view your team Genealogy.</p>
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
						<div id="div_name15" style="margin: 10px 10px 0px; padding: 5px; border: 1px solid rgb(170, 170, 170); display: none;">
							<table width="100%" cellspacing="1" cellpadding="1" border="0">
								<thead>
									<tr>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="31">&nbsp;Sr.</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="100">&nbsp;Name</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="98">
										&nbsp;User ID</th>
										<?php if(config_item('inactive_in_tree')=='Yes') { ?>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="175">
										Joining Date</th>
										<?php } ?>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="148">
										Activation Date</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="111">
										Top-Up Amount</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;Sponsor ID </th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;Placement ID </th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;#</th>
									</tr>
								</thead>
								<tbody>
									<?php
							        $sn = 1;

							        $users = $this->db->query("
							        	select t1.secret, t1.id,t1.name,t1.join_time,t1.activate_time,t1.topup,t1.sponsor,t2.position 
							        	from member as t1
							        	LEFT JOIN
							        	(select secret,position from level_details where pid = 1) as t2 ON t1.secret = t2.secret
							        	where t1.secret IN (".rtrim(ltrim($level->level1,','),',').")
							        	")->result();

							        foreach ($users as $d) { ?>
							            <tr>
							            	<td><?php echo $sn++ ?></td>
							            	<td><?php echo $d->name ?></td>
							            	<td><?php echo $d->id ?></td>
							            	<?php if(config_item('inactive_in_tree')=='Yes') { ?>
							                	<td><?php echo date('Y-m-d', strtotime($d->join_time)); ?></td>
							                <?php } ?>
							                <td><?php echo date('Y-m-d', strtotime($d->activate_time)); ?></td>
							                <td><?php echo config_item('currency') . $d->topup; ?></td>
							                <td><?php echo $d->sponsor; ?></td>
							                <td><?php echo $d->position; ?></td>
							                <td>
							                	<a target="_blank" href="<?php echo site_url('site/register/A/'.$d->id); ?>"
                      							 class="btn btn-primary btn-xs">Add Member</a>
							                </td>
							            </tr>
							        <?php } ?>
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
						<div id="div_name16" style="display:none;margin:15px 10px 0px 10px;padding:5px;border:1px solid #aaa;">
							<table width="100%" cellspacing="1" cellpadding="1" border="0">
								<thead>
									<tr>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="31">&nbsp;Sr.</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="100">&nbsp;Name</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="98">
										&nbsp;User ID</th>
										<?php if(config_item('inactive_in_tree')=='Yes') { ?>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="175">
										Joining Date</th>
										<?php } ?>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="148">
										Activation Date</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="111">
										Top-Up Amount</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;Sponsor ID </th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;Placement ID </th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;#</th>
									</tr>
								</thead>
								<tbody>
									<?php
							        $sn = 1;

							        $users = $this->db->query("
							        	select t1.secret, t1.id,t1.name,t1.join_time,t1.activate_time,t1.topup,t1.sponsor,t2.position 
							        	from member as t1
							        	LEFT JOIN
							        	(select secret,position from level_details where pid = 1) as t2 ON t1.secret = t2.secret
							        	where t1.secret IN (".rtrim(ltrim($level->level2,','),',').")
							        	")->result();

							        foreach ($users as $d) { ?>
							            <tr>
							            	<td><?php echo $sn++ ?></td>
							            	<td><?php echo $d->name ?></td>
							            	<td><?php echo $d->id ?></td>
							            	<?php if(config_item('inactive_in_tree')=='Yes') { ?>
							                	<td><?php echo date('Y-m-d', strtotime($d->join_time)); ?></td>
							                <?php } ?>
							                <td><?php echo date('Y-m-d', strtotime($d->activate_time)); ?></td>
							                <td><?php echo config_item('currency') . $d->topup; ?></td>
							                <td><?php echo $d->sponsor; ?></td>
							                <td><?php echo $d->position; ?></td>
							                <td>
							                	<a target="_blank" href="<?php echo site_url('site/register/A/'.$d->id); ?>"
                      							 class="btn btn-primary btn-xs">Add Member</a>
							                </td>
							            </tr>
							        <?php } ?>
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
						<div id="div_name17" style="display:none;margin:15px 10px 0px 10px;padding:5px;border:1px solid #aaa;">
							<table width="100%" cellspacing="1" cellpadding="1" border="0">
								<thead>
									<tr>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="31">&nbsp;Sr.</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="100">&nbsp;Name</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="98">
										&nbsp;User ID</th>
										<?php if(config_item('inactive_in_tree')=='Yes') { ?>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="175">
										Joining Date</th>
										<?php } ?>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="148">
										Activation Date</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="111">
										Top-Up Amount</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;Sponsor ID </th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;Placement ID </th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;#</th>
									</tr>
								</thead>
								<tbody>
									<?php
							        $sn = 1;

							        $users = $this->db->query("
							        	select t1.secret, t1.id,t1.name,t1.join_time,t1.activate_time,t1.topup,t1.sponsor,t2.position 
							        	from member as t1
							        	LEFT JOIN
							        	(select secret,position from level_details where pid = 1) as t2 ON t1.secret = t2.secret
							        	where t1.secret IN (".rtrim(ltrim($level->level3,','),',').")
							        	")->result();

							        foreach ($users as $d) { ?>
							            <tr>
							            	<td><?php echo $sn++ ?></td>
							            	<td><?php echo $d->name ?></td>
							            	<td><?php echo $d->id ?></td>
							            	<?php if(config_item('inactive_in_tree')=='Yes') { ?>
							                	<td><?php echo date('Y-m-d', strtotime($d->join_time)); ?></td>
							                <?php } ?>
							                <td><?php echo date('Y-m-d', strtotime($d->activate_time)); ?></td>
							                <td><?php echo config_item('currency') . $d->topup; ?></td>
							                <td><?php echo $d->sponsor; ?></td>
							                <td><?php echo $d->position; ?></td>
							                <td>
							                	<a target="_blank" href="<?php echo site_url('site/register/A/'.$d->id); ?>"
                      							 class="btn btn-primary btn-xs">Add Member</a>
							                </td>
							            </tr>
							        <?php } ?>
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
						<div id="div_name18" style="display:none;margin:15px 10px 0px 10px;padding:5px;border:1px solid #aaa;">
							<table width="100%" cellspacing="1" cellpadding="1" border="0">
								<thead>
									<tr>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="31">&nbsp;Sr.</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="100">&nbsp;Name</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="98">
										&nbsp;User ID</th>
										<?php if(config_item('inactive_in_tree')=='Yes') { ?>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="175">
										Joining Date</th>
										<?php } ?>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="148">
										Activation Date</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="111">
										Top-Up Amount</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;Sponsor ID </th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;Placement ID </th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;#</th>
									</tr>
								</thead>
								<tbody>
									<?php
							        $sn = 1;

							        $in = rtrim(ltrim($level->level4,','),',');
							        if(strlen($in)>0){
							        	$users = $this->db->query("
							        	select t1.secret, t1.id,t1.name,t1.join_time,t1.activate_time,t1.topup,t1.sponsor,t2.position 
							        	from member as t1
							        	LEFT JOIN
							        	(select secret,position from level_details where pid = 1) as t2 ON t1.secret = t2.secret
							        	where t1.secret IN (".$in.")
							        	")->result();	
							        }else{
							        	$users = array();
							        }

							        foreach ($users as $d) { ?>
							            <tr>
							            	<td><?php echo $sn++ ?></td>
							            	<td><?php echo $d->name ?></td>
							            	<td><?php echo $d->id ?></td>
							            	<?php if(config_item('inactive_in_tree')=='Yes') { ?>
							                	<td><?php echo date('Y-m-d', strtotime($d->join_time)); ?></td>
							                <?php } ?>
							                <td><?php echo date('Y-m-d', strtotime($d->activate_time)); ?></td>
							                <td><?php echo config_item('currency') . $d->topup; ?></td>
							                <td><?php echo $d->sponsor; ?></td>
							                <td><?php echo $d->position; ?></td>
							                <td>
							                	<a target="_blank" href="<?php echo site_url('site/register/A/'.$d->id); ?>"
                      							 class="btn btn-primary btn-xs">Add Member</a>
							                </td>
							            </tr>
							        <?php } ?>
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
						<div id="div_name19" style="display:none;margin:15px 10px 0px 10px;padding:5px;border:1px solid #aaa;">
							<table width="100%" cellspacing="1" cellpadding="1" border="0">
								<thead>
									<tr>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="31">&nbsp;Sr.</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="100">&nbsp;Name</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="98">
										&nbsp;User ID</th>
										<?php if(config_item('inactive_in_tree')=='Yes') { ?>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="175">
										Joining Date</th>
										<?php } ?>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="148">
										Activation Date</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="111">
										Top-Up Amount</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;Sponsor ID </th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;Placement ID </th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;#</th>
									</tr>
								</thead>
								<tbody>
									<?php
							        $sn = 1;
							        $in = rtrim(ltrim($level->level5,','),',');
							        if(strlen($in)>0){
							        	$users = $this->db->query("
							        	select t1.secret, t1.id,t1.name,t1.join_time,t1.activate_time,t1.topup,t1.sponsor,t2.position 
							        	from member as t1
							        	LEFT JOIN
							        	(select secret,position from level_details where pid = 1) as t2 ON t1.secret = t2.secret
							        	where t1.secret IN (".$in.")
							        	")->result();	
							        }else{
							        	$users = array();
							        }
							        
							        foreach ($users as $d) { ?>
							            <tr>
							            	<td><?php echo $sn++ ?></td>
							            	<td><?php echo $d->name ?></td>
							            	<td><?php echo $d->id ?></td>
							            	<?php if(config_item('inactive_in_tree')=='Yes') { ?>
							                	<td><?php echo date('Y-m-d', strtotime($d->join_time)); ?></td>
							                <?php } ?>
							                <td><?php echo date('Y-m-d', strtotime($d->activate_time)); ?></td>
							                <td><?php echo config_item('currency') . $d->topup; ?></td>
							                <td><?php echo $d->sponsor; ?></td>
							                <td><?php echo $d->position; ?></td>
							                <td>
							                	<a target="_blank" href="<?php echo site_url('site/register/A/'.$d->id); ?>"
                      							 class="btn btn-primary btn-xs">Add Member</a>
							                </td>
							            </tr>
							        <?php } ?>
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
						<div id="div_name20" style="display:none;margin:15px 10px 0px 10px;padding:5px;border:1px solid #aaa;">
							<table width="100%" cellspacing="1" cellpadding="1" border="0">
								<thead>
									<tr>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="31">&nbsp;Sr.</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="100">&nbsp;Name</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="98">
										&nbsp;User ID</th>
										<?php if(config_item('inactive_in_tree')=='Yes') { ?>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="175">
										Joining Date</th>
										<?php } ?>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="148">
										Activation Date</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="111">
										Top-Up Amount</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;Sponsor ID </th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;Placement ID </th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;#</th>
									</tr>
								</thead>
								<tbody>
									<?php
							        $sn = 1;

							        $in = rtrim(ltrim($level->level6,','),',');
							        if(strlen($in)>0){
							        	$users = $this->db->query("
							        	select t1.secret, t1.id,t1.name,t1.join_time,t1.activate_time,t1.topup,t1.sponsor,t2.position 
							        	from member as t1
							        	LEFT JOIN
							        	(select secret,position from level_details where pid = 1) as t2 ON t1.secret = t2.secret
							        	where t1.secret IN (".$in.")
							        	")->result();	
							        }else{
							        	$users = array();
							        }

							        foreach ($users as $d) { ?>
							            <tr>
							            	<td><?php echo $sn++ ?></td>
							            	<td><?php echo $d->name ?></td>
							            	<td><?php echo $d->id ?></td>
							            	<?php if(config_item('inactive_in_tree')=='Yes') { ?>
							                	<td><?php echo date('Y-m-d', strtotime($d->join_time)); ?></td>
							                <?php } ?>
							                <td><?php echo date('Y-m-d', strtotime($d->activate_time)); ?></td>
							                <td><?php echo config_item('currency') . $d->topup; ?></td>
							                <td><?php echo $d->sponsor; ?></td>
							                <td><?php echo $d->position; ?></td>
							                <td>
							                	<a target="_blank" href="<?php echo site_url('site/register/A/'.$d->id); ?>"
                      							 class="btn btn-primary btn-xs">Add Member</a>
							                </td>
							            </tr>
							        <?php } ?>
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
						<div id="div_name21" style="display:none;margin:15px 10px 0px 10px;padding:5px;border:1px solid #aaa;">
							<table width="100%" cellspacing="1" cellpadding="1" border="0">
								<thead>
									<tr>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="31">&nbsp;Sr.</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="100">&nbsp;Name</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="98">
										&nbsp;User ID</th>
										<?php if(config_item('inactive_in_tree')=='Yes') { ?>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="175">
										Joining Date</th>
										<?php } ?>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="148">
										Activation Date</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="111">
										Top-Up Amount</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;Sponsor ID </th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;Placement ID </th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;#</th>
									</tr>
								</thead>
								<tbody>
									<?php
							        $sn = 1;

							        $in = rtrim(ltrim($level->level7,','),',');
							        if(strlen($in)>0){
							        	$users = $this->db->query("
							        	select t1.secret, t1.id,t1.name,t1.join_time,t1.activate_time,t1.topup,t1.sponsor,t2.position 
							        	from member as t1
							        	LEFT JOIN
							        	(select secret,position from level_details where pid = 1) as t2 ON t1.secret = t2.secret
							        	where t1.secret IN (".$in.")
							        	")->result();	
							        }else{
							        	$users = array();
							        }

							        foreach ($users as $d) { ?>
							            <tr>
							            	<td><?php echo $sn++ ?></td>
							            	<td><?php echo $d->name ?></td>
							            	<td><?php echo $d->id ?></td>
							            	<?php if(config_item('inactive_in_tree')=='Yes') { ?>
							                	<td><?php echo date('Y-m-d', strtotime($d->join_time)); ?></td>
							                <?php } ?>
							                <td><?php echo date('Y-m-d', strtotime($d->activate_time)); ?></td>
							                <td><?php echo config_item('currency') . $d->topup; ?></td>
							                <td><?php echo $d->sponsor; ?></td>
							                <td><?php echo $d->position; ?></td>
							                <td>
							                	<a target="_blank" href="<?php echo site_url('site/register/A/'.$d->id); ?>"
                      							 class="btn btn-primary btn-xs">Add Member</a>
							                </td>
							            </tr>
							        <?php } ?>
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
						<div id="div_name22" style="display:none;margin:15px 10px 0px 10px;padding:5px;border:1px solid #aaa;">
							<table width="100%" cellspacing="1" cellpadding="1" border="0">
								<thead>
									<tr>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="31">&nbsp;Sr.</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="100">&nbsp;Name</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="98">
										&nbsp;User ID</th>
										<?php if(config_item('inactive_in_tree')=='Yes') { ?>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="175">
										Joining Date</th>
										<?php } ?>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="148">
										Activation Date</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="111">
										Top-Up Amount</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;Sponsor ID </th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;Placement ID </th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;#</th>
									</tr>
								</thead>
								<tbody>
									<?php
							        $sn = 1;

							        $in = rtrim(ltrim($level->level8,','),',');
							        if(strlen($in)>0){
							        	$users = $this->db->query("
							        	select t1.secret, t1.id,t1.name,t1.join_time,t1.activate_time,t1.topup,t1.sponsor,t2.position 
							        	from member as t1
							        	LEFT JOIN
							        	(select secret,position from level_details where pid = 1) as t2 ON t1.secret = t2.secret
							        	where t1.secret IN (".$in.")
							        	")->result();	
							        }else{
							        	$users = array();
							        }

							        foreach ($users as $d) { ?>
							            <tr>
							            	<td><?php echo $sn++ ?></td>
							            	<td><?php echo $d->name ?></td>
							            	<td><?php echo $d->id ?></td>
							            	<?php if(config_item('inactive_in_tree')=='Yes') { ?>
							                	<td><?php echo date('Y-m-d', strtotime($d->join_time)); ?></td>
							                <?php } ?>
							                <td><?php echo date('Y-m-d', strtotime($d->activate_time)); ?></td>
							                <td><?php echo config_item('currency') . $d->topup; ?></td>
							                <td><?php echo $d->sponsor; ?></td>
							                <td><?php echo $d->position; ?></td>
							                <td>
							                	<a target="_blank" href="<?php echo site_url('site/register/A/'.$d->id); ?>"
                      							 class="btn btn-primary btn-xs">Add Member</a>
							                </td>
							            </tr>
							        <?php } ?>
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
						<div id="div_name23" style="display:none;margin:15px 10px 0px 10px;padding:5px;border:1px solid #aaa;">
							<table width="100%" cellspacing="1" cellpadding="1" border="0">
								<thead>
									<tr>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="31">&nbsp;Sr.</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="100">&nbsp;Name</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="98">
										&nbsp;User ID</th>
										<?php if(config_item('inactive_in_tree')=='Yes') { ?>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="175">
										Joining Date</th>
										<?php } ?>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="148">
										Activation Date</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="111">
										Top-Up Amount</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;Sponsor ID </th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;Placement ID </th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;#</th>
									</tr>
								</thead>
								<tbody>
									<?php
							        $sn = 1;

							        $in = rtrim(ltrim($level->level9,','),',');
							        if(strlen($in)>0){
							        	$users = $this->db->query("
							        	select t1.secret, t1.id,t1.name,t1.join_time,t1.activate_time,t1.topup,t1.sponsor,t2.position 
							        	from member as t1
							        	LEFT JOIN
							        	(select secret,position from level_details where pid = 1) as t2 ON t1.secret = t2.secret
							        	where t1.secret IN (".$in.")
							        	")->result();	
							        }else{
							        	$users = array();
							        }

							        foreach ($users as $d) { ?>
							            <tr>
							            	<td><?php echo $sn++ ?></td>
							            	<td><?php echo $d->name ?></td>
							            	<td><?php echo $d->id ?></td>
							            	<?php if(config_item('inactive_in_tree')=='Yes') { ?>
							                	<td><?php echo date('Y-m-d', strtotime($d->join_time)); ?></td>
							                <?php } ?>
							                <td><?php echo date('Y-m-d', strtotime($d->activate_time)); ?></td>
							                <td><?php echo config_item('currency') . $d->topup; ?></td>
							                <td><?php echo $d->sponsor; ?></td>
							                <td><?php echo $d->position; ?></td>
							                <td>
							                	<a target="_blank" href="<?php echo site_url('site/register/A/'.$d->id); ?>"
                      							 class="btn btn-primary btn-xs">Add Member</a>
							                </td>
							            </tr>
							        <?php } ?>
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
						<div id="div_name24" style="display:none;margin:15px 10px 0px 10px;padding:5px;border:1px solid #aaa;">
							<table width="100%" cellspacing="1" cellpadding="1" border="0">
								<thead>
									<tr>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="31">&nbsp;Sr.</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="100">&nbsp;Name</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="98">
										&nbsp;User ID</th>
										<?php if(config_item('inactive_in_tree')=='Yes') { ?>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="175">
										Joining Date</th>
										<?php } ?>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="148">
										Activation Date</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="111">
										Top-Up Amount</th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;Sponsor ID </th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;Placement ID </th>
										<th scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033; text-align:center" width="123">&nbsp;#</th>
									</tr>
								</thead>
								<tbody>
									<?php
							        $sn = 1;

							        $in = rtrim(ltrim($level->level10,','),',');
							        if(strlen($in)>0){
							        	$users = $this->db->query("
							        	select t1.secret, t1.id,t1.name,t1.join_time,t1.activate_time,t1.topup,t1.sponsor,t2.position 
							        	from member as t1
							        	LEFT JOIN
							        	(select secret,position from level_details where pid = 1) as t2 ON t1.secret = t2.secret
							        	where t1.secret IN (".$in.")
							        	")->result();	
							        }else{
							        	$users = array();
							        }

							        foreach ($users as $d) { ?>
							            <tr>
							            	<td><?php echo $sn++ ?></td>
							            	<td><?php echo $d->name ?></td>
							            	<td><?php echo $d->id ?></td>
							            	<?php if(config_item('inactive_in_tree')=='Yes') { ?>
							                	<td><?php echo date('Y-m-d', strtotime($d->join_time)); ?></td>
							                <?php } ?>
							                <td><?php echo date('Y-m-d', strtotime($d->activate_time)); ?></td>
							                <td><?php echo config_item('currency') . $d->topup; ?></td>
							                <td><?php echo $d->sponsor; ?></td>
							                <td><?php echo $d->position; ?></td>
							                <td>
							                	<a target="_blank" href="<?php echo site_url('site/register/A/'.$d->id); ?>"
                      							 class="btn btn-primary btn-xs">Add Member</a>
							                </td>
							            </tr>
							        <?php } ?>
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