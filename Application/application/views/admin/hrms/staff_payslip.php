<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->






        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->



        <div class="row">
            <!-- ============================================================== -->
            <!-- validation form -->
            <!-- ============================================================== -->

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pull-right">
                        <p style="cursor: pointer;" onclick="window.print()" class="pull-right" type="print"><i class=" fas fa-print"></i></p>
                    </div>


                    <div class="card-body">
                        <h2 style="color:green"> <?php
                                                    $dt = $this->session->userdata("msg");
                                                    if ($dt != NULL) {
                                                        echo $dt;
                                                        $this->session->unset_userdata("msg");
                                                    }
                                                    ?></h2>
                        <form class="needs-validation" novalidate="" action="<?php echo base_url() ?>admin/hrms/staff/approved_leave_request_submit" method="post">


                            <div id="section-to-print" class="row">
                                <!-- left column -->
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="">
                                        <table width="100%">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <img src="<?php echo base_url(); ?>uploads/school_info/logo/<?php echo $allPdt2->SCHOOL_LOGO?> " alt="User profile picture" style="height: 60px;width: 100px;">
                                                            </div>


                                                            <div class="col-md-6 pull-right">
                                                                <address class="pull-right" style="display:block;font-style: italic;">
                                                                   
                                                                    <?php echo $allPdt2->SCHOOL_ADDRESS?><br>
                                                                    <?php echo $allPdt2->SCHOOL_EMAIL?><br>
                                                                    <?php echo $allPdt2->SCHOOL_PHONE?>
                                                                    
                                                                </address>

                                                            </div>

                                                            <br>


                                                        </div>
                                                        <br>
                                                        <div>
                                                            <h5 style="background-color: #000; text-align:center;color:#fff">payslip</h5>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center">
                                                        <h3 style="margin: 10px 0 20px;">Payslip for the period of <?php echo $month ?> <?php echo $year ?></h3>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table width="100%" class="paytable2">
                                            <tbody>
                                                <tr>
                                                <th class="text-left"></th>
                                                    <th class="text-left">Payslip No # : <?php echo $allPdt->ID ?></th>
                                                    
                                                    <th class="text-right"></th>
                                                    <th class="text-right">Payment Date : <?php echo $allPdt->PAYMENT_DATE ?></th>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <hr>
                                        <table width="100%" class="paytable2">
                                            <tbody>
                                                <tr>
                                                    <th width="25%"><?php echo $this->lang->line("staff_id"); ?></th>
                                                    <td width="25%"><?php echo $allPdt->STAFF_ID ?></td>
                                                       
                                                   
                                                    <th width="25%"><?php echo $this->lang->line("name"); ?></th>
                                                    <td width="25%"><?php echo $allPdt->FIRST_NAME ?> <?php echo $allPdt->LAST_NAME ?></td>
                                                    
                                                </tr>
                                                <tr>
                                                    <th><?php echo $this->lang->line("staff_department"); ?></th>
                                                    <td><?php echo $allPdt->DEPARTMENT_NAME ?></td>
                                                    <th><?php echo $this->lang->line("staff_designation"); ?></th>
                                                    <td><?php echo $allPdt->DESIGNATION_NAME ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <br>
                                        <table width="100%" class="earntable">
                                            <tbody>
                                                <tr>
                                                    <th width="25%">Earning</th>
                                                    <th width="25%" class="pttright reborder">Amount()</th>
                                                    <th width="25%" class="pttleft">Deduction</th>
                                                    <th width="25%" class="text-right">Amount()</th>
                                                </tr>
                                                <tr>
                                                    <th>Total Earning</th>
                                                    <th class="pttright reborder"><?php echo $allPdt->TOTAL_ALLOWANCE ?> tk</th>
                                                    <th class="pttleft">Total Deduction</th>
                                                    <th class="text-right"><?php echo $allPdt->TOTAL_DEDUCTION?> tk</th>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <br>
                                        <table width="100%">
                                            <tbody>
                                                <tr>
                                                    <th width="80%">Payment Mode</th>
                                                    <td><?php echo $allPdt->PAYMENT_METHOD?></td>
                                                </tr>
                                                <tr>
                                                    <th width="80%">Basic Salary()</th>
                                                    <td><?php echo $allPdt->BASIC_SALARY?> tk</td>
                                                </tr>
                                               
                                                <tr>
                                                    <th width="80%">Net Salary()</th>
                                                    <td><?php echo $allPdt->NET_SALARY?> tk</td>
                                                </tr>


                                                <tr>
                                                    <td align="center">
                                                        <div style="position: absolute;left:15px;padding-top:10px;color:darkorange">
                                                            [N.B] This payslip is computer generated hence no signature is required.
                                                            <p></p>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--/.col (left) -->
                            </div>


                            <br>
                            <br>


                        


                        </form>








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

<!-- ============================================================== -->
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