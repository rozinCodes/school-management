<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->



        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <h2><?php echo $this->lang->line("search_assets"); ?></h2>
        </div>


        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title"><?php echo $this->lang->line("sections"); ?> </h2>

                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("dashboard"); ?></a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("assets"); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line("search_assets"); ?></li>
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

                        <form class="needs-validation" novalidate action="<?php echo base_url() ?>admin/assets/assets/search_assets" method="post">

                            <div class="row">



                                <div class="col-xl-9 col-lg-9  col-md-9 col-sm-9 col-9 ">
                                    <div class="form-group">
                                        <label for="seeAnotherField">Search Asset</label>
                                        <select class="form-control" id="seeAnotherField" name="search_type">
                                        <option value=-2>Select</option>
                                        <option value=-1>All</option>
                                        <?php 
                                        if(isset($asset_cat)){
                                            foreach ($asset_cat as $value){

                                                ?>

                                                <option value="<?php echo $value->ID; ?>"><?php echo $value->CAT_NAME?></option>
                                             
                                                <?php
                                            }
                                        }

                                        ?>

                                        </select>
                                    </div>


                                </div>
                                <div class="col-xl-3 col-lg-3  col-md-3 col-sm-3 col-3 ">
                                    <button class="btn btn-primary my_btn_style" type="submit"><?php echo $this->lang->line("search"); ?></button>
                                </div>

                            </div>

                            
                            <p>Count :-<?php if(isset($allPdtCount)){echo $allPdtCount;} ?></p>


                    </div>

                    <br><br> <br>


                    </form>
                </div>
            </div>
        </div>



        <!-- details -->

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header"><?php echo $this->lang->line("expense_details"); ?></h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered first">
                            <thead>
                                <tr>

                                    <th><?php echo $this->lang->line("expense_name"); ?></th>
                                    <th><?php echo $this->lang->line("invoice_no"); ?></th>
                                    <th><?php echo $this->lang->line("amount"); ?></th>
                                    <th><?php echo $this->lang->line("assets_purchase_date"); ?></th>


                                    <th><?php echo $this->lang->line("edit"); ?></th>
                                    <th><?php echo $this->lang->line("delete"); ?></th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($allPdt)) {
                                    foreach ($allPdt as $value) {


                                ?>
                                        <tr>

                                            <td><?php echo $value->NAME ?></td>
                                            <td><?php echo $value->INVOICE_NO ?></td>
                                            <td style="color: green;"><b><?php echo $value->AMOUNT ?>/=TK </b></td>
                                            <td><?php echo $value->ISSUE_DATE ?></td>



                                            <td><a href="<?php echo base_url() ?>admin/assets/assets/edit_assets/edit/<?php
                                                                                                                            echo $value->ID ?>"><?php echo $this->lang->line("edit"); ?></a></td>
                                            <td><a href="<?php echo base_url() ?>admin/assets/assets/delete_assets/delete/<?php
                                                                                                                                echo $value->ID ?>"><?php echo $this->lang->line("delete"); ?></a></td>


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


<script>
    $("#seeAnotherField").change(function() {
        if ($(this).val() == "period") {
            $('#otherFieldDiv').show();
            $('#otherField').attr('required', '');
            $('#otherField').attr('data-error', 'This field is required.');
        } else {
            $('#otherFieldDiv').hide();
            $('#otherField').removeAttr('required');
            $('#otherField').removeAttr('data-error');
        }
    });
    $("#seeAnotherField").trigger("change");

    $("#seeAnotherFieldGroup").change(function() {
        if ($(this).val() == "period") {
            $('#otherFieldGroupDiv').show();
            $('#otherField1').attr('required', '');
            $('#otherField1').attr('data-error', 'This field is required.');
            $('#otherField2').attr('required', '');
            $('#otherField2').attr('data-error', 'This field is required.');
        } else {
            $('#otherFieldGroupDiv').hide();

        }
    });
    $("#seeAnotherFieldGroup").trigger("change");
</script>