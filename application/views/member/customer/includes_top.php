<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome <?php echo $this->session->name ?> | <?php echo config_item('company_name') ?></title>

    <link href="<?php echo base_url('axxets/base/css/fonts-material-icon.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('axxets/base/css/font-awesome_v4.7.0.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('axxets/base/css/bootstrap_v3.3.7.min.css') ?>">
    <link href="<?php echo base_url('axxets/member/css/theme.css') ?>" rel="stylesheet" id="rt_style_components" type="text/css"/>
    <link href="<?php echo base_url('axxets/member/css/member_style.css') ?>" rel="stylesheet" id="rt_style_components" type="text/css"/>
    <link rel="stylesheet" href="<?php echo base_url('axxets/base/css/jquery-ui_v1.12.1.css') ?>">
    <!-- favicon -->
    <link rel='icon' href="<?php echo base_url();?>axxets/client/favicon.ico" type='image/x-icon'/>
    <script src="<?php echo base_url('axxets/base/js/jquery_v3.2.1.min.js') ?>" type="text/javascript"></script>
            <!--whatsapp integration -->
    <script type='text/javascript' src="https://platform-api.sharethis.com/js/sharethis.js#property=5d52b99e4cd0540012f2016f&product='inline-share-buttons'" async='async'>
    </script>

    <!--
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
          rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet"
          href="//code.jquery.com/ui/1.12.1/themes/eggplant/jquery-ui.css">

    <link rel='icon' href="<?php echo base_url();?>axxets/client/favicon.ico" type='image/x-icon'/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"
            type="text/javascript"></script>
    <script type='text/javascript' src="https://platform-api.sharethis.com/js/sharethis.js#property=5d52b99e4cd0540012f2016f&product='inline-share-buttons'" async='async'>
    </script>
    -->


<style>

#single th, #single td {
    text-align:center;
}

#club_income a {
    color: #337ab7;
}

.gen-pin-btn {
    width: 100%;
    padding: 7px;
    color: #fff;
    background-color: #200087;
    border: 1px solid #20007d;
    border-radius: 20px;
    transition: .5s ease-in-out;
}

#inputLeft {
    border: 0;
    background-image: linear-gradient(#9c27b0, #9c27b0), linear-gradient(#D2D2D2, #D2D2D2);
    background-size: 0 2px, 100% 1px;
    background-repeat: no-repeat;
    background-position: center bottom, center calc(100% - 1px);
    background-color: transparent;
    transition: background 0s ease-out;
    float: none;
    box-shadow: none;
    border-radius: 0;
    font-weight: 400;

}

#inputLeft:hover {
  color: blue;
}

@media (max-width: 991px) {
    div.row:nth-child(3) {
        padding-left: 15px;
        padding-right: 15px;
    }
}

#single > div > div > div > div > div > div > div.card-body > div > table > tbody > tr > td {
    font-size: 14px;
}


.profile-avatar {
    text-align: center;
}

.profile-avatar img {
    max-width: 120px;
    border-radius: 100%;
}

.profile-name {
    margin-bottom: 8px;
    margin-top: 0px;
    font-size: 20px;
    text-transform: uppercase;
}

.dashbord-profile {
    display: grid;
    grid-template-columns: 120px auto;
    align-items: center;
    grid-gap: 20px;
}
.content {
    box-sizing: border-box;
}
.card [class*="card-header-"]:not(.card-header-icon):not(.card-header-text):not(.card-header-image) {
    border-radius: 3px;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    margin-top: -20px;
    padding: 15px;
    padding-top: 10px;
    padding-right: 15px;
    padding-bottom: 10px;
    padding-left: 15px;
}
.card-member{
    order-radius: 3px;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    margin-top: -20px;
    padding: 15px;
    padding-top: 15px;
    padding-right: 15px;
    padding-bottom: 10px;
    padding-left: 15px;

}

.card-body {
    padding: 10px 24px 24px;
    padding-top: 10px;
    padding-right: 24px;
    padding-bottom: 24px;
    padding-left: 24px;
}

.card .card-header-primary .card-icon,
.card .card-header-primary .card-text,
.card .card-header-primary:not(.card-header-icon):not(.card-header-text),
.card.bg-primary,
.card.card-rotate.bg-primary .front,
.card.card-rotate.bg-primary .back {
    background: linear-gradient(60deg, #ab47bc, #8e24aa);
}
.card .card-header-primary .card-icon,
.card .card-header-primary:not(.card-header-icon):not(.card-header-text),
.card .card-header-primary .card-text {
    box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(156, 39, 176, 0.4);
}
.h4{
    margin-top: 10px;
    line-height: 1.1;
}
.p {
    display: block;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
}
.div {
    display: block;
}
.col-md-12{
    position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}
.table-responsive{
    min-height: .01%;
    overflow-x: auto;
}
.table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
    background-color: transparent;
}
.text-primary {
    color: #337ab7;
}
.tbody {
    display: table-row-group;
    vertical-align: middle;
    border-color: inherit;
}
.tr {
    display: table-row;
    vertical-align: inherit;
    border-color: inherit;
}
.card .dataTable td, .card .dataTable th, .card .table td, .card .table th, .table td, .table th {
    vertical-align: middle;
    padding-top: 15px;
    padding-right: 8px;
    padding-bottom: 15px;
    padding-left: 8px;

}
.table thead tr th{
    font-size: 14px;
    font-weight: 600;
    padding-left: 15px;
    color: #337ab7;
}
.table td{
    text-shadow: none;
    color: black;
    text-decoration: none;
    background-color: transparent;
    font-size: 12px;
    padding-left: 50px;
}

.#inline {
    width :50%;
    padding : 0;
    margin : 0;
    display : inline;

}

fieldset {
    display: block;
    margin-inline-start: 2px;
    margin-inline-end: 2px;
    padding-block-start: 0.40em;
    padding-inline-start: 0.95em;
    padding-inline-end: 0.75em;
    padding-block-end: 0.625em;
    min-inline-size: min-content;
    border-width: 2px;
    border-style: groove;
    border-color: threedface;
    border-image: initial;
}

legend {
    display: block;
    padding-inline-start: 2px;
    padding-inline-end: 2px;
    border-width: initial;
    border-style: none;
    border-color: initial;
    border-image: initial;
    width: auto;
    margin-bottom: 5px;
    font-size: 25px;
    color: blue;
    padding-left: 10px;
    padding-right: 10px;
}

#single .label{
    border-radius: 12px;
    padding: 5px 12px;
    text-transform: uppercase;
    font-size: 10px;
}

#single .label.label-success {
    background-color: #4caf50;
}

#single .label.label-danger {
    background-color: #f44336;
}


.countdownTimerCell{
display: inline-block;
width:20%;
border: 1px solid #333;
text-align: center;
font-size: x-large;
padding: 5px;
background-color: #f39c12 ;
color: white;
}
.countdownTimerCell:not(:first-child) {
margin-left: -4px;
}
.h{
margin-top: -50px;color:red;text-align:center;
}

#earning td{
    font-size: 13px;
}

#club_income td{
    font-size: 14px;
}

</style>
</head>