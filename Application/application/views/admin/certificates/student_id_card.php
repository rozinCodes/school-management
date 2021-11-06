    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

<style>
    .card-body{
        background-color: #7984a0;
        margin: 0px;
           font-family: Myriad Pro;
    }
    .card-one{
        background-color: #ffffff;
        margin: 0px auto;
        width: 290px;
        float: left;
        
    }
    .card-header-one{
        background-color: #ff7300;
        border: 2px solid #ff7300;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
          
    }
    .card-header-one h3{
        margin:10px;
        word-break: keep-all;
        font-size: 17px;
        font-weight: bold;
        word-spacing: 5px;
         text-transform: uppercase;
  text-justify: inter-word;
  color: #ffffff;
  font-family: Myriad Pro;
    }
    .card-img{
      
         

    }
      .card-one img {
 width: 190px;
  height: 190px;
  margin-left: 50px;
  border:2px solid #fff;
  -moz-box-shadow: 0px 6px 5px #ccc;
  -webkit-box-shadow: 0px 6px 5px #ccc;
  box-shadow: 0px 6px 5px #ccc;
  -moz-border-radius:190px;
  -webkit-border-radius:190px;
  border-radius:190px;
 
}
.card-body-one{
     background-color: #121e44;
     text-transform: uppercase;
  
}
.card-body-one h4{
    word-break: keep-all;
        font-size: 26px;
        font-weight: bold;
        word-spacing: 5px;
         text-transform: uppercase;
  text-justify: inter-word;
  color: #ff7300;
  text-align: center;
  padding-top: 20px;font-family: Myriad Pro;
}
.card-body-one h5{
       font-weight: bold;
        word-spacing: 5px;
         text-transform: uppercase; 
         text-align: center;
         color: #fcffff;
         font-size: 26px;
       font-family: Myriad Pro;
}
.card-body-one hr{
    color:red;
    width: 150px;
    border-bottom:2px solid #f8fafa; 
}
.card-body-one p{
    padding-left: 50px;
    font-size: 19px;
    margin: 0px;
    color: #ffffff;
    font-family: Myriad Pro;
}

.card-two{
     background-color: #121e44;
     float: left;
     width: 290px;
     margin-left: 30px;
}
.card-header-two h3{
    color: #ffffff;
    margin: 25px 0px 0px 20px;
} 
.card-body-two ul li{
    list-style-type: square;
    padding: 10px;
}
.card-body-two h4{
      text-transform: uppercase; 
    color: #fff;
    padding-left: 150px;
   margin: 0px;
}
.card-body-two h5{
  margin: 0px;
    color: #fff;
    padding-left: 150px;
   
}

 .card-img-two img {
 width: 150px;
  height: 110px;

margin-left: 70px;

}
.card-img-two{
    margin-top: 20px;
    background-color: #ff7300;
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
                    <h2 class="pageheader-title">Student ID Card</h2>
                 
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                     
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
                    <h5 class="card-header">Student Information</h5>
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pull-right">
                        <p style="cursor: pointer;" onclick="window.print()" class="pull-right" type="print"><i class=" fas fa-print"></i></p>
  </div>  <div class="card-body">
                        <h2 style="color:green"> <?php
                            $dt = $this->session->userdata("msg");
                            if ($dt != NULL) {
                                echo $dt;
                                $this->session->unset_userdata("msg");
                            }
                            ?></h2>
                        <div>
            
                             
                            <div id="section-to-print">
                                <div class="card-one">
                                    <div class="card-header-one">
                                    <h3><?php echo $allPdt2->SCHOOL_NAME?></h3>
                                                                         <div class="card-img">
<?php  if($allPdt->STUDENT_IMAGE){?>
                                    <img src="<?php echo base_url(); ?>uploads/students/picture/<?php echo $allPdt->STUDENT_IMAGE?> " alt="pic"/>
                                   <?php
}else{
                                   ?>
                                    
                                                           <img src="<?php echo base_url(); ?>uploads/staff/picture/daacefb609b7cb24a6d618fc0a542cc6.jpg " alt="pic"/>
             
                                    <?php
}
                                    ?>
                                                                         </div>
                                     </div>
                                     <div class="card-body-one">
                                    <h4><?php echo $allPdt->F_NAME?> <?php echo $allPdt->L_NAME?></h4>
                                    <h5>Student</h5>
                                    <hr>
                                    <p>ID: <?php echo $allPdt->ADMISSION_NO?></p>
                                    <p>Class : <?php echo $allPdt->CLASSES?></p>
                                    <p>Section : <?php echo $allPdt->NAME?></p>
                                    <p>Roll: <?php echo $allPdt->ROLL?></p>
                                    <p>Section: <?php echo $allPdt->SESSIONS?></p>
                                     </div>
                                </div>
                                   <div class="card-two">
                                    <div class="card-header-two">
                                    <h3>TERM & CONDITION</h3>
                                              
                                     </div>
                                     <div class="card-body-two">
                                         <ul>
                                             <li>Lorem Ipsum is simply dummy text of the printing and typesetting</li>
                                              <li>Lorem Ipsum is simply dummy text of the printing and typesetting</li>
                                  <li>Lorem Ipsum is simply dummy text of the printing and typesetting</li>
                                         </ul>  <h4>Litan sarkar </h4>
                                          <h5>Head Master</h5>
                                       
                                             
                                     </div>
                                                        <div class="card-img-two">

                                    <img src="<?php  echo base_url();?>uploads/school_info/logo/f6a03a3456507e2570139b8f662ba479.png" alt="pic"/>
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

    <script type="text/javascript">
function printDiv(divName){
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;

			window.print();

			document.body.innerHTML = originalContents;

		}
    </script>