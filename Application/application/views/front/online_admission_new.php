<!doctype html>
<html lang="en">
  <head>
      <title><?php if(isset($title)){ echo $title; }?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?php echo base_url(); ?>assets/images/icon/favicon-16x16.png" type="image/x-icon" />
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


        <!-- jquery calender-->
        <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
              rel = "stylesheet">
        <script src="<?php echo base_url(); ?>front/js/jquery-3.3.1.min.js"></script>
        <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>


    </head>


    <style>
        .card-header{
            border-left: 5px solid #2d0d38;
            background-color: #736271;
            border-radius: 5px;
            margin: 20px 30px;
            border-radius: 5px;
             

        }
        .card-header h5{
            color:#fff;
            font-weight: bold;
            text-transform: uppercase;
            text-align: justify;
            font-family: "Lucida Console", Courier, monospace;
        }
        label{
            color:#914464;
            font-weight: bold;
            margin-top: 5px;
            text-transform: capitalize;
        }
        .form-view{
            margin:0px 30px;
        }
        .form-input{
            border-color: rgb(60, 181, 129);
            border-radius: 5px;
            height: 45px;
        }
        .form-input:focus {
            border: 2px solid #555;
        }

        .form-row{
            margin: 20px;
        }
    </style>
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
                  <?php 
                    $general_info = $this->common_model->view_data("GENERAL_SETTINGS", "", "ID", "DESC"); 
                    foreach ($general_info as $gi) { ?>
                    <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>uploads/school_info/logo/<?php echo $gi->SCHOOL_LOGO; ?>" width="100" height="50" style="margin-right: 150px" /><?php echo $gi->SCHOOL_NAME; ?></a><?php
                    }
                  ?>
                    
                </div>
                        </div>
                        <div class="site-quick-contact d-none d-lg-flex ml-auto ">
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
                  <li><a href="<?php echo base_url() ?>onlineadmission" class="nav-link">Admission</a></li>
                     <li><a href="#" class="nav-link">Contact</a></li>
                     <?php
                     $id=$this->session->userdata("id");
                     if($id){
                     ?>
                       <li><a href="<?php echo base_url(); ?>admin/login/logout" class="nav-link">Logout</a></li>
                         <li><a href="<?php echo base_url(); ?>dashboard" class="nav-link">Dashboard</a></li>
                     <?php
                     }else{
                     ?>
                     <li><a href="<?php echo base_url(); ?>login" class="nav-link">Login</a></li>
                     
                     <?php
                     }
                     ?>
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





<footer style="background-image: url('assets/images/admissionimg.png'); background-repeat: no-repeat;background-attachment: fixed;
  background-size: cover;" class="site-footer">
    <div class="container">
        <div class="row">


        </div>

    </div>
</footer>

</div>









<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
   

    <form enctype="multipart/form-data" class="needs-validation" novalidate action="<?php echo base_url() ?>onlineadmission/insert" method="post">

 <div class="card-header">

        <h5><?php echo $this->lang->line("personal_info"); ?></h5>
    </div>

        <div class="form-view">
            <div class="row">
                <div class="col-xs-12 col-lg-4 col-md-4 col-sm-6  col-xl-3">
                    <label for="validationCustom01"><?php echo $this->lang->line("f_name"); ?></label>
                    <input type="text" class="form-control form-input" id="validationCustom01" placeholder=" " name="fname" value="" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

                <div class="col-xs-12 col-lg-4 col-md-4 col-sm-6  col-xl-3">
                    <label for="validationCustom01"><?php echo $this->lang->line("l_name"); ?></label>
                    <input type="text" class="form-control form-input" id="validationCustom01" placeholder="" name="lname" value="" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

                <div class="col-xs-12 col-lg-4 col-md-4 col-sm-6  col-xl-3">
                    <label for="validationCustom01"><?php echo $this->lang->line("gender"); ?></label>

                    <select class="form-control form-input" id="validationCustom01" name="gender">
                        <option value="0">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                             <option value="others">Others</option>

                    </select>


                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

                <div class="col-xs-12 col-lg-4 col-md-4 col-sm-6  col-xl-3">
                    <label for="validationCustom01"><?php echo $this->lang->line("date_of_birth"); ?></label>

                    <input type="text" class="form-control form-input" id="datepicker-13" name="date_of_birth" placeholder=" name" value="" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-xs-12 col-lg-4 col-md-4 col-sm-6  col-xl-3">
                    <label for="validationCustom01"><?php echo $this->lang->line("religion"); ?></label>
                    <input type="text" class="form-control form-input" id="validationCustom01" placeholder=" " name="religion" value="" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

                <div class="col-xs-12 col-lg-4 col-md-4 col-sm-6  col-xl-3">
                    <label for="validationCustom01"><?php echo $this->lang->line("mobile_no"); ?></label>
                    <input type="text" class="form-control form-input" id="validationCustom01" placeholder="" name="mobile_no" value="" >
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

                <div class="col-xs-12 col-lg-4 col-md-4 col-sm-6  col-xl-3">
                    <label for="validationCustom01"><?php echo $this->lang->line("email"); ?></label>
                    <input type="text" class="form-control form-input" id="validationCustom01" placeholder="" name="email" value="" >
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>



                <div class="col-xs-12 col-lg-4 col-md-4 col-sm-6  col-xl-3">
                    <label for="validationCustom01"><?php echo $this->lang->line("admission_date"); ?></label>

                    <input type="text" class="form-control form-input" id="datepicker-14" name="admission_date" placeholder=" name" name="admission_date" value="" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-xs-12 col-lg-4 col-md-4 col-sm-6  col-xl-3">
                    <label for="validationCustom01"><?php echo $this->lang->line("student_image"); ?></label>

                    <input class="form-control form-input" type="file" name="pic[]" multiple="multiple" id="file"  autocomplete="off" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

                <div class="col-xs-12 col-lg-4 col-md-4 col-sm-6  col-xl-3">
                    <label for="validationCustom01"><?php echo $this->lang->line("blood_group"); ?></label>
                    <select class="form-control form-input" id="validationCustom01" name="blood_group">
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

                <div class="col-xs-12 col-lg-4 col-md-4 col-sm-6  col-xl-3">
                    <label for="validationCustom01"><?php echo $this->lang->line("present_address"); ?></label>
                    <textarea type="text" class="form-control form-input" id="validationCustom01" placeholder="" name="present_address" value="" required></textarea>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>



                <div class="col-xs-12 col-lg-4 col-md-4 col-sm-6  col-xl-3">
                    <label for="validationCustom01"><?php echo $this->lang->line("permanent_address"); ?></label>
                    <textarea type="text" class="form-control form-input" id="validationCustom01" placeholder="" name="permanent_address" value="" required></textarea>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

            </div>
        </div>


        <div class="card-header">
            <h5><?php echo $this->lang->line("parent_detail"); ?></h5>
        </div>

        <div class="form-view">
            <div class="row">
                <div class="col-xs-12 col-lg-4 col-md-4 col-sm-6  col-xl-3">
                    <label for="validationCustom01"><?php echo $this->lang->line("father_name"); ?></label>
                    <input type="text" class="form-control form-input" id="validationCustom01" placeholder=" " name="father_name" value="" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

                <div class="col-xs-12 col-lg-4 col-md-4 col-sm-6  col-xl-3">
                    <label for="validationCustom01"><?php echo $this->lang->line("father_phone"); ?></label>
                    <input type="text" class="form-control form-input" id="validationCustom01" placeholder="" name="father_phone" value="" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

                <div class="col-xs-12 col-lg-4 col-md-4 col-sm-6  col-xl-3">
                    <label for="validationCustom01"><?php echo $this->lang->line("father_occupation"); ?></label>
                    <input type="text" class="form-control form-input" id="validationCustom01" placeholder="" name="father_occupation" value="" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>



                <div class="col-xs-12 col-lg-4 col-md-4 col-sm-6  col-xl-3">
                    <label for="validationCustom01"><?php echo $this->lang->line("father_photo"); ?></label>

                    <input class="form-control form-input" type="file" id="file" name="pic[]" multiple="multiple" autocomplete="off" >
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-xs-12 col-lg-4 col-md-4 col-sm-6  col-xl-3">
                    <label for="validationCustom01"><?php echo $this->lang->line("mother_name"); ?></label>
                    <input type="text" class="form-control form-input" id="validationCustom01" placeholder=" " name="mother_name" value="" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

                <div class="col-xs-12 col-lg-4 col-md-4 col-sm-6  col-xl-3">
                    <label for="validationCustom01"><?php echo $this->lang->line("mother_phone"); ?></label>
                    <input type="text" class="form-control form-input" id="validationCustom01" placeholder="" name="mother_phone" value="" >
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

                <div class="col-xs-12 col-lg-4 col-md-4 col-sm-6  col-xl-3">
                    <label for="validationCustom01"><?php echo $this->lang->line("mother_occupation"); ?></label>
                    <input type="text" class="form-control form-input" id="validationCustom01" placeholder="" name="mother_occupation" value="" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>



                <div class="col-xs-12 col-lg-4 col-md-4 col-sm-6  col-xl-3">
                    <label for="validationCustom01"><?php echo $this->lang->line("mother_photo"); ?></label>

                    <input class="form-control form-input" type="file" id="file" name="pic[]" multiple="multiple" size="20" autocomplete="off" >
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

            </div>
        </div>




        <div class="card-header">
            <h5><?php echo $this->lang->line("gurdian_detail"); ?></h5>
        </div>



        <div class="form-view">
            <div class="row">
                <div class="col-xs-12 col-lg-4 col-md-4 col-sm-6  col-xl-3">
                    <label for="validationCustom01"><?php echo $this->lang->line("guardian_name"); ?></label>
                    <input type="text" class="form-control form-input" id="validationCustom01" placeholder=" " name="guardian_name" value="" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

                <div class="col-xs-12 col-lg-4 col-md-4 col-sm-6  col-xl-3">
                    <label for="validationCustom01"><?php echo $this->lang->line("guardian_phone"); ?></label>
                    <input type="text" class="form-control form-input" id="validationCustom01" placeholder="" name="guardian_phone" value="" >
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

                <div class="col-xs-12 col-lg-4 col-md-4 col-sm-6  col-xl-3">
                    <label for="validationCustom01"><?php echo $this->lang->line("guardian_occupation"); ?></label>
                    <input type="text" class="form-control form-input" id="validationCustom01" placeholder="" name="guardian_occupation" value="" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>



                <div class="col-xs-12 col-lg-4 col-md-4 col-sm-6  col-xl-3">
                    <label for="validationCustom01"><?php echo $this->lang->line("guardian_photo"); ?></label>

                    <input class="form-control form-input" type="file"  name="pic[]" multiple="multiple" id="file" size="20" autocomplete="off" >
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>






                <div class="col-xs-12 col-lg-4 col-md-4 col-sm-6  col-xl-4">
                    <label for="validationCustom01"><?php echo $this->lang->line("guardian_present_address"); ?></label>
                    <textarea type="text" class="form-control form-input" id="validationCustom01" placeholder=" " name="guardian_present_address" value="" required></textarea>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>




                <div class="col-xs-12 col-lg-4 col-md-4 col-sm-6  col-xl-4">
                    <label for="validationCustom01"><?php echo $this->lang->line("guardian_permanent_address"); ?></label>
                    <textarea type="text" class="form-control form-input" id="validationCustom01" placeholder=" " name="guardian_permanent_address" value="" required></textarea>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

                <div class="col-xs-12 col-lg-4 col-md-4 col-sm-6  col-xl-4">
                    <label for="validationCustom01"><?php echo $this->lang->line("emergency_contact"); ?></label>
                    <input type="text" class="form-control form-input" id="validationCustom01" placeholder=" " name="emergency_contact" value="" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>


            </div>



        </div>

        <!--  Admission Type and Status Form-->
        <div class="card-header">
            <h5><?php echo $this->lang->line("admission_details"); ?></h5>
        </div>

        <div class="form-view">

            <div class="row">

                <div class="col-xs-12 col-lg-6 col-md-6 col-sm-6  col-xl-6">


                    <label for="validationCustom01"><?php echo $this->lang->line("version"); ?></label>

                    <select class="form-control form-input" id="version_id" name="version" onchange="test2()" require>
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





                <div class="col-xs-12 col-lg-6 col-md-6 col-sm-6  col-xl-6">
                    <label for="validationCustom01"><?php echo $this->lang->line("class"); ?></label>

                    <select class="form-control form-input" name="class" id="class_id" required="">
                        <option value="" selected>Choose Version first</option>


                    </select>


                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>






            </div>

        </div>

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




<!--copy end -->




</div>

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

<script>
    $(function () {
        $("#datepicker-13").datepicker();
        // $( "#datepicker-13" ).datepicker("show");
        $("#datepicker-14").datepicker();
        $("#datepicker-13").datepicker().datepicker("setDate", new Date());
        $("#datepicker-14").datepicker().datepicker("setDate", new Date());
        $("#datepicker-15").datepicker();
        $("#datepicker-16").datepicker();
    });
</script>