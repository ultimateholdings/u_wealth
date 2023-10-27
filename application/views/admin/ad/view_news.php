<?php

?>
<div class="row view">
    <div class="col-sm-6"><strong>Subject: </strong> <?php echo $data->subject ?></div>
    <div class="col-sm-6"><strong>Content: </strong> <?php echo $data->content ?></div>
    <!--<div class="col-sm-6"><strong>Date: </strong> <?php echo $data->date ?></div>-->
</div>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("news").classList.add('active');
        document.querySelector("#news > ul:nth-child(2) > li:nth-child(3) > a:nth-child(1) > span:nth-child(1)").setAttribute('style', 'color: darkorange !important;');
    });
</script>
