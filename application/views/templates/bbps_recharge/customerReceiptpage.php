<?php

if ($this->login->check_member() == false) {
    redirect(site_url('site/login'));
}

$member_data = $this->user_model->load_member_data($this->session->user_id);
$income_name = $member_data['income_name'];
$member = $member_data['member'];
$mp = $member_data['mp'];
$pd = $member_data['pd'];
$payout = $member_data['payout'];
?>

<!DOCTYPE html>
<html>
<?php include 'includes_top.php';?>
<body>

<div id="ui" class="ui">

    <!--header start-->
    <?php include 'header.php';?>
    <!--header end-->

    <aside id="aside" class="ui-aside">
  <ul class="nav" ui-nav>
      <li class="member">
          <a href="<?php echo base_url('member') ?>">Hi, <?php echo $member_data['member']->name ?><br/>(
              My ID
              : <?php echo config_item('ID_EXT') . $member_data['member']->id ?>)
          </a>
      </li>
      <li id="dashboard" >
          <a href="<?php echo site_url('bbps_recharge') ?>"><i class="fa fa-home"></i><span>Bill Payment Screen</span></a>
      </li>
      <li id='wletter'>
          <a href="<?php echo site_url('bbps_recharge/getReceipt') ?>"><i
                      class="fa fa-file-text-o"></i><span>Payment Receipt status</span></a>
      </li>
      <li id='wletter'>
          <a href="<?php echo site_url('bbps_recharge/raiseCompliant') ?>"><i
                      class="fa fa-file-text-o"></i><span> Raise Complaint</span></a>
      </li>
      <li id='wletter' class="active">
          <a href="<?php echo site_url('bbps_recharge/compliantStatus') ?>"><i
                      class="fa fa-file-text-o"></i><span> Compliant Status</span></a>
      </li>    
      <li><a href="<?php echo site_url('member/logout') ?>"><i class="fa fa-sign-out"></i> Log Out</a></li>
      </li>
  </ul>
</aside>
    <div id="load" style="display:none !important;" align="center">
        <img src="<?php echo site_url('uploads/load.gif') ?>">
    </div>
    <!--main content start-->
    <div id="content" class="ui-content ui-content-aside-overlay">
        <div class="ui-content-body">

            <div class="ui-container">
            <div class="row">
                    MMMMMM
                    </div>
            </div>
        </div>
    </div>
</div>
<!--main content end-->
<!--footer start-->
<div style="text-align: center; margin-bottom: 20px;">
<?php echo $member_data['footer']; ?>
</div>

<?php include 'includes_bottom.php';?>

</body>
</html>
