<style>
  table th,td{
    text-align: center;
  }
</style>

<div class="row" style="float: right; margin-bottom: 10px;">
   <!-- <div class="col-md-12">
     <form method="post" action='export_list_member'>
         <input type="submit"  name="export_list_member" value="Download Full Member Details" class="btn btn-primary pull-right" />
    </form>
  </div>  --><!-- File upload form-->
   <div>&nbsp;</div>
</div>
<div class="table-responsive" style="width: 100%;">
<table class="display table table-striped table-bordered" style="font-size:13px;margin-top: 10px;" id="DTable" data-name="meeting_list" data-page-length='100'>
        <thead>
        <tr>
            <th>S.N.</th>
            <th>Schedule By</th>
            <th>Meetings Name</th>
            <th>Date</th>
            <th>Time</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sn = 1;
        foreach ($upcomming as $e) {

            if($e->date >= date('Y-m-d')){
        
                $time = date("h:i", strtotime('+40 minutes', $e->time));
                if($e->time >= $time){
             ?>
            <tr>
                <td><?php echo $sn++  ; ?></td>
                <td>
                    <?php echo ($e->user_id == 1)?$this->db_model->select('name', 'admin', array('id' => $e->user_id)) : $this->db_model->select('name', 'member', array('id' => $e->user_id)); ?>
                </td>
                <td>
                    <?php echo $e->meet_name; ?>
                </td>
                <td><?php echo $e->date; ?></td>
                <td><?php echo date('h:i', $e->time); ?></td>
                <?php if(1==1){ ?>
                    <td><a href="<?php echo site_url('member/live_meeting_join/'.$e->id);?>" class="btn btn-success" target="_blank">Join</a></td>
                <?php } else { ?>
                    <td><a href="<?php echo $e->zoom_link; ?>" class="btn btn-success" target="_blank">Join1</a></td>
                <?php } ?>
            </tr>
        <?php }}} ?>
        </tbody>
    </table>
</div>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>
</div>
<br><br>
<a href="<?php echo site_url('member') ?>" class="btn btn-xs btn-danger">&larr; Go Back</a>
<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("meetings").classList.add('active');
        document.querySelector("#meetings > ul > li:nth-child(2) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>
