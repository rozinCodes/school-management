
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
            <h2><?php echo $this->lang->line("staff_attendence_report"); ?></h2>
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
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line("staff_attendence_report"); ?></li>
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

                    <form class="needs-validation" novalidate="" action="<?php echo base_url() ?>admin/hrms/staff/staff_attendence_report" method="post">

                        <div class="row">

                            <div class="col-xl-4 col-lg-4  col-md-4 col-sm-4 col-4 ">

                                     <label for="validationCustom01"><?php echo $this->lang->line("staff_role"); ?></label>

                                    <select class="form-control" id="validationCustom01" name="staff_role" required="">
                                         <option value="">Select</option>
                                       
                                                <?php 
                                        if(isset($allPdt2)){
                                            $i=0;
                                            foreach ($allPdt2 as $value){
                                               
                                                ?>
                                               
                                                <option value="<?php echo $value->ID?>"><?php echo $value->NAME?></option>
                                                
                                                <?php
                                            }
                                        }
                                        
                                        ?>
                                                
                                    </select>
                               <!--  <div class="valid-feedback">
                                    Looks good!
                                </div> -->
                            </div>

                            <div class="col-xl-4 col-lg-4  col-md-4 col-sm-4 col-4 ">

                                    <label for="validationCustom01"><?php echo $this->lang->line("from_date"); ?></label>
                                  
                                    <input type="date" class="form-control" id="validationCustom01" name="from_date" placeholder=" name"  value="" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>

                            </div>

                            <div class="col-xl-4 col-lg-4  col-md-4 col-sm-4 col-4 ">
                                    <label for="validationCustom01"><?php echo $this->lang->line("to_date"); ?></label>
                                  
                                    <input type="date" class="form-control" id="validationCustom01" name="to_date" placeholder=" name"  value="" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                        
                            </div>

                           

                           

                        </div>

                        <br>

                        <div class="row pull-right">

                            

                            

                            <div class="col-xl-4 col-lg-4  col-md-4 col-sm-4 col-4 ">
                                    <button class="btn btn-primary my_btn_style" type="submit">Search</button>
                            </div>
                        </div>




                       
                        

                    </form>

                </div>
            </div>
        </div>



            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
            <div class="card">
                <h5 class="card-header"></h5>

                <div class="card-body">
                    <h2 style="color:green"> </h2>

                    <form class="needs-validation" novalidate="" action="<?php echo base_url() ?>admin/hrms/staff/student_attendence_report_by_staff_id" method="post">

                        <div class="row">

                            <div class="col-xl-6 col-lg-6  col-md-6 col-sm-6 col-6 ">

                                    <label for="validationCustom01"><?php echo $this->lang->line("from_date"); ?></label>
                                  
                                    <input type="date" class="form-control" id="validationCustom01" name="from_date" placeholder=" name"  value="" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>

                            </div>

                            <div class="col-xl-6 col-lg-6  col-md-6 col-sm-6 col-6 ">
                                    <label for="validationCustom01"><?php echo $this->lang->line("to_date"); ?></label>
                                  
                                    <input type="date" class="form-control" id="validationCustom01" name="to_date" placeholder=" name"  value="" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                        
                            </div>

                            

                        </div>
                        <br>

                        <div class="row">
                            <div class="col-xl-6 col-lg-6  col-md-6 col-sm-6 col-6">
                                <label for="validationCustom01"><?php echo $this->lang->line("staff_id"); ?></label>
                                    <input type="text" name="staff_id" class="form-control" id="validationCustom01" value="" placeholder="search by Staff Id " required="">
                            </div>
                            <div class="col-xl-4 col-lg-4  col-md-4 col-sm-4 col-4 ">
                                    <button class="btn btn-primary my_btn_style" type="submit">Search</button>
                            </div>
                        </div>

                       

                    </form>

                </div>
            </div>
        </div>


<!-- -->
    </div>


    <!-- Down Panel start-->

    <div class="row">

            
            
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
                            <div class="row" style="width: 100%;">
                                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8">
                                    <h5 class="card-header"><?php echo $this->lang->line("staff_attendence_report"); ?></h5>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md- col-sm-4 col-4">
                                    <br>
                                    
                                    
                                    
                                  
                               
                            </div>
                            
                       

                            <div class="card-body" >
                                <div class="table-responsive" >
                                    <div class="section_print" id="section-to-print">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                            <thead>
                                                <tr>
                                                   <!--  <th><?php //echo $this->lang->line("id"); ?></th> -->
                                                   <th><?php echo $this->lang->line("staff_id"); ?></th>
                                                
                                                    <th><?php echo $this->lang->line("first_name"); ?></th>
                                                    <th><?php echo $this->lang->line("department"); ?></th>
                                                    <th><?php echo $this->lang->line("designation"); ?></th>
                                                    <th><?php echo $this->lang->line("attendence_status"); ?></th>
                                                    
                                                    <th><?php echo $this->lang->line("date"); ?></th>
                                                   
                                                    
                                                    
                                          
                                                </tr>
                                            </thead> 
                                            
                                            <tbody>

                                                <?php 

                                                if(isset($allPdt3)){
                                                   
                                                     
                                                    foreach ($allPdt3 as $value){
                                                
                                                
                                                ?>
                                                
                                                <tr>
                                                   <!--  <td><?php //echo $value->ID?></td> -->
                                                   <td><?php echo $value->STAFF_ID?></td>
                                                   
                                                   <td><?php echo $value->FIRST_NAME?></td>
                                                   <td><?php echo $value->DEPARTMENT_NAME?></td>
                                                   <td><?php echo $value->DESIGNATION_NAME?></td>


                                                  

                                                   <?php 

                                                        $a='PRESENT';
                                                        $b=$value->ATTENDENCE_TYPE; 

                                                        $c=strcmp($a,$b);
                                                        


                                                        if($c==0){ ?>

                                                            <td style="color:#5c9b22"><b><?php echo $value->ATTENDENCE_TYPE?></b></td> <?php
                                                        }else{ ?>

                                                            <td style="color:#b32c2c"><b><?php echo $value->ATTENDENCE_TYPE?></b></td> <?php

                                                        }

                                                         ?>

                                                        
                                                   


                                                   <td><?php
                                                    $sdate = $value->ATTENDENCE_DATE_TIME;
                                                    $a = strval($sdate);
                                                    $aa = str_replace(".000000","",$a);
                                                    $date1 = date_create($aa);
                                                   $date = date_format($date1, "Y-m-d H:i:s a");
                                                    echo $date; 
                                                   ?></td>

                                                   
                                                  
                                                     
                                                    
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
                                <br>
                              
                            </div>


                           
                        </div>
                    </div>
            <!-- ============================================================== -->
        </div>


    <!-- Down panel End -->


        

    </div>
    
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


