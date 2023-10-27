<?php ?>

<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="<?php echo base_url();?>axxets/templates/theme7/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <title><?php echo config_item('company_name') ?></title>
      <style type="text/css">
         #color:hover{
         -webkit-box-shadow: 0 0 20px yellow;
         }
         @media screen and (min-width:450px) {
         #head_lap{
         display: block;
         }
         #head_mob{
         display: none;
         }
         }
         @media screen and (max-width:450px) {
         #head_lap{
         display: none;
         }
         #head_mob{
         display: block;
         }
         }
         @media screen and (max-width:370px) {
         #side1{
         margin-top: 90px;
         }
         #mar{
         height: 550px;
         }
         }
         @media screen and (min-width: 370px) and (max-width: 600px) {
         #first{
         margin-bottom:-2px;
         }
         #side1{
         margin-top: 60px;
         }
         #mar{
         height: 450px;
         }
         }
         @media screen and (min-width: 600px) {
         #side1{
         margin-top: 56px;
         position: fixed;
         top: 0px;
         }
         #contain{
         margin-top: 700px;
         }
         #mar{
         height: 450px;
         }
         }
      </style>
   </head>
   <body>
      <nav class="navbar navbar-expand-md  fixed-top" style="justify-content: center;background-color: black;">
      	<div class="container">
          <a class="navbar-brand" style="margin-right: 220px;" href="#"><?php echo config_item('company_name') ?></a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    <i class="fas fa-bars" style="color:white;"></i>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNav">
		    <ul class="navbar-nav">
		      <li class="nav-item active">
		        <a class="nav-link" href="#" style="color:white;">Home <span class="sr-only">(current)</span></a>
		      </li> 
		      <li class="nav-item active">
		        <a class="nav-link" href="#about" style="color:white;">About <span class="sr-only"></span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="<?php echo site_url('site/login')?>" style="color:white;">Login</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="<?php echo site_url('site/register')?>" style="color:white;">Register</a>
		      </li>
		    </ul>
		  </div>
		</div>  
      </nav>
      <div >
         <a href="#">
         <img src="<?php echo base_url();?>axxets/templates/theme7/images/picture3.jpg" width="100px" style="position: fixed;top: 100px;right: 0px;z-index: 20;border:2px solid gold;">
         </a>
      </div>
      <header id="head_lap">
         <div class="bg-cover " style="position: relative;z-index: -1;">
            <div class="container-fluid" id="side1" style="background-image: url(<?php echo base_url();?>axxets/templates/theme7/images/wood_bg.jpg);height: 90%;">
               <div class="row" style="margin-top: 50px;">
                  <div class="col-md-1"></div>
                  <div class="col-md-5" style="border:3px solid white;background-color: rgb(0 0 0 / 55%);" id="mar">
                     <div style="text-align: center;">
                        <h1 style="color: white;" ><?php echo config_item('company_name') ?></h1>
                        <h2 style="color: gold;font-size: 25px;">Customer Satisfaction Is Our Priority</h2>
                     </div>
                     <img src="<?php echo base_url();?>axxets/templates/theme7/images/picture10.png" width="100%">
                     <div style="display: flex;justify-content: center;line-height: 30px;">
                        <p>
                           <b style="color: gold;">Productivity:</b>
                           <span style="color: white;">Produce the RIGHT content every day.</span>
                           <br>
                           <b style="color: gold;">Discipline:</b>
                           <span style="color: white;"> Establish a plan of action and EXECUTE.</span>
                           <br>
                           <b style="color: gold;">F.O.C.U.S:</b>
                           <span style="color: white;"> Follow One Course Until Success.</span>
                           <br>
                           <b style="color: gold;">10-day Reviews:</b>
                           <span style="color: white;">Adjust and pivot accordingly.</span>
                        </p>
                     </div>
                     <div style="text-align: center;margin-top: 21px;">
                        
                        <img src="<?php echo base_url();?>axxets/templates/theme7/images/mcslogo.png" width="40%" id="color" height="56px" style="background-color: white;">
                        </a>
                     </div>
                  </div>
                  <div class="col-md-1"></div>
                  <div class="col-md-4">
                     <img src="<?php echo base_url();?>axxets/templates/theme7/images/flat.jpg" width="80%" >
                  </div>
                  <div class="col-md-1"></div>
               </div>
            </div>
         </div>
      </header>
      <header id="head_mob">
         <div class="bg-cover " style="position: relative;z-index: -1;">
            <div class="container-fluid" id="side1" style="background-image: url(<?php echo base_url();?>axxets/templates/theme7/images/wood_bg.jpg);height: 90%;">
               <div class="row" style="margin-top: 50px;">
                  <div class="col-md-1"></div>
                  <div class="col-md-4">
                     <img src="<?php echo base_url();?>axxets/templates/theme7/images/flat.jpg" width="100%" >
                  </div>
                  <div class="col-md-1"></div>
                  <div class="col-md-5" style="border:3px solid white;background-color: rgb(0 0 0 / 55%);" id="mar">
                     <div style="text-align: center;">
                        <h1 style="color: white;" ><?php echo config_item('company_name') ?></h1>
                        <h2 style="color: gold;font-size: 25px;">Master Productivity, Discipline &amp;</h2>
                     </div>
                     <img src="<?php echo base_url();?>axxets/templates/theme7/images/picture10.png" width="100%">
                     <div style="display: flex;justify-content: center;line-height: 30px;">
                        <p>
                           <b style="color: gold;">Productivity:</b>
                           <span style="color: white;">Produce the RIGHT content every day.</span>
                           <br>
                           <b style="color: gold;">Discipline:</b>
                           <span style="color: white;"> Establish a plan of action and EXECUTE.</span>
                           <br>
                           <b style="color: gold;">F.O.C.U.S:</b>
                           <span style="color: white;"> Follow One Course Until Success.</span>
                           <br>
                           <b style="color: gold;">10-day Reviews:</b>
                           <span style="color: white;">Adjust and pivot accordingly.</span>
                        </p>
                     </div>
                     <div style="text-align: center;margin-top: 21px;">
                        
                        <img src="<?php echo base_url();?>axxets/templates/theme7/images/mcslogo.png" width="50%" id="color" height="56px" style="background-color: white;">
                        </a>
                     </div>
                  </div>
                  <div class="col-md-1"></div>
               </div>
            </div>
         </div>
      </header>
      <div style="background-color: white;">
      <section class="bg-white bg-contain bg-norepeat bg-position section-2 border-top" id="contain">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <img class="" src="<?php echo base_url();?>axxets/templates/theme7/images/flat.jpg" width="100%" height="90%">
               </div>
               <div class="col-md-6" style="overflow: auto;" id="about">
                  <h2 class="h2 sm-h2 mb0 sm-mt0 tfjfont caps sm-center">About <?php echo config_item('company_name') ?></h2>
                  <p class="">Global MLM Software provides you the best platform and environment to act and achieve big as well as to create your present and future to bring happiness in your life</p>
                  <h4 class="h2 bold  tfjfont">We help you realize Financial Freedom !!</h4>
                  <p class="">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                  <p class="">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                  <p class="">We are a platform aiming to come up with ideas to assist people enrich themselves by doing the following</p>
                  <p class="">1. Using MLM tools and technology to provide access to wealth</p>
                  <p class="">2. Becoming transparent to investors so they see the movement of their investment moneys</p>
                  <p class="">3. To empower investors so that they make decisions on how to grow the platform without crushing their ideas. This brings us to our platform values.</p>
                  <!--             <p class=""><button class="btn glow btn-primary buy-button js-prevent-cart-listener" data-lity href="#cart">Order The Mastery Journal today</button> -->
                  <img src="<?php echo base_url();?>axxets/templates/theme7/images/mcslogo.png" width="50%" id="color" height="56px" style="background-color: white;">
                  <p></p>
               </div>
            </div>
         </div>
      </section>
      <section class="py4 cta bg-cover py-4" style="background-image: url(<?php echo base_url();?>axxets/templates/theme7/images/TMJWebsite-QuoteBG.png)">
         <div class="container" style="text-align: center;overflow: auto;">
            <p class="h2 bold satisfy">We provide Best platform to achieve Big !!</p>
             <img src="<?php echo base_url();?>axxets/templates/theme7/images/mcslogo.png" width="20%"  height="50px"> 
         </div>
      </section>
      <section class="bg-white bg-cover bg-norepeat bg-top sm-py4 steps">
         <div>
         <div class="fluid-container" style="height: 150px;text-align: center;margin-top: 20px;">
            <h2>Why Choose Us ?</h2>
            <p>We provide utmost priority for Customer Satisfaction.</p>
         </div>
         <div class="container" style="margin-top: 20px;">
         <div class="row">
            <div class="col-md-6">
               <img class="shadow-lg p-3 mb-5 bg-white rounded" style="box-shadow: 0 1px 6px 0 rgb(0 0 0 / 10%), 0 6px 20px 0 rgb(0 0 0 / 10%);" src="<?php echo base_url();?>axxets/templates/theme7/images/TMJ-Standalone.jpg" alt="SMART Goal" width="80%">
            </div>
            <div class="col-md-6" style="display: flex;align-items: center;">
               <div>
                  <p class=" h3 bold" style="padding-left: 10px;border-left: 10px solid yellow;">Master these three skills:</p>
                  <p>
                     <strong>Our Mission:</strong>&nbsp;Give every person a lifetime opportunity to become a successful wealthy person.
                     <br>
                     <strong>Our Vision:</strong>&nbsp;Delivery value to our customer in all the products and services we provide.
                     <br>
                     <strong>Our Values:</strong>&nbsp;
                     We provide utmost priority to customer priority.
                  </p>
               </div>
            </div>
         </div>
         <div class="container" style="margin-top: 20px;">
            <div class="row">
               <div class="col-md-6" style="display: flex;align-items: center;">
                  <div >
                     <p class="bold h3" style="padding-left: 10px;border-left: 10px solid yellow;">We Focus On.</p>
                     <ul style="padding-left:10px;">
                        <li>BRINGING PROSPERITY</li>
                        <li>DELIVERY VALUE</li>
                        <li>QUALITY CONSCIOUSNESS</li>
                        <li>CUSTOMER SATISFACTION</li>
                     </ul>
                  </div>
               </div>
               <div class="col-md-6">
                  <img class="shadow-lg p-3 mb-5 bg-white rounded" style="box-shadow: 0 1px 6px 0 rgb(0 0 0 / 10%), 0 6px 20px 0 rgb(0 0 0 / 10%);" src="<?php echo base_url();?>axxets/templates/theme7/images/Pic-2.jpg" alt="Accountability" width="100%">
               </div>
            </div>
            <div class="container" style="margin-top: 20px;">
               <div class="row">
                  <div class="col-md-6">
                     <img  class="shadow-lg p-3 mb-5 bg-white rounded" style="box-shadow: 0 1px 6px 0 rgb(0 0 0 / 10%), 0 6px 20px 0 rgb(0 0 0 / 10%);" src="<?php echo base_url();?>axxets/templates/theme7/images/Pic-3.jpg" alt="Goal Oriented" width="100%">
                  </div>
                  <div class="col-md-6" style="display: flex;align-items: center;">
                     <div>
                        <p class=" h3 bold" style="padding-left: 10px;border-left: 10px solid yellow;">Business Plan</p>
                        <div class="container">
                           <div class="card" style="width: 18rem;">
                             <div class="card-body">
                               <h5 class="card-title">Basic Plan</h5>
                               <p class="card-text">
                                  <h3>₹1,000</h3>
                               </p>
                             </div>
                             <ul class="list-group list-group-flush">
                               <li class="list-group-item">Lifetime Membership</li>
                               <li class="list-group-item">1% Referral Commission</li>
                               <li class="list-group-item">Dedicated Useable Account</li>
                             </ul>
                           </div>
                           
                        </div>
                     </div>
                  </div>
               </div>
            </div>
      </section>
      <div class="fluid-container" style="background:linear-gradient(to right, rgb(40, 60, 134), rgb(69, 162, 71));text-align: center;display: flex;justify-content: center;align-items: center;height: 250px;margin-top: 20px;overflow: auto;">
      <div>
      <h2 style="color:white;">Customer Satisfaction Is Our Priority !!</h2>
      <!-- <button class="btn glow btn-outline buy-button js-prevent-cart-listener" data-lity href="#cart">Order your Mastery Journal today!</button> --> 
      
      </div>
      </div>
      <div class="container">
      <div class="row">
      <div class="col-md-6" style="display: flex;justify-content: center;align-items: center;" >
      <div>
      <img src="<?php echo base_url();?>axxets/templates/theme7/images/you-pop.png" width="80%"  style="margin-top: 35px;">
      <p>
      <a href="#" target="_blank" class="orange bold"></a> THERE HAS BEEN A DECLINE IN JOBS SINCE THE BEGINNING OF THE PANDEMIC FROM 2019-2020. THESE UNCERTAIN TIMES DOES NOT SECURE JOBS AND CAREERS. PBCG CAN HELP!
      </p>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque nisi, deserunt necessitatibus odio magnam nihil illum neque voluptas?, THANK YOU!</p>
      </div>
      </div>
      <div class="col-md-2"></div>
      <div class="col-md-4">
      <img class="sm-hide mb1" src="<?php echo base_url();?>axxets/templates/theme7/images/pop.jpg"  width="100%" height="100%">
      </div>
      </div>
      </div>
      <section class="center white bg-white bg-cover bg-norepeat bg-top" style="background-image: url(<?php echo base_url();?>axxets/templates/theme7/images/eof-bg.jpg);">
      <div style="background-image: linear-gradient(225deg, rgba(251,176,36,0.92) 0%, rgba(251,176,36,0.92) 16%, rgba(247,77,15,0.92) 84%, rgba(247,77,15,0.92) 100%);height: 400px;display: flex;justify-content: center;align-items: center;">
      <div class="container" style="text-align: center;color: white;">
      <div>
      <h3 class="h1 sm-h0">About 
      <a href="#" title="EOFire"  target="_blank" style="color: white;">Us</a>
      </h3>
      <p>To be the most innovative and successful automated platform you will ever come across, we are laced with a plethora of services and wealth building strategies to bring communities together. It encompasses a forward cultural of change in building wealth with obtainable substances through services offered along with the embracement of diversity and inclusion. We have concluded with this platform, to bring as many people together from different backgrounds to join this amazing platform offering resources and services throughout the community.
      </p>
      </div>
      </div>
      </div>
      </section>
      <footer style="text-align: center;overflow: hidden;">
      <a href="#" title="EOFire" target="_blank">
      <img class="center" src="<?php echo base_url();?>axxets/templates/theme7/images/mcslogo.png">
      </a>
      <p class="mb0">&copy;2021 All Rights Reserved | Powered by Global MLM Software. 
      <br/>
      <a href="#" title="Terms and Conditions" style="color:currentColor;" target="_blank">Terms and Conditions</a> · 
      <a href="#" title="Privacy" style="color:currentColor;" target="_blank">Privacy Policy</a>
      </p>
      </footer>
      </div>

      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="<?php echo base_url();?>axxets/templates/theme7/js/jquery-3.2.1.slim.min.js"></script>
      <script src="<?php echo base_url();?>axxets/templates/conbusi/js/popper.min.js"></script>
      <script src="<?php echo base_url();?>axxets/templates/conbusi/js/bootstrap.min.js"></script>
   </body>
</html>
