<?php

?>
<div class="col-sm-12">
    <?php if ($this->cart->contents()) { ?><?php echo form_open('cart/update'); ?>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>S.N.</th>
                    <th>Item Description</th>

                    <th style="text-align:right">Unit Price</th>
                    <th style="text-align:right">Tax</th>
                    <th style="text-align:right">Price Per Peice</th>
                    <th>QTY</th>

                    <th style="text-align:right">Sub-Total</th>
                </tr>

                <?php $i = 1; ?>

                <?php foreach ($this->cart->contents() as $items):?>

                    <?php echo form_hidden('rowid[]', $items['rowid']); ?>

                    <tr>
                        <td> <?php echo $i; ?>
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

                        <td style="text-align:right"><?php echo config_item('currency') . ($this->cart->format_number($items['price'])-$this->cart->format_number($items['gst'])); ?></td>
                        <td style="text-align:right"><?php echo config_item('currency') . $this->cart->format_number($items['gst']); ?></td>
                        <td style="text-align:right"><?php echo config_item('currency') . ($this->cart->format_number($items['price'])); ?></td>
                        <td style="text-align:center;"><?php echo form_input(array('name'      => 'qty[]]',
                                                        'value'     => $items['qty'],
                                                        'maxlength' => '3',
                                                        'size'      => '5',
                                                  )); ?></td>

                        <td style="text-align:right"><?php echo config_item('currency') . $this->cart->format_number($items['subtotal']); ?></td>
                    </tr>

                    <?php $i++; ?>

                <?php endforeach; ?>

                <tr>
                    <td colspan="5"></td>
                    <td class="right"><strong>Total</strong></td>
                    <td class="right"><?php echo config_item('currency') . $this->cart->format_number($this->cart->total()); ?></td>
                </tr>

            </table>

            <p><?php echo form_submit('', 'Update your Cart'); ?></p>
            <div>
                <label>Shipping Address</label>
                 <textarea rows="7" disabled class="form-control" ><?php $member_data = $this->db_model->select_multi('s_name, s_email, s_phone,s_city,s_state,s_zipcode, s_address', 'shipping_address', array('userid' => $this->session->user_id));
                 echo "Name:". $member_data->s_name . "\n";   
                 echo "Email:".$member_data->s_email . "\n";
                 echo "Phone:".$member_data->s_phone . "\n";
                 echo "Address:".$member_data->s_address . "\n";
                 echo "City:".$member_data->s_city . "\n";
                 echo "State:".$member_data->s_state . "\n";
                 echo "Zipcode:".$member_data->s_zipcode . "\n";
                 ?></textarea>
            </div> <br/>
            <div>
                <label>Billing Address</label>
                 <textarea rows="7" disabled  class="form-control" ><?php $member_data = $this->db_model->select_multi('b_name, b_email, b_phone,b_city,b_state,b_zipcode, b_address', 'shipping_address', array('userid' => $this->session->user_id));
                 echo "Name:". $member_data->b_name . "\n";   
                 echo "Email:".$member_data->b_email . "\n";
                 echo "Phone:".$member_data->b_phone . "\n";
                 echo "Address:".$member_data->b_address . "\n";
                 echo "City:".$member_data->b_city . "\n";
                 echo "State:".$member_data->b_state . "\n";
                 echo "Zipcode:".$member_data->b_zipcode . "\n";
                 ?></textarea>
            </div> <br/>
            
            <a href="<?php echo site_url('cart/checkout') ?>" class="btn btn-success">Checkout &rarr;</a>
            <a href="<?php echo site_url('member/shipping_address') ?>" class="btn btn-success">Update Shipping address &rarr;</a>
            <a href="<?php echo site_url('member/billing_address') ?>" class="btn btn-success">Update Billing address &rarr;</a>

            <a href="<?php echo site_url('cart/new-purchase') ?>" class="btn btn-danger">Buy More Items &rarr;</a>
        </div><br/>
        <br/>
        <?php echo form_close();
    }
    else {
        echo '<h3 align="center">:( You have no item in your cart</h3>';
    } ?>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("cart").classList.add('active');
        document.querySelector("#aside > ul > li.active > ul > li:nth-child(1) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>