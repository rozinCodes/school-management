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
            <h2><?php echo $this->lang->line("upload_content"); ?></h2>
        </div>


        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">


                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("dashboard"); ?></a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("download_center"); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line("upload_content"); ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- end pageheader -->

        <div class="row">


            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
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

                        <form form enctype="multipart/form-data" class="needs-validation" novalidate action="<?php echo base_url() ?>admin/download_center/content/save_upload_documents" method="post">

                            <div class="row">



                                <div class="col-xl-6 col-lg-6  col-md-6 col-sm-6 col-6 ">

                                    <label for="validationCustom01"><?php echo $this->lang->line("content_title"); ?></label>
                                    <input type="text" class="form-control" name="content_title" id="content_title" required>



                                </div>

                                <div class="col-xl-6 col-lg-6  col-md-6 col-sm-6 col-6 ">

                                    <label for="validationCustom01"><?php echo $this->lang->line("content_type"); ?></label>
                                    <select class="form-control" id="validationCustom01" name="content_type" required="">
                                        <option value="">Select</option>
                                        <option value="assignment">Assignment</option>
                                        <option value="study_material">Study Material</option>
                                        <option value="syllabus">Syllabus</option>
                                        <option value="other">Other</option>



                                    </select>




                                </div>

                            </div>

                            <br>

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

                                <div class="col-xl-6 col-lg-6  col-md-6 col-sm-6 col-6">
                                    <label for="validationCustom01"><?php echo $this->lang->line("section"); ?></label>

                                    <select class="form-control" id="validationCustom01" name="section" required="">
                                        <option value="">Select </option>
                                        <?php
                                        if (isset($allPdt2)) {
                                            foreach ($allPdt2 as $value) {

                                        ?>

                                                <option value="<?php echo $value->ID ?>"><?php echo $value->NAME ?></option>



                                        <?php
                                            }
                                        }

                                        ?>
                                    </select>

                                </div>


                            </div>
                            <br>

                            <div class="row">

                                <div class="col-xl-6 col-lg-6  col-md-6 col-sm-6 col-6">
                                    <label for="validationCustom01"><?php echo $this->lang->line("upload_date"); ?></label>

                                    <input type="date" class="form-control" id="validationCustom01" name="upload_date" placeholder=" name" value="">


                                </div>


                                <div class="col-xl-6 col-lg-6  col-md-6 col-sm-6 col-6">
                                    <label for="validationCustom01"><?php echo $this->lang->line("documents"); ?></label>

                                    <input class="form-control" type="file" name="pic[]" multiple="multiple" id="file" size="20" autocomplete="off">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>

                                </div>


                            </div>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12  col-md-12 col-sm-12 col-12 ">

                                    <label for="validationCustom01"><?php echo $this->lang->line("content_des"); ?></label>



                                    <textarea id="validationCustom01" name="content_des" class="form-control"></textarea>


                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>

                                </div>

                            </div>

                            <div class="row pull-right">
                                <div class="col-xl-4 col-lg-4  col-md-4 col-sm-4 col-4 ">
                                    <button class="btn btn-primary my_btn_style" type="submit">save</button>
                                </div>

                            </div>







                        </form>

                    </div>
                </div>
            </div>






            <!-- -->
        </div>


        <!-- Down Panel start-->

        <div class="row">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

            </div>

            <!-- ============================================================== -->
            <!-- validation form -->
            <!-- ============================================================== -->
            <?php
            if (isset($_GET['edit'])) {
                // if(!$_GET['edit']){
                foreach ($allPdt as $value) {
                    if ($_GET['edit'] == $value->ID) {
            ?>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header"><?php echo $this->lang->line("sections") . " " . $this->lang->line("edit"); ?></h5>

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
            } else {
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

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h5 class="card-header"><?php echo $this->lang->line("content_list"); ?></h5>
                    </div>




                    <div class="card-body dataTables_wrapper no-footer">
                        <div class="table-responsive">
                            <div class="section_print" id="section-to-print">
                            <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                    <thead>
                                        <tr>
                                            <!--  <th><?php //echo $this->lang->line("id"); 
                                                        ?></th> -->
                                            <th><?php echo $this->lang->line("content_title"); ?></th>

                                            <th><?php echo $this->lang->line("content_type"); ?></th>
                                            <th><?php echo $this->lang->line("upload_date"); ?></th>
                                            <th><?php echo $this->lang->line("class"); ?></th>
                                            <th><?php echo $this->lang->line("section"); ?></th>
                                            <th><?php echo $this->lang->line("action"); ?></th>





                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php

                                        if (isset($allPdt3)) {
                                            $i = 0;


                                            foreach ($allPdt3 as $value) {


                                        ?>

                                                <tr>

                                                    <td><?php echo $value->CONTENT_TITLE ?></td>

                                                    <td><?php echo $value->CONTENT_TYPE ?></td>
                                                    <td><?php echo $value->UPLOAD_DATE ?> </td>
                                                    <td><?php echo $value->CLASSES ?></td>
                                                    <td><?php echo $value->NAME ?></td>




                                                    <td>
                                                    <?php
                                                    $roles = $this->session->userdata('roles');
                                                    if(($roles==1)||($roles==2)){ ?>

                                                        

                                                        <a class="" href="<?php echo base_url() . 'admin/download_center/content/download/' . $value->ID; ?>" class="dwn"><i class="fas fa-download"></i></a>&emsp;&emsp; &emsp;
                                                        <a class="" href="<?php echo base_url() . 'admin/download_center/content/delete/' . $value->ID; ?>" class="dwn"><i class="fas fa-trash-alt"></i></a><?php

                                                    }else{ ?>

                                                        &emsp;<a class="" href="<?php echo base_url() . 'admin/download_center/content/download/' . $value->ID; ?>" class="dwn"><i class="fas fa-download"></i></a><?php

                                                    }
                                                    ?>
                                                       
                                                        


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
                        <br>

                    </div>



                </div>
                <!-- ============================================================== -->
            </div>


            <!-- Down panel End -->




        </div>

    </div>












    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->

    <script>
        $('#form').parsley();
    </script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
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





    <script type="text/javascript">
        document.querySelector("#today2").valueAsDate = new Date();
    </script>


<script>
 function test2() {
      
    var c = document.getElementById("version_id").value;
         //alert(c);
        var sc = "";
        if (c == 0) {
            sc += "<option value='0'>Choose Teacher First</option>";
        }
        
        <?php
         foreach ($allPdt5 as $vr) {
            echo "else if (c==$vr->ID){";
   foreach ($allPdt as $cls) {
                


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