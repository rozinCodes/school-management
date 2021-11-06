
<!-- ============================================================== -->
<!-- end left sidebar -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- wrapper  -->
<!-- ============================================================== -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/fonts/themify-icons/themify-icons.css">
<script src="<?php echo base_url(); ?>assets/turn/turn.min.js"></script>

<style>



    .page-view img{
        width: 100%;
    }

    #flipbook .page{

        background-color:white;
        line-height:300px;
        font-size:20px;
        text-align:center;
    }

    #flipbook .page-wrapper{
        -webkit-perspective:2000px;
        -moz-perspective:2000px;
        -ms-perspective:2000px;
        -o-perspective:2000px;
        perspective:2000px;
    }

    #flipbook .hard{
        background:#ccc !important;
        color:#333;
        -webkit-box-shadow:inset 0 0 5px #666;
        -moz-box-shadow:inset 0 0 5px #666;
        -o-box-shadow:inset 0 0 5px #666;
        -ms-box-shadow:inset 0 0 5px #666;
        box-shadow:inset 0 0 5px #666;
        font-weight:bold;
    }

    #flipbook .odd{
        background:-webkit-gradient(linear, right top, left top, color-stop(0.95, #FFF), color-stop(1, #DADADA));
        background-image:-webkit-linear-gradient(right, #FFF 95%, #C4C4C4 100%);
        background-image:-moz-linear-gradient(right, #FFF 95%, #C4C4C4 100%);
        background-image:-ms-linear-gradient(right, #FFF 95%, #C4C4C4 100%);
        background-image:-o-linear-gradient(right, #FFF 95%, #C4C4C4 100%);
        background-image:linear-gradient(right, #FFF 95%, #C4C4C4 100%);
        -webkit-box-shadow:inset 0 0 5px #666;
        -moz-box-shadow:inset 0 0 5px #666;
        -o-box-shadow:inset 0 0 5px #666;
        -ms-box-shadow:inset 0 0 5px #666;
        box-shadow:inset 0 0 5px #666;

    }

    #flipbook .even{
        background:-webkit-gradient(linear, left top, right top, color-stop(0.95, #fff), color-stop(1, #dadada));
        background-image:-webkit-linear-gradient(left, #fff 95%, #dadada 100%);
        background-image:-moz-linear-gradient(left, #fff 95%, #dadada 100%);
        background-image:-ms-linear-gradient(left, #fff 95%, #dadada 100%);
        background-image:-o-linear-gradient(left, #fff 95%, #dadada 100%);
        background-image:linear-gradient(left, #fff 95%, #dadada 100%);
        -webkit-box-shadow:inset 0 0 5px #666;
        -moz-box-shadow:inset 0 0 5px #666;
        -o-box-shadow:inset 0 0 5px #666;
        -ms-box-shadow:inset 0 0 5px #666;
        box-shadow:inset 0 0 5px #666;
    }
    sideContent {
        position: absolute;
        top: 0px;
        left: 0px;

        transform-origin: 0% 0%;
        -webkit-transform-origin: 0% 0%;
        -moz-transform-origin: 0% 0%, -ms-transform-origin : 0% 0%, -o-transform-origin : 0% 0%, border-top:1px solid white;
    }

    .menu-icon{
        font-size: 17px;
        font-weight: bold;
        color: #666;
        color: rgb(221, 221, 221);
        height: 26px;
        line-height: 26px;

        overflow: hidden;
        background-color: #4a5a69;
        height: 50px;
    }
    .menu-icon .t-icon:hover{
        background: #343b42;

        color: #489926;
    }

    .book_menu a{

        color:greenyellow;
    }
    .menu-icon .t-icon{
        float: left;
    }
</style>

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
                           <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line("class"); ?></li>
                        
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
                <div class="card">
                    <h5 class="card-header"><?php echo $this->lang->line("version"); ?></h5>

                    <div class="card-body">
                        <h2 style="color:green"> <?php
                            $dt = $this->session->userdata("msg");
                            if ($dt != NULL) {
                                echo $dt;
                                $this->session->unset_userdata("msg");
                            }
                            ?></h2>

                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 ">

                                <div class="image-zoom">



                                    <div class="menu-icon">

                                                                                
                                        <div class="flip-control" >
                                            <a id="prev" title="HOME">
                                            <div class=" t-icon"  onclick='play();' ><i class="ti-control-backward" ></i></div></a>
                                            <a onclick="checkKey()"  id="next" class="button-press"><div class=" t-icon" onclick='play();'>  <i class="ti-control-forward" ></i> </div></a>
                                        </div>
                                <div class=" t-icon volume-icon" > <i class="fa fa-volume-up"></i></div>


                                        <a  class="zoom zoom--actions">
                                        <div class="zoom--actions">
                                            <div class=" t-icon"><i class="ti-zoom-in"></i>
                                        </div>
                                        </a>
                                        <a  class="zoom-out-button">
                                            
                                  <div class=" t-icon"><i class="ti-zoom-out"></i></div>
                                        </a>
                                    </div>
                                </div>
                                            <script>

                                            var zoom = 1;
                                        $('.zoom').on('click', function(){
                                        zoom += 0.1;
                                        $('.target').css('zoom', zoom);
                                    });
                                    $('.zoom-out-button').on('click', function(){
                                        zoom -= 0.1;
                                        $('.target').css('zoom', zoom);
                                    });
                                </script>
                                    </div><br><br><br><br>



                                    <div id="zoom-viewport">
                                        <div id="flipbook"  class="target" >

                                            <?php 
                                            $v=$_GET['v'];
                                            if (isset($allEbook)) {
                                                foreach ($allEbook as $value) {
                                                    if ($value->VERSIONS == $v) {
                                                        $code = $this->input->get("code");
                                                        if ($code == $value->SUBJECTSID) { ?> <div onclick='play();' class="page-view shadow"> <div class="sideContent" style="border-top: 1px solid white; width: 95%; "><img src="<?php echo base_url() . "upload/book/ebook/{$value->PICTURE}" ?>" style="width: 100%; "></div> </div> <?php }
                                                    }
                                                }
                                            } ?>



                                        </div>
                                    </div>
                                </div>
                            </div>


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
<script type="text/javascript">
    var oTurn = $("#flipbook").turn({
        width: 800,
        height: 500,
        autoCenter: true,
        next: true
    });

    function isAnimating() {
        if ($("#flipbook").turn("animating")) {
            alert('Animating a page!');
        }
    }

    function play() {
        var audio = new Audio('<?php echo base_url(); ?>upload/book/audio/book_sound.mp3');
        audio.play();
    }
    ;

    $("#prev").click(function (e) {
        e.preventDefault();
        oTurn.turn("previous");
    });

    $("#next").click(function (e) {
        e.preventDefault();
        oTurn.turn("next");
    });

    function zoomedIn() {
        $(".page-view").elevateZoom({
            zoomType: "lens",
            lensShape: "round",
            lensSize: 300
        });
        if ($("#zoom-viewport").turn("value"))
            alert("No zoom");

    }
    $('.zoom--actions .zoom-in').on('click', function () {
        var img = $(this).parents('.image-zoom').find('.zoom--img img');
        var width = img.width();
        var newWidth = width + 100;
        img.width(newWidth);
    }
    );
    $('.zoom--actions .zoom-out').on('click', function () {
        var img = $(this).parents('.image-zoom').find('.zoom--img img');
        var width = img.width();
        var newWidth = width - 100;
        img.width(newWidth);
    }
    );
</script>
<script>
    $('#form').parsley();
</script>
<script>

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
