
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
                <h2><?php echo $this->lang->line("income_category"); ?></h2>
            </div>


        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title"><?php echo $this->lang->line("sections"); ?> </h2>
                   
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("dashboard"); ?></a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("income"); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line("income_category"); ?></li>
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
           if (isset($edit)){
            
           // if(!$_GET['edit']){
                 foreach ($allPdt as $value){
                     if($edit==$value->ID){
            ?>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">

                <div class="card">
                    
                    <h5 class="card-header"><?php echo $this->lang->line("sections")." ". $this->lang->line("edit"); ?></h5>

                    <div class="card-body">
                        <h2 style="color:green"> <?php
                            $dt = $this->session->userdata("msg");
                            if ($dt != NULL) {
                                echo $dt;
                                $this->session->unset_userdata("msg");
                            }
                            ?></h2>



                        <form class="needs-validation" novalidate action="<?php echo base_url() ?>Admin/income/income/edit_income_category/edit/<?php echo $value->ID?>" method="post">
                            <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-6 ">

                            <label for="validationCustom01"><?php echo $this->lang->line("income_category_name"); ?></label>

                            <input type="text" class="form-control" id="validationCustom01" placeholder=" " name="income_category_name" value="<?php echo $value->CAT_NAME?>" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>

                            <label for="validationCustom01"><?php echo $this->lang->line("income_description"); ?></label>

                            <textarea class="form-control" id="validationCustom01" placeholder="<?php echo $value->DESCRIPTION?>" name="income_description" value="" ></textarea>
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
                 
           }
            else{
            ?>
              <!-- =======================Edit Part =============================== -->
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
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
                        <form class="needs-validation" novalidate action="<?php echo base_url() ?>admin/income/income/add_income_category" method="post">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-6 ">

                                    <label for="validationCustom01"><?php echo $this->lang->line("income_category_name"); ?></label>

                                    <input type="text" class="form-control" id="validationCustom01" placeholder=" " name="income_category_name" value="" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>

                                    <label for="validationCustom01"><?php echo $this->lang->line("income_description"); ?></label>

                                    <textarea class="form-control" id="validationCustom01" placeholder=" " name="income_description" value="" ></textarea>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                              

                            </div>
                            <br>
                            <div class="form-row">




                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-6 ">
                                    <button class="btn btn-primary" type="submit">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <?php
            }
            //}
            ?>
            <!-- end validation form -->
            
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-6">
                        <div class="card">
                            <h5 class="card-header"><?php echo $this->lang->line("asset_type_list"); ?></h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                
                                                <th><?php echo $this->lang->line("name"); ?></th>
                                                <th><?php echo $this->lang->line("edit"); ?></th>
                                                <th><?php echo $this->lang->line("delete"); ?></th>
                                      
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            if(isset($allPdt)){
                                                foreach ($allPdt as $value){
                                            
                                            
                                            ?>
                                            <tr>
                                                
                                                <td><?php echo $value->CAT_NAME?></td>
                                                
                                                <td><a href="<?php echo base_url() ?>Admin/income/income/edit_income_category/edit/<?php
                                                   echo $value->ID ?>"><?php echo $this->lang->line("edit"); ?></a></td>  


                                           

                                            <td><a href="<?php echo base_url() ?>admin/income/income/delete_income_category/delete/<?php
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
