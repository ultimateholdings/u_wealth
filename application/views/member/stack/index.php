





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
@media only screen and (max-width: 600px) { 
  .footer {
    position: relative;
    

    
  }
}

  
.card .card-stats {
  
  position:relative;
  overflow:hidden;
  width:350px;
  margin:0 auto;
  background:white;
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
<!-- mail code start -->
  <?php if($title =='email'){ ?>
    <body class="vertical-layout vertical-overlay-menu content-left-sidebar email-application  fixed-navbar" data-open="click"  data-col="content-left-sidebar">
  <?php } ?>
<!-- mail code end -->
<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">
    <div id="load" style="display:none !important;" align="center">
        <img src="<?php echo site_url('uploads/load.gif') ?>">
    </div>
                        <header class="main-header">


    <!--header start-->
    <?php include 'header.php';?>
    </header>
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
                    echo validation_errors('<div class="alert alert-danger">', '</div>');
                    echo $this->session->flashdata('common_flash');
                    if (trim($layout)!=="") {?>
                            <div class="content-wrapper">
                                  <div class="content-header">

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
                   
                       <?php echo "<h3 style='color: #3c3c3c'>" . $title . "</h3><hr/>";
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


<!--main content end--> 
<!--footer start-->
<footer class="footer" style="position: fixed;
            padding: 10px 10px 0px 10px;  
            
            width: 100%; 
            /* Height of the footer*/  
            height: 40px;
            background-color: white;
            bottom :5px; position :fixed;
            z-index:1000">
          <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block"><?php if(config_item('footer_name') != '') { ?>
                  &copy; <?php echo date('Y') ?> All Rights Reserved by <?php echo config_item('footer_name') ?>
          <?php } else { ?>
          &copy; <?php echo date('Y')." All Rights Reserved | Powered by <a href='https://www.globalmlmsolution.com' alt='_blank' style='color: blue;'> Global MLM Software </a>"; ?> <?php } ?></span></p>
      </footer>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Feedback</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> 
      </div>
           <div class="modal-body">
            <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
              <form action = "<?php echo base_url('main/variable_member') ?>/<?php echo $member->id; ?>" method = "POST">

              <?php echo form_open() ?>  

                <div class="form-group" style="margin-bottom: 0px;line-height: 23px;">
                    <label>User id: <?php echo $member->id; ?></label><br/>
                    <label>Name</label>

                    <input type="text" id='name' class="form-control" name="name" pattern=".{3,}" title="Enter Valid Name" placeholder="Name" style="padding: 0px 0px 0px 10px;width: 98%;" required>
                    <small><?php echo form_error('name'); ?></small>
                    <br>
                    <label>Phone Number</label>
                    <div class="input-group-prepend" >
                        <input type="text" class="form-control" id ='phone' name="phonenumber"  title="Enter Valid Phone Number"  placeholder='Mobile Number'  style="padding: 0px 0px 0px 10px;width: 98%;"required>
                      </div>
                     <small><?php echo form_error('phonemumber'); ?></small>
                    <br>
                    <label>Email</label>
                    <input type="email" id="email" name="email" class="form-control" title="Enter Valid Email" placeholder='Email Address'  style="padding: 0px 0px 0px 10px;width: 98%;"required>
                    <small><?php echo form_error('email'); ?></small>

                    <br>
                <label>Feedback</label>
                 <textarea class="form-control" type="varchar"  name="feedback"  id="feed_back" rows="3" style="padding-right:0px;width: 98%;" title="enter feedback" placeholder='Feedback' required></textarea>
                 <small><?php echo form_error('feedback'); ?></small>

                <br>
            </div>
            <div class="modal-footer" style="padding-bottom: 0px;">
              <div class="row">
                
                <div class="col-md-6">
               <button class="btn btn-primary" type="submit">submit</button>   
                </div>
                <!-- <div class=" col-md-6">
                   <button class="btn btn-primary" type="submit">Continue</button>  
                </div> -->
              </div>
            </div>
            <?php echo form_close() ?>
    </div>
  </div>
</div> 
    </div>
<?php include 'includes_bottom.php';?>

</body> 
</html>
 