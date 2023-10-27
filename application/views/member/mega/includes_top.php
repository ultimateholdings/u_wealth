<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="<?php echo base_url();?>axxets/client/favicon.ico">

<title>Welcome <?php echo $this->session->name ?> | <?php echo config_item('company_name') ?></title>

<!-- Bootstrap 4.0-->
<link rel="stylesheet" href="<?php echo base_url();?>axxets/mega/vendor_components/bootstrap/dist/css/bootstrap.css">

<!-- Bootstrap extend-->
<link rel="stylesheet" href="<?php echo base_url();?>axxets/mega/css/bootstrap-extend.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/mega/vendor_components/font-awesome/css/font-awesome.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/mega/vendor_components/font-awesome/css/font-awesome-animation.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/mega/vendor_components/Ionicons/css/ionicons.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/mega/vendor_components/themify-icons/themify-icons.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/mega/vendor_components/linea-icons/linea.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/mega/vendor_components/glyphicons/glyphicon.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/mega/vendor_components/flag-icon/css/flag-icon.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/mega/vendor_components/material-design-iconic-font/css/materialdesignicons.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/mega/vendor_components/simple-line-icons-master/css/simple-line-icons.css"/>

<link rel="stylesheet" href="<?php echo base_url();?>axxets/mega/css/google_fonts.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/mega/vendor_components/animate/animate.css"/>

<!-- theme style -->
<link rel="stylesheet" href="<?php echo base_url();?>axxets/mega/css/master_style.css">

<!-- Bx-code admin skins -->
<link rel="stylesheet" href="<?php echo base_url();?>axxets/mega/css/skins/_all-skins.css">

<!-- Data Table-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/mega/vendor_components/datatable/datatables.min.css"/>

<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="<?php echo base_url();?>axxets/mega/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css">

<script src="<?php echo base_url();?>axxets/mega/vendor_components/jquery-3.3.1/jquery-3.3.1.js"></script>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<style type="text/css">
	.profile-avatar {
    text-align: center;
}

.gen-pin-btn {
    width: 100%;
    padding: 7px;
    color: #fff;
    background-color: #200087;
    border: 1px solid #20007d;
    border-radius: 20px;
    transition: .5s ease-in-out;
}
	

.profile-avatar img {
    max-width: 120px;
    border-radius: 100%;
}

.profile-name {
    margin-bottom: 8px;
    margin-top: 0px;
    font-size: 20px;
    text-transform: uppercase;
}

.dashbord-profile {
    display: grid;
    grid-template-columns: 120px auto;
    align-items: center;
    grid-gap: 20px;
}
.content {
    box-sizing: border-box;
}

#inputLeft {
    border: 0;
    background-image: linear-gradient(#9c27b0, #9c27b0), linear-gradient(#D2D2D2, #D2D2D2);
    background-size: 0 2px, 100% 1px;
    background-repeat: no-repeat;
    background-position: center bottom, center calc(100% - 1px);
    background-color: transparent;
    transition: background 0s ease-out;
    float: none;
    box-shadow: none;
    border-radius: 0;
    font-weight: 400;
    font-size: 16px;

}

#inputLeft:hover {
  color: blue;
}

#inputLeft_button{
    font-size: 14px;margin-top: 2px; margin-left: 105px;
}

#fb_share img{
    width: 39px; height: 39px; margin-left: -5px;margin-top: -61px;
}

#wp_share img{
    width: 38px; height: 38px;margin-left: -4px;margin-top: -61px;
}

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

@media screen and (max-width: 991px) {
    #fb_share img{
    width: 39px; height: 39px; 
    margin-left: 40px;margin-top: -61px;
    }
    #wp_share img{
    width: 38px; height: 38px;margin-left: 10px;margin-top: -61px;
    }
    #inputLeft_button{
    font-size: 14px;margin-top: 2px; margin-left: 160px;
    }
}

</style>