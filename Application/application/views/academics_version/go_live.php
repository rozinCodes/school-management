
<!-- ============================================================== -->
<!-- end left sidebar -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- wrapper  -->
<!-- ============================================================== -->
<style>
    .ml15 {
        font-weight: 800;
        font-size: 3.8em;
        text-transform: uppercase;
        //letter-spacing: 0.5em;
    }

    .ml15 .word {
        display: inline-block;
        line-height: 1em;
    }
    .go_live{
     text-align: center;


    }
    .go_live h1{
        color: red;
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
                    <h2 class="pageheader-title"><?php echo $this->lang->line("go_live"); ?> </h2>

                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("dashboard"); ?></a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("go_live"); ?></a></li>

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
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                <div class="go_live">
               
                        <h1 class="ml15">
                            <span class="word">LIVE</span>
                            <span class="word">NOW</span>
                        </h1>
                   
                </div>

            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header"><?php echo $this->lang->line("go_live"); ?></h5>

                    <div class="card-body">
                        <h2 style="color:green"> <?php
                            $dt = $this->session->userdata("msg");
                            if ($dt != NULL) {
                                echo $dt;
                                $this->session->unset_userdata("msg");
                            }
                            ?></h2>

                        <form  enctype="multipart/form-data" class="needs-validation"  action="<?php echo base_url() ?>academics_version/version_book_upload/go_live" method="post">
                            <div class="row">
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <label for="validationCustom01"><?php echo $this->lang->line("version"); ?></label><small class="req"> *</small>
                                    <select type="text"  data-toggle="dropdown" class="form-control dropdown-toggle"  id="versionsid"  name="versions" value="" required>
                                        <option value="0">Choose Version</option>
                                        
  <?php
                                        foreach ($allVdt as $value) {
                                            ?>
                                            <option value="<?php echo $value->ID ?>"><?php echo $value->VERSION; ?></option>

                                            <?php
                                        }
                                        ?>
                                   

                                    </select>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <label for="validationCustom01"><?php echo $this->lang->line("class"); ?></label><small class="req"> *</small>
                                    <select type="text"  data-toggle="dropdown" class="form-control dropdown-toggle"  id="cid"  name="classesid" value="" required>
                                        <option value="0"><?php echo $this->lang->line("choose_class"); ?></option>
                                      
                                    </select>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <label for="validationCustom01"><?php echo $this->lang->line("subjects"); ?></label><small class="req"> *</small>
                                    <select type="text"  data-toggle="dropdown" class="form-control dropdown-toggle"  id="scid"  name="subjectsid" value="" required>
                                        <option><?php echo $this->lang->line("choose_class"); ?></option>


                                    </select>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <br>


                             
                                <br>
         
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <label for="validationCustom01"><?php echo $this->lang->line("title"); ?></label><small class="req"> *</small>
                                    <input type="text" class="form-control" id="validationCustom01" placeholder=" <?php echo $this->lang->line("title"); ?>" name="title" value="" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <label for="validationCustom01"><?php echo $this->lang->line("details"); ?></label><small class="req"> *</small>
                                    <textarea type="text" class="form-control" id="validationCustom01"  name="chapter_name" value="" ></textarea>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>


                            </div>
                            <br>
                            <div class="form-row">




                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">

                                    <button  type="submit" class="btn btn-success">
                                             Go Live
                                </button>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->

        <!-- end validation form -->


        <!-- ============================================================== -->
    </div>
        <div class="row">
            <!-- ============================================================== -->
            <!-- validation form -->
            <!-- ============================================================== -->

            <!-- =======================Edit Part =============================== -->

            <!-- ============================================================== -->

            <!-- end validation form -->

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Basic Table</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered first">
                                <thead>
                                    <tr>
                                        <th>#<?php echo $this->lang->line("id"); ?></th>
                                        <th>Title</th> 
                                        <th>Version</th>
                                         <th>Url</th>
                                        <th>DateTime</th>
                                        <th>Duration</th>
                                        <th>End Time</th>
                                          <th>Status</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($allGdt)) {
                                        foreach ($allGdt as $value) {
                                          ?>
                                            <tr>
                                                <td><?php echo $value->ID ?></td>
                                                <td><?php echo $value->TITLE ?></td>
                                                <td><?php echo $value->VERSIONSID ?></td>
                                                <td><?php echo $value->URL ?></td>
                                                 <td><?php
                                                  $sdate = $value->DATETIME;
                                                  $a = strval($sdate);
                                                  $aa = str_replace(".000000","",$a);
                                                  $date1 = date_create($aa);
                                                 $startdate = date_format($date1, "Y-m-d H:i:s a");
                                                  echo $startdate; 
                                                  ?></td>
                                                <td><?php //echo $value->duration ?></td>
                                                <td><?php
                                                $sdate2 = $value->ENDTIME;
                                                $a2 = strval($sdate2);
                                                $aa2 = str_replace(".000000","",$a2);
                                                $date12 = date_create($aa2);
                                               $startdate2 = date_format($date12, "Y-m-d H:i:s a");
                                                 echo $startdate2; 
                                                 ?></td>
                                                <?php
                                                if ($value->STATUS==1) {
                                                    ?>
                                                    <td><a type="button" href="<?php echo base_url() . "academics_version/version_book_upload/live_stop/{$value->ID}" ?>" class="btn btn-danger"   >Live</a></td>

                                                    <?php
                                                } else {
                                                    ?>
                                                    <td><a type="button" href="" class="btn btn-success"   >Live End</a></td>
                                                    <?php
                                                }
                                                ?>
                                       
                                            </tr>

                                            <?php
                                        }
                                    }
                                    ?>


                                </tbody>
                                <tfoot>
                                    <tr>
                                           <th>#<?php echo $this->lang->line("id"); ?></th>
                                        <th>Title</th> 
                                        <th>Version</th>
                                         <th>Url</th>
                                        <th>DateTime</th>
                                        <th>Duration</th>
                                        <th>End Time</th>
                                          <th>Status</th>

                                    </tr>
                                </tfoot>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
</body>
<script>
    anime.timeline({loop: true})
            .add({
                targets: '.ml15 .word',
                scale: [14, 1],
                opacity: [0, 1],
                easing: "easeOutCirc",
                duration: 800,
                delay: (el, i) => 800 * i
            }).add({
        targets: '.ml15',
        opacity: 0,
        duration: 1000,
        easing: "easeOutExpo",
        delay: 2000
    });

</script>
<!-- ============================================================== -->
<!-- end main wrapper -->
<!-- ============================================================== -->
<!-- Optional JavaScript -->
<!-- Optional JavaScript -->
<script>
    $(document).ready(function () {
        $("#versionsid").change(function(){
             var c = $("#versionsid").val();
            var sc = "";
            if (c == 0) {
                sc += "<option value='0'>Choose Class Version</option>";
            }
            
            <?php
foreach ($allVdt as $cat) {
    echo "else if (c==$cat->ID){";
     echo "sc += '<option value=\"0\">Choose change Class</option>';";
    foreach ($allCls as $scat) {
        if ($scat->VERSIONSID == $cat->ID) {
            echo "sc += '<option value=\"{$scat->ID}\">$scat->CLASSES</option>';";
        }
    }
    echo "}";
}
?>
             $("#cid").html(sc);
        });
        
        $("#cid").change(function () {
            var c = $("#cid").val();
            var sc = "";
            if (c == 0) {
                sc += "<option value='0'>Choose Class First</option>";
            }
<?php
foreach ($allCls as $cat) {
    
    echo "else if (c==$cat->ID){";
    
    foreach ($allSub as $scat) {
        if ($scat->CLASSESID == $cat->ID) {
            echo "sc += '<option value=\"{$scat->ID}\">$scat->NAME</option>';";
        }
    }
    echo "}";
}
?>
            $("#scid").html(sc);
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
