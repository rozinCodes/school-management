
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
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                <div class="card">
                    <h5 class="card-header">Question</h5>

                    <div class="card-body">
                        <h2>Online Exam</h2>
                       

                            <?php
                           
                            ?>
                            <div class="card-body">
                            <?php
                            if (isset($allPdt)) {
                                foreach ($allPdt as $value) {
                                    ?>
                                        <table>
                                            <tr>
                                                <td>Exam : </td>
                                                <td><?php echo $value->EXAM_TITLE ?></td>
                                            </tr>
                                            <tr>
                                                <td>Total Attempt : </td>
                                                <td><?php echo $value->ATTEMPT ?></td>
                                            </tr>
                                            <tr>
                                                <td>Exam From : </td>
                                                <td><?php echo $value->EXAM_FROM ?></td>
                                            </tr>
                                            <tr>
                                                <td>Exam To : </td>
                                                <td><?php echo $value->EXAM_TO ?></td>
                                            </tr>
                                            <tr>
                                                <td>Duration : </td>
                                                <td><?php echo $value->DURATION ?></td>
                                            </tr>
                                            <tr>
                                                <td>Passing (%) : </td>
                                                <td><?php echo $value->PASSING_PERCENTAGE ?></td>
                                            </tr>
                                            <tr>
                                                <td>Total Questions :  </td>
                                                <td><?php echo $value->TOTAL ?></td>
                                            </tr>
                                            <tr>
                                                <td>Curret Ans :  </td>
                                                <td><?php if(isset($match)) echo $match; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Wrong Ans :  </td>
                                                <td><?php if(isset($notmatch)) echo $notmatch; ?></td>
                                            </tr>
                                        </table>


        <?php
    }
}
?>
                            </div>


                    </div>



                </div>
            </div>


        </div>
        <!-- ============================================================== -->

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
