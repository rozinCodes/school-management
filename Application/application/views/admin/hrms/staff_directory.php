
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
            <h2><?php echo $this->lang->line("staff_directory"); ?></h2>
        </div>


        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title"><?php echo $this->lang->line("sections"); ?> </h2>

                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("dashboard"); ?></a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("hrms"); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line("staff_directory"); ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- end pageheader -->

        <div class="row">


            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8">
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

                        <form class="needs-validation" novalidate="" action="<?php echo base_url() ?>admin/hrms/staff/staff_directory" method="post">

                            <div class="row">

                                <div class="col-xl-8 ol-lg-8  col-md-8 col-sm-8 col-8 ">

                                    <label for="validationCustom01"><?php echo $this->lang->line("staff_role"); ?></label>
                                    <select  class="form-control" name="staff_role" id="validationCustom01" required="">
                                        <option value="">Select</option>

                                        <?php 
                                        if(isset($allPdt2)){
                                            foreach ($allPdt2 as $value){

                                                ?>

                                                <option value="<?php echo $value->ID?>"><?php echo $value->NAME?></option>

                                                <?php
                                            }
                                        }

                                        ?>
                                    </select>
                                        
                                </div>

                                

                                

                                

                                

                                <div class="col-xl-4 col-lg-4  col-md-4 col-sm-4 col-4 ">
                                        <button class="btn btn-primary my_btn_style" type="submit">Search</button>
                                </div>


                                

                            </div>

                            <br>
                           
                            <br><br> <br>

                        </form>


                    </div>
                </div>
            </div>



            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
            <div class="card">
                <h5 class="card-header"></h5>

                <div class="card-body">
                    <h2 style="color:green"> </h2>

                    <form class="needs-validation" novalidate="" action="<?php echo base_url() ?>admin/hrms/staff/search_staff_by_staff_id" method="post">

                        <div class="row">

                           
                           


                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-4 col-8">
                                <label for="validationCustom01"><?php echo $this->lang->line("staff_id"); ?></label>
                                    <input type="text" name="staff_id" class="form-control" id="validationCustom01" value="" placeholder="search by Staff  id" required="">
                            </div>

                            <div class="col-xl-4 col-lg-4  col-md-4 col-sm-4 col-4 ">
                                    <button class="btn btn-primary my_btn_style" type="submit">Search</button>
                            </div>


                            

                        </div>

                        <br>
                       
                        <br><br> <br>

                    </form>

                </div>
            </div>
        </div>


<!-- -->
    </div>

        <div class="row">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                
            </div>
            
            <!-- ============================================================== -->
            <!-- validation form -->
            <!-- ============================================================== -->
            <?php  
           if (isset($_GET['edit'])){
           // if(!$_GET['edit']){
                 foreach ($allPdt as $value){
                     if($_GET['edit']==$value->ID){
            ?>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
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
                            <div class="row">
                                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8">
                                    <h5 class="card-header"><?php echo $this->lang->line("student_lists"); ?></h5>
                                </div>
                                
                            </div>
                            


                            <div class="card-body">
                                <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                               <!--  <th><?php //echo $this->lang->line("id"); ?></th> -->
                                                <th scope="col"><?php echo $this->lang->line("name"); ?></th>
                                                <th scope="col"><?php echo $this->lang->line("staff_id"); ?></th>
                                                <th scope="col"><?php echo $this->lang->line("department"); ?></th>
                                                <th scope="col"><?php echo $this->lang->line("designation"); ?></th>
                                                <th scope="col"><?php echo $this->lang->line("email"); ?></th>
                                              
                                                <th scope="col"><?php echo $this->lang->line("mobile_no"); ?></th>
                                                 <th scope="col"><?php echo $this->lang->line("staff_role"); ?></th>
                                                  <th scope="col"><?php echo $this->lang->line("status"); ?></th>
                                                <th scope="col"><?php echo $this->lang->line("action"); ?></th>

                                                
                                                
                                                
                                      
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 

                                            if(isset($allPdt)){
                                                foreach ($allPdt as $value){
                                            
                                            
                                            ?>
                                            <tr>
                                            <?php
                                            $roles = $this->session->userdata('roles');
                                            if ($roles == 3) { ?>  

                                                <td><?php echo $value->FIRST_NAME?> <?php echo $value->LAST_NAME?></td>
                                                <td><?php echo $value->STAFF_ID?></td>
                                                <td><?php echo $value->DEPARTMENT_NAME?></td>
                                                <td><?php echo $value->DESIGNATION_NAME?></td>
                                                <td><?php echo $value->EMAIL?></td> 
                                                <td><?php echo $value->PHONE?></td> 
                                                <td><?php echo $value->NAME?></td> 
                                                <td class="status"><?php echo $value->STATUS_INFO?></td>  
                                                <td>No Action</td>

                                                 <?php

                                            }else{

                                            ?>
                                       

                                                <td><a class="std_list_color" href="<?php echo base_url() ?>admin/hrms/staff/staff_details/<?php
                                                   echo $value->ID ?>"><?php echo $value->FIRST_NAME?> <?php echo $value->LAST_NAME?></a></td> 
                                                <td><?php echo $value->STAFF_ID?></td>
                                                <td><?php echo $value->DEPARTMENT_NAME?></td>
                                                <td><?php echo $value->DESIGNATION_NAME?></td>
                                                <td><?php echo $value->EMAIL?></td> 
                                                <td><?php echo $value->PHONE?></td> 
                                                <td><?php echo $value->NAME?></td> 
                                                <td class="status"><?php echo $value->STATUS_INFO?></td> 

 
                                                <td class="">
                                                                                                 

                                                    <a href="<?php echo base_url() ?>admin/hrms/staff/staff_details/<?php
                                                   echo $value->ID ?>" class="btn btn-default btn-xs" data-toggle="tooltip" title="" data-original-title="Show">
                                                         <i class="fas fa-align-justify"></i>
                                                    </a>
                                                    
    

                                                 </td>  <?php
                                                
                                                }

                                                ?>

                                           

                                                
                                                
                                                
                                            </tr>
                                        <?php
                                                }
                                            }
                                        
                                        ?>
                                            
                                        </tbody>
                                        <tfoot>
                                             
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


