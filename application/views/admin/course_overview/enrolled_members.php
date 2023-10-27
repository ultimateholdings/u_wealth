<div class="row" style="float: right; margin-bottom: 10px;">
   <!-- <div class="col-md-12">
     <form method="post" action='export_list_member'>
         <input type="submit"  name="export_list_member" value="Download Full Member Details" class="btn btn-primary pull-right" />
    </form>
  </div>  --><!-- File upload form-->
   <div>&nbsp;</div>
</div>
<div class="table-responsive" style="width: 100%;">
<table class="display table table-striped table-bordered" style="font-size:13px;margin-top: 10px;" id="DTable" data-name="member_list" data-page-length='100'>
        <thead>
        <tr>
            
            <th>SI</th>
            <th>User Name</th>
            <th>Enrolled Course</th>
            <th>Enrolled Date</th>
            <th>Completed</th>
            <th>Remaining</th>
            <!-- <th class="noExport">Actions</th> -->
        </tr>
        </thead>
        <tbody>
        <?php
        $sn = count($course_deatils);
        foreach ($course_deatils as $e) { ?>
            <tr>
                <td><?php echo $sn--; ?></td>
                <td>

                    <b><?php echo $e->first_name.' '.$e->last_name; ?></b><br>
                    <small style="color:blue;"><?php echo $e->email; ?></small>

                </td>

                <?php 
                    $course_id=$e->course_id;
                    $id=$e->user_id;

                    $array=array(
                        'id'=>$id,
                        'course_id'=>$course_id,
                    );

                    $url = APIURL . 'Api/course_overview1/';

                    $ch = curl_init($url);
                    # Form data string
                    $postString = http_build_query($array, '', '&');
                    # Setting our options
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    # Get the response
                    $response = curl_exec($ch);
                    
                    curl_close($ch);
                    $response= \json_decode($response);

                ?>
                <td>
                    <?php echo $e->title; ?>
                    <div class="progress" style="height: 5px;">
                        <div class="progress-bar progress-bar-striped bg-danger" role="progressbar"     style="width: <?php echo $response; ?>%" aria-valuenow="<?php echo $response; ?>" aria-valuemin="0" aria-valuemax="100">
                                              
                        </div>
                    </div>
                    <small><?php echo $response;  ?>% <?php echo 'completed'; ?></small>


                </td>
                <td><?php echo date("D, d-M-Y", $e->date_added); ?></td>
                <td><strong class="btn btn-primary">
                    <?php echo $response; ?>% <?php echo 'Completed'; ?></strong>
                </td>
                <td><strong class="btn btn-danger">
                    <?php echo 100-$response; ?>% <?php echo 'Remaining'; ?></strong>
                </td>
                
               <!-- <td>
                    <div style="display: flex;" >
                        <a href="" class="btn btn-warning btn-sm " style="margin-right: 10px;">View</a>
                        <a href="" class="btn btn-info btn-sm" style="margin-right: 10px;" >Edit</a>
                    </div>
                </td> -->
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
<a href="<?php echo site_url('admin') ?>" class="btn btn-xs btn-danger">&larr; Go Back</a>
<?php } ?>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("course_overview").classList.add('active');
        document.querySelector("#course_overview > ul > li:nth-child(2) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>