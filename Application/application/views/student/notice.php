<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">


        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <h2><?php echo $this->lang->line("notice"); ?></h2>
        </div>


        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">


                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("dashboard"); ?></a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("download_center"); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line("upload_content"); ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- end pageheader -->

        <div class="row">

        </div>


        <!-- Down Panel start-->

        <div class="row">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

            </div>

            <?php
            if (isset($_GET['edit'])) {
                // if(!$_GET['edit']){
                foreach ($allPdt as $value) {
                    if ($_GET['edit'] == $value->ID) {
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
                                    <form class="needs-validation" novalidate action="<?php echo base_url() ?>task/category_update" method="post">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
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




                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <button class="btn btn-primary" type="submit"><?php echo $this->lang->line("update"); ?></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                <?php
                    }
                }
            } else {
                ?>

            <?php
            }

            ?>


            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h5 class="card-header"><?php echo $this->lang->line("content_list"); ?></h5>
                    </div>




                    <div class="card-body dataTables_wrapper no-footer">
                        <div class="table-responsive">
                            <div class="section_print" id="section-to-print">
                                <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                    <thead>
                                        <tr>

                                            <th><?php echo $this->lang->line("notice_title"); ?></th>
                                            <th><?php echo $this->lang->line("notice_for"); ?></th>
                                            <th><?php echo $this->lang->line("upload_date"); ?></th>
                                            <th><?php echo $this->lang->line("action"); ?></th>





                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php

                                        if (isset($allPdt3)) {
                                            $i = 0;


                                            foreach ($allPdt3 as $value) {


                                        ?>

                                                <tr>

                                                    <td> <a style="background-color: yellow;" class="" data-toggle="tooltip" href="<?php echo base_url() . 'student/student_view/download/' . $value->ID; ?>" class="dwn"><?php echo $value->NOTICE_TITLE ?></a></td>
                                                    <td><?php echo $value->NOTICE_FOR ?></td>
                                                    <td><?php echo $value->UPLOAD_DATE ?> </td>


                                                    <td>

                                                        &emsp;<a class="" data-toggle="tooltip" title="download" href="<?php echo base_url() . 'student/student_view/download/' . $value->ID; ?>" class="dwn"><i class="fas fa-download"></i></a>



                                                    </td>





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

                        </div>
                        <br>

                    </div>



                </div>

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

    <script type="text/javascript">
        document.querySelector("#today2").valueAsDate = new Date();
    </script>