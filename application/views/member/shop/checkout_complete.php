<?php

?>

<table class="table table-bordered">

    <tr>
        <th>Item Description</th>
        <th>QTY</th>
        <th style="text-align:right">Item Price</th>
        <th style="text-align:right">Sub-Total</th>
    </tr>

    <?php $i = 1; ?>

    <?php foreach ($this->cart->contents() as $items): ?>

        <?php echo form_hidden('rowid[]', $items['rowid']); ?>

        <tr>
            <td>
                <?php echo $items['name']; ?>

                <?php if ($this->cart->has_options($items['rowid']) == TRUE) : ?>

                    <p>
                        <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

                            <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br/>

                        <?php endforeach; ?>
                    </p>

                <?php endif; ?>

            </td>
            <td><?php echo $items['qty']; ?></td>

            <td style="text-align:right"><?php echo config_item('currency') . $this->cart->format_number($items['price']); ?></td>
            <td style="text-align:right"><?php echo config_item('currency') . $this->cart->format_number($items['subtotal']); ?></td>
        </tr>

        <?php $i++; ?>

    <?php endforeach; ?>

    <tr>
        <td colspan="2"></td>
        <td class="right"><strong>Total</strong></td>
        <td class="right"><?php echo config_item('currency') . $this->cart->format_number($this->cart->total()); ?></td>
    </tr>

</table>
<div class="modal-footer">
    <?php echo form_open('member/add_invoice') ?>
    <?php foreach ($this->cart->contents() as $items): ?>
    <input type="hidden" name="invoice_name" value="Invoice"> 
    <input type="hidden" name="item_name" value="<?php echo $items['name']?>"> 
    <input type="hidden" name="user_id" value="<?php echo $this->session->user_id?>"    >
    <input type="hidden" name="item_price" value="1">
    <input type="hidden" name="item_tax" value="1">
    <input type="hidden" name="item_qty" value="1">

    <input type="hidden" name="user_type" value="Member">
    <input type="hidden" name="company_add" value="Company Address">
    <input type="hidden" name="bill_add" value="Billing address">
    <input type="hidden" name="total_amt" value="100">
    <input type="hidden" name="paid_amt" value="100">
    <input type="hidden" name="invoice_date" value="2019-12-03">



    <?php endforeach; ?>
    <button type="close" class="btn btn-primary" data-dismiss="modal" style="display: none;">Download Invoice</button>
</div>
<?php echo form_close() ?>  



<?php
$this->cart->destroy();
?>
<!--<a href="javascript:;" class="btn btn-xs btn-primary" onclick="print()">Print</a>-->