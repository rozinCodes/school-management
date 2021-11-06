<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->



        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <h2><?php echo $this->lang->line("income_expense_report"); ?></h2>
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
                            <h3 class="box-title"><i class="fa fa-search"></i> Income Expense Report</h3>

                        </div>
                        <br>
                        <div class="row">

                            <div class="col-md-4">

                                <div class="">

                                    <li class="nav-item">


                                        <!-- <a class="nav-link" href="<?php echo base_url(); ?>admin/finance/finance_report/fees_statement">Fees Statement</a> -->

                                        <input type="button" name="answer" value="Income " onclick="showDiv1()" />

                                    </li>

                                </div>

                            </div>
                            <div class="col-md-4">


                                <div class="">




                                    <li class="nav-item">

                                        <!-- <a class="nav-link" href="<?php echo base_url(); ?>admin/finance/finance_report/balance_fees_report">Balance Fees Report</a> -->
                                        <input type="button" name="answer" value="Expense" onclick="showDiv2()" />
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

                        <form class="needs-validation" novalidate action="<?php echo base_url() ?>admin/reports/income_expense_report" method="post">

                            <div class="row">



                                <div class="col-xl-4 col-lg-4  col-md-4 col-sm-4 col-4 ">
                                    <div class="form-group">
                                        <label for="seeAnotherField">Search Type</label>
                                        <select class="form-control" id="seeAnotherField" name="search_type">
                                            <option value="">Select</option>
                                            <option value="today">Today</option>
                                            <option value="this_week">This Week</option>
                                            <!-- <option value="last_week">Last Week</option> -->
                                            <option value="this_month">This Month</option>
                                            <!-- <option value="last_month">Last Month</option>
                                            <option value="last_3_month">Last 3 Month</option>
                                            <option value="last_6_month">Last 6 Month</option>
                                            <option value="last_12_month">Last 12 Month</option>
                                            <option value="this_year">This Year</option>
                                            <option value="last_year">Last Year</option> -->
                                            <option value="period">Period</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-8 col-lg-8  col-md-8 col-sm-8 col-8">

                                    <div class="form-group" id="otherFieldDiv">

                                        <label for="otherField"><?php echo $this->lang->line("from_date"); ?></label>

                                        <input type="date" class="form-control" id="from_date" name="from_date">


                                        <label for="otherField"><?php echo $this->lang->line("to_date"); ?></label>

                                        <input type="date" class="form-control" id="to_date" name="to_date">
                                    </div>
                                </div>




                            </div>

                            <br>
                            <div class="row pull-right">
                                <div class="col-xl-8 col-lg-6  col-md-6 col-sm-6 col-6 ">



                                    <button class="btn btn-primary my_btn_style" type="submit"><?php echo $this->lang->line("search"); ?></button>
                                </div>

                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
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
                        <form class="needs-validation" novalidate action="<?php echo base_url() ?>admin/reports/income_expense_report2" method="post">

                            <div class="row">



                                <div class="col-xl-4 col-lg-4  col-md-4 col-sm-4 col-4 ">
                                    <div class="form-group">
                                        <label for="seeAnotherField2">Search Type</label>
                                        <select class="form-control" id="seeAnotherField2" name="search_type">
                                            <option value="">Select</option>
                                            <option value="today">Today</option>
                                            <option value="this_week">This Week</option>
                                            <!-- <option value="last_week">Last Week</option> -->
                                            <option value="this_month">This Month</option>
                                            <!-- <option value="last_month">Last Month</option>
                                            <option value="last_3_month">Last 3 Month</option>
                                            <option value="last_6_month">Last 6 Month</option>
                                            <option value="last_12_month">Last 12 Month</option>
                                            <option value="this_year">This Year</option>
                                            <option value="last_year">Last Year</option> -->
                                            <option value="period">Period</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-8 col-lg-8  col-md-8 col-sm-8 col-8">

                                    <div class="form-group" id="otherFieldDiv2">

                                        <label for="otherField2"><?php echo $this->lang->line("from_date"); ?></label>

                                        <input type="date" class="form-control" id="from_date2" name="from_date">


                                        <label for="otherField2"><?php echo $this->lang->line("to_date"); ?></label>

                                        <input type="date" class="form-control" id="to_date2" name="to_date">
                                    </div>
                                </div>




                            </div>

                            <br>
                            <div class="row pull-right">
                                <div class="col-xl-8 col-lg-6  col-md-6 col-sm-6 col-6 ">



                                    <button class="btn btn-primary my_btn_style" type="submit"><?php echo $this->lang->line("search"); ?></button>
                                </div>

                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </form>    
                    </div>

                    <br><br> <br>


                    </form>

                </div>
            </div>
        </div>
    



    <?php if (isset($allPdt)) { ?>


        <div class="card">
            <div class="card-body dataTables_wrapper no-footer">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pull-right">
                    <p style="cursor: pointer;" onclick="window.print()" class="pull-right" type="print"><i class=" fas fa-print"></i></p>
                </div>

                <div class="table-responsive" id="GFG">
                    <div class="section_print" id="section-to-print">
                        <table id="" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th><?php echo $this->lang->line("id"); ?></th>
                                    <th><?php echo $this->lang->line("income_name"); ?></th>
                                    <th><?php echo $this->lang->line("invoice_no"); ?></th>
                                    <th><?php echo $this->lang->line("amount"); ?></th>
                                    <th><?php echo $this->lang->line("assets_purchase_date"); ?></th>



                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $flag = 0;
                                if (isset($allPdt)) {
                                    foreach ($allPdt as $value) {
                                        $flag = $flag + $value->AMOUNT;

                                ?>
                                        <tr>
                                        <td><?php echo $value->ID ?></td>
                                            <td><?php echo $value->NAME ?></td>
                                            <td><?php echo $value->INVOICE_NO ?></td>
                                            <td style="color: green;"><b><?php echo $value->AMOUNT ?>/=TK </b></td>
                                            <td><?php echo $value->INCOME_DATE ?></td>







                                        </tr>
                                <?php
                                    }
                                }

                                ?>

                                <tr class="box box-solid total-bg odd">
                                    <td align="left"></td>
                                    <td align="left"></td>
                                    <td class="text text-left"> Total</td>
                                    <td class="text ">৳ <?php echo $flag; ?></td>
                                    <td align="left"></td>






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

    <?php if (isset($allPdt2)) { ?>


<div class="card">
    <div class="card-body dataTables_wrapper no-footer">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pull-right">
            <p style="cursor: pointer;" onclick="window.print()" class="pull-right" type="print"><i class=" fas fa-print"></i></p>
        </div>

        <div class="table-responsive" id="GFG2">
            <div class="section_print" id="section-to-print">
                <table id="" class="table table-bordered">
                    <thead>
                        <tr>
                            
                        <th><?php echo $this->lang->line("id"); ?></th>
                            <th><?php echo $this->lang->line("expense_name"); ?></th>
                            <th><?php echo $this->lang->line("invoice_no"); ?></th>
                            <th><?php echo $this->lang->line("amount"); ?></th>
                            <th><?php echo $this->lang->line("assets_purchase_date"); ?></th>



                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $flag = 0;
                        if (isset($allPdt2)) {
                            foreach ($allPdt2 as $value) {
                                $flag = $flag + $value->AMOUNT;

                        ?>
                                <tr>
                                <td><?php echo $value->ID ?></td>
                                    <td><?php echo $value->NAME ?></td>
                                    <td><?php echo $value->INVOICE_NO ?></td>
                                    <td style="color: green;"><b><?php echo $value->AMOUNT ?>/=TK </b></td>
                                    <td><?php echo $value->EXP_DATE ?></td>







                                </tr>
                        <?php
                            }
                        }

                        ?>

                        <tr class="box box-solid total-bg odd">
                            <td align="left"></td>
                            <td align="left"></td>
                            <td class="text text-left"> Total</td>
                            <td class="text ">৳ <?php echo $flag; ?></td>
                            <td align="left"></td>
                            





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
    




   





</div>


</div>
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
    $("#seeAnotherField2").change(function() {
        if ($(this).val() == "period") {
            $('#otherFieldDiv2').show();
            $('#otherField2').attr('required', '');
            $('#otherField2').attr('data-error', 'This field is required.');
        } else {
            $('#otherFieldDiv2').hide();
            $('#otherField2').removeAttr('required');
            $('#otherField2').removeAttr('data-error');
        }
    });
    $("#seeAnotherField2").trigger("change");

    $("#seeAnotherFieldGroup2").change(function() {
        if ($(this).val() == "period") {
            $('#otherFieldGroupDiv2').show();
            $('#otherField1').attr('required', '');
            $('#otherField1').attr('data-error', 'This field is required.');
            $('#otherField2').attr('required', '');
            $('#otherField2').attr('data-error', 'This field is required.');
        } else {
            $('#otherFieldGroupDiv2').hide();

        }
    });
    $("#seeAnotherFieldGroup2").trigger("change");
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
        a.document.write('<body > Name:' + clssec + ' <br>');
        a.document.write('<body > Name:' + admission + ' <br>');
        a.document.write('<body > Name:' + roll + ' <br>');
        a.document.write('<body > Name:' + sess + ' <br>');
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
        test4()

    }
</script>