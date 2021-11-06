<!-- ============================================================== -->
<!-- end left sidebar -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- wrapper  -->
<!-- ============================================================== -->




</div>


<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->



        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <h2><?php echo $this->lang->line("bioattendenceReport"); ?></h2>

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
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line("bioattendenceReport"); ?></li>
                            </ol>
                        </nav>
                    </div>

                    <h4><span> <a class="btn btn-success pull-right" href="<?php echo base_url() ?>admin/BioAttendance/loadBioattendenceReportfromOracle">Load Data</a> </span></h4>
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



            <!-- today attendance summery start -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" id="GFG1">
                <div class="card">
                    <h5 style="color:royalblue" class="card-header">
                        <p style="text-align: center; font-size:25px;">Today Attendance Summery</p>
                        <p style="cursor: pointer;" onclick="printDiv1()" class="pull-right" type="print"><i class=" fas fa-print"></i></p>
                        <?php echo $this->lang->line("sections"); ?>
                    </h5>

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
                                <div class="card">

                                    <div class="card-body">
                                        <div class="table-responsive" >
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
                                                        <th>User Id</th>
                                                        <th>In Time</th>
                                                        <th>Out Time</th>
                                                        <th>Date</th>

                                                    </tr>
                                                </thead>

                                                <tbody>

                                                    <?php
                                                    foreach ($bioAttendanceReport as $key) {
                                                        if (date("Y-m-d", $key->INTIME) == date("Y-m-d")) {


                                                    ?>
                                                            <tr>

                                                                <td><?php echo $key->USER_ID ?></td>
                                                                <td><?php echo date("H:i:s", $key->INTIME); ?></td>
                                                                <td><?php echo date("H:i:s", $key->OUTTIME); ?></td>
                                                                <td><?php echo $key->ATTENDANCE_DATE; ?></td>


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
                                        <br>

                                    </div>
                                </div>

                            </div>

                            <!-- ============================================================== -->

                            <!-- ============================================================== -->
                        </div>

                    </div>
                </div>
            </div>
            <!-- today attendance summery end -->




            <!-- month attendance report srart -->

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" id="GFG2">
                <div class="card">
                    <h5 style="color:royalblue" class="card-header">
                        <p style="text-align: center; font-size:25px;">This Month Attendance Summery</p>
                        <p style="cursor: pointer;" onclick="printDiv2()" class="pull-right" type="print"><i class=" fas fa-print"></i></p>
                        <?php echo $this->lang->line("sections"); ?>
                    </h5>

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
                                <div class="card">

                                    <div class="card-body">
                                         <div class="table-responsive" > <!-- style="border:2px solid #ddd;   height: 400px !important; overflow: scroll;" -->
                                            <style>
                                                table,
                                                th,
                                                td {
                                                    border: 1px solid black;
                                                }
                                            </style>
                                            <table id="example" class="display " style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>User Id</th>
                                                        <th>In Time</th>
                                                        <th>Out Time</th>
                                                        <th>Date</th>

                                                    </tr>
                                                </thead>

                                                <tbody>

                                                    <?php
                                                    foreach ($bioAttendanceReport as $key) {
                                                        if (date("Y-m", $key->INTIME) == date("Y-m")) {


                                                    ?>
                                                            <tr>

                                                                <td><?php echo $key->USER_ID ?></td>
                                                                <td><?php echo date("H:i:s", $key->INTIME); ?></td>
                                                                <td><?php echo date("H:i:s", $key->OUTTIME); ?></td>
                                                                <td><?php echo $key->ATTENDANCE_DATE; ?></td>


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
                                        <br>

                                    </div>
                                </div>

                            </div>

                            <!-- ============================================================== -->

                            <!-- ============================================================== -->
                        </div>

                    </div>
                </div>
            </div>
            <!-- month attendance report end -->

            <!-- thisyear attendance summery start -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" id="GFG3">
                <div class="card">
                    <h5 style="color:royalblue" class="card-header">
                        <p style="text-align: center; font-size:25px;"> This Year Attendance Summery</p>
                        <p style="cursor: pointer;" onclick="printDiv3()" class="pull-right" type="print"><i class=" fas fa-print"></i></p>
                        <?php echo $this->lang->line("sections"); ?>
                    </h5>

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
                                <div class="card">

                                    <div class="card-body">
                                        <div class="table-responsive" >
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
                                                        <th>User Id</th>
                                                        <th>In Time</th>
                                                        <th>Out Time</th>
                                                        <th>Date</th>

                                                    </tr>
                                                </thead>

                                                <tbody>

                                                    <?php
                                                    foreach ($bioAttendanceReport as $key) {
                                                        if (date("Y", $key->INTIME) == date("Y")) {


                                                    ?>
                                                            <tr>

                                                                <td><?php echo $key->USER_ID ?></td>
                                                                <td><?php echo date("H:i:s", $key->INTIME); ?></td>
                                                                <td><?php echo date("H:i:s", $key->OUTTIME); ?></td>
                                                                <td><?php echo $key->ATTENDANCE_DATE; ?></td>


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
                                        <br>

                                    </div>
                                </div>

                            </div>

                            <!-- ============================================================== -->

                            <!-- ============================================================== -->
                        </div>

                    </div>
                </div>
            </div>
            <!-- this yesr attendance summery end -->

             <!-- alltime attendance summery start -->
             <!-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" id="GFG4">
                <div class="card">
                    <h5 style="color:royalblue" class="card-header">
                        <p style="text-align: center; font-size:25px;"> All Time Attendance Summery</p>
                        <p style="cursor: pointer;" onclick="printDiv4()" class="pull-right" type="print"><i class=" fas fa-print"></i></p>
                        <?php echo $this->lang->line("sections"); ?>
                    </h5>

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
                                <div class="card">

                                    <div class="card-body">
                                        <div class="table-responsive" >
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
                                                        <th>User Id</th>
                                                        <th>In Time</th>
                                                        <th>Out Time</th>
                                                        <th>Date</th>

                                                    </tr>
                                                </thead>

                                                <tbody>

                                                    <?php
                                                    foreach ($bioAttendanceReport as $key) {
                                                       


                                                    ?>
                                                            <tr>

                                                                <td><?php echo $key->USER_ID ?></td>
                                                                <td><?php echo date("H:i:s", $key->INTIME); ?></td>
                                                                <td><?php echo date("H:i:s", $key->OUTTIME); ?></td>
                                                                <td><?php echo $key->ATTENDANCE_DATE; ?></td>


                                                            </tr>
                                                    <?php
                                                       
                                                    }
                                                    ?>

                                                </tbody>
                                                <tfoot>

                                                </tfoot>
                                            </table>


                                        </div>
                                        <br>

                                    </div>
                                </div>

                            </div>

                           
                        </div>

                    </div>
                </div>
            </div> -->
            <!-- alltime attendance summery end -->






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
<script>
    function printDiv1() {
        hidecontent();
        var divContents = document.getElementById("GFG1").innerHTML;
        var a = window.open('', '', 'height=500, width=500');


        a.document.write('<html>');
        a.document.write(divContents);
        a.document.write('</body></html>');
        content();
        a.document.close();
        a.print();
    }
</script>
<script>
    function printDiv2() {

       hidecontent();
      
       
        
       
        var divContents = document.getElementById("GFG2").innerHTML;
       
        var a = window.open('', '', 'height=1000, width=1000');
        
        a.document.write('<html>');
        a.document.write(divContents);
       
        a.document.write('</body></html>');
       
        a.document.close();
        
        a.print();
        
        content();
    }
</script>
<script>
    function printDiv3() {
        hidecontent();
        var divContents = document.getElementById("GFG3").innerHTML;
        var a = window.open('', '', 'height=500, width=500');
        a.document.write('<html>');
        a.document.write(divContents);
        a.document.write('</body></html>');
        content();
        a.document.close();
        a.print();
    }
</script>

<script>
    function printDiv4() {
        hidecontent();
        var divContents = document.getElementById("GFG4").innerHTML;
        var a = window.open('', '', 'height=500, width=500');
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

