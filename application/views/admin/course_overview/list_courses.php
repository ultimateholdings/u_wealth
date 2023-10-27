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
            <th>Course Title</th>
            <th>Category Name</th>
            <th>Lesson & Section</th>
            <th>Enrolled Member</th>
            <th>Visiblity</th>
            <th>Created Date</th>
            <th>Price</th>
            <th>Status</th>
            
            
        </tr>
        </thead>
        <tbody>
        <?php
        $sn = count($course_deatils);
        foreach ($course_deatils as $e) { ?>
            <tr>
                <td><?php echo $sn--; ?></td>
                <td>
                    <?php echo $e->title; ?><br>
                    <small class="text-muted" style="color: blue;"><?php echo 'Instructor' . ': <b>' . $e->first_name . ' ' . $e->last_name . '</b>'; ?></small>
                </td>
                <td><?php echo $e->name; ?></td>
                <?php 
                    $course_id=$e->course_id;
                    $array=array(
                        'course_id'=>$course_id,
                    );

                    $url = APIURL . 'Api/course_details/';

                    //API-1 for course details

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

                    //API-2 for section details

                    $url1 = APIURL . 'Api/section_details/';

                    $ch1 = curl_init($url1);
                    # Form data string
                    $postString1 = http_build_query($array, '', '&');
                    # Setting our options
                    curl_setopt($ch1, CURLOPT_POST, 1);
                    curl_setopt($ch1, CURLOPT_POSTFIELDS, $postString1);
                    curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
                    # Get the response
                    $response1 = curl_exec($ch1);
                    
                    curl_close($ch1);
                    $response1= \json_decode($response1);

                    //API-3 for lession details

                    $url2 = APIURL . 'Api/lession_details/';

                    $ch2 = curl_init($url2);
                    # Form data string
                    $postString2 = http_build_query($array, '', '&');
                    # Setting our options
                    curl_setopt($ch2, CURLOPT_POST, 1);
                    curl_setopt($ch2, CURLOPT_POSTFIELDS, $postString2);
                    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
                    # Get the response
                    $response2 = curl_exec($ch2);
                    
                    curl_close($ch2);
                    $response2= \json_decode($response2);

                ?>


                <td>
                    <?php if ($e->course_type == 'scorm') : ?>
                        <span class="badge badge-info-lighten"><?= $e->course_type; ?></span>
                    <?php elseif ($e->course_type == 'general') : ?>
                        <small class="text-muted" style="color:green;"><?php echo 'Total Section : '; ?> <?php echo $response1; ?></small><br>
                        <small class="text-muted" style="color:green;"><?php echo 'Total Lession : '; ?> <?php echo $response2; ?></small>
                    <?php endif; ?>
                </td>
                <td>
                    <span><?php echo 'Total enrolment : '; ?><?php echo $response;  ?></span>
                    
                </td>
                <td><?php echo $e->visible_at_register; ?></td>
                <td><?php echo date("D, d-M-Y", $e->date_added); ?></td>
                <td>
                    <?php if ($e->is_free_course ==1) : ?>
                        <span class="badge badge-warning"><?php echo "FREE"; ?></span>
                    <?php elseif ($e->is_free_course !=1) : ?>
                        <span class="badge badge-dark-lighten"><?php echo config_item('currency') . " " . $e->price; ?></span>
                    <?php endif; ?>

                </td>
                <td>
                    <?php if($e->status=="active") { ?>
                        <a class="btn btn-primary btn-xs"><?php echo "Active"; ?></a>
                    <?php } else { ?>
                        <a class="btn btn-danger btn-xs"><?php echo "Inactive"; ?></a>
                    <?php } ?>    
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
<a href="<?php echo site_url('admin') ?>" class="btn btn-xs btn-danger">&larr; Go Back</a>
<?php } ?>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("course_overview").classList.add('active');
        document.querySelector("#course_overview > ul > li:nth-child(1) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>