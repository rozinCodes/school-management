
<style>

    .border-one{
        width: 1000%;
        margin: 10px 0px;
        border-bottom: 1px solid #000;

    }
    .card-one{
        margin-bottom: 120px;
        margin-left:  50px;
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

       <style type="text/css" media="print">
      div.page
      {
        page-break-after: always;
        page-break-inside: avoid;
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



 
 


        <div class="row">
            
            
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
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

                            <form form enctype="multipart/form-data" class="needs-validation" novalidate action="<?php echo base_url() ?>admin/certificates/design/admit_card" method="post">

                                <div class="row">



                                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
                                        <label for="validationCustom01"><?php echo $this->lang->line("exam_name"); ?></label>

                                        <select class="form-control" id="exam_name" name="exam_name" required="">
                                            <option value="" selected>Select</option>
                                            <?php
                                            if (isset($allPdt6)) {
                                                foreach ($allPdt6 as $value) {

                                            ?>

                                                    <option value="<?php echo $value->ID ?>"><?php echo $value->EXAM_NAME ?></option>

                                            <?php
                                                }
                                            }

                                            ?>
                                        </select>

                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>

                                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
                                        <label for="validationCustom01"><?php echo $this->lang->line("session"); ?></label>

                                        <select class="form-control" id="session_ID" name="session" required="">
                                            <option value="" selected>Select</option>
                                            <?php
                                            if (isset($allPdt5)) {
                                                foreach ($allPdt5 as $value) {

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


                                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
                                        <label for="validationCustom01"><?php echo $this->lang->line("version"); ?></label>

                                        <select class="form-control" id="version_id" name="version" onchange="test2()" required="">
                                            <option value="" selected>Select</option>
                                            <?php
                                            if (isset($allPdt)) {
                                                foreach ($allPdt as $value) {

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

                                        <select class="form-control" name="class" id="class_id" required="" onchange="test3()">
                                            <option value="" selected><?php echo $this->lang->line("class"); ?></option>




                                        </select>


                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>

                                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
                                        <label for="validationCustom01"><?php echo $this->lang->line("section"); ?></label>

                                        <select class="form-control" name="section" id="section_id" required="">
                                            <option value="" selected><?php echo $this->lang->line("section"); ?></option>


                                        </select>

                                    </div>
                                    <div class="row pull-right">
                                        <div class="col-xl-2 col-lg-2  col-md-2 col-sm-2 col-2 ">
                                            <input class="btn btn-primary my_btn_style" type="submit" name="sub" value="Generate Admit">

                                        </div>

                                    </div>
                                </div>


                            </form>

                        </div>
                    </div>
                </div>
            <!-- ============================================================== -->
            <!-- validation form -->
     
            <!-- ============================================================== -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Admit Card </h5>
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


                            <div  class="page" id='printMe'>
   
                                <?php
                                if(isset($allEdt)){
                                    foreach ($allEdt as $edt){
                                ?>
                                <div class="card-one">
                                        <div class="pagebreak"> 
                                    <div class="row ">

                                        <div class="col-md-3">
                                            <div>
                                                <img src="http://localhost/Application/uploads/school_info/logo/090ad8246a38083c13a64c21299529db.png" width="100" height="50" style="margin-right: 150px">
                                            </div>
                                        </div>
                                        <div class="col-md-9"><div><h3>WALTON INTELLIGENT SCHOOL</h3>
                                                <p>Gazipur,Dhaka-1205</p></div></div>

                                        <div class="border-one"></div>
                                        <div class="col-md-12">

                                            <div class="card-body-one">
                                                <h3>Admit Card</h3>
                                                
                                                <h4>Name: <?php echo $edt->F_NAME." ". $edt->L_NAME; ?></h4>
                                                <h4>Class: <?php echo $edt->CLASSES; ?></h4>
                                                <h4>Roll: <?php echo $edt->ROLL; ?></h4>
                                                <h4>Section: <?php echo $edt->NAME; ?></h4>
                                                <h4>Session:<?php echo $edt->SESSIONS; ?></h4>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-12">
                                          <?php
                                                $i=1;
                                                if(isset($allSdt)){
                                                    foreach ($allSdt as $val){
                                                       $exam= $val->EXAM_NAME;
                                                    }
                                                   
                                                ?>
                                        
                                        <h3 style="margin:20px; text-align: center;text-transform: uppercase;"><?php if(isset($exam)){echo $exam;} ?></h3>
                                       <?php
                                        }
                                       ?>
                                        
                                        <div class="card-table">
                                            <table>
                                                <tr>
                                                    <th>S.I</th>
                                                    <th>Date</th>
                                                    <th>Course Code</th>
                                                    <th>Subject Name</th>
                                                    <th>Start Date</th>
                                                     <th>End Date</th>
                                                    <th>Time</th>
                                                    <th>Room No</th>
                                                </tr>
                                                <?php
                                                $i=1;
                                                if(isset($allSdt)){
                                                    foreach ($allSdt as $val){
                                                ?>
                                                <tr>
                                                    <td><?php echo $i;$i++;?></td>
                                                    <td><?php echo $val->E_DATE; ?></td>
                                                    <td><?php echo $val->SUBJECT_CODE?></td>
                                                     <td><?php echo $val->SNAME?></td>
                                                     <td><?php echo $val->START_TIME?></td>
                                                      <td><?php echo $val->END_TIME?></td>
                                                       <td><?php echo $val->DURATION?></td>
                                                     <td><?php echo $val->ROOM?></td>
                                                   
                                                </tr>
                                                <?php
                                                
                                                    }
                                                }
                                                ?>
                                              
                                            </table>
                                        </div><br><br>
                                        <div ><h4 style="float: right;">Principal </h4></div><br><br>
                                    </div>
                                </div>
                                </div>
                                
                               
<?php
}
}

?>
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
        document.querySelector("#today2").valueAsDate = new Date();
    </script>


    <script>
        function test2() {
            var c = document.getElementById("version_id").value;
            // alert(c);
            var sc = "";
            if (c == 0) {
                sc += "<option value='0'>Choose Version First</option>";
            }

            <?php



            foreach ($allPdt as $vr) {


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
            //  alert(sc);



            $("#section_id").html(sc);

            test4()
        }
    </script>

    <script>
        function test4() {
            var c = document.getElementById("class_id").value;
            //  alert(c);
            var sc = "";
            if (c == 0) {
                sc += "<option value='0'>Choose Class First</option>";
            }

            <?php



            foreach ($allPdt2 as $cls) {


                echo "else if (c==$cls->ID){";


                foreach ($allPdt4 as $sub) {



                    if ($cls->ID == $sub->CLASSESID) {

                        echo "sc += '<option  value=\"{$sub->ID}\">$sub->NAME</option>';";
                    }
                }

                echo "}";
            }

            ?>
            //  alert(sc);



            $("#subject_id").html(sc);


        }
    </script>

    <script type="text/javascript">
        function compare() {
            var start = document.getElementById("period_start_time").value;
            var end = document.getElementById("period_end_time").value;
            //alert(start);
            var hour1 = start.split(':')[0];
            var hour2 = end.split(':')[0];
            var difhour = hour2 - hour1;
            var min1 = start.split(':')[1];
            var min2 = end.split(':')[1];
            var difmin = min2 - min1;



            difmin = difmin.toString().length < 2 ? '0' + difmin : difmin;
            if (difmin < 0) {
                difhour--;
                difmin = 60 + difmin;
            }
            difhour = difhour.toString().length < 2 ? '0' + difhour : difhour;


            $('#period_duration').val(difhour + ":" + difmin);

        }
    </script>