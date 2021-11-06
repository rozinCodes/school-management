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
            <h2><?php echo $this->lang->line("class_period"); ?></h2>
        </div>


        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title"><?php echo $this->lang->line("sections"); ?> </h2>

                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("dashboard"); ?></a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("academics"); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line("class_period"); ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->

        <div class="row">



            <!-- ============================================================== -->
            <!-- validation form -->
            <!-- ============================================================== -->
            <?php
            if (isset($_GET['edit'])) {
                // if(!$_GET['edit']){
                foreach ($allPdt as $value) {
                    if ($_GET['edit'] == $value->id) {
            ?>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">

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
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 ">
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




                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
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
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                    <div class="card">
                        <h5 class="card-header"><?php echo $this->lang->line("sections"); ?></h5>

                        <div class="card-body">
                            <h2 style="color:green"> <?php
                                                        $dt = $this->session->userdata("msg");
                                                        if ($dt != NULL) {
                                                            echo $dt;
                                                            $this->session->unset_userdata("msg");
                                                        }
                                                        ?></h2>
                            <form class="needs-validation" novalidate action="<?php echo base_url() ?>Admin/academics/class_period/insert" method="post">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 ">

                                        <label for="validationCustom01"><?php echo $this->lang->line("period_name"); ?></label>

                                        <input type="text" class="form-control" id="validationCustom01" placeholder=" " name="period_name" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>

                                        <br>

                                        <label for="validationCustom01"><?php echo $this->lang->line("period_start_time"); ?></label>
                                        <!-- <input type="time" id="appt" name="appt"> -->
                                        <input type="time" class="form-control" id="period_start_time" placeholder=" " name="period_start_time" onchange="compare();" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>  
                                        <br>



                                        <label for="validationCustom01"><?php echo $this->lang->line("period_end_time"); ?></label>

                                        <input type="time" class="form-control" id="period_end_time" placeholder=" " name="period_end_time" onchange="compare();" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <br>

                                        <label for="validationCustom01"><?php echo $this->lang->line("period_duration"); ?></label>
                                        <input type="text" class="form-control" id="period_duration"  placeholder=" " name="period_duration" onchange="compare();" value="" required>
                                        
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>

                                        
                                    </div>


                                </div>
                                <br>
                                <div class="form-row">




                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 ">
                                        <button class="btn btn-primary" type="submit">Add</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
            <?php
            }
            //}
            ?>
            <!-- end validation form -->

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                <div class="card">
                    <h5 class="card-header"><?php echo $this->lang->line("period_list"); ?></h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered first">
                                <thead>
                                    <tr>
                                       <th hidden><?php echo $this->lang->line("id"); ?></th>

                                        <th><?php echo $this->lang->line("period_name"); ?></th>
                                        <th><?php echo $this->lang->line("period_start_time"); ?></th>
                                        <th><?php echo $this->lang->line("period_end_time"); ?></th>
                                        <th><?php echo $this->lang->line("period_duration"); ?></th>
                                    
                                        <th><?php echo $this->lang->line("edit"); ?></th>
                                        <th><?php echo $this->lang->line("delete"); ?></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($allinfo)) {
                                        foreach ($allinfo as $value) {


                                    ?>
                                            <tr>
                                                <td hidden><?php echo $value->ID ?></td>
                                                <td><?php echo $value->PERIOD_NAME ?></td>
                                                <td><?php echo $value->START_TIME ?></td>
                                                <td><?php echo $value->END_TIME ?></td>
                                                <td><?php echo $value->DURATION ?></td>
                                            

                                                <td><a href="<?php echo base_url() . "task/task_category?edit={$value->ID}" ?>"><?php echo $this->lang->line("edit"); ?></a></td>
                                                <td> <a href="<?php echo base_url() . "task/category_delete/{$value->ID}" ?>"><?php echo $this->lang->line("delete"); ?></a></td>

                                            </tr>
                                    <?php
                                        }
                                    }

                                    ?>

                                </tbody>

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



<script type="text/javascript">
    function compare() {
        var start = document.getElementById("period_start_time").value;
        var end = document.getElementById("period_end_time").value;
        //alert(start);
        var hour1 = start.split(':')[0];
        var hour2 = end.split(':')[0];
        var difhour = hour2 - hour1;
        var min1 = start.split(':')[1];
        var min2 = end.split(':')[1];
        var difmin = min2 - min1;



        difmin = difmin.toString().length < 2 ? '0' + difmin : difmin;
        if (difmin < 0) {
            difhour--;
            difmin = 60 + difmin;
        }
        difhour = difhour.toString().length < 2 ? '0' + difhour : difhour;

        
           $('#period_duration').val(difhour + ":" + difmin);

    }
</script>


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