<div class="row">
    <div class="col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Sales History
            </div>
            <?php 
            if($sales) { ?>
            <div class="panel-body table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <td>S.N.</td>
                        <td>Product Name</td>
                        <td>Member ID</td>
                        <td>Qty</td>
                        <td>Total Cost</td>
                        <td>Delivery Date</td>
                        <td>#</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sn = count($sales);
                    foreach ($sales as $result):
                            $data = unserialize($result->stock_data);
                        $tax        = unserialize($result->stock_data_tax);
                        $price      = unserialize($result->stock_data_price);
                        foreach ($data as $key => $val): ?>
                        <tr>
                            <td><?php echo $sn-- ?></td>
                            <td><?php echo $this->db_model->select('prod_name', 'product', array('id' => $key)) ?></td>
                            <td><?php echo $result->userid ?></td>
                            <td><?php echo $val; ?></td>
                            <td><?php echo config_item('currency') . number_format($price[$key] * $val, 2) ?></td>
                            <td><?php echo $result->date ?></td>
                            <td><a target="_blank" href="<?php echo site_url('franchisee/print_fran_invoice/' . $result->id) ?>"
                            class="btn btn-success btn-xs">Print</a></td>
                        </tr>
                        <?php endforeach;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php } else { ?>
            <div> 
                <h3 style="margin-left: 10%;"> There are no Sales Transaction !! </h3>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
