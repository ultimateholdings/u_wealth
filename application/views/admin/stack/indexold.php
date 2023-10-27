<?php $style = config_item('admin_theme')=='admin/default/base' ? array('element'=>'in', 'offset'=>'col-sm-offset-2') : array('element'=>'show', 'offset'=>'offset-sm-2') ; ?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <?php include 'includes_top.php';?>
  </head> 

<!-- BEGIN: Body-->
<?php if(config_item('stack_theme_id')=='1'){ ?> 
  <?php if($title =='email'){ ?>
    <body class="vertical-layout vertical-menu-modern content-left-sidebar email-application  menu-collapsed fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="content-left-sidebar">
  <?php } else { ?>
    <body class="vertical-layout vertical-menu-modern 2-columns   menu-collapsed fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
  <?php } ?>
<?php } elseif(config_item('stack_theme_id')=='2'){ ?>
  <?php if($title =='email'){ ?>
    <body class="vertical-layout vertical-menu content-left-sidebar email-application  fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="content-left-sidebar">
  <?php } else { ?>
    <body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">
  <?php } ?>
<?php } elseif(config_item('stack_theme_id')=='3'){ ?>
  <?php if($title =='email'){ ?>
    <body class="vertical-layout vertical-menu content-left-sidebar email-application  fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="content-left-sidebar">
  <?php } else { ?>
    <body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">
  <?php } ?>
<?php } elseif(config_item('stack_theme_id')=='4'){ ?>
  <?php if($title =='email'){ ?>
    <body class="vertical-layout vertical-menu content-left-sidebar email-application  fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="content-left-sidebar">
  <?php } else { ?>
    <body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">
  <?php } ?>
<?php } elseif(config_item('stack_theme_id')=='5'){ ?>
  <?php if($title =='email'){ ?>
    <body class="vertical-layout vertical-menu content-left-sidebar email-application  fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="content-left-sidebar">
  <?php } else { ?>
      <body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">
    <?php } ?>
<?php } else { ?>
  <?php if($title =='email'){ ?>
    <body class="vertical-layout vertical-overlay-menu content-left-sidebar email-application  fixed-navbar" data-open="click" data-menu="vertical-overlay-menu" data-col="content-left-sidebar">
  <?php } else { ?>
    <body class="vertical-layout vertical-overlay-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-overlay-menu" data-col="2-columns">
  <?php } ?>
<?php } ?>

  <header class="main-header">	
    <?php include 'header.php';?>
  </header>
  
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <?php include 'aside.php';?>
  </aside>

  
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php
	 
      if (trim($layout)!=="") {  ?>
        <?php if($title != 'email'){ ?>
          <div class="content">
            <div class="content-wrapper">
               <?php
      echo validation_errors('<div class="alert alert-danger">', '</div>');?>
    <?php  echo $this->session->flashdata('common_flash');?>
              <div class="content-header">
                <div class="container">
                  <div class="d-flex align-items-center db_header">
                    <div class="mr-auto w-p50">
                      <h1 class="page-title br-0 db_title"><?php echo $title ?></h1>
                      <div class="d-inline-block align-items-center db_bcrum">
                        <nav>
                          <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('member'); ?>"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $title ?></li>
                          </ol>
                        </nav>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php define('__ROOT__', dirname(dirname(__FILE__))); include_once __ROOT__.'/'.$layout; ?>
              <div class="row" style="margin-bottom: 100px;">
              </div>
              </div>
            </div>
          <?php } else { ?>
            <?php define('__ROOT__', dirname(dirname(__FILE__))); include_once __ROOT__.'/'.$layout; ?>
          <?php } ?>
         <?php } else {
          if((config_item('is_demo') == TRUE) || ($this->db_model->select('description', 'settings', array('type' => 'flag')) == 1)) {
              echo "<div class='alert alert-secondary' style='text-align:center;'>". config_item('announcement') . '</div>';
          }

          if (config_item('enable_help_plan')=="Yes"){ ?>
              <?php include 'help_dashboard.php';?>
          <?php } else { ?>
           <?php include 'kpi.php';?>                  
          <?php } ?>
      <?php } ?>

      <!-- END: Content-->

      <div class="sidenav-overlay"></div>
      <div class="drag-target"></div>

      <!-- BEGIN: Footer-->
      <footer class="footer footer-static footer-transparent" style="position: fixed; 
            padding: 10px 10px 0px 10px; 
            bottom: 0; 
            width: 100%; 
            /* Height of the footer*/  
            height: 40px;
            background-color: white;">
          <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block"><?php if(config_item('footer_name') != '') { ?>
                  &copy; <?php echo date('Y') ?> All Rights Reserved by <?php echo config_item('footer_name') ?>
          <?php } else { ?>
          &copy; <?php echo "&copy;".date('Y')." All Rights Reserved | Powered by <a href='https://www.globalmlmsolution.com' alt='_blank' style='color: blue;'> Global MLM Software </a>"; ?> <?php } ?></span></p>
      </footer>
      <!-- END: Footer-->

  </div>
</div>

<?php include 'includes_bottom.php';?>

</body>
</html>
