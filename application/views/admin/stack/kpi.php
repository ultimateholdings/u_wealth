<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<style type="text/css">
/* CSS reset */
*,
*::after,
*::before {
  /*box-sizing: inherit;*/
  margin: 0;
  padding: 0;
}


/* Main heading for inside page */
.inside-page__heading { 
  padding-bottom: 1rem; 
  width: 100%;
}

/* For inside page's body text */
.inside-page__text {
  color: #333;
}

/* Icons ===========================================*/

.card-front__icon {
  fill: #fafbfa;
  font-size: 3vw;
  height: 3.25rem;
  margin-top: -.5rem;
  width: 3.25rem;
}




/* Layout Structure=========================================*/


/* Container to hold all cards in one place */
.card-area {
  align-items: center;
  display: flex;
  flex-wrap: nowrap;
  height: 100%;
  justify-content: space-evenly;
  padding: 1rem;
}

/* Card ============================================*/

/* Area to hold an individual card */
.card-section {
  align-items: center;
  display: flex;
  height: 100%;
  justify-content: center;
  width: 100%;
}

/* A container to hold the flip card and the inside page */
.card1 {
  background-color: rgba(0,0,0, .05);
  box-shadow: -.1rem 1.7rem 6.6rem -3.2rem rgba(0,0,0,0.5);
  height: 13rem;
  position: relative;
  transition: all 1s ease;
  width: 15rem;
    box-sizing: border-box;
  font-family: 'Open Sans', sans-serif;
  margin-left:auto;
  margin-right: auto;
}

/* Flip card - covering both the front and inside front page */

/* An outer container to hold the flip card. This excludes the inside page */
.flip-card {
  height: 13rem;
  perspective: 100rem;
  position: absolute;
  right: 0;
  transition: all 1s ease;
  visibility: hidden;
  width: 15rem;
  z-index: 100;
}

/* The outer container's visibility is set to hidden. This is to make everything within the container NOT set to hidden  */
/* This is done so content in the inside page can be selected */
.flip-card > * {
  visibility: visible;
}

/* An inner container to hold the flip card. This excludes the inside page */
.flip-card__container {
  height: 100%;
  position: absolute;
  right: 0;
  transform-origin: left;
  transform-style: preserve-3d;
  transition: all 1s ease;
  width: 100%;
}

.card-front,
.card-back {
  backface-visibility: hidden;
  height: 100%;
  left: 0;
  position: absolute;
  top: 0;
  width: 100%;
}

/* Styling for the front side of the flip card */

/* container for the front side */
.card-front {
  background-color: #fafbfa;
  height: 13rem;
  width: 18rem;
}

/* Front side's top section */
.card-front__tp {
  align-items: center;
  clip-path: polygon(0 0, 100% 0, 100% 90%, 57% 90%, 50% 100%, 43% 90%, 0 90%);
  display: flex;
  flex-direction: column;
  height: 11rem;
  justify-content: center;
  padding: .75rem;
}

.card-front__tp--city {
background: #74EBD5;
background: -webkit-linear-gradient(to right, #ACB6E5, #74EBD5);
background: linear-gradient(to right, #ACB6E5, #74EBD5);



}

/* Front card's bottom section */
.card-front__bt {
  align-items: center;
  display: flex;
  justify-content: center;
}

/* Styling for the back side of the flip card */

.card-back {
  background-color: #fafbfa;
  transform: rotateY(180deg);
}

/* Specifically targeting the <video> element */
.video__container {
  clip-path: polygon(0% 0%, 100% 0%, 90% 50%, 100% 100%, 0% 100%);
  height: auto;
  min-height: 100%;
  object-fit: cover;
  width: 100%;
}

/* Inside page */

.inside-page {
  background-color: #fafbfa;
  box-shadow: inset 20rem 0px 5rem -2.5rem rgba(0,0,0,0.25);
  height: 100%;
  padding: 1rem;
  position: absolute;
  right: 0;
  transition: all 1s ease;
  width: 15rem;
  z-index: 1;
}

.inside-page__container {
  align-items: center;
  display: flex;
  flex-direction: column;
  height: 100%;
  text-align: center; 
  width: 100%;
}

/* Functionality ====================================*/

/* This is to keep the card centered (within its container) when opened */
.card1:hover {
  box-shadow:
  -.1rem 1.7rem 6.6rem -3.2rem rgba(0,0,0,0.75);
  width: 25rem;
}

/* When the card is hovered, the flip card container will rotate */
.card1:hover .flip-card__container {
  transform: rotateY(-130deg);
}

/* When the card is hovered, the shadow on the inside page will shrink to the left */
.card1:hover .inside-page {
  box-shadow: inset 1rem 0px 5rem -2.5rem rgba(0,0,0,0.1);
}

</style>


<div class="app-content content">
<div>
  <br/>
  <h3 class="ml-2"><b>Hi, Admin</b></h3>
</div>

    <div class="content-overlay"></div>



    <div class="content-wrapper">
 <?php if($this->db_model->count_all('transaction', array('to_userid'=>'admin', 'status'=>'Processing'))>0){ ?>
              <div class="alert alert-success" align="center">
              You have Received Bank Deposits from Members !!! Please <a href="<?php echo site_url('income/bank_payment') ?>" style='color: blue;'> Click Here </a> to Approve the payment !!!
              </div>
              <?php } ?>


         <?php if($this->db_model->count_all('ticket', array('user_type'=>'User', 'status'=>'Open'))+$this->db_model->count_all('ticket', array('user_type'=>'User', 'status'=>'Customer Reply'))>0){ ?>
              <div class="alert alert-success" >
              You have Pending Support Ticket !!! Please <a href="<?php echo site_url('ticket/unsolved') ?>" style='color: blue;'> Click Here </a> to Resolve !!!
              </div>
              <?php } ?>     

        <div class="content-header row">

        </div>

        <div class="content-body">
<?php if(config_item('crowdfund_type') == "Manual_Peer_to_Peer"){ ?>
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:68px;">
        <div class="card1">
          <div class="flip-card">
            <div class="flip-card__container">
              <div class="card-front">
                <div class="card-front__tp card-front__tp--city">
                  <i class="fas fa-people-carry" style="font-size:40px;"></i>
                  <h3 style="color: white;">Total Team</h3>
                  <br/>
                  <h3 style="color:white;"><?php echo $this->db_model->count_all('member')-1; ?></h3>
                </div>
                <div class="card-front__bt">
                  <p style="color:#00b97c; font-size: 14px;" >View more </p>
                </div>
              </div>
              <div class="card-back">
                <video class="video__container" autoplay muted loop>
                  <source class="video__media" src="https://cdn.videvo.net/videvo_files/video/free/2018-11/small_watermarked/181015_14a_VeniceBeachSkatepark_010_preview.webm" type="video/mp4">
                </video>
              </div>
            </div>
          </div>
          <div class="inside-page">
            <div class="inside-page__container">
              <h5 class="inside-page__heading inside-page__heading--city" style="">
                What is Total Team?
              </h5>
              <p class="inside-page__text">
                Total number of active and inactive people joined to the business
              </p>
              <a class="btn btn-primary" href="<?php echo site_url('users/view-members') ?>" style="color: white;">View Members</a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:68px;">
        <div class="card1">
          <div class="flip-card">
            <div class="flip-card__container">
              <div class="card-front">
                <div class="card-front__tp card-front__tp--city">
                  <i class="fas fa-coins" style="font-size:40px;"></i>
                  <h3 style="color: white;">Joining Amount</h3>
                  <br/>
                  <h3 style="color:white;"><?php echo config_item('currency') . round($reg_income,0) ?></h3>
                </div>
                <div class="card-front__bt">
                  <p style="color:#00b97c; font-size: 14px;" >View more </p>
                </div>
              </div>
              <div class="card-back">
                <video class="video__container" autoplay muted loop>
                  <source class="video__media" src="https://cdn.videvo.net/videvo_files/video/free/2017-10/small_watermarked/170115_Money_059_preview.webm" type="video/mp4">
                </video>
              </div>
            </div>
          </div>
          <div class="inside-page">
            <div class="inside-page__container">
              <h5 class="inside-page__heading inside-page__heading--city" style="">
                What is Joining Amount?
              </h5>
              <p class="inside-page__text">
                Amount paid by all the user while joining to the plan.
              </p>
              <a class="btn btn-primary" href="<?php echo site_url('income/view_deductions') ?>" style="color: white;">View Deductions</a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:70px;">
        <div class="card1">
          <div class="flip-card">
            <div class="flip-card__container">
              <div class="card-front">
                <div class="card-front__tp card-front__tp--city">
                  <i class="fas fa-user-lock" style="font-size:40px;"></i>
                  <h3 style="color: white;">Admin's Income</h3>
                  <br/>
                  <h3 style="color:white;"><?php echo config_item('currency') . round($earnings,0) ?></h3>
                </div>
                <div class="card-front__bt">
                  <p style="color:#00b97c; font-size: 14px;" >View more </p>
                </div>
              </div>
              <div class="card-back">
                <video class="video__container" autoplay muted loop>
                  <source class="video__media" src="https://cdn.videvo.net/videvo_files/video/free/2018-07/small_watermarked/180607_A_072_preview.webm" type="video/mp4">
                </video>
              </div>
            </div>
          </div>
          <div class="inside-page">
            <div class="inside-page__container">
              <h5 class="inside-page__heading inside-page__heading--city" style="">
                What is Admin's income?
              </h5>
              <p class="inside-page__text">
                Total amount Earned by the admin.
              </p>
              <a class="btn btn-primary" href="<?php echo site_url('income/view_deductions') ?>" style="color: white;">View Deductions</a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:70px;">
        <div class="card1">
          <div class="flip-card">
            <div class="flip-card__container">
              <div class="card-front">
                <div class="card-front__tp card-front__tp--city">
                  <i class="fas fa-users" style="font-size:40px;"></i>
                  <h3 style="color: white;">Member Income</h3>
                  <br/>
                  <h3 style="color:white;"><?php echo config_item('currency') . round($member_income,0) ?></h3>
                </div>
                <div class="card-front__bt">
                  <p style="color:#00b97c; font-size: 14px;" >View more </p>
                </div>
              </div>
              <div class="card-back">
                <video class="video__container" autoplay muted loop>
                  <source class="video__media" src="https://cdn.videvo.net/videvo_files/video/free/2013-04/small_watermarked/DollarBillPrintingVidevo_preview.webm" type="video/mp4">
                </video>
              </div>
            </div>
          </div>
          <div class="inside-page">
            <div class="inside-page__container">
              <h5 class="inside-page__heading inside-page__heading--city" style="">
                What is member income ?
              </h5>
              <p class="inside-page__text">
                Total amount earned by member.
              </p>
              <a class="btn btn-primary" href="<?php echo site_url('income/view-earning') ?>" style="color: white;">View Earnings</a>
            </div>
          </div>
        </div>
      </div>
    </div>   

<?php } else { ?>
    <?php if(config_item('leg')=='2') { ?>
        <div class="row">
          <?php if(config_item('enable_pv')=='Yes') { ?>
            <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:68px;">
              <div class="card1">
                    <div class="flip-card">
                        <div class="flip-card__container">
                            <div class="card-front">
                                <div class="card-front__tp card-front__tp--city">
                                    
                                        <i class="fas fa-hand-point-left" style="font-size:40px;"></i>
                                       <h3 style="color: white;">
                                        Left PV
                                    </h3>
                                    <br/>
                                    <h3 style="color:white;"><?php  echo $this->db_model->select('total_a_pv', 'member', array('id' => config_item('top_id'))); ?></h3>
                                    </p>
                                </div>

                                <div class="card-front__bt">
                                    <p style="color:#00b97c; font-size: 14px;" >View more </p>
                                </div>
                            </div>
                            <div class="card-back">
                                <video class="video__container" autoplay muted loop>
                                    <source class="video__media" src="https://cdn.videvo.net/videvo_files/video/free/2015-09/small_watermarked/clock_preview.webm" type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div>

                    <div class="inside-page">
                        <div class="inside-page__container">
                            <h5 class="inside-page__heading inside-page__heading--city" style="">
                                What is Left PV?
                            </h5>
                            <p class="inside-page__text">
                               Total number of active pv on left leg.
                            </p>

                            <a class="btn btn-primary" href="<?php echo site_url('users/view-members') ?>" style="color: white;">View Member</a>
                        </div>
                    </div>
                </div>
            </div>  

            <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:68px;">
              <div class="card1">
                    <div class="flip-card">
                        <div class="flip-card__container">
                            <div class="card-front">
                                <div class="card-front__tp card-front__tp--city">
                                    
                                        <i class="fas fa-hand-point-right" style="font-size:40px;"></i>
                                       <h3 style="color: white;">
                                        Right PV
                                    </h3>
                                    <br/>
                                    <h3 style="color:white;"><?php  echo $this->db_model->select('total_b_pv', 'member', array('id' => config_item('top_id'))); ?></h3>
                                    </p>
                                </div>

                                <div class="card-front__bt">
                                    <p style="color:#00b97c; font-size: 14px;" >View more </p>
                                </div>
                            </div>
                            <div class="card-back">
                                <video class="video__container" autoplay muted loop>
                                    <source class="video__media" src="https://cdn.videvo.net/videvo_files/video/free/2015-09/small_watermarked/clock_preview.webm" type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div>

                    <div class="inside-page">
                        <div class="inside-page__container">
                            <h5 class="inside-page__heading inside-page__heading--city" style="">
                                What is Right PV?
                            </h5>
                            <p class="inside-page__text">
                               Total number of active pv on Right leg.
                            </p>

                            <a class="btn btn-primary" href="<?php echo site_url('users/view-members') ?>" style="color: white;">View Member</a>
                        </div>
                    </div>
                </div>
            </div>  
              
          <?php } else { ?>
            <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:68px;">
              <div class="card1">
                    <div class="flip-card">
                        <div class="flip-card__container">
                            <div class="card-front">
                                <div class="card-front__tp card-front__tp--city">
                                    
                                        <i class="fas fa-hand-point-left" style="font-size:40px;"></i>
                                       <h3 style="color: white;">
                                        Left Count
                                    </h3>
                                    <br/>
                                    <h3 style="color:white;"><?php  $detail = $this->db_model->select('total_a', 'member', array('id' => config_item('top_id')));
                                      echo $detail; ?></h3>
                                    </p>
                                </div>

                                <div class="card-front__bt">
                                    <p style="color:#00b97c; font-size: 14px;" >View more </p>
                                </div>
                            </div>
                            <div class="card-back">
                                <video class="video__container" autoplay muted loop>
                                    <source class="video__media" src="https://cdn.videvo.net/videvo_files/video/free/2015-09/small_watermarked/clock_preview.webm" type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div>

                    <div class="inside-page">
                        <div class="inside-page__container">
                            <h5 class="inside-page__heading inside-page__heading--city" style="">
                                What is Left Count?
                            </h5>
                            <p class="inside-page__text">
                               Total number of active people on left leg.
                            </p>

                            <a class="btn btn-primary" href="<?php echo site_url('users/view-members') ?>" style="color: white;">View Member</a>
                        </div>
                    </div>
                </div>
            </div>  
            <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:70px;">
              <div class="card1">
                    <div class="flip-card">
                        <div class="flip-card__container">
                            <div class="card-front">
                                <div class="card-front__tp card-front__tp--city">
                                    
                                        <i class="fas fa-hand-point-right" style="font-size:40px;"></i>
                                       <h3 style="color: white;">
                                        Right count
                                    </h3>
                                    <br/>
                                    <h3 style="color:white;"><?php  $detail = $this->db_model->select('total_b', 'member', array('id' => config_item('top_id')));
                                      echo $detail; ?></h3>
                                    </p>
                                </div>

                                <div class="card-front__bt">
                                    <p style="color:#00b97c; font-size: 14px;" >View more </p>
                                </div>
                            </div>
                            <div class="card-back">
                                <video class="video__container" autoplay muted loop>
                                    <source class="video__media" src="https://cdn.videvo.net/videvo_files/video/free/2015-09/small_watermarked/clock_preview.webm" type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div>

                    <div class="inside-page">
                        <div class="inside-page__container">
                            <h5 class="inside-page__heading inside-page__heading--city" style="">
                                What is Right Count?
                            </h5>
                            <p class="inside-page__text">
                               Total number of active people on Right leg.
                            </p>

                            <a class="btn btn-primary" href="<?php echo site_url('users/view-members') ?>" style="color: white;">View members</a>
                        </div>
                    </div>
                </div>
            </div>
          <?php } ?>
          <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:70px;">
              <div class="card1">
                    <div class="flip-card">
                        <div class="flip-card__container">
                            <div class="card-front">
                                <div class="card-front__tp card-front__tp--city">
                                    
                                        <i class="fas fa-user-lock" style="font-size:40px;"></i>
                                       <h3 style="color: white;">
                                        Admin's Income
                                    </h3>
                                    <br/>
                                    <h3 style="color:white;"><?php echo config_item('currency') . round($earnings,0) ?></h3>
                                    </p>
                                </div>

                                <div class="card-front__bt">
                                    <p style="color:#00b97c; font-size: 14px;" >View more </p>
                                </div>
                            </div>
                            <div class="card-back">
                                <video class="video__container" autoplay muted loop>
                                    <source class="video__media" src="https://cdn.videvo.net/videvo_files/video/free/2018-07/small_watermarked/180607_A_072_preview.webm" type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div>

                    <div class="inside-page">
                        <div class="inside-page__container">
                            <h5 class="inside-page__heading inside-page__heading--city" style="">
                                What is Admin's income?
                            </h5>
                            <p class="inside-page__text">
                               Total amount earned by the admin.
                            </p>

                            <a class="btn btn-primary" href="<?php echo site_url('income/view_deductions') ?>" style="color: white;">View Deductions</a>
                        </div>
                    </div>
                </div>
            </div>
          <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:68px;">
              <div class="card1">
                    <div class="flip-card">
                        <div class="flip-card__container">
                            <div class="card-front">
                                <div class="card-front__tp card-front__tp--city">
                                    
                                        <i class="fas fa-coins" style="font-size:40px;"></i>
                                       <h3 style="color: white;">
                                        Today's Income
                                    </h3>
                                    <br/>
                                    <h3 style="color:white;"><?php echo config_item('currency') . round($earnings_today,0) ?></h3>
                                    </p>
                                </div>

                                <div class="card-front__bt">
                                    <p style="color:#00b97c; font-size: 14px;" >View more </p>
                                </div>
                            </div>
                            <div class="card-back">
                                <video class="video__container" autoplay muted loop>
                                    <source class="video__media" src="https://cdn.videvo.net/videvo_files/video/free/2020-06/small_watermarked/introBusinessEtEconomySansText_1591434698_preview.webm" type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div>

                    <div class="inside-page">
                        <div class="inside-page__container">
                            <h5 class="inside-page__heading inside-page__heading--city" style="">
                                What is Today's income ?
                            </h5>
                            <p class="inside-page__text">
                               Total amount earned by admin today.
                            </p>

                            <a class="btn btn-primary" href="<?php echo site_url('income/view_deductions') ?>" style="color: white;">View Deductions</a>
                        </div>
                    </div>
                </div>
            </div>
          <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:70px;">
              <div class="card1">
                    <div class="flip-card">
                        <div class="flip-card__container">
                            <div class="card-front">
                                <div class="card-front__tp card-front__tp--city">
                                    
                                        <i class="fas fa-people-arrows" style="font-size:40px;"></i>
                                       <h3 style="color: white;">
                                        Referrals Paid
                                    </h3>
                                    <br/>
                                    <h3 style="color:white;"><?php echo config_item('currency') . round($direct_referral_income,0); ?></h3>
                                    </p>
                                </div>

                                <div class="card-front__bt">
                                    <p style="color:#00b97c; font-size: 14px;" >View more </p>
                                </div>
                            </div>
                            <div class="card-back">
                                <video class="video__container" autoplay muted loop>
                                    <source class="video__media" src="https://cdn.videvo.net/videvo_files/video/free/2012-10/small_watermarked/hd0265-H264%2075_preview.webm" type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div>

                    <div class="inside-page">
                        <div class="inside-page__container">
                            <h5 class="inside-page__heading inside-page__heading--city" style="">
                                What is Referral Paid ?
                            </h5>
                            <p class="inside-page__text">
                               Total amount paid by admin as referral income.
                            </p>

                            <a class="btn btn-primary" href="<?php echo site_url('income/view-earning') ?>" style="color: white;">View Earnings</a>
                        </div>
                    </div>
                </div>
            </div>
          <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:70px;">
              <div class="card1">
                    <div class="flip-card">
                        <div class="flip-card__container">
                            <div class="card-front">
                                <div class="card-front__tp card-front__tp--city">
                                    
                                        <i class="fas fa-users" style="font-size:40px;"></i>
                                       <h3 style="color: white;">
                                        Member Income
                                    </h3>
                                    <br/>
                                    <h3 style="color:white;"><?php echo config_item('currency') . round($member_income,0) ?></h3>
                                    </p>
                                </div>

                                <div class="card-front__bt">
                                    <p style="color:#00b97c; font-size: 14px;" >View more </p>
                                </div>
                            </div>
                            <div class="card-back">
                                <video class="video__container" autoplay muted loop>
                                    <source class="video__media" src="https://cdn.videvo.net/videvo_files/video/free/2013-04/small_watermarked/DollarBillPrintingVidevo_preview.webm" type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div>

                    <div class="inside-page">
                        <div class="inside-page__container">
                            <h5 class="inside-page__heading inside-page__heading--city" style="">
                                What is member income ?
                            </h5>
                            <p class="inside-page__text">
                               Total amount earned by member.
                            </p>

                            <a class="btn btn-primary" href="<?php echo site_url('income/view-earning') ?>" style="color: white;">View Earnings</a>
                        </div>
                    </div>
                </div>
            </div>
          <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:68px;">
              <div class="card1">
                    <div class="flip-card">
                        <div class="flip-card__container">
                            <div class="card-front">
                                <div class="card-front__tp card-front__tp--city">
                                    
                                        <i class="fas fa-money-check" style="font-size:40px;"></i>
                                       <h3 style="color: white;">
                                        Paid Payout
                                    </h3>
                                    <br/>
                                    <h3 style="color:white;"><?php echo config_item('currency') . round($paid_payout,0) ?></h3>
                                    </p>
                                </div>

                                <div class="card-front__bt">
                                    <p style="color:#00b97c; font-size: 14px;" >View more </p>
                                </div>
                            </div>
                            <div class="card-back">
                                <video class="video__container" autoplay muted loop>
                                    <source class="video__media" src="https://cdn.videvo.net/videvo_files/video/free/2017-01/small_watermarked/170115_05_USDollars_4K_preview.webm" type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div>

                    <div class="inside-page">
                        <div class="inside-page__container">
                            <h5 class="inside-page__heading inside-page__heading--city" style="">
                                What is Paid Payout?
                            </h5>
                            <p class="inside-page__text">
                               The funds that have been deposited to member's bank account.
                            </p>

                            <a class="btn btn-primary" href="<?php echo site_url('income/all_transactions') ?>" style="color: white;">Paid payout</a>
                        </div>
                    </div>
                </div>
            </div>
          <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:70px;">
              <div class="card1">
                    <div class="flip-card">
                        <div class="flip-card__container">
                            <div class="card-front">
                                <div class="card-front__tp card-front__tp--city">
                                    
                                        <i class="fas fa-money-check" style="font-size:40px;"></i>
                                       <h3 style="color: white;">
                                        Pending Payout
                                    </h3>
                                    <br/>
                                    <h3 style="color:white;"><?php echo config_item('currency') . round($pending_payout,0) ?></h3>
                                    </p>
                                </div>

                                <div class="card-front__bt">
                                    <p style="color:#00b97c; font-size: 14px;" >View more </p>
                                </div>
                            </div>
                            <div class="card-back">
                                <video class="video__container" autoplay muted loop>
                                    <source class="video__media" src="https://cdn.videvo.net/videvo_files/video/free/2018-08/small_watermarked/180626_13_Metro_13_preview.webm" type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div>

                    <div class="inside-page">
                        <div class="inside-page__container">
                            <h5 class="inside-page__heading inside-page__heading--city" style="">
                                What is Pending Payout?
                            </h5>
                            <p class="inside-page__text">
                               Funds that are on the way to member's bank account.
                            </p>

                            <a class="btn btn-primary" href="<?php echo site_url('income/bank_payment') ?>" style="color: white;">Pending Payout</a>
                        </div>
                    </div>
                </div>
            </div>
    <?php } else if(config_item('enable_crowdfund')=='Yes'){ ?>
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:68px;">
            <div class="card1">
              <div class="flip-card">
                <div class="flip-card__container">
                  <div class="card-front">
                    <div class="card-front__tp card-front__tp--city">
                      <i class="fas fa-people-carry" style="font-size:40px;"></i>
                      <h3 style="color: white;">Total Team</h3>
                      <br/>
                      <h3 style="color:white;"><?php echo $this->db_model->count_all('member')-1; ?></h3>
                    </div>
                    <div class="card-front__bt">
                      <p style="color:#00b97c; font-size: 14px;" >View more </p>
                    </div>
                  </div>
                  <div class="card-back">
                    <video class="video__container" autoplay muted loop>
                      <source class="video__media" src="https://cdn.videvo.net/videvo_files/video/free/2018-11/small_watermarked/181015_14a_VeniceBeachSkatepark_010_preview.webm" type="video/mp4">
                    </video>
                  </div>
                </div>
              </div>
              <div class="inside-page">
                <div class="inside-page__container">
                  <h5 class="inside-page__heading inside-page__heading--city" style="">
                    What is Total Team?
                  </h5>
                  <p class="inside-page__text">
                    Total number of active and inactive people joined to the business
                  </p>
                  <a class="btn btn-primary" href="<?php echo site_url('users/view-members') ?>" style="color: white;">View Member</a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:70px;">
            <div class="card1">
              <div class="flip-card">
                <div class="flip-card__container">
                  <div class="card-front">
                    <div class="card-front__tp card-front__tp--city">
                      <i class="fas fa-coins" style="font-size:40px;"></i>
                      <h3 style="color: white;">Joining Amount</h3>
                      <br/>
                      <h3 style="color:white;"><?php echo config_item('currency') . round($reg_income,0) ?></h3>
                    </div>
                    <div class="card-front__bt">
                      <p style="color:#00b97c; font-size: 14px;" >View more </p>
                    </div>
                  </div>
                  <div class="card-back">
                    <video class="video__container" autoplay muted loop>
                      <source class="video__media" src="https://cdn.videvo.net/videvo_files/video/free/2017-10/small_watermarked/170115_Money_059_preview.webm" type="video/mp4">
                    </video>
                  </div>
                </div>
              </div>
              <div class="inside-page">
                <div class="inside-page__container">
                  <h5 class="inside-page__heading inside-page__heading--city" style="">
                    What is Joining Amount ?
                  </h5>
                  <p class="inside-page__text">
                    Amount paid by user while joining to the plan.
                  </p>
                  <a class="btn btn-primary" href="<?php echo site_url('income/view_deductions') ?>" style="color: white;">View Deductions</a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:70px;">
            <div class="card1">
              <div class="flip-card">
                <div class="flip-card__container">
                  <div class="card-front">
                    <div class="card-front__tp card-front__tp--city">
                      <i class="fas fa-user-lock" style="font-size:40px;"></i>
                      <h3 style="color: white;">Admin's Income</h3>
                      <br/>
                      <h3 style="color:white;"><?php echo config_item('currency') . round($earnings,0) ?></h3>
                    </div>
                    <div class="card-front__bt">
                      <p style="color:#00b97c; font-size: 14px;" >View more </p>
                    </div>
                  </div>
                  <div class="card-back">
                    <video class="video__container" autoplay muted loop>
                      <source class="video__media" src="https://cdn.videvo.net/videvo_files/video/free/2018-07/small_watermarked/180607_A_072_preview.webm" type="video/mp4">
                    </video>
                  </div>
                </div>
              </div>
              <div class="inside-page">
                <div class="inside-page__container">
                  <h5 class="inside-page__heading inside-page__heading--city" style="">
                    What is Admin's Income ?
                  </h5>
                  <p class="inside-page__text">
                    Total amount received by the admin.
                  </p>
                  <a class="btn btn-primary" href="<?php echo site_url('income/view_deductions') ?>" style="color: white;">View Deductions</a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:68px;">
            <div class="card1">
              <div class="flip-card">
                <div class="flip-card__container">
                  <div class="card-front">
                    <div class="card-front__tp card-front__tp--city">
                      <i class="fas fa-coins" style="font-size:40px;"></i>
                      <h3 style="color: white;">Today's Income</h3>
                      <br/>
                      <h3 style="color:white;"><?php echo config_item('currency') . round($earnings_today,0) ?></h3>
                    </div>
                    <div class="card-front__bt">
                      <p style="color:#00b97c; font-size: 14px;" >View more </p>
                    </div>
                  </div>
                  <div class="card-back">
                    <video class="video__container" autoplay muted loop>
                      <source class="video__media" src="https://cdn.videvo.net/videvo_files/video/free/2020-06/small_watermarked/introBusinessEtEconomySansText_1591434698_preview.webm" type="video/mp4">
                    </video>
                  </div>
                </div>
              </div>
              <div class="inside-page">
                <div class="inside-page__container">
                  <h5 class="inside-page__heading inside-page__heading--city" style="">
                    What is Today's Income ?
                  </h5>
                  <p class="inside-page__text">
                    Total amount earned by admin today.
                  </p>
                  <a class="btn btn-primary" href="<?php echo site_url('income/view_earning') ?>" style="color: white;">View earnings</a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:70px;">
            <div class="card1">
              <div class="flip-card">
                <div class="flip-card__container">
                  <div class="card-front">
                    <div class="card-front__tp card-front__tp--city">
                      <i class="fas fa-people-arrows" style="font-size:40px;"></i>
                      <h3 style="color: white;">Referral's Paid</h3>
                      <br/>
                      <h3 style="color:white;"><?php echo config_item('currency') . round($direct_referral_income,0); ?></h3>
                    </div>
                    <div class="card-front__bt">
                      <p style="color:#00b97c; font-size: 14px;" >View more </p>
                    </div>
                  </div>
                  <div class="card-back">
                    <video class="video__container" autoplay muted loop>
                      <source class="video__media" src="https://cdn.videvo.net/videvo_files/video/free/2012-10/small_watermarked/hd0265-H264%2075_preview.webm" type="video/mp4">
                    </video>
                  </div>
                </div>
              </div>
              <div class="inside-page">
                <div class="inside-page__container">
                  <h5 class="inside-page__heading inside-page__heading--city" style="">
                    What is Referral's Paid ?
                  </h5>
                  <p class="inside-page__text">
                    Total amount paid by admin as referral income.
                  </p>
                  <a class="btn btn-primary" href="<?php echo site_url('income/view_earning') ?>" style="color: white;">View Earnings</a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:70px;">
            <div class="card1">
              <div class="flip-card">
                <div class="flip-card__container">
                  <div class="card-front">
                    <div class="card-front__tp card-front__tp--city">
                      <i class="fas fa-users" style="font-size:40px;"></i>
                      <h3 style="color: white;">Member Income</h3>
                      <br/>
                      <h3 style="color:white;"><?php echo config_item('currency') . round($member_income,0) ?></h3>
                    </div>
                    <div class="card-front__bt">
                      <p style="color:#00b97c; font-size: 14px;" >View more </p>
                    </div>
                  </div>
                  <div class="card-back">
                    <video class="video__container" autoplay muted loop>
                      <source class="video__media" src="https://cdn.videvo.net/videvo_files/video/free/2013-04/small_watermarked/DollarBillPrintingVidevo_preview.webm" type="video/mp4">
                    </video>
                  </div>
                </div>
              </div>
              <div class="inside-page">
                <div class="inside-page__container">
                  <h5 class="inside-page__heading inside-page__heading--city" style="">
                    What is Member Income ?
                  </h5>
                  <p class="inside-page__text">
                    Total amount earned by member.
                  </p>
                  <a class="btn btn-primary" href="<?php echo site_url('income/view_earning') ?>" style="color: white;">View Earnings</a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:68px;">
            <div class="card1">
              <div class="flip-card">
                <div class="flip-card__container">
                  <div class="card-front">
                    <div class="card-front__tp card-front__tp--city">
                      <i class="fas fa-money-check" style="font-size:40px;"></i>
                      <h3 style="color: white;">Paid Payout</h3>
                      <br/>
                      <h3 style="color:white;"><?php echo config_item('currency') . round($paid_payout,0) ?></h3>
                    </div>
                    <div class="card-front__bt">
                      <p style="color:#00b97c; font-size: 14px;" >View more </p>
                    </div>
                  </div>
                  <div class="card-back">
                    <video class="video__container" autoplay muted loop>
                      <source class="video__media" src="https://cdn.videvo.net/videvo_files/video/free/2017-01/small_watermarked/170115_05_USDollars_4K_preview.webm" type="video/mp4">
                    </video>
                  </div>
                </div>
              </div>
              <div class="inside-page">
                <div class="inside-page__container">
                  <h5 class="inside-page__heading inside-page__heading--city" style="">
                    What is Paid Payout ?
                  </h5>
                  <p class="inside-page__text">
                    The funds that have been deposited to member's bank account.
                  </p>
                  <a class="btn btn-primary" href="<?php echo site_url('income/all_transactions') ?>" style="color: white;">Paid Payout</a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:70x;">
            <div class="card1">
              <div class="flip-card">
                <div class="flip-card__container">
                  <div class="card-front">
                    <div class="card-front__tp card-front__tp--city">
                      <i class="fas fa-money-check" style="font-size:40px;"></i>
                      <h3 style="color: white;">Pending Payout</h3>
                      <br/>
                      <h3 style="color:white;"><?php echo config_item('currency') . round($pending_payout,0) ?></h3>
                    </div>
                    <div class="card-front__bt">
                      <p style="color:#00b97c; font-size: 14px;" >View more </p>
                    </div>
                  </div>
                  <div class="card-back">
                    <video class="video__container" autoplay muted loop>
                      <source class="video__media" src="https://cdn.videvo.net/videvo_files/video/free/2018-08/small_watermarked/180626_13_Metro_13_preview.webm" type="video/mp4">
                    </video>
                  </div>
                </div>
              </div>
              <div class="inside-page">
                <div class="inside-page__container">
                  <h5 class="inside-page__heading inside-page__heading--city" style="">
                    What is Paid Payout ?
                  </h5>
                  <p class="inside-page__text">
                    Funds that are on the way to member's bank account.
                  </p>
                  <a class="btn btn-primary" href="<?php echo site_url('income/bank_payment') ?>" style="color: white;">Pending Payout</a>
                </div>
              </div>
            </div>
          </div>

    <?php } else { ?>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:68px;">
              <div class="card1">
                    <div class="flip-card">
                        <div class="flip-card__container">
                            <div class="card-front">
                                <div class="card-front__tp card-front__tp--city">
                                    
                                        <i class="fas fa-people-carry" style="font-size:40px;"></i>
                                       <h3 style="color: white;">
                                        Total Team
                                    </h3>
                                    <br/>
                                    <h3 style="color:white;"><?php echo $this->db_model->count_all('member')-1; ?></h3>
                                    </p>
                                </div>

                                <div class="card-front__bt">
                                    <p style="color:#00b97c; font-size: 14px;" >View more </p>
                                </div>
                            </div>
                            <div class="card-back">
                                <video class="video__container" autoplay muted loop>
                                    <source class="video__media" src="https://cdn.videvo.net/videvo_files/video/free/2018-11/small_watermarked/181015_14a_VeniceBeachSkatepark_010_preview.webm" type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div>

                    <div class="inside-page">
                        <div class="inside-page__container">
                            <h5 class="inside-page__heading inside-page__heading--city" style="">
                                What is Total Team?
                            </h5>
                            <p class="inside-page__text">
                               Total number of active and inactive people joined to the business
                            </p>

                            <a class="btn btn-primary" href="<?php echo site_url('users/view-members') ?>" style="color: white;">View Members</a>
                        </div>
                    </div>
                </div>
            </div>  
            <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:70px;">
              <div class="card1" style="margin-left:auto;margin-right: auto;">
                    <div class="flip-card">
                        <div class="flip-card__container">
                            <div class="card-front">
                                <div class="card-front__tp card-front__tp--city">
                                    
                                        <i class="fas fa-user-lock" style="font-size:40px;"></i>
                                       <h3 style="color: white;">
                                        Admin's Income
                                    </h3>
                                    <br/>
                                    <h3 style="color:white;"><?php echo config_item('currency') . round($earnings,0) ?></h3>
                                    </p>
                                </div>

                                <div class="card-front__bt">
                                    <p style="color:#00b97c; font-size: 14px;" >View more </p>
                                </div>
                            </div>
                            <div class="card-back">
                                <video class="video__container" autoplay muted loop>
                                    <source class="video__media" src="https://cdn.videvo.net/videvo_files/video/free/2018-07/small_watermarked/180607_A_072_preview.webm" type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div>

                    <div class="inside-page">
                        <div class="inside-page__container">
                            <h5 class="inside-page__heading inside-page__heading--city" style="">
                                What is Admin's income?
                            </h5>
                            <p class="inside-page__text">
                              Total amount received by the admin.
                            </p>

                            <a class="btn btn-primary" href="<?php echo site_url('income/view_deductions') ?>" style="color: white;">View Deductions</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:70px;">
              <div class="card1">
                    <div class="flip-card">
                        <div class="flip-card__container">
                            <div class="card-front">
                                <div class="card-front__tp card-front__tp--city">
                                    
                                        <i class="fas fa-coins" style="font-size:40px;"></i>
                                       <h3 style="color: white;">
                                        Today's Income
                                    </h3>
                                    <br/>
                                    <h3 style="color:white;"><?php echo config_item('currency') . round($earnings_today,0) ?></h3>
                                    </p>
                                </div>

                                <div class="card-front__bt">
                                    <p style="color:#00b97c; font-size: 14px;" >View more </p>
                                </div>
                            </div>
                            <div class="card-back">
                                <video class="video__container" autoplay muted loop>
                                    <source class="video__media" src="https://cdn.videvo.net/videvo_files/video/free/2020-06/small_watermarked/introBusinessEtEconomySansText_1591434698_preview.webm" type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div>

                    <div class="inside-page">
                        <div class="inside-page__container">
                            <h5 class="inside-page__heading inside-page__heading--city" style="">
                                What is Today's income ?
                            </h5>
                            <p class="inside-page__text">
                               Total amount earned by admin today.
                            </p>

                            <a class="btn btn-primary" href="<?php echo site_url('income/view_deductions') ?>" style="color: white;">View Deduction</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:68px;">
              <div class="card1">
                    <div class="flip-card">
                        <div class="flip-card__container">
                            <div class="card-front">
                                <div class="card-front__tp card-front__tp--city">
                                    
                                        <i class="fas fa-people-arrows" style="font-size:40px;"></i>
                                       <h3 style="color: white;">
                                        Referrals Paid
                                    </h3>
                                    <br/>
                                    <h3 style="color:white;"><?php echo config_item('currency') . round($direct_referral_income,0); ?></h3>
                                    </p>
                                </div>

                                <div class="card-front__bt">
                                    <p style="color:#00b97c; font-size: 14px;" >View more </p>
                                </div>
                            </div>
                            <div class="card-back">
                                <video class="video__container" autoplay muted loop>
                                    <source class="video__media" src="https://cdn.videvo.net/videvo_files/video/free/2012-10/small_watermarked/hd0265-H264%2075_preview.webm" type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div>

                    <div class="inside-page">
                        <div class="inside-page__container">
                            <h5 class="inside-page__heading inside-page__heading--city" style="">
                                What is Referral's Paid ?
                            </h5>
                            <p class="inside-page__text">
                              Total amount paid by admin as referral income.
                            </p>

                            <a class="btn btn-primary" href="<?php echo site_url('income/view-earning') ?>" style="color: white;">View Earnings</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:70px;">
              <div class="card1">
                    <div class="flip-card">
                        <div class="flip-card__container">
                            <div class="card-front">
                                <div class="card-front__tp card-front__tp--city">
                                    
                                        <i class="fas fa-coins" style="font-size:40px;"></i>
                                       <h3 style="color: white;">
                                        Level Income
                                    </h3>
                                    <br/>
                                    <h3 style="color:white;"><?php echo config_item('currency') . round($level_income,0); ?></h3>
                                    </p>
                                </div>

                                <div class="card-front__bt">
                                    <p style="color:#00b97c; font-size: 14px;" >View more </p>
                                </div>
                            </div>
                            <div class="card-back">
                                <video class="video__container" autoplay muted loop>
                                    <source class="video__media" src="https://cdn.videvo.net/videvo_files/video/free/2014-12/small_watermarked/Digital_Mixer__Motor_Faders_CLOSE_preview.webm" type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div>

                    <div class="inside-page">
                        <div class="inside-page__container">
                            <h5 class="inside-page__heading inside-page__heading--city" style="">
                                What is Level income ?
                            </h5>
                            <p class="inside-page__text">
                               Total amount earned by admin today.
                            </p>

                            <a class="btn btn-primary" href="<?php echo site_url('income/view-deductions') ?>" style="color: white;">View Deductions</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 mt-2"style="margin-right:70px;">
              <div class="card1">
                    <div class="flip-card">
                        <div class="flip-card__container">
                            <div class="card-front">
                                <div class="card-front__tp card-front__tp--city">
                                    
                                        <i class="fas fa-users" style="font-size:40px;"></i>
                                       <h3 style="color: white;">
                                        Member Income
                                    </h3>
                                    <br/>
                                    <h3 style="color:white;"><?php echo config_item('currency') . round($member_income,0) ?></h3>
                                    </p>
                                </div>

                                <div class="card-front__bt">
                                    <p style="color:#00b97c; font-size: 14px;" >View more </p>
                                </div>
                            </div>
                            <div class="card-back">
                                <video class="video__container" autoplay muted loop>
                                    <source class="video__media" src="https://cdn.videvo.net/videvo_files/video/free/2013-04/small_watermarked/DollarBillPrintingVidevo_preview.webm" type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div>

                    <div class="inside-page">
                        <div class="inside-page__container">
                            <h5 class="inside-page__heading inside-page__heading--city" style="">
                                What is member income ?
                            </h5>
                            <p class="inside-page__text">
                               Total amount earned by member.
                            </p>

                            <a class="btn btn-primary" href="<?php echo site_url('income/view-earning') ?>" style="color: white;">View Earnings</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:68px;">
              <div class="card1">
                    <div class="flip-card">
                        <div class="flip-card__container">
                            <div class="card-front">
                                <div class="card-front__tp card-front__tp--city">
                                    
                                        <i class="fas fa-money-check" style="font-size:40px;"></i>
                                       <h3 style="color: white;">
                                        Paid Payout
                                    </h3>
                                    <br/>
                                    <h3 style="color:white;"><?php echo config_item('currency') . round($paid_payout,0) ?></h3>
                                    </p>
                                </div>

                                <div class="card-front__bt">
                                    <p style="color:#00b97c; font-size: 14px;" >View more </p>
                                </div>
                            </div>
                            <div class="card-back">
                                <video class="video__container" autoplay muted loop>
                                    <source class="video__media" src="https://cdn.videvo.net/videvo_files/video/free/2017-01/small_watermarked/170115_05_USDollars_4K_preview.webm" type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div>

                    <div class="inside-page">
                        <div class="inside-page__container">
                            <h5 class="inside-page__heading inside-page__heading--city" style="">
                                What is Paid Payout?
                            </h5>
                            <p class="inside-page__text">
                               The funds that have been deposited to member's bank account.
                            </p>

                            <a class="btn btn-primary" href="<?php echo site_url('income/all_transactions') ?>" style="color: white;">Paid Payout</a>
                        </div>
                    </div>
                </div>
            </div>  
            <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:70px;">
              <div class="card1">
                    <div class="flip-card">
                        <div class="flip-card__container">
                            <div class="card-front">
                                <div class="card-front__tp card-front__tp--city">
                                    
                                        <i class="fas fa-money-check" style="font-size:40px;"></i>
                                       <h3 style="color: white;">
                                        Pending Payout
                                    </h3>
                                    <br/>
                                    <h3 style="color:white;"><?php echo config_item('currency') . round($pending_payout,0) ?></h3>
                                    </p>
                                </div>

                                <div class="card-front__bt">
                                    <p style="color:#00b97c; font-size: 14px;" >View more </p>
                                </div>
                            </div>
                            <div class="card-back">
                                <video class="video__container" autoplay muted loop>
                                    <source class="video__media" src="https://cdn.videvo.net/videvo_files/video/free/2018-08/small_watermarked/180626_13_Metro_13_preview.webm" type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div>

                    <div class="inside-page">
                        <div class="inside-page__container">
                            <h5 class="inside-page__heading inside-page__heading--city" style="">
                                What is Pending Payout?
                            </h5>
                            <p class="inside-page__text">
                               Funds that are on the way to member's bank account.
                            </p>

                            <a class="btn btn-primary" href="<?php echo site_url('income/bank_payment') ?>" style="color: white;">Pending Payout</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:70px;">
              <div class="card1">
                    <div class="flip-card">
                        <div class="flip-card__container">
                            <div class="card-front">
                                <div class="card-front__tp card-front__tp--city">
                                    
                                        <i class="fas fa-wallet" style="font-size:40px;"></i>
                                       <h3 style="color: white;">
                                        Member Wallet
                                    </h3>
                                    <br/>
                                    <h3 style="color:white;"><?php echo config_item('currency') . round($wallet_balance,0); ?></h3>
                                    </p>
                                </div>

                                <div class="card-front__bt">
                                    <p style="color:#00b97c; font-size: 14px;" >View more </p>
                                </div>
                            </div>
                            <div class="card-back">
                                <video class="video__container" autoplay muted loop>
                                    <source class="video__media" src="https://cdn.videvo.net/videvo_files/video/free/2018-12/small_watermarked/181217_01_Munich_11_preview.webm" type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div>

                    <div class="inside-page">
                        <div class="inside-page__container">
                            <h5 class="inside-page__heading inside-page__heading--city" style="">
                                member wallet
                            </h5>
                            <p class="inside-page__text">
                               It can be used for upgrade, purchase or withdrawn at any time.
                            </p>

                            <a class="btn btn-primary" href="<?php echo site_url('income/view_wallet') ?>" style="color: white;">View wallet</a>
                        </div>
                    </div>
                </div>
            </div>

    <?php } ?>
<?php } ?>
<?php if(config_item('extend_kpi')=='Yes'){ ?>
  
        <?php if(config_item('width')==2){ ?>
          <div class="col-lg-3 col-md-6 col-sm-6 mt-2"style="margin-right:70px;">
            <div class="card1">
              <div class="flip-card">
                <div class="flip-card__container">
                  <div class="card-front">
                    <div class="card-front__tp card-front__tp--city">
                      <i class="fas fa-handshake" style="font-size:40px;"></i>
                      <h3 style="color: white;">First Pair Paid</h3>
                      <br/>
                      <h3 style="color:white;"><?php echo config_item('currency') . round($first_pair_income,0); ?></h3>
                    </div>
                    <div class="card-front__bt">
                      <p style="color:#00b97c; font-size: 14px;" >View more </p>
                    </div>
                  </div>
                  <div class="card-back">
                    <video class="video__container" autoplay muted loop>
                      <source class="video__media" src="https://cdn.videvo.net/videvo_files/video/free/2013-08/small_watermarked/StockMarketChart9468Videvo_preview.webm" type="video/mp4">
                    </video>
                  </div>
                </div>
              </div>
              <div class="inside-page">
                <div class="inside-page__container">
                  <h5 class="inside-page__heading inside-page__heading--city" style="">
                    What is First Pair Paid?
                  </h5>
                  <p class="inside-page__text">
                    Income received from first pair.
                  </p>
                  <a class="btn btn-primary" href="<?php echo site_url('income/view-earning') ?>" style="color: white;">View Earnings</a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:68px;">
            <div class="card1">
              <div class="flip-card">
                <div class="flip-card__container">
                  <div class="card-front">
                    <div class="card-front__tp card-front__tp--city">
                      <i class="fas fa-coins" style="font-size:40px;"></i>
                      <h3 style="color: white;">Matching Paid</h3>
                      <br/>
                      <h3 style="color:white;"><?php echo config_item('currency') . round($matching_income,0); ?></h3>
                    </div>
                    <div class="card-front__bt">
                      <p style="color:#00b97c; font-size: 14px;" >View more </p>
                    </div>
                  </div>
                  <div class="card-back">
                    <video class="video__container" autoplay muted loop>
                      <source class="video__media" src="https://cdn.videvo.net/videvo_files/video/free/2013-08/small_watermarked/StockMarketChart9468Videvo_preview.webm" type="video/mp4">
                    </video>
                  </div>
                </div>
              </div>
              <div class="inside-page">
                <div class="inside-page__container">
                  <h5 class="inside-page__heading inside-page__heading--city" style="">
                    What is Matching Paid?
                  </h5>
                  <p class="inside-page__text">
                    Income from matching pairs.
                  </p>
                  <a class="btn btn-primary" href="<?php echo site_url('income/view-earning') ?>" style="color: white;">View Earnings</a>
                </div>
              </div>
            </div>
          </div>  

        <?php } ?>

        <?php if(config_item('enable_roi')=='Yes'){ ?>
          <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:70px;">
            <div class="card1">
              <div class="flip-card">
                <div class="flip-card__container">
                  <div class="card-front">
                    <div class="card-front__tp card-front__tp--city">
                      <i class="fas fa-coins" style="font-size:40px;"></i>
                      <h3 style="color: white;">ROI Paid</h3>
                      <br/>
                      <h3 style="color:white;"><?php echo config_item('currency') . round($roi,0); ?></h3>
                    </div>
                    <div class="card-front__bt">
                      <p style="color:#00b97c; font-size: 14px;" >View more </p>
                    </div>
                  </div>
                  <div class="card-back">
                    <video class="video__container" autoplay muted loop>
                      <source class="video__media" src="https://cdn.videvo.net/videvo_files/video/free/2018-07/small_watermarked/180607_A_072_preview.webm" type="video/mp4">
                    </video>
                  </div>
                </div>
              </div>
              <div class="inside-page">
                <div class="inside-page__container">
                  <h5 class="inside-page__heading inside-page__heading--city" style="">
                    What is ROI Paid?
                  </h5>
                  <p class="inside-page__text">
                    Income based on ROI.
                  </p>
                  <a class="btn btn-primary" href="<?php echo site_url('income/view-earning') ?>" style="color: white;">View Earnings</a>
                </div>
              </div>
            </div>
          </div>

        <?php } ?>
        <?php if($repurchase_deduct>0){ ?>
          <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:70px;">
            <div class="card1">
              <div class="flip-card">
                <div class="flip-card__container">
                  <div class="card-front">
                    <div class="card-front__tp card-front__tp--city">
                      <i class="fas fa-shopping-cart" style="font-size:40px;"></i>
                      <h3 style="color: white;">Shopping Wallet</h3>
                      <br/>
                      <h3 style="color:white;"><?php echo config_item('currency') . $shop_wallet; ?></h3>
                    </div>
                    <div class="card-front__bt">
                      <p style="color:#00b97c; font-size: 14px;" >View more </p>
                    </div>
                  </div>
                  <div class="card-back">
                    <video class="video__container" autoplay muted loop>
                      <source class="video__media" src="https://cdn.videvo.net/videvo_files/video/free/2018-12/small_watermarked/181217_01_Munich_11_preview.webm">
                    </video>
                  </div>
                </div>
              </div>
              <div class="inside-page">
                <div class="inside-page__container">
                  <h5 class="inside-page__heading inside-page__heading--city" style="">
                    What is Shopping Wallet?
                  </h5>
                  <p class="inside-page__text">
                    Funds that can be used for purchasing products.
                  </p>
                  <a class="btn btn-primary" style="color: white;">View Member</a>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        <?php if($renewal_amount > 0) { ?>
          <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:70px;">
            <div class="card1">
              <div class="flip-card">
                <div class="flip-card__container">
                  <div class="card-front">
                    <div class="card-front__tp card-front__tp--city">
                      <i class="fas fa-coins" style="font-size:40px;"></i>
                      <h3 style="color: white;">Renewals</h3>
                      <br/>
                      <h3 style="color:white;"><?php echo config_item('currency') . round($renewal_amount,0);?></h3>
                    </div>
                    <div class="card-front__bt">
                      <p style="color:#00b97c; font-size: 14px;" >View more </p>
                    </div>
                  </div>
                  <div class="card-back">
                    <video class="video__container" autoplay muted loop>
                      <source class="video__media" src="https://cdn.videvo.net/videvo_files/video/free/2021-02/small_watermarked/210210_02_Oxford_4k_028_preview.webm" type="video/mp4">
                    </video>
                  </div>
                </div>
              </div>
              <div class="inside-page">
                <div class="inside-page__container">
                  <h5 class="inside-page__heading inside-page__heading--city" style="">
                    What is Renewals?
                  </h5>
                  <p class="inside-page__text">
                    Total number of active and inactive people
                  </p>
                  <a class="btn btn-primary" style="color: white;">View Member</a>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        <?php if($target_income > 0 ) { ?>
          <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:70px;">
            <div class="card1">
              <div class="flip-card">
                <div class="flip-card__container">
                  <div class="card-front">
                    <div class="card-front__tp card-front__tp--city">
                      <i class="fas fa-coins" style="font-size:40px;"></i>
                      <h3 style="color: white;">Target Income</h3>
                      <br/>
                      <h3 style="color:white;"><?php echo config_item('currency') . round($target_income,0); ?></h3>
                    </div>
                    <div class="card-front__bt">
                      <p style="color:#00b97c; font-size: 14px;" >View more </p>
                    </div>
                  </div>
                  <div class="card-back">
                    <video class="video__container" autoplay muted loop>
                      <source class="video__media" src="https://cdn.videvo.net/videvo_files/video/free/2016-06/small_watermarked/160323_50_3BullsCloseup9_1080p_preview.webm" type="video/mp4">
                    </video>
                  </div>
                </div>
              </div>
              <div class="inside-page">
                <div class="inside-page__container">
                  <h5 class="inside-page__heading inside-page__heading--city" style="">
                    What is Target Income?
                  </h5>
                  <p class="inside-page__text">
                    Income based on target completion.
                  </p>
                  <a class="btn btn-primary" href="<?php echo site_url('income/view-earning') ?>" style="color: white;">View Earnings</a>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        <?php if (config_item('free_registration')=='Yes'){ ?>
          <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:70px;">
            <div class="card1">
              <div class="flip-card">
                <div class="flip-card__container">
                  <div class="card-front">
                    <div class="card-front__tp card-front__tp--city">
                      <i class="fas fa-users-cog" style="font-size:40px;"></i>
                      <h3 style="color: white;">Active Team</h3>
                      <br/>
                      <h3 style="color:white;"><?php echo $total_active; ?></h3>
                    </div>
                    <div class="card-front__bt">
                      <p style="color:#00b97c; font-size: 14px;" >View more </p>
                    </div>
                  </div>
                  <div class="card-back">
                    <video class="video__container" autoplay muted loop>
                      <source class="video__media" src="https://cdn.videvo.net/videvo_files/video/free/2020-04/small_watermarked/200314%20_Work%20Life_01_4k_012_preview.webm" type="video/mp4">
                    </video>
                  </div>
                </div>
              </div>
              <div class="inside-page">
                <div class="inside-page__container">
                  <h5 class="inside-page__heading inside-page__heading--city" style="">
                    What is Active Team?
                  </h5>
                  <p class="inside-page__text">
                    Total number of active people in your team.
                  </p>
                  <a class="btn btn-primary" href="<?php echo site_url('users/view-members') ?>" style="color: white;">View Members</a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:70px;">
            <div class="card1">
              <div class="flip-card">
                <div class="flip-card__container">
                  <div class="card-front">
                    <div class="card-front__tp card-front__tp--city">
                      <i class="fas fa-users-cog" style="font-size:40px;"></i>
                      <h3 style="color: white;">Inactive Team</h3>
                      <br/>
                      <h3 style="color:white;"><?php echo $total_inactive; ?></h3>
                    </div>
                    <div class="card-front__bt">
                      <p style="color:#00b97c; font-size: 14px;" >View more </p>
                    </div>
                  </div>
                  <div class="card-back">
                    <video class="video__container" autoplay muted loop>
                      <source class="video__media" src="https://cdn.videvo.net/videvo_files/video/free/2020-04/small_watermarked/200314%20_Work%20Life_01_4k_012_preview.webm" type="video/mp4">
                    </video>
                  </div>
                </div>
              </div>
              <div class="inside-page">
                <div class="inside-page__container">
                  <h5 class="inside-page__heading inside-page__heading--city" style="">
                    What is Inactive Team?
                  </h5>
                  <p class="inside-page__text">
                    Total number of inactive people in your team.
                  </p>
                  <a class="btn btn-primary" href="<?php echo site_url('users/activate_members') ?>" style="color: white;">View Members</a>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
          <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:70x;">
            <div class="card1">
              <div class="flip-card">
                <div class="flip-card__container">
                  <div class="card-front">
                    <div class="card-front__tp card-front__tp--city">
                      <i class="fas fa-coins" style="font-size:40px;"></i>
                      <h3 style="color: white;">Last Month Income</h3>
                      <br/>
                      <h3 style="color:white;"><?php echo config_item('currency') . round($earnings_last_month,0) ?></h3>
                    </div>
                    <div class="card-front__bt">
                      <p style="color:#00b97c; font-size: 14px;" >View more </p>
                    </div>
                  </div>
                  <div class="card-back">
                    <video class="video__container" autoplay muted loop>
                      <source class="video__media" src="https://cdn.videvo.net/videvo_files/video/free/2018-07/small_watermarked/180607_A_072_preview.webm" type="video/mp4">
                    </video>
                  </div>
                </div>
              </div>
              <div class="inside-page">
                <div class="inside-page__container">
                  <h5 class="inside-page__heading inside-page__heading--city" style="">
                    What is Last Month Income?
                  </h5>
                  <p class="inside-page__text">
                    Total income earned in last month.
                  </p>
                  <a class="btn btn-primary" href="<?php echo site_url('income/view_earning') ?>" style="color: white;">View Earnings</a>
                </div>
              </div>
            </div>
          </div>
    </div>
  
<?php } ?>
</div>
<?php 
$this->db->select('*')->where(array('type !=' =>'Repurchase'))->order_by('id', 'ASC');
$plan=$this->db->get('plans')->result_array();
?>

<div class="container pt-5 ml-5" >
    <div class="row">
        <div class="col-11" style="margin-left:-50px;">
            <div class="card shadow-lg">
                <div class="container px-3 pt-2">
                    <div class="card-head">
                        <h3><b>Package Overview</b></h3>
                    </div>
                    <div class="card-body"> 
                        <div class="row">
                            <div class="col-11" style="margin-left:-30px">
                                <?php foreach($packages as $d) { ?>
                                <li class="list-group-item b b-md m-b-sm clearfix">
                                    <div class="thumb m-r pull-left">
                                        <img class="img-circle" id="my-img" src="<?php echo $d['image'] ? base_url('axxets/' . $d['image']) : base_url('uploads/default.jpg'); ?>" alt="Platinum" title="Platinum" style="height: 50px;width: 50px;">
                                    </div>
                                    <a href="<?php echo site_url('users/search/'.$d['pid']) ?>"><span class="pull-right label text-base font-normal bg-dark text-white inline m-t"><?= $d['active_count'] ?> Members</span></a>
                                    <span></span>
                                    <div class="clear ">
                                        <div class="m-b-xs"><span><?php echo $d['plan_name']?></span><?php if(($d['type'] != 'Repurchase') && (!$this->db_model->select('id','payout',array('plan_id'=>$d['pid']))>0) && (config_item('crowdfund_type') != "Manual_Peer_to_Peer")){ ?>
                                          <span style="color: red;">&nbsp;(Payout not configured for this Plan. <a href="<?php echo site_url('setting/payout-setting') ?>">Click Here </a> To Update)</span>
                                        <?php } ?></div>
                                        <div class="">
                                          <span class="text-muted">
                                            <?php if(config_item('free_registration')=='Yes'){?>
                                              You have <?= $d['active_count']; ?> Active and <?= $d['inactive_count']; ?> Inactive Members in this Plan.
                                            <?php } else { ?>  
                                              You have <?php echo $d['active_count']; ?> Member in this plan.
                                            <?php } ?>
                                          </span>
                                        </div>
                                    </div>
                                </li>
                                <br>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>    
    </div>
</div>

<div class="container ml-5 pt-5">
  <div class="row">
    <div class="col-11"  style="margin-left:-50px;">
      <div class="card shadow-lg">
        <div class="card-header bg-primary text-white m-2">
            <h3><b>Latest Joinings</b></h3>
            <small>Here is the list of members who have joined recently</small>
        </div>
        <div class="card-body"> 
            <div class="table-responsive">
              <table class="table">
                <thead  class=" text-dark">
                  <tr>
                    <th>SN</th>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Sponsor ID</th>
                    <th>Plan Name</th>
                    <th>Phone</th>
                    <th>Join Date</th>
                    <!--<th>Total Downline</th>-->
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                <?php $sn = count($latest_members);
                    foreach ($latest_members as $e) { ?>
                        <tr>
                            <td class="text-dark"><?php echo $sn--; ?></td>
                            <td>
                                <a class="text-dark" href="<?php echo site_url('users/user_detail/' . $e['id']) ?>"
                                   target="_blank"><?php echo config_item('ID_EXT') . $e['id']; ?></a>
                            </td>
                            <td><?php echo $e['name']; ?></td>
                            <td>
                                <a class="text-dark" href="<?php echo site_url('users/user_detail/' . $e['sponsor']) ?>"
                                   target="_blank"><?php echo $e['sponsor'] ? config_item('ID_EXT') . $e['sponsor'] : ''; ?> </a>
                            </td>
                            <td><?php echo $this->db_model->select('plan_name', 'plans', array('id' => $e['signup_package'])); ?></td>
                            <td><?php echo $e['phone']; ?></td>
                            <td><?php echo date('Y-m-d h:i A', strtotime($e['join_time'])); ?></td>
                            <!--<td><?php echo($e['total_downline']); ?></td>-->
                            <td >
                              <div class="row">

                                <?php if($e['id'] == config_item('top_id')) { ?>
                                <div class="col-3">
                                <a href="<?php echo site_url('users/user_detail/' . $e['id']); ?>"
                                   class="btn btn-primary btn-xs" style="margin-bottom: 5px;">View</a></div>
                                <?php } else { ?>
                                  <div class="col-3">
                                  <a href="<?php echo site_url('users/user_detail/' . $e['id']); ?>"
                                     class="btn btn-primary btn-xs" style="margin-bottom: 5px;">View</a></div>
                                  <?php if(($e['status']=='Inactive') && (config_item('crowdfund_type') != 'Manual_Peer_to_Peer')){ ?>
                                    <div class="col-3" style="margin-left:28px">
                                    <a href="<?php echo site_url('users/activate/' . $e['id']); ?>"
                                          class="btn btn-success btn-xs" style="margin-bottom: 5px;">Activate</a></div>
                                  <?php } else { ?>
                                    <div class="col-3" style="margin-left:28px">
                                  <a href="<?php echo site_url('users/edit_user/' . $e['id']); ?>"
                                          class="btn btn-info btn-xs" style="margin-bottom: 5px;">Edit</a></div>
                                  <?php } ?>
                                <?php } ?>
                              </div> 
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
              </table>
            </div>
                           
        </div>    
      </div>    
    </div>
  </div>  
</div>

<?php
$this->db->select('plan_id')->from('level_wise_income')->group_by('plan_id')->order_by('plan_id', 'ASC');
$plans = $this->db->get()->result_array();
?>

<?php if(count($plans)>0) { ?>

  <div class="container ml-5 pt-5">
    <div class="row">
      <div class="col-11" style="margin-left:-50px;">
        <div class="card shadow-lg" style="background: radial-gradient(#60efbc, #58d5c9);">
          <div class="card-header bg-primary text-white m-2">
            <h3><b>Report</b></h3>
            <small>Here is the latest <?php echo $this->db_model->select('income_name', 'level_wise_income'); ?> report</p></small>
          </div>
          <div class="card-body"> 
            <?php foreach ($plans as $plan):
                        $this->db->select('*')->from('level_wise_income')->where(array('plan_id' => $plan['plan_id']))->order_by('level_no', 'ASC');
                        $inc = $this->db->get()->result();
                        $plan_name = $this->db_model->select('plan_name', 'plans', array('id' => $plan['plan_id']));
            ?>
            <div class="table-responsive">
              <table class="table table-hovered">
                <thead>
                  <tr style="font-weight: 800">
                    <th>Level #</th>
                    <th>Downline Required</th>
                    <th>Direct Required</th>
                    <th>Total Upgrade</th>
                    <th>Member Income</th>
                    <th>Admin Upgrade Income</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $si=1; foreach ($inc as $e): ?>
                  <tr>
                    <td><?php $si++; echo $e->level_no; ?></td>
                    <?php if($si==2) { ?>
                    <td><?php echo $e->total_member ?></td>
                    <td><?php echo $e->direct ?></td>
                    <?php } else { ?>
                    <td><?php echo '+'.$e->total_member ?></td>
                    <td><?php echo '+'.$e->direct ?></td>
                    <?php } ?>
                    <td>
                    <?php echo $this->db->query("
                    SELECT count(distinct userid) as count FROM earning 
                    WHERE type = '".$e->income_name."'
                    AND secret= ".$e->id)->result_array()[0]['count'];?></td>
                    <td><a = href="<?php echo site_url('income/view_level_achievers/0/'.$e->id); ?>"><?php echo $this->db_model->sum('amount', 'earning', array('type'=>$e->income_name,'secret'=>$e->id)); ?></a></td>
                    <td><a = href="<?php echo site_url('income/view_level_achievers/1/'.$e->id); ?>"><?php echo $this->db_model->sum('amount', 'earning', array('userid'=>'admin','type'=>'Level Upgrade Fee','secret'=>$e->id)); ?></a></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <?php endforeach; ?>
          </div>  
        </div>    
      </div>
    </div>  
  </div>

<?php } ?>

<?php
if(config_item('enable_club_income')=='Yes'){ ?>

  <div class="container ml-5 pt-5">
    <div class="row">
      <div class="col-9">
        <div class="card shadow-lg" style="background: radial-gradient(#60efbc, #58d5c9);">
          <div class="card-header bg-primary text-white m-2">
            <h3><b>Club Income</b></h3>
            <small>Here is the latest club incomes</p></small>
          </div>
          <div class="card-body"> 
            <div class="table-responsive">
              <table class="table table-hovered">
                <thead>
                  <tr style="font-weight: 800">
                    <th>SN.</th>
                    <th>Income Name</th>
                    <th>Total Amount</th>
                    <th>Total Achievers</th>
                    <th>Statement</th>
                  </tr>
                </thead>
                <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>4 Star Club Income</td>
                                                    <?php $amount = $this->db_model->sum('amount','earning', array('pair_names'=>'4 Star Club Income')); ?>
                                                    <td><?php echo config_item('currency') .$amount ?></td>
                                                    <?php if($amount>0) { ?>
                                                    <td>
                                                      <?php echo $this->db->query("
                                                       SELECT count(distinct userid) as count FROM earning
                                                       WHERE pair_names = '4 Star Club Income'")->result_array()[0]['count']; ?>
                                                    </td>
                                                    <td>
                                                      <a href="<?php echo site_url('income/search/All/4 star club income') ?>" class="btn btn-success">View</a>
                                                    </td>
                                                    <?php } else { ?>
                                                    <td>0</td>
                                                    <td><a href="#" class="btn btn-danger">No Earnings</a></td>
                                                      <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>16 Star Club Income</td>
                                                    <?php $amount = $this->db_model->sum('amount','earning', array('pair_names'=>'16 Star Club Income')); ?>
                                                    <td><?php echo config_item('currency') .$amount ?></td>
                                                    <?php if($amount>0) { ?>
                                                    <td>
                                                      <?php echo $this->db->query("
                                                       SELECT count(distinct userid) as count FROM earning
                                                       WHERE pair_names = '16 Star Club Income'")->result_array()[0]['count']; ?>
                                                    </td>
                                                    <td>
                                                      <a href="<?php echo site_url('income/search/All/16 star club income') ?>" class="btn btn-success">View</a>
                                                    </td>
                                                    <?php } else { ?>
                                                    <td>0</td>
                                                    <td><a href="#" class="btn btn-danger">No Earnings</a></td>
                                                      <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>64 Star Club Income</td>
                                                    <?php $amount = $this->db_model->sum('amount','earning', array('pair_names'=>'64 Star Club Income')); ?>
                                                    <td><?php echo config_item('currency') .$amount ?></td>
                                                    <?php if($amount>0) { ?>
                                                    <td>
                                                      <?php echo $this->db->query("
                                                       SELECT count(distinct userid) as count FROM earning
                                                       WHERE pair_names = '64 Star Club Income'")->result_array()[0]['count']; ?>
                                                    </td>
                                                    <td>
                                                      <a href="<?php echo site_url('income/search/All/64 star club income') ?>" class="btn btn-success">View</a>
                                                    </td>
                                                    <?php } else { ?>
                                                    <td>0</td>
                                                    <td><a href="#" class="btn btn-danger">No Earnings</a></td>
                                                      <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>256 Star Club Income</td>
                                                    <?php $amount = $this->db_model->sum('amount','earning', array('pair_names'=>'256 Star Club Income')); ?>
                                                    <td><?php echo config_item('currency') .$amount ?></td>
                                                    <?php if($amount>0) { ?>
                                                    <td>
                                                      <?php echo $this->db->query("
                                                       SELECT count(distinct userid) as count FROM earning
                                                       WHERE pair_names = '256 Star Club Income'")->result_array()[0]['count']; ?>
                                                    </td>
                                                    <td>
                                                      <a href="<?php echo site_url('income/search/All/256 star club income') ?>" class="btn btn-success">View</a>
                                                    </td>
                                                    <?php } else { ?>
                                                    <td>0</td>
                                                    <td><a href="#" class="btn btn-danger">No Earnings</a></td>
                                                      <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>1024 Star Club Income</td>
                                                    <?php $amount = $this->db_model->sum('amount','earning', array('pair_names'=>'1024 Star Club Income')); ?>
                                                    <td><?php echo config_item('currency') .$amount ?></td>
                                                    <?php if($amount>0) { ?>
                                                    <td>
                                                      <?php echo $this->db->query("
                                                       SELECT count(distinct userid) as count FROM earning
                                                       WHERE pair_names = '1024 Star Club Income'")->result_array()[0]['count']; ?>
                                                    </td>
                                                    <td>
                                                      <a href="<?php echo site_url('income/search/All/1024 star club income') ?>" class="btn btn-success">View</a>
                                                    </td>
                                                    <?php } else { ?>
                                                    <td>0</td>
                                                    <td><a href="#" class="btn btn-danger">No Earnings</a></td>
                                                      <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>6</td>
                                                    <td>4096 Star Club Income</td>
                                                    <?php $amount = $this->db_model->sum('amount','earning', array('pair_names'=>'4096 Star Club Income')); ?>
                                                    <td><?php echo config_item('currency') .$amount ?></td>
                                                    <?php if($amount>0) { ?>
                                                    <td>
                                                      <?php echo $this->db->query("
                                                       SELECT count(distinct userid) as count FROM earning
                                                       WHERE pair_names = '4096 Star Club Income'")->result_array()[0]['count']; ?>
                                                    </td>
                                                    <td>
                                                      <a href="<?php echo site_url('income/search/All/4096 star club income') ?>" class="btn btn-success">View</a>
                                                    </td>
                                                    <?php } else { ?>
                                                    <td>0</td>
                                                    <td><a href="#" class="btn btn-danger">No Earnings</a></td>
                                                      <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>7</td>
                                                    <td>16,384 Star Club Income</td>
                                                    <?php $amount = $this->db_model->sum('amount','earning', array('pair_names'=>'16384 Star Club Income')); ?>
                                                    <td><?php echo config_item('currency') .$amount ?></td>
                                                    <?php if($amount>0) { ?>
                                                    <td>
                                                      <?php echo $this->db->query("
                                                       SELECT count(distinct userid) as count FROM earning
                                                       WHERE pair_names = '16384 Star Club Income'")->result_array()[0]['count']; ?>
                                                    </td>
                                                    <td>
                                                      <a href="<?php echo site_url('income/search/All/16384 star club income') ?>" class="btn btn-success">View</a>
                                                    </td>
                                                    <?php } else { ?>
                                                    <td>0</td>
                                                    <td><a href="#" class="btn btn-danger">No Earnings</a></td>
                                                      <?php } ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
          </div>  
        </div>    
      </div>
    </div>  
  </div>

  
<?php } ?>

<?php
if(config_item('enable_group_income')=='Yes'){ ?>

  <div class="container ml-5 pt-5">
    <div class="row">
      <div class="col-9">
        <div class="card shadow-lg" style="background: radial-gradient(#60efbc, #58d5c9);">
          <div class="card-header bg-primary text-white m-2">
            <h3><b>Group Income</b></h3>
            <small>Here is the latest Group Income</p></small>
          </div>
          <div class="card-body"> 
            <div class="table-responsive">
                                          <table class="table table-hovered">
                                            <thead>
                                            <tr style="font-weight: 800">
                                                <th>SN.</th>
                                                <th>Income Name</th>                                                
                                                <th>Total Amount</th>
                                                <th>Statement</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Education Fund</td>
                                                    <?php $amount = $this->db_model->sum('amount','earning', array('pair_names'=>'Education Fund')); ?>
                                                    <td><?php echo config_item('currency') .$amount ?></td>
                                                    <td>
                                                      <?php if($amount>0) { ?>
                                                      <a href="<?php echo site_url('income/search/All/Education Fund') ?>" class="btn btn-success">View</a>
                                                      <?php } else { ?>
                                                      <a href="#" class="btn btn-danger">No Earnings</a>
                                                      <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Tour Fund</td>
                                                    <?php $amount = $this->db_model->sum('amount','earning', array( 'pair_names'=>'Tour Fund')); ?>
                                                    <td><?php echo config_item('currency') .$amount ?></td>
                                                    <td>
                                                      <?php if($amount>0) { ?>
                                                      <a href="<?php echo site_url('income/search/All/Tour Fund') ?>" class="btn btn-success">View</a>
                                                      <?php } else { ?>
                                                      <a href="#" class="btn btn-danger">No Earnings</a>
                                                      <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Royalty Fund</td>
                                                    <?php $amount = $this->db_model->sum('amount','earning', array( 'pair_names'=>'Royalty Fund')); ?>
                                                    <td><?php echo config_item('currency') .$amount ?></td>
                                                    <td>
                                                      <?php if($amount>0) { ?>
                                                      <a href="<?php echo site_url('income/search/All/Royalty Fund') ?>" class="btn btn-success">View</a>
                                                      <?php } else { ?>
                                                      <a href="#" class="btn btn-danger">No Earnings</a>
                                                      <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>Car Fund</td>
                                                    <?php $amount = $this->db_model->sum('amount','earning', array( 'pair_names'=>'Car Fund')); ?>
                                                    <td><?php echo config_item('currency') .$amount ?></td>
                                                    <td>
                                                      <?php if($amount>0) { ?>
                                                      <a href="<?php echo site_url('income/search/All/Car Fund') ?>" class="btn btn-success">View</a>
                                                      <?php } else { ?>
                                                      <a href="#" class="btn btn-danger">No Earnings</a>
                                                      <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>Home Fund</td>
                                                    <?php $amount = $this->db_model->sum('amount','earning', array( 'pair_names'=>'Home Fund')); ?>
                                                    <td><?php echo config_item('currency') .$amount ?></td>
                                                    <td>
                                                      <?php if($amount>0) { ?>
                                                      <a href="<?php echo site_url('income/search/All/Home Fund') ?>" class="btn btn-success">View</a>
                                                      <?php } else { ?>
                                                      <a href="#" class="btn btn-danger">No Earnings</a>
                                                      <?php } ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
          </div>  
        </div>    
      </div>
    </div>  
  </div>
<?php } ?>

<div class="row" style="display: none;">
    <div class="col-md-4 col-lg-offset-1">
      <div class="card card-chart">
        <div class="card-header card-header-success">
          <div class="ct-chart" id="dailySalesChart"></div>
        </div>
        <div class="card-body">
          <h4 class="card-title">Daily Enrollment</h4>
          <!--
          <p class="card-category">
            <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.</p>
        -->
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons">access_time</i> updated 4 minutes ago
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4 col-lg-offset-1">
      <div class="card card-chart">
        <div class="card-header card-header-warning">
          <div class="ct-chart" id="websiteViewsChart"></div>
        </div>
        <div class="card-body">
          <h4 class="card-title">Email Subscriptions</h4>
          <!--
          <p class="card-category">Last Campaign Performance</p> -->
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons">access_time</i> campaign sent 2 days ago
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4" style="display: none;">
      <div class="card card-chart">
        <div class="card-header card-header-danger">
          <div class="ct-chart" id="completedTasksChart"></div>
        </div>
        <div class="card-body">
          <h4 class="card-title">Completed Tasks</h4>
          <p class="card-category">Last Campaign Performance</p>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons">access_time</i> campaign sent 2 days ago
          </div>
        </div>
      </div>
    </div>
</div>
</div>
</div>


