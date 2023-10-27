<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">    
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <style type="text/css">
        .first{
            height: 738px;
            background: linear-gradient(0deg, rgba(51, 204, 204, 1) 0%, rgba(0, 0, 122, 1) 100%);
        }
        .company{
            color: white!important;
        }
        
        .about{
            color: white;
        }

        .login{

        }

        .second{
           height: 738px; 
        }

        .btn{
            width:100%;
            background-color: rgb(51, 204, 204); 
            color: white;
        }
        a{
        	text-decoration: none;
        	text-align: center;
        
        }
    </style>
</head>
<body>
    <div class="row">
        <div class="col-lg-6">
            <div class="d-none d-lg-block">
            <div class="first">
                <div class="container-fluid">
                    <div class="row pt-5">
                        <div class="col-md-6">
                            <h2 class="pt-5 company">Ultimate Wealth</h2>
                            <p class="about pt-4">Ultimate Wealth: Helping millions of people to attain healthy, financially free and comfortable lives.</p>
                        </div>
                        <div class="col-md-6">
                            <img src="https://server.globalmlmsolution.in:8090/static/images/cyberpanel-banner-graphics.png" style="height: auto; width: auto;">
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="container h-p100">
                <div class="row second align-items-center justify-content-md-center h-p100">
                    <div class="col-md-3 col-12"></div>
                    <div class="col-md-6 col-12 login">
                        <img src="<?= base_url('axxets/ultimate.png')?>" style="margin-left: 18%;width: 200px;">
                                            <?php echo form_open() ?>
                        <div class="input-group mb-3 mt-5">
                              <?php echo $this->session->flashdata('site_flash') ?>
                              <?php if((config_item('is_demo') == TRUE) || ($this->db_model->select('description', 'settings', array('type' => 'flag')) == 1)) 
                                {
                                 echo '<div class="alert alert-danger">'. config_item('announcement') . '</div>';
                                 } ?>
                        
                          <input type="number" required class="form-control" id="user" name="username"  aria-describedby="basic-addon2" placeholder="UserID" onkeypress="return keyRestrict(event, &#39;1234567890&#39;)">
                          <span class="input-group-text" id="basic-addon2" style="width:12%"><i class="fa-solid fa-id-card"></i></span>

                        </div>
                        <div class="input-group mb-3">

                          <input type="password" required class="form-control" aria-describedby="basic-addon2" placeholder="Password" id="password" name="password">

                          <span class="input-group-text" id="basic-addon2" style="width:12%"><i class="fa-solid fa-lock"></i></span>

                        </div>
                        <input class="btn mb-2" type="submit" value="Login"> </br>
                                            <?php echo form_close() ?>

                        <a href="#" data-toggle="modal" data-target="#resetpassword" style="color: blue;">Forgot Password ?</a>
                        <a href="<?php echo site_url('site/register') ?>">Register</a><br/>
                        <a href="<?php echo site_url('/') ?>">Go to Home page</a><br/> 
                        <div class="form-group col-sm-12" style="margin-top: 20px; text-align: center;"><?php echo footer_note(); ?>
                        </div>

                         <?php echo form_close() ?>
                         
    </div>
    <div class="modal" id="resetpassword" role="dialog">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center">Reset Your Password</h4>
                </div>
                <?php echo form_open('site/reset_password') ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label>User ID</label>
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

                    <div class="col-md-3 col-12"></div>    
                </div>    
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