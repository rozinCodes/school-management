
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

            <!-- =======================Edit Part =============================== -->

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
                                 
                                        <th><?php echo $this->lang->line("action"); ?></th>
                                  

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i=1;
                                  
       
                            foreach ($allEdt as $edt){
                               $CLASS= $edt->CLASS_ID;
                               $SESSIONSID= $edt->SESSION_ID;
                            }
                                    if (isset($allPdt)) {
                                        foreach ($allPdt as $value) {

                                        
                                            $id = $value->ID;
                                           if($CLASS==$value->CLASSESID OR $SESSIONSID==$value->SESSIONSID){
                                            $vv= $value->EXAM_TO;
                                            $enddate=strtotime($vv);

                                            $dd= date(("Y-m-d"));
                                            $nowdate=strtotime($dd);
                                            if($enddate>=$nowdate){
                                            $sections_array = array(
                                                "ONLINEEXAM_ID" => $id,
                                                "STUDENTSID" => $this->session->userdata('id')
                                            );
                                            $allCpt = $this->common_model->check_unique("ONLINEEXAM_ATTEMPTS", $sections_array);
                                            ?>
                                            <tr>
                                                <td><?php echo $i;$i++;  ?></td>
                                                <td><?php echo $value->EXAM_TITLE ?></td>
                                                <td><?php echo $value->EXAM_FROM ?></td>
                                                <td><?php echo $value->EXAM_TO ?></td>
                                                <td><?php echo $value->DURATION ?></td>
                                                <td><?php echo $value->PASSING_PERCENTAGE ?></td>
                                                <?php
                                                if (!$allCpt) {
                                                    ?>
                                                    <td><a type="button" href="<?php echo base_url() . "student/onlineexam/view/{$value->ID}" ?>" class="btn btn-primary"   >Exam Now</a></td>

                                                    <?php
                                                } else {
                                                    ?>
                                                    <td><a type="button" href="<?php echo base_url() . "student/onlineexam/result/{$value->ID}" ?>" class="btn btn-danger"   >Result View</a></td>
                                                    <?php
                                                }
                                                ?>
                                            
                                            </tr>

                                            <?php
                                        }
                                    }
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
                                
                                        <th><?php echo $this->lang->line("action"); ?></th>

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
        $("#cls").change(function () {
            var c = $("#cls").val();
            var sc = "";
            if (c == 0) {
                sc += "<option value='0'>Choose Class First</option>";
            }
<?php
foreach ($allCls as $cat) {
    echo "else if (c==$cat->id){";
    echo "sc += '<option value=\"0\">Choose change</option>';";
    foreach ($allSub as $scat) {

        if ($cat->id == $scat->classesid) {

            echo "sc += '<option value=\"{$scat->id}\">$scat->name</option>';";
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
    echo " else if (cc == $qdt->id) {";
    foreach ($allQdt as $qqt) {
        if ($qqt->subject_id == $qdt->id) {
            echo" scc += \"<input type='checkbox' name='sections[]' value='{$qqt->id}'> {$qqt->question}<br>\";";
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
