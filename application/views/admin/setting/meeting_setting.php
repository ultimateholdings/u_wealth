<?php 
    $userid=1;
    $this->db->select('*');
    $this->db->where('user_id',$userid);
    $data['zoom_meeting']     = $this->db->get('zoom_meeting')->num_rows();

?>
<?php if($data['zoom_meeting']!= NULL) { ?>
    <form action="<?php echo base_url('setting/meeting_setting_update'); ?>" method="POST">
<?php } else { ?>
    <form action="<?php echo base_url('setting/meeting_setting'); ?>" method="POST">
<?php }?>
<div class="row">
    <br>
    <div class="col-sm-12">
        <h2 align="center">Zoom Account Settings</h2>
        
    </div>
    <div class="col-sm-12">
         <h3 align="center" style="color: blue;">Please Enter Zoom API and Secret Key</h3>
    </div>
   
   <div class="col-xl-12">           
        <div class="col-lg-6 col-lg-offset-3">
            <!-- <h4 class="mb-3 header-title"><?php echo 'Zoom account settings';?></h4> -->
            <br>

            <div class="form-group">
                <label for="zoom_api_key">Zoom api key<span class="required">*</span></label>
                <input type="text" name = "zoom_api_key" id = "zoom_api_key" class="form-control" value="<?php echo $zoom_meeting['api'];  ?>" required>
            </div>
            <br>
            <div class="form-group">
                <label for="zoom_secret_key">Zoom secret key<span class="required">*</span></label>
                <input type="text" name = "zoom_secret_key" id = "zoom_secret_key" class="form-control" value="<?php echo $zoom_meeting['secret_key'];  ?>" required>
            </div>
            
            
      
        </div>
  
    </div>

<div class="row">
    <div class="col-sm-6 col-sm-offset-3">
        <br>
        <?php 
            $userid= 1;
            $this->db->select('*');
            $this->db->where('user_id',$userid);
            $data['zoom_meeting']     = $this->db->get('zoom_meeting')->num_rows();

        ?>
        <?php if($data['zoom_meeting']!= NULL) { ?>
            <input type="submit" class="btn btn-success" value="Update" onclick="this.value='Updating..'">
        <?php } else { ?>
            <input type="submit" class="btn btn-success" value="Create" onclick="this.value='Creating..'">
        <?php }?>
        <a href="<?php echo site_url('admin');?>" id="cancel" name="cancel" class="btn btn-default">Cancel</a>
    </div>
</div>
<?php echo form_close() ?>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("meetings").classList.add('active');
        document.querySelector("#meetings > ul > li:nth-child(4) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>
