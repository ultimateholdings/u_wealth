<?php 
$response=$response;
//print_r($response);die();
//print_r($response->VPremium->D);die();
foreach($response->VPremium->D as $r){
  //print_r($r->SC);die();

  $data[]=$r;
  
  //print_r($r->image);
}

foreach($data as $d){
  //print_r($d->Image);
}

//print_r($r);die();
/*if($r->SC=="1"){
  break;
}
else{
  $insurer_data[]=$r->SC;
}

}*/
//print_r($data);die(); 
//print_r(sizeof($data));die();
//print_r($insurer_data);die();
//var_dump($response);
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8"> 
<meta name="viewport" content="width=device-width,initial-scale=1.0"> 
<link rel="stylesheet" href="<?php echo base_url();?>axxets/templates/insurance/css/bootstrap.min.css">
<script src="<?php echo base_url();?>axxets/templates/insurance/js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>axxets/templates/insurance/js/popper.min.js"></script>
  <script src="<?php echo base_url();?>axxets/templates/insurance/js/bootstrap.min.js"></script>
  <script src='<?php echo base_url();?>axxets/templates/insurance/js/kit.fontawesome.com/a076d05399.js'></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/templates/insurance/css/cmotorquote2wheeler.css">
  <script>
    function changerows(checkbox)
    {
          var str=checkbox.name;
          
          if(str.checked)
       {
        alert("checked");
          
       }else
        {
            
            document.getElementById(str).style.display = 'none';
              
        }
          
   }
  </script>
</head>
<body>
<?php include 'header.php' ?>
<section class="main">
    <div class="content">
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <div class="container">
                    <div id="accordion" class="accordion">
                        <div class="card mb-0">
                            <div class="card-header collapsed" data-toggle="collapse" href="#collapseOne">
                                <a class="card-title">
                                    Details
                                </a>
                            </div>
                            <div id="collapseOne" class="card-body collapse" data-parent="#accordion" >
                                <div><img class="img-fluid" src="https://resources.ibe4all.com/BrokerAssist/health-images/bykeimage.jpg"></div>
                                <p><?php echo $model; ?></p>
                                <ul>
                                    <li style="display:none;"><i class="fa fa-car" aria-hidden="true"></i>&nbsp;<span class="o">  Cubic Capacity :</span>&nbsp; -----&nbsp; 511 </li>
                                    <li><i class="fa fa-car" aria-hidden="true"></i>&nbsp;<span class="o">  Registration:</span> -----&nbsp; <?php echo $regdate ?></li>
                                    <li><i class="fa fa-car" aria-hidden="true"></i>&nbsp;<span class="o">  Reg NO:</span>&nbsp;-----&nbsp; <?php echo $regno ?></li>
                                </ul>
                                <p style="display:none;" class="search text-center">
                                    Edit Search &nbsp;<i class="fa fa-edit" aria-hidden="true"></i>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div id="accordion" class="accordion">
                            <div style="display:none;" class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                <a class="card-title">
                                Addons
                                </a>
                            </div>
                            <div id="collapseTwo" class="card-body collapse" data-parent="#accordion" >
                                <div class="panel-body">
                                    <div id="divAddOns" class="add">
                                        <div class="modtab">
                                            <span class="mod_leftVeh1">
                                                <input type="checkbox" class="addOneses" value="RSAC">
                                            </span>
                                            <span class="mod_rightVeh2 tr" key="24x7 Road Side Assistance">24x7 Road Side Assistance</span>
                                        </div>
                                        <div class="modtab">
                                            <span class="mod_leftVeh1">
                                                <input type="checkbox" class="addOneses" value="ZDEP">
                                            </span>
                                            <span class="mod_rightVeh2 tr" key="Zero Depreciation">Zero Depreciation</span>
                                        </div>
                                        <div class="modtab">
                                            <span class="mod_leftVeh1">
                                                <input type="checkbox" class="addOneses" value="NCBP">
                                            </span>
                                            <span class="mod_rightVeh2 tr" key="NCB Protector">NCB Protector</span>
                                        </div>
                                        <div class="modtab">
                                            <span class="mod_leftVeh1"><input type="checkbox" class="addOneses" value="INVP"></span>
                                            <span class="mod_rightVeh2 tr" key="Return to Invoice">Return to Invoice</span>
                                        </div>
                                        <div class="modtab"><span class="mod_leftVeh1">
                                            <input type="checkbox" class="addOneses" value="KEYC"></span>
                                            <span class="mod_rightVeh2 tr" key="Key Replacement Cover">Key Replacement Cover</span>
                                        </div>
                                        <div class="modtab"><span class="mod_leftVeh1"><input type="checkbox" class="addOneses" value="EGBP"></span>
                                            <span class="mod_rightVeh2 tr" key="Engine Protector">Engine Protector</span>
                                        </div>
                                        <div class="modtab">
                                            <span class="mod_leftVeh1"><input type="checkbox" class="addOneses" value="AMBC"></span><span class="mod_rightVeh2 tr" key="Ambulance Charges Cover">Ambulance Charges Cover</span>
                                        </div>
                                        <div class="modtab">
                                            <span class="mod_leftVeh1"><input type="checkbox" class="addOneses" value="CONC"></span><span class="mod_rightVeh2 tr" key="Consumables Cover">Consumables Cover</span>
                                        </div>
                                        <div class="modtab">
                                            <span class="mod_leftVeh1"><input type="checkbox" class="addOneses" value="HOSP"></span><span class="mod_rightVeh2 tr" key="Hospital Cash Cover">Hospital Cash Cover</span>
                                        </div>
                                        <div class="modtab">
                                            <span class="mod_leftVeh1"><input type="checkbox" class="addOneses" value="HYLC"></span><span class="mod_rightVeh2 tr" key="Hydrostatic Lock Cover">Hydrostatic Lock Cover</span>
                                        </div>
                                        <div class="modtab">
                                            <span class="mod_leftVeh1"><input type="checkbox" class="addOneses" value="LOBG"></span><span class="mod_rightVeh2 tr" key="Loss of Personal Belongings">Loss of Personal Belongings</span>
                                        </div>
                                        <div class="modtab">
                                            <span class="mod_leftVeh1"><input type="checkbox" class="addOneses" value="TOWG" ></span><span class="mod_rightVeh2 tr" key="Secure Towing">Secure Towing</span>
                                        </div>
                                        <div class="modtab">
                                            <span class="mod_leftVeh1"><input type="checkbox" class="addOneses" value="TYRE" ></span><span class="mod_rightVeh2 tr" key="Tyre Protection">Tyre Protection</span>
                                        </div>
                                        <div class="modtab">
                                            <span class="mod_leftVeh1"><input type="checkbox" class="addOneses" value="WISH" ></span><span class="mod_rightVeh2 tr" key="Wind Shield Protection">Wind Shield Protection</span>
                                        </div>
                                        <div class="modtab">
                                            <span class="mod_leftVeh1"><input type="checkbox" class="addOneses" value="RIMC"></span><span class="mod_rightVeh2 tr" key="Rim Damage Cover">Rim Damage Cover</span>
                                        </div>
                                        <div class="modtab">
                                            <span class="mod_leftVeh1"><input type="checkbox" class="addOneses" value="MEDI" ></span><span class="mod_rightVeh2 tr" key="Medical Expense Reimbursement">Medical Expense Reimbursement</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div id="accordion" class="accordion">
                            <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                <a class="card-title">
                                Supplier
                                </a>
                            </div>
                            <div id="collapseThree" class="card-body collapse" data-parent="#accordion" >
                                <?php foreach($data as $d){
                                   if($d->SC==1){
                                    continue;
                                  }
                                 ?>
                              <p>&nbsp;&nbsp;<input type="checkbox" checked="true" onchange="changerows(this);"  value="<?php echo $d->Company; ?>" name="<?php echo $d->Company; ?>">&nbsp;<span class="acin"><?php echo $d->Company; ?></span>
                             </p>
                             <?php } ?>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-sm-12">
        <div class="container">
          <table class="table table-responsive-md table-bordered ">
            <thead>
              <tr>
                <th class="text-center"><h5>INSURER</h5></th>
                <th class="text-center">
                  <h5 data-toggle="modal" data-target="#basicExampleModal" key="IDV">IDV
                  </h5>
                </th>
                <th class="text-center">
                  <h5>Add Ons</h5>
                </th>
                <th class="text-center">
                    <h5>Premium</h5>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($data as $d){
                          if($d->SC==1){
                            continue;
                          }
                              
                         ?>
              <tr>
               <form method="post" action="<?php echo site_url('insurance/insurancebook')?>">
                <td style="width: 150px;">
                  <div class="container">
                      <br>
                      <img src="<?php echo $d->Image; ?>"></br>
                      <p><?php echo $d->Company;?>*<?php echo $d->Plan;?></p>
                  </div>
                </td>
                <td style="width: 250px;">
                  <div class="container">
                      <p>IDV&nbsp;&nbsp;&nbsp;<span class="fa fa-rupee"><?php echo $d->IDV;?></span></p>
                      <p data-toggle="modal" data-target="#premiummodal" class="primiumplan tr" key="PREMIUM &amp; PLAN DETAIL">PREMIUM &amp; PLAN DETAIL
                      <i class="fa fa-angle-down" style="font-weight:bold;"></i>
                      </p>
                      <div class="modal fade modal-fluid" id="premiummodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-fluid" role="document">
                       <div class="modal-content">
                        <div class="modal-header">
                         <h5 class="modal-title maint" id="exampleModalLabel">PREMIUM BREAKUP</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                         </button>
                        </div>
                        <div class="modal-body modal-fluid">
                         <div class="row">
                           <div class="col-12 mainmodal">
                             <div class="col-lg-12 col-sm-12 text-center">
                               <img class="img-fluid" src="<?php echo $d->Image;?>">
                             </div>
                             <div class="col-lg-12 col-sm-12">
                               <p>Basic Covers</p>
                               <ul>
                                 <li><?php echo $d->PremiumBreakup[0]->Name;?><span><?php echo $d->PremiumBreakup[0]->Premium;?></span></li>
                                 <li><?php echo $d->PremiumBreakup[1]->Name;?><span><?php echo $d->PremiumBreakup[1]->Premium;?></span></li>
                                 <li><?php echo $d->PremiumBreakup[2]->Name;?><span><?php echo $d->PremiumBreakup[2]->Premium;?></span></li>
                                 <p><li><b>Addon Covers</b></li></p>
                               </ul>
                            </div>
                             <div class="col-lg-12 col-sm-12">
                               <p>Discounts</p> 
                               <ul>
                                 <li>NCB Discount<span><?php echo $d->Discount;?></span></li>
                                 <p>Taxes</p>
                                 <li>Service Tax<SPAN><?php echo $d->ServiceTax;?></SPAN></li>
                                 <P class="total">TOTAL<span><i class="fa fa-rupee"></i><?php echo $d->Premium;?></span></P>
                               </ul>
                             </div>
                           </div>
                         </div>
                        </div>
                           <div class="modal-footer mainf">
                            <p style="display:none;"><span>DOWNLOAD</span><span><i class="fa fa-file-pdf-o"></i>&nbsp;About Plan</span><span><i class="fa fa-file-pdf-o "></i>&nbsp;Policy Wording</span></p>
                           </div>
                       </div>
                      </div>
              </div>
                  </div>
                </td>
                <td style="width: 200px;">
                      <div class="container">
                          <div>No AddOns</div>
                      </div>
                </td>
                <td style="width: 150px;">
                  <div class="container">
                        <div class="text-center">
                              <input type="hidden" name="premium" id="premium" value="<?php echo $d->Premium;?>">
                              <input type="hidden" name="vehicle_type" id="vehicle_type" value="<?php echo $vehicle_type;?>">
                              <input type="hidden" name="referenceno" id="reference_no" value="<?php echo $d->PolicyData->ReferenceID;?>">
                              <input type="hidden" name="OrderNo" id="OrderNo" value="<?php echo $d->PolicyData->OrderNo;?>">
                              <input type="hidden" name="image" id="image" value="<?php echo $d->Image;?>">
                              <input type="hidden" name="rto" id="rto" value="<?php echo $rto;?>">
                              <input type="hidden" name="rto1" id="rto1" value="<?php echo $rto1;?>">
                              <input type="hidden" name="model" id="model" value="<?php echo $model;?>">
                              <input type="hidden" name="regdate" id="regdate" value="<?php echo $regdate; ?>">
                              <input type="hidden" name="regno" id="regno" value="<?php echo $regno; ?>">
                              <input type="hidden" name="insurer" id="insurer" value="<?php echo $d->Company;?>">
                              <input type="hidden" name="IDV" id="IDV" value="<?php echo $d->IDV;?>">
                              <input type="hidden" name="plan" id="plan" value="<?php echo $d->Plan;?>">
                              <input type="hidden" name="ncb" id="ncb" value="<?php echo $d->NCB;?>">
                              <input type="hidden" name="claimmade" id="claimmade" value="<?php echo $claimmade;?>">
                              <input type="hidden" name="previous_insurer" id="previous_insurer" value="<?php echo $previous_insurer;?>">


                          <button class="btn btn-sm btn-success btn-block"><a href=""></a><i class="fa fa-rupee" aria-hidden="true"></i><?php echo $d->Premium;?><label><b>Buy Now</b></label></button>
                      </div>
                    </div>
                </td>
              </form>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
        </div>
    </div>
</section>
<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit IDV:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><input type="text" name="" required="">&nbsp;&nbsp;<button class="btn btn-sm btn-primary"><a href=""></a>UPDATE</button></p>
      </div>
      <div class="modal-footer">
        <p><span>MIN:<i class="fa fa-rupee"></i></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>MAX:<i class="fa fa-rupee"></i></span></p>
      </div>
    </div>
  </div>
</div>
<div class="modal fade modal-fluid" id="premium" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-fluid" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title maint" id="exampleModalLabel">PREMIUM BREAKUP</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modal-fluid">
        <p><span  class="aid">IDV&nbsp;31103</span><span class="anc">NCB&nbsp;25%</span></p>
        <br>
      <div class="row">
        <div class="col-12 mainmodal">
            <div class="col-lg-12 col-sm-12 text-center">
                <img class="img-fluid" src="https://resources.ibe4all.com/insurance/images/Bajaj_Allianz.jpg">
            </div>
            <div class="col-lg-12 col-sm-12">
                <p>Basic Covers</p>
                <ul>
                    <li>Basic OD Premium<span>28856</span></li>
                    <li>Basic TP Premium<span>7490</span></li>
                    <li>PA Owner-Driver<span>325</span></li>
                    <p><li><b>Addon Covers</b></li></p>
                </ul>
            </div>
            <div class="col-lg-12 col-sm-12">
                <p>Discounts</p> 
                <ul>
                    <li>NCB Discount<span>7214</span></li>
                    <p>Taxes</p>
                    <li>GST<SPAN>8353</SPAN></li>
                    <P class="total">TOTAL<span><i class="fa fa-rupee"></i>35290</span></P>
                </ul>
            </div>
         </div>
      </div>
      </div>
      <div class="modal-footer mainf">
        <p><span>DOWNLOAD</span><span><i class="fa fa-file-pdf-o"></i>&nbsp;About Plan</span><span><i class="fa fa-file-pdf-o "></i>&nbsp;Policy Wording</span></p>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php' ?> 
</body>
</html>