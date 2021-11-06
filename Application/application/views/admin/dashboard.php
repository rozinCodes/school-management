
    
    <?php 

    $roles = $this->session->userdata('roles');
    if(($roles==1) OR ($roles==2)){ ?>

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
                            <h3 class="mb-2"><?php echo $this->lang->line("admin_dashboard");?></h3>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("dashboard");?></a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- pagehader  -->
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="topprograssstart">
                    
                            <p class="text-uppercase mt5 clearfix"><i class="far fa-money-bill-alt "></i><?php echo $this->lang->line("fees_awiting_with_payment");?><span class="pull-right"><?php echo  $allPdt10->WAITING_PAYMENT ?>/<?php echo $allPdt->CURRENT_STUDENT?></span>
                            </p>
                            <div class="progress-group">
                                <div class="progress progress-minibar">
                                <div class="progress-bar progress-bar-aqua" style="width: <?php echo $allPdt10->WAITING_PAYMENT?>%"></div>
                                </div>
                            </div>
                        </div>
                        <!--./topprograssstart-->
                    </div>
                    <!--./col-md-3-->
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="topprograssstart">
                        <?php 
                                    $present=0;
                                    $absent=0;
                                    $late = 0;
                                        if(isset($allPdt5)){
                                            foreach ($allPdt5 as $value) {
                                                if($value->ATTENDENCE_TYPE=="PRESENT"){
                                                
                                                    $present++;
                                                }else if($value->ATTENDENCE_TYPE=="LATE"){
                                                    $late++;
                                                }else if($value->ATTENDENCE_TYPE=="ABSENT"){
                                                    $absent++;
                                                }
                                               
                                            } ?>

                                    <?php
                                
                            }
                            ?>
                            <p class="text-uppercase mt5 clearfix"><i class=" fas fa-calendar-check"></i> <?php echo $this->lang->line("late_student");?><span class="pull-right"> <?php echo $late?>/<?php echo $allPdt->CURRENT_STUDENT?></span>
                                        </p><?php
                            
                            ?>
                            
                            <div class="progress-group">
                                <div class="progress progress-minibar">
                                <div class="progress-bar progress-bar-red" style="width: <?php $total_student=$allPdt->CURRENT_STUDENT; $t_per =( ($late*100)/$total_student); echo $t_per?>%"></div>
                                </div>
                            </div>
                        </div>
                        <!--./topprograssstart-->
                    </div>
                    <!--./col-md-3--> 
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="topprograssstart">
                        <?php 
                                    $present=0;
                                    $absent=0;
                                    $late = 0;
                                        if(isset($allPdt6)){
                                            foreach ($allPdt6 as $value) {
                                                if($value->ATTENDENCE_TYPE=="PRESENT"){
                                                
                                                    $present++;
                                                }else if($value->ATTENDENCE_TYPE=="LATE"){
                                                    $late++;
                                                }else if($value->ATTENDENCE_TYPE=="ABSENT"){
                                                    $absent++;
                                                }
                                               
                                            } ?>

                                    <?php
                                
                            }
                            ?>
                            <p class="text-uppercase mt5 clearfix"><i class=" fas fa-calendar-check"></i><?php echo $this->lang->line("staff_present_today");?><span class="pull-right"> <?php echo $present?>/<?php echo $allPdt7->TOTAL_STAFF?></span>
                                        </p><?php
                            
                            ?>
                            <div class="progress-group">
                                <div class="progress progress-minibar">
                                <div class="progress-bar progress-bar-green" style="width: <?php $total_staff=$allPdt7->TOTAL_STAFF; $t_per = ($present*100)/$total_staff; echo $t_per ?>%"></div>
                                </div>
                            </div>
                        </div>
                        <?php
                            
                            ?>
                        <!--./topprograssstart-->
                    </div>
                    <!--./col-md-3-->
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="topprograssstart">
                        <?php 
                                    $present=0;
                                    $absent=0;
                                    $late = 0;
                                        if(isset($allPdt5)){
                                            foreach ($allPdt5 as $value) {
                                                if($value->ATTENDENCE_TYPE=="PRESENT"){
                                                
                                                    $present++;
                                                }else if($value->ATTENDENCE_TYPE=="LATE"){
                                                    $late++;
                                                }else if($value->ATTENDENCE_TYPE=="ABSENT"){
                                                    $absent++;
                                                }
                                               
                                            } ?>

                                    <?php
                                
                            }
                            ?>
                            <p class="text-uppercase mt5 clearfix"><i class=" fas fa-calendar-check"></i><?php echo $this->lang->line("student_present_today");?><span class="pull-right"> <?php echo $present?>/<?php echo $allPdt->CURRENT_STUDENT?></span>
                                        </p>
                                 
                        
                            <div class="progress-group">
                                <div class="progress progress-minibar">
                                <div class="progress-bar progress-bar-yellow" style="width: <?php  $tot_std = $allPdt->CURRENT_STUDENT; $tot_percentage = ($present*100)/$tot_std;echo $tot_percentage ?>%"></div>
                                </div>
                            </div>
                        </div>
                        <?php
                            
                            ?>

                        <!--./topprograssstart-->
                    </div>
                    <!--./col-md-3--> 
                </div>
<br>
                <!-- ============================================================== -->
                <div class="row">
                    <!-- metric -->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-muted"><?php echo $this->lang->line("active_students");?>(<?php echo date("Y")?>)</h5>
                                <div class="metric-value d-inline-block">
                                    <h5 class="mb-1 text-primary"><?php echo $allPdt->CURRENT_STUDENT?></h5>
                                </div>
                                
                            </div>
                            <div id="sparkline-1"></div>
                        </div>
                    </div>
                    <!-- /. metric -->
                    <!-- metric -->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-muted"><?php echo $this->lang->line("total_student_admitted");?></h5>
                                <div class="metric-value d-inline-block">
                                    <h4 class="mb-1 text-primary"><?php echo $allPdt2->TOTAL_STUDENT ?> </h4>
                                </div>
                                
                            </div>
                            <div id="sparkline-2"></div>
                        </div>
                    </div>
                    <!-- /. metric -->
                    <!-- metric -->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-muted"><?php echo $this->lang->line("total_fees_collction");?>(<?php echo date("Y")?>)</h5>
                                <div class="metric-value d-inline-block">
                                    <h4 class="mb-1 text-primary"><?php 
                                    if($allPdt4->TOTAL_FEES<=0){
                                        echo "0";
                                    }else{

                                        echo $allPdt4->TOTAL_FEES."/="?> <?php
                                    }  ?>
                                     TK</h4>
                                    
                                </div>
                                <!-- <div class="metric-label d-inline-block float-right text-danger">
                                    <i class="fa fa-fw fa-caret-down"></i><span>7.00%</span>
                                </div> -->
                            </div>
                            <div id="sparkline-3">
                            </div>
                        </div>
                    </div>
                    <!-- /. metric -->
                    <!-- metric -->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-muted"><?php echo $this->lang->line("remaining_fees");?>(<?php echo  date("Y")?>)</h5>
                                <div class="metric-value d-inline-block">
                                    <h4 class="mb-1 text-primary"><?php echo $allPdt8->REMAINING_FEES."/="?> TK </h4>
                                </div>
                                
                            </div>
                            <div id="sparkline-4"></div>
                        </div>
                    </div>
                    <!-- /. metric -->
                </div>
                <!-- ============================================================== -->
               
                <div class="row">
                    <div class="col-xl-4 col-lg-12 col-md-6 col-sm-12 col-12">
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
                        <div class="col-xl-4 col-lg-12 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header" style="background-color: #dff0d8;"><?php echo $this->lang->line("todays_expense");?></h5>
                                <div class="card-body p-0">
                                    <ul class="country-sales list-group list-group-flush">

                                    <?php 
  
                                            if(isset($allPdt12)){
                                                foreach ($allPdt12 as $value) { ?>

                                                    <li class="list-group-item country-sales-content"><span class="mr-2"></i></span><span class=""><?php echo $value->NAME?></span><span class="float-right text-dark "><?php echo $value->AMOUNT?>/=TK</span>
                                                    </li> <?php
             
                                                   
                                                
                                                } ?>

                                                
                                                
                                        
                                        
                                         <?php
                                    
                                }
                                
                                ?>
                                        
                                    </ul>
                                </div>
                                <div class="card-footer text-center">
                                    <a href="#" class="btn-primary-link"></a>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end sales traffice source  -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- sales traffic country source  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-4 col-lg-12 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header" style="background-color: #dff0d8;"><?php echo $this->lang->line("student_attendence_today");?></h5>
                                <div class="card-body p-0">
                                    <ul class="country-sales list-group list-group-flush">

                                    <?php 
                                        $present=0;
                                        $absent=0;
                                        $late = 0;
                                            if(isset($allPdt5)){
                                                foreach ($allPdt5 as $value) {
                                                    if($value->ATTENDENCE_TYPE=="PRESENT"){
                                                    
                                                        $present++;
                                                    }else if($value->ATTENDENCE_TYPE=="LATE"){
                                                        $late++;
                                                    }else if($value->ATTENDENCE_TYPE=="ABSENT"){
                                                        $absent++;
                                                    }
                                                    
                                                
                                                    // $absent=count($value->ABSENT);
                                                    // $absent++;
                                                    // $late=count($value->LATE);
                                                    // $late++;
                                                } ?>
                                        
                                        
                                        <li class="list-group-item country-sales-content"><span class="mr-2"></i></span><span class="">Present</span><span class="float-right text-dark"><?php echo $present?></span>
                                        </li>
                                        <li class="list-group-item country-sales-content"><span class="mr-2"></span><span class="">Late</span><span class="float-right text-dark"><?php echo $late?></span>
                                        </li>
                                        <li class="list-group-item country-sales-content"><span class=" mr-2"></span><span class="">Absent</span><span class="float-right text-dark"><?php echo $absent?></span>
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
                    
                    <!-- ============================================================== -->
                    <!-- end sales traffice country source  -->
                    <!-- ============================================================== -->
                </div>
                  <!-- pagehader  -->
                <div class="row">
                    <!-- metric -->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-muted"><?php echo $this->lang->line("super_admin");?><i class=" fas fa-id-card-alt pull-right"></i></h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1 text-primary"><?php echo $allPdt9->SUPER_ADMIN?></h1>
                                </div>
                                
                            </div>
                            <div id="sparkline-1"></div>
                        </div>
                    </div>
                    <!-- /. metric -->
                    <!-- metric -->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-muted"><?php echo $this->lang->line("admin");?><i class=" fas fa-id-card-alt pull-right"></i></h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1 text-primary"><?php echo $allPdt9->ADMIN ?> </h1>
                                </div>
                                
                            </div>
                            <div id="sparkline-2"></div>
                        </div>
                    </div>
                    <!-- /. metric -->
                    <!-- metric -->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-muted"><?php echo $this->lang->line("teacher");?> <i class=" fas fa-id-card-alt pull-right"></i> </h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1 text-primary"><?php echo $allPdt9->TEACHER ?> </h1>
                                    
                                </div>
                                
                            </div>
                            <div id="sparkline-3">
                            </div>
                        </div>
                    </div>
                    <!-- /. metric -->
                    <!-- metric -->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-muted"><?php echo $this->lang->line("accountant");?><i class=" fas fa-id-card-alt pull-right"></i></h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1 text-primary"><?php echo $allPdt9->ACCOUNTANT ?>  </h1>
                                </div>
                                
                            </div>
                            <div id="sparkline-4"></div>
                        </div>
                    </div>
                    <!-- /. metric -->
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            Copyright © <?php echo date("Y")?> walton. All rights reserved. Developed by <a href="https://waltonbd.com/">Walton</a>.
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






    <?php
    }else{?>

        <div class="card">
            <h3 style="color: red;">Sorry!! You are not authorise this page</h3>
        </div>





    <?php        

    }


?>
   