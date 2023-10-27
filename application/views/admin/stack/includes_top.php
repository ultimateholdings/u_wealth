<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Global MLM Software #1 Network Marketing Software">
<meta name="author" content="Global MLM Software">
<link rel="icon" href="<?php echo base_url();?>axxets/client/favicon.ico">
<title>Welcome <?php echo $this->session->name ?> | <?php echo config_item('company_name') ?></title>

<link rel="apple-touch-icon" href="<?php echo base_url();?>axxets/stack/images/ico/apple-icon-120.png">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>axxets/stack/images/ico/favicon.ico">
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
<script src="<?php echo base_url('axxets/base/js/jquery_v3.2.1.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('axxets/stack/js/scripts/pages/jquery.validate.js') ?>"></script>
<script>var base_url = '<?php echo base_url(); ?>';</script>

<link href="<?php echo base_url('axxets/base/css/fonts-material-icon.css') ?>" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.usebootstrap.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/stack/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/stack/css/bootstrap-extended.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/stack/css/colors.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/stack/css/components.css">
        <link rel="stylesheet" href="<?php echo base_url('axxets/base/css/jquery-ui_v1.12.1.css') ?>">
    <link href="<?php echo base_url('axxets/admin/css/admin_style.css') ?>" rel="stylesheet" id="rt_style_components" type="text/css"/>


    <?php if($title=='email'){ ?>
        
        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/stack/vendors/css/vendors.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/stack/vendors/css/forms/quill/quill.snow.css">
        <!-- END: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('axxets/stack/custom/css/toastr.min.css') ?>">

        <!-- BEGIN: Theme CSS-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/stack/css/bootstrap.css">
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

    <?php } else { ?>
        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/stack/vendors/css/vendors.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/stack/vendors/css/charts/jquery-jvectormap-2.0.3.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/stack/vendors/css/charts/morris.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/stack/vendors/css/extensions/unslider.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/stack/vendors/css/weather-icons/climacons.min.css">
        <!-- END: Vendor CSS-->

        <!-- BEGIN: Theme CSS-->
       <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/stack/css/bootstrap.css"> -->
       <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/stack/css/bootstrap.css">
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
        <!-- link(rel='stylesheet', type='text/css', href=app_assets_path+'/css'+rtl+'/pages/users.css')-->
        <!-- END: Page CSS-->

        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/stack/custom/css/style.css">
        <!-- END: Custom CSS-->
    <?php } ?>

    <script src="<?php echo base_url();?>axxets/stack/vendors/js/vendors.min.js"></script>

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

</style>