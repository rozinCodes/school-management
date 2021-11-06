


<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->



        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <h2><?php echo $this->lang->line("bioattendence"); ?></h2>
            </div>


        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title"><?php echo $this->lang->line("sections"); ?> </h2>
                   
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("dashboard"); ?></a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("bioattendence"); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line("relodebioattendence"); ?></li>
                            </ol>
                        </nav>
                    </div>
                    
                    <!-- <a class="btn btn-primary pull-right" href="<?php echo base_url() ?>admin/fees/add_fees_specific_student"><?php echo $this->lang->line("specific_student"); ?></a> <br> -->
                    <br>
                </div>
            </div>
        </div>

        <!-- ============================================================== -->
        
        <!-- ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->

      
        

        <div class="row">

        
        

      
            <!-- ============================================================== -->
            <!-- validation form -->
            <!-- ============================================================== -->
            <?php  
           
           
            ?>
              <!-- =======================Edit Part =============================== -->
              
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div  class="card">
                    <h5 style="color:royalblue" class="card-header">
                        <p style="text-align: center; font-size:25px;">Attendance Summary</p>  
                    <?php echo $this->lang->line("sections"); ?></h5>

                    <div class="card-body">
                        <h2 style="color:green"> <?php
                            $dt = $this->session->userdata("msg");
                            if ($dt != NULL) {
                                echo $dt;
                                $this->session->unset_userdata("msg");
                            }
                            ?>
                        </h2>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h4> <span> <a class="btn btn-success pull-right" href="<?php echo base_url() ?>admin/BioAttendance/attendanceDataSqlServerToOracle">Load Data</a>  </span></h4>
                                <div class="row">
                   
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                        <div class="card">
                            <div class="card-body">
                            <h5 class="text-muted">Today Card Execute</h5>
                                <div class="metric-value d-inline-block">
                                <h5 class="mb-1 text-primary"><?php echo $todaysCardExecute->TODAYTOTALCARDEXECUTE?> Times</h5>
                                    
                                </div>
                                <!-- <div class="metric-label d-inline-block float-right text-danger">
                                    <i class="fa fa-fw fa-caret-down"></i><span>7.00%</span>
                                </div> -->
                            </div>
                            <div id="sparkline-3">
                            </div>
                        </div>
                    </div>
                    <!-- metric -->
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                        <div class="card">
                            <div class="card-body">
                            <h5 class="text-muted">Today Total Card Punch</h5>
                                <div class="metric-value d-inline-block">
                                <h5 class="mb-1 text-primary"><?php echo $totalNumberofCardExecuteToday->TODAYNUMBEROFCARDEXECUTE?> Unit</h5>
                                </div>
                                
                            </div>
                            <div id="sparkline-2"></div>
                        </div>
                    </div>
                    <!-- /. metric -->
                    <!-- metric -->
                     <!-- metric -->
                     <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-muted">Total Card Execute</h5>
                                <div class="metric-value d-inline-block">
                                    <h5 class="mb-1 text-primary"><?php echo $totalCardExecute->TOTALCARDEXECUTE?> Times</h5>
                                </div>
                                
                            </div>
                            <div id="sparkline-1"></div>
                        </div>
                    </div>
                    <!-- /. metric -->
                   
                    <!-- /. metric -->
                    <!-- metric -->
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                        <div class="card">
                            <div class="card-body">
                            <h5 class="text-muted">Total Card Punch</h5>
                                <div class="metric-value d-inline-block">
                                <h5 class="mb-1 text-primary"><?php echo $totalNumberCardExecute->TOTALNUMBEROFCARDEXECUTE?> Unit</h5>
                                </div>
                                
                            </div>
                            <div id="sparkline-4"></div>
                        </div>
                    </div>
                    <!-- /. metric -->
                </div>
                            </div>
                            
                               <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                        </div>
                       
                    </div>
                </div>
            </div>


           
            <!-- ============================================================== -->
            <?php
            
            //}
            ?>
            <!-- end validation form -->
            
                  
            <!-- ============================================================== -->
        </div>


    </div>
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- end footer -->
    <!-- ============================================================== -->
</div>


