
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
         
                <!-- =======================Edit Part =============================== -->
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
                            <form class="needs-validation" novalidate action="<?php echo base_url() ?>admin/classes/insert" method="post">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("class"); ?></label><small class="req"> *</small>
                                        <input type="text" class="form-control" id="validationCustom01" placeholder=" name" name="name" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <label for="validationCustom01"><?php echo $this->lang->line("version"); ?></label>

                                        <select class="form-control" id="validationCustom01" name="version" required="">
                                            <option value="" selected>select</option>

                                        <?php 
                                        if(isset($allPdt2)){
                                            foreach ($allPdt2 as $value){

                                                ?>

                                                <option value="<?php echo $value->ID?>"><?php echo $value->VERSION?></option>

                                                <?php
                                            }
                                        }

                                        ?>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('section'); ?></label><small class="req"> *</small>


                                        <?php
                                        foreach ($allPdt as $vehicle) {
                                            ?>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="sections[]" value="<?php echo $vehicle->ID ?>" <?php echo set_checkbox('sections[]', $vehicle->ID); ?> > <?php echo $vehicle->NAME ?>
                                                </label>
                                            </div>
                                            <?php
                                        }
                                        ?>

                                        <span class="text-danger"><?php echo form_error('sections[]'); ?></span>
                                    </div>

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
           
            <!-- end validation form -->

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Basic Table</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered first">
                                <thead>
                                    <tr>
                                        <th>#<?php echo $this->lang->line("id"); ?></th>
                                            <th><?php echo $this->lang->line("class"); ?></th> 
                                        <th><?php echo $this->lang->line("section"); ?></th>
                                        <th><?php echo $this->lang->line("date"); ?></th>
                                        <!-- <th><?php echo $this->lang->line("edit"); ?></th> -->
                                        <th><?php echo $this->lang->line("delete"); ?></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($allSdt)) {
                                        foreach ($allSdt as $value) {
                                            
                                            ?>
                                            <tr>
                                                <td><?php echo $value->ID ?></td>
                                                  <td><?php echo $value->CLASSES ?></td>
                                                <td><?php echo $value->NAME ?></td>
                                                <td><?php echo $value->CREATED_AT ?></td>
                                                <!-- <td><a href="<?php echo base_url() . "admin/classes?edit={$value->ID}" ?>"><?php echo $this->lang->line("edit"); ?></a></td> -->
                                                <td> <a href="<?php echo base_url() . "admin/classes/delete/{$value->SID}" ?>"><?php echo $this->lang->line("delete"); ?></a></td>

                                            </tr>
        <?php
    }
}
?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#<?php echo $this->lang->line("id"); ?></th>
                                        <th><?php echo $this->lang->line("class"); ?></th> 
                                        <th><?php echo $this->lang->line("section"); ?></th>
                                        <th><?php echo $this->lang->line("date"); ?></th>
                                        <!-- <th><?php echo $this->lang->line("edit"); ?></th> -->
                                        <th><?php echo $this->lang->line("delete"); ?></th>
                                    </tr>
                                </tfoot>
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
