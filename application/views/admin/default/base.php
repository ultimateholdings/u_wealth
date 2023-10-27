<?php
if ($this->login->check_session() == FALSE) {
  redirect(site_url('site/admin'));
}

$style = config_item('admin_theme')=='admin/default/base' ? array('element'=>'in', 'offset'=>'col-sm-offset-2') : array('element'=>'show', 'offset'=>'offset-sm-2') ;

if ((isset($this->session->designation)) || ($this->login->check_session() == TRUE)){ 

$lg_dark_logo = file_exists(FCPATH .'axxets/client/logo_dark.png') ? base_url().'axxets/client/logo_dark.png' : base_url().'uploads/site_img/logo-dark-text.png';

?>

<!DOCTYPE html>
<html lang="en">
 <head>
  <?php include 'includes_top.php';?>
</head>
<body class="page-header-fixed sidemenu-closed-hidelogo page-container-bg-solid page-content-white page-md" id="page_header">
<div class="page-wrapper">
  <?php include 'header.php';?>
  <div class="clearfix"></div>
  <div class="page-container">
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

            <?php if($this->db_model->count_all('transaction', array('to_userid'=>'admin', 'status'=>'Processing'))>0){ ?>
              <div class="alert alert-success" >
              You have Received Bank Deposits from Members !!! Please <a href="<?php echo site_url('income/bank_payment') ?>" style='color: blue;'> Click Here </a> to Approve the payment !!!
              </div>
              <?php } ?>

            <?php if($this->db_model->count_all('ticket', array('user_type'=>'User', 'status'=>'Open'))+$this->db_model->count_all('ticket', array('user_type'=>'User', 'status'=>'Customer Reply'))>0){ ?>
              <div class="alert alert-success" >
              You have Pending Support Ticket !!! Please <a href="<?php echo site_url('ticket/unsolved') ?>" style='color: blue;'> Click Here </a> to Resolve !!!
              </div>
              <?php } ?>
            

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
              <form action = "<?php echo base_url('main/variable') ?>" method = "POST">

              <?php echo form_open() ?>  

                <div class="form-group" style="margin-bottom: 0px;line-height: 23px;">
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
               <button class="btn btn-primary" type="submit" onclick="this.disabled=true;this.form.submit();">submit</button>  
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
<?php include 'includes_bottom.php' ?>
</body>
</html>

<?php } ?>