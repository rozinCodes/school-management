<!-- ============================================================== -->
<!-- end left sidebar -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- wrapper  -->

<!-- ============================================================== -->
<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <h2><?php echo $this->lang->line("four_subject_assign"); ?></h2>
        </div>


        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title"><?php echo $this->lang->line("sections"); ?> </h2>

                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("dashboard"); ?></a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("student_info"); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line("four_subject_assign"); ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- end pageheader -->

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header"></h5>

                    <div class="card-body">
                        <h2 style="color:green"> <?php
                                                    $dt = $this->session->userdata("msg");
                                                    if ($dt != NULL) {
                                                        echo $dt;
                                                        $this->session->unset_userdata("msg");
                                                    }
                                                    ?></h2>

                        <form class="needs-validation" novalidate="" action="<?php echo base_url() ?>admin/student/four_subject_assign" method="post">

                            <div class="row">

                                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 ">
                                    <label for="validationCustom01"><?php echo $this->lang->line("version"); ?></label>

                                    <select class="form-control" id="version_id" name="version" onchange="test2()" required="">
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

                                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 ">
                                    <label for="validationCustom01"><?php echo $this->lang->line("class"); ?></label>

                                    <select class="form-control" name="class" id="class_id" required="">
                                        <option value="" selected><?php echo $this->lang->line("class"); ?></option>


                                    </select>


                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="col-xl-2 col-lg-2  col-md-2 col-sm-2 col-2 ">

                                    <label for="validationCustom01"><?php echo $this->lang->line("section"); ?></label>
                                    <select class="form-control" id="validationCustom01" name="section" required="">
                                        <option value="" selected="selected" disabled="disabled">Select </option>
                                        <?php
                                        if (isset($allPdt3)) {
                                            foreach ($allPdt3 as $value) {
                                        ?>
                                                <option value="<?php echo $value->ID ?>"><?php echo $value->NAME ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-xl-2 col-lg-2  col-md-2 col-sm-2 col-2 ">
                                    <label for="validationCustom01"><?php echo $this->lang->line("session"); ?></label>
                                    <select class="form-control" id="validationCustom01" name="session" required="">
                                        <option value="" selected="selected" disabled="disabled">Select</option>
                                        <?php
                                        if (isset($allPdt4)) {
                                            foreach ($allPdt4 as $value) {

                                        ?>
                                                <option value="<?php echo $value->ID ?>"><?php echo $value->SESSIONS ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>

                                </div>
                                <div class="col-xl-2 col-lg-2  col-md-2 col-sm-2 col-2 ">

                                    <label for="validationCustom01"><?php echo $this->lang->line("student_id"); ?></label>
                                    <input  type="text" class="form-control" id="student_id" onkeyup="showStudent()" placeholder="Search for names.." required="">
                                    <input  type="hidden" class="form-control" name="student_id" id="name2" required="">
                                    <br>
                                    <p id="name"> </p>

                                    <!-- <input type="text" class="form-control" id="name" placeholder=" " name="name" value="" > -->
                                </div>
                                <div class="col-xl-2 col-lg-2  col-md-2 col-sm-2 col-2 ">
                                    <button class="btn btn-primary my_btn_style" type="submit">Search</button>
                                </div>
                            </div>

                            <br>

                            <br><br> <br>

                        </form>
                    </div>
                </div>
            </div>
            <!-- -->
        </div>

        


       


        <!-- Down Panel start-->
        <?php
        if (isset($student)) {
        ?>
            <div class="row">

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <h2><?php echo $this->lang->line("active_students"); ?></h2>
                </div>

                <!-- ============================================================== -->
                <!-- validation form -->
                <!-- ============================================================== -->

                <!-- end validation form -->


                <form style="width: 100%;" action="<?php echo base_url() ?>admin/student/add_four_subject" method="post">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">


                            <div class="card-body dataTables_wrapper no-footer">
                                <div class="table-responsive">
                                    <div class="section_print" id="section-to-print">
                                        <table class="table " style="width:100%">
                                            <thead>
                                                <tr>
                                                    <!--  <th><?php //echo $this->lang->line("id"); 
                                                                ?></th> -->



                                                    <th><?php echo $this->lang->line("f_name"); ?></th>
                                                    <th><?php echo $this->lang->line("class"); ?></th>
                                                    <th><?php echo $this->lang->line("section"); ?></th>
                                                    <th><?php echo $this->lang->line("session"); ?></th>
                                                    <th><?php echo $this->lang->line("four_subject_assign"); ?></th>




                                                </tr>
                                            </thead>

                                            <tbody>



                                                <tr>


                                                    <td><?php echo $student->F_NAME ?></td>
                                                    <input type="hidden" name="student_id" value="<?php echo $student->STUDENT_ID ?>" required="">
                                                    <td><?php echo $student->CLASSES ?></td>
                                                    <input type="hidden" name="class_id" value="<?php echo $student->CLASS_ID ?>" required="">
                                                    <td><?php echo $student->NAME ?></td>
                                                    <input type="hidden" name="section_id" value="<?php echo $student->SECTION_ID ?>" required="">
                                                    <td><?php echo $student->SESSIONS ?></td>
                                                    <input type="hidden" name="session_id" value="<?php echo $student->SESSION_ID ?>" required="">
                                                    <td> <select class="form-control" id="validationCustom01" name="subject_id" required="">
                                                            <option value="" selected="selected" disabled="disabled">Select</option>
                                                            <?php
                                                            if (isset($allSub)) {
                                                                foreach ($allSub as $value) {

                                                            ?>

                                                                    <option value="<?php echo $value->ID ?>"><?php echo $value->NAME ?></option>

                                                            <?php
                                                                }
                                                            }

                                                            ?>
                                                        </select></td>




                                                </tr>





                                                <td><button id="myBtn" class="btn btn-info btn-border">Submit</button></td>
                                          

                                            </tbody>



                                        </table>


                                    </div>

                                </div>
                                <br>

                            </div>
                </form>

                




            </div>
            <?php

}
    ?>


            <!-- ============================================================== -->
            
 <!-- Down Panel 2 start-->
 <?php
if (isset($allStd_foursub)) {
?>
    <div class="row">

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <h2><?php echo $this->lang->line("subjects_name"); ?></h2>
        </div>

        <!-- ============================================================== -->
        <!-- validation form -->
        <!-- ============================================================== -->

        <!-- end validation form -->

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">


                <div class="table table-striped table-bordered first">
                    <div class="table-responsive">
                            <table class="table " style="width:100%">
                                <thead>
                                    <tr>
                                        <!--  <th><?php //echo $this->lang->line("id"); 
                                                    ?></th> -->



                                        <th><?php echo $this->lang->line("f_name"); ?></th>
                                        <th><?php echo $this->lang->line("class"); ?></th>
                                        <th><?php echo $this->lang->line("section"); ?></th>
                                        <th><?php echo $this->lang->line("session"); ?></th>
                                        <th><?php echo $this->lang->line("four_subject_assign"); ?></th>
                                        
                                        <th><?php echo $this->lang->line("delete"); ?></th>




                                    </tr>
                                </thead>

                                <tbody>
                                    <?php

                                    foreach ($allStd_foursub as $value) {


                                    ?>

                                        <tr>

                                            <td><?php echo $value->F_NAME ?></td>

                                            <td><?php echo $value->CLASSES ?></td>

                                            <td><?php echo $value->NAME ?></td>

                                            <td><?php echo $value->SESSIONS ?></td>

                                            <td><?php echo $value->SEUJECT_NAME ?></td>
                                            
                                               <td><a href="<?php echo base_url() ?>admin/student/delete_four_subject/delete/<?php
                                                   echo $value->ID ?>"><?php echo $this->lang->line("delete"); ?></a></td>

                                        </tr>
                                <?php

                                    }?>
                                

                                </tbody>



                            </table>


                        

                    </div>
                    <br>

                </div>

            </div>


            <!-- ============================================================== -->
        </div>

        <!-- ============================================================== -->
    </div>
    <?php 
    }
    ?>
   


    <!-- Down panel 2 End -->



    </div>

    <!-- ============================================================== -->
</div>


<!-- Down panel End -->
















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


    <script>
        function
        test2() {





            var c = document.getElementById("version_id").value;
            // alert(c);
            var sc = "";
            if (c == 0) {
                sc += "<option value='0'>Choose Teacher First</option>";
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
        function showStudent() {
            var c = document.getElementById("student_id").value;
            // alert(c);
            var sc = "";
            var sc2 = "";
            if (c == 0) {
                sc += "";
            }

            <?php
            foreach ($allStd as $tr) {
                echo "else if (c==$tr->ADMISSION_NO){";
                echo "sc += '$tr->F_NAME';";
                echo "sc2 += '$tr->ID';";
                //echo "sc += value=\"{$tr->ID}\";"; 
                // echo "sc += '<option  value=\"{$cls->ID}\">$cls->CLASSES</option>';";

                echo "}  ";
            }





            foreach ($allStd as $tr) {
                echo "else if (c!=$tr->ADMISSION_NO){";
                echo "sc += 'Not match';";
                echo "sc2 += 'null';";

                echo "} ";
            }
            ?>
            // alert(sc);
            $("#name").html(sc);
            // $("#name2").html(sc2);
            document.getElementById("name2").value = sc2;

        }
    </script>