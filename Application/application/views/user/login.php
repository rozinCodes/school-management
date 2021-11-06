<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
         <title><?php if(isset($title)){ echo $title;} ?></title>
		  <link rel="icon" href="<?php echo base_url(); ?>assets/images/icon/favicon-16x16.png" type="image/x-icon" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="<?php echo base_url(); ?>assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/libs/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    .card-body p{
  color:red;
}
    body {
  background-image: url(<?php echo base_url();?>assets/images/computer-home-block-d.jpg);

  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center">
            <?php 
                    $general_info = $this->common_model->view_data("GENERAL_SETTINGS", "", "ID", "DESC"); 
                    foreach ($general_info as $gi) { ?>
                <a href="<?php echo base_url(); ?>"><img class="logo-img" src="<?php echo base_url(); ?>uploads/school_info/logo/<?php echo $gi->SCHOOL_LOGO; ?>" alt="logo" width="150px" height="80px"></a><span class="splash-description"><?php echo $this->lang->line('login_title');?></span>
                <?php
                    }
                  ?>
            </div>
            <div class="card-body">
            <h2 style="color:green"> <?php

                                                    $dt = $this->session->userdata("error");
                                                    if ($dt != NULL) {
                                                        echo $dt;
                                                    
                                                        $this->session->unset_userdata("error");
                                                       
                                                    }
                                                    ?></h2>
                <form action="<?php echo base_url(); ?>login/insert" method="post">
                    <div class="form-group">
					   <p><?php echo form_error('username'); ?></p>
                        <input class="form-control form-control-lg" name="username" id="username" type="text" placeholder="<?php echo $this->lang->line('username');?>" autocomplete="off">
                    </div>
                    <div class="form-group">
					   <p><?php echo form_error('password'); ?></p>
                        <input class="form-control form-control-lg" name="password" id="password" type="password" placeholder="<?php echo $this->lang->line('password');?>">
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox float-left">
                            <input class="custom-control-input" type="checkbox" value="1" name="remember"><span class="custom-control-label"><?php echo $this->lang->line('remember_me');?></span>
                        </label>
						<div class="card-footer-item card-footer-item-bordered float-right">
                  
					<a href="<?php echo base_url();?>" class="footer-link "><i class="fas fa-arrow-circle-left"></i>Back</a>
                </div>
                    </div>
					   
                    <button type="submit" class="btn btn-primary btn-lg btn-block"><?php echo $this->lang->line('sign_in');?></button>
                </form>
            </div>
           
        </div>
        

    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 
</html>
   <?php 
    if(isset($_COOKIE['username']) and ($_COOKIE['password'])){
        $username=$_COOKIE['username'];
       $password= $_COOKIE['password'];
      echo "<script>
      document.getElementById('username').value='$username';
          document.getElementById('password').value='$password';
      </script>";
    }
?>