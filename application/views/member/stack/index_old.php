





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
<html><style type="text/css"> 
.gen-pin-btn {
    width: 70%;
    padding: 7px;
    color: #fff;
    background-color: #200087;
    border: 1px solid #20007d;
    border-radius: 20px;
    transition: .5s ease-in-out;
}

.popover{
  background-color: red;
}
.popover-header {
  color: red;
  background-color: red;
}
.popover-body {
   
    background-color: yellow;
}
.popover-title{
  background-color: red;

}



@media only screen and (max-width: 600px) {
  .footer {
    position: fixed;bottom: 10px;

    
  }
}
@media only screen and (min-width: 768px) {
  #margin{
    margin-left: 159px;
  }
}
@media only screen and (min-width: 768px) {
  #margin1{
    margin-left: 159px;
  }
}
@media only screen and (min-width: 768px) {
  #margin2{
    margin-left: 159px;
  }
}
@media only screen and (min-width: 768px) {
  #margin3{
    margin-left: 159px;
  }
}
@media only screen and (min-width: 768px) {
    .footer {
    position: fixed;
    bottom: 10px; 
  
        left: 200px;
    
  }

}
  
.card .card-stats {
  
  position:relative;
  overflow:hidden;
  width:350px;
  margin:0 auto;
  background:#333;
  padding:20px;
  box-sizing:border-box;
  text-align:center;
  box-shadow:0 10px 40px rgba(0,0,0,.5)
}
  .card .card-stats .layer {
  z-index:1;
  position:absolute;
  top:calc(100% - 2px);
  height:100%;
  width:100%;
  left:0;
  background:linear-gradient(to left , orange, tomato);
  transition:0.5s;
  
}
.card .card-stats:hover{
 background:linear-gradient(to left , orange, tomato);
}
.card [class*="card-header-"]:not(.card-header-icon):not(.card-header-text):not(.card-header-image) {
    border-radius: 3px;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    margin-top: -20px;
    padding: 15px;
    padding-top: 10px;
    padding-right: 15px;
    padding-bottom: 10px;
    padding-left: 15px;
}
.card .card-header-primary .card-icon, .card .card-header-primary:not(.card-header-icon):not(.card-header-text), .card .card-header-primary .card-text {
    box-shadow: 0 4px 20px 0px rgb(0 0 0 / 14%), 0 7px 10px -5px rgb(156 39 176 / 40%);
}

.card .card-header-primary .card-icon, .card .card-header-primary .card-text, .card .card-header-primary:not(.card-header-icon):not(.card-header-text), .card.bg-primary, .card.card-rotate.bg-primary .front, .card.card-rotate.bg-primary .back {
    background: linear-gradient(
60deg
, #ab47bc, #8e24aa);
}

   .dashbord-profile {display: grid;
    grid-template-columns: 120px auto;
    align-items: center;
    grid-gap: 20px;
    
}
@media only screen and (max-width: 500px){
.profile-content h4 {
    padding:  0px;
    font-size: 13px;
}
}</style>
<?php include 'includes_top.php';?>
<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">
    <div id="load" style="display:none !important;" align="center">
        <img src="<?php echo site_url('uploads/load.gif') ?>">
    </div>
                        <header class="main-header">


    <!--header start-->
    <?php include 'header.php';?></header>
    <!--header end-->
         <aside class="main-sidebar">
    <!--sidebar start-->
    <?php include 'aside.php';?></aside>
    <!--sidebar end-->


                        <style>
                         

                          .center {

                            display: block;

                            margin-left: auto;

                            margin-right: auto;

                            width: 100%;

                          }


                        </style>

                        <!-- Content Wrapper. Contains page content -->
                        


                     

                                <div class="content-wrapper"><div class="content">
                             
     <?php
                    if (trim($layout)!=="") {?>
                            <div class="content-wrapper">
                                  <div class="content-header">
                                    <?php   echo validation_errors('<div class="alert alert-danger">', '</div>');
                    echo $this->session->flashdata('common_flash'); ?>

                                    <div class="container">
        


  <!--start of bread crum-->
  <!--  <div class="d-flex align-items-center db_header">

                                        <div class="mt-auto w-p50">

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

                                  </div>-->
                                  <!--end of breadcrumb-->




 </div>


            </div>
                   
                       <?php echo "<h3 style='color: #3c3c3c'>" . $title . "</h3><br>";
                        define('__ROOT__', dirname(dirname(__FILE__)));
                        include_once __ROOT__.'/'.$layout;
                    } else {

                        if((config_item('is_demo') == TRUE) || ($this->db_model->select('description', 'settings', array('type' => 'flag')) == 1)) {
                            echo "<div class='alert alert-danger' style='text-align:center;'>". config_item('announcement') . '</div>';
                        }?>

</div>

                                                        <?php  if (config_item('enable_help_plan')=="Yes"){ ?>
                            <?php include 'help_dashboard.php';?>
                        <?php } else { ?>
                          <!--start of Dashboard-->
                          <?php include 'dashboard.php';?>                  
 
                                

                                            
                        <?php } ?>
                    <?php } ?>
              
             
    </div>


  <div class="sidenav-overlay"></div>

                          <div class="drag-target"></div>
</div>
</div>

</div>
<!--main content end-->
<!--footer start-->
<div     class="footer">
<?php echo $member_data['footer']; ?>
</div>
 
<?php include 'includes_bottom.php';?>

</body>
</html>
