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

        <!-- ============================================================== -->

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <h2><?php echo $this->lang->line("general_settings"); ?></h2>
        </div>


        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">


                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("dashboard"); ?></a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("settings"); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line("general_settings"); ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- end pageheader -->

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
                                        if (isset($allPdt)) {
                                            foreach ($allPdt as $value) { ?>

                                                          

                        <form form enctype="multipart/form-data" class="needs-validation" novalidate action="<?php echo base_url() ?>admin/settings/general_settings/save" method="post">

                            <div class="row">



                                <div class="col-xl-6 col-lg-6  col-md-6 col-sm-6 col-6 ">

                                    <label for="validationCustom01"><?php echo $this->lang->line("school_name"); ?></label>
                                    <input type="text" class="form-control" value="<?php echo $value->SCHOOL_NAME?>" name="school_name" id="school_name" required>



                                </div>

                                <div class="col-xl-6 col-lg-6  col-md-6 col-sm-6 col-6 ">

                                    <label for="validationCustom01"><?php echo $this->lang->line("school_code"); ?></label>
                                    <input type="text" class="form-control" value="<?php echo $value->SCHOOL_CODE?>" name="school_code" id="school_code" required>
                                   
                                </div>

                            </div>

                            <br>

                            <div class="row">

                                <div class="col-xl-6 col-lg-6  col-md-6 col-sm-6 col-6 ">

                                    <label for="validationCustom01"><?php echo $this->lang->line("school_logo"); ?></label>

                                    <?php
                                    if( $value->SCHOOL_LOGO){ ?>

                                        <div class="row">
                                            <div class="col-xl-8 col-lg-8  col-md-8 col-sm-8 col-8">
                                            <input class="form-control" type="file" name="pic[]" multiple="multiple" id="file" size="20" autocomplete="off">
                                            </div>
                                            <div class="col-xl-4 col-lg-4  col-md-4 col-sm-4 col-4">
                                            <img class="profile-user-img img-responsive img-circle img-show" src="<?php echo base_url(); ?>uploads/school_info/logo/<?php echo $value->SCHOOL_LOGO?> " alt="User profile picture">
                                            </div>
                                        </div>

                                       
                                        
                                        <?php
                                        
                                    }else{ ?>
                                        <input class="form-control" type="file" name="pic[]" multiple="multiple" id="file" size="20" autocomplete="off"> <?php
                                    }
                                    ?>

                                    

                                </div>

                                <div class="col-xl-6 col-lg-6  col-md-6 col-sm-6 col-6">
                                    <label for="validationCustom01"><?php echo $this->lang->line("school_phone"); ?></label>
                                    <input type="text" class="form-control" value="<?php echo $value->SCHOOL_PHONE?>"  name="school_phone" id="school_phone" required>

                                </div>


                            </div>
                            <br>

                            <div class="row">

                                <div class="col-xl-6 col-lg-6  col-md-6 col-sm-6 col-6">
                                    <label for="validationCustom01"><?php echo $this->lang->line("school_email"); ?></label>

                                    <input type="email" class="form-control" value="<?php echo $value->SCHOOL_EMAIL?>" id="validationCustom01" name="school_email" value="">


                                </div>


                                <div class="col-xl-6 col-lg-6  col-md-6 col-sm-6 col-6">
                                <label for="validationCustom01"><?php echo $this->lang->line("school_address"); ?></label>



                                        <input type="text" id="validationCustom01" value="<?php echo $value->SCHOOL_ADDRESS?>"  name="school_address" class="form-control"></>

                                   

                                </div>


                            </div>
                      

                            <div class="row pull-right">
                                <div class="col-xl-4 col-lg-4  col-md-4 col-sm-4 col-4 ">
                                    <button class="btn btn-primary my_btn_style" type="submit">save</button>
                                </div>

                            </div>







                        </form>
                         <?php
                                            }
                                        }

                        ?>   

                    </div>
                </div>
            </div>






            <!-- -->
        </div>


        <!-- Down Panel start-->

        <div class="row">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

            </div>

            <!-- ============================================================== -->
            <!-- validation form -->
            <!-- ============================================================== -->
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


    
    </script>