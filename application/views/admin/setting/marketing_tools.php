<?php

?>
<div class="row">
    <div class="state-overview">
        <a href="<?php echo site_url('setting/sms_marketing') ?>">
            <div class="col-sm-6">
                <div class="overview-panel purple">
                    <div class="symbol">
                        <i class="fa fa-envelope usr-clr"></i>
                    </div>
                    <div class="value white">
                        <p class="sbold addr-font-h1" data-counter="counterup" data-value="23">SMS</p>
                        <p>SMS Marketing</p>
                    </div>
                </div>
            </div>
        </a>
        <a href="<?php echo site_url('setting/email_marketing') ?>">
            <div class="col-sm-6">
                <div class="overview-panel purple">
                    <div class="symbol">
                        <i class="fa fa-mail-forward usr-clr"></i>
                    </div>
                    <div class="value white">
                        <p class="sbold addr-font-h1" data-counter="counterup" data-value="23">Email</p>
                        <p>Email Marketing</p>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("marketingtools").classList.add('active');
       
    });
</script>