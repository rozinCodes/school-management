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
            <h2><?php echo $this->lang->line("student_details"); ?></h2>
        </div>


        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title"><?php echo $this->lang->line("sections"); ?> </h2>

                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("dashboard"); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line("student_details"); ?></li>
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

                                                if ($allPdt->STUDENT_IMAGE) {

                                            ?>

                                                    <img class="profile-user-img img-responsive img-circle center" src="<?php echo base_url(); ?>uploads/students/picture/<?php echo $allPdt->STUDENT_IMAGE ?> " alt="User profile picture">
                                                <?php
                                                } else {


                                                ?>
                                                    <img class="profile-user-img img-responsive img-circle center" src="<?php echo base_url(); ?>upload/images/no-pic.jpg" alt="User profile picture">

                                                <?php
                                                }
                                                ?>
                                                <h3 class="profile-username text-center"><?php echo $allPdt->F_NAME ?> <?php echo $allPdt->L_NAME ?></h3>

                                                <ul class="list-group list-group-unbordered">


                                                    <li class="list-group-item listnoback">
                                                        <b><?php echo $this->lang->line("admission_no"); ?></b> <a class="pull-right text-aqua">
                                                            <td><?php echo $allPdt->ADMISSION_NO ?></td>
                                                        </a>
                                                    </li>

                                                    <li class="list-group-item listnoback">
                                                        <b><?php echo $this->lang->line("roll_no"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->ROLL ?></a>
                                                    </li>
                                                    <li class="list-group-item listnoback">
                                                        <b><?php echo $this->lang->line("class"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->CLASS_NAME ?></a>
                                                    </li>
                                                    <li class="list-group-item listnoback">
                                                        <b><?php echo $this->lang->line("section"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->SECTION_NAME ?></a>
                                                    </li>
                                                    <li class="list-group-item listnoback">
                                                        <b><?php echo $this->lang->line("session"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->SESSIONS ?></a>
                                                    </li>
                                                    <li class="list-group-item listnoback">
                                                        <b><?php echo $this->lang->line("gender"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->GENDER ?></a>
                                                    </li>
                                                    <li class="list-group-item listnoback">
                                                        <b><?php echo $this->lang->line("blood_group"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->BLOOD_GROUP ?></a>
                                                    </li>
                                                    <li class="list-group-item listnoback">
                                                        <b><?php echo $this->lang->line("version"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->VERSION ?></a>
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

                    <ul class="nav nav-tabs nv-color" id="myTab" role="tablist">
                        <li class="nav-item waves-effect waves-light active">
                            <a class="nav-link  " id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><?php echo $this->lang->line("profile"); ?></a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" id="fees-tab" data-toggle="tab" href="#fees" role="tab" aria-controls="fees" aria-selected="false"><?php echo $this->lang->line("fees"); ?></a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" id="exam-tab" data-toggle="tab" href="#exam" role="tab" aria-controls="exam" aria-selected="true"><?php echo $this->lang->line("exams"); ?></a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" id="attendence-tab" data-toggle="tab" href="#attendence" role="tab" aria-controls="attendence" aria-selected="true"><?php echo $this->lang->line("attendence"); ?></a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" id="bioattendence-tab" data-toggle="tab" href="#bioattendence" role="tab" aria-controls="bioattendence" aria-selected="true"><?php echo $this->lang->line("bioattendence"); ?></a>
                        </li>

                        &emsp;
                        &emsp;
                        &emsp;
                        &emsp;

                        <?php

                                                $roles = $this->session->userdata('roles');

                                                if (($roles == 1) or ($roles == 2)) { ?>

                            <li class="pull-right" data-toggle="tooltip" data-original-title="Edit">
                                <a href="<?php echo base_url() ?>Admin/hrms/staff/staff_edit/edit/<?php
                                                                                                    echo $allPdt->ID ?>" style="cursor: pointer;" onclick="" class=" data-toggle=" tooltip" data-placement="bottom">
                                    <i class="fas fa-pencil-alt"></i></a>
                            </li> <?php


                                                }

                                    ?>







                    </ul>



                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="profile" role="tabpanel" aria-labelledby="profile-tab">


                            <div class="card">
                                <h5 class="card-header"></h5>


                                <div class="box box-primary">


                                    <div class="box-body box-profile">

                                        <div class="border_info">

                                            <h3 class="profile-username text-center pagetitleh2"><?php echo $this->lang->line("personal_info"); ?></h3>

                                            <ul class="list-group list-group-unbordered">


                                                <li class="list-group-item listnoback">
                                                    <b><?php echo $this->lang->line("admission_date"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->ADMISSION_DATE ?></a>
                                                </li>

                                                <li class="list-group-item listnoback">
                                                    <b><?php echo $this->lang->line("date_of_birth"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->DATE_OF_BIRTH ?></a>

                                                </li>
                                                <li class="list-group-item listnoback">
                                                    <b><?php echo $this->lang->line("mobile_no"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->MOBILE_NO ?></a>
                                                </li>
                                                <li class="list-group-item listnoback">
                                                    <b><?php echo $this->lang->line("religion"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->RELIGION ?></a>
                                                </li>
                                                <li class="list-group-item listnoback">
                                                    <b><?php echo $this->lang->line("email"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->EMAIL ?></a>
                                                </li>

                                                </li>

                                            </ul>
                                        </div>

                                    </div>
                                </div>
                                <br>

                                <div class="box box-primary">

                                    <div class="box-body box-profile">

                                        <div class="border_info">

                                            <h3 class="profile-username text-center pagetitleh2"><?php echo $this->lang->line("parent_detail"); ?></h3>

                                            <ul class="list-group list-group-unbordered">


                                                <li class="list-group-item listnoback">
                                                    <b><?php echo $this->lang->line("father_name"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->FATHER_NAME ?></a>
                                                </li>

                                                <li class="list-group-item listnoback">
                                                    <b><?php echo $this->lang->line("father_phone"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->FATHER_PHONE ?></a>
                                                </li>
                                                <li class="list-group-item listnoback">
                                                    <b><?php echo $this->lang->line("mother_name"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->MOTHER_NAME ?></a>
                                                </li>

                                                <li class="list-group-item listnoback">
                                                    <b><?php echo $this->lang->line("mother_phone"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->MOTHER_PHONE ?></a>
                                                </li>



                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <br>


                                <div class="box box-primary">

                                    <div class="box-body box-profile">

                                        <div class="border_info">

                                            <h3 class="profile-username text-center pagetitleh2"><?php echo $this->lang->line("gurdian_detail"); ?></h3>

                                            <ul class="list-group list-group-unbordered">


                                                <li class="list-group-item listnoback">
                                                    <b><?php echo $this->lang->line("guardian_name"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->GUARDIAN_NAME ?></a>
                                                </li>

                                                <li class="list-group-item listnoback">
                                                    <b><?php echo $this->lang->line("guardian_phone"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->GUARDIAN_PHONE ?></a>
                                                </li>
                                                <li class="list-group-item listnoback">
                                                    <b><?php echo $this->lang->line("guardian_present_address"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->GUARDIAN_PRESENT_ADDRESS ?></a>
                                                </li>
                                                <li class="list-group-item listnoback">
                                                    <b><?php echo $this->lang->line("guardian_permanent_address"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->GUARDIAN_PERMANENT_ADDRESS ?></a>
                                                </li>
                                                <li class="list-group-item listnoback">
                                                    <b><?php echo $this->lang->line("gurdian_relation"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->RELATION ?></a>
                                                </li>




                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <br>




                            </div>




                        </div>



                        <div class="tab-pane fade" id="fees" role="tabpanel" aria-labelledby="fees-tab">


                            <!-- List of payroll -->
                            <div class="card">
                                <div class="card-body dataTables_wrapper no-footer">
                                    <div class="table-responsive">
                                        <div class="section_print" id="section-to-print">
                                            <table id="" class="table table-striped table-bordered first">
                                                <thead>
                                                    <tr>


                                                        <th><?php echo $this->lang->line("class"); ?></th>
                                                        <th><?php echo $this->lang->line("session"); ?></th>
                                                        <th><?php echo $this->lang->line("year"); ?></th>
                                                        <th><?php echo $this->lang->line("status"); ?></th>
                                                        <th><?php echo $this->lang->line("paid_amount"); ?></th>
                                                        <th><?php echo $this->lang->line("total_fees"); ?></th>
                                                        <th><?php echo $this->lang->line("fees_type"); ?></th>





                                                    </tr>
                                                </thead>

                                                <tbody>

                                                    <?php

                                                    if (isset($allPdt3)) {



                                                        foreach ($allPdt3 as $value) {


                                                    ?>

                                                            <tr>


                                                                <td><?php echo $value->CLASS ?> (<?php echo $value->SECTION ?>)</td>
                                                                <td><?php echo $value->SESSIONS ?> </td>
                                                                <td><?php echo $value->YEAR ?>(<?php echo $value->MONTH ?>)</td>
                                                                <td><?php echo $value->STATUS ?></td>
                                                                <td><?php echo $value->PAID_AMOUNT ?></td>
                                                                <td><?php echo $value->TOTAL_FEES ?></td>
                                                                <td><?php echo $value->FEES_NAME ?></td>


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

                        <!-- bioAttendence start -->
                        
                        <div class="tab-pane fade" id="bioattendence" role="tabpanel" aria-labelledby="bioattendence-tab">


                            <!-- List of payroll -->
                            <div class="card">
                                <div class="card-body dataTables_wrapper no-footer">
                                    <div class="table-responsive">
                                        <div class="section_print" id="section-to-print">
                                            <table id="" class="table ">
                                                <thead>
                                                    <tr>
                                                       <th>Shift</th>
                                                        <th>In Time</th>
                                                        <th>Out Time</th>
                                                        <th>Duration</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>

                                                <tbody>

                                                    <?php
                                                    ?>
                                                    <tr>
                                                               <td><?php echo date('h:i a', strtotime($studentShift->START_TIME)) ." to ".date('h:i a', strtotime($studentShift->END_TIME)) ;?></td>
                                                                <td><?php if($firstTime){ echo date("Y/m/d H:i:s ",$firstTime->INTIME);}else{echo "NoUpdate";} ?></td>
                                                                <td><?php if($lastTime){ echo date("Y/m/d H:i:s ",$lastTime->EXITTIME);}else{echo "NoUpdate";}?></td>
                                                                <td><?php echo  $duration;?></td>
                                                                <td><?php echo $status; ?></td>

                                                            </tr>
                                                    <?php

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

                        <!-- bioAttendence end -->


                        <div class="tab-pane fade" id="exam" role="tabpanel" aria-labelledby="exam-tab">
                            <div class="card">
                                <div class="card-body dataTables_wrapper no-footer">
                                    <div class="table-responsive">

                                        <?php


                                                foreach ($count_exam as $tot_exam) {
                                                    foreach ($allPdt2 as $value) {
                                                        if ($tot_exam->ID == $value->EXAM_ID) { ?>
                                                    <div class="tshadow mb25">
                                                        <h4 class="pagetitleh">
                                                            <?php echo $value->EXAM_NAME ?>
                                                        </h4>
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-hover ptt10" id="headerTable">
                                                                <thead>
                                                                    <tr>
                                                                        <th><?php echo $this->lang->line("subject"); ?></th>
                                                                        <th>Max. Marks</th>
                                                                        <th>Min. Marks</th>
                                                                        <th>Marks Obtained</th>
                                                                        <th>
                                                                            Result
                                                                        </th>
                                                                        <th>Note</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>


                                                                    <?php
                                                                    $s = 0;
                                                                    $max_mark = 0;
                                                                    $count = 0;

                                                                    foreach ($allPdt2 as $value) {
                                                                        if ($tot_exam->ID == $value->EXAM_ID) {

                                                                            $s = $s + $value->MARK;
                                                                            $max_mark = $max_mark + $allPdt4->MAX_MARKS;


                                                                    ?>
                                                                            <tr>
                                                                                <td><?php echo $value->SUBJECT_NAME ?></td>
                                                                                <td><?php echo $allPdt4->MAX_MARKS ?></td>
                                                                                <td><?php echo $allPdt4->MIN_MARKS ?></td>
                                                                                <td><?php echo $value->MARK ?></td>
                                                                                <td><?php
                                                                                $ps_mark= $pass_mark->PASS_MARK+1;
                                                                                    if ($value->MARK >=$ps_mark) {
                                                                                        // echo "<h1>Hello User, </h1> <p>Welcome to {$name}</p>"; 
                                                                                        echo ' <label class="label label-success">Pass</label> ';
                                                                                    }
                                                                                    
                                                                                    else if($value->MARK==null)
                                                                                    {
                                                                                        echo ' <label class="label label-danger">Not Inserted</label> ';
                                                                                    }
                                                                                    else {
                                                                                        $count++;
                                                                                        echo ' <label class="label label-danger">Fail</label> ';
                                                                                    }
                                                                                    ?>
                                                                                </td>
                                                                                <td>None</td>
                                                                            </tr>

                                                                    <?php }
                                                                    }
                                                                ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="bgtgray">
                                                                    <div class="row">

                                                                        <div class="col-sm-4 col-lg-4 col-md-4">
                                                                            <div class="description-block">
                                                                                <h5 class="description-header">Percentage : <span class="description-text"><?php
                                                                                                                                                            echo round(($s * 100) / $max_mark) . "%";
                                                                                                                                                            ?>(<?php echo $max_mark ?>)</span></h5>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-4 col-lg-4 col-md-4 ">
                                                                            <div class="description-block">
                                                                                <h5 class="description-header">Result :<span class="description-text">

                                                                                        <?php
                                                                                        $fail = 0;

                                                                                        foreach ($allPdt2 as $value) {
                                                                                            if ($tot_exam->ID == $value->EXAM_ID) {
                                                                                                if ($value->MARK < 33) {
                                                                                                    $fail++;


                                                                                                    break;
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                        ?>

                                                                                        <?php

                                                                                        if ($fail > 0) { ?>
                                                                                            <span class="label label-danger" style="margin-right: 5px;">fail</span> <?php

                                                                                                                                                                } else { ?>
                                                                                            <span class="label label-success" style="margin-right: 5px;">pass</span> <?php

                                                                                                                                                                    }


                                                                                                                                                                        ?>

                                                                                </h5>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-4 col-lg-4 col-md-4 ">
                                                                            <div class="description-block">
                                                                                <h5 class="description-header">Total Marks Obtain: <span class="description-text"><?php echo $s  ?></span></h5>
                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div><?php
                                                            break;
                                                        }
                                                    }
                                                }

                                                            ?>

                                        <br>

                                    </div>
                                </div>


                            </div>
                        </div>



                        <div class="tab-pane fade" id="attendence" role="tabpanel" aria-labelledby="attendence-tab">

                            <!-- <div class="card">
                                <h5 class="card-header"></h5>
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

                            </div> -->


                            <!-- List of attendence -->
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
                                                                                    }else if($value5->ATTENDENCE_TYPE == "HOLIDAY"){
                                                                                        echo "H";
                                                                                    }else if($value5->ATTENDENCE_TYPE == "LEAVE"){
                                                                                        echo "V";
                                                                                    }
                                                                                     else {
                                                                                        echo  "W";
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
                                                                                        echo  "L";
                                                                                    } 
                                                                                    else if($value5->ATTENDENCE_TYPE == "HOLIDAY"){
                                                                                        echo "H";
                                                                                    }else if($value5->ATTENDENCE_TYPE == "LEAVE"){
                                                                                        echo "V";
                                                                                    }
                                                                                    else {
                                                                                        echo  "W";
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
                                                                                    } 
                                                                                    else if($value5->ATTENDENCE_TYPE == "HOLIDAY"){
                                                                                        echo "H";
                                                                                    }else if($value5->ATTENDENCE_TYPE == "LEAVE"){
                                                                                        echo "V";
                                                                                    }
                                                                                    else {
                                                                                        echo  "W";
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
                                                                                    }
                                                                                    else if($value5->ATTENDENCE_TYPE == "HOLIDAY"){
                                                                                        echo "H";
                                                                                    }else if($value5->ATTENDENCE_TYPE == "LEAVE"){
                                                                                        echo "V";
                                                                                    }
                                                                                     else {
                                                                                        echo  "W";
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
                                                                                    } 
                                                                                    else if($value5->ATTENDENCE_TYPE == "HOLIDAY"){
                                                                                        echo "H";
                                                                                    }else if($value5->ATTENDENCE_TYPE == "LEAVE"){
                                                                                        echo "V";
                                                                                    }
                                                                                    else {
                                                                                        echo  "W";
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
                                                                                        echo  "A " ;
                                                                                    } elseif ($value5->ATTENDENCE_TYPE == "LATE") {
                                                                                        echo  "L";
                                                                                    } 
                                                                                    else if($value5->ATTENDENCE_TYPE == "HOLIDAY"){
                                                                                        echo "H";
                                                                                    }else if($value5->ATTENDENCE_TYPE == "LEAVE"){
                                                                                        echo "V";
                                                                                    }
                                                                                    else {
                                                                                        echo  "W";
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
                                                                                    }
                                                                                    else if($value5->ATTENDENCE_TYPE == "HOLIDAY"){
                                                                                        echo "H";
                                                                                    }else if($value5->ATTENDENCE_TYPE == "LEAVE"){
                                                                                        echo "V";
                                                                                    }
                                                                                     else {
                                                                                        echo  "W";
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
                                                                                    }
                                                                                    else if($value5->ATTENDENCE_TYPE == "HOLIDAY"){
                                                                                        echo "H";
                                                                                    }else if($value5->ATTENDENCE_TYPE == "LEAVE"){
                                                                                        echo "V";
                                                                                    }
                                                                                     else {
                                                                                        echo  "W";
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
                                                                                    }
                                                                                    else if($value5->ATTENDENCE_TYPE == "HOLIDAY"){
                                                                                        echo "H";
                                                                                    }else if($value5->ATTENDENCE_TYPE == "LEAVE"){
                                                                                        echo "V";
                                                                                    }
                                                                                     else {
                                                                                        echo  "W";
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
                                                                                        echo  "A";
                                                                                    } elseif ($value5->ATTENDENCE_TYPE == "LATE") {
                                                                                        echo  "L";
                                                                                    }
                                                                                    else if($value5->ATTENDENCE_TYPE == "HOLIDAY"){
                                                                                        echo "H";
                                                                                    }else if($value5->ATTENDENCE_TYPE == "LEAVE"){
                                                                                        echo "V";
                                                                                    }
                                                                                     else {
                                                                                        echo  "W";
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
                                                                                    }
                                                                                    else if($value5->ATTENDENCE_TYPE == "HOLIDAY"){
                                                                                        echo "H";
                                                                                    }else if($value5->ATTENDENCE_TYPE == "LEAVE"){
                                                                                        echo "V";
                                                                                    }
                                                                                     else {
                                                                                        echo  "W";
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
                                                                                    }
                                                                                    else if($value5->ATTENDENCE_TYPE == "HOLIDAY"){
                                                                                        echo "H";
                                                                                    }else if($value5->ATTENDENCE_TYPE == "LEAVE"){
                                                                                        echo "V";
                                                                                    }
                                                                                     else {
                                                                                        echo  "W";
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
    $('#myTab a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    })
</script>