<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo 'https://www.karthikeyaschool.com/schoolsoftware/uploads/system/logo/logo-dark.png' //$this->settings_model->get_favicon(); ?>">

    <!-- App css -->
    <link href="<?php echo base_url(); ?>assets/backend/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/backend/css/app.min.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url(); ?>assets/backend/css/style.css" rel="stylesheet" type="text/css" />
	
	
	<link href="<?php echo base_url(); ?>axxets/templates/school/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>axxets/templates/school/css/app.min.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url(); ?>axxets/templates/school/css/app.css" rel="stylesheet" type="text/css" />

    <!--Notify for ajax-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://js.stripe.com/v3/"></script>
     <script
    src="https://www.paypal.com/sdk/js?client-id=<?=$settings[0]['paypal_client_id_sandbox']?>"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
  </script>
  <style>
      .select2-container--default .select2-selection--single{
        padding:6px;
        height: 37px;
        width: 380px; 
        font-size: 1.2em;  
        position: relative;
    }
  </style>
</head>

<body class="auth-fluid-pages pb-0">

    <div class="auth-fluid">
        <!--Auth fluid left content -->
        <div class="auth-fluid-form-box">
            <div class="align-items-center d-flex h-40">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="text-center text-lg-center mb-3">
                        <a href="<?php echo site_url(); ?>">
                            <span><img src="https://www.karthikeyaschool.com/schoolsoftware/uploads/system/logo/logo-dark.png" alt="" height="80"></span>
                        </a>
                    </div>
                    <br/><br/><br/>
                    <!-- title-->
                    <?php if(($this->session->flashdata('msg'))): ?>
                        <div class="alert alert-success alert-dismissible">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Success!</strong> <?=$this->session->flashdata('msg')?>
                        </div>
                    <?php endif; ?>
                    <?php if(($this->session->flashdata('error'))): ?>
                        <div class="alert alert-danger alert-dismissible">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Error!</strong> <?=$this->session->flashdata('error');?>
                        </div>
                    <?php endif; ?>
                    <div class="alert alert-success">Please Choose the Payment Gateway</div>
                    <div>
                        <img style='vertical-align:middle;' src='https://www.karthikeyaschool.com/schoolsoftware/uploads/system/logo/axisbank.jpg' height="100">
                        <span style="vertical-align:middle">
                        <!-- form -->
                        <form style="margin-left:55%;margin-top:-20%;" name="Formdata" id="Formdata" method="POST" action="https://easypay.axisbank.co.in/index.php/api/payment" >
        				    <textarea name="i" id="i" style="display: none;"><?php echo $axis_checksum; ?></textarea>
        				    <input class="btn btn-primary" type="submit" value="Select" style="width:70%;" >       
    				    </form>
                        <!-- end form-->
                        </span>
                    </div>
                </div> <!-- end .card-body -->
            </div> <!-- end .align-items-center.d-flex.h-100-->
        </div>
        <!-- end auth-fluid-form-box-->

        <!-- Auth fluid right content -->
<!-- end Auth fluid right content -->
</div>
<!-- end auth-fluid-->


<!-- App js -->
<script src="<?php echo base_url(); ?>axxets/templates/school/js/app.min.js"></script>
<script src="<?php echo base_url(); ?>axxets/templates/school/js/jquery.min.js"></script>

<!--Notify for ajax-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<?php if ($this->session->flashdata('info_message') != ""):?>
    <script type="text/javascript">
    $.NotificationApp.send("<?php echo get_phrase('success'); ?>!", '<?php echo $this->session->flashdata("info_message");?>' ,"top-right","rgba(0,0,0,0.2)","info");
</script>
<?php endif;?>

<?php if ($this->session->flashdata('error_message') != ""):?>
    <script type="text/javascript">
    $.NotificationApp.send("<?php echo get_phrase('oh_snap'); ?>!", '<?php echo $this->session->flashdata("error_message");?>' ,"top-right","rgba(0,0,0,0.2)","error");
</script>
<?php endif;?>

<?php if ($this->session->flashdata('flash_message') != ""):?>
    <script type="text/javascript">
    $.NotificationApp.send("<?php echo get_phrase('congratulations'); ?>!", '<?php echo $this->session->flashdata("flash_message");?>' ,"top-right","rgba(0,0,0,0.2)","success");
</script>
<?php endif;?>

</body>

</html>
