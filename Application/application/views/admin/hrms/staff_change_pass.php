<!-- ============================================================== -->
<!-- end left sidebar -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- wrapper  -->

<!-- ============================================================== -->
<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
       

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <h2><?php echo $this->lang->line("change_password"); ?></h2>
        </div>


        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">


                   
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

                        <form  class="needs-validation" novalidate action="<?php echo base_url() ?>admin/hrms/staff/global_change_password" method="post">
                        
                            <div class="row">

                            



                                <div class="col-xl-6 col-lg-6  col-md-6 col-sm-6 col-6 ">

                                    <label for="validationCustom01"><?php echo $this->lang->line("old_password"); ?></label>
                                    <input name="old_password" id="old_password" class="form-control" type="password" required/>
                                   

                                     <label for="validationCustom01"><?php echo $this->lang->line("new_password"); ?></label>
                                    <input name="password" id="new_password" class="form-control password" type="password" required />

                                    <label for="validationCustom01"><?php echo $this->lang->line("conf_password"); ?></label>
                                    <input type="password" name="confirm_password" class="form-control confirm_password" id="conf_password"  required/> <span id='message'></span>
                                    <br>
                                    <input type="checkbox" onclick="showPass()"> Show Password



                                </div>

                             

                            </div>

                            <br>

                            <div class="row pull-center">
                                <div class="col-xl-4 col-lg-4  col-md-4 col-sm-4 col-4 ">
                                    <button class="btn btn-primary my_btn_style" type="submit">save</button>
                                </div>

                            </div>







                        </form>

                    </div>
                </div>
            </div>

        </div>


       
    </div>

    
<script type="text/javascript">
    $('.password, .confirm_password').on('keyup', function () {
    if ($('.password').val() == $('.confirm_password').val()) {
        $('#message').html('Matching').css('color', 'green');
    } else 
        $('#message').html('Not Matching').css('color', 'red');
});
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





    <script type="text/javascript">
        document.querySelector("#today2").valueAsDate = new Date();
    </script>

<script>
    function showPass() {

        var x = document.getElementById("old_password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
        
        var x = document.getElementById("new_password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }

        var x = document.getElementById("conf_password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
}
</script>
   