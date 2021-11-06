
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
            <h2><?php echo $this->lang->line("student_info"); ?></h2>
        </div>


        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title"><?php echo $this->lang->line("sections"); ?> </h2>

                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("dashboard"); ?></a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("student_info"); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line("student_details"); ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- end pageheader -->

        <div class="row">


        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
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

 
                  
                        <div class="row">

                            <div class="col-xl-12 col-lg-12  col-md-12 col-sm-12 col-12 ">

                                <div class="box box-primary">

                                    <div class="box-body box-profile">

                                        <div class="border_info">


                                            <?php 

                                            if(isset($allPdt)){
                                                
                                            
                                            
                                            ?>
											
											<?php
											if($allPdt->STUDENT_IMAGE==Null){
												?>
												   <img class="profile-user-img img-responsive img-circle center" src="<?php echo base_url(); ?>uploads/students/picture/no_image.png" alt="User profile picture">
                                         
												<?php
											}else{
											?>

                                            <img class="profile-user-img img-responsive img-circle center" src="<?php echo base_url(); ?>uploads/students/picture/<?php echo $allPdt->STUDENT_IMAGE?> " alt="User profile picture">
                                           <?php
										   
											}
										   ?>
                                            <h3 class="profile-username text-center"><?php echo $allPdt->F_NAME?><?php echo $allPdt->L_NAME?></h3>

                                            <ul class="list-group list-group-unbordered">
                                                 
                                                
                                                <li class="list-group-item listnoback">
                                                    <b>Admission No</b> <a class="pull-right text-aqua"><td><?php echo $allPdt->ADMISSION_NO?></td></a>
                                                </li>
                                             
                                                <li class="list-group-item listnoback">
                                                    <b>Roll Number</b> <a class="pull-right text-aqua"><?php echo $allPdt->ROLL?></a>
                                                </li>
                                                <li class="list-group-item listnoback">
                                                    <b>Class</b> <a class="pull-right text-aqua"><?php echo $allPdt->CLASSES?></a>
                                                </li>
                                                <li class="list-group-item listnoback">
                                                    <b>Section</b> <a class="pull-right text-aqua"><?php echo $allPdt->NAME?></a>
                                                </li>
                                                <li class="list-group-item listnoback">
                                                    <b>Session</b> <a class="pull-right text-aqua"><?php echo $allPdt->SESSIONS?></a>
                                                </li>
                                                <li class="list-group-item listnoback">
                                                    <b>Gender</b> <a class="pull-right text-aqua"><?php echo $allPdt->GENDER?></a>
                                                </li>
                                                <li class="list-group-item listnoback">
                                                    <b>Blood Group</b> <a class="pull-right text-aqua"><?php echo $allPdt->BLOOD_GROUP?></a>
                                                </li>
                                                <li class="list-group-item listnoback">
                                                    <b>Version</b> <a class="pull-right text-aqua"><?php echo $allPdt->VERSION?></a>
                                                </li>
                                            </ul>

                                            <td><button id="myBtn" class="btn btn-info btn-border">promote</button></td>

                                           
                                        </div>
                                    </div>
                                </div> 


        
                            </div>
                        </div>

                </div>
            </div>
        </div>



            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8">
                <div class="card">
                    <h5 class="card-header"></h5>

                        <div class="edit_info">
                                    <ul class="nav nav-tabs pull-right">

                                        

                        

                                        <li class="pull-right" data-toggle="tooltip" data-original-title="Edit">
                                            <a href="<?php echo base_url() ?>Admin/student/student_edit/edit/<?php
                                                   echo $allPdt->STUDENT_ID ?>" style="cursor: pointer;" onclick="" class="text-red"  data-placement="bottom" >
                                                <i class="fas fa-pencil-alt"></i></a>
                                        </li>

                                        &emsp;
                                        &emsp;
                                        &emsp;
                                        &emsp;

                                        <li class="pull-right" data-toggle="tooltip" data-original-title="Login Details">
                                                    
                                                    
                                            <a href="#"  class="" data-toggle="modal" data-target="#myModal2" data-placement="bottom" ><i class=" fas fa-lock"></i></a>
                                                                                            
                                        </li>
                                        &emsp;
                                        &emsp;
                                        &emsp;
                                        &emsp;

                                        <li class="pull-right" data-toggle="tooltip" data-original-title="Change Password">
                                            <a href="#" style="cursor: pointer;"  class="" data-toggle="modal" data-target="#changePassModal" data-placement="bottom" ><i class=" fas fa-key"></i></a>
                                                                                            
                                        </li>

                        &emsp;
                        &emsp;
                        &emsp;
                        &emsp;

                                         
 
                                       
                            
                                        
                                       
                                
                                     </ul>
                                    
                                </div>

                        <div class="box box-primary">
                                

                                    <div class="box-body box-profile">

                                        <div class="border_info">
                                            
                                            <h3 class="profile-username text-center pagetitleh2">Personal Information</h3>

                                            <ul class="list-group list-group-unbordered">
                                                 
                                                
                                                <li class="list-group-item listnoback">
                                                    <b>Admission Date</b> <a class="pull-right text-aqua"><?php echo $allPdt->ADMISSION_DATE?></a>
                                                </li>
                                             
                                                <li class="list-group-item listnoback">
                                                    <b>Date of Birth</b> <a class="pull-right text-aqua"><?php echo $allPdt->DATE_OF_BIRTH?></a>
                                                </li>
                                                <li class="list-group-item listnoback">
                                                    <b>Mobile No</b> <a class="pull-right text-aqua"><?php echo $allPdt->MOBILE_NO?></a>
                                                </li>
                                                <li class="list-group-item listnoback">
                                                    <b>Religion</b> <a class="pull-right text-aqua"><?php echo $allPdt->RELIGION?></a>
                                                </li>
                                                <li class="list-group-item listnoback">
                                                    <b>Email</b> <a class="pull-right text-aqua"><?php echo $allPdt->EMAIL?></a>
                                                </li>
                                                
                                            </ul>
                                        </div>    

                                    </div>
                                </div> 
                                <br>

                         <div class="box box-primary">

                                    <div class="box-body box-profile">
                                        
                                        <div class="border_info"> 

                                            <h3 class="profile-username text-center pagetitleh2">Parent Details</h3>

                                            <ul class="list-group list-group-unbordered">
                                                 
                                                
                                                <li class="list-group-item listnoback">
                                                    <b>Father Name</b> <a class="pull-right text-aqua"><?php echo $allPdt->FATHER_NAME?></a>
                                                </li>
                                             
                                                <li class="list-group-item listnoback">
                                                    <b>Father Phone</b> <a class="pull-right text-aqua"><?php echo $allPdt->FATHER_PHONE?></a>
                                                </li>
                                                
                                                <li class="list-group-item listnoback">
                                                    <b>Mother Name</b> <a class="pull-right text-aqua"><?php echo $allPdt->MOTHER_NAME?></a>
                                                </li>
                                                <li class="list-group-item listnoback">
                                                    <b>Mother Phone</b> <a class="pull-right text-aqua"><?php echo $allPdt->MOTHER_PHONE?></a>
                                                </li>
                                                
                                               
                                            </ul>
                                        </div>      
                                    </div>
                                </div> 

                                <br>

                         <div class="box box-primary">

                                    <div class="box-body box-profile">

                                        <div class="border_info">
                                            
                                            <h3 class="profile-username text-center pagetitleh2">Guardian Details</h3>

                                            <ul class="list-group list-group-unbordered">
                                                 
                                                
                                                <li class="list-group-item listnoback">
                                                    <b>Guadian Name</b> <a class="pull-right text-aqua"><?php echo $allPdt->GUARDIAN_NAME?></a>
                                                </li>
                                             
                                                <li class="list-group-item listnoback">
                                                    <b>Guardian Phone</b> <a class="pull-right text-aqua"><?php echo $allPdt->GUARDIAN_PHONE?></a>
                                                </li>
                                                <li class="list-group-item listnoback">
                                                    <b>Guardian Present Address</b> <a class="pull-right text-aqua"> <?php echo $allPdt->GUARDIAN_PRESENT_ADDRESS?></a>
                                                </li>
                                                 <li class="list-group-item listnoback">
                                                    <b>Guardian Permanent Address</b> <a class="pull-right text-aqua"> <?php echo $allPdt->GUARDIAN_PERMANENT_ADDRESS?></a>
                                                </li>
                                                <li class="list-group-item listnoback">
                                                    <b>Relation</b> <a class="pull-right text-aqua"><?php echo $allPdt->RELATION?></a>
                                                </li>
												
												<?php
												
												$dd=$this->student_model->Guardian_Details($allPdt->STUDENT_ID);
												//print_r($dd);
												//exit();
												
												foreach($dd as $v){
												?>
												 <li class="list-group-item listnoback">
                                                    <b>Guardian Login ID:</b> <a class="pull-right text-aqua"> <?php echo $v->PHONE_NO?></a>
                                                </li>
                                                <li class="list-group-item listnoback">
                                                    <b>Guardian Login Password:</b> <a class="pull-right text-aqua"><?php echo $v->PASSWORD?></a>
                                                </li>
												<?php
												}
												?>
                                                
                                            </ul>
                                        </div>    
                                    </div>
                                </div> 




                </div>
           </div>


<!-- -->
    </div>



 

    </div>
    
</div>
 <?php
     }
    ?>
<!-- ============================================================== -->


<!-- promote  Modal Start -->

<form class="needs-validation" novalidate="" action="<?php echo base_url() ?>admin/student/single_student_promot" method="post">



<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>

    <div class="row">



    
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">

        <label for="validationCustom01"><?php echo $this->lang->line("version"); ?></label>

                <select class="form-control" id="version_id" name="version" onchange="test2()" required="">
                        <option value="" selected>Select</option>
                            <?php 
                                if(isset($allPdt5)){
                                    foreach ($allPdt5 as $value){

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
                                   
                                            
                    <label for="validationCustom01"><?php echo $this->lang->line("class"); ?></label>

                        <select class="form-control" name="class" id="class_id" required="">
                            <option value="" selected><?php echo $this->lang->line("class"); ?></option>


                        </select>


                        <div class="valid-feedback">
                            Looks good!
                        </div>


               

                <label for="validationCustom01"><?php echo $this->lang->line("section"); ?></label>

                <select class="form-control" id="validationCustom01" name="section">
                    <?php 
                        if(isset($allPdt4)){
                            foreach ($allPdt4 as $value){

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

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
            <label for="validationCustom01"><?php echo $this->lang->line("session"); ?></label>

                <select class="form-control" id="validationCustom01" name="session">
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
                                   
                                            
         

               

                <label for="validationCustom01"><?php echo $this->lang->line("roll_no"); ?></label>

                <input type="text"  class="form-control" name="roll_no" id="roll_no" required="">
                 

                <div class="valid-feedback">
                    Looks good!
                </div>

                

                                    
        </div>

        <input type="hidden" class="form-control" id="validationCustom01" placeholder="name" name="student_id" value="<?php echo $allPdt->STUDENT_ID; ?>" required>
        <!-- <input type="hidden" class="form-control" id="validationCustom01" placeholder="name" name="session_id" value="<?php //echo $allPdt->SESSION_ID; ?>" required>
 -->



    </div>
    <br>

    <div class="row">
            <div class="col-xl-4 col-lg-4  col-md-4 col-sm-4 col-4 ">
            <button class="btn btn-success" type="submit">Submit</button>
        </div>
    




  </div>

</div>

</div>

</form>    

<!-- Promote Modal End -->


<!-- Login Details Modal Start -->



<!-- The Modal -->
<div id="myModal2" class="modal">


      <!-- Modal content -->
        <div class="modal-content">
            <span type="button" class="close" data-dismiss="modal">&times;</span>
                <h3  class="border-bottom border border-danger" style="text-align: center;">Login Details </h3>
                <br>


                <div class="details-border">
                    <p style="text-align: center;"><b><?php echo "Admission No : ".$allPdt->ADMISSION_NO?></b></p>
                    <p style="text-align: center;"><b><?php echo " Password : ".$allPdt->PASSWORD?></b></p>
                    <!-- ekhne guardian password bosbe -->
                    <p style="text-align: center; color: red">Login url : http://localhost/Application/login</p>
                    
                </div>


                 

            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">

                                           
                          
                </div>

            </div>
            <br>

           
        </div>

    </div>





<!-- LOgin Details Modal End -->

<!-- Change password Modal Start -->

   <form class="needs-validation" novalidate="" action="<?php echo base_url() ?>admin/student/change_password" method="post">

<!-- The Modal -->
<div id="changePassModal" class="modal">


      <!-- Modal content -->
        <div class="modal-content" style="background: #ddd">
            <span type="button" class="close" data-dismiss="modal">&times;</span>
                <h3  class="border-bottom border border-danger" style="text-align: center; color:green">Change Password</h3>
                <br>


                <div class="details-border">
                    
                    <label for="validationCustom01"><?php echo $this->lang->line("old_password"); ?></label>
                    <input name="old_password" id="old_pass" class="form-control" type="password" />

                   <label for="validationCustom01"><?php echo $this->lang->line("new_password"); ?></label>
                    <input name="password" id="validationCustom01" class="form-control password" type="password" />

                    <label for="validationCustom01"><?php echo $this->lang->line("conf_password"); ?></label>
                    <input type="password" name="confirm_password" class="form-control confirm_password" id="validationCustom01" /> <span id='message'></span>

                    <input type="hidden" name="std_id" value="<?php echo $allPdt->STUDENT_ID?>">
                    
                </div>
                <br>


                 

                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                        
                        <button class="btn btn-success" style="margin-left: 10px;" id="btnSubmit" type="submit"><?php echo $this->lang->line("update"); ?></button>             
                              
                    </div>

                </div>
            <br>

           
        </div>

    </div>


</form> 


<form class="needs-validation" novalidate="" action="<?php echo base_url() ?>admin/student/student_promot" method="post">

<!-- The Modal -->
<div id="myModal2" class="modal">


      <!-- Modal content -->
        <div class="modal-content">
            <span type="button" class="close" data-dismiss="modal">&times;</span>
                <h3  class="border-bottom border border-danger" style="text-align: center;">Login Details </h3>
                <br>


                <div class="details-border">
                    <p style="text-align: center;"><b><?php echo "User Email : ".$allPdt->EMAIL?></b></p>
                    <p style="text-align: center;"><b><?php echo "User Password : ".$allPdt->PASSWORD?></b></p>
                    <p style="text-align: center; color: red">Login url : http://localhost/Application/userlogin/login</p>
                    
                </div>


                 

            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">

                                           
                          
                </div>

            </div>
            <br>

           
        </div>

    </div>


</form> 










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
    
   
var promot_modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  promot_modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  promot_modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == promot_modal) {
    promot_modal.style.display = "none";
  }
}
   
</script>


<script type="text/javascript">
    $('.password, .confirm_password').on('keyup', function () {
    if ($('.password').val() == $('.confirm_password').val()) {
        $('#message').html('Matching').css('color', 'green');
    } else 
        $('#message').html('Not Matching').css('color', 'red');
});
</script>

<script>
 function test2() {
       

        

       
    var c = document.getElementById("version_id").value;
        // alert(c);
        var sc = "";
        if (c == 0) {
            sc += "<option value='0'>Choose Teacher First</option>";
        }
        
        <?php
        
       
         
        foreach ($allPdt5 as $vr) {
            
                   
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







   

