<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->



        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <h2><?php echo $this->lang->line("class_routine"); ?></h2>
        </div>


        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title"><?php echo $this->lang->line("sections"); ?> </h2>

                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("dashboard"); ?></a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("class_routine"); ?></a></li>
                                
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

           



            <!-- details -->

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">

                    <div class="card-body">
                        <div class="row ">
                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 ">


                                <table class="table sat">
                                    <thead>
                                        <tr>

                                            <th><?php echo $this->lang->line("sat"); ?></th>



                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        if (isset($allPdt2)) {
                                            foreach ($allPdt2 as $value) {


                                        ?>
                                                <tr>
                                                    <?php

                                                    if ($value->DAY == "sat") {  ?>


                                                        <td>Class : <?php echo $value->FIRST_NAME ?> <br> Subjects : <?php echo $value->SUBJECTS ?> <br> Time : <?php echo $value->START_TIME ?> -- <?php echo $value->END_TIME ?> <br> Room No: <?php echo $value->ROOM_NUMBER ?> </td> <?php



                                                                                                                                                                                                                                                                                                                    } ?>




                                                </tr>
                                        <?php
                                            }
                                        }

                                        ?>

                                    </tbody>

                                </table>



                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">

                                <table class="table">
                                    <thead>
                                        <tr>

                                            <th><?php echo $this->lang->line("sun"); ?></th>



                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        if (isset($allPdt2)) {
                                            foreach ($allPdt2 as $value) {


                                        ?>
                                                <tr>
                                                    <?php

                                                    if ($value->DAY == "sun") {  ?>


                                                       <td>Class : <?php echo $value->FIRST_NAME ?> <br> Subjects : <?php echo $value->SUBJECTS ?> <br> Time : <?php echo $value->START_TIME ?> -- <?php echo $value->END_TIME ?> <br> Room No: <?php echo $value->ROOM_NUMBER ?> </td> <?php



                                                                                                                                                                                                                                                                                                                    } ?>




                                                </tr>
                                        <?php
                                            }
                                        }

                                        ?>

                                    </tbody>

                                </table>


                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">

                                <table class="table">
                                    <thead>
                                        <tr>

                                            <th><?php echo $this->lang->line("mon"); ?></th>



                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        if (isset($allPdt2)) {
                                            foreach ($allPdt2 as $value) {


                                        ?>
                                                <tr>
                                                    <?php

                                                    if ($value->DAY == "mon") {  ?>


                                                     <td>Class : <?php echo $value->FIRST_NAME ?> <br> Subjects : <?php echo $value->SUBJECTS ?> <br> Time : <?php echo $value->START_TIME ?> -- <?php echo $value->END_TIME ?> <br> Room No: <?php echo $value->ROOM_NUMBER ?> </td> <?php



                                                                                                                                                                                                                                                                                                                    } ?>




                                                </tr>
                                        <?php
                                            }
                                        }

                                        ?>

                                    </tbody>

                                </table>

                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
                                <table class="table">
                                    <thead>
                                        <tr>

                                            <th><?php echo $this->lang->line("tue"); ?></th>



                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        if (isset($allPdt2)) {
                                            foreach ($allPdt2 as $value) {


                                        ?>
                                                <tr>
                                                    <?php

                                                    if ($value->DAY == "tue") {  ?>


                                                   <td>Class : <?php echo $value->FIRST_NAME ?> <br> Subjects : <?php echo $value->SUBJECTS ?> <br> Time : <?php echo $value->START_TIME ?> -- <?php echo $value->END_TIME ?> <br> Room No: <?php echo $value->ROOM_NUMBER ?> </td> <?php



                                                                                                                                                                                                                                                                                                                    } ?>




                                                </tr>
                                        <?php
                                            }
                                        }

                                        ?>

                                    </tbody>

                                </table>

                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
                                <table class="table">
                                    <thead>
                                        <tr>

                                            <th><?php echo $this->lang->line("wed"); ?></th>



                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        if (isset($allPdt2)) {
                                            foreach ($allPdt2 as $value) {


                                        ?>
                                                <tr>
                                                    <?php

                                                    if ($value->DAY == "wed") {  ?>


                                                  <td>Class : <?php echo $value->FIRST_NAME ?> <br> Subjects : <?php echo $value->SUBJECTS ?> <br> Time : <?php echo $value->START_TIME ?> -- <?php echo $value->END_TIME ?> <br> Room No: <?php echo $value->ROOM_NUMBER ?> </td> <?php



                                                                                                                                                                                                                                                                                                                    } ?>




                                                </tr>
                                        <?php
                                            }
                                        }

                                        ?>

                                    </tbody>

                                </table>

                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
                                <table class="table">
                                    <thead>
                                        <tr>

                                            <th><?php echo $this->lang->line("thu"); ?></th>



                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        if (isset($allPdt2)) {
                                            foreach ($allPdt2 as $value) {


                                        ?>
                                                <tr>
                                                    <?php

                                                    if ($value->DAY == "thu") {  ?>


                                                       <td>Class : <?php echo $value->FIRST_NAME ?> <br> Subjects : <?php echo $value->SUBJECTS ?> <br> Time : <?php echo $value->START_TIME ?> -- <?php echo $value->END_TIME ?> <br> Room No: <?php echo $value->ROOM_NUMBER ?> </td> <?php



                                                                                                                                                                                                                                                                                                                    } ?>




                                                </tr>
                                        <?php
                                            }
                                        }

                                        ?>

                                    </tbody>

                                </table>

                            </div>
                            <!-- <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1">
                                <table class="table">
                                    <thead>
                                        <tr>

                                            <th><?php echo $this->lang->line("fri"); ?></th>



                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        if (isset($allPdt2)) {
                                            foreach ($allPdt2 as $value) {


                                        ?>
                                                <tr>
                                                    <?php

                                                    if ($value->DAY == "fri") {  ?>


                                                    <td>Class : <?php echo $value->FIRST_NAME ?> <br> Subjects : <?php echo $value->SUBJECTS ?> <br> Time : <?php echo $value->START_TIME ?> -- <?php echo $value->END_TIME ?> <br> Room No: <?php echo $value->ROOM_NUMBER ?> </td> <?php



                                                                                                                                                                                                                                                                                                                    } ?>




                                                </tr>
                                        <?php
                                            }
                                        }

                                        ?>

                                    </tbody>

                                </table>

                            </div> -->


                        </div>
                    </div>
                </div>
            </div>


            <!--end details -->



            <!-- ============================================================== -->
        </div>


    </div>

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