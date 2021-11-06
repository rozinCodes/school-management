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
            <h2><?php echo $this->lang->line("access_control"); ?></h2>
        </div>


        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title"><?php echo $this->lang->line("sections"); ?> </h2>

                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("dashboard"); ?></a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("settings"); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line("access_control"); ?></li>
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
            if (isset($edit)) {

                // if(!$_GET['edit']){
                foreach ($allPdt as $value) {
                    if ($edit == $value->ID) {
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



                                    <form class="needs-validation" novalidate action="<?php echo base_url() ?>Admin/exams/exam/edit_create_exam/edit/<?php echo $value->ID ?>" method="post">
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("update"); ?></label>

                                                <input type="text" class="form-control" id="validationCustom01" placeholder="name" name="exam_name" value="<?php echo $value->EXAM_NAME; ?>" required>



                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>


                                        </div>
                                        <br>
                                        <div class="form-row">




                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
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
                            <form class="needs-validation" novalidate action="<?php echo base_url() ?>admin/settings/access_control/create_access" method="post">
                                <div class="row">
                                    
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 ">
                                    
                                    <label for="validationCustom01"><?php echo $this->lang->line("staff_name"); ?></label>
                                    
                                     <select class="form-control" id="validationCustom01" name="staff_name">
                                     <option value="">Select</option>
                                        <?php 
                                        if(isset($allPdtstaff)){
                                            foreach ($allPdtstaff as $value){
                                               
                                                ?>

                                                <option value="<?php echo $value->ID; echo"."; echo $value->ROLES_ID?>"><?php echo $value->FIRST_NAME?></option>
                                                
                                                
                                                <?php
                                            }
                                        }
                                        
                                        ?> 
                                  </select> 
                                  <div class="valid-feedback">
                                    Looks good!
                                 </div>
                                </div>
                                    
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 ">
                                    
                                    <label for="validationCustom01"><?php echo $this->lang->line("menu"); ?></label>
                                    
                                     <select class="form-control" id="validationCustom01" name="menu">
                                     <option value="">Select</option>
                                        <?php 
                                        if(isset($allPdtmanu)){
                                            foreach ($allPdtmanu as $value){
                                               
                                                ?>

                                                <option value="<?php echo $value->MENU_ID?>"><?php echo $value->MENU_NAME?></option>
                                                
                                                <?php
                                            }
                                        }
                                        
                                        ?> 
                                  </select> 
                                  <div class="valid-feedback">
                                    Looks good!
                                 </div>
                                </div>
                                    <br>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 ">
                                        
                                        <button class="btn btn-primary" style="margin-top: 24px;" type="submit">Add Access</button>
                                    </div>


                                </div>
                                <br>
                                <div class="form-row">




                                   
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

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header"><?php echo $this->lang->line("access_control"); ?></h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered first">
                                <thead>
                                    <tr>

                                        <th><?php echo $this->lang->line("staff_name"); ?></th>
                                        <th><?php echo $this->lang->line("manu"); ?></th>
                                        <th><?php echo $this->lang->line("access_status"); ?></th>
                                        <th><?php echo $this->lang->line("action"); ?></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($allPdt)) {
                                        foreach ($allPdt as $value) {


                                    ?>
                                            <tr>

                                                <td><?php echo $value->FIRST_NAME ?></td>
                                                <td><?php echo $value->MENU_NAME ?></td>
                                                <td><?php echo $value->PERMISSION_STATUS ?></td>
                                                <td><?php
                                                    if($value->PERMISSION_STATUS==1){?>
                                                        <a href="<?php echo base_url() ?>Admin/settings/access_control/edit_create_access/edit/<?php echo $value->ID ?>/<?php echo $value->PERMISSION_STATUS ?>" type="button" class="btn btn-danger">Deactive</a><?php
                                                    }else{ ?>
                                                     <a href="<?php echo base_url() ?>Admin/settings/access_control/edit_create_access/edit/<?php echo $value->ID ?>/<?php echo $value->PERMISSION_STATUS ?>" type="button" class="btn btn-success">Active</a><?php
                                                       
                                                    }?>
                                                
                                                </td>

                                                <!-- <td><a href="<?php echo base_url() ?>Admin/exams/exam/edit_create_exam/edit/<?php echo $value->ID ?>"><?php echo $this->lang->line("edit"); ?></a></td>

                                                <td><a href="<?php echo base_url() ?>Admin/exams/exam/delete_create_exam/delete/<?php echo $value->ID ?>"><?php echo $this->lang->line("delete"); ?></a></td> -->

                                               

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