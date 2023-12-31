<?php  ?>
<!DOCTYPE html>

<head>
    <title><?php echo 'live meeting'; ?> : <?php echo $live_meeting_details['meet_name']; ?></title>
    <meta charset="utf-8" />
    <link type="text/css" rel="stylesheet" href="https://source.zoom.us/1.9.1/css/bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="https://source.zoom.us/1.9.1/css/react-select.css" />
    <link rel='icon' href="<?php echo base_url();?>axxets/client/favicon.ico" type='image/x-icon'/>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

   
</head>

<body>
    <style>
    body {
        padding-top: 50px;
    }

    .course_info {
        color: #999999;
        font-size: 11px;
        padding-bottom: 10px;
    }

    .btn-finish {
        background-color: #656565;
        border-color: #222222;
        color: #cacaca;
    }

    .btn-finish:hover,
    .btn-finish:focus,
    .btn-finish:active,
    .btn-finish.active,
    .open .dropdown-toggle.btn-finish {
        color: #cacaca;
    }

    .course_user_info {
        color: #989898;
        font-size: 12px;
        margin-right: 20px;
    }

    @media only screen and (max-width: 815px) {
        #nav-tool {
            display: none;
        }
    }
    </style>


    <nav id="nav-tool" class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header" style="padding: 0px !important;">
                <a class="navbar-brand" href="#">
                    
                    <?php echo 'Live Meeting'; ?> : <?php echo $live_meeting_details['meet_name']; ?>
                </a>


            </div>
            <div id="navbar">
                <form class="navbar-form navbar-right" id="meeting_form">
                    <div class="form-group">
                        <div class="course_user_info">
                            <?php echo 'instructor'; ?> : <?php echo $instructor_details['name']; ?>
                        </div>
                        <!-- <div class="course_user_info">
                            <?php echo 'Total Enrolment'; ?> 
                        </div> -->
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-finish" onclick="stop_zoom()">
                            <svg style="height:20px; vertical-align: middle;" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-times fa-w-10 fa-3x">
                                <path fill="currentColor" d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z" class=""></path>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
            <!--/.navbar-collapse -->
        </div>
    </nav>
    



    <!-- import ZoomMtg dependencies -->
    <!--<script src="https://source.zoom.us/1.9.1/lib/vendor/react.min.js"></script>-->
    <!--<script src="https://source.zoom.us/1.9.1/lib/vendor/react-dom.min.js"></script>-->
    <!--<script src="https://source.zoom.us/1.9.1/lib/vendor/redux.min.js"></script>-->
    <!--<script src="https://source.zoom.us/1.9.1/lib/vendor/redux-thunk.min.js"></script>-->
    <!--<script src="https://source.zoom.us/1.9.1/lib/vendor/lodash.min.js"></script>-->

    <!-- import ZoomMtg -->
    <!--<script src="https://source.zoom.us/zoom-meeting-1.9.1.min.js"></script>-->
    
    <script src="https://source.zoom.us/1.9.1/lib/vendor/react.min.js"></script>
    <script src="https://source.zoom.us/1.9.1/lib/vendor/react-dom.min.js"></script>
    <script src="https://source.zoom.us/1.9.1/lib/vendor/redux.min.js"></script>
    <script src="https://source.zoom.us/1.9.1/lib/vendor/redux-thunk.min.js"></script>
    <script src="https://source.zoom.us/1.7.9/lib/vendor/jquery.min.js"></script>
    <script src="https://source.zoom.us/1.9.1/lib/vendor/lodash.min.js"></script>
    <script src="https://source.zoom.us/zoom-meeting-1.9.1.min.js"></script>

    <script>

    $(window).on("orientationchange",function(){
        console.log("Orientation changed");
    });
    function stop_zoom() {
        var r = confirm("<?php echo 'do you want to leave the live video meeting'; ?> ? <?php echo 'you can join them later if the video meeting remains live'; ?>");
        if (r == true) {
            ZoomMtg.leaveMeeting();
        }

    }

    $(document).ready(function() {
        start_zoom();
    });

    function start_zoom() {

        ZoomMtg.preLoadWasm();
        ZoomMtg.prepareJssdk();

        var API_KEY = "<?php echo $zoom_meeting['api'];  ?>";
        var API_SECRET = "<?php echo $zoom_meeting['secret_key']; ?>";
        var USER_NAME = "<?php echo "Admin" ?>";
        var MEETING_NUMBER = "<?php echo $live_meeting_details['zoom_meeting_id']; ?>";
        var PASSWORD = "<?php echo $live_meeting_details['zoom_meeting_password']; ?>";

        testTool = window.testTool;


        var meetConfig = {
            apiKey: API_KEY,
            apiSecret: API_SECRET,
            meetingNumber: MEETING_NUMBER,
            userName: USER_NAME,
            passWord: PASSWORD,
            leaveUrl: "<?php echo base_url('admin');  ?>",
            role: 0
        };


        var signature = ZoomMtg.generateSignature({
            meetingNumber: meetConfig.meetingNumber,
            apiKey: meetConfig.apiKey,
            apiSecret: meetConfig.apiSecret,
            role: meetConfig.role,
            success: function(res) {
                console.log(res.result);
            }
        });

        ZoomMtg.init({
            leaveUrl: "<?php echo base_url('admin');  ?>",
            isSupportAV: true,
            success: function() {
                ZoomMtg.join({
                    meetingNumber: meetConfig.meetingNumber,
                    userName: meetConfig.userName,
                    signature: signature,
                    apiKey: meetConfig.apiKey,
                    passWord: meetConfig.passWord,
                    success: function(res) {
                        console.log('join meeting success');
                    },
                    error: function(res) {
                        console.log(res);
                    }
                });
            },
            error: function(res) {
                console.log(res);
            }
        });
    }
    </script>
</body>

</html>
