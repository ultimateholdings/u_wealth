<?php

$top_id = $this->session->user_id;
$this->db->select('*')->from('member')
         ->where(array('sponsor' => htmlentities($top_id)))->order_by('secret', 'DESC');
$data = $this->db->get()->result();
?>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr class="table-bordered table-info">
            <th style="border: 1px solid #80808042;">S.N.</th>
            <th style="border: 1px solid #80808042;">User ID</th>
            <th style="border: 1px solid #80808042;">Name</th>
            <th style="border: 1px solid #80808042;">Phone</th>
            <?php if(config_item('free_registration')=='Yes'){ ?>
            <th style="border: 1px solid #80808042;">Join Date</th>    
            <?php } ?>
            <th style="border: 1px solid #80808042;">Activation Date</th>
            <th style="border: 1px solid #80808042;">Rank</th>
            <th style="border: 1px solid #80808042;">Status</th>
        </tr>
        <?php $sn = count($data); ?>
        <?php foreach ($data as $e) { ?>
            <tr>
                <td><?php echo $sn-- ; ?></td>
                <td><?php echo config_item('ID_EXT').substr(strval($e->id),0,3).'*****'; ?></td>
                <td><?php echo $e->name ?></td>
                <td><?php echo $e->phone ?></td>
                <?php if(config_item('free_registration')=='Yes'){ ?>
                <td><?php echo date('Y-m-d', strtotime($e->join_time)); ?></td>    
                <?php } ?>
                <td><?php if($e->status == 'Active') {echo date('Y-m-d', strtotime($e->activate_time));}
                else{echo 'NA';} ?></td>
                <td><?php echo $e->rank ?></td>
                <td><?php echo $e->status ?></td>
            </tr>
        <?php } ?>
    </table>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("tree").classList.add('active');
        document.querySelector("#tree > ul > li:nth-child(3) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>