<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

<style>

    .border-one{
        width: 1000%;
        margin: 10px 0px;
        border-bottom: 1px solid #000;

    }
    .card-one{
        margin: 10px 50px;
    }
    .card-body-one h4{
        padding-left: 50px;
        font-size: 19px;
        margin: 0px;
        color: #000;
        font-family: Myriad Pro;
    }
    .card-body-one h3{
        text-align: center;
        color:orangered;
        font-weight: bold;
        text-transform: uppercase;
    }
    .card-table{
        margin: 0px auto;
    }
    table {
        border-collapse: collapse;
        margin-top: 50px;
    }

    td, th {
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
                    <h2 class="pageheader-title">Student ID Card</h2>

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
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Staff Information</h5>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pull-right">
                        <p style="cursor: pointer;" onclick="window.print()" class="pull-right" type="print"><i class=" fas fa-print"></i></p>
                    </div>  <div class="card-body">
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

                                    <div style="width:800px; height:600px; padding:20px; text-align:center; border: 10px solid #787878">
                                        <div style="width:750px; height:550px; padding:20px; text-align:center; border: 5px solid #787878">
                                            <span style="font-size:50px; font-weight:bold">Certificate of Completion</span>
                                            <br><br>
                                            <span style="font-size:25px"><i>This is to certify that</i></span>
                                            <br><br>
                                            <span style="font-size:30px"><b>MD. LITAN SARKAR</b></span><br/><br/>
                                            <span style="font-size:25px"><i>has completed the course</i></span> <br/><br/>
                                            <span style="font-size:30px">Registion N0 : 19282722 </span> <br/><br/>
                                            <span style="font-size:20px">CGPA 3.1 Out of 5</span><br>
                                            <?php echo date("F d, Y") ?>
                                            <span style="font-size:30px"></span><br><br>
                                            <span style="float: right;font-size:30px">Chairman</span>
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