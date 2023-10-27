<?php

?>
<div class="col-sm-2"></div>
<div class="col-sm-8" style="background-color: #fff; padding: 50px">
    <ul class="nav nav-pills" style="font-weight: 900">
        <li class="active"><a data-toggle="tab" href="#mobile"><span class="fa fa-mobile-phone"></span> Mobile Recharge</a></li>
        <li><a data-toggle="tab" href="#postpaid"><span class="fa fa-mobile-phone"></span> Mobile Postpaid</a></li>
        <li><a data-toggle="tab" href="#dth"><span class="fa fa-umbrella"></span> DTH</a></li>
    </ul>

    <div class="tab-content">
        <div id="mobile" class="tab-pane fade in active">
            <p>
                <?php echo form_open('recharge/recharge/mobile') ?>
                <label>Enter Mobile No (10 Digit)</label>
                <input type="text" name="mno" class="form-control">
                <br/>
                <label>Select Operator</label>
                <select name="operator" class="form-control">
                    <option value="AT">Airtel</option>
                    <option value="BS">BSNL</option>
                    <option value="BSR">BSNL -Validity</option>
                    <option value="ID">Idea</option>
                    <option value="VD">Vodafone</option>
                    <option value="RJ">JIO RECHARGE</option>
                    <option value="TJ">JIO TOPUP</option>
                    <!--<option value="">MTNL Delhi</option>
                    <option value="">Aircel</option>
                    <option value="">MTNL Mumbai</option>
                    <option value="">MTS</option>
                    <option value="">Reliance</option>
                    <option value="">T24</option>
                    <option value="">Tata Indicom</option>
                    <option value="">Tata Docomo CDMA</option>
                    <option value="">Tata Docomo GSM</option>
                    <option value="">Tata Walky</option>
                    <option value="">Telenor</option>-->
                </select>
                <!--<label>Circle</label>
                <select name="circle" class="form-control">
                    <option value="1">Delhi/NCR</option>
                    <option value="2">Mumbai</option>
                    <option value="3">Kolkata</option>
                    <option value="4">Maharashtra</option>
                    <option value="5">Andhra Pradesh</option>
                    <option value="6">Tamil Nadu</option>
                    <option value="7">Karnataka</option>
                    <option value="8">Gujarat</option>
                    <option value="9">Uttar Pradesh (E)</option>
                    <option value="10">Madhya Pradesh</option>
                    <option value="11">Uttar Pradesh (W)</option>
                    <option value="12">West Bengal</option>
                    <option value="13">Rajasthan</option>
                    <option value="14">Kerala</option>
                    <option value="15">Punjab</option>
                    <option value="16">Haryana</option>
                    <option value="17">Bihar & Jharkhand</option>
                    <option value="18">Orissa</option>
                    <option value="19">Assam</option>
                    <option value="20">North East</option>
                    <option value="21">Himachal Pradesh</option>
                    <option value="22">Jammu & Kashmir</option>
                    <option value="23">Chennai</option>
                </select>--></br>
                <label>Recharge Amount</label>
                <input type="text" name="amount" class="form-control">
                <br/>
                <p><b>Disclaimer&nbsp;:&nbsp;&nbsp;</b>We support most type of recharges, but please check with your operator before you proceed.</p>
                <button type="submit" class="btn btn-primary">Recharge</button>
                <?php echo form_close() ?>
            </p>
        </div>
        <div id="postpaid" class="tab-pane fade">
            <p>
                <?php echo form_open('recharge/recharge/mobile') ?>
                <label>Enter Mobile No (10 Digit)</label>
                <input type="text" name="mno" class="form-control">
                <br/>
                <label>Select Operator</label>
                <select name="operator" class="form-control">
                    <option value="AP">AIRTEL POSTPAID</option>
                    <option value="BP">BSNL PostPaid</option>
                    <option value="IP">IDEA Postpaid</option>
                    <option value="TP">Tata PostPaid</option>
                    <option value="VP">Vodafone Postpaid</option>
                </select>
                </br>
                <label>Amount</label>
                <input type="text" name="amount" class="form-control">
                <br/>
                <p><b>Disclaimer&nbsp;:&nbsp;&nbsp;</b>We support most type of recharges, but please check with your operator before you proceed.</p>
                <button type="submit" class="btn btn-primary">Recharge</button>
                <?php echo form_close() ?>
            </p>
        </div>
        <div id="dth" class="tab-pane fade">
            <p>
                <?php echo form_open('recharge/recharge/dth') ?>
                <label>Enter Subscriber No</label>
                <input type="text" name="sub_no" class="form-control">
                </br>
                <label>Select Operator</label>
                <select name="operator" class="form-control">
                    <option value="ATD"> Airtel Digital TV</option>
                    <option value="DT">DISH TV</option>
                    <option value="BT">Reliance Digital TV</option>
                    <option value="SD">SUN Direct</option>
                    <option value="TS">Tata Sky</option>
                    <option value="VT"> Videocon d2h</option>
                </select>
                <br/>
                <label>Recharge Amount</label>
                <input type="text" name="amount" class="form-control">
                <br/>
                <p><b>Disclaimer&nbsp;:&nbsp;&nbsp;</b>We support most type of recharges, but please check with your operator before you proceed.</p>
                <button type="submit" class="btn btn-primary">Recharge</button>
                <?php echo form_close() ?>
            </p>
        </div>
    </div>
</div>
<div class="col-sm-2"></div>
<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("recharge").classList.add('active');
        document.querySelector("#aside > ul > li.active > ul > li:nth-child(1) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>


