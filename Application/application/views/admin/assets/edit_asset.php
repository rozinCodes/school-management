<!-- ============================================================== -->
<!-- end left sidebar -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- wrapper  -->
<!-- ============================================================== -->
<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->


        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title"><?php echo $this->lang->line("edit_asset"); ?> </h2>
                    <p class="pageheader-text">Login Groups</p>
                    <!-- <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Emon</a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Forms</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Groups</li>
                            </ol>
                        </nav>
                    </div> -->
                </div>
            </div>
        </div>
        <!-- pageheader -->

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title"><?php echo $this->lang->line("sections"); ?> </h2>

                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("dashboard"); ?></a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("hrms"); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line("edit_asset"); ?></li>
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

        <?php  
           if (isset($edit)){
            
            // if(!$_GET['edit']){
                  foreach ($allPdt5 as $value1){
                      if($edit==$value1->ID){


                     
            ?>

        <div class="row">
            <!-- ============================================================== -->
            <!-- validation form -->
            <!-- ============================================================== -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header"><?php echo $this->lang->line("add_asset"); ?></h5>

                    <h4 class="middle_bar_background">

                        <label for="validationCustom01"><?php echo $this->lang->line("asset_details"); ?></label>

                    </h4>

                    <div class="card-body">
                        <h2 style="color:green"> <?php
                                                    $dt = $this->session->userdata("msg");
                                                    if ($dt != NULL) {
                                                        echo $dt;
                                                        $this->session->unset_userdata("msg");
                                                    }
                                                    ?></h2>
                        <form class="needs-validation" novalidate action="<?php echo base_url() ?>admin/assets/asset/edit_asset/<?php echo $edit?>" method="post">
                            <div class="row">
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">

                                    <label for="validationCustom01"><?php echo $this->lang->line("asset_type"); ?></label>
                                    <select class="form-control" name="asset_type" id="validationCustom01">
                                        <option  ><?php echo $value1->ASSET_TYPE?></option>

                                        <?php
                                        if (isset($allPdt)) {
                                            foreach ($allPdt as $value) {

                                        ?>

                                                <option value="<?php echo $value->ID;
                                                                echo $value->NAME ?>"><?php echo $value->NAME ?></option>

                                        <?php
                                            }
                                        }

                                        ?>
                                    </select>


                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>




                                </div>


                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">

                                    <label for="validationCustom01"><?php echo $this->lang->line("asset_name"); ?></label>
                                    <select class="form-control" name="asset_name" id="validationCustom01">
                                    <option ><?php echo $value1->ASSET_NAME?></option>

                                        <?php
                                        if (isset($allPdt4)) {
                                            foreach ($allPdt4 as $value) {

                                        ?>

                                                <option value="<?php echo $value->ID;
                                                                echo $value->NAME ?>"><?php echo $value->NAME ?></option>

                                        <?php
                                            }
                                        }

                                        ?>
                                    </select>


                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>




                                </div>



                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">


                                    <label for="validationCustom01"><?php echo $this->lang->line("asset_serial"); ?></label>
                                    <input type="text" class="form-control" id="validationCustom01" placeholder=" " name="asset_serial" value="<?php echo $value1->ASSET_SERIAL?>" required>



                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                    <label for="validationCustom01"><?php echo $this->lang->line("asset_price"); ?></label>

                                    <input type="text" class="form-control" id="validationCustom01" placeholder=" " name="asset_price" value="<?php echo $value1->ASSET_PRICE?>" required>


                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>


                            </div>

                            <br>

                            <div class="row">
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                    <label for="validationCustom01"><?php echo $this->lang->line("asset_purchase_date"); ?></label>
                                    <input type="date" class="form-control" id="validationCustom01" name="asset_purchase_date" value="<?php echo $value1->ASSET_PURCHASE_DATE?>">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                    <label for="validationCustom01"><?php echo $this->lang->line("asset_purchase_by"); ?></label>
                                    <input type="text" class="form-control" id="validationCustom01" placeholder="" name="asset_purchase_by" value="<?php echo $value1->ASSET_PURCHASE_BY?>" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>


                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                    <label for="validationCustom01"><?php echo $this->lang->line("asset_document"); ?></label>

                                    <input type="file" class="form-control" id="validationCustom01" placeholder="" name="asset_document" value="<?php echo $value1->ASSET_DOCUMENT?>" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>


                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                    <label for="validationCustom01"><?php echo $this->lang->line("asset_description"); ?></label>

                                    <textarea class="form-control" id="validationCustom01" placeholder="" name="asset_description" value="<?php echo $value1->ASSET_DESCRIPTION?>" required></textarea>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>





                            </div>

                            <br>


                            <br>

                            <div class="form-row">




                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end validation form -->
            <!-- ============================================================== -->
        </div>
        <?php
         }
        }
    }
        ?>


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

<!-- <script>
    

    function hide(){
var asset_type_id = document.getElementById('asset_type_id');
asset_type_id.style.visibility = 'hidden';
}
</script> -->