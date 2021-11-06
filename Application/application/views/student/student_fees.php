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
            <h2><?php echo $this->lang->line("fees"); ?></h2>
        </div>


        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">


                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("dashboard"); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line("fees"); ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- end pageheader -->

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
                        <h5 class="card-header"><?php echo $this->lang->line("fees_history"); ?></h5>
                    </div>




                    <div class="card-body dataTables_wrapper no-footer">
                        <div class="table-responsive">
                            <div class="section_print" id="section-to-print">
                            <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                    <thead>
                                        <tr>
                                           
                                            <th><?php echo $this->lang->line("class"); ?></th>
                                            <th><?php echo $this->lang->line("session"); ?></th>
                                            <th><?php echo $this->lang->line("year"); ?></th>
                                            <th><?php echo $this->lang->line("status"); ?></th>
                                            <th><?php echo $this->lang->line("paid_amount"); ?></th>
                                            <th><?php echo $this->lang->line("total_fees"); ?></th>
                                            <th><?php echo $this->lang->line("fees_type"); ?></th>


                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php

                                        if (isset($allPdt3)) {
                                            $i = 0;


                                            foreach ($allPdt3 as $value) {


                                        ?>

                                                <tr>

                                                    <td><?php echo $value->CLASS ?> (<?php echo $value->SECTION ?>)</td>
                                                    <td><?php echo $value->SESSIONS ?> </td>
                                                    <td><?php echo $value->YEAR ?>(<?php echo $value->MONTH?>)</td>
                                                    
                                                        <?php 
                                                            if($value->STATUS=="not paid"){ ?>
                                                                <td data-toggle="popover" class="detail_popover text-align-cntr" data-original-title="" title=""><small class="label label-danger">Not Paid</small></td> <?php
                                                            }else if($value->STATUS=="paid"){?>
                                                                <td data-toggle="popover" class="detail_popover text-align-cntr" data-original-title="" title=""><small class="label label-success"> Paid</small></td> <?php

                                                            }else{ ?>
                                                                 <td data-toggle="popover" class="detail_popover text-align-cntr" data-original-title="" title=""><small class="label label-warning">Partial Paid</small></td> <?php
                                                            }
                                                        ?>
                                                    
                                                    <td><?php echo $value->PAID_AMOUNT ?></td>
                                                    <td><?php echo $value->TOTAL_FEES ?></td>
                                                    <td><?php echo $value->FEES_NAME ?></td>





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


   