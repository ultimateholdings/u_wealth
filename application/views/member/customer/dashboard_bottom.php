<div class="row">
<?php if((config_item('enable_epin') == "Yes") || (config_item('enable_bank_deposit') == "Yes") || (config_item('enable_pg')=="Yes")) { ?>
 <div class="col-md-2 col-sm-3 col-sm-offset-4" style="margin-bottom: 5px;">
        <p align="center">
            <a href="<?php echo site_url('member/topup_wallet') ?>"
               class="btn btn-lg btn-success"><span class="<?php echo config_item('cur') ?>"></span> Deposit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&rarr;</a>
        </p>
 </div>
<?php } ?>
 <?php if ($member_data['payout']->user_withdraw=="Yes") { ?>
 <div class="col-md-2 col-sm-3" style="margin-bottom: 5px;">
        <p align="center">
            <a href="<?php echo site_url('wallet/withdraw-payouts') ?>"
               class="btn btn-lg btn-primary"><span class="<?php echo config_item('cur') ?>"></span> Withdraw&nbsp;&nbsp;&rarr;</a>
        </p>
 </div>
<?php } ?>
</div>
<!--task states end-->

<div class="col-md-12 col-sm-12" id='earning'>
        <div class="panel-body" style="max-height: 480px">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                       <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title" style="color:white;">Latest Earnings</h4>
                                    <p class="card-category" style="color:white;font-size: 12px;" > Here is the latest earnings details</p>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hovered">
                                            <thead>
                                            <tr style="font-weight: 800">
                                                <th>Income Name</th>
                                                <th>Amount</th>
                                                <th>Details</th>
                                                <th>Date</th>
                                            </tr>
                                            </thead>
                                            <?php $inc = $member_data['latest_earnings']?>
                                            <tbody>
                                            <?php foreach ($inc as $e): ?>
                                                <tr>
                                                    <td><?php echo $e->type ?></td>
                                                    <td><?php echo config_item('currency') . $e->amount ?></td>
                                                    <td><?php echo $e->pair_names ?></td>
                                                    <td><?php echo date("Y-m-d h:i A",strtotime($e->date)); ?></td>
                                                </tr>
                                            <?php endforeach; ?>
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

<div class="col-md-7 col-sm-12" style="padding-right: 0px;">
    <div class="panel-body" style="min-height: 360px;">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12" style="height:5px;">
                        <div class="card">
                            <div class="card-header card-header-primary bg-info" style="background: blue;">
                                <h4 class="card-title" style="color:white;">Contact Support</h4>
                                <p class="card-category" style="color:white; font-size: 12px;"> Send your queries to Support Team</p>
                            </div>
                            <div class="card-body">
                              <!-- /.box-header -->          
                              <form action="<?php echo site_url('ticket/new-ticket'); ?>" method="post">
                                <div class="form-group">
                                  <label style="font-size: 13px;">Subject in Brief*</label>
                                  <input type="text" class="form-control" name="ticket_title" value="<?php echo set_value('ticket_title') ?>" required>
                                </div>
                                <div class="form-group">
                                  <label style="font-size: 13px;">Issue in Detail*</label>
                                  <textarea class="form-control" id="editor" name="ticket_data" style="min-height: 100px;"><?php echo set_value('ticket_data') ?></textarea>
                                </div>
                                <div class="box-footer">
                                <button type="submit" class="pull-right btn btn-info" id="contactSupport"> Send <i class="fa fa-paper-plane-o"></i></button>
                              </div>
                              </form>
                            </div>
                          </div>
                        </div>
                  </div>
             </div>
        </div>
    </div>
</div>

<div class="col-md-5 col-sm-12" style="padding-left: 0px;">
    <div class="panel-body" style="min-height: 360px;">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12" style="height:5px;">
                        <div class="card" >
                            <div class="card-header card-header-primary" style="background: blue;">
                                <h4 class="card-title" style="color:white;">Live Updates</h4>
                                <p class="card-category" style="color:white; font-size: 12px;">Here is the Latest Updates</p>
                            </div>
                            <div class="card-body">
                              <marquee scrollamount="5" style="width:97%; min-height:228px; margin-bottom:10px; margin-left:auto; margin-right:auto;" direction="up" onmouseover="this.stop()" onmouseout="this.start()">
                                <p style="font-size:16px; line-height:23px; ">
                                Welcome to <?php echo config_item('company_name'); ?> !!!!<br/>
                                <?php if(config_item('enable_news')=='Yes') { ?>
                                  <?php $this->db->select('id, subject, content, date')->where('subject','live_updates')->order_by('id', 'desc')->limit(1);
                                     $news = $this->db->get('news')->result();
                                     if(count($news)>0) { ?>
                                      <?php foreach ($news as $n) { ?>
                                       <p style="color:#9c27b0;font-weight:bold;margin-bottom: 0px;"><?php echo $n->content; ?></p>
                                 <?php }
                                     }
                                   }?>

                                </p>
                              </marquee>
                            </div>
                          </div>
                        </div>
                  </div>
             </div>
        </div>
    </div>
</div>

