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



}


 </style>
</head>
<body>
	<?php include 'header.php' ?> 
<section style="padding-top: 60px;padding-bottom: 150px;">
	<div class="jumbotron mt-4" id="recharge" style="height: 600px; background: white;">
  <div class="container">
    <div class="icon">
      <!--<div class="iconBx active" data-id="content0" style="background:#003152; color: white; width: 80px;">
          <div class="d-block">
            <h6 class="mt-2">Check Balance</h6>
            <i class="fas fa-mobile-alt i"></i>
          </div>
      </div>-->
      <div class="iconBx active" data-id="content1" style="background:#34a853; color: white; width: 80px;">
          <div class="d-block">
            <h6 class="mt-3">Prepaid</h6>
            <i class="fas fa-mobile-alt i" aria-hidden="true"></i>
          </div>
      </div> 
      <div class="iconBx" data-id="content2" style="background: #fd7e14; color: white; width: 80px;">
        <div class="d-block">
            <h6 class="mt-3">PostPaid</h6>
            <i class="fas fa-mobile-alt i" aria-hidden="true"></i>
        </div>   
      </div>
      <div class="iconBx" data-id="content3" style="background:#17a2b8; color: white; width: 80px;">
        <div class="d-block">
            <h6 class="mt-3">DTH</h6>
            <i class="fas fa-tv i" aria-hidden="true"></i> 
        </div>
      </div>
      <div class="iconBx" data-id="content4" style="background:#ea4335;color: white;">
        <div class="d-block">
            <h6 class="mt-3">Electricity</h6>
            <i class="far fa-lightbulb i" aria-hidden="true"></i>
        </div> 
      </div>
      <div class="iconBx" data-id="content5" style="background: #ea4335;color: white;">
        <div class="d-block">
            <h6 class="mt-3">Telephone</h6>
            <i class="fas fa-phone i" aria-hidden="true"></i> 
        </div>
      </div>
      <div class="iconBx" data-id="content6" style="background: #17a2b8;color: white;width: 80px;">
        <div class="d-block">
            <h6 class="mt-2">Broad Band</h6>
            <i class="fas fa-wifi i" aria-hidden="true"></i>
        </div> 
      </div>
      <div class="iconBx" style="display:none;" data-id="content7">
        <div class="d-block">
            <h6 class="mt-3">Piped Gas</h6>
            <i class="fas fa-flask i" aria-hidden="true"></i>
        </div> 
      </div>
      <div class="iconBx" data-id="content8" style="background:#fd7e14;;color: white;width: 80px;">
        <div class="d-block">
            <h6 class="mt-3">Water</h6>
            <i class="fas fa-tint i" aria-hidden="true"></i>
        </div> 
      </div>
      <div class="iconBx" data-id="content9" style="background: #34a853; color: white;width: 80px;">
        <div class="d-block">
            <h6 class="mt-3">Insurance</h6>
            <i class="fas fa-dollar-sign i " aria-hidden="true"></i>
        </div> 
      </div>
    </div> 
    <div class="content">
        <div class="contentBx" id="content0">
            <div class="shadow-lg p-3 mb-5 bg-white rounded mt-4">
                <div class="text"> 
                  <i class="fas fa-mobile-alt i" style="font-size: 70px; margin-left: 40%" aria-hidden="true"></i>
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
                
                <div class="text"> 
                    <i class="fas fa-mobile-alt i" style="font-size: 70px; margin-left: 40%" aria-hidden="true"></i>
                    <form method="post" action="http://localhost/unilevel/recharge/recharge_hstm/mobile">
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
                        <option value="BSK">BSNL TOPUP (J&amp;K)</option>
                        <option value="BSJ">BSNL SPECIAL ( J&amp;K )</option>
                        <option value="JKI">J&amp;K ( IDEA EXPRESS )</option>
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
        <div class="contentBx" id="content2">
            <div class="shadow-lg p-3 mb-5 bg-white rounded mt-4">
                <div class="text"> 
                  <i class="fas fa-mobile-alt i" style="font-size: 70px; margin-left: 40%" aria-hidden="true"></i>
                    <form method="post" action="http://localhost/unilevel/recharge/recharge_hstm/mobile">
                      <div class="form-group pt-3">
                         <input type="number" class="form-control" placeholder="Enter Mobile Number" required="required" name="mobno">
                         <small id="emailHelp" class="form-text text-muted">Please enter a valid mobile number. Thats what we wanted!</small>
                      </div>
                      <select class="form-control" id="exampleFormControlSelect1" name="operator">
                        <option>Select Operator</option>
                        <option value="AP">AIRTEL POSTPAID</option>
                        <option value="BP">BSNL POSTPAID</option>
                        <option value="IP">IDEA POSTPAID</option>
                        <option value="VP">VODAFONE POSTPAID</option>
                        <option value="RP">RELIANCE JIO POSTPAID</option>
                        <option value="TP">TATA POSTPAID</option>
                        
                        
                      </select>
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
        <div class="contentBx" id="content3">
            <div class="shadow-lg p-3 mb-5 bg-white rounded mt-4">
                <div class="text"> 
                    <i class="fas fa-tv i" style="font-size: 70px; margin-left: 40%" aria-hidden="true"></i>
                    <form method="post" action="http://localhost/unilevel/recharge/recharge_hstm/dth">
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
                        <option value="DT">DISH TV DTH</option>
                        <option value="TS">TATA SKY DTH</option>
                        <option value="VD">VIDEOCON DTH</option>
                        <option value="ST">SUN TV DTH</option>
                        
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
                    <i class="fas fa-lightbulb i" style="font-size: 70px; margin-left: 40%" aria-hidden="true"></i>
                    <form method="post" action="http://localhost/unilevel/recharge/recharge_hstm/utility">
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
                        <option value="UGE">UTTAR GUJARAT VIJ COMPANY LIMITED (UGVCL)</option>
                        <option value="DGE">DAKSHIN GUJARAT VIJ COMPANY LIMITED (DGVCL)</option>
                        <option value="TAE">TORRENT POWER - AGRA</option>
                        <option value="MSE">MSEDC LIMITED</option>
                        <option value="REE">ADANI ELECTRICITY MUMBAI LTD</option>
                        <option value="BRE">BSES RAJDHANI POWER LIMITED</option>
                        <option value="BYE">BSES YAMUNA POWER LIMITED</option>
                        <option value="NDE">TATA POWER-DELHI</option>
                        <option value="NDE">TATA POWER-DELHI</option>
                        <option value="BME">BEST UNDERTAKING - MUMBAI </option>
                        <option value="NNE">NOIDA POWER COMPANY LIMITED</option>
                        <option value="TTE">TRIPURA STATE ELECTRICITY CORPORATION LTD</option>
                        <option value="MPE">MP PASCHIM KSHETRA VIDYUT VITARAN - INDORE</option>
                        <option value="JUE">JAMSHEDPUR UTILITIES AND SERVICES COMPANY LIMITED</option>
                        <option value="IBE">INDIA POWER CORPORATION LIMITED - BIHAR</option>
                        <option value="CCE">CHHATTISGARH STATE ELECTRICITY BOARD</option>
                        <option value="CWE">CALCUTTA ELECTRICITY SUPPLY LTD (CESC)</option>
                        <option value="BBE">BANGALORE ELECTRICITY SUPPLY COMPANY</option>
                        <option value="AAE">ASSAM POWER DISTRIBUTION COMPANY LTD RAPDR</option>
                        <option value="BEE">BHARATPUR ELECTRICITY SERVICES LTD. (BESL)</option>
                        <option value="BKE">BIKANER ELECTRICITY SUPPLY LIMITED (BKESL)</option>
                        <option value="DDE">DAMAN AND DIU ELECTRICITY</option>
                        <option value="DNE">DNH POWER DISTRIBUTION COMPANY LIMITED</option>
                        <option value="APE">APEPDCL-EASTERN POWER DISTRIBUTION CO AP LTD</option>
                        <option value="GEE">GULBARGA ELECTRICITY SUPPLY COMPANY LIMITED GESCOM</option>
                        <option value="IWE">INDIA POWER CORPORATION - WEST BENGAL</option>
                        <option value="JDE">JODHPUR VIDYUT VITRAN NIGAM LIMITED (JDVVNL)</option>
                        <option value="JIE">JAIPUR VIDYUT VITRAN NIGAM (JVVNL)</option>
                        <option value="KTE">KOTA ELECTRICITY DISTRIBUTION LIMITED (KEDL)</option>
                        <option value="MHE">MEGHALAYA POWER DIST CORP LTD</option>
                        <option value="MZE">MUZAFFARPUR VIDYUT VITRAN LIMITED</option>
                        <option value="NBE">NORTH BIHAR POWER DISTRIBUTION COMPANY LTD</option>
                        <option value="NSE">NESCO, ODISHA</option>
                        <option value="SBE">SOUTH BIHAR POWER DISTRIBUTION COMPANY LTD</option>
                        <option value="STE">SNDL NAGPUR</option>
                        <option value="SDE">SOUTHCO, ODISHA</option>
                        <option value="ASE">APSPDCL-SOUTHERN POWER DISTRIBUTION CO AP LTD</option>
                        <option value="TME">TATA POWER - MUMBAI</option>
                        <option value="WSE">WESCO UTILITY</option>
                        <option value="TNE">TAMIL NADU ELECTRICITY BOARD (TNEB)</option>
                        <option value="AJE">TP AJMER DISTRIBUTION LTD (TPADL)</option>
                        <option value="UKE">UTTARAKHAND POWER CORPORATION LIMITED</option>
                        <option value="UBE">UTTAR PRADESH POWER CORP LTD (UPPCL) - URBAN</option>
                        <option value="URE">UTTAR PRADESH POWER CORP LTD (UPPCL) - RURAL</option>
                        <option value="DHE">DAKSHIN HARYANA BIJLI VITRAN NIGAM (DHBVN)</option>
                        <option value="PSE">PUNJAB STATE POWER CORPORATION LTD (PSPCL)  PSE Account No  Bill Amount Mobile No   </option>
                        <option value="HNE">HUBLI ELECTRICITY SUPPLY COMPANY LTD (HESCOM)</option>
                        <option value="UHE">UTTAR HARYANA BIJLI VITRAN NIGAM (UHBVN)</option>
                        <option value="JBL">JHARKHAND BIJLI VITRAN NIGAM LTD (JBVNL)</option>
                        <option value="WBE">WEST BENGAL STATE ELECTRICITY DISTRIBUTION CO. LTD</option>
                        <option value="THE">TORRENT POWER - AHMEDABAD</option>
                        <option value="HPE">HIMACHAL PRADESH STATE ELECTRICITY BOARD (HPSEB)  </option>
                        <option value="CRE">CHAMUNDESHWARI ELECTRICITY SUPPLY CORP LTD (CESCOM  </option>
                        <option value="TBE">TORRENT POWER - BHIWANDI</option>
                        <option value="TSE">TORRENT POWER - SURAT</option>
                        <option value="MRE">MP POORV KSHETRA VIDYUT VITARAN - RURAL</option>
                        <option value="MME">MP MADHYA KSHETRA VIDYUT VITARAN CO. LTD.-RURAL</option>
                        <option value="MUE">MP MADHYA KSHETRA VIDYUT VITARAN CO. LTD.-URBAN</option>
                        <option value="TLE">TELANGANA SOUTHERN POWER DISTRIBUTION CO LTD</option>
                        <option value="ANE">ASSAM POWER DISTRIBUTION COMPANY LTD (NON-RAPDR)</option>
                        <option value="MKE">M.P. POORV KSHETRA VIDYUT VITARAN - URBAN</option>
                        <option value="SPE">SIKKIM POWER - RURAL (SKMPWR)</option>
                        <option value="SUE">SIKKIM POWER (URBAN)</option>
                        <option value="KNE">KANPUR ELECTRICITY SUPPLY COMPANY</option>
                        <option value="NME">NDMC ELECTRICITY</option>
                        <option value="GOE">GOA ELECTRICITY DEPARTMENT</option>
                        <option value="NGA">DEPARTMENT OF POWER - NAGALAND</option>
                        <option value="MSD">MESCOM - MANGALORE</option>
                        <option value="COE">CESU - ODISHA</option>
                        <option value="KSE">KSEBL - KERALA</option>
                        <option value="PME">POWER &amp; ELECTRICITY DEPARTMENT - MIZORAM  </option>
                        <option value="EDP">ELECTRICITY DEPARTMENT - PUDUCHERRY </option>

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
                    <i class="fas fa-phone i" style="font-size: 70px; margin-left: 40%" aria-hidden="true"></i>
                    <form method="post" action="http://localhost/unilevel/recharge/recharge_hstm/landline">
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
                        <option value="IL">MTNL - DELHI</option>
                        <option value="ML">MTNL - MUMBAI</option>
                        <option value="DL">TATA DOCOMO CDMA LANDLINE</option>
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
                    <i class="fas fa-wifi i" style="font-size: 70px; margin-left: 40%" aria-hidden="true"></i>
                    <form method="post" action="http://localhost/unilevel/recharge/recharge_hstm/utility">
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
                    <i class="fas fa-flask i" style="font-size: 70px; margin-left: 40%" aria-hidden="true"></i>
                    <form method="post" action="http://localhost/unilevel/recharge/recharge_hstm/utility">
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
                <div class="contentBx" id="content8" style="width: 70%;margin-left: 70px;">
            <div class="shadow-lg p-3 mb-5 bg-white rounded mt-4">
            	<small class="form-text" style="color:#FF3383;">Note:Please pay the complete amount. As partial payments won't be accepted.</small>
                <div class="text"> 
                    <i class="fas fa-tint i" style="font-size: 70px; margin-left: 40%" aria-hidden="true"></i>
                    <form method="post" action="http://localhost/unilevel/recharge/recharge_hstm">
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
                    <i class="fas fa-dollar-sign i" style="font-size: 70px;margin-left: 40%" aria-hidden="true"></i>
                    <form method="post" action="http://localhost/unilevel/recharge/recharge_hstm/utility">
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
</section>	
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
<?php include 'footer.php' ?> 
</body>