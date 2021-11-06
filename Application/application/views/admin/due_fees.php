
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
            <h2><?php echo $this->lang->line("due_fees"); ?></h2>
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
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line("due_fees"); ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- end pageheader -->

        <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
            <div class="card">
                <h5 class="card-header"></h5>

                <div class="card-body">
                    <h2 style="color:green"> </h2>

                    <form class="needs-validation" novalidate="" action="<?php echo base_url() ?>admin/fees/due_fees" method="post">

                        <div class="row">


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

                            <div class="col-xl-3 col-lg-3  col-md-3 col-sm-3 col-3 ">

                                     <label for="validationCustom01"><?php echo $this->lang->line("fees_type"); ?></label>
                                 <select class="form-control" id="validationCustom01" name="fees_type">
                                  <?php 
                                            if(isset($allPdt4)){
                                                foreach ($allPdt4 as $value){
                                                   
                                                    ?>

                                                    <option value="<?php echo $value->ID?>"><?php echo $value->FEES_NAME?></option>
                                                    
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
                                    <button class="btn btn-primary my_btn_style" type="submit">Search</button>
                            </div>

                        </div>

                        <br>
                       
                        <br><br> <br>


                    </form>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
            
            <div class="card">
                <h5 class="card-header"></h5>

                <div class="card-body">
                    <h2 style="color:green"> </h2>

                    <form class="needs-validation" novalidate="" action="<?php echo base_url() ?>admin/fees/due_fees2" method="post">

                        <div class="row">

                           


                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-4 col-8">
                                <label for="validationCustom01"><?php echo $this->lang->line("admission_no"); ?></label>
                                    <input type="number" name="search_admission" class="form-control" id="validationCustom01" value="" placeholder="search by admission no" required="">
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

        <!-- ============================================================== -->
    </div>


        <!-- ============================================================== -->

        <div class="row">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <h2><?php echo $this->lang->line("due_fees"); ?></h2>
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
                                    <h5 class="card-header"><?php echo $this->lang->line("due_fees"); ?></h5>
                                </div>
                               
                            </div>
                            


                            <div class="card-body">
                                <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                               <!--  <th><?php //echo $this->lang->line("id"); ?></th> -->
                                                <th><?php echo $this->lang->line("f_name"); ?></th>
                                                <th><?php echo $this->lang->line("admission_no"); ?></th>
                                                <th><?php echo $this->lang->line("class"); ?></th>
                                                <th><?php echo $this->lang->line("section"); ?></th>
                                                <th><?php echo $this->lang->line("fees_type"); ?></th>
                                                <th><?php echo $this->lang->line("total_fees"); ?></th>
                                                <th><?php echo $this->lang->line("discount"); ?></th>
                                                <th><?php echo $this->lang->line("due_fees"); ?></th>
                                                <th><?php echo $this->lang->line("paid_fees"); ?></th>
                                                <th><?php echo $this->lang->line("fees_status"); ?></th>
                                                <th><?php echo $this->lang->line("month"); ?></th>
                                                <th><?php echo $this->lang->line("year"); ?></th>
                                                
                                                
                                                 
                                                <th><?php echo $this->lang->line("edit"); ?></th>
                                                <th><?php echo $this->lang->line("delete"); ?></th>
                                      
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 

                                            if(isset($allPdt)){
                                                foreach ($allPdt as $value){
                                            
                                            
                                            ?>
                                            <tr>
                                               <!--  <td><?php //echo $value->ID?></td> -->
                                                <td><?php echo $value->F_NAME?></td>
                                                <td><?php echo $value->ADMISSION_NO?></td>
                                                
                                                <td><?php echo $value->CLASSES?></td>
                                                <td><?php echo $value->NAME?></td>
                                                <td><?php echo $value->FEES_NAME?></td>
                                                <td><?php echo $value->TOTAL_FEES?></td>
                                                <td><?php echo $value->DISCOUNT?> % </td>
                                                <td><?php echo $value->DUE_AMOUNT?></td>
                                                <td><?php echo $value->PAID_AMOUNT?></td>
                                                <!--  -->
                                            <?php 

                                                      


                                                        if($value->STATUS=="not paid"){ ?>

                                                            <td style="color:#f44336;font-size: 15px;"><b><?php echo $value->STATUS?></b></td> <?php
                                                        }else if($value->STATUS=="paid"){ ?>

                                                            <td style="color:#4caf50;font-size: 15px;"><b><?php echo $value->STATUS?></b></td> <?php

                                                        }
                                                        else { ?>

                                                            <td style="color:#cddc39; font-size: 15px; " ><b><?php echo $value->STATUS?></b></td> <?php

                                                        }

                                                         ?>

                                                         
                                            <!--  -->
                                                <td><?php echo $value->MONTH?></td>
                                                <td><?php echo $value->YEAR?></td>
                                                <td><a href="<?php echo base_url()."task/task_category?edit={$value->ID}"?>"><?php echo $this->lang->line("edit"); ?></a></td>
                                                <td> <a href="<?php echo base_url()."task/category_delete/{$value->ID}"?>"><?php echo $this->lang->line("delete"); ?></a></td>
                                                
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