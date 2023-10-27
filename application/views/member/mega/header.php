<!-- Logo -->
<a href="<?php echo site_url('/');?>" class="logo">
  <!-- mini logo -->
  <b class="logo-mini">

	  <span class="light-logo"><img src="<?php echo $member_data['sm_light_logo']; ?>" alt="logo"></span>
	  <span class="dark-logo"><img src="<?php echo $member_data['sm_dark_logo']; ?>" alt="logo"></span>
  </b>
  <!-- logo-->
  <span class="logo-lg">
	  <img src="<?php echo $member_data['lg_light_logo']; ?>" alt="logo" class="light-logo">
  	  <img src="<?php echo $member_data['lg_dark_logo']; ?>" alt="logo" class="dark-logo">
  </span>
</a>  	
	<!-- Sidebar toggle button-->
  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
	<span class="sr-only">Toggle navigation</span>
  </a>
<!-- Header Navbar -->
<nav class="navbar navbar-static-top">	  
  <div class="ml-10 app-menu">
	<ul class="header-megamenu nav">
		<li class="btn-group nav-item">
			<a href="#" class="nav-link rounded" data-provide="fullscreen" title="Full Screen">
				<i class="mdi mdi-crop-free"></i>
			</a>
		</li>
		<li class="btn-group nav-item" style="display: none;">
			<a href="#" class="nav-link rounded" data-toggle="dropdown" aria-expanded="false">
				<i class="nav-link-icon mdi mdi-view-dashboard text-white mx-5"> </i>
				Mega
				<i class="mdi mdi-dots-vertical ml-2"></i>
			</a>
			<div class="dropdown-menu dropdown-grid">
				<div class="dropdown-mega-menu">
					<div class="row">
						<div class="col-lg-4 col-12">
							<ul class="nav flex-column">
								<li class="nav-item-header nav-item">
									Overview
								</li>
								<li class="nav-item">
									<a href="javascript:void(0);" class="nav-link">
										<i class="nav-link-icon fa fa-inbox">
										</i>
										<span>
											Contacts
										</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0);" class="nav-link">
										<i class="nav-link-icon fa fa-book">
										</i>
										<span>
											Incidents
										</span>
										<div class="ml-auto badge badge-pill badge-danger">5
										</div>
									</a>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0);" class="nav-link">
										<i class="nav-link-icon fa fa-picture-o">
										</i>
										<span>
											Companies
										</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0);" class="nav-link disabled">
										<i class="nav-link-icon fa fa-dashboard">
										</i>
										<span>
											Dashboards
										</span>
									</a>
								</li>
							</ul>
						</div>
						<div class="col-lg-4 col-12 bx-1">
							<ul class="nav flex-column">
								<li class="nav-item-header nav-item">
									Favourites
								</li>
								<li class="nav-item">
									<a href="javascript:void(0);" class="nav-link">
										Reports Conversions
									</a>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0);" class="nav-link">
										Quick Start
										<div class="ml-auto badge badge-success">New</div>
									</a>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0);" class="nav-link">Users &amp; Groups</a>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0);" class="nav-link">Proprieties</a>
								</li>
							</ul>
						</div>
						<div class="col-lg-4 col-12">
							<ul class="nav flex-column">
								<li class="nav-item-header nav-item">
									Sales & Marketing
								</li>
								<li class="nav-item">
									<a href="javascript:void(0);" class="nav-link">Queues
									</a>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0);" class="nav-link">Resource Groups
									</a>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0);" class="nav-link">Goal Metrics
										<div class="ml-auto badge badge-warning">3
										</div>
									</a>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0);" class="nav-link">Campaigns
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</li>
		<li class="search-box" style="display: none;">
			<a class="nav-link hidden-sm-down app-search-icon" href="javascript:void(0)"><i class="ti-search"></i></a>
			<form class="app-search" style="display: none;">
				<input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="ti-close"></i></a>
			</form>
		</li>	
	</ul> 
  </div>
	
  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
	  <!-- User Account-->
<?php
if(config_item('enable_user_theme')=='Yes'){
$theme_layout	= $this->user_model->get_Dbdata('admin_theme',array('type'=>'user','enabled'=>1));
if($theme_layout){
?>
    <li class=" px-2">
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

      <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <img src="<?php echo base_url();?>axxets/mega/images/avatar.png" class="user-image rounded-circle b-2" alt="User Image">
        </a>
        <ul class="dropdown-menu scale-up">
          <!-- Menu Body -->
          <li class="user-body bt-0">
            <div class="row no-gutters">
              <div class="col-12 text-left">
                <a href="<?php echo site_url('member/profile'); ?>"><i class="ion ion-person"></i> My Profile</a>
              </div>
              <div class="col-12 text-left">
                <a href="<?php echo site_url('member/settings'); ?>"><i class="ion ion-settings"></i> Setting</a>
              </div>
			  <div role="separator" class="divider col-12"></div>
			  <div class="col-12 text-left">
                <a href="<?php echo site_url('member') ?>"><i class="ti-settings"></i> Account</a>
              </div>
              <div role="separator" class="divider col-12"></div>
			  <div class="col-12 text-left">
                <a href="<?php echo site_url('member/logout') ?>"><i class="fa fa-power-off"></i> Logout</a>
              </div>				
            </div>
            <!-- /.row -->
          </li>
        </ul>
      </li>		  
      <!-- Control Sidebar Toggle Button -->
      
    </ul>
  </div>
</nav>
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
				location.reload(500);
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
