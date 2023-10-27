	<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script> 

    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('axxets/mega/css/mega_next.css') ?>">
    
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
    <div class="container">
      <?php echo validation_errors('<div class="alert alert-light">', '</div>') ?>
        <?php echo $this->session->flashdata('site_flash') ?>
        <?php if((config_item('is_demo') == TRUE) || ($this->db_model->select('description', 'settings', array('type' => 'flag')) == 1)) {
                            echo '<div class="alert alert-light">'. config_item('announcement') . '</div>';
                        } ?>
      <div class="forms-container">

        <div class="signin-signup">
            <?php echo form_open() ?>
          <form action="#" class="sign-in-form">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
         <input type="number" required class="form-control" id="user" name="username" onkeypress="return keyRestrict(event, &#39;1234567890&#39;)">
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
            <input type="password" required class="form-control" id="password" name="password">
            </div>
            <button type="submit" style="background-color: #e59514;color: white; width: 100px;height: 43px;" class="btn btn-danger btn-rounded m-3">LOGIN</button>
            <p class="social-text">Or Sign in with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
            <?php echo form_close() ?>
        
<!--form action="#" class="sign-up-form">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" />
            </div>
            <input type="submit" class="btn" value="Sign up" />
            <p class="social-text">Or Sign up with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>-->
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              Click to below to register
            </p>
           <!-- <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>-->
            <a class="btn transparent" href="<?php echo site_url('site/register') ?>" id="sign-up-btn">Sign Up</a>
          </div>
          
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Already have an Account ?</h3>
            <p>
              Please login
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
         
        </div>
      </div>
    </div>
<script src="<?php echo base_url('axxets/mega/js/mega_next.js') ?>"></script>
 
<script src="<?php echo base_url('axxets/base/js/jquery_v3.2.1.min.js') ?>" type="text/javascript"></script>

  <script>
      $(document).ready(function () {
          var server = '<?php echo $_SERVER['HTTP_HOST']; ?>';        
          var flag = '<?php echo config_item('login_default'); ?>'; 
          if(server.includes("globalmlmsolution.com") || server.includes("localhost") || (flag=='Yes')){
              $('#user').val('1001');
              $('#password').val('Password@123');
          }
      });
  </script>


  <script type="text/javascript">

  $(':text').keypress(function (e) {
  var regex = new RegExp("^[a-zA-Z0-9\@.]+$");
  var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
  if (regex.test(str)) {
      return true;
  }

  e.preventDefault();
  return false;
  });

  function keyRestrict(e,validchars) {
      var key='', keychar='';
      key = getKeyCode(e);
      if (key == null) return true;
      keychar = String.fromCharCode(key);
      keychar = keychar.toLowerCase();
      validchars = validchars.toLowerCase();
      if (validchars.indexOf(keychar) != -1)
      return true;
      if ( key==null || key==0 || key==8 || key==9 || key==13 || key==27 )
      return true;
      return false;
  }

  function getKeyCode(e) {
      if (window.event)
      return window.event.keyCode;
      else if (e)
      return e.which;
      else
      return null;
  }

  $(':text').bind('copy paste', function (e) {
          e.preventDefault();
  });

  </script>
  <script type="text/javascript">
    const sign_in_btn = document.querySelector("#sign-in-btn");
    const sign_up_btn = document.querySelector("#sign-up-btn");
    const container = document.querySelector("form");

    sign_up_btn.addEventListener("click", () => {
     container.classList.remove("sign-in-form");
     container.classList.add("sign-up-mode");

     });

    sign_in_btn.addEventListener("click", () => {
     container.classList.remove("sign-up-mode");
   });
  </script>
  </body>
</html>