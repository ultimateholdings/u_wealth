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
<?php

function getIndianCurrency(float $number)
{
    $decimal = round($number - ($no = floor($number)), 2) * 100;
    $hundred = null;
    $digits_length = strlen($no);
    $i = 0;
    $str = array();
    $words = array(0 => '', 1 => 'One', 2 => 'Two',
        3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
        7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
        10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
        13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
        16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
        19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
        40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
        70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
    $digits = array('', 'Hundred','Thousand','Lakh', 'Crore');
    while( $i < $digits_length ) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
        } else $str[] = null;
    }
    $Rupees = implode('', array_reverse($str));
    $paise = ($decimal > 0) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
    return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise;
}

?>

<body onload="print()">
<p>&nbsp;</p>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="invoice-title">
                <h1 style="text-align: center;">Tax Invoice</h1>
            </div>
               <hr>
                <img src="<?php echo base_url("axxets/client/logo.png");?>" alt="logo" width="120" height="60">
                <h2 style="margin-top: -60px;"><p style="text-align: center;color: blue;"><?php echo config_item('company_name'); ?><br></p></h2>
                <b><p style="text-align: center;"> <?php echo config_item('company_address'); ?> <br>
                    <?php echo config_item('company_city') . ', ' . config_item('company_state') . '-' . config_item('company_zipcode'); ?> <br>
                   GSTIN No.: <?php echo config_item('company_gst'); ?> <br>
                   Phone No.: <?php echo config_item('phone') .', ' . config_item('email') ; ?></p></b>
            <hr>
            <div class="row">
                <div class="col-xs-6">
                    <td style="padding-top: 5%;border-bottom: 0px #fff;"><strong><b>Billing address:</b></strong><br/><?php echo nl2br($result->bill_to_address) ?>
                    </td>
                </div>
                <div class="col-xs-6 text-right">
                    <td style="padding-top: 5%;border-bottom: 0px #fff;"><strong><b>Shipping address:</b></strong><br/><?php echo nl2br($result->ship_to_address) ?>
                    </td>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-6">
                    <tr>
                    <td><h4>INVOICE No. <?php echo $this->uri->segment(3) ?></h4></td>
                    </tr> 
                </div>
                <div class="col-xs-6 text-right">
                    <tr>
                    <td align="right"><h4>Date: <?php echo date('d-m-Y',strtotime($result->date)) ?></h4></td>
                    </tr>
                </div>
               <!-- <div class="col-xs-6 text-right">
                    <p>
                       <h2><strong>Invoice Date:</strong><br></h2>        
                    </p>
                </div>-->
            </div>
        </div>
    </div>
    <hr>
    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Order summary</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td class="text-left"><strong>Item Name</strong></td>
                                    <td class="text-center"><strong>Price</strong></td>
                                    <td class="text-center"><strong>Tax Amount</strong></td>
                                    <td class="text-center"><strong>Price Per Piece</strong></td>
                                    <td class="text-center"><strong>Quantity</strong></td>
                                    <td class="text-right"><strong>Total</strong></td>
                                </tr>
                            </thead>
                         <?php
                        foreach (unserialize($result->invoice_data) as $data => $val):
                            $tax = unserialize($result->invoice_data_tax);
                            $qty = unserialize($result->invoice_data_qty);
                            ?>
                            <tr>
                                <td class="text-left"><?php echo $data ?></td>
                                <td class="text-center"><?php echo config_item('currency') . $val ?></td>
                                <td class="text-center"><?php echo config_item('currency') . ($tax[$data] ? $tax[$data] : 0) ?></td>
                                <td class="text-center"><?php echo config_item('currency') . ($val + $tax[$data])  ?></td>
                                <td class="text-center"><?php echo $qty[$data] ?></td>
                                <td align="right"><?php echo config_item('currency') . (($val + $tax[$data])*$qty[$data]) ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td>&nbsp;</td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-right"></td>
                        </tr>
                        <tr>
                            <td align="right" colspan="6"><strong>Total
                                    Payable: &nbsp;&nbsp;</strong> <?php echo config_item('currency') . (number_format($result->total_amt,2)) ?></td>
                        </tr>
                        <tr>
                            <td align="right" colspan="6"><strong>Paid
                                    Amount: &nbsp;&nbsp;</strong> <?php echo config_item('currency') . (number_format($result->paid_amt,2)) ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" colspan="6"><strong>Due
                                    Balance:&nbsp;&nbsp; </strong> <?php echo config_item('currency') . (number_format(($result->total_amt - $result->paid_amt),2)) ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</div>
<hr>

<?php if(config_item('company_country')=='India'){ ?>
&nbsp;&nbsp; <b><?php echo getIndianCurrency(round($result->total_amt,2)); ?>Only</b>
<hr>
<?php } ?>

* This is an electronically generated invoice, hence no further signature is required.
<p>Certified that particulars given above are true and correct and the amount represents the price actually charge from the buyer</p>
<p class="">Remarks : </p>
<div align="center">
    <?php if (($result->total_amt - $result->paid_amt) <= 0) {
        echo '<h1 align="center" style="color: green">PAID</h1>';
    } else {
        echo '<h2 align="center" style="color: red">NOT FULLY PAID</h2>';
    } ?>
</div>
</body>
</html>
