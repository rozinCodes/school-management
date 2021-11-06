
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
                    <h2 class="pageheader-title"><?php echo $this->lang->line("edit_assets"); ?> </h2>
                    <p class="pageheader-text">Login Groups</p>
                  
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
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("assets"); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line("edit_assets"); ?></li>
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

        <?php  
           if (isset($edit)){

            
           // if(!$_GET['edit']){
                 
            ?>
            <!-- ============================================================== -->
            <!-- validation form -->
            <!-- ============================================================== -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header"><?php echo $this->lang->line("edit_assets"); ?></h5>


                    <div class="card-body">
                        <h2 style="color:green"> <?php
                        $dt = $this->session->userdata("msg");
                        if ($dt != NULL) {
                            echo $dt;
                            $this->session->unset_userdata("msg");
                        }
                        ?></h2>
                        <form enctype="multipart/form-data" class="needs-validation" novalidate action="<?php echo base_url() ?>admin/assets/assets/edit_assets/edit/<?php echo $edit?>" method="post">
                            <div class="row">
                                


                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 ">


                                <label for="validationCustom01"><?php echo $this->lang->line("assets_name"); ?></label>
                                <input type="text" class="form-control" id="validationCustom01" placeholder=" " name="assets_name" value="<?php echo $allPdt2->NAME?>" required>
                                <input type="hidden" class="form-control" id="validationCustom01" placeholder=" " name="assets_category" value="<?php echo $allPdt2->CAT_ID?>" required>

                                

                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                              </div>

           

                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 ">


                                <label for="validationCustom01"><?php echo $this->lang->line("invoice_no"); ?></label>
                                <input type="text" class="form-control" id="validationCustom01" placeholder=" " name="invoice_no" value="<?php echo $allPdt2->INVOICE_NO?>" >

                                

                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 ">
                                <label for="validationCustom01"><?php echo $this->lang->line("amount"); ?></label>

                                <input type="text" class="form-control" id="validationCustom01" placeholder=" " name="amount" value="<?php echo $allPdt2->AMOUNT?>" required>


                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>


                        </div>

                        <br>

                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 ">
                                <label for="validationCustom01"><?php echo $this->lang->line("assets_purchase_date"); ?></label>
                                
                                <input type="text"  class="form-control" id="datepicker-13" name="assets_purchase_date" value="<?php echo $allPdt2->ISSUE_DATE?>" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>

                         

                             <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 ">
                                <label for="validationCustom01"><?php echo $this->lang->line("assets_document"); ?></label>

                                <input class="form-control" type="file" name="pic[]" multiple="multiple" id="file" size="20" autocomplete="off" value="<?php echo $allPdt2->ATTACHMENT?>">
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>


                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 ">
                              <label for="validationCustom01"><?php echo $this->lang->line("assets_description"); ?></label>

                              <textarea class="form-control" id="validationCustom01" placeholder="" name="expense_description" value="" ></textarea>
                              <div class="valid-feedback" >
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


</div>
<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- end footer -->
<!-- ============================================================== -->
</div>

<?php 
 }
 
        
 ?>

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

<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<script>
         $(function() {
            $( "#datepicker-13" ).datepicker();
            $( "#datepicker-13" ).datepicker("show");
         });
      </script>
