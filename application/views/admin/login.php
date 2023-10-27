<?php 
$logo = file_exists(FCPATH .'axxets/client/logo_light.png') ? base_url().'axxets/client/logo_light.png' : base_url().'uploads/site_img/logo-light-text.png';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Management Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel='icon' href="<?php echo base_url();?>axxets/client/favicon.ico" type='image/x-icon'/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('axxets/base/css/bootstrap_v3.3.7.min.css') ?>">
    <script src="<?php echo base_url('axxets/base/js/jquery_v3.2.1.min.js') ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('axxets/base/js/bootstrap_v3.3.7.min.js') ?>" type="text/javascript"></script>
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <style type="text/css">
        body
        {
            background:  url('<?php echo base_url();?>uploads/site_img/auth-bg/<?php echo config_item('admin_login_theme');?>') ;
            -webkit-background-size: cover;
            -moz-background-size:    cover;
            -o-background-size:      cover;
            background-size:         cover;
        }
        .panel-default
        {
            opacity:    0.9;
            margin-top: 30px;
        }
        .form-group.last
        {
            margin-bottom: 0px;
        }
    </style>
</head>
<body>
    <div id="particles-js" style="margin-top: 5%">
        <div class="container" align="center" style="padding-right: 4%; padding-top: 1%">
        <a href="<?php echo base_url('/') ?>" ><img src="<?php echo $logo; ?>" width="200" height="75" alt="logo" class="logo-default"/></a>
        </div>
    </div>
<div class="container" style="margin-top: -45%">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <?php echo validation_errors('<div class="alert alert-danger">', '</div>') ?>
        <?php echo $this->session->flashdata('admin_flash') ?>
        <?php if((config_item('is_demo') == TRUE) || ($this->db_model->select('description', 'settings', array('type' => 'flag')) == 1)) {
            echo "<div class='alert alert-danger' style='text-align:center;'>". config_item('announcement') . '</div>';
        } ?>
            <div class="panel panel-default">
                <div class="panel-heading"><strong><span class="glyphicon glyphicon-lock"></span> Management Login</strong>
                </div>
                <div class="panel-body">
                    <?php echo form_open('site/admin', array('class' => 'form-horizontal')) ?>
                    <div class="form-group">
                        <label for="user" class="col-sm-3 control-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="user" name="username" placeholder="Username" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pass" class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="pass" name="password" placeholder="Password"
                                   required="">
                        </div>
                    </div>
                    <div class="form-group last">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" class="btn btn-success btn-sm">Sign in</button>
                            <button type="reset" class="btn btn-default btn-sm">Clear</button>
                        </div>
                    </div>
                    <?php echo form_close() ?>
                </div>
                <div class="panel-footer"><!--<a href="#" data-toggle="modal" data-target="#myModal">Forgot Password ?</a>-->
                </div>
                <div style="padding: 10px; font-size: 11px; text-align: right">
                    Copyright &copy; <?php echo config_item('company_name') ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Reset your password</h4>
            </div>
            <div class="modal-body">
                <p>
                    <?php echo form_open('site/admin_forget') ?>
                <div class="form-group">
                    <label>Enter Username/Email</label>
                    <input type="text" class="form-control" name="user">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Reset Password</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</div>
<script src="<?php echo base_url('axxets/base/js/jquery_v3.2.1.min.js') ?>" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo site_url('axxets/login/particles.js') ?>"></script>
<script type="text/javascript" src="<?php echo site_url('axxets/login/app.js') ?>"></script>


<?php if((config_item('login_default')=='Yes') || (strpos($_SERVER['HTTP_HOST'], 'globalmlmsolution.com') !== false) || (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false)){ ?>
<script>
    $(document).ready(function () {
            $('#user').val('test@admin');
             $('#pass').val('Admin@123');
    });
</script>
<?php } ?>

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

$(':text').bind('copy paste', function (e) {
        e.preventDefault();
});

</script>

</body>
</html>
