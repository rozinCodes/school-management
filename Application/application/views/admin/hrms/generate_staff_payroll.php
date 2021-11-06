<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">



        <div class="row">


            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">



                    <div class="card-body">
                        <h2 style="color:green"> <?php
                                                    $dt = $this->session->userdata("msg");
                                                    if ($dt != null) {
                                                        echo $dt;
                                                        $this->session->unset_userdata("msg");
                                                    }
                                                    ?>
                        </h2>



                        <form class="needs-validation" novalidate="" action="<?php echo base_url() ?>admin/hrms/staff/payroll" method="post">

                            <div class="row">
                                <div class="col-xl-8 col-lg-8  col-md-8 col-sm-8 col-8">
                                    <div class="sfborder">
                                        <div class="row">
                                            <div class="col-xl-2 col-lg-2  col-md-2 col-sm-2 col-2">
                                                <div class="row">

                                                    <?php

                                                    if (isset($allPdt)) {
                                                        $i = 0;


                                                        foreach ($allPdt as $value) {
                                                    ?>






                                                            <img width="115" height="115" class="round5" src="<?php echo base_url(); ?>uploads/staff/picture/<?php echo $value->PHOTO ?> " alt="No Image">


                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <table class="table mb0 font13">
                                                        <tbody>


                                                            <tr>
                                                                <th class="bozero"><?php echo $this->lang->line("name"); ?></th>
                                                                <td class="bozero"><?php echo $value->FIRST_NAME ?></td>
                                                                <th class="bozero"><?php echo $this->lang->line("staff_id"); ?></th>
                                                                <td class="bozero"><?php echo $value->STAFF_ID ?></td>
                                                            </tr>

                                                            <tr>
                                                                <th><?php echo $this->lang->line("staff_phone_number"); ?></th>
                                                                <td><?php echo $value->PHONE ?></td>
                                                                <th><?php echo $this->lang->line("staff_role"); ?></th>
                                                                <td><?php echo $value->NAME ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th><?php echo $this->lang->line("department"); ?></th>
                                                                <td><?php echo $value->DEPARTMENT_NAME ?></td>
                                                                <th><?php echo $this->lang->line("designation"); ?></th>
                                                                <td><?php echo $value->DESIGNATION_NAME ?></td>

                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- <div class="col-xl-4 col-lg-4  col-md-4 col-sm-4 col-4">
                                    <div class="sfborder relative overvisible">
                                        <div class="letest">
                                            <div class="rotatetest">Attendance</div>
                                        </div>
                                        <div class="padd-en-rtl33">
                                            <table class="table mb0 font13">
                                                <tbody>

                                                    <tr>
                                                        <th class="bozero">Month</th>
                                                        <th class="bozero"><span data-toggle="tooltip" title="Present">P</span></th>
                                                        <th class="bozero"><span data-toggle="tooltip" title="Late">L</span></th>
                                                        <th class="bozero"><span data-toggle="tooltip" title="Absent">A</span></th>
                                                        <th class="bozero"><span data-toggle="tooltip" title="Half Day">F</span></th>
                                                        <th class="bozero"><span data-toggle="tooltip" title="Holiday">H</span></th>
                                                        <th class="bozero"><span data-toggle="tooltip" title="Approved Leave">V</span></th>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo $month; ?></td>
                                                        <?php

                                                            if (($allPdt2) == false) { ?>
                                                            <td>0</td>
                                                            <td>0</td>
                                                            <td>0</td>
                                                            <td>0</td>
                                                            <td>0</td>
                                                            <td>0</td>
                                                            <?php


                                                            } else {

                                                                $i = 0;


                                                                foreach ($allPdt2 as $value2) {
                                                                    $info[] = $value2->ALL_COUNT;
                                                                }
                                                                for ($j = 0; $j < count($info); $j++) {
                                                            ?>



                                                                <td>
                                                                    <?php echo $info[$j]; ?>
                                                                </td>




                                                        <?php
                                                                }
                                                            }

                                                        ?>

                                                    </tr>
                                                    <tr>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                    </tr>





                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div> -->
                            </div>




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

                        </div>


                    </div>

                    <form class="needs-validation" novalidate="" action="<?php echo base_url() ?>admin/hrms/staff/save_generate_payroll" method="post">

                        <div class=" box-header">
                            <div class="row display-flex">
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                    <h3 class="box-title">Earning</h3>
                                    <button type="button" onclick="add_more()" class="plusign" autocomplete="off"><i class="fa fa-plus"></i></button>
                                    <div class="sameheight">
                                        <div class="feebox">
                                            <table class="table3" id="tableID">
                                                <tbody>
                                                    <tr id="row0">
                                                        <td><input type="text" class="form-control" id="allowance_type" name="allowance_type[]" placeholder="Type"></td>
                                                        <td><input type="text" id="allowance_amount" name="allowance_amount[]" class="form-control" value="0"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                    <h3 class="box-title">Deduction</h3>
                                    <button type="button" onclick="add_more_deduction()" class="plusign"><i class="fa fa-plus"></i></button>
                                    <div class="sameheight">
                                        <div class="feebox">
                                            <table class="table3" id="tableID2">
                                                <tbody>
                                                    <tr id="deduction_row0">
                                                        <td><input type="text" id="deduction_type" name="deduction_type[]" class="form-control" placeholder="Type" autocomplete="off"></td>
                                                        <td><input type="text" id="deduction_amount" name="deduction_amount[]" class="form-control" value="0"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">

                                    <h3 class="box-title">Payroll Summary($)</h3>
                                    <button type="button" onclick="add_allowance()" style="cursor: pointer;" class="plusign"><i class="fa fa-calculator"></i> Calculate</button>
                                    <div class="sameheight">
                                        <div class="payrollbox feebox">
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-4 control-label">Basic Salary</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control no-border" name="basic" value="<?php echo $value->BASIC_SALARY ?>" placeholder="<?php echo $value->BASIC_SALARY ?>" id="basic" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--./form-group-->
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-4 control-label">Earning</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control" name="total_allowance" id="total_allowance" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--./form-group-->
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-4 control-label">Deduction</label>
                                                    <div class="col-sm-8 deductiondred">
                                                        <input class="form-control" name="total_deduction" id="total_deduction" type="text" style="color:#f50000">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--./form-group-->
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-4 control-label">Gross Salary</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control" name="gross_salary" id="gross_salary" value="0" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--./form-group-->
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-4 control-label">Tax</label>
                                                    <div class="col-sm-8 deductiondred">
                                                        <input class="form-control" name="tax" id="tax" value="0" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--./form-group-->
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-4 control-label">Payment type</label>
                                                    <div class="col-sm-8 deductiondred">
                                                        <select class="form-control" id="validationCustom01" name="payment_type" required>
                                                            <option selected="selected" disabled="disabled">Select</option>

                                                            <option value="cash" selected>Cash</option>
                                                            <option value="bank">Bank</option>
                                                        </select>

                                                    </div>
                                                </div>
                                            </div>
                                            <!--./form-group-->
                                            <hr>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-4 control-label">Net Salary</label>
                                                    <div class="col-sm-8 net_green">
                                                        <input class="form-control greentest" name="net_salary" id="net_salary" type="text">
                                                        <span class="text-danger" id="err"></span>
                                                        <input class="form-control" name="staff_id" value="<?php echo $value->STAFF_ID; ?>" type="hidden">
                                                        <input class="form-control" name="month" value="<?php echo $month; ?>" type="hidden">
                                                        <input class="form-control" name="year" value="<?php echo $year; ?>" type="hidden">
                                                        <input class="form-control" name="status" value="1" type="hidden">
                                                        <input class="form-control" name="staff_role" value="<?php echo $value->ROLES_ID; ?>" type="hidden">
                                                        <input class="form-control" name="staff_department" value="<?php echo $value->DEPARTMENT; ?>" type="hidden">
                                                        <input class="form-control" name="staff_designation" value="<?php echo $value->DESIGNATION; ?>" type="hidden">
                                                        <input class="form-control" name="staff_tbl_id" value="<?php echo $value->STAFF_TBL_ID; ?>" type="hidden">



                                                    </div>
                                                </div>
                                            </div>
                                            <!--./form-group-->
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <br>
                            <div class="col-md-12 col-sm-12">
                                <button type="submit" id="contact_submit" class="btn btn-info pull-right">pay</button>
                            </div>
                            <br>
                            <br>

                        </div>
                    </form>
                </div>
            </div>
            <!-- ============================================================== -->
        </div>




<?php
                                                        }
                                                    }

?>


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

<script type="text/javascript">
    function add_allowance() {

        var basic_pay = $("#basic").val();
        var allowance_type = document.getElementsByName('allowance_type[]');
        var allowance_amount = document.getElementsByName('allowance_amount[]');
        //var leave_deduction = $("#leave_deduction").val();
        var tax = $("#tax").val();
        var total_allowance = 0;

        var deduction_type = document.getElementsByName('deduction_type[]');
        var deduction_amount = document.getElementsByName('deduction_amount[]');

        var total_deduction = 0;

        for (var i = 0; i < allowance_amount.length; i++) {

            var inp = allowance_amount[i];

            if (inp.value == '') {

                var inpvalue = 0;
            } else {
                var inpvalue = inp.value;
            }

            total_allowance += parseInt(inpvalue);

        }

        for (var j = 0; j < deduction_amount.length; j++) {


            var inpd = deduction_amount[j];

            if (inpd.value == '') {

                var inpdvalue = 0;

            } else {

                var inpdvalue = inpd.value;
            }
            total_deduction += parseInt(inpdvalue);
        }


        //total_deduction += parseInt(leave_deduction) ;

        var gross_salary = parseInt(basic_pay) + parseInt(total_allowance) - parseInt(total_deduction);

        var net_salary = parseInt(basic_pay) + parseInt(total_allowance) - parseInt(total_deduction) - parseInt(tax);

        $("#total_allowance").val(total_allowance);
        $("#total_deduction").val(total_deduction);
        $("#total_allow").html(total_allowance);
        $("#total_deduc").html(total_deduction);
        $("#gross_salary").val(gross_salary);
        $("#net_salary").val(net_salary);

    }

    function add_more() {

        var table = document.getElementById("tableID");
        var table_len = (table.rows.length);
        var id = parseInt(table_len);
        var row = table.insertRow(table_len).outerHTML = "<tr id='row" + id + "'><td><input type='text' class='form-control' id='allowance_type' name='allowance_type[]' placeholder='Type'></td><td><input type='text' class='form-control' id='allowance_amount' name='allowance_amount[]'  value='0'></td><td><button type='button' onclick='delete_row(" + id + ")' class='closebtn'><i class='fas fa-cut'></i></button></td></tr>";
    }

    function delete_row(id) {


        var table = document.getElementById("tableID");
        var rowCount = table.rows.length;
        $("#row" + id).html("");
        //table.deleteRow(id);
    }


    function add_more_deduction() {

        var table = document.getElementById("tableID2");
        var table_len = (table.rows.length);
        var id = parseInt(table_len);
        var row = table.insertRow(table_len).outerHTML = "<tr id='deduction_row" + id + "'><td><input type='text' class='form-control' id='deduction_type' name='deduction_type[]' placeholder='Type'></td><td><input type='text' id='deduction_amount' name='deduction_amount[]' class='form-control' value='0'></td><td><button type='button' onclick='delete_deduction_row(" + id + ")' class='closebtn'><i class='fas fa-cut'></i></button></td></tr>";

    }

    function delete_deduction_row(id) {


        var table = document.getElementById("tableID2");
        var rowCount = table.rows.length;
        $("#deduction_row" + id).html("");
        //table.deleteRow(id);
    }



    $("#contact_submit").click(function(event) {

        var net = $("#net_salary").val();
        if (net == "") {

            $("#err").html("Net Salary should not be empty");
            $("#net_salary").focus();
            return false;
            event.preventDefault();
        } else {
            $("#err").html("");
        }
    });
</script>