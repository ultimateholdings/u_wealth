<?php
$member=$this->db_model->select_multi('*', 'member', array('id' => $this->session->user_id));
$payout      = $this->db_model->sum('amount', 'earning', array('userid' => $this->session->user_id));
$paid_payout = $this->db_model->sum('amount', 'withdraw_request', array('status' => 'Paid', 'userid' => $this->session->user_id));
if ($paid_payout == "") {
    $paid_payout = 0;
}
$pending_payout = $this->db_model->sum('amount', 'withdraw_request', array('status' => 'Un-Paid', 'userid' => $this->session->user_id)) + $this->db_model->sum('amount', 'withdraw_request', array('status' => 'Hold', 'userid' => $this->session->user_id));
if ($pending_payout == "") {
    $pending_payout = 0;
}
$direct_team = $this->db_model->count_all('member', array('sponsor' => $this->session->user_id));
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <title></title>
  <!-- all the meta tags -->
  <?php include 'metas.php'; ?>
  <!-- all the css files -->
  <?php include 'includes_top.php';?>

</head>
<body>  
      <!-- Topbar Start -->
  <?php include 'header.php'; ?>
  <div style="min-height:83vh;">
  <?php
  echo validation_errors('<div class="alert alert-danger" align="center">', '</div>');
  echo $this->session->flashdata('common_flash');
  include $folder_name.'/'.$page_name.'.php';?>
  </div>
</body>
<!-- footer -->
<div class="footer-copy">
  <div class="container">
    <p><?php if(config_item('footer_name') != '') { ?>
        &copy; <?php echo date('Y') ?> All Rights Reserved by 
<?php echo config_item('footer_name') ?>
<?php } else { ?>
&copy; <?php echo date('Y') ?> All Rights Reserved | Powered by <?php echo config_item('footer') ?>
<?php } ?>
    </p> 
  </div>
</div>
</html>