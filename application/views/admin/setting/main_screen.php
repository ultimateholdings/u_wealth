<?php

?>
<div class="row">
    <div class="state-overview">
        <a href="<?php echo site_url('setting/common-setting') ?>">
            <div class="col-sm-3">
                <div class="overview-panel green">
                    <div class="symbol">
                        <i class="fa fa-cog usr-clr"></i>
                    </div>
                    <div class="value white">
                        <p class="sbold addr-font-h2">Common</p>
                        <p>Setting</p>
                    </div>
                </div>
            </div>
        </a>

        <a href="<?php echo site_url('setting/front-end-setting') ?>">
            <div class="col-sm-3">
                <div class="overview-panel blue">
                    <div class="symbol">
                        <i class="fa fa-wrench usr-clr"></i>
                    </div>
                    <div class="value white">
                        <p class="sbold addr-font-h2">Front End</p>
                        <p>Setting</p>
                    </div>
                </div>
            </div>
        </a>

        <a href="<?php echo site_url('setting/advance-setting') ?>">
            <div class="col-sm-3">
                <div class="overview-panel orange">
                    <div class="symbol">
                        <i class="fa fa-wrench usr-clr"></i>
                    </div>
                    <div class="value white">
                        <p class="sbold addr-font-h2">Advance</p>
                        <p>Setting</p>
                    </div>
                </div>
            </div>
        </a>

        <a href="<?php echo site_url('setting/payout-setting') ?>">
            <div class="col-sm-3">
                <div class="overview-panel green">
                    <div class="symbol">
                        <i class="fa fa-usd usr-clr"></i>
                    </div>
                    <div class="value white">
                        <p class="sbold addr-font-h2">Payout</p>
                        <p>Setting</p>
                    </div>
                </div>
            </div>
        </a>
        <?php if (config_item('enable_pg') == "Yes") { ?>
        <a href="<?php echo site_url('setting/payment-gateway') ?>">
            <div class="col-sm-3">
                <div class="overview-panel green">
                    <div class="symbol">
                        <i class="fa fa-yen usr-clr"></i>
                    </div>
                    <div class="value white">
                        <p class="sbold addr-font-h2">Payment</p>
                        <p>Gateway</p>
                    </div>
                </div>
            </div>
        </a>
        <?php } ?>
    </div>
</div>
