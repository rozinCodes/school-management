<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->



        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <h2><?php echo $this->lang->line("bioattReport"); ?></h2>
        </div>


        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title"><?php echo $this->lang->line("sections"); ?> </h2>

                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("dashboard"); ?></a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("reports"); ?></a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("bioattReport"); ?></a></li>

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
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header"></h5>

                    <div class="card-body">
                        <h2 style="color:green"> </h2>
                        <form class="needs-validation" novalidate action="<?php echo base_url() ?>admin/BioAttendance/bioAttReport" method="post">

                            <div class="row">





                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 ">
                                            <label for="validationCustom01"><?php echo $this->lang->line("from_date"); ?></label>

                                            <input type="date" class="form-control" id="validationCustom01" placeholder="" name="from_date" value="" required>



                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 ">
                                            <label for="validationCustom01"><?php echo $this->lang->line("to_date"); ?></label>

                                            <input type="date" class="form-control" id="validationCustom01" placeholder="" name="to_date" value="" required>



                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 ">
                                            <label for="validationCustom01"><?php echo $this->lang->line("userId"); ?></label>

                                            <input type="number" class="form-control" id="validationCustom01" placeholder="" name="userId" value="" required>



                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>

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


                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" id="GFG3">
                        <div class="card">
                            <?php if (isset($stdInfoDetails)) { ?>
                                <h5 class="card-header"><?php echo $this->lang->line("bioattReport"); ?><p style="cursor: pointer;" onclick="printDiv3('<?php echo $stdInfoDetails->F_NAME ?>','<?php echo $stdInfoDetails->ROLL ?>','<?php echo$stdInfoDetails->CLASS_NAME?>','<?php echo$stdInfoDetails->SECTION_NAME?>','<?php echo$stdInfoDetails->SESSIONS?>')" class="pull-right" type="print"><i class=" fas fa-print"></i></p>
                                </h5>
                            <?php } ?>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <style>
                                        table,
                                        th,
                                        td {
                                            border: 1px solid black;
                                        }
                                    </style>
                                    <table id="" class="display" style="width:100%">
                                        <thead>
                                            <tr>

                                                <th>Shift Date</th>
                                                <th>Day</th>
                                                <th>Shift</th>
                                                <th>In Time</th>
                                                <th>Out Time</th>
                                                <th>Duration</th>
                                                <th>Status</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                             $p=0;$le=0;$l=0;$e=0;$bs=0;$as=0;
                                            if (isset($bioAttendanceReport)) {
                                                foreach ($bioAttendanceReport as $value) {


                                            ?>
                                                    <tr>

                                                        <td><?php echo $value->ATTENDANCE_DATE ?></td>
                                                        <td><?php $day = date('w', strtotime($value->ATTENDANCE_DATE));
                                                            if ($day == 0) {
                                                                echo "Sunday";
                                                            }
                                                            if ($day == 1) {
                                                                echo "Monday";
                                                            }
                                                            if ($day == 2) {
                                                                echo "Tuesday";
                                                            }
                                                            if ($day == 3) {
                                                                echo "Wednesday";
                                                            }
                                                            if ($day == 4) {
                                                                echo "Thursday";
                                                            }
                                                            if ($day == 5) {
                                                                echo "Friday";
                                                            }
                                                            if ($day == 6) {
                                                                echo "Saturday";
                                                            }


                                                            ?></td>
                                                        <td><?php echo date('h:i a', strtotime($studentShift->START_TIME)) . " to " . date('h:i a', strtotime($studentShift->END_TIME)); ?></td>
                                                        <td><?php echo date("Y/m/d H:i ", $value->INTIME); ?></td>
                                                        <td><?php echo date("Y/m/d H:i ", $value->OUTTIME); ?></td>
                                                        <td><?php

                                                            echo  gmdate("H:i:s", $value->OUTTIME - $value->INTIME); ?></td>


                                                        <td><?php $status = "";
                                                               
                                                            // print_r(date("H:i:s a",$value->INTIME)); ;
                                                            // echo "<br/>";
                                                            // print_r (date("H:i:s a",strtotime($studentShift->START_TIME)));
                                                            $intime = date("H:i", $value->INTIME);
                                                            $outtime = date("H:i", $value->OUTTIME);


                                                            if (strtotime($intime) <= strtotime($studentShift->START_TIME) && strtotime($outtime) >= strtotime($studentShift->END_TIME)) {
                                                                $status = "Present";
                                                               $p= $p+1;
                                                                if (strtotime($intime) == strtotime($outtime)) {
                                                                    $status = "Partially Present";
                                                                }
                                                            }
                                                            if (strtotime($intime) >= strtotime($studentShift->START_TIME) && strtotime($outtime) <= strtotime($studentShift->END_TIME)) {

                                                                $status = "Late And EarlyGone";
                                                               $le= $le+1;
                                                            }

                                                            if (strtotime($intime) >= strtotime($studentShift->START_TIME) && strtotime($outtime) >= strtotime($studentShift->END_TIME)) {
                                                                $status = "Late";
                                                               $l= $l+1;
                                                            }
                                                            if (strtotime($intime) <= strtotime($studentShift->START_TIME) && strtotime($outtime) <= strtotime($studentShift->END_TIME)) {
                                                                $status = "EarlyGone";
                                                               $e= $e+1;
                                                            }
                                                            if (strtotime($intime) <= strtotime($studentShift->START_TIME) && strtotime($outtime) <= strtotime($studentShift->START_TIME)) {
                                                                $status = "Before Shift";
                                                               $bs= $bs+1;
                                                            }
                                                            if (strtotime($intime) >= strtotime($studentShift->END_TIME) && strtotime($outtime) >= strtotime($studentShift->END_TIME)) {
                                                                $status = "After Shift";
                                                               $as= $as+1;
                                                            }
                                                            echo $status;  
                                                            
                                                            ?></td>





                                                    </tr>



                                            <?php
                                                }
                                            }

                                            ?>



                                        </tbody>

                                        <tr class="box box-solid total-bg odd">

                                           
                                            <td align="left"></td>

                                            <td class="text text-left">Present : <?php echo $p; ?> Days</td>
                                            <td class="text text-left">Late : <?php echo $l; ?> Days</td>
                                            <td class="text text-left">Early Gone : <?php echo $e; ?> Days</td>
                                            <td class="text text-left">Late & Early Gone : <?php echo $le; ?> Days</td>
                                            <td class="text text-left">Before Shift : <?php echo $bs; ?> Days</td>
                                            <td class="text text-left">After Shift : <?php echo $as; ?> Days</td>

                                        </tr>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <script>
            function printDiv3(name, roll,clas,section,session) {
                hidecontent();
                var divContents = document.getElementById("GFG3").innerHTML;
                var a = window.open('', '', 'height=500, width=500');
                a.document.write('<body > Name:' + name + ' <br>');
                a.document.write('<body > Roll:' + roll + ' <br>');
                a.document.write('<body > Class:' + clas + ' <br>');
                a.document.write('<body > Section:' + section + ' <br>');
                a.document.write('<body > Session:' + session + ' <br>');
                a.document.write('<html>');
                a.document.write(divContents);
                a.document.write('</body></html>');
                content();
                a.document.close();
                a.print();
            }
        </script>

        <script>
            function hidecontent() {
                $('table.display').DataTable().destroy();

            }

            function content() {
                $('table.display').DataTable();
            }
        </script>

        <script>
            $(document).ready(function() {
                $('table.display').DataTable();
            });
        </script>