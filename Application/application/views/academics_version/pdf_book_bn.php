
<!-- ============================================================== -->
<!-- end left sidebar -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- wrapper  -->
<style>
    .bangla_imag{
        margin: 10px;
    }
</style>
<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Class Book </h2>

                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Class Version</a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Version Book</a></li>
                          
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
                    <h5 class="card-header"><?php echo $this->lang->line("version"); ?></h5>

                    <div class="card-body">
                        <h2 style="color:green"> <?php
                            $dt = $this->session->userdata("msg");
                            if ($dt != NULL) {
                                echo $dt;
                                $this->session->unset_userdata("msg");
                            }
                            ?></h2>

                

                                <div id="zoom-viewport">
                                    <div id="flipbook" >
									  <div class="container-fluid">
 
  <div class="row">
                                       <?php
                                             if (isset($allEbook)) {
                                foreach ($allEbook as $value) {
                                  	$version= $this->session->userdata("version");
                                            if($value->VERSIONS==$version){
                                     $code=$this->input->get("code");
                                      if($code==$value->SUBJECTSID){
                                       
                                       ?>
                                              <div class="col-xl-6 col-lg-6 col-md-4 col-sm-4 ">
                                        <div class="bangla_imag" >
                                            <a  href="<?php echo base_url()."academics_version/version_type/pdf_book?code={$_GET['code']}&&file={$value->FILES_NAME}"; ?>">
                                                <img src="<?php echo base_url(); ?>assets/images/pdf_picture.png" width="200px" height="180px" >
                                           
                                            </a>
                                        </div>


                                    </div>
                       
                               <?php
                            
                               if(isset($_GET['file'])){
                               ?>
                                        <iframe src="<?php echo base_url()."upload/book/pdf/{$_GET['file']}"; ?>" width="100%" height="500px"></iframe>
                                        
                                        <?php
                                        
                                }
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
