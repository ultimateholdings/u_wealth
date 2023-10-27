
<div class="table-responsive" style="margin-top: 10px;">
    <table class="table table-striped table-bordered">
        <tr>
            <th>SN</th>
            <th>User Id</th>
            <th>Created By</th>
            <th>Meeting Name</th>
            <th>Meeting Date</th>
            <th>Meeting Time</th>
            <th>Zoom Meeting Id</th>
            <th>Zoom Meeting Password</th>
            <th>Actions</th>
        </tr>
        <?php
        $sn = 1;
        foreach ($meetings as $e) { ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $e['user_id']; ?></td>
                <?php 

                    if($e['user_id']=='1')
                    {
                      $user_details = $this->db_model->select_multi('*', 'admin', array('id' => $e['user_id']));  
                    }
                    else
                    {
                        $user_details = $this->db_model->select_multi('*', 'member', array('id' => $e['user_id']));
                    }
                 ?>
                <td><?php echo $user_details->name; ?></td>
                <td><?php echo $e['meet_name']; ?></td>
                <td><?php echo $e['date']; ?></td>
                <td><?php echo date('h:i', $e['time']); ?></td>
                <td><?php echo $e['zoom_meeting_id']; ?></td>
                <td><?php echo $e['zoom_meeting_password']; ?></td>
                <td>
                    <a href="<?php echo site_url('admin/edit_meeting/' . $e['id']); ?>" class="btn btn-info btn-sm">Edit</a>
                    <a onclick="return confirm('Are you sure you want to delete this Meeting ?')"
                       href="<?php echo site_url('admin/delete_meeting/' . $e['id']); ?>"
                       class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <div class="pull-right">
        <?php echo $this->pagination->create_links(); ?>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("meetings").classList.add('active');
        document.querySelector("#meetings > ul > li:nth-child(2) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>