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
            <h2><?php echo $this->lang->line("student_shift_assign"); ?></h2>
        </div>


        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title"><?php echo $this->lang->line("sections"); ?> </h2>

                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("dashboard"); ?></a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("student_shift_assign"); ?></a></li>

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
            if (isset($edit)) {
                // if(!$_GET['edit']){
                foreach ($allinfo as $values) {
                    if ($edit == $values->ID) {
            ?>
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






                                    <form class="needs-validation" novalidate action="<?php echo base_url() ?>admin/academics/student_shift_assign/edit_shift/edit/<?php echo $values->ID ?>" method="post">
                                        <div class="row">

                                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
                                                <label for="validationCustom01"><?php echo $this->lang->line("version"); ?></label>

                                                <select class="form-control" id="version_id" name="version" onchange="test2()" required="">
                                                <option value="" selected><?php echo $values->VERSION?></option>
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





                                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("class"); ?></label>

                                                <select class="form-control" name="class" id="class_id" required="">
                                                   
                                                    <option value="" selected><?php echo $values->CLASSES?></option>


                                                </select>


                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>



                                            <div class="col-xl-2 col-lg-2  col-md-2 col-sm-2 col-2 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("section"); ?></label>
                                                <select class="form-control" id="validationCustom01" name="section"  required="">
                                                <option value="" selected><?php echo $values->SECTIONS?></option>
                                                    <?php
                                                    if (isset($allPdt6)) {
                                                        foreach ($allPdt6 as $value) {

                                                    ?>

                                                            <option value="<?php echo $value->ID ?>"><?php echo $value->NAME ?></option>

                                                    <?php
                                                        }
                                                    }

                                                    ?>
                                                </select>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>


                                            <div class="col-xl-2 col-lg-2  col-md-2 col-sm-2 col-2 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("staff_shift"); ?></label>
                                                <select class="form-control" id="validationCustom01" name="staff_shift"  required="">
                                                <option value="" selected><?php echo $values->SHIFT_NAME?></option>
                                                    <?php
                                                    if (isset($allPdt4)) {
                                                        foreach ($allPdt4 as $value) {

                                                    ?>

                                                            <option value="<?php echo $value->ID ?>"><?php echo $value->SHIFT_NAME ?></option>

                                                    <?php
                                                        }
                                                    }

                                                    ?>
                                                </select>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>

                                            <div class="col-xl-2 col-lg-2  col-md-2 col-sm-2 col-2 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("session"); ?></label>
                                                <select class="form-control" id="validationCustom01" name="session"  required="">
                                                <option value="" selected><?php echo $values->SESSIONS?></option>
                                                    <?php
                                                    if (isset($allPdt3)) {
                                                        foreach ($allPdt3 as $value) {

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
                                            <div class="col-xl-2 col-lg-2  col-md-2 col-sm-2 col-2  ">
                                                <!-- input style="margin-top: 29px;" type="submit" value="<?php echo $this->lang->line("search"); ?>"> -->
                                                <button class="btn btn-primary my_btn_style" type="submit"><?php echo $this->lang->line("update"); ?></button>
                                            </div>



                                        </div>


                                        <br><br> <br>


                                    </form>
                                </div>
                            </div>
                        </div>



                        <!-- // -->


                        <!-- <input type="hidden" class="form-control" id="validationCustom01" placeholder="name" name="id" value="<?php //echo $value->id; 
                                                                                                                                    ?>" required>
                                  
                                    <input type="text" class="form-control" id="validationCustom01" placeholder="name" name="name" value="<?php //echo $value->name; 
                                                                                                                                            ?>" required> -->
                        <div class="valid-feedback">
                            Looks good!
                        </div>
        </div>


    </div>
    <br>
    <div class="form-row">




        <!-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                    <button class="btn btn-primary" type="submit"><?php //echo $this->lang->line("update"); 
                                                                                    ?></button>
                                </div> -->
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
            <form class="needs-validation" novalidate action="<?php echo base_url() ?>admin/academics/student_shift_assign/insert" method="post">
                <div class="row">

                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
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





                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 ">
                        <label for="validationCustom01"><?php echo $this->lang->line("class"); ?></label>

                        <select class="form-control" name="class" id="class_id" required="">
                            <option value="" selected><?php echo $this->lang->line("class"); ?></option>


                        </select>


                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>



                    <div class="col-xl-2 col-lg-2  col-md-2 col-sm-2 col-2 ">
                        <label for="validationCustom01"><?php echo $this->lang->line("section"); ?></label>
                        <select class="form-control" id="validationCustom01" name="section" required="">
                            <option value="" selected><?php echo $this->lang->line("section"); ?></option>
                            <?php
                            if (isset($allPdt6)) {
                                foreach ($allPdt6 as $value) {

                            ?>

                                    <option value="<?php echo $value->ID ?>"><?php echo $value->NAME ?></option>

                            <?php
                                }
                            }

                            ?>
                        </select>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>


                    <div class="col-xl-2 col-lg-2  col-md-2 col-sm-2 col-2 ">
                        <label for="validationCustom01"><?php echo $this->lang->line("staff_shift"); ?></label>
                        <select class="form-control" id="validationCustom01" name="staff_shift" required="">
                            <option value="" selected><?php echo $this->lang->line("staff_shift"); ?></option>
                            <?php
                            if (isset($allPdt4)) {
                                foreach ($allPdt4 as $value) {

                            ?>

                                    <option value="<?php echo $value->ID ?>"><?php echo $value->SHIFT_NAME ?></option>

                            <?php
                                }
                            }

                            ?>
                        </select>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>

                    <div class="col-xl-2 col-lg-2  col-md-2 col-sm-2 col-2 ">
                        <label for="validationCustom01"><?php echo $this->lang->line("session"); ?></label>
                        <select class="form-control" id="validationCustom01" name="session" required="">
                            <option value="" selected><?php echo $this->lang->line("session"); ?></option>
                            <?php
                            if (isset($allPdt3)) {
                                foreach ($allPdt3 as $value) {

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
                    <div class="col-xl-2 col-lg-2  col-md-2 col-sm-2 col-2  ">
                        <!-- input style="margin-top: 29px;" type="submit" value="<?php echo $this->lang->line("search"); ?>"> -->
                        <button class="btn btn-primary my_btn_style" type="submit"><?php echo $this->lang->line("submit"); ?></button>
                    </div>



                </div>


        </div>


        <br><br> <br>


        </form>
    </div>
</div>
</div>


<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header"><?php echo $this->lang->line("fees_amount"); ?></h5>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered first">
                    <thead>
                        <tr>

                            <th><?php echo $this->lang->line("class"); ?></th>
                            <th><?php echo $this->lang->line("section"); ?></th>
                            <th><?php echo $this->lang->line("session"); ?></th>
                            <th><?php echo $this->lang->line("shift_name"); ?></th>


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

                                    <td><?php echo $value->CLASSES ?></td>
                                    <td><?php echo $value->SECTIONS ?></td>
                                    <td><?php echo $value->SESSIONS ?></td>

                                    <td><?php echo $value->SHIFT_NAME ?></td>


                                    <td><a href="<?php echo base_url() ?>admin/academics/student_shift_assign/edit_shift/edit/<?php
                                                                                                                                echo $value->ID ?>"><i class="far fa-edit"></i></a></td>
                                    <!-- <td> <a href="<?php //echo base_url()."task/category_delete/{$value->ID}"
                                                        ?>"><?php //echo $this->lang->line("delete"); 
                                                            ?></a></td> -->

                                    <td><a href="<?php echo base_url() ?>admin/academics/student_shift_assign/delete_shift/delete/<?php
                                                                                                                                    echo $value->ID ?>"><i class="fas fa-trash-alt"></i></a></td>

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





        var c = document.getElementById("version_id").value;
        alert(c);
        var sc = "";
        if (c == 0) {
            sc += "<option value='0'>Choose Teacher First</option>";
        }

        <?php



        foreach ($allPdt5 as $vr) {


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


    }
</script>