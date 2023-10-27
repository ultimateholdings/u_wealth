<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   <script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"
></script>
<!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" 
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('axxets/base/css/mdb.min.css') ?>">
<!-- MDB -->
<!-- <link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css"
  rel="stylesheet"/>
 -->   <script src="<?php echo base_url('axxets/base/js/jquery_v3.2.1.min.js') ?>" type="text/javascript"></script>

    <title>login template2</title>
   <style type="text/css">
      *{
  margin:0;
  padding:0;
  -webkit-box-sizing:border-box;
  -moz-box-sizing:border-box;
  box-sizing:border-box;
}

body{
  font-family: 'Open Sans', sans-serif;
  background:#e2e2e2;
   /*background-image: url(<?php echo base_url('uploads/site_img/bubble3.jpg') ?>) ;*/
/*background-position: center;
background-repeat: no-repeat;*/
}
/* width */
::-webkit-scrollbar {
  width: 7px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: #888;
  border-radius: 20px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555;
}

button{
  width: 100%;
  height: 100%;
}
.form-group{
  margin-bottom: 35px;
}
div span{
  margin-bottom: 40px;
}

@media only screen and (max-width: 768px) {  
    .container{
      margin: auto;
      width:80%!important;
    }
}  

.form-outline{

  margin-bottom: 35px;

}
.container{
    padding:0px 40px 10px 40px;

     position: relative;
  
  margin: auto;
  width:50%;
  background:#fff;
  border-radius:5px;
  overflow-x: hidden;
  z-index:1;
}

h2{
  padding:40px;
  font-weight:lighter;
  text-transform:uppercase;
  color:#414141;

}

.form-control:hover{
  box-shadow: none;
}
/*.form-group{
  margin-bottom: 15px;
}*/
button:hover  span{
      transition: 1s;
      margin-left: 30px;
       }
.form-label{
      color: darkorchid;

       }
    label{
      color: darkorchid;

    }

       .form-control:focus{
        color: blue!important;
       }

/**
* Add a transition to the label and input.
* I'm not even sure that touch-action: manipulation works on
* inputs, but hey, it's new and cool and could remove the 
* pesky delay.
*/
/*label{
  color: darkblue;
}
*/



svg{
  position:fixed;
  
}




    </style>

    </head>
  <body>
    <?php $names = array('Olivia','Amelia','Isla','Ava','Emily','Sophia','Grace','Mia','Poppy','Ella','Oliver','George','Harry','Noah','Jack','Charlie','Leo','Jacob','Freddie','Alfie','Aaradhya','Adah','Adhira','Alisha','Amoli','Anaisha','Ananya','Anika','Anushka','Asmee','Avni','Carina','Drishti','Hiya','Ira','Ishana','Ishita','Kaia','Kashvi','Keya','Kimaya','Krisha','Larisa','Mahika','Mayra','Mehar','Mirai','Mishka','Naitee','Navya','Nehrika','Neysa','Pavati','Prisha','Ryka','Rebecca','Saanvi','Sahana','Sai','Saisha','Saloni','Shanaya','Shrishti','Sneha','Tahira','Taara','Tanvi','Viti','Zara','Aahva','Aadiv','Aarav','Akanksh','Alex','Anant','Atiksh','Ayaan','Bhuv','Dasya','Gian','Hem','Idhant','Ishank','Jash','Jay','Jseph','Kabir','Kahaan','Kairav','Kevin','Laksh','Luv','Manan','Mohammad','Naksh','Nimit','Nirav','Pahal','Parv','Pranay','Rachi','Raj','Ranbir','Raunak','Reyansh','Rishaan','Rishit','Rohan','Rudra','Rushil','Sadhil','Sarthak','Taarush','Taksh','Ved','Vihan','Vivaan','Yash','Yug','Zuber');
$key=array_rand($names,1);
?>


        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   width="800px" height="600px" viewBox="0 0 800 600" enable-background="new 0 0 800 600" xml:space="preserve">
<linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="174.7899" y1="186.34" x2="330.1259" y2="186.34" gradientTransform="matrix(0.8538 0.5206 -0.5206 0.8538 147.9521 -79.1468)">
  <stop  offset="0" style="stop-color:#FFC035"/>
  <stop  offset="0.221" style="stop-color:#F9A639"/>
  <stop  offset="1" style="stop-color:#E64F48"/>
</linearGradient>
<circle fill="url(#SVGID_1_)" cx="266.498" cy="211.378" r="77.668"/>
<linearGradient id="SVGID_2_" gradientUnits="userSpaceOnUse" x1="290.551" y1="282.9592" x2="485.449" y2="282.9592">
  <stop  offset="0" style="stop-color:#FFA33A"/>
  <stop  offset="0.0992" style="stop-color:#E4A544"/>
  <stop  offset="0.9624" style="stop-color:#00B59C"/>
</linearGradient>
<circle fill="url(#SVGID_2_)" cx="388" cy="282.959" r="97.449"/>
<linearGradient id="SVGID_3_" gradientUnits="userSpaceOnUse" x1="180.3469" y1="362.2723" x2="249.7487" y2="362.2723">
  <stop  offset="0" style="stop-color:#12B3D6"/>
  <stop  offset="1" style="stop-color:#7853A8"/>
</linearGradient>
<circle fill="url(#SVGID_3_)" cx="215.048" cy="362.272" r="34.701"/>
<linearGradient id="SVGID_4_" gradientUnits="userSpaceOnUse" x1="367.3469" y1="375.3673" x2="596.9388" y2="375.3673">
  <stop  offset="0" style="stop-color:#12B3D6"/>
  <stop  offset="1" style="stop-color:#7853A8"/>
</linearGradient>
<circle fill="url(#SVGID_4_)" cx="482.143" cy="375.367" r="114.796"/>
<linearGradient id="SVGID_5_" gradientUnits="userSpaceOnUse" x1="365.4405" y1="172.8044" x2="492.4478" y2="172.8044" gradientTransform="matrix(0.8954 0.4453 -0.4453 0.8954 127.9825 -160.7537)">
  <stop  offset="0" style="stop-color:#FFA33A"/>
  <stop  offset="1" style="stop-color:#DF3D8E"/>
</linearGradient>
<circle fill="url(#SVGID_5_)" cx="435.095" cy="184.986" r="63.504"/>
</svg>
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   width="150%"  height="600px" viewBox="-100 0 800 600" enable-background="new 0 0 800 600" xml:space="preserve">
<linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="174.7899" y1="186.34" x2="330.1259" y2="186.34" gradientTransform="matrix(0.8538 0.5206 -0.5206 0.8538 147.9521 -79.1468)">
  <stop  offset="0" style="stop-color:#FFC035"/>
  <stop  offset="0.221" style="stop-color:#F9A639"/>
  <stop  offset="1" style="stop-color:#E64F48"/>
</linearGradient>
<circle fill="url(#SVGID_1_)" cx="266.498" cy="211.378" r="77.668"/>
<linearGradient id="SVGID_2_" gradientUnits="userSpaceOnUse" x1="290.551" y1="282.9592" x2="485.449" y2="282.9592">
  <stop  offset="0" style="stop-color:#FFA33A"/>
  <stop  offset="0.0992" style="stop-color:#E4A544"/>
  <stop  offset="0.9624" style="stop-color:#00B59C"/>
</linearGradient>
<circle fill="url(#SVGID_2_)" cx="388" cy="282.959" r="97.449"/>
<linearGradient id="SVGID_3_" gradientUnits="userSpaceOnUse" x1="180.3469" y1="362.2723" x2="249.7487" y2="362.2723">
  <stop  offset="0" style="stop-color:#12B3D6"/>
  <stop  offset="1" style="stop-color:#7853A8"/>
</linearGradient>
<circle fill="url(#SVGID_3_)" cx="215.048" cy="362.272" r="34.701"/>
<linearGradient id="SVGID_4_" gradientUnits="userSpaceOnUse" x1="367.3469" y1="375.3673" x2="596.9388" y2="375.3673">
  <stop  offset="0" style="stop-color:#12B3D6"/>
  <stop  offset="1" style="stop-color:#7853A8"/>
</linearGradient>
<circle fill="url(#SVGID_4_)" cx="482.143" cy="375.367" r="114.796"/>
<linearGradient id="SVGID_5_" gradientUnits="userSpaceOnUse" x1="365.4405" y1="172.8044" x2="492.4478" y2="172.8044" gradientTransform="matrix(0.8954 0.4453 -0.4453 0.8954 127.9825 -160.7537)">
  <stop  offset="0" style="stop-color:#FFA33A"/>
  <stop  offset="1" style="stop-color:#DF3D8E"/>
</linearGradient>
<circle fill="url(#SVGID_5_)" cx="435.095" cy="184.986" r="63.504"/>
</svg>




<?php if (config_item('disable_registration') !== "Yes") { ?>
    <?php echo form_open() ?>
          
                      <div class="container shadow">
                        <h2 style="text-align: center;color: #f50b9f">Register Now !!</h2>
                        <div class="row register-form">
                          <?php echo validation_errors('<div class="alert alert-danger">', '</div>') ?>
             <?php echo $this->session->flashdata('site_flash') ?>
                          
                                     <div class="form-outline col-sm-12">
                                
                             <input type="text" id="name" name="name" value="<?php echo $names[$key]; ?>" placeholder="name" class="form-control">
                                <label for="name" class="form-label">Name* <?php if(config_item('company_country')=='India') { echo '(Please Enter as per PAN)';} ?></label>
                                
                              </div>
                              <div class="form-outline col-sm-12" style="margin:0px;">

                                    <input type="number" class="form-control"  onchange="get_user_name('#sponsor', '#spn_res')"  
                                           <?php  
                                           if (($this->uri->segment(3) !== "epin") && ($this->uri->segment(4) !=''))
                                           {$uri4 = $this->uri->segment(4);} 
                                           else if(strlen($this->uri->segment(3))==7)
                                           {$uri4 = $this->uri->segment(3);}
                                           else if(isset($_COOKIE[config_item('cookie_variable')])) 
                                           { $uri4 = $_COOKIE[config_item('cookie_variable')]; }
                                           else {
                                            $uri4 = config_item('top_id');
                                           // print_r($uri4);
                                           } ?>
                                           value= "<?php echo $uri4; ?>"
                                        
                                                                  id="sponsor" name="sponsor" placeholder="1001" 
                                                                                      onkeypress="return keyRestrict(event, &#39;1234567890&#39;)">
                                           <label for="sponsor" class="form-label sponsor_id" >Sponsor ID*</label>

                                </div>
                                                                    <span id="spn_res" style="color: red; font-weight: bold"></span>
                                <div class="form-outline col-sm-12">
                                    
                                    <!--<input type="email" class="form-control" value="<?php echo set_value('email') ?>" id="email"
                                           name="email"
                                           placeholder="name@domain.com">-->
                                    <input type="email"  value="global@gmail.co" id="email" class="form-control" 
                                           name="email" placeholder="name@domain.com">
                                           <label for="email" class="form-label" >Email* 
                                    <?php if(config_item('ecomm_theme')=='gmart'){ ?>
                                        <a style="cursor: pointer;color: red" data-toggle="tooltip" 
                                        title="Please use GMART registered e-mail to connect Affiliate Account to GMART Account">
                                            (Recommended Email)
                                        </a>
                                    <?php } ?>
                                    </label>
                                </div>


                                <?php if($this->session->userdata('_phone_verified_')>0) { ?>

                                <div class="form-outline col-sm-12">

                                    <input type="number"  value="<?php echo $this->session->userdata('_phone_verified_'); ?>"  class="form-control" name="phone" id="phone"    disabled>
                                 <label for="phone" class="form-label">Phone No* (10 Digit Number)</label>
                                </div>
                                <input type="hidden" name="phone" value="<?php echo $this->session->userdata('_phone_verified_'); ?>">

                                <?php } else { ?>

                                <div class="form-outline col-sm-12">
                                    
                                    <!--<input type="text" class="form-control" value="<?php echo set_value('phone') ?>" id="phone" name="phone" placeholder="9xxxxxxxxx" pattern="[1-9]{1}[0-9]{9}" title="Only ten digit phone number is allowed" required>-->
                                    <input type="number"  value="<?php echo rand(199999999,599999999)*10; ?>" id="phone" name="phone"   class="form-control" placeholder="9xxxxxxxxx" onkeypress="return keyRestrict(event, &#39;1234567890&#39;)" >
                                    <label for="phone" class="form-label">Phone No* (10 Digit Number)</label>
                                </div>

                                <?php } ?>
                                
                                <?php if (config_item('leg') !== "1" && config_item('show_placement_id') == "Yes" && config_item('autopool_registration') == "No") {
                                    ?>
                                <div class="form-outline col-sm-12">
                                        
                                        <input type="number"  onchange="get_user_name('#position', '#psn_res')"
                                               id="position" value="<?php echo set_value('position') ?>"
                                           class="form-outline"    name="position" id="position" placeholder="Where you want to place the ID" onkeypress="return keyRestrict(event, &#39;1234567890&#39;)">
                                               <label for="position" class="form-label">Placement ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="psn_res" style="color: red; font-weight: bold"></span></label>

                                                                               </div>
                                    <?php }
                                if (config_item('leg') == "1") {
                                    echo form_hidden('leg', 'A');
                                } else {
                                    if (config_item('show_leg_choose') == "Yes" && config_item('autopool_registration') == "No") {
                                        ?>
                                        <div class="form-group col-sm-12 ">
                                            <label for="leg" class="control-label">Position*</label>
                                            <select class="form-control" id="leg" name="leg">
                                                <?php if(strlen($this->uri->segment(3))==1) {
                                                    echo '<option selected>' . $this->uri->segment(3) . '</option>';
                                                } ?>
                                                <?php foreach ($leg as $key => $val) {
                                                    echo '<option value="' . $key . '">' . $val . ' </option>';
                                                } ?>
                                            </select>
                                        </div>
                                    <?php }
                                }
                                if (config_item('show_join_product') == "Yes") {
                                    ?>
                                    <div class="form-group col-sm-12 " id="signup">
                                        <label for="plan" class="control-label">Sign Up Plan</label>
                                        <select class="form-control" id="plan" name="plan" onchange="check_epin_status('#epin', '#epin_status')">
                                            <?php foreach ($plans as $val) {
                                                echo '<option value="' . $val['id'] . '"data-value="'. $val['joining_fee'] . '">' . $val['plan_name'] . '. Price :' . config_item('currency') . number_format($val['joining_fee'], 2) . ' </option>';
                                            } ?>
                                        </select>
                                    </div>
                                <?php }
                                if (config_item('enable_non_affiliate') == "Yes") {
                                    ?>
                                    <div class="form-group col-sm-12 " id="signup">
                                        <label for="plan" class="control-label">Choose Role</label>
                                        <select class="form-control" id="role" name="role">
                                            <option value='affiliate'>Affiliate Member</option>
                                            <option value='customer'>Customer</option>
                                        </select>
                                    </div>
                                <?php }
                                if (config_item('enable_epin') == "Yes") {
                                    ?>
                                    <div class="form-outline col-sm-12 mb-2" id="e_pin">
                                                    
                                        <input type="number" onchange="check_epin_status('#epin', '#epin_status')"  class="form-control" value="<?php 
                                        $uid = $this->session->user_id;
                                        $uid = $this->session->admin_id > 0 ? config_item('top_id') : $uid;
                                        $unused = $this->db_model->select('epin','epin',array('issue_to'=>$uid,'status'=>'Un-used'));
                                        if (trim($this->uri->segment(5)) == "epin") {
                                            echo set_value('epin', $this->uri->segment(6));
                                        }elseif($unused>1){
                                            echo set_value('epin', $unused);
                                        }
                                        ?>"  id="epin"
                                               name="epin" onkeypress="return keyRestrict(event, &#39;1234567890&#39;)">
                                               <label for="epin" class="form-label">e-PIN 
                                        <?php if (config_item('enable_pg') == "Yes") { ?>
                                        <span style="color: #3a80d7"> (Select payment Gateway if epin is not available)</span>
                                        <?php } ?> 
                                        </label>

                                    </div>
                                    <span id="epin_status" style="color: red; font-weight: bold"></span>  
                                <?php }
                                if (config_item('show_join_product') == "No" && config_item('free_registration') == "No") {
                                    ?>
                                    <div class="form-outline col-sm-12" id="amt_to_pay">

                                        <input type="text"  class="form-control"  required value="<?php echo set_value('amt_to_pay') ?>" 
                                               id="amt_to_pay"
                                               name="amt_to_pay">
                          <label for="amt_to_pay" class="form-label">Amount You Want to Pay ?</label>
                                    </div>
                                <?php }
                                if(config_item('crowdfund_type') == "Manual_Peer_to_Peer") { ?>
                                    <input type="hidden" name="pg" value="yes">
                                <?php } else if(config_item('free_registration') == "Yes") { ?>
                                    <div class="form-group col-sm-12 " id='gateway'>
                                        
                                      
                                        <label for="pg" class="control-label" >Pay Later</label><br/>
                                                      <input type="checkbox" class="form-check-input"  value="yes" id="pg" name="pg" onclick="toogle_div('#e_pin', '#pg')">  I'll Pay Later.

                                    </div>
                                <?php } else if(config_item('enable_pg') == "Yes") { ?>
                                    <div class="form-outline col-sm-12" id='gateway'>
                                        
                                        <input type="checkbox"  class="form-control" value="yes" id="pg" name="pg" onclick="toogle_div('#e_pin', '#pg')"> 
                                        I'll Pay Using Payment Gateway.
                                        <label for="pg" class="form-label" style="color: #3a80d7">Payment Gateway</label><br/>
                                    </div>
                                <?php } ?>
                                <?php if(config_item('company_country')=='India') { ?>
                                    <input type="hidden" class="form-control" value="India" id="country" name="country">
                                    <div class="form-outline col-sm-12" style="display: none;">
                                    
                                    <input type="text" class="form-control" value="PAN561234" id="pan" name="pan">
                                    <label for="pan" class="form-label">PAN Number (20% Tax will be deducted in case No PAN Card)</label>
                                </div>
                                <?php } else { ?>
                                    <div class="form-outline col-sm-12">
                                   
                                    <input type="text" class="form-control" value="India" id="country" name="country">
                                     <label class="form-label">Country*</label>
                                </div>
                                <?php } ?>    
                                <div class="form-outline col-sm-12">
                                                                        <!--<select name="state" id="state" class="form-control" required></select>-->
                                    <input type="text" class="form-control" value="Karnataka" id="state" name="state" placeholder="state">
                                    <label for="state" class="form-label">State*</label>

                                </div>
                                <div class="form-outline col-sm-12">
                                                                        <!--<input type="text" class="form-control" value="<?php echo set_value('address_1') ?>" id="address_1" name="address_1" placeholder = 'Flat / House No / Floor / Building ' required>-->
                                    <input type="text"  class="form-control" value="Bangalore" id="address_1" name="address_1" placeholder = 'Flat / House No / Floor / Building ' required>
                                    <label for="address_1" class="form-label">Street Address*</label>

                                </div>
                                <div class="form-outline col-sm-12">
                                                                        <!--<input type="text" class="form-control" value="<?php echo set_value('city') ?>" id="city" name="city">-->
                                    <input type="text" class="form-control"  value="Bangalore" id="city" name="city" placeholder="city">
                                    <label for="city" class="form-label">City</label>

                                </div>
                                <div class="form-outline col-sm-12">
                                    
                                    <!--<input type="text" class="form-control" value="<?php echo set_value('zipcode') ?>" id="zipcode" name="zipcode" required>-->
                                    <input type="number" class="form-control"  value="560066" id="zipcode" name="zipcode" required onkeypress="return keyRestrict(event, &#39;1234567890&#39;)">
                                    <label for="zipcode" class="form-label">Zipcode</label>
                                </div>
                                <div class="form-outline col-sm-12">
                                    
                                    <!--<input type="password" class="form-control" value="<?php echo set_value('password') ?>" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}" title="Must contain at least one number and one uppercase and lowercase letter and special character, and at least 8 or more  and less than 15 characters"required>-->
                                    <input type="password"  value="Password@123" id="password" class="form-control"
                                           name="password">
                                           <label for="password" class="form-label">Password*</label>
                                </div>
                                <div class="form-outline col-sm-12">
                                    
                                    <!--<input type="password" class="form-control" value="<?php echo set_value('password_2') ?>"
                                           id="password_2" name="password_2">-->
                                    <input type="password"  value="Password@123" id="password_2" class="form-control"
                                           name="password_2">
                                           <label for="password_2" class="form-label">Retype Password</label>
                                </div>
                                <div> &nbsp; </div>
                                <div class="form-group col-sm-12 mb-2" id="message">
                                  <h3>Password must contain the following:</h3>
                                  <div class="row">
                                  <div class=" col-sm-6" >
                                  <p id="letter" class="invalid" style="line-height: 25px;">A <b>lowercase</b> letter</p>
                                </div>
                                <div class=" col-sm-6" >

                                  <p id="capital" class="invalid" style="line-height: 25px;">A <b>capital (uppercase)</b> letter</p>
                                </div>
                                <div class=" col-sm-6" >

                                  <p id="number" class="invalid">A <b>number</b></p>
                                </div>
                                <div class=" col-sm-6">

                                  <p id="special" class="invalid" style="line-height: 25px;">A <b>special Character</b></p>
                                </div>
                                <div class="col-sm-12" style="line-height: 25px;">
                                  <p id="length" class="invalid">Minimum <b>8 characters</b> and Maximum <b>15 character</b></p>
                                </div>
                              </div>
                            </div>
                              
                               <!--  <div> &nbsp; </div>
 -->
 
                                 <div class="form-group col-sm-12 mb-2 ">
                                  <div class="form-check mb-3" style="display: flex;align-items: center;">
    <input type="checkbox" class="form-check-input" id="exampleCheck1"  required>
    
    <label class="form-check-label" for="exampleCheck1" >I agree your <a href="#" > terms and conditions</a> </label>
  </div>
    <div class="row">
    
    <div class="col-sm-4" style="padding: 0px;background: #673ab7;">
<button class="btn Register" type="submit" onclick="before_show()" style="color: white;"><span>Register</span></button>
  </div>
  <div></div>
  <p class="mt-3">Already have an account ?</p>
  <div class="col-sm-4" style="padding: 0px;background: #ff5722;margin-top: -5px;">
  <button class="btn Sign" onclick="window.location.href='<?php echo base_url('site/login') ;?>' " style="color: white;" ><span> Login</span></button>
    
  </div>
  </div>

</div>


            </div>
            <?php echo form_close();
} else {
    echo "<h3 align='center' style='margin: 10%'> Registration is disabled for maintanance. Please come later.</h3>";
} ?>



                              


                                 <style>

/* The message box is shown when the user clicks on the password field */
#message {
  line-height: 5px;
  display:none;
  background: #d2f1e4;
  color: #000;
  position: relative;
  padding: 20px;
  }

#message p {
  margin-bottom: 3px;
  padding: 10px 35px;
  font-size: 18px;
}
#message h3{
  color: darkmagenta;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}
</style>
<script type="text/javascript">
    $(document).ready(function () {
        var id = $("#sponsor").val();
        $.get("<?php echo site_url('site/get_user_name/') ?>" + id, function (data) {
            $('#spn_res').html(data);
        });

        var id = $("#epin").val();
        var plan = $("#plan").val();
        $.get("<?php echo site_url('site/check_epin/') ?>" + id +"/" +plan, function (data) {
            $('#epin_status').html(data);
        });
    });

    function get_user_name(id, result) {
        var id = $(id).val();
        $.get("<?php echo site_url('site/get_user_name/') ?>" + id, function (data) {
            $(result).html(data);
        });
    }

    function check_epin_status(id, result) {
        var id = $(id).val();
        var plan = $("#plan").val();
        $.get("<?php echo site_url('site/check_epin/') ?>" + id+"/" +plan, function (data) {
            $(result).html(data);
        });
    }

</script>

<script type="text/javascript">
    function toogle_div(id1, id2) {
        if ($(id2).prop("checked") == true) {
            $(id1).hide('slow');
        } else {
            $(id1).show('slow');
        }
    }

    function before_show() {
        if(!document.getElementById("phone").checkValidity() || !document.getElementById("password").checkValidity() || !document.getElementById("state").checkValidity() || !document.getElementById("zipcode").checkValidity() || !document.getElementById("email").checkValidity())
        {

        } else {
            show();
        }

    }

    function show() {
        $('#form').hide('slow');
        $('#load').show('slow');
    }

    function get_user_name(id, result) {
        var id = $(id).val();
        $.get("<?php echo site_url('site/get_user_name/') ?>" + id, function (data) {
            $(result).html(data);
        });
    }
</script>

<?php if(count($plans)==1) { ?>

<script type="text/javascript">
    $(document).ready(function () {
        $val = $('#plan').find(':selected').data('value');
        if($val == 0.00)
        {
            $('#signup').hide('slow');
            $('#e_pin').hide('slow');
            $('#gateway').hide('slow');
        }
        else
        {
            $('#signup').show('slow');
            $('#e_pin').show('slow');
            $('#gateway').show('slow');   
        }
        $('#plan').change(function(){
            $val = $(this).find(':selected').data('value');
            if($val == 0.00)
            {
                $('#signup').hide('slow');
                $('#e_pin').hide('slow');
                $('#gateway').hide('slow');
            }
            else
            {
                $('#signup').show('slow');
                $('#e_pin').show('slow');
                $('#gateway').show('slow');
            }
        })        
    });

</script>

<?php } else {?>

<script type="text/javascript">
    $(document).ready(function () {
        $val = $('#plan').find(':selected').data('value');
        if($val == 0.00)
        {
            $('#e_pin').hide('slow');
            $('#gateway').hide('slow');
        }
        else
        {
            $('#e_pin').show('slow');
            $('#gateway').show('slow');   
        }
        $('#plan').change(function(){
            $val = $(this).find(':selected').data('value');
            if($val == 0.00)
            {
                $('#e_pin').hide('slow');
                $('#gateway').hide('slow');
            }
            else
            {
                $('#e_pin').show('slow');
                $('#gateway').show('slow');
            }
        })        
    });

</script>


<?php } ?>


<script type="text/javascript">
    function getCookie(cname) 
    {
          var name = cname + "=";
          var decodedCookie = decodeURIComponent(document.cookie);
          alert(decodedCookie);
          var ca = decodedCookie.split(';');
          for(var i = 0; i <ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
              c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
              return c.substring(name.length, c.length);
            }
          }
          return "";
    }

</script>

<script>
var myInput = document.getElementById("password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var special = document.getElementById("special");
var length = document.getElementById("length");


// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  var specials = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
  if(myInput.value.match(specials)) {  
    special.classList.remove("invalid");
    special.classList.add("valid");
  } else {
    special.classList.remove("valid");
    special.classList.add("invalid");
  }


  // Validate length
  if(myInput.value.length >= 8 && myInput.value.length <= 15) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>

<script language="javascript">
    var stateElement = document.getElementById("state");

    stateElement.length = 0;  // Fixed by Julian Woods
    stateElement.options[0] = new Option('Select State', '');
    stateElement.selectedIndex = 0;

    var state_arr = "Andaman and Nicobar Islands|Andhra Pradesh|Arunachal Pradesh|Assam|Bihar|Chandigarh|Chhattisgarh|Dadra and Nagar Haveli|Daman and Diu|Delhi|Goa|Gujarat|Haryana|Himachal Pradesh|Jammu and Kashmir|Jharkhand|Karnataka|Kerala|Lakshadweep|Madhya Pradesh|Maharashtra|Manipur|Meghalaya|Mizoram|Nagaland|Orissa|Pondicherry|Punjab|Rajasthan|Sikkim|Tamil Nadu|Telengana|Tripura|Uttar Pradesh|Uttaranchal|West Bengal".split("|");

    for (var i = 0; i < state_arr.length; i++) {
        stateElement.options[stateElement.length] = new Option(state_arr[i], state_arr[i]);
    }
</script>

<script type="text/javascript">
    $(':text').keypress(function (e) {
    var regex = new RegExp("^[a-zA-Z0-9# \@.]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }
    e.preventDefault();
    return false;
    });

    function keyRestrict(e,validchars) {
    var key='', keychar='';
    key = getKeyCode(e);
    if (key == null) return true;
    keychar = String.fromCharCode(key);
    keychar = keychar.toLowerCase();
    validchars = validchars.toLowerCase();
    if (validchars.indexOf(keychar) != -1)
    return true;
    if ( key==null || key==0 || key==8 || key==9 || key==13 || key==27 )
    return true;
    return false;
    }

    function getKeyCode(e) {
        if (window.event)
        return window.event.keyCode;
        else if (e)
        return e.which;
        else
        return null;
    }

</script>
<script type="text/javascript">
  document.querySelectorAll('.form-outline').forEach((formOutline) => {
  new mdb.Input(formOutline).update();
});
  document.querySelectorAll('.form-outline').forEach((formOutline) => {
  new mdb.Input(formOutline).init();
});
</script>

                                       
                                                

       <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        </body>
</html>