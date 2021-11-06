
<!-- ============================================================== -->
<!-- end left sidebar -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- wrapper  -->

<script>

function timeout(){
    var minute=Math.floor(timeLeft/60);
    var second=timeLeft%60;
    if(timeLeft<=0){
        clearTimeout(tm);
        document.getElementById("form1").submit();
        
    }else{
        document.getElementById("time").innerHTML=minute+":"+second;
  
    timeLeft--;
    var tm=setTimeout(function(){timeout()},1000);
}
}
</script>
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

                <div class="card view_data">
                    <h5 class="card-header"><?php echo $this->lang->line("subjects"); ?></h5>

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
                                    
                                    <input type="hidden" value="<?php echo $value->DURATION ?>" id="duration">
                                </table>
                                <?php
                                if (!$allCpt) {
                                    ?>
                                    <form action="" method="post">

                                        <div class="form-row">

                                            <input type="hidden" value="<?php echo $value->ID ?>" id="id" name="id"/>


                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <button class="btn btn-primary" type="button" id="submit">Start Exam</button>
                                            </div>
                                        </div>
                                    </form>
                                    <?php
                                }
                            }
                        }
                        ?>

                    </div>
                </div>

                <div class="question " style="display: none;" >
              
                    <body onload="timeout()">
                            <!-- ============================================================== -->
                            <!-- pageheader -->
                            <!-- ============================================================== -->
                         
                            <!-- ============================================================== -->
                            <!-- end pageheader -->
                            <!-- ============================================================== -->

                        
                                <!-- ============================================================== -->
                                <!-- validation form -->
                                <!-- ============================================================== -->

                                <!-- =======================Edit Part =============================== -->
                    

                                    <div class="card">
                                        <div class="card-header">
                                            <h5 >Question</h5>
                                            <script>
                                                 var duration=$("#duration").val();
                                                var timeLeft = duration * 60;
                                            </script>
                                            <div id="time" style="float: right;">
                                                Timeout
                                            </div>

                                        </div>
                                        <div class="card-body">
                                            <h2>Online Exam</h2>
                                            <form action="<?php echo base_url() ?>student/onlineexam/onlineexam_questions_ans" method="post" id="form1">
                                                <?php
                                                if (isset($allQdt)) {
                                                    foreach ($allQdt as $value) {
                                                        ?>

                                                        <div style="border-top: 1px solid #cbccd4; padding-top: 10px;">
                                                            <input type="hidden" value="<?php echo $urlp ?>" name="onlineexam_id" />
                                                            <input type="hidden" value="<?php echo $value->ID; ?>" name="questionsid" />
                                                            <h4><?php echo $value->QUESTION; ?></h4>
                                                            A.<label>
                                                                <input type="checkbox" name="sections[]" value="opt_a-<?php echo $value->ID; ?>"  >  <?php echo $value->OPT_A; ?>
                                                            </label> <br>
                                                            B. <label>
                                                                <input type="checkbox" name="sections[]" value="opt_b-<?php echo $value->ID; ?>"  >  <?php echo $value->OPT_B; ?>
                                                            </label> <br>
                                                            C. <label>
                                                                <input type="checkbox" name="sections[]" value="opt_c-<?php echo $value->ID; ?>"  > <?php echo $value->OPT_C; ?>
                                                            </label> <br>
                                                            D.<label>
                                                                <input type="checkbox" name="sections[]" value="opt_d-<?php echo $value->ID; ?>"  > <?php echo $value->OPT_D; ?>
                                                            </label> <br>
                                                            <?php
                                                            if (!$value->OPT_E == "") {
                                                                ?>
                                                                E. <label>
                                                                    <input type="checkbox" name="sections[]" value="opt_e-<?php echo $value->ID; ?>"  > <?php echo $value->OPT_E; ?>
                                                                </label> <br>
                                                                <?php
                                                            }
                                                            ?>

                                                        </div>

                                                        <?php
                                                    }
                                                }
                                                ?>
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                    <button class="btn btn-primary" type="submit">Submit</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>

                </body>
                                <!-- ============================================================== -->

                                <!-- end validation form -->


                                <!-- ============================================================== -->
                          



                  

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

        $("#submit").click(function () {
            $(".view_data").hide();
            $(".question").show();
        });


        $("#submit").click(function () {
            var id = $("#id").val();
            $.ajax({
                type: "post",
                data: {
                    id: id
                },

                url: "<?php echo base_url(); ?>student/onlineexam/onlineexam_attempts",
                success: function (data) {
                    // alert("Data Save: " + id);
                }
            });
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
