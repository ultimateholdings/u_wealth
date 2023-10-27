<h2 align="center" style="color: green">Registration is Completed !</h2>
<div class="container">
    <?php echo $this->session->flashdata('site_flash') ?>
    <div class="row">
        Dear <?php echo $this->session->_name_ ?>,<br/>
        congratulation on your first step towards a rewarding career. We <?php echo config_item('company_name') ?> team
        cordially invite you to our home, where you can sell your products and enhance your business.
        <hr/>
        
        <strong>Vendor ID :</strong> <?php echo config_item('ID_EXT') . $this->session->_vendor_id_ ?><br/>
        <strong>Login Password :</strong> <?php echo $this->session->_unhashed_password_ ?> <br/>
        <strong>Secure Password :</strong> <?php echo $this->session->_unhashed_password_ ?>
        <hr/>

    </div>
    <div class="row" align="center">
        <a href="<?php echo site_url('site/vendor_login') ?>" class="btn btn-success btn-lg">Login</a>
        <a href="<?php echo site_url('site/vendor_register') ?>" class="btn btn-primary btn-lg">Register Another</a>
    </div>
</div>
