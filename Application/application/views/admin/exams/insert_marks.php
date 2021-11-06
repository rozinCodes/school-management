<!-- ============================================================== -->
<!-- end left sidebar -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- wrapper  -->
<!-- ============================================================== -->

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
table .b {
  position: absolute;
  width: 120px;  
  background:#696969;
  color:#fff;
}
</style>

</div>


<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->



        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <h2><?php echo $this->lang->line("insert_marks"); ?></h2>
        </div>


        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title"><?php echo $this->lang->line("sections"); ?> </h2>

                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("dashboard"); ?></a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("exams"); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line("insert_marks"); ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- =====================================Search Student========================= -->

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

                        <?php
                        $roles = $this->session->userdata('roles');

                        if ($roles == 3) {
                            $staff_id = $this->session->userdata('id');
                            ?>

                            <form class="needs-validation" novalidate="" action="<?php echo base_url() ?>admin/exams/insert_marks/get_student_for_result2" method="post">



                                <div class="row">


                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("class"); ?></label>
                                        <select class="form-control" name="class_name" id="classid" onchange="test2()" required="">
                                            <option value="">Chose Class</option>

                                            <?php
                                            if (isset($allCls)) {
                                                foreach ($allCls as $value) {


                                                    if ($value->STAFF_ID == $staff_id) {
                                                        ?>

                                                        <option value="<?php echo $value->CLASS_ID ?>"><?php echo $value->CLASS_NAME ?> (<?php echo $value->VERSION ?>)</option>


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

                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3  ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("section"); ?></label>

                                        <select class="form-control" name="section_name" id="sectionid" required="">
                                            <option value="" selected><?php echo $this->lang->line("section"); ?></option>


                                        </select>


                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>


                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("exam_name"); ?></label>


                                        <select class="form-control" id="validationCustom01" name="exam_name" required>
                                            <option value="">Select </option>
                                            <?php
                                            if (isset($allPdtexam)) {
                                                foreach ($allPdtexam as $value) {
                                                    ?>

                                                    <option value="<?php echo $value->ID ?>"><?php echo $value->EXAM_NAME ?></option>

                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>



                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("session"); ?></label>


                                        <select class="form-control" id="validationCustom01" name="session" required>
                                            <option value="">Select </option>
                                            <?php
                                            if (isset($allPdtsession)) {
                                                foreach ($allPdtsession as $value) {
                                                    ?>

                                                    <option value="<?php echo $value->ID ?>"><?php echo $value->SESSIONS ?></option>

                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>



                                    </div>




                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4  ">
                                        <button class="btn btn-primary my_btn_style" type="submit">Search</button>
                                    </div>







                                </div>
                            </form>
                        
                       
                            <form class="needs-validation" novalidate="" action="<?php echo base_url() ?>admin/exams/insert_marks/marks_insert" method="post">

                                <div class="card-body">



                                    <div class="table-responsive">
                                        <!-- <table class="table table-striped table-bordered first" id="myTable"> -->
                                        <table class="">

                                            <thead>
                                                <tr>
                                                    <!-- <th><?php echo $this->lang->line("f_name") ?></th> -->
                                                    <th class="b">Roll No</th>
                                                       <th>Name</th>
                                                    
                                                    <?php
                                                    if (isset($allStd)) {
                                                        foreach ($allStd as $std) {
                                                            if (isset($allSub)) {
                                                                foreach ($allSub as $sub) {
                                                                    if ($sub->SESSIONS == $std->SESSION_ID) {
                                                                        ?>
                                                                        <th><?php echo $sub->SUBJECT_NAME ?></th><?php
                                                                    }
                                                                }
                                                            }
                                                            break;
                                                        }
                                                        ?>



                                                        <?php
                                                    }
                                                    ?>
                                                </tr>

                                            </thead>

                                            <tbody>




                                                <tr>

                                                    <?php
                                                    if (isset($allStd)) {
                                                        foreach ($allStd as $std) {
                                                            ?>
                                                    <td class="b">
                                                                <?php echo $std->ROLL ?> </td>
                                                                <td>
                                                                <?php echo $std->F_NAME ?></td>
                                                            <?php
                                                            foreach ($allSub as $sub) {
                                                                if ($sub->SESSIONS == $std->SESSION_ID) {

                                                                    if (isset($allPdtmarks)) {



                                                                        //  echo"got";
                                                                        //  exit();
                                                                        foreach ($allPdtmarks as $mrks) {
                                                                            if ($mrks->STUDENT_ID == $std->STUDENT_ID && $mrks->SUBJECT_ID == $sub->SUBJECT_ID) {
                                                                                ?>



                                                                                <td>
                                                                                    <input type="hidden" name="subcode[]" value="<?php echo $sub->CODE ?>">
                                                                                    <input type="hidden" name="stdt_admission_no[]" value="<?php echo $std->ADMISSION_NO ?>">
                                                                                    <input type="hidden" name="class_id[]" value="<?php echo $std->CLASS_ID ?>">
                                                                                    <input type="hidden" name="section_id[]" value="<?php echo $std->SECTION_ID ?>">
                                                                                    <input type="hidden" name="session_id[]" value="<?php echo $std->SESSION_ID ?>">
                                                                                    <input type="hidden" name="exam_id" value="<?php
                                                                                    if (isset($exm_id)) {
                                                                                        echo $exm_id;
                                                                                    }
                                                                                    ?>">

                                                                                    <input type="hidden" name="staff_id" value="<?php echo $staff_id ?>">

                                                                                    <input type="hidden" name="stdtid[]" value="<?php echo $std->STUDENT_ID ?>">
                                                                                    <input type="hidden" name="sub_id[]" value="<?php echo $sub->SUBJECT_ID ?>">
                                                                                    <input  type="number" step="0.01" class="marks" name="mark[]" value="<?php echo $mrks->MARK ?>">

                                                                                                                                                    <!-- <input type="text" value="" placeholder=""> -->

                                                                                </td>

                                                                                <?php
                                                                            }
                                                                        }
                                                                    } else {
                                                                        //  echo"not got";
                                                                        //  exit();
                                                                        ?>



                                                                        <td>
                                                                            <input type="hidden" name="subcode[]" value="<?php echo $sub->CODE ?>">
                                                                            <input type="hidden" name="stdt_admission_no[]" value="<?php echo $std->ADMISSION_NO ?>">
                                                                            <input type="hidden" name="class_id[]" value="<?php echo $std->CLASS_ID ?>">
                                                                            <input type="hidden" name="section_id[]" value="<?php echo $std->SECTION_ID ?>">
                                                                            <input type="hidden" name="session_id[]" value="<?php echo $std->SESSION_ID ?>">
                                                                            <input type="hidden" name="exam_id" value="<?php
                                                                            if (isset($exm_id)) {
                                                                                echo $exm_id;
                                                                            }
                                                                            ?>">

                                                                            <input type="hidden" name="staff_id" value="<?php echo $staff_id ?>">

                                                                            <input type="hidden" name="stdtid[]" value="<?php echo $std->STUDENT_ID ?>">
                                                                            <input type="hidden" name="sub_id[]" value="<?php echo $sub->SUBJECT_ID ?>">
                                                                            <input type="text" class="marks" name="mark[]" value="">


                                                                                                                            <!-- <input type="text" value="" placeholder=""> -->

                                                                        </td>

                                                                        <?php
                                                                    }
                                                                }
                                                            }
                                                            ?>



                                                        </tr><?php
                                                    }
                                                    ?>
                                                <td> <button class="btn btn-primary my_btn_style" type="submit" require>Submit Marks</button></td>
                                                <?php
                                            }
                                            ?>






                                            </tbody>
                                            <tfoot>

                                            </tfoot>
                                        </table>



                                    </div>


                                </div>
                            </form>




                            <?php
                        }
                        ?>



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

                <!-- ============================================================== -->
                <?php
            }
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
    function test2() {




        var c = document.getElementById("classid").value;

        var sc = "";
        if (c == 0) {
            sc += "<option value='0'>Choose Class First</option>";
        }


<?php
foreach ($allCls as $cls) {


    echo "else if (c==$cls->CLASS_ID){";



    foreach ($allSec as $sec) {



        if ($cls->STAFF_ID == $sec->STAFF_ID && $cls->CLASS_ID == $sec->CLASS_ID) {

            echo "sc += '<option  value=\"{$sec->SECTION_ID}\">$sec->SECTION_NAME</option>';";
        }
    }

    echo "}";
}
?>

        //alert(c);


        $("#sectionid").html(sc);


    }
</script>
<script>
    $(document).ready(function () {

        $('.marks').each(function () {
            if ($(this).val() == '')
                $(this).css('background-color', '#3b593f'), $(this).css('color', '#fff')
        });


    });
</script>