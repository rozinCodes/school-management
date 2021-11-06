<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
  background-image: url("  " );
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
</head>
<body>


<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pull-right">
                        <p style="cursor: pointer;" onclick="window.print()" class="pull-right" type="print"><i class=" fas fa-print"></i></p>
  </div>
<div class="card" id="section-to-print" style="border: 2px solid #ddd;">

                    
<h2>Student Identity Card</h2>
<img class="profile-user-img img-responsive img-circle center" src="<?php echo base_url(); ?>uploads/students/picture/<?php echo $allPdt->STUDENT_IMAGE?> " alt="User profile picture">
  <h3><?php echo $allPdt->F_NAME?> <?php echo $allPdt->L_NAME?></h3>
  <p class="title"><?php echo $allPdt2->SCHOOL_NAME?></p>


                             
                                   <p>Student Name : <span><?php echo $allPdt->F_NAME?> <?php echo $allPdt->L_NAME?></span></p>
                                    <p>Admission No : <span> <?php echo $allPdt->ADMISSION_NO?></span></p>
                                    <p>Class : <span><?php echo $allPdt->CLASSES?> - <?php echo $allPdt->NAME?>(<?php echo $allPdt->SESSIONS?>) </span></p>
                                    <p>Father's Name : <span><?php echo $allPdt->FATHER_NAME?> </span></p>
                                    
                                    <p class="stred">Blood Group : <span><?php echo $allPdt->BLOOD_GROUP?></span></p>
                                
                            

  
  <p><button> <?php echo $allPdt2->SCHOOL_ADDRESS?></button></p>

                      

</div>


</body>
</html>
