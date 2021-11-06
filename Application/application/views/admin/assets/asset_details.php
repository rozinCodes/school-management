


<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->



        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <h2><?php echo $this->lang->line("asset_details"); ?></h2>
        </div>


        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title"><?php echo $this->lang->line("sections"); ?> </h2>

                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("dashboard"); ?></a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("asset"); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line("asset_details"); ?></li>
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
        }
        else{
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

                    <form class="needs-validation" novalidate action="<?php echo base_url() ?>Admin/assets/asset/asset_search" method="post">

                        <div class="row">



                           
                          

                            <div class="col-xl-8 col-lg-8  col-md-8 col-sm-8 col-8 ">

                                    <label for="validationCustom01"><?php echo $this->lang->line("asset_type"); ?></label>

                                    <select class="form-control" id="validationCustom01" name="asset_type">
                                       <?php 
                                        if(isset($allPdt)){
                                            foreach ($allPdt as $value){
                                               
                                                ?>

                                                <option value="<?php echo $value->ID?>"><?php echo $value->NAME?></option>
                                                
                                                <?php
                                            }
                                        }
                                        
                                        ?>
                                  </select>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-4  col-md-4 col-sm-4 col-4 ">
                                <button class="btn btn-primary my_btn_style" type="submit"><?php echo $this->lang->line("search"); ?></button>
                            </div>

                        </div>

                        <br>
                        <div class="row">
                            <div class="col-xl-8 col-lg-6  col-md-6 col-sm-6 col-6 ">

                               
                                
                                <p>Total Product :<span class="quantity_color"> <?php echo $allPdt3;?></span> </p> 

                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>

                        <br><br> <br>


                    </form>
                </div>
            </div>
        </div>



        <!-- details -->

             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header"><?php echo $this->lang->line("asset_details"); ?></h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                
                                                <th><?php echo $this->lang->line("asset_name"); ?></th>
                                                <th><?php echo $this->lang->line("asset_serial"); ?></th>
                                                <th><?php echo $this->lang->line("asset_price"); ?></th>
                                                <th><?php echo $this->lang->line("asset_purchase_date"); ?></th>
                                                <th><?php echo $this->lang->line("asset_purchase_by"); ?></th>
                                                <th><?php echo $this->lang->line("asset_document"); ?></th>
                                                <th><?php echo $this->lang->line("asset_description"); ?></th>
                                                
                                                <th><?php echo $this->lang->line("edit"); ?></th>
                                                <th><?php echo $this->lang->line("delete"); ?></th>
                                      
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            if(isset($allPdt2)){
                                                foreach ($allPdt2 as $value){
                                            
                                            
                                            ?>
                                            <tr>
                                                
                                                <td><?php echo $value->ASSET_NAME?></td>
                                                <td><?php echo $value->ASSET_SERIAL?></td>
                                                <td><?php echo $value->ASSET_PRICE?></td>
                                                <td><?php echo $value->ASSET_PURCHASE_DATE?></td>
                                                <td><?php echo $value->ASSET_PURCHASE_BY?></td>
                                                <td><?php echo $value->ASSET_DOCUMENT?></td>
                                                <td><?php echo $value->ASSET_DESCRIPTION?></td>
                                                
                                                <td><a href="<?php echo base_url() ?>Admin/assets/asset/edit_asset/edit/<?php
                                                   echo $value->ID ?>"><?php echo $this->lang->line("edit"); ?></a></td>  
                                                <td> <a href="<?php echo base_url()."task/category_delete/{$value->ID}"?>"><?php echo $this->lang->line("delete"); ?></a></td>
                                                
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
