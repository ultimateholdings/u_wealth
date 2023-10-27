<?php
$top_id = $this->session->user_id;
$this->db->where(array('userid'=>htmlentities($top_id), 'type'=>'ROI'));
$earning = $this->db->get('earning')->result_array();
?>
	<div class="container frame">
		<p>
		<b><?php echo $this->db_model->select('name', 'member', array('id' => $top_id)); ?></b>, This is where you may view your ROI income details.</p>
		<br>
		<h3 style="text-align:center"><b>ROI Income Details</b></h3><br>
		<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>	
					<th>Date</th>
					<th>Associate <br>ID</th>
					<th>Name</th>
					<th>ROI <br>Income</th>
				</tr>
			</thead>
			<?php
        	$sn = count($earning);
        	foreach ($earning as $e) { ?>
            <tr>
                <td><?php echo date("Y-m-d h:i A",strtotime($e['date'])); ?></td>
                <td><?php echo $e['userid']; ?></td>
                <td><?php echo $e['name']; ?></td>
                <td><?php echo $e['amount']; ?></td>
            </tr>
        <?php } ?>
		</table>
	</div>
	<p>&nbsp;</p>
</div> <!-- container-->