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
            <h2><?php echo $this->lang->line("teacher_shift_assign"); ?></h2>
        </div>


        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title"><?php echo $this->lang->line("sections"); ?> </h2>

                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("dashboard"); ?></a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("teacher_shift_assign"); ?></a></li>

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






<form class="needs-validation" novalidate action="<?php echo base_url() ?>admin/academics/teacher_shift_assign/edit_shift/edit/<?php
                                                                                                    echo $values->ID ?>" method="post">
                <div class="row">

                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                        <label for="validationCustom01"><?php echo $this->lang->line("staff_name"); ?></label>

                        <select class="form-control"  name="staff_name"  required="">
                            <option value="" selected><?php echo $values->FIRST_NAME?></option>
                            <?php
                            if (isset($allPdt)) {
                                foreach ($allPdt as $value) {

                            ?>

                                    <option value="<?php echo $value->ID ?>"><?php echo $value->FIRST_NAME ?></option>

                            <?php
                                }
                            }

                            ?>
                        </select>

                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>





                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                        <label for="validationCustom01"><?php echo $this->lang->line("staff_shift"); ?></label>

                        <select class="form-control" id="shift_name" name="shift_name"  required="">
                            <option value="" selected><?php echo $values->SHIFT_NAME?></option>
                            <?php
                            if (isset($allPdt2)) {
                                foreach ($allPdt2 as $value) {

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





                    <div class="col-xl-3 col-lg-3  col-md-3 col-sm-3 col-3 ">
                        <label for="validationCustom01"><?php echo $this->lang->line("session"); ?></label>
                        <select class="form-control" id="validationCustom01" name="session">
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


                   

               
                <div class="col-xl-3 col-lg-3  col-md-3 col-sm-3 col-3  ">
                    <!-- input style="margin-top: 29px;" type="submit" value="<?php echo $this->lang->line("search"); ?>"> -->
                    <button class="btn btn-primary my_btn_style" type="submit"><?php echo $this->lang->line("update"); ?></button>
                </div>



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
            <form class="needs-validation" novalidate action="<?php echo base_url() ?>admin/academics/teacher_shift_assign/insert" method="post">
                <div class="row">

                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                        <label for="validationCustom01"><?php echo $this->lang->line("staff_name"); ?></label>

                        <select class="form-control"  name="staff_name"  required="">
                            <option value="" selected>Select</option>
                            <?php
                            if (isset($allPdt)) {
                                foreach ($allPdt as $value) {

                            ?>

                                    <option value="<?php echo $value->ID ?>"><?php echo $value->FIRST_NAME ?></option>

                            <?php
                                }
                            }

                            ?>
                        </select>

                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>





                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                        <label for="validationCustom01"><?php echo $this->lang->line("staff_shift"); ?></label>

                        <select class="form-control" id="shift_name" name="shift_name"  required="">
                            <option value="" selected>Select</option>
                            <?php
                            if (isset($allPdt2)) {
                                foreach ($allPdt2 as $value) {

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





                    <div class="col-xl-3 col-lg-3  col-md-3 col-sm-3 col-3 ">
                        <label for="validationCustom01"><?php echo $this->lang->line("session"); ?></label>
                        <select class="form-control" id="validationCustom01" name="session">
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


                   

               
                <div class="col-xl-3 col-lg-3  col-md-3 col-sm-3 col-3  ">
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

                            <th><?php echo $this->lang->line("staff_name"); ?></th>
                            <th><?php echo $this->lang->line("staff_SHIFT"); ?></th>
                            <th><?php echo $this->lang->line("session"); ?></th>
                           
                            
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
                                    <td><?php echo $value->SHIFT_NAME ?></td>
                                    <td><?php echo $value->SESSIONS ?></td>
                                   


                                    <td><a href="<?php echo base_url() ?>admin/academics/teacher_shift_assign/edit_shift/edit/<?php
                                                                                                    echo $value->ID ?>"><i class="far fa-edit"></i></a></td>
                                    <!-- <td> <a href="<?php //echo base_url()."task/category_delete/{$value->ID}"
                                                        ?>"><?php //echo $this->lang->line("delete"); 
                                                                                                                        ?></a></td> -->

                                    <td><a href="<?php echo base_url() ?>admin/academics/teacher_shift_assign/delete_shift/delete/<?php
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
