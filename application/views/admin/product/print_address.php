<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta name="robots" content="noindex, nofollow">
    <title>Management Dashboard | <?php echo config_item('company_name') ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('axxets/base/css/bootstrap_v3.3.7.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('axxets/base/css/fonts-open-sans.css') ?>">
    <style type="text/css">
     /*   table, tr { border : 1px solid #ccc 
        }*/

.invoice-title h2, .invoice-title h3 {
    display: inline-block;
}

.table > tbody > tr > .no-line {
    border-top: none;
}

.table > thead > tr > .no-line {
    border-bottom: none;
}

.table > tbody > tr > .thick-line {
    border-top: 2px solid;
}
.container {
    margin-right: auto;
    margin-left: auto;
    padding-left: 15px;
    padding-right: 15px;
    border: 1px solid #000;
}
h2{
    font-size:24px;
}
hr {
    margin-top: 20px;
    margin-bottom: 20px;
    border: 0;
    border-top: 1px solid #eee;
    box-sizing: content-box;
    height: 0;
}
</style>
</head>
<body onload="print()">
<p>&nbsp;</p>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="invoice-title">
                <h1 style="text-align: center;">PREPAID</h1>
            </div>
            <hr>
            <hr>
            <div class="row">
                <div class="col-xs-12">
                    <td style="padding-top: 5%;border-bottom: 0px #fff;"><strong><b>Product:</b></strong><br/><?php echo nl2br($result->invoice_name) ?>
                    </td>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-12">
                    <td style="padding-top: 5%;border-bottom: 0px #fff;"><strong><b>Ship To:</b></strong><br/><?php echo nl2br($result->ship_to_address) ?>
                    </td>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-12">
                    <td style="padding-top: 5%;border-bottom: 0px #fff;"><strong><b>Shipped By:</b></strong><br/>
                        <h2 style="margin-top: 30px;"><p style="color: blue;"><?php echo config_item('company_name'); ?><br></p></h2>
            <b><p> <?php echo config_item('company_address'); ?> <br>
                    <?php echo config_item('company_city') . ', ' . config_item('company_state') . '-' . config_item('company_zipcode'); ?> <br>
                   GSTIN No.: <?php echo config_item('company_gst'); ?> <br>
                   Phone No.: <?php echo config_item('phone') .', ' . config_item('email') ; ?></p></b>
                    </td>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
