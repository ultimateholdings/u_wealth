<style type="text/css">
    h3{
        text-align: center;
        color: green;
    }

    @media(max-width: 792px){
        #player{
            margin-left: 15px;
            margin-right:15px;
        }
    }

</style>
<div class="container" id="player">
    <div class="row" style="margin-top: 15%;margin-bottom: 15%;display: none;">
        <div class="col-sm-1"></div>
        <div class="col-sm-4">
            <a target="_blank" href="<?php echo base_url('Documentation.pdf') ?>" class="btn btn-lg btn-success" style="background-color: #0cc745 !important; border: 1px solid #00a65a ">General
                Documentation</a>
        </div>
        <div class="col-sm-2"></div>
        <div class="col-sm-4">
            <a target="_blank" onclick="return confirm('Are you a developer ? This Documentation is only for developers and not for general users.')" href="<?php echo base_url('Developer Documentation.pdf') ?>" class="btn btn-lg btn-warning">Developer
                Documentation</a></div>
        <div class="col-sm-1"></div>

    </div>
    <div class="row"  style="margin-bottom: 15%;">
            <?php if(config_item('width')=='0') { ?>
                <h2> Global MLM - Unilevel Software Demo </h2>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe width="100%" height="600px" class="embed-responsive-item" src="https://www.youtube.com/embed/_q31pHAnu14?list=PLXoZtNjgtwHg4O2kUamCbTzqD3MpNLiA7" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            <?php } else if(config_item('width')=='1') { ?>
                <h2> Global MLM Single Leg Software Demo </h2>
                <h3>Part 1</h3>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe width="100%" height="600px" class="embed-responsive-item" src="https://www.youtube.com/embed/I4MwuK0f7rc?list=PLXoZtNjgtwHg4O2kUamCbTzqD3MpNLiA7" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <h3>Part 2</h3>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe width="100%" height="600px" class="embed-responsive-item" src="https://www.youtube.com/embed/-LVADSsZ788" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            <?php } else if(config_item('width')=='2') { ?>
                <h2> Global MLM - Binary Software Demo </h2>
                <h3>Part 1</h3>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe width="100%" height="600px" class="embed-responsive-item" src="https://www.youtube.com/embed/zGz3pg8bbgE?list=PLXoZtNjgtwHg4O2kUamCbTzqD3MpNLiA7" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div><br/>
                <h3>Part 2</h3>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe width="100%" height="600px" class="embed-responsive-item" src="https://www.youtube.com/embed/XfZ5xuIMrsc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            <?php } else if(config_item('enable_crowdfund')=='Yes') { ?>
                <h2> Global MLM - Crowd Funding / Gift Plan Demo </h2>
                <h3>Part 1</h3>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe width="100%" height="600px" class="embed-responsive-item" src="https://www.youtube.com/embed/l8KXW5uRdw8?list=PLXoZtNjgtwHg4O2kUamCbTzqD3MpNLiA7" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <h3>Part 2</h3>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe width="100%" height="600px" class="embed-responsive-item" src="https://www.youtube.com/embed/l8KXW5uRdw8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            <?php } else { ?>
                <h2> Global MLM - Matrix Software Demo </h2>
                <h3>Part 1</h3>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe width="100%" height="600px" class="embed-responsive-item" src="https://www.youtube.com/embed/mM42fCpATJI?list=PLXoZtNjgtwHg4O2kUamCbTzqD3MpNLiA7" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <h3>Part 2</h3>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe width="100%" height="600px" class="embed-responsive-item" src="https://www.youtube.com/embed/U28qzlH7tWk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            <?php } ?>        
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        //document.getElementById("accounting").classList.add('active');
        document.getElementsByClassName('document')[0].classList.add('active');
       
    });
</script>