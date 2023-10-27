<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo config_item('company_name') ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta name="description" content=""/>
        <meta name="Author" content="Global MLM Software">
        <link rel='icon' href="<?php echo get_logo()['favicon']; ?>" type='image/x-icon'/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('axxets/shop/css/register.css') ?>">
        <script src="<?php echo base_url('axxets/shop/js/register.js') ?>"></script>   
    </head>
    <style type="text/css">
        @media only screen and (max-width: 400px) {
        .form-group a{margin-left: 1px!important}}
        @media only screen and (min-width: 900px) {
        .container.shadow{align-self:  right!important}}
    </style>
<body>
 <div> 
      <nav class="navbar navbar-expand-lg navbar-light bg-light shadow p-3 mb-5 bg-white rounded">
             <div class="container">
               <a class="navbar-brand" href="<?php echo site_url('/') ?>"><img src="<?php echo get_logo()['lg_dark_logo']; ?>"width="160" height="40" alt="logo" class="logo-default"/></a>
               <form class="form-inline my-2 my-lg-0">
                 <select class="form-control mr-2 drop mb-2" style="border: none;">
                  <option >English</option>
                  <option>French</option>
                  <option>Hindi</option>
                  <option>Japanese</option>
                  <option>Russian</option>
                </select>
                <a href="<?php echo site_url('site/register')?>"><button type="button" class="btn" style="background-color: DodgerBlue;color: white;width: 100px;">Register</button></a>
              </form>
           </div>
    </nav>
    <div class="row" id="divElement">
        <div class="col-4 d-none d-sm-block" >
            <div class="image">
                <div class="text-center">
                    <h1 class="mt" style="color: white;"><span style="font-weight: 100">Lets Get</span> Started</h1>
                   
                    <a href="<?php echo site_url('site/login')?>" ><button type="button" class="btn" style="background-color: DodgerBlue;color: white;width: 150px;height: 50px">Login &nbsp; <i class="fas fa-user"></i></button></a>
                </div>
            </div>
       </div>

       <div class="col-12 col-sm-8" >
          <div class="container" style="font-weight: 600;">
            <div class="row mr-5" >

             <?php echo form_open() ?>
             <h2 align="center" style="text-transform: none;">Member Access</h2><p>&nbsp;</p>
             <div class="container bg-white shadow" align="center">
                <div class="row" style="width: 75%; text-align: left">
                    <div class="form-group col-sm-12">
                            
                    <?php echo $this->session->flashdata('site_flash') ?>
                    <?php if((config_item('is_demo') == TRUE) || ($this->db_model->select('description', 'settings', array('type' => 'flag')) == 1)) {
                        echo '<div class="alert alert-danger">'. config_item('announcement') . '</div>';
                    } ?>
                        <label for="user" class="control-label">ID</label>
                        <input type="number" required class="form-control" id="user" name="username" onkeypress="return keyRestrict(event, &#39;1234567890&#39;)">
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="password" class="control-label">Password*</label>
                        <input type="password" required class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group col-sm-12">
                        <button class="btn btn-success" >Login</button><a href="#" data-toggle="modal" align="right" data-target="#resetpassword" style="color: blue;margin-left: 80px">Forgot Password ?</a>
                       <!-- <p><a align="left" href="<?php echo site_url('/') ?>">Go to Home page</a></p>-->   
                    </div>
                    <div class="form-group col-sm-12" align="center" style="color:black;margin-top: 20px;">
                    <?php echo footer_note(); ?>
                    </div>
                </div>
            </div>
            <?php echo form_close() ?>
           </div>
       </div>
      </div>
     </div>
    </div>
    <footer class="page-footer font-small bg-dark"  style="width: 100%; size: 30%; padding-top: 10px; padding: 25px 0px 0px;">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-lg-3">
                    <h5 style="color: #a5a5a5;">QUICK LINKS</h5>
                    <ul class="list-unstyled mt-4">
                                <li class="mb-1"><a href="#" style="color: #a5a5a5;">Home</a></li>
                                <li class="mb-1"><a href="#" style="color: #a5a5a5;">Media</a></li>
                                <li class="mb-1"><a href="#" style="color: #a5a5a5;">Plans</a></li>
                                <li class="mb-1"><a href="#" style="color: #a5a5a5;">Opportunities</a></li>
                                <li class="mb-1"><a href="#" style="color: #a5a5a5;">Trading</a></li>
                                <li class="mb-1"><a href="#" style="color: #a5a5a5;">Company news</a></li>
                                <li class="mb-1"><a href="#" style="color: #a5a5a5;">Contact</a></li>
                    </ul>
                </div>
                <div class="col-12 col-lg-3">
                    <h5 style="color: #a5a5a5;">NIOREV TRADING</h5>
                    <ul class="list-unstyled mt-4">
                                <li class="mb-1"><a href="#" style="color: #a5a5a5;">FOREX</a></li>
                                <li class="mb-1"><a href="#" style="color: #a5a5a5;">CFD</a></li>
                                <li class="mb-1"><a href="#" style="color: #a5a5a5;">cryptocurrencies</a></li>
                                <li class="mb-1"><a href="#" style="color: #a5a5a5;">Indices</a></li>
                                <li class="mb-1"><a href="#" style="color: #a5a5a5;">share CFD's</a></li>
                                <li class="mb-1"><a href="#" style="color: #a5a5a5;">Market Analysis</a></li>
                                <li class="mb-1"><a href="#" style="color: #a5a5a5;">Education</a></li>
                    </ul>
                </div>
                <div class="col-12 col-lg-3">
                    <h5 style="color: #a5a5a5;">LEGAL</h5>
                    <ul class="list-unstyled mt-4">
                                <li class="mb-1"><a href="#" style="color: #a5a5a5;">Terms of Services</a></li>
                                <li class="mb-1"><a href="#" style="color: #a5a5a5;">Privacy Policy</a></li>
                                <li class="mb-1"><a href="#" style="color: #a5a5a5;">Anti-spam Policy</a></li>
                                <li class="mb-1"><a href="#" style="color: #a5a5a5;">Cookie Policy</a></li>
                    </ul>
                </div>
                <div class="col-12 col-lg-3">
                    <h5 style="color: #a5a5a5;">CONTACT</h5>
                    <ul class="list-unstyled mt-4">
                                <li class="mb-1"><a href="#" style="color: #a5a5a5;">Email: info@globalmlmsolution.com</a></li>
                                <li class="style"><a href="" style="font-size: 40px;color: white;"><i class="fab fa-facebook"></i></a></li>
                                <li class="style" style="margin-left: 20px;"><a href="" style="font-size: 40px;color: white;"><i class="fab fa-twitter"></i></a></li>
                                <li class="style" style="margin-left: 20px;"><a href="" style="font-size: 40px;color: white;"><i class="fab fa-instagram"></i></a></li>
                                <li class="style" style="margin-left: 20px;"><a href="" style="font-size: 40px;color: white;"><i class="fab fa-behance"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
        <div class="modal" id="resetpassword" role="dialog">
            <div class="modal-dialog modal-dialog-centered ">
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Reset Password</button>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>

    <script src="<?php echo base_url('axxets/base/js/jquery_v3.2.1.min.js') ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('axxets/base/js/bootstrap_v3.3.7.min.js') ?>" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo site_url('axxets/login/particles.js') ?>"></script>
    <script type="text/javascript" src="<?php echo site_url('axxets/login/app.js') ?>"></script>
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
</body>
</html>