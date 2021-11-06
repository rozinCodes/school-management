
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
                        <form  enctype="multipart/form-data" class="needs-validation" novalidate action="<?php echo base_url(); ?>admin/online_exam/question" method="post">
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
                                    <label for="validationCustom01"><?php echo $this->lang->line("subjects"); ?></label><small class="req"> *</small>
                                    <select type="text"  data-toggle="dropdown" class="form-control dropdown-toggle"  id="scid"  name="subjectsid" value="" required>
                                        <option><?php echo $this->lang->line("choose_class"); ?></option>


                                    </select>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <br>
                                <br>
                                   <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <label for="validationCustom01">Question*</label><small class="req"> </small>
                                    <input type="text" class="form-control" id="validationCustom01" placeholder=" Question " name="question" value="" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <br>
                                   <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <label for="validationCustom01">Option A *</label><small class="req"> </small>
                                    <input type="text" class="form-control" id="validationCustom01" placeholder="Option A" name="a" value="" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <label for="validationCustom01">Option B *</label><small class="req"> </small>
                                    <input type="text" class="form-control" id="validationCustom01" placeholder="Option B" name="b" value="" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <label for="validationCustom01">Option C *</label><small class="req"> </small>
                                    <input type="text" class="form-control" id="validationCustom01" placeholder="Option C " name="c" value="" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <label for="validationCustom01">Option D *</label><small class="req"> </small>
                                    <input type="text" class="form-control" id="validationCustom01" placeholder="Option D" name="d" value="" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <label for="validationCustom01">Option E *</label><small class="req"> </small>
                                    <input type="text" class="form-control" id="validationCustom01" placeholder="Option E" name="e" value="" >
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                     <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <label for="exampleInputEmail1">Correct Ans</label><small class="req"> *</small>


                                            <div class="checkbox">
                                                <label>
                                               <input type="checkbox" name="sections[]" value="opt_a"  > A     <input type="checkbox" name="sections[]" value="opt_b"  > B     <input type="checkbox" name="sections[]" value="opt_c"  > C     <input type="checkbox" name="sections[]" value="opt_d"  > D    <input type="checkbox" name="sections[]" value="opt_e"  > E
                                                </label>
                                            </div>
                                           

                                        <span class="text-danger"><?php echo form_error('sections[]'); ?></span>
                                    </div>
                            
                           
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
                                        <th>Question<?php echo $this->lang->line("question"); ?></th> 
                                        <th>Class</th>
                                        <th>Subject</th>
                                        <th>Option A</th>
                                        <th>Option B</th>
                                        <th>Option C</th>
                                        <th>Option D</th>
                                        <th>Option E</th>
                                        <th>Correct Ans</th>
                                        <th><?php echo $this->lang->line("delete"); ?></th>

                                    </tr>
                                </thead>
                                <tbody>
<?php
$i=1;
if (isset($allQub)) {
    foreach ($allQub as $value) {
        ?>
                                            <tr>
                                                <td><?php echo $i;$i++; ?></td>
                                                <td><?php echo $value->QUESTION ?></td>
                                                <td><?php echo $value->CLASSES ?></td>
                                                <td><?php echo $value->NAME ?></td>
                                                <td><?php echo $value->OPT_A ?></td>
                                                <td><?php echo $value->OPT_B ?></td>
                                                <td><?php echo $value->OPT_C ?></td>
                                                <td><?php echo $value->OPT_D ?></td>
                                                <td><?php echo $value->OPT_E ?></td>
                                                <td>
                                                <?php
                                                foreach($allQcd as $kk){
                                                    if($kk->QUESTIONSID==$value->ID){
                                                ?>
                                                <?php echo $kk->CORRECT ?><br>
                                                
                                                <?php
                                                    }
                                                }
                                                ?>
                                                </td>
                                                <td> <a class="btn btn-danger" href="<?php echo base_url() . "admin/online_exam/questiondelete/{$value->ID}" ?>"><?php echo $this->lang->line("delete"); ?></a></td>

                                            </tr>
        <?php
    }
}
?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                    <th>#<?php echo $this->lang->line("id"); ?></th>
                                        <th>Question<?php echo $this->lang->line("question"); ?></th> 
                                        <th>Class</th>
                                        <th>Option A</th>
                                        <th>Option B</th>
                                        <th>Option C</th>
                                        <th>Option D</th>
                                        <th>Option E</th>
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
    
    foreach ($allSub as $scat) {
        if ($scat->CLASSESID == $cat->ID) {
            echo "sc += '<option value=\"{$scat->ID}\">$scat->NAME</option>';";
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
