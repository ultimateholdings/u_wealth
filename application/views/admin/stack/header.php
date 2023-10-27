<!-- BEGIN: Header-->
    <?php if(config_item('stack_theme_id')=='1'){ ?>
        <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top navbar-semi-dark">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-lg-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="feather icon-menu font-large-1"></i></a></li>
                    <li class="nav-item mr-auto"><a class="navbar-brand" href="<?php echo base_url(); ?>"><img class="brand-logo" alt="stack admin logo" src="<?php echo base_url();?>axxets/stack/images/logo/stack-logo-light.png">
                            <h2 class="brand-text">Global MLM</h2>
                        </a></li>
                    <li class="nav-item d-none d-lg-block nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="toggle-icon feather icon-toggle-right font-medium-3 white" data-ticon="feather.icon-toggle-right" style="margin-left: 1rem!important;margin-right: 0px;"></i></a></li>
                    <li class="nav-item d-lg-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
                </ul>
            </div>
            <div class="navbar-container content">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
    <?php } else { ?>

    <?php if(config_item('stack_theme_id')=='2'){ ?>
        <nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-semi-light bg-gradient-x-grey-blue">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="feather icon-menu font-large-1"></i></a></li>
                    <li class="nav-item"><a class="navbar-brand" href="<?php echo base_url(); ?>"><img class="brand-logo" alt="stack admin logo" src="<?php echo base_url();?>axxets/stack/images/logo/stack-logo.png">
                            <h2 class="brand-text">Global MLM</h2>
                        </a></li>
                    <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
                </ul>
            </div>
    <?php } elseif(config_item('stack_theme_id')=='3'){ ?>
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-light navbar-border">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="feather icon-menu font-large-1"></i></a></li>
                    <li class="nav-item"><a class="navbar-brand" href="<?php echo base_url(); ?>"><img class="brand-logo" alt="stack admin logo" src="<?php echo base_url();?>axxets/stack/images/logo/stack-logo.png">
                            <h2 class="brand-text">Global MLM</h2>
                        </a></li>
                    <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
                </ul>
            </div>
    <?php } elseif(config_item('stack_theme_id')=='4'){ ?>
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-dark bg-gradient-x-primary navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="feather icon-menu font-large-1"></i></a></li>
                    <li class="nav-item"><a class="navbar-brand" href="<?php echo base_url(); ?>"><img class="brand-logo" alt="stack admin logo" src="<?php echo base_url();?>axxets/stack/images/logo/stack-logo-light.png">
                            <h2 class="brand-text">Global MLM</h2>
                        </a></li>
                    <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
                </ul>
            </div>
    <?php } elseif(config_item('stack_theme_id')=='5'){ ?>
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-semi-dark navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="feather icon-menu font-large-1"></i></a></li>
                    <li class="nav-item"><a class="navbar-brand" href="<?php echo base_url(); ?>"><img class="brand-logo" alt="stack admin logo" src="<?php echo base_url();?>axxets/stack/images/logo/stack-logo-light.png">
                            <h2 class="brand-text">Global MLM</h2>
                        </a></li>
                    <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
                </ul>
            </div>
    <?php } else { ?>
        <nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-dark bg-primary navbar-shadow navbar-brand-center">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="feather icon-menu font-large-1"></i></a></li>
                    <li class="nav-item"><a class="navbar-brand" href="<?php echo base_url(); ?>"><img class="brand-logo" alt="stack admin logo" src="<?php echo base_url();?>axxets/stack/images/logo/stack-logo-light.png">
                            <h2 class="brand-text" style="font-size: 1.2rem;">Global MLM Software</h2>
                        </a></li>
                    <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
                </ul>
            </div>
    <?php } ?>
            <div class="navbar-container content">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
    <?php } ?>
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="feather icon-menu"></i></a></li>
                        <li class="dropdown nav-item mega-dropdown d-none d-lg-block"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown" style="display: none;">Mega</a>
                            <ul class="mega-dropdown-menu dropdown-menu row p-1">
                                <li class="col-md-4 bg-mega p-2">
                                    <h3 class="text-white mb-1 font-weight-bold">Mega Menu Sidebar</h3>
                                    <p class="text-white line-height-2">Candy canes bonbon toffee. Cheesecake dragée gummi bears chupa chups powder bonbon. Apple pie cookie sweet.</p>
                                    <button class="btn btn-outline-white">Learn More</button>
                                </li>
                                <li class="col-md-5 px-2">
                                    <h6 class="font-weight-bold font-medium-2 ml-1">Apps</h6>
                                    <ul class="row mt-2">
                                        <li class="col-6 col-xl-4"><a class="text-center mb-2 mb-xl-3" href="app-email.html" target="_blank"><i class="feather icon-mail font-large-1 mr-0"></i>
                                                <p class="font-medium-2 mt-25 mb-0">Email</p>
                                            </a></li>
                                        <li class="col-6 col-xl-4"><a class="text-center mb-2 mb-xl-3" href="app-chat.html" target="_blank"><i class="feather icon-message-square font-large-1 mr-0"></i>
                                                <p class="font-medium-2 mt-25 mb-0">Chat</p>
                                            </a></li>
                                        <li class="col-6 col-xl-4"><a class="text-center mb-2 mb-xl-3 mt-75 mt-xl-0" href="app-todo.html" target="_blank"><i class="feather icon-check-square font-large-1 mr-0"></i>
                                                <p class="font-medium-2 mt-25 mb-0">Todo</p>
                                            </a></li>
                                        <li class="col-6 col-xl-4"><a class="text-center mb-2 mt-75 mt-xl-0" href="app-kanban.html" target="_blank"><i class="feather icon-file-plus font-large-1 mr-0"></i>
                                                <p class="font-medium-2 mt-25 mb-50">Kanban</p>
                                            </a></li>
                                        <li class="col-6 col-xl-4"><a class="text-center mb-2 mt-75 mt-xl-0" href="app-contacts.html" target="_blank"><i class="feather icon-users font-large-1 mr-0"></i>
                                                <p class="font-medium-2 mt-25 mb-50">Contacts</p>
                                            </a></li>
                                        <li class="col-6 col-xl-4"><a class="text-center mb-2 mt-75 mt-xl-0" href="invoice-template.html" target="_blank"><i class="feather icon-printer font-large-1 mr-0"></i>
                                                <p class="font-medium-2 mt-25 mb-50">Invoice</p>
                                            </a></li>
                                    </ul>
                                </li>
                                <li class="col-md-3">
                                    <h6 class="font-weight-bold font-medium-2">Components</h6>
                                    <ul class="row mt-1 mt-xl-2">
                                        <li class="col-12 col-xl-6 pl-0">
                                            <ul class="mega-component-list">
                                                <li class="mega-component-item"><a class="mb-1 mb-xl-2" href="component-alerts.html" target="_blank">Alert</a></li>
                                                <li class="mega-component-item"><a class="mb-1 mb-xl-2" href="component-callout.html" target="_blank">Callout</a></li>
                                                <li class="mega-component-item"><a class="mb-1 mb-xl-2" href="component-buttons-basic.html" target="_blank">Buttons</a></li>
                                                <li class="mega-component-item"><a class="mb-1 mb-xl-2" href="component-carousel.html" target="_blank">Carousel</a></li>
                                            </ul>
                                        </li>
                                        <li class="col-12 col-xl-6 pl-0">
                                            <ul class="mega-component-list">
                                                <li class="mega-component-item"><a class="mb-1 mb-xl-2" href="component-dropdowns.html" target="_blank">Drop Down</a></li>
                                                <li class="mega-component-item"><a class="mb-1 mb-xl-2" href="component-list-group.html" target="_blank">List Group</a></li>
                                                <li class="mega-component-item"><a class="mb-1 mb-xl-2" href="component-modals.html" target="_blank">Modals</a></li>
                                                <li class="mega-component-item"><a class="mb-1 mb-xl-2" href="component-pagination.html" target="_blank">Pagination</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon feather icon-maximize"></i></a></li>
                        <!-- <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"> --><!-- <i class="ficon feather icon-search"></i></a>
                            <div class="search-input">
                                <input class="input" type="text" placeholder="Explore Global MLM Software..." tabindex="0" data-search="template-search">
                                <div class="search-input-close"><i class="feather icon-x"></i></div>
                                <ul class="search-list"></ul>
                            </div>
                        </li> -->
                    </ul>
                    
                    <ul class="nav navbar-nav float-right">
<?php
if(config_item('is_theme_change')=='Yes'){
?>                    
                        <li class=" px-2">
<?php
$theme_layout	= $this->user_model->get_Alltheme();
if($theme_layout){
?>
		<select class="form-control" style="margin-top: 10px;" name="my_theme" onchange="activate_theme(this)">
        	<option value="">Select theme</option>
<?php
	foreach($theme_layout as $set_data):
?>
        	<option value="<?=$set_data->id?>" <?=$set_data->is_active==1?'selected':''?>><?=$set_data->theme_name?></option>
<?php		
	endforeach;
?>
        </select>
<?php
}
?>
                        </li>
<?php
}
?>
<?php
if(config_item('enable_admin_theme')=='Yes'){
?>
                        <li class=" px-2">
<?php
$theme_layout	= $this->user_model->get_Dbdata('admin_theme',array('type'=>'admin','enabled'=>1));
if($theme_layout){
?>
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
<?php
}
?>
                        </li>
<?php
}
?>
                        <li class="dropdown dropdown-language nav-item" style="display: none;"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-us"></i><span class="selected-language"></span></a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-flag"><a class="dropdown-item" href="#" data-language="en"><i class="flag-icon flag-icon-us"></i> English</a><a class="dropdown-item" href="#" data-language="fr"><i class="flag-icon flag-icon-fr"></i> French</a><a class="dropdown-item" href="#" data-language="pt"><i class="flag-icon flag-icon-pt"></i> Portuguese</a><a class="dropdown-item" href="#" data-language="de"><i class="flag-icon flag-icon-de"></i> German</a></div>
                        </li>
                        <li><button type="button" class="btn btn-primary" style="margin-top:10px;"  data-toggle="modal" data-target="#exampleModal" id="button"> Give Feedback</button></li>

                         <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"></a>
                        <?php 
                        
                                    $withrowlrequest = $this->db->query("SELECT count(userid) as deposit FROM transaction WHERE status = 'Processing' and to_userid = 'Admin' and notification = 0")->result_array();
                                     $payout = $this->db->query("SELECT count(userid) as payout FROM    withdraw_request WHERE status = 'Un-Paid' and notification = 0")->result_array();
                                    $ticket = $this->db->query("SELECT count(userid) as total FROM ticket WHERE status = 'Customer Reply' and notification = 0")->result_array();
                                    $ticket12 = $this->db->query("SELECT count(userid) as total12 FROM ticket WHERE status = 'Open' and notification = 0")->result_array();
                                    debug_log($ticket[0]['total']);?>
                        
                        <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon feather icon-bell"></i><span class="badge badge-pill badge-danger badge-up"><?php  echo $ticket[0]['total']+$withrowlrequest[0]['deposit']+$ticket12[0]['total12']+$payout[0]['payout'] ; ?></span></a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    
                                    <h6 class="dropdown-header m-0"><span class="grey darken-2">Notifications</span><span class="notification-tag badge badge-danger float-right m-0"><?php  echo $ticket[0]['total']+$withrowlrequest[0]['deposit']+$ticket12[0]['total12']+$payout[0]['payout'] ; ?></span></h6>
                                </li>
                                <li class="scrollable-container media-list"><a href="<?php echo base_url('income/bank_payment'); ?>">
                                     <?php
                                    $withrowlrequest12 = $this->db->query("SELECT id,name,purpose,userid,amount,time FROM transaction WHERE status = 'Processing' and notification = 0 and to_userid = 'Admin' Order by time DESC")->result_array();
                                    foreach ($withrowlrequest12 as $result12) {
                                    debug_log($result12['userid']);?>
                                        <div class="media">
                                            <div class="media-left align-self-center"><i class="feather icon-plus-square icon-bg-circle bg-cyan"></i></div>
                                            <div class="media-body">
                                                <a href="<?php echo site_url('income/walllet_read_admin/' . $result12['id']); ?>">
                                                <h6 class="media-heading"><?php echo $result12['name'].'('.$result12['userid'].')'; ?></h6>
                                                <p class="notification-text font-small-3 text-muted"><?php echo $result12['purpose'].' for Amount '.$result12['amount']; ?> </p><small>
                                                    <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00"><?php echo $result12['time'];?></time></small>
                                                </a>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </a><a href="<?php echo base_url('income/make-payment'); ?>">
                                     <?php
                                    $payout12 = $this->db->query("SELECT id,userid,amount,date FROM withdraw_request WHERE status = 'Un-Paid' and notification = 0 Order by date DESC")->result_array();
                                    foreach ($payout12 as $result12) {
                                         $membername = $this->db_model->select_multi('name', 'member', array('id' => $result12['userid']));
                                    debug_log($result12['userid']);?>
                                        <div class="media">
                                            <div class="media-left align-self-center"><i class="feather icon-plus-square icon-bg-circle bg-cyan"></i></div>
                                            <div class="media-body">
                                                <a href="<?php echo site_url('income/withdraw_read_admin/' . $result12['id']); ?>">
                                                <h6 class="media-heading"><?php echo $membername->name.'('.$result12['userid'].')'; ?></h6>
                                                <p class="notification-text font-small-3 text-muted">withdraw Request for Amount  <?php echo $result12['amount']; ?> </p><small>
                                                    <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00"><?php echo $result12['date'];?></time></small>
                                                </a>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </a><a href="<?php echo base_url('ticket/unsolved'); ?>">
                                         <?php
                                    $ticket12 = $this->db->query("SELECT id,ticket_title,userid,date FROM ticket WHERE status = 'Open' and notification = 0 Order by date DESC")->result_array();

                                    foreach ($ticket12 as $result12) {
                                         $membername = $this->db_model->select_multi('name', 'member', array('id' => $result12['userid']));
                                    debug_log($result12['userid']);?>
                                        <div class="media">
                                            <div class="media-left align-self-center"><i class="feather icon-plus-square icon-bg-circle bg-cyan"></i></div>
                                            <div class="media-body">
                                                <a href="<?php echo site_url('ticket/ticket_read_admin/' . $result12['id']); ?>">
                                                <h6 class="media-heading"><?php echo $membername->name.'('.$result12['userid'].')'; ?></h6>
                                                <p class="notification-text font-small-3 text-muted">Support Ticket Title :-<?php echo $result12['ticket_title']; ?> </p><small>
                                                    <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00"><?php echo $result12['date'];?></time></small>
                                                </a>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </a>
                                <a href="<?php echo base_url('ticket/unsolved'); ?>">
                                         <?php
                                    $ticket12 = $this->db->query("SELECT id,ticket_title,userid,date FROM ticket WHERE status = 'Customer Reply' and notification = 0 Order by date DESC")->result_array();

                                    foreach ($ticket12 as $result12) {
                                         $membername = $this->db_model->select_multi('name', 'member', array('id' => $result12['userid']));
                                    debug_log($result12['userid']);?>
                                        <div class="media">
                                            <div class="media-left align-self-center"><i class="feather icon-plus-square icon-bg-circle bg-cyan"></i></div>
                                            <div class="media-body">
                                                <a href="<?php echo site_url('ticket/ticket_read_admin/' . $result12['id']); ?>">
                                                <h6 class="media-heading"><?php echo $membername->name.'('.$result12['userid'].')'; ?></h6>
                                                <p class="notification-text font-small-3 text-muted">Support Ticket Title :-<?php echo $result12['ticket_title']; ?> Customer Replied. </p><small>
                                                    <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00"><?php echo $result12['date'];?></time></small>
                                                </a>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </a></li>
                                <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="javascript:void(0)">Read all notifications</a></li>
                            </ul>
                        </li>
                         <?php 
                                    $admin12 = $this->db_model->select_multi('email', 'admin', array('id' => 1));
                                    $email12 = $this->db->query("SELECT count(session_id) as total FROM inbox WHERE to_email = '$admin12->email' and status = 'unread'")->result_array();
                                    debug_log($email12[0]['total']);?>
                        <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon feather icon-mail"></i><span class="badge badge-pill badge-warning badge-up"><?php  echo $email12[0]['total']; ?></span></a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">

                                   
                                    <h6 class="dropdown-header m-0"><span class="grey darken-2">Messages</span><span class="notification-tag badge badge-warning float-right m-0"><?php  echo $email12[0]['total']; ?></span></h6>
                                </li>
                                <li class="scrollable-container media-list"><a href="<?php echo base_url('email'); ?>">
                                   <?php
                                    $email12 = $this->db->query("SELECT from_email,session_name,session_id,subject,message,date FROM inbox WHERE to_email = '$admin12->email' and status = 'unread' Order by date DESC")->result_array();
                                    foreach ($email12 as $result12) {
                                    debug_log($result12['from_email']);?>
                                        <div class="media">
                                           

                                            <div class="media-body">
                                                <h6 class="media-heading"><?php echo $result12['session_name'].'('.$result12['session_id'].')'; ?></h6>
                                                <p class="notification-text font-small-3 text-muted">Subject:-<?php echo $result12['subject']; ?></p><small>
                                                    <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00"><?php echo $result12['date']; ?></time></small>
                                            </div>
                                        </div>
                                         <?php } ?>
                                    </a>
                                        
                                    </li>

                                <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="<?php echo base_url('email'); ?>">Read all messages</a></li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <div class="avatar avatar-online"><img src="<?php echo base_url();?>axxets/stack/images/portrait/small/avatar-s-1.png" alt="avatar"><i></i></div><span class="user-name"><?php echo $this->session->name ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="<?php echo site_url('admin/profile') ?>"><i class="feather icon-user"></i> Edit Profile</a>
                                <a class="dropdown-item" href="<?php echo site_url('admin/settings') ?>"><i class="feather icon-mail"></i> Setting & Password</a>
                                <!--<a class="dropdown-item" href="user-cards.html"><i class="feather icon-check-square"></i> Task</a>
                                <a class="dropdown-item" href="app-chat.html"><i class="feather icon-message-square"></i> Chats</a>-->
                                <div class="dropdown-divider"></div><a class="dropdown-item" href="<?php echo site_url('admin/logout') ?>"><i class="feather icon-power"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->
    
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