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
      <li id="dashboard" >
          <a href="<?php echo site_url('bbps_recharge') ?>"><i class="fa fa-home"></i><span>Bill Payment Screen</span></a>
      </li>
      <li id='wletter' >
          <a href="<?php echo site_url('bbps_recharge/getReceipt') ?>"><i
                      class="fa fa-file-text-o"></i><span>Payment Receipt status</span></a>
      </li>
      <li id='wletter' class="active">
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
  <h2><b style="color: blue;">Raise Compliant Screen!!!!</b></h2>
          <br/>
          <div id="exampleFormControlSelect5"> 
                    </div>
          <label>Please Select Bill</label>
          </div>
          <div  style="float:right">
          <img src="<?php echo base_url('axxets/BBPS_Logo.jpg') ?>" alt="..." style="width:130px;">
          </div>
    <div class="c"  class="layer1_class">
        <div class="contentBx active" id="content1" style="border: none;right:15%;width:55%"> 
          <div class="shadow-lg p-3 mb-5 bg-gray rounded mt-4" style="border: none;">
          
          <div class="text"> 
                    <form method="post" >
                    <select class="form-control" id="exampleFormControlSelect1" required >
                      <option value="">Select Bill</option>
                      <?php foreach($result as $element){ ?>
                        <option value="<?php echo $element['bbps_transaction_id'] ?>"><?php echo $element['categoryCode']."  "; echo $element['time'];  ?> </option>         
                      <?php } ?> 
                    </select> 
                    <br /> 
                    <label>Please mention the issue(only space special character allowed)</label>
                    <br />
                    <textarea  class="form-control" name="issue" id="issue" required></textarea>
                    <br />                    
                      <button type="button" id="fetch" class="btn btn-primary" >Raise Compliant</button>
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

$('#fetch').on('click', function() {  
  var billId=$('#exampleFormControlSelect1').val();
  var message=$('#issue').val();
  if(billId!="" && message!="" )
  {
  document.getElementById("overlay").style.display = "block"; 
  $.ajax({
            url: ' <?php echo base_url()?>bbps_recharge/raiseCompliantRequest/'+billId+'/'+message,
            success: function(response){
             document.getElementById("overlay").style.display = "none";
             $('#exampleFormControlSelect5').html(response);
             $('#issue').val("");
             $('#exampleFormControlSelect1').val("")
            },
            error:function($xhr,textStatus,errorThrown)
            {
              document.getElementById("overlay").style.display = "none";
              $('#exampleFormControlSelect5').html($xhr.responseText);
            }
        }); 
  }else
  {
    var errorMessage="";
    if(billId=="")
  {
    errorMessage="Please select bill!!";
  }
  if(message=="")
  {
    errorMessage=errorMessage+"Please specify issue in the description field!!";
  }
  $('#exampleFormControlSelect5').html("<p style='color:red;font-size:20px;'>"+errorMessage+"</p>");

  }   
});
});
</script>