<style>
<?php $member_data['style']['element']='in'?>
.panel-body{
    padding:15px;
}

@media only screen and (min-width: 992px) {
    #home {
        width: 50%;
    }
    #profile {
        width: 50%;
    }
    #reset_secure {
      width: 50%;
    }
    #blockchain{
      width: 50%;
    }
}

</style>
<style type="text/css">
    table th,td{
        text-align: center;
    }
</style>
<?php if($total_rows==0) { ?>
    <button type="button" class="btn btn-xl btn-success" data-toggle="modal" data-target="#myModalBank">
      Click Here to Enter the Bank Details
    </button>
<?php } else { ?>
    <button type="button" class="btn btn-xl btn-success" data-toggle="modal" data-target="#myModalBank1">
      Click Here to Enter the Bank Details
    </button>
<?php } ?>


<br>
<br>
<div class="table-responsive" style="width: 100%;">
    <table class="display table table-striped table-bordered" style="font-size:13px;margin-top: 10px;" id="DTable" data-name="member_list" data-page-length='100'>
        <thead>
        <tr>
            <th>SN</th>
            <th>User ID</th>
            <th>Payment Method </th>
            <th>Bank Name </th>
            <th>Bank Acc.No </th>
            <th>Bank Branch </th>
            <th>Bank Branch code </th>
            <th>Account Type</th>
            <th>Network Carrier</th>
            <th>Mobile Money No</th>
            <th>Mobile Money Name</th>
            <th>Status</th>
            <th>Comments</th>
        </tr>
        </thead>
        <tbody>
            <?php
            $sn = 1;
            foreach ($myBankDetails as $bankdetails) { ?>
                <tr>
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo $bankdetails['userid']; ?></td>
                    <td><?php 
                        if($bankdetails['payment_type']== 1)
                        {
                            echo "Bank";
                        }
                        else
                        {
                            echo "Mobile Money";
                        }
                    ?></td>
                    <td><?php 
                        if($bankdetails['bank_name']==NULL)
                        {
                            echo "---";
                        }
                        else
                        {
                            echo $bankdetails['bank_name'];
                        }
                    ?></td>
                    <td><?php 
                        if($bankdetails['bank_ac_no']==NULL)
                        {
                            echo "---";
                        }
                        else
                        {
                            echo $bankdetails['bank_ac_no'];
                        }
                    ?></td>
                    <td><?php 
                        if($bankdetails['bank_branch']==NULL)
                        {
                            echo "---";
                        }
                        else
                        {
                            echo $bankdetails['bank_branch'];
                        }
                    ?></td>
                    <td><?php 
                        if($bankdetails['bank_branch_code']==NULL)
                        {
                            echo "---";
                        }
                        else
                        {
                            echo $bankdetails['bank_branch_code'];
                        }
                    ?></td>
                    <td><?php 
                        if($bankdetails['account_type']==NULL)
                        {
                            echo "---";
                        }
                        else
                        {
                            echo $bankdetails['account_type'];
                        }
                    ?></td>
                    <td><?php 
                        if($bankdetails['network_carrier']==NULL)
                        {
                            echo "---";
                        }
                        else
                        {
                            echo $bankdetails['network_carrier'];
                        }
                    ?></td>
                    <td><?php 
                        if($bankdetails['mobile_no']==NULL)
                        {
                            echo "---";
                        }
                        else
                        {
                            echo $bankdetails['mobile_no'];
                        }
                    ?></td>
                    <td><?php 
                        if($bankdetails['mobile_name']==NULL)
                        {
                            echo "---";
                        }
                        else
                        {
                            echo $bankdetails['mobile_name'];
                        }
                    ?></td>
                    <!-- <td><?php echo $bankdetails['bank_ac_no']; ?></td>
                    <td><?php echo $bankdetails['bank_branch']; ?></td>
                    <td><?php echo $bankdetails['bank_branch_code']; ?></td>
                    <td><?php echo $bankdetails['account_type']; ?></td>
                    <td><?php echo $bankdetails['network_carrier']; ?></td>
                    <td><?php echo $bankdetails['mobile_no']; ?></td>
                    <td><?php echo $bankdetails['mobile_name']; ?></td> -->
                    <td>

                        <?php if($bankdetails['status']=="Pending") { ?>
                            <a href="#"  class="btn btn-danger btn-sm"><?php echo $bankdetails['status']; ?></a>
                        <?php } elseif($bankdetails['status']=="incompleted") { ?>
                            <a href="#"  class="btn btn-warning btn-sm"><?php echo $bankdetails['status']; ?></a>
                        <?php } else { ?>
                            <a href="#"  class="btn btn-primary btn-sm"><?php echo $bankdetails['status']; ?></a>
                        <?php } ?>
                    
                    </td>
                    <td><?php echo $bankdetails['comment_admin']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="pull-right">
        <?php echo $this->pagination->create_links(); ?>
    </div>
</div>

<div class="modal" id="myModalBank">
  <div class="modal-dialog">
    <div class="modal-content">
        <?php echo form_open('Member/bankdetails_form') ?>
        <?php $name=$this->db_model->select('name', 'member', array('id' => $this->session->user_id)) ?>
            <div class="modal-header">
                <h4 class="modal-title">Enter Bank Details</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row mt-2">
                    <div class="col-md-12">
                        <label>Beneficiary Name</label>
                        <input type="text" class="form-control" name="beneficiary_name" value="<?php echo $name; ?>" disabled><br/>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <label>Payment Type</label>
                        <select class="form-control" name ="payment_type" id="payment_type" onchange="payment_type_select()">
                            <option value="1">Bank</option>
                            <option value="2">Mobile Payment</option>
                        </select>
                       
                    </div>
                </div>
                <br>

                <div id="bank_details">
                    <div class="row mt-2" id="free1">
                        <div class="col-md-12">
                            <label>Bank Name</label>
                            <input type="text" class="form-control" name="bank_name" value=""><br/>
                        </div>
                    </div>
                    <div class="row mt-2" id="free2">
                        <div class="col-md-12">
                            <label>Bank A/C No</label>
                            <input type="number" class="form-control" name="bank_ac_no" id="bank_ac_no" value=""><br/>
                        </div>
                    </div>
                    <div class="row mt-2" id="free3">
                        <div class="col-md-12">
                            <label>Retype Bank A/C No</label>
                            <input type="number" class="form-control" name="confirm_bank_ac_no" id="confirm_bank_ac_no" value="" oninput="validate_bank(this)"><span id="bank_res" class="text-danger"></span><br/>
                        </div>
                    </div>
                    <div class="row mt-2" id="free4">
                        <div class="col-md-12">
                            <label>Bank Branch Name</label>
                            <input type="text" class="form-control" name="bank_branch" value=""><br/>            
                        </div>
                    </div>
                    <div class="row mt-2" id="free5">
                        <div class="col-md-12">
                            <label>Bank Branch Code</label>
                            <input type="text" class="form-control" name="bank_branch_code" value=""><br/>
                        </div>
                    </div>
                    <div class="row mt-2" id="free6">
                        <div class="col-md-12">
                            <label>Account type</label>
                            <select class="form-control" id="account_type" name="account_type" >
                              <option value="">Select</option>
                              <option value="Savings">Savings</option>
                              <option value="Current">Current</option>
                            </select><br/>
                        </div>
                    </div>
                </div>

                <div id="mobile_details" style="display:none;">
                    <div class="row mt-2" id="free1">
                        <div class="col-md-12">
                            <label>Network Carrier</label>
                            <input type="text" class="form-control" name="network_carrier" value=""><br/>
                        </div>
                    </div>
                    <div class="row mt-2" id="free2">
                        <div class="col-md-12">
                            <label>Mobile Money No</label>
                            <input type="number" class="form-control" name="mobile_no" id="mobile_no" value="" ><br/>
                        </div>
                    </div>
                    <div class="row mt-2" id="free4">
                        <div class="col-md-12">
                            <label>Mobile Money Name</label>
                            <input type="text" class="form-control" name="mobile_name" value="" ><br/>            
                        </div>
                    </div>

                </div>
                
                <div class="row mt-2">
                    <div class="col-md-12">
                        <label>Secure Password</label>
                        <input type="password" class="form-control" name="oldpass"><br/>
                    </div>
                </div>
            </div>
             <div class="modal-footer">
                <button class="btn btn-success" name="submit" value="add">Submit</button>
                <a href="<?php echo site_url('member/bankdetails');?>" required id="cancel" name="cancel" class="btn btn-default">Cancel</a>
            </div>
            <?php echo form_close() ?>
      </form>
    </div>
  </div>
</div>


<div class="modal" id="myModalBank1"  >
  <div class="modal-dialog" style="max-width:28%">
    <div class="modal-content">
        
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <div class="row mt-2">
                <div class="col-md-12">
                   <label style="font-size: 15px;color: red;text-align: center;">You Entered Bank Details Still Under Processing !!!</label>
                </div>
            </div>
               
        </div>
         <div class="modal-footer">
            
            <a href="<?php echo site_url('member/bankdetails');?>" required id="cancel" name="cancel" class="btn btn-default">Cancel</a>
        </div>
           
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("proilesetting").classList.add('active');
        document.querySelector("#bankdetails").setAttribute('style', 'color: darkorange !important;');
    });
</script>

<script language='javascript' type='text/javascript'>
    function validate_bank(input) {
        if (input.value != document.getElementById('bank_ac_no').value) {
            $('#bank_res').html('Bank Account Must be Matching.<br>');
        } else {
            $('#bank_res').html('');
        }
    }

    function payment_type_select()
    {

        var payment_type = document.getElementById('payment_type').value;
        
        if(payment_type == 1){
           $('#bank_details').show();
           $('#mobile_details').hide();
        }
        if(payment_type == 2){
            $('#mobile_details').show();
            $('#bank_details').hide();
           
        }
    }
</script>