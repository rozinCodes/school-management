
<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
    

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <h2><?php echo $this->lang->line("apply_leave"); ?></h2>
        </div>


        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title"><?php echo $this->lang->line("sections"); ?> </h2>

                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("dashboard"); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line("apply_leave"); ?></li>
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

                        <form class="needs-validation" enctype="multipart/form-data" novalidate="" action="<?php echo base_url() ?>student/studentleave/apply_leave" method="post">

                            <div class="row">



                                <div class="col-xl-6 col-lg-6  col-md-6 col-sm-6 col-6 ">

                                    <label for="validationCustom01"><?php echo $this->lang->line("apply_date"); ?></label>
                                    <input type="date" class="form-control" name="apply_date" id="today2">




                                </div>

                                <div class="col-xl-6 col-lg-6  col-md-6 col-sm-6 col-6 ">

                                    <label for="validationCustom01"><?php echo $this->lang->line("teacher_id"); ?></label>
                                    <input type="text" class="form-control" name="teacher_id" id="teacher_id" onkeyup="showTeacher()"  placeholder="Search for names..">
                                    <p id="name"> </p>
                                    <!-- <input type="text" class="form-control" id="name" placeholder=" " name="name" value="" > -->




                                </div>

                            </div>

                            <br>

                            <div class="row">

                                <div class="col-xl-6 col-lg-6  col-md-6 col-sm-6 col-6 ">

                                    <label for="validationCustom01"><?php echo $this->lang->line("from_date"); ?></label>

                                    <input type="date" class="form-control " id="from_date" name="from_date" placeholder=" name" value="" required onchange="compare();">
                                    <span id='message'></span>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>

                                </div>

                                <div class="col-xl-6 col-lg-6  col-md-6 col-sm-6 col-6">
                                    <label for="validationCustom01"><?php echo $this->lang->line("to_date"); ?></label>

                                    <input type="date" class="form-control to_date" id="to_date" name="to_date" placeholder=" name" value="" required onchange="compare();">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>

                                </div>


                            </div>
                            <br>

                            <div class="row">

                                <div class="col-xl-6 col-lg-6  col-md-6 col-sm-6 col-6 ">

                                    <label for="validationCustom01"><?php echo $this->lang->line("reason"); ?></label>



                                    <textarea id="validationCustom01" name="reason" class="form-control"></textarea>


                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>

                                </div>


                                <div class="col-xl-6 col-lg-6  col-md-6 col-sm-6 col-6">
                                    <label for="validationCustom01"><?php echo $this->lang->line("documents"); ?></label>

                                    <input class="form-control" type="file" name="pic[]" multiple="multiple" id="file" size="20" autocomplete="off">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>

                                </div>


                            </div>

                            <div class="row pull-right">
                                <div class="col-xl-4 col-lg-4  col-md-4 col-sm-4 col-4 ">
                                    <button class="btn btn-primary my_btn_style" type="submit">Apply</button>
                                </div>

                            </div>







                        </form>

                    </div>
                </div>
            </div>






            <!-- -->
        </div>


        <!-- Down Panel start-->

        <div class="row">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

            </div>

            <!-- ============================================================== -->
            <!-- validation form -->
            <!-- ============================================================== -->
            <?php
            if (isset($_GET['edit'])) {
                // if(!$_GET['edit']){
                foreach ($allPdt as $value) {
                    if ($_GET['edit'] == $value->ID) {
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
                                    <form class="needs-validation" novalidate action="<?php echo base_url() ?>task/category_update" method="post">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("task_category_name"); ?></label>
                                                <input type="hidden" class="form-control" id="validationCustom01" placeholder="name" name="id" value="<?php echo $value->id; ?>" required>

                                                <input type="text" class="form-control" id="validationCustom01" placeholder="name" name="name" value="<?php echo $value->name; ?>" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>


                                        </div>
                                        <br>
                                        <div class="form-row">




                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <button class="btn btn-primary" type="submit"><?php echo $this->lang->line("update"); ?></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                <?php
                    }
                }
            } else {
                ?>
                <!-- =======================Edit Part =============================== -->

                <!-- ============================================================== -->
            <?php
            }
            //}
            ?>
            <!-- end validation form -->

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="row" style="width: 100%;">
                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8">
                            <h5 class="card-header"><?php echo $this->lang->line("leave_history"); ?></h5>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md- col-sm-4 col-4">
                            <br>





                        </div>



                        <div class="card-body dataTables_wrapper no-footer">
                            <div class="table-responsive">
                                <div class="section_print" id="section-to-print">
                                <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <!--  <th><?php //echo $this->lang->line("id"); 
                                                            ?></th> -->
                                                <th><?php echo $this->lang->line("staff_id"); ?></th>
                                                <th><?php echo $this->lang->line("leave_date"); ?></th>
                                                <th><?php echo $this->lang->line("days"); ?></th>
                                                <th><?php echo $this->lang->line("apply_date"); ?></th>
                                                <th><?php echo $this->lang->line("status"); ?></th>
                                                <th><?php echo $this->lang->line("action"); ?></th>





                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php

                                            if (isset($allPdt3)) {
                                                $i = 0;


                                                foreach ($allPdt3 as $value) {


                                            ?>

                                                    <tr>
                                                        <!--  <td><?php //echo $value->ID
                                                                    ?></td> -->
                                                        <td><?php echo $value->TEACHER_ID ?></td>
                                                        <td><?php echo $value->FROM_DATE ?> &emsp;- &emsp;<?php echo $value->TO_DATE ?></td>
                                                        <td><?php echo $value->LEAVE_DAYS ?></td>
                                                        <td><?php echo $value->APPLIED_DATE ?></td>

                                                        <?php

                                                        if ($value->STATUS == "pending") { ?>

                                                            <!-- <td style="color:#5c9b22"><b>pending</b></td> -->
                                                            <!--  <td type="button" class="btn btn-secondary" data-container="body" data-toggle="popover" data-placement="top" data-content="Pending"><small class="label label-warning">Pending</small>
                                                            </td>  -->
                                                            <td data-toggle="popover" class="detail_popover text-align-cntr" data-original-title="" title=""><small class="label label-warning">Pending</small></td>


                                                        <?php
                                                        } else if ($value->STATUS == "approved") { ?>

                                                            <td data-toggle="popover" class="detail_popover text-align-cntr" data-original-title="" title=""><small class="label label-success">Approved</small></td>

                                                        <?php

                                                        } else { ?>

                                                            <td data-toggle="popover" class="detail_popover text-align-cntr" data-original-title="" title=""><small class="label label-danger">Disapprove</small></td>

                                                        <?php


                                                        }


                                                        ?>
                                                        

                                                        <td><button class="btn btn-info" onclick="myBtn(
                                                        '<?php echo $value->ADMISSION_NO ?>','<?php echo $value->FROM_DATE ?>',
                                                        '<?php echo $value->TO_DATE ?>','<?php echo $value->LEAVE_DAYS ?>','<?php echo $value->APPLIED_DATE ?>',
                                                        '<?php echo $value->ADMISSION_NO ?>')"><i class="fas fa-align-justify"></i></button>
                                                            <?php 
                                                                if($value->STATUS=="pending"){?>

                                                                <a class="btn btn-danger" href="<?php echo base_url() . 'admin/hrms/leave/student_leave_delete/'.$value->ID; ?>" class="dwn"><i class="fas fa-trash-alt"></i></a><?php


                                                                    
                                                                }
                                                            ?>
                                                        </td>





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
                            <br>

                        </div>



                    </div>
                </div>
                <!-- ============================================================== -->
            </div>


            <!-- Down panel End -->




        </div>

    </div>







    <!-- ============================================================== -->

    <!- HTML JS Modal -->



        <form class="needs-validation" novalidate="" action="<?php echo base_url() ?>admin/hrms/staff/approved_leave_request_submit" method="post">

            <div id="myModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <br>


                    <h3 class="border-bottom" style="text-align: center;">Details</h3>


                    <div id="section-to-print" class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">


                            
                            <label for="validationCustom01"><?php echo $this->lang->line("leave_from"); ?></label>
                            <input type="text" class="form-control" readonly="" name="leave_from" id="leave_from">
                            <br>

                            <label for="validationCustom01"><?php echo $this->lang->line("days"); ?></label>
                            <input type="text" class="form-control" readonly name="days" id="days" required="">
                            <br>

                            <label for="validationCustom01"><?php echo $this->lang->line("staff_id"); ?></label>
                            <input type="text" readonly class="form-control" name="staff_id" id="staff_id">
                            <br>


                            

                        





                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                            <?php

                            ?>
                            
                            <label for="validationCustom01"><?php echo $this->lang->line("leave_to"); ?></label>
                            <input type="text" readonly class="form-control" name="leave_to" value="" id="leave_to">
                            <br>
                            <label for="validationCustom01"><?php echo $this->lang->line("apply_date"); ?></label>
                            <input type="text" class="form-control" readonly name="apply_date" id="apply_date" required="">
                            <br>
                            <label for="validationCustom01"><?php echo $this->lang->line("student_id"); ?></label>
                            <input type="text" class="form-control" readonly name="student_id" id="student_id" required="">






                        </div>


                    </div>


                    <br>
                    <br>




                </div>
            </div>

        </form>




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
            function myBtn(staff_id, leave_from, leave_to, leave_days, applied_date, student_id) {

                modal.style.display = "block";


               
                $('#staff_id').val(staff_id);

                $('#leave_from').val(leave_from);


                $('#leave_to').val(leave_to);

            
                $('#days').val(leave_days);


                $('#apply_date').val(applied_date);

                $('#student_id').val(student_id);



            }
            var modal = document.getElementById("myModal");

            var btn = document.getElementById("myBtn1");

            var span = document.getElementsByClassName("close")[0];


            span.onclick = function() {
                modal.style.display = "none";
            }


            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>




        <script type="text/javascript">
            function compare() {
                var startDt = document.getElementById("from_date").value;
                var endDt = document.getElementById("to_date").value;

                if ((new Date(startDt).getTime() > new Date(endDt).getTime())) {

                    $('#message').html('from date can not be grater than to date').css('color', 'red');
                    var startDt = document.getElementById("from_date").value = "";
                    var endDt = document.getElementById("to_date").value = "";

                }
            }
        </script>

<script>
 function showTeacher() {
    var c = document.getElementById("teacher_id").value;
        // alert(c);
        var sc = "";
        if (c == 0) {
            sc += "";
        }
        
        <?php  
        foreach ($allTeacher as $tr) {         
            echo "else if (c==$tr->STAFF_ID){";                    
                    echo "sc += '$tr->FIRST_NAME';";  
            echo "} ";
        }





        foreach ($allTeacher as $tr) {         
            echo "else if (c!=$tr->STAFF_ID){";                    
                    echo "sc += 'Not match';";  
            echo "} ";
        }
        ?>
        // alert(sc);
        $("#name").html(sc);
       //document.getElementById("name").value =sc;

   }
</script>

