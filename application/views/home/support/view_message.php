<?php
$this->db->select('id, ticket_title,ticket_detail, date, status');
$this->db->where(array('userid' => $this->session->user_id));
$this->db->order_by('id', 'DESC');
$data = $this->db->get('ticket')->result();
?>

<div class="container frame" style="min-height:700px;">
  <br><br>
  <a class="btn btn-success" href="<?php echo site_url('HomeApp/support/message')?>">Send Message +</a>
  <br><br>
	<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr>
            <th>SN</th>
            <th>Subject</th>
            <th>Message</th>
            <th>Date</th>
            <th style="background-color: #d6e9c6">Status</th>
            <th>#</th>
        </tr>
        <?php
        $sn = 1;
        foreach ($data as $e) { ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $e->ticket_title; ?></td>
                <td><?php echo $e->ticket_detail; ?></td>
                <td><?php echo date("Y-m-d h:i A",strtotime($e->date)); ?></td>
                <td style="background-color: #d6e9c6"><?php echo $e->status; ?></td>
                <td><a href="<?php echo site_url('HomeApp/respond/' . $e->id) ?>">View</a>
            </tr>
        <?php } ?>
    </table>
</div>
</div>