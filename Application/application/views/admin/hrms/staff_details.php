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
            <h2><?php echo $this->lang->line("staff_details"); ?></h2>
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
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line("staff_details"); ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- end pageheader -->

        <div class="row">


            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
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



                        <div class="row">

                            <div class="col-xl-12 col-lg-12  col-md-12 col-sm-12 col-12 ">

                                <div class="box box-primary">

                                    <div class="box-body box-profile">

                                        <div class="border_info">
                                            

                                            <?php

                                            if (isset($allPdt)) {

                                                if ($allPdt->PHOTO) {

                                            ?>

                                                    <img class="profile-user-img img-responsive img-circle center" src="<?php echo base_url(); ?>uploads/staff/picture/<?php echo $allPdt->PHOTO ?> " alt="User profile picture">
                                                <?php
                                                } else {


                                                ?>
                                                    <img class="profile-user-img img-responsive img-circle center" src="<?php echo base_url(); ?>upload/images/no-pic.jpg" alt="User profile picture">

                                                <?php
                                                }
                                                ?>
                                                <h3 class="profile-username text-center"><?php echo $allPdt->FIRST_NAME ?><?php echo $allPdt->LAST_NAME ?>
                                                <?php

                                                    $roles = $this->session->userdata('roles');

                                                    if (($roles == 1) or ($roles == 2)) { ?>

                                                    <p class="pull-right" data-toggle="tooltip" data-original-title="Edit">

                                                    <a  href="<?php echo base_url() ?>admin/hrms/staff/staff_edit/edit/<?php echo $allPdt->ID ?>" style="cursor: pointer;" data-toggle="tooltip" data-placement="bottom">
                                                    <i class="fas fa-pencil-alt"></i></a> </li>






                                                    <?php


                                                    }

                                                    ?>
                                            
                                                </h3>

                                                <ul class="list-group list-group-unbordered">


                                                    <li class="list-group-item listnoback">
                                                        <b><?php echo $this->lang->line("staff_id"); ?></b> <a class="pull-right text-aqua">
                                                            <td><?php echo $allPdt->STAFF_ID ?></td>
                                                        </a>
                                                    </li>

                                                    <li class="list-group-item listnoback">
                                                        <b><?php echo $this->lang->line("department"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->DEPARTMENT_NAME ?></a>
                                                    </li>
                                                    <li class="list-group-item listnoback">
                                                        <b><?php echo $this->lang->line("designation"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->DESIGNATION_NAME ?></a>
                                                    </li>
                                                    <li class="list-group-item listnoback">
                                                        <b><?php echo $this->lang->line("staff_basic_salary"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->BASIC_SALARY ?></a>
                                                    </li>
                                                    <li class="list-group-item listnoback">
                                                        <b><?php echo $this->lang->line("staff_contract_type"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->CONTRACT_TYPE ?></a>
                                                    </li>
                                                    <li class="list-group-item listnoback">
                                                        <b><?php echo $this->lang->line("staff_shift"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->SHIFT_NAME ?></a>
                                                    </li>
                                                    <li class="list-group-item listnoback">
                                                        <b><?php echo $this->lang->line("staff_dateofjoin"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->DATE_OF_JOINING ?></a>
                                                    </li>

                                                </ul>




                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>

                    </div>
                </div>
            </div>





            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8">


                <section>

                    <ul class="nav nav-tabs nv-color " id="myTab" role="tablist">
                        <li class="nav-item waves-effect waves-light active">
                            <a class="nav-link  " id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" id="payroll-tab" data-toggle="tab" href="#payroll" role="tab" aria-controls="payroll" aria-selected="false">Payroll</a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" id="leaves-tab" data-toggle="tab" href="#leaves" role="tab" aria-controls="leaves" aria-selected="true">Leaves</a>
                        </li>
                        <li class="nav-item waves-effect waves-light" >
                            <a class="nav-link" id="attendence-tab" data-toggle="tab" href="#attendence" role="tab" aria-controls="attendence" aria-selected="true">Attendence</a>
                        </li>

                       

                        &emsp;
                        &emsp;
                        &emsp;
                        &emsp;

                       






                        <!-- <li class="pull-right" data-toggle="tooltip" data-original-title="Login Details">
                                                    
                                                    
                            <a href="#"  class="" data-toggle="modal" data-target="#myModal2" data-placement="bottom" ><i class=" fas fa-lock"></i></a>
                                                                                            
                        </li>
                        &emsp;
                        &emsp;
                        &emsp;
                        &emsp;
                                             

                        <li class="pull-right" data-toggle="tooltip" data-original-title="Change Password">
                            <a href="#" style="cursor: pointer;"  class="" data-toggle="modal" data-target="#changePassModal" data-placement="bottom" ><i class=" fas fa-key"></i></a>
                                                                                            
                        </li>

                        &emsp;
                        &emsp;
                        &emsp;
                        &emsp; -->






                    </ul>

                   




                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="profile" role="tabpanel" aria-labelledby="profile-tab">


                            <div class="card">
                                <h5 class="card-header"></h5>


                                <div class="box box-primary">


                                    <div class="box-body box-profile">

                                        <div class="border_info">

                                            <h3 class="profile-username text-center pagetitleh2">Personal Information</h3>

                                            <ul class="list-group list-group-unbordered">


                                                <li class="list-group-item listnoback">
                                                    <b><?php echo $this->lang->line("staff_phone_number"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->PHONE ?></a>
                                                </li>

                                                <li class="list-group-item listnoback">
                                                    <b><?php echo $this->lang->line("date_of_birth"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->DATE_OF_BIRTH ?></a>

                                                </li>
                                                <li class="list-group-item listnoback">
                                                    <b><?php echo $this->lang->line("staff_emergency_number"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->EMERGENCY_CONTACT ?></a>
                                                </li>
                                                <li class="list-group-item listnoback">
                                                    <b><?php echo $this->lang->line("gender"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->GENDER ?></a>
                                                </li>
                                                <li class="list-group-item listnoback">
                                                    <b><?php echo $this->lang->line("staff_maritial_status"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->MARITIAL_STATUS ?></a>
                                                </li>
                                                <li class="list-group-item listnoback">
                                                    <b><?php echo $this->lang->line("staff_father_name"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->FATHER_NAME ?></a>
                                                </li>
                                                <li class="list-group-item listnoback">
                                                    <b><?php echo $this->lang->line("staff_mother_name"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->MOTHER_NAME ?></a>
                                                </li>
                                                <li class="list-group-item listnoback">
                                                    <b><?php echo $this->lang->line("staff_qualification"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->QUALIFICATION ?></a>
                                                </li>
                                                <li class="list-group-item listnoback">
                                                    <b><?php echo $this->lang->line("staff_work_experience"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->EXPERIENCE ?></a>
                                                </li>

                                            </ul>
                                        </div>

                                    </div>
                                </div>
                                <br>

                                <div class="box box-primary">

                                    <div class="box-body box-profile">

                                        <div class="border_info">

                                            <h3 class="profile-username text-center pagetitleh2"><?php echo $this->lang->line("address"); ?></h3>

                                            <ul class="list-group list-group-unbordered">


                                                <li class="list-group-item listnoback">
                                                    <b><?php echo $this->lang->line("present_address"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->CURRENT_ADDRESS ?></a>
                                                </li>

                                                <li class="list-group-item listnoback">
                                                    <b><?php echo $this->lang->line("permanent_address"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->PERMANENT_ADDRESS ?></a>
                                                </li>



                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <br>


                                <div class="box box-primary">

                                    <div class="box-body box-profile">

                                        <div class="border_info">

                                            <h3 class="profile-username text-center pagetitleh2"><?php echo $this->lang->line("staff_bank_ac_details"); ?></h3>

                                            <ul class="list-group list-group-unbordered">


                                                <li class="list-group-item listnoback">
                                                    <b><?php echo $this->lang->line("staff_account_title"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->ACCOUNT_TITLE ?></a>
                                                </li>

                                                <li class="list-group-item listnoback">
                                                    <b><?php echo $this->lang->line("staff_bank_account_number"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->ACCOUNT_NUMBER ?></a>
                                                </li>
                                                <li class="list-group-item listnoback">
                                                    <b><?php echo $this->lang->line("staff_bank_name"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->ACCOUNT_BANK_NAME ?></a>
                                                </li>
                                                <li class="list-group-item listnoback">
                                                    <b><?php echo $this->lang->line("staff_branch_name"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->ACCOUNT_BRANCH_NAME ?></a>
                                                </li>



                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <br>




                            </div>




                        </div>



                        <div class="tab-pane fade" id="payroll" role="tabpanel" aria-labelledby="payroll-tab">
                            <?php

                                                if (isset($allPdt2)) {
                                                    foreach ($allPdt2 as $value2) {


                            ?>
                                    <div class="card">
                                        <h5 class="card-header"></h5>
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                                <div class="box-body box-profile">

                                                    <div class="border_info staffprofile">

                                                        <h5>Total Net Salary Paid </h5>
                                                        <h4><i class="
                                                            fas fa-dollar-sign"></i> <?php echo $value2["TOTAL_NET_SALARY"] ?></h4>

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                                <div class="box-body box-profile">

                                                    <div class="border_info staffprofile">

                                                        <h5>Total Earning </h5>
                                                        <h4><i class="
                                                            fas fa-dollar-sign"> </i><?php echo $value2["TOTAL_EARNINGS"] ?></h4>

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                                <div class="box-body box-profile">

                                                    <div class="border_info staffprofile">

                                                        <h5>Total Deduction</h5>
                                                        <h4><i class="
                                                            fas fa-dollar-sign"> </i><?php echo $value2["TOTAL_DEDUCTION"] ?>
                                                        </h4>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                            <?php
                                                    }
                                                } ?>


                            <!-- List of payroll -->
                            <div class="card">
                                <div class="card-body dataTables_wrapper no-footer">
                                    <div class="table-responsive">
                                        <div class="section_print" id="section-to-print">
                                            <table id="example" class="table table-striped table-bordered dt-responsive c" cellspacing="0" style="width:100%;">
                                                <thead>
                                                    <tr>

                                                        <th><?php echo $this->lang->line("payslip_no"); ?></th>
                                                        <th><?php echo $this->lang->line("month_year"); ?></th>
                                                        <th><?php echo $this->lang->line("date"); ?></th>
                                                        <th><?php echo $this->lang->line("mode"); ?></th>
                                                        <th><?php echo $this->lang->line("net_salary"); ?></th>
                                                        <th><?php echo $this->lang->line("action"); ?></th>





                                                    </tr>
                                                </thead>

                                                <tbody>

                                                    <?php

                                                    if (isset($allPdt3)) {



                                                        foreach ($allPdt3 as $value) {


                                                    ?>

                                                            <tr>

                                                                <td><?php echo $value->ID ?></td>
                                                                <td><?php echo $value->MONTH ?> - <?php echo $value->YEAR ?></td>
                                                                <td><?php echo $value->PAYMENT_DATE ?> </td>
                                                                <td><?php echo $value->PAYMENT_METHOD ?></td>
                                                                <td><?php echo $value->NET_SALARY ?></td>
                                                                <td>
                                                                    <?php 

                                                                        if($value->STATUS==1 ){ ?>
                                                                            <a  href="<?php echo base_url() ?>admin/hrms/staff/view_payslip/view/<?php
                                                                            echo $value->STAFF_ID ?>/<?php
                                                                            echo $value->MONTH  ?>/<?php
                                                                            echo  $value->YEAR   ?>" class="unstyled-button label">view payslip</i></a>
                                                    <?php
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

                            <!-- End list Payroll -->
                        </div>


                        <div class="tab-pane fade" id="leaves" role="tabpanel" aria-labelledby="leaves-tab">
                            <div class="card">
                                <div class="card-body dataTables_wrapper no-footer">
                                    <div class="table-responsive">
                                        <div class="section_print" id="section-to-print">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <!--  <th><?php //echo $this->lang->line("id"); 
                                                                    ?></th> -->
                                                        <th><?php echo $this->lang->line("staff_id"); ?></th>

                                                        <th><?php echo $this->lang->line("leave_type"); ?></th>
                                                        <th><?php echo $this->lang->line("leave_date"); ?></th>
                                                        <th><?php echo $this->lang->line("days"); ?></th>
                                                        <th><?php echo $this->lang->line("apply_date"); ?></th>
                                                        <th><?php echo $this->lang->line("status"); ?></th>






                                                    </tr>
                                                </thead>

                                                <tbody>

                                                    <?php

                                                    if (isset($allPdt4)) {



                                                        foreach ($allPdt4 as $value) {


                                                    ?>

                                                            <tr>
                                                                <!--  <td><?php //echo $value->ID
                                                                            ?></td> -->
                                                                <td><?php echo $value->STAFF_ID ?></td>

                                                                <td><?php echo $value->LEAVE_NAME ?></td>
                                                                <td><?php echo $value->LEAVE_FROM ?> &emsp;- &emsp;<?php echo $value->LEAVE_TO ?></td>
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
                        
                    
                     
                            <div class="tab-pane fade" id="attendence" role="tabpanel" aria-labelledby="attendence-tab">

                                <div class="card">
                                    <h5 class="card-header"></h5>
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                            <div class="box-body box-profile">

                                                <div class="border_info staffprofile">

                                                    <h5>Total Present </h5>
                                                    <h4><i class="
                                                    fas fa-calendar-check"></i> <?php $c=0; 
                                                    $cur_year = date("y");

                                                    
                                                    foreach($allPdt6 as $value){
                                                        if($value->ATTENDENCE_TYPE=="PRESENT")
                                                        {
                                                            $yr=explode("-",$value->ATTENDENCE_DATE);
                                                            if($cur_year==$yr[2])
                                                            {
                                                                $c++;
                                                            }
                                                            
                                                           
                                                        }
                                                    } echo $c; ?> Days</h4>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                            <div class="box-body box-profile">

                                                <div class="border_info staffprofile">

                                                    <h5>Total Absent </h5>
                                                    <h4><i class="
                                                    fas fa-calendar-check" > </i> <?php $c=0; 
                                                    $cur_year = date("y");

                                                    
                                                    foreach($allPdt6 as $value){
                                                        if($value->ATTENDENCE_TYPE=="ABSENT")
                                                        {
                                                            $yr=explode("-",$value->ATTENDENCE_DATE);
                                                            if($cur_year==$yr[2])
                                                            {
                                                                $c++;
                                                            }
                                                            
                                                           
                                                        }
                                                    } echo $c; ?> Days</h4>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                            <div class="box-body box-profile">

                                                <div class="border_info staffprofile">

                                                    <h5>Total Late</h5>
                                                    <h4><i class="
                                                    fas fa-calendar-check "> </i> <?php $c=0; 
                                                    $cur_year = date("y");

                                                    
                                                    foreach($allPdt6 as $value){
                                                        if($value->ATTENDENCE_TYPE=="LATE")
                                                        {
                                                            $yr=explode("-",$value->ATTENDENCE_DATE);
                                                            if($cur_year==$yr[2])
                                                            {
                                                                $c++;
                                                            }
                                                            
                                                           
                                                        }
                                                    } echo $c; ?> Days
                                                    </h4>

                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            
                               
                                <!-- List of attendence -->
                                <div class="card">
                                    <br>
                        
                                   
                                 
                                        <div class="row" style="margin-left: 10px;">
                                      
                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                                                <select  class="form-control" name="attndence_year_search" id="year_Change" >
                                                    
                                                    <option value="2020" selected ><?php echo date("Y"); ?></option>
                                                

                                                </select>
                                            </div>
                                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 pull-right">
                                                    <p>Present: P Late: L Absent: A  Wickend: W</p>
                                            </div>
                                           
                                       
                                        </div>
                                       
                                
                                    <div class="card-body dataTables_wrapper no-footer">
                                        <div class="table-responsive" style="overflow: hidden;">

                                            <div class="row">
                                            

                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <table class="table tbl-border" style="overflow: hidden; border-right: 1px solid #ddd;border-left: 1px solid #ddd;">
                                                <thead>
                                                    <tr>
                                                        <th>Date|Mon</th>
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
                                              
                                                

                                                for($i=1;$i<=31;$i++){ ?>
                                                    <tr>
                                                    <td><?php echo $i;?></td>

                                                    <td><?php 
                                                     if (isset($allPdt5)) {
                                                         foreach ($allPdt5 as $value5) {
                                                             $month= explode("-", $value5->ATTENDENCE_DATE);

                                                             if($i==$month[0])
                                                             {
                                                                if ($month[1]=="JAN") {
                                                                    if ($value5->ATTENDENCE_TYPE=="PRESENT") {
                                                                        echo  "P"  ;
                                                                    } elseif ($value5->ATTENDENCE_TYPE=="ABSENT") {
                                                                        echo  "A"  ;
                                                                    } elseif ($value5->ATTENDENCE_TYPE=="LATE") {
                                                                        echo  "L"  ;
                                                                    
                                                                    }else if ($value5->ATTENDENCE_TYPE=="LEAVE"){
                                                                        echo "LV";

                                                                    } else {
                                                                        echo  "W"  ;
                                                                    }
                                                                }
                                                            

                                                             }
                                                             
                                                           
                                                           
                                                            
                                                            
                                                         }
                                                     } ?>
                                                            
                                                            </td> 


                                                            <td><?php 
                                                     if (isset($allPdt5)) {
                                                         foreach ($allPdt5 as $value5) {
                                                             $month= explode("-", $value5->ATTENDENCE_DATE);

                                                             if($i==$month[0])
                                                             {
                                                                if ($month[1]=="FEB") {
                                                                    if ($value5->ATTENDENCE_TYPE=="PRESENT") {
                                                                        echo  "P)"  ;
                                                                    } elseif ($value5->ATTENDENCE_TYPE=="ABSENT") {
                                                                        echo  "A"  ;
                                                                    } elseif ($value5->ATTENDENCE_TYPE=="LATE") {
                                                                        echo  "L ";
                                                                    }elseif ($value5->ATTENDENCE_TYPE=="LATE") {
                                                                        echo  "L"  ;
                                                                    
                                                                    }else if ($value5->ATTENDENCE_TYPE=="LEAVE"){
                                                                        echo "LV";

                                                                    }  else {
                                                                        echo  "W"  ;
                                                                    }
                                                                }
                                                            

                                                             }
                                                             
                                                           
                                                           
                                                            
                                                            
                                                         }
                                                     } ?>
                                                            
                                                            </td> 



                                                            <td><?php 
                                                     if (isset($allPdt5)) {
                                                         foreach ($allPdt5 as $value5) {
                                                             $month= explode("-", $value5->ATTENDENCE_DATE);

                                                             if($i==$month[0])
                                                             {
                                                                if ($month[1]=="MAR") {
                                                                    if ($value5->ATTENDENCE_TYPE=="PRESENT") {
                                                                        echo  "P"  ;
                                                                    } elseif ($value5->ATTENDENCE_TYPE=="ABSENT") {
                                                                        echo  "A"  ;
                                                                    } elseif ($value5->ATTENDENCE_TYPE=="LATE") {
                                                                        echo  "L"  ;
                                                                    }elseif ($value5->ATTENDENCE_TYPE=="LATE") {
                                                                        echo  "L"  ;
                                                                    
                                                                    }else if ($value5->ATTENDENCE_TYPE=="LEAVE"){
                                                                        echo "LV";

                                                                    }  else {
                                                                        echo  "W"  ;
                                                                    }
                                                                }
                                                            

                                                             }
                                                             
                                                           
                                                           
                                                            
                                                            
                                                         }
                                                     } ?>
                                                            
                                                            </td> 

                                                            <td><?php 
                                                     if (isset($allPdt5)) {
                                                         foreach ($allPdt5 as $value5) {
                                                             $month= explode("-", $value5->ATTENDENCE_DATE);

                                                             if($i==$month[0])
                                                             {
                                                                if ($month[1]=="APR") {
                                                                    if ($value5->ATTENDENCE_TYPE=="PRESENT") {
                                                                        echo  "P"  ;
                                                                    } elseif ($value5->ATTENDENCE_TYPE=="ABSENT") {
                                                                        echo  "A "."(".$month[0].")"  ;
                                                                    } elseif ($value5->ATTENDENCE_TYPE=="LATE") {
                                                                        echo  "L"  ;
                                                                    }elseif ($value5->ATTENDENCE_TYPE=="LATE") {
                                                                        echo  "L"  ;
                                                                    
                                                                    }else if ($value5->ATTENDENCE_TYPE=="LEAVE"){
                                                                        echo "LV";

                                                                    }  else {
                                                                        echo  "W"  ;
                                                                    }
                                                                }
                                                            

                                                             }
                                                             
                                                           
                                                           
                                                            
                                                            
                                                         }
                                                     } ?>
                                                            
                                                            </td> 

                                                            <td><?php 
                                                     if (isset($allPdt5)) {
                                                         foreach ($allPdt5 as $value5) {
                                                             $month= explode("-", $value5->ATTENDENCE_DATE);

                                                             if($i==$month[0])
                                                             {
                                                                if ($month[1]=="MAY") {
                                                                    if ($value5->ATTENDENCE_TYPE=="PRESENT") {
                                                                        echo  "P"  ;
                                                                    } elseif ($value5->ATTENDENCE_TYPE=="ABSENT") {
                                                                        echo  "A"  ;
                                                                    } elseif ($value5->ATTENDENCE_TYPE=="LATE") {
                                                                        echo  "L"  ;
                                                                    }elseif ($value5->ATTENDENCE_TYPE=="LATE") {
                                                                        echo  "L"  ;
                                                                    
                                                                    }else if ($value5->ATTENDENCE_TYPE=="LEAVE"){
                                                                        echo "LV";

                                                                    }  else {
                                                                        echo  "W"  ;
                                                                    }
                                                                }
                                                            

                                                             }
                                                             
                                                           
                                                           
                                                            
                                                            
                                                         }
                                                     } ?>
                                                            
                                                            </td> 

                                                            <td><?php 
                                                     if (isset($allPdt5)) {
                                                         foreach ($allPdt5 as $value5) {
                                                             $month= explode("-", $value5->ATTENDENCE_DATE);

                                                             if($i==$month[0])
                                                             {
                                                                if ($month[1]=="JUN") {
                                                                    if ($value5->ATTENDENCE_TYPE=="PRESENT") {
                                                                        echo  "P"  ;
                                                                    } elseif ($value5->ATTENDENCE_TYPE=="ABSENT") {
                                                                        echo  "A "."(".$month[0].")"  ;
                                                                    } elseif ($value5->ATTENDENCE_TYPE=="LATE") {
                                                                        echo  "L"  ;
                                                                    }elseif ($value5->ATTENDENCE_TYPE=="LATE") {
                                                                        echo  "L"  ;
                                                                    
                                                                    }else if ($value5->ATTENDENCE_TYPE=="LEAVE"){
                                                                        echo "LV";

                                                                    }  else {
                                                                        echo  "W"  ;
                                                                    }
                                                                }
                                                            

                                                             }
                                                             
                                                           
                                                           
                                                            
                                                            
                                                         }
                                                     } ?>
                                                            
                                                            </td> 

                                                            <td><?php 
                                                     if (isset($allPdt5)) {
                                                         foreach ($allPdt5 as $value5) {
                                                             $month= explode("-", $value5->ATTENDENCE_DATE);

                                                             if($i==$month[0])
                                                             {
                                                                if ($month[1]=="JUL") {
                                                                    if ($value5->ATTENDENCE_TYPE=="PRESENT") {
                                                                        echo  "P"  ;
                                                                    } elseif ($value5->ATTENDENCE_TYPE=="ABSENT") {
                                                                        echo  "A"  ;
                                                                    } elseif ($value5->ATTENDENCE_TYPE=="LATE") {
                                                                        echo  "L"  ;
                                                                    }elseif ($value5->ATTENDENCE_TYPE=="LATE") {
                                                                        echo  "L"  ;
                                                                    
                                                                    }else if ($value5->ATTENDENCE_TYPE=="LEAVE"){
                                                                        echo "LV";

                                                                    }  else {
                                                                        echo  "W"  ;
                                                                    }
                                                                }
                                                            

                                                             }
                                                             
                                                           
                                                           
                                                            
                                                            
                                                         }
                                                     } ?>
                                                            
                                                            </td> 

                                                            <td><?php 
                                                     if (isset($allPdt5)) {
                                                         foreach ($allPdt5 as $value5) {
                                                             $month= explode("-", $value5->ATTENDENCE_DATE);

                                                             if($i==$month[0])
                                                             {
                                                                if ($month[1]=="AUG") {
                                                                    if ($value5->ATTENDENCE_TYPE=="PRESENT") {
                                                                        echo  "P"  ;
                                                                    } elseif ($value5->ATTENDENCE_TYPE=="ABSENT") {
                                                                        echo  "A"  ;
                                                                    } elseif ($value5->ATTENDENCE_TYPE=="LATE") {
                                                                        echo  "L"  ;
                                                                    }elseif ($value5->ATTENDENCE_TYPE=="LATE") {
                                                                        echo  "L"  ;
                                                                    
                                                                    }else if ($value5->ATTENDENCE_TYPE=="LEAVE"){
                                                                        echo "LV";

                                                                    }  else {
                                                                        echo  "W"  ;
                                                                    }
                                                                }
                                                            

                                                             }
                                                             
                                                           
                                                           
                                                            
                                                            
                                                         }
                                                     } ?>
                                                            
                                                            </td> 

                                                            <td><?php 
                                                     if (isset($allPdt5)) {
                                                         foreach ($allPdt5 as $value5) {
                                                             $month= explode("-", $value5->ATTENDENCE_DATE);

                                                             if($i==$month[0])
                                                             {
                                                                if ($month[1]=="SEP") {
                                                                    if ($value5->ATTENDENCE_TYPE=="PRESENT") {
                                                                        echo  "P"  ;
                                                                    } elseif ($value5->ATTENDENCE_TYPE=="ABSENT") {
                                                                        echo  "A"  ;
                                                                    } elseif ($value5->ATTENDENCE_TYPE=="LATE") {
                                                                        echo  "L"  ;
                                                                    }elseif ($value5->ATTENDENCE_TYPE=="LATE") {
                                                                        echo  "L"  ;
                                                                    
                                                                    }else if ($value5->ATTENDENCE_TYPE=="LEAVE"){
                                                                        echo "LV";

                                                                    }  else {
                                                                        echo  "W"  ;
                                                                    }
                                                                }
                                                            

                                                             }
                                                             
                                                           
                                                           
                                                            
                                                            
                                                         }
                                                     } ?>
                                                            
                                                            </td> 

                                                            <td><?php 
                                                     if (isset($allPdt5)) {
                                                         foreach ($allPdt5 as $value5) {
                                                             $month= explode("-", $value5->ATTENDENCE_DATE);

                                                             if($i==$month[0])
                                                             {
                                                                if ($month[1]=="OCT") {
                                                                    if ($value5->ATTENDENCE_TYPE=="PRESENT") {
                                                                        echo  "P"  ;
                                                                    } elseif ($value5->ATTENDENCE_TYPE=="ABSENT") {
                                                                        echo  "A " ;
                                                                    } elseif ($value5->ATTENDENCE_TYPE=="LATE") {
                                                                        echo  "L ";
                                                                    }elseif ($value5->ATTENDENCE_TYPE=="LATE") {
                                                                        echo  "L"  ;
                                                                    
                                                                    }else if ($value5->ATTENDENCE_TYPE=="LEAVE"){
                                                                        echo "LV";

                                                                    }  else {
                                                                        echo  "W"  ;
                                                                    }
                                                                }
                                                            

                                                             }
                                                             
                                                           
                                                           
                                                            
                                                            
                                                         }
                                                     } ?>
                                                            
                                                            </td> 

                                                            <td><?php 
                                                     if (isset($allPdt5)) {
                                                         foreach ($allPdt5 as $value5) {
                                                             $month= explode("-", $value5->ATTENDENCE_DATE);

                                                             if($i==$month[0])
                                                             {
                                                                if ($month[1]=="NOV") {
                                                                    if ($value5->ATTENDENCE_TYPE=="PRESENT") {
                                                                        echo  "P"  ;
                                                                    } elseif ($value5->ATTENDENCE_TYPE=="ABSENT") {
                                                                        echo  "A"  ;
                                                                    } elseif ($value5->ATTENDENCE_TYPE=="LATE") {
                                                                        echo  "L"  ;
                                                                    }elseif ($value5->ATTENDENCE_TYPE=="LATE") {
                                                                        echo  "L"  ;
                                                                    
                                                                    }else if ($value5->ATTENDENCE_TYPE=="LEAVE"){
                                                                        echo "LV";

                                                                    }  else {
                                                                        echo  "W"  ;
                                                                    }
                                                                }
                                                            

                                                             }
                                                             
                                                           
                                                           
                                                            
                                                            
                                                         }
                                                     } ?>
                                                            
                                                            </td> 

                                                            <td><?php 
                                                     if (isset($allPdt5)) {
                                                         foreach ($allPdt5 as $value5) {
                                                             $month= explode("-", $value5->ATTENDENCE_DATE);

                                                             if($i==$month[0])
                                                             {
                                                                if ($month[1]=="DEC") {
                                                                    if ($value5->ATTENDENCE_TYPE=="PRESENT") {
                                                                        echo  "P"  ;
                                                                    } elseif ($value5->ATTENDENCE_TYPE=="ABSENT") {
                                                                        echo  "A"  ;
                                                                    } elseif ($value5->ATTENDENCE_TYPE=="LATE") {
                                                                        echo  "L" ;
                                                                    }else if ($value5->ATTENDENCE_TYPE=="LEAVE"){
                                                                        echo "LV";

                                                                    }  else {
                                                                        echo  "W"  ;
                                                                    }
                                                                }
                                                            

                                                             }
                                                             
                                                           
                                                           
                                                            
                                                            
                                                         }
                                                     } ?>
                                                            
                                                            </td> 
                                                           

                                                           
                                                    </tr>  <?php
                                                    
                                                }?>
                                                   
                                               
                                                </tbody>
                                            </table>
                                            </div>

                                            </div>
                                            
                                  
                                        

                                        </div>
                                        <br>

                                    </div>
                                </div>

                                <!-- End list attendence -->
             

                            </div>
                            
                         

                        


                    </div>





            </div>

            </section>





        </div>




    </div>


    <!-- -->
</div>





</div>

</div>
<?php
                                            }
?>












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
    $('.password, .confirm_password').on('keyup', function() {
        if ($('.password').val() == $('.confirm_password').val()) {
            $('#message').html('Matching').css('color', 'green');
        } else
            $('#message').html('Not Matching').css('color', 'red');
    });
</script>


<script>
     $('#myTab a').click(function (e) {
      e.preventDefault();
      $(this).tab('show');
    })
</script>