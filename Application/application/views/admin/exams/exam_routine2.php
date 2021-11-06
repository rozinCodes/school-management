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
            <h2><?php echo $this->lang->line("exam_routine"); ?></h2>
        </div>


        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">


                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("dashboard"); ?></a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("exam_routine"); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line("add_routine"); ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- end pageheader -->

        <div class="row">
            <?php
            if (isset($edit)) {

                // if(!$_GET['edit']){
                foreach ($allPdt8 as $value2) {
                    if ($edit == $value2->ID) {
            ?>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                            <div class="card">

                                <h5 class="card-header"><?php echo $this->lang->line("sections") . " " . $this->lang->line("edit"); ?></h5>

                                <div class="card-body">
                                    <h2 style="color:green"> <?php
                                                                $dt = $this->session->userdata("msg");
                                                                if ($dt != NULL) {
                                                                    echo $dt;
                                                                    $this->session->unset_userdata("msg");
                                                                }
                                                                ?></h2>



                                    <form class="needs-validation" novalidate action="<?php echo base_url() ?>admin/exams/exam_routine2/edit_routine/edit/<?php echo $value2->ID ?>" method="post">
                                        <div class="row">



                                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
                                                <label for="validationCustom01"><?php echo $this->lang->line("exam_name"); ?></label>

                                                <select class="form-control" id="exam_name" name="exam_name" required="">
                                                    <option value="" ><?php echo $value2->EXAM_NAME;?></option>
                                                    <?php
                                                    if (isset($allPdt6)) {
                                                        foreach ($allPdt6 as $value) {

                                                    ?>

                                                            <option value="<?php echo $value->ID ?>"><?php echo $value->EXAM_NAME ?></option>

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
                                                <label for="validationCustom01"><?php echo $this->lang->line("exam_date"); ?></label>

                                                <input type="text" class="form-control"  name="exam_date"  name="exam_date" value="<?php echo $value2->E_DATE; ?>" id="datepicker155" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>




                                            <div class="col-xl-2 col-lg-2  col-md-2 col-sm-2 col-2">
                                                <label for="validationCustom01"><?php echo $this->lang->line("period_start_time"); ?></label>
                                                <!-- <input type="time" id="appt" name="appt"> -->
                                                <input type="time" class="form-control" id="period_start_time" placeholder=" " name="period_start_time" onchange="compare();" value="<?php echo $value2->START_TIME;?>" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>


                                            </div>
                                            <div class="col-xl-2 col-lg-2  col-md-2 col-sm-2 col-2">
                                                <label for="validationCustom01"><?php echo $this->lang->line("period_end_time"); ?></label>

                                                <input type="time" class="form-control" id="period_end_time" placeholder="" name="period_end_time" onchange="compare();" value="<?php echo $value2->END_TIME;?>" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>


                                            </div>
                                            <div class="col-xl-2 col-lg-2  col-md-2 col-sm-2 col-2">
                                                <label for="validationCustom01"><?php echo $this->lang->line("period_duration"); ?></label>
                                                <input type="text" class="form-control" id="period_duration" placeholder=" " name="period_duration" onchange="compare();" value="<?php echo $value2->DURATION;?>" required>

                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>


                                            </div>

                                            <div class="col-xl-2 col-lg-2  col-md-2 col-sm-2 col-2">
                                                <label for="validationCustom01"><?php echo $this->lang->line("room_number"); ?></label>
                                                <input type="text" class="form-control" id="validationCustom01" placeholder="Room Number" name="room_number" value="<?php echo $value2->ROOM;?>" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>



                                        </div>

                                        <br>

                                        <div class="row">


                                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
                                                <label for="validationCustom01"><?php echo $this->lang->line("session"); ?></label>

                                                <select class="form-control" id="session_ID" name="session" required="">
                                                    <option value=""  ><?php echo $value2->SESSION_NAME;?></option>
                                                    <?php
                                                    if (isset($allPdt5)) {
                                                        foreach ($allPdt5 as $value) {

                                                    ?>

                                                            <option value="<?php echo $value->ID ?>"><?php echo $value->SESSIONS ?></option>

                                                    <?php
                                                        }
                                                    }

                                                    ?>
                                                </select>

                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>

                                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
                                                <label for="validationCustom01"><?php echo $this->lang->line("version"); ?></label>

                                                <select class="form-control" id="version_id" name="version" onchange="test2()" required="">
                                                    <option value=""  ><?php echo $value2->VERSION;?></option>
                                                    <?php
                                                    if (isset($allPdt)) {
                                                        foreach ($allPdt as $value) {

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

                                                <select class="form-control" name="class" id="class_id" required="" onchange="test3()">
                                                    <option value=""  ><?php echo $value2->CLASSES;?></option>




                                                </select>


                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>

                                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
                                                <label for="validationCustom01"><?php echo $this->lang->line("section"); ?></label>

                                                <select class="form-control" name="section" id="section_id" required="">
                                                    <option value=""  ><?php echo $value2->SECTION_NAME;?></option>


                                                </select>

                                            </div>

                                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 ">

                                                <label for="validationCustom01"><?php echo $this->lang->line("subject"); ?></label>
                                                <select class="form-control" name="subject" id="subject_id" required="">
                                                    <option value="" ><?php echo $value2->NAME;?></option>


                                                </select>




                                            </div>
                                            <div class="col-xl-2 col-lg-2  col-md-2 col-sm-2 col-2 ">

                                                <label for="validationCustom01"><?php echo $this->lang->line("guard"); ?></label>
                                                <select class="form-control" id="guard" name="guard" required="">
                                                    <option value="" ><?php echo $value2->FIRST_NAME;?></option>
                                                    <?php
                                                    if (isset($allPdt7)) {
                                                        foreach ($allPdt7 as $value) {

                                                    ?>

                                                            <option value="<?php echo $value->ID ?>"><?php echo $value->FIRST_NAME ?></option>

                                                    <?php
                                                        }
                                                    }

                                                    ?>
                                                </select>


                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>

                                            </div>




                                        </div>
                                        <br>
                                        <div class="form-row">




                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                                <button class="btn btn-primary" type="submit"><?php echo $this->lang->line("update"); ?></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
            } else {
                ?>


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

                            <form form enctype="multipart/form-data" class="needs-validation" novalidate action="<?php echo base_url() ?>admin/exams/exam_routine2/GenerateRoutine" method="post">

                                <div class="row">



                                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
                                        <label for="validationCustom01"><?php echo $this->lang->line("exam_name"); ?></label>

                                        <select class="form-control" id="exam_name" name="exam_name" required="">
                                            <option value="" selected>Select</option>
                                            <?php
                                            if (isset($allPdt6)) {
                                                foreach ($allPdt6 as $value) {

                                            ?>

                                                    <option value="<?php echo $value->ID ?>"><?php echo $value->EXAM_NAME ?></option>

                                            <?php
                                                }
                                            }

                                            ?>
                                        </select>

                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>

                                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
                                        <label for="validationCustom01"><?php echo $this->lang->line("session"); ?></label>

                                        <select class="form-control" id="session_ID" name="session" required="">
                                            <option value="" selected>Select</option>
                                            <?php
                                            if (isset($allPdt5)) {
                                                foreach ($allPdt5 as $value) {

                                            ?>

                                                    <option value="<?php echo $value->ID ?>"><?php echo $value->SESSIONS ?></option>

                                            <?php
                                                }
                                            }

                                            ?>
                                        </select>

                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>


                                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
                                        <label for="validationCustom01"><?php echo $this->lang->line("version"); ?></label>

                                        <select class="form-control" id="version_id" name="version" onchange="test2()" required="">
                                            <option value="" selected>Select</option>
                                            <?php
                                            if (isset($allPdt)) {
                                                foreach ($allPdt as $value) {

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

                                        <select class="form-control" name="class" id="class_id" required="" onchange="test3()">
                                            <option value="" selected><?php echo $this->lang->line("class"); ?></option>




                                        </select>


                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>

                                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
                                        <label for="validationCustom01"><?php echo $this->lang->line("section"); ?></label>

                                        <select class="form-control" name="section" id="section_id" required="">
                                            <option value="" selected><?php echo $this->lang->line("section"); ?></option>


                                        </select>

                                    </div>
                                    <div class="row pull-right">
                                        <div class="col-xl-2 col-lg-2  col-md-2 col-sm-2 col-2 ">
                                            <button class="btn btn-primary my_btn_style" type="submit">Generate Routine</button>

                                        </div>

                                    </div>
                                </div>


                            </form>

                        </div>
                    </div>
                </div>


            <?php
            }
            ?>



            <!-- -->
        </div>



        <!-- Down Panel start-->
        <?php
        if (isset($allPdtsubject) && isset($allpdtdata)) {
        ?>

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h5 class="card-header"><?php echo $this->lang->line("subjects"); ?></h5>
                    </div>


                    <form class="needs-validation" novalidate="" action="<?php echo base_url() ?>admin/exams/exam_routine2/save_routine" method="post">

                        <div class="card-body dataTables_wrapper no-footer">
                            <div class="table-responsive">
                                <div class="section_print" id="section-to-print">
                                    <!-- <?php
                                            if (isset($allpdtdata)) {

                                                echo $allpdtdata['EXAM'];
                                                echo $allpdtdata['SESSIONS'];
                                                echo $allpdtdata['VERSION'];
                                                echo $allpdtdata['CLASS'];
                                                echo $allpdtdata['SECTION'];
                                            }
                                            ?> -->
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>

                                                <th><?php echo $this->lang->line("subject"); ?></th>
                                                <th><?php echo $this->lang->line("exam_date"); ?></th>
                                                <th><?php echo $this->lang->line("room_number"); ?></th>
                                                <th><?php echo $this->lang->line("period_start_time"); ?></th>
                                                <th><?php echo $this->lang->line("period_end_time"); ?></th>
                                                <th><?php echo $this->lang->line("guard"); ?></th>


                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php




                                            foreach ($allPdtsubject as $value) {
                                            ?>

                                                <tr>
                                                    <td><?php echo $value->NAME ?></td>
                                                    <input type="hidden" class="form-control" id="validationCustom01" name="subject_id[]" value="<?php echo $value->ID ?>">
                                                    <input type="hidden" class="form-control" id="validationCustom01" name="subject_code[]" value="<?php echo $value->CODE ?>">
                                                    <td><input type="date" class="form-control" id="validationCustom01" name="exam_date[]" value="" required></td>
                                                    <td><input type="text" class="form-control" id="validationCustom01" placeholder="Room Number" name="room_number[]" value="" required></td>
                                                    <td><input type="time" class="form-control" id="period_start_time" placeholder=" " name="period_start_time[]" value="" required></td>
                                                    <td><input type="time" class="form-control" id="period_end_time" placeholder=" " name="period_end_time[]" value="" required></td>

                                                    <td> <select class="form-control" id="guard" name="guard[]" required="">
                                                            <option value="" selected>Select</option>
                                                            <?php
                                                            if (isset($allPdt7)) {
                                                                foreach ($allPdt7 as $value) {

                                                            ?>

                                                                    <option value="<?php echo $value->ID ?>"><?php echo $value->FIRST_NAME ?></option>

                                                            <?php
                                                                }
                                                            }

                                                            ?>
                                                        </select></td>



                                                </tr>

                                            <?php

                                            } ?>
                                            <input type="hidden" name="session" value="<?php echo $allpdtdata['SESSIONS']; ?>" required>
                                            <input type="hidden" name="version" value="<?php echo $allpdtdata['VERSION']; ?>" required>
                                            <input type="hidden" name="class" value="<?php echo $allpdtdata['CLASS']; ?>" required>
                                            <input type="hidden" name="section" value="<?php echo $allpdtdata['SECTION']; ?>" required>
                                            <input type="hidden" name="exam_name" value="<?php echo $allpdtdata['EXAM']; ?>" required>

                                            <td> <button class="btn btn-primary my_btn_style" type="submit" require>Submit Routine</button></td>
                                        <?php

                                    } else {

                                        ?>

                                            <!-- start -->
                                            <div class="card-body dataTables_wrapper no-footer">
                                                <div class="table-responsive">
                                                    <div class="section_print" id="section-to-print">
                                                        <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <!--  <th><?php //echo $this->lang->line("id"); 
                                                                                ?></th> -->
                                                                    <th><?php echo $this->lang->line("subject"); ?></th>
                                                                    <th><?php echo $this->lang->line("exam_name"); ?></th>
                                                                    <th><?php echo $this->lang->line("exam_date"); ?></th>
                                                                    <th><?php echo $this->lang->line("day"); ?></th>
                                                                    <th><?php echo $this->lang->line("version"); ?></th>
                                                                    <th><?php echo $this->lang->line("class"); ?></th>
                                                                    <th><?php echo $this->lang->line("section"); ?></th>
                                                                    <th><?php echo $this->lang->line("session"); ?></th>
                                                                    <th><?php echo $this->lang->line("room_number"); ?></th>
                                                                    <th><?php echo $this->lang->line("guard"); ?></th>
                                                                    <th><?php echo $this->lang->line("period_start_time"); ?></th>
                                                                    <th><?php echo $this->lang->line("period_end_time"); ?></th>
                                                                    <th><?php echo $this->lang->line("period_duration"); ?></th>
                                                                    <th><?php echo $this->lang->line("edit"); ?></th>
                                                                    <th><?php echo $this->lang->line("delete"); ?></th>
                                                                </tr>
                                                            </thead>

                                                            <tbody>

                                                                <?php

                                                                if (isset($allPdt8)) {
                                                                    foreach ($allPdt8 as $value) {
                                                                ?>

                                                                        <tr>
                                                                            <td><?php echo $value->NAME ?></td>
                                                                            <td><?php echo $value->EXAM_NAME ?></td>
                                                                            <td><?php echo $value->E_DATE ?> </td>
                                                                            <td><?php echo $value->DAY ?></td>
                                                                            <td><?php echo $value->VERSION ?></td>
                                                                            <td><?php echo $value->CLASSES ?></td>
                                                                            <td><?php echo $value->SECTION_NAME ?></td>
                                                                            <td><?php echo $value->SESSION_NAME ?></td>
                                                                            <td><?php echo $value->ROOM ?></td>
                                                                            <td><?php echo $value->FIRST_NAME ?></td>
                                                                            <td><?php  echo $value->START_TIME ?></td>
                                                                            <td><?php echo $value->END_TIME ?></td>
                                                                            <td><?php echo $value->DURATION ?><?php echo " Hour"; ?></td>

                                                                            <td><a href="<?php echo base_url() ?>admin/exams/exam_routine2/edit_routine/edit/<?php
                                                                                                                                                                echo $value->ID ?>"><?php echo $this->lang->line("edit"); ?></a></td>


                                                                            <td><a href="<?php echo base_url() ?>admin/exams/exam_routine2/delete_routine/delete/<?php
                                                                                                                                                                    echo $value->ID ?>"><?php echo $this->lang->line("delete"); ?></a></td>

                                                                        </tr>

                                                                <?php

                                                                    }
                                                                }

                                                                ?>


                                                            </tbody>
                                                            <tfoot>

                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                    }
                                        ?>
                                        <!-- end -->



                                        </tbody>
                                        <tfoot>

                                        </tfoot>
                                    </table>
                                </div>

                            </div>
                            <br>

                        </div>
                    </form>



                </div>
                <!-- ============================================================== -->
            </div>
            <!-- Down panel End -->




    </div>













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





    <script type="text/javascript">
        document.querySelector("#today2").valueAsDate = new Date();
    </script>


    <script>
        function test2() {
            var c = document.getElementById("version_id").value;
            // alert(c);
            var sc = "";
            if (c == 0) {
                sc += "<option value='0'>Choose Version First</option>";
            }

            <?php



            foreach ($allPdt as $vr) {


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

            test3()

        }
    </script>

    <script>
        function test3() {
            var c = document.getElementById("class_id").value;
            // alert(c);
            var sc = "";
            if (c == 0) {
                sc += "<option value='0'>Choose Class First</option>";
            }

            <?php



            foreach ($allPdt2 as $cls) {


                echo "else if (c==$cls->ID){";


                foreach ($allPdt3 as $sec) {



                    if ($cls->ID == $sec->CLASS_ID) {

                        echo "sc += '<option  value=\"{$sec->SECTION_ID}\">$sec->NAME</option>';";
                    }
                }

                echo "}";
            }

            ?>
            //  alert(sc);



            $("#section_id").html(sc);

            test4()
        }
    </script>

    <script>
        function test4() {
            var c = document.getElementById("class_id").value;
            //  alert(c);
            var sc = "";
            if (c == 0) {
                sc += "<option value='0'>Choose Class First</option>";
            }

            <?php



            foreach ($allPdt2 as $cls) {


                echo "else if (c==$cls->ID){";


                foreach ($allPdt4 as $sub) {



                    if ($cls->ID == $sub->CLASSESID) {

                        echo "sc += '<option  value=\"{$sub->ID}\">$sub->NAME</option>';";
                    }
                }

                echo "}";
            }

            ?>
            //  alert(sc);



            $("#subject_id").html(sc);


        }
    </script>

    <script type="text/javascript">
        function compare() {
            var start = document.getElementById("period_start_time").value;
            var end = document.getElementById("period_end_time").value;
            //alert(start);
            var hour1 = start.split(':')[0];
            var hour2 = end.split(':')[0];
            var difhour = hour2 - hour1;
            var min1 = start.split(':')[1];
            var min2 = end.split(':')[1];
            var difmin = min2 - min1;



            difmin = difmin.toString().length < 2 ? '0' + difmin : difmin;
            if (difmin < 0) {
                difhour--;
                difmin = 60 + difmin;
            }
            difhour = difhour.toString().length < 2 ? '0' + difhour : difhour;


            $('#period_duration').val(difhour + ":" + difmin);

        }
    </script>



<script>
    $(function () {
        $("#datepicker-13").datepicker();
        // $( "#datepicker-13" ).datepicker("show");
                $("#datepicker-14").datepicker();
        $("#datepicker-13").datepicker().datepicker("setDate", new Date());
        $("#datepicker-14").datepicker().datepicker("setDate", new Date());
         $( "#datepicker155" ).datepicker();
          $( "#datepicker156" ).datepicker();
    });
</script>
<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
      rel = "stylesheet">
<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>