<style>
/*--footer--*/

  

footer{
  background:#0b1213;
}
.agileits-amet-sed{
  font-size: 15px;
    text-transform: uppercase;
    color: #fff;
    
    padding-bottom: 10px;
    border-bottom: 1px solid #343535;
    margin: 0 0 25px 0px;
    display: inline !important;
    
    /*width:100 px;*/

}
ul.w3ls-nav-bottom {
    margin-top: 35px !important;
}
.w3-agile-footer-top-at {
    padding: 50px 0;
}
ul li{
    color: #bdbdbd;
    font-size: 14px;
    margin: 14px 0 0 0;
    letter-spacing: 0.3px;

}
.list-unstyled li  a{
  text-decoration:none;
  color: #bdbdbd;
  display: inline-block !important;
}
ul li  a:hover{
  color:#1feae0;
}
.agileits-amet-sed p{
  color:#989696;
  font-size: 0.9em;
  margin: 0.5em 0 0;
}
.agileits-footer-class  p{
  color: #fff;
    font-size: 13px;
    margin-top: 7px;
    letter-spacing: 1px;
}
.agileits-footer-class  p a{
  color:#21eae0;
  text-decoration:none;
}
.agileits-footer-class  p a:hover{
  color:#fff;
}
.w3l-footer-bottom {
  padding: 1.5em 0;
    background:#192223;
}
.agileits-footer-class {
  text-align: right;
}
.w3-footer-logo h2{
  font-size: 30px;
}
.w3-footer-logo h2 a{
  color:#fff;
  text-decoration: none;
}
ul.social{
  padding: 1em 0 0;
}
ul.social li{
  display:inline-block;
}
ul.social  li i{
  width: 16px;
  height: 16px;
  background: url(../images/img-sprite.png) no-repeat 2px -2px ;
  display: block;
  margin: 0 5px;
}
ul.social  li i.gmail{
  background-position: -21px -3px;
}
ul.social  li i.twitter{
  background-position: -46px -5px;
}
ul.social  li i.camera{
  background-position: -73px -5px;
}
ul.social  li i.dribble{
  background-position: -102px -5px;
}
</style>
<footer>
  <div class='container'>
    <div class='w3-agile-footer-top-at row' >
      <div class='col-sm-12 col-md-2  '>
        <h4 class="agileits-amet-sed">Company</h4>
        <p></p>
        <ul class='list-unstyled'>
          <li><a href='<?php echo site_url('/')?>'>Home</a></li>
          <li><a href='<?php echo site_url();?>site/recharge' id='recharge'>Recharge</a></li>
          <?php if(config_item('enable_ecom')=='Yes'){ ?>
          <li><a href='<?php echo site_url('emart/shop')?>'>Shop</a></li>
          <li><a href='<?php echo site_url('emart/contact')?>'>Contact</a></li>  
          <?php } ?>
          <?php if(!$user_id){ ?>
          <li><a href='<?php echo site_url('site/login')?>'>Login</a></li>  
          <li><a href='<?php echo site_url('site/register')?>'>Register</a></li>
          <?php } else { ?>
          <li><a href='<?php echo site_url('member/logout')?>'>Logout</a></li>  
          <li><a href='<?php echo site_url('member')?>'>My Account</a></li>
          <?php } ?>
        </ul> 
      </div>
      <div class='col-sm-12 col-md-2'>
        <h4 class="agileits-amet-sed">Insurance</h4>
        <p></p>
        <ul class='list-unstyled'>
          <li><a href='<?php echo site_url();?>insurance'>Health</a></li>
          <li><a href='<?php echo site_url('insurance/twowheeler')?>'>Two wheeler</a></li>
          <li><a href='<?php echo site_url('insurance/fourwheeler')?>'>Four Wheeler</a></li>
        </ul> 
      </div>
      <div class='col-sm-12 col-md-2 '>
        <h4 class="agileits-amet-sed">Mobile Recharges</h4>
        <ul class='list-unstyled'>
          <li><a href='<?php echo site_url();?>site/recharge' class='scroll'>Airtel</a></li>
          <li><a href='<?php echo site_url();?>site/recharge' class='scroll'>Vodafone</a></li>
          <li><a href='<?php echo site_url();?>site/recharge' class='scroll'>BSNL</a></li>
          <li><a href='<?php echo site_url();?>site/recharge' class='scroll'>Jio</a></li>
          <li><a href='<?php echo site_url();?>site/recharge' class='scroll'>Idea</a></li>  
        </ul> 
      </div>
      <div class='col-md-3'>
        <h4 class="agileits-amet-sed">DTH Recharges</h4>
        <ul class='list-unstyled'>
          <li><a href='<?php echo site_url();?>site/recharge' class='scroll'> Airtel Digital TV Recharges</a></li>
          <li><a href='<?php echo site_url();?>site/recharge' class='scroll'>Dish TV Recharges</a></li>
          <li><a href='<?php echo site_url();?>site/recharge' class='scroll'>Tata Sky Recharges</a></li>
          <li><a href='<?php echo site_url();?>site/recharge' class='scroll'>Reliance Digital TV Recharges</a></li>
          <li><a href='<?php echo site_url();?>site/recharge' class='scroll'>Sun Direct Recharges</a></li>
          <li><a href='<?php echo site_url();?>site/recharge' class='scroll'>Videocon D2H Recharges</a></li>  
        </ul> 
      </div>
      <div class='col-md-2 '>
        <h4 class="agileits-amet-sed">Payment Options</h4>
        <ul class='list-unstyled'>
          <li><a class='scroll' href='#'>Credit Cards</a></li>
          <li><a class='scroll' href='#'>Debit Cards</a></li>
          <li><a class='scroll' href='#'>Any Visa Debit Card (VBV)</a></li>
          <li><a class='scroll' href='#'>Direct Bank Debits</a></li>
          <li><a class='scroll' href='#'>Cash Cards</a></li> 
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