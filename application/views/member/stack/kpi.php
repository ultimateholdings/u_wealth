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
body{
  overflow-x: hidden;
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
  background: #74ebd5;  
background: -webkit-linear-gradient(to right, #ACB6E5, #74ebd5);  
background: linear-gradient(to right, #ACB6E5, #74ebd5); 


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

<?php if(config_item('crowdfund_type') == "Manual_Peer_to_Peer"){ ?>
        <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:68px;">
            <div class="card1">
              <div class="flip-card">
                <div class="flip-card__container">
                  <div class="card-front">
                    <div class="card-front__tp card-front__tp--city">
                      <i class="fas fa-people-carry" style="font-size:40px;"></i>
                      <h3 style="color: white;">Total Team</h3>
                      <br/>
                      <h3 style="color:white;"><?php echo $member_data['member']->total_downline; ?></h3>
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
                    Total number of active and inactive people joined to the business.
                  </p>
                  <a class="btn btn-primary" href="<?php echo site_url('tree/my-tree') ?>" style="color: white;">View Tree</a>
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
                      <h3 style="color: white;">Direct Team</h3>
                      <br/>
                      <h3 style="color:white;"><?php echo $member_data['direct_team']; ?></h3>
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
                    What is Direct Team?
                  </h5>
                  <p class="inside-page__text">
                    Number of people referred by you.
                  </p>
                  <a class="btn btn-primary" href="<?php echo site_url('tree/directlist') ?>" style="color: white;">View Direct</a>
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
                      <h3 style="color: white;">Total Earned</h3>
                      <br/>
                      <h3 style="color:white;"><?php echo config_item('currency') . $member_data['total_earned']; ?></h3>
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
                    What is Total Earned?
                  </h5>
                  <p class="inside-page__text">
                    Total amount earned from earnings.
                  </p>
                  <a class="btn btn-primary" href="<?php echo site_url('member/view-earning') ?>" style="color: white;">View Earnings</a>
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
                      <i class="fas fa-recycle" style="font-size:40px;"></i>
                      <h3 style="color: white;">Current Cycle</h3>
                      <br/>
                      <h3 style="color:white;"><?php echo $member_data['member']->gift_level; ?></h3>
                    </div>
                    <div class="card-front__bt">
                      <p style="color:#00b97c; font-size: 14px;" >View more </p>
                    </div>
                  </div>
                  <div class="card-back">
                    <video class="video__container" autoplay muted loop>
                      <source class="video__media" src="https://cdn.videvo.net/videvo_files/video/free/2015-09/small_watermarked/bikesilouhette_preview.webm" type="video/mp4">
                    </video>
                  </div>
                </div>
              </div>
              <div class="inside-page">
                <div class="inside-page__container">
                  <h5 class="inside-page__heading inside-page__heading--city" style="">
                    What is current cycle ?
                  </h5>
                  <p class="inside-page__text">
                    The current cycle in which you are.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>   

<?php } else { ?>
<?php if(config_item('width') == '2' ) { ?>
    <?php if(config_item('enable_pv')=='Yes') { ?>
        <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:68px;">
            <div class="card1">
              <div class="flip-card">
                <div class="flip-card__container">
                  <div class="card-front">
                    <div class="card-front__tp card-front__tp--city">
                      <i class="fas fa-hand-point-left" style="font-size:40px;"></i>
                      <h3 style="color: white;">Left PV</h3>
                      <br/>
                      <h3 style="color:white;"><?php  echo $member_data['member']->total_a_pv; ?></h3>
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
                    Total number of active PV on left leg
                  </p>
                  <a class="btn btn-primary" href="<?php echo site_url('tree/my-tree') ?>" style="color: white;">View PV</a>
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
                      <h3 style="color: white;">Right PV</h3>
                      <br/>
                      <h3 style="color:white;"><?php  echo $member_data['member']->total_b_pv; ?></h3>
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
                    Total number of active PV on right leg.
                  </p>
                  <a class="btn btn-primary" href="<?php echo site_url('tree/my-tree') ?>" style="color: white;">View PV</a>
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
                      <i class="fas fa-business-time" style="font-size:40px;"></i>
                      <h3 style="color: white;">MyPV</h3>
                      <br/>
                      <h3 style="color:white;"><?php echo $member_data['member']->mypv; ?></h3>
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
                    What is My PV?
                  </h5>
                  <p class="inside-page__text">
                    Total PV on my right and left leg.
                  </p>
                   <a class="btn btn-primary" href="<?php echo site_url('member/view-pv') ?>" style="color: white;">View PV</a>
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
                      <h3 style="color: white;">Left Count</h3>
                      <br/>
                      <h3 style="color:white;"><?php echo $member_data['member']->total_a; ?></h3>
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
                    Total number of active people on left leg
                  </p>
                  <a class="btn btn-primary" href="<?php echo site_url('tree/my-tree') ?>" style="color: white;">View Tree</a>
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
                      <h3 style="color: white;">Right Count</h3>
                      <br/>
                      <h3 style="color:white;"><?php echo $member_data['member']->total_b; ?></h3>
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
                    Total number of active people on right leg.
                  </p>
                  <a class="btn btn-primary" href="<?php echo site_url('tree/my-tree') ?>" style="color: white;">View Tree</a>
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
                      <h3 style="color: white;">Today's Pairs</h3>
                      <br/>
                      <h3 style="color:white;"><?php echo $member_data['today_pairs']; ?></h3>
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
                    What is Today's Pairs?
                  </h5>
                  <p class="inside-page__text">
                    Total number of pairs formed in your downline today.
                  </p>
                </div>
              </div>
            </div>
        </div>

    <?php } ?>

        <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:68px;">
            <div class="card1">
              <div class="flip-card">
                <div class="flip-card__container">
                  <div class="card-front">
                    <div class="card-front__tp card-front__tp--city">
                      <i class="fas fa-coins" style="font-size:40px;"></i>
                      <h3 style="color: white;">Total Earned</h3>
                      <br/>
                      <h3 style="color:white;"><?php echo config_item('currency') . $member_data['total_earned']; ?></h3>
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
                    What is Total Earned?
                  </h5>
                  <p class="inside-page__text">
                    Total amount earned from earnings.
                  </p>
                  <a class="btn btn-primary" href="<?php echo site_url('member/view-earning') ?>" style="color: white;">View Earnings</a>
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
                                <h3 style="color: white;">Referral Income</h3>
                                <br/>
                                <h3 style="color:white;"><?php echo config_item('currency') . $member_data['referral_income']; ?></h3>
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
                        <h5 class="inside-page__heading inside-page__heading--city" style="">What is Referral Income ?</h5>
                        <p class="inside-page__text">Total amount that is earned by referring to people.</p>
                        <a class="btn btn-primary" href="<?php echo site_url('member/view-earning') ?>" style="color: white;">View Earnings</a>
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
                                <h3 style="color: white;">Wallet Balance</h3>
                                <br/>
                                <h3 style="color:white;"><?php echo config_item('currency').$member_data['wallet_balance'];?></h3>
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
                        <h5 class="inside-page__heading inside-page__heading--city" style="">What is wallet Balance</h5>
                        <p class="inside-page__text">It can be used for upgrade, purchase or withdrawn at any time.</p>
                        <a class="btn btn-primary" href="<?php echo site_url('member/view-earning') ?>" style="color: white;">View wallet</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:68px;" style="margin-right:70px;">
            <div class="card1">
                <div class="flip-card">
                    <div class="flip-card__container">
                        <div class="card-front">
                            <div class="card-front__tp card-front__tp--city">
                                <i class="fas fa-money-check" style="font-size:40px;"></i>
                                <h3 style="color: white;">Paid Payout</h3>
                                <br/>
                                <h3 style="color:white;"><?php echo config_item('currency') . $member_data['paid_payout']; ?></h3>
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
                        <h5 class="inside-page__heading inside-page__heading--city" style="">What is Paid Payout?
                        </h5>
                        <p class="inside-page__text">The funds that have been deposited in your bank account.</p>
                         <a class="btn btn-primary" href="<?php echo site_url('wallet/withdrawal-list') ?>" style="color: white;">Paid payout</a>
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
                                <h3 style="color: white;">Pending Payout</h3>
                                <br/>
                                <h3 style="color:white;"><?php echo config_item('currency') . $member_data['pending_payout']; ?></h3>
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
                        <h5 class="inside-page__heading inside-page__heading--city" style="">What is Pending Payout?
                        </h5>
                        <p class="inside-page__text">The funds that are on the way to your bank account.</p>
                        <a class="btn btn-primary" href="<?php echo site_url('wallet/withdrawal-list') ?>" style="color: white;">Pending Payout</a>
                    </div>
                </div>
            </div>
        </div>


<?php } else { ?>
<?php if(config_item('width') == '1') { ?>
          <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:68px;">
            <div class="card1">
              <div class="flip-card">
                <div class="flip-card__container">
                  <div class="card-front">
                    <div class="card-front__tp card-front__tp--city">
                      <i class="fas fa-people-carry" style="font-size:40px;"></i>
                      <h3 style="color: white;">Total Team</h3>
                      <br/>
                      <h3 style="color:white;">
                      <?php
                         $total_dc = $this->db_model->sum('direct', 'level_wise_income', array('level_no <=' => $member_data['member']->gift_level+1));
                         $prev_total = $this->db_model->sum('total_member', 'level_wise_income', array('level_no <=' => $member_data['member']->gift_level));
                         $prev_total = $prev_total > 0 ? $prev_total : 0;
                         if($direct_team >= $total_dc) {
                         echo $member_data['member']->total_downline; } else {
                            echo $prev_total;
                      } ?>
                      </h3>
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
                  <a class="btn btn-primary" href="<?php echo site_url('tree/my-tree') ?>" style="color: white;">View Member</a>
                </div>
              </div>
            </div>
          </div>

    <?php } else if($member_data['pd']->auto_pool=='Yes'){ ?>
        <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:70px;">
            <div class="card1">
              <div class="flip-card">
                <div class="flip-card__container">
                  <div class="card-front">
                    <div class="card-front__tp card-front__tp--city">
                      <i class="fas fa-users" style="font-size:40px;"></i>
                      <h3 style="color: white;">Total Downline</h3>
                      <br/>
                      <h3 style="color:white;">
                      <?php echo $member_data['level_details']->total_downline; ?>
                      </h3>
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
                    What is Total Downline?
                  </h5>
                  <p class="inside-page__text">
                    Total number of active and inactive people joined to the business
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
                      <i class="fas fa-people-carry" style="font-size:40px;"></i>
                      <h3 style="color: white;">Total Team</h3>
                      <br/>
                      <h3 style="color:white;"><?php echo $member_data['level_details']->total_downline; ?></h3>
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
                  <a class="btn btn-primary" href="<?php echo site_url('tree/my-tree') ?>" style="color: white;">View Member</a>
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
                      <i class="fas fa-users" style="font-size:40px;"></i>
                      <h3 style="color: white;">Direct Team</h3>
                      <br/>
                      <h3 style="color:white;"><?php echo $member_data['direct_team']; ?></h3>
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
                    What is Direct Team?
                  </h5>
                  <p class="inside-page__text">
                    Total number of active and inactive people joined to the business
                  </p>
                  <a class="btn btn-primary" href="<?php echo site_url('tree/directlist') ?>" style="color: white;">View Direct</a>
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
                      <h3 style="color: white;">Total Earned</h3>
                      <br/>
                      <h3 style="color:white;"><?php echo config_item('currency') . $member_data['total_earned']; ?></h3>
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
                    What is Total Earned?
                  </h5>
                  <p class="inside-page__text">
                    Total amount earned from earnings.
                  </p>
                  <a class="btn btn-primary" href="<?php echo site_url('member/view-earning') ?>" style="color: white;">View Earnings</a>
                </div>
              </div>
            </div>
        </div>

    <?php if(config_item('enable_pv')=='Yes') { ?>
        <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:68px;">
            <div class="card1">
              <div class="flip-card">
                <div class="flip-card__container">
                  <div class="card-front">
                    <div class="card-front__tp card-front__tp--city">
                      <i class="fas fa-business-time" style="font-size:40px;"></i>
                      <h3 style="color: white;">My PV</h3>
                      <br/>
                      <h3 style="color:white;"><?php echo $member_data['member']->mypv; ?></h3>
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
                    What is My PV?
                  </h5>
                  <p class="inside-page__text">
                    Total PV on my right and left leg.
                  </p>
                   <a class="btn btn-primary" href="<?php echo site_url('member/view-pv') ?>" style="color: white;">View PV</a>
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
                      <i class="fas fa-business-time" style="font-size:40px;"></i>
                      <h3 style="color: white;">Downline PV</h3>
                      <br/>
                      <h3 style="color:white;"><?php  echo $member_data['member']->downline_pv; ?></h3>
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
                    What is Downline PV?
                  </h5>
                  <p class="inside-page__text">
                    Total number of PV from left and right leg.
                  </p>
                  <a class="btn btn-primary" href="<?php echo site_url('tree/my-tree') ?>" style="color: white;">View PV</a>
                </div>
              </div>
            </div>
        </div>

    <?php } else { ?>
    <?php if(config_item('enable_crowdfund')=='Yes') { ?>
        <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:68px;">
            <div class="card1">
              <div class="flip-card">
                <div class="flip-card__container">
                  <div class="card-front">
                    <div class="card-front__tp card-front__tp--city">
                      <i class="fas fa-coins" style="font-size:40px;"></i>
                      <h3 style="color: white;">Latest Income</h3>
                      <br/>
                      <h3 style="color:white;">
                        <?php
                        $this->db->select('amount, ref_id')->from('earning')->where(array('userid'=> $this->session->user_id,))->order_by('id', 'DESC')->limit(1);
                        $data = $this->db->get()->result_array();
                        if ($data[0]['amount'] == "") {
                            echo config_item('currency') . '0';
                        } else {
                            echo config_item('currency') . $data[0]['amount'];
                        } ?>
                            
                        </h3>
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
                    What is Latest Income?
                  </h5>
                  <p class="inside-page__text">
                    Latest earning received
                  </p>
                  <a class="btn btn-primary" href="<?php echo site_url('member/view-earning') ?>" style="color: white;">View Earnings</a>
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
                                <i class="fas fa-people-arrows" style="font-size:40px;"></i>
                                <h3 style="color: white;">Referral Income</h3>
                                <br/>
                                <h3 style="color:white;"><?php echo config_item('currency') . $member_data['referral_income']; ?></h3>
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
                        <h5 class="inside-page__heading inside-page__heading--city" style="">What is Referral Income ?</h5>
                        <p class="inside-page__text">Total amount that is earned by referring to people.</p>
                        <a class="btn btn-primary" href="<?php echo site_url('member/view-earning') ?>" style="color: white;">View Earnings</a>
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
                                <i class="fas fa-coins" style="font-size:40px;"></i>
                                <h3 style="color: white;">Level Income</h3>
                                <br/>
                                <h3 style="color:white;"><?php echo config_item('currency') . $member_data['level_income']; ?></h3>
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
                        <h5 class="inside-page__heading inside-page__heading--city" style="">What is Level Income ?</h5>
                        <p class="inside-page__text">Income received after completing levels.</p>
                        <a class="btn btn-primary" href="<?php echo site_url('member/view-earning') ?>" style="color: white;">View Earnings</a>
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
                                <i class="fas fa-wallet" style="font-size:40px;"></i>
                                <h3 style="color: white;">Wallet Balance</h3>
                                <br/>
                                <h3 style="color:white;"><?php echo config_item('currency').$member_data['wallet_balance'];?></h3>
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
                        <h5 class="inside-page__heading inside-page__heading--city" style="">What is wallet Balance</h5>
                        <p class="inside-page__text">It can be used for upgrade, purchase or withdrawn at any time.</p>
                        <a class="btn btn-primary" href="<?php echo site_url('member/view-earning') ?>" style="color: white;">View wallet</a> 
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
                                <h3 style="color:white;"><?php echo config_item('currency') . $member_data['paid_payout']; ?></h3>
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
                        <h5 class="inside-page__heading inside-page__heading--city" style="">What is Paid Payout?
                        </h5>
                        <p class="inside-page__text">The funds that have been deposited in your bank account.</p>
                         <a class="btn btn-primary" href="<?php echo site_url('wallet/withdrawal-list') ?>" style="color: white;">Paid payout</a>
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
                                <h3 style="color: white;">Pending Payout</h3>
                                <br/>
                                <h3 style="color:white;"><?php echo config_item('currency') . $member_data['pending_payout']; ?></h3>
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
                        <h5 class="inside-page__heading inside-page__heading--city" style="">What is Pending Payout?
                        </h5>
                        <p class="inside-page__text">The funds that are on the way to your bank account.</p>
                        <a class="btn btn-primary" href="<?php echo site_url('wallet/withdrawal-list') ?>" style="color: white;">Pending Payout</a>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>
<?php } ?>
<?php if(config_item('extend_kpi')=='Yes'){ ?>
        <?php if(config_item('width')==2) { ?>
            <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:68px;">
                <div class="card1">
                    <div class="flip-card">
                        <div class="flip-card__container">
                            <div class="card-front">
                                <div class="card-front__tp card-front__tp--city">
                                    <i class="fas fa-hand-point-left" style="font-size:40px;"></i>
                                    <h3 style="color: white;">Direct Left</h3>
                                    <br/>
                                    <h3 style="color:white;"><?php echo $member_data['direct_left']; ?></h3>
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
                            <h5 class="inside-page__heading inside-page__heading--city" style="">What is Direct Left?
                            </h5>
                            <p class="inside-page__text">Total direct people on left leg.</p>
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
                                    <h3 style="color: white;">Direct Right</h3>
                                    <br/>
                                    <h3 style="color:white;"><?php echo $member_data['direct_right']; ?></h3>
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
                            <h5 class="inside-page__heading inside-page__heading--city" style="">What is Direct Right?
                            </h5>
                            <p class="inside-page__text">Total direct people on right leg.</p>
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
                                    <h3 style="color: white;">Matching</h3>
                                    <br/>
                                    <h3 style="color:white;"><?php echo config_item('currency') . $member_data['matching_income']; ?></h3>
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
                            <h5 class="inside-page__heading inside-page__heading--city" style="">What is Matching?
                            </h5>
                            <p class="inside-page__text">Total income from matching pairs.</p>
                            <a class="btn btn-primary" href="<?php echo site_url('member/view-earning') ?>" style="color: white;">View Earnings</a>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>
        <?php if($member_data['payout']->repurchase_deduct>0){ ?>
            <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:70px;">
                <div class="card1">
                    <div class="flip-card">
                        <div class="flip-card__container">
                            <div class="card-front">
                                <div class="card-front__tp card-front__tp--city">
                                    <i class="fas fa-shopping-cart" style="font-size:40px;"></i>
                                    <h3 style="color: white;">Shopping Wallet</h3>
                                    <br/>
                                    <h3 style="color:white;"><?php echo config_item('currency') . $this->db_model->select('balance', 'other_wallet', array('userid' => $this->session->user_id, 'type'=>'Repurchase'));; ?></h3>
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
                            <h5 class="inside-page__heading inside-page__heading--city" style="">What is Shopping Wallet?
                            </h5>
                            <p class="inside-page__text">Funds that can be used for purchasing products.</p>
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
                                    <i class="fas fa-people-arrows" style="font-size:40px;"></i>
                                    <h3 style="color: white;">Active Referral</h3>
                                    <br/>
                                    <h3 style="color:white;"><?php echo $member_data['active_team']; ?></h3>
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
                            <h5 class="inside-page__heading inside-page__heading--city" style="">What is Active Referral?
                            </h5>
                            <p class="inside-page__text">Total Active people referred by me.</p>
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
                                    <h3 style="color: white;">Inactive Referral</h3>
                                    <br/>
                                    <h3 style="color:white;"><?php echo $member_data['direct_team']-$member_data['active_team']; ?></h3>
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
                            <h5 class="inside-page__heading inside-page__heading--city" style="">What is Inactive Referral?
                            </h5>
                            <p class="inside-page__text">Total Inactive people referred by me.</p>
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
                                    <h3 style="color: white;">Potent Income</h3>
                                    <br/>
                                    <h3 style="color:white;"><?php echo $member_data['potential_earnings']; ?></h3>
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
                            <h5 class="inside-page__heading inside-page__heading--city" style="">What is Potent Income?
                            </h5>
                            <p class="inside-page__text">Total money you earned as potent income.</p>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>
        <?php if(config_item('enable_group_income')=='Yes'){ ?>
            <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:70px;">
                <div class="card1">
                    <div class="flip-card">
                        <div class="flip-card__container">
                            <div class="card-front">
                                <div class="card-front__tp card-front__tp--city">
                                    <i class="fas fa-user-plus" style="font-size:40px;"></i>
                                    <h3 style="color: white;">Active Points</h3>
                                    <br/>
                                    <h3 style="color:white;"><?php echo floor($member->mypv/6000); ?></h3>
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
                            <h5 class="inside-page__heading inside-page__heading--city" style="">What is Active Points?
                            </h5>
                            <p class="inside-page__text">Total active points you earned.</p>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>
        <?php if(config_item('same_tree')=='Yes'){ ?>
            <div class="col-lg-3 col-md-6 col-sm-6 mt-2" style="margin-right:70px;">
                <div class="card1">
                    <div class="flip-card">
                        <div class="flip-card__container">
                            <div class="card-front">
                                <div class="card-front__tp card-front__tp--city">
                                    <i class="fas fa-coins" style="font-size:40px;"></i>
                                    <h3 style="color: white;">Further Earned</h3>
                                    <br/>
                                    <h3 style="color:white;"><?php echo config_item('currency') . $member_data['Further_earned']; ?></h3>
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
                            <h5 class="inside-page__heading inside-page__heading--city" style="">What is Further Earned?
                            </h5>
                            <p class="inside-page__text">Total amount that is pending to pay.</p>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
<?php } ?>


