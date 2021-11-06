
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
                <h2><?php echo $this->lang->line("fees_amount"); ?></h2>
            </div>


        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title"><?php echo $this->lang->line("sections"); ?> </h2>
                   
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("dashboard"); ?></a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("accounts"); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line("fees_amount"); ?></li>
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

                            




                        <form class="needs-validation" novalidate action="<?php echo base_url() ?>admin/fees/edit_fees/edit/<?php echo $value->ID?>"  method="post">



                            <div class="row">
                                <div class="col-xl-3 col-lg-3  col-md-3 col-sm-3 col-3 ">
                                    
                                    <label for="validationCustom01"><?php echo $this->lang->line("class"); ?></label>

                                     
                                    
                                     <select class="form-control" id="validationCustom01" name="class">
                                        <?php 
                                        if(isset($allPdt)){
                                            foreach ($allPdt as $value){
                                               
                                                ?>

                                                <option value="<?php echo $value->ID?>"><?php echo $value->CLASSES?></option>
                                                
                                                <?php
                                            }
                                        }
                                        
                                        ?> 
                                  </select> 
                                  <div class="valid-feedback">
                                    Looks good!
                                 </div>
                                </div>

                                

                            

                                <div class="col-xl-3 col-lg-3  col-md-3 col-sm-3 col-3 ">
                                     <label for="validationCustom01"><?php echo $this->lang->line("section"); ?></label>
                                     <select class="form-control" id="validationCustom01" name="section">
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

                                <div class="col-xl-3 col-lg-3  col-md-3 col-sm-3 col-3 ">
                                     <label for="validationCustom01"><?php echo $this->lang->line("fees_type"); ?></label>
                                     <select  class="form-control" name="fees_name2" id="validationCustom01">

                                                    <?php 
                                                    if(isset($allPdt)){
                                                        foreach ($allPdt as $value){
                                                           
                                                            ?>


                                                            <option  value="<?php echo $value->FEES_TYPE_ID?>"><?php echo $value->FEES_NAME?></option>
                                                            
                                                            <?php
                                                        }
                                                    }
                                                    
                                                    ?>
                                                </select>
                                    <div class="valid-feedback">
                                    Looks good!
                                    </div>
                                </div>

                            <div class="col-xl-3 col-lg-3  col-md-3 col-sm-3 col-3 ">
                                 <label for="validationCustom01"><?php echo $this->lang->line("fees_amount"); ?></label>
                                 <input type="text" class="form-control" id="validationCustom01" placeholder="Fees Amount" name="fees_amount" value="<?php echo $value->AMOUNT;/*ai value ta ki vab a koj kora buji nai,,,but kaj kora*/ ?>" required>

                                 


                                <div class="valid-feedback">
                                Looks good!
                                </div>
                            </div>


                        </div>

                        <br>

                        <div class="row">
                            

                                <div class="col-xl-3 col-lg-3  col-md-3 col-sm-3 col-3 ">
                                     <label for="validationCustom01"><?php echo $this->lang->line("month"); ?></label>
                                     <select  class="form-control" name="month" id="validationCustom01">


                                              
                                              <option value="jan">JANUARY</option>
                                              <option value="feb">FEBRUARY</option>
                                              <option value="march">MARCH</option>
                                              <option value="april">APRIL</option>
                                              <option value="may">MAY</option>
                                              <option value="june">JUNE</option>
                                              <option value="july">JULY</option>
                                              <option value="aug">AUGUEST</option>
                                              <option value="sep">SEPTEMBER</option>
                                              <option value="oct">OCTOBER</option>
                                              <option value="nov">NOVEMBER</option>
                                              <option value="dec">DECEMBER</option>

                                    </select>
                                    <div class="valid-feedback">
                                    Looks good!
                                    </div>
                                </div>


                                <div class="col-xl-3 col-lg-3  col-md-3 col-sm-3 col-3  ">
                                     <label for="validationCustom01"><?php echo $this->lang->line("year"); ?></label>
                                     <select  class="form-control" name="year" id="validationCustom01">

                                              <option value="2019">2019</option>
                                              <option value="2020">2020</option>
                                              <option value="2021">2021</option>
                                              <option value="2022">2022</option>
                                              <option value="2023">2023</option>
                                              <option value="2024">2024</option>
                                              <option value="2025">2025</option>
                                              <option value="2026">2026</option>
                                              <option value="2027">2027</option>
                                              <option value="2028">2028</option>
                                              <option value="2029">2029</option>
                                              <option value="2030">2030</option>

                                    </select>
                                    <div class="valid-feedback">
                                    Looks good!
                                    </div>
                                </div>




                                    <div class="col-xl-3 col-lg-3  col-md-3 col-sm-3 col-3  ">
                                        <!-- input style="margin-top: 29px;" type="submit" value="<?php echo $this->lang->line("search"); ?>"> -->
                                        <button class="btn btn-primary my_btn_style" type="submit"><?php echo $this->lang->line("update");?></button>


                                    </div>

                                

                           

                        </div>

                        
                    <br><br> <br>
                    
                   
                     </form>
                    </div>
                </div>
            </div>


            
                                    
     <div class="valid-feedback">
       Looks good!
    </div>
    </div>
                              

   </div>
  <br>

            <!-- ============================================================== -->
            <?php 
            }
                 }
           }
            else{
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
                        <form class="needs-validation" novalidate action="<?php echo base_url() ?>admin/fees/add_fees_amount_specific_student" method="post">


                            <div class="row">


                                <div class="col-xl-3 col-lg-3  col-md-3 col-sm-3 col-3 ">
                                   <label for="validationCustom01"><?php echo $this->lang->line("admission_no"); ?></label>
                                   <input type="text" class="form-control" id="validationCustom01" placeholder="Admission No" name="admission_no" value="" required>
                                  <div class="valid-feedback">
                                  Looks good!
                                  </div>
                               </div>


                               <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
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
                                        </div>

                                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("class"); ?></label>

                                        <select class="form-control" name="class" id="class_id" required="">
                                            <option value="" selected><?php echo $this->lang->line("class"); ?></option>


                                        </select>


                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>

                            

                                <div class="col-xl-3 col-lg-3  col-md-3 col-sm-3 col-3 ">
                                     <label for="validationCustom01"><?php echo $this->lang->line("section"); ?></label>
                                     <select class="form-control" id="validationCustom01" name="section">
                                      <?php 
                                                if(isset($allPdt3)){
                                                    foreach ($allPdt3 as $value){
                                                       
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

                                

                            


                        </div>

                        <br>

                        <div class="row">

                        <div class="col-xl-3 col-lg-3  col-md-3 col-sm-3 col-3 ">
                                     <label for="validationCustom01"><?php echo $this->lang->line("fees_type"); ?></label>
                                     <select  class="form-control" name="fees_name2" id="validationCustom01">

                                                    <?php 
                                                    if(isset($allPdt)){
                                                        foreach ($allPdt as $value){
                                                           
                                                            ?>


                                                            <option  value="<?php echo $value->ID?>"><?php echo $value->FEES_NAME?></option>
                                                            
                                                            <?php
                                                        }
                                                    }
                                                    
                                                    ?>
                                                </select>
                                    <div class="valid-feedback">
                                    Looks good!
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-3  col-md-3 col-sm-3 col-3 ">
                                       <label for="validationCustom01"><?php echo $this->lang->line("fees_amount"); ?></label>
                                       <input type="text" class="form-control" id="validationCustom01" placeholder="Fees Amount" name="fees_amount" value="" required>
                                      <div class="valid-feedback">
                                      Looks good!
                                      </div>
                                  </div>
                                  

                                <div class="col-xl-3 col-lg-3  col-md-3 col-sm-3 col-3 ">
                                     <label for="validationCustom01"><?php echo $this->lang->line("month"); ?></label>
                                     <select  class="form-control" name="month" id="validationCustom01">

                                              <option value="jan">JANUARY</option>
                                              <option value="feb">FEBRUARY</option>
                                              <option value="march">MARCH</option>
                                              <option value="april">APRIL</option>
                                              <option value="may">MAY</option>
                                              <option value="june">JUNE</option>
                                              <option value="july">JULY</option>
                                              <option value="aug">AUGUEST</option>
                                              <option value="sep">SEPTEMBER</option>
                                              <option value="oct">OCTOBER</option>
                                              <option value="nov">NOVEMBER</option>
                                              <option value="dec">DECEMBER</option>

                                    </select>
                                    <div class="valid-feedback">
                                    Looks good!
                                    </div>
                                </div>


                                <div class="col-xl-3 col-lg-3  col-md-3 col-sm-3 col-3  ">
                                     <label for="validationCustom01"><?php echo $this->lang->line("year"); ?></label>
                                     <select  class="form-control" name="year" id="validationCustom01">

                                              <option value="2019">2019</option>
                                              <option value="2020">2020</option>
                                              <option value="2021">2021</option>
                                              <option value="2022">2022</option>
                                              <option value="2023">2023</option>
                                              <option value="2024">2024</option>
                                              <option value="2025">2025</option>
                                              <option value="2026">2026</option>
                                              <option value="2027">2027</option>
                                              <option value="2028">2028</option>
                                              <option value="2029">2029</option>
                                              <option value="2030">2030</option>

                                    </select>
                                    <div class="valid-feedback">
                                    Looks good!
                                    </div>
                                </div>
                                
                               <!-- // -->
                               
                                
                                <!--//  -->





                                    


                                

                           

                        </div>
                        <br>

                        <div class="row">
                        <div class="col-xl-3 col-lg-3  col-md-3 col-sm-3 col-3 ">
                                   <label for="validationCustom01"><?php echo $this->lang->line("discount"); ?></label>
                                   <input type="text" class="form-control" id="validationCustom01" placeholder="Discount" name="discount" value="" required>
                                  <div class="valid-feedback">
                                  Looks good!
                                  </div>
                               </div>

                          <div class="col-xl-3 col-lg-3  col-md-3 col-sm-3 col-3 ">

                            <td>
                                <div>
                                    <label>
                                      <input type="radio" name="insert_type" id="option1" value="add" checked>  Add
                                     </label>
                                        &emsp;
                                    <label>
                                        <input type="radio" name="insert_type" value="edit" id="option1"> Edit
                                    </label>
                                                         
                                                          
                                </div>

                              </td>
                            
                          </div>

                          
                          
                        </div>

                        <div class="row">
                          <div class="col-xl-3 col-lg-3  col-md-3 col-sm-3 col-3  ">
                                        <!-- input style="margin-top: 29px;" type="submit" value="<?php echo $this->lang->line("search"); ?>"> -->
                              <button class="btn btn-primary my_btn_style" type="submit"><?php echo $this->lang->line("submit");?></button>
                          </div>
                          
                        </div>


                        
                    <br><br> <br>
                    
                   
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
<script>
 function test2() {
       

        

       
    var c = document.getElementById("version_id").value;
         alert(c);
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