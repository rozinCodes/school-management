<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->



        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <h2><?php echo $this->lang->line("finance_report"); ?></h2>
        </div>


        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title"><?php echo $this->lang->line("sections"); ?> </h2>

                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("dashboard"); ?></a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("finance_report"); ?></a></li>

                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->

        <div class="row">


            <!-- end validation form -->

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header"><?php echo $this->lang->line("sections"); ?></h5>

                    <div class="card-body">
                        <h2 style="color:green"> <?php
                                                    $dt = $this->session->userdata("msg");
                                                    if ($dt != NULL) {
                                                        echo $dt;
                                                        $this->session->unset_userdata("msg");
                                                    }
                                                    ?></h2>





                        <div class="box-header with-border">
                            <h3 class="box-title"><i class="fa fa-search"></i> Finance</h3>

                        </div>
                        <br>
                        <div class="row">

                            <div class="col-md-4">

                                <div class="">

                                    <li class="nav-item">


                                        <!-- <a class="nav-link" href="<?php echo base_url(); ?>admin/finance/finance_report/fees_statement">Fees Statement</a> -->

                                        <input type="button" name="answer" value="Fees Statement" onclick="showDiv1()" />

                                    </li>

                                </div>

                            </div>
                            <div class="col-md-4">


                                <div class="">


                                    <li class="nav-item">
                                        <!-- <a class="nav-link" href="<?php echo base_url(); ?>admin/finance/finance_report/fees_ollection_report">Fees Collection Report</a> -->
                                        <input type="button" name="answer" value="Fees Statement History" onclick="showDiv3()" />
                                    </li>



                                </div>

                            </div>
                            <div class="col-md-4">


                                <div class="">




                                    <li class="nav-item">

                                        <!-- <a class="nav-link" href="<?php echo base_url(); ?>admin/finance/finance_report/balance_fees_report">Balance Fees Report</a> -->
                                        <input type="button" name="answer" value="Balance Fees Report" onclick="showDiv2()" />
                                    </li>



                                </div>

                            </div>

                        </div>


                    </div>


                </div>
            </div>
        </div>

        <!-- start -->

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" id="welcomeDiv1" style="display:none;">
                <div class="card">
                    <h5 class="card-header"></h5>

                    <div class="card-body">
                        <h2 style="color:green"> </h2>

                        <form class="needs-validation" novalidate="" action="<?php echo base_url() ?>admin/finance/finance_report/fees_statement" method="post">

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

                                    <select class="form-control" name="class" id="class_id" required="" onchange="test4()">

                                        <option value="" selected><?php echo $this->lang->line("class"); ?></option>


                                    </select>


                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 ">
                                    <label for="validationCustom01"><?php echo $this->lang->line("section"); ?></label>

                                    <select class="form-control" name="section" id="section_id" required="" onchange="test4()">

                                        <option value="" selected><?php echo $this->lang->line("section"); ?></option>


                                    </select>


                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 ">

                                    <label for="validationCustom01"><?php echo $this->lang->line("session"); ?></label>
                                    <select class="form-control" id="session_id" name="session" onchange="test4()">
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
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>


                                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 ">
                                    <label for="validationCustom01"><?php echo $this->lang->line("student_lists"); ?></label>

                                    <select class="form-control" name="student_lists" id="student_id" required="">
                                        <option value="" selected>Select</option>
                                        <option value="" selected><?php echo $this->lang->line("student_lists"); ?></option>


                                    </select>


                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 ">

                                    <label for="validationCustom01"><?php echo $this->lang->line("fees_type"); ?></label>
                                    <select class="form-control" id="validationCustom01" name="fees_type">
                                        <option value="" selected>Select</option>
                                        <?php
                                        if (isset($allPdt6)) {
                                            foreach ($allPdt6 as $value) {

                                        ?>

                                                <option value="<?php echo $value->ID ?>"><?php echo $value->FEES_NAME ?></option>

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
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" id="welcomeDiv2" style="display:none;">
                <div class="card">
                    <h5 class="card-header"></h5>

                    <div class="card-body">
                        <h2 style="color:green"> </h2>

                        <form class="needs-validation" novalidate="" action="<?php echo base_url() ?>admin/finance/finance_report/balance_fees_report" method="post">

                            <div class="row">


                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                    <label for="validationCustom01"><?php echo $this->lang->line("version"); ?></label>

                                    <select class="form-control" id="version_id2" name="version" onchange="test22()" required="">
                                        <option value="" selected>Select</option>
                                        <?php
                                        if (isset($allPdt1)) {
                                            foreach ($allPdt1 as $val) {

                                        ?>

                                                <option value="<?php echo $val->ID ?>"><?php echo $val->VERSION ?></option>

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

                                    <select class="form-control" name="class" id="class_id2" required="">
                                        <option value="" selected><?php echo $this->lang->line("class"); ?></option>


                                    </select>


                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                    <label for="validationCustom01"><?php echo $this->lang->line("section"); ?></label>

                                    <select class="form-control" name="section" id="section_id2" required="">

                                        <option value="" selected><?php echo $this->lang->line("section"); ?></option>


                                    </select>


                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-3  col-md-3 col-sm-3 col-3 ">

                                    <label for="validationCustom01"><?php echo $this->lang->line("session"); ?></label>
                                    <select class="form-control" id="validationCustom01" name="session">
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
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>


                                <div class="col-xl-3 col-lg-3  col-md-3 col-sm-3 col-3 ">
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
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" id="welcomeDiv3" style="display:none;">
                <div class="card">
                    <h5 class="card-header"></h5>

                    <div class="card-body">
                        <h2 style="color:green"> </h2>

                        <form class="needs-validation" novalidate="" action="<?php echo base_url() ?>admin/finance/finance_report/fees_statement_history" method="post">

                            <div class="row">


                                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 ">
                                    <label for="validationCustom01"><?php echo $this->lang->line("version"); ?></label>

                                    <select class="form-control" id="version_id3" name="version" onchange="test222()" required="">
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

                                    <select class="form-control" name="class" id="class_id3" required="" onchange="test444()">

                                        <option value="" selected><?php echo $this->lang->line("class"); ?></option>


                                    </select>


                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 ">
                                    <label for="validationCustom01"><?php echo $this->lang->line("section"); ?></label>

                                    <select class="form-control" name="section" id="section_id3" required="" onchange="test444()">

                                        <option value="" selected><?php echo $this->lang->line("section"); ?></option>


                                    </select>


                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 ">

                                    <label for="validationCustom01"><?php echo $this->lang->line("session"); ?></label>
                                    <select class="form-control" id="session_id3" name="session" onchange="test444()">
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
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>


                                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 ">
                                    <label for="validationCustom01"><?php echo $this->lang->line("student_lists"); ?></label>

                                    <select class="form-control" name="student_lists" id="student_id3" required="">
                                        <option value="" selected>Select</option>
                                        <option value="" selected><?php echo $this->lang->line("student_lists"); ?></option>


                                    </select>


                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 ">

                                    <label for="validationCustom01"><?php echo $this->lang->line("fees_type"); ?></label>
                                    <select class="form-control" id="validationCustom01" name="fees_type">
                                        <option value="" selected>Select</option>
                                        <?php
                                        if (isset($allPdt6)) {
                                            foreach ($allPdt6 as $value) {

                                        ?>

                                                <option value="<?php echo $value->ID ?>"><?php echo $value->FEES_NAME ?></option>

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




        <!-- <div id="welcomeDiv1"  style="display:none;" class="answer_list" > WELCOME</div>
<div id="welcomeDiv2"  style="display:none;" class="answer_list" > WELCOME2</div>
<div id="welcomeDiv3"  style="display:none;" class="answer_list" > WELCOME3</div> -->
        <!-- end -->







        <?php if (isset($feesstatement)) { ?>


            <div class="card">


                <div class="card-body dataTables_wrapper no-footer">


                    <!-- srart -->
                    <?php if (isset($student)) {

                    ?>

                        <p style="cursor: pointer;" onclick="printDiv('<?php echo $student->F_NAME ?>','<?php echo $student->CLASS_NAME ?>(<?php echo $student->SECTION_NAME ?>)'
                        ,'<?php echo $student->ADMISSION_NO ?>','<?php echo $student->ROLL ?>','<?php echo $student->SESSIONS ?>')" class="pull-right" type="print"><i class=" fas fa-print"></i></p>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12  col-md-12 col-sm-12 col-12">
                                <div class="sfborder">
                                    <div class="row">
                                        <div class="col-xl-2 col-lg-2  col-md-2 col-sm-2 col-2">
                                            <div class="row">



                                                <img width="115" height="115" class="round5" src="<?php echo base_url(); ?>uploads/students/picture/<?php echo $student->STUDENT_IMAGE ?> " alt="No Image">


                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <table class="table mb0 font13">
                                                    <tbody>


                                                        <tr>
                                                            <th class="bozero"><?php echo $this->lang->line("name"); ?></th>
                                                            <td class="bozero"><?php echo $student->F_NAME ?></td>
                                                            <th class="bozero"><?php echo $this->lang->line("class_section"); ?></th>
                                                            <td class="bozero"><?php echo $student->CLASS_NAME ?> (<?php echo $student->SECTION_NAME ?>)</td>
                                                        </tr>

                                                        <tr>
                                                            <th><?php echo $this->lang->line("father_name"); ?></th>
                                                            <td><?php echo $student->FATHER_NAME ?></td>
                                                            <th><?php echo $this->lang->line("admission_no"); ?></th>
                                                            <td><?php echo $student->ADMISSION_NO ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th><?php echo $this->lang->line("father_phone"); ?></th>
                                                            <td><?php echo $student->FATHER_PHONE ?></td>
                                                            <th><?php echo $this->lang->line("roll_no"); ?></th>
                                                            <td><?php echo $student->ROLL ?></td>

                                                        </tr>

                                                        <tr>
                                                            <th><?php echo $this->lang->line("session"); ?></th>
                                                            <td><?php echo $student->SESSIONS ?></td>


                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                    <?php


                    }

                    ?>


                    <div class="table-responsive" id="GFG">
                        <style>
                            table,
                            th,
                            td {
                                border: 1px solid black;
                            }
                        </style>
                        <div class="section_print" id="section-to-print">
                            <table id="" class="table">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line("fees_type"); ?></th>
                                        <th><?php echo $this->lang->line("year"); ?></th>
                                        <th><?php echo $this->lang->line("month"); ?></th>
                                        <th><?php echo $this->lang->line("status"); ?></th>

                                        <th><?php echo $this->lang->line("total_fees"); ?></th>
                                        <th><?php echo $this->lang->line("discount"); ?></th>
                                        <th><?php echo $this->lang->line("paid_amount"); ?></th>
                                        <th><?php echo $this->lang->line("due_fees"); ?></th>







                                    </tr>
                                </thead>

                                <tbody>

                                    <?php




                                    $tf = 0;
                                    $pa = 0;
                                    $da = 0;
                                    foreach ($feesstatement as $value) {
                                        $tf = $tf + $value->TOTAL_FEES;
                                        $pa = $pa + $value->PAID_AMOUNT;
                                        $da = $da + $value->TOTAL_FEES - $value->PAID_AMOUNT;

                                    ?>

                                        <tr>
                                            <td><?php echo $value->FEES_NAME ?>(<?php echo $value->FEES_CODE ?>)</td>
                                            <td><?php echo $value->YEAR ?></td>
                                            <td><?php echo $value->MONTH ?></td>
                                            <td><?php echo $value->STATUS ?></td>

                                            <td><?php echo $value->TOTAL_FEES ?></td>
                                            <td><?php
                                                if ($value->DISCOUNT) {
                                                    echo $value->DISCOUNT;

                                                ?> <?php
                                                    echo "% of ";
                                                    echo ($value->TOTAL_FEES / (1 - ($value->DISCOUNT / 100)));
                                                } ?> </td>
                                            <td><?php echo $value->PAID_AMOUNT ?></td>
                                            <td><?php echo $value->TOTAL_FEES - $value->PAID_AMOUNT ?></td>




                                        </tr>

                                    <?php

                                    }


                                    ?>



                                    <tr class="box box-solid total-bg odd">
                                        <td align="left"></td>
                                        <td align="left"></td>
                                        <td align="left"></td>
                                        <td class="text text-left"> Total</td>
                                        <td class="text ">৳ <?php echo $tf; ?></td>
                                        <td align="left"></td>

                                        <td class="text ">৳ <?php echo $pa ?></td>

                                        <td class="text ">৳ <?php echo $da ?></td>


                                    </tr>



                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>

                        </div>

                    </div>
                    <br>

                </div>


            </div>
        <?php } ?>





        <!--end details -->



        <!-- ============================================================== -->



        <!--  fees balance report start-->
        <?php if (isset($alltypeFeesStatement) && isset($studentsinfo)) { ?>
            <div class="table-responsive  " id="GFG2">
                <p style="cursor: pointer;" onclick="printDiv2()" class="pull-right" type="print"><i class=" fas fa-print"></i></p>

                <style>
                    table,
                    th,
                    td {
                        border: 1px solid black;
                    }
                </style>
                <div class="section_print" id="section-to-print">
                    <table id="" class="table">
                        <thead>
                            <tr class="box box-solid total-bg odd">



                                <td class="text ">Class:-<?php echo $studentsinfo->CLASS_NAME; ?></td>
                                <td class="text ">Section:-<?php echo $studentsinfo->SECTION_NAME ?></td>

                                <td class="text ">Session:-<?php echo  $studentsinfo->SESSION_NAME ?></td>
                                <td align="left"></td>
                                <td align="left"></td>

                            </tr>
                            <tr>
                                <th><?php echo $this->lang->line("f_name"); ?></th>
                                <th><?php echo $this->lang->line("admission_no"); ?></th>
                                <th><?php echo $this->lang->line("total_fees"); ?></th>

                                <th><?php echo $this->lang->line("paid_amount"); ?></th>
                                <th><?php echo $this->lang->line("due_fees"); ?></th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php
                            $tf = 0;
                            $pa = 0;
                            $da = 0;
                            foreach ($alltypeFeesStatement as $value) {
                                $tf = $tf + $value->TOTAL_FEES;
                                $pa = $pa + $value->PAID_AMOUNT;
                                $da = $da + $value->DUE_AMOUNT;

                            ?>

                                <tr>
                                    <td><?php echo $value->F_NAME ?></td>
                                    <td><?php echo $value->ADMISSION_NO ?></td>
                                    <td><?php echo $value->TOTAL_FEES ?></td>


                                    <td><?php echo $value->PAID_AMOUNT ?></td>
                                    <td><?php echo $value->DUE_AMOUNT ?></td>






                                </tr>

                            <?php

                            }


                            ?>



                            <tr class="box box-solid total-bg odd">

                                <td align="left"></td>
                                <td class="text text-left"> Total</td>
                                <td class="text ">৳ <?php echo $tf; ?></td>
                                <td class="text ">৳ <?php echo $pa ?></td>

                                <td class="text ">৳ <?php echo $da ?></td>

                            </tr>



                        </tbody>
                        <tfoot>

                        </tfoot>
                    </table>

                </div>

            </div>
        <?php } ?>
        <!-- feesbalance report end -->

        <!-- fees history start -->
        <?php if (isset($feeshistory) && (isset($sumofallfees))) { ?>


            <div class="card">


                <div class="card-body dataTables_wrapper no-footer">


                    <!-- srart -->
                    <?php if (isset($student2)) {

                    ?>

                        <p style="cursor: pointer;" onclick="printDiv3('<?php echo $student2->F_NAME ?>','<?php echo $student2->CLASS_NAME ?>(<?php echo $student2->SECTION_NAME ?>)','<?php echo $student2->ADMISSION_NO ?>','<?php echo $student2->ROLL ?>','<?php echo $student2->SESSIONS ?>')" class="pull-right" type="print"><i class=" fas fa-print"></i></p>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12  col-md-12 col-sm-12 col-12">
                                <div class="sfborder">
                                    <div class="row">
                                        <div class="col-xl-2 col-lg-2  col-md-2 col-sm-2 col-2">
                                            <div class="row">



                                                <img width="115" height="115" class="round5" src="<?php echo base_url(); ?>uploads/students/picture/<?php echo $student2->STUDENT_IMAGE ?> " alt="No Image">


                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <table class="table mb0 font13">
                                                    <tbody>


                                                        <tr>
                                                            <th class="bozero"><?php echo $this->lang->line("name"); ?></th>
                                                            <td class="bozero"><?php echo $student2->F_NAME ?></td>
                                                            <th class="bozero"><?php echo $this->lang->line("class_section"); ?></th>
                                                            <td class="bozero"><?php echo $student2->CLASS_NAME ?> (<?php echo $student2->SECTION_NAME ?>)</td>
                                                        </tr>

                                                        <tr>
                                                            <th><?php echo $this->lang->line("father_name"); ?></th>
                                                            <td><?php echo $student2->FATHER_NAME ?></td>
                                                            <th><?php echo $this->lang->line("admission_no"); ?></th>
                                                            <td><?php echo $student2->ADMISSION_NO ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th><?php echo $this->lang->line("father_phone"); ?></th>
                                                            <td><?php echo $student2->FATHER_PHONE ?></td>
                                                            <th><?php echo $this->lang->line("roll_no"); ?></th>
                                                            <td><?php echo $student2->ROLL ?></td>

                                                        </tr>

                                                        <tr>
                                                            <th><?php echo $this->lang->line("session"); ?></th>
                                                            <td><?php echo $student2->SESSIONS ?></td>


                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                    <?php


                    }

                    ?>






                    <!-- end -->




                    <div class="table-responsive" id="GFG3">
                        <style>
                            table,
                            th,
                            td {
                                border: 1px solid black;
                            }
                        </style>
                        <div class="section_print" id="section-to-print">
                            <table id="" class="table">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line("fees_name"); ?></th>
                                        <th><?php echo $this->lang->line("fees_code"); ?></th>
                                        <th><?php echo $this->lang->line("payment_date"); ?></th>
                                        <th><?php echo $this->lang->line("month"); ?></th>
                                        <th><?php echo $this->lang->line("year"); ?></th>
                                        <th><?php echo $this->lang->line("payment_amount"); ?></th>








                                    </tr>
                                </thead>

                                <tbody>

                                    <?php





                                    $pa = 0;

                                    foreach ($feeshistory as $value) {
                                        $pa = $pa + $value->PAYMENT_AMOUNT;


                                    ?>

                                        <tr>
                                            <td><?php echo $value->FEES_NAME ?></td>
                                            <td><?php echo $value->FEES_CODE ?></td>
                                            <td><?php echo $value->PAYMENT_DATE ?></td>
                                            <td><?php echo $value->MONTH ?></td>
                                            <td><?php echo $value->YEAR ?></td>

                                            <td><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;" . $value->PAYMENT_AMOUNT ?></td>








                                        </tr>

                                    <?php

                                    }


                                    ?>



                                    <tr class="box box-solid total-bg odd">

                                        <td align="left"></td>
                                        <td align="left"></td>
                                        <td align="left"></td>

                                        <td align="left"></td>

                                        <td class="text text-left"> Total</td>
                                        <td class="text ">৳<?php echo $pa; ?> Out of ৳<?php echo $sumofallfees->SUMOFPAID ?></td>





                                    </tr>



                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>

                        </div>

                    </div>
                    <br>

                </div>


            </div>
        <?php } ?>
        <!-- feed history end -->




    </div>


</div>

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
    $("#seeAnotherField").change(function() {
        if ($(this).val() == "period") {
            $('#otherFieldDiv').show();
            $('#otherField').attr('required', '');
            $('#otherField').attr('data-error', 'This field is required.');
        } else {
            $('#otherFieldDiv').hide();
            $('#otherField').removeAttr('required');
            $('#otherField').removeAttr('data-error');
        }
    });
    $("#seeAnotherField").trigger("change");

    $("#seeAnotherFieldGroup").change(function() {
        if ($(this).val() == "period") {
            $('#otherFieldGroupDiv').show();
            $('#otherField1').attr('required', '');
            $('#otherField1').attr('data-error', 'This field is required.');
            $('#otherField2').attr('required', '');
            $('#otherField2').attr('data-error', 'This field is required.');
        } else {
            $('#otherFieldGroupDiv').hide();

        }
    });
    $("#seeAnotherFieldGroup").trigger("change");
</script>

<script>
    function showDiv1() {
        document.getElementById('welcomeDiv1').style.display = "block";
        document.getElementById('welcomeDiv2').style.display = "none";
        document.getElementById('welcomeDiv3').style.display = "none";

    }


    function showDiv2() {
        document.getElementById('welcomeDiv2').style.display = "block";
        document.getElementById('welcomeDiv1').style.display = "none";
        document.getElementById('welcomeDiv3').style.display = "none";

    }

    function showDiv3() {
        document.getElementById('welcomeDiv3').style.display = "block";
        document.getElementById('welcomeDiv2').style.display = "none";
        document.getElementById('welcomeDiv1').style.display = "none";

    }
</script>
<script>
    function test2() {
        var c = document.getElementById("version_id").value;
        //  alert(c);
        var sc = "";
        if (c == 0) {
            sc += "<option value='0'>Choose Version First</option>";
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
        test3()
        test4()
    }
</script>


<script>
    function test3() {


        var c = document.getElementById("class_id").value;
        // alert(c);
        var sc = "";
        if (c == 0) {
            sc += "<option value='0'>Choose Class First</option>";
        }

        <?php



        foreach ($allPdt2 as $cls) {


            echo "else if (c==$cls->ID){";


            foreach ($allPdt3 as $sec) {



                if ($cls->ID == $sec->CLASS_ID) {

                    echo "sc += '<option  value=\"{$sec->SECTION_ID}\">$sec->NAME</option>';";
                }
            }

            echo "}";
        }

        ?>
        // alert(sc);



        $("#section_id").html(sc);
        test4()

    }
</script>


<script>
    function test4() {



        var c = document.getElementById("session_id").value;
        var cls = document.getElementById("class_id").value;
        var sec = document.getElementById("section_id").value;
        var ver = document.getElementById("version_id").value;
        //alert(c);
        var sc = "";
        if (c == 0) {
            sc += "<option value='0'>Choose Session First</option>";
        }



        <?php


        foreach ($allPdt4 as $session) {


            echo "else if (c==$session->ID){";


            foreach ($allPdt5 as $std) {



                echo " if ($std->SESSION_ID == c  && $std->CLASS_ID==cls && $std->SECTION_ID==sec && $std->VERSION==ver)"; {

                    echo "sc += '<option  value=\"{$std->STUDENT_ID}\">$std->F_NAME</option>';";
                }
            }

            echo "}";
        }


        ?>
        //  alert(sc);



        $("#student_id").html(sc);


    }
</script>

<script>
    function printDiv(name, clssec, admission, roll, sess) {
        var divContents = document.getElementById("GFG").innerHTML;
        var a = window.open('', '', 'height=500, width=500');
        a.document.write('<html>');
        a.document.write('<body > Name:' + name + ' <br>');
        a.document.write('<body > Class:' + clssec + ' <br>');
        a.document.write('<body > Admission No:' + admission + ' <br>');
        a.document.write('<body > Roll:' + roll + ' <br>');
        a.document.write('<body > Session:' + sess + ' <br>');
        //  document.getElementById("demo").innerHTML = "Welcome " + name + ", the " + job + ".";
        a.document.write(divContents);
        a.document.write('</body></html>');
        a.document.close();
        a.print();
    }
</script>
<script>
    function printDiv2() {
        var divContents = document.getElementById("GFG2").innerHTML;
        var a = window.open('', '', 'height=500, width=500');
        a.document.write('<html>');
        a.document.write(divContents);
        a.document.write('</body></html>');
        a.document.close();
        a.print();
    }
</script>
<script>
    function printDiv3(name, clssec, admission, roll, sess) {
        var divContents = document.getElementById("GFG3").innerHTML;
        var a = window.open('', '', 'height=500, width=500');
        a.document.write('<html>');
        a.document.write('<body > Name:' + name + ' <br>');
        a.document.write('<body > Class:' + clssec + ' <br>');
        a.document.write('<body > Admission No:' + admission + ' <br>');
        a.document.write('<body > Roll:' + roll + ' <br>');
        a.document.write('<body > Session:' + sess + ' <br>');
        //  document.getElementById("demo").innerHTML = "Welcome " + name + ", the " + job + ".";
        a.document.write(divContents);
        a.document.write('</body></html>');
        a.document.close();
        a.print();
    }
</script>

<script>
    function test22() {
        var c = document.getElementById("version_id2").value;
        // alert(c);
        var sc = "";
        if (c == 0) {
            sc += "<option value='0'>Choose Version First</option>";
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
        test33()
    }
</script>

<script>
    function test33() {
        var c = document.getElementById("class_id2").value;
        // alert(c);
        var sc = "";
        if (c == 0) {
            sc += "<option value='0'>Choose Class First</option>";
        }

        <?php
        foreach ($allPdt2 as $cls) {
            echo "else if (c==$cls->ID){";
            foreach ($allPdt3 as $sec) {

                if ($cls->ID == $sec->CLASS_ID) {

                    echo "sc += '<option  value=\"{$sec->SECTION_ID}\">$sec->NAME</option>';";
                }
            }

            echo "}";
        }

        ?>
        // alert(sc);

        $("#section_id2").html(sc);


    }
</script>


<script>
    function test222() {
        var c = document.getElementById("version_id3").value;
        //  alert(c);
        var sc = "";
        if (c == 0) {
            sc += "<option value='0'>Choose Version First</option>";
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
        $("#class_id3").html(sc);
        test333()
        test444()
    }
</script>


<script>
    function test333() {


        var c = document.getElementById("class_id3").value;
        // alert(c);
        var sc = "";
        if (c == 0) {
            sc += "<option value='0'>Choose Class First</option>";
        }

        <?php



        foreach ($allPdt2 as $cls) {


            echo "else if (c==$cls->ID){";


            foreach ($allPdt3 as $sec) {



                if ($cls->ID == $sec->CLASS_ID) {

                    echo "sc += '<option  value=\"{$sec->SECTION_ID}\">$sec->NAME</option>';";
                }
            }

            echo "}";
        }

        ?>
        // alert(sc);



        $("#section_id3").html(sc);
        test444()

    }
</script>


<script>
    function test444() {



        var c = document.getElementById("session_id3").value;
        var cls = document.getElementById("class_id3").value;
        var sec = document.getElementById("section_id3").value;
        var ver = document.getElementById("version_id3").value;
        //alert(c);
        var sc = "";
        if (c == 0) {
            sc += "<option value='0'>Choose Session First</option>";
        }



        <?php


        foreach ($allPdt4 as $session) {


            echo "else if (c==$session->ID){";


            foreach ($allPdt5 as $std) {



                echo " if ($std->SESSION_ID == c  && $std->CLASS_ID==cls && $std->SECTION_ID==sec && $std->VERSION==ver)"; {

                    echo "sc += '<option  value=\"{$std->STUDENT_ID}\">$std->F_NAME</option>';";
                }
            }

            echo "}";
        }


        ?>
        //  alert(sc);



        $("#student_id3").html(sc);


    }
</script>