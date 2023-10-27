<?php

?>
<div class="row">
    <div class="col-sm-12">
        Hi, <?php echo $this->session->name ?><br/>
        We are now presenting you some company financial calculation. This is just a set of system generated data.
        Please donot assume
        this
        data as final data. Please check with your CA or tax consultation before any finalization.<p>&nbsp;</p>
    </div>
</div>

<div class="row hr_divider">
    <div class="col-sm-12 table-responsive">
        <table class="table table-striped">
            <tr style="font-weight: 900">
                <td>Title</td>
                <td>Amount</td>
            </tr>
            <tr>
                <td>Earning from Member</td>
                <td>: <?php $em = $this->db_model->sum('topup', 'member', '1=1');
                    echo config_item('currency') . ($em ? $em : 0); ?></td>
            </tr>
            <tr>
                <td>Earning from Repurchase</td>
                <td>: <?php $er = $this->db_model->sum('cost', 'product_sale', '1=1');
                    $er         = ($er - $em);
                    echo config_item('currency');
                    echo($er ? $er : 0); ?></td>
            </tr>
            <tr>
                <td>Earning from Unknown Source (Based on invoice entry)</td>
                <td>: <?php $us = $this->db_model->sum('paid_amt', 'invoice', array('user_type' => 'Other'));
                    echo config_item('currency') . ($us ? $us : 0); ?></td>
            </tr>
            <tr>
                <td>Expense (from expense entry)</td>
                <td>: <?php $ee = $this->db_model->sum('amount', 'admin_expense', '1=1');
                    echo config_item('currency') . ($ee ? $ee : 0) ?></td>
            </tr>
            <tr>
                <td>Expense (from bill entry)</td>
                <td>: <?php $eb = $this->db_model->sum('paid_amt', 'purchase', '1=1');
                    echo config_item('currency') . ($eb ? $eb : 0) ?></td>
            </tr>
            <tr>
                <td>Expense (for payout)</td>
                <td>: <?php $ep = $this->db_model->sum('amount', 'withdraw_request', array('status' => 'Paid'));
                    echo config_item('currency') . ($ep ? $ep : 0); ?></td>
            </tr>
            <tr>
                <td>Expense (for Salary)</td>
                <td>: <?php $sl = $this->db_model->sum('salary', 'salary', '1=1');
                    echo config_item('currency') . ($sl ? $sl : 0); ?></td>
            </tr>
            <tr style="font-weight: 900; font-size: 16px; padding: 5px; color: #1c699f">
                <td>Total
                    Earning: <?php echo config_item('currency') . number_format( $em+ $us+$er, 2) ?></td>
                <td>Total Expense: <?php echo config_item('currency') . number_format($ee + $eb + $ep + $sl, 2) ?></td>
            </tr>
        </table>
    </div>
</div>
<a href="<?php echo site_url('admin') ?>" class="btn btn-xs btn-danger">&larr; Go Back</a>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("accounting").classList.add('active');
        document.querySelector("#accounting > ul > li:nth-child(3) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>