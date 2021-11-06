<!-- ============================================================== -->
<!-- end left sidebar -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- wrapper  -->
<!-- ============================================================== -->



</div>


<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->



        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <h2><?php echo $this->lang->line("result"); ?></h2>
        </div>


        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title"><?php echo $this->lang->line("sections"); ?> </h2>

                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("dashboard"); ?></a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("exams"); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line("result"); ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- =====================================Search Student========================= -->

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

                        <form class="needs-validation" novalidate="" action="<?php echo base_url() ?>admin/exams/Result_report/result" method="post">

                            <div class="row">

                                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 ">
                                    <label for="validationCustom01"><?php echo $this->lang->line("version"); ?></label>

                                    <select class="form-control" id="version_id" name="version" onchange="test2()" required="">
                                        <option value="" selected>Select</option>
                                        <?php
                                        if (isset($allPdt4)) {
                                            foreach ($allPdt4 as $value) {

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

                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
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
                                    <select class="form-control" id="validationCustom01" name="section" required>
                                        <option value="" selected>Select</option>
                                        <?php
                                        if (isset($allPdtsec)) {
                                            foreach ($allPdtsec as $value) {

                                        ?>

                                                <option value="<?php echo $value->ID ?>"><?php echo $value->NAME ?></option>

                                        <?php
                                            }
                                        }

                                        ?>
                                    </select>

                                </div>

                                <div class="col-xl-2 col-lg-2  col-md-2 col-sm-2 col-2 ">

                                    <label for="validationCustom01"><?php echo $this->lang->line("exam_name"); ?></label>
                                    <select class="form-control" id="validationCustom01" name="exam" required>
                                        <option value="" selected>Select</option>
                                        <?php
                                        if (isset($allPdtexam)) {
                                            foreach ($allPdtexam as $value) {

                                        ?>

                                                <option value="<?php echo $value->ID ?>"><?php echo $value->EXAM_NAME ?></option>

                                        <?php
                                            }
                                        }

                                        ?>
                                    </select>

                                </div>

                                <div class="col-xl-2 col-lg-2  col-md-2 col-sm-2 col-2 ">

                                    <label for="validationCustom01"><?php echo $this->lang->line("session"); ?></label>
                                    <select class="form-control" id="validationCustom01" name="session" required>
                                        <option value="" selected>Select</option>
                                        <?php
                                        if (isset($allPdtsession)) {
                                            foreach ($allPdtsession as $value) {

                                        ?>

                                                <option value="<?php echo $value->ID ?>"><?php echo $value->SESSIONS ?></option>

                                        <?php
                                            }
                                        }

                                        ?>
                                    </select>

                                </div>





                                <div class="col-xl-2 col-lg-2  col-md-2 col-sm-2 col-2 ">

                                    <button class="btn btn-primary my_btn_style" type="submit" target="_blank">Show</button>

                                </div>




                            </div>

                            <br>

                            <br><br> <br>

                        </form>







                    </div>
                </div>
            </div>


            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h5 class="card-header"><?php echo $this->lang->line("result"); ?></h5>
                    </div>




                    <div class="card-body dataTables_wrapper no-footer">
                        <div class="table-responsive">
                            <div class="section_print" id="section-to-print">
                                <table id="example" class="table table-striped table-bordered second" style="width:100%">
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
                                            <th><?php echo $this->lang->line("result"); ?></th>
                                            <th><?php echo $this->lang->line("marks_sheet"); ?></th>




                                        </tr>
                                    </thead>

                                    <tbody>


                                        <?php

                                        if (isset($allPdt) && isset($dsf)) {
                                            $i = 1;
                                            $j=0;
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
                                                        if($dsf[$j]=="PASS"){ ?>
                                                            <td> <small class="label label-success" >PASS</small></td><?php
                                                        }
                                                        else if($dsf[$j]=="FAIL")
                                                        {?>
                                                            <td> <small class="label label-danger" >FAIL</small></td><?php
                                                        }
                                                        else if($dsf[$j]=="NOT INSERTED")
                                                        {
                                                            ?>
                                                            <td> <small class="label label-danger" >NOT INSERTED</small></td><?php
                                                        }


                                                      
                                                    ?>


                                                    <td class="">
                                                        
                                                         
                                                        <a target="_blank" href="<?php   $id1=1234.4354*($value->STUDENT_ID)+999.234/2;$id2= 1234.4354*($value->EXAM_ID)+999.234/2;$id3=$value->F_NAME; echo base_url() ?>admin/exams/result_report/result_details/details/<?php echo $id1 ?>/<?php echo $id2 ?>/<?php  echo $id3 ?>/<?php echo $value->SESSION_ID?>" class="btn btn-default btn-xs" data-toggle="tooltip" title="" data-original-title="Show">
                                                       
                                                            <i class="fas fa-align-justify"></i>
                                                        </a>
                                                    </td>
                                                    <td class="">
                                                        
                                                         
                                                        
                                                        <a target="_blank" href="<?php   $id1=1234.4354*($value->STUDENT_ID)+999.234/2;$id2= 1234.4354*($value->EXAM_ID)+999.234/2;$id3=$value->F_NAME; echo base_url() ?>admin/exams/result_report/marksheetGenerate/marksheet/<?php echo $id1 ?>/<?php echo $id2 ?>/<?php  echo $id3 ?>/<?php echo $value->SESSION_ID?>" class="btn btn-default btn-xs" data-toggle="tooltip" title="" data-original-title="Marksheet Generator">
                                                            <i class="fas fa-align-justify"></i>
                                                           
                                                        </a>
                                                    </td>
                                                </tr>

                                            <?php

                                             $j++;   
                                        }
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



                </div>
                <!-- ============================================================== -->
            </div>











        </div>



        <!-- ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->




    </div>
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- end footer -->
    <!-- ============================================================== -->
</div>


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
    function test2() {





        var c = document.getElementById("version_id").value;
        // alert(c);
        var sc = "";
        if (c == 0) {
            sc += "<option value='0'>Choose Teacher First</option>";
        }

        <?php



        foreach ($allPdt4 as $vr) {


            echo "else if (c==$vr->ID){";


            foreach ($allPdtcls as $cls) {



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