
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
            <h2><?php echo $this->lang->line("staff_details"); ?></h2>
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
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line("staff_details"); ?></li>
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

                                            <img class="profile-user-img img-responsive img-circle center" src="<?php echo base_url(); ?>uploads/staff/picture/<?php echo $allPdt->PHOTO?> " alt="User profile picture">
                                           
                                            <h3 class="profile-username text-center"><?php echo $allPdt->FIRST_NAME?><?php echo $allPdt->LAST_NAME?></h3>

                                            <ul class="list-group list-group-unbordered">
                                                 
                                                
                                                <li class="list-group-item listnoback">
                                                    <b><?php echo $this->lang->line("staff_id");?></b> <a class="pull-right text-aqua"><td><?php echo $allPdt->STAFF_ID?></td></a>
                                                </li>
                                             
                                                <li class="list-group-item listnoback">
                                                    <b><?php echo $this->lang->line("department"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->DEPARTMENT_NAME?></a>
                                                </li>
                                                <li class="list-group-item listnoback">
                                                    <b><?php echo $this->lang->line("designation"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->DESIGNATION_NAME?></a>
                                                </li>
                                                <li class="list-group-item listnoback">
                                                    <b><?php echo $this->lang->line("staff_basic_salary"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->BASIC_SALARY?></a>
                                                </li>
                                                <li class="list-group-item listnoback">
                                                    <b><?php echo $this->lang->line("staff_contract_type"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->CONTRACT_TYPE?></a>
                                                </li>
                                                <li class="list-group-item listnoback">
                                                    <b><?php echo $this->lang->line("staff_shift"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->SHIFT_NAME?></a>
                                                </li>
                                                <li class="list-group-item listnoback">
                                                    <b><?php echo $this->lang->line("staff_dateofjoin"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->DATE_OF_JOINING?></a>
                                                </li>
                                                
                                            </ul>

                                            

                                           
                                        </div>
                                    </div>
                                </div> 


        
                            </div>
                        </div>

                </div>
            </div>
        </div>





        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8">

	        <section>
	      
		              <ul class="nav nav-tabs" id="myTab" role="tablist">
		                <li class="nav-item waves-effect waves-light">
		                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
		                </li>
		                <li class="nav-item waves-effect waves-light">
		                  <a class="nav-link" id="payroll-tab" data-toggle="tab" href="#payroll" role="tab" aria-controls="payroll" aria-selected="false">Payroll</a>
		                </li>
		                <li class="nav-item waves-effect waves-light">
		                  <a class="nav-link active" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="true">Contact</a>
		                </li>

		                &emsp;
		                 &emsp;
		                &emsp;
		                &emsp;

		                <li class="pull-right" data-toggle="tooltip" data-original-title="Edit">
		                    <a href="<?php echo base_url() ?>Admin/student/student_edit/edit/<?php
		                                                   echo $allPdt->ID ?>" style="cursor: pointer;" onclick="" class=" data-toggle="tooltip" data-placement="bottom">
		                                                <i class="fas fa-pencil-alt"></i></a>
		                </li>

		                                        &emsp;
		                                        &emsp;
		                                        &emsp;
		                                        &emsp;

		                <li class="pull-right" data-toggle="tooltip" data-original-title="Login Details">
		                                            
		                                            
		                                            <a href="#" type="button" class="" data-toggle="modal" data-target="#myModal2" data-placement="bottom" ><i class=" fas fa-lock"></i></a>
		                                                                                    
		                </li>
		                                        &emsp;
		                                        &emsp;
		                                        &emsp;
		                                        &emsp;

		                <li class="pull-right" data-toggle="tooltip" data-original-title="Change Password">
		                                            <a href="#" style="cursor: pointer;"  class="" data-toggle="tooltip" data-placement="bottom" ><i class=" fas fa-key"></i></a>
		                                                                                    
		                </li>

		                                        &emsp;
		                                        &emsp;
		                                        &emsp;
		                                        &emsp;







		              </ul>



		        <div class="tab-content" id="myTabContent">
			        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
			                	

				        <div class="card">
		                    	<h5 class="card-header"></h5>

		                        
		                        <div class="box box-primary">
		                                

		                                    <div class="box-body box-profile">

		                                        <div class="border_info">
		                                            
		                                            <h3 class="profile-username text-center pagetitleh2">Personal Information</h3>

		                                            <ul class="list-group list-group-unbordered">
		                                                 
		                                                
		                                                <li class="list-group-item listnoback">
		                                                    <b><?php echo $this->lang->line("staff_phone_number"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->PHONE?></a>
		                                                </li>
		                                             
		                                                <li class="list-group-item listnoback">
		                                                    <b><?php echo $this->lang->line("date_of_birth"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->DATE_OF_BIRTH?></a>

		                                                </li>
		                                                <li class="list-group-item listnoback">
		                                                    <b><?php echo $this->lang->line("staff_emergency_number"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->EMERGENCY_CONTACT?></a>
		                                                </li>
		                                                <li class="list-group-item listnoback">
		                                                    <b><?php echo $this->lang->line("gender"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->GENDER?></a>
		                                                </li>
		                                                <li class="list-group-item listnoback">
		                                                    <b><?php echo $this->lang->line("staff_maritial_status"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->MARITIAL_STATUS?></a>
		                                                </li>
		                                                <li class="list-group-item listnoback">
		                                                    <b><?php echo $this->lang->line("staff_father_name"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->FATHER_NAME?></a>
		                                                </li>
		                                                <li class="list-group-item listnoback">
		                                                    <b><?php echo $this->lang->line("staff_mother_name"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->MOTHER_NAME?></a>
		                                                </li>
		                                                <li class="list-group-item listnoback">
		                                                    <b><?php echo $this->lang->line("staff_qualification"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->QUALIFICATION?></a>
		                                                </li>
		                                                <li class="list-group-item listnoback">
		                                                    <b><?php echo $this->lang->line("staff_work_experience"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->EXPERIENCE?></a>
		                                                </li>
		                                                
		                                            </ul>
		                                        </div>    

		                                    </div>
		                                </div> 
		                                <br>

		                         <div class="box box-primary">

		                                    <div class="box-body box-profile">
		                                        
		                                        <div class="border_info"> 

		                                            <h3 class="profile-username text-center pagetitleh2"><?php echo $this->lang->line("address"); ?></h3>

		                                            <ul class="list-group list-group-unbordered">
		                                                 
		                                                
		                                                <li class="list-group-item listnoback">
		                                                    <b><?php echo $this->lang->line("present_address"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->CURRENT_ADDRESS?></a>
		                                                </li>
		                                             
		                                                <li class="list-group-item listnoback">
		                                                    <b><?php echo $this->lang->line("permanent_address"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->PERMANENT_ADDRESS?></a>
		                                                </li>
		                                                
		                                        
		                                               
		                                            </ul>
		                                        </div>      
		                                    </div>
		                                </div> 

		                                <br>

		                         
		                         <div class="box box-primary">

		                                    <div class="box-body box-profile">
		                                        
		                                        <div class="border_info"> 

		                                            <h3 class="profile-username text-center pagetitleh2"><?php echo $this->lang->line("staff_bank_ac_details"); ?></h3>

		                                            <ul class="list-group list-group-unbordered">
		                                                 
		                                                
		                                                <li class="list-group-item listnoback">
		                                                    <b><?php echo $this->lang->line("staff_account_title"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->ACCOUNT_TITLE?></a>
		                                                </li>
		                                             
		                                                <li class="list-group-item listnoback">
		                                                    <b><?php echo $this->lang->line("staff_bank_account_number"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->ACCOUNT_NUMBER?></a>
		                                                </li>
		                                                <li class="list-group-item listnoback">
		                                                    <b><?php echo $this->lang->line("staff_bank_name"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->ACCOUNT_BANK_NAME?></a>
		                                                </li>
		                                                <li class="list-group-item listnoback">
		                                                    <b><?php echo $this->lang->line("staff_branch_name"); ?></b> <a class="pull-right text-aqua"><?php echo $allPdt->ACCOUNT_BRANCH_NAME?></a>
		                                                </li>
		                                                
		                                        
		                                               
		                                            </ul>
		                                        </div>      
		                                    </div>
		                                </div> 

		                                <br>




	                	</div>




				    </div>



			                <div class="tab-pane fade" id="payroll" role="tabpanel" aria-labelledby="payroll-tab">
			                	

			                </div>
			                <div class="tab-pane fade active show" id="contact" role="tabpanel" aria-labelledby="contact-tab">
			                	

			                </div>
		    </div>
		      
	    </section>

            	

   			</div> 



                
    </div>


<!-- -->
    </div>



 

    </div>
    
</div>
 <?php
     }
    ?>



<!-- Login Details Modal Start -->

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
</div>

</form> 


<!-- LOgin Details Modal End -->






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






   

