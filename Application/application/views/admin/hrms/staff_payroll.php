<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">


        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <h2><?php echo $this->lang->line("payroll"); ?></h2>
        </div>


        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title"><?php echo $this->lang->line("sections"); ?> </h2>

                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("dashboard"); ?></a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("hrms"); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line("payroll"); ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">


            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header"></h5>

                    <div class="card-body">
                        <h2 style="color:green"> <?php
                                                    $dt = $this->session->userdata("msg");
                                                    if ($dt != null) {
                                                        echo $dt;
                                                        $this->session->unset_userdata("msg");
                                                    }
                                                    ?></h2>

                        <form class="needs-validation" novalidate="" action="<?php echo base_url() ?>admin/hrms/staff/payroll" method="post">

                            <div class="row">

                                <div class="col-xl-4 ol-lg-4  col-md-4 col-sm-4 col-4 ">

                                    <label for="validationCustom01"><?php echo $this->lang->line("staff_role"); ?></label>
                                    <select class="form-control" name="staff_role" id="validationCustom01" required>
                                        <option value="">Select</option>

                                        <?php
                                        if (isset($allPdt2)) {
                                            foreach ($allPdt2 as $value) {
                                                if ($value->ID!=5 && $value->ID!=6 ) {
                                                    ?>

                                              

                                                <option value="<?php echo $value->ID ?>"><?php echo $value->NAME ?></option>

                                        <?php
                                                }
                                            }
                                        }

                                        ?>
                                    </select>

                                </div>
                                <div class="col-xl-4 ol-lg-4  col-md-4 col-sm-4 col-4 ">

                                    <label for="validationCustom01"><?php echo $this->lang->line("month"); ?></label>
                                    <select class="form-control" name="month" id="validationCustom01" >
                                        <option value="january">Select</option>

                                        <option value="january">January</option>
                                        <option value="february">February</option>
                                        <option value="march">March</option>
                                        <option value="april">April</option>
                                        <option value="may">May</option>
                                        <option value="june">June</option>
                                        <option value="july">July</option>
                                        <option value="august">August</option>
                                        <option value="september">September</option>
                                        <option value="october">October</option>
                                        <option value="november">November</option>
                                        <option value="december">December</option>


                                    </select>

                                </div>
                                <div class="col-xl-4 ol-lg-4  col-md-4 col-sm-4 col-4 ">

                                    <label for="validationCustom01"><?php echo $this->lang->line("year"); ?></label>
                                    <select class="form-control" name="year" id="validationCustom01" >
                                        <option value="2020">Select</option>

                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2027">2027</option>
                                        <option value="2028">2028</option>
                                        <option value="2029">2029</option>
                                        <option value="2030">2030</option>
                                        <option value="2031">2031</option>


                                    </select>

                                </div>


                            </div>

                            <div class="row pull-right">

                                <div class="col-xl-4 col-lg-4  col-md-4 col-sm-4 col-4 ">
                                    <button class="btn btn-primary my_btn_style" type="submit">Search</button>
                                </div>

                            </div>

                            <br>

                            <br><br> <br>

                        </form>





                    </div>
                </div>
            </div>







        </div>






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
                        if ($dt != null) {
                            echo $dt;
                            $this->session->unset_userdata("msg");
                        } ?></h2>
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
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h5 class="card-header"><?php echo $this->lang->line("staff_list"); ?></h5>
                        </div>


                    </div>

                    <form class="needs-validation" novalidate="" action="" method="post">

                        <div class="card-body">



                            <div class="table-responsive">
                            <table class="table table-striped table-bordered first">
                                    <thead>
                                        <tr>

                                            <th><?php echo $this->lang->line("staff_id"); ?></th>
                                            <th><?php echo $this->lang->line("name"); ?></th>
                                            <th><?php echo $this->lang->line("staff_role"); ?></th>
                                            <th><?php echo $this->lang->line("department"); ?></th>
                                            <th><?php echo $this->lang->line("designation"); ?></th>
                                            <th><?php echo $this->lang->line("staff_phone_number"); ?></th>
                                            <th><?php echo $this->lang->line("status"); ?></th>
                                            <th><?php echo $this->lang->line("action"); ?></th>




                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php

                                        if (isset($allPdt3)) {
                                            $i=0;


                                            foreach ($allPdt3 as $value) {
                                                ?>

                                                <tr>

                                                    <td><?php echo $value["STAFF_ID"] ?></td>
                                                    <td><?php echo $value["FIRST_NAME"] ?></td>
                                                    <td><?php echo $value["ROLE"] ?></td>
                                                    <td><?php echo $value["DEPARTMENT_NAME"] ?></td>
                                                    <td><?php echo $value["DESIGNATION_NAME"] ?></td>
                                                    <td><?php echo $value["PHONE"] ?></td>

                                                    <?php

                                                    if ($value["STATUS"] == "0") { ?>

                                                        <td>
                                                            
                                                        </td><?php

                                                    } else if ($value["STATUS"] == "1") { ?>
                                                        <td>
                                                            <small class="label label-success">paid</small>
                                                        </td><?php
                                                    } else if($value["STATUS"] == "2") { ?>
                                                        <td>
                                                            <small class="label label-warning">generated</small>
                                                        </td> <?php

                                                    } ?>

                                                    <?php

                                                    if ($value["STATUS"] == "0") { ?>


                                                        <td>&emsp;<button class="unstyled-button label" onclick="myBtn('<?php echo $i++; ?>','<?php echo $value["STAFF_ID"] ?>')"><a style="color:#fff;" href="<?php echo base_url() ?>admin/hrms/staff/generate_payroll/<?php
                                                   echo $value["STAFF_ID"] ?>/<?php
                                                   echo @$month ?>/<?php
                                                   echo @$year ?>">generate payroll</a></i></button></td>


                                                    <?php
                                                    } elseif ($value["STATUS"] == "1") { ?>

                                                        <td><a href="<?php echo base_url() ?>admin/hrms/staff/revert_payroll/revert/<?php
                                                   echo $value["STAFF_ID"] ?>/<?php
                                                   echo @$month ?>/<?php
                                                   echo @$year ?>" data-toggle="tooltip" data-placement="bottom" title="Revert"><i class="fas fa-undo" style="font-size: 11px;;"></i></a>&emsp;
                                                   <a  href="<?php echo base_url() ?>admin/hrms/staff/view_payslip/view/<?php
                                                   echo $value["STAFF_ID"] ?>/<?php
                                                   echo @$month ?>/<?php
                                                   echo @$year ?>" class="unstyled-button label">view payslip</i></a></td>

                                                    <?php

                                                    } else { ?>


                                                        <td><button class="unstyled-button label" onclick="myBtn(''<?php echo $i++; ?>',<?php echo $value["STAFF_ID"] ?>')">something</i></button></td>

                                                    <?php


                                                    } ?>





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
                            <br>

                        </div>
                    </form>
                </div>
            </div>
            <!-- ============================================================== -->
        </div>







    </div>

</div>



<!-- ============================================================== -->




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
    $('#element').tooltip('show')
</script>


<script>
    
 
    function myBtn(id,stff_id){


   
        $('#stf_req_id').val(staff_id);


    }
   
</script>

<script>
        function myBtn2(id,staff_id,f_name) {
            alert(staff_id);

            modal.style.display = "block";


    
            document.getElementById("staff_id").innerHTML =staff_id;
            $('#staff_id').val(staff_id);

            document.getElementById("f_name").innerHTML =f_name;
            $('#f_name').val(f_name);
           

           



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