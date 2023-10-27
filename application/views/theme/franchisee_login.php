<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo config_item('company_name') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel='icon' href="<?php echo base_url();?>axxets/client/favicon.ico" type='image/x-icon'/>
    <meta name="description" content=""/>
    <!-- css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('axxets/base/css/bootstrap_v3.3.7.min.css') ?>">
    <link href="<?php echo base_url('axxets/site/default/css/style.css') ?>" rel="stylesheet"/> 
    <link rel="stylesheet" href="<?php echo base_url('axxets/base/css/font-awesome_v4.7.0.min.css') ?>">
    <script src="<?php echo base_url('axxets/base/js/jquery_v3.2.1.min.js') ?>" type="text/javascript"></script> 
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <style type="text/css">

        * {
            margin: 0px;
            padding: 0px;
        }

        body {
          margin: 0;
          padding: 0;
          font-family: "Courier New", Courier, monospace;
          background: linear-gradient(89deg, #FF5EDF 0%, #04C8DE 100%); /* w3c */
          color: black;
        }

        a {
            color: black;
        }

        #divElement{
            margin-top: -45%;
        }​

        #particles-js {
            position: absolute;
            z-index: -1;
        }

    </style>
</head>

<body>
    <div id="particles-js" style="margin-top: 5%;">
        <div class="container" align="center" style="padding-right: 4%;">
        <a href="<?php echo base_url('/') ?>"><img src="<?php echo base_url();?>axxets/client/logo.png" width="200" height="35" alt="logo" class="logo-default"/></a>
        </div>
    </div>
    <div id="divElement">
        <?php echo form_open() ?>
        <h2 align="center" style="text-transform: none;">Franchisee Login</h2><p>&nbsp;</p>
        <div class="container" align="center">
            <div class="row" style="max-width: 400px; text-align: left">
                <?php echo validation_errors('<div class="alert alert-danger">', '</div>') ?>
                <?php echo $this->session->flashdata('site_flash') ?>
                <?php if((config_item('is_demo') == TRUE) || ($this->db_model->select('description', 'settings', array('type' => 'flag')) == 1)) {
                    echo '<div class="alert alert-danger">'. config_item('announcement') . '</div>';
                } ?>
                <div class="form-group col-sm-12">
                    <label for="user" class="control-label">Username</label>
                    <input type="text" required class="form-control" id="user" name="username" >
                </div>
                <div class="form-group col-sm-12">
                    <label for="password" class="control-label">Password*</label>
                    <input type="password" required class="form-control" id="password" name="password">
                </div>
                <div class="form-group col-sm-12">
                    <button class="btn btn-success" >Login</button>
                    <a href="#" data-toggle="modal" data-target="#resetpassword" style="color: blue;">Forgot Password ?</a>
                </div>
                
            </div>
        </div>
        <?php echo form_close() ?>
    </div>

    <div class="modal fade" id="resetpassword" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Reset Your Password</h4>
                </div>
                <div class="modal-body">
                    <p>
                    <?php echo form_open('site/franchisee_reset') ?>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="userid" required>
                        <label>Phone Number</label>
                        <input type="number" class="form-control" name="phone" required onkeypress="return keyRestrict(event, &#39;1234567890&#39;)">
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

<script src="<?php echo base_url('axxets/base/js/bootstrap_v3.3.7.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('axxets/base/js/jquery_v3.2.1.min.js') ?>" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo site_url('axxets/login/particles.js') ?>"></script>
<script type="text/javascript" src="<?php echo site_url('axxets/login/app.js') ?>"></script>

<script type="text/javascript">
    $(':text').keypress(function (e) {
    var regex = new RegExp("^[a-zA-Z0-9#\@.]+$");
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
