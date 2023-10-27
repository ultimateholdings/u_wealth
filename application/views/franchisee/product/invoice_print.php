<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script>
        window.print();
    </script>
</head>
<body>
<div class="container">
    <h2><?php echo config_item('company_name') ?></h2>
    <hr/>
    <div class="col-xs-12">
        <div class="row">
            <div class="col-xs-6">
                <address>
                    <strong>Billed By:</strong><br>
                    <?php $f = $this->db_model->select_multi('name, business_name, address, state, phone', 'franchisee', array('id' => $this->session->fran_id)); ?>
                    <?php echo $f->name ?><br/>
                    <?php echo $f->business_name ?><br/>
                    <?php echo $f->address ?><br/>
                    <?php echo $f->state ?><br/>
                    <?php echo $f->phone ?><br/>
                </address>
            </div>
            <div class="col-xs-6 text-right">
                <address>
                    <strong>Shipped To:</strong><br>
                    <?php $m = $this->db_model->select_multi('name, address, phone, email', 'member', array('id' => $result->userid)); ?>
                    <?php echo $m->name ?><br/>
                    <?php echo $m->address ?><br/>
                    <?php echo $m->phone ?><br/>
                    <?php echo $m->email ?><br/>
                </address>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">

            </div>
            <div class="col-xs-6 text-right">
                <address>
                    <strong>Order Date:</strong><br>
                    <?php echo $result->date ?><br><br>
                </address>
            </div>
        </div>
    </div>
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
                            <td><strong>Item</strong></td>
                            <td class="text-center"><strong>Price</strong></td>
                            <td class="text-center">Tax Amount</td>
                            <td class="text-center">Price Per Piece</td>
                            <td class="text-center"><strong>Quantity</strong></td>
                            <td class="text-right"><strong>Totals</strong></td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $data = unserialize($result->stock_data);
                        $tax        = unserialize($result->stock_data_tax);
                        $price      = unserialize($result->stock_data_price); ?>
                        <?php foreach ($data as $key => $val):
                            $total += ($price[$key] * $val);
                            ?>
                            <tr>
                                <td><?php echo $this->db_model->select('prod_name', 'product', array('id' => $key)) ?></td>
                                <td class="text-center"><?php echo config_item('currency') . number_format(($price[$key]-$tax[$key]), 2) ?></td>
                                <td class="text-center"><?php echo config_item('currency') . number_format(($tax[$key]), 2) ?></td>
                                <td class="text-center"><?php echo config_item('currency') . number_format($price[$key], 2) ?></td>
                                <td class="text-center"><?php echo $val ?></td>
                                <td class="text-right"><?php echo config_item('currency') . number_format($price[$key] * $val, 2) ?></td>
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
                            <td class="thick-line"></td>
                            <td class="thick-line"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="thick-line text-center"><strong>Subtotal</strong></td>
                            <td class="thick-line text-right"><?php echo config_item('currency') . number_format($total, 2) ?></td>
                        </tr>
                        <tr>
                            <td class="thick-line"></td>
                            <td class="thick-line"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="thick-line text-center"><strong>Total</strong></td>
                            <td class="thick-line text-right"><?php echo config_item('currency') . number_format($total, 2) ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>