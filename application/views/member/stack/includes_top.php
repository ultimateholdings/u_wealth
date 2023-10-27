<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Global MLM Software #1 Network Marketing Software">
<meta name="author" content="Global MLM Software">
<link rel="icon" href="<?php echo base_url();?>axxets/client/favicon.ico">
<title>Welcome <?php echo $this->session->name ?> | <?php echo config_item('company_name') ?></title>
<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
 --> 
 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
 <link rel="apple-touch-icon" href="<?php echo base_url();?>axxets/stack/images/ico/apple-icon-120.png">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>axxets/stack/images/ico/favicon.ico">
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('axxets/stack/custom/css/toastr.min.css') ?>">        

    <?php if($title=='email'){ ?>
        
        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/stack/vendors/css/vendors.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/stack/vendors/css/forms/quill/quill.snow.css">
        <!-- END: Vendor CSS-->

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

<style type="text/css">
    .countdownTimerCell{
display: inline-block;
width:20%;
border: 1px solid #333;
text-align: center;
font-size: x-large;
padding: 5px;
background-color: #3a8af7  ;
color: white;
}
.countdownTimerCell:not(:first-child) {
margin-left: -4px;
}
.h{
margin-top: 50px;color:red;text-align:center;
}
</style>