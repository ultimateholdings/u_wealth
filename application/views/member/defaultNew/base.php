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
<html >
<head>
<?php include 'includes_top.php';?>

  <!-- mail code start -->
  <?php if($title =='email'){ ?>
    <body class="vertical-layout vertical-overlay-menu content-left-sidebar email-application" data-open="click" data-menu="vertical-overlay-menu" data-col="content-left-sidebar">
  <?php }?>
<!-- mail code end -->


<style type="text/css">

    .popover {
  border: 2px dotted red;
}

/* Popover Header */
.popover-title {
  background-color: #2a4254;;
  color: #FFFFFF;
  font-size: 28px;
  text-align:center;
}

/* Popover Body */
.popover-content {
  background-color: rgba(17, 191, 157, 0.59);
  color: black;
  padding: 20px;
}

/* Popover Arrow */
.arrow {
  border-right-color: red !important;
}

</style>
</head>

<body>
  

<div id="ui" class="ui page-wrapper">

    <!--header start-->
    <?php include 'header.php';?>
    <!--header end-->



    <!--sidebar start-->
    <?php include 'aside.php';?>
    <!--sidebar end-->



    <div id="load" style="display:none !important;" align="center">
        <img src="<?php echo site_url('uploads/load.gif') ?>">
    </div>

    <!--main content start-->
    <div id="content" class="ui-content ui-content-aside-overlay">
        <div class="ui-content-body">

            <div class="ui-container">
                <div class="row">
                    <?php
                    echo validation_errors('<div class="alert alert-danger">', '</div>');
                    echo $this->session->flashdata('common_flash');
                    if (trim($layout)!=="") {
                        echo "<h3 style='color: #3c3c3c'>" . $title . "</h3><hr/>";
                        define('__ROOT__', dirname(dirname(__FILE__)));
                        include_once __ROOT__.'/'.$layout;
                    } else {

                        if((config_item('is_demo') == TRUE) || ($this->db_model->select('description', 'settings', array('type' => 'flag')) == 1)) {
                            echo "<div class='alert alert-danger' style='text-align:center;'>". config_item('announcement') . '</div>';
                        }

                        if (config_item('enable_help_plan')=="Yes"){ ?>
                            <?php include 'help_dashboard.php';?>
                        <?php } else { ?>
                          <!--start of Dashboard-->
                          <?php include 'dashboard_top.php';?>                    

                          <?php include 'kpi.php';?>

                          <?php include 'dashboard_bottom.php';?>                                     
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--main content end-->
<!--footer start-->
<div style="text-align: center; margin-bottom: 20px;">
<?php if(config_item('footer_name') != '') { ?>
                  &copy; <?php echo date('Y') ?> All Rights Reserved by 
          <?php echo config_item('footer_name') ?>
          <?php } else { ?>
          &copy; <?php echo date('Y') ?> All Rights Reserved | Powered by <?php echo config_item('footer') ?> <?php } ?>
</div>

<?php include 'includes_bottom.php';?>

</body>
</html>
