<meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <meta name="robots" content="noindex, nofollow">
   <title>Management Dashboard | <?php echo config_item('company_name') ?></title>
   <link href="<?php echo base_url('axxets/base/css/fonts-open-sans.css') ?>" rel="stylesheet" type="text/css"/> 
   <link href="<?php echo base_url('axxets/base/css/fonts-material-icon.css') ?>" rel="stylesheet">
   <link rel="stylesheet" href="<?php echo base_url('axxets/base/css/font-awesome_v4.7.0.min.css') ?>"> 
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('axxets/base/css/bootstrap_v3.3.7.min.css') ?>">
   <link href="<?php echo base_url('axxets/base/css/bootstrap-switch_v3.3.4.min.css') ?>" rel="stylesheet" type="text/css"/>
   <link rel="stylesheet" href="<?php echo base_url('axxets/base/css/chartist.min.css') ?>">
   <link href="<?php echo base_url('axxets/admin/css/theme1.css') ?>" rel="stylesheet" id="rt_style_components" type="text/css"/>
   <link href="<?php echo base_url('axxets/admin/css/admin_style1.css') ?>" rel="stylesheet" id="rt_style_components" type="text/css"/>
   <link rel="stylesheet" href="<?php echo base_url('axxets/base/css/jquery-ui_v1.12.1.css') ?>">
   <link rel='icon' href="<?php echo base_url();?>axxets/client/favicon.ico" type='image/x-icon'/>
   <link rel="stylesheet" href="<?php echo base_url('axxets/admin/css/jquery.dataTables.min.css') ?>">
   
   <script src="<?php echo base_url('axxets/base/js/jquery_v3.2.1.min.js') ?>" type="text/javascript"></script>
   <script src="<?php echo base_url('axxets/base/js/jquery_v1.12.1-ui.min.js') ?>" type="text/javascript"></script>
   <script type="text/javascript" src="<?php echo base_url('axxets/base/js/loader.js') ?>"></script>
   <!--<script type="text/javascript" src="<?php echo base_url('axxets/admin/js/datatables.js') ?>"></script>-->
   <script src="<?php echo base_url('axxets/base/js/chartist.min.js') ?>"></script>

   <script src="<?php echo base_url();?>axxets/admin/js/jquery.dataTables.min.js"></script>

   <link rel="stylesheet" href="<?php echo base_url();?>axxets/base/css/datatable/jquery.dataTables_1.10.22.min.css">
   <link rel="stylesheet" href="<?php echo base_url();?>axxets/base/css/datatable/buttons.dataTables_1.10.22.min.css">   

   <script src="<?php echo base_url();?>axxets/base/js/datatable/dataTables.buttons_1.6.4.min.js"></script>
   <script src="<?php echo base_url();?>axxets/base/js/datatable/jszip_3.1.3.min.js"></script>   
   <script src="<?php echo base_url();?>axxets/base/js/datatable/pdfmake_0.1.53.min.js"></script>   
   <script src="<?php echo base_url();?>axxets/base/js/datatable/vfs_fonts_0.1.53.js"></script>   
   <script src="<?php echo base_url();?>axxets/base/js/datatable/buttons.html5_1.6.4.min.js"></script>   
   <script src="<?php echo base_url();?>axxets/base/js/datatable/moment.js"></script> 
   <script type="text/javascript" src="<?php echo base_url();?>axxets/base/js/datatable/daterangepicker_2.1.25.js"></script>
   <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/base/css/datatable/daterangepicker.css" /> 

   <!-- mail code start
 -->
  <?php if($title=='email'){ ?>
   <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/stack/vendors/css/vendors.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/stack/vendors/css/forms/quill/quill.snow.css">
        <!-- END: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('axxets/stack/custom/css/toastr.min.css') ?>">

        <!-- BEGIN: Theme CSS-->

       <!--  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/stack/css/bootstrap.css"> -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/stack/css/bootstrap-extended.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/stack/css/colors.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/stack/css/components.css">
        <!-- END: Theme CSS-->

        <!-- BEGIN: Page CSS-->
        <?php if(config_item('stack_theme_id')==1) { ?>
            <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/stack/css/core/menu/menu-types/vertical-menu-modern.css">
        <?php } else { ?>
            <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/stack/css/core/menu/menu-types/vertical-menu.css">
        <?php } ?>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/stack/css/core/colors/palette-gradient.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/stack/css/pages/app-email.css">
        <!-- END: Page CSS-->

        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/stack/custom/css/style.css">
        <!-- END: Custom CSS-->
      <?php }?>
<!-- mail code end -->

  <style type="text/css">

  #level td, #level th{
    text-align: center;
  }

  #pagecontent h3 {
   color: blue !important;
  }

  .input-mini, .input-xxs {
    width: 100% !important;
  }
  .table thead{
   
    background:  linear-gradient(to bottom right, #6565ff ,#d5d5ff) !important;
  }
  .table thead tr th{ 
    font-size: 14px;
    font-weight: 600;
    padding-left: 15px;
    color: white;
}
.card [class*="card-header-"] .card-icon, .card [class*="card-header-"] .card-text {
    border-radius: 12px;
    background-color:orange;
    padding: 8px!important;
    margin-top: 3px!important;
    margin-right: 15px;
    float: left;
}
.card-header.card-header-icon i {
    font-size: 36px;
    line-height: 36px;
    width: 36px;
    height: 36px;
    text-align: center;
    float: left;
    
}
.card [class*="card-header-"]:not(.card-header-icon):not(.card-header-text):not(.card-header-image) {
    border-radius: 3px;
    border-top-left-radius: 1px;
    border-top-right-radius: 3px;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    padding: 15px;
    padding-top: 10px;
    padding-right: 15px;
    padding-bottom: 10px;
    padding-left: 15px;
}
.align-items-center{align-items: center!important;}
@media (max-width: 767px){
.time {
    text-align: left !important;
    padding-top: 10px;
}

}

.text-right {
    text-align: right;
}

 </style>