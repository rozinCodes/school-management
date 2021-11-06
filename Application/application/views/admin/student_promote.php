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
            <h2><?php echo $this->lang->line("promote_student"); ?></h2>
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
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line("promote_student"); ?></li>
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

                        <form class="needs-validation" novalidate="" action="<?php echo base_url() ?>admin/student/student_for_promote" method="post">

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
                                        <option selected="selected" disabled="disabled">Select </option>
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
                                        <option selected="selected" disabled="disabled">Select</option>
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

                                    <label for="validationCustom01"><?php echo $this->lang->line("exam_name"); ?></label>
                                    <select class="form-control" id="validationCustom01" name="exam_name" required="">
                                        <option selected="selected" disabled="disabled">Select</option>
                                        <?php
                                        if (isset($allPdt5)) {
                                            foreach ($allPdt5 as $value) {

                                        ?>

                                                <option value="<?php echo $value->ID ?>"><?php echo $value->EXAM_NAME ?></option>

                                        <?php
                                            }
                                        }

                                        ?>
                                    </select>

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

        <div class="row">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <h2><?php echo $this->lang->line("promote_student"); ?></h2>
            </div>

            <!-- ============================================================== -->
            <!-- validation form -->
            <!-- ============================================================== -->

            <!-- end validation form -->


            <form style="width: 100%;" action="<?php echo base_url() ?>admin/student/student_promote" method="post">

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h5 class="card-header"><?php echo $this->lang->line("result"); ?></h5>
                        </div>




                        <div class="card-body dataTables_wrapper no-footer">
                            <div class="table-responsive">
                                <div class="section_print" id="section-to-print">
                                    <table class="table " style="width:100%">
                                        <thead>
                                            <tr>
                                                <!--  <th><?php //echo $this->lang->line("id"); 
                                                            ?></th> -->
                                                <th><?php echo "Serial No"; ?></th>
                                                <th><?php echo $this->lang->line("admission_no"); ?></th>


                                                <th><?php echo $this->lang->line("f_name"); ?></th>
                                                <th><?php echo $this->lang->line("class"); ?></th>
                                                <th><?php echo $this->lang->line("section"); ?></th>
                                                <th><?php echo $this->lang->line("session"); ?></th>
                                                <th><?php echo $this->lang->line("exam_name"); ?></th>

                                                <th><?php echo $this->lang->line("marks"); ?></th>
                                                <th><?php echo $this->lang->line("status"); ?></th>
                                                <th><?php echo $this->lang->line("action"); ?></th>
                                                <th><?php echo $this->lang->line("promote_student"); ?></th>




                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php

                                            if (isset($allPdt) && isset($dsf)) {
                                                $i = 1;
                                                $j = 0;
                                                foreach ($allPdt as  $value) {
                                            ?>

                                                    <tr>
                                                        <!--  <td><?php //echo $value->ID
                                                                    ?></td> -->
                                                        <td><?php echo $i++ ?></td>
                                                        <td><?php echo $value->ADMISSION_NO ?></td>
                                                        <td><?php echo $value->F_NAME ?></td>
                                                        <td><?php echo $value->CLASS_NAME ?></td>
                                                        <td><?php echo $value->SECTION_NAME ?></td>
                                                        <td><?php echo $value->SESSION_NAME ?></td>
                                                        <td><?php echo $value->EXAM_NAME ?></td>
                                                        <td><?php echo $value->MARKS ?></td>
                                                        <?php
                                                        if ($dsf[$j] == "Pass") { ?>
                                                            <td> <small class="label label-success"><?php echo $dsf[$j];  ?></small></td><?php
                                                            } else if ($dsf[$j] == "Fail") { ?>
                                                            <td> <small class="label label-danger"><?php echo $dsf[$j];  ?></small></td><?php
                                                            } 
                                                            else if ($dsf[$j] == "NOT INSERTED") { ?>
                                                                <td> <small class="label label-danger"><?php echo $dsf[$j];  ?></small></td><?php
                                                                } 
                                                            
                                                            ?>


                                                        <td class="">


                                                            <a target="_blank" href="<?php $id1 = 1234.4354 * ($value->STUDENT_ID) + 999.234 / 2;
                                                                                        $id2 = 1234.4354 * ($value->EXAM_ID) + 999.234 / 2;
                                                                                        echo base_url() ?>admin/exams/result_report/result_details/details/<?php echo $id1 ?>/<?php echo $id2 ?>" class="btn btn-default btn-xs" data-toggle="tooltip" title="" data-original-title="Show">
                                                                <i class="fas fa-align-justify"></i>
                                                            </a>
                                                        </td>




                                                        <?php

                                                        if ($dsf[$j] == "Pass") { ?>
                                                            <td>
                                                                <input type="hidden" name="marks[<?php echo $value->STUDENT_ID ?>]" value="[<?php echo $value->MARKS ?>]" />
                                                                <label><input type="checkbox" name="promote[<?php echo $value->STUDENT_ID ?>]" id="option1" value="<?php echo $dsf[$j] ?>" checked> Promote</label>
                                                            </td><?php
                                                                }
                                                                    ?>


                                                    </tr>


                                                <?php

                                                    $j++;
                                                } ?>

                                                <!-- input for promote start -->
                                                <div class="row">
                                                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 ">
                                                        <label for="validationCustom01"><?php echo $this->lang->line("version"); ?></label>

                                                        <select class="form-control" id="version_id2" name="version_id" onchange="test3()" required>
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

                                                        <select class="form-control" name="class_id" id="class_id2" required="">
                                                            <option value="" selected><?php echo $this->lang->line("class"); ?></option>


                                                        </select>


                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-2 col-lg-2  col-md-2 col-sm-2 col-2 ">

                                                        <label for="validationCustom01"><?php echo $this->lang->line("section"); ?></label>
                                                        <select class="form-control" id="validationCustom01" name="section_id" required>
                                                            <option value="" selected>Select</option>
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
                                                        <select class="form-control" id="validationCustom01" name="session_id" required>
                                                            <option value="" selected>Select</option>
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


                                                </div>

                                                <br>

                                                <!-- input for promote end -->


                                                <td><button id="myBtn" class="btn btn-info btn-border">promote</button></td>
                                            <?php
                                            }

                                            ?>

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






    <!-- ============================================================== -->
</div>


<!-- Down panel End -->




</div>

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


<script>
    function
    test2() {





        var c = document.getElementById("version_id").value;
        alert(c);
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
    function
    test3() {





        var c = document.getElementById("version_id2").value;
        alert(c);
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



        $("#class_id2").html(sc);


    }
</script>