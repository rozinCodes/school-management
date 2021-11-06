<!-- ============================================================== -->
<!-- end left sidebar -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- wrapper  -->
<!-- ============================================================== -->



</div>


<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->



        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <h2><?php echo $this->lang->line("result"); ?></h2>
        </div>


        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title"><?php echo $this->lang->line("sections"); ?> </h2>

                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("dashboard"); ?></a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("exams"); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line("result"); ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- =====================================Search Student========================= -->

        <div class="row">


            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

            <div class="card">
                                <div class="card-body dataTables_wrapper no-footer">
                                    <div class="table-responsive">

                                        <?php


                                                foreach ($count_exam as $tot_exam) {
                                                    foreach ($allPdt2 as $value) {
                                                        if ($tot_exam->ID == $value->EXAM_ID) { ?>
                                                    <div class="tshadow mb25">
                                                        <h4 class="pagetitleh">
                                                            <?php echo $value->EXAM_NAME ?>
                                                           
                                                          
                                                        </h4>
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-hover ptt10" id="headerTable">
                                                                <thead>
                                                                    <tr>
                                                                        <th><?php echo $this->lang->line("subject"); ?></th>
                                                                        <th>Max. Marks</th>
                                                                        <th>Min. Marks</th>
                                                                        <th>Marks Obtained</th>
                                                                        <th>
                                                                            Result
                                                                        </th>
                                                                        <th>Note</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>


                                                                    <?php
                                                                    $s = 0;
                                                                    $max_mark = 0;
                                                                    $count = 0;

                                                                    foreach ($allPdt2 as $value) {
                                                                        if ($tot_exam->ID == $value->EXAM_ID) {

                                                                            $s = $s + $value->MARK;
                                                                            $max_mark = $max_mark + $allPdt4->MAX_MARKS;


                                                                    ?>
                                                                            <tr>
                                                                                <td><?php echo $value->SUBJECT_NAME ?></td>
                                                                                <td><?php echo $allPdt4->MAX_MARKS ?></td>
                                                                                <td><?php echo $allPdt4->MIN_MARKS ?></td>
                                                                                <td><?php echo $value->MARK ?></td>
                                                                                <td><?php
                                                                                $ps_mark= $pass_mark->PASS_MARK+1;
                                                                                    if ($value->MARK >=$ps_mark) {
                                                                                        // echo "<h1>Hello User, </h1> <p>Welcome to {$name}</p>"; 
                                                                                        echo ' <label class="label label-success">Pass</label> ';
                                                                                    }else if($value->MARK==null)
                                                                                    {
                                                                                        echo ' <label class="label label-danger">Not Inserted</label> ';
                                                                                    }
                                                                                    
                                                                                    else {
                                                                                        $count++;
                                                                                        echo ' <label class="label label-danger">Fail</label> ';
                                                                                    }
                                                                                    ?>
                                                                                </td>
                                                                                <td>None</td>
                                                                            </tr>

                                                                    <?php }
                                                                    }



                                                                    ?>



                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="bgtgray">
                                                                    <div class="row">

                                                                        <div class="col-sm-4 col-lg-4 col-md-4">
                                                                            <div class="description-block">
                                                                                <h5 class="description-header">Percentage : <span class="description-text"><?php
                                                                                                                                                            echo round(($s * 100) / $max_mark) . "%";
                                                                                                                                                            ?>(<?php echo $max_mark ?>)</span></h5>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-4 col-lg-4 col-md-4 ">
                                                                            <div class="description-block">
                                                                                <h5 class="description-header">Result :<span class="description-text">

                                                                                        <?php
                                                                                        $fail = 0;

                                                                                        foreach ($allPdt2 as $value) {
                                                                                            if ($tot_exam->ID == $value->EXAM_ID) {
                                                                                                if ($value->MARK < 33) {
                                                                                                    $fail++;


                                                                                                    break;
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                        ?>

                                                                                        <?php

                                                                                        if ($fail > 0) { ?>
                                                                                            <span class="label label-danger" style="margin-right: 5px;">fail</span> <?php

                                                                                                 } else { ?>
                                                                                            <span class="label label-success" style="margin-right: 5px;">pass</span> <?php

                                                                                                }


                                                                                                                                                                        ?>

                                                                                </h5>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-4 col-lg-4 col-md-4 ">
                                                                            <div class="description-block">
                                                                                <h5 class="description-header">Total Marks Obtain: <span class="description-text"><?php echo $s  ?></span></h5>
                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div><?php
                                                            break;
                                                        }
                                                    }
                                                }

                                                            ?>

                                        <br>

                                    </div>
                                </div>


                            </div>
                
            </div>


            











        </div>



        <!-- ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->




    </div>
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- end footer -->
    <!-- ============================================================== -->
</div>


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
