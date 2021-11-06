<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/vector-map/jqvmap.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/jvectormap/jquery-jvectormap-2.0.2.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/fonts/flag-icon-css/flag-icon.min.css">

<!-- ============================================================== -->
<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pagehader  -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h3 class="mb-2"><?php echo $this->lang->line("teacher_dashboard"); ?> </h3>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("dashboard"); ?></a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- pagehader  -->
        <!-- ============================================================== -->
        <div class="row">


            <!--./col-md-3-->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="topprograssstart">
                    <?php
                    $present = 0;
                    $absent = 0;
                    $late = 0;
                    if (isset($allPdt5)) {
                        foreach ($allPdt5 as $value) {
                            if ($value->ATTENDENCE_TYPE == "PRESENT") {

                                $present++;
                            } else if ($value->ATTENDENCE_TYPE == "LATE") {
                                $late++;
                            } else if ($value->ATTENDENCE_TYPE == "ABSENT") {
                                $absent++;
                            }
                        }
                    }
                    ?>
                    <p class="text-uppercase mt5 clearfix"><i class=" fas fa-calendar-check"></i> <?php echo $this->lang->line("student_present_today"); ?><span class="pull-right"><?php echo $present ?>/<?php echo $allPdt->CURRENT_STUDENT ?></span>
                    </p><?php

                        ?>
                    <div class="progress-group">
                        <div class="progress progress-minibar">
                            <div class="progress-bar progress-bar-green" style="width:<?php $tot_std = $allPdt->CURRENT_STUDENT;
                                                                                        $tot_percentage = ($present * 100) / $tot_std;
                                                                                        echo $tot_percentage ?>%"></div>
                        </div>
                    </div>
                </div>
                <?php

                ?>
                <!--./topprograssstart-->
            </div>

            <!--./col-md-3-->
        </div>
        <!-- ============================================================== -->
        <!-- revenue  -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-8 col-lg-12 col-md-8 col-sm-12 col-12">

                <div class="card">
                    <h5 class="card-header" style="background-color: #dff0d8;"><?php echo $this->lang->line("today_student_attendance"); ?></h5>
                    <div class="card-body p-0">
                        <ul class="country-sales list-group list-group-flush">

                            <?php
                            $present = 0;
                            $absent = 0;
                            $late = 0;
                            if (isset($allPdt5)) {
                                foreach ($allPdt5 as $value) {
                                    if ($value->ATTENDENCE_TYPE == "PRESENT") {

                                        $present++;
                                    } else if ($value->ATTENDENCE_TYPE == "LATE") {
                                        $late++;
                                    } else if ($value->ATTENDENCE_TYPE == "ABSENT") {
                                        $absent++;
                                    }


                                    // $absent=count($value->ABSENT);
                                    // $absent++;
                                    // $late=count($value->LATE);
                                    // $late++;
                                } ?>


                                <li class="list-group-item country-sales-content"><span class="mr-2"></i></span><span class="">Present</span><span class="float-right text-dark"><?php echo $present ?></span>
                                </li>
                                <li class="list-group-item country-sales-content"><span class="mr-2"></span><span class="">Late</span><span class="float-right text-dark"><?php echo $late ?></span>
                                </li>
                                <li class="list-group-item country-sales-content"><span class=" mr-2"></span><span class="">Absent</span><span class="float-right text-dark"><?php echo $absent ?></span>
                                </li> <?php

                                    }

                                        ?>

                        </ul>
                    </div>

                </div>
                <div class="card">
                    <h5 class="card-header" style="background-color: #dff0d8;"><?php echo $this->lang->line("my_last_7_days_attendance"); ?> </h5>
                    <div class="card-body p-0">
                        <div class="table">
                            <table>
                                <thead>
                                    <tr>

                                        <th><?php echo $this->lang->line("date"); ?></th>
                                        <th><?php echo $this->lang->line("status"); ?></th>





                                    </tr>
                                </thead>

                                <tbody>

                                    <?php

                                    if (isset($allPdt3)) {


                                        foreach ($allPdt3 as $value) {


                                    ?>

                                            <tr>

                                                <td><?php
                                                 $sdate = $value->ATTENDENCE_DATE_TIME;
                                                 $a = strval($sdate);
                                                 $aa = str_replace(".000000","",$a);
                                                 $date1 = date_create($aa);
                                                $startdate = date_format($date1, "Y-m-d H:i:s a");
                                                echo $startdate ?></td>

                                                <td><?php echo $value->ATTENDENCE_TYPE ?></td>






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

            </div>
            <!-- ============================================================== -->
            <!-- end reveune  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- total sale  -->
            <!-- ============================================================== -->
            <div class="col-xl-4 col-lg-12 col-md-4 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header" style="background-color: #dff0d8;"> <?php echo $this->lang->line("my_todays_class"); ?></h5>
                    <div class="card-body">

                        <table class="table routine_col">
                            <thead>
                                <tr>

                                    <th><?php echo date("l") ?></th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                if (isset($allPdt2)) {
                                    foreach ($allPdt2 as $value) {


                                ?>
                                        <tr>
                                            <?php
                                            $days = date("l");
                                            if ($days == "Saturday") {
                                                $days = "sat";
                                            } elseif ($days == "Sunday") {
                                                $days = "sun";
                                            } else if ($days == "Monday") {
                                                $days = "mon";
                                            } else if ($days == "Tuesday") {
                                                $days = "tue";
                                            } else if ($days == "Wednesday") {
                                                $days = "wed";
                                            } else if ($days == "Thursday") {
                                                $days = "thu";
                                            } else {
                                                $days = "fri";
                                            }

                                            if ($value->DAY == $days) {  ?>


                                                <td class="routine_td">Class : <?php echo $value->CLASSES ?>(<?php echo $value->SECTIONS ?>) <br> Subjects : <?php echo $value->SUBJECTS ?> <br> Time : 
                                                <?php 
                                                 $sdate = $value->START_TIME;
                                                 $a = strval($sdate);
                                                 $aa = str_replace(".000000","",$a);
                                                 $date1 = date_create($aa);
                                                $startdate = date_format($date1, "H:i a");
                                                echo $startdate ?> -- 
                                                <?php  
                                                 $sdate = $value->END_TIME;
                                                 $a = strval($sdate);
                                                 $aa = str_replace(".000000","",$a);
                                                 $date1 = date_create($aa);
                                                $startdate = date_format($date1, "H:i a");
                                                echo $startdate ?> <br> Room No: <?php echo $value->ROOM_NUMBER ?> </td> <?php
                                                                                                                                                                                                                                                                                                                                } ?>
                                        </tr>
                                <?php
                                    }
                                }

                                ?>

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end total sale  -->
            <!-- ============================================================== -->
        </div>

        <div class="row">
            <div class="col-xl-5 col-lg-6 col-md-6 col-sm-12 col-12">
                <!-- ============================================================== -->
                <!-- social source  -->
                <!-- ============================================================== -->
                <div class="card">
                    <h5 class="card-header"><?php echo $this->lang->line("last_f_notice_board"); ?></h5>
                    <div class="card-body p-0">
                        <div class="table">
                            <table>
                                <thead>
                                    <tr>

                                        <th><?php echo $this->lang->line("notice_title"); ?></th>
                                        <th><?php echo $this->lang->line("upload_date"); ?></th>

                                    </tr>
                                </thead>

                                <tbody>

                                    <?php

                                    if (isset($allPdt6)) {


                                        foreach ($allPdt6 as $value) {


                                    ?>

                                            <tr>

                                                <td><?php echo $value->NOTICE_TITLE ?></td>

                                                <td><?php echo $value->UPLOAD_DATE ?></td>






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
                    <div class="card-footer text-center">
                        <a href="#" class="btn-primary-link"></a>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end social source  -->
                <!-- ============================================================== -->
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                
            <div class="card">
                                <h5 class="card-header" style="background-color: #dff0d8;"><?php echo $this->lang->line("leave_request");?></h5>
                                <div class="card-body p-0">
                                    <ul class="country-sales list-group list-group-flush">

                                    <?php 
                                        $approve=0;
                                        $pending=0;
                                        $disapprove = 0;
                                            if(isset($allPdt11)){
                                                foreach ($allPdt11 as $value) {
                                                    if($value->STATUS=="approved"){
                                                    
                                                        $approve++;
                                                    }else if($value->STATUS=="disapprove"){
                                                        $disapprove++;
                                                    }else if($value->STATUS=="pending"){
                                                        $pending++;
                                                    }
                                                    
                                
                                                } ?>
                                        
                                        
                                        <li class="list-group-item country-sales-content"><span class="mr-2"></i></span><span class="label label-warning">Pending</span><span class="float-right text-white label label-warning"><?php echo $pending?></span>
                                        </li>
                                        <li class="list-group-item country-sales-content"><span class="mr-2"></span><span class="label label-success">Approved</span><span class="float-right text-white label label-success"><?php echo $approve?></span>
                                        </li>
                                        <li class="list-group-item country-sales-content"><span class=" mr-2"></span><span class=" label label-danger">Disapproved</span><span class="float-right text-white label label-danger"><?php echo $disapprove?></span>
                                        </li> <?php
                                    
                                }
                                
                                ?>
                                        
                                    </ul>
                                </div>
                                <div class="card-footer text-center">
                                    <a href="#" class="btn-primary-link"></a>
                                </div>
                            </div>
            </div>
         
            <!-- <div class="col-xl-3 col-lg-12 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header"></h5>
                    <div class="card-body p-0">

                    </div>
                    <div class="card-footer text-center">
                        <a href="#" class="btn-primary-link"></a>
                    </div>
                </div>
            </div> -->
          
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <div class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    Copyright © <?php echo date("Y") ?> walton. All rights reserved. Developed by <a href="https://waltonbd.com/">Walton</a>.
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="text-md-right footer-links d-none d-sm-block">
                        <!-- <a href="javascript: void(0);">About</a>
                        <a href="javascript: void(0);">Support</a>
                        <a href="javascript: void(0);">Contact Us</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end footer -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- end wrapper  -->
<!-- ============================================================== -->


<!-- chartjs js-->
<script src="<?php echo base_url(); ?>assets/vendor/charts/charts-bundle/Chart.bundle.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/charts/charts-bundle/chartjs.js"></script>

<script src="<?php echo base_url(); ?>assets/vendor/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- sparkline js-->
<script src="<?php echo base_url(); ?>assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/charts/sparkline/spark-js.js"></script>
<!-- dashboard sales js-->
<script src="<?php echo base_url(); ?>assets/libs/js/dashboard-sales.js"></script>