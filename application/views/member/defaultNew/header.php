<header id="header" class="ui-header">

    <div class="navbar-collapse nav-responsive-disabled">

        <!--toggle buttons start-->
        <ul class="nav navbar-nav">
           <li class="page-logo">
             <a href="<?php echo site_url('/') ?>"   style="padding-top: 0px;">
                <span ><img src="<?php echo $member_data['lg_dark_logo']; ?>" width="160" height="50" alt="logo" class="img-fluid"/></span>
             </a>
           </li>
            <li>
                <a class="toggle-btn" data-toggle="ui-nav" href="">
                    <i class="fa fa-bars"></i>
                </a>
            </li>
        </ul>
        <ul class="breadcrumb  pull-left">
            <?php if ($breadcrumb =="dashboard") { ?>  <li class="m-n ml-5 h3"><?php echo $breadcrumb; ?></li>
          <?php }?>
        </ul>
        <!-- toggle buttons end -->
        <!--notification start-->
        <ul class="nav navbar-nav navbar-right hidden-xs">
<?php
if(config_item('enable_user_theme')=='Yes'){
	$theme_layout	= $this->user_model->get_Dbdata('admin_theme',array('type'=>'user','enabled'=>1));
	if($theme_layout){
?>
<li style="margin:0 10px">
    <select class="form-control" style="margin-top: 10px;" name="my_theme" onchange="activate_admin_theme(this)">
    <option value="">Select theme</option>
<?php
foreach($theme_layout as $set_data):
?>
	<option value="<?=$set_data->id?>" <?=$set_data->is_active==1?'selected':''?>><?=$set_data->theme_name?></option>
<?php		
endforeach;
?>
</select>
</li>
<?php
	}
}
?>
            <?php if(config_item('enable_lms')=="Yes") { ?>
            <li>
             <form method="post" action="<?php echo APIURL.'login/lms_auto_login/'?>">
                <input type="hidden" name="email" value="<?php echo $this->session->email ?>">
                <?php if($this->session->auto_mlm){ ?>
                 <input type="hidden" name="password" value="<?php echo sha1($this->session->_d_password_) ?>">
                <?php } else{ ?>
                 <input type="hidden" name="password" value="<?php echo ($this->session->lms_password)? sha1($this->session->lms_password): sha1($this->session->_d_password_) ?>">
                <?php } ?>
              <button type="submit" class="btn btn-secondary" style="color: #fff;background-color: #4489e4;border-color: white;height:35px;margin-top: 10px;margin-right: 10px" name="submit">LMS LOGIN</button>
             </form></li>
            <?php } ?>

            <li class="breadcrumb" style="margin-top: 5px;color: white">
            <i class="fa fa-google-wallet"></i>
            <?php echo config_item('currency') . $this->db_model->select('balance', 'wallet', array('userid' => $this->session->user_id)) ?></li>
            <!--
            <li class="dropdown language-switch">
                <div id="google_translate_element"></div>
                <script type="text/javascript">
                    function googleTranslateElementInit() {
                        new google.translate.TranslateElement({
                            pageLanguage: 'en',
                            includedLanguages: 'ar,bn,en,gu,hi,kn,mr,ms,pa,ta,te',
                            layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                            autoDisplay: false
                        }, 'google_translate_element');
                    }
                </script>
                <script type="text/javascript"
                        src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
            </li> -->

            <?php 
            if(config_item('ecomm_theme')=='gmart')
            {
                $result=$this->db->query('select site_colorCode from tbl_web_settings')->row();
                       // print_r($result);
            ?>
            <!-- <li class="nav-item">
                <a href="<?=base_url('../gmart')?>" class="btn" 
                    style="margin-right:60px;background-color: <?php print_r($result->site_colorCode) ?>;color:white">
                 <strong>E - Commerce</strong>
                </a>
            </li> -->
            <li class="nav-item">
                <?php $pwd=$this->db->query('select user_password from tbl_users where user_email="'.$this->session->email.'"')->row();?>
                <form id="login_form" action="<?=config_item('store_url');?>/site/auto_login" method="post">
                    <!-- <input type="hidden" name="preview_url" value="<?=config_item('store_url');?>"> -->
                    <input type="hidden" name="email" value="<?php echo $this->session->email; ?>">
                    <input type="hidden" name="password" value="<?php echo $pwd->user_password; ?>">
                    <input type="hidden" name="affiliate_id" value="<?=$this->session->user_id?>">
                    <input type="hidden" name="iss_affiliate" value="1">

                    <button type="submit" class="btn gldbtn" style="margin-left:5px;margin-top: 8px;" >
                        <strong><?=config_item('store_name');?></strong>

                    </button>
                </form>
                <!-- <a href="<?=config_item('store_url')?>" class="btn"
                    style="margin-right:60px;color:white">
                 <strong><?=config_item('store_name')?></strong>
                </a> -->
            </li>
        <?php } ?>

        <?php 
            if(config_item('astrology')=='Yes')
            {

            ?>
            <li class="nav-item">
                <a href="<?=base_url('astrology/astro_home')?>" class="btn btn-danger" 
                    style="margin-right:60px;">
                 <strong>ASTROLOGY</strong>
                </a>
            </li>
        <?php } ?>
            
            <?php if (config_item('enable_repurchase')=="Yes") { ?>
                <a href="<?php echo site_url('cart/pre_checkout') ?>"
                   class="btn card-income-1 hidden-xs glyphicon glyphicon-shopping-cart"
                   style="color:white;margin: 10px">
                    Cart: <?php echo count($this->cart->contents()) ?> </a>
            <?php } ?>
            <li class="dropdown dropdown-usermenu">
                <a href="#" class=" dropdown-toggle" data-toggle="dropdown"
                   aria-expanded="true">
                    <span class="hidden-sm hidden-xs"
                          style="font-weight: bold;color:white">
                        <?php echo $this->session->name ?></span>
                    <span class="caret hidden-sm hidden-xs"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                    <li><a href="<?php echo site_url('member/settings') ?>"><i
                                    class="fa fa-cogs"></i> Settings</a>
                    </li>
                    <li><a href="<?php echo site_url('member/profile') ?>"><i
                                    class="fa fa-user"></i> Profile</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="<?php echo site_url('member/logout') ?>"><i
                                    class="fa fa-sign-out"></i> Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!--notification end-->
    </div>
</header>
<script>
function activate_admin_theme(id){
	id	= id.value;
	$.ajax({
		type:"GET",
		url:"<?=site_url()?>member/select_user_theme",
		data:{id:id},
		dataType: 'json',
		success: function(json) {	
			console.log(json);
			if(json.status=='ok'){
				$('.custom-alert').show();
				$('.custom-alert').addClass('alert-success');
				$('.custom-alert').html(json.msg);
				setTimeout(function() {
					location.reload();
				}, 500);
			}
			else{
				$('.custom-alert').show();
				$('.custom-alert').addClass('alert-danger');
				$('.custom-alert').html(json.msg);
			}
			$(".custom-alert").fadeTo(2000, 500).slideUp(500, function() {
				$(".custom-alert").slideUp(500);
			});			
		}
	});
}
</script>    
<div class="custom-alert alert" style="display:none"></div>
<style>
.custom-alert {
    position: fixed;
    top: 60px;
    z-index: 9999;
    right: 10px;
    border-radius: 0;
}
</style>    
