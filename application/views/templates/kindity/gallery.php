<!DOCTYPE html>
<html>
<head>
  <title>
  </title> 
  <meta name="viewport" content="width=device-width,initial-scale=1.0"> 
  <link rel="stylesheet" href="<?php echo base_url();?>axxets/templates/kindity/css/bootstrap.min.css">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <link rel="stylesheet" href="<?php echo base_url();?>axxets/templates/kindity/css/font-awesome.min.css">

    <style type="text/css">
      .shadow{
  box-shadow: 10px 5px 5px gray;
  }
  @media only screen and (max-width: 600px) {
   footer{
    height: 2000px;
   }
  } 
  li{
    display: inline-block;
  }
  body{

    overflow-x: hidden;
  }
  footer{
  height: 600px;
  margin-top: -40px;
  }
  .input{
    width: 150px;
  }
  @media screen and (max-width: 600px) {
  footer{
    height: 1200px;
  }
  .input{
    width: 370px;
  }
  }
     
  </style>

</head>
<body>

<?php include 'header.php' ?>
<section>
  <div class="card bg-dark text-white">
  <img src="<?php echo base_url();?>axxets/templates/kindity/img/banner/home-banner.jpg" class="card-img" alt="..." style="height: 450px;">
  <div class="card-img-overlay">
    <div class="text-center">
    <h2 style="margin-top: 10%;">Image Gallery</h2>
  </div>          
  </div>
</div>
</section>

<div class="container" style="margin-top: 5%">
  <div class="row">
    <div class="col-lg-4 shadow">
      <img src="<?php echo base_url();?>axxets/templates/kindity/img/banner/gallery-1.jfif"class="img-thumbnail">
      <img src="<?php echo base_url();?>axxets/templates/kindity/img/banner/gallery-1.jfif" class="img-thumbnail" style="margin-top: 5%;">
    </div>
    <div class="col-lg-4 shadow">
      <img src="<?php echo base_url();?>axxets/templates/kindity/img/banner/gallery-2.jfif" class="img-thumbnail">
    </div>
    <div class="col-lg-4 shadow">
      <img src="<?php echo base_url();?>axxets/templates/kindity/img/banner/gallery-1.jfif" class="img-thumbnail">
      <img src="<?php echo base_url();?>axxets/templates/kindity/img/banner/gallery-3.jfif" class="img-thumbnail" style="margin-top: 5%">
    </div>
    <div class="col-lg-4 shadow">
      <img src="<?php echo base_url();?>axxets/templates/kindity/img/banner/gallery-2.jfif" class="img-thumbnail">
    </div>
    <div class="col-lg-4 shadow">
      <img src="<?php echo base_url();?>axxets/templates/kindity/img/banner/gallery-3.jfif" class="img-thumbnail">
      <img src="<?php echo base_url();?>axxets/templates/kindity/img/banner/gallery-3.jfif" class="img-thumbnail" style="margin-top: 5%">
    </div>
    <div class="col-lg-4 shadow">
      <img src="<?php echo base_url();?>axxets/templates/kindity/img/banner/gallery-1.jfif" class="img-thumbnail">
      <img src="<?php echo base_url();?>axxets/templates/kindity/img/banner/gallery-1.jfif" class="img-thumbnail" style="margin-top: 5%">
    </div>
    <div class="col-lg-4 shadow">
      <img src="<?php echo base_url();?>axxets/templates/kindity/img/banner/gallery-1.jfif" class="img-thumbnail">
      <img src="<?php echo base_url();?>axxets/templates/kindity/img/banner/gallery-3.jfif" class="img-thumbnail" style="margin-top: 5%">
    </div>
    <div class="col-lg-4 shadow">
      <img src="<?php echo base_url();?>axxets/templates/kindity/img/banner/gallery-3.jfif" class="img-thumbnail">
      <img src="<?php echo base_url();?>axxets/templates/kindity/img/banner/gallery-1.jfif" class="img-thumbnail" style="margin-top: 5%">
    </div>
    <div class="col-lg-4 shadow">
      <img src="<?php echo base_url();?>axxets/templates/kindity/img/banner/gallery-2.jfif" class="img-thumbnail">
    </div>

  </div>
</div>
</section>

<div class="text-center" style="margin:10%">
      <button type="button" class="btn btn-primary" >Load More Images</button>  
</div>

<!-- Footer -->
<footer class="page-footer font-small bg-dark">
  <div class="container text-center text-md-left">
    <div class="row">
       <div class="col-md-3 mx-auto" style="color: gray;margin-top: 12%">
        <h5 class="font-weight-bold text-uppercase mt-3 mb-4" style="color: white;">ABOUT AGENCY</h5>
     <p>The world has become so fast paced that people don’t want to stand by reading a page of information, they would much rather look at a presentation and understand the message. It has come to a point </p>
     </div>

      <hr class="clearfix w-100 d-md-none">

        <div class="col-md-3 mx-auto" style="margin-top: 12%;">
           <h5 class="font-weight-bold text-uppercase mt-3 mb-4" style="color: white;">NAVIGATION LINKS</h5>
            <div class="row">
                    <div class="col-4">
                        <ul class="list">
                            <li><a href="#" style="color: gray">Home</a></li>
                            <li><a href="#" style="color: gray">Feature</a></li>
                            <li><a href="#" style="color: gray">Services</a></li>
                            <li><a href="#" style="color: gray">Portfolio</a></li>
                        </ul>
                    </div>
                    <div class="col-4">
                        <ul class="list">
                            <li><a href="#" style="color: gray">Team</a></li>
                            <li><a href="#" style="color: gray">Pricing</a></li>
                            <li><a href="#" style="color: gray">Blog</a></li>
                            <li><a href="#" style="color: gray">Contact</a></li>
                        </ul>
                    </div>                    
                </div>    
        </div>

      <hr class="clearfix w-100 d-md-none">
        <div class="col-md-3 mx-auto" style="margin-top: 12%;">
      <h5 class="font-weight-bold text-uppercase mt-3 mb-4"style="color: white;">NEWSLETTER</h5>
      <p style="color: gray;">For business professionals caught between high OEM price and mediocre print and graphic output, </p>
            <div class="input-group d-flex flex-row">
                    <input class="input" name="EMAIL" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '" required="" type="email">
                    <button type="button" class="btn btn-primary" style="height: 40px;">Submit</button> 
                </div>
        </div>

      <hr class="clearfix w-100 d-md-none">
        <div class="col-md-3 mx-auto"style="margin-top: 12%;">
           <h5 class="font-weight-bold text-uppercase mt-3 mb-4" style="color: white;">FOLLOW US</h5>

           <li ><a href="" style="font-size: 40px;"><i class="fab fa-facebook"></i></a></li>
           <li style="margin-left: 20px;"><a href="" style="font-size: 40px;"><i class="fab fa-twitter"></i></a></li>
           <li style="margin-left: 20px;"><a href="" style="font-size: 40px;"><i class="fab fa-instagram"></i></a></li>
           <li style="margin-left: 20px;"><a href="" style="font-size: 40px;"><i class="fab fa-behance"></i></a></li>
    </div>
      <div class="container">
        <hr style="background: white;">
      </div>
      <!-- Copyright -->
      <div class="footer-copyright text-center py-3" style="color: white;margin-left: 45%">© 2020 Copyright:
      </div>
     <!-- Copyright -->
  </div>
 </div>
</footer>
<!-- Footer -->
<script src="<?php echo base_url();?>axxets/templates/kindity/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>axxets/templates/kindity/js/popper.min.js"></script>
<script src="<?php echo base_url();?>axxets/templates/kindity/js/bootstrap.min.js"></script>


</body>
</html>