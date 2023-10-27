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
      <li id='wletter'>
          <a href="<?php echo site_url('bbps_recharge/raiseCompliant') ?>"><i
                      class="fa fa-file-text-o"></i><span> Raise Complaint</span></a>
      </li>
      <li id='wletter' >
          <a href="<?php echo site_url('bbps_recharge/compliantStatus') ?>"><i
                      class="fa fa-file-text-o"></i><span> Compliant Status</span></a>
      </li>      
      <li><a href="<?php echo site_url('member/logout') ?>"><i class="fa fa-sign-out"></i> Log Out</a></li>
      </li>
  </ul>
</aside>

    <!--main content start-->
    <div id="content" class="ui-content ui-content-aside-overlay">
        <div class="ui-content-body">

            <div class="ui-container">
                <div class="row">
               
  <div class="jumbotron mt-4" id="recharge" style="height: 800px; background: white;">
  <div class="container" >
    <div class="c"  class="layer1_class">
        <div class="contentBx active" id="content1" style="border: none;right:15%;width:35%"> 
          <div class="shadow-lg p-3 mb-5 bg-gray rounded mt-4" style="border: none;">
                <?php echo $this->session->flashdata('common_flash') ?>  
                <div id="exampleFormControlSelect8">  
                    </div>
                <div class="text" style="border: none;"> 
                    <form method="post" >
                    <label><b>Select Category</b></label>
                    <select class="form-control" id="exampleFormControlSelect1" >
                      <option>Select Category</option>
                      <?php foreach($myInnerArray as $element){ ?>
                        <option value="<?php echo $element['categoryCode'] ?>"> <?php echo $element['categoryName'] ?></option>         
                      <?php } ?> 
                    </select>
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
                    <button type="button" id="fetch" class="btn btn-primary" >Proceed</button>
                    <button type="button" id="makePayment" class="btn btn-primary"  hidden="true">Make Payment</button>
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
 
$('#exampleFormControlSelect1').on('change', function() {   
  $.ajax({
            url: ' <?php echo base_url()?>bbps_recharge/getBillerlist/'+this.value,
            success: function(response){
              $('#exampleFormControlSelect8').empty();
              $('#exampleFormControlSelect2').empty();
              $('#exampleFormControlSelect3').empty();
              $('#exampleFormControlSelect5').empty();
              $('#exampleFormControlSelect6').empty();
              $('#exampleFormControlSelect2').html(response);                
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

//alert(billerId+" "+mob+" "+catCode+" "+param);

 $.ajax({
            url: ' <?php echo base_url()?>bbps_recharge/getBillFetchRequest/'+billerId+"/"+mob+"/"+param+"/"+catCode,
            success: function(response){
              $('#fetch').css("visibility", "hidden");
              $('#makePayment').removeAttr("hidden");
              document.getElementById("overlay").style.display = "none";
              $('#exampleFormControlSelect5').html(response);
            },
            error:function($xhr,textStatus,errorThrown)
            {
              $('#fetch').css("visibility", "hidden");
              document.getElementById("overlay").style.display = "none";
              $('#exampleFormControlSelect5').html($xhr.responseText);
            }
      });     
});

$('#makePayment').on('click', function() { 

  var contextData= $('#contextValue').val();
  var amountVal= $('#amount').val();
  var catCode=$('#exampleFormControlSelect1 option:selected').text();
  document.getElementById("overlay").style.display = "block";

$.post(" <?php echo base_url()?>bbps_recharge/makePayments", {context: contextData, amount:amountVal,catCode:catCode}, function(result){
  document.getElementById("overlay").style.display = "none";
  $('#exampleFormControlSelect8').html(result);
  $('#exampleFormControlSelect2').empty();
  $('#exampleFormControlSelect3').empty();
  $('#exampleFormControlSelect5').empty();
  $('#exampleFormControlSelect6').empty();
  $('#allContent').addClass("form-group pt-2");
  $('#fetch').css("visibility", "visible");
  $('#makePayment').css("visibility", "hidden");
  //$("#exampleFormControlSelect1")[0].selectedIndex = 0; 
  }  );
});


$('#exampleFormControlSelect2').on('change', function() {
 
  var result=$('#exampleFormControlSelect1').val();
  var result1=$('#exampleFormControlSelect').val();

  $.ajax({
            url: ' <?php echo base_url()?>bbps_recharge/getBillerFields/'+result1+"/"+result,
            success: function(response){
                $('#exampleFormControlSelect3').html(response);
            }
        });  
});
});
</script>