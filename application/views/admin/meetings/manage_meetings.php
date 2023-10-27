<?php

?>
<button type="button" class="btn btn-success" style="margin-top:13px;border:0.5px solid white;"   data-toggle="modal" data-target="#exampleModal1" id="button">Create New Meeting</button>

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


<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" role="document" style="width: 650px;margin: auto;">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" style="font-size:20px;color:blue;">Create New Meeting</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
              <form action = "<?php echo base_url('admin/add_meeting') ?>" method = "POST">

              <?php echo form_open() ?>  

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group col-sm-12 text-left">
                            <label for="meeting_date">Live meeting schedule (Date):</label><span style="color:red">*</span>
                            <input type="date" name="meeting_date" class="form-control" placeholder="Enter date" value=" <?php echo date('Y-m-d', strtotime(date('Y-m-d'))); ?>" required>
                            <br>
                            <label for="meeting_time">Live meeting schedule (Time):</label><span style="color:red">*</span>
                            <input type="time" name="meeting_time" class="form-control" placeholder="Enter time" value="<?php echo(strtotime("now")); ?>" required>
                            <br>
                            <label for="meeting_name">Live meeting name:</label><span style="color:red">*</span>
                            <input type="text" name="meeting_name" class="form-control" placeholder="Enter name" value="" required>
                            <br>
                            <label for="meeting_description">Description</label>
                            <textarea class="form-control" type="varchar"  name="meeting_description" rows="3" style="padding-right:0px;width: 98%;" title="Enter description" placeholder='Enter description'></textarea>
                            <br>
                            <label for="meeting_id">Zoom meeting id </label><span style="color:red">*</span>
                            <input type="text" name="meeting_id" class="form-control" placeholder="Enter meeting id" required>

                            
                                                     
                        </div>
                    </div>
                    <div class="col-md-6" style="margin-top: 31px;">
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
                        <div class="col-md-12" style="margin-top: 20px;">
                            <!-- <br>
                            <br>
                            <br> -->
                            
                             <label for="meeting_link">Zoom meeting link</label>
                             <span style="color:red"> (Optional)</span>
                            <input type="text" name="meeting_link" class="form-control" placeholder="Enter meeting link">
                            <br>
                            <label for="meeting_password">Zoom meeting password</label><span style="color:red">*</span>
                            <input type="text" name="meeting_password" class="form-control" placeholder="Enter meeting password" required>

                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="padding-bottom: 0px;">
                  
                    <div class="row">
                        <div class="form-group col-sm-6 text-left">
                            <button class="btn btn-success" style="margin-right:150px;" type="submit" onclick="this.disabled=true;this.form.submit();">submit</button>
                            
                        </div>
                        <div class="form-group col-sm-6 text-right">
                            
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>                            
                    </div>
                </div>
            <?php echo form_close() ?>
        </div>
    
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("meetings").classList.add('active');
        document.querySelector("#meetings > ul > li:nth-child(1) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>