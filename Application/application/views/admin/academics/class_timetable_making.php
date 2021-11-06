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
            <h2><?php echo $this->lang->line("make_class_timetable"); ?></h2>
        </div>


        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title"><?php echo $this->lang->line("sections"); ?> </h2>

                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("dashboard"); ?></a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("academics"); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line("make_class_timetable"); ?></li>
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



            <!-- ============================================================== -->
            <!-- validation form -->
            <!-- ============================================================== -->
            <?php
            if (isset($_GET['edit'])) {
                // if(!$_GET['edit']){
                foreach ($allPdt as $value) {
                    if ($_GET['edit'] == $value->id) {
            ?>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">

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

                                    <form class="needs-validation" novalidate action="<?php echo base_url() ?>task/category_update" method="post">
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 ">
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




                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
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
                            <form class="needs-validation" novalidate action="<?php echo base_url() ?>Admin/academics/class_timetable_making/insert" method="post">
                                <div class="row">

                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("teacher_name"); ?></label>
                                        <select class="form-control" name="teacher_name" id="teacherid" onchange="test2()" required="">
                                            <option value="">Chose Teacher</option>

                                            <?php
                                            if (isset($allTAC)) {
                                                foreach ($allTAC as $value) {
                                            ?>

                                                    <option value="<?php echo $value->STAFF_ID ?>"><?php echo $value->FIRST_NAME ?></option>


                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("class"); ?></label>

                                        <select class="form-control" name="class" id="classid" onchange="test3()" required="">
                                            <option value="" selected><?php echo $this->lang->line("class"); ?></option>


                                        </select>


                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("section"); ?></label>

                                        <select class="form-control" name="section" id="sectionid"  onchange="test4()" required="">
                                            <option value="" selected><?php echo $this->lang->line("section"); ?></option>

                                        </select>


                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>

                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("session"); ?></label>
                                        <select class="form-control" name="session_name"  required="">
                                            <option value="">Chose Session</option>

                                            <?php
                                            if (isset($allSess)) {
                                                foreach ($allSess as $value) {
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
                                    <br>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("subjects"); ?></label>


                                        <select class="form-control" name="subjects" id="subjectid" required="">
                                            <option value="" selected><?php echo $this->lang->line("subject"); ?></option>

                                        </select>


                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <br>



                                    <br>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("timetable_class"); ?></label>
                                        <select class="form-control" name="timetable_class" id="timetable_class" required="">
                                            <option value=""><?php echo $this->lang->line("timetable_class"); ?></option>


                                            <?php
                                            if (isset($alltimetable)) {
                                                foreach ($alltimetable as $value) {
                                            ?>

                                                    <option value="<?php echo $value->ID; ?>"><?php echo $value->START_TIME ?> to <?php echo $value->END_TIME ?></option>

                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>


                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("day"); ?></label>
                                        <select class="form-control" name="day" id="timetable_class" required="">
                                            <option value="">Select</option>
                                            <option value="sat">Sat</option>
                                            <option value="sun">Sun</option>
                                            <option value="mon">Mon</option>
                                            <option value="tue">Tue</option>
                                            <option value="wed">Wed</option>
                                            <option value="thu">Thu</option>
                                            <option value="fri">Fri</option>

                                        </select>


                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <br>

                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("room_number"); ?></label>

                                        <input type="text" class="form-control" id="room_number" placeholder=" " name="room_number" value="" required>


                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>



                                </div>
                                <br>
                                <div class="form-row">




                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 ">
                                        <button class="btn btn-primary" type="submit">Add</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
            <?php
            }
            //}
            ?>
            <!-- end validation form -->

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header"><?php echo $this->lang->line("all_class_timetable"); ?></h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered first">
                                <thead>
                                    <tr>

                                        <th><?php echo $this->lang->line("teacher_name"); ?></th>
                                        <th><?php echo $this->lang->line("class"); ?></th>
                                        <th><?php echo $this->lang->line("section"); ?></th>
                                        <th><?php echo $this->lang->line("subjects"); ?></th>

                                        <th><?php echo $this->lang->line("timetable_class"); ?></th>
                                        <th><?php echo $this->lang->line("day"); ?></th>
                                        <th><?php echo $this->lang->line("room_number"); ?></th>


                                        <th><?php echo $this->lang->line("edit"); ?></th>
                                        <th><?php echo $this->lang->line("delete"); ?></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($allinfo)) {
                                        foreach ($allinfo as $value) {
                                    ?>
                                            <tr>

                                                <td><?php echo $value->FIRST_NAME ?></td>
                                                <td><?php echo $value->CLASSES ?></td>
                                                <td><?php echo $value->SECTION_NAME ?></td>
                                                <td><?php echo $value->SUBJECT_NAME ?></td>

                                                <td><?php echo $value->START_TIME ?> to <?php echo $value->END_TIME ?></td>
                                                <td><?php echo $value->DAY ?></td>
                                                <td><?php echo $value->ROOM_NUMBER ?></td>


                                                <td><a href="<?php echo base_url() . "task/task_category?edit={$value->ID}" ?>"><?php echo $this->lang->line("edit"); ?></a></td>
                                                <td> <a href="<?php echo base_url() . "task/category_delete/{$value->ID}" ?>"><?php echo $this->lang->line("delete"); ?></a></td>

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


    function test2() {
       

        

        var c = document.getElementById("teacherid").value;
        // alert(c);
        var sc = "";
        if (c == 0) {
            sc += "<option value='0'>Choose Teacher First</option>";
        }
        
        <?php
        
       
         
        foreach ($allTAC as $tec) {
            
                   
            echo "else if (c==$tec->STAFF_ID){";


            foreach ($allCls as $cls) {
                


                if ($tec->STAFF_ID == $cls->STAFF_ID) {
                  
                   
                    
                    

                
                    
                    echo "sc += '<option  value=\"{$cls->CLASS_ID}\">$cls->CLASS_NAME($cls->VERSION)</option>';";
                    

                }
            }

            echo "}";
        }
       
        ?>
        // alert(sc);



        $("#classid").html(sc);
        test3();
        //test4();
        
    }
    

</script>

<script>
    function test3() {

        var c = document.getElementById("classid").value;
        //alert(c);
        var sc = "";
        if (c == 0) {
            sc += "<option value='0'>Choose Class First</option>";
        }


        <?php
        
        foreach ($allCls as $cls) {


            echo "else if (c==$cls->CLASS_ID){";


            foreach ($allSec as $sec) {


                if ($cls->STAFF_ID == $sec->STAFF_ID && $cls->CLASS_ID == $sec->CLASS_ID) {
                   
                   
        
                    echo "sc += '<option value=\"{$sec->SECTION_ID}\">$sec->SECTION_NAME</option>';";
                }
            }

            echo "}";
        }
        ?>
        // alert(sc);



        $("#sectionid").html(sc);
    test4();
    }

    function test4(){
        //alert("ok")
    
    var c = document.getElementById("teacherid").value;
    var cls=document.getElementById("classid").value;
    var sec=document.getElementById("sectionid").value;
    

        // alert(c);
        var sc = "";
        if (c == 0) {
            sc += "<option value='0'>Choose Teacher First</option>";
        }


        <?php
        

        
        foreach ($allTAC as $tec) {


            echo "else if (c==$tec->STAFF_ID){";


            foreach ($allSub as $sub) { 
 
               
               echo" if ($sub->STAFF_ID == c  && $sub->CLASS_ID== cls && $sub->SECTION_ID== sec ) {";
                

                    echo "sc += '<option value=\"{$sub->SUBJECT_ID}\">$sub->SUBJECT_NAME</option>';";
                    

                    echo "}";
            }

            echo "}";
        }
        ?>
       



        $("#subjectid").html(sc);


  }
</script>


