
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
            <h2><?php echo $this->lang->line("approve_leave_request"); ?></h2>
        </div>


        


    <!-- Down Panel start-->

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
                            <div class="row" style="width: 100%;">
                                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8">
                                    <h5 class="card-header"><?php echo $this->lang->line("leave_history"); ?></h5>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md- col-sm-4 col-4">
                                    <br>
                                    
                                    
                                    
                                  
                               
                            </div>
                            
                       

                            <div class="card-body" >
                                 <h2 style="color:green"> <?php
                                    $dt = $this->session->userdata("msg");
                                    if ($dt != NULL) {
                                        echo $dt;
                                        $this->session->unset_userdata("msg");
                                    }
                                    ?>
                                    
                                </h2>
                                <div class="table-responsive dataTables_wrapper no-footer" >
                                    <div class="section_print" id="section-to-print">
                                    <table class="table table-striped table-bordered first">
                                            <thead>
                                                <tr>
                                                   <!--  <th><?php //echo $this->lang->line("id"); ?></th> -->
                                                   <th><?php echo $this->lang->line("staff_id"); ?></th>
                                                   <th><?php echo $this->lang->line("admission_no"); ?></th>
                                                    <th><?php echo $this->lang->line("leave_date"); ?></th>
                                                    <th><?php echo $this->lang->line("days"); ?></th>
                                                    <th><?php echo $this->lang->line("apply_date"); ?></th>
                                                    <th><?php echo $this->lang->line("status"); ?></th>
                                                    <th><?php echo $this->lang->line("action"); ?></th>
                                                    
                                                   
                                                    
                                                    
                                          
                                                </tr>
                                            </thead> 
                                            
                                            <tbody>

                                                <?php 
                                               

                                                if(isset($allPdt3)){
                                                     $i=0;
                                                   
                                                    foreach ($allPdt3 as $value){
                                                
                                                
                                                ?>
                                                
                                                <tr>
                                                   <!--  <td><?php //echo $value->ID?></td> -->
                                                   <td><?php echo $value->TEACHER_ID?></td>

                                                   
                                                   <!-- <td><?php echo $value->ADMISSION_NO?></td> -->
                                                   <td><a class="std_list_color" href="<?php echo base_url() ?>admin/student/student_details/details/<?php
                                                   echo $value->STUDENT_ID ?>"><?php echo $value->ADMISSION_NO?></a></td> 

                                                   <td><?php echo $value->FROM_DATE?> &emsp;- &emsp;<?php echo $value->TO_DATE?></td>
                                                   <td><?php echo $value->LEAVE_DAYS?></td>
                                                   <td><?php echo $value->APPLIED_DATE?></td>
                                            

                                                   <?php

                                                        if($value->STATUS=="pending"){?>

                                                          
                                                            <td data-toggle="popover" class="detail_popover text-align-cntr" data-original-title="" title=""><small class="label label-warning"><?php echo $value->STATUS?></small></td>
  

                                                            <?php
                                                        }

                                                        
                                                   ?>
                           
                                            

                                                     <td><button class="btn btn-info" onclick="myBtn(
                                                     '<?php echo $value->TEACHER_ID ?>',
                                                     
          
                                                     '<?php echo $value->FROM_DATE ?>','<?php echo $value->TO_DATE?>',
                                                     '<?php echo $value->LEAVE_DAYS?>','<?php echo $value->APPLIED_DATE?>',
                                                     '<?php echo $value->ADMISSION_NO?>')"><i class="fas fa-align-justify"></i></button></td> 

        
                                                    
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


<!- HTML JS Modal -->



<form class="needs-validation" novalidate="" action="<?php echo base_url() ?>student/studentleave/approved_student_leave_request_submit" method="post">

    <div id="myModal" class="modal">

      <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <br>

                
                <h3  class="border-bottom" style="text-align: center;">Details</h3>

                 <div id="section-to-print" class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                        
                   
                        <label for="validationCustom01"><?php echo $this->lang->line("staff_id"); ?></label>
                        <input type="text" readonly class="form-control" name="staff_id" id="staff_id">
                        <br>
                        <label for="validationCustom01"><?php echo $this->lang->line("leave_from"); ?></label>
                        <input type="text"  class="form-control" readonly="" name="leave_from" id="leave_from">
                        <br>
                        
                      
                        <label for="validationCustom01"><?php echo $this->lang->line("days"); ?></label>
                        <input type="text" class="form-control" readonly="" name="days"  id="days" required="">
                        <br>

                        <label for="validationCustom01"><?php echo $this->lang->line("admission_no"); ?></label>
                        <input type="text" class="form-control" readonly="" name="admission_no"  id="admission_no" required="">
                        
                      
                         
                        

                        
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                        <?php 
                           
                        ?>


             

                        <label for="validationCustom01"><?php echo $this->lang->line("apply_date"); ?></label>
                        <input type="text" class="form-control" readonly="" name="apply_date"  id="apply_date" required="">

                        <br>
                       
                        <label for="validationCustom01"><?php echo $this->lang->line("leave_to"); ?></label>
                        <input type="text" readonly class="form-control" name="leave_to" value="" id="leave_to">
                        <br>
                       

                        <label for="validationCustom01"><?php echo $this->lang->line("status"); ?></label><br>
                                  
                        <div class="radio_brder"style="border: 1px solid #ddd;padding-top: 5px;padding-left: 3px;">

                            <input type="radio" id="status" name="status" value="pending" checked/> 
                            <label for="validationCustom01" > Pending</label>

                                                &emsp;
                                                &emsp;

                        <input type="radio" id="status" name="status" value="approved" /> 
                            <label for="validationCustom01"> Approved</label>
                                                 &emsp;
                                                  &emsp;

                        <input type="radio" id="status" name="status" value="disapprove" /> 
                            <label for="validationCustom01"> Disapprove</label>
                            
                        </div>

                        
                        
                                    
                                  
                       
                       
                    </div>
                    <br>

                    <div class="row pull-left">
                        <div class="col-xl-4 col-lg-4  col-md-4 col-sm-4 col-4 ">
                            <br>
                            <button class="btn btn-success" type="submit">Save</button>
                        </div>
                    </div>
                </div> 


                <br>
                <br>
                    


                
    </div>
</div>    

</form>


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




   
</script>

<script type="text/javascript">
    document.querySelector("#today2").valueAsDate = new Date();
</script>


<script>
 
    function myBtn(teacher_id,leave_from,leave_to,leave_days,applied_date,admission_no){

    modal.style.display = "block";

   

   $('#staff_id').val(teacher_id);
   $('#admission_no').val(admission_no);

    $('#leave_from').val(leave_from);


    $('#leave_to').val(leave_to);

 
   
    $('#days').val(leave_days);


   
    $('#apply_date').val(applied_date);

    

    }
    var modal = document.getElementById("myModal");

    var btn = document.getElementById("myBtn1");

    var span = document.getElementsByClassName("close")[0];


    span.onclick = function() {
      modal.style.display = "none";
    }

  
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
</script>

