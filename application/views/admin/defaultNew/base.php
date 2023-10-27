<?php
if ($this->login->check_session() == FALSE) {
  redirect(site_url('site/admin'));
}

$style = config_item('admin_theme')=='admin/defaultNew/base' ? array('element'=>'in', 'offset'=>'col-sm-offset-2') : array('element'=>'show', 'offset'=>'offset-sm-2') ;

if ((isset($this->session->designation)) || ($this->login->check_session() == TRUE)){ 

$lg_dark_logo = file_exists(FCPATH .'axxets/client/logo_dark.png') ? base_url().'axxets/client/logo_dark.png' : base_url().'uploads/site_img/logo-dark-text.png';

?>
 
<!DOCTYPE html>
<html lang="en">
 <head>
  <?php include 'includes_top.php';?>
</head>
<style type="text/css">

  .popover {
  border: 2px dotted red;
  
}

/* Popover Header */
.popover-title {

  color: #FFFFFF!important;
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
.content {
  
    background: url('<?php echo base_url();?>/uploads/site_img/back.png');
    background-size: cover;
    background-attachment: fixed;
}
  .breadcrumb{margin-bottom: 1px;margin-top: 10px;background:none;}
</style>


<!-- mail code start -->
  <?php if($title =='email'){ ?>
    <body class="vertical-layout vertical-overlay-menu content-left-sidebar email-application  fixed-navbar" data-open="click" data-menu="vertical-overlay-menu"  data-col="content-left-sidebar">
  <?php } ?>
<!-- mail code end -->

<body class="page-header-fixed sidemenu-closed-hidelogo page-container-bg-solid page-content-white page-md">



<div class="page-wrapper">
  <?php include 'header.php';?>
  <div class="clearfix"></div>
  <div class="page-container">
   <?php if($title =='email'){ ?>
    </br> </br>
    <?php } ?> 
    <?php include 'aside.php' ?>
    <div class="page-content-wrapper">
        <div id='pagecontent' class="page-content" style="padding-left: 40px;">
       
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left"><div class="page-title"><?php echo $title; ?></div></div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;
                          <a class="parent-item" href="<?php echo site_url('admin') ?>">Home</a>&nbsp;
                          <i class="fa fa-angle-right"></i>
                        </li>
                        <li class="active"><?php echo $breadcrumb; ?></li>
                    </ol>
                </div>
            </div>
            <?php
            echo validation_errors('<div class="alert alert-danger">', '</div>');
            echo $this->session->flashdata('common_flash');
            if (trim($layout) !== "") {
                define('__ROOT__', dirname(dirname(__FILE__))); include_once __ROOT__.'/'.$layout;
            } else if (isset($this->session->designation)) {
                echo '<h1 align="center"> Welcome Again ' . $this->session->name . '</h1>';
            } else {
            
            if((config_item('is_demo') == TRUE) || ($this->db_model->select('description', 'settings', array('type' => 'flag')) == 1)) {
                echo '<div class="alert alert-danger">'. config_item('announcement') . '</div>';
            } ?>

           <!-- <?php if($this->db_model->count_all('transaction', array('to_userid'=>'admin', 'status'=>'Processing'))>0){ ?>
              <div class="alert alert-success" >
              You have Received Bank Deposits from Members !!! Please <a href="<?php echo site_url('income/bank_payment') ?>" style='color: blue;'> Click Here </a> to Approve the payment !!!
              </div>
              <?php } ?>

            <?php if($this->db_model->count_all('ticket', array('user_type'=>'User', 'status'=>'Open'))+$this->db_model->count_all('ticket', array('user_type'=>'User', 'status'=>'Customer Reply'))>0){ ?>
              <div class="alert alert-success" >
              You have Pending Support Ticket !!! Please <a href="<?php echo site_url('ticket/unsolved') ?>" style='color: blue;'> Click Here </a> to Resolve !!!
              </div>
              <?php } ?>-->

            <?php include 'kpi.php' ?>

            <?php include 'dashboard.php' ?>                
            
        <?php } ?>
        </div>
    </div>
  </div> <!--end of content-wrapper class -->

  <div class="page-footer">
      <div class="page-footer-inner"> 
          <?php if(config_item('footer_name') != '') { ?>
                  &copy; <?php echo date('Y') ?> All Rights Reserved by 
          <?php echo config_item('footer_name') ?>
          <?php } else { ?>
          &copy; <?php echo date('Y') ?> All Rights Reserved | Powered by <?php echo config_item('footer') ?> <?php } ?>
      </div>
      <div class="scroll-to-top">
          <i class="fa fa-arrow-up"></i>
      </div>
  </div>
</div>
<?php include 'includes_bottom.php' ?>
 <script type="text/javascript">
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })</script>
</body>
</html>

<?php } ?>