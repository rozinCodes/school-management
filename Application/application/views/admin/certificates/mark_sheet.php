<style>
    .border-one {
        width: 1000%;
        margin: 10px 0px;
        border-bottom: 1px solid #000;

    }

    .card-one {
        margin: 10px 50px;
    }

    .card-body-one h4 {
        padding-left: 50px;
        font-size: 19px;
        margin: 0px;
        color: #000;
        font-family: Myriad Pro;
    }

    .card-body-one h3 {
        text-align: center;
        color: orangered;
        font-weight: bold;
        text-transform: uppercase;
    }

    .card-table {
        margin: 0px auto;
    }

    table {
        border-collapse: collapse;
        margin-top: 10px;
    }

    td,
    th {
        border: 1px solid #999;
        padding: 0.5rem;
        text-align: left;
    }
</style>

<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Student Result</h2>

                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>

                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->

        <div class="row">
            <!-- ============================================================== -->
            <!-- validation form -->
            <!-- ============================================================== -->
            <div  class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Mark Sheet</h5>
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
                        <div>


                            <div id="section-to-print">
                                <div class="card-one">
                                    <div class="row">

                                        <div class="col-md-2">
                                            <div>
                                                <img src="http://localhost/Application/uploads/school_info/logo/090ad8246a38083c13a64c21299529db.png" width="100" height="50" style="margin-right: 150px">
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div>
                                                <h3>WALTON INTELLIGENT SCHOOL</h3>
                                                <p>Gazipur,Dhaka-1205</p>
                                            </div>
                                        </div>

                                        <div class="border-one"></div>
                                        <div class="col-md-12">

                                            <div class="card-body-one">
                                                <h3>Mark Sheet</h3>

                                                <?php
                                                foreach ($allPdt2 as $pdt) {
                                                    $examname = $pdt->EXAM_NAME;
                                                    $SESSIONS = $pdt->SESSIONS;
                                                }

                                                foreach ($allPdt as $pp) {
                                                ?>

                                                    <h4>Name: <?php echo $pp->F_NAME . " " . $pp->L_NAME; ?></h4>
                                                    <h4>Admission No: <?php echo $pp->ADMISSION_NO; ?></h4>
                                                    <h4>Class: <?php echo $pp->CLASSES; ?></h4>
                                                    <h4>Roll: <?php echo $pp->ROLL; ?></h4>

                                                <?php
                                                }
                                                ?>
                                                <h4>Exam Name: <?php echo $examname; ?></h4>
                                                <h4>Session:<?php echo $SESSIONS; ?></h4>

                                            </div>


                                        </div>

                                    </div>

                                    <div class="col-md-12">
                                        <div class="card-table">
                                            <table>
                                                <tr>
                                                    <th>S.I</th>
                                                    <th>Course Code</th>
                                                    <th>Subject Name</th>
                                                    <th>MARK</th>
                                                    <th>G_POINT</th>
                                                    <th>STATUS</th>
                                                    <th>FOURTH SUB</th>
                                                </tr>
                                                <?php
                                                $i = 1;
                                                $point = 0;
                                                $j = 0;
                                                foreach ($allPdt2 as $value) {

                                                ?>
                                                    <tr>
                                                        <td><?php echo $i;
                                                            $i++; ?></td>
                                                        <td><?php echo $value->CODE; ?></td>
                                                        <td><?php echo $value->SUBJECT_NAME; ?></td>
                                                        <td><?php echo $value->MARK; ?></td>
                                                        <td><?php echo $value->G_POINT; ?></td>
                                                        <td><?php echo $value->STATUS; ?></td>
                                                        <td><?php if($value->FOURTH_SUB){echo"IT IS";} ?></td>
                                                    </tr>
                                                <?php
                                                    $point = $point + $value->G_POINT;
                                                    $j++;
                                                    // four sub decerement sum start
                                                    if($value->SUBJECT_ID==$value->FOURTH_SUB)
                                                    {
                                                       
                                                        $j--;
                                                       
                                                    }
                                                    


                                                    // four sub decerement sum stop
                                                }
                                                if($j==0)// only 4 sub ar mark insert dela jano 0 na hoia jai
                                                {
                                                    $j=1;
                                                }
                                                $gpa = $point / $j;
                                                if($gpa>5){$gpa=5;}//all sub a plus pala 4 sub add hoia jodi gpa 5++ ase then
                                                $gpaFinal = sprintf("%.2f", $gpa);


                                                ?>
                                                <tr>
                                                    <td colspan="7" style="margin-left: 300px;">Total Point : <?php echo $point; ?> and G.P.A : <?php echo $gpaFinal; ?></td>

                                                </tr>

                                            </table>
                                        </div>

                                    </div>

                                </div>

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

    <script type="text/javascript">
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;

        }
    </script>