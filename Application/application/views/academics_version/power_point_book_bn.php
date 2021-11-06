
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
                    <h2 class="pageheader-title"><?php echo $this->lang->line("bangla_version"); ?> </h2>

                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("dashboard"); ?></a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("version"); ?></a></li>
                    
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
                    <h5 class="card-header"><?php echo $this->lang->line("bangla_version"); ?></h5>

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
                                  $version= $this->session->userdata("version");
                                            if($value->VERSIONS==$version){
                                     $code=$this->input->get("code");
                                 $value->SUBJECTSID."<br>";
                                      if($code==$value->SUBJECTSID){
                                       
                                       ?>
                                              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 ">
                                        <div class="bangla_imag" >
                                            <a target="_blank" href="<?php echo base_url()."upload/book/power_point/{$value->FILES_NAME}"; ?>" download>
                                                <img src="<?php echo base_url(); ?>assets/images/2-powerpoint-100259341-large.png" width="200px" height="180px" >
                                           
                                            </a><br><br>
                                            <h2><?php echo $value->TITLE; ?></h2>
                                            <h3>Chapter Name: <?php echo $value->CHAPTER_NAME; ?></h3>
                                            <h3>Lecture Part : <?php echo $value->LECTURE_PART; ?></h3>
                                            <h3>Lecture By<?php echo $value->LECTURE_BY; ?></h3>
                                        </div>
                                                  
                                                  <a target="_blank" href="<?php echo base_url()."upload/book/power_point/{$value->FILES_NAME}"; ?>" download>
                                                            <img src="<?php echo base_url() . "upload/images/Circle-icons-download.svg.png" ?>" width="100"/>

                                                        </a>


                                    </div>
					 <!--					
			 <iframe src="http://localhost/Application/upload/book/pdf/6064ca7d514cb4f977d958de773e36c8.pdf" width="100%" height="500px">
                      					
                             
                                 
						   <iframe src="http://docs.google.com/gview?url=http://localhost/Application/upload/book/power_point/e8fe7d0065c3f8fe54b3170365f0dc4b.ppt&embedded=true" style="width:550px; height:450px;" frameborder="0"></iframe>
                             --> 
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
