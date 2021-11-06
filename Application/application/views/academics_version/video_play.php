
<!-- ============================================================== -->
<!-- end left sidebar -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- wrapper  -->
<!-- ============================================================== -->
<style>
    body {
        font-size: 62.5%;
        padding: 0;
        margin: 0;
    }
    video::-webkit-media-controls {
        display:none !important;
    }

    .player {
        background: #ffffff00  ;
        box-sizing: border-box;
        border-radius: 5px;
        height: 70px;
        -moz-box-sizing: border-box;
        float: left;
        font-family: Arial, sans-serif;
        position: absolute;
        padding: 0;
        bottom: 20px;
        z-index: 2;
        opacity: 1;
        box-shadow: 0 0 10px rgba(0,0,0,0.3);
        -webkit-transition: opacity 0.3s ease-in;
        transition: opacity 0.3s ease-in;
        -moz-user-select: none;
        -webkit-user-select: none;
        user-select: none;
        z-index: 2147483647;
    }

    .video {
        position: relative;
        margin: 0px auto;
    }

    .video:hover .player {
        opacity: 1;
    }

    .player .progress {
        width: 60%;
        height: 20px;
        border-radius: 5px;
        background: #676767;
        box-shadow: inset 0 -5px 10px rgba(0,0,0,0.1);
        float: left;
        cursor: pointer;
        margin: 24px 0 0 0;
        padding: 0;
        position: relative;
        font-variant: normal;
        z-index: 2147483647;
    }

    .player .progress-bar {
        background: #33b5d5;
        box-shadow: inset -30px 0px 69px -20px #89f6f5;
        border-radius: 5px;
        height: 100%;
        position: relative;
        z-index: 999;
        width: 0;
        z-index: 2147483647;
    }

    .player .button-holder {
        position: relative;
        left: 10px;
        z-index: 2147483647;
    }

    .player .progress-button {
        background: #fff;
        box-shadow: 0 0 20px rgba(0,0,0,0.3);
        border-radius: 30px;
        width: 20px;
        height: 20px;
        position: absolute;
        left: -20px;
        text-decoration: overline;
        z-index: 2147483647;
    }


    .player [class^="buffered"] {
        background: rgba(255,255,255,0.1);
        position: absolute;
        top: 0;
        left: 30px;
        height: 100%;
        border-radius: 5px;
        z-index: 2147483647;
    }

    .player .play-pause {
        display: inline-block;
        font-size: 3em;
        float: left;
        text-shadow: 0 0 0 #fff;
        color: rgba(255,255,255,0.8);
        width: 10%;
        padding: 17px 0 0 3%;
        cursor: pointer;
        font-variant: small-caps;
    }

    .player .play, .player .pause-button {
        -webkit-transition: all 0.2s ease-out;
    }

    .player .play .pause-button, .player .pause .play-button {
        display: none;
    }

    .player .pause-button {
        padding: 5px 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 34px;
    }

    .player .pause-button span {
        background: #fff;
        width: 8px;
        height: 24px;
        float: left;
        display: block;
    }

    .player .pause-button span:first-of-type {
        margin: 0 4px 0 0;
    }

    .player .time {
        color: #fff;
        font-weight: bold;
        font-size: 1.2em;
        position: absolute;
        right: 0;
        top: 24px;
    }

    .player .stime, .ttime {
        color: #444;
    }
    .player .play:hover {
        text-shadow: 0 0 5px #fff;
    }

    .player .play:active, .pause-button:active span {
        text-shadow: 0 0 7px #fff;
    }


    .player .pause-button:hover span {
        box-shadow: 0 0 5px #fff;
    } .player .pause-button:active span {
        box-shadow: 0 0 7px #fff;
    }


    .player .volume {
        position: relative;
        float: left;
        width: 8%;
        margin: 0 0 0 4%;
        height: 100%;
    }

    .player .volume-icon {
        padding: 1.5%;
        height: 100%;
        cursor: pointer;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        -webkit-transition: all 0.15s linear;
    }

    .player .volume-icon-hover {
        background-color: #4f4f4f;
    }

    .player .volume-holder {
        height: 100px;
        width: 100%;
        background: black;
        position: absolute;
        display: none;
        background: #4f4f4f;
        left: 0;
        border-radius: 5px 5px 0 0;
        top: -100px;
    }

    .player .volume-bar-holder {
        background: #333;
        width: 20px;
        box-shadow: inset 0px 0px 5px rgba(0,0,0,0.3);
        margin: 15px auto;
        height: 80px;
        border-radius: 5px;
        position: relative;
        cursor: pointer;
    }

    .player .volume-button {
        background: #fff;
        box-shadow: 0 0 20px rgba(0,0,0,0.3);
        border-radius: 30px;
        width: 20px;
        height: 20px;
    }

    .player .volume-button-holder {
        position: relative;
        top: -10px;	
    }

    .player .volume-bar {
        background: #33b5d5;
        box-shadow: inset -30px 0px 69px -20px #89f6f5;
        border-radius: 5px;
        width: 100%;
        height: 100%;
        position: absolute;
        bottom: 0;
    }

    .player .fullscreen {
        width: 12%;
        cursor: pointer;
        float: left;
        height: 100%;
    }

    .player .fullscreen a {
        width: 25px;
        height: 20px;
        border-radius: 3px;
        background: #fff;
        display: block;
        position: relative;
        top: 23px;
        margin: 0px auto;
    }

    .player .volume-icon span {
        width: 20%;
        height: 13%;
        background-color: #fff;
        display: block;
        position: relative;
        z-index: 2147483647;
        font-weight: bold;
        top: 40%;
        color: #fff;
        left: 22%;
    }

    .player .volume-icon span:before,
    .player .volume-icon span:after {
        content: '';
        position: absolute;
    }
    .player .volume-icon span:before {
        width: 0;
        height: 0;
        border: 1em solid transparent;
        border-left: none;
        border-right-color: #fff;
        z-index: 2147483647;
        top: -2px;
        left: 10%;
        margin-top: -40%;
    }
    .player .volume-icon span:after {
        width: 2%;
        height: 2%;
        border: 1px solid #fff;
        left: 190%;
        border-width: 0px 0px 0 0; 
        top: 5px;
        border-radius: 0 50px 0 0;
        -webkit-transform: rotate(45deg);
        -moz-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        -o-transform: rotate(45deg);
        transform: rotate(45deg);
        font-variant: small-caps;
    }

    .player .v-change-11 span:after { border-width: 10px 10px 0 0; top: 0; }
    .player .v-change-10 span:after { border-width: 9px 9px 0 0; top: 1px; }
    .player .v-change-9 span:after { border-width: 8px 8px 0 0; top: 1px; }
    .player .v-change-8 span:after { border-width: 7px 7px 0 0; top: 2px; }
    .player .v-change-7 span:after { border-width: 6px 6px 0 0; top: 2px; }
    .player .v-change-6 span:after { border-width: 5px 5px 0 0; top: 3px; }
    .player .v-change-5 span:after { border-width: 4px 4px 0 0; top: 3px; }
    .player .v-change-4 span:after { border-width: 3px 3px 0 0; top: 4px; }
    .player .v-change-3 span:after { border-width: 2px 2px 0 0; top: 4px; }
    .player .v-change-2 span:after { border-width: 1px 1px 0 0; top: 5px; }
    .player .v-change-1 span:after { border-width: 0px 0px 0 0; top: 5px; }

    .player .v-change-1 span:after {
        content: '+';
        -webkit-transform: rotate(45deg);
        font-size: 20px;
        top: -6px;
        left: 25px;


        #header {
            width: 100%;
            margin: 0px auto;
        }

        #header #center {
            text-align: center;
        }

        #header h1 span {
            color: #000;
            display: block;
            font-size: 50px;
        }

        #header p {
            font-family: 'Georgia', serif;
        }
        #header h1 {
            color: #892dbf;
            font: bold 40px 'Bree Serif', serif;
        }

        #travel {
            padding: 10px;
            background: rgba(0,0,0,0.6);
            border-bottom: 2px solid rgba(0,0,0,0.2);
            font-variant: normal;
            text-decoration: none;
        }

        #travel a {
            font-family: 'Georgia', serif;
            text-decoration: none;
            border-bottom: 1px solid #f9f9f9;
            font-size: 20px;
            color: #f9f9f9;
        }

        .container {
            padding: 40px 0 0 0;
        }


    </style>

    <script>
        (function ($) {

            $.fn.videoPlayer = function (options) {


                var settings = {
                    playerWidth: '0.95', // Default is 95%
                    videoClass: 'video'  // Video Class
                }

                // Extend the options so they work with the plugin
                if (options) {
                    $.extend(settings, options);
                }


                // For each so that we keep chainability.
                return this.each(function () {

                    $(this)[0].addEventListener('loadedmetadata', function () {

                        // Basic Variables 
                        var $this = $(this);
                        var $settings = settings;

                        // Wrap the video in a div with the class of your choosing
                        $this.wrap('<div class="' + $settings.videoClass + '"></div>');


                        // Select the div we just wrapped our video in for easy selection.
                        var $that = $this.parent('.' + $settings.videoClass);

                        // The Structure of our video player
                        {

                            $('<div class="player">'
                                    + '<div class="play-pause play">'
                                    + '<span class="play-button">&#9658;</span>'
                                    + '<div class="pause-button">'
                                    + '<span> </span>'
                                    + '<span> </span>'
                                    + '</div>'
                                    + '</div>'
                                    + '<div class="progress">'
                                    + '<div class="progress-bar">'
                                    + '<div class="button-holder">'
                                    + '<div class="progress-button"> </div>'
                                    + '</div>'
                                    + '</div>'
                                    + '<div class="time">'
                                    + '<span class="ctime">00:00</span>'
                                    + '<span class="stime"> / </span>'
                                    + '<span class="ttime">00:00</span>'
                                    + '</div>'
                                    + '</div>'
                                    + '<div class="volume">'
                                    + '<div class="volume-holder">'
                                    + '<div class="volume-bar-holder">'
                                    + '<div class="volume-bar">'
                                    + '<div class="volume-button-holder">'
                                    + '<div class="volume-button"> </div>'
                                    + '</div>'
                                    + '</div>'
                                    + '</div>'
                                    + '</div>'
                                    + '<div class="volume-icon v-change-0">'
                                    + '<span> </span>'
                                    + '</div>'
                                    + '</div>'
                                    + '<div class="fullscreen"> '
                                    + '<a href="#"> </a>'
                                    + '</div>'
                                    + '</div>').appendTo($that);

                        }


                        // Width of the video
                        $videoWidth = $this.width();
                        $that.width($videoWidth + 'px');

                        // Set width of the player based on previously noted settings
                        $that.find('.player').css({'width': ($settings.playerWidth * 100) + '%', 'left': ((100 - $settings.playerWidth * 100) / 2) + '%'});


                        // Video information
                        var $spc = $(this)[0], // Specific video
                                $duration = $spc.duration, // Video Duration
                                $volume = $spc.volume, // Video volume
                                currentTime;

                        // Some other misc variables to check when things are happening
                        var $mclicking = false,
                                $vclicking = false,
                                $vidhover = false,
                                $volhover = false,
                                $playing = false,
                                $drop = false,
                                $begin = false,
                                $draggingProgess = false,
                                $storevol,
                                x = 0,
                                y = 0,
                                vtime = 0,
                                updProgWidth = 0,
                                volume = 0;

                        // Setting the width, etc of the player
                        var $volume = $spc.volume;

                        // So the user cant select text in the player
                        $that.bind('selectstart', function () {
                            return false;
                        });

                        // Set some widths
                        var progWidth = $that.find('.progress').width();


                        var bufferLength = function () {

                            // The buffered regions of the video
                            var buffered = $spc.buffered;

                            // Rest all buffered regions everytime this function is run
                            $that.find('[class^=buffered]').remove();

                            // If buffered regions exist
                            if (buffered.length > 0) {

                                // The length of the buffered regions is i
                                var i = buffered.length;

                                while (i--) {
                                    // Max and min buffers
                                    $maxBuffer = buffered.end(i);
                                    $minBuffer = buffered.start(i);

                                    // The offset and width of buffered area				
                                    var bufferOffset = ($minBuffer / $duration) * 100;
                                    var bufferWidth = (($maxBuffer - $minBuffer) / $duration) * 100;

                                    // Append the buffered regions to the video
                                    $('<div class="buffered"></div>').css({"left": bufferOffset + '%', 'width': bufferWidth + '%'}).appendTo($that.find('.progress'));

                                }
                            }
                        }

                        // Run the buffer function
                        bufferLength();

                        // The timing function, updates the time.
                        var timeUpdate = function ($ignore) {

                            // The current time of the video based on progress bar position
                            var time = Math.round(($('.progress-bar').width() / progWidth) * $duration);

                            // The 'real' time of the video
                            var curTime = $spc.currentTime;

                            // Seconds are set to 0 by default, minutes are the time divided by 60
                            // tminutes and tseconds are the total mins and seconds.
                            var seconds = 0,
                                    minutes = Math.floor(time / 60),
                                    tminutes = Math.round($duration / 60),
                                    tseconds = Math.round(($duration) - (tminutes * 60));

                            // If time exists (well, video time)
                            if (time) {
                                // seconds are equal to the time minus the minutes
                                seconds = Math.round(time) - (60 * minutes);

                                // So if seconds go above 59
                                if (seconds > 59) {
                                    // Increase minutes, reset seconds
                                    seconds = Math.round(time) - (60 * minutes);
                                    if (seconds == 60) {
                                        minutes = Math.round(time / 60);
                                        seconds = 0;
                                    }
                                }

                            }

                            // Updated progress width
                            updProgWidth = (curTime / $duration) * progWidth

                            // Set a zero before the number if its less than 10.
                            if (seconds < 10) {
                                seconds = '0' + seconds;
                            }
                            if (tseconds < 10) {
                                tseconds = '0' + tseconds;
                            }

                            // A variable set which we'll use later on
                            if ($ignore != true) {
                                $that.find('.progress-bar').css({'width': updProgWidth + 'px'});
                                $that.find('.progress-button').css({'left': (updProgWidth - $that.find('.progress-button').width()) + 'px'});
                            }

                            // Update times
                            $that.find('.ctime').html(minutes + ':' + seconds)
                            $that.find('.ttime').html(tminutes + ':' + tseconds);

                            // If playing update buffer value
                            if ($spc.currentTime > 0 && $spc.paused == false && $spc.ended == false) {
                                bufferLength();
                            }

                        }

                        // Run the timing function twice, once on init and again when the time updates.
                        timeUpdate();
                        $spc.addEventListener('timeupdate', timeUpdate);

                        // When the user clicks play, bind a click event	
                        $that.find('.play-pause').bind('click', function () {

                            // Set up a playing variable
                            if ($spc.currentTime > 0 && $spc.paused == false && $spc.ended == false) {
                                $playing = false;
                            } else {
                                $playing = true;
                            }

                            // If playing, etc, change classes to show pause or play button
                            if ($playing == false) {
                                $spc.pause();
                                $(this).addClass('play').removeClass('pause');
                                bufferLength();
                            } else {
                                $begin = true;
                                $spc.play();
                                $(this).addClass('pause').removeClass('play');
                            }

                        });


                        // Bind a function to the progress bar so the user can select a point in the video
                        $that.find('.progress').bind('mousedown', function (e) {

                            // Progress bar is being clicked
                            $mclicking = true;

                            // If video is playing then pause while we change time of the video
                            if ($playing == true) {
                                $spc.pause();
                            }

                            // The x position of the mouse in the progress bar 
                            x = e.pageX - $that.find('.progress').offset().left;

                            // Update current time
                            currentTime = (x / progWidth) * $duration;

                            $spc.currentTime = currentTime;

                        });

                        // When the user clicks on the volume bar holder, initiate the volume change event
                        $that.find('.volume-bar-holder').bind('mousedown', function (e) {

                            // Clicking of volume is true
                            $vclicking = true;

                            // Y position of mouse in volume slider
                            y = $that.find('.volume-bar-holder').height() - (e.pageY - $that.find('.volume-bar-holder').offset().top);

                            // Return false if user tries to click outside volume area
                            if (y < 0 || y > $(this).height()) {
                                $vclicking = false;
                                return false;
                            }

                            // Update CSS to reflect what's happened
                            $that.find('.volume-bar').css({'height': y + 'px'});
                            $that.find('.volume-button').css({'top': (y - ($that.find('.volume-button').height() / 2)) + 'px'});

                            // Update some variables
                            $spc.volume = $that.find('.volume-bar').height() / $(this).height();
                            $storevol = $that.find('.volume-bar').height() / $(this).height();
                            $volume = $that.find('.volume-bar').height() / $(this).height();

                            // Run a little animation for the volume icon.
                            volanim();

                        });

                        // A quick function for binding the animation of the volume icon
                        var volanim = function () {

                            // Check where volume is and update class depending on that.
                            for (var i = 0; i < 1; i += 0.1) {

                                var fi = parseInt(Math.floor(i * 10)) / 10;
                                var volid = (fi * 10) + 1;

                                if ($volume == 1) {
                                    if ($volhover == true) {
                                        $that.find('.volume-icon').removeClass().addClass('volume-icon volume-icon-hover v-change-11');
                                    } else {
                                        $that.find('.volume-icon').removeClass().addClass('volume-icon v-change-11');
                                    }
                                } else if ($volume == 0) {
                                    if ($volhover == true) {
                                        $that.find('.volume-icon').removeClass().addClass('volume-icon volume-icon-hover v-change-1');
                                    } else {
                                        $that.find('.volume-icon').removeClass().addClass('volume-icon v-change-1');
                                    }
                                } else if ($volume > (fi - 0.1) && volume < fi && !$that.find('.volume-icon').hasClass('v-change-' + volid)) {
                                    if ($volhover == true) {
                                        $that.find('.volume-icon').removeClass().addClass('volume-icon volume-icon-hover v-change-' + volid);
                                    } else {
                                        $that.find('.volume-icon').removeClass().addClass('volume-icon v-change-' + volid);
                                    }
                                }

                            }
                        }
                        // Run the volanim function
                        volanim();

                        // Check if the user is hovering over the volume button
                        $that.find('.volume').hover(function () {
                            $volhover = true;
                        }, function () {
                            $volhover = false;
                        });


                        // For usability purposes then bind a function to the body assuming that the user has clicked mouse
                        // down on the progress bar or volume bar
                        $('body, html').bind('mousemove', function (e) {

                            // Hide the player if video has been played and user hovers away from video
                            if ($begin == true) {
                                $that.hover(function () {
                                    $that.find('.player').stop(true, false).animate({'opacity': '1'}, 0.5);
                                }, function () {
                                    $that.find('.player').stop(true, false).animate({'opacity': '0'}, 0.5);
                                });
                            }

                            // For the progress bar controls
                            if ($mclicking == true) {

                                // Dragging is happening
                                $draggingProgress = true;
                                // The thing we're going to apply to the CSS (changes based on conditional statements);
                                var progMove = 0;
                                // Width of the progress button (a little button at the end of the progress bar)
                                var buttonWidth = $that.find('.progress-button').width();

                                // Updated x posititon the user is at
                                x = e.pageX - $that.find('.progress').offset().left;

                                // If video is playing
                                if ($playing == true) {
                                    // And the current time is less than the duration				
                                    if (currentTime < $duration) {
                                        // Then the play-pause icon should definitely be a pause button 
                                        $that.find('.play-pause').addClass('pause').removeClass('play');
                                    }
                                }


                                if (x < 0) { // If x is less than 0 then move the progress bar 0px
                                    progMove = 0;
                                    $spc.currentTime = 0;
                                } else if (x > progWidth) { // If x is more than the progress bar width then set progMove to progWidth
                                    $spc.currentTime = $duration;
                                    progMove = progWidth;
                                } else { // Otherwise progMove is equal to the mouse x coordinate
                                    progMove = x;
                                    currentTime = (x / progWidth) * $duration;
                                    $spc.currentTime = currentTime;
                                }

                                // Change CSS based on previous conditional statement
                                $that.find('.progress-bar').css({'width': $progMove + 'px'});
                                $that.find('.progress-button').css({'left': ($progMove - buttonWidth) + 'px'});

                            }

                            // For the volume controls
                            if ($vclicking == true) {

                                // The position of the mouse on the volume slider
                                y = $that.find('.volume-bar-holder').height() - (e.pageY - $that.find('.volume-bar-holder').offset().top);

                                // The position the user is moving to on the slider.
                                var volMove = 0;

                                // If the volume holder box is hidden then just return false
                                if ($that.find('.volume-holder').css('display') == 'none') {
                                    $vclicking = false;
                                    return false;
                                }

                                // Add the hover class to the volume icon
                                if (!$that.find('.volume-icon').hasClass('volume-icon-hover')) {
                                    $that.find('.volume-icon').addClass('volume-icon-hover');
                                }


                                if (y < 0 || y == 0) { // If y is less than 0 or equal to 0 then volMove is 0.

                                    $volume = 0;
                                    volMove = 0;

                                    $that.find('.volume-icon').removeClass().addClass('volume-icon volume-icon-hover v-change-11');

                                } else if (y > $(this).find('.volume-bar-holder').height() || (y / $that.find('.volume-bar-holder').height()) == 1) { // If y is more than the height then volMove is equal to the height

                                    $volume = 1;
                                    volMove = $that.find('.volume-bar-holder').height();

                                    $that.find('.volume-icon').removeClass().addClass('volume-icon volume-icon-hover v-change-1');

                                } else { // Otherwise volMove is just y

                                    $volume = $that.find('.volume-bar').height() / $that.find('.volume-bar-holder').height();
                                    volMove = y;

                                }

                                // Adjust the CSS based on the previous conditional statmeent
                                $that.find('.volume-bar').css({'height': volMove + 'px'});
                                $that.find('.volume-button').css({'top': (volMove + $that.find('.volume-button').height()) + 'px'});

                                // Run the animation function
                                volanim();

                                // Change the volume and store volume
                                // Store volume is the volume the user last had in place
                                // in case they want to mute the video, unmuting will then
                                // return the user to their previous volume.
                                $spc.volume = $volume;
                                $storevol = $volume;


                            }

                            // If the user hovers over the volume controls, then fade in or out the volume
                            // icon hover class

                            if ($volhover == false) {

                                $that.find('.volume-holder').stop(true, false).fadeOut(100);
                                $that.find('.volume-icon').removeClass('volume-icon-hover');

                            } else {
                                $that.find('.volume-icon').addClass('volume-icon-hover');
                                $that.find('.volume-holder').fadeIn(100);
                            }


                        })

                        // When the video ends the play button becomes a pause button
                        $spc.addEventListener('ended', function () {

                            $playing = false;

                            // If the user is not dragging
                            if ($draggingProgress == false) {
                                $that.find('.play-pause').addClass('play').removeClass('pause');
                            }

                        });

                        // If the user clicks on the volume icon, mute the video, store previous volume, and then
                        // show previous volume should they click on it again.
                        $that.find('.volume-icon').bind('mousedown', function () {

                            $volume = $spc.volume; // Update volume

                            // If volume is undefined then the store volume is the current volume
                            if (typeof $storevol == 'undefined') {
                                $storevol = $spc.volume;
                            }

                            // If volume is more than 0
                            if ($volume > 0) {
                                // then the user wants to mute the video, so volume will become 0
                                $spc.volume = 0;
                                $volume = 0;
                                $that.find('.volume-bar').css({'height': '0'});
                                volanim();
                            } else {
                                // Otherwise user is unmuting video, so volume is now store volume.
                                $spc.volume = $storevol;
                                $volume = $storevol;
                                $that.find('.volume-bar').css({'height': ($storevol * 100) + '%'});
                                volanim();
                            }


                        });


                        // If the user lets go of the mouse, clicking is false for both volume and progress.
                        // Also the video will begin playing if it was playing before the drag process began.
                        // We're also running the bufferLength function
                        $('body, html').bind('mouseup', function (e) {

                            $mclicking = false;
                            $vclicking = false;
                            $draggingProgress = false;

                            if ($playing == true) {
                                $spc.play();
                            }

                            bufferLength();


                        });

                        // Check if fullscreen supported. If it's not just don't show the fullscreen icon.
                        if (!$spc.requestFullscreen && !$spc.mozRequestFullScreen && !$spc.webkitRequestFullScreen) {
                            $('.fullscreen').hide();
                        }

                        // Requests fullscreen based on browser.
                        $('.fullscreen').click(function () {

                            if ($spc.requestFullscreen) {
                                $spc.requestFullscreen();
                            } else if ($spc.mozRequestFullScreen) {
                                $spc.mozRequestFullScreen();
                            } else if ($spc.webkitRequestFullScreen) {
                                $spc.webkitRequestFullScreen();
                            }

                        });



                    });

                });

            }

        })(jQuery);

    </script>
    <div class="dashboard-wrapper">
        <div class="container-fluid  dashboard-content">
            <!-- ============================================================== -->
            <!-- pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title"><?php echo $this->lang->line("bangla_version"); ?> </h2>

                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("dashboard"); ?></a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("version"); ?></a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line("bangla_version"); ?></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader -->
            <!-- ============================================================== -->

            <div class="row">
                <!-- ============================================================== -->
                <!-- validation form -->
                <!-- ============================================================== -->

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card" style="background-color:#e0e4ef;">
                        <h5 class="card-header" ><?php echo $this->lang->line("bangla_version"); ?></h5>

                        <div class="card-body">
                            <h2 style="color:green"> <?php
$dt = $this->session->userdata("msg");
if ($dt != NULL) {
    echo $dt;
    $this->session->unset_userdata("msg");
}
?></h2>

                                <div class="row" >

<?php
if (isset($allEbook)) {
    foreach ($allEbook as $value) {
        if ($value->VERSIONS == $_GET['v']) {
            $code = $this->input->get("code");

            if ($code == $value->ID) {
                if ($value->VIDEO_TYPE == 1) {
                    ?>
                                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 ">

                                                            <video width="700" height="400">
                                                                <source src="<?php echo base_url() . "upload/book/video/{$value->VIDEO_FILE}"; ?>" type="video/mp4">
                                                                <source src="<?php echo base_url() . "upload/book/video/{$value->VIDEO_FILE}"; ?>" type="video/webm">
                                                            </video>





                                                        </div>

                    <?php
                } else {
                    ?>
                                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 ">
   
                                                            
                                                            
                                                            <iframe width="700" height="400" src="https://www.youtube.com/embed/<?php echo $value->VIDEO_LINK; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                            
                                                        </div>
                    <?php
                }
            }
        }
    }
}
?>

                                </div> 
                            </div>

                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->

                <!-- end validation form -->


                <!-- ============================================================== -->
            </div>


        </div>
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- end footer -->
        <!-- ============================================================== -->
    </div>

    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script type='text/javascript'>

        $(document).ready(function () {
            $('video').videoPlayer({
                'playerWidth': 0.95,
                'videoClass': 'video'
            });
        });

    </script>
    <script>
        $('#form').parsley();
    </script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
