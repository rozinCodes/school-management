
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
                <h2><?php echo $this->lang->line("create_result"); ?></h2>
            </div>


        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title"><?php echo $this->lang->line("sections"); ?> </h2>
                   
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("dashboard"); ?></a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("exams"); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line("create_result"); ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- =====================================Search Student========================= -->

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

                        <form class="needs-validation" novalidate="" action="<?php echo base_url() ?>admin/exams/result/get_student_for_result" method="post">

                            <div class="row">

                                <div class="col-xl-3 col-lg-3  col-md-3 col-sm-3 col-3 ">

                                         <label for="validationCustom01"><?php echo $this->lang->line("class"); ?></label>

                                        <select class="form-control" id="validationCustom01" name="class" required="">
                                             <option selected="selected" disabled="disabled">Select</option>
                                           
                                                    <?php 
                                            if(isset($allPdtcls)){
                                                $i=0;
                                                foreach ($allPdtcls as $value){
                                                   
                                                    ?>
                                                   
                                                    <option value="<?php echo $value->ID?>"><?php echo $value->CLASSES?></option>
                                                    
                                                    <?php
                                                }
                                            }
                                            
                                            ?>
                                                    
                                        </select>
                                   <!--  <div class="valid-feedback">
                                        Looks good!
                                    </div> -->
                                </div>

                                <div class="col-xl-3 col-lg-3  col-md-3 col-sm-3 col-3 ">

                                        <label for="validationCustom01"><?php echo $this->lang->line("section"); ?></label>
                                     <select class="form-control" id="validationCustom01" name="section">
                                        <option selected="selected" disabled="disabled">Select </option>
                                      <?php 
                                                if(isset($allPdtsec)){
                                                    foreach ($allPdtsec as $value){
                                                       
                                                        ?>
                                                        
                                                        <option value="<?php echo $value->ID?>"><?php echo $value->NAME?></option>
                                                        
                                                        <?php
                                                    }
                                                }
                                                
                                                ?>
                                    </select>
                                    
                                </div>

                                <div class="col-xl-3 col-lg-3  col-md-3 col-sm-3 col-3 ">

                                        <label for="validationCustom01"><?php echo $this->lang->line("session"); ?></label>
                                     <select class="form-control" id="validationCustom01" name="session">
                                        <option selected="selected" disabled="disabled">Select </option>
                                      <?php 
                                                if(isset($allPdtsession)){
                                                    foreach ($allPdtsession as $value){
                                                       
                                                        ?>
                                                        
                                                        <option value="<?php echo $value->ID?>"><?php echo $value->SESSIONS?></option>
                                                        
                                                        <?php
                                                    }
                                                }
                                                
                                                ?>
                                    </select>
                                    
                                </div>

                                

                                

                                <div class="col-xl-3 col-lg-3  col-md-3 col-sm-3 col-3 ">
                                        <button class="btn btn-primary my_btn_style" type="submit">Search</button>
                                </div>


                                

                            </div>

                            <br>
                           
                            <br><br> <br>

                        </form>

                       <!--  <form class="needs-validation" novalidate="" action="<?php// echo base_url() ?>admin/fees/collect_fees2" method="post">
                            
                                    <div class="col-xl-3 col-lg-3  col-md-3 col-sm-3 col-3">

                                        <input type="text" name="search_admission" class="form-control" id="validationCustom01" value="" placeholder="search by admission no" required="">
                                        
                                    </div>
                                    <div class="col-xl-3 col-lg-3  col-md-3 col-sm-3 col-3">
                                        <button class="btn btn-primary" type="submit">Search</button>
                                    </div>
                           
                        </form>
     -->
                            



                    </div>
                </div>
            </div>



            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
            <div class="card">
                <h5 class="card-header"></h5>

                <div class="card-body">
                    <h2 style="color:green"> </h2>

                    <form class="needs-validation" novalidate="" action="<?php echo base_url() ?>admin/student/student_attendence_by_admission_no" method="post">

                        <div class="row">

                           
                           


                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-4 col-8">
                                <label for="validationCustom01"><?php echo $this->lang->line("admission_no"); ?></label>
                                    <input type="text" name="admission_no" class="form-control" id="validationCustom01" value="" placeholder="search by admission no" required="">
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



    </div>


        
        <!-- ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->

        <div class="row">


      
            <!-- ============================================================== -->
            <!-- validation form -->
            <!-- ============================================================== -->
            <?php  
           if (isset($_GET['edit'])){
           // if(!$_GET['edit']){
                 foreach ($allPdt as $value){
                     if($_GET['edit']==$value->id){
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
                    <form class="needs-validation" novalidate action="<?php echo base_url() ?>admin/exams/result/create_result" method="post">

                        <div class="card">
                            <h5 class="card-header"><?php echo $this->lang->line("subject_marks"); ?></h5>
                            <div class="card-body">

                                <h2 style="color:green"> <?php
                                        $dt = $this->session->userdata("msg");
                                        if ($dt != NULL) {
                                            echo $dt;
                                            $this->session->unset_userdata("msg");
                                        }
                                        ?>
                                
                                 </h2>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                               

                                                <th><?php echo $this->lang->line("f_name") ?></th>
                                                <?php 
                                                if(isset($allPdt)){
                                                foreach ($allPdt as $value){ ?>

                                                <th><?php echo $value->NAME?></th>
                                                <?php
                                                 


                                            }
                                        }
                                          ?>      
                                                
                                               
                                      
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            <?php 
                                            if(isset($allPdt2)){
                                                foreach ($allPdt2 as $value2){?>
                                                    <td>
                                                        <?php echo $value2->F_NAME?>

                                                        <!-- <input type="hidden" name="stdtid[]" value="<?php //echo $value2->STUDENT_ID?>"> -->
                                                    </td>
                                                    <?php

                                                    if(isset($allPdt)){
                                                foreach ($allPdt as $value){?>
                                                    <td>
                                                        <input type="hidden" name="stdtid[]" value="<?php echo $value2->STUDENT_ID?>">
                                                        <input type="text"  name="mark[]" value="" > 
 
                                                          <!-- <input type="text"  name="mark[]" value="" placeholder="<?php echo $value->MARK?>">  -->
 
                                                        <input type="hidden" name="subcode[]" value="<?php echo $value->CODE?>">

                                                        <input type="hidden" name="sub_id[]" value="<?php echo $value->ID?>">

                                                         <input type="hidden" name="stdt_admission_no[]" value="<?php echo $value2->ADMISSION_NO?>">

                                                         <input type="hidden" name="class_id[]" value="<?php echo $value2->CLASS_ID?>">

                                                         <input type="hidden" name="session_id[]" value="<?php echo $value2->SESSION_ID?>">

                                                          
                                                    </td>

                                                    <?php
                                                }
                                            }?>

             
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

                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                <label for="validationCustom01"><?php echo $this->lang->line("exam_name"); ?></label>

                                
                                 <select class="form-control" id="validationCustom01" name="exam_name">
                                        <option selected="selected" disabled="disabled">Select </option>
                                      <?php 
                                                if(isset($allPdtexam)){
                                                    foreach ($allPdtexam as $value){
                                                       
                                                        ?>
                                                        
                                                        <option value="<?php echo $value->ID?>"><?php echo $value->EXAM_NAME?></option>
                                                        
                                                        <?php
                                                    }
                                                }
                                                
                                                ?>
                                    </select>


                                
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                <button type="submit" class="btn btn-primary" style="margin-top: 24px;">Submit</button>
                            </div>
                        </div>




                    </form>
                    
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
