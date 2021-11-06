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
            <h2>Keep Information</h2>
        </div>


        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">


                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("dashboard"); ?></a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("keep_info"); ?></a></li>

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
                        <h5 class="card-header"><?php echo $this->lang->line("keep_info"); ?></h5>
                    </div>

                    <?php  
           if (isset($_GET['edit'])){
           // if(!$_GET['edit']){
                 foreach ($allPdt as $value){
                     if($_GET['edit']==$value->ID){
            ?>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header"><?php echo $this->lang->line("keep")." ". $this->lang->line("edit"); ?></h5>

                    <div class="card-body">
                        <h2 style="color:green"> <?php
                            $dt = $this->session->userdata("msg");
                            if ($dt != NULL) {
                                echo $dt;
                                $this->session->unset_userdata("msg");
                            }
                            ?></h2>
                        <form class="needs-validation" novalidate action="<?php echo base_url() ?>keep/update" method="post">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <label for="validationCustom01"><?php echo $this->lang->line("title"); ?></label>
                                    <input type="hidden" class="form-control" id="validationCustom01" placeholder="name" name="random" value="<?php echo $value->KEEP_NUMBER; ?>" required>
                                  
                                    <input type="text" class="form-control" id="validationCustom01" placeholder="name" name="title" value="<?php echo $value->TITLE; ?>" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                              
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <label for="validationCustom01"><?php echo $this->lang->line("description"); ?></label>
                                   
                                    <input type="text" class="form-control" id="validationCustom01" placeholder="name" name="keyValue" value="<?php echo $value->DESCRIPTION; ?>" required>
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
           }
        
            ?>


                    <div class="card-body dataTables_wrapper no-footer">
                        <div class="table-responsive">
                            <div class="section_print" id="section-to-print">
                                <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                    <thead>
                                        <tr>

                                            <th><?php echo $this->lang->line("id"); ?></th>
                                            <th><?php echo $this->lang->line("title"); ?></th>
                                            <th><?php echo $this->lang->line("description"); ?></th>
                                            <th><?php echo $this->lang->line("edit"); ?></th>
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

                                                    <td><a style=";" class="" data-toggle="tooltip"  href="<?php //echo base_url() . 'admin/notice/notice_board/download/' . $value->ID;    ?>" class="dwn"><?php
                                                            echo $i;
                                                            $i++;
                                                            ?> </a> </td>
                                                    <td><?php echo $value->TITLE ?></td>
                                                    <td><?php echo $value->DESCRIPTION ?> </td>

                                                    <td><a href="<?php echo base_url()."keep/view?edit={$value->ID}"?>" class="btn btn-info"><?php echo $this->lang->line("edit"); ?></a></td>  
                                                    <td><a href="<?php echo base_url()."keep/delete/{$value->ID}"?>" class="btn btn-danger"><?php echo $this->lang->line("delete"); ?></a></td> 
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

    </div>    </div>

<!-- end main wrapper -->
<!-- ============================================================== -->
<!-- Optional JavaScript -->

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





<script type="text/javascript">
    document.querySelector("#today2").valueAsDate = new Date();
</script>


