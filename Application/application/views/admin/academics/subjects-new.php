
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
                    <h2 class="pageheader-title"><?php echo $this->lang->line("classes"); ?> </h2>

                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("dashboard"); ?></a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("classes"); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line("classes"); ?></li>
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

            <!-- =======================Start Edit Part =============================== -->
            <?php
            if (isset($_GET['edit'])) {
                foreach ($allSub as $value) {
                    if ($_GET['edit'] == $value->ID) {
                        
                           foreach ($allCls as $scat) {
                                    if ($scat->ID == $value->CLASSESID) {
                                         $categoryid = $scat->VERSIONSID;
                                    }
                                }
                        ?>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header"><?php echo $this->lang->line("subjects"); ?></h5>

                                <div class="card-body">
                                    <h2 style="color:green"> <?php
                                        $dt = $this->session->userdata("msg");
                                        if ($dt != NULL) {
                                            echo $dt;
                                            $this->session->unset_userdata("msg");
                                        }
                                        ?></h2>
                                    <form  enctype="multipart/form-data" class="needs-validation" novalidate action="<?php echo base_url() ?>admin/subjects/edit" method="post">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <input type="hidden" class="form-control" id="validationCustom01" placeholder=" name" name="id" value="<?php echo $value->ID ?>" required>

                                                <label for="validationCustom01"><?php echo $this->lang->line("subjects_name"); ?></label><small class="req"> *</small>
                                                <input type="text" class="form-control" id="validationCustom01" placeholder=" name" name="name" value="<?php echo $value->NAME ?>" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <br>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 " >

                                                <label class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" name="radio-inline"  <?php
                                                    if ($value->TYPE == 'theory') {
                                                        echo 'checked';
                                                    }
                                                    ?> value="theory" class="custom-control-input"><span class="custom-control-label">Theory</span>
                                                </label>
                                                <label class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" name="radio-inline"  <?php
                                                    if ($value->TYPE == 'practical') {
                                                        echo 'checked';
                                                    }
                                                    ?> value="practical" class="custom-control-input"><span class="custom-control-label">Practical</span>
                                                </label>



                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("subjects_code"); ?></label><small class="req"> *</small>
                                                <input type="text" class="form-control" id="validationCustom01" placeholder=" <?php echo $this->lang->line("subjects_code"); ?>" name="subjects_code" value="<?php echo $value->CODE ?>" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("version"); ?></label><small class="req"> *</small>
                                        <select type="text"  data-toggle="dropdown" class="form-control dropdown-toggle"  id="versionsid"  name="versionsid" value="" required>
                                            <option value="0"><?php echo $this->lang->line("choose_class"); ?></option>
                                            <?php
                                            foreach ($allVdt as $val) {
                                                                     if($val->ID==$categoryid){

                                            echo "<option value=\"$val->ID\" selected>$val->VERSION</option>";
                                            }
                                            else{

                                             echo "<option value=\"$val->ID\">$val->VERSION</option>";
                                        } 
                                        
                                            }
                                                ?>
                      
                                        </select>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("class"); ?></label><small class="req"> *</small>
                                                <select type="text"  data-toggle="dropdown" class="form-control dropdown-toggle"  id="validationCustom01"  name="classesid" value="" required>
                                                    <option><?php echo $this->lang->line("choose_class"); ?></option>
                                                    <?php
                                                    foreach ($allCls as $v) {
                                                        
                                                                      if($v->VERSIONSID==$categoryid){
                                                if($v->ID==$value->CLASSESID){
                                                       echo "<option value=\"$v->ID\" selected>$v->CLASSES</option>";
                                                }
                                                    else{
                                                           echo "<option value=\"$v->ID\">$v->CLASSES</option>";
                                                    }
                                         
                                            }
                                       
                                        
                                            }
                                                        
                                              ?>
                                                </select>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <br>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("cover_img"); ?>*</label>
                                                <input type="file" class="form-control" id="validationCustom01" placeholder=" name" name="pic" value="" >
                                                <?php
                                                // if (file_exists("upload/images/book_cover/{$value->PICTURE}")) {
                                                // echo "<img  src='" . base_url() . "upload/images/book_cover/{$value->PICTURE}" . "' height='110px' width='90px'/>";
                                                // } else {
                                                //echo "<img  src='" . base_url() . "assets/images/book.png" . "' width='260px'/>";
                                                // }
                                                ?> 
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
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
                        </div>
                        <?php
                    }
                }
            } else {
                ?>
                <!-- =======================End Edit Part =============================== -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header"><?php echo $this->lang->line("subjects"); ?></h5>

                        <div class="card-body">
                            <h2 style="color:green"> <?php
                                $dt = $this->session->userdata("msg");
                                if ($dt != NULL) {
                                    echo $dt;
                                    $this->session->unset_userdata("msg");
                                }
                                ?></h2>
                            <form  enctype="multipart/form-data" class="needs-validation" novalidate action="<?php echo base_url() ?>admin/subjects/insert" method="post">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("subjects_name"); ?></label><small class="req"> *</small>
                                        <input type="text" class="form-control" id="validationCustom01" placeholder=" name" name="name" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 " >

                                        <label class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" name="radio-inline" checked="" value="theory" class="custom-control-input"><span class="custom-control-label">Theory</span>
                                        </label>
                                        <label class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" name="radio-inline"  value="practical" class="custom-control-input"><span class="custom-control-label">Practical</span>
                                        </label>



                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("subjects_code"); ?></label><small class="req"> *</small>
                                        <input type="text" class="form-control" id="validationCustom01" placeholder=" <?php echo $this->lang->line("subjects_code"); ?>" name="subjects_code" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("version"); ?></label><small class="req"> *</small>
                                        <select type="text"  data-toggle="dropdown" class="form-control dropdown-toggle"  id="versionsid"  name="versionsid" value="" required>
                                            <option value="0"><?php echo $this->lang->line("choose_class"); ?></option>
                                            <?php
                                            foreach ($allVdt as $val) {
                                                ?>
                                                <option value="<?php echo $val->ID ?>"><?php echo $val->VERSION; ?></option>

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
                                        <select type="text"  data-toggle="dropdown" class="form-control dropdown-toggle"  id="classesid"  name="classesid" value="" required>
                                            <option value="0"> <?php echo $this->lang->line("choose_class"); ?></option>
                                          
                                        </select>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("cover_img"); ?>*</label>
                                        <input type="file" class="form-control" id="validationCustom01" placeholder=" name" name="pic" value="" >
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
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

                <?php
            }
            ?>
            <!-- ============================================================== -->

            <!-- end validation form -->

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Basic Table</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered first" id="myTable">
                                <thead>
                                    <tr>
                                        <th>#<?php echo $this->lang->line("id"); ?></th>
                                        <th><?php echo $this->lang->line("subjects_code"); ?></th>
                                        <th><?php echo $this->lang->line("subjects_name"); ?></th> 
                                        <th>TYPE<?php echo $this->lang->line("sections"); ?></th>
                                        <th><?php echo $this->lang->line("class"); ?></th>
                                        <th><?php echo $this->lang->line("picture"); ?></th>
                                        <th><?php echo $this->lang->line("edit"); ?></th>
                                        <th><?php echo $this->lang->line("delete"); ?></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($allSub)) {
                                        foreach ($allSub as $value) {
                                            ?>
                                            <tr>
                                                <td><?php echo $value->ID ?></td>
                                                <td><?php echo $value->CODE ?></td>
                                                <td><?php echo $value->NAME ?></td>
                                                <td><?php echo $value->TYPE ?></td>
                                                <td><?php echo $value->CLASSES ?></td>
                                                <td>  <?php
                                                    if (file_exists("upload/images/book_cover/{$value->PICTURE}")) {
                                                        echo "<img  src='" . base_url() . "upload/images/book_cover/{$value->PICTURE}" . "' height='110px' width='90px'/>";
                                                    } else {
                                                        echo "<img  src='" . base_url() . "assets/images/book.png" . "' width='260px'/>";
                                                    }
                                                    ?> </td>
                                                <td><a href="<?php echo base_url() . "admin/subjects?edit={$value->ID}" ?>"><?php echo $this->lang->line("edit"); ?></a></td>
                                                <td> <a href="<?php echo base_url() . "admin/subjects/delete/{$value->ID}" ?>"><?php echo $this->lang->line("delete"); ?></a></td>

                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>

                                </tbody>
                                <tfoot>
                                <th>#<?php echo $this->lang->line("id"); ?></th>
                                <th><?php echo $this->lang->line("subjects_code"); ?></th>
                                <th><?php echo $this->lang->line("subjects_name"); ?></th> 
                                <th>TYPE<?php echo $this->lang->line("sections"); ?></th>
                                <th><?php echo $this->lang->line("class"); ?></th>
                                <th><?php echo $this->lang->line("picture"); ?></th>
                                <th><?php echo $this->lang->line("edit"); ?></th>
                                <th><?php echo $this->lang->line("delete"); ?></th>
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
          var c=$("#versionsid").val();
          var sc="";
          if(c==0){
              sc+="<option value='0'>Choose Class First</option>";
          }
     <?php
    foreach ($allVdt as $cat){
        echo "else if (c==$cat->ID){";
        foreach ($allCls as $scat ){
            if($scat->VERSIONSID==$cat->ID){
            echo "sc += '<option value=\"{$scat->ID}\">$scat->CLASSES</option>';";
        }
        
        }
        echo "}";
    }
          
          
          ?>
          $("#classesid").html(sc);
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
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>