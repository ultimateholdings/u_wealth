<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome <?php echo $this->session->name ?> | <?php echo config_item('company_name') ?></title>

    <link href="<?php echo base_url('axxets/base/css/fonts-material-icon.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('axxets/base/css/font-awesome_v4.7.0.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('axxets/base/css/bootstrap_v3.3.7.min.css') ?>">
    <link href="<?php echo base_url('axxets/member/css/theme1.css') ?>" rel="stylesheet" id="rt_style_components" type="text/css"/>
    <link href="<?php echo base_url('axxets/member/css/member_style1.css') ?>" rel="stylesheet" id="rt_style_components" type="text/css"/>
    <link rel="stylesheet" href="<?php echo base_url('axxets/base/css/jquery-ui_v1.12.1.css') ?>">
    <!-- favicon -->
    <link rel='icon' href="<?php echo base_url();?>axxets/client/favicon.ico" type='image/x-icon'/>
    <script src="<?php echo base_url('axxets/base/js/jquery_v3.2.1.min.js') ?>" type="text/javascript"></script>
            <!--whatsapp integration -->
    <script type='text/javascript' src="https://platform-api.sharethis.com/js/sharethis.js#property=5d52b99e4cd0540012f2016f&product='inline-share-buttons'" async='async'>
    </script>

    <!--
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
          rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet"
          href="//code.jquery.com/ui/1.12.1/themes/eggplant/jquery-ui.css">

    <link rel='icon' href="<?php echo base_url();?>axxets/client/favicon.ico" type='image/x-icon'/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"
            type="text/javascript"></script>
    <script type='text/javascript' src="https://platform-api.sharethis.com/js/sharethis.js#property=5d52b99e4cd0540012f2016f&product='inline-share-buttons'" async='async'>
    </script>
    -->
<!-- mail code start -->
       <?php if($title=='email'){ ?>
        
        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/stack/vendors/css/vendors.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/stack/vendors/css/forms/quill/quill.snow.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('axxets/stack/custom/css/toastr.min.css') ?>">   

        <!-- END: Vendor CSS-->

        <!-- BEGIN: Theme CSS-->
        <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/stack/css/bootstrap.css"> -->
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



    <?php } ?>
  <!--   mail code end -->


<style>
.btn-pink {
  background-color: #E91E63;
  border-color: #E91E63;
  color: #fff;
}
#single th, #single td {
    text-align:center;
}

#club_income a {
    color: #337ab7;
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

}

#inputLeft:hover {
  color: blue;
}
.Dashboard{
    margin-top: -10px;
}
@media screen and (max-width: 640px) {
.Dashboard{
    margin-top: -45px;
}
}

#inputLeft_button{
    font-size: 12px; margin-top: 0px; margin-left: 85px;
}

#fb_share > img{
    width: 36px; height: 36px; margin-top: -50px; margin-left: -15px;
}

#wp_share img{
    width: 34px; height: 34px;margin-top: -35px;margin-left: 35px;
}

@media screen and (max-width: 991px) {
    #fb_share > img{
    width: 36px; height: 36px; margin-top: -48px; margin-left: 40px;
    }
    #wp_share img{
    width: 34px; height: 34px;margin-top: -35px;margin-left: 100px;
    }
    #inputLeft_button{
    font-size: 12px; margin-top: 2px; margin-left: 170px;
    }
    #live_updates{
        margin-top: 50px;
    }
}


@media (max-width: 991px) {
    div.row:nth-child(3) {
        padding-left: 15px;
        padding-right: 15px;
    }
}

#single > div > div > div > div > div > div > div.card-body > div > table > tbody > tr > td {
    font-size: 14px;
}


.profile-avatar {
    text-align: center;
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
.card-member{
    border-radius: 3px;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    margin-top: -20px;
    padding: 15px;
    padding-top: 15px;
    padding-right: 15px;
    padding-bottom: 10px;
    padding-left: 15px;

}

.card-body {
    padding: 10px 24px 24px;
    padding-top: 10px;
    padding-right: 24px;
    padding-bottom: 24px;
    padding-left: 24px;
}

.card .card-header-primary .card-icon,
.card .card-header-primary .card-text,
.card .card-header-primary:not(.card-header-icon):not(.card-header-text),
.card.bg-primary,
.card.card-rotate.bg-primary .front,
.card.card-rotate.bg-primary .back {

   background: linear-gradient(60deg, #ab47bc, #8e24aa);

}
.card .card-header-primary .card-icon,
.card .card-header-primary:not(.card-header-icon):not(.card-header-text),
.card .card-header-primary .card-text {
    box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(156, 39, 176, 0.4);
}
.h4{
    margin-top: 10px;
    
}
li.page-logo{background-color: white}
h4.card-title{
    margin-top: 10px;
  margin-bottom: 0;
    text-align: left;
}
.card [class*="card-header-"] .card-icon, .card [class*="card-header-"] .card-text {
    border-radius: 12px;
    background-color:orange;
    padding: 8px!important;
    margin-top: 14px!important;
    
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
p.card-category {
    text-align: left;
    display: block;
    font-size: 12px
  }
.div {
    display: block;
}
.col-md-12{
    position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}
.table-responsive{
    min-height: .01%;
    overflow-x: auto;
}
.table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
    background-color: transparent;
}
.text-primary {
    color: #337ab7;
}
.tbody {
    display: table-row-group;
    vertical-align: middle;
    border-color: inherit;
}
.tr {
    display: table-row;
    vertical-align: inherit;
    border-color: inherit;
}
.card .dataTable td, .card .dataTable th, .card .table td, .card .table th, .table td, .table th {
    vertical-align: middle;
    padding-top: 15px;
    padding-right: 8px;
    padding-bottom: 15px;
    padding-left: 8px;

}
.table thead {
    
    background:  linear-gradient(to bottom right, #6565ff ,#d5d5ff) !important;
    font-size: 14px;
    font-weight: 600;
    padding-left: 15px;
    color: white;
}
.table td{
    text-shadow: none;
    color: black;
    text-decoration: none;
    background-color: transparent;
    font-size: 12px;
    padding-left: 50px;
}

.#inline {
    width :50%;
    padding : 0;
    margin : 0;
    display : inline;

}

fieldset {
    display: block;
    margin-inline-start: 2px;
    margin-inline-end: 2px;
    padding-block-start: 0.40em;
    padding-inline-start: 0.95em;
    padding-inline-end: 0.75em;
    padding-block-end: 0.625em;
    min-inline-size: min-content;
    border-width: 2px;
    border-style: groove;
    border-color: threedface;
    border-image: initial;
}

legend {
    display: block;
    padding-inline-start: 2px;
    padding-inline-end: 2px;
    border-width: initial;
    border-style: none;
    border-color: initial;
    border-image: initial;
    width: auto;
    margin-bottom: 5px;
    font-size: 25px;
    color: #00bcd4;
    padding-left: 10px;
    padding-right: 10px;
}

#single .label{
    border-radius: 12px;
    padding: 5px 12px;
    text-transform: uppercase;
    font-size: 10px;
}

#single .label.label-success {
    background-color: #4caf50;
}

#single .label.label-danger {
    background-color: #f44336;
}


.countdownTimerCell{
display: inline-block;
width:20%;
border: 1px solid #333;
text-align: center;
font-size: x-large;
padding: 5px;
background-color: #f39c12 ;
color: white;
}
.countdownTimerCell:not(:first-child) {
margin-left: -4px;
}
.h{
margin-top: -50px;color:red;text-align:center;
}

#earning td{
    font-size: 13px;
}

#club_income td{
    font-size: 14px;
}
/* new theme css..mega*/
.layer-content h4 {
    font-size: 24px;
    color: white;
    font-family: 'Muli', sans-serif;}

span.live-data {
    top: 12px;
    right: -4px;
    display: flex;
    transform: rotate(52deg);
    font-size: 15px;
    font-weight: 900;
    width: 40px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;  
    position: absolute;
    top: 4px;
    right: 1px;
}
.layer-thumb img {
    margin-top: 12px
    /* max-height: 71px; */
}
@media (max-width: 767px){
.layer-thumb img {
    max-height: 160px;
}
.panel-body .my{background:none;}
}
@media (max-width: 1200px){
.layer-thumb img {
    max-height: 80px;
}}
.layer-thumb img {
    max-height: 110px;
    transition: all ease-in-out 0.4s;
    -webkit-transition: all ease-in-out 0.4s;
    -moz-transition: all ease-in-out 0.4s;
    -ms-transition: all ease-in-out 0.4s;
    -o-transition: all ease-in-out 0.4s;
}
.layer-content{margin-top: 12px;margin-right: 5px}
.layer-content h4 {
    font-weight: 300;
    font-size: 20px;
    text-align: right;
    margin-bottom: 0;
    color: #000;
}
    
@media screen and (max-width: 992px){
.layer-thumb img {
    font-size: 14px;
    color: #fff;
    text-align: center!important;
    margin-top: 12px;
 }
}
@media screen and (max-width: 1200px){
.layer-thumb img {
    text-align: center;
      opacity: 0.9;
    animation-name: bounceIn;
    animation-duration: 450ms;
    animation-timing-function: linear;
    animation-fill-mode: forwards;
    animation-delay: 1s
}}

.layer-thumb img:hover {
   
      opacity: 0.9;
    animation-name: bounceIn;
    animation-duration: 450ms;
    animation-timing-function: linear;
    animation-fill-mode: forwards;
    animation-delay: 1s}
@media screen and (max-width: 992px){
.layer-content h4 {
    font-size: 14px;
    color: #fff;
    text-align: center!important;
    margin-top: 12px;
 }
}
.text-center {
    text-align: center !important;
}



@media (min-width: 1550px){
.layer-content h4 {
    font-size: 28px;
}}
@media (min-width: 1450px){
.layer-content h4 {
    font-size: 1.5vw}}
@media screen and (max-width: 1200px){
.layer-content h4 {

    font-size: 30px;
    color: #fff;
    text-align: center;}
}
h1 .total-gmlm {
    text-align: right;
    font-size: 32px;
    font-family:  "Poppins","Helvetica Neue", Helvetica, Arial, sans-serif;
    font-weight: bold;
   
}
h4 .total-gmlm{
    text-align: right;
   font-size: 24px;
   font-family:  "Muli","Helvetica Neue", Helvetica, Arial, sans-serif;
  
   
}
.total-gmlm {
    color: #ffffff;
    
    text-align: right;
}

.total-gmlm {
    font-size: 30px;
    margin-bottom: 0;
   
}

@media screen and (max-width: 1200px){
.total-gmlm {
    text-align: center;
}}
.img-fluid {
    max-width: 100%;
    height: auto;
}
.layer-thumb.img-fluid {
    margin-top: 12px;
    max-width: 100%;
    height: auto;
}
.wavy1 {
  position: relative;
  -webkit-box-reflect: below -12px linear-gradient(transparent, rgba(0, 0, 0, 0.2));
  display: inline;
  padding-left: 1px;
  text-transform: capitalize;
}
.wavy {
  position: relative;
  -webkit-box-reflect: below -12px linear-gradient(transparent, rgba(0, 0, 0, 0.2));
  display: inline;
  padding-left: 1px;
  text-transform: capitalize;
}
.wavy1 span { display: inline-block;
  animation: animate 1.5s ease-in-out infinite;
  animation-delay: calc(.1s * var(--i));
  color: #ff5455;
  letter-spacing: 1px;}
.wavy span {
  position: relative;
  display: inline-block;
  color: #ff5455;
  font-weight: bold;
  font-size: 8px;
  text-transform: uppercase;
  animation: animate 1.5s ease-in-out infinite;
  animation-delay: calc(.1s * var(--i));
  letter-spacing: -3px;
}
@keyframes animate {
0%, 100% {
  transform: translateY(0px);
}
20% {
  transform: translateY(-10px);
}
40% {
  transform: translateY(0px);
}
}
.img-fluid {

    max-width: 100%;
    height: auto;
}
.layers-body:hover::before {
    width: 120%;
    background-color: rgba(255, 255, 255, 0);
    -webkit-transition: all 0.7s ease-out;
    -moz-transition: all 0.7s ease-out;
    -ms-transition: all 0.7s ease-out;
    -o-transition: all 0.7s ease-out;
    transition: all 0.7s ease-out;
}

.layers-body::before {
    background-color: rgba(255, 255, 255, 0.51);
}
.layers-body::before {
    content: "";
    position: absolute;
    top: 0px;
    left: 0px;
    width: 0%;
    height: 100%;
    background-color: rgba(0, 188, 212, 0.51);
    -webkit-transition: none;
    -moz-transition: none;
    -ms-transition: none;
    -o-transition: none;
    transition: none;
}

.layers-body.card-count-1{background-color: #ff5050;}
.layers-body.card-count-2{ background-color: #2255a4;}
.layers-body.card-income-1 {  background: linear-gradient(to bottom right, #57002F ,#f5e6eb);}
.layers-body.card-income-2{  background: linear-gradient(to bottom right, #57002F ,#f5e6eb);}
.layers-body.card-referel-1{  background: linear-gradient(to bottom right, #d11919 ,#fae6e6);}
.layers-body.card-referel-2  {  background: linear-gradient(to bottom right, #d11919 ,#fae6e6);}
.layers-body.card-paid-1{  background: linear-gradient(to bottom right, #ff761b ,#ffe9da);}
.layers-body.card-paid-2 {  background: linear-gradient(to bottom right, #d11919 ,#fae6e6);}

.card-count-1{background-color: #ff5050;}
.card-count-2{ background-color: #2255a4;}
.card-income-1{background-color:#00bcd4;}
.card-income-2{background-color:#fdb71e;}
.card-referel-1{background-color:#5603ad;}
.card-referel-2{background-color:#28b779;}
.card-paid-1{background-color:#fb6340;}
.card-paid-2{background-color:#334050;}
.layer-thumb{    opacity: 0.9;
    animation-name: bounceIn;
    animation-duration: 450ms;
    animation-timing-function: linear;
    animation-fill-mode: forwards;
    animation-delay: 1s;}
  
.layers-body{ 
    border-left: 0px solid #ffffff;
    box-shadow: 0 16px 38px -12px rgb(0 0 0 / 24%), 0 4px 25px 0px rgb(0 0 0 / 12%), 0 8px 10px -5px rgb(0 0 0 / 20%);
    border-radius: 5px;
    width: 100%;
    min-height: 150px;
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    font-size: .875rem;
    box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(255, 152, 0, 0.4);
    border: 0;
    margin-bottom: 30px;
    margin-top: 30px;
    border-radius: 6px;
    color: #333333;
    background: #fff;
    box-sizing: border-box;
    opacity: 0.9;
    animation-name: bounceIn;
    animation-duration: 450ms;
    animation-timing-function: linear;
    animation-fill-mode: forwards;
    animation-delay: 1s;}
 @keyframes bounceIn {
        0% {
            opacity: 0;
            transform: scale(0.3) translate3d(0, 0, 0);
        }
    
        50% {
            opacity: 0.9;
            transform: scale(1.1);
        }
    
        80% {
            opacity: 1;
            transform: scale(0.89);
        }
    
        100% {
            opacity: 1;
            transform: scale(1) translate3d(0, 0, 0);
        }
    }
     .dropdown-user > a{animation: bounceIn;
     animation-duration: 450ms;
    animation-timing-function: linear;
    animation-fill-mode: forwards;
    animation-delay: 1s;}
     @keyframes bounce1 {
    
        0%,
        10%,
        20%,
        40%,
        55%,
        80% {
            transform: translateY(0)
        }
    
        50% {
            transform: translateY(-5px)
        }
    
        60% {
            transform: translateY(-5px)
        }
    }
.ui-aside .nav > li.acive > span{display: inline;}
    .navbar-collapse{ background: linear-gradient(to bottom right, #6565ff ,#d5d5ff);
}
.breadcrumb.pull-left > li{color: white;
    margin-left: 3px;
    font-weight: 300;
    text-transform: capitalize;}

/*end of new theme css..13 July 2021*/
.toggle-btn{background-color: white}
.toggle-btn:hover{background: none}
@media (min-width: 768px){.ui-aside {position: relative;}}
.ui-aside {
    
    color:white; 
    background: linear-gradient(to bottom right, #6565ff ,#d5d5ff);
    /*background: linear-gradient(
     rgba(248, 247, 216, .8),
     rgba(248, 247, 216, .8)
     ), url('../img/sidebar-1.jpg');
    box-shadow: 0 16px 38px -12px rgba(0, 0, 0, 0.56), 
                0 4px 25px 0px rgba(0, 0, 0, 0.12), 
                0 8px 10px -5px rgba(0, 0, 0, 0.2);*/
}

.ui-aside-compact .ui-aside .nav > .navbar-header {
    display: none;
}

.ui-aside-compact .ui-aside .nav > li.member > a {
    display: none;
}


.navbar-header{animation: bounce}
#aside > ul > li.open > a {
    background-color: #2255a4;
    padding-left: 10px;
    margin: 0 5px;
    box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(156, 39, 176, 0.4);
    border-radius:3px;
}
#aside > ul > li.active > a {
    background-color: #2255a4;
    padding-left: 10px;
    margin: 0 4px;
    border-radius:3px;
}

.nav .active, .nav li a:hover  {
    background-color: transparent; 
    box-shadow:0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(156, 39, 176, 0.4);/*transparant can be tried here */
    border-radius:6px;

    color: #3C4858;
}


</style>
</head>

