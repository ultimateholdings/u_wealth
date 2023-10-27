<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->

<div class="page-header navbar navbar-fixed-top">
  <div class="page-header-inner ">
    <div class="page-logo">
      <a href="<?php echo site_url('admin') ?>">
      <img src="<?php echo $lg_dark_logo ?>" alt="logo" class="logo-default" width="150" height="60"/> </a>
      <div class="menu-toggler sidebar-toggler">
        <span></span>
      </div>
    </div>

    <!--<?php if (!isset($this->session->designation) || $this->session->designation['user_manage'] == "1") { ?>
     <form class="search-form-opened" action="<?php echo site_url('users/search') ?>" method="POST">
      <div class="input-group">
       <input type="text" class="form-control" placeholder="Search User ID" name="userid">
       <div class="input-group-btn">
        <button type="submit" style="border-radius: 30px;border:white;"><i class="fa fa-search" style="color:white; font-size: 18px;"></i></button>
       </div>
     </div>
     </form>
    <?php } ?>-->

    <a href="javascript:;" class="menu-toggler responsive-toggler"
     data-toggle="collapse" data-target=".navbar-collapse">
    <span></span>
    </a> 
     <!--<ul class="breadcrumb page-breadcrumb pull-left">
             <li><i class="fa fa-home"></i>&nbsp;
                  <a class="parent-item" href="<?php echo site_url('admin') ?>">Home</a>&nbsp;
                   <i class="fa fa-angle-right"></i>
             </li>
             <li style="color: white;font-weight: 300"><?php echo $breadcrumb; ?></li>
          </ul>-->


    <div class="top-menu">
    <?php
if(config_item('is_theme_change')=='Yes'){
    $theme_layout	= $this->user_model->get_Alltheme();
    if($theme_layout){
?>
        <div class="nav navbar-nav px-2">
    <select class="form-control" style="margin-top: 13px;" name="my_theme" onchange="activate_theme(this)">
    <option value="">Select theme</option>
<?php
foreach($theme_layout as $set_data):
?>
    <option value="<?=$set_data->id?>" <?=$set_data->is_active==1?'selected':''?>><?=$set_data->theme_name?></option>
<?php		
endforeach;
?>
    </select>
        </div>
<?php
    }
}
if(config_item('enable_admin_theme')=='Yes'){
    $theme_layout	= $this->user_model->get_Dbdata('admin_theme',array('type'=>'admin','enabled'=>1));
    if($theme_layout){
    ?>
    <div class="nav navbar-nav px-2">
        <select class="form-control" style="margin-top: 13px;" name="my_theme" onchange="activate_admin_theme(this)">
        <option value="">Select theme</option>
<?php
foreach($theme_layout as $set_data):
?>
    <option value="<?=$set_data->id?>" <?=$set_data->is_active==1?'selected':''?>><?=$set_data->theme_name?></option>
<?php		
endforeach;
?>
            </select>
        </div>
<?php
    }
}
?>

         <a class="btn btn-primary text-center"  style="margin-top:13px;" target="_blank" href="<?php echo site_url('site/documentation') ?>">Watch Demo</a>
   
         <?php 
        if(config_item('ecomm_theme')=='gmart')
          {
          $result=$this->db->query('select site_colorCode from tbl_web_settings')->row();
                       // print_r($result);
          ?>
  
         <a href="<?=base_url('../gmart/admin/dashboard')?>" class="nav-item btn" 
                    style="margin-right:60px; margin-top:15px; background-color: <?php print_r($result->site_colorCode) ?>; color:white">
                 <strong>G-mart Admin</strong>
         </a>
        <?php } ?>

                  
      

        <ul class="nav navbar-nav pull-right">
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
         


            <?php if ((!isset($this->session->designation) || $this->session->designation['manage_poducts'] == "1")&&(config_item('enable_product')=="Yes")) { ?>
              <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
               <a href="<?php echo site_url('product/pending-orders') ?>" class="dropdown-toggle">
                <i class="fa fa-shopping-cart"></i>
                <span class="badge cyan-bgcolor">
                <?php echo $this->db_model->count_all('product_sale', array('status' => 'Processing')) ?>
                </span>
               </a>
              </li>
            <?php } ?>
              <li class="notification-icon dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
               <a href="<?php echo site_url('income/bank_payment') ?>" aria-haspopup="true" class="dropdown-toggle">
                <i class="fa fa-bank"></i>
                <span class="badge bg-danger">
                 <?php echo $this->db_model->count_all('transaction', array('to_userid'=>'admin', 'status'=>'Processing'))?>
                </span>
               </a>
              </li>
              
               <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
               <a href="<?php echo  site_url('ticket/unsolved')?>"  aria-haspopup="true" class="dropdown-toggle">
                <i class="fa fa-envelope"></i>
                <span class="badge bg-blue">
                 <?php echo $this->db_model->count_all('ticket', array('user_type'=>'User', 'status'=>'Open'))+$this->db_model->count_all('ticket', array('user_type'=>'User', 'status'=>'Customer Reply'))?>
                </span>
               </a>
              </li>
                
              <li class="dropdown dropdown-user">
              <a href="javascript:;" class="dropdown-toggle"
               data-toggle="dropdown" data-hover="dropdown"
               data-close-others="true">
               <span class="username username-hide-on-mobile"> <?php echo $this->session->name ?> </span>
                <i class="fa fa-angle-down bounce1" style="color:white"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-default">
               <li>
                <a href="<?php echo site_url('admin/setting') ?>">
                 <i class="fa fa-gears"></i> Settings
                </a>
               </li>
               <li>
                <a href="<?php echo site_url('admin/profile') ?>">
                  <i class="fa fa-user"></i> My Profile </a>
                </a>
               </li>
               <li>
                <a href="<?php echo site_url('admin/logout') ?>">
                  
                 <i class="fa fa-sign-out"></i> Log Out </a>
               </li>
              </ul>
              </li>
      </ul>
    </div>
  </div>

</div> <!-- .page-header -->
<script>
function activate_theme(id){
	id	= id.value;
	$.ajax({
		type:"GET",
		url:"<?=site_url()?>admin/select_defult_theme",
		data:{id:id},
		dataType: 'json',
		success: function(json) {	
			console.log(json);
			if(json.status=='ok'){
				$('.custom-alert').show();
				$('.custom-alert').addClass('alert-success');
				$('.custom-alert').html(json.msg);
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
<script>
function activate_admin_theme(id){
	id	= id.value;
	$.ajax({
		type:"GET",
		url:"<?=site_url()?>admin/select_admin_theme",
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