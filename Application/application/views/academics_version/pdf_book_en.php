
<!-- ============================================================== -->
<!-- end left sidebar -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- wrapper  -->

<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title"><?php echo $this->lang->line("english_version"); ?> </h2>

                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("dashboard"); ?></a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("version"); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line("english_version"); ?></li>
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

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header"><?php echo $this->lang->line("english_version"); ?></h5>

                    <div class="card-body">
                        <h2 style="color:green"> <?php
                            $dt = $this->session->userdata("msg");
                            if ($dt != NULL) {
                                echo $dt;
                                $this->session->unset_userdata("msg");
                            }
                            ?></h2>

                        <div class="row">
                 

                               
                                       <?php
                                             if (isset($allEbook)) {
                                foreach ($allEbook as $value) {
                                    if($value->VERSIONS=='english'){
                                     $code=$this->input->get("code");
                                      if($code==$value->SUBJECTSID){
                                       
                                       ?>
                                              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 ">
                                        <div class="bangla_imag" >
                                            <a target="_blank" href="<?php echo base_url()."upload/book/pdf/{$value->FILES_NAME}"; ?>">
                                                <img src="<?php echo base_url(); ?>assets/images/pdf_picture.png" width="200px" height="180px" >
                                           
                                            </a>
                                        </div>


                                    </div>
                       
                                        
                                     
                                        
                                        <?php
                                        
                                }
                                }
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
<script type="text/javascript">
	$("#flipbook").turn({
		width: 800,
		height:500,
		autoCenter: true
	});
	
	function isAnimating() {
  if ($("#flipbook").turn("animating")) {
    alert('Animating a page!');
  }
}

function play(){
var audio=new Audio('Simple-Book-Page-Turn-www.fesliyanstudios.com-www.fesliyanstudios.com.mp3');
audio.play();
};


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
