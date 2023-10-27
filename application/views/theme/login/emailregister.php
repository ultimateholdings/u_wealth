<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    <!-- Bootstrap CSS -->
    <!-- MDB -->
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
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css"
  rel="stylesheet"/>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> -->

  <script src="<?php echo base_url('axxets/base/js/jquery_v3.2.1.min.js') ?>" type="text/javascript"></script>



    <title>mail register</title>

<style type="text/css">
.register{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
   
    padding: 2%;
}
.input-field i {
  text-align: center;
  line-height: 55px;
  color: #acacac;
  transition: 0.5s;
  font-size: 1.1rem;
}
footer a{
  color: #db3069;
}
footer{
  padding: 25px 0px 10px 0px;
  background: blanchedalmond;
}
header{
  color: #002e5b;
  padding: 10px;
  background: #d0e3c4;;

}

.input-field input {
  background: none;
  outline: none;
  border: none;
  line-height: 1;
  font-weight: 600;
  font-size: 1.1rem;
  color: #333;
}
h3{color: white}
.input-field input::placeholder {
  color: #aaa;
  font-weight: 500;
}
.register-left{
    text-align: center;
    color: #fff;
    margin-top: 4%;
}
.wavy {
  position: relative;
  -webkit-box-reflect: below -12px linear-gradient(transparent, rgba(0, 0, 0, 0.2));
  display: inline;
  padding-left: 1px;
  text-transform: capitalize;
}
.register-left input{
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    width: 60%;
    background: #f8f9fa;
    font-weight: bold;
    color: #383d41;
    margin-top: 10%;
    margin-bottom: 3%;
    cursor: pointer;
}
.register-right{
    background: #f8f9fa;
    border-top-left-radius: 10% 50%;
    border-bottom-left-radius: 10% 50%;
}
.register-left img{
    margin-top: 15%;
    margin-bottom: 5%;
    width: 25%;
    -webkit-animation: mover 2s infinite  alternate;
    animation: mover 1s infinite  alternate;
}

.register-left p{
    font-weight: lighter;
    padding: 12%;
    margin-top: -9%;
}
.register-form{
  padding-top: 15px;
}
.btnRegister{
    float: right;
    margin-top: 10%;
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    background: #0062cc;
    color: #fff;
    font-weight: 600;
    width: 50%;
    cursor: pointer;
}
.register .nav-tabs{
    margin-top: 3%;
    border: none;
    background: #0062cc;
    border-radius: 1.5rem;
    width: 28%;
    float: right;
}
.register .nav-tabs .nav-link{
    padding: 2%;
    height: 34px;
    font-weight: 600;
    color: #fff;
    border-top-right-radius: 1.5rem;
    border-bottom-right-radius: 1.5rem;
}
.register .nav-tabs .nav-link:hover{
    border: none;
}
.register .nav-tabs .nav-link.active{
    width: 100px;
    color: #0062cc;
    border: 2px solid #0062cc;
    border-top-left-radius: 1.5rem;
    border-bottom-left-radius: 1.5rem;
}
.register-heading{

    position: relative;
    -webkit-box-reflect: below -12px linear-gradient(transparent, rgba(0, 0, 0, 0.2));
    
   
    text-transform: capitalize;

    text-align: center;
    margin-top: 8%;
    margin-bottom: -15%;
    color: #00bcd4;
}
.register-heading span {
  position: relative;
  display: inline-block;
  color: #00bcd4;
  font-weight: bold;
 
  text-transform: uppercase;
  animation: animate 1.5s ease-in-out infinite;
  animation-delay: calc(.1s * var(--i));
  letter-spacing: -4px;
}
@media only screen and (max-width: 768px) {  
        .hid{
      display: none;
    }
  }

      </style>
      <style type="text/css">
        

.hid{
  position: relative;
            background-repeat: no-repeat;
    background-position: 50%;
    background-size: cover;

/*background:linear-gradient( rgba(0, 0, 0, 0.5) 100%, rgba(0, 0, 0, 0.5)100%),url(images/bg2.jpg);*/
        background-image: url(<?php echo base_url('uploads/site_img/bg2.jpg') ?>) ;
       
        
      }
      .hid:before {
        opacity: 0.7;
    position: absolute;
    content: '';
    background-image: linear-gradient(to left, rgba(50, 100, 245, 0.90), rgba(74, 84, 232, 0.88), rgba(91, 66, 219, 0.85), rgba(104, 44, 203, 0.88), rgba(114, 2, 187, 0.90));
    width: 100%;
    height: 100%;
    top: 0; 
    left: 0;
  }

/**
* Make the field a flex-container, reverse the order so label is on top.
*/
 
.field {
  justify-content: flex-end;
  display: flex;
  flex-flow: column-reverse;
  margin-bottom: 1.5em;
}
.form-group{
  margin-bottom: 15px;
}
/**
* Add a transition to the label and input.
* I'm not even sure that touch-action: manipulation works on
* inputs, but hey, it's new and cool and could remove the 
* pesky delay.
*/
label{
  color: darkblue;
}
label, input {
   /*color: darkblue;*/
  transition: all 0.2s;
  touch-action: manipulation;
}

.form-control:focus{
  box-shadow: inset 0 0 0 0.5px #1266f1;
} 

input {
  font-size: 1.0em;
  border: 0;
  border-bottom: 1px solid #ccc;
  font-family: inherit;
  -webkit-appearance: none;
  border-radius: 0;
  padding: 0;
  cursor: text;
}

input:focus {
  outline: 0;
  border-bottom: 1px solid #666;
}

label {
  /*text-transform: uppercase;*//*
 // letter-spacing: 0.05em;*/
}
/**
* Translate down and scale the label up to cover the placeholder,
* when following an input (with placeholder-shown support).
* Also make sure the label is only on one row, at max 2/3rds of the
* field—to make sure it scales properly and doesn't wrap.
*/
input:placeholder-shown + label {
  cursor: text;
  max-width: 81.66%;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  transform-origin: left bottom;
  transform: translate(0, 1.7rem) scale(1.25);
}
/**
* By default, the placeholder should be transparent. Also, it should 
* inherit the transition.
*/
::-webkit-input-placeholder {
  opacity: 0;
  transition: inherit;
}
/**
* Show the placeholder when the input is focused.
*/
input:focus::-webkit-input-placeholder {
  opacity: 1;
}
/**
* When the element is focused, remove the label transform.
* Also, do this when the placeholder is _not_ shown, i.e. when 
* there's something in the input at all.
*/
input:not(:placeholder-shown) + label,
input:focus + label {
  transform: translate(0, 0) scale(1);
  cursor: pointer;
}
      </style>
   
    </head>
  <body>
    <?php $names = array('Olivia','Amelia','Isla','Ava','Emily','Sophia','Grace','Mia','Poppy','Ella','Oliver','George','Harry','Noah','Jack','Charlie','Leo','Jacob','Freddie','Alfie','Aaradhya','Adah','Adhira','Alisha','Amoli','Anaisha','Ananya','Anika','Anushka','Asmee','Avni','Carina','Drishti','Hiya','Ira','Ishana','Ishita','Kaia','Kashvi','Keya','Kimaya','Krisha','Larisa','Mahika','Mayra','Mehar','Mirai','Mishka','Naitee','Navya','Nehrika','Neysa','Pavati','Prisha','Ryka','Rebecca','Saanvi','Sahana','Sai','Saisha','Saloni','Shanaya','Shrishti','Sneha','Tahira','Taara','Tanvi','Viti','Zara','Aahva','Aadiv','Aarav','Akanksh','Alex','Anant','Atiksh','Ayaan','Bhuv','Dasya','Gian','Hem','Idhant','Ishank','Jash','Jay','Jseph','Kabir','Kahaan','Kairav','Kevin','Laksh','Luv','Manan','Mohammad','Naksh','Nimit','Nirav','Pahal','Parv','Pranay','Rachi','Raj','Ranbir','Raunak','Reyansh','Rishaan','Rishit','Rohan','Rudra','Rushil','Sadhil','Sarthak','Taarush','Taksh','Ved','Vihan','Vivaan','Yash','Yug','Zuber');
$key=array_rand($names,1);
?>

<?php if (config_item('disable_registration') !== "Yes") { ?>
    <?php echo form_open() ?>
    <header><h2 align="center" style="margin: 1px;">Register Now !</h2></header>

    <div class="container-fluid " >

      <div class="row">
        <div class="col-md-6 hid">
          
          
        </div>
        <div class="col-md-6" >
          <?php echo validation_errors('<div class="alert alert-danger">', '</div>') ?>
             <?php echo $this->session->flashdata('site_flash') ?>
          <div class="row register-form" > 
          <!-- <form action="">
  <div class="field col-sm-6">
    <input type="text" name="fullname" id="fullname" placeholder="Jane ">
    <label for="fullname">Name</label>
  </div>
  
  <div class="field col-sm-6">
    <input type="email" name="email" id="email" placeholder="jane.appleseed@example.com">
    <label for="email">Email</label>
  </div>
  <div class="field col-sm-6">
                  <input type="text" id="name" name="name" value="<?php echo $names[$key]; ?>" placeholder="enter name">
      <label for="name" >Name* <?php if(config_item('company_country')=='India') { echo '(Please Enter as per PAN)';} ?></label>

                                
                              </div>
  </form> 
 -->
                            <div class="field col-sm-6">
                                
                                <input type="text" id="name" name="name" value="<?php echo $names[$key]; ?>" placeholder="name">
                                <label for="name" >Name* <?php if(config_item('company_country')=='India') { echo '(Please Enter as per PAN)';} ?></label>
                                
                              </div>
                              <div class="field col-sm-6">
                                    <span id="spn_res" style="color: red; font-weight: bold"></span>
                                    <input type="number" onchange="get_user_name('#sponsor', '#spn_res')"  
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
                                           <label for="sponsor" class="control-label">Sponsor ID*</label>

                                </div>
                                <div class="field col-sm-6">
                                    
                                    <!--<input type="email" class="form-control" value="<?php echo set_value('email') ?>" id="email"
                                           name="email"
                                           placeholder="name@domain.com">-->
                                    <input type="email"  value="global@gmail.co" id="email"
                                           name="email" placeholder="name@domain.com">
                                           <label for="email" class="control-label" >Email* 
                                    <?php if(config_item('ecomm_theme')=='gmart'){ ?>
                                        <a style="cursor: pointer;color: red" data-toggle="tooltip" 
                                        title="Please use GMART registered e-mail to connect Affiliate Account to GMART Account">
                                            (Recommended Email)
                                        </a>
                                    <?php } ?>
                                    </label>
                                </div>


                                <?php if($this->session->userdata('_phone_verified_')>0) { ?>

                                <div class="field col-sm-6">

                                    <input type="number"  value="<?php echo $this->session->userdata('_phone_verified_'); ?>" name="phone" id="phone" disabled>
                                 <label for="phone" class="control-label">Phone No* (10 Digit Number)</label>
                                </div>
                                <input type="hidden" name="phone" value="<?php echo $this->session->userdata('_phone_verified_'); ?>">

                                <?php } else { ?>

                                <div class="field col-sm-6">
                                    
                                    <!--<input type="text" class="form-control" value="<?php echo set_value('phone') ?>" id="phone" name="phone" placeholder="9xxxxxxxxx" pattern="[1-9]{1}[0-9]{9}" title="Only ten digit phone number is allowed" required>-->
                                    <input type="number"  value="<?php echo rand(199999999,599999999)*10; ?>" id="phone" name="phone" placeholder="9xxxxxxxxx" onkeypress="return keyRestrict(event, &#39;1234567890&#39;)" >
                                    <label for="phone" class="control-label">Phone No* (10 Digit Number)</label>
                                </div>

                                <?php } ?>
                                
                                <?php if (config_item('leg') !== "1" && config_item('show_placement_id') == "Yes" && config_item('autopool_registration') == "No") {
                                    ?>
                                <div class="field col-sm-6">
                                        
                                        <input type="number"  onchange="get_user_name('#position', '#psn_res')"
                                               id="position" value="<?php echo set_value('position') ?>"
                                               name="position" id="position" placeholder="Where you want to place the ID" onkeypress="return keyRestrict(event, &#39;1234567890&#39;)">
                                               <label for="position" class="control-label">Placement ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="psn_res" style="color: red; font-weight: bold"></span></label>

                                                                               </div>
                                    <?php }
                                if (config_item('leg') == "1") {
                                    echo form_hidden('leg', 'A');
                                } else {
                                    if (config_item('show_leg_choose') == "Yes" && config_item('autopool_registration') == "No") {
                                        ?>
                                        <div class="form-group col-sm-6">
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
                                    <div class="form-group col-sm-6" id="signup">
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
                                    <div class="form-group col-sm-6" id="signup">
                                        <label for="plan" class="control-label">Choose Role</label>
                                        <select class="form-control" id="role" name="role">
                                            <option value='affiliate'>Affiliate Member</option>
                                            <option value='customer'>Customer</option>
                                        </select>
                                    </div>
                                <?php }
                                if (config_item('enable_epin') == "Yes") {
                                    ?>
                                    <div class="field col-sm-6" id="e_pin">
                                         <span id="epin_status" style="color: red; font-weight: bold"></span>             
                                        <input type="number" onchange="check_epin_status('#epin', '#epin_status')" value="<?php 
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
                                               <label for="epin" class="control-label">e-PIN 
                                        <?php if (config_item('enable_pg') == "Yes") { ?>
                                        <span style="color: #3a80d7"> (Select payment Gateway if epin is not available)</span>
                                        <?php } ?> 
                                        </label>

                                    </div>
                                <?php }
                                if (config_item('show_join_product') == "No" && config_item('free_registration') == "No") {
                                    ?>
                                    <div class="field col-sm-6" id="amt_to_pay">

                                        <input type="text" required value="<?php echo set_value('amt_to_pay') ?>" 
                                               id="amt_to_pay"
                                               name="amt_to_pay">
                          <label for="amt_to_pay" class="control-label">Amount You Want to Pay ?</label>
                                    </div>
                                <?php }
                                if(config_item('crowdfund_type') == "Manual_Peer_to_Peer") { ?>
                                    <input type="hidden" name="pg" value="yes">
                                <?php } else if(config_item('free_registration') == "Yes") { ?>
                                    <div class="form-group col-sm-12" id='gateway'>
                                        
                                      
                                        <label for="pg" class="control-label" >Pay Later</label><br/>
                                                      <input type="checkbox" class="form-check-input"  value="yes" id="pg" name="pg" onclick="toogle_div('#e_pin', '#pg')">  I'll Pay Later.

                                    </div>
                                <?php } else if(config_item('enable_pg') == "Yes") { ?>
                                    <div class="field col-sm-12" id='gateway'>
                                        
                                        <input type="checkbox" value="yes" id="pg" name="pg" onclick="toogle_div('#e_pin', '#pg')"> 
                                        I'll Pay Using Payment Gateway.
                                        <label for="pg" class="control-label" style="color: #3a80d7">Payment Gateway</label><br/>
                                    </div>
                                <?php } ?>
                                <?php if(config_item('company_country')=='India') { ?>
                                    <input type="hidden" class="form-control" value="India" id="country" name="country">
                                    <div class="field col-sm-6" style="display: none;">
                                    
                                    <input type="text"  value="PAN561234" id="pan" name="pan">
                                    <label for="pan" class="control-label">PAN Number (20% Tax will be deducted in case No PAN Card)</label>
                                </div>
                                <?php } else { ?>
                                    <div class="field col-sm-6">
                                   
                                    <input type="text"  value="India" id="country" name="country">
                                     <label>Country*</label>
                                </div>
                                <?php } ?>    
                                <div class="field col-sm-6">
                                                                        <!--<select name="state" id="state" class="form-control" required></select>-->
                                    <input type="text" value="Karnataka" id="state" name="state" placeholder="state">
                                    <label for="state" class="control-label">State*</label>

                                </div>
                                <div class="field col-sm-6">
                                                                        <!--<input type="text" class="form-control" value="<?php echo set_value('address_1') ?>" id="address_1" name="address_1" placeholder = 'Flat / House No / Floor / Building ' required>-->
                                    <input type="text" value="Bangalore" id="address_1" name="address_1" placeholder = 'Flat / House No / Floor / Building ' required>
                                    <label for="address_1" class="control-label">Street Address*</label>

                                </div>
                                <div class="field col-sm-6">
                                                                        <!--<input type="text" class="form-control" value="<?php echo set_value('city') ?>" id="city" name="city">-->
                                    <input type="text"  value="Bangalore" id="city" name="city" placeholder="city">
                                    <label for="city" class="control-label">City</label>

                                </div>
                                <div class="field col-sm-6">
                                    
                                    <!--<input type="text" class="form-control" value="<?php echo set_value('zipcode') ?>" id="zipcode" name="zipcode" required>-->
                                    <input type="number"  value="560066" id="zipcode" name="zipcode" required onkeypress="return keyRestrict(event, &#39;1234567890&#39;)">
                                    <label for="zipcode" class="control-label">Zipcode</label>
                                </div>
                                <div class="field col-sm-6">
                                    
                                    <!--<input type="password" class="form-control" value="<?php echo set_value('password') ?>" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}" title="Must contain at least one number and one uppercase and lowercase letter and special character, and at least 8 or more  and less than 15 characters"required>-->
                                    <input type="password"  value="Password@123" id="password"
                                           name="password">
                                           <label for="password" class="control-label">Password*</label>
                                </div>
                                <div class="field col-sm-6">
                                    
                                    <!--<input type="password" class="form-control" value="<?php echo set_value('password_2') ?>"
                                           id="password_2" name="password_2">-->
                                    <input type="password"  value="Password@123" id="password_2"
                                           name="password_2">
                                           <label for="password_2" class="control-label">Retype Password</label>
                                </div>
                                <div> &nbsp; </div>
                                <div class="form-group col-sm-12" id="message">
                                  <h3>Password must contain the following:</h3>
                                  <div class="row">
                                  <div class=" col-sm-6">
                                  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                                </div>
                                <div class=" col-sm-6" style="padding: 0px;">

                                  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                                </div>
                                <div class=" col-sm-6">

                                  <p id="number" class="invalid">A <b>number</b></p>
                                </div>
                                <div class=" col-sm-6">

                                  <p id="special" class="invalid">A <b>special Character</b></p>
                                </div>
                                <div class="col-sm-12" style="line-height: 25px;">
                                  <p id="length" class="invalid">Minimum <b>8 characters</b> and Maximum <b>15 character</b></p>
                                </div>
                              </div>
                              </div>
                                <div> &nbsp; </div>

 
                                 <div class="form-group col-sm-12">
                                  <div class="form-check mb-3" style="display: flex;align-items: center;">
    <input type="checkbox" class="form-check-input" id="exampleCheck1"  required>
    <label class="form-check-label" for="exampleCheck1" >I agree your <a href = "<?php echo site_url('site/terms') ?>" target="_blank"> terms and conditions</a> </label>
  </div>
                                    <button class="btn btn-primary" type="submit" onclick="before_show()">Register</button>
                                </div>

                                       
                            </div>
                     </div>

          
        </div>

        
      </div>
      
    </div>

      <?php echo form_close();
} else {
    echo "<h3 align='center' style='margin: 10%'> Registration is disabled for maintanance. Please come later.</h3>";
} ?>
<footer >
        <div class="container" style="display: flex;justify-content: center;">
            <div class="row" style="display: inline;">
                ©2021 All Rights Reserved | Powered by <a href="https://www.globalmlmsolution.com" alt="_blank" > Global MLM Software </a>            </div>
        </div>
    </footer>
      
       <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     </body>

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

</html>