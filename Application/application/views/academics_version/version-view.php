
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
                    <h2 class="pageheader-title"><?php echo $this->lang->line("version"); ?> </h2>

                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("dashboard"); ?></a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("version"); ?></a></li>

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
                <div class="card" >
                    <h5 class="card-header"><?php echo $this->lang->line("version"); ?></h5>

                    <div class="card-body">
                        <h2 style="color:green"> <?php
                            $dt = $this->session->userdata("msg");
                            if ($dt != NULL) {
                                echo $dt;
                                $this->session->unset_userdata("msg");
                            }
                            ?></h2>

                        <div class="row">

                            <?php
                              if (isset($allVdt)) {
                             foreach ($allVdt as $value) {
                            ?>   
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 ">
                                <div class="bangla_imag" style="text-align: center">
                                    <a href="<?php echo base_url()."academics_version/versions/classes?v={$value->ID}&&bb={$value->VERSION}" ?>">
                                        <img src="<?php echo base_url(); ?>assets/images/book.png" width="140px"  >
                                        <h3 ><?php echo $value->VERSION ?></h3>
                                    </a>
                                </div>


                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 " style="display: none;">
                                <div class="bangla_imag" style="text-align: center">
                                    <a href="<?php echo base_url() ?>academics_version/english_version">
                                        <img src="<?php echo base_url(); ?>assets/images/book.png" width="140px"  >
                                        <h3 >English Version</h3>
                                    </a>
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
        </div>
        <!-- ============================================================== -->

        <!-- end validation form -->
        <div class="row">
            <div class="col-md-12"><a href="https://waltonbd.com/" target="_blank">
                    <img src="<?php echo base_url(); ?>assets/images/computer-home-block-d.jpg" alt="Banner Image" class="img-fluid" height="750" width="1920">
                </a></div>
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
