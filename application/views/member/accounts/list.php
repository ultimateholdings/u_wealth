<?php echo $this->session->flashdata('site_flash') ?>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr>
            <th>SN</th>
            <th>Name</th>
            <th>User Id</th>
            <th>Account Balance</th>
            <th>Created</th>
            <th>#</th>
        </tr>
        <?php
        $sn = 1;
        foreach ($data as $e) { ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $e->name; ?></td>
                <td><?php echo $e->id; ?></td>
                <td><?php echo $this->db_model->select('balance', 'wallet', array('userid' => $e->id));; ?></td>
                <td><?php echo date("Y-m-d h:i A",strtotime($e->join_time)); ?></td>
                <td>
                    <a href="<?php echo site_url('member/login_meber/' . $e->id) ?>" class="btn btn-xs btn-success">Login</a>
                    <a href="<?php echo site_url('member/view_member/' . $e->id) ?>" class="btn btn-xs btn-danger">View</a>
                </td>
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
        document.getElementById("my-accounts").classList.add('active');
        document.querySelector("#aside > ul > li.active > ul > li:nth-child(2) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>