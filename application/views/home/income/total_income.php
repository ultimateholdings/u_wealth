<?php
$top_id = $this->session->user_id;
$this->db->select('DISTINCT cast(date as DATE) as date')->where(array('userid'=>htmlentities($top_id)));
$earning = $this->db->get('earning')->result_array();
?>
<div class="container frame">
	<p><b><?php echo $this->db_model->select('name', 'member', array('id' => $top_id)); ?></b>, This is where you may view your Total income details.</p>
	<p>&nbsp;</p>
	<h3 style="text-align:center"><b>Previous Total Income</b></h3>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Date</th>
					<th>Referral </th>
					<th>Level </th>
					<?php if(config_item('roi_income') == 'Yes') { ?>
		        	<th>ROI Income </th>
		        	<?php } ?>
					<?php if(config_item('ideal_plan')=='Yes') { ?>
					<th>Non Working </th>
					<th>Pearl Bonus </th>
					<th>Coral Bonus </th>
					<th>Emerald Income</th>
					<th>Diamond Income</th>
					<?php } ?>
					<th>Total Income</th>
		        </tr>
			</thead>
			<tbody>
				<?php
	        	$sn = count($earning);
	        	foreach ($earning as $e) { ?>
	            <tr>
	                <td><?php echo date("Y-m-d h:i A",strtotime($e['date'])); ?></td>
	                <td><?php echo $this->db_model->sum('amount', 'earning', array('userid' => $this->session->user_id, 'type' => 'Referral Income', 'cast(date as DATE) = '=>date('Y-m-d', strtotime($e['date'])))); ?></td>
	                <td><?php echo $this->db_model->sum('amount', 'earning', array('userid' => $this->session->user_id, 'type' => 'Level Referral Income', 'cast(date as DATE) = '=>date('Y-m-d', strtotime($e['date'])))) + $this->db_model->sum('amount', 'earning', array('userid' => $this->session->user_id, 'type' => 'Level Completion Income', 'cast(date as DATE) = '=>date('Y-m-d', strtotime($e['date'])))) + $this->db_model->sum('amount', 'earning', array('userid' => $this->session->user_id, 'type' => 'Single Leg Income', 'cast(date as DATE) = '=>date('Y-m-d', strtotime($e['date'])))); ?></td>
	                <?php if(config_item('roi_income') == 'Yes') { ?>
		        	<td><?php echo $this->db_model->sum('amount', 'earning', array('userid' => $this->session->user_id, 'type' => 'ROI', 'cast(date as DATE) = '=>date('Y-m-d', strtotime($e['date'])))); ?></td>
		        	<?php } ?>
	                <?php if(config_item('ideal_plan')=='Yes') { ?>
	                <td><?php echo $this->db_model->sum('amount', 'earning', array('userid' => $this->session->user_id, 'type' => 'Non Working Income', 'cast(date as DATE) = '=>date('Y-m-d', strtotime($e['date'])))); ?></td>
	                <td><?php echo $this->db_model->select('amount','earning',array('userid'=>$top_id,'pair_names'=>'Pearl Income', 'cast(date as DATE) = '=>date('Y-m-d', strtotime($e['date'])))); ?></td>
	                <td><?php echo $this->db_model->select('amount','earning',array('userid'=>$top_id,'pair_names'=>'Coral Income', 'cast(date as DATE) = '=>date('Y-m-d', strtotime($e['date'])))); ?></td>
	                <td><?php echo $this->db_model->select('amount','earning',array('userid'=>$top_id,'pair_names'=>'Emerald Income', 'cast(date as DATE) = '=>date('Y-m-d', strtotime($e['date'])))); ?></td>
	                <td><?php echo $this->db_model->select('amount','earning',array('userid'=>$top_id,'pair_names'=>'Diamond Income', 'cast(date as DATE) = '=>date('Y-m-d', strtotime($e['date'])))) + $this->db_model->select('amount','earning',array('userid'=>$top_id,'pair_names'=>'Senior Diamond Income', 'cast(date as DATE) = '=>date('Y-m-d', strtotime($e['date'])))); ?></td>
	                <?php } ?>
	                <td><?php echo $this->db_model->sum('amount','earning',array('userid'=>$top_id,'cast(date as DATE) = '=>date('Y-m-d', strtotime($e['date'])))); ?></td>
	            </tr>
	        <?php } ?>
			</tbody>
		</table>
	</div>
</div>