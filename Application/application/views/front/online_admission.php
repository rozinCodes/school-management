<!doctype html>
<html lang="en">

<head>
    <title>Walton Intelligent School</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400,700|Indie+Flower" rel="stylesheet">


    <link rel="stylesheet" href="<?php echo base_url(); ?>front/fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>front/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>front/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>front/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>front/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>front/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>front/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>front/css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>front/css/style.css">

    <!-- zljhskjfgfh -->

    <title>Walton &mdash; Intelligent &mdash; School</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400,700|Indie+Flower" rel="stylesheet">


    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>front/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/libs/css/my_style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/libs/css/my_style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>front/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>front/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>front/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>front/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>front/css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>front/css/style.css">

</head>



<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">


    <div class="site-wrap" id="home-section">

        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>


        <header class="site-navbar site-navbar-target" role="banner">

            <div class="container mb-3">
                <div class="d-flex align-items-center">
                    <div class="site-logo mr-auto">

                        <div>
                            <a href="<?php echo base_url(); ?>"> <span>Walton Intelligent School</span></a>
                        </div>
                    </div>
                    <div class="site-quick-contact d-none d-lg-flex ml-auto ">

                        <!-- <div class="d-flex site-info align-items-center">
                <span class="block-icon mr-3"><span class="icon-clock-o"></span></span>
                <span>Saturday- Thursday 9:00AM - 4:00PM <br> Friday CLOSED</span>
              </div> -->

                    </div>
                </div>
            </div>


            <div class="container">
                <div class="menu-wrap d-flex align-items-center">
                    <span class="d-inline-block d-lg-none"><a href="#" class="text-black site-menu-toggle js-menu-toggle py-5"><span class="icon-menu h3 text-black"></span></a></span>



                    <nav class="site-navigation text-left mr-auto d-none d-lg-block" role="navigation">
                        <ul class="site-menu main-menu js-clone-nav mr-auto ">
                            <li class="active"><a href="<?php echo base_url(); ?>" class="nav-link">Home</a></li>
                            <li><a href="#" class="nav-link">About Us</a></li>
                            <li><a href="#" class="nav-link">Facilities</a></li>
                            <li><a href="<?php echo base_url() ?>online_admission/onlineadmission/onlineadmission" class="nav-link">Admission</a></li>
                            <li><a href="#" class="nav-link">Contact</a></li>
                            <li><a href="<?php echo base_url(); ?>login" class="nav-link">Login</a></li>
                        </ul>
                    </nav>

                    <div class="top-social ml-auto">
                        <a href="#"><span class="icon-facebook text-teal"></span></a>
                        <a href="#"><span class="icon-twitter text-success"></span></a>
                        <a href="#"><span class="icon-linkedin text-yellow"></span></a>
                    </div>
                </div>
            </div>



        </header>










    </div>
    </div>
    </div>
    </div>





    <footer style="background-color: #ABAB9A;" class="site-footer">
        <div class="container">
            <div class="row">

          
            </div>

        </div>
    </footer>

    </div>









    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

        <h5 class="card-header"><?php echo $this->lang->line("personal_info"); ?></h5>


        <form class="needs-validation" novalidate action="<?php echo base_url() ?>online_admission/onlineadmission/insert" method="post">

            <!--   <div class="row">
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                    
                                    <label for="validationCustom01"><?php echo $this->lang->line("admission_no"); ?></label>
                                    <input type="text" class="form-control" id="validationCustom01" placeholder=" " name="admission_no" value="" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                     <label for="validationCustom01"><?php echo $this->lang->line("roll_no"); ?></label>
                                    <input type="text" class="form-control" id="validationCustom01" placeholder=" " name="roll_no" value="" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                            
                                    
                                    <label for="validationCustom01"><?php echo $this->lang->line("class"); ?></label>

                                    <select class="form-control" id="validationCustom01" name="class">
                                      <?php
                                        if (isset($allPdt2)) {
                                            foreach ($allPdt2 as $value) {

                                        ?>

                                            <option value="<?php echo $value->ID ?>"><?php echo $value->CLASSES ?></option>

                                            <?php
                                            }
                                        }

                                            ?>
                                    </select>


                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                    <label for="validationCustom01"><?php echo $this->lang->line("section"); ?></label>

                                    <select class="form-control" id="validationCustom01" name="section">
                                      <?php
                                        if (isset($allPdt)) {
                                            foreach ($allPdt as $value) {

                                        ?>

                                            <option value="<?php echo $value->ID ?>"><?php echo $value->NAME ?></option>

                                            <?php
                                            }
                                        }

                                            ?>
                                    </select>


                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                

                            </div> -->

            <br>

            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                    <label for="validationCustom01"><?php echo $this->lang->line("f_name"); ?></label>
                    <input type="text" class="form-control" id="validationCustom01" placeholder=" " name="fname" value="" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                    <label for="validationCustom01"><?php echo $this->lang->line("l_name"); ?></label>
                    <input type="text" class="form-control" id="validationCustom01" placeholder="" name="lname" value="" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                    <label for="validationCustom01"><?php echo $this->lang->line("gender"); ?></label>

                    <select class="form-control" id="validationCustom01" name="gender">
                        <option value="volvo">Select Gender</option>
                        <option value="volvo">Male</option>
                        <option value="saab">Female</option>

                    </select>


                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                    <label for="validationCustom01"><?php echo $this->lang->line("date_of_birth"); ?></label>

                    <input type="date" class="form-control" id="validationCustom01" name="date_of_birth" placeholder=" name" value="" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>


            </div>


            <br>

            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                    <label for="validationCustom01"><?php echo $this->lang->line("religion"); ?></label>
                    <input type="text" class="form-control" id="validationCustom01" placeholder=" " name="religion" value="" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                    <label for="validationCustom01"><?php echo $this->lang->line("mobile_no"); ?></label>
                    <input type="text" class="form-control" id="validationCustom01" placeholder="" name="mobile_no" value="" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                    <label for="validationCustom01"><?php echo $this->lang->line("email"); ?></label>
                    <input type="text" class="form-control" id="validationCustom01" placeholder="" name="email" value="" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>



                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                    <label for="validationCustom01"><?php echo $this->lang->line("admission_date"); ?></label>

                    <input type="date" class="form-control" id="validationCustom01" name="admission_date" placeholder=" name" name="admission_date" value="" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>


            </div>


            <br>

            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                    <label for="validationCustom01"><?php echo $this->lang->line("student_image"); ?></label>

                    <input class="form-control" type="file" name="student_image" id="file" size="20" autocomplete="off" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                    <label for="validationCustom01"><?php echo $this->lang->line("blood_group"); ?></label>
                    <select class="form-control" id="validationCustom01" name="blood_group">
                        <option value="">Blood Group</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                    </select>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                    <label for="validationCustom01"><?php echo $this->lang->line("present_address"); ?></label>
                    <input type="text" class="form-control" id="validationCustom01" placeholder="" name="present_address" value="" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>



                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                    <label for="validationCustom01"><?php echo $this->lang->line("permanent_address"); ?></label>
                    <input type="text" class="form-control" id="validationCustom01" placeholder="" name="permanent_address" value="" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>


            </div>

            <br>



            <h4 <label for="validationCustom01" class="middle_bar_background"><?php echo $this->lang->line("parent_detail"); ?></label>

            </h4>



            <br>


            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                    <label for="validationCustom01"><?php echo $this->lang->line("father_name"); ?></label>
                    <input type="text" class="form-control" id="validationCustom01" placeholder=" " name="father_name" value="" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                    <label for="validationCustom01"><?php echo $this->lang->line("father_phone"); ?></label>
                    <input type="text" class="form-control" id="validationCustom01" placeholder="" name="father_phone" value="" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                    <label for="validationCustom01"><?php echo $this->lang->line("father_occupation"); ?></label>
                    <input type="text" class="form-control" id="validationCustom01" placeholder="" name="father_occupation" value="" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>



                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                    <label for="validationCustom01"><?php echo $this->lang->line("father_photo"); ?></label>

                    <input class="form-control" type="file" name="father_photo" id="file" size="20" autocomplete="off" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>


            </div>

            <br>


            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                    <label for="validationCustom01"><?php echo $this->lang->line("mother_name"); ?></label>
                    <input type="text" class="form-control" id="validationCustom01" placeholder=" " name="mother_name" value="" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                    <label for="validationCustom01"><?php echo $this->lang->line("mother_phone"); ?></label>
                    <input type="text" class="form-control" id="validationCustom01" placeholder="" name="mother_phone" value="" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                    <label for="validationCustom01"><?php echo $this->lang->line("mother_occupation"); ?></label>
                    <input type="text" class="form-control" id="validationCustom01" placeholder="" name="mother_occupation" value="" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>



                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                    <label for="validationCustom01"><?php echo $this->lang->line("mother_photo"); ?></label>

                    <input class="form-control" type="file" name="mother_photo" id="file" size="20" autocomplete="off" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>


            </div>

            <br>


            <h4 <label for="validationCustom01" class="middle_bar_background"><?php echo $this->lang->line("gurdian_detail"); ?></label>

            </h4>

            <br>



            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                    <label for="validationCustom01"><?php echo $this->lang->line("guardian_name"); ?></label>
                    <input type="text" class="form-control" id="validationCustom01" placeholder=" " name="guardian_name" value="" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                    <label for="validationCustom01"><?php echo $this->lang->line("guardian_phone"); ?></label>
                    <input type="text" class="form-control" id="validationCustom01" placeholder="" name="mother_phone" value="" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                    <label for="validationCustom01"><?php echo $this->lang->line("guardian_occupation"); ?></label>
                    <input type="text" class="form-control" id="validationCustom01" placeholder="" name="mother_occupation" value="" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>



                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                    <label for="validationCustom01"><?php echo $this->lang->line("guardian_photo"); ?></label>

                    <input class="form-control" type="file" name="guardian_photo" id="file" size="20" autocomplete="off" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>


            </div>
            <br>

            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-4 col-sm-4 col-4">
                    <label for="validationCustom01"><?php echo $this->lang->line("guardian_present_address"); ?></label>
                    <input type="text" class="form-control" id="validationCustom01" placeholder=" " name="guardian_present_address" value="" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>




                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                    <label for="validationCustom01"><?php echo $this->lang->line("guardian_permanent_address"); ?></label>
                    <input type="text" class="form-control" id="validationCustom01" placeholder=" " name="guardian_permanent_address" value="" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

                <div class="col-xl-4 col-lg-6 col-md-4 col-sm-4 col-4">
                    <label for="validationCustom01"><?php echo $this->lang->line("emergency_contact"); ?></label>
                    <input type="text" class="form-control" id="validationCustom01" placeholder=" " name="emergency_contact" value="" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>


            </div>



            <br><br>

            <!--  Admission Type and Status Form-->

            <h4 <label for="validationCustom01" class="middle_bar_background"><?php echo $this->lang->line("admission_details"); ?></label>



            </h4>
            <br>
            <div class="row">

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 ">


                    <label for="validationCustom01"><?php echo $this->lang->line("version"); ?></label>

                    <select class="form-control" id="version_id" name="version" onchange="test2()" require>
                        <option value="" selected>Select</option>
                        <?php
                        if (isset($allPdt1)) {
                            foreach ($allPdt1 as $value) {

                        ?>

                                <option value="<?php echo $value->ID ?>"><?php echo $value->VERSION ?></option>

                        <?php
                            }
                        }

                        ?>
                    </select>


                    <div class="valid-feedback">
                        Looks good!
                    </div>




                </div>





                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 ">
                    <label for="validationCustom01"><?php echo $this->lang->line("class"); ?></label>

                    <select class="form-control" name="class" id="class_id" required="">
                        <option value="" selected><?php echo $this->lang->line("class"); ?></option>


                    </select>


                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>


                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">

                    <label for="validationCustom01"><?php echo $this->lang->line("admission_type"); ?></label>
                    <select class="form-control" id="validationCustom01" name="admission_type">
                        <option value="">Select Type</option>
                        <option value="Offline">Offline</option>
                        <option value="Online">Online</option>

                    </select>


                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>




            </div>

            <br>







            <br><br>

            <div class="form-row">

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                    <button class="btn btn-primary" type="submit">Submit form</button>
                </div>
            </div>
        </form>


    </div>
    <!-- ============================================================== -->
    <!-- end validation form -->
    <!-- ============================================================== -->
    </div>




    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->

    <script>
        $('#form').parsley();
    </script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
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




    <!--copy end -->




    </div>

    <script src="<?php echo base_url(); ?>front/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url(); ?>front/js/jquery-migrate-3.0.0.js"></script>
    <script src="<?php echo base_url(); ?>front/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>front/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>front/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url(); ?>front/js/jquery.sticky.js"></script>
    <script src="<?php echo base_url(); ?>front/js/jquery.waypoints.min.js"></script>
    <script src="<?php echo base_url(); ?>front/js/jquery.animateNumber.min.js"></script>
    <script src="<?php echo base_url(); ?>front/js/jquery.fancybox.min.js"></script>
    <script src="<?php echo base_url(); ?>front/js/jquery.stellar.min.js"></script>
    <script src="<?php echo base_url(); ?>front/js/jquery.easing.1.3.js"></script>
    <script src="<?php echo base_url(); ?>front/js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url(); ?>front/js/aos.js"></script>

    <script src="<?php echo base_url(); ?>front/js/main.js"></script>

</body>

</html>

<script>
    function test2() {





        var c = document.getElementById("version_id").value;

        var sc = "";
        if (c == 0) {
            sc += "<option value='0'>Choose Version First</option>";
        }

        <?php



        foreach ($allPdt1 as $vr) {


            echo "else if (c==$vr->ID){";


            foreach ($allPdt2 as $cls) {



                if ($vr->ID == $cls->VERSIONSID) {

                    echo "sc += '<option  value=\"{$cls->ID}\">$cls->CLASSES</option>';";
                }
            }

            echo "}";
        }

        ?>
        // alert(sc);



        $("#class_id").html(sc);


    }
</script>