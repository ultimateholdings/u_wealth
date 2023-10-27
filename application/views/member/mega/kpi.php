<?php if(config_item('crowdfund_type') == "Manual_Peer_to_Peer"){ ?>
    <div class="col-xl-3 col-md-6 col-12">
        <div class="small-box pull-up bg-info">
            <div class="inner">
                <h3><?php echo $member_data['member']->total_downline; ?></h3>
                <p>Total Team</p>
            </div>
            <div class="icon">
                <i class="mdi mdi-account-multiple"></i>
            </div>
            <a href="<?php echo site_url('tree/my-tree'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 col-12">
        <div class="small-box pull-up bg-light">
            <div class="inner">
                <h3><?php echo $member_data['direct_team']; ?></h3>
                <p>Direct Team</p>
            </div>
            <div class="icon">
                <i class="mdi mdi-account-multiple"></i>
            </div>
            <a href="<?php echo site_url('tree/directlist'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 col-12">
        <div class="small-box pull-up bg-warning">
            <div class="inner">
                <h3><?php echo config_item('currency') . $member_data['total_earned'];?></h3>
                <p>Total Earned</p>
            </div>
            <div class="icon">
                <i class="mdi mdi-diamond"></i>
            </div>
            <a href="<?php echo site_url('member/view-earning'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 col-12">
        <div class="small-box pull-up bg-success">
            <div class="inner">
                <h3><?php echo $member_data['member']->gift_level;?></h3>
                <p>Current Level</p>
            </div>
            <div class="icon">
                <i class="ion ion-arrow-graph-up-right"></i>
            </div>
            <a href="<?php echo site_url('member/view-earning'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>
        </div>
    </div>
<?php } else { ?>
    <?php if(config_item('width') == '2' ) { ?>
        <?php if(config_item('enable_pv')=='Yes') { ?>
            <div class="col-xl-3 col-md-6 col-12">
                <div class="small-box pull-up bg-info">
                    <div class="inner">
                        <h3><?php  echo $member_data['member']->total_a_pv; ?></h3>
                        <p>Left PV</p>
                    </div>
                    <div class="icon">
                        <i class="mdi mdi-account-multiple"></i>
                    </div>
                    <a href="<?php echo site_url('tree/my-tree'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-12">
                <div class="small-box pull-up bg-info">
                    <div class="inner">
                        <h3><?php  echo $member_data['member']->total_b_pv; ?></h3>
                        <p>Right PV</p>
                    </div>
                    <div class="icon">
                        <i class="mdi mdi-account-multiple"></i>
                    </div>
                    <a href="<?php echo site_url('tree/my-tree'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-12">
                <div class="small-box pull-up bg-info">
                    <div class="inner">
                        <h3><?php  echo $member_data['member']->mypv; ?></h3>
                        <p>My PV</p>
                    </div>
                    <div class="icon">
                        <i class="<?php echo config_item('mega_cur'); ?>"></i>
                    </div>
                    <a href="<?php echo site_url('member/view_pv'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
        <?php } else { ?>
            <div class="col-xl-3 col-md-6 col-12">
                <div class="small-box pull-up bg-info">
                    <div class="inner">
                        <h3><?php  echo $member_data['member']->total_a; ?></h3>
                        <p>Left Count</p>
                    </div>
                    <div class="icon">
                        <i class="mdi mdi-account-multiple"></i>
                    </div>
                    <a href="<?php echo site_url('tree/my-tree'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-12">
                <div class="small-box pull-up bg-light">
                    <div class="inner">
                        <h3><?php  echo $member_data['member']->total_b; ?></h3>
                        <p>Right Count</p>
                    </div>
                    <div class="icon">
                        <i class="mdi mdi-account-multiple"></i>
                    </div>
                    <a href="<?php echo site_url('tree/my-tree'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-12">
                <div class="small-box pull-up bg-success">
                    <div class="inner">
                        <h3><?php echo $member_data['today_pairs']; ?></h3>
                        <p>Today's Pairs</p>
                    </div>
                    <div class="icon">
                        <i class="mdi mdi-account-multiple"></i>
                    </div>
                    <a href="<?php echo site_url('tree/my-tree'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
        <?php } ?>
        <div class="col-xl-3 col-md-6 col-12">
            <div class="small-box pull-up bg-warning">
                <div class="inner">
                    <h3><?php echo config_item('currency') . $member_data['total_earned'];?></h3>
                    <p>Total Earned</p>
                </div>
                <div class="icon">
                    <i class="mdi mdi-diamond"></i>
                </div>
                <a href="<?php echo site_url('member/view-earning'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 col-12">
            <div class="small-box pull-up bg-warning">
                <div class="inner">
                    <h3><?php  echo config_item('currency') . $member_data['referral_income']; ?></h3>
                    <p>Referral Income</p>
                </div>
                <div class="icon">
                    <i class="mdi mdi-account-multiple"></i>
                </div>
                <a href="<?php echo site_url('member/view-earning'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>        
        <div class="col-xl-3 col-md-6 col-12">
            <div class="small-box pull-up bg-success">
                <div class="inner">
                    <h3><?php echo config_item('currency').$member_data['wallet_balance'];?></h3>
                    <p>Wallet Balance</p>
                </div>
                <div class="icon">
                    <i class="ion ion-arrow-graph-up-right"></i>
                </div>
                <a href="<?php echo site_url('member/view-earning'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 col-12">
            <div class="small-box pull-up bg-light">
                <div class="inner">
                    <h3><?php echo config_item('currency') . $member_data['paid_payout']; ?></h3>
                    <p>Paid Payout</p>
                </div>
                <div class="icon">
                    <i class="mdi mdi-chart-bar"></i>
                </div>
                <a href="<?php echo site_url('wallet/withdrawal-list'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 col-12">
            <div class="small-box pull-up bg-info">
                <div class="inner">
                    <h3><?php echo config_item('currency') . $member_data['pending_payout']; ?></h3>
                    <p>Pending Payout</p>
                </div>
                <div class="icon">
                    <i class="<?php echo config_item('mega_cur'); ?>"></i>
                </div>
                <a href="<?php echo site_url('wallet/withdrawal-list'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
    <?php } else { ?>
        <?php if(config_item('width') == '1') { ?>
        <div class="col-xl-3 col-md-6 col-12">
            <div class="small-box pull-up bg-info">
                <div class="inner">
                    <h3><?php
                        $total_dc = $this->db_model->sum('direct', 'level_wise_income', array('level_no <=' => $member_data['member']->gift_level+1));
                        $prev_total = $this->db_model->sum('total_member', 'level_wise_income', array('level_no <=' => $member_data['member']->gift_level));
                        $prev_total = $prev_total > 0 ? $prev_total : 0;
                        if($direct_team >= $total_dc) {
                        echo $member_data['member']->total_downline; } else {
                           echo $prev_total;
                        } ?></h3>
                    <p>Total Team</p>
                </div>
                <div class="icon">
                    <i class="mdi mdi-account-multiple"></i>
                </div>
                <a href="<?php echo site_url('tree/my-tree'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
        <?php } else if($pd->auto_pool=='Yes'){ ?>
        <div class="col-xl-3 col-md-6 col-12">
            <div class="small-box pull-up bg-info">
                <div class="inner">
                    <h3><?php echo $this->db_model->count_all('member', array('secret >' => $member_data['member']->secret, 'signup_package'=>$member_data['member']->signup_package, 'status'=>'Active')); ?></h3>
                    <p>After You</p>
                </div>
                <div class="icon">
                    <i class="mdi mdi-account-multiple"></i>
                </div>
                <a href="<?php echo site_url('tree/my-tree'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
        <?php } else { ?>
        <div class="col-xl-3 col-md-6 col-12">
            <div class="small-box pull-up bg-info">
                <div class="inner">
                    <h3><?php echo $member_data['member']->total_downline; ?></h3>
                    <p>Total Team</p>
                </div>
                <div class="icon">
                    <i class="mdi mdi-account-multiple"></i>
                </div>
                <a href="<?php echo site_url('tree/my-tree'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
        <?php } ?>
        <div class="col-xl-3 col-md-6 col-12">
            <div class="small-box pull-up bg-light">
                <div class="inner">
                    <h3><?php echo $member_data['direct_team']; ?></h3>
                    <p>Direct Team</p>
                </div>
                <div class="icon">
                    <i class="mdi mdi-account-multiple"></i>
                </div>
                <a href="<?php echo site_url('tree/directlist'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 col-12">
            <div class="small-box pull-up bg-success">
                <div class="inner">
                    <h3><?php echo config_item('currency') . $member_data['total_earned']; ?></h3>
                    <p>Total Earned</p>
                </div>
                <div class="icon">
                    <i class="mdi mdi-diamond"></i>
                </div>
                <a href="<?php echo site_url('member/view-earning'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
    <?php if(config_item('enable_pv')=='Yes') { ?>
    <div class="col-xl-3 col-md-6 col-12">
        <div class="small-box pull-up bg-warning">
            <div class="inner">
                <h3><?php echo $member_data['member']->mypv; ?></h3>
                <p>My PV</p>
            </div>
            <div class="icon">
                <i class="<?php echo config_item('mega_cur'); ?>"></i>
            </div>
            <a href="<?php echo site_url('member/view_pv'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 col-12">
        <div class="small-box pull-up bg-light">
            <div class="inner">
                <h3><?php  echo $member_data['member']->downline_pv; ?></h3>
                <p>Downline PV</p>
            </div>
            <div class="icon">
                <i class="<?php echo config_item('mega_cur'); ?>"></i>
            </div>
            <a href="<?php echo site_url('tree/my-tree'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>
        </div>
    </div>
    <?php } else { ?>
    <?php if(config_item('enable_crowdfund')=='Yes') { ?>
    <div class="col-xl-3 col-md-6 col-12">
        <div class="small-box pull-up bg-warning">
            <div class="inner">
                <h3>
                <?php  $latest = $this->db_model->select('amount', 'earning', array('userid'=> $this->session->user_id,));
                    $latest > 0 ? $latest : 0;
                    echo config_item('currency').$latest; ?>
                <p>Latest Income</p>
            </div>
            <div class="icon">
                <i class="<?php echo config_item('mega_cur'); ?>"></i>
            </div>
            <a href="<?php echo site_url('member/view-earning'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>
        </div>
    </div>
    <?php } else { ?>
    <div class="col-xl-3 col-md-6 col-12">
        <div class="small-box pull-up bg-warning">
            <div class="inner">
                <h3><?php  echo config_item('currency') . $member_data['referral_income']; ?></h3>
                <p>Referral Income</p>
            </div>
            <div class="icon">
                <i class="mdi mdi-account-multiple"></i>
            </div>
            <a href="<?php echo site_url('member/view-earning'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>
        </div>
    </div>
    <?php } ?>
    <div class="col-xl-3 col-md-6 col-12">
        <div class="small-box pull-up bg-success">
            <div class="inner">
                <h3><?php echo config_item('currency') . $member_data['level_income']; ?></h3>
                <p>Level Income</p>
            </div>
            <div class="icon">
                <i class="mdi mdi-buffer"></i>
            </div>
            <a href="<?php echo site_url('member/view-earning'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>
        </div>
    </div>
    <?php } ?>
    <div class="col-xl-3 col-md-6 col-12">
        <div class="small-box pull-up bg-warning">
            <div class="inner">
                <h3><?php echo config_item('currency').$member_data['wallet_balance'];?></h3>
                <p>Wallet Balance</p>
            </div>
            <div class="icon">
                <i class="ion ion-arrow-graph-up-right"></i>
            </div>
            <a href="<?php echo site_url('member/view-earning'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 col-12">
        <div class="small-box pull-up bg-info">
            <div class="inner">
                <h3><?php echo config_item('currency') . $member_data['paid_payout']; ?></h3>
                <p>Paid Payout</p>
            </div>
            <div class="icon">
                <i class="mdi mdi-chart-bar"></i>
            </div>
            <a href="<?php echo site_url('wallet/withdrawal-list'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 col-12">
        <div class="small-box pull-up bg-light">
            <div class="inner">
                <h3><?php echo config_item('currency') . $member_data['pending_payout']; ?></h3>
                <p>Pending Payout</p>
            </div>
            <div class="icon">
                <i class="<?php echo config_item('mega_cur'); ?>"></i>
            </div>
            <a href="<?php echo site_url('wallet/withdrawal-list'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>
        </div>
    </div>
    <?php } ?>
<?php } ?>
<?php if(config_item('extend_kpi')=='Yes'){ ?>
    <?php if(config_item('width')==2) { ?>
        <div class="col-xl-3 col-md-6 col-12">
            <div class="small-box pull-up bg-success">
                <div class="inner">
                    <h3><?php echo $member_data['direct_left']; ?></h3>
                    <p>Direct Left</p>
                </div>
                <div class="icon">
                    <i class="mdi mdi-account-multiple"></i>
                </div>
                <a href="<?php echo site_url('tree/my-tree'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 col-12">
            <div class="small-box pull-up bg-light">
                <div class="inner">
                    <h3><?php echo $member_data['direct_right']; ?></h3>
                    <p>Direct Right </p>
                </div>
                <div class="icon">
                    <i class="mdi mdi-account-multiple"></i>
                </div>
                <a href="<?php echo site_url('tree/my-tree'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 col-12">
            <div class="small-box pull-up bg-warning">
                <div class="inner">
                    <h3><?php echo config_item('currency') . $member_data['matching_income']; ?></h3>
                    <p>Matching</p>
                </div>
                <div class="icon">
                    <i class="<?php echo config_item('mega_cur'); ?>"></i>
                </div>
                <a href="<?php echo site_url('member/view-earning'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
    <?php } ?>
    <?php if($member_data['payout']->repurchase_deduct>0){ ?>
        <div class="col-xl-3 col-md-6 col-12">
            <div class="small-box pull-up bg-info">
                <div class="inner">
                    <h3><?php echo config_item('currency') . $this->db_model->select('balance', 'other_wallet', array('userid' => $this->session->user_id, 'type'=>'Repurchase')); ?></h3>
                    <p>Shopping Wallet</p>
                </div>
                <div class="icon">
                    <i class="<?php echo config_item('mega_cur'); ?>"></i>
                </div>
                <a href="<?php echo site_url('wallet/balance-transfer-list'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
    <?php } ?>
    <?php if (config_item('inactive_in_tree')=='Yes'){ ?>
        <div class="col-xl-3 col-md-6 col-12">
            <div class="small-box pull-up bg-warning">
                <div class="inner">
                    <h3><?php echo $member_data['active_team']; ?></h3>
                    <p>Active Referral</p>
                </div>
                <div class="icon">
                    <i class="mdi mdi-account-multiple"></i>
                </div>
                <a href="<?php echo site_url('tree/my-tree'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 col-12">
            <div class="small-box pull-up bg-danger">
                <div class="inner">
                    <h3><?php echo $member_data['direct_team']-$member_data['active_team']; ?></h3>
                    <p>Inactive Referral</p>
                </div>
                <div class="icon">
                    <i class="mdi mdi-account-multiple"></i>
                </div>
                <a href="<?php echo site_url('tree/my-tree'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 col-12">
            <div class="small-box pull-up bg-success">
                <div class="inner">
                    <h3><?php echo $member_data['potential_earnings']; ?></h3>
                    <p>Potential Income</p>
                </div>
                <div class="icon">
                    <i class="mdi mdi-account-multiple"></i>
                </div>
                <a href="<?php echo site_url('tree/my-tree'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>   
        <?php } ?>
<?php } ?>