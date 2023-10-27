<?php 
$this->db->select('*')->where(array('sponsor' => $this->session->user_id, 'status'=>'Inactive'));
$inactive = $this->db->get('member')->result_array(); ?>

<div class="container frame" style="height: 700px;">
	<p><b><?php echo $this->db_model->select('name', 'member', array('id' => $this->session->user_id));?></b>, These are your Pending Direct Donors.</p>
	<p></p>
	<br>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
			<tr>	
				<th>Name</th>
				<th>Associate ID</th>
				<th>Email</th>
				<th>Mobile</th>
				<th>Registration Date</th>
			</tr>
			</thead>
			<tbody>
			<?php
        	$sn = count($inactive);
        	foreach ($inactive as $e) { ?>
            <tr>
                <td><?php echo $e['name']; ?></td>
                <td><?php echo $e['id']; ?></td>
                <td><?php echo $e['email']; ?></td>
                <td><?php echo $e['phone']; ?></td>
                <td><?php echo date('Y-m-d', strtotime($e['join_time'])); ?></td>
            </tr>
        <?php } ?>
        </tbody>
		</table>
	</div>
	<p>&nbsp;</p>
</div>