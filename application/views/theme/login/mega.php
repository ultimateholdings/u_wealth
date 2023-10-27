<!DOCTYPE html>
<html lang="en">
   <head>
    <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content=""> <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <meta name="author" content="">
      <meta name="viewport" content="width=device-width,initial-scale=1.0">
      <link rel="icon" href="<?php echo base_url();?>axxets/client/favicon.ico">
      <title><?php echo config_item('company_name') ?></title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
      <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
      <script src="https://use.fontawesome.com/f59bcd8580.js"></script>
   </head>
   <style>
    body{
    background: url(<?php echo base_url();?>axxets/mega/images/auth-bg/bg-5.jpg); 
    }
    @media only screen and (max-width: 417px) {
      .hover-warning{margin-left: 12px!important}.btn-group a.btn-sm{
    margin-left: 5px!important;
    width: 20px;padding: 0
    }
    .btn-sm i.fa{font-size: 5px;}}
    .typedtext {
    margin-top: 20px;
    margin-left: 20px;
    border-right: 2px solid black;
    animation:  800ms steps(44) infinite normal;
    height: 10px;
    margin-bottom: 55px;
    color: white;
    display: block;
     }

    @keyframes blinkTextCursor {
    from {
      border-right-color: transparent;
    }
    to {
      border-right-color: transparent;
    }
    }

    .btn-sm i.fa{font-size: 20px;}
    .btn-group a{  color: white;
    width: 40px;
    border-radius: 5px;
    font-size: 20px;
    margin:14px 14px;
    border-radius: 6px;
    font-size: 16px;
    cursor: pointer;
    background-color: DodgerBlue;
    box-shadow: 0 10px 15px rgba(0,0,0,0.3);
    }
    .social-container{width: 100%;
    display:inline-block; 
    text-align:center;
    padding:0 auto;
    }
    .social-container a:hover{box-shadow: 0 2px 5px rgba(0,0,0,0.3);
      text-decoration:none;}
    .social-container a {
      border: 1px solid #DDDDDD;
      box-shadow: 0 10px 15px rgba(0,0,0,0.3);  
      background-color: #d9e4f5;
      background-image: linear-gradient(315deg, #d9e4f5 0%, #f5e3e6 74%);
      border-radius: 50%;
      display: inline-flex;
      justify-content: center;
      align-items: center;
      margin: 0 5px;
      padding: 0 6px;
      height: 30px;
      width: 30px;
    }
    .form-style{
      margin-top:50px;
    }
    .form-style input{
      border:0;

      height:50px;
      border-radius:0;
    border-bottom:1px solid #ebebeb;  
    }
    .form-style input:focus{
    border-bottom:1px solid #007bff;  
    box-shadow:none;
    outline:0;
    background-color:#ebebeb; 
    }
    .sideline {
        display: flex;
        width: 100%;
        justify-content: center;
        align-items: center;
        text-align: center;
      color:#ccc;
    }
    button{
    height:50px;  
    }
    .h-p100{
        margin-top: 11%;
       }
    .sideline:before,
    .sideline:after {
        content: '';
        border-top: 1px solid #ebebeb;
        margin: 0 20px 0 0;
        flex: 1 0 20px;
    }.title {
    font-family: "Montserrat";
    text-align: center;
    color: #FFF;
   
    flex-direction: column;
   
    letter-spacing: 1px;
  }p {
    background-image: url(https://media.giphy.com/media/26BROrSHlmyzzHf3i/giphy.gif);
    background-size: cover;
    color: transparent;
    -moz-background-clip: text;
    -webkit-background-clip: text;
    text-transform: uppercase;
    font-size: 120px;
    line-height: .75;
    }

    .sideline:after {
        margin: 0 0 0 20px;
    }</style>

    <body>
    <div class="container">
     <div class="row m-5 no-gutters shadow-lg">
        <?php echo validation_errors('<div class="alert alert-light">', '</div>') ?>
        <?php echo $this->session->flashdata('site_flash') ?>
        <?php if((config_item('is_demo') == TRUE) || ($this->db_model->select('description', 'settings', array('type' => 'flag')) == 1)) {
                            echo '<div class="alert alert-light">'. config_item('announcement') . '</div>';
                        } ?>
            <div class="col-md-6 d-none d-md-block" >
                 <span style="margin: 20px 10px;">
                  <img src="<?php echo base_url();?>axxets/mega/images/stack-logo-dark.png" style="display: inline;" class="img-rounded"/>
                 </span>
                 <h4 style="color:;margin-left: 20px"> Welcome To Global MLM</h4>
                 <h2 class="typedtext"></h2>
                 <img  src="<?php echo base_url();?>axxets/mega/images/lady2.png" class="img-fluid" style="min-height:80%;min-width: 100%"/>
            </div>
            <div class="col-md-6 bg-white p-5">
                  <div class="d-lg-none d-md-none d-sm-block">
                   <span>
                    <img src="<?php echo base_url();?>axxets/mega/images/stack-logo-dark.png" style="display: inline;" class="img-rounded"/>
                   </span>
                   <h4> Welcome To Global MLM</h4>
                  </div>
                  <h3 class="pb-3">Login Form</h3>  
                  <div class="btn-group btn-group-sm w-100 mt-2" >
                   <a class="btn btn-sm" type="submit" href="#"  data-toggle="" data-placement="bottom" title=""><i class="fa fa-lock" ></i></a>
                   <a style="margin-left: 40px" data-toggle="modal" data-target="#" class="btn btn-sm" data-toggle="" data-placement="bottom" title=""><i class="fa fa-link" ></i></a> 
                   <a class="btn btn-sm" style="margin-left: 40px" data-toggle="" data-placement="top" title=""><i class="fa fa-envelope" ></i></a>
                  </div> 
                  <div class="form-style">
                     <?php echo form_open() ?>
                      <div class="form-group pb-3">    
                        <input type="number" placeholder="Email" id="user" onkeypress="return keyRestrict(event, &#39;1234567890&#39;)" name="username" class="form-control"  aria-describedby="emailHelp">   
                      </div>
                      <div class="form-group pb-3">   
                        <input type="password" placeholder="Password" name="password" id="password" class="form-control" >
                      </div>
                      <div class="row d-flex justify-content-between">
                         <div class="d-flex align-items-center"><input name="" type="checkbox"id="basic_checkbox_1" value="" /> 
                         <span class="pl-2 font-weight-bold">Remember Me</span> 
                         </div>
                         <div class="row d-flex align-items-center"><a data-toggle="modal" class="hover-warning" data-target="#resetpassword"   href="#">Forget Password?</a>
                         </div>
                      </div>
                      <div class="pb-2">
                        <button type="submit" class="btn btn-dark w-100 font-weight-bold mt-2">Submit</button>
                      </div>
                      <?php echo form_close() ?>  
                      <div class="sideline">OR</div>
         
                      <div class="pt-4 text-center">
                        Get Members Benefit. <a href="<?php echo site_url('site/register') ?>">Sign Up</a>
                      </div>
                      <div class="w-100 pt-4 text-center mt-2">
                         <div class="social-container">
                         <a href="#"><i class="fa fa-facebook " aria-hidden="true"></i></a>
                         <a href="#"><i class="fa fa-twitter fa-x" aria-hidden="true"></i></a>
                         <a href="#"><i class="fa fa-google-plus fa-x" aria-hidden="true"></i></a>
                         <a href="#"><i class="fa fa-linkedin fa-x" aria-hidden="true"></i></a>
                         <a href="#"><i class="fa fa-instagram fa-x" aria-hidden="true"></i></a>
                         </div>
                      </div>
                  </div>
             </div>
         </div>
     </div>

    <div class="modal" id="resetpassword" role="dialog">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Reset Your Password</h4>
              </div>
              <?php echo form_open('site/reset_password') ?>
              <div class="modal-body">
                  <div class="form-group">
                      <label>Userid</label>
                      <input type="number" class="form-control" name="userid" required onkeypress="return keyRestrict(event, &#39;1234567890&#39;)">
                      <br>
                      <?php if(config_item('sms_on_join')=='Yes'){ ?>
                      <label>Phone Number</label>
                      <input type="number" class="form-control" name="phone" onkeypress="return keyRestrict(event, &#39;1234567890&#39;)">
                      <br><span class="ortext" style="text-align: center;margin-left: 50%;">or</span><br>
                    <?php } ?>
                      <label>Email</label>
                      <input type="email" class="form-control" value="<?php echo set_value('email') ?>" id="email" name="email" placeholder="Registered Email">
                  </div>
              </div>
              <div class="modal-footer" style="display: flex;">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button class="btn btn-primary" type="submit">Reset Password</button>
              </div>
              <?php echo form_close() ?>
          </div>
      </div>
  </div>

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
  <script>
      $(document).ready(function () {
          $('[data-toggle="popover"]').popover({html: true, placement: "top"});
      });
  </script>
    <script type="text/javascript">
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })</script>
  <script type="text/javascript">
  /*
   * typingEffect()
   * It types an array of texts in a random order. I like random stuff🙃
   */
  function typingEffect() {
      const contactTexts = shuffleArray(['Looking for Custom MLM Software?😊', 'Get a Fully Customisable MLM Software!😄', 'Want to talk about an idea?', 'Just Contact us!🤗', 'We are at your service?👍']);
      const typedtext = document.getElementsByClassName("typedtext")[0];
      let removing = false;
      let idx = char = 0;

      setInterval(() => { // We define the interval of the typing speed

          // If we do not reach the limit, we insert characters in the html
          if (char < contactTexts[idx].length) typedtext.innerHTML += contactTexts[idx][char];

          // 15*150ms = time before starting to remove characters
          if (char == contactTexts[idx].length + 15) removing = true;

          // Removing characters, the last one always
          if (removing) typedtext.innerHTML = typedtext.innerHTML.substring(0, typedtext.innerHTML.length - 1);

          char++; // Next character

          // When there is nothing else to remove
          if (typedtext.innerHTML.length === 0) {

              // If we get to the end of the texts we start over
              if (idx === contactTexts.length - 1) idx = 0
              else idx++;

              char = 0; // Start the next text by the first character
              removing = false; // No more removing characters
          }

      }, 150); // Typing speed, 150 ms

  }
  typingEffect();
  function shuffleArray(array) {
      let currentIndex = array.length,
          temporaryValue, randomIndex;

      // While there remain elements to shuffle...
      while (0 !== currentIndex) {

          // Pick a remaining element...
          randomIndex = Math.floor(Math.random() * currentIndex);
          currentIndex -= 1;

          // And swap it with the current element.
          temporaryValue = array[currentIndex];
          array[currentIndex] = array[randomIndex];
          array[randomIndex] = temporaryValue;
      }

      return array;
  }
  </script>


  </body>
</html>