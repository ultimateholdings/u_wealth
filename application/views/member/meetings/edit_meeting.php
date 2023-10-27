<?php

?>
<?php echo form_open('member/update_meeting') ?>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group col-sm-12">
            <label for="meeting_date">Live meeting schedule (Date):</label><span style="color:red">*</span>
            <input type="text" name="meeting_date" class="form-control" placeholder="Enter date" value=" <?php echo $ads->date; ?>" required>
            
        </div>
        <input type="hidden" name="id" value="<?php echo $ads->id ?>">
        <div class="form-group col-sm-12">
            <label for="meeting_time">Live meeting schedule (Time):</label><span style="color:red">*</span>
            <input type="time" name="meeting_time" class="form-control" placeholder="Enter time" value="<?php echo date('h:i:s', $ads->time); ?>" required>
        </div>
        <div class="form-group col-sm-12">
            <label for="meeting_name">Live meeting name:</label><span style="color:red">*</span>
            <input type="text" name="meeting_name" class="form-control" placeholder="Enter title" value="<?php echo $ads->meet_name; ?>" required>
        </div>
        <div class="form-group col-sm-12">
            <label for="meeting_description">Description</label><span style="color:red">*</span>
            <textarea class="form-control" type="varchar"  name="meeting_description" rows="3" style="padding-right:0px;width: 98%;" title="Enter description" placeholder='Enter description'><?php echo $ads->description ?></textarea>
        </div>
        <div class="form-group col-sm-12">
            <label for="meeting_id">Zoom meeting id </label><span style="color:red">*</span>
            <input type="text" name="meeting_id" class="form-control" placeholder="Enter meeting id" value="<?php echo $ads->zoom_meeting_id; ?>" required>
        </div>
        
    </div>

    <div class="col-md-6" style="margin-top: 25px;">
        <div class="alert alert-success text-center" role="alert">
            <h4 class="alert-heading">Meeting User details</h4>
            <p>Number of Members : </p>
            <hr>
            <p class="mb-0">Get Zoom Meeting plans that fit your business perfectly.</p>
            <br>
            <div class="mt-2">
                <a href="https://zoom.us/pricing" target="_blank" class="btn btn-xs btn-primary"><span class="title">Click here for Zoom meeting plans &rarr;</span> </a>

            </div>


        </div>
        <div class="form-group col-md-12" style="margin-top: 10px;">
            <label for="meeting_link">Zoom meeting link</label>
            <span style="color:red"> (Optional)</span>
            <input type="text" name="meeting_link" class="form-control" value="<?php echo $ads->zoom_meeting_link; ?>" placeholder="Enter meeting link">
        </div>
        <div class="form-group col-sm-12" style="margin-top: 10px;">
            <label for="meeting_password">Zoom meeting password</label><span style="color:red">*</span>
            <input type="text" name="meeting_password" class="form-control" placeholder="Enter meeting password" value="<?php echo $ads->zoom_meeting_password; ?>" required>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12" style="margin-left:32px"><br/>
          
            <input type="submit" class="btn btn-success" value="Update" onclick="this.value='Updating..'">
            <a href="<?php echo site_url('/member/manage_meetings');?>" id="cancel" name="cancel" class="btn btn-danger">Cancel</a>
        </div>
    </div>
    <?php echo form_close() ?>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("meetings").classList.add('active');
        document.querySelector("#meetings > ul > li:nth-child(1) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>