<?php

$this->db->where(array('status'=>'Failed','gateway'=>'Bank Transaction'));

$data = $this->db->get('transaction')->result();

?>

<?php echo form_open() ?>

<div class="col-md-12 col-sm-12 mt-5" id='bank_deposit' >

    <div class="panel-body" >

      <div class="content"  style="max-width: 700px" id="margin1">

        <div class="container-fluid">

          <div class="row">

            <div class="col-md-12 col-sm-6">


              <div class="card shadow p-3 mb-5 bg-body rounded">

                <div class="card-header card-header-primary" style="background: #200087;">

                  <h4 class="card-title" style="color:white;">Fund My Wallet</h4>

                </div>

                <div class="card-body">

                  <div class="table-responsive"><!--border-collapse= 'collapse-->

                    <table class="table table-hovered" width="100%" border='0' cellpadding="2" cellspacing="2" style="border-collapse: collapse;">

                     

                      <tbody style="border-top: 2px solid white;">

                        

                        <tr style='border:none;'>

                          <td width="20%" align="center" valign="top" rowspan="2">

                            <img width="130px;" src="<?php echo site_url('axxets/rupees_icon.png') ?>">

                          </td>

                          <td><strong>Amount(<?php echo config_item('iso_currency')?>):</strong><br/><br/><input type="text" style="width:150px;" name="amount" class="form-control" value="<?php echo $amount?>"></td>

                        </tr>

                        <tr>

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

        document.querySelector("#bank_deposit > a > span").setAttribute('style', 'color: darkorange !important;');

    });

</script>