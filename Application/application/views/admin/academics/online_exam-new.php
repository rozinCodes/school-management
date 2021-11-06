
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
                <?php
                if (isset($_GET['add'])) {
                    ?>
                    <div class="card">
                        <h5 class="card-header">onlineexam questions</h5>

                        <div class="card-body">
                            <form  enctype="multipart/form-data" class="needs-validation" novalidate action="<?php echo base_url(); ?>admin/online_exam/onlineexam_questions" method="post">

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">

                                    <input type="hidden" class="form-control" id="validationCustom01" placeholder=" Title" name="onlineexam_id" value="<?php echo $_GET['add'] ?>" required>

                                </div>

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
                                    <label for="validationCustom01"><?php echo $this->lang->line("class"); ?></label>
                                    <select  class="form-control" name="class" id="cls" required="">

                                        <option value="0" selected>Choose class</option>

                                        <?php
                                        foreach ($allCls as $value) {
                                            ?>

                                            <option value="<?php echo $value->ID; ?>"><?php echo $value->CLASSES ?></option>

                                            <?php
                                        }
                                        ?>
                                    </select>


                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <br>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <label for="validationCustom01"><?php echo $this->lang->line("subject"); ?></label><small class="req"> *</small>
                                    <select type="text"  data-toggle="dropdown" class="form-control dropdown-toggle"  id="sub"  name="classesid" value="" required>
                                       <!--  <option value=""><?php echo $this->lang->line("choose_class"); ?></option> -->

                                        <option value="0" selected>Choose class</option>

                                    </select>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <label for="validationCustom01">Questions</label><small class="req"> *</small>
                                    <div  id="quc"  name="section_id" value="" >


                                    </div>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="form-row">




                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <?php
                }else if(isset($_GET['edit'])){
                    foreach($allOne as $pp){
                        if($_GET['edit']==$pp->ID){

                    ?>
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
                            <form  enctype="multipart/form-data" class="needs-validation" novalidate action="<?php echo base_url(); ?>admin/online_exam/update" method="post">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <label for="validationCustom01">Exam Title </label><small class="req"> *</small>
                                        <input type="hidden" class="form-control" id="validationCustom01" placeholder=" Title" name="id" value="<?php echo $pp->ID; ?>" required>
                                    
                                        <input type="text" class="form-control" id="validationCustom01" placeholder=" Title" name="exam_title" value="<?php echo $pp->EXAM_TITLE; ?>" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <label for="validationCustom01">Exam From *</label><small class="req"> *</small>
                                        <input type="text" class="form-control" id="datepicker-15" placeholder=" Exam From " name="exam_from" value="<?php echo $pp->EXAM_FROM; ?>" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <label for="validationCustom01">Exam To</label><small class="req"> *</small>
                                        <input type="text" class="form-control" id="datepicker-16" placeholder="Exam To" name="exam_to" value="<?php echo $pp->EXAM_TO; ?>" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <label for="validationCustom01">Time Duration</label><small class="req"> *</small>
                                        <input type="number" class="form-control" id="validationCustom01" placeholder=" duration" name="duration" value="<?php echo $pp->DURATION; ?>" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <label for="validationCustom01">Attempt</label><small class="req"> *</small>
                                        <input type="number" class="form-control" id="validationCustom01" placeholder=" Attempt" name="attempt" value="<?php echo $pp->ATTEMPT; ?>" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <label for="validationCustom01">Passing Percentage </label><small class="req"> *</small>
                                        <input type="text" class="form-control" id="validationCustom01" placeholder=" Passing" name="passing_percentage" value="<?php echo $pp->PASSING_PERCENTAGE; ?>" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <br>

                                </div>
                                <br>
                                <div class="form-row">




                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <button class="btn btn-primary" type="submit">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php
                }
            }
             }else if(isset($_GET['view'])){
                 
                ?>
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
                            <form  enctype="multipart/form-data" class="needs-validation" novalidate action="<?php echo base_url(); ?>admin/online_exam/insert" method="post">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <?php
                                    $j=1;
                                    foreach($allPub as $pp){
                                        if($pp->ONLINEEXAM_ID==$_GET['view']){
                                    
                                    ?>
                                      <?php echo $j;$j++;?> .<label for="validationCustom01"><?php echo $pp->QUESTION; ?> </label><br>
                                       <?php
                                    }
                                }
                                       ?>
                                    </div>
                                    <br>
                            

                                </div>
                                <br>
                           
                            </form>
                        </div>
                    </div>
                <?php
             }
                else {
                    ?>
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
                            <form  enctype="multipart/form-data" class="needs-validation" novalidate action="<?php echo base_url(); ?>admin/online_exam/insert" method="post">
                                <div class="row">

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <label for="validationCustom01"><?php echo $this->lang->line("version"); ?></label><small class="req"> *</small>
                                    <select type="text"  data-toggle="dropdown" class="form-control dropdown-toggle"  id="version"  name="version" value="" required>
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
                                    <select type="text"  data-toggle="dropdown" class="form-control dropdown-toggle"  id="class"  name="class" value="" required>
                                        <option value="0"><?php echo $this->lang->line("choose_class"); ?></option>
                                      
                                    </select>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <label for="validationCustom01"><?php echo $this->lang->line("session"); ?></label><small class="req"> *</small>
                                    <select type="text"  data-toggle="dropdown" class="form-control dropdown-toggle"  id="scid"  name="session" value="" required>
                                        <option><?php echo $this->lang->line("choose"); ?></option>
                                        <?php
                                        foreach ($allSet as $value) {
                                            ?>
                                            <option value="<?php echo $value->ID ?>"><?php echo $value->SESSIONS; ?></option>

                                            <?php
                                        }
                                        ?>

                                    </select>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <label for="validationCustom01">Exam Title </label><small class="req"> *</small>
                                        <input type="text" class="form-control" id="validationCustom01" placeholder=" Title" name="exam_title" value="" required>
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
                                    <br>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <label for="validationCustom01">Time Duration</label><small class="req"> *</small>
                                        <input type="number" class="form-control" id="validationCustom01" placeholder=" duration" name="duration" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <label for="validationCustom01">Attempt</label><small class="req"> *</small>
                                        <input type="number" class="form-control" id="validationCustom01" placeholder=" Attempt" name="attempt" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <label for="validationCustom01">Passing Percentage </label><small class="req"> *</small>
                                        <input type="text" class="form-control" id="validationCustom01" placeholder=" Passing" name="passing_percentage" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <br>

                                </div>
                                <br>
                                <div class="form-row">




                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <?php
                }
                ?>
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
                                        <th>exam_title</th> 
                                        <th>exam_from</th>
                                        <th>exam_to</th>
                                        <th>duration</th>
                                        <th>passing_percentage</th>
                                        <th>Add Question</th>
                                        <th><?php echo $this->lang->line("action"); ?></th>
                                        <th><?php echo $this->lang->line("edit"); ?></th>
                                        <th><?php echo $this->lang->line("delete"); ?></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($allPdt)) {
                                        foreach ($allPdt as $value) {
                                            ?>
                                            <tr>
                                                <td><?php echo $value->ID ?></td>
                                                <td><?php echo $value->EXAM_TITLE ?></td>
                                                <td><?php echo $value->EXAM_FROM ?></td>
                                                <td><?php echo $value->EXAM_TO ?></td>
                                                <td><?php echo $value->DURATION ?></td>
                                                <td><?php echo $value->PASSING_PERCENTAGE ?></td>
                                                <td><a type="button" href="<?php echo base_url() . "admin/online_exam?add={$value->ID}" ?>" class="btn btn-primary"   >Add Question</a></td>
                                                <td><a type="button" href="<?php echo base_url() . "admin/online_exam?view={$value->ID}" ?>" class="btn btn-success" >View Question</a></td>
                                               
                                                <td><a class="btn btn-info" href="<?php echo base_url() . "admin/online_exam?edit={$value->ID}" ?>"><?php echo $this->lang->line("edit"); ?></a></td>
                                                <td> <a class="btn btn-danger" href="<?php echo base_url() . "admin/online_exam/delete/{$value->ID}" ?>"><?php echo $this->lang->line("delete"); ?></a></td>

                                            </tr>


                                            <?php
                                        }
                                    }
                                    ?>


                                </tbody>
                                <tfoot>
                                    <tr>
                                    <th>#<?php echo $this->lang->line("id"); ?></th>
                                        <th>exam_title</th> 
                                        <th>exam_from</th>
                                        <th>exam_to</th>
                                        <th>duration</th>
                                        <th>passing_percentage</th>
                                        <th>Add Question</th>
                                        <th><?php echo $this->lang->line("action"); ?></th>
                                        <th><?php echo $this->lang->line("edit"); ?></th>
                                        <th><?php echo $this->lang->line("delete"); ?></th>

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
      var pp=$("#versionsid").val();
      var sp="";
      if (pp == 0) {
                sp += "<option value='0'>Choose Version First</option>";
            }
            <?php
            
            foreach ($allVdt as $pcat) {
                echo "else if (pp==$pcat->ID){";
                echo "sp += '<option value=\"0\">Choose change....</option>';";
                foreach ($allCls as $scatp) {
                    if ($scatp->VERSIONSID == $pcat->ID) {
                    echo "sp += '<option value=\"{$scatp->ID}\">$scatp->CLASSES</option>';";
                }
            }
                echo "}";
            }
            ?>
   

 
            $("#cls").html(sp);  

  });

        $("#cls").change(function () {
            var c = $("#cls").val();
            var sc = "";
            
           
            if (c == 0) {
                sc += "<option value='0'>Choose Class First</option>";
            }
<?php
foreach ($allCls as $cat) {
    echo "else if (c==$cat->ID){";
    echo "sc += '<option value=\"0\">Choose change</option>';";
    foreach ($allSub as $scat) {

        if ($cat->ID == $scat->CLASSESID) {

            echo "sc += '<option value=\"{$scat->ID}\">$scat->NAME</option>';";
        }
    }

    echo "}";
}
?>
  $("#sub").html(sc);
        });
                $("#sub").change(function () {
            var cc = $("#sub").val();
            var scc = "";
            if (cc == 0) {
                scc += "<option value='0'>Choose Class First</option>";
            }
<?php
foreach ($allSub as $qdt) {
    echo " else if (cc == $qdt->ID) {";
    foreach ($allQdt as $qqt) {
        if ($qqt->SUBJECT_ID == $qdt->ID) {
            echo" scc += \"<input type='checkbox' name='sections[]' value='{$qqt->ID}'> {$qqt->QUESTION}<br>\";";
        }
    }
    echo "}";
}
?>


            $("#quc").html(scc);
        });


    });


</script>

<script>
    $(document).ready(function () {
 $("#cls").change(function () {
            var c = $("#cls").val();
           // alert(c);
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
         $( "#datepicker-15" ).datepicker();
          $( "#datepicker-16" ).datepicker();
    });

  $(document).ready(function(){
      $("#version").change(function(){
          var ls=$("#version").val();
          var sl="";

          if (ls == 0) {
            sl += "<option value='0'>Choose Class Version</option>";
            }
            <?php
foreach ($allVdt as $lcat) {
    echo "else if (ls==$lcat->ID){";
     echo "sl += '<option value=\"0\">Choose change Class</option>';";
    foreach ($allCls as $lscat) {
        if ($lscat->VERSIONSID == $lcat->ID) {
            echo "sl += '<option value=\"{$lscat->ID}\">$lscat->CLASSES</option>';";
        }
    }
    echo "}";
}
?>
            $("#class").html(sl);
      });
  });


</script>