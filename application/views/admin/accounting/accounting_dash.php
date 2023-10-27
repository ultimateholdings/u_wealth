<style type="text/css">
    tr{
        background-color: #fff;
    }
</style>

<?php
$member_earnings = $this->db->query("SELECT type, round(SUM(amount),0) amount FROM `earning` where name !='admin' group by 1 ORDER by 2 desc")->result_array();

$member_deductions = $this->db->query("SELECT type, round(SUM(amount),0) amount FROM `deductions` where type like '%Upgrade%' group by 1 ORDER by 2 desc")->result_array();

?>
<div class="row">
    <div class="col-sm-12">
        Hi, <?php echo $this->session->name ?><br/>
        Please find below the breakup of earnings.<p>&nbsp;</p>
    </div>
</div>

<?php if(count($member_earnings)>0){ ?>
<div class="row hr_divider">
    <div class="col-sm-12 table-responsive">
        <table class="table table-striped bg bg-white">
            <tr style="font-weight: 900">
                <td>Title</td>
                <td>Amount</td>
            </tr>
            <tr style="font-weight: 900;background-color: #d9edf7;">
                <td>Member Earnings</td>
                <td></td>
            </tr>
            <?php foreach ($member_earnings as $key => $value) { ?>
                <tr>
                    <td><?php echo $value['type'] ?></td>
                    <td>: <?php echo config_item('currency') .$value['amount']; ?></td>
                </tr>
            <?php } ?>
                <tr>
                    <td style="float: right;">Total Earnings</td>
                    <td>: <?php echo config_item('currency') .number_format(array_sum(array_column($member_earnings, 'amount')),2); ?></td>
                </tr>
            <?php if(count($member_deductions)>0){ ?>
                <tr style="font-weight: 900;background-color: #d9edf7;">
                    <td>Member Upgrades</td>
                    <td></td>
                </tr>
                <?php foreach ($member_deductions as $key => $value) { ?>
                    <tr>
                        <td><?php echo $value['type'] ?></td>
                        <td>: -<?php echo config_item('currency') .$value['amount']; ?></td>
                    </tr>
                <?php } ?>
            <?php } ?>
            <tr style="font-weight: 900; font-size: 16px; padding: 5px; color: #1c699f">
                <td style="float: right;">Net Member Income: </td>
                <td><?php echo config_item('currency') . number_format(array_sum(array_column($member_earnings, 'amount'))-array_sum(array_column($member_deductions, 'amount')), 2); ?></td>
            </tr>
        </table>
    </div>
</div>
<?php } ?>

<a href="<?php echo site_url('admin') ?>" class="btn btn-xs btn-danger">&larr; Go Back</a>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("accounting").classList.add('active');
        document.querySelector("#accounting > ul > li:nth-child(2) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>