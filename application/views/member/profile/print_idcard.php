<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!------ Include the above in your HEAD tag ---------->
<style>
    @import url("https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");
    @import url('https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700');
    @import url('https://fonts.googleapis.com/css?family=Libre+Baskerville:400,700');
    body{
        font-family: 'Open Sans', sans-serif;
    }
    *:hover{
        -webkit-transition: all 1s ease;
        transition: all 1s ease;
    }
    section{
        float:left;
        width:100%;
        /* background: #fff;  fallback for old browsers */
        padding:30px 0;
    }
    h1{float:left; width:100%; color:#232323; margin-bottom:30px; font-size: 14px;}
    h1 span{font-family: 'Libre Baskerville', serif; display:block; font-size:45px; text-transform:none; margin-bottom:20px; margin-top:30px; font-weight:700}
    h1 a{color:#131313; font-weight:bold;}

    /*Profile Card 1*/
    .profile-card-1 {
    font-family: 'Open Sans', Arial, sans-serif;
    position: relative;
    float: left;
    overflow: hidden;
    width: 100%;
    color: black;
    text-align: center;
    height:500px;
    border:none;
    }
    .profile-card-1 .background {
    width:100%;
    vertical-align: top;
    opacity: 0.9;
    -webkit-filter: blur(5px);
    filter: blur(5px);
    -webkit-transform: scale(1.8);
    transform: scale(2.8);
    /* background-color: black; */
    }
    .profile-card-1 .card-content {
    width: 100%;
    padding: 15px 25px;
    position: absolute;
    left: 0;
    top: 50%;
    }
    .profile-card-1 .profile {
    border-radius: 50%;
    position: absolute;
    bottom: 47%;
    left: 50%;
    max-width: 100px;
    opacity: 1;
    box-shadow: 3px 3px 20px rgba(0, 0, 0, 0.5);
    border: 2px solid rgba(255, 255, 255, 1);
    -webkit-transform: translate(-50%, 0%);
    transform: translate(-50%, 0%);
    }
    .profile-card-1 h2 {
    margin: 0 0 5px;
    font-weight: 600;
    font-size:25px;
    }
    .profile-card-1 h2 small {
    display: block;
    font-size: 15px;
    margin-top:10px;
    }
    .profile-card-1 i {
    display: inline-block;
        font-size: 16px;
        /* color: #ffffff; */
        text-align: center;
        border: 1px solid #fff;
        width: 50px;
        height: 70px;
        line-height: 30px;
        border-radius: 50%;
        margin:0 5px;
    }
    .profile-card-1 .icon-block{
        float:left;
        width:100%;
        margin-top:15px;
    }
    .profile-card-1 .icon-block a{
        text-decoration:none;
    }
    .profile-card-1 i:hover {
    background-color:#fff;
    /* color:#2E3434; */
    text-decoration:none;
    }


</style>
<body onload="print()">
<section>

    <div class="container">
    	<div class="row justify-content-md-center">
    	    
    		<div class="col-md-4">
    		    <div class="card profile-card-1">

                <div class="card-header" style="z-index: 1 ; background-color:#00ABF0; ">

                <?php echo config_item('company_name'); ?><br>
                <small><?php echo config_item('company_address'); ?> </small><br>
                <small> <?php echo config_item('company_city') . ', ' . config_item('company_state') . '-' . config_item('company_zipcode'); ?> </small>
                    </div>
                    <img src="<?php echo base_url('axxets/id_card.jpg')?>" alt="profile-sample1" height="100%"/>
                   
    		        <img src="<?php echo $id->photo ? base_url('uploads/profile/' . $id->photo) : site_url('axxets/nophoto.jpg'); ?>" alt="profile-image" class="profile"/>
                    <div class="card-content" style="text-align: center;">
                    <h2><?php echo $id->name ?>
                    <small>User Id : <?php echo $id->id ?> </small>
                    <small>DOB : <?php if($dob->date_of_birth){ echo $dob->date_of_birth ;} else { echo "NA"; }?> </small>
                    <small>Email: <?php if($id->email){echo $id->email;} else {echo "NA";} ?> </small>
                    <small>Phone: <?php if ($id->phone){echo $id->phone;} else {echo "NA";} ?> </small>
                    
                </h2>
                    </div>
                </div>
    		</div>
    	</div>
    </div>
</section>
</body>


