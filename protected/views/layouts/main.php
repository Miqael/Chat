<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/datepicker.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/css/jquery.fancybox.css" />


    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/js/fileuploader.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/js/markerclusterer.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl ?>/js/jquery.fancybox.js"></script>
    <script src="http://maps.googleapis.com/maps/api/js?v=3&amp;sensor=false"></script>





    <!------------------------Start Alaverdyan Miqael ------------------------------------>


    <script src="https://www.webrtc-experiment.com/firebase.js"> </script>
    <script src="https://www.webrtc-experiment.com/RTCPeerConnection-v1.5.js"> </script>
    <script src="https://www.webrtc-experiment.com/video-conferencing/conference.js"> </script>
    <script src="https://www.webrtc-experiment.com/getMediaElement.min.js"> </script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/functions.js">  </script>





    <!------------------------End Alaverdyan Miqael ------------------------------------>




    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" style="color: #000;">Video Live Chat</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li style="margin-left: -15px;" class="beforeLogin">
                    <a>
                        <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#loginModal">Login
                        </button>
                    </a>
                </li>
                <li style="margin-left: -15px;" class="beforeLogin">
                    <a>
                        <button class="btn btn-default  btn-sm" data-toggle="modal" data-target="#registerModal">
                            Registry
                        </button>
                    </a>
                </li>
                <li style="margin-left: -15px;display: none;" class="afterLogin">
                    <a>
                        <button class="btn btn-default  btn-sm openHideSearch">Search</button>
                    </a>
                </li>
                <li style="margin-left: -15px;display: none;" class="afterLogin">
                    <a>
                        <button class="btn btn-default  btn-sm openHideSettings">Settings</button>
                    </a>
                </li>
                <li style="margin-left: -15px;display: none;" class="afterLogin">
                    <a href="<?php echo Yii::app()->baseUrl; ?>/site/logout">
                        <button class="btn btn-default  btn-sm">Logout</button>
                    </a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<?= $content ?>
</body>
</html>
<script>

</script>