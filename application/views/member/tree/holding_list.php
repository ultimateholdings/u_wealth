<?php

$top_id = $this->session->user_id;
$this->db->select('*')->from('member')
         ->where(array('sponsor' => htmlentities($top_id),'position<='=>0))->order_by('secret', 'DESC');
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
            <th style="border: 1px solid #80808042;">Action</th>

        </tr>
        <?php $sn = count($data); ?>
        <?php foreach ($data as $e) { ?>
            <tr>
                <td><?php echo $sn-- ; ?></td>
                <td><?php echo config_item('ID_EXT').substr(strval($e->id),0,8); ?></td>
                <td><?php echo $e->name ?></td>
                <td><?php echo $e->phone ?></td>
                <?php if(config_item('free_registration')=='Yes'){ ?>
                <td><?php echo date('Y-m-d', strtotime($e->join_time)); ?></td>    
                <?php } ?>
                <td><?php if($e->status == 'Active') {echo date('Y-m-d', strtotime($e->activate_time));}
                else{echo 'NA';} ?></td>
                <td><?php echo $e->rank ?></td>
                <td><?php echo $e->status ?></td>
                <input type="hidden" id="uid" value="<?= $e->id ?>">
                <td><a href="#" onclick="assign(<?= $e->id ?>); return false;" id="uid" data-toggle="modal" data-target="#insertModal" data-uid="<?= $e->id ?>" class="btn btn-primary" >Insert into Tree</a></td>
            </tr>
        <?php } ?>
    </table>
</div>

<div class="modal fade" id="insertModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center">
                    <h3>Please Select the Leg For User to Inter Into Tree</h3><br><br>
                    <form method="post" action="<?= site_url('member/holding_activate') ?>">
                        <select name="userleg" id="userleg">
                            <option value="A">Left</option>
                            <option value="B">Right</option>
                        </select>
                        <input type="hidden" id="uiid" name="uiid" value="">
                        <input type="submit" value="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("tree").classList.add('active');
        document.querySelector("#tree > ul > li:nth-child(5) > a > span").setAttribute('style', 'color: darkorange !important;');
    });

    function assign(uid){
        $('#uiid').val(uid);
    }

</script>