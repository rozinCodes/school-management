
<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
      rel = "stylesheet">
<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
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
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title"><?php echo $this->lang->line("online_exam"); ?> </h2>

                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("dashboard"); ?></a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("online_exam"); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line("online_exam"); ?></li>
                            </ol>
                        </nav>
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

            <!-- =======================Edit Part =============================== -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          
                    <div class="card">
                        <h5 class="card-header"><?php echo $this->lang->line("online_exam"); ?></h5>

                        <div class="card-body">
                            <h2 style="color:green"> <?php
                                $dt = $this->session->userdata("msg");
                                if ($dt != NULL) {
                                    echo $dt;
                                    $this->session->unset_userdata("msg");
                                }
                                ?></h2>
                            <form  enctype="multipart/form-data" class="needs-validation" novalidate action="<?php echo base_url(); ?>admin/reports/onlineexam_reports" method="post">
                                <div class="row">
                                    
                                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <label for="validationCustom01"><?php echo $this->lang->line("version"); ?></label><small class="req"> *</small>
                                    <select type="text"  data-toggle="dropdown" class="form-control dropdown-toggle"  id="versionsid"  name="versions" value="" required>
                                        <option value="0">Choose Version</option>
                                        
  <?php
                                        foreach ($allVdt as $value) {
                                            ?>
                                            <option value="<?php echo $value->ID ?>"><?php echo $value->VERSION; ?></option>

                                            <?php
                                        }
                                        ?>
                                   

                                    </select>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <label for="validationCustom01"><?php echo $this->lang->line("class"); ?></label><small class="req"> *</small>
                                    <select type="text"  data-toggle="dropdown" class="form-control dropdown-toggle"  id="cid"  name="classesid" value="" required>
                                        <option value="0"><?php echo $this->lang->line("choose_class"); ?></option>
                                      
                                    </select>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <label for="validationCustom01">Exam Title</label><small class="req"> *</small>
                                    <select type="text"  data-toggle="dropdown" class="form-control dropdown-toggle"  id="scid"  name="exam_title" value="" required>
                                        <option><?php echo $this->lang->line("choose_class"); ?></option>


                                    </select>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                             
                                    <br>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <label for="validationCustom01">Exam From *</label><small class="req"> *</small>
                                        <input type="text" class="form-control" id="datepicker-13" placeholder=" Exam From " name="exam_from" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <label for="validationCustom01">Exam To</label><small class="req"> *</small>
                                        <input type="text" class="form-control" id="datepicker-14" placeholder="Exam To" name="exam_to" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                 

                                </div>
                                <br>
                                <div class="form-row">




                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <input class="btn btn-primary" type="submit" name="search" value="search">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

               
            </div>
            <!-- ============================================================== -->

            <!-- end validation form -->

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Basic Table</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered first">
                                <thead>
                                    <tr>
                                        <th>#<?php echo $this->lang->line("id"); ?></th>
                                        <th><?php echo $this->lang->line("exam_title"); ?>exam_title</th> 
                                        <th><?php echo $this->lang->line("exam_from"); ?></th>
                                        <th><?php echo $this->lang->line("exam_to"); ?></th>
                                        <th><?php echo $this->lang->line("duration"); ?></th>
                                       <th>#<?php echo $this->lang->line("passing_percentage"); ?></th>
                                        <th><?php echo $this->lang->line("admission_no"); ?>exam_title</th> 
                                        <th><?php echo $this->lang->line("f_name"); ?>exam_from</th>
                                        <th><?php echo $this->lang->line("correct_ans"); ?>exam_to</th>
                                        <th><?php echo $this->lang->line("wrong_ans"); ?>duration</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i=1;
                                    if (isset($allPdt)) {
                                        foreach ($allPdt as $value) {
                                            ?>
                                            <tr>
                                                <td><?php echo $i;$i++; ?></td>
                                                <td><?php echo $value->EXAM_TITLE ?></td>
                                                <td><?php echo $value->EXAM_FROM ?></td>
                                                <td><?php echo $value->EXAM_TO ?></td>
                                                <td><?php echo $value->DURATION ?></td>
                                                <td><?php echo $value->PASSING_PERCENTAGE ?></td>
                                                   <td><?php echo $value->ADMISSION_NO ?></td>
                                                <td><?php echo $value->F_NAME ?></td>
                                                <td><?php echo $value->CORRECT_ANS ?></td>
                                                   <td><?php echo $value->WRONG_ANS ?></td>
                                               
                                            </tr>

                                            <?php
                                        }
                                    }
                                    ?>


                                </tbody>
                                <tfoot>
                                               <tr>
                                        <th>#<?php echo $this->lang->line("id"); ?></th>
                                        <th><?php echo $this->lang->line("exam_title"); ?>exam_title</th> 
                                        <th><?php echo $this->lang->line("exam_from"); ?></th>
                                        <th><?php echo $this->lang->line("exam_to"); ?></th>
                                        <th><?php echo $this->lang->line("duration"); ?></th>
                                       <th>#<?php echo $this->lang->line("passing_percentage"); ?></th>
                                        <th><?php echo $this->lang->line("admission_no"); ?>exam_title</th> 
                                        <th><?php echo $this->lang->line("f_name"); ?>exam_from</th>
                                        <th><?php echo $this->lang->line("correct_ans"); ?>exam_to</th>
                                        <th><?php echo $this->lang->line("wrong_ans"); ?>duration</th>

                                    </tr>
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
    $(document).ready(function () {
        $("#versionsid").change(function(){
             var c = $("#versionsid").val();
            var sc = "";
            if (c == 0) {
                sc += "<option value='0'>Choose Class Version</option>";
            }
            
            <?php
foreach ($allVdt as $cat) {
    echo "else if (c==$cat->ID){";
     echo "sc += '<option value=\"0\">Choose change Class</option>';";
    foreach ($allCls as $scat) {
        if ($scat->VERSIONSID == $cat->ID) {
            echo "sc += '<option value=\"{$scat->ID}\">$scat->CLASSES</option>';";
        }
    }
    echo "}";
}
?>
             $("#cid").html(sc);
        });
        
        $("#cid").change(function () {
            var c = $("#cid").val();
            var sc = "";
            if (c == 0) {
                sc += "<option value='0'>Choose Class First</option>";
            }
<?php
foreach ($allCls as $cat) {
    
    echo "else if (c==$cat->ID){";
    echo "sc += '<option value=\"0\">Choose change Class</option>';";
    foreach ($allCat as $scat) {
        if ($scat->CLASSESID == $cat->ID) {
            echo "sc += '<option value=\"{$scat->ID}\">$scat->EXAM_TITLE</option>';";
        }
    }
    echo "}";
}
?>
            $("#scid").html(sc);
        });
        
   
      
    });


</script>


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
    $(function () {
        $("#datepicker-13").datepicker();
        // $( "#datepicker-13" ).datepicker("show");
                $("#datepicker-14").datepicker();
        $("#datepicker-13").datepicker().datepicker("setDate", new Date());
        $("#datepicker-14").datepicker().datepicker("setDate", new Date());
         $( "#datepicker155" ).datepicker();
          $( "#datepicker156" ).datepicker();
    });
</script>