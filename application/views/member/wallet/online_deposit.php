<?php

?>
<?php echo form_open() ?>
<div class="col-md-12 col-sm-12" id='online_deposit' align='center'>
    <div class="panel-body" style="max-height: 480px;max-width: 800px;">
      <div class="content" id="margin2">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary" style="background: #200087;">
                  <h4 class="card-title" style="color:white;">Fund My Wallet</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive"><!--border-collapse= 'collapse-->
                    <table class="table table-hovered" width="100%" border='0' cellpadding="2" cellspacing="2" style="border-collapse: collapse;">
                     
                      <tbody style="border-top: 2px solid white;">
                        
                        <tr style='border-bottom: 2px solid white;'>
                          <td width="20%" align="center" valign="top" rowspan="2">
                            <img width="150px;" src="<?php echo site_url('axxets/gateway_image.png') ?>">
                          </td>
                          <td><strong>Amount(<?php echo config_item('iso_currency')?>):</strong><br/><br/><input type="text" style="width:150px;" name="amount" class="form-control"></td>
                       </tr>
                     
                
                      <tr>
                       <td></td>
                        <td>
                         <button class="btn btn-success" name="submit" value="add">Proceed</button>
                        </td>
                      </tr>
              </tbody>
             </table>
            </div>
           </div>
          </div>
         </div>
        </div>
       </div>
      </div>
    </div>
 </div>


<?php echo form_close() ?>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("deposit").classList.add('active');
        document.querySelector("#online_deposit > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>