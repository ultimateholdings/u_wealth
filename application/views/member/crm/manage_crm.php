<div class="row" style="float: right; margin-bottom: 10px;">
   <!-- <div class="col-md-12">
     <form method="post" action='export_list_member'>
         <input type="submit"  name="export_list_member" value="Download Full Member Details" class="btn btn-primary pull-right" />
    </form>
  </div> --> <!-- File upload form-->
   <div>&nbsp;</div>
</div>
<div class="table-responsive" style="width: 100%;">
<table class="display table table-striped table-bordered" style="font-size:13px;margin-top: 10px;" id="DTable" data-name="member_list" data-page-length='100'>
        <thead>
        <tr>
            <th>SN</th>
            <th>User ID</th>
            <th>Name</th>
            <th>Sponsor ID</th>
            <th>Email</th>
           
            <th>Phone</th>
            <th>CRM Status</th>
            <th class="noExport">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sn = count($members);
        foreach ($members as $e) { ?>
            <tr>
                <td><?php echo $sn--; ?></td>
                <td><a href="<?php echo site_url('users/user_detail/' . $e['id']) ?>"
                       target="_blank"><?php echo config_item('ID_EXT') . $e['id']; ?></a></td>
                <td><?php echo $e['name']; ?></td>
                <td><a href="<?php echo site_url('users/user_detail/' . $e['sponsor']) ?>"
                       target="_blank"><?php echo $e['sponsor'] ? config_item('ID_EXT') . $e['sponsor'] : ''; ?></td>
               <td><?php echo $e['email']; ?></td>
               
                <td><?php echo $e['phone']; ?></td>
               
                <td><?php echo $e['crm_status']; ?></td>
               <td>
                <div style="display: flex;" >
                
                <a href="<?php echo site_url('member/edit_crm/' . $e['id']); ?>" class="btn btn-info btn-sm" style="margin-right: 10px;" >View</a>
               
                    </div>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
        
</div>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>
</div>
<br><br>
<?php if($title == 'Search Results'){ ?>
<a href="<?php echo site_url('users/search_user') ?>" class="btn btn-xs btn-danger">&larr; Go Back</a>
<?php } else { ?>
<a href="<?php echo site_url('member') ?>" class="btn btn-xs btn-danger">&larr; Go Back</a>
<?php } ?>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("crm").classList.add('active');
        document.querySelector("#aside > ul > li.active > ul > li:nth-child(1) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>