<style type="text/css">
    li {
        font-size: 16px;
    }
    #firstWord:first-letter
    { 
    text-transform: uppercase;
    font-size:120%;
    color:#2DAB8B;
    }
    .company{ 
    text-transform: uppercase;
    font-size:100%;
    color:#2DAB8B;
    }

</style>
<script src="<?php echo base_url('axxets/base/js/jquery_v3.2.1.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('axxets/base/js/bootstrap_v3.3.7.min.js') ?>" type="text/javascript"></script>

<script type="text/javascript">
$("#firstWord").html(function(){
  var text= $(this).text().trim().split(" ");
  var first = text.shift();
  return (text.length > 0 ? "<span class='green'>"+ first + "</span> " : first) + text.join(" ");
});
</script>


<div class="container">
    <div class="row"  style="margin-top: 3%;margin-bottom: 15%;">
        <div class="container" role="main">
    <h1>Terms and Conditions</h1>
    
    <!-- Breadcrumbs ----------------------------------------------------------->
    <hr>
    <ol style="text-transform: lowercase;">
          <li id="firstWord">Register with voluntary interest after reading and agreeing the terms and conditions carefully .</li>
          <li id="firstWord">YOU MUST BE 18 YEAR OLD OR ABOVE.</li>
          <li id="firstWord">YOU MUST PROVIDE FOLLOWING DOCUMENTS :
                <ul>
                    <li>VALID MOBILE NUMBER</li>
                    <li>VALID EMAIL ID</li>
                </ul>
          </li>
          <li id="firstWord">ONE CAN OPEN UNIQUE ACCOUNT for promotional activites WITH UNIQUE NAME AND PAN.</li>
          <li id="firstWord"><strong><span class="company"><span class="company"><?php echo config_item('company_name'); ?></span></span></strong> IS NOT LIABLE TO PAY ANY OVERDUE INTERESTS FOR DELAY IN PAYMENTS.</li>
          <li id="firstWord">A person has to understands that he can do independent promotional activites and he is not an employee, agent, legal representative of <strong><span class="company"><?php echo config_item('company_name'); ?></span></strong>. User further agree and understand that you have no authority to incur any debt, expense or obligation on behalf of, for, or in the name of <strong><span class="company"><?php echo config_item('company_name'); ?></span></strong>.</li>
          <li id="firstWord">ALL PAYOUTS MENTIONED IN <strong><span class="company"><?php echo config_item('company_name'); ?></span></strong> USER ACCOUNT  ARE INCLUSIVE OF ALL TAXES.</li>
          <li id="firstWord">USER  ARE REQUESTED TO SUBMIT A COPY OF THEIR PAN CARD TO BE ABLE TO RECEIVE PAYMENTS.</li>
          <li><strong><span class="company"><?php echo config_item('company_name'); ?></span></strong>  RESERVES THE RIGHT, IN ITS SOLE AND EXCLUSIVE DISCRETION, TO ALTER OR MODIFY THE PROGRAM AT ANY TIME INCLUDING THE PLAN AND TERMS OF ALL PAYMENT BENEFITS TO USER.</li>
          <li><strong><span class="company"><?php echo config_item('company_name'); ?></span></strong>  RESERVES THE RIGHT TO TERMINATE ANY (USER'S, PARTNER'S) CONTRACT FOR ANY REASON WHAT SO EVER.</li>
          <li id="firstWord">WE HAVE <strong><span class="company"> NO MONEY REFUND POLICY </span></strong> SO NO REFUND AVAILABLE FOR ANY USER AT ANY REASON.</li>
          <li id="firstWord">WE DO NOT GIVE YOU ANY GUARANTEES EITHER, NO PROMISES. NEITHER EXPLICITLY NOR IMPLICITLY.</li>
          <li id="firstWord">DO NOT CREATE THE MISTAKEN BELIEF THAT YOU CAN BECOME RICH QUICK HERE. (CONVERSELY, YOU WILL LOSE EVERYTHING!)</li>
          <li id="firstWord">IF ANY USER VIOLATES OR  REFUSES TO TAKE PART IN THEIR RESPONSIBILITIES, OR COMMITS FRAUDULENT ACTIVITY AGAINST US, <strong><span class="company"><?php echo config_item('company_name'); ?></span></strong> RESERVES THE RIGHT TO WITHHOLD PAYMENT AND TAKE APPROPRIATE LEGAL ACTION TO COVER ITS DAMAGES.</li>
          <li id="firstWord">NOTIFY US VIA EMAIL IF YOU WISH TO PERMANENTLY CLOSE YOUR ACCOUNT.</li>
          <li id="firstWord">I ALSO AGREE THAT , I MUST NOT INVOLVE IN ANY ANTI-COMPANY WORK (WHICH WORK DOES NOT ALLOWED BY COMPANY , OR AGAINST COMPANY REPUTATION ) , IF FOUND ,MY CONTRACT  WITH <strong><span class="company"><?php echo config_item('company_name'); ?></span></strong> WILL BE TERMINATED INSTANTLY . NO LOSS OR REFUND WILL BE MADE TO CUSTOMER OR USER.</li>
          <li id="firstWord">I agreed with absolute consciousness that the Company could freeze My Business ID or take back it, or transfer to another person, without my consent in the event of speak or campaign against the company’s interest, or work against the business idea of the company.</li>
          <br>
          <li id="firstWord">U<strong>SER DECLARATION :</strong>
              <ul>
                  <li id="firstWord">I HAVE READ THESE TERMS AND CONDITIONS AND WILL ABIDE BY IT, INCLUDING THE COMPLIANCE WITH ALL LAWS RELATED TO PROMOTION OF <strong><span class="company"><?php echo config_item('company_name'); ?></span></strong>. I ALSO ACKNOWLEDGE THAT IT IS MY RESPONSIBILITY TO REVIEW THESE TERMS AND CONDITIONS REGULARLY FOR ANY MODIFICATIONS.</li>
              </ul>
          </li>
    </ol>
</div>
    </div>
</div>

