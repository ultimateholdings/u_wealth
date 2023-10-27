<?php
$top_id = $this->session->user_id;
$this->db->where(array('userid'=>htmlentities($top_id), 'type'=>'Level Referral Income'))->or_where(array('userid'=>htmlentities($top_id), 'type'=>'Level Completion Income'))->or_where(array('userid'=>htmlentities($top_id), 'type'=>'Single Leg Income'));
$earning = $this->db->get('earning')->result_array();
?>
<div class="container frame">
	<p>
	<b><?php echo $this->db_model->select('name', 'member', array('id' => $top_id)); ?></b>, This is where you may view your level income details.</p>
	<br>
	<h3 style="text-align:center"><b>Level Income Details</b></h3><br>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>	
					<th>Date</th>
					<th>Associate ID</th>
					<th>Name</th>
					<th>Details</th>
					<th>Level Income</th>
				</tr>
			</thead>
			<tbody>
			<?php
        	$sn = count($earning);
        	foreach ($earning as $e) { ?>
            <tr>
                <td><?php echo date("Y-m-d h:i A",strtotime($e['date'])); ?></td>
                <td><?php echo $e['ref_id'] > 0 ? $e['ref_id'] : 'NA'; ?></td>
                <td><?php echo $e['ref_id'] > 0 ? $this->db_model->select('name', 'member', array('id' => $e['ref_id'])) : 'NA'; ?></td>
                <td><?php echo $e['pair_names']; ?></td>
                <td><?php echo $e['amount']; ?></td>
            </tr>
        <?php } ?>
        </tbody>
		</table>
	</div>
	<p>&nbsp;</p>
</div> 