<!-- ============================================================== -->
<!-- end left sidebar -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- wrapper  -->
<!-- ============================================================== -->
<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->

        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title"><?php echo $this->lang->line("teacher_assign"); ?> </h2>

                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("dashboard"); ?></a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("academics"); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line("teacher_assign"); ?></li>
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



            <!-- edit from start -->
            <?php
            if (isset($edit)) {

                // if(!$_GET['edit']){
                foreach ($allinfo as $values) {
                    if ($edit == $values['ID']) { //foreach ($query->getResult('User') as $user)
            ?>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

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






                                    <form class="needs-validation" novalidate action="<?php echo base_url() ?>Admin/academics/teacher_assign/edit_teacher_assign/edit/<?php echo $values['ID'] ?>" method="post">

                                        <div class="row">

                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("teacher_name"); ?></label>
                                                <select class="form-control" name="teacher_name" id="validationCustom01" required="">
                                                    <!-- <option value=""><?php echo $this->lang->line("teacher_name"); ?></option> -->
                                                    <option value="<?php echo $values['STAFF_ID']; ?>" selected><?php echo $values['FIRST_NAME']; ?></option>

                                                    <?php
                                                    if (isset($allTchr)) {
                                                        foreach ($allTchr as $value) {
                                                            if ($value->ROLES_ID == 3) {
                                                    ?>

                                                                <option value="<?php echo $value->STAFF_ID; ?>"><?php echo $value->FIRST_NAME ?></option>

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
                                            <br>
                                           
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("version"); ?></label>

                                        <select class="form-control" id="version_id" name="version" onchange="test2()" required="">
                                        <option value="<?php echo $values['VERSION_ID']; ?>" selected><?php echo $values['VERSION']; ?></option>
                                            <?php
                                            if (isset($allPdt5)) {
                                                foreach ($allPdt5 as $value) {

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


                                    <br>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("class"); ?></label>
                                      
                                        <select type="text" data-toggle="dropdown" class="form-control dropdown-toggle" id="cid" name="classesid" onchange="test3()" value="" required>
                                        <option value="<?php echo $values['CLASS_ID']; ?>" selected><?php echo $values['CLASSES']; ?></option>
                                            <option value="" ><?php echo $this->lang->line("class"); ?></option>


                                        </select>


                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("section"); ?></label><small class="req"> *</small>
                                        <select type="text" data-toggle="dropdown" class="form-control dropdown-toggle" id="csec" name="section_id" onchange="test4()" value="" required>
                                        <option value="<?php echo $values['SECTION_ID']; ?>" selected><?php echo $values['SECTION_NAME']; ?></option>
                                            <option value=""><?php echo $this->lang->line("choose_section"); ?></option>

                                        </select>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>


                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("subjects_name"); ?></label><small class="req"> *</small>
                                                <select type="text" data-toggle="dropdown" class="form-control dropdown-toggle" id="scid" name="subjects_name" value="" required>
                                                    <!-- <option value=""><?php echo $this->lang->line("choose_subject"); ?></option> -->
                                                    <option value="<?php echo $values['SUBJECT_ID']; ?>" selected><?php echo $values['SUBJECT_NAME']; ?></option>
                                                    <!-- <?php
                                                            foreach ($allSub as $value) {
                                                            ?>
                                                                <option value="<?php echo $value->ID ?>"><?php echo $value->NAME; ?></option>

                                                        <?php
                                                            }
                                                        ?> -->
                                                </select>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <br>
                                            <!-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 " >

                                                <label class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" name="radio-inline" checked="" value="theory" class="custom-control-input"><span class="custom-control-label">Theory</span>
                                                </label>
                                                <label class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" name="radio-inline"  value="practical" class="custom-control-input"><span class="custom-control-label">Practical</span>
                                                </label>



                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div> -->
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("session"); ?></label><small class="req"> *</small>
                                                <select type="text" data-toggle="dropdown" class="form-control dropdown-toggle" id="validationCustom01" name="session_id" value="" required>

                                                    <!-- <option value=""><?php echo $this->lang->line("choose_session"); ?></option> -->
                                                    <option value="<?php echo $values['SESSIONID']; ?>" selected><?php echo $values['SESSIONS']; ?></option>
                                                    <?php
                                                    foreach ($allSession as $value) {
                                                    ?>
                                                        <option value="<?php echo $value->ID ?>"><?php echo $value->SESSIONS; ?></option>

                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>

                                            <br>
                                            <!-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("cover_img"); ?>*</label>
                                                <input type="file" class="form-control" id="validationCustom01" placeholder=" name" name="pic" value="" >
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div> -->
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
                <!-- edit from end -->
                <!-- ============================================================== -->
                <!-- validation form -->
                <!-- ============================================================== -->

                <!-- =======================Edit Part =============================== -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header"><?php echo $this->lang->line("teacher_assign"); ?></h5>

                        <div class="card-body">
                            <h2 style="color:green"> <?php
                                                        $dt = $this->session->userdata("msg");
                                                        if ($dt != NULL) {
                                                            echo $dt;
                                                            $this->session->unset_userdata("msg");
                                                        }
                                                        ?></h2>
                            <form enctype="multipart/form-data" class="needs-validation" novalidate action="<?php echo base_url() ?>admin/academics/teacher_assign/insert" method="post">
                                <div class="row">

                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("teacher_name"); ?></label>
                                        <select class="form-control" name="teacher_name" id="validationCustom01" required="">
                                            <option value=""><?php echo $this->lang->line("teacher_name"); ?></option>

                                            <?php
                                            if (isset($allTchr)) {
                                                foreach ($allTchr as $value) {
                                                    if ($value->ROLES_ID == 3) {
                                            ?>

                                                        <option value="<?php echo $value->ID; ?>"><?php echo $value->FIRST_NAME ?></option>

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

                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("version"); ?></label>

                                        <select class="form-control" id="version_id" name="version" onchange="test2()" required="">
                                            <option value="" selected>Select</option>
                                            <?php
                                            if (isset($allPdt5)) {
                                                foreach ($allPdt5 as $value) {

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


                                    <br>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("class"); ?></label>


                                        <select type="text" data-toggle="dropdown" class="form-control dropdown-toggle" id="cid" name="classesid" onchange="test3()" value="" required>
                                            <option value="" selected><?php echo $this->lang->line("class"); ?></option>


                                        </select>


                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("section"); ?></label><small class="req"> *</small>
                                        <select type="text" data-toggle="dropdown" class="form-control dropdown-toggle" id="csec" name="section_id"  value="" required>
                                            <option value="" selected><?php echo $this->lang->line("choose_section"); ?></option>

                                        </select>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>


                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("subjects_name"); ?></label><small class="req"> *</small>
                                        <select type="text" data-toggle="dropdown" class="form-control dropdown-toggle" id="scid" name="subjects_name" value="" required>
                                            <option value=""><?php echo $this->lang->line("choose_subject"); ?></option>
                                            <!-- <?php
                                                    foreach ($allSub as $value) {
                                                    ?>
                                                        <option value="<?php echo $value->ID ?>"><?php echo $value->NAME; ?></option>

                                                <?php
                                                    }
                                                ?> -->
                                        </select>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <br>
                                    <!-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 " >

                                        <label class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" name="radio-inline" checked="" value="theory" class="custom-control-input"><span class="custom-control-label">Theory</span>
                                        </label>
                                        <label class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" name="radio-inline"  value="practical" class="custom-control-input"><span class="custom-control-label">Practical</span>
                                        </label>



                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div> -->
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("session"); ?></label><small class="req"> *</small>
                                        <select type="text" data-toggle="dropdown" class="form-control dropdown-toggle" id="validationCustom01" name="session_id" value="" required>

                                            <option value=""><?php echo $this->lang->line("choose_session"); ?></option>
                                            <?php
                                            foreach ($allSession as $value) {
                                            ?>
                                                <option value="<?php echo $value->ID ?>"><?php echo $value->SESSIONS; ?></option>

                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>

                                    <br>
                                    <!-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("cover_img"); ?>*</label>
                                        <input type="file" class="form-control" id="validationCustom01" placeholder=" name" name="pic" value="" >
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div> -->
                                </div>
                                <br>
                                <div class="form-row">




                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->

            <?php } ?>

            <!-- end validation form -->

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Basic Table</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered first c" id="myTable">
                                <thead>
                                    <tr>
                                        <th>#<?php echo $this->lang->line("staff_f_name"); ?></th>
                                        <th><?php echo $this->lang->line("class"); ?></th>
                                        <th><?php echo $this->lang->line("version"); ?></th>
                                        <th><?php echo $this->lang->line("section"); ?></th>
                                        <th><?php echo $this->lang->line("session"); ?></th>
                                        <th><?php echo $this->lang->line("subject"); ?></th>

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
                                                <td><?php echo $value["FIRST_NAME"] ?></td>
                                                <td><?php echo $value["CLASSES"]  ?></td>
                                                <td><?php echo $value["VERSION"]  ?></td>
                                                <td><?php echo $value["SECTION_NAME"] ?></td>
                                                <td><?php echo $value["SESSIONS"] ?></td>
                                                <td><?php echo $value["SUBJECT_NAME"] ?></td>

                                                <td><a href="<?php echo base_url() ?>Admin/academics/teacher_assign/edit_teacher_assign/edit/<?php echo $value["ID"] ?>"><?php echo $this->lang->line("edit"); ?></a></td>

                                                <td><a href="<?php echo base_url() ?>Admin/academics/teacher_assign/delete_teacher_assign/delete/<?php echo $value["ID"] ?>"><?php echo $this->lang->line("delete"); ?></a></td>



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

<!-- ============================================================== -->
<!-- end main wrapper -->
<!-- ============================================================== -->
<!-- Optional JavaScript -->


<script>
    function test3() {

        var c = document.getElementById("cid").value;
        //alert(c);
        var sc = "";
        if (c == 0) {
            sc += "<option value='0'>Choose Class First</option>";
        }

        <?php
        foreach ($allCls as $cat) {
            echo "else if (c==$cat->ID){";
            foreach ($allSub as $scat) {
                if ($scat->CLASSESID == $cat->ID) {
                    echo "sc += '<option value=\"{$scat->ID}\">$scat->NAME</option>';";
                }
            }
            echo "}";
        }
        ?>
        // alert(sc);

        $("#scid").html(sc);

        test4()
    }
</script>

<script>

function test4() {
    

var c = document.getElementById("cid").value;
//alert(c);
var sc = "";
if (c == 0) {
    sc += "<option value='0'>Choose Class First</option>";
}

<?php
            foreach ($allCls as $cat) {
                echo "else if (c==$cat->ID){";
                foreach ($allSec as $scat) {
                    if ($scat->CLASS_ID == $cat->ID) {

                        echo "sc += '<option value=\"{$scat->SECTION_ID}\">$scat->NAME</option>';";
                    }
                }
                echo "}";
            }
            ?>
// alert(sc);

$("#csec").html(sc);


}

</script>



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
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
<script type="text/javascript">
    $(document).bind("contextmenu", function(e) {
        e.preventDefault();
    });
</script>


<script>
    function test2() {





        var c = document.getElementById("version_id").value;
        //alert(c);
        var sc = "";
        if (c == 0) {
            sc += "<option value='0'>Choose Version First</option>";
        }

        <?php



        foreach ($allPdt5 as $vr) {


            echo "else if (c==$vr->ID){";


            foreach ($allCls as $cls) {



                if ($vr->ID == $cls->VERSIONSID) {

                    echo "sc += '<option  value=\"{$cls->ID}\">$cls->CLASSES</option>';";
                }
            }

            echo "}";
        }

        ?>
        // alert(sc);



        $("#cid").html(sc);
        test3()

    }
</script>