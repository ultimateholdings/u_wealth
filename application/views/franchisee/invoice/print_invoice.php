<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta name="robots" content="noindex, nofollow">
    <title>Management Dashboard | <?php echo config_item('company_name') ?></title>
    <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all"
          rel="stylesheet"
          type="text/css"/>
    <style type="text/css">
        table, tr
        { border: 1px solid #ccc }
    </style>
</head>
<body>
<p>&nbsp;</p>
<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-border" align="center" style="max-width: 700px">
            <tr>
              <td><h4>INVOICE # <?php echo $this->uri->segment(3) ?></h4></td>
              <td align="right"><h4>Date: <?php echo $result->date ?></h4></td>
          </tr>
          <tr style="border-bottom: 0px #fff;">
              <td><img src="<?php echo base_url();?>axxets/client/logo_dark.png" width="160" height="50" alt="logo"></td>
          </tr>
          <tr style="border-bottom: 0px #fff;">
              <td style="padding-top: 10%;border-bottom: 0px #fff;"><strong>Bill By:</strong><br/><?php echo nl2br($result->company_address) ?>
              </td>
              <td style="padding-top: 10%;border-bottom: 0px #fff;"><strong>Bill To:</strong><br/><?php echo nl2br($result->bill_to_address) ?>
              </td>
          </tr>
            <tr>
                <td colspan="2">
                    <table class="table table-striped">
                        <tr>
                            <td>Item Name</td>
                            <td>Price</td>
                            <td>Tax Amount</td>
                            <td>Price Per Piece</td>
                            <td>Qty</td>
                            <td align="right">Total</td>
                        </tr>
                        <?php
                        foreach (unserialize($result->invoice_data) as $data => $val):
                            $tax = unserialize($result->invoice_data_tax);
                            $qty = unserialize($result->invoice_data_qty);
                            ?>
                            <tr>
                                <td><?php echo $data ?></td>
                                <td><?php echo config_item('currency') . $val ?></td>
                                <td><?php echo config_item('currency') . ($tax[$data] ? $tax[$data] : 0) ?></td>
                                <td><?php echo config_item('currency') . ($val + $tax[$data]) ?></td>
                                <td><?php echo $qty[$data] ?></td>
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
                    * This is an electronically generated invoice, hence no further signature is required.
                </td>
            </tr>
        </table>
        <div align="center">
            <?php if (($result->total_amt - $result->paid_amt) <= 0) {
                echo '<h1 align="center" style="color: green">PAID</h1>';
            }
            else {
                echo '<h2 align="center" style="color: red">NOT FULLY PAID</h2>';
            } ?>
        </div>
    </div>
</div>
</body>
</html>
