<?php

$top_id = $this->uri->segment('3') ? $this->uri->segment('3') : config_item('top_id');
$this->db->select('*')->from('member')
         ->where(array('sponsor' => htmlentities($top_id)))->order_by('secret', 'DESC');
$data = $this->db->get()->result();
?>

<div class="table-responsive">
    <table class="table table-bordered" id="DTable" data-page-length='100' data-name="referral_list" data-export='Yes'>
 <thead class="bg bg-primary" style="color: white">
        <tr>
            <th>S.N.</th>
            <th>User ID</th>
            <th>Name</th>
            <th>Phone</th>
            <?php if(config_item('free_registration')=='Yes'){ ?>
            <th>Join Date</th>    
            <?php } ?>
            <th class="datefilter">Activation Date</th>
            <th>Rank</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <?php $sn = count($data); ?>
        <?php foreach ($data as $e) { ?>
            <tr>
                <td><?php echo $sn-- ; ?></td>
                <td><?php echo $e->id ?></td>
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
        </tbody>
    </table>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("utree").classList.add('active');
        document.querySelector("#utree > ul:nth-child(2) > li:nth-child(2) > a:nth-child(1) > span:nth-child(1)").setAttribute('style', 'color: darkorange !important;');
    });
</script>