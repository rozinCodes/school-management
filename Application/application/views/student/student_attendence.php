<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">


        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <h2><?php echo $this->lang->line("attendence"); ?></h2>
        </div>


        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title"><?php echo $this->lang->line("sections"); ?> </h2>

                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("dashboard"); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line("attendence"); ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- end pageheader -->





        <div class="row">

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

            <?php
            }
            //}
            ?>
            <!-- end validation form -->

            <!-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                            <div class="box-body box-profile">

                                <div class="border_info staffprofile">

                                    <h5>Total Present </h5>
                                    <h4><i class="
                                                    fas fa-calendar-check"></i> <?php $c = 0;
                                                                                $cur_year = date("y");


                                                                                foreach ($allPdt6 as $value) {
                                                                                    if ($value->ATTENDENCE_TYPE == "PRESENT") {
                                                                                        $yr = explode("-", $value->ATTENDENCE_DATE);
                                                                                        if ($cur_year == $yr[2]) {
                                                                                            $c++;
                                                                                        }
                                                                                    }
                                                                                }
                                                                                echo $c; ?> Days</h4>

                                </div>
                            </div>

                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                            <div class="box-body box-profile">

                                <div class="border_info staffprofile">

                                    <h5>Total Absent </h5>
                                    <h4><i class="
                                                    fas fa-calendar-check"> </i> <?php $c = 0;
                                                                                    $cur_year = date("y");


                                                                                    foreach ($allPdt6 as $value) {
                                                                                        if ($value->ATTENDENCE_TYPE == "ABSENT") {
                                                                                            $yr = explode("-", $value->ATTENDENCE_DATE);
                                                                                            if ($cur_year == $yr[2]) {
                                                                                                $c++;
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                    echo $c; ?> Days</h4>

                                </div>
                            </div>

                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                            <div class="box-body box-profile">

                                <div class="border_info staffprofile">

                                    <h5>Total Late</h5>
                                    <h4><i class="
                                                    fas fa-calendar-check "> </i> <?php $c = 0;
                                                                                    $cur_year = date("y");


                                                                                    foreach ($allPdt6 as $value) {
                                                                                        if ($value->ATTENDENCE_TYPE == "LATE") {
                                                                                            $yr = explode("-", $value->ATTENDENCE_DATE);
                                                                                            if ($cur_year == $yr[2]) {
                                                                                                $c++;
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                    echo $c; ?> Days
                                    </h4>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                
            </div> -->

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <br>
                    <div class="row" style="margin-left: 10px;">


                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                            <select class="form-control" name="attndence_year_search" id="year_Change">

                                <option value="2020" selected><?php echo date("Y"); ?></option>


                            </select>
                        </div>
                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 pull-right">
                            <p>Present: P Late: L Absent: A Wickend: W</p>
                        </div>


                    </div>


                    <div class="card-body dataTables_wrapper no-footer">
                        <div class="table-responsive" style="overflow: hidden;">

                            <div class="row">


                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <table class="table tbl-border" style="overflow: hidden; border-right: 1px solid #ddd;border-left: 1px solid #ddd;">
                                        <thead>
                                            <tr>
                                                <th>Date|Month</th>
                                                <th>Jan</th>
                                                <th>Feb</th>
                                                <th>Mar</th>
                                                <th>Apr</th>
                                                <th>May</th>
                                                <th>Jun</th>
                                                <th>Jul</th>
                                                <th>Aug</th>
                                                <th>Sep</th>
                                                <th>Oct</th>
                                                <th>Nov</th>
                                                <th>Dec</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php



                                            for ($i = 1; $i <= 31; $i++) { ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>

                                                    <td><?php
                                                        if (isset($allPdt5)) {
                                                            foreach ($allPdt5 as $value5) {
                                                                $month = explode("-", $value5->ATTENDENCE_DATE);

                                                                if ($i == $month[0]) {
                                                                    if ($month[1] == "JAN") {
                                                                        if ($value5->ATTENDENCE_TYPE == "PRESENT") {
                                                                            echo  "P";
                                                                        } elseif ($value5->ATTENDENCE_TYPE == "ABSENT") {
                                                                            echo  "A";
                                                                        } elseif ($value5->ATTENDENCE_TYPE == "LATE") {
                                                                            echo  "L";
                                                                        } else {
                                                                            echo  "H";
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        } ?>

                                                    </td>


                                                    <td><?php
                                                        if (isset($allPdt5)) {
                                                            foreach ($allPdt5 as $value5) {
                                                                $month = explode("-", $value5->ATTENDENCE_DATE);

                                                                if ($i == $month[0]) {
                                                                    if ($month[1] == "FEB") {
                                                                        if ($value5->ATTENDENCE_TYPE == "PRESENT") {
                                                                            echo  "P)";
                                                                        } elseif ($value5->ATTENDENCE_TYPE == "ABSENT") {
                                                                            echo  "A";
                                                                        } elseif ($value5->ATTENDENCE_TYPE == "LATE") {
                                                                            echo  "L " . "(" . $month[0] . ")";
                                                                        } else {
                                                                            echo  "H";
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        } ?>

                                                    </td>



                                                    <td><?php
                                                        if (isset($allPdt5)) {
                                                            foreach ($allPdt5 as $value5) {
                                                                $month = explode("-", $value5->ATTENDENCE_DATE);

                                                                if ($i == $month[0]) {
                                                                    if ($month[1] == "MAR") {
                                                                        if ($value5->ATTENDENCE_TYPE == "PRESENT") {
                                                                            echo  "P";
                                                                        } elseif ($value5->ATTENDENCE_TYPE == "ABSENT") {
                                                                            echo  "A";
                                                                        } elseif ($value5->ATTENDENCE_TYPE == "LATE") {
                                                                            echo  "L";
                                                                        } else {
                                                                            echo  "H";
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        } ?>

                                                    </td>

                                                    <td><?php
                                                        if (isset($allPdt5)) {
                                                            foreach ($allPdt5 as $value5) {
                                                                $month = explode("-", $value5->ATTENDENCE_DATE);

                                                                if ($i == $month[0]) {
                                                                    if ($month[1] == "APR") {
                                                                        if ($value5->ATTENDENCE_TYPE == "PRESENT") {
                                                                            echo  "P";
                                                                        } elseif ($value5->ATTENDENCE_TYPE == "ABSENT") {
                                                                            echo  "A " . "(" . $month[0] . ")";
                                                                        } elseif ($value5->ATTENDENCE_TYPE == "LATE") {
                                                                            echo  "L";
                                                                        } else {
                                                                            echo  "H";
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        } ?>

                                                    </td>

                                                    <td><?php
                                                        if (isset($allPdt5)) {
                                                            foreach ($allPdt5 as $value5) {
                                                                $month = explode("-", $value5->ATTENDENCE_DATE);

                                                                if ($i == $month[0]) {
                                                                    if ($month[1] == "MAY") {
                                                                        if ($value5->ATTENDENCE_TYPE == "PRESENT") {
                                                                            echo  "P";
                                                                        } elseif ($value5->ATTENDENCE_TYPE == "ABSENT") {
                                                                            echo  "A";
                                                                        } elseif ($value5->ATTENDENCE_TYPE == "LATE") {
                                                                            echo  "L";
                                                                        } else {
                                                                            echo  "H";
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        } ?>

                                                    </td>

                                                    <td><?php
                                                        if (isset($allPdt5)) {
                                                            foreach ($allPdt5 as $value5) {
                                                                $month = explode("-", $value5->ATTENDENCE_DATE);

                                                                if ($i == $month[0]) {
                                                                    if ($month[1] == "JUN") {
                                                                        if ($value5->ATTENDENCE_TYPE == "PRESENT") {
                                                                            echo  "P";
                                                                        } elseif ($value5->ATTENDENCE_TYPE == "ABSENT") {
                                                                            echo  "A " . "(" . $month[0] . ")";
                                                                        } elseif ($value5->ATTENDENCE_TYPE == "LATE") {
                                                                            echo  "L";
                                                                        } else {
                                                                            echo  "H";
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        } ?>

                                                    </td>

                                                    <td><?php
                                                        if (isset($allPdt5)) {
                                                            foreach ($allPdt5 as $value5) {
                                                                $month = explode("-", $value5->ATTENDENCE_DATE);

                                                                if ($i == $month[0]) {
                                                                    if ($month[1] == "JUL") {
                                                                        if ($value5->ATTENDENCE_TYPE == "PRESENT") {
                                                                            echo  "P";
                                                                        } elseif ($value5->ATTENDENCE_TYPE == "ABSENT") {
                                                                            echo  "A";
                                                                        } elseif ($value5->ATTENDENCE_TYPE == "LATE") {
                                                                            echo  "L";
                                                                        } else {
                                                                            echo  "H";
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        } ?>

                                                    </td>

                                                    <td><?php
                                                        if (isset($allPdt5)) {
                                                            foreach ($allPdt5 as $value5) {
                                                                $month = explode("-", $value5->ATTENDENCE_DATE);

                                                                if ($i == $month[0]) {
                                                                    if ($month[1] == "AUG") {
                                                                        if ($value5->ATTENDENCE_TYPE == "PRESENT") {
                                                                            echo  "P";
                                                                        } elseif ($value5->ATTENDENCE_TYPE == "ABSENT") {
                                                                            echo  "A";
                                                                        } elseif ($value5->ATTENDENCE_TYPE == "LATE") {
                                                                            echo  "L";
                                                                        } else {
                                                                            echo  "H";
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        } ?>

                                                    </td>

                                                    <td><?php
                                                        if (isset($allPdt5)) {
                                                            foreach ($allPdt5 as $value5) {
                                                                $month = explode("-", $value5->ATTENDENCE_DATE);

                                                                if ($i == $month[0]) {
                                                                    if ($month[1] == "SEP") {
                                                                        if ($value5->ATTENDENCE_TYPE == "PRESENT") {
                                                                            echo  "P";
                                                                        } elseif ($value5->ATTENDENCE_TYPE == "ABSENT") {
                                                                            echo  "A";
                                                                        } elseif ($value5->ATTENDENCE_TYPE == "LATE") {
                                                                            echo  "L";
                                                                        } else {
                                                                            echo  "H";
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        } ?>

                                                    </td>

                                                    <td><?php
                                                        if (isset($allPdt5)) {
                                                            foreach ($allPdt5 as $value5) {
                                                                $month = explode("-", $value5->ATTENDENCE_DATE);

                                                                if ($i == $month[0]) {
                                                                    if ($month[1] == "OCT") {
                                                                        if ($value5->ATTENDENCE_TYPE == "PRESENT") {
                                                                            echo  "P";
                                                                        } elseif ($value5->ATTENDENCE_TYPE == "ABSENT") {
                                                                            echo  "A " . "(" . $month[0] . ")";
                                                                        } elseif ($value5->ATTENDENCE_TYPE == "LATE") {
                                                                            echo  "L ";
                                                                        } else {
                                                                            echo  "H";
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        } ?>

                                                    </td>

                                                    <td><?php
                                                        if (isset($allPdt5)) {
                                                            foreach ($allPdt5 as $value5) {
                                                                $month = explode("-", $value5->ATTENDENCE_DATE);

                                                                if ($i == $month[0]) {
                                                                    if ($month[1] == "NOV") {
                                                                        if ($value5->ATTENDENCE_TYPE == "PRESENT") {
                                                                            echo  "P";
                                                                        } elseif ($value5->ATTENDENCE_TYPE == "ABSENT") {
                                                                            echo  "A";
                                                                        } elseif ($value5->ATTENDENCE_TYPE == "LATE") {
                                                                            echo  "L";
                                                                        } else {
                                                                            echo  "H";
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        } ?>

                                                    </td>

                                                    <td><?php
                                                        if (isset($allPdt5)) {
                                                            foreach ($allPdt5 as $value5) {
                                                                $month = explode("-", $value5->ATTENDENCE_DATE);

                                                                if ($i == $month[0]) {
                                                                    if ($month[1] == "DEC") {
                                                                        if ($value5->ATTENDENCE_TYPE == "PRESENT") {
                                                                            echo  "P";
                                                                        } elseif ($value5->ATTENDENCE_TYPE == "ABSENT") {
                                                                            echo  "A";
                                                                        } elseif ($value5->ATTENDENCE_TYPE == "LATE") {
                                                                            echo  "L";
                                                                        } else {
                                                                            echo  "H";
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        } ?>

                                                    </td>



                                                </tr> <?php

                                                    } ?>


                                        </tbody>
                                    </table>
                                </div>

                            </div>




                        </div>
                        <br>

                    </div>
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




    <script type="text/javascript">
        document.querySelector("#today2").valueAsDate = new Date();
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