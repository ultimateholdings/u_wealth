<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Login Form Using HTML And CSS Only</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

<style type="text/css">
.register{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
    margin-top: 3%;
    padding: 2%;
}
.input-field i {
  text-align: center;
  line-height: 55px;
  color: #acacac;
  transition: 0.5s;
  font-size: 1.1rem;
}

.input-field input {
  background: none;
  outline: none;
  border: none;
  line-height: 1;
  font-weight: 600;
  font-size: 1.1rem;
  color: #333;
}

.input-field input::placeholder {
  color: #aaa;
  font-weight: 500;
}
.register-left{
    text-align: center;
    color: #fff;
    margin-top: 4%;
}
.wavy {
  position: relative;
  -webkit-box-reflect: below -12px linear-gradient(transparent, rgba(0, 0, 0, 0.2));
  display: inline;
  padding-left: 1px;
  text-transform: capitalize;
}
.register-left input{
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    width: 60%;
    background: #f8f9fa;
    font-weight: bold;
    color: #383d41;
    margin-top: 10%;
    margin-bottom: 3%;
    cursor: pointer;
}
.register-right{
    background: #f8f9fa;
    border-top-left-radius: 10% 50%;
    border-bottom-left-radius: 10% 50%;
    
}
.register-left img{
    margin-top: 15%;
    margin-bottom: 5%;
    width: 25%;
    -webkit-animation: mover 2s infinite  alternate;
    animation: mover 1s infinite  alternate;
}
@-webkit-keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
@keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
.register-left p{
    font-weight: lighter;
    padding: 12%;
    margin-top: -9%;
}
.register .register-form{
    padding: 10%;
    margin-top: 10%;
}
.btnRegister{
    float: right;
    margin-top: 10%;
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    background: #0062cc;
    color: #fff;
    font-weight: 600;
    width: 50%;
    cursor: pointer;
}
.register .nav-tabs{
    margin-top: 3%;
    border: none;
    background: #0062cc;
    border-radius: 1.5rem;
    width: 28%;
    float: right;
}
.register .nav-tabs .nav-link{
    padding: 2%;
    height: 34px;
    font-weight: 600;
    color: #fff;
    border-top-right-radius: 1.5rem;
    border-bottom-right-radius: 1.5rem;
}
.register .nav-tabs .nav-link:hover{
    border: none;
}
.register .nav-tabs .nav-link.active{
    width: 100px;
    color: #0062cc;
    border: 2px solid #0062cc;
    border-top-left-radius: 1.5rem;
    border-bottom-left-radius: 1.5rem;
}
.register-heading{

    position: relative;
    -webkit-box-reflect: below -12px linear-gradient(transparent, rgba(0, 0, 0, 0.2));
    
   
    text-transform: capitalize;

    text-align: center;
    margin-top: 8%;
    margin-bottom: -15%;
    color: #00bcd4;
}
.register-heading span {
  position: relative;
  display: inline-block;
  color: #00bcd4;
  font-weight: bold;
 
  text-transform: uppercase;
  animation: animate 1.5s ease-in-out infinite;
  animation-delay: calc(.1s * var(--i));
  letter-spacing: -4px;
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
      </style>
     <body>

    <?php echo form_open() ?>
    

    <div id="load" style="display:none !important;" align="center">
        <img src="<?php echo site_url('uploads/load.gif') ?>">
        <h3 style="color:lightseagreen">Redirecting...</h3>
    </div>

 <div class="container-fluid register">
    <div class="row">
           <div class="col-md-4 register-left"><span><?php if((config_item('is_demo') == TRUE) || ($this->db_model->select('description', 'settings', array('type' => 'flag')) == 1))  {
                    echo '<div class="alert alert-danger">'. config_item('announcement') . '</div>';
                } ?>  <?php echo validation_errors('<div class="alert alert-danger">', '</div>') ?>
             <?php echo $this->session->flashdata('site_flash') ?></span>
             <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/> 
             <a href="<?php echo site_url('/') ?>"   style="padding-top: 0px;">
             <img src="<?php echo site_url('/uploads/site_img/logo-light-text.png') ?>" height="20" width="400" alt="logo"/></a>
             <h3>Welcome</h3>
             <p>Good to know you are interested Please register!</p>
             <input type="submit" name="" value="Get Started"/><br/>
          </div>
          <div class="col-md-8 register-right">
            <div class="tab-content" id="myTabContent">
             <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <h3 class="register-heading">
                                <span style="--i:1;">L</span>
                                <span style="--i:2;">o</span>
                                <span style="--i:3;">g</span>
                                <span style="--i:4;">i</span>
                                <span style="--i:5;">N</span>
                                <span style="--i:6;"></span>
                                <span style="--i:7;">N</span>
                                <span style="--i:8;">o</span>
                                <span style="--i:9;">w</span>
                       
                              </h3>  
                </div>
                <div class="row register-form">        
                            <div class="form-group col-sm-12">
                                <label for="name" class="control-label">User Id* </label>
                                <input type="number" required class="form-control" id="user" name="username" onkeypress="return keyRestrict(event, &#39;1234567890&#39;)"> 
                              </div>
                            
                              <div class="form-group col-sm-12">
                                    <label for="password" class="control-label">Password*</label>
                                    <!--<input type="password" class="form-control" value="<?php echo set_value('password') ?>" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}" title="Must contain at least one number and one uppercase and lowercase letter and special character, and at least 8 or more  and less than 15 characters"required>-->
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password" >
                                </div>
                              
                               
                                <div class="form-group col-sm-12">
                                    <button class="btn btn-primary" type="submit">Login</button>
                                </div>
                                <div class="col-6 text-left">
                                 <a href="#" data-toggle="modal" data-target="#resetpassword" class="text-blue hover-warning"><i class="ion ion-locked"></i> <span>Forgot Password?</span></a><br>
                               </div>
                               <div class="form-group col-sm-12" align="center" style="color:black;margin-top: 20px;">
                             <?php echo footer_note(); ?>
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
                    <input type="number" class="form-control" name="userid" onkeypress="return keyRestrict(event, &#39;1234567890&#39;)">
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
</div>


    </body>


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
    </html>
