<?php
//if(isset($_POST)) 
{
require_once 'AesForJava.php';

//Change Encryption Key as provided by EasyPay Team
$encryption_key= 'axisbank12345678';


//Change Checksum Key as provided by EasyPay Team
$checksum_key = "axis";

$cid = '5796';
$rid = rand(9999, 999999);//rand(9999, 999999);
$crn = rand(9999, 999999);
$amt = '50.00';
$ver = '1.0';
$typ = 'TEST';
$cny = 'INR';
$rtu = 'https://www.karthikeyaschool.com/onlineclasses/home/success_axis';
$ppi = 'Parveen|zirakpur|7015179718|kumarparveen2007@gmail.com|'.$amt;
$re1 = 'MN';
$re2 = '';
$re3 = '';
$re4 = '';
$re5 = '';

/*CKS= hash("sha256",CID+RID+CRN+AMT+checksum_key)*/
$cks = hash("sha256", $cid.$rid.$crn.$amt.$checksum_key);

//$str = "CID=".$_POST['CID']."&RID=".$_POST['RID']."&CRN=".$_POST['CRN']."&AMT=".$_POST['AMT']."&VER=".$_POST['VER']."&TYP=".$_POST['TYP']."&CNY=".$_POST['CNY']."&RTU=".$_POST['RTU']."&PPI=".$_POST['PPI']."&RE1=".$_POST['RE1']."&RE2=".$_POST['RE2']."&RE3=".$_POST['RE3']."&RE4=".$_POST['RE4']."&RE5=".$_POST['RE5']."&CKS=".$checksum;
$str ='CID='.$cid.'&RID='.$rid.'&CRN='.$crn.'&AMT='.$amt.'&VER='.$ver.'&TYP='.$typ.'&CNY='.$cny.'&RTU='.$rtu.'&PPI='.$ppi.'&RE1='.$re1.'&RE2=&RE3=&RE4=&RE5=&CKS='.$cks;

$aesJava = new AesForJava();
$i = $aesJava->encrypt(urldecode($str), $encryption_key, 128);
}
?>

<script  src="https://code.jquery.com/jquery-3.2.1.js"  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="  crossorigin="anonymous"></script>


<!-- <center><img src="https://www.aazp.in/wp-content/uploads/2017/12/InternetSlowdown_Day.gif" style="margin-top:17%;width:10%;"/></center>
 -->
<form style="" name="Formdata" id="Formdata" method="POST" action="https://uat-etendering.axisbank.co.in/easypay2.0/frontend/api/payment" >
    <textarea name="i" id="i" style="display: none;"><?php echo $i; ?></textarea>
    <input class="btn btn-primary" type="submit" value="AXIS BANK" >       
</form>


<script>
$(document).ready(function(){ /*$("#Formdata").submit();*/ });
</script>


