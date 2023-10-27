<?php
//print_r($parents);die();
?>

<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr>
            <th>SN</th>
            <th>Subject</th>
            <th>Content</th>
            <!--<th>Date</th>-->
            <th>Actions</th>
        </tr>
        <?php
        $sn = 1;
        foreach ($parents as $e) { ?>
            
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $e['subject'];?></td>
                <td><?php echo $e['content'];?></td>
                <!--<td><?php echo date("Y-m-d h:i A",strtotime($e['date'])); ?></td>-->
                <td>
                    <a href="<?php echo site_url('admin/view_news/' . $e['id']); ?>" class="btn btn-danger btn-xs">View</a>
                    <a onclick="return confirm('Are you sure you want to delete this News?')"
                       href="<?php echo site_url('admin/remove_news/' . $e['id']); ?>"
                       class="btn btn-danger btn-xs">Delete</a>
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
        document.getElementById("news").classList.add('active');
        document.querySelector("#news > ul > li:nth-child(2) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>
