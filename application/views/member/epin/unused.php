<?php

?>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr class="table-info table-bordered">
            <th style="border: 1px solid #80808042;">SN</th>
            <th style="border: 1px solid #80808042;">Epin</th>
            <th style="border: 1px solid #80808042;">Amount</th>
            <th style="border: 1px solid #80808042;">Issue To</th>
            <th style="border: 1px solid #80808042;">Date</th>
        <!--    <th>Type</th>-->
            <th style="border: 1px solid #80808042;">Actions</th>
        </tr>
        <?php
        $sn = 1;
        foreach ($epin as $e) { ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $e['epin']; ?></td>
                <td><?php echo $e['amount']; ?></td>
                <td><?php echo config_item('ID_EXT') . $e['issue_to']; ?></td>
                <td><?php echo date("Y-m-d h:i A",strtotime($e['generate_time'])); ?></td>
                <td>
                    <a target="_blank" href="<?php echo site_url('site/register/A/'.$this->session->user_id.'/epin/' . $e['epin']); ?>" class="btn btn-info btn-xs">Add New Member</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
<div class="pull-right">
   <?php  echo $this->pagination->create_links(); ?>
       
  
</div>
<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("epins").classList.add('active');
        document.querySelector("#aside > ul > li.active > ul > li:nth-child(1) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>