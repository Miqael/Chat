<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Login</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-8" style="margin: 5px 100px;">
                        <div class="alert alert-danger" role="alert" id="loginAlert" style="display: none;">
                            <span id="loginAlertText"></span>
                        </div>
                    </div>
                </div>
                <?php echo CHtml::beginForm('','post',array('id'=>'login_form')); ?>
                <div class="row">
                    <div class="col-sm-8" style="margin: 5px 100px;">
                        <?php echo CHtml::textField('email','',array('class'=>'form form-control','placeholder'=>'Email')); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8" style="margin: 5px 100px;">
                        <?php echo CHtml::passwordField('password','',array('class'=>'form form-control','placeholder'=>'Password')); ?>
                    </div>
                </div>
                <?php echo CHtml::endForm(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="loginButton">Login</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Registration</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-8" style="margin: 5px 100px;">
                        <div class="alert alert-danger" role="alert" id="regAlert" style="display: none;">
                            <span id="regAlertText"></span>
                        </div>
                    </div>
                </div>
                <?php echo CHtml::beginForm('','post',array('id'=>'registration_form')); ?>
                <div class="row">
                    <div class="col-sm-8" style="margin: 5px 100px;">
                        <?php echo CHtml::textField('email','',array('class'=>'form form-control regInputs','placeholder'=>'Email*')); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8" style="margin: 5px 100px;">
                        <?php echo CHtml::passwordField('password','',array('class'=>'form form-control regInputs','placeholder'=>'Password*')); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8" style="margin: 5px 100px;">
                        <?php echo CHtml::passwordField('confirm_password','',array('class'=>'form form-control regInputs','placeholder'=>'Confirm Password*')); ?>
                    </div>
                </div>
                <?php echo CHtml::endForm(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="registerButton">Register</button>
            </div>
        </div>
    </div>
</div>

<div id="content_m">
</div>

<div id="preloader" style="display: none;"></div>

<div class="panel panel-default settings-panel" id="settings-panel">
    <div class="panel-heading">
        <h3 class="panel-title">
            <span class="glyphicon glyphicon-circle-arrow-right openHideSettings" style="margin-right: 80px;cursor: pointer;"></span>
             Settings <span class="glyphicon glyphicon-wrench"></span>
        </h3>
    </div>
    <div class="panel-body">
        <?php echo CHtml::beginForm('','post',array('id'=>'settings_form')); ?>
        <div class="row">
            <div class="col-sm-4 text-center">
                <div id="file-uploader" style="float: left;"></div>
            </div>
            <div class="col-sm-6">
                <div class="thumbnail">
                    <img id="user_image" src="<?php echo Yii::app()->baseUrl; ?>/images/users/no_image.jpg" />
                </div>
                <?php echo CHtml::hiddenField('image','',array('id'=>'image_field')); ?>
            </div>
        </div>
        <div class="row" style="margin-top: 10px">
            <div class="col-sm-12">
                <?php echo CHtml::textField('nick_name','',array('class'=>'form form-control settingsInputs','placeholder'=>'Nickname')); ?>
            </div>
        </div>
        <div class="row" style="margin-top: 10px">
            <div class="col-sm-12">
                <?php echo CHtml::textField('name','',array('class'=>'form form-control settingsInputs','placeholder'=>'Name')); ?>
            </div>
        </div>
        <div class="row" style="margin-top: 10px">
            <div class="col-sm-12">
                    <?php echo CHtml::textField('birthday','',
                        array(
                            'class'=>'form form-control settingsInputs datePicker',
                            'placeholder'=>'Birthday (1990-01-01)'
                        )); ?>
            </div>
        </div>
        <div class="row" style="margin-top: 10px">
            <div class="col-sm-12">
                <?php $search_types = array(''=>'Search Type','1'=>'Love','2'=>'Friends','3'=>'Adult'); ?>
                <?php echo CHtml::dropDownList('search_type_id','',$search_types,array('class'=>'form form-control settingsInputs','placeholder'=>'Search Type')); ?>
            </div>
        </div>
        <div class="row" style="margin-top: 10px">
            <div class="col-sm-2"></div>
            <div class="col-sm-4">
                <label class="pointer"> Male
                <?php echo CHtml::radioButton('gender',false,array('class'=>'settingsInputs','value'=>'1')); ?>
                </label>
            </div>
            <div class="col-sm-5">
                <label class="pointer"> Female
                <?php echo CHtml::radioButton('gender',false,array('class'=>'settingsInputs','value'=>'2')); ?>
                </label>
            </div>
        </div>
        <div class="row" style="margin-top: 10px">
            <div class="col-sm-12">
                <?php echo CHtml::textField('email','',array('class'=>'form form-control settingsInputs','placeholder'=>'Email')); ?>
            </div>
        </div>
        <div class="row" style="margin-top: 10px">
            <div class="col-sm-12">
                <?php echo CHtml::passwordField('password','',array('class'=>'form form-control settingsInputs','placeholder'=>'Change Password')); ?>
            </div>
        </div>
        <div class="row" style="margin-top: 10px">
            <div class="col-sm-12">
                <?php echo CHtml::passwordField('c_password','',array('class'=>'form form-control settingsInputs','placeholder'=>'Confirm Password')); ?>
            </div>
        </div>
        <div class="row" style="margin-top: 10px;margin-bottom: 20px;">
            <div class="col-sm-12 text-center">
                <?php echo CHtml::button('Save Changes',array('class'=>'btn btn-primary','id'=>'edit_user_button')); ?>
            </div>
        </div>
        <?php echo CHtml::endForm(); ?>
    </div>
</div>

<div class="panel panel-default settings-panel" id="search-panel">
    <div class="panel-heading">
        <h3 class="panel-title">
            <span class="glyphicon glyphicon-circle-arrow-right openHideSearch" style="margin-right: 80px;cursor: pointer;"></span>
             Search <span class="glyphicon glyphicon-search"></span>
        </h3>
    </div>
    <div class="panel-body">
        Panel content
    </div>
</div>

<!--by Alaverdyan Miqael-->

<!-- Start Call answer window -->
<div class="modal fade background" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <img src="<?php echo Yii::app()->baseUrl; ?>/images/call/background.png" style="position: absolute;top: 0;">
            <div style="position: absolute;top: 200px;left: 31px;" >
                <img id="end_call" src="<?php echo Yii::app()->baseUrl; ?>/images/call/call_end.png" style="position:absolute;left: 0px;">
                <img id="black_list" src="<?php echo Yii::app()->baseUrl; ?>/images/call/black_list.png" style="position:absolute;left: 66px; ">
                <img id="start_call" src="<?php echo Yii::app()->baseUrl; ?>/images/call/start_call.png" style="position:absolute;left: 105px;">
            </div>
        </div>
    </div>
</div>
<!-- End Call answer window -->

<!-- Modal -->
<div class="modal fade background" id="myVideoContainer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
<!--            <div id="videos-container"></div>-->
            <div id="myVideo"></div>
            <div id="remoteVideo"></div>
        </div>
    </div>
</div>
<div id="preloader" style="display: none;"></div>


<!--end Alaverdyan Miqael-->
<script>

var all_channel;

function initialize() {
    var center = new google.maps.LatLng(40.0000, 45.0000);

    var map = new google.maps.Map(document.getElementById('content_m'), {
        zoom: 3,
        maxZoom: 8,
        minZoom : 2,
        center: center,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var contentString = 'This is an example';
    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });

    var markers = [];
    var m_with_ids = [];
    $.each(data,function(key, val){


        var latLng = new google.maps.LatLng(val.lat,
            val.lng);
        var marker = new google.maps.Marker({
            position: latLng,
            id: val.id,
            name : val.name ,
            nick_name : val.nick_name ,
            image : val.image,
            url : key
        });
        markers.push(marker);
        google.maps.event.addListener(marker, 'click', function(event) {
//            console.log(this.name);
            infowindow.content = '<div style="max-width: 300px;width:300px;overflow: hidden;">' +
                    '<div class="col-sm-6">' +
                        '<div class="thumbnail">' +
                            '<img src="<?php echo Yii::app()->baseUrl; ?>/images/users/'+this.image+'" />' +
                        '</div>' +
                    '</div>' +
                    '<div class="col-sm-6 text-right">' +
                        '<p>'+this.name+'</p>' +
                        '<p>'+((this.denger)? 'Male' : 'Female')+'</p>' +
                        '<a class="reload" href="#" target="_self" id="a_'+this.id+'" title="'+this.name+'" >'+
                        '<strong class="caller_number btn btn-sm btn-primary"  data-url="" data-user="'+this.id+'" id="unique-token_'+this.id+'">Call To'+this.name+
                        '</strong></a>'+
                    '</div>' +
                '</div>';
            infowindow.open(map,this);
        });


    });

    var markerCluster = new MarkerClusterer(map, markers , { maxZoom: 8 , zoomOnClick : false });

    google.maps.event.addListener(markerCluster, "click", function (c) {
        var zoom_level = map.getZoom();
        if(zoom_level == '8'){
            infowindow.close();
            infowindow.content = '<ul class="list-group" style="min-width: 300px;overflow: hidden;">';
            var m = c.getMarkers();
            for (var i = 0; i < m.length; i++) {
                infowindow.content += '<li class="list-group-item">'+ m[i].name+'<button class="btn btn-sm btn-primary pull-right">Call</button></li>';
            }
            infowindow.content += '</ul>';
            infowindow.setPosition(c.getCenter());
            infowindow.open(map);
        }else{
            map.setZoom(zoom_level+1);
            map.setCenter(c.getCenter());
        }
    });
}
var navH;
var data = jQuery.parseJSON('<?php echo json_encode($users); ?>');




    /*---------------------- Start Alaverdyan Miqael -----------------------*/







    var this_uId = '<?php echo $this->u_id; ?>';
    var data_broadcasts = [];

    var config = {
        openSocket: function(config) {
            var channel = all_channel;
            var socket = new Firebase('https://chat.firebaseIO.com/' + channel);
            socket.channel = channel;
            socket.on("child_added", function(data) {
                config.onmessage && config.onmessage(data.val());
            });
            socket.send = function(data) {
                this.push(data);
            };
            config.onopen && setTimeout(config.onopen, 1);
            socket.onDisconnect().remove();
            return socket;
        },
        onRemoteStream: function(media) {
            var mediaElement = getMediaElement(media.video, {
                width: 580,
                buttons: ['mute-audio', 'mute-video', 'full-screen', 'volume-slider']
            });
            mediaElement.id = media.streamid;
            var videosContainer = document.getElementById('remoteVideo');
            videosContainer.innerHTML = '';
            videosContainer.insertBefore(mediaElement, videosContainer.firstChild);
        },
        onRemoteStreamEnded: function(stream, video) {
            if (video.parentNode && video.parentNode.parentNode && video.parentNode.parentNode.parentNode) {
                video.parentNode.parentNode.parentNode.removeChild(video.parentNode.parentNode);
            }
        },
        onRoomFound: function(room) {

//            console.log(data_broadcasts);
//
//            console.log(jQuery.inArray(room.broadcaster,data_broadcasts));

            if (jQuery.inArray(room.broadcaster,data_broadcasts) != -1) return;

            data_broadcasts.push(room.broadcaster);

            captureUserMedia(function() {
                conferenceUI.joinRoom({
                    roomToken:  room.roomToken,
                    joinUser:  room.broadcaster
                });
            });
//            };
        },
        onRoomClosed: function(room) {
            conferenceUI.leaveRoom();
//            $('#videos-container').html('');
            $('#myVideoContainer').modal('hide');
        }
    };

    function captureUserMedia(callback) {
        var video = document.createElement('video');
//        alert('captured');
        var videosContainer = document.getElementById('myVideo');
        videosContainer.innerHTML = '';
        getUserMedia({
            video: video,
            onsuccess: function(stream) {
                config.attachStream = stream;
                callback && callback();
                video.setAttribute('muted', true);
                var mediaElement = getMediaElement(video, {
                    width: 160,
                    buttons: []
                });
                mediaElement.toggle('mute-audio');
                videosContainer.insertBefore(mediaElement, videosContainer.firstChild);
            },
            onerror: function() {
                alert('unable to get access to your webcam');
                callback && callback();
            }
        });
    }

    var conferenceUI;

    /* UI specific */
//    var videosContainer = document.getElementById('videos-container') || document.body;

    function rotateVideo(video) {
        video.style[navigator.mozGetUserMedia ? 'transform' : '-webkit-transform'] = 'rotate(0deg)';
        setTimeout(function() {
            video.style[navigator.mozGetUserMedia ? 'transform' : '-webkit-transform'] = 'rotate(360deg)';
        }, 1000);
    }

    function scaleVideos() {
        var videos = document.querySelectorAll('video'),
            length = videos.length, video;

        var minus = 130;
        var windowHeight = 700;
        var windowWidth = 600;
        var windowAspectRatio = windowWidth / windowHeight;
        var videoAspectRatio = 4 / 3;
        var blockAspectRatio;
        var tempVideoWidth = 0;
        var maxVideoWidth = 0;

        for (var i = length; i > 0; i--) {
            blockAspectRatio = i * videoAspectRatio / Math.ceil(length / i);
            if (blockAspectRatio <= windowAspectRatio) {
                tempVideoWidth = videoAspectRatio * windowHeight / Math.ceil(length / i);
            } else {
                tempVideoWidth = windowWidth / i;
            }
            if (tempVideoWidth > maxVideoWidth)
                maxVideoWidth = tempVideoWidth;
        }
        for (var i = 0; i < length; i++) {
            video = videos[i];
            if (video)
                video.width = maxVideoWidth - minus;
        }
    }

    window.onresize = scaleVideos;
    var url;





    /*---------------------- End Alaverdyan Miqael -----------------------*/

$(document).ready(function (){

    $('.datePicker').datepicker({ 'format' : 'yyyy-mm-dd' , 'viewMode' : 2 });

    var height = $(window).height();
    navH = $('#navigation').height();
    $('#content_m').css({'height':(height-navH)+'px'});
    initialize();
    $('#registerButton').on('click',function(e){
        e.preventDefault();
        if(check_form('#registration_form')){
            var data = $('#registration_form').serializeArray();
            $.ajax({
                url:'<?php echo Yii::app()->baseUrl; ?>/site/register',
                type : 'post',
                data : data,
                dataType : 'json',
                beforeSend:function(){$('#preloader').show();},
                success : function(data){
                    $('#preloader').hide()
                    if(data.status){
                        loggedIn();
                    }else{
                        $('#regAlertText').html(data.msg);
                        $('#regAlert').fadeIn();
                    }
                },
                error : function (err){
                   alert('Something went wrong please try again!');
                }
            });
        }else{
            $('#regAlertText').html('PLease fill all fields !');
            $('#regAlert').fadeIn();
        }
    });
    $('#loginButton').on('click',function(e){
        e.preventDefault();
        if(check_form('#login_form')){
            var data = $('#login_form').serializeArray();
            $.ajax({
                url:'<?php echo Yii::app()->baseUrl; ?>/site/login',
                type : 'post',
                data : data,
                dataType : 'json',
                beforeSend:function(){$('#preloader').show();},
                success : function(data){
                    $('#preloader').hide()
                    if(data.status){
                        loggedIn();
                    }else{
                        $('#loginAlertText').html(data.msg);
                        $('#loginAlert').fadeIn();
                    }
                },
                error : function (err){
                    alert('Something went wrong please try again!');
                }
            });
        }else{
            $('#loginAlertText').html('PLease fill all fields !');
            $('#loginAlert').fadeIn();
        }
    });
    $('.openHideSettings').on('click', function(e) {
        e.preventDefault();
        var panel = $('#settings-panel');
        if (panel.hasClass("visible")) {
            panel.removeClass('visible').animate({'right':'-300px'});
        } else {
            panel.addClass('visible').animate({'right':'0px'});
        }
    });

    $('.openHideSearch').on('click', function(e) {
        e.preventDefault();
        var panel = $('#search-panel');
        if (panel.hasClass("visible")) {
            panel.removeClass('visible').animate({'right':'-300px'});
        } else {
            panel.addClass('visible').animate({'right':'0px'});
        }
    });

    /*------------------ image upload ------------------*/
    var count = 0;
    var img;
    var alt;
    var check;
    var picName;
    var uploader = new qq.FileUploader({
        element: document.getElementById('file-uploader'),
        'action': '<?php echo Yii::app()->baseUrl; ?>/site/uploader',
        'debug': false,
        multiple: false,
        onSubmit: function(id, fileName){
            picName = $('#pictureName').val();
            $('#cont').html('<div class="progress progress-striped active" style="width: 400px;">'
                +'<div id="progress-bar" class="progress-bar" style="width: 0%"></div>'
                +'</div>');
        },
        onProgress: function(id, fileName, loaded, total){
            $('#progress-bar').css({width: Math.round(loaded / total * 100)+'%'});
        },
        onComplete: function(id, fileName, responseJSON){
            if(responseJSON.success ==true){
                $('#user_image').attr('src',"<?php echo Yii::app()->baseUrl;?>/images/users/"+responseJSON.fileName);
                $('#image_field').val(responseJSON.fileName);
                $('.qq-upload-list li').remove();
                if($('#2').length !== 0 && $('#3').length !== 0){
                    $('#file-uploader3').removeClass('hid');
                }
            }else{
                alert('Allowed only png, jpg, gif, jpeg');
                $('#load').empty();
            }
        },
        onCancel: function(id, fileName){$('.qq-upload-button').removeClass('.qq-upload-button-visited')},
        messages: {
            // error messages, see qq.FileUploaderBasic for content
        },
        showMessage: function(message){alert(message);}
    });
    /*------------------ end of image upload -----------------*/

    /*------------------ edit user data ----------------------*/
    $(document).on('click','#edit_user_button',function(e){
        e.preventDefault();
        var data = $('#settings_form').serializeArray();
        $.ajax({
            url:'<?php echo Yii::app()->baseUrl; ?>/site/editUser',
            type : 'post',
            data : data,
            dataType : 'json',
            beforeSend:function(){$('#preloader').show();},
            success : function(data){
                $('#preloader').hide()
                $('.btn.openHideSettings').trigger('click');
            },
            error : function (err){
                alert('Something went wrong please try again!');
            }
        });
    });
    /*------------------ end of edit user data ---------------*/
    <?php if($this->u_id){ ?>
        loggedIn();
    <?php } ?>





    /*---------------------  START Alaverdyan Miqael ------------------*/

    //create a new WebSocket object.
    var wsUri = "ws://192.168.1.201:8080/chat2/server.php";
    websocket = new WebSocket(wsUri);
    websocket.onopen = function(ev) { // connection is open
//        $('#online').append("<div class=\"system_msg\">Connected!</div>"); //notify user
    }

    $(document).on('click','.caller_number',function(e){
        e.preventDefault();
        var url = 'http://192.168.1.201/chat3/'+'#' + (Math.random() * new Date().getTime()).toString(36).toUpperCase().replace( /\./g , '-');
        url = url.replace( /\/|:|#|%|\.|\[|\]/g , '');
        var user = $(this).attr('data-user');
        var mymessage = $('#message').val(); //get message text
        var myname = $('#name').val(); //get user name

        if(myname == ""){ //empty name?
            alert("Enter your Name please!");
            return;
        }
        if(mymessage == ""){ //emtpy message?
            alert("Enter Some message Please!");
            return;
        }

        all_channel = url;

        conferenceUI = conference(config);
//                        window.location.hash = $(this).attr('href');
        $('#myVideoContainer').modal('show');
//        console.log(config);
        captureUserMedia(function() {
            conferenceUI.createRoom({
                roomName: url
            });
        });

        //prepare json data
        var msg = {
            this_u_id: this_uId,
            to_user_id: user,
            url: url
        };
        //convert and send data to server
        websocket.send(JSON.stringify(msg));
    });

    //#### Message received from server?
    websocket.onmessage = function(ev) {

        var msg = JSON.parse(ev.data); //PHP sends Json data

        var from_u_id = msg.this_u_id;
        var my_u_id = msg.to_user_id;
        if(my_u_id == this_uId){
            all_channel = msg.url;
            $('#myModal').modal('show');
        }

    };

    websocket.onerror	= function(ev){$('#message_box').append("<div class=\"system_error\">Error Occurred - "+ev.data+"</div>");};
    websocket.onclose 	= function(ev){$('#message_box').append("<div class=\"system_msg\">Connection Closed</div>");};




    $(document).on('click','#start_call',function(e){
        e.preventDefault();
        $('#myModal').modal('hide');
        $('#myVideoContainer').modal('show');
        conferenceUI = conference(config);
    });


    $('#myVideoContainer').on('hide.bs.modal', function (e) {
        conferenceUI.leaveRoom();
    });


    /*---------------------  END Alaverdyan Miqael ------------------*/






});
$(window).resize(function (){
    var height = $(window).height();
    $('#content_m').css({'height':(height-navH)+'px'});
});
function check_form(form_id){
    var check = true;
    $(form_id+' :input').each(function(){
        if($(this).val().length == 0){
            check = false;
        }
    });
    return check;
}
function loggedIn(){
    $('.beforeLogin').hide();
    $('.afterLogin').show();
    $('.modal').modal('hide');
    $.ajax({
        url:'<?php echo Yii::app()->baseUrl; ?>/site/getUser',
        dataType : 'json',
        success : function(data){
            if(data.image.length != 0){
                $('#user_image').attr('src','<?php echo Yii::app()->baseUrl; ?>/images/users/'+data.image);
            }
            if(data.gender.length != 0){
                $('input:radio[value="'+data.gender+'"]', '#settings_form').attr('checked','checked');
            }
            $.each(data,function(key,val){
                if(key != 'gender'){
                    $('input[name="'+key+'"]', '#settings_form').val(val);
                }
            });
        },
        error : function (err){
            alert('Something went wrong please try again!');
        }
    });
}
</script>