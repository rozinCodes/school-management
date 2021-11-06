

<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
      rel = "stylesheet">
<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<!-- ============================================================== -->
<!-- end left sidebar -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- wrapper  -->
<!-- ============================================================== -->
<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->


        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->



        <div class="row">


            <?php
            if (isset($edit)) {
                // if(!$_GET['edit']){
                
                    if ($edit == $allPdt1->ID) {
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

                                    <form enctype="multipart/form-data" class="needs-validation" novalidate action="<?php echo base_url() ?>Admin/hrms/staff/staff_edit/edit/<?php echo $allPdt1->ID ?>" method="post">


  
                                        <div class="row">
                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("staff_f_name"); ?></label>
                                                <input type="text" class="form-control" id="validationCustom01" placeholder=" " name="staff_f_name" value="<?php echo $allPdt1->FIRST_NAME; ?>" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>

                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("staff_l_name"); ?></label>
                                                <input type="text" class="form-control" id="validationCustom01" placeholder="" name="staff_l_name" value="<?php echo $allPdt1->LAST_NAME; ?>">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>

                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("staff_father_name"); ?></label>

                                                <input type="text" class="form-control" id="validationCustom01" placeholder="" name="staff_father_name" value="" >
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>

                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("staff_mother_name"); ?></label>

                                                <input type="text" class="form-control" id="validationCustom01" placeholder="" name="staff_mother_name" value="" >
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>

                                        </div>

                                        <br>
                                        <div class="row">
                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">

                                                <label for="validationCustom01"><?php echo $this->lang->line("staff_skill_level"); ?></label>
                                                <select class="form-control" id="validationCustom01" name="staff_skill_level">
                                                    <option selected="selected" disabled="disabled">Select</option>

                                                    <option value="Inexperienced">Inexperienced</option>
                                                    <option value="experienced">Experienced</option>
                                                </select>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>

                                            </div>

                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("staff_role"); ?></label>
                                                <select  class="form-control" name="staff_role" id="validationCustom01" required>
                                                    <option value="">Select</option>

                                                    <?php
                                                    if (isset($allPdt2)) {
                                                        foreach ($allPdt2 as $value) {
                                                            ?>

                                                            <option value="<?php echo $value->ID ?>"><?php echo $value->NAME ?></option>

                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>



                                            </div>

                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">


                                                <label for="validationCustom01"><?php echo $this->lang->line("staff_designation"); ?></label>



                                                <select  class="form-control" name="staff_designation" id="validationCustom01" required="">
                                                    <option value="">Select</option>

                                                    <?php
                                                    if (isset($allPdt3)) {
                                                        foreach ($allPdt3 as $value) {
                                                            ?>

                                                            <option value="<?php echo $value->ID ?>"><?php echo $value->DESIGNATION_NAME ?></option>

                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>


                                            </div>

                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("staff_department"); ?></label>

                                                <select  class="form-control" name="staff_department" id="validationCustom01" autocomplete="off">

                                                    <option value="">Select</option>

                                                    <?php
                                                    if (isset($allPdt4)) {
                                                        foreach ($allPdt4 as $value) {
                                                            ?>

                                                            <option value="<?php echo $value->ID ?>"><?php echo $value->DEPARTMENT_NAME ?></option>

                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>


                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>


                                        </div>


                                        <br>

                                        <div class="row">

                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("staff_email"); ?></label>

                                                <input type="text" class="form-control" id="validationCustom01" placeholder="" name="staff_email" value="" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>


                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("staff_gender"); ?></label>

                                                <select class="form-control" id="validationCustom01" name="staff_gender">
                                                    <option selected="selected" disabled="disabled">Select</option>

                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>

                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("staff_dateofbirth"); ?></label>

                                                <input type="text" class="form-control"  name="staff_dateofbirth"  name="date_of_birth" value="<?php echo $allPdt1->DATE_OF_BIRTH; ?>" id="datepicker155" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("staff_dateofjoin"); ?></label>

                                                <input type="text" class="form-control" value="<?php echo $allPdt1->DATE_OF_JOINING; ?>" id="datepicker156" name="staff_dateofjoin"  value="" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>

                                        </div>

                                        <br>

                                        <div class="row">
                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("staff_phone_number"); ?></label>
                                                <input type="text" class="form-control" id="validationCustom01" placeholder=" " name="staff_phone_number" value="" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>

                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("staff_emergency_number"); ?></label>
                                                <input type="text" class="form-control" id="validationCustom01" placeholder="" name="staff_emergency_number" value="" >
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>

                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("staff_maritial_status"); ?></label>
                                                <input type="text" class="form-control" id="validationCustom01" placeholder="" name="staff_maritial_status" value="" >
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>



                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("staff_photo"); ?></label>
                                                <input class="form-control" type="file" name="pic[]" multiple="multiple" id="file" size="20" autocomplete="off" >
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>


                                        </div>


                                        <br>

                                        <div class="row">


                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("staff_current_address"); ?></label>
                                                <textarea class="form-control" id="validationCustom01" placeholder="" name="staff_current_address" value="" ></textarea>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>

                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("staff_permenent_address"); ?></label>
                                                <textarea class="form-control" id="validationCustom01" placeholder="" name="staff_permenent_address" value="" ></textarea>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>


                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("staff_qualification"); ?></label>


                                                <textarea class="form-control" id="validationCustom01" placeholder="" name="staff_qualification" value="" ></textarea>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>



                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("staff_work_experience"); ?></label>

                                                <textarea class="form-control" id="validationCustom01" placeholder="" name="staff_work_experience" value="" ></textarea>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>


                                        </div>

                                        <br>



                                        <h4 class="middle_bar_background">

                                            <label for="validationCustom01"><?php echo $this->lang->line("payroll"); ?></label>

                                        </h4>



                                        <br>


                                        <div class="row">
                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("staff_basic_salary"); ?></label>
                                                <input type="text" class="form-control" id="validationCustom01" placeholder=" " name="staff_basic_salary" value="" >
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>

                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("staff_contract_type"); ?></label>

                                                <select class="form-control" id="validationCustom01" name="staff_contract_type">
                                                    <option selected="selected" disabled="disabled">Select</option>

                                                    <option value="probition">Probition</option>
                                                    <option value="permanent">Permanent</option>


                                                </select>


                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>

                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("staff_shift"); ?></label>

                                                <select  class="form-control" name="staff_shift" id="validationCustom01">
                                                    <option selected="selected" disabled="disabled">Select</option>

                                                    <?php
                                                    if (isset($allPdt5)) {
                                                        foreach ($allPdt5 as $value) {
                                                            ?>

                                                            <option value="<?php echo $value->ID ?>"><?php echo $value->SHIFT_NAME ?></option>

                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>


                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>


                                            



                                        </div>

                                        <br><br>

                                        <h4 class="middle_bar_background">
                                            <label for="validationCustom01"><?php echo $this->lang->line("staff_leave"); ?></label>
                                        </h4>

                                        <br>

                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="card">
                                                    <div class="card-body">  <!-- -->
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>

                                                                        <th><?php echo $this->lang->line("leave_name"); ?></th>
                                                                        <th><?php echo $this->lang->line("staff_leave_quantity"); ?></th>


                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    if (isset($allPdt)) {
                                                                        foreach ($allPdt as $value) {
                                                                            ?>
                                                                            <tr>

                                                                                <td><?php echo $value->LEAVE_NAME ?>


                                                                                   <!--   <input type="hidden" class="form-control" id="validationCustom01" placeholder=" " name="leave_type[]" value="<?php //echo $value->id ?>" required="">  -->
                                                                                </td>


                                                                                <td>



                                                                                    <input type="text" class="form-control" id="validationCustom01" placeholder=" " name="leave_type[<?php echo $value->ID ?>]" value="<?php echo $value->ALLOTTED_LEAVE; ?>" > 

                                                                                 <!--  <input type="hidden" class="form-control" id="validationCustom01" placeholder=" " name="leave_name[]" value="<?php $value->leave_name ?>" required="">  


                                                                                  <input type="text" class="form-control" id="validationCustom01" placeholder=" " name="staff_leave_quantity[]" value="" required="">  
                                                                                    -->

                                                                                </td>


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
                                            </div>

                                        </div>







                                        <br><br>





                                        <h4 class="middle_bar_background">

                                            <label for="validationCustom01"><?php echo $this->lang->line("staff_bank_details"); ?></label>

                                        </h4>

                                        <br>


                                        <div class="row">
                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("staff_account_title"); ?></label>
                                                <input type="text" class="form-control" id="validationCustom01" placeholder=" " name="staff_account_title" value="" >
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>

                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("staff_bank_account_number"); ?></label>
                                                <input type="text" class="form-control" id="validationCustom01" placeholder="" name="staff_bank_account_number" value="" >
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>





                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("staff_bank_name"); ?></label>
                                                <input type="text" class="form-control" id="validationCustom01" placeholder="" name="staff_bank_name" value="" >
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>

                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("staff_branch_name"); ?></label>
                                                <input type="text" class="form-control" id="validationCustom01" placeholder="" name="staff_branch_name" value="" >
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>


                                        </div>

                                        <br>

                                        <h4 class="middle_bar_background">
                                            <label for="validationCustom01"><?php echo $this->lang->line("uplode_title"); ?></label>

                                        </h4>

                                        <br>



                                        <div class="row">

                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("staff_resume"); ?></label>

                                                <input class="form-control" type="file" name="pic[]" multiple="multiple" id="file" size="20" autocomplete="off" >
                                                <div class="valid-feedback" >
                                                    Looks good!
                                                </div>
                                            </div>


                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("staff_academics_certificates"); ?></label>

                                                <input class="form-control" type="file" name="pic[]" multiple="multiple" id="file" size="20" autocomplete="off" >
                                                <div class="valid-feedback" >
                                                    Looks good!
                                                </div>
                                            </div>

                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("staff_joining_letter"); ?></label>

                                                <input class="form-control" type="file" name="pic[]" multiple="multiple" id="file" size="20" autocomplete="off" >
                                                <div class="valid-feedback" >
                                                    Looks good!
                                                </div>
                                            </div>






                                        </div>






                                        <br><br>

                                        <div class="form-row">




                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <button class="btn btn-primary" type="submit">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <?php
                    }
                
            } else {
                ?>


                <!-- ============================================================== -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header"><?php echo $this->lang->line("add_staff_title"); ?></h5>

                        <h4 class="middle_bar_background">

                            <label for="validationCustom01"><?php echo $this->lang->line("staff_details"); ?></label>

                        </h4>

                        <div class="card-body">
                            <h2 style="color:green"> <?php
                                $dt = $this->session->userdata("msg");
                                if ($dt != NULL) {
                                    echo $dt;
                                    $this->session->unset_userdata("msg");
                                }
                                ?></h2>
                            <form enctype="multipart/form-data" class="needs-validation" novalidate action="<?php echo base_url() ?>admin/hrms/staff/add_staff" method="post">


                                <div class="row">
                           
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("staff_f_name"); ?></label>
                                        <input type="text" class="form-control" id="validationCustom01" placeholder=" " name="staff_f_name" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("staff_l_name"); ?></label>
                                        <input type="text" class="form-control" id="validationCustom01" placeholder="" name="staff_l_name" value="">
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("staff_father_name"); ?></label>

                                        <input type="text" class="form-control" id="validationCustom01" placeholder="" name="staff_father_name" value="" >
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("staff_mother_name"); ?></label>

                                        <input type="text" class="form-control" id="validationCustom01" placeholder="" name="staff_mother_name" value="" >
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>

                                </div>

                                <br>
                                <div class="row">
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">

                                        <label for="validationCustom01"><?php echo $this->lang->line("staff_skill_level"); ?></label>
                                        <select class="form-control" id="validationCustom01" name="staff_skill_level" >
                                            <option value="">Select</option>

                                            <option value="Inexperienced">Inexperienced</option>
                                            <option value="experienced">Experienced</option>
                                        </select>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>

                                    </div>

                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("staff_role"); ?></label>
                                        <select  class="form-control" name="staff_role" id="validationCustom01" required="">
                                            <option value="">Select</option>

                                            <?php
                                            if (isset($allPdt2)) {
                                                foreach ($allPdt2 as $value) {
                                                    if ($value->ID == 1) {
                                                        
                                                    } else {
                                                        ?>

                                                        <option value="<?php echo $value->ID ?>"><?php echo $value->NAME ?></option>

                                                        <?php
                                                    }
                                                }
                                            }
                                            ?>
                                        </select>


                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">


                                        <label for="validationCustom01"><?php echo $this->lang->line("staff_designation"); ?></label>

                                        <select  class="form-control" name="staff_designation" id="validationCustom01" required="">
                                            <option value="">Select</option>

                                            <?php
                                            if (isset($allPdt3)) {
                                                foreach ($allPdt3 as $value) {
                                                    ?>

                                                    <option value="<?php echo $value->ID ?>"><?php echo $value->DESIGNATION_NAME ?></option>

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
                                        <label for="validationCustom01"><?php echo $this->lang->line("staff_department"); ?></label>

                                        <select  class="form-control" name="staff_department" id="validationCustom01" autocomplete="off" required="">

                                            <option value="">Select</option>

                                            <?php
                                            if (isset($allPdt4)) {
                                                foreach ($allPdt4 as $value) {
                                                    ?>

                                                    <option value="<?php echo $value->ID ?>"><?php echo $value->DEPARTMENT_NAME ?></option>

                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>


                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>


                                </div>


                                <br>

                                <div class="row">

                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("staff_email"); ?></label>

                                        <input type="text" class="form-control" id="validationCustom01" placeholder="" name="staff_email" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>


                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("staff_gender"); ?></label>

                                        <select class="form-control" id="validationCustom01" name="staff_gender">
                                            <option selected="selected" disabled="disabled">Select</option>

                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                                  <option value="others">Others</option>
                                        </select>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("staff_dateofbirth"); ?></label>

                                        <input type="" class="form-control" id = "datepicker-13" name="staff_dateofbirth"  name="date_of_birth" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>

    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("staff_dateofjoin"); ?></label>

                                        <input type="" class="form-control" id = "datepicker-14" name="staff_dateofjoin"  value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>

                                </div>

                                <br>

                                <div class="row">
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("staff_phone_number"); ?></label>
                                        <input type="text" class="form-control" id="validationCustom01" placeholder=" " name="staff_phone_number" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("staff_emergency_number"); ?></label>
                                        <input type="text" class="form-control" id="validationCustom01" placeholder="" name="staff_emergency_number" value="" >
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("staff_maritial_status"); ?></label>
                                        <input type="text" class="form-control" id="validationCustom01" placeholder="" name="staff_maritial_status" value="" >
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>



                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("staff_photo"); ?></label>
                                        <input class="form-control" type="file" name="pic[]" multiple="multiple" id="file" size="20" autocomplete="off" >
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>


                                </div>


                                <br>

                                <div class="row">


                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("staff_current_address"); ?></label>
                                        <textarea class="form-control" id="validationCustom01" placeholder="" name="staff_current_address" value="" ></textarea>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("staff_permenent_address"); ?></label>
                                        <textarea class="form-control" id="validationCustom01" placeholder="" name="staff_permenent_address" value="" ></textarea>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>


                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("staff_qualification"); ?></label>


                                        <textarea class="form-control" id="validationCustom01" placeholder="" name="staff_qualification" value="" ></textarea>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>



                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("staff_work_experience"); ?></label>

                                        <textarea class="form-control" id="validationCustom01" placeholder="" name="staff_work_experience" value="" ></textarea>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>


                                </div>

                                <br>



                                <h4 class="middle_bar_background">

                                    <label for="validationCustom01"><?php echo $this->lang->line("payroll"); ?></label>

                                </h4>



                                <br>


                                <div class="row">
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("staff_basic_salary"); ?></label>
                                        <input type="text" class="form-control" id="validationCustom01" placeholder=" " name="staff_basic_salary" value="" >
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("staff_contract_type"); ?></label>

                                        <select class="form-control" id="validationCustom01" name="staff_contract_type">
                                            <option selected="selected" disabled="disabled">Select</option>

                                            <option value="probition">Probition</option>
                                            <option value="permanent">Permanent</option>


                                        </select>


                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("staff_shift"); ?></label>

                                        <select  class="form-control" name="staff_shift" id="validationCustom01" >
                                            <option value="">Select</option>

                                            <?php
                                            if (isset($allPdt5)) {
                                                foreach ($allPdt5 as $value) {
                                                    ?>

                                                    <option value="<?php echo $value->ID ?>"><?php echo $value->SHIFT_NAME ?></option>

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
                                        <label for="validationCustom01"><?php echo $this->lang->line("staff_password"); ?></label>
                                        <input type="text" class="form-control" id="validationCustom01" placeholder="" name="staff_password" value="" required >
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>



                                </div>

                                <br><br>

                                <h4 class="middle_bar_background">
                                    <label for="validationCustom01"><?php echo $this->lang->line("staff_leave"); ?></label>
                                </h4>

                                <br>

                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="card">
                                            <div class="card-body">  <!-- -->
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>

                                                                <th><?php echo $this->lang->line("leave_name"); ?></th>
                                                                <th><?php echo $this->lang->line("staff_leave_quantity"); ?></th>


                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            if (isset($allPdt)) {
                                                                foreach ($allPdt as $value) {
                                                                    ?>
                                                                    <tr>

                                                                        <td><?php echo $value->LEAVE_NAME ?>


                                                                   <!--   <input type="hidden" class="form-control" id="validationCustom01" placeholder=" " name="leave_type[]" value="<?php //echo $value->id  ?>" required="">  -->
                                                                        </td>


                                                                        <td>

                                                                   <!-- <input type="hidden" class="form-control" id="validationCustom01" placeholder=" " name="leave_type_id" value="leave_type[<?php echo $value->ID ?>]" > 

                                                                   <input type="text" class="form-control" id="validationCustom01" placeholder=" " name="alloted_leave" value="" >   -->


                                                                            <input type="text" class="form-control"  id="validationCustom01" placeholder="" name="leave_type[<?php echo $value->ID ?>]"   value=""  > 

                                                                 <!--  <input type="hidden" class="form-control" id="validationCustom01" placeholder=" " name="leave_name[]" value="<?php $value->leave_name ?>" required="">  


                                                                  <input type="text" class="form-control" id="validationCustom01" placeholder=" " name="staff_leave_quantity[]" value="" required="">  
                                                                            -->

                                                                        </td>


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
                                    </div>

                                </div>

                                <br><br>
 <h4 class="middle_bar_background">

                                    <label for="validationCustom01"><?php echo $this->lang->line("staff_bank_details"); ?></label>

                                </h4>

                                <br>


                                <div class="row">
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("staff_account_title"); ?></label>
                                        <input type="text" class="form-control" id="validationCustom01" placeholder=" " name="staff_account_title" value="" >
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("staff_bank_account_number"); ?></label>
                                        <input type="text" class="form-control" id="validationCustom01" placeholder="" name="staff_bank_account_number" value="" >
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>





                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("staff_bank_name"); ?></label>
                                        <input type="text" class="form-control" id="validationCustom01" placeholder="" name="staff_bank_name" value="" >
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("staff_branch_name"); ?></label>
                                        <input type="text" class="form-control" id="validationCustom01" placeholder="" name="staff_branch_name" value="" >
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>


                                </div>

                                <br>

                                <h4 class="middle_bar_background">
                                    <label for="validationCustom01"><?php echo $this->lang->line("uplode_title"); ?></label>

                                </h4>

                                <br>



                                <div class="row">

                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("staff_resume"); ?></label>

                                        <input class="form-control" type="file" name="pic[]" multiple="multiple" id="file" size="20" autocomplete="off" >
                                        <div class="valid-feedback" >
                                            Looks good!
                                        </div>
                                    </div>


                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("staff_academics_certificates"); ?></label>

                                        <input class="form-control" type="file" name="pic[]" multiple="multiple" id="file" size="20" autocomplete="off" >
                                        <div class="valid-feedback" >
                                            Looks good!
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("staff_joining_letter"); ?></label>

                                        <input class="form-control" type="file" name="pic[]" multiple="multiple" id="file" size="20" autocomplete="off" >
                                        <div class="valid-feedback" >
                                            Looks good!
                                        </div>
                                    </div>






                                </div>






                                <br><br>

                                <div class="form-row">




                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <button class="btn btn-primary" type="submit">Submit form</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
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

    <?php
}
//}
?>

<!-- ============================================================== -->
<!-- end main wrapper -->
<!-- ============================================================== -->
<!-- Optional JavaScript -->

<script>
    $('#form').parsley();
</script>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        'use strict';
        window.addEventListener('load', function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
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
    $(function () {
        $("#datepicker-13").datepicker();
        // $( "#datepicker-13" ).datepicker("show");
                $("#datepicker-14").datepicker();
        $("#datepicker-13").datepicker().datepicker("setDate", new Date());
        $("#datepicker-14").datepicker().datepicker("setDate", new Date());
         $( "#datepicker155" ).datepicker();
          $( "#datepicker156" ).datepicker();
    });
</script>

