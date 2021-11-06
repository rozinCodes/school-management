
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
            <h2><?php echo $this->lang->line("collect_fees"); ?></h2>
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
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line("collect_fees"); ?></li>
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
                     <h2 style="color:green"> <?php
                                $dt = $this->session->userdata("msg");
                                if ($dt != NULL) {
                                    echo $dt;
                                    $this->session->unset_userdata("msg");
                                }
                                ?></h2>

                    <form class="needs-validation" novalidate="" action="<?php echo base_url() ?>admin/fees/collect_fees" method="post">

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
                                    <option selected="selected" disabled="disabled">Select </option>
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
                                
                            </div>

                            <div class="col-xl-3 col-lg-3  col-md-3 col-sm-3 col-3 ">

                                     <label for="validationCustom01"><?php echo $this->lang->line("fees_type"); ?></label>
                                 <select class="form-control" id="validationCustom01" name="fees_type">
                                     <option selected="selected" disabled="disabled">Select</option>
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



            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
            <div class="card">
                <h5 class="card-header"></h5>

                <div class="card-body">
                    <h2 style="color:green"> </h2>

                    <form class="needs-validation" novalidate="" action="<?php echo base_url() ?>admin/fees/collect_fees2" method="post">

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


<!-- -->
    </div>


    <!-- Down Panel start-->

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
                                                 <th><?php echo $this->lang->line("due_fees"); ?></th>
                                                 <th><?php echo $this->lang->line("month"); ?></th>
                                                 <th><?php echo $this->lang->line("year"); ?></th>
                                                 <th><?php echo $this->lang->line("fees_status"); ?></th>
                                                 <th><?php echo $this->lang->line("collect_fees"); ?></th>
                                                <th><?php echo $this->lang->line("action"); ?></th>
                                                

                                      
                                            </tr>
                                        </thead> 
                                        <tbody>
                                            <?php 

                                            if(isset($allPdt)){
                                                 $i=0;
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
                                                <td><?php echo $value->DUE_AMOUNT?></td> 
                                                <td><?php echo $value->MONTH?></td>
                                                <td><?php echo $value->YEAR?></td>
                                                 <!--  -->
                                            <?php 

                                                      


                                                        if($value->STATUS=="not paid"){ ?>

                                                            <td style="color:#f44336;font-size: 15px;"><button class="btn btn-danger btn-border" ><b><?php echo $value->STATUS?></b></button></td> <?php
                                                        }else if($value->STATUS=="paid"){ ?>

                                                            <td style="color:#4caf50;font-size: 15px;"><button class="btn btn-success btn-border" ><b><?php echo $value->STATUS?></b></button></td> <?php

                                                        }
                                                        else { ?>

                                                            <td style="color:#cddc39; font-size: 15px; " ><button class="btn btn-warning btn-border" ><b><?php echo $value->STATUS?></b></button></td> <?php

                                                        }

                                                         ?>

                                                         
                                            <!--  -->
                                                
                                                <td><button class="btn btn-info btn-border" onclick="myBtn('<?php echo $i++; ?>','<?php echo $value->TOTAL_FEES ?>','<?php echo $value->NAME?>','<?php echo $value->CLASSES ?>','<?php echo $value->ADMISSION_NO?>','<?php echo $value->F_NAME?>','<?php echo $value->MONTH?>','<?php echo $value->YEAR?>','<?php echo $value->FEES_NAME?> ','<?php echo  $value->FEES_TYPE?>','<?php echo  $value->STUDENT_ID?> ')">collect fees</button></td>

                                                <!-- <td><a href="<?php //echo base_url()."task/task_category?edit={$value->ID}"?>"><i class="far fa-edit"></i></a></td>
                                                <td> <a href="<?php //echo base_url()."task/category_delete/{$value->ID}"?>"><i class="fas fa-trash-alt"></i></a></td> -->

                                                <td>
                                                    <a href="<?php echo base_url()."task/task_category?edit={$value->ID}"?>"><i class="far fa-edit"></i></a>

                                                     

                                                    <a href="<?php echo base_url()."task/category_delete/{$value->ID}"?>"><i class="fas fa-trash-alt"></i></a>
                                                    
                                                </td>
                                                
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


    <!-- Down panel End -->


        

    </div>
    
</div>

<!-- ============================================================== -->

<!- HTML JS Modal -->



<form class="needs-validation" novalidate="" action="<?php echo base_url() ?>admin/fees/finaly_collect_fees2" method="post">

    <div id="myModal" class="modal">

      <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                

                <div id="section-to-print" class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                        
                        <h4 id="s_name"></h4>
                        <label for="validationCustom01"><?php echo $this->lang->line("class"); ?></label>
                        <input type="text" readonly class="form-control" name="m_class" id="m_class">
                        <br>
                        <label for="validationCustom01"><?php echo $this->lang->line("section"); ?></label>
                        <input type="text" readonly class="form-control" name="m_section" value="Section : " id="m_section">
                        <br>
                        <label for="validationCustom01"><?php echo $this->lang->line("total_fees"); ?></label>
                        <input type="text" readonly class="form-control" name="m_fees"  id="m_fees">
                        <br>
                        <label for="validationCustom01"><?php echo $this->lang->line("total_pay"); ?></label>
                        <input type="text" class="form-control" name="m_pay"  id="m_pay" required="">
                        <br>
                        
                        <label for="validationCustom01"><?php echo $this->lang->line("payment"); ?></label>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-success">
                                                    <input type="radio" value="Cash" name="options" id="option1">Cash
                                                </label>
                                                <label class="btn btn-success">
                                                    <input type="radio"value="Cheque" name="options" id="option2"> Cheque
                                                </label>
                                                <label class="btn btn-success">
                                                    <input type="radio"value="Mobile Banking" name="options" id="option2">Mobile Banking
                                                </label>
                                                
                        </div>

                        
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                        <?php 
                           
                        ?>

                        <h4><?php echo "Date : " . date("Y/m/d");?></h4>

                        <label for="validationCustom01"><?php echo $this->lang->line("admission_no"); ?></label>
                        <input type="text" readonly class="form-control" name="m_admission" id="m_admission">
                        <br>
                        <label for="validationCustom01"><?php echo $this->lang->line("month"); ?></label>
                        <input type="text" readonly class="form-control" name="m_month" value="Section : " id="m_month">
                        <br>
                        <label for="validationCustom01"><?php echo $this->lang->line("year"); ?></label>
                        <input type="text" readonly class="form-control" name="m_year"  id="m_year">
                        <br>
                        <label for="validationCustom01"><?php echo $this->lang->line("fees_type"); ?></label>
                        <input type="text" readonly class="form-control" name="m_fees_type"  id="m_fees_type">

                        <br>
                        
                        <input type="hidden" class="form-control" name="m_fees_type_id"  id="m_fees_type_id">
                        <input type="hidden" class="form-control" name="m_student_id"  id="m_student_id">
                       
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-xl-4 col-lg-4  col-md-4 col-sm-4 col-4 ">
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>

                
                <div class="col-xl-4 col-lg-4  col-md-4 col-sm-4 col-4 ">
                    <p onclick="window.print()" class="btn btn-success " type="print">Print</p>
                </div>
                    
                </div>

                
                 
                
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
    // Get the modal
    function myBtn(id,amount,section,class_name,admission_no,name,month,year,fees_type,fees_type_id,student_id){
        
    modal.style.display = "block";
    //alert(amount);
    document.getElementById("s_name").innerHTML ="payment slip of : "+name;
    $('#s_name').val(name);

    document.getElementById("m_class").innerHTML =class_name;
    $('#m_class').val(class_name);


    document.getElementById("m_section").innerHTML =section;
    $('#m_section').val(section);

    document.getElementById("m_fees_type").innerHTML =fees_type;
    $('#m_fees_type').val(fees_type);

    document.getElementById("m_fees_type_id").innerHTML =fees_type_id;
    $('#m_fees_type_id').val(fees_type_id);
    document.getElementById("m_fees_type_id").innerHTML =student_id;
    $('#m_student_id').val(student_id);

    document.getElementById("m_fees").innerHTML =amount;
    $('#m_fees').val(amount);




    document.getElementById("m_admission").innerHTML =admission_no;
    $('#m_admission').val(admission_no);

    document.getElementById("m_month").innerHTML =month;
    $('#m_month').val(month);

    document.getElementById("m_year").innerHTML =year;
    $('#m_year').val(year);


    }
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn1");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    // btn.onclick = function() {
    //   modal.style.display = "block";
    // }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
</script>
<script>
 function test2() {
       

        

       
    var c = document.getElementById("version_id").value;
        
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


