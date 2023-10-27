
<style type="text/css">
    .col-sm-6{
        margin: 6px 0px;
    }
    .card{
     width: 18%;
     display: inline-block;
     -moz-box-shadow: inset 0 0 6px #000000;
        -webkit-box-shadow: inset 0 0 6px #000000;
     box-shadow: inset 0 0 6px #000000;
     border-radius: 5px; 
     margin: 26px;

    }

.slide img{
  width: 180px;
  border-top-right-radius: 5px;
  border-top-left-radius: 5px;
  height: 110px;
  margin: 12.1px;
  
  }
.checkbox{
  margin-top: 10px;
  margin-left: 20px;
}

label.tooltip {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;
}

label.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;

  /* Position the tooltip */
  position: absolute;
  z-index: 1;
}

label.tooltip:hover .tooltiptext {
  visibility: visible;
}

</style>
<?php echo form_open_multipart() ?>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item active">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><?php echo "Plan / Product / Income"; ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="payment-tab" data-toggle="tab" href="#payment" role="tab" aria-controls="payment" aria-selected="false"><?php echo "Payment / KYC / Deposits"; ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="extra-tab" data-toggle="tab" href="#extra" role="tab" aria-controls="extra" aria-selected="false"><?php echo "Modules"; ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="theme-tab" data-toggle="tab" href="#theme" role="tab" aria-controls="theme" aria-selected="false"><?php echo "Theme Settings"; ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="complete-tab" data-toggle="tab" href="#complete" role="tab" aria-controls="complete" aria-selected="false"><?php echo "Finish"; ?></a> 
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane active in" id="home" role="tabpanel" aria-labelledby="home-tab" >
            <div class="row">
                <div class="col-sm-6">
                    <label>Business Plan</label>
                    <select class="form-control" name="width" id="width" >
                        <option selected value="<?php echo config_item('width'); ?>"><?php if(config_item('width')==0) {echo 'Unilevel';} else if(config_item('width')==1) {echo 'Single Leg';} else if(config_item('width')==2) {echo 'Binary';} else if(config_item('width')==3) {echo 'Matrix';} ?></option>
                        <option value="0">Unilevel</option>
                        <option value="1">Single Leg</option>
                        <option value="2">Binary</option>
                        <option value="3">Matrix</option>
                    </select>
                </div>
                <div class="col-sm-6" id='enable_board_id' style="display: none;">
                    <label>Enable Board Plan</label>
                    <select class="form-control" name="enable_board" id="enable_board">
                        <option selected><?php echo set_value('enable_board', config_item('enable_board')) ?></option>
                        <option>Yes</option>
                        <option>No</option>
                    </select>
                </div>
                <div class="col-sm-6" id="enable_crowdfund_id">
                    <label>Enable Crowd Funding</label>
                    <select class="form-control" name="enable_crowdfund" id="enable_crowdfund">
                        <option selected><?php echo set_value('enable_crowdfund', config_item('enable_crowdfund')) ?></option>
                        <option>Yes</option>
                        <option>No</option>
                    </select>
                </div>
                <div class="col-sm-6" id="crowdfund_type_id">
                    <label>Crowd Funding Type</label>
                    <select class="form-control" name="crowdfund_type" id="crowdfund_type">
                        <option selected><?php echo set_value('crowdfund_type', config_item('crowdfund_type')) ?></option>
                        <option>Automatic</option>
                        <option>Manual_Peer_to_Peer</option>
                    </select>
                </div>
               
            
                <div class="col-sm-6" id='autopool_registration'>
                    <label>Enable Auto Pool Registration</label>
                    <select class="form-control" name="autopool_registration">
                        <option selected><?php echo set_value('autopool_registration', config_item('autopool_registration')) ?></option>
                        <option>Yes</option>
                        <option>No</option>
                    </select>
                </div>
               <!--  <div id="enalbe_leg_id"> -->
                    <div class="col-sm-6" id="enalbe_leg_id">
                        <label>Show Placement Leg</label>
                        <select class="form-control" name="show_placement_id">
                            <option selected><?php echo set_value('show_placement_id', config_item('show_placement_id')) ?></option>
                            <option>Yes</option>
                            <option>No</option>
                        </select>
                    </div>
              <!--   </div> -->
             <!--    <div id='level_completion_id'> -->

                    <div class="col-sm-6" id='level_income_id'>
                        <label>Enable Level Completion / Single Leg Income / Board Income</label>
                        <select class="form-control" name="level_income" id="level_income">
                            <option selected><?php echo set_value('level_income', config_item('level_income')) ?></option>
                            <option>Yes</option>
                            <option>No</option>
                        </select>
                    </div>
                     <!--   </div> -->
                    <div class="col-sm-6" id="level_income_sponsor_carry">
                        <label>Level Completion / Single Leg Income - Direct Sponsor Carry Forward</label>
                        <select class="form-control" name="level_income_sponsor_carry" id="level_income_sponsor_carry">
                            <option selected><?php echo set_value('level_income_sponsor_carry', config_item('level_income_sponsor_carry')) ?></option>
                            <option>Yes</option>
                            <option>No</option>
                        </select>
                    </div>
             
                 <div class="col-sm-6" id="sponsor_restriction">
                    <label>sponsor_restriction</label>
                    <select class="form-control" name="sponsor_restriction" id="sponsor_restriction">
                        <option selected><?php echo set_value('sponsor_restriction', config_item('sponsor_restriction')) ?></option>
                        <option>Yes</option>
                        <option>No</option>
                    </select>
                </div>
                <div class="col-sm-6" id="sep_tree_id">
                    <label>Separate Tree
                    <span style="color: blue;">(Only for Joining Plans!!! Auto Pool have separate Tree always)</span></label>
                    <select class="form-control" name="sep_tree" id="sep_tree">
                        <option selected><?php echo set_value('sep_tree', config_item('sep_tree')) ?></option>
                        <option>Yes</option>
                        <option>No</option>
                    </select>
                </div>
                <div class="col-sm-6" id='id_upgrade_id' >
                    <label>Enable ID Upgrade <span style="color: blue;">(From Joining Plan to Auto Pool Plan)</span></label>
                    <select class="form-control" name="id_upgrade" id="id_upgrade">
                        <option selected><?php echo set_value('id_upgrade', config_item('id_upgrade')) ?></option>
                        <option>Yes</option>
                        <option>No</option>
                    </select>
                </div>
                 
                
                <div class="col-sm-6">
                    <label>Allow User to Sponsor Different Plan  <span style="color: blue;">(If Sep Tree Enabled)</span>
                    </label>
                        <select class="form-control" name="sponsor_different_plan">
                            <option selected><?php echo set_value('sponsor_different_plan', config_item('sponsor_different_plan')) ?></option>
                            <option>Yes</option>
                            <option>No</option>
                        </select>
                </div>
             <!--    <div id='product_related_id'> -->
                  <!--   <div class="row" style="margin: auto;width: 100%;"> -->
                    <div class="col-sm-6" id='enable_product_id'>
                        <label>Enable Product</label>
                        <select class="form-control" name="enable_product" id="enable_product">
                            <option selected><?php echo set_value('enable_product', config_item('enable_product')) ?></option>
                            <option>Yes</option>
                            <option>No</option>
                        </select>
                    </div>
                    <div class="col-sm-6" id='enable_variation_id'>
                        <label>Enable Product Variant</label>
                        <select class="form-control" name="enable_variation" id="enable_variation">
                            <option selected><?php echo set_value('enable_variation', config_item('enable_variation')) ?></option>
                            <option>Yes</option>
                            <option>No</option>
                        </select>
                    </div>
                    <div class="col-sm-6" id='enable_repurchase_id'>
                        <label>Enable Product Repurchase</label>
                        <select class="form-control" name="enable_repurchase" id="enable_repurchase">
                            <option selected><?php echo set_value('enable_repurchase', config_item('enable_repurchase')) ?></option>
                            <option>Yes</option>
                            <option>No</option>
                        </select>
                    </div>
                    <div class="col-sm-6" id='joining_product_id'>
                        <label>Registration is Product</label>
                        <select class="form-control" name="joining_product" id="joining_product">
                            <option selected><?php echo set_value('joining_product', config_item('joining_product')) ?></option>
                            <option>Yes</option>
                            <option>No</option>
                        </select>
                    </div>
                    <div class="col-sm-6" id="make_join_product_entry_id">
                        <label>Mark Joining Product as Delivered and Completed</label>
                        <select class="form-control" name="make_join_product_entry" id="make_join_product_entry">
                            <option selected><?php echo set_value('make_join_product_entry', config_item('make_join_product_entry')) ?></option>
                            <option>Yes</option>
                            <option>No</option>
                        </select>
                    </div>
                    <div class="col-sm-6" id='enable_pv_id'>
                        <label>Enable Business Value (BV) / Product Value (PV)</label>
                        <select class="form-control" name="enable_pv" id="enable_pv">
                            <option selected><?php echo set_value('enable_pv', config_item('enable_pv')) ?></option>
                            <option>Yes</option>
                            <option>No</option>
                        </select>
                    </div>
                    <div class="col-sm-6" id='target_income_id'>
                        <label>Enable Target Reach Income</label>
                        <select class="form-control" name="target_income" id="target_income">
                            <option selected><?php echo set_value('target_income', config_item('target_income')) ?></option>
                            <option>Yes</option>
                            <option>No</option>
                        </select>
                    </div>
                </div>
            </div>
<!--         </div> -->
<!--         </div> -->
        <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment-tab" >
            <div class="row">
            <div class="col-sm-6" id='enable_epin_id'>
                <label>Enable Epin</label>
                <select class="form-control" name="enable_epin">
                    <option selected><?php echo set_value('enable_epin', config_item('enable_epin')) ?></option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>
            <div class="col-sm-6">
                <label>Enable Bank Deposit</label>
                <select class="form-control" name="enable_bank_deposit">
                    <option selected><?php echo set_value('enable_bank_deposit', config_item('enable_bank_deposit')) ?></option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>
            <div class="col-sm-6">
                <label>Enable UPI Payment</label>
                <select class="form-control" name="enable_upi">
                    <option selected><?php echo set_value('enable_upi', config_item('enable_upi')) ?></option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>
            <div class="col-sm-6">
                <label>Enable Crypto Currency</label>
                <select class="form-control" name="enable_crypto">
                    <option selected><?php echo set_value('enable_crypto', config_item('enable_crypto')) ?></option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>
            <div class="col-sm-6">
                <label>Enable Payment Gateway for Testing</label>
                <select class="form-control" name="enable_pg" id="enable_pg">
                    <option selected><?php echo set_value('enable_pg', config_item('enable_pg')) ?></option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>
           <!--  <div id="gateways"> -->
            <div class="col-sm-6 gateways">
                <label>Enable Coin Payments for Testing</label>
                <select class="form-control" name="enable_coinpayments" id="enable_coinpayments">
                    <option selected><?php echo set_value('enable_coinpayments', config_item('enable_coinpayments')) ?></option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>
            <div class="col-sm-6 gateways">
                <label>Enable Coin Payment Payout for Testing</label>
                <select class="form-control" name="coinpayment_payout" id="coinpayment_payout">
                    <option selected><?php echo set_value('coinpayment_payout', config_item('coinpayment_payout')) ?></option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>
            <div class="col-sm-6 gateways">
                <label>Coin Payment Currency</label>
                <select class="form-control" name="coinpayment_currency">
                    <option selected value="<?php echo config_item('coinpayment_currency'); ?>"><?php echo config_item('coinpayment_currency'); ?></option>
                    <option>INR</option>
                    <option>USD</option>
                </select>
            </div>
            <div class="col-sm-6 gateways" style="display: none;">
                <label>Enable Cash Free Payment Gateway for Testing</label>
                <select class="form-control" name="enable_cashfree" id="enable_cashfree">
                    <option selected><?php echo set_value('enable_cashfree', config_item('enable_cashfree')) ?></option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>
            <div class="col-sm-6 gateways" style="display: none;">
                <label>Enable Cash Free Payout for Testing</label>
                <select class="form-control" name="cashfree_enable_payout" id="cashfree_enable_payout">
                    <option selected><?php echo set_value('cashfree_enable_payout', config_item('cashfree_enable_payout')) ?></option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>
            <div class="col-sm-6 gateways" style="display: none;">
                <label>Cash Free Currency</label>
                <select class="form-control" name="cashfree_currency">
                    <option selected value="<?php echo config_item('cashfree_currency'); ?>"><?php echo config_item('cashfree_currency'); ?></option>
                    <option>INR</option>
                    <option>USD</option>
                </select>
            </div>
            <div class="col-sm-6 gateways">
                <label>Enable Bankonnect Payment Gateway for Testing</label>
                <select class="form-control" name="enable_bankonnect" id="enable_bankonnect">
                    <option selected><?php echo set_value('enable_bankonnect', config_item('enable_bankonnect')) ?></option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>
          <!--   </div> -->
            <div class="col-sm-6 ">
                <label>Enable KYC</label>
                <select class="form-control" name="enable_kyc" id="enable_kyc">
                    <option selected><?php echo set_value('enable_kyc', config_item('enable_kyc')) ?></option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>
            <div class="col-sm-6 ">
                <label>Enable Invoice</label>
                <select class="form-control" name="enable_invoice" id="enable_invoice">
                    <option selected><?php echo set_value('enable_invoice', config_item('enable_invoice')) ?></option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>
        </div>
    </div>
        <div class="tab-pane fade" id="extra" role="tabpanel" aria-labelledby="extra-tab" >
            <div class="row">
            <div class="col-sm-6">
                <label>Server Type</label>
                <select class="form-control" name="server_type">
                    <option selected><?php echo set_value('server_type', config_item('server_type')) ?></option>
                    <option>Testing</option>
                    <option>Production</option>
                </select>
            </div>
            <div class="col-sm-6">
                <label>Disable Genealogy Tree</label>
                <select class="form-control" name="diable_tree">
                    <option selected><?php echo set_value('diable_tree', config_item('diable_tree')) ?></option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>
            <div class="col-sm-6">
                <label>Enable Registration with Default Values</label>
                <select class="form-control" name="reg_default" id="reg_default">
                    <option selected><?php echo set_value('reg_default', config_item('reg_default')) ?></option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>
            <div class="col-sm-6">
                <label>Enable Google Translator</label>
                <select class="form-control" name="google_translator" id="google_translator">
                    <option selected><?php echo set_value('google_translator', config_item('google_translator')) ?></option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>
            <div class="col-sm-6" id='login_default'>
                <label>Enable Login with Default Values</label>
                <select class="form-control" name="login_default">
                    <option selected><?php echo set_value('login_default', config_item('login_default')) ?></option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>
            <div class="col-sm-6">
                <label>Dashboard Currency</label>
                <select class="form-control" name="cur">
                    <option selected value="<?php if(config_item('cur')=='fa fa-inr') {echo 'INR';} else if(config_item('cur')=='fa fa-usd') {echo 'USD';} ?>"><?php if(config_item('cur')=='fa fa-inr') {echo 'INR';} else if(config_item('cur')=='fa fa-usd') {echo 'USD';} ?></option>
                    <option>INR</option>
                    <option>USD</option>
                </select>
            </div>
            <div class="col-sm-6">
                <label>Extend Dashboard KPI</label>
                <select class="form-control" name="extend_kpi">
                    <option selected><?php echo set_value('extend_kpi', config_item('extend_kpi')) ?></option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>
            <div class="col-sm-6">
                <label>Stop User Registration for Maintanance</label>
                <select class="form-control" name="disable_registration">
                    <option selected><?php echo set_value('disable_registration', config_item('disable_registration')) ?></option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>
            <div class="col-sm-6">
                <label>Allow Free Registration</label>
                <select class="form-control" name="free_registration" id="free_registration">
                    <option selected><?php echo set_value('free_registration', config_item('free_registration')) ?></option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>
            <div class="col-sm-6" id="inactive_in_tree">
                <label>Allow Inactive Users in Tree</label>
                <select class="form-control" name="inactive_in_tree">
                    <option selected><?php echo set_value('inactive_in_tree', config_item('inactive_in_tree')) ?></option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>
            <div class="col-sm-6" id="inactive_sponsor">
                <label>Allow Inactive Users to sponsor</label>
                <select class="form-control" name="inactive_sponsor">
                    <option selected><?php echo set_value('inactive_sponsor', config_item('inactive_sponsor')) ?></option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
             </div>
            <div class="col-sm-6">
                <label>Enable Rewards and Ranks</label>
                <select class="form-control" name="enable_reward">
                    <option selected><?php echo set_value('enable_reward', config_item('enable_reward')) ?></option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>
            <div class="col-sm-6">
                <label>Enable News/Announcement</label>
                <select class="form-control" name="enable_news">
                    <option selected><?php echo set_value('enable_news', config_item('enable_news')) ?></option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>
            <div class="col-sm-6" style="display: none;">
                <label>Allow Database Backup</label>
                <select class="form-control" name="enable_backup" id="enable_backup">
                    <option selected><?php echo set_value('enable_backup', config_item('enable_backup')) ?></option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>
            <div class="col-sm-6">
                <label>Enable admin theme change</label>
                <select class="form-control" name="enable_admin_theme" id="enable_backup">
                    <option selected><?php echo set_value('enable_admin_theme', config_item('enable_admin_theme')) ?></option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>
            <div class="col-sm-6">
                <label>Enable user theme change</label>
                <select class="form-control" name="enable_user_theme" id="enable_backup">
                    <option selected><?php echo set_value('enable_user_theme', config_item('enable_user_theme')) ?></option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>
        </div>
         </div>
        <div class="tab-pane fade" id="theme" role="tabpanel" aria-labelledby="theme-tab" >
                <div class="container">
                    <div class="card slide">
                        <img src="<?php echo base_url();?>axxets/mega/images/auth-bg/mega_new.png">
                        <div class="checkbox">
                        <input type="radio" id="checkbox1" name="login_theme" value="default" />
                        <label style="font-size: 14px;margin-left:18px; margin-top:-21px;">Click me to set as your Background</label>
                        </div>
                    </div>
                    <div class="card slide">
                        <img src="<?php echo base_url();?>axxets/mega/images/auth-bg/mega_next.png">
                        <div class="checkbox">
                        <input type="radio" id="checkbox1" name="login_theme" value="mega_next" />
                        <label style="font-size: 14px;margin-left:18px; margin-top:-21px;">Click me to set as your Background</label>
                        </div>
                    </div>
                    <div class="card slide">
                        <img src="<?php echo base_url();?>axxets/mega/images/auth-bg/mega_next1.png">
                        <div class="checkbox">
                        <input type="radio" id="checkbox1" name="login_theme" value="mega_next1" />
                        <label style="font-size: 14px;margin-left:18px; margin-top:-21px;">Click me to set as your Background</label>
                        </div>
                    </div>
                    <div class="card slide">
                        <img src="<?php echo base_url();?>axxets/mega/images/auth-bg/mega_theme.png">
                        <div class="checkbox">
                        <input type="radio" id="checkbox1" name="login_theme" value="mega" />
                        <label style="font-size: 14px;margin-left:18px; margin-top:-21px;">Click me to set as your login page</label>
                        </div>
                    </div>
                    <div class="card slide">
                        <img src="<?php echo base_url();?>axxets/mega/images/auth-bg/gmlm_login.png">
                        <div class="checkbox">
                        <input type="radio" id="checkbox1" name="login_theme" value="gmlm_login" />
                        <label style="font-size: 14px;margin-left:18px; margin-top:-21px;">Click me to set as your login page</label>
                        </div>
                    </div>
                    <!--<div class="card slide">
                        <img src="<?php echo base_url();?>axxets/mega/images/auth-bg/default_new.png">
                        <div class="checkbox">
                        <input type="radio" id="checkbox1" name="login_theme" value="default_new" />
                        <label style="font-size: 14px;margin-left:18px; margin-top:-21px;">Click me to set as your login page</label>
                        </div>
                    </div>-->
                   
                   <div class="card slide">
                        <img src="<?php echo base_url();?>axxets/mega/images/auth-bg/bg-8.jpg">
                        <div class="checkbox">
                        <input type="radio" id="checkbox1" name="login_theme" value="default_old" />
                        <label style="font-size: 14px;margin-left:18px; margin-top:-21px;">Click me to set as your login page</label>
                        </div>
                    </div>
                    <div class="card slide">
                        <img src="<?php echo base_url();?>axxets/mega/images/auth-bg/bg-1.jpg">
                        <div class="checkbox">
                        <input type="radio" name="login_theme" id="checkbox1" value="bg-1.jpg"/>
                        <label style="font-size: 14px; margin-left:18px; margin-top:-21px;" for="checkbox1">Click me to set as your Background</label>
                        </div>
                    </div>
                    <div class="card slide">
                        <img src="<?php echo base_url();?>axxets/mega/images/auth-bg/bg-2.jpg">
                        <div class="checkbox">
                        <input type="radio" name="login_theme" value="bg-2.jpg"/>
                        <label style="font-size: 14px;margin-left:18px; margin-top:-21px;">Click me to set as your Background</label>
                        </div>
                    </div>
                    <div class="card slide">
                        <img src="<?php echo base_url();?>axxets/mega/images/auth-bg/bg-3.jpg">
                        <div class="checkbox">
                        <input type="radio" id="checkbox3" name="login_theme" value="bg-3.jpg"/>
                        <label style="font-size: 14px;margin-left:18px; margin-top:-21px;">Click me to set as your Background</label>
                        </div>
                    </div>
                    <div class="card slide">
                        <img src="<?php echo base_url();?>axxets/mega/images/auth-bg/bg-4.jpg">
                        <div class="checkbox">
                        <input type="radio" id="checkbox1" name="login_theme" value="bg-4.jpg"/>
                        <label style="font-size: 14px;margin-left:18px; margin-top:-21px;">Click me to set as your Background</label>
                        </div>
                    </div>
                    <div class="card slide">
                        <img src="<?php echo base_url();?>axxets/mega/images/auth-bg/bg-5.jpg">
                        <div class="checkbox">
                        <input type="radio" id="checkbox1" name="login_theme" value="bg-5.jpg"/>
                        <label style="font-size: 14px;margin-left:18px; margin-top:-21px;">Click me to set as your Background</label>
                        </div>
                    </div>
                    <div class="card slide">
                        <img src="<?php echo base_url();?>axxets/mega/images/auth-bg/bg-6.jpg">
                        <div class="checkbox">
                        <input type="radio" id="checkbox1" name="login_theme" value="bg-6.jpg"/>
                        <label style="font-size: 14px;margin-left:18px; margin-top:-21px;">Click me to set as your Background</label>
                        </div>
                    </div>
                    <div class="card slide">
                        <img src="<?php echo base_url();?>axxets/mega/images/auth-bg/bg-7.jpg">
                        <div class="checkbox">
                        <input type="radio" id="checkbox1" name="login_theme" value="bg-7.jpg"/>
                        <label style="font-size: 14px;margin-left:18px; margin-top:-21px;">Click me to set as your Background</label>
                        </div>
                    </div>

                    <hr>

                    <div>
                        <h2>Select Registration theme</h2>
                        <div class="card slide">
                            <img src="<?php echo base_url();?>uploads/site_img/auth-bg/default_register.jpg">
                            <div class="checkbox">
                            <input type="radio" id="checkbox2" name="register_theme" value="default_register" />
                            <label style="font-size: 14px;margin-left:18px; margin-top:-21px;">Click me to set as your Background</label>
                            </div>
                        </div>
                        <div class="card slide">
                            <img src="<?php echo base_url();?>uploads/site_img/auth-bg/emailregister.jpg">
                            <div class="checkbox">
                            <input type="radio" id="checkbox2" name="register_theme" value="emailregister" />
                            <label style="font-size: 14px;margin-left:18px; margin-top:-21px;">Click me to set as your Background</label>
                            </div>
                        </div>
                        <div class="card slide">
                            <img src="<?php echo base_url();?>uploads/site_img/auth-bg/register_premium.jpg">
                            <div class="checkbox">
                            <input type="radio" id="checkbox2" name="register_theme" value="register_premium" />
                            <label style="font-size: 14px;margin-left:18px; margin-top:-21px;">Click me to set as your Background</label>
                            </div>
                        </div>

                        <div class="card slide">
                            <img src="<?php echo base_url();?>uploads/site_img/auth-bg/newRegister.jpg">
                            <div class="checkbox">
                            <input type="radio" id="checkbox2" name="register_theme" value="newRegister" />
                            <label style="font-size: 14px;margin-left:18px; margin-top:-21px;">Click me to set as your Background</label>
                            </div>
                        </div>

                        <div class="card slide">
                            <img src="<?php echo base_url();?>uploads/site_img/auth-bg/theme4.jpg">
                            <div class="checkbox">
                            <input type="radio" id="checkbox2" name="register_theme" value="newRegister4" />
                            <label style="font-size: 14px;margin-left:18px; margin-top:-21px;">Click me to set as your Background</label>
                            </div>
                        </div>

                        <hr>

                        <div>
                            <h2>Admin Theme</h2>
                            <div class="card slide">
                                <img src="<?php echo base_url();?>axxets/mega/images/auth-bg/bg-1.jpg">
                                <div class="checkbox">
                                <input type="radio" name="admin_login_theme" id="checkbox1" value="bg-1.jpg"/>
                                <label style="font-size: 14px; margin-left:18px; margin-top:-21px;" for="checkbox1">Click me to set as your Background</label>
                                </div>
                            </div>
                            <div class="card slide">
                                <img src="<?php echo base_url();?>axxets/mega/images/auth-bg/bg-2.jpg">
                                <div class="checkbox">
                                <input type="radio" name="admin_login_theme" value="bg-2.jpg"/>
                                <label style="font-size: 14px;margin-left:18px; margin-top:-21px;">Click me to set as your Background</label>
                                </div>
                            </div>
                            <div class="card slide">
                                <img src="<?php echo base_url();?>axxets/mega/images/auth-bg/bg-3.jpg">
                                <div class="checkbox">
                                <input type="radio" id="checkbox3" name="admin_login_theme" value="bg-3.jpg"/>
                                <label style="font-size: 14px;margin-left:18px; margin-top:-21px;">Click me to set as your Background</label>
                                </div>
                            </div>
                            <div class="card slide">
                                <img src="<?php echo base_url();?>axxets/mega/images/auth-bg/bg-4.jpg">
                                <div class="checkbox">
                                <input type="radio" id="checkbox1" name="admin_login_theme" value="bg-4.jpg"/>
                                <label style="font-size: 14px;margin-left:18px; margin-top:-21px;">Click me to set as your Background</label>
                                </div>
                            </div>
                            <div class="card slide">
                                <img src="<?php echo base_url();?>axxets/mega/images/auth-bg/bg-5.jpg">
                                <div class="checkbox">
                                <input type="radio" id="checkbox1" name="admin_login_theme" value="bg-5.jpg"/>
                                <label style="font-size: 14px;margin-left:18px; margin-top:-21px;">Click me to set as your Background</label>
                                </div>
                            </div>
                            <div class="card slide">
                                <img src="<?php echo base_url();?>axxets/mega/images/auth-bg/bg-6.jpg">
                                <div class="checkbox">
                                <input type="radio" id="checkbox1" name="admin_login_theme" value="bg-6.jpg"/>
                                <label style="font-size: 14px;margin-left:18px; margin-top:-21px;">Click me to set as your Background</label>
                                </div>
                            </div>
                            <div class="card slide">
                                <img src="<?php echo base_url();?>axxets/mega/images/auth-bg/bg-7.jpg">
                                <div class="checkbox">
                                <input type="radio" id="checkbox1" name="admin_login_theme" value="bg-7.jpg"/>
                                <label style="font-size: 14px;margin-left:18px; margin-top:-21px;">Click me to set as your Background</label>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

        <div class="tab-pane fade" id="complete" role="tabpanel" aria-labelledby="complete-tab">
            <div class="row">
                <div class="col-sm-12">
                <div class="text-center">
                  <h2 class="mt-0">
                    <i class="entypo-check"></i>
                  </h2>
                  <h3 class="mt-0">Thank You !</h3>
                  <p class="w-75 mb-2 mx-auto">You Are Almost There. Please Check If You Have Updated All The Necessary Things.</p>
                  <input type="submit" class="btn btn-success" value="Update" onclick="this.value='Updating..'">
                  <a href="<?php echo site_url('admin');?>" id="cancel" name="cancel" class="btn btn-default">Cancel</a>
                  </div>
                </div>
            </div>
        </div>
    </div>
<?php echo form_close() ?>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("bsettings").classList.add('active');
        document.querySelector("#bsettings > ul > li:nth-child(1) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>

<script type="text/javascript">
  $(document).ready(function(){

    if($('#width').val() != "3"){
        $('#autopool_registration').hide()
        $('#enable_crowdfund_id').hide()
        $('#enable_crowdfund').val('No')
        $('#crowdfund_type_id').hide()
        $('#sponsor_restriction').hide()
        //$('#enable_board_id').hide()
    }
    $('#width').change(function(){
      if(this.value=='3')
      {
        $('#autopool_registration').show()
        $('#enable_crowdfund_id').show()
        $('#sponsor_restriction').show()
        //$('#enable_board_id').show()
       }
      else{
        $('#autopool_registration').hide()
        $('#enable_crowdfund_id').hide()
        $('#enable_crowdfund').val('No')
        $('#crowdfund_type_id').hide()
        $('#crowdfund_type').val('Automatic')
        $('#not_allow_crowd_fund').show();
        $('#sponsor_restriction').hide()
        //$('#enable_board_id').hide()
      }
    });

    if($('#enable_board').val() =="Yes"){
        $('#product_related_id').hide()
        $('#sep_tree_id').show()
        $('#sep_tree').val('Yes')
        $('#enable_crowdfund_id').hide()
        $('#crowdfund_type_id').hide()
        $('#crowdfund_type').val('Automatic')
        $('#level_completion_id').show()
        $('#level_income').val('Yes')
        $('#level_income_sponsor_carry').val('No')
    }
    $('#enable_board').change(function(){
      if(this.value=='Yes')
      {
        $('#product_related_id').hide()   
        $('#sep_tree_id').show()
        $('#sep_tree').val('Yes')
        $('#id_upgrade_id').show()
        $('#id_upgrade').val('Yes')
        $('#enable_crowdfund_id').hide()
        $('#crowdfund_type_id').hide()
        $('#crowdfund_type').val('Automatic')
        $('#level_completion_id').show()
        $('#level_income').val('Yes')
        $('#level_income_sponsor_carry').val('No')
       }
      else{
        $('#product_related_id').show()
        $('#enable_crowdfund_id').show()
        $('#enable_crowdfund').val('No')
        $('#crowdfund_type_id').hide()
      }
    });


    if($('#sep_tree').val() =="No"){
        $('#id_upgrade_id').hide()
    }
    $('#sep_tree').change(function(){
      if(this.value=='Yes')
      {
        $('#id_upgrade_id').show()   
       }
      else{
        $('#id_upgrade_id').hide()
      }
    });

    if($('#enable_crowdfund').val() =="No"){
        $('#crowdfund_type_id').hide()
        $('#crowdfund_type').val('Automatic')
    }
    $('#enable_crowdfund').change(function(){
      if(this.value=='Yes')
      {
        $('#crowdfund_type_id').show()   
       }
      else{
        $('#crowdfund_type_id').hide()
        $('#crowdfund_type').val('Automatic')
      }
    });

    if($('#crowdfund_type').val() =='Manual_Peer_to_Peer'){
        $('#level_completion_id').hide();
        $('#product_related_id').hide();
    }
    $('#crowdfund_type').change(function(){
      if(this.value=='Manual_Peer_to_Peer')
      {
        $('#level_completion_id').hide();
        $('#product_related_id').hide();
       }
      else{
        $('#level_completion_id').show();
        $('#product_related_id').show();
      }
    });

    if($('#enable_pg').val() =="No"){
        $('.gateways').hide()
    }
    $('#enable_pg').change(function(){
      if(this.value=='Yes')
      {
        $('.gateways').show()   
       }
      else{
        $('.gateways').hide()
      }
    });

    if($('#joining_product').val() =="No"){
        $('#make_join_product_entry_id').hide()
    }
    $('#joining_product').change(function(){
      if(this.value=='Yes')
      {
        $('#make_join_product_entry_id').show()   
       }
      else{
        $('#make_join_product_entry_id').hide()
      }
    });

    if($('#level_income').val() =="No"){
        $('#level_income_sponsor_carry').hide()
    }
    $('#level_income').change(function(){
      if(this.value=='Yes')
      {
        $('#level_income_sponsor_carry').show()   
       }
      else{
        $('#level_income_sponsor_carry').hide()
      }
    });

    if($('#free_registration').val() =="No"){
        $('#inactive_in_tree').hide()
    }
    $('#free_registration').change(function(){
      if(this.value=='Yes')
      {
        $('#inactive_in_tree').show()   
       }
      else{
        $('#inactive_in_tree').hide()
      }
    });

    if($('#reg_default').val() =="No"){
        $('#login_default').hide()
    }
    $('#reg_default').change(function(){
      if(this.value=='Yes')
      {
        $('#login_default').show()   
       }
      else{
        $('#login_default').hide()
      }
    });

    if($('#width').val() != "2"){
        $('#enalbe_leg_id').hide()
    }
    $('#width').change(function(){
      if(this.value=='2')
      {
        $('#enalbe_leg_id').show()   
       }
      else{
        $('#enalbe_leg_id').hide()
      }
    });




  });
</script>