<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Management Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
    <script src="<?php echo base_url('axxets/base/js/jquery_v3.2.1.min.js') ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('axxets/base/js/bootstrap_v3.3.7.min.js') ?>" type="text/javascript"></script>
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <style type="text/css">
        body
        {
            background:  #1b8edb;
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
<div class="container">
    <div class="row">
        <?php echo validation_errors('<div class="alert alert-danger">', '</div>') ?>
        <?php echo $this->session->flashdata('admin_flash') ?>
        <div class="col-md-4 col-md-offset-7">
            <div class="panel panel-default">
                <div class="panel-heading"><strong><span class="glyphicon glyphicon-lock"></span> Employee Login</strong>

                </div>
                <div class="panel-body">
                    <?php echo form_open('site/staff', array('class' => 'form-horizontal')) ?>
                    <div class="form-group">
                        <label for="user" class="col-sm-3 control-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="user" name="username" placeholder="Username"
                                   required="">
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
                <div class="panel-footer" style="display: none;"><a style="display:none;" href="#" data-toggle="modal" data-target="#myModal">Forgot Password ?</a>
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
