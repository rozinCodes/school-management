<style>
    .bangla_img{
        overflow: hidden;
    }
    .left_img img{
        float: left;
        margin-right: 20px;
    } 


    .bangla_img h3{
        margin: 200px 0px;
    }

</style>
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
                    <h2 class="pageheader-title"><?php echo $this->lang->line("classes"); ?> </h2>

                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("dashboard"); ?></a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("classes"); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line("classes"); ?></li>
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
                <div class="card">
                    <h5 class="card-header"><?php echo $this->lang->line("classes"); ?></h5>

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
                            if (isset($allCdt)) {
                                foreach ($allCdt as $value) {
                                
                                      $code=$this->input->get("code");
                                      if($code==$value->CLASSESID){

                                    ?>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 book_list" >
                                        <div class="bangla_img" >
                                            <div class="left_img">
                                                <a href="<?php echo base_url() . "academics_version/class_book/{$value->ID}" ?>">
                                                 <?php
                                                    if (file_exists("upload/images/book_cover/{$value->PICTURE}")) {
                                                        echo "<img  src='" . base_url() . "upload/images/book_cover/{$value->PICTURE}" . "' height='300px' width='260px'/>";
                                                    } else {
                                                        echo "<img  src='" . base_url() . "assets/images/book.png" . "' width='260px'/>";
                                                    }
                                                    ?> 
                                                    
                                                    <br> 
                                                    <?php
                                                    if($value->ID==1){
                                                    ?>
                                                    <h4><img style="width: 23px;" src="<?php echo base_url() ?>assets/images//red-circle.gif" alt="Red Circle">LIVE NOW</h4>

<?php
                                                    }
?>

                                                    <h4 style="color: red;"><a href="<?php echo base_url()."academics_version/english_version/flip_book?code={$value->ID}" ?>"><span><i class="fa fa-book fa-2x"></i></span><span style="margin-left:10px;">E Book</span></a></h4>
                                           <h4 style="color: red;"><a href="<?php echo base_url()."academics_version/english_version/pdf_book?code={$value->ID}" ?>"><span><i class="fa fa-book fa-2x "></i></span><span style="margin-left:10px;">PDF</span></a></h4>
                                                    <h4 style="color: red;"><a href="<?php echo base_url()."academics_version/english_version/video_part?code={$value->ID}" ?>"><span><i class="fa fa-book fa-2x "></i></span><span style="margin-left:10px;">VIDEO</span></a></h4>
                                                     <h4 style="color: red;"><a href=""><span><i class="fa fa-book fa-2x "></i></span><span style="margin-left:10px;">POWER POINT</span></a></h4>
                                                  
                                            </div>

                                            </a>
                                        </div>
                                        <br>
                                        <h3><?php echo $value->NAME; ?></h3>
                                        <br>   <br>   
                                    </div>

                                    <?php
                                }
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
