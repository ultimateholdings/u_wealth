<?php

if ($this->login->check_member() == false) {
    redirect(site_url('site/login'));
}

$member_data = $this->user_model->load_member_data($this->session->user_id);
$income_name = $member_data['income_name'];
$member = $member_data['member'];
$mp = $member_data['mp'];
$pd = $member_data['pd'];
$payout = $member_data['payout'];
?>

<!DOCTYPE html>
<html>
<style type="text/css">
   body{
  overflow-x: hidden;
}

.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 60px;
  height: 60px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
  position: fixed; /* or absolute */
  top: 50%;
  left: 50%;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}


.c{
  position: relative;
  display: flex;
  flex-wrap: wrap;
  width: 1100px;
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

.steps{
  width: 100%;
  margin-top: 5%;
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
.container .c{
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

#loading {
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  position: fixed;
  display: block;
  opacity: 0.7;
  background-color: #fff;
  z-index: 99;
  text-align: center;
}

#loading-image {
  position: absolute;
  top: 100px;
  left: 240px;
  
  z-index: 100;
}

}
#overlay {
  position: fixed;
  display: none;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.5);
  z-index: 2;
  cursor: pointer;
}
</style>
</head>
<?php include 'includes_top.php';?>
<body>

<div id="ui" class="ui">

    <!--header start-->
    <?php include 'header.php';?>
    <!--header end-->

    <aside id="aside" class="ui-aside">
  <ul class="nav" ui-nav>
      <li class="member">
          <a href="<?php echo base_url('member') ?>">Hi, <?php echo $member_data['member']->name ?><br/>(
              My ID
              : <?php echo config_item('ID_EXT') . $member_data['member']->id ?>)
          </a>
      </li>
      <li id="dashboard" class="active" >
          <a href="<?php echo site_url('bbps_recharge') ?>"><i class="fa fa-home"></i><span>Bill Payment Screen</span></a>
      </li>
      <li id='wletter' >
          <a href="<?php echo site_url('bbps_recharge/getReceipt') ?>"><i
                      class="fa fa-file-text-o"></i><span>Payment Receipt status</span></a>
      </li>
      <li id='wletter'>
          <a href="<?php echo site_url('bbps_recharge/raiseCompliant') ?>"><i
                      class="fa fa-file-text-o"></i><span> Raise Complaint</span></a>
      </li>
      <li id='wletter'>
          <a href="<?php echo site_url('bbps_recharge/compliantStatus') ?>"><i
                      class="fa fa-file-text-o"></i><span> Compliant Status</span></a>
      </li>      
      <li><a href="<?php echo site_url('member/logout') ?>"><i class="fa fa-sign-out"></i> Log Out</a></li>
      </li>
  </ul>
</aside>

<div id="overlay">
Please wait while loading!!!
<div class="loader"> 
</div>
</div>
    <!--main content start-->
    <div id="content" class="ui-content ui-content-aside-overlay">
        <div class="ui-content-body">
            <div class="ui-container">
                <div class="row">               
  <div class="jumbotron mt-4" id="recharge" style="height: 800px; background: white;">
  <div class="container" >
  <div style="float:left"> 
  <h2><b style="color: blue;">Bill Payment Screen!!!!</b></h2>
  <input type="hidden" name="wallet_balance" id="wallet_balance" value="<?php  echo $balance; ?>"></input>
  <h4 style="color: green;">Your Wallet balance is <?php  echo $balance; ?>!!! You can pay bill upto <?php  echo $balance; ?> !!! </h4>
                <h4 style="color: red;" id="error" hidden="true">Your Wallet balance is lower than bill amount !!! Please topup to proceed further!!! </h4>
                <h2><?php  echo $resultMessage; ?></h2>
          </div>
          <div  style="float:right">
          <img src="<?php echo base_url('axxets/BBPS_Logo.jpg') ?>" alt="..." style="width:130px;">
          </div>
          <div class="c"  class="layer1_class">
    
        <div class="contentBx active" id="content1" style="border: none;right:15%;width:50%;">         
          <div class="shadow-lg p-3 mb-5 bg-gray rounded mt-4" style="border: none;"> 
          <div>
                <?php echo $this->session->flashdata('common_flash') ?>  
                
                
                <div id="exampleFormControlSelect8">  
                    </div>
                <div class="text" style="border: none;"> 
                    <form method="post" id="form1" action="<?php echo site_url('bbps_recharge/paymentConfirmation') ?>" >
                    <label><b>Select Category</b></label>
                    <select class="form-control" id="exampleFormControlSelect1" >
                      <option>Select Category</option>
                      <?php foreach($myInnerArray as $element){ ?>
                        <option value="<?php echo $element['categoryCode'] ?>"> <?php echo $element['categoryName'] ?></option>         
                      <?php } ?> 
                    </select>
                    <input type="hidden" name="walletBalance" id="walletBalance" value="<?php  echo $balance; ?>"></input>
                    <input type="hidden" name="catCode" id="catCode"></input>
                    <input type="hidden" name="billerName" id="billerName"></input>
                    <div id="allContent" class="form-group pt-1" >
                    <div class="form-group pt-1" id="exampleFormControlSelect2">
                    </div>
                    <div id="exampleFormControlSelect3">  
                    </div>                 

                    <div id="exampleFormControlSelect5">
                    </div>
                    <div class="form-group pt-1" id="exampleFormControlSelect6">
                    </div>
                      </div>
                      <br />
                    <button type="button" id="fetch" class="btn btn-primary" hidden="true">Proceed</button>
                    <button type="submit" id="makePayment" class="btn btn-primary"  >Make payment</button>
                    </form>
                </div>
            </div>
            </div>
            </div>
            </div>
  </div>
  
  </div>
</div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--main content end-->
<!--footer start-->
<div style="text-align: center; margin-bottom: 20px;">
<?php echo $member_data['footer']; ?>
</div>

<?php include 'includes_bottom.php';?>

</body>
</html>
<script>
$(document).ready(function(){ 
  $('#makePayment').hide();
  $("#fetch").hide();
  $("#error").hide();
$('#exampleFormControlSelect1').on('change', function() {   
  var catCode=$('#exampleFormControlSelect1 option:selected').text();
  $.ajax({
            url: ' <?php echo base_url()?>bbps_recharge/getBillerlist/'+this.value,
            success: function(response){
              $('#exampleFormControlSelect8').empty();
              $('#exampleFormControlSelect2').empty();
              $('#exampleFormControlSelect3').empty();
              $('#exampleFormControlSelect5').empty();
              $('#exampleFormControlSelect6').empty();
              $('#exampleFormControlSelect2').html(response);
              $('#catCode').val(catCode);
            }
        });  
});

$('#fetch').on('click', function() { 
var totalParameters=$('#totalParameters').val();
var billerId= $('#exampleFormControlSelect').val();
var catCode=$('#exampleFormControlSelect1').val();
var mob=$('#mobileNumber').val();
var param="";
 for(var i=1;i<=totalParameters;i++)
{
  if(param=="")
  param= '{"name":"'+$('#param'+i).attr('name')+'"____"value":"'+$('#param'+i).val()+'"}';
  else{
    param= param+ '{"name":"'+$('#param'+i).attr('name')+'"____"value":"'+$('#param'+i).val()+'"}';
  }
}

document.getElementById("overlay").style.display = "block";
 $.ajax({
            url: ' <?php echo base_url()?>bbps_recharge/getBillFetchRequest/'+billerId+"/"+mob+"/"+param+"/"+catCode,
            success: function(response){
             $("#fetch").hide();
              document.getElementById("overlay").style.display = "none";
              $('#exampleFormControlSelect5').html(response);
              var balance=$("#wallet_balance").val();
              var amount=$("#amount").val();
              if(balance<amount)
              {
                $("#error").show();
              }
              else{
                $('#makePayment').show();
              }
            },
            error:function($xhr,textStatus,errorThrown)
            {
              $('#fetch').css("visibility", "hidden");
              document.getElementById("overlay").style.display = "none";
              $('#exampleFormControlSelect5').html($xhr.responseText);
            }
      });     
});

$('#exampleFormControlSelect2').on('change', function() {
  
 
  var result=$('#exampleFormControlSelect1').val();
  var result1=$('#exampleFormControlSelect').val();
  var billerName=$('#exampleFormControlSelect option:selected').text();

  $.ajax({
            url: ' <?php echo base_url()?>bbps_recharge/getBillerFields/'+result1+"/"+result,
            success: function(response){
                $('#exampleFormControlSelect3').html(response);
                $('#billerName').val(billerName);
                $("#fetch").show();
            }
        });  
});
});
</script>