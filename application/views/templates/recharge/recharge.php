<?php 
$user_id = $this->session->user_id;
$page = current_url();
$_SESSION['page'] = $page;
?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo config_item('company_name')?></title>
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width,initial-scale=1.0"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
  <style type="text/css">
   body{
  overflow-x: hidden;
}


.container{
  position: relative;
  display: flex;
  flex-wrap: wrap;
  width: 1100px;
}
.fixed-top.scrolled {
  background-color: #000 !important;
  transition: background-color 200ms linear;
}

.container .icon{
  position: relative;
  width: 50%;
  text-align: center;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;
}

.container .icon .iconBx{
  position: relative;
  margin-left: 40px;  
  padding: 0 5px;
  height: 80px;
  justify-content: center;
  align-items: center;
  border-radius: 4px;
  transition: 0.5s;
  box-shadow: 0 5px 15px rgba(0,0,0,.07);

}
.container .icon .iconBx.active{
  box-shadow: 10px 10px rgba(169,169,169,1);
}
.content{
  position: relative;
  width: 50%;
  overflow: hidden;
  height: 600px;
}

.content .contentBx{
  position: absolute;
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  transition: 0.5s;
  transform: scale(0);
  opacity: 0;
}

.content .contentBx.active{
  transform: scale(1);
  opacity: 1;
  transition-delay: 0.5s;
}
.navbar{
  background-color: rgba(0,0,0,0.592);
}
.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
.centered1{
  font-size: 55px;
  font-weight: 500;
  text-shadow: 6px 6px 0px rgba(0,0,0,0.2);
}
.centered3{
  font-size: 40px;
  margin-top: -35px;
}
.brand_logos{
  list-style: none;
 } 
  ul.brand_logos li {
    margin-left: 20%;
    
    border-radius: 3px;
    float: left;
    height: 60px;
    list-style: outside none none;
    margin: 68px;
    padding: 16px 0;
    
}
.heading{
  text-align: center;
  padding-top: 30px;
  padding-bottom: 30px;
}

.Customer123{
  position: absolute;
  top: 235%;
  left: 50%;
  font-weight: 700;
  transform: translate(-50%, -50%);
  text-shadow: 0px 4px 3px rgba(0,0,0,0.4),
             0px 8px 13px rgba(0,0,0,0.1),
             0px 18px 23px rgba(0,0,0,0.1);

}
.widthhere{
  width: 100%;
}
.jumbotron4{
  width: 100%;
  height: 600px;
}
.footerlist{
  margin-left: -40px; 
}
.footerlist1{
  margin-left: -40px; 
}
.steps{
  width: 100%;
  margin-top: 5%;
}
.testimonial{background: #00d2ff;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #3a7bd5, #00d2ff);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #3a7bd5, #00d2ff); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

height: 450px;
}

.carouselheight{
  height: 700px;
  width: 100%;
}
.iconBx{
  margin-top: 10px;
}
.imageh2{
  color:white ;
  font-size: 35px;
  font-weight: 600;
}
.imageP{
  color: white;
}
.copyright{
  color: white;
  margin-left: 45%;
}
  .navbar-nav{
    margin-left: 45%;
    float: right;
  }
@media only screen 
  and (min-device-width: 320px) 
  and (max-device-width: 568px)
  and (-webkit-min-device-pixel-ratio: 2) {
.container{
  width: 500px;
  margin-left: -84px;
}
.content{

  margin-left: -40px;
  width: 230px;
  height: 730px;
}
.card{
  max-width: 600px;
}
.widthhere{
  width: 70%;
  margin-left: 20%
}

.jumbotron4{
  width: 90%;
  height: 1100px;
}
  ul.brand_logos li {

    height: 10px;
    list-style: outside none none;
    margin: 40px;
    padding: 10px 0; 
}
.footerlist{
  margin-left: 160px; 
}
.footerlist1{
  margin-left: 110px; 
}
.centered1{
  margin: -100px;
  margin-top: 17%;
  font-size: 30px;
  font-weight: 500;
  text-shadow: 6px 6px 0px rgba(0,0,0,0.2);
}
.centered3{
  margin: -100px;
  font-size: 25px;
  margin-top: -35px;
  text-shadow: 6px 6px 0px rgba(0,0,0,0.2);
}
.steps{
  width: 75%;
  margin-left: 17%
}
.carouselheight{
  height: 350px;
  width: 100%;
}
.navbar{
  max-width: 100%;
} 
body{
  width: 100%;
}
.supportmargin{
  margin-top: 45%;
}
.imageh2{
  color:white ;
  font-size: 20px;
  margin-left: -90px;
  margin-right: -70px;
  font-weight: 600;
  margin-top: -340px;
}
.imageP{
   margin-left: -90px;
  margin-right: -70px;
  color:white;
  font-size: 10px;
}
.copyright{
  color: white;
  margin-left: 38%;
}
}
@media only screen 
    and (device-width : 375px) 
    and (device-height : 812px) 
    and (-webkit-device-pixel-ratio : 3) { 
    .imageh2{
    color:white ;
    font-size: 20px;
    margin-left: -90px;
    margin-right: -70px;
    font-weight: 600;
    margin-top: -640px;
}  
 .navbar{
  max-width: 100%;
} 

}
@media screen 
  and (device-width: 360px) 
  and (device-height: 640px) 
  and (-webkit-device-pixel-ratio: 3) {
  .carouselheight{
  height: 350px;
  width: 375px;
  }
  .navbar{
  max-width: 100% ;
} 
    .imageh2{
    color:white ;
    font-size: 20px;
    margin-left: -90px;
    margin-right: -70px;
    font-weight: 600;
    margin-top: -240px;
} 
body{
  width: 100%;
}
}
@media all and (device-width: 768px) and (orientation:portrait) {
 .carouselheight{
  height: 350px;
  width: 100%;
  }
  .imageh2{
  color:white ;
  font-size: 20px;
  margin-left: -90px;
  margin-right: -70px;
  font-weight: 600;
  margin-top: -1340px;
} 
footer{
  margin-top: 70%;
 }
}
@media only screen 
  and (min-device-width: 1024px) 
  and (max-device-width: 1366px)
  and (-webkit-min-device-pixel-ratio: 2) {
  footer{
    margin-top: 20%;
  }
  .navbar-nav{
    margin-left: 20%;
  }
  }


}

 </style>   
</head>
<body>

<nav class="navbar fixed-top navbar-expand-lg navbar-dark bgcolor">
  <a class="navbar-brand" href="#" style="font-size: 30px;font-weight: 700;color:#E2E095"><?php echo config_item('company_name') ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto" style="float: right;">
      <li class="nav-item active">
        <a class="nav-link" href="#" style="color:#E2E095">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" style="color:#E2E095">Features</a>
      </li>
      <!--<li class="nav-item">
        <a class="nav-link" href="#" style="color:#E2E095">Pricing</a>
      </li>-->
      <li class="nav-item">
        <a class="nav-link" href="#" style="color:#E2E095">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#recharge" style="color:#E2E095">Recharge</a>
      </li>
      <?php if($user_id){ ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('member/logout')?>" style="color:#E2E095">Logout</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('member')?>" style="color:#E2E095">My Account</a>
      </li>
      <?php }else{ 
      	$page = current_url();
        $_SESSION['page'] = $page; ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('site/login')?>" data-toggle="modal" data-target="#myModal" style="color:#E2E095">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('site/register')?>" style="color:#E2E095">Register</a>
      </li>
  <?php } ?>
    </ul>
  </div>
</nav>

<section>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
       <img class="d-block carouselheight" src="<?php echo base_url();?>axxets/templates/5/operator.jpg" alt="Second slide">
       <div class="centered"><h2 class="centered3" style="color:#D8EDCA"></h2>
       </div>
      </div>
      <div class="carousel-item ">
       <img class="d-block carouselheight" src="<?php echo base_url();?>axxets/templates/5/dth.jpg" alt="First slide">
        <div class="centered"><h2 class="centered3" style="color: white;margin-top: 20px;">Recharge your DTH faster</h2></div>  
      </div>
      <div class="carousel-item">
       <img class="d-block carouselheight" src="<?php echo base_url();?>axxets/templates/5/electricity.jpg" alt="Second slide">
       <div class="centered"><h2 class="centered3" style="color:#D8EDCA">Pay your Electricity bills</h2>
       </div>
      </div>
      
      <div class="carousel-item">
         <img class="d-block carouselheight" src="<?php echo base_url();?>axxets/templates/5/1.jpg" alt="Third slide">
         <div class="centered"><h2 class="centered1" style="color:#D8EDCA">Pay your mobile bills now!</h2></div>  
      </div>
   </div>
</div>
</section>

<div class="jumbotron mt-4"id="recharge" style="height: 600px; background: white;">
  <div class="container">
    <div class="icon">
      <!--<div class="iconBx active" data-id="content0" style="background:#003152; color: white; width: 80px;">
          <div class="d-block">
            <h6 class="mt-2">Check Balance</h6>
            <i class="fas fa-mobile-alt i"></i>
          </div>
      </div>-->
      <div class="iconBx active" data-id="content1" style="background:#003152; color: white; width: 80px;">
          <div class="d-block">
            <h6 class="mt-3">Prepaid</h6>
            <i class="fas fa-mobile-alt i"></i>
          </div>
      </div> 
      <div class="iconBx" data-id="content2" style="background: #003152; color: white; width: 80px;">
        <div class="d-block">
            <h6 class="mt-3">PostPaid</h6>
            <i class="fas fa-mobile-alt i"></i>
        </div>   
      </div>
      <div class="iconBx" data-id="content3" style="background: #003152; color: white; width: 80px;">
        <div class="d-block">
            <h6 class="mt-3">DTH</h6>
            <i class="fas fa-tv i"></i> 
        </div>
      </div>
      <div class="iconBx" data-id="content4" style="background: #003152;color: white;">
        <div class="d-block">
            <h6 class="mt-3">Electricity</h6>
            <i class="far fa-lightbulb i"></i>
        </div> 
      </div>
      <div class="iconBx" data-id="content5" style="background: #003152;color: white;">
        <div class="d-block">
            <h6 class="mt-3">Telephone</h6>
            <i class="fas fa-phone i"></i> 
        </div>
      </div>
      <div class="iconBx" data-id="content6" style="background: #003152;color: white;width: 80px;">
        <div class="d-block">
            <h6 class="mt-2">Broad Band</h6>
            <i class="fas fa-wifi i"></i>
        </div> 
      </div>
      <div class="iconBx" style="display:none;" data-id="content7" style="background: #003152;color: white;width: 80px;">
        <div class="d-block">
            <h6 class="mt-3">Piped Gas</h6>
            <i class="fas fa-flask i"></i>
        </div> 
      </div>
      <div class="iconBx" data-id="content8" style="background: #003152;color: white;width: 80px;">
        <div class="d-block">
            <h6 class="mt-3">Water</h6>
            <i class="fas fa-tint i"></i>
        </div> 
      </div>
      <div class="iconBx" data-id="content9" style="background: #003152; color: white;width: 80px;">
        <div class="d-block">
            <h6 class="mt-3">Insurance</h6>
            <i class="fas fa-dollar-sign i "></i>
        </div> 
      </div>
    </div> 
    <div class="content">
        <div class="contentBx" id="content0">
            <div class="shadow-lg p-3 mb-5 bg-white rounded mt-4">
                <div class="text"> 
                  <i class="fas fa-mobile-alt i" style="font-size: 70px; margin-left: 40%"></i>
                    <form>
                      <div class="form-group pt-3">
                         <input type="number" class="form-control" placeholder="Enter Mobile Number" required="required">
                         <small id="emailHelp" class="form-text text-muted">Please enter a valid mobile number. Thats what we wanted!</small>
                      </div>
                      <select class="form-control" id="exampleFormControlSelect1">
                        <option>Select Operator</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                      <div class="form-group form-check" style="margin-top: 15px;">
                         <input type="checkbox" class="form-check-input" id="exampleCheck1" required="required">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                      </div>
                      <button type="submit" class="btn btn-primary">Proceed</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="contentBx active" id="content1" style="border: none;"> 
          <div class="shadow-lg p-3 mb-5 bg-white rounded mt-4">
              <?php echo $this->session->flashdata('common_flash') ?>  
                <div class="text"> 
                    <i class="fas fa-mobile-alt i" style="font-size: 70px; margin-left: 40%"></i>
                    <form method="post" action="<?php echo site_url('recharge/recharge_hstm/mobile')?>">
                      <div class="form-group pt-3">
                         <input type="number" class="form-control" placeholder="Enter Mobile Number" required="required" name="mobno" id="mobno">
                         <small id="emailHelp" class="form-text text-muted">Please enter a valid mobile number. Thats what we wanted!</small>
                      </div>
                      <select class="form-control" id="exampleFormControlSelect1" name="operator">
                        <option>Select Operator</option>
                        <option value="AR">AIRTEL</option>
                        <option value="BS">BSNL</option>
                        <option value="ID">IDEA</option>
                        <option value="IK">IDEA KERALA</option>
                        <option value="VF">VODAFONE</option>
                        <option value="RJ">RELIANCE JIO</option>
                        <option value="TI">TATA INDICOM</option>
                        <option value="TD">TATA DOCOMO</option>
                        <option value="AI">AIRCEL</option>
                        <option value="TE">TELENOR</option>
                        <option value="VG">VIRGIN GSM</option>
                        <option value="VC">VIRGIN CDMA</option>
                        <option value="MTS">MTS</option>
                        <option value="MM">MTNL-TALKTIME</option>
                        <option value="MD">MTNL-SPECIAL TARIFF</option>
                        <option value="BR">BSNL VALIDITY/SPECIAL</option>
                        <option value="TB">DOCOMO GSM SPECIAL</option>
                        <option value="UN">UNINOR</option>
                        <option value="UNS">UNINOR SPECIAL</option>
                        <option value="BSK">BSNL TOPUP (J&K)</option>
                        <option value="BSJ">BSNL SPECIAL ( J&K )</option>
                        <option value="JKI">J&K ( IDEA EXPRESS )</option>
                        <option value="JKJ">JIO-JK  </option>
                      </select>
                      <div class="form-group pt-3">
                      <select class="form-control" id="exampleFormControlSelect1" name="stv">
                        <option>Please Select</option>
                        <option value="0">TOPUP</option>
                        <option value="1">SCHEME/SPECIAL RECHARGE</option>
                      </select>
                    </div>
                      <div class="form-group pt-3">
                        <label for="pay">How much to pay?</label>
                         <input type="number" class="form-control" placeholder="Enter Amount" required="required" name="amount" id='amount'>
                      </div>
                      <div class="form-group form-check">
                         <input type="checkbox" class="form-check-input" id="exampleCheck1" required="required">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                      </div>
                      <button type="submit" class="btn btn-primary">Proceed</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="contentBx" id="content2">
            <div class="shadow-lg p-3 mb-5 bg-white rounded mt-4">
                <div class="text"> 
                  <i class="fas fa-mobile-alt i" style="font-size: 70px; margin-left: 40%"></i>
                    <form method="post" action="<?php echo site_url('recharge/recharge_hstm/mobile')?>">
                      <div class="form-group pt-3">
                         <input type="number" class="form-control" placeholder="Enter Mobile Number" required="required" name='mobno'>
                         <small id="emailHelp" class="form-text text-muted">Please enter a valid mobile number. Thats what we wanted!</small>
                      </div>
                      <select class="form-control" id="exampleFormControlSelect1" name="operator">
                        <option>Select Operator</option>
                        <option value="AP">AIRTEL POSTPAID</option>
                        <option value="BP">BSNL POSTPAID</option>
                        <option value='IP'>IDEA POSTPAID</option>
                        <option value="VP">VODAFONE POSTPAID</option>
                        <option value='RP'>RELIANCE JIO POSTPAID</option>
                        <option value='TP'>TATA POSTPAID</option>
                        
                        
                      </select>
                      <div class="form-group pt-3">
                        <label for="pay">How much to pay?</label>
                         <input type="number" class="form-control" placeholder="Enter Amount" required="required" name='amount'>
                      </div>
                      <div class="form-group form-check">
                         <input type="checkbox" class="form-check-input" id="exampleCheck1" required="required">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                      </div>
                      <button type="submit" class="btn btn-primary">Proceed</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="contentBx" id="content3">
            <div class="shadow-lg p-3 mb-5 bg-white rounded mt-4">
                <div class="text"> 
                    <i class="fas fa-tv i" style="font-size: 70px; margin-left: 40%"></i>
                    <form method="post" action="<?php echo site_url('recharge/recharge_hstm/dth')?>">
                      <div class="form-group pt-3">
                         <input type="number" class="form-control" placeholder="Enter Subscriber Number" required="required" name="sub_no" id="sub_no">
                         <small id="emailHelp" class="form-text text-muted">Please enter a valid Subscriber number. Thats what we wanted!</small>
                      </div>
                      <div class="form-group pt-3">
                       
                         <input type="number" class="form-control" placeholder="Enter Mobile Number" required="required" name="mobno" id="mobno">
                      </div>
                      <select class="form-control" id="exampleFormControlSelect1" name="operator">
                        <option>Select Operator</option>
                        <option value="AD">AIRTEL DTH</option>
                        <option value="BT">BIG TV DTH </option>
                        <option value='DT'>DISH TV DTH</option>
                        <option value="TS">TATA SKY DTH</option>
                        <option value='VD'>VIDEOCON DTH</option>
                        <option value='ST'>SUN TV DTH</option>
                        
                      </select>
                      <div class="form-group pt-3">
                        <label for="pay">How much to pay?</label>
                         <input type="number" class="form-control" placeholder="Enter Amount" required="required" name="amount" id="amount">
                      </div>
                      <div class="form-group form-check">
                         <input type="checkbox" class="form-check-input" id="exampleCheck1" required="required">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                      </div>
                      <button type="submit" class="btn btn-primary">Proceed</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="contentBx" id="content4" style="width: 70%;margin-left: 70px;">

            <div class="shadow-lg p-3 mb-5 bg-white rounded mt-4">
            	<small class="form-text" style="color:#FF3383;">Note:Please pay the complete amount. As partial payments won't be accepted.</small>
                <div class="text"> 
                    <i class="fas fa-lightbulb i" style="font-size: 70px; margin-left: 40%"></i>
                    <form method="post" action="<?php echo site_url('recharge/recharge_hstm/utility')?>">
                      <div class="form-group pt-3">
                         <input type="number" class="form-control" placeholder="Enter Customer Account Number" required="required" name="customer" id="customer">
                         <small id="emailHelp" class="form-text text-muted">Please enter a valid Subscriber number. Thats what we wanted!</small>
                      </div>
                      <div class="form-group pt-3">
                        
                         <input type="number" class="form-control" placeholder="Enter Mobile Number" required="required" name="mobno" id="mobno">
                      </div>
                      <select class="form-control" id="exampleFormControlSelect1" name="operator">
                        <option>Select Operator</option>
                        <option value="PGE">PASCHIM GUJARAT VIJ COMPANY LIMITED PGVCL</option>
                        <option value="MGE">MADHYA GUJARAT VIJ COMPANY LIMITED (MGVCL)</option>
                        <option value='UGE'>UTTAR GUJARAT VIJ COMPANY LIMITED (UGVCL)</option>
                        <option value="DGE">DAKSHIN GUJARAT VIJ COMPANY LIMITED (DGVCL)</option>
                        <option value='TAE'>TORRENT POWER - AGRA</option>
                        <option value='MSE'>MSEDC LIMITED</option>
                        <option value='REE'>ADANI ELECTRICITY MUMBAI LTD</option>
                        <option value='BRE'>BSES RAJDHANI POWER LIMITED</option>
                        <option value='BYE'>BSES YAMUNA POWER LIMITED</option>
                        <option value='NDE'>TATA POWER-DELHI</option>
                        <option value='NDE'>TATA POWER-DELHI</option>
                        <option value='BME'>BEST UNDERTAKING - MUMBAI </option>
                        <option value='NNE'>NOIDA POWER COMPANY LIMITED</option>
                        <option value='TTE'>TRIPURA STATE ELECTRICITY CORPORATION LTD</option>
                        <option value='MPE'>MP PASCHIM KSHETRA VIDYUT VITARAN - INDORE</option>
                        <option value='JUE'>JAMSHEDPUR UTILITIES AND SERVICES COMPANY LIMITED</option>
                        <option value='IBE'>INDIA POWER CORPORATION LIMITED - BIHAR</option>
                        <option value='CCE'>CHHATTISGARH STATE ELECTRICITY BOARD</option>
                        <option value='CWE'>CALCUTTA ELECTRICITY SUPPLY LTD (CESC)</option>
                        <option value='BBE'>BANGALORE ELECTRICITY SUPPLY COMPANY</option>
                        <option value='AAE'>ASSAM POWER DISTRIBUTION COMPANY LTD RAPDR</option>
                        <option value='BEE'>BHARATPUR ELECTRICITY SERVICES LTD. (BESL)</option>
                        <option value='BKE'>BIKANER ELECTRICITY SUPPLY LIMITED (BKESL)</option>
                        <option value='DDE'>DAMAN AND DIU ELECTRICITY</option>
                        <option value='DNE'>DNH POWER DISTRIBUTION COMPANY LIMITED</option>
                        <option value='APE'>APEPDCL-EASTERN POWER DISTRIBUTION CO AP LTD</option>
                        <option value='GEE'>GULBARGA ELECTRICITY SUPPLY COMPANY LIMITED GESCOM</option>
                        <option value='IWE'>INDIA POWER CORPORATION - WEST BENGAL</option>
                        <option value='JDE'>JODHPUR VIDYUT VITRAN NIGAM LIMITED (JDVVNL)</option>
                        <option value='JIE'>JAIPUR VIDYUT VITRAN NIGAM (JVVNL)</option>
                        <option value='KTE'>KOTA ELECTRICITY DISTRIBUTION LIMITED (KEDL)</option>
                        <option value='MHE'>MEGHALAYA POWER DIST CORP LTD</option>
                        <option value='MZE'>MUZAFFARPUR VIDYUT VITRAN LIMITED</option>
                        <option value='NBE'>NORTH BIHAR POWER DISTRIBUTION COMPANY LTD</option>
                        <option value='NSE'>NESCO, ODISHA</option>
                        <option value='SBE'>SOUTH BIHAR POWER DISTRIBUTION COMPANY LTD</option>
                        <option value='STE'>SNDL NAGPUR</option>
                        <option value='SDE'>SOUTHCO, ODISHA</option>
                        <option value='ASE'>APSPDCL-SOUTHERN POWER DISTRIBUTION CO AP LTD</option>
                        <option value='TME'>TATA POWER - MUMBAI</option>
                        <option value='WSE'>WESCO UTILITY</option>
                        <option value='TNE'>TAMIL NADU ELECTRICITY BOARD (TNEB)</option>
                        <option value='AJE'>TP AJMER DISTRIBUTION LTD (TPADL)</option>
                        <option value='UKE'>UTTARAKHAND POWER CORPORATION LIMITED</option>
                        <option value='UBE'>UTTAR PRADESH POWER CORP LTD (UPPCL) - URBAN</option>
                        <option value='URE'>UTTAR PRADESH POWER CORP LTD (UPPCL) - RURAL</option>
                        <option value='DHE'>DAKSHIN HARYANA BIJLI VITRAN NIGAM (DHBVN)</option>
                        <option value='PSE'>PUNJAB STATE POWER CORPORATION LTD (PSPCL)  PSE Account No  Bill Amount Mobile No   </option>
                        <option value='HNE'>HUBLI ELECTRICITY SUPPLY COMPANY LTD (HESCOM)</option>
                        <option value='UHE'>UTTAR HARYANA BIJLI VITRAN NIGAM (UHBVN)</option>
                        <option value='JBL'>JHARKHAND BIJLI VITRAN NIGAM LTD (JBVNL)</option>
                        <option value='WBE'>WEST BENGAL STATE ELECTRICITY DISTRIBUTION CO. LTD</option>
                        <option value='THE'>TORRENT POWER - AHMEDABAD</option>
                        <option value='HPE'>HIMACHAL PRADESH STATE ELECTRICITY BOARD (HPSEB)  </option>
                        <option value='CRE'>CHAMUNDESHWARI ELECTRICITY SUPPLY CORP LTD (CESCOM  </option>
                        <option value='TBE'>TORRENT POWER - BHIWANDI</option>
                        <option value='TSE'>TORRENT POWER - SURAT</option>
                        <option value='MRE'>MP POORV KSHETRA VIDYUT VITARAN - RURAL</option>
                        <option value='MME'>MP MADHYA KSHETRA VIDYUT VITARAN CO. LTD.-RURAL</option>
                        <option value='MUE'>MP MADHYA KSHETRA VIDYUT VITARAN CO. LTD.-URBAN</option>
                        <option value='TLE'>TELANGANA SOUTHERN POWER DISTRIBUTION CO LTD</option>
                        <option value='ANE'>ASSAM POWER DISTRIBUTION COMPANY LTD (NON-RAPDR)</option>
                        <option value='MKE'>M.P. POORV KSHETRA VIDYUT VITARAN - URBAN</option>
                        <option value='SPE'>SIKKIM POWER - RURAL (SKMPWR)</option>
                        <option value='SUE'>SIKKIM POWER (URBAN)</option>
                        <option value='KNE'>KANPUR ELECTRICITY SUPPLY COMPANY</option>
                        <option value='NME'>NDMC ELECTRICITY</option>
                        <option value='GOE'>GOA ELECTRICITY DEPARTMENT</option>
                        <option value='NGA'>DEPARTMENT OF POWER - NAGALAND</option>
                        <option value='MSD'>MESCOM - MANGALORE</option>
                        <option value='COE'>CESU - ODISHA</option>
                        <option value='KSE'>KSEBL - KERALA</option>
                        <option value='PME'>POWER & ELECTRICITY DEPARTMENT - MIZORAM  </option>
                        <option value='EDP'>ELECTRICITY DEPARTMENT - PUDUCHERRY </option>

                      </select>
                      <div class="form-group pt-3">
                        <label for="pay">How much to pay?</label>
                         <input type="number" class="form-control" placeholder="Enter Amount" required="required" name="amount">
                      </div>
                      <input type="hidden" class="form-control" required="required" name="param_type" id="param_type">
                      <button type="submit" class="btn btn-primary mt-3">Proceed</button>
                    </form>
                </div>
            </div>
        </div>
                <div class="contentBx" id="content5">
            <div class="shadow-lg p-3 mb-5 bg-white rounded mt-4">
            	<small class="form-text" style="color:#FF3383;">Note:Please pay the complete amount. As partial payments won't be accepted.</small>
                <div class="text"> 
                    <i class="fas fa-phone i" style="font-size: 70px; margin-left: 40%"></i>
                    <form method="post" action="<?php echo site_url('recharge/recharge_hstm/landline')?>" >
                      <div class="form-group pt-3">
                         <input type="number" class="form-control" placeholder="Telephone Number(With STD Code)" required="required" name="customer">
                         <small id="emailHelp" class="form-text text-muted">Please enter a valid Landline number with STD code excluding 0.</small>
                      </div>
                      <div class="form-group pt-3">
                         <input type="number" class="form-control" placeholder="Enter Account Number" required="required" name="acc_no">
                         <small id="emailHelp" class="form-text text-muted">Please enter Landline Account Number.</small>
                      </div>
                      <select class="form-control" id="exampleFormControlSelect1" name="operator">
                        <option>Select Operator</option>
                        <option value="AD">AIRTEL LANDLINE</option>
                         <option value="BIL">BSNL - INDIVIDUAL</option>
                        <option value="BT">BSNL- CORPORATE</option>
                        <option value='IL'>MTNL - DELHI</option>
                        <option value='ML'>MTNL - MUMBAI</option>
                        <option value='DL'>TATA DOCOMO CDMA LANDLINE</option>
                      </select>
                      <div class="form-group pt-3">
                        
                         <input type="number" class="form-control" placeholder="Enter Mobile Number" required="required" name="mobno" id="mobno">
                      </div>
                      <div class="form-group pt-3">
                        <label for="pay">How much to pay?</label>
                         <input type="number" class="form-control" placeholder="Enter Amount" required="required" name="amount">
                      </div>
                      <div class="form-group form-check">
                         <input type="checkbox" class="form-check-input" id="exampleCheck1" required="required">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                      </div>
                      <button type="submit" class="btn btn-primary">Proceed</button>
                    </form>
                </div>
            </div>
        </div>
                <div class="contentBx" id="content6">
            <div class="shadow-lg p-3 mb-5 bg-white rounded mt-4">
            	<small class="form-text" style="color:#FF3383;">Note:Please pay the complete amount. As partial payments won't be accepted.</small>
                <div class="text"> 
                    <i class="fas fa-wifi i" style="font-size: 70px; margin-left: 40%"></i>
                    <form method="post" action="<?php echo site_url('recharge/recharge_hstm/utility')?>">
                      <div class="form-group pt-3">
                         <input type="number" class="form-control" placeholder="Enter Customer Account Number" required="required" name="customer" id="customer">
                         <small id="emailHelp" class="form-text text-muted">Please enter a valid number. Thats what we wanted!</small>
                      </div>
                      <select class="form-control" id="exampleFormControlSelect1" name="operator">
                        <option>Select Operator</option>
                        <option value="AFB">ACT FIBERNET</option>
                        <option value="ABB">AIRTEL BROADBAND</option>
                        <option value="CBB">CONNECT BROADBAND</option>
                        <option value="HBB">HATHWAY BROADBAND</option>
                        <option value="NBB">NEXTRA BROADBAND</option>
                        <option value="SBB">SPECTRANET BROADBAND</option>
                        <option value="TBB">TIKONA BROADBAND</option>
                        <option value="TTB">TTN BROADBAND</option>
                        <option value="DBB">D VOIS COMMUNICATIONS</option>
                        <option value="ANB">ASIANET BROADBAND</option>
                        <option value="FBB">FUSIONNET WEB SERVICES</option>
                        <option value="CWB">COMWAY BROADBAND</option>
                        <option value="TIB">TIMBL BORADBAND</option>
                        <option value="DEN">DEN BORADBAND</option>
                        <option value="MNET">M-NET FIBER FAST</option>
                        <option value="INB">INSTANET BROADBAND</option>
                        <option value="NETPL">NETPLUS BROADBAND</option>

                      </select>
                      <div class="form-group pt-3">
                        
                         <input type="number" class="form-control" placeholder="Enter Mobile Number" required="required" name="mobno" id="mobno">
                      </div>
                      <div class="form-group pt-3">
                        <label for="pay">How much to pay?</label>
                         <input type="number" class="form-control" placeholder="Enter Amount" required="required" name="amount">
                      </div>
                      <div class="form-group form-check">
                         <input type="checkbox" class="form-check-input" id="exampleCheck1" required="required">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                      </div>
                      <button type="submit" class="btn btn-primary mt-3">Proceed</button>
                    </form>
                </div>
            </div>
        </div>
                <div class="contentBx" id="content7" style="width: 70%;margin-left: 70px;">
            <div class="shadow-lg p-3 mb-5 bg-white rounded mt-4">
            	<small class="form-text" style="color:#FF3383;">Note:Please pay the complete amount. As partial payments won't be accepted.</small>
                <div class="text"> 
                    <i class="fas fa-flask i" style="font-size: 70px; margin-left: 40%"></i>
                    <form method="post" action="<?php echo site_url('recharge/recharge_hstm/utility')?>">
                      <div class="form-group pt-3">
                         <input type="number" class="form-control" placeholder="Enter Customer Account Number" required="required" name="customer">
                         <small id="emailHelp" class="form-text text-muted">Please enter a valid Account number. Thats what we wanted!</small>
                      </div>
                      <select class="form-control" id="exampleFormControlSelect1">
                        <option>Select Gas Operator</option>
                        <option value="BG">BHARAT GAS</option>
                        <option value="GGL">GREEN GAS LIMITED(GGL)</option>
                        <option value="VGG">VADODARA GAS</option>
                        <option value="TNG">TRIPURA NATURAL GAS</option>
                        <option value="SUG">SITI ENERGY</option>
                        <option value="SGG">SABARMATI GAS</option>
                        <option value="MNG">MAHARASHTRA NATURAL GAS </option>
                        <option value="MMG">MAHANAGAR GAS </option>
                        <option value="IPG">INDRAPRASTHA GAS </option>
                        <option value="IAG">INDIANOIL - ADANI GAS </option>
                        <option value="UCG">UNIQUE CENTRAL PIPED GASES  </option>
                        <option value="HCG">HARYANA CITY GAS</option>
                        <option value="CGG">CHAROTAR GAS SAHAKARI MANDALI</option> 
                        <option value="CUG">CENTRAL UP GAS LIMITED  </option>
                        <option value="AVG">AAVANTIKA GAS</option>
                        <option value="IRG">IRM ENERGY</option>
                        <option value="AGC">ASSAM GAS COMPANY LIMITED</option>
                        <option value="BPCL">BHARAT PETROLEUM CORPORATION LIMITED (BPCL) </option>
                        <option value="AG">ADANI GAS</option>
                        <option value="GGCL">GUJARAT GAS COMPANY LTD</option>
                        
                        
                      </select>
                      <div class="form-group pt-3">
                        
                         <input type="number" class="form-control" placeholder="Enter Mobile Number" required="required" name="mobno" id="mobno">
                      </div>
                       <div class="form-group pt-3">
                        <label for="pay">How much to pay?</label>
                         <input type="number" class="form-control" placeholder="Enter Amount" required="required" name="amount">
                      </div>
                      <button type="submit" class="btn btn-primary mt-3">Proceed</button>
                    </form>
                </div>
            </div>
        </div>
                <div class="contentBx" id="content8"style="width: 70%;margin-left: 70px;">
            <div class="shadow-lg p-3 mb-5 bg-white rounded mt-4">
            	<small class="form-text" style="color:#FF3383;">Note:Please pay the complete amount. As partial payments won't be accepted.</small>
                <div class="text"> 
                    <i class="fas fa-tint i" style="font-size: 70px; margin-left: 40%"></i>
                    <form method="post" action="<?php echo site_url('recharge/recharge_hstm')?>">
                      <div class="form-group pt-3">
                         <input type="number" class="form-control" placeholder="Enter Customer Account Number" required="required">
                         <small id="emailHelp" class="form-text text-muted">Please enter a valid Account number. Thats what we wanted!</small>
                      </div>
                      <select class="form-control" id="exampleFormControlSelect1">
                        <option>Select Water Operator</option>
                        <option value="BKW">BANGALORE WATER SUPPLY AND SEWERAGE BOARD</option>
                        <option value="BMW">BHOPAL MUNICIPAL CORPORATION</option>
                        <option value="DDW">DELHI JAL BOARD</option>
                        <option value="GWW">GREATER WARANGAL MUNICIPAL CORPORATION</option>
                        <option value="GMW">GWALIOR MUNICIPAL CORPORATION</option>
                        <option value="HTW">HYDERABAD METROPOLITAN WATER SUPPLY AND SEWERAGE B  </option>
                        <option value="IMW">INDORE MUNICIPAL CORPORATION</option>
                        <option value="JMW">JABALPUR MUNICIPAL CORPORATION</option>
                        <option value="JPW">MUNICIPAL CORPORATION JALANDHAR</option>
                        <option value="JWW">MUNICIPAL CORPORATION LUDHIANA - WATER</option>
                        <option value="HGW">MUNICIPAL CORPORATION OF GURUGRAM </option>
                        <option value="NDW">NEW DELHI MUNICIPAL COUNCIL (NDMC)  </option>
                        <option value="PMW">PUNE MUNICIPAL CORPORATION  </option>
                        <option value="SGW">SURAT MUNICIPAL CORPORATION </option>
                        <option value="UMW">UJJAIN NAGAR NIGAM - PHED </option>
                        <option value="RBW">URBAN IMPROVEMENT TRUST (UIT) - BHIWADI </option>
                        <option value="UUW">UTTARAKHAND JAL SANSTHAN</option>
                        <option value="SMW">SILVASSA MUNICIPAL COUNCIL  </option>
                        <option value="KWA">KERALA WATER AUTHORITY (KWA)</option>
                        <option value="PCMC">PIMPRI CHINCHWAD MUNICIPAL CORPORATION (PCMC)</option>
                        <option value="MCC">MYSURU CITY CORPORATION</option>
                        <option value="HUDA">HARYANA URBAN DEVELOPMENT AUTHORITY</option>
                        <option value="DPHE">DEPARTMENT OF PUBLIC HEALTH ENGINEERING-WATER, MIZ</option>
                        <option value="RMC">RANCHI MUNICIPAL CORPORATION</option>
                        <option value="DDA">DELHI DEVELOPMENT AUTHORITY (DDA) - WATER</option>
                      </select>
                      <div class="form-group pt-3">
                        
                         <input type="number" class="form-control" placeholder="Enter Mobile Number" required="required" name="mobno" id="mobno">
                      </div>
                       <div class="form-group pt-3">
                        <label for="pay">How much to pay?</label>
                         <input type="number" class="form-control" placeholder="Enter Amount" required="required" name="amount">
                      </div>
                      <button type="submit" class="btn btn-primary mt-3">Proceed</button>
                    </form>
                </div>
            </div>
        </div>
                <div class="contentBx" id="content9">
            <div class="shadow-lg p-3 mb-5 bg-white rounded mt-4">
            	<small class="form-text" style="color:#FF3383;">Note:Please pay the complete amount. As partial payments won't be accepted.</small>
                <div class="text"> 
                    <i class="fas fa-dollar-sign i" style="font-size: 70px;margin-left: 40%"></i>
                    <form method="post" action="<?php echo site_url('recharge/recharge_hstm/utility')?>">
                      <div class="form-group pt-3">
                         <input type="number" class="form-control" placeholder="Enter Customer Account Number" required="required" name="customer">
                         <small id="emailHelp" class="form-text text-muted">Please enter a valid Account number. Thats what we wanted!</small>
                      </div>
                      <select class="form-control" id="exampleFormControlSelect1" name="operator">
                        <option>Select Operator</option>
                        <option value="HLI">HDFC LIFE INSURANCE </option>
                        <option value="ILI">ICICI PRUDENTIAL LIFE INSURANCE </option>
                        <option value="TALI">TATA AIA LIFE INSURANCE </option>
                        <option value="TAI">TATA AIG GENERAL INSURANCE  </option>

                      </select>
                      <div class="form-group pt-3">
                        
                         <input type="number" class="form-control" placeholder="Enter Mobile Number" required="required" name="mobno" id="mobno">
                      </div>
                       <div class="form-group pt-3">
                        <label for="pay">How much to pay?</label>
                         <input type="number" class="form-control" placeholder="Enter Amount" required="required" name="amount">
                      </div>
                      <button type="submit" class="btn btn-primary mt-3">Proceed</button>
                    </form>
                </div>
            </div>
        </div>
                
    </div>
  </div>
</div>

<section style="margin-top: 5%;">
  <img src="<?php echo base_url();?>axxets/templates/5/customer.jpg" class="carouselheight supportmargin" width="100%">
  <div class="Customer123">
    <div class="text-center">
    <h2 class="imageh2">24/7 Customer Service Support</h2>
      <p class="imageP">We value our customer's time. So we provide quality support to all our customers. Just login to your account and raise a support ticket</p>
      <!--<button type="submit" class="btn btn-primary mt-3">Support</button>-->
  </div>
  </div>
</section>

<section style="margin-top: 5%;">
  <div class="jumbotron testimonial" style="color: white">
    <div class="text-center">
    <h2 style="color: black">Testimonial from our Customers</h2>
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators" style="margin-bottom: -40px;">
           <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
           <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
           <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
             <img src="<?php echo base_url();?>axxets/templates/5/1.png" alt="..." style="margin-top: 20px;">
              <div >
               <h5 style="margin-top: 30px;">  I am connected with this organization since long time and I am happy with their service and support</h5>
               <h4 style="margin-top: 40px;">Arundhati Nair</h4>
              </div>
            </div>
            <div class="carousel-item">
               <img src="<?php echo base_url();?>axxets/templates/5/2.png" alt="..." style="margin-top: 20px;">
              <div >
               <h5 style="margin-top: 30px;">  I was getting confused while selecting service from mymart recharge but after one month</h5>
                <h5>with our journey my confusions got resolved. Thanks team for better support and service.</h5>
               <h4 style="margin-top: 40px;">Jaya Kumar</h4>
              </div>
            </div>
            <div class="carousel-item">
                <img src="<?php echo base_url();?>axxets/templates/5/4.png" alt="..." style="margin-top: 20px;">
              <div >
               <h5 style="margin-top: 30px;">  Very good and easy recharge DMT service. As a distributor, I use this service for </h5>
                <h5>last one year and I am happy to say that it is easy, fast and secure to use this service.</h5>
                <h5> I highly recommend it for every one.</h5>
               <h4 style="margin-top: 40px;">Karuna Singh</h4>
              </div>
            </div>
          </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
  </div>
</section>

<section>
<div class="container"> 
 <div class="card text-center steps" style="border: none;">	
  <div class="card-header bg-warning">
    Get your electricity recharge done faster just in few steps!
  </div>
  <div class="card-body shadow p-3 mb-5 bg-white rounded" style="text-align: left;">
    <p>How to pay electricity bill?</p>
    <p>1. Go to electricity bill payment page on our website. <a href="#recharge">Click here</a> to recharge</p>
    <p>2. Select your Operator</p>
    <p>3. Enter your consumer number</p>
    <p>4. Click on proceed, you will be redirected to paymet page</p>
    <p>5. Pay your bill through debit card, credit card, net banking or our wallet and you are done.</p>
  </div>
  </div>
</div> 
<div class="container"> 
 <div class="card text-center steps" style="border: none;">
  <div class="card-header bg-warning">
    Get your mobile recharge done faster just in few steps!
  </div>
  <div class="card-body shadow p-3 mb-5 bg-white rounded" style="text-align: left;">
    <p>How to pay Mobile bill?(Postpaid and Prepaid)</p>
    <p>1. Go to Mobile bill payment page on our website. <a href="#recharge">Click here</a> to recharge</p>
    <p>2. Enter Your mobile number</p>
    <p>3. Select your Operator</p>
    <p>4. Enter amount to pay</p>
    <p>4. Click on proceed, you will be redirected to paymet page</p>
    <p>5. Pay your bill through debit card, credit card, net banking or our wallet and you are done.</p>
  </div>
  </div>
</div>
<div class="container"> 
 <div class="card text-center steps" style="border: none;">
  <div class="card-header bg-warning">
    Get your DTH recharge done faster just in few steps!
  </div>
  <div class="card-body shadow p-3 mb-5 bg-white rounded" style="text-align: left;">
    <p>How to pay DTH bill?</p>
    <p>1. Go to electricity bill payment page on our website. <a href="#recharge">Click here</a> to recharge</p>
    <p>2. Enter Your subscriber number</p>
    <p>3. Select your Operator</p>
    <p>4. Enter amount to pay</p>
    <p>4. Click on proceed, you will be redirected to paymet page</p>
    <p>5. Pay your bill through debit card, credit card, net banking or our wallet and you are done.</p>
  </div>
  </div>
</div>     
</section>

<div class="jumbotron jumbotron4" style="background: white;">
<section class="partner">
  <div class="heading">
    <h1 style="color: #009988">We are accepted at</h1>
  </div>
  <ul class="brand_logos">
    <li><span><img src="<?php echo base_url();?>axxets/templates/5/lg.png"></span></li>
    <li><span><img src="<?php echo base_url();?>axxets/templates/5/lg1.png"></span></li>
    <li><span><img src="<?php echo base_url();?>axxets/templates/5/lg2.png"></span></li>
    <li><span><img src="<?php echo base_url();?>axxets/templates/5/lg3.png"></span></li>
    <li><span><img src="<?php echo base_url();?>axxets/templates/5/lg4.png"></span></li>
  </ul>
  <ul class="brand_logos">
    <li><span><img src="<?php echo base_url();?>axxets/templates/5/lg5.png"></span></li>
    <li><span><img src="<?php echo base_url();?>axxets/templates/5/lg6.png"></span></li>
    <li><span><img src="<?php echo base_url();?>axxets/templates/5/lg7.png"></span></li>
    <!--<li><span><img src="<?php echo base_url();?>axxets/templates/5/lg9.png"></span></li>-->
  </ul>
</section>
</div>

<!-- Footer -->
<footer class="page-footer font-small bg-dark">
  <div class="container text-center text-md-left">
    <div class="row">
       <div class="col-md-3 mx-auto" style="color: gray;margin-top: 12%">
        <h5 class="font-weight-bold text-uppercase mt-3 mb-4" style="color: white;">COMPANY</h5>
        <div class="row footerlist">
        <ul class="list" style="list-style: none;float: left;">
          <li>Home</li>
          <li>Shop</li>
          <li>Recharge</li>
          <li>Login</li>
          <li>Register</li>
        </ul>
        </div>
     </div>

      <hr class="clearfix w-100 d-md-none">

        <div class="col-md-3 mx-auto" style="margin-top: 12%;">
           <h5 class="font-weight-bold text-uppercase mt-3 mb-4" style="color: white;">Mobile Recharges</h5>
            <div class="row footerlist">
                <ul class="list" style="list-style: none;">
                   <li><a href="#" style="color: gray">Home</a></li>
                    <li><a href="#" style="color: gray">Feature</a></li>
                    <li><a href="#" style="color: gray">Services</a></li>
                    <li><a href="#" style="color: gray">Portfolio</a></li>
                </ul>
            </div>      
        </div>

      <hr class="clearfix w-100 d-md-none">
        <div class="col-md-3 mx-auto" style="margin-top: 12%;">
         <h5 class="font-weight-bold text-uppercase mt-3 mb-4"style="color: white;">DTH RECHARGES</h5>
          <div class="row footerlist1">
                <ul class="list" style="list-style: none;">
                   <li><a href="#" style="color: gray">Airtel Digital TV Recharges</a></li>
                    <li><a href="#" style="color: gray">Dish Tv Recharges</a></li>
                    <li><a href="#" style="color: gray">Tata sky Recharges</a></li>
                    <li><a href="#" style="color: gray">Reliance Digital TV Recharges</a></li>
                    <li><a href="#" style="color: gray">Sun Direct Recharges</a></li>
                    <li><a href="#" style="color: gray">Videocon D2H Recharges</a></li>
                </ul>
            </div>  
          </div>  

      <hr class="clearfix w-100 d-md-none">
        <div class="col-md-3 mx-auto"style="margin-top: 12%;">
           <h5 class="font-weight-bold text-uppercase mt-3 mb-4" style="color: white;">PAYMENT OPTIONS</h5>
            <div class="row footerlist1">
                <ul class="list" style="list-style: none;">
                   <li><a href="#" style="color: gray">Credit cards</a></li>
                    <li><a href="#" style="color: gray">Debit cards</a></li>
                    <li><a href="#" style="color: gray">Any Visa Debit card (VBV)</a></li>
                    <li><a href="#" style="color: gray">Direct Bank Debits</a></li>
                    <li><a href="#" style="color: gray">Cash cards</a></li>
                </ul>
            </div>
        </div>
      <div class="container">
        <hr style="background: white;">
      </div>
      <!-- Copyright -->
      <div class="footer-copyright text-center py-3 copyright" style="color: white;margin-left: 45%">© 2020 Copyright:
      </div>
     <!-- Copyright -->
  </div>
 </div>
</footer>
<!-- Footer -->

<script type="text/javascript">
  var iconBx = document.querySelectorAll('.iconBx');
  var contentBx =   document.querySelectorAll('.contentBx');

  for (var i = 0; i<iconBx.length; i++) {
      iconBx[i].addEventListener('click',function(){
        for (var i = 0; i < contentBx.length; i++) {
          contentBx[i].className= 'contentBx';
        }
        document.getElementById(this.dataset.id).className = 'contentBx active';

        for (var i = 0; i<iconBx.length; i++){
            iconBx[i].className='iconBx';
        }
        this.className= 'iconBx active'
    });
  };

</script>
<script type="text/javascript">
  $(function () {
  $(document).scroll(function () {
    var $nav = $(".fixed-top");
    $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
  });
});
</script>

</body>
</html>


<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" data-dismiss="modal">&times;</button>
        <h1 class="modal-title" style="align-items: center; margin-right: 65px; "><b>Online Recharge</b></h1>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <p>
          <?php echo form_open('site/login') ?>
          <div class="form-group">
            <label for="user" class="control-label">ID</label>
            <input type="text" required class="form-control" id="user" name="username" >
            <label for="password" class="control-label">Password*</label>
            <input type="password" required class="form-control" id="password" name="password">
          </div>
          <div class="form-group">
            <button class="btn btn-success">Login</button> OR
            <button class="btn btn-success" style="background:blue;"><a href="<?php echo site_url('site/register') ?>" style="color:white;">Register</a></button><br/>
            <br></br>
              <a href="#" data-toggle="modal" data-target="#resetpassword" style="color: blue;">Forgot Password ?</a>
          </div>
          <?php echo form_close() ?>
      </div>
      <!-- Modal footer -->
    <!--  <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>-->
    </div>
  </div>
</div>