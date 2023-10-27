<?php

?>
<p>&nbsp;</p>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr class="table-info table-bordered">
            <th style="border: 1px solid #80808042;">SN</th>
            <th style="border: 1px solid #80808042;">User ID</th>
            <th style="border: 1px solid #80808042;">Order ID</th>
            <th style="border: 1px solid #80808042;">Email</th>
            <th style="border: 1px solid #80808042;">Amount</th>
            <th style="border: 1px solid #80808042;">Mode</th>
            <th style="border: 1px solid #80808042;">Date</th>
            
            <!-- <th>Feedback</th> -->
            
        </tr>
        <?php
        $sn = 1;
        foreach ($transactions as $e) { ?>
            <tr>

                <td><?php echo $sn++; ?></td>
                <td><?php echo $e['user_id']; ?></td>
                <td><?php echo $e['order_unique_id']; ?></td>
                <td><?php echo $e['email']; ?></td>
                <td><?php echo $e['payment_amt']; ?></td>  
                <td><?php echo $e['gateway']; ?></td>  
                <td><?php echo date('d-M-Y h:i:s', $e['date']); ?></td>     
                
                
                         
            </tr>
        <?php } ?>
    </table>
</div>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("my_ecommerce1").classList.add('active');
        document.querySelector("#aside > ul > li.active > ul > li:nth-child(1) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>
