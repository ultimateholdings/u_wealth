<?php 
$user_id = $this->session->user_id; 
$page = current_url().'#recharge'; 
$_SESSION['page'] = $page;
//print_r($page);exit();
$count=sizeof($provider_data);
for($i=0;$i<=$count;$i++)
{
  //$providers=$data['providers']['0']['id'];
  $service_id[]=$provider_data[$i]['service_id'];
}
//print_r($provider_data);exit();
foreach($provider_data as $p){
  if($p['service_id']==1){
    $provider_name[]=$p['provider_name'];
    $provider_id[]=$p['id'];
    //echo $p['provider_name'];
  }
}

//print_r($provider_name);
  //print_r($provider_id);exit();

?>

  <!DOCTYPE html>
  <!-- html -->
  <html>
  <!-- head -->
  <head>
  <title>My Recharge</title>
  <link href='<?php echo base_url();?>axxets/templates/4/css/bootstrap.css' rel='stylesheet' type='text/css' media='all' /><!-- bootstrap-CSS -->
  <link rel='stylesheet' href='<?php echo base_url();?>axxets/templates/4/css/bootstrap-select.css'><!-- bootstrap-select-CSS -->
  <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet' type='text/css' media='all'><!-- Fontawesome-CSS -->
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script type='text/javascript' src='<?php echo base_url();?>axxets/templates/4/js/jquery-2.2.3.min.js'></script>
  <!-- Custom Theme files -->
  <!--theme-style-->
  <link href='<?php echo base_url();?>axxets/templates/4/css/style.css' rel='stylesheet' type='text/css' media='all' /> 
  <link href='https://fonts.googleapis.com/css2?family=Lora&display=swap' rel='stylesheet'>
  <!--//theme-style-->
  <!--meta data-->
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
  <meta name='keywords' content='' />
  <script type='application/x-javascript'> addEventListener('load', function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <style type='text/css'>
     .navbar-header .navbar-toggle .icon-bar {
background-color: black;
}
    body{
      font-family: Segoe UI;
      background-color:#fdfdff;

    }
 </style>
</head>
<body >
<!--header-->
<header>
  <div class='container'>
    <nav class='navbar nav navbar-fixed-top' id='navbar' style='padding:10px 10px;'>
      <div class='container-fluid'>
      <!-- Brand and toggle get grouped for better mobile display -->
        <div class='navbar-header'>
          <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' onclick='myFunction()' data-target='#bs-example-navbar-collapse-1' aria-expanded='true' style='background-color:lightgrey;'>
            <span class='sr-only' >Toggle navigation</span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
          </button>
          <a class='navbar-brand' href='#' style='font-size: 32px; color:#e1b382;font-weight: 700;font-family: cambria;'><?php echo config_item('company_name') ?></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
          <ul class='nav navbar-nav navbar-right'>
            <li class='active' ><a href='<?php echo site_url('/')?>' style='color:#beef00;font-family:Segoe UI;'><i class='fa fa-home'>&nbsp;HOME</i></a></li>
            <?php if(config_item('enable_ecom')=='Yes'){ ?>
            <li><a href='<?php echo site_url('emart/shop')?>' style='color:#beef00;font-family:Segoe UI;' ><i class='fa fa-shopping-basket'>&nbsp;SHOP</i></a></li>
            <li><a href='<?php echo site_url('emart/contact')?>' style='color:#beef00;font-family:Segoe UI;'><i class='fa fa-envelope-o'>&nbsp;CONTACT</i></a></li>
            <?php } ?>
            <li><a href='#recharge' style='color:#beef00;font-family:Segoe UI;' id='recbtn'><i class='fa fa-mobile'>&nbsp;RECHARGE</i></a></li>
            <?php if(!$user_id){ ?>
            <li><a data-toggle='modal' data-target='#myModal' style='color:#beef00;font-family:Segoe UI;'><i class='fa fa-user'>&nbsp;LOGIN</i></a></li>
            <li><a href='<?php echo site_url('site/register')?>' style='color:#beef00;font-family:Segoe UI;'><i class='fa fa-registered'>&nbsp;REGISTER</i></a></li>
            <?php } else { ?>
            <li><a href='<?php echo site_url('member/logout')?>' style='color:#beef00;font-family:Segoe UI;'><i class='fa fa-power-off'>&nbsp;LOG OUT</i></a></li>
            <li><a href='<?php echo site_url('member')?>' style='color:#beef00;font-family:Segoe UI;'><i class='fa fa-tachometer'>&nbsp;MY ACCOUNT</i></a></li>
            <?php } ?>
          <!--  <li><a data-toggle='modal' data-target='#myModal' href='#' style='color: yellow;'><i class='glyphicon glyphicon-user'> </i>Login/Register</a></li>-->
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
  </div>
</header>

  <!--//--> 
<div class=' header-right'>
  <div class='banner'>
     <div class='slider'>
        <div class='callbacks_container'>
          <ul class='rslides' id='slider'>           
            <li>
              <div class='banner1'>
                <div class='caption'>
                  <h3 style='color: #FFFAFA;'>Instant Mobile Recharge</h3>
                  <p><a href='#mobilew3layouts' class='scroll'>Recharge now</a></p>
                </div>
              </div>
            </li>
            <li>
              <div class='banner2'>
                <div class='caption' style=" margin-left: 30%;">
                  <h3 style='color: #FFFAFA;'>Recharge Your DTH Faster</h3>
                  <p><a href='#mobilew3layouts' class='scroll'>Recharge now</a></p>
                </div>
              </div>
           </li>
            <li>
              <div class='banner3'>
                <div class='caption' style="margin-left: 30%;">
                  <h3>Pay Your Electricity Bill </h3>
                  <p><a href='#mobilew3layouts' class='scroll'>Pay now</a></p>
                </div>
              </div>
            </li> 
            <li>
              <div class='banner4'>
                <div class='caption' style="margin-left: 30%;">
                  <h3 style='color: blue;'>Pay Your Postpaid Bills </h3>
                  <p><a href='#mobilew3layouts' class='scroll'>Pay now</a></p>
                </div>
              </div>
            </li> 
          </ul>
      </div>
    </div>
  </div>
</div>
  <!--Vertical Tab-->

<div class='categories-section main-grid-border' id='recharge' style='padding-bottom: 0px;'>
  <div class='container'>
    <div class='category-list'>
      <div id='parentVerticalTab'>
        <div class='agileits-tab_nav'>
          <ul class='resp-tabs-list hor_1'>
            <?php if(config_item('enable_mobile_recharge')=='Yes') {?>
            <li style='box-shadow: 0 8px 6px -6px black; font-family: Lucida Bright;'><i class='icon fa fa-mobile' aria-hidden='true'></i>Mobile</li>
          <?php } ?>
           <?php if(config_item('enable_dth_recharge')=='Yes') {?>
            <li style='box-shadow: 0 8px 6px -6px black;font-family: Lucida Brigh'><i class='icon fa fa-television' aria-hidden='true'></i>DTH</li>
          <?php } ?>
            <!--<a href='<?php echo site_url('insurance')?>'><li><i class='icon fa fa-university' aria-hidden='true'></i>Insurance</li></a>-->
            <?php if(config_item('enable_electricity_recharge')=='Yes') {?>
            <li style='box-shadow: 0 8px 6px -6px black;font-family: Lucida Brigh'><i class='icon fa fa-lightbulb-o' aria-hidden='true'></i>Electricity</li>
          <?php } ?>
          <?php if(config_item('enable_landline_recharge')=='Yes') {?>
            <li style='box-shadow: 0 8px 6px -6px black;font-family: Lucida Brigh'><i class='icon fa fa-phone' aria-hidden='true'></i>Land Line</li>
          <?php } ?>
          <?php if(config_item('enable_broadband_recharge')=='Yes') {?>
            <li style='box-shadow: 0 8px 6px -6px black;font-family: Lucida Brigh'><i class='icon fa fa-connectdevelop' aria-hidden='true'></i>Broad Band</li>
          <?php } ?>
            <?php if(config_item('enable_gas_recharge')=='Yes') {?>
            <li style='box-shadow: 0 8px 6px -6px black;font-family: Lucida Brigh'><i class='icon fa fa-flask' aria-hidden='true'></i>Gas</li>
             <?php } ?>
             <?php if(config_item('enable_water_recharge')=='Yes') {?>
            <li style='box-shadow: 0 8px 6px -6px black;font-family: Lucida Brigh'><i class='icon fa fa-tint' aria-hidden='true'></i>Water</li>
             <?php } ?>
            <?php if(config_item('enable_metro_recharge')=='Yes') {?>
            <li style='box-shadow: 0 8px 6px -6px black;font-family: Lucida Brigh'><i class='icon fa fa-subway' aria-hidden='true'></i>Metro</li>
             <?php } ?>
          </ul>
        </div>
        <div class='resp-tabs-container hor_1'>
          <div>
            <div class='tabs-box'>
                <?php echo $this->session->flashdata('common_flash') ?>        
                <img src='<?php echo base_url();?>axxets/templates/4/images/mobile.png' class='w3ls-mobile' alt='' data-pin-nopin='true'>
                <ul class='tabs-menu'>
                  <li><a href='#tab1'><label class='radio' style='color: #009988'><input type='radio' name='radio' checked=''><i></i>Prepaid</label></a></li>
                  <li><a href='#tab2'><label class='radio' style='color: #009988'><input type='radio' name='radio'><i></i>Postpaid</label></a></li>
                </ul>
                <div class='clearfix'> </div>
                <div class='tab-grids'>
                  <div id='tab1' class='tab-grid'>  
                    <div class='login-form'>
                      <?php echo form_open('Recharge/recharge/mobile') ?>                                 
                      <li style='list-style: none;'>
                          <h4 style='font-family: Segoe UI;font-size: 14px; color: gray;'>Enter your Prepaid Mobile Number</h4>
                          <input type='number' id='tel' name='mno' pattern='\d{10}' placeholder='Enter Mobile Number' required='required' onkeypress='return keyRestrict(event, &#39;1234567890&#39;)' />
                          <p class='validation01'>
                          <span class='invalid' style='font-family: Segoe UI;font-size: 14px; color: gray;'>Please enter a valid mobile number</span>
                          <span class='valid' style='font-family: Segoe UI;font-size: 14px; color: gray;'>That's what we wanted!</span>
                          </p>
                      </li>
                      <li style='list-style: none;'>
                        <div class='agileits-select'>
                          <select name='operator' class='selectpicker show-tick' data-live-search='true' required='required' >
                            <option data-tokens='Select Operator' value="">Select Operator</option>
                                <?php foreach($provider_data as $p){
                                    if($p['service_id']==1){
                                      echo '<option value=' . $p["id"].'|'.$p['provider_name'].'>'.$p['provider_name'] . '</option>';
                                    }
                                  }?>
                             <!-- <option value='TJ'>JIO TOPUP</option>-->
                          </select>
                        </div>
                      </li>
                      <li style='list-style: none;'>
                        <div class='mobile-right '>
                          <h4 style='font-family: Segoe UI;font-size: 14px; color: gray; margin-top: 15px;'>How Much To Recharge?</h4>
                            <div class='mobile-rchge'>
                              <input type='number' placeholder='Enter amount' name='amount' style='margin-top: 6px; border: none;border-bottom: 1px solid black;' required='required' onkeypress='return keyRestrict(event, &#39;1234567890&#39;)' /> 
                            </div>
                            <div class='clearfix'></div>
                        </div>
                      </li>
                      <br>
                        <?php if(!$user_id){?>
                           <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#myModal' style='background: #8874a3;color:white;'>Recharge Now</button>
                           <?php } else {?>
                           <button type='submit' class='btn btn-primary' style='background: #8874a3;color:white;'>Recharge Now</button>
                           <?php } ?>
                      <?php echo form_close() ?>
                  </div>  
                </div>
                  <div id='tab2' class='tab-grid'>
                    <div class='login-form'>
                      <?php echo form_open('Recharge/recharge/mobile') ?>           
                        <li style='list-style: none;'>
                            <h4 style='font-family: Segoe UI;font-size: 14px; color: gray;'>Enter your Postpaid Mobile Number</h4>
                            <input type='number' id='tel' name='mno' pattern='\d{10}' placeholder='Enter Mobile Number' required='required'  onkeypress='return keyRestrict(event, &#39;1234567890&#39;)'/>
                            <p class='validation01'>
                            <span class='invalid' style='font-family: Segoe UI;font-size: 14px; color: gray;'>Please enter a valid mobile number</span>
                            <span class='valid' style='font-family: Segoe UI;font-size: 14px; color: gray;'>That's what we wanted!</span>
                            </p>
                        </li>
                        <li style='list-style: none;'>
                          <div class='agileits-select'>
                          <select name='operator' class='selectpicker show-tick' data-live-search='true' required='required' >
                              <option data-tokens='Select Operator' value="">Select Operator</option>
                              <?php foreach($provider_data as $p){
                                if($p['service_id']==3){
                                  echo '<option value='. $p['id'] .'|'.$p['provider_name']. '>' . $p['provider_name'] . '</option>';
                                }
                              }?>
                          </select>
                          </div>
                        </li>
                        <li style='list-style: none;'>
                            <div class='mobile-right '>
                              <h4 style='font-family: Segoe UI;font-size: 14px; color: gray;margin-top: 15px;'>How Much To Pay?</h4>
                              <div class='mobile-rchge'>
                              <input type='number' placeholder='Enter amount'style='margin-top: 6px; border: none;border-bottom: 1px solid black;' name='amount' required='required' onkeypress='return keyRestrict(event, &#39;1234567890&#39;)'/>
                              </div>
                              <div class='clearfix'></div>
                            </div>
                        </li>
                        <br>
                          <?php if(!$user_id){?>
                           <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#myModal' style='background: #8874a3;color:white;'>Recharge Now</button>
                          <?php } else {?>
                          <button type='submit' class='btn btn-primary' style='background: #8874a3;color:white;'>Recharge Now</button>
                          <?php } ?>
                          <?php echo form_close() ?>                              
                    </div>  
                  </div>
              </div>
              <div class='clearfix'> </div>
            </div>
          </div>
          <div>
          <div class='tabs-box'>
            <div class='login-form'>
              <i class='icon fa fa-television inner-icon' aria-hidden='true'></i> 
              <?php echo form_open('Recharge/recharge/dth') ?>
                <br>
                <li style='list-style: none;'>
                    <h4 style='font-family: Segoe UI;font-size: 14px; color: gray;'>Enter your DTH Subscriber Number</h4>
                    <input type='number' id='tel' name='sub_no' pattern='\d{10}' placeholder='Enter Subscriber number' required='required' onkeypress='return keyRestrict(event, &#39;1234567890&#39;)' />
                    <p class='validation01'>
                    <span class='invalid' style='font-family: Segoe UI;font-size: 14px; color: gray;'>Please enter a valid subscriber number</span>
                    <span class='valid' style='font-family: Segoe UI;font-size: 14px; color: gray;'>That's what we wanted!</span>
                    </p>
                    <br>
                </li>
                <li style='list-style: none;'>
                  <div class='agileits-select'>
                  <!--  <label>Select Operator</label>-->
                    <select name='operator' class='selectpicker show-tick' data-live-search='true' required='required' >
                        <option data-tokens='Select Operator' value="">Select Operator</option>
                        <?php foreach($provider_data as $p){
                          if($p['service_id']==2){
                            echo '<option value=' . $p['id'].'|'.$p['provider_name']. '>' . $p['provider_name'] . '</option>';
                          }
                        }?>
                    </select>
                  </div>
                </li>
                  &nbsp;
                <li style='list-style: none;'>
                  <div class='mobile-right '>
                    <div class='mobile-rchge'>
                        <h4 style='font-family: Segoe UI;font-size: 14px; color: gray;'>How Much To Pay?</h4>
                      <input type='number' placeholder='Enter amount' name='amount' style='margin-top: 6px; border: none;border-bottom: 1px solid black;' required='required'  onkeypress='return keyRestrict(event, &#39;1234567890&#39;)' />
                    </div>
                    <div class='clearfix'></div>
                  </div>
                </li>
                <br>
                <?php if(!$user_id){?>
                  <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#myModal' style='background: #8874a3;color:white;'>Recharge Now</button>
                   <?php } else {?>
                  <button type='submit' class='btn btn-primary' style='background: blue;color:white;'>Recharge Now</button>
                   <?php } ?>
                 <?php echo form_close() ?>                                  
            </div>  
          </div>  
        </div>
          <div>
            <i class='icon fa fa-lightbulb-o inner-icon' aria-hidden='true'></i>
              <div id='tab2' class='tab-grid'>
                <div class='login-form'>

                   <form action='<?php echo site_url('Recharge/electricity')?>' method='post' id='signup'>

                  <ol>  
                    <li>
                      <div class='agileits-select'>
                        <select class='selectpicker show-tick' data-live-search='true' id='operator' name='operator' required>
                          <option data-tokens='Select Operator' value="">Select Operator</option>
                          <?php foreach($provider_data as $p){
                            if($p['service_id']==5){
                              echo '<option value=' . $p['id'].'|'.$p['provider_name'].'>' . $p['provider_name'] . '</option>';
                            }
                          }?>
                        </select>
                      </div>
                    </li>
                    <li>
                      <input type='text' id='customer' name='customer' placeholder="Customer Account Number" required> 
                    </li>
                    <li>
                        <?php if(!$user_id){?>
                        <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#myModal' style='background: #8874a3;color:white;'>Proceed</button>
                        <?php } else {?>
                        <input type='submit' class='submit' value='Proceed' style='background-color: #8874a3;' />
                        <?php } ?>
                    </li>
                  </ol>
                  </form>                                
                  <?php echo form_close() ?>    
                </div>  
              </div>
          </div>
          
          </div> 
      </div>
    </div>
  </div>
    
<!--Plug-in Initialisation-->
    <script type='text/javascript'>
      $(document).ready(function() {
          //Vertical Tab
          $('#parentVerticalTab').easyResponsiveTabs({
              type: 'vertical', //Types: default, vertical, accordion
              width: 'auto', //auto or any width like 600px
              fit: true, // 100% fit in a container
              opened: 'accordion', // Start closed if in accordion view
              tabidentify: 'hor_1', // The tab groups identifier
              activate: function(event) { // Callback function if tab is switched
                  var $tab = $(this);
                  var $info = $('#nested-tabInfo2');
                  var $name = $('span', $info);
                  $name.text($tab.text());
                  $info.show();
              }
          });
      });
    </script>
    <script>
      $(document).ready(function() {
     
       $('#tab2').hide();
       $('#tab3').hide();
       $('#tab4').hide();
       $('.tabs-menu a').click(function(event){
       event.preventDefault();
       var tab=$(this).attr('href');
       $('.tab-grid').not(tab).css('display','none');
       $(tab).fadeIn('slow');
        });
      });
    </script>  

    <!-- //Categories -->
  <!-- Support content -->

<div class='w3l-support'>
  <div class='container'>
    <div class='col-md-5 w3_agile_support_left'>
      <img src='<?php echo base_url();?>axxets/templates/4/images/cus.jpg' alt=' ' class='img-responsive' />
    </div>
    <div class='col-md-7 w3_agile_support_right'>
      <h5>Online Recharge</h5>
      <h3>24/7 Customer Service Support</h3>
      <p>Please reachout to Customer Support team for any issues</p>
      <div class='agile_more'>
        <a href='<?php echo site_url('emart/contact')?>' class='type-4'>
          <span style='background-color: #8874a3;'> Support </span>
          <span style='background-color: #8874a3;'> Support </span>
          <span style='background-color: #8874a3;'> Support </span>
          <span style='background-color: #8874a3;'> Support </span>  
          <span style='background-color: #8874a3;'> Support </span>
          <span style='background-color: #8874a3;'> Support </span>
        </a>
      </div>
    </div>
    <div class='clearfix'> </div>
  </div>
</div>
  <!-- //Support content -->   
<!--offers-->
<div class='w3-offers'style='width: 133.3%;margin-left: -16.7%'>
  <div class='container'>
    <div class='w3-agile-offers' style='background-color:#88d8b0'>
      <h3>Instant Recharge and Payments</h3>
      <p>You can checkout Service Provider site for Best Availbale Offers</p>
    </div>
  </div>
</div>
<!--//offers-->
      
<!--footer-->
<footer style='width: 133.3%;margin-left: -16.7%'>
  <div class='container-fluid'>
    <div class='w3-agile-footer-top-at' style='margin-left: 15%;'>
      <div class='col-md-2 agileits-amet-sed'>
        <h4>Company</h4>
        <ul class='w3ls-nav-bottom'>
          <li><a href='<?php echo site_url('/')?>'>Home</a></li>
          <li><a href='#recharge' id='recharge'>Recharge</a></li>
          <?php if(config_item('enable_ecom')=='Yes'){ ?>
          <li><a href='<?php echo site_url('emart/shop')?>'>Shop</a></li>
          <li><a href='<?php echo site_url('emart/contact')?>'>Contact</a></li>  
          <?php } ?>
          <?php if(!$user_id){ ?>
          <li><a href='<?php echo site_url('site/login')?>'>Login</a></li>  
          <li><a href='<?php echo site_url('site/register')?>'>Register</a></li>
          <?php } else { ?>
          <li><a href='<?php echo site_url('site/logout')?>'>Logout</a></li>  
          <li><a href='<?php echo site_url('member')?>'>My Account</a></li>
          <?php } ?>
        </ul> 
      </div>
      <div class='col-md-3 agileits-amet-sed '>
        <h4>Mobile Recharges</h4>
        <ul class='w3ls-nav-bottom'>
          <li><a href='#recharge' class='scroll'>Airtel</a></li>
          <li><a href='#recharge' class='scroll'>Vodafone</a></li>
          <li><a href='#recharge' class='scroll'>BSNL</a></li>
          <li><a href='#recharge' class='scroll'>Jio</a></li>
          <li><a href='#recharge' class='scroll'>Idea</a></li>  
        </ul> 
      </div>
      <div class='col-md-3 agileits-amet-sed'>
        <h4>DTH Recharges</h4>
        <ul class='w3ls-nav-bottom'>
          <li><a href='#recharge' class='scroll'> Airtel Digital TV Recharges</a></li>
          <li><a href='#recharge' class='scroll'>Dish TV Recharges</a></li>
          <li><a href='#recharge' class='scroll'>Tata Sky Recharges</a></li>
          <li><a href='#recharge' class='scroll'>Reliance Digital TV Recharges</a></li>
          <li><a href='#recharge' class='scroll'>Sun Direct Recharges</a></li>
          <li><a href='#recharge' class='scroll'>Videocon D2H Recharges</a></li>  
        </ul> 
      </div>
      <div class='col-md-3 agileits-amet-sed '>
        <h4>Payment Options</h4>
        <ul class='w3ls-nav-bottom'>
          <li>Credit Cards</li>
          <li>Debit Cards</li>
          <li>Any Visa Debit Card (VBV)</li>
          <li>Direct Bank Debits</li>
          <li>Cash Cards</li> 
        </ul> 
      </div>
      <div class='clearfix'> </div>
    </div>
  </div>
  <div class='w3l-footer-bottom'>
    <div class='container-fluid'>
      <div class='col-md-8 agileits-footer-class'>
        <p ><?php if(config_item('footer_name') != '') { ?>
           &copy; <?php echo date('Y') ?> All Rights Reserved by 
          <?php echo config_item('footer_name') ?>
          <?php } else { ?>
          &copy; <?php echo date('Y') ?> All Rights Reserved | Powered by <?php echo config_item('footer') ?>
        <?php } ?> </p>
      </div>
      <div class='clearfix'> </div>
    </div>
  </div>
</footer>
<!--//footer-->
      
<!-- for bootstrap working -->
<script src='<?php echo base_url();?>axxets/templates/4/js/bootstrap.js'></script>
<!-- //for bootstrap working --><!-- Responsive-slider -->
    <!-- Banner-slider -->
<script src='<?php echo base_url();?>axxets/templates/4/js/responsiveslides.min.js'></script>
   <script>
    $(function () {
      $('#slider').responsiveSlides({
        auto: true,
        speed: 500,
        namespace: 'callbacks',
        pager: true,
      });
    });
  </script>
    <!-- //Banner-slider -->
  <!-- //Responsive-slider -->   
  <!-- Bootstrap select option script -->
  <script src='<?php echo base_url();?>axxets/templates/4/js/bootstrap-select.js'></script>
  <script>
    $(document).ready(function () {
      var mySelect = $('#first-disabled2');

      $('#special').on('click', function () {
        mySelect.find('option:selected').prop('disabled', true);
        mySelect.selectpicker('refresh');
      });

      $('#special2').on('click', function () {
        mySelect.find('option:disabled').prop('disabled', false);
        mySelect.selectpicker('refresh');
      });

      $('#basic2').selectpicker({
        liveSearch: true,
        maxOptions: 1
      });
    });
  </script>
  <!-- //Bootstrap select option script -->
      
  <!-- easy-responsive-tabs -->    
  <link rel='stylesheet' type='text/css' href='<?php echo base_url();?>axxets/templates/4/css/easy-responsive-tabs.css ' />
  <script src='<?php echo base_url();?>axxets/templates/4/js/easyResponsiveTabs.js'></script>
  <!-- //easy-responsive-tabs --> 
      <!-- here stars scrolling icon -->
        <script type='text/javascript'>
          $(document).ready(function() {              
            $().UItoTop({ easingType: 'easeOutQuart' });
                      
            });
        </script>
        <!-- start-smoth-scrolling -->
        <script type='text/javascript' src='<?php echo base_url();?>axxets/templates/4/js/move-top.js'></script>
        <script type='text/javascript' src='<?php echo base_url();?>axxets/templates/4/js/easing.js'></script>
        <script type='text/javascript'>
          jQuery(document).ready(function($) {
            $('.scroll').click(function(event){   
              event.preventDefault();
              $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
          });
        </script>
        <!-- start-smoth-scrolling -->
      <!-- //here ends scrolling icon -->
      <script type='text/javascript'>

   function myFunction() {
       
          $('#navbar').addClass('navbar-inverse');
         
    }
    
   var ns =  $(location).attr('href').split('/#').pop();
  
   if(ns == 'recharge'){
        $('html, body').animate({
        scrollTop: $('#'+ns).offset().top
    }, 2000);
   }
   
$(window).on('scroll', function() {
    
    if($(window).scrollTop() > 50) {
        $('#navbar').addClass('navbar-inverse');
       
   }else {
        //remove the background property so it comes transparent again (defined in your css)
       $('#navbar').removeClass('navbar-inverse');
     
    }
   
});

</script>
<script type='text/javascript'>
$(':text').keypress(function (e) {
var regex = new RegExp('^[a-zA-Z0-9\@.]+$');
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
</script>
</body>
  <!-- //body -->
</html>
  <!-- //html -->

<div class='modal fade' id='myModal'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <!-- Modal Header -->
      <div class='modal-header'>
        <button type='button' data-dismiss='modal'>&times;</button>
        <h1 class='modal-title' style='align-items: center;'><b>Online Recharge</b></h1>
      </div>
      <!-- Modal body -->
      <div class='modal-body'>
        <p>
          <?php echo form_open('site/login') ?>
          <div class='form-group'>
            <label for='user' class='control-label'>ID</label>
            <input type='text' required class='form-control' id='user' name='username' >
            <label for='password' class='control-label'>Password*</label>
            <input type='password' required class='form-control' id='password' name='password'>
          </div>
          <div class='form-group'>
            <button class='btn btn-success'>Login</button> OR
            <button class='btn btn-success' style='background:blue;'><a href='<?php echo site_url('site/register') ?>' style='color:white;'>Register</a></button><br/>
            <br></br>
              <a href='#' data-toggle='modal' data-target='#resetpassword' style='color: blue;'>Forgot Password ?</a>
          </div>
          <?php echo form_close() ?>
      </div>
      <!-- Modal footer -->
    <!--  <div class='modal-footer'>
        <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
      </div>-->
    </div>
  </div>
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
                    <?php echo form_open('site/reset_password') ?>
                    <div class="form-group">
                        <label>Userid</label>
                        <input type="number" class="form-control" name="userid" required onkeypress="return keyRestrict(event, &#39;1234567890&#39;)">
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