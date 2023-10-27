<?php 
$user_id = $this->session->user_id;
$_SESSION['page'] = $page;
$logo = file_exists(FCPATH .'axxets/client/logo_dark.png') ? base_url().'axxets/client/logo_dark.png' : base_url().'uploads/site_img/logo-dark-text.png';
?>

<header>
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:#126185;font-weight: bold;padding: 0px !important">
      <a class="navbar-brand mr-auto" href="<?php echo site_url();?>">
            <img class="img-fluid" style="height:40px;width: 200px;" src="<?php echo $logo;?>">
        </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapse_Navbar">
            <span  class="navbar-toggler-icon" style="border: none;"></span>
          </button>
          <div class="collapse navbar-collapse" id="collapse_Navbar">
            <ul class="navbar-nav ml-auto" style="margin-right: 30px;">
            <li class="nav-item">
                  <a class="nav-link " href="<?php echo site_url('insurance')?>" style="color:#ff7400  !important;"><i class="fa fa-home" style="color: #ff7400;padding-left:9px;"></i><br>Home</a>&nbsp;
            </li>
            <li class="nav-item" >
              <a class="nav-link" href="<?php echo site_url('insurance/twowheeler')?>" style="color: #ff7400 !important;"><i class="fa fa-motorcycle" style="color: #ff7400;padding-left:22px;"></i><br>Two Wheeler</a>
            </li>
            <li class="nav-item" >
              <a class="nav-link n" href="<?php echo site_url('insurance/fourwheeler')?>" style="color: #ff7400 !important;"><i class="fa fa-car" style="color: #ff7400;padding-left:23px;"></i><br>Four Wheeler</a>
            </li>
            <li class="nav-item" >
              <a class="nav-link n" href="<?php echo site_url('healthInsurance/home')?>" style="color: #ff7400 !important;"><i class="fa fa-medkit" style="color: #ff7400;padding-left:36px;"></i><br>Health Insurance</a>
            </li>
            <?php if(!$user_id){ ?>
            <li class="nav-item" >
              <a data-toggle='modal' data-target='#myModal' class="nav-link n"  style="color: #ff7400 !important;"><i class="fa fa-sign-in" style="color: #ff7400;padding-left:8px;"></i><br>Login</a>
            </li>
            <li class="nav-item" >
              <a class="nav-link n" href="<?php echo site_url('site/register')?>" style="color: #ff7400 !important;"><i class="fa fa-registered" style="color: #ff7400;padding-left:8px;"></i><br>Register</a>
            </li>
            <?php } else { ?>
              <li class="nav-item" >
              <a class="nav-link n" href="<?php echo site_url('member/logout')?>" style="color: #ff7400 !important;"><i class="fa fa-sign-in" style="color: #ff7400;padding-left:8px;"></i><br>Logout</a>
            </li>
            <li class="nav-item" >
              <a class="nav-link n" href="<?php echo site_url('member')?>" style="color: #ff7400 !important;"><i class="fa fa-user" style="color: #ff7400;padding-left:15px;"></i><br>My Account</a>
            </li>
          <?php } ?>
            
        </ul>
         <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
      </div>
    </nav>
  </div>

  <div class="col-lg-12 sub" style="display: none">
    <img src="http://insurence.travelcreditmaster.com/health-images/tmc.png">
  </div>

  <div class='modal fade' id='myModal'>
  <div class='modal-dialog modal-lg'>
    <div class='modal-content'>
      <!-- Modal Header -->
      <div class='modal-header'>
        <h3 class='modal-title' style="color: #126185;">Login/Register</h3>
        <button type='button' data-dismiss='modal' class="close">&times;</button>
      </div>
      <!-- Modal body -->
      <br>
      <div class='modal-body'>
          
          <div class="row">

            <div class='form-group col-sm-6'>
              <!--<label for='user' class='control-label'>ID</label>-->

              <input type='text' required class='form-control' id='user' name='username' placeholder="ID" >
            </div>
            <div class='form-group col-sm-6'>
              <!--<label for='password' class='control-label'>Password*</label>-->
              <input type='password' required class='form-control' id='password' name='password' placeholder="Password">
            </div>
            <!--<div class="col-sm-auto">
              <div class="form-check">
                <input class="form-check-input" type="checkbox">
                <label class="form-check-label"> Remember me</label>
              </div>
            </div>
          </div>-->
          <br>
          <div class='form-group text-center'>
            <button class='btn btn-success'>Login<!--<a href="<?php echo site_url('insurance')?>"></a>--></button> &nbsp;
            <button class='btn btn-success' style='background:blue;'><a href='<?php echo site_url('site/register') ?>' style='color:white;'>Register</a></button>&nbsp;
            <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <a style="display:none;" href='#' data-toggle='modal' data-target='#resetpassword' style='color: blue;'>Forgot Password ?</a>
          </div>
          <?php echo form_close(); ?>
      </div>
      <!-- Modal footer -->
    <!--  <div class='modal-footer'>
        <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
      </div>-->
    </div>
  </div>
</div>

  <div class="col-lg-12 sub" style="display: none">
    <img src="http://insurence.travelcreditmaster.com/health-images/tmc.png">
  </div>

</header>
