<?php
$top_id = $this->session->user_id;
$this->db->select('DISTINCT cast(date as DATE) as date')->where(array('userid'=>htmlentities($top_id), 'type'=>'Royalty Income'));
$earning = $this->db->get('earning')->result_array();
?>
<div class="container frame">
	<p><b><?php echo $this->db_model->select('name', 'member', array('id' => $top_id)); ?></b>, This is where you may view your Total icome details.</p>
	<br>
	<h3 style="text-align:center"><b>Royalty Income Details</b></h3><br>
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>	
						<th>Date</th>
						<th>User Id</th>
						<th>Pearl Bonus </th>
						<th>Coral Bonus </th>
						<th>Emerald Bonus </th>
						<th>Diamond Bonus </th>
					</tr>
				</thead>
				<tbody>
				<?php
	        	$sn = count($earning);
	        	foreach ($earning as $e) { ?>
	            <tr>
	                <td><?php echo date("Y-m-d h:i A",strtotime($e['date'])); ?></td>
	                <td><?php echo $top_id; ?></td>
	                <td><?php echo $this->db_model->select('amount','earning',array('userid'=>$top_id,'pair_names'=>'Pearl Income', 'cast(date as DATE) = '=>date('Y-m-d', strtotime($e['date'])))); ?></td>
	                <td><?php echo $this->db_model->select('amount','earning',array('userid'=>$top_id,'pair_names'=>'Coral Income', 'cast(date as DATE) = '=>date('Y-m-d', strtotime($e['date'])))); ?></td>
	                <td><?php echo $this->db_model->select('amount','earning',array('userid'=>$top_id,'pair_names'=>'Emerald Income', 'cast(date as DATE) = '=>date('Y-m-d', strtotime($e['date'])))); ?></td>
	                <td><?php echo $this->db_model->select('amount','earning',array('userid'=>$top_id,'pair_names'=>'Diamond Income', 'cast(date as DATE) = '=>date('Y-m-d', strtotime($e['date'])))) + $this->db_model->sum('amount', 'earning', array('userid' => $top_id,'pair_names'=>'Senior Diamond Income', 'cast(date as DATE) = '=>date('Y-m-d', strtotime($e['date'])))); ?></td>
	            </tr>
	        <?php } ?>
				</tbody>	
			</table>
		</div>
</div>