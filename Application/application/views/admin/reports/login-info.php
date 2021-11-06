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
            <h2>Login Information</h2>
        </div>


        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">


                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("dashboard"); ?></a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">LOGIN INFO</a></li>

                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- end pageheader -->







        <!-- Down Panel start-->

        <div class="row">



            <!-- ============================================================== -->
            <!-- validation form -->
            <!-- ============================================================== -->

            <!-- end validation form -->

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h5 class="card-header">LOGIN INFO</h5>
                    </div>




                    <div class="card-body dataTables_wrapper no-footer">
                        <div class="table-responsive">
                            <div class="section_print" id="section-to-print">
                                <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                    <thead>
                                        <tr>

                                            <th><?php echo $this->lang->line("id"); ?></th>
                                            <th>IP_ADDRESS</th>
                                            <th><?php echo $this->lang->line("username"); ?></th>
                                            <th>Login Time</th>
                                            <th>DEVICE_NAME</th>
                                            <th>BROWSER</th>
                                            <th><?php echo $this->lang->line("action"); ?></th>





                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php
                                        if (isset($allPdt)) {
                                            $i = 1;


                                            foreach ($allPdt as $value) {
                                        ?>

                                                <tr>

                                                    <td><a style=";" class="" data-toggle="tooltip" href="<?php //echo base_url() . 'admin/notice/notice_board/download/' . $value->ID;   
                                                                                                            ?>" class="dwn"><?php echo $i;
                                                                                                                                                                                                            $i++;
                                                                                                                                                                                                            ?> </a> </td>
                                                    <td><?php echo $value->IP_ADDRESS ?></td>
                                                    <td><?php echo $value->USERNAME ?></td>
                                                    <td><?php
                                                     $sdate = $value->LOGIN_TIME;
                                                     $a = strval($sdate);
                                                     $aa = substr($a, 0, 18);
                                                     $date1 = date_create($aa);
                                                    $startdate = date_format($date1, "Y-m-d H:i:s a");
                                                     echo $startdate ?> </td>
                                                    <td><?php echo $value->DEVICE_NAME ?> </td>
                                                    <td><?php echo $value->BROWSER ?> </td>
                                                    <td>
                                                        <?php
                                                        $roles = $value->ROLES;
                                                        if (($roles == 1) || ($roles == 2)) {
                                                        ?>

                                                            <a class="" data-toggle="tooltip" title="download" href="<?php echo base_url() . 'admin/notice/notice_board/download/' . $value->ID; ?>" class="dwn"></a> STAFF
                                                        <?php } else if ($roles == 5) {
                                                        ?>

                                                            <a class="" data-toggle="tooltip" title="download" href="<?php echo base_url() . 'admin/notice/notice_board/download/' . $value->ID; ?>" class="dwn">STUDENT</a><?php
                                                                                                                                                                                                                        } else if ($roles == 3) {
                                                                                                                                                                                                                            ?>



                                                            <a class="" data-toggle="tooltip" title="download" href="<?php echo base_url() . 'admin/notice/notice_board/download/' . $value->ID; ?>" class="dwn">TEACHER</a><?php



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