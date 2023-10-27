<?php

$top_id = $this->session->user_id;
$this->db->select('id, transfer_from, transfer_to, amount, time')->from('transfer_balance_records')
         ->where('transfer_to', htmlentities($top_id));
$received = $this->db->get()->result();
$this->db->select('id, transfer_from, transfer_to, amount, time')->from('transfer_balance_records')
         ->where('transfer_from', htmlentities($top_id));
$sent = $this->db->get()->result();
?>

<div class="container frame" style="min-height: 70vh;">
	<p><strong><?php echo $this->db_model->select('name', 'member', array('id' => $this->session->user_id));?></strong>, This is where you can view your receive wallet details supply by admin or other associates.</p>
	<br>
 	<ul class="nav nav-tabs" id="myTab" role="tablist">
 		<li class="nav-item active">
		    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><?php echo "Received"; ?></a>
		</li>
		 <li class="nav-item">
		    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><?php echo "Withdraw/Transferred"; ?></a>
		 </li>
  	</ul>
  	<br>
  	<div class="tab-content" id="myTabContent">
	    <div class="tab-pane fade active in show" id="home" role="tabpanel" aria-labelledby="home-tab" >
            <table border="1" width="100%" class="table table-bordered">
	   			 <thead>
					<tr>
					<th>Received Date</th>
					<th><strong>Amount</strong></th>
					<th>Transfer By</th>
					<th>Remarks</th>
			        </tr>
	             </thead>
	             <tbody>
	             	<?php
			        $sn = 1;
			        foreach ($received as $e) {
			            ?>
			            <tr>
			                <td><?php echo date("Y-m-d h:i A",strtotime($e->time)) ?></td>
			                <td><?php echo config_item('currency') . $e->amount ?></td>
			                <td><?php echo $e->transfer_from ?></td>
			                <td><?php echo $e->remarks ?></td>
			            </tr>
			        <?php } ?>
	             </tbody>
			</table>
	    </div>
	    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
	        <table border="1" width="100%" class="table table-bordered">
			  <thead>
				<tr>
					<th>Withdraw / Transfer Date</th>
					<th>Amount</th>
					<th>Top-Up ID / Transfer To</th>
					<th>Remarks</th>
				</tr>
		      </thead>
		      <tbody>
             	<?php
		        $sn = 1;
		        foreach ($sent as $e) {
		            ?>
		            <tr>
		                <td><?php echo date("Y-m-d h:i A",strtotime($e->time)) ?></td>
		                <td><?php echo config_item('currency') . $e->amount ?></td>
		                <td><?php echo $e->transfer_to ?></td>
		                <td><?php echo $e->remarks ?></td>
		            </tr>
		        <?php } ?>
             </tbody>
			</table>
	    </div>
	</div>	    	
</div> 