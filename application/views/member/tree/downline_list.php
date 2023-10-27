<?php

?>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
        <tr>
            <!-- <td>S.N.</td> -->
            <td>Name</td>
            <td>Join Date</td>
            <td>Total Downline</td>
            <td>Sponsor ID</td>
        </tr>
        </thead>
        <tbody>
        
        <?php 
        if (is_array($mymember))
        {
           foreach($mymember as $d_record)
              {
                if (is_array($d_record))
                {
                  foreach($d_record as $d_1st_record)
                  {
                    if(is_array($d_1st_record))
                    {
                      foreach($d_1st_record as $row_1st_record)
                      {
                          if($row_1st_record->name)
                           { ?>
                              <tr>
                              <td><?php echo $row_1st_record->name; ?></td>
                              <td><?php echo date('Y-m-d', strtotime($row_1st_record->join_time)); ?></td>
                              <td><?php echo $row_1st_record->total_a + $row_1st_record->total_b ?></td>
                              <td><?php echo $row_1st_record->sponsor ?></td>
                              </tr>
                              <?php 
                           }
                          if(is_array($row_1st_record))
                          {
                              foreach($row_1st_record as $row_2st_record)
                              {
                                if($row_2st_record->name)
                                  { ?>
                                    <tr>
                                    <td><?php echo $row_2st_record->name; ?></td>
                                    <td><?php echo date('Y-m-d', strtotime($row_2st_record->join_time)); ?></td>
                                    <td><?php echo $row_2st_record->total_a + $row_2st_record->total_b ?></td>
                                    <td><?php echo $row_2st_record->sponsor ?></td>
                                    </tr>
                                    <?php 
                                  }
                                if (is_array($row_2st_record))
                                {
                                  foreach($row_2st_record as $row_3st_record)
                                  {
                                    if($row_3st_record->name)
                                    { ?>
                                      <tr>
                                      <td><?php echo $row_3st_record->name; ?></td>
                                      <td><?php echo date('Y-m-d', strtotime($row_3st_record->join_time)); ?></td>
                                      <td><?php echo $row_3st_record->total_a + $row_3st_record->total_b ?></td>
                                      <td><?php echo $row_3st_record->sponsor ?></td>
                                      </tr>
                                      <?php 
                                    }
                                  }// foreach($row_2st_record as $row_3st_record)
                                }
                              }//foreach($row_1st_record as $row_2st_record)
                          }// if(is_array($row_1st_record))
                      }//foreach($d_1st_record as $row_1st_record)
                    }//if(is_array($d_1st_record))
                  } //foreach($d_record as $d_1st_record)
                } //if (is_array($d_record)) 
              } //foreach($member as $d_record)
        }//if (is_array($member))
        ?>
        </tbody>
    </table>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("tree").classList.add('active');
        document.querySelector("#tree > ul:nth-child(2) > li:nth-child(2) > a:nth-child(1) > span:nth-child(1)").setAttribute('style', 'color: darkorange !important;');
    });
</script>