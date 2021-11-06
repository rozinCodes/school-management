
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
                    <h2 class="pageheader-title"><?php echo $this->lang->line("lecture_power_point_upload"); ?> </h2>

                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("dashboard"); ?></a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("lecture_power_point_upload"); ?></a></li>

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
                if (isset($_GET['edit'])) {
                    foreach ($allLpdf as $pdt) {
                        //echo $pdt->ID."<br>";
                        if ($_GET['edit'] == $pdt->ID) {
                            ?>

                            <div class="card">
                                <h5 class="card-header">Lecture Power Point Edit</h5>

                                <div class="card-body">
                                    <h2 style="color:green"> <?php
                                        $dt = $this->session->userdata("msg");
                                        if ($dt != NULL) {
                                            echo $dt;
                                            $this->session->unset_userdata("msg");
                                        }
                                        ?></h2>
                                    <form  enctype="multipart/form-data" class="needs-validation"  action="<?php echo base_url() ?>academics_version/version_book_upload/lecture_power_point_upload" method="post">
                                        <div class="row">



                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("version"); ?></label><small class="req"> *</small>
                                                <select type="text"  data-toggle="dropdown" class="form-control dropdown-toggle"  id="versionsid"  name="versions" value="" required>
                                                    <option value="0">Choose Version</option>

                                                    <?php
                                                    foreach ($allVdt as $value) {
                                                        if ($pdt->VERSIONS == $value->ID) {
                                                            ?>
                                                            <option value="<?php echo $value->ID ?>" selected><?php echo $value->VERSION; ?></option>

                                                            <?php
                                                        } else {
                                                            ?>
                                                            <option value="<?php echo $value->ID ?>"><?php echo $value->VERSION; ?></option>

                                                            <?php
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
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("title"); ?></label><small class="req"> *</small>
                                                <input type="text" class="form-control" id="validationCustom01" placeholder=" <?php echo $this->lang->line("title"); ?>" name="title" value="<?php echo $pdt->TITLE ?>" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("chapter_name"); ?></label><small class="req"> *</small>
                                                <input type="text" class="form-control" id="validationCustom01" placeholder=" <?php echo $this->lang->line("chapter_name"); ?>" name="chapter_name" value="<?php echo $pdt->CHAPTER_NAME ?>" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("lecture_part"); ?></label><small class="req"> *</small>
                                                <input type="text" class="form-control" id="validationCustom01" placeholder=" <?php echo $this->lang->line("lecture_part"); ?>" name="lecture_part" value="<?php echo $pdt->LECTURE_PART ?>" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("lecture_by"); ?></label><small class="req"> *</small>
                                                <input type="text" class="form-control" id="validationCustom01" placeholder=" <?php echo $this->lang->line("lecture_by"); ?>" name="lecture_by" value="<?php echo $pdt->LECTURE_BY ?>" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="validationCustom01"><?php echo $this->lang->line("upload_power_point"); ?>*</label>
                                                <input type="file" class="form-control" id="validationCustom01" name="upload_power_point" value="" >
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div><br><br>

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
                    }
                } else {
                    ?>
                    <div class="card">
                        <h5 class="card-header"><?php echo $this->lang->line("lecture_power_point_upload"); ?></h5>

                        <div class="card-body">
                            <h2 style="color:green"> <?php
                                $dt = $this->session->userdata("msg");
                                if ($dt != NULL) {
                                    echo $dt;
                                    $this->session->unset_userdata("msg");
                                }
                                ?></h2>
                            <form  enctype="multipart/form-data" class="needs-validation"  action="<?php echo base_url() ?>academics_version/version_book_upload/lecture_power_point_upload" method="post">
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
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("title"); ?></label><small class="req"> *</small>
                                        <input type="text" class="form-control" id="validationCustom01" placeholder=" <?php echo $this->lang->line("title"); ?>" name="title" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("chapter_name"); ?></label><small class="req"> *</small>
                                        <input type="text" class="form-control" id="validationCustom01" placeholder=" <?php echo $this->lang->line("chapter_name"); ?>" name="chapter_name" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("lecture_part"); ?></label><small class="req"> *</small>
                                        <input type="text" class="form-control" id="validationCustom01" placeholder=" <?php echo $this->lang->line("lecture_part"); ?>" name="lecture_part" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("lecture_by"); ?></label><small class="req"> *</small>
                                        <input type="text" class="form-control" id="validationCustom01" placeholder=" <?php echo $this->lang->line("lecture_by"); ?>" name="lecture_by" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <label for="validationCustom01"><?php echo $this->lang->line("upload_power_point"); ?>*</label>
                                        <input type="file" class="form-control" id="validationCustom01" name="upload_power_point" value="" >
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div><br><br>

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
                            <table class="table table-striped table-bordered first" id="myTable">
                                <thead>
                                    <tr>
                                        <th>#<?php echo $this->lang->line("id"); ?></th>
                                        <th><?php echo $this->lang->line("upload_by"); ?></th> 
                                        <th title="subjects_code"><?php echo $this->lang->line("subjects_code"); ?></th>
                                        <th><?php echo $this->lang->line("subjects_name"); ?></th> 
                                        <th><?php echo $this->lang->line("version"); ?></th>
                                        <th><?php echo $this->lang->line("class"); ?></th>
                                        <th><?php echo $this->lang->line("title"); ?></th>
                                        <th><?php echo $this->lang->line("files"); ?></th>
                                        <th><?php echo $this->lang->line("delete"); ?></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($allLpdf)) {
                                        foreach ($allLpdf as $value) {
                                            ?>
                                            <tr>
                                                <td><?php echo $value->ID ?></td>
                                                <td><?php echo $value->FIRST_NAME ?></td>
                                                <td ><?php echo $value->CODE ?></td>
                                                <td><?php echo $value->NAME ?></td>
                                                <td><?php echo $vd = $value->VERSION;
                                            ?></td>
                                                <td><?php echo $value->CLASSES ?></td>
                                                <td><?php echo $value->TITLE ?></td>
                                                <td>
                                                    <?php
                                                    if ($value->FILES_NAME != "") {
                                                        ?>
                                                        <a  href="<?php echo base_url() . "academics_version/version_book_upload/download?type=mailbox&file={$value->FILES_NAME}"; ?>" >
                                                            <img src="<?php echo base_url() . "upload/images/Circle-icons-download.svg.png" ?>" width="100"/>

                                                        </a>
                                                        <?php
                                                    } else {
                                                        echo "No Files";
                                                    }
                                                    ?>
                                                </td>


                                                <td> <a class="btn btn-danger" href="<?php echo base_url() . "academics_version/version_book_upload/powerpoint_delete/{$value->ID}" ?>"><?php echo $this->lang->line("delete"); ?></a></td>

                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>

                                </tbody>
                                <tfoot>
                                <th>#<?php echo $this->lang->line("id"); ?></th>
                                <th><?php echo $this->lang->line("upload_by"); ?></th> 
                                <th title="subjects_code"><?php echo $this->lang->line("subjects_code"); ?></th>
                                <th><?php echo $this->lang->line("subjects_name"); ?></th> 
                                <th><?php echo $this->lang->line("version"); ?></th>
                                <th><?php echo $this->lang->line("class"); ?></th>
                                <th><?php echo $this->lang->line("title"); ?></th>
                                <th><?php echo $this->lang->line("files"); ?></th>
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
        $("#versionsid").change(function () {
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
