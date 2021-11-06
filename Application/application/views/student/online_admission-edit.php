

    <style>
        .card-header{
            border-left: 5px solid #2d0d38;
            background-color: #736271;
            border-radius: 5px;
           
            border-radius: 5px;
             

        }
        .card-header h5{
            color:#fff;
            font-weight: bold;
            text-transform: uppercase;
            text-align: justify;
            font-family: "Lucida Console", Courier, monospace;
        }
        label{
            color:#000;
            font-weight: bold;
            margin-top: 5px;
            text-transform: capitalize;
        }
        .form-view{
            margin:0px 30px;
        }
        .form-input{
            border-color: rgb(60, 181, 129);
            border-radius: 5px;
            height: 45px;
        }
        .form-input:focus {
            border: 2px solid #555;
        }

        .form-row{
            margin: 20px;
        }
    </style>
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
                    <h2 class="pageheader-title"><?php echo $this->lang->line("student_admission"); ?> </h2>
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
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("student_info"); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line("student_admission"); ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>



        <div class="row">

            <!-- Edit part Satrt -->

    

 
                    <!-- ============================================================== -->
         

            <!-- Edit part End -->

            <!-- ============================================================== -->
           <?php
           if(isset($allPdt)){
               foreach($allPdt as $value){

            
           ?>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                       

                        <div class="card-body">
                            <h2 style="color:green"> <?php
                                $dt = $this->session->userdata("msg");
                                if ($dt != NULL) {
                                    echo $dt;
                                    $this->session->unset_userdata("msg");
                                }
                                ?></h2>
                            <form enctype="multipart/form-data" class="needs-validation" novalidate action="<?php echo base_url() ?>studentInsert" method="post">
                                <br>
                                <div class="border_info">

                                <div class="card-header">

<h5><?php echo $this->lang->line("personal_info"); ?></h5>
</div>
                           
                                            <br>

                                            <div class="row">
                                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                                                    <label for="validationCustom01"><?php echo $this->lang->line("f_name"); ?></label>
                                                    <input type="text" class="form-control form-input" id="validationCustom01" placeholder=" " value="<?php echo $value->F_NAME; ?>" name="fname" value="" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>

                                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                                    <label for="validationCustom01"><?php echo $this->lang->line("l_name"); ?></label>
                                                    <input type="text" class="form-control form-input" id="validationCustom01" placeholder="" name="lname"  value="<?php echo $value->L_NAME; ?>" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>

                                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                                    <label for="validationCustom01"><?php echo $this->lang->line("gender"); ?></label>

                                                    <select class="form-control form-input" id="validationCustom01 " name="gender">
                                                    <?php
                                                    $gender=$value->GENDER;
                                                    if($gender=="male"){
                                                        echo "<option value=\"male\" selected>Male</option>";
                                                        echo "<option value=\"female\" >Female</option>";
                                                        echo "<option value=\"other\" >Other</option>";
                                                    }else if($gender=="female"){
                                                        echo "<option value=\"male\" >Male</option>";
                                                        echo "<option value=\"female\" selected>Female</option>";
                                                        echo "<option value=\"other\" >Other</option>";
                                                    }else{
                                                        echo "<option value=\"other\" >Other</option>";
                                                    }
                                                    
                                                    ?>
                                                   
                                                      
                                                    </select>


                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>

                                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                                    <label for="validationCustom01"><?php echo $this->lang->line("date_of_birth"); ?></label>
                                                  
                                                    <input type="text" class="form-control form-input" id = "datepicker-13"  name="date_of_birth" placeholder=" name"   value="<?php echo $value->DATE_OF_BIRTH; ?>" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                

                                            </div>


                                             <br>

                                            <div class="row">
                                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                                    <label for="validationCustom01"><?php echo $this->lang->line("religion"); ?></label>
                                                    <input type="text" class="form-control form-input" id="validationCustom01" placeholder=" " name="religion"  value="<?php echo $value->RELIGION; ?>">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>

                                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                                    <label for="validationCustom01"><?php echo $this->lang->line("mobile_no"); ?></label>
                                                    <input type="text" class="form-control form-input" id="validationCustom01" placeholder="" name="mobile_no"  value="<?php echo $value->MOBILE_NO; ?>" >
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>

                                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                                    <label for="validationCustom01"><?php echo $this->lang->line("email"); ?></label>
                                                    <input type="text" class="form-control form-input" id="validationCustom01" placeholder="" name="email"  value="<?php echo $value->EMAIL; ?>" >
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>

                                            

                                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                                   <label for="validationCustom01"><?php echo $this->lang->line("admission_date"); ?></label>
                                                  
                                                    <input type="text" class="form-control form-input" id = "datepicker-14" name="admission_date" placeholder=" ADMISSION_DATE"   value="<?php echo $value->ADMISSION_DATE; ?>" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                    <input type="hidden" class="form-control form-input" id="validationCustom01" name="pic[]" multiple="multiple" value="<?php echo $value->STUDENT_IMAGE;?>" >
                                                  
                                                </div>
                                                

                                            </div>




                                             <br>

                                            <div class="row">
                                                

                                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                                   <label for="validationCustom01"><?php echo $this->lang->line("blood_group"); ?></label>
                                                     <select class="form-control form-input" id="validationCustom01" name="blood_group">
                                                        <option value="">Select Blood</option>
                                                      <option value="A+">A+</option>
                                                      <option value="A-">A-</option>
                                                      <option value="O+">O+</option>
                                                      <option value="O-">O-</option>
                                                      <option value="B+">B+</option>
                                                      <option value="B-">B-</option>
                                                      <option value="AB+">AB+</option>
                                                      <option value="AB-">AB-</option>
                                                    </select>
                                                    
                                                </div>

                                                <div class="col-xs-12 col-lg-4 col-md-4 col-sm-6  col-xl-3">
                                                    <label for="validationCustom01 "><?php echo $this->lang->line("present_address"); ?></label>
                                                    
                                                    <textarea class="form-control form-input" id="validationCustom01" name="present_address"   ><?php echo $value->PRESENT_ADDRESS; ?></textarea>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>

                                            

                                                <div class="col-xs-12 col-lg-4 col-md-4 col-sm-6  col-xl-3">
                                                   <label for="validationCustom01"><?php echo $this->lang->line("permanent_address"); ?></label>
                                                   

                                                    <textarea class="form-control" id="validationCustom01" name="permanent_address"  ><?php echo $value->PERMANENT_ADDRESS; ?></textarea>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                        

                                             </div>
                                    </div>     

                                    

                                    <br>
                                
                                <div class="border_info">
                                    
                                    
                                <div class="card-header">
            <h5><?php echo $this->lang->line("parent_detail"); ?></h5>
        </div><br>


                                    <div class="row">
                                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                            <label for="validationCustom01"><?php echo $this->lang->line("father_name"); ?></label>
                                            <input type="text" class="form-control form-input" id="father_name" placeholder=" " name="father_name" value="<?php echo $value->FATHER_NAME; ?>" >
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                            <label for="validationCustom01"><?php echo $this->lang->line("father_phone"); ?></label>
                                            <input type="text" class="form-control form-input" id="father_phone" placeholder="" name="father_phone" value="<?php echo $value->FATHER_PHONE; ?>" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                            <label for="validationCustom01"><?php echo $this->lang->line("father_occupation"); ?></label>
                                            <input type="text" class="form-control form-input" id="father_occupation" placeholder="" name="father_occupation" value="<?php echo $value->FATHER_OCCUPATION; ?>" >
                                            <input class="form-control form-input" type="hidden" name="pic[]"  multiple="multiple" id="file" size="20" value="<?php echo $value->FATHER_PHOTO; ?>" autocomplete="off" >
                                            
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>

                                    

                                      
                                        

                                    </div>
                                    

                               

                                 <br>


                                <div class="row">
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("mother_name"); ?></label>
                                        <input type="text" class="form-control form-input" id="mother_name" placeholder=" " name="mother_name" value="<?php echo $value->MOTHER_NAME; ?>" >
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("mother_phone"); ?></label>
                                        <input type="text" class="form-control form-input" id="mother_phone" placeholder="" name="mother_phone" value="<?php echo $value->MOTHER_PHONE; ?>" >
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("mother_occupation"); ?></label>
                                        <input type="text" class="form-control form-input" id="mother_occupation" placeholder="" name="mother_occupation" value="<?php echo $value->MOTHER_OCCUPATION; ?>" >
                                        <input class="form-control" type="hidden" name="pic[]" multiple="multiple" id="file"  value="<?php echo $value->MOTHER_PHOTO; ?>"  autocomplete="off" >
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>

                                

          
                                    

                                </div>
                            </div>    

                                <br>

                                <div class="border_info">
                                <div class="card-header">
            <h5><?php echo $this->lang->line("parent_detail"); ?></h5>
        </div>

                                        <br>

                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                 <label>
                                                    <p>If Guardian is <span style="color: red">*</span></p>
                                                  
                                                </label>
                                                 
                                                  &emsp;

                                                 
                                                
                                                <input type="radio" id="guardian_m" name="guardian" value="father" /> 
                                                <label for="validationCustom01"> Father</label>

                                                &emsp;
                                                &emsp;

                                                <input type="radio" id="guardian_m" name="guardian" value="mother" /> 
                                                <label for="validationCustom01"> Mother</label>
                                                 &emsp;
                                                  &emsp;

                                                <input type="radio" id="guardian_o" name="guardian" value="other" /> 
                                                <label for="validationCustom01"> Other</label>
         
                                                      
                                                    
                                                                
                                            </div>
                                        </div>

                                        <br>





                                        <div class="row">

                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("guardian_name"); ?></label>
                                                <input type="text" class="form-control" id="guardian_name" placeholder=" " name="guardian_name" value="<?php echo $value->F_NAME; ?>" >
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>

                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("guardian_phone"); ?></label>
                                                <input type="text" class="form-control" id="guardian_phone" placeholder="" name="guardian_phone" value="<?php echo $value->F_NAME; ?>" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>

                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("guardian_occupation"); ?></label>
                                                <input type="text" class="form-control" id="guardian_occupation" placeholder="" name="guardian_occupation"value="<?php echo $value->F_NAME; ?>"  >
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>

                                        

                                             <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("guardian_photo"); ?></label>
                                                
                                                <input class="form-control" type="file" name="pic[]" multiple="multiple" id="file" size="20" autocomplete="off">
                                                <div class="valid-feedback" >
                                                    Looks good!
                                                </div>
                                            </div>
                                            

                                        </div>
                                        <br>

                                        <div class="row">
                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                                                <label for="validationCustom01"><?php echo $this->lang->line("guardian_present_address"); ?></label>
                                                <input type="text" class="form-control" id="validationCustom01" placeholder=" " name="guardian_present_address" value="<?php echo $value->F_NAME; ?>" >
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>

                                            
                                        

                                              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                                                <label for="validationCustom01"><?php echo $this->lang->line("guardian_permanent_address"); ?></label>
                                                <input type="text" class="form-control" id="validationCustom01" placeholder=" " name="guardian_permanent_address" value="" >
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>

                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                                                <label for="validationCustom01"><?php echo $this->lang->line("emergency_contact"); ?></label>
                                                <input type="text" class="form-control" id="validationCustom01" placeholder=" " name="emergency_contact" value="" >
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>

                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                                               
                                                <label for="validationCustom01"><?php echo $this->lang->line("gurdian_relation"); ?></label>
                                                <input type="text" class="form-control" id="g_relation" placeholder=" " name="gurdian_relation" value="" >
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>

                                                 
                                            </div>
                                            

                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                                               
                                               <label for="validationCustom01"><?php echo $this->lang->line("guardian_password"); ?></label>
                                               <input type="text" class="form-control" id="g_relation" placeholder=" " name="guardian_password" value="" required >
                                               <div class="valid-feedback">
                                                   Looks good!
                                               </div>

                                                
                                           </div>

                                        </div>
                            </div>            
                                   



                                <br><br>

                                <!--  Admission Type and Status Form-->
                                <div class="border_info">

                                    <h4 class="page-title">
                                          <label for="validationCustom01" class="middle_bar_background"><?php echo $this->lang->line("admission_details"); ?></label>
                                     
                                    </h4>
                                    <br>
                                    <div class="row">
                                        <!--  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                            
                                            <label for="validationCustom01"><?php //echo $this->lang->line("admission_no"); ?></label>
                                            <input type="text" class="form-control" id="validationCustom01" placeholder=" " name="admission_no" value="" required >
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>  -->

                                        
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 ">
                                             <label for="validationCustom01"><?php echo $this->lang->line("version"); ?></label>

                                             <select class="form-control" id="version_id" name="version" onchange="test2()" required="">
                                                    <option value="" selected>Select</option>
                                                    <?php 
                                                    if(isset($allPdt4)){
                                                        foreach ($allPdt4 as $value){

                                                            ?>

                                                            <option value="<?php echo $value->ID?>"><?php echo $value->VERSION?></option>

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
                                        <label for="validationCustom01"><?php echo $this->lang->line("class"); ?></label>

                                        <select class="form-control" name="class" id="class_id" required="">
                                            <option value="" selected><?php echo $this->lang->line("class"); ?></option>


                                        </select>


                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>


                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 ">
                                            <label for="validationCustom01"><?php echo $this->lang->line("section"); ?></label>

                                            <select class="form-control" id="section_id" name="section"  required="">
                                                <option value="">Select</option>
                                              <?php 
                                            if(isset($allPdt5)){
                                                foreach ($allPdt5 as $value){

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
                                        <!-- <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                             <label for="validationCustom01"><?php echo $this->lang->line("roll_no"); ?></label>
                                            <input type="text" class="form-control" id="roll_id" placeholder=" " name="roll_no" value="" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div> -->

                                     
                                        

                                    </div>

                                  <br>

                                     <div class="row">
                                     <input name="admission_type" value="online" type="hidden">
   

                                        
                                    

                                          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                            <label for="validationCustom01"><?php echo $this->lang->line("admission_status"); ?></label>
                                            <select class="form-control" id="validationCustom01" name="admission_status">
                                                <option value="">Select Status</option>
                                              <option value="Yes">Yes</option>
                                              <option value="No">No</option>
                                              
                                            </select>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>

                                        <!-- // -->
                                          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 ">
                                            <label for="validationCustom01"><?php echo $this->lang->line("admission_session"); ?></label>

                                            <select class="form-control" id="validationCustom01" name="admission_session">
                                              <?php 
                                            if(isset($allPdt3)){
                                                foreach ($allPdt3 as $value){

                                                    ?>

                                                    <option value="<?php echo $value->ID?>"><?php echo $value->SESSIONS?></option>

                                                    <?php
                                                }
                                            }

                                            ?>
                                            </select>


                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <!-- // -->

                                        

                                    </div>
                                </div>    
                                <br>

                                <div class="border_info">

                                    <h4 class="page-title">
                                        <label for="validationCustom01" class="middle_bar_background"><?php echo $this->lang->line("siblings"); ?>  <span style="border:1px solid #ddd;" onclick="myFunction()">+</span></label>
                                    
                                    </h4>
                                    <br>
                                    
                                    <br>
                                    
                                        <div id="myDIV" style="display: none; padding:10px;">
                                           <div class="row">
                                               <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                                                    <label for="validationCustom01"><?php echo $this->lang->line("siblings_id"); ?></label>
                                                    <input type="text" class="form-control" id="siblings_id" placeholder=" " name="siblings_id" value="" onkeyup="test3()" >
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>

                                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                                                    <label for="validationCustom01"><?php echo $this->lang->line("guardian_name"); ?></label>
                                                    <input type="text" class="form-control" id="guardian_id" placeholder=" " name="guardian_id" value="" >
                                                    <input type="hidden" class="form-control" id="guar_id" placeholder=" " name="guar_id" value="" >
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>    

                                
                                <br><br>

                                <div class="form-row">

                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <button class="btn btn-primary" type="submit">Submit form</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            
            <!-- ============================================================== -->
            <!-- end validation form -->
            <!-- ============================================================== -->
        
<?php
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

<script>

    $('input[name=guardian]').click(function() {

        var guardian_val =$('input[name=guardian]:checked').val();

        if(guardian_val=='other'){
            document.getElementById("g_relation").value="";

            document.getElementById('guardian_name').value = "";   
            document.getElementById('guardian_phone').value = "" ; 
            document.getElementById('guardian_occupation').value = "";

        }else if(guardian_val=='father'){

                document.getElementById("g_relation").value=$('input[name=guardian]:checked').val();

                document.getElementById('guardian_name').value = document.getElementById('father_name').value;   
                document.getElementById('guardian_phone').value = document.getElementById('father_phone').value; 
                document.getElementById('guardian_occupation').value = document.getElementById('father_occupation').value; 

            
        }else if(guardian_val=='mother'){

            document.getElementById("g_relation").value=$('input[name=guardian]:checked').val();

            document.getElementById('guardian_name').value = document.getElementById('mother_name').value;   
            document.getElementById('guardian_phone').value = document.getElementById('mother_phone').value; 
            document.getElementById('guardian_occupation').value = document.getElementById('mother_occupation').value; 
        }

      //  document.getElementById("g_relation").value=$('input[name=guardian]:checked').val();
    
    
});
</script>

<script>
 function test2() {
       

        

       
    var c = document.getElementById("version_id").value;
         //alert(c);
        var sc = "";
        if (c == 0) {
            sc += "<option value='0'>Choose Teacher First</option>";
        }
        
        <?php
        
       
         
        foreach ($allPdt4 as $vr) {
            
                   
            echo "else if (c==$vr->ID){";


            foreach ($allPdt2 as $cls) {
                


                if ($vr->ID == $cls->VERSIONSID) {
                                                    
                    echo "sc += '<option  value=\"{$cls->ID}\">$cls->CLASSES</option>';";
                    
                }
            }

            echo "}";
        }
       
        ?>
        // alert(sc);



        $("#class_id").html(sc);
       
       
   }


</script>




<script>
 function test3() {
    var c = document.getElementById("siblings_id").value;
        // alert(c);
        var sc = "";
        var gur_id="";
        if (c == 0) {
            sc += "";
        }
        <?php         
        foreach ($allPdtStdinfo as $std) {        
            echo "else if (c==$std->ADMISSION_NO){";
                {
                 
               // echo "sc += '<option value=\"{$std->ID}\">$std->GUARDIAN_NAME</option>';";
               echo "sc += '$std->GUARDIAN_NAME';";
               echo "gur_id += '$std->ID';";
                }               
            echo "}";
        }       
        ?>
       // alert(sc);
       // $("#guardian_id").html(sc);
        document.getElementById("guardian_id").value =sc;
        document.getElementById("guar_id").value =gur_id;
   }
</script>




<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>


      
<script>
function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
$( function() {
    $( "#datepicker-13" ).datepicker();
    $( "#datepicker-14" ).datepicker();
  } );
  </script>