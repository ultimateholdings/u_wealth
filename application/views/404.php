<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<title></title> <meta name="viewport" content="width=device-width,initial-scale=1.0"> 
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link rel="stylesheet" href="<?php echo base_url();?>axxets/mega/vendor_components/bootstrap/dist/css/bootstrap.css">
    <script src="<?php echo base_url();?>axxets/mega/vendor_components/jquery-3.3.1/jquery-3.3.1.js"></script>
    <script src="<?php echo base_url();?>axxets/mega/vendor_components/bootstrap/popper.min.js"></script>
    <script src="<?php echo base_url();?>axxets/mega/vendor_components/bootstrap/dist/js/bootstrap.js"></script>    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<head>
    <title>Page not found</title>
    <style type="text/css">
        html
        { overflow-y: scroll; }
        body
        { margin: 0; padding: 0; font-size: 13px; font-family: Georgia, "Times New Roman", Times, serif; color: #919191; background-color: white; }
        .drop{
            -moz-appearance: none; 
            -webkit-appearance: none;
        }
        .navbar{
            background-color: #DC5B21;

        }

        .card {
          display:inline-block;
          background: -moz-linear-gradient(top, rgba(0,0,0,0) 0%, rgba(0,0,0,0.65) 100%); /* FF3.6+ */
          background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0.65)), color-stop(100%,rgba(0,0,0,0))); /* Chrome,Safari4+ */
          background: -webkit-linear-gradient(top, rgba(0,0,0,0) 0%,rgba(0,0,0,0.65) 100%); /* Chrome10+,Safari5.1+ */
          background: -o-linear-gradient(top, rgba(0,0,0,0) 0%,rgba(0,0,0,0.65) 100%); /* Opera 11.10+ */
          background: -ms-linear-gradient(top, rgba(0,0,0,0) 0%,rgba(0,0,0,0.65) 100%); /* IE10+ */
          background: linear-gradient(to bottom, rgba(0,0,0,0) 0%,rgba(0,0,0,0.65) 100%); /* W3C */
          filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#a6000000', endColorstr='#00000000',GradientType=0 ); /* IE6-9 */
          background: linear-gradient( rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6) );
        }

        .card > img{
          position:relative;
          z-index:-1;
          display:block;
          height: 70vh; width: 100%;
        }

        
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg  shadow p-3 mb-5 rounded">
  <div class="container"    >
    <div class="page-logo">
        <h2 style="color: #fff;font-size: 1.5rem;"><?php echo config_item('company_name') ?></h2>
    </div>
    <form class="form-inline my-2 my-lg-0 ">
        <a href="<?php echo site_url('site/login')?>"><button type="button" class="btn mb-2 mr-3" style="background-color: white;width: 100px;">Login</button></a>
        <a href="<?php echo site_url('site/register')?>"><button type="button" class="btn mb-2" style="background-color: white;width: 100px;">Register</button></a>
    </form>
  </div>
</nav>

<div class="container">
    <div class="text-center">
        <p class="mt-5" style="font-size: 16px;">Oops! We can't seem to find page you are looking for</p>
        <p class="m-2" style="font-size: 32px;">Continue Exploring</p>
    </div>
</div>

<div class="card" style="color: black">
  <img src="<?php echo base_url('axxets/gmlm/img/profile_city.jpg') ?>" class="card-img" alt="...">
  <div class="card-img-overlay">
    <div class="text-center">
        <h1 class="card-title " style="font-weight: 600; color: #ffc107; margin-top: 12%">Global MLM Software</h1>
        <h3 style="color: #fff;">Set Up Any MLM Software Plan within 48 Hours from Experts.</h3>
        </br></br></br></br></br></br></br></br>
        <h3 style="color: #fff;">150+ Successful Projects Delivered across world, Want to be Next ?</h3>
        <a href="https://globalmlmsolution.com"> <button type="button" class="btn btn-primary m-4">Know More</button></a>
    </div>
  </div>
</div>

</body>
</html>