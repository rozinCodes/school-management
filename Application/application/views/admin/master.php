<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?php echo base_url(); ?>assets/images/icon/favicon-16x16.png" type="image/x-icon" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="<?php echo base_url(); ?>assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/libs/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/libs/css/my_style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/libs/css/datatables.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/libs/css/datatables.checkboxes.css"> -
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/select2/css/select2.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/summernote/css/summernote-bs4.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/datepicker/tempusdominus-bootstrap-4.css" />



    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/datatables/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/datatables/css/fixedHeader.bootstrap4.css">


    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script> -->
    <script src="<?php echo base_url(); ?>assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/multi-select/js/jquery.multi-select.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/js/main-js.js"></script>


    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datatables/js/data-table.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>




    <title><?php
            if (isset($title)) {
                echo $title;
            }
            ?></title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <?php
                // $general_info= $this->staff_model->get_general_setting("GENERAL_SETTINGS");
                $general_info = $this->common_model->view_data("GENERAL_SETTINGS", "", "ID", "DESC");

                foreach ($general_info as $gi) {
                    $roles = $this->session->userdata('roles');
                    if ($roles == 5) {
                ?>
                        <a class="navbar-brand" style="color: #6d8298;"><img src="<?php echo base_url(); ?>uploads/school_info/logo/<?php echo $gi->SCHOOL_LOGO; ?>" width="100" height="50" style="margin-right: 150px" /><?php echo $gi->SCHOOL_NAME; ?></a>


                    <?php } else if ($roles == 3) {
                    ?>
                        <a class="navbar-brand" href="<?php echo base_url(); ?>" style="color: #6d8298;"><img src="<?php echo base_url(); ?>uploads/school_info/logo/<?php echo $gi->SCHOOL_LOGO; ?>" width="100" height="50" style="margin-right: 150px" /><?php echo $gi->SCHOOL_NAME; ?></a>

                    <?php
                    } else {
                    ?>
                        <a class="navbar-brand" href="<?php echo base_url(); ?>" style="color: #6d8298;"><img src="<?php echo base_url(); ?>uploads/school_info/logo/<?php echo $gi->SCHOOL_LOGO; ?>" width="100" height="50" style="margin-right: 150px" /><?php echo $gi->SCHOOL_NAME; ?></a>

                <?php
                    }
                }
                ?>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item">
                            <div id="custom-search" class="top-search-bar">
                                <?php
                                $event_data = $this->fullcalendar_model->fetch_next_event("EVENTS");
                                if ($event_data) {
                                    $event = "Next Event Comming!!! ";
                                } else {
                                    $event = "No Event in Next 7 Days";
                                }
                                ?>
                                <marquee style="color:#B81319" behavior="scroll" direction="left" scrollamount="5"> <?php
                                                                                                                    echo $event;
                                                                                                                    foreach ($event_data as $value) {
                                                                                                                        $sdate = $value->START_EVENT;
                                                                                                                        $a = strval($sdate);
                                                                                                                        $aa = str_replace(".000000", "", $a);
                                                                                                                        $date1 = date_create($aa);
                                                                                                                        $startdate = date_format($date1, "Y-m-d H:i:s a");
                                                                                                                        echo $value->TITLE;
                                                                                                                        echo " On ";
                                                                                                                        echo $startdate;
                                                                                                                        echo ",";
                                                                                                                    }
                                                                                                                    ?> </marquee>






                            </div>
                        </li>
                        <li class="nav-item dropdown notification" style="display: none;">
                            <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell"></i> <span class="indicator"></span></a>
                            <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                                <li>
                                    <div class="notification-title"> Notification</div>
                                    <div class="notification-list">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action active">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img src="<?php echo base_url(); ?>assets/images/avatar-2.jpg" alt="" class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name">Jeremy Rakestraw</span>accepted your invitation to join the team.
                                                        <div class="notification-date">2 min ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img src="<?php echo base_url(); ?>assets/images/avatar-3.jpg" alt="" class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name">John Abraham </span>is now following you
                                                        <div class="notification-date">2 days ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img src="<?php echo base_url(); ?>assets/images/avatar-4.jpg" alt="" class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name">Monaan Pechi</span> is watching your main repository
                                                        <div class="notification-date">2 min ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img src="<?php echo base_url(); ?>assets/images/avatar-5.jpg" alt="" class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name">Jessica Caruso</span>accepted your invitation to join the team.
                                                        <div class="notification-date">2 min ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="list-footer"> <a href="#">View all notifications</a></div>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown notification">
                            <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-envelope-open"> <span id="autodata"></span></i> </a>
                            <div></div>
                            <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                                <li>
                                    <div class="notification-title"> Notification</div>

                                    <div class="notification-list">
                                        <div class="list-group">
                                            <div id="autodata2"></div>
                                        </div>
                                    </div>


                                </li>

                            </ul>
                        </li>


                        <script>
                            $(document).ready(function() {
                                setInterval(function() {
                                    $("#autodata").load("<?php echo base_url(); ?>Communication/autoload");
                                    $("#autodata2").load("<?php echo base_url(); ?>Communication/autoload2");
                                    refresh();
                                }, 1000);
                            });
                        </script>
                        <li class="nav-item dropdown notification" style="display: none;">

                            <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-envelope-open"> <span><?php
                                                                                                                                                                                                        $unreadMessage = $this->communication_model->unread_message_alert();
                                                                                                                                                                                                        if (count($unreadMessage) > 0) {
                                                                                                                                                                                                            echo '<span class="badge">' . count($unreadMessage) . '</span>';
                                                                                                                                                                                                        }
                                                                                                                                                                                                        ?></span></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                                <li>
                                    <div class="notification-title"> Notification</div>

                                    <div class="notification-list">
                                        <div class="list-group">
                                            <?php
                                            if (count($unreadMessage) > 0) {
                                                foreach ($unreadMessage as $message) :
                                            ?>
                                                    <a href="<?php echo base_url('communication/mailbox/read?type=' . $message['MSG_TYPE'] . '&id=' . $message['ID']); ?>" class="list-group-item list-group-item-action active">
                                                        <div class="notification-info">
                                                            <div class="notification-list-user-img"><img src="<?php echo base_url(); ?>assets/images/avatar-2.jpg" alt="" class="user-avatar-md rounded-circle"></div>
                                                            <div class="notification-list-user-block"><span class="notification-list-user-name"><?php echo $message['SUBJECT']; ?></span><br><?php echo mb_strimwidth(strip_tags($message['BODY']), 0, 35, "..."); ?>
                                                                <div class="notification-date"><?php echo get_nicetime($message['CREATED_AT']); ?></div>
                                                            </div>
                                                        </div>
                                                    </a>
                                            <?php
                                                endforeach;
                                            } else {
                                                echo '<div class="notification-list-user-block"><span class="notification-list-user-name">You do not have any new messages
                                                           
                                                        </div>';
                                                //echo '<li class="text-center">You do not have any new messages</li>';
                                            }
                                            ?>

                                        </div>
                                    </div>


                                </li>

                            </ul>
                        </li>

                        <!-- keep -->
                        <li class="nav-item dropdown connection">
                            <?php ?>
                            <button type="button" class="btn btn-primary keep-click" onclick="windowOpen()" style="margin-top: 7px;">
                                <?php echo $this->lang->line('keep'); ?></button>


                        </li>



                        <!-- keep -->
                        <li class="nav-item dropdown connection">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-fw fa-th"></i> </a>
                            <ul class="dropdown-menu dropdown-menu-right connection-dropdown">
                                <li class="connection-list">
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item" onclick="languagesChange('english');"><img src="<?php echo base_url(); ?>assets/images/icon/uk.png" alt=""> <span><?php echo $this->lang->line('english'); ?></span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item" onclick="languagesChange('bangla');"><img src="<?php echo base_url(); ?>assets/images/icon/bangladesh.png" alt=""> <span><?php echo $this->lang->line('bangla'); ?></span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item" onclick="languagesChange('korea');"><img src="<?php echo base_url(); ?>assets/images/icon/flag.png" alt=""> <span><?php echo $this->lang->line('korea'); ?></span></a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item" onclick="languagesChange('hindi');"><img src="<?php echo base_url(); ?>assets/images/icon/india.png" alt=""> <span><?php echo $this->lang->line('hindi'); ?></span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item" onclick="languagesChange('urdu');"> <img src="<?php echo base_url(); ?>assets/images/icon/pakistan.png" alt=""><span><?php echo $this->lang->line('urdu'); ?></span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item" onclick="languagesChange('japanese');"><img src="<?php echo base_url(); ?>assets/images/icon/japan.png" alt=""> <span><?php echo $this->lang->line('japanese'); ?></span></a>
                                        </div>
                                    </div>
                                </li>
                                <!--
                                        <li>
                                            <div class="conntection-footer"><a href="#">More</a></div>
                                        </li>
                                    -->
                            </ul>
                        </li>
                        <li class="nav-item dropdown nav-user">
                            <?php
                            $roles = $this->session->userdata('roles');
                            if ($roles == 5) {

                                if ($this->session->userdata('photo') != NULL) {
                            ?>

                                    <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="profile-user-img img-responsive men-img" src="<?php echo base_url(); ?>uploads/students/picture/<?php echo $this->session->userdata('photo') ?> " alt="User profile picture"></a>
                                <?php
                                } else {
                                ?>
                                    <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="profile-user-img img-responsive men-img" src="<?php echo base_url(); ?>upload/images/no-pic.jpg " alt="User profile picture"></a>
                                <?php
                                }
                                ?>
                                <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">


                                <?php
                            } else if ($roles == 6) {
                                $admission_no = $this->session->userdata('admission_no');
                                $guardian_photo = $this->student_model->get_guardian_photo("STUDENTS", $admission_no);
                                // echo $guardian_photo->GUARDIAN_PHOTO;
                                // exit(); 
								if($guardian_photo->GUARDIAN_PHOTO==NULL){
                                ?>
                                    <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="profile-user-img img-responsive men-img" src="<?php echo base_url(); ?>uploads/students/picture/no_image.png" alt="User profile picture"></a>
                                    <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                    <?php
								}else{
									?>
									 <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="profile-user-img img-responsive men-img" src="<?php echo base_url(); ?>uploads/students/picture/<?php echo $guardian_photo->GUARDIAN_PHOTO ?>?> " alt="User profile picture"></a>
                                    <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
									<?php
								}
                                } else {
                                    ?>
                                        <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="profile-user-img img-responsive men-img " src="<?php echo base_url(); ?>uploads/staff/picture/<?php echo $this->session->userdata('photo') ?> " alt="User profile picture"></a>
                                        <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">

                                        <?php
                                    }
                                        ?>

                                        <?php
                                        $roles = $this->session->userdata('roles');
                                        if ($roles == 5) {
                                        ?>
                                            <div class="nav-user-info status_border">
                                                <span><i class=" fas fa-check-circle status status_icon"></i></span>
                                                <h5 class="mb-0 text-white nav-user-name"><?php
                                                                                            $first_name = $this->session->userdata('fname');

                                                                                            echo $first_name;
                                                                                            ?>
                                                </h5>
                                                <p style="padding-left: 22px;">Student</p>


                                                <!-- <span class="status"></span><span class="ml-2"><i class=" fas fa-check-circle"></i> Available</span> -->
                                            </div>
                                            <a class="dropdown-item" href="<?php echo base_url() ?>student/student_view/student_profile"><i class="fas fa-user mr-2"></i>Profile</a>
                                            <a class="dropdown-item" href="<?php echo base_url(); ?>student/student_view/change_pass_view"><i class="fas fa-key"></i> Change Password</a>

                                        <?php } else if ($roles == 6) {
                                        ?>
                                            <div class="nav-user-info status_border">
                                                <span><i class=" fas fa-check-circle status status_icon"></i></span>
                                                <h5 class="mb-0 text-white nav-user-name"><?php
                                                                                            $admission_no = $this->session->userdata('admission_no');
                                                                                            $guardian_photo = $this->student_model->get_guardian_photo("STUDENTS", $admission_no);
                                                                                            $first_name = $guardian_photo->GUARDIAN_NAME;

                                                                                            echo $first_name;
                                                                                            ?>
                                                </h5>
                                                <p style="padding-left: 22px;">Guardian</p>


                                                <!-- <span class="status"></span><span class="ml-2"><i class=" fas fa-check-circle"></i> Available</span> -->
                                            </div>

                                            <a class="dropdown-item" href="<?php echo base_url(); ?>student/student_view/change_pass_view"><i class="fas fa-key"></i> Change Password</a>

                                        <?php
                                        } else {
                                        ?>

                                            <div class="nav-user-info status_border">
                                                <span><i class=" fas fa-check-circle status status_icon"></i></span>
                                                <h5 class="mb-0 text-white nav-user-name"><?php
                                                                                            $first_name = $this->session->userdata('fname');

                                                                                            echo $first_name;
                                                                                            ?> </h5>

                                                <!-- <span class="status"></span><span class="ml-2"><i class=" fas fa-check-circle"></i> Available</span> -->
                                            </div>

                                            <a class="dropdown-item" href="<?php echo base_url() ?>admin/hrms/staff/staff_details/<?php echo $stff_id = $this->session->userdata('id'); ?>"><i class="fas fa-user mr-2"></i><?php echo $this->lang->line('profile'); ?></a>

                                            <a class="dropdown-item" href="<?php echo base_url(); ?>admin/hrms/staff/change_pass_view"><i class="fas fa-key"></i> <?php echo $this->lang->line('change_password'); ?></a>


                                        <?php
                                        }
                                        ?>




                                        <a class="dropdown-item" href="<?php echo base_url(); ?>logout"><i class="fas fa-power-off mr-2"></i> <?php echo $this->lang->line('logout'); ?></a>
                                        </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                <?php echo $this->lang->line('menu'); ?>
                            </li>
                            <?php
                            $roles = $this->session->userdata('roles');

                            if (($roles == 1) or ($roles == 2)) {
                            ?>

                                <li class="nav-item ">
                                    <a <?php
                                        if ($active == "dashboard") {
                                            echo "class='nav-link active'";
                                        } else {
                                            echo "class='nav-link'";
                                        }
                                        ?> href="<?php echo base_url(); ?>admin/dashboard" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i><?php echo $this->lang->line('dashboard'); ?><span class="badge badge-success">6</span></a>

                                </li>
                            <?php } else if ($roles == 3) {
                            ?>

                                <li class="nav-item ">
                                    <a <?php
                                        if ($active == "dashboard") {
                                            echo "class='nav-link active'";
                                        } else {
                                            echo "class='nav-link'";
                                        }
                                        ?> href="<?php echo base_url(); ?>admin/dashboard/teacher_dashboard" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i><?php echo $this->lang->line('dashboard'); ?><span class="badge badge-success">6</span></a>

                                </li><?php }
                                        ?>




                            <?php
                            $roles = $this->session->userdata('roles');

                            if (($roles == 1) or ($roles == 2)) {
                            ?>
                                <li class="nav-item ">
                                    <a <?php
                                        if ($active == "go_live") {
                                            echo "class='nav-link active'";
                                        } else {
                                            echo "class='nav-link'";
                                        }
                                        ?> href="<?php echo base_url(); ?>academics_version/version_book_upload/go_live" aria-expanded="false" data-target="#go_live" aria-controls="submenu-1"><img style="width: 15px;" src="<?php echo base_url(); ?>/assets/images/red-circle.gif" alt="Red Circle">&nbsp;&nbsp;&nbsp;<?php echo $this->lang->line('go_live'); ?><span class="badge badge-success">6</span></a>

                                </li>


                                <li class="nav-item">
                                    <a <?php
                                        if ($active == "student_information") {
                                            echo "class='nav-link active'";
                                        } else {
                                            echo "class='nav-link'";
                                        }
                                        ?> href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-studentinfo" aria-controls="submenu-studentinfo"><i class="fas fa-info"></i><?php echo $this->lang->line('student_info'); ?></a>
                                    <div id="submenu-studentinfo" class="collapse submenu">
                                        <ul class="nav flex-column">

                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo base_url(); ?>studentDetails"><?php echo $this->lang->line('student_details'); ?></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo base_url(); ?>studentAdmission"><?php echo $this->lang->line('student_admission'); ?></a>
                                            </li>
											  <li class="nav-item">
                                                <a class="nav-link" href="<?php echo base_url(); ?>student/online_admission/view">Online Admission Report</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo base_url(); ?>studentAttendence"><?php echo $this->lang->line('student_attendence'); ?></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo base_url(); ?>admin/student/student_attendence_report"><?php echo $this->lang->line('student_attendence_report'); ?></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo base_url(); ?>admin/student/student_late_attendence"><?php echo $this->lang->line('student_late_attendence'); ?></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo base_url(); ?>student/studentleave/approve_leave"><?php echo $this->lang->line('approve_leave'); ?></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo base_url(); ?>admin/student/student_for_promote"><?php echo $this->lang->line('promote_student'); ?></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo base_url(); ?>admin/student/four_subject_assign"><?php echo $this->lang->line('four_subject_assign'); ?></a>
                                            </li>

                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a <?php
                                        if ($active == "academics") {
                                            echo "class='nav-link active'";
                                        } else {
                                            echo "class='nav-link'";
                                        }
                                        ?> href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-academics" aria-controls="submenu-academics"><i class="fas fa-address-book"></i><?php echo $this->lang->line('academics'); ?></a>
                                    <div id="submenu-academics" class="collapse submenu">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo base_url(); ?>admin/sessions"><?php echo $this->lang->line('session'); ?></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo base_url(); ?>admin/section"><?php echo $this->lang->line('section'); ?></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo base_url(); ?>admin/classes"><?php echo $this->lang->line('class'); ?></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo base_url(); ?>admin/subjects"><?php echo $this->lang->line('subjects'); ?></a>
                                            </li>
                                            <!-- <li class="nav-item">
                                                <a class="nav-link" href="<?php echo base_url(); ?>academics_version/classes"><?php echo $this->lang->line('subjects_group'); ?></a>
                                            </li> -->
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo base_url(); ?>academics_version/version_book_upload/ebook_upload"><?php echo $this->lang->line('ebook_upload'); ?></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo base_url(); ?>academics_version/version_book_upload/lecture_video_upload"><?php echo $this->lang->line('lecture_video_upload'); ?></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo base_url(); ?>academics_version/version_book_upload/lecture_pdf_upload"><?php echo $this->lang->line('lecture_pdf_upload'); ?></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo base_url(); ?>academics_version/version_book_upload/lecture_power_point_upload"><?php echo $this->lang->line('lecture_power_point_upload'); ?></a>
                                            </li>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/academics/teacher_shift_assign"><?php echo $this->lang->line('teacher_shift_assign'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/academics/student_shift_assign"><?php echo $this->lang->line('student_shift_assign'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/academics/teacher_assign"><?php echo $this->lang->line('assign_ct'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/academics/class_period"><?php echo $this->lang->line('class_period'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/academics/class_timetable_making"><?php echo $this->lang->line('make_class_timetable'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/academics/timetable/teachers_timetable"><?php echo $this->lang->line('timetable_teach'); ?></a>
                                </li>


                        </ul>
                    </div>
                    </li>
                    <li class="nav-item">
                        <a <?php
                                if ($active == "task") {
                                    echo "class='nav-link active'";
                                } else {
                                    echo "class='nav-link'";
                                }
                            ?> href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-result" aria-controls="submenu-result"><i class="fas fa-folder-open"></i><?php echo $this->lang->line('exams'); ?></a>
                        <div id="submenu-result" class="collapse submenu">
                            <ul class="nav flex-column">

                                <!-- <li class="nav-item">
                                                                            <a class="nav-link" href="<?php echo base_url(); ?>admin/exams/Exam_routine"><?php echo $this->lang->line('exam_routine'); ?></a>
                                                                        </li> -->
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/exams/Exam_routine2"><?php echo $this->lang->line('exam_routine'); ?></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/exams/marksGrade/add_grade"><?php echo $this->lang->line('marks_grade'); ?></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/exams/exam/create_exam"><?php echo $this->lang->line('create_exam'); ?></a>
                                </li>





                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a <?php
                                if ($active == "online_exam") {
                                    echo "class='nav-link active'";
                                } else {
                                    echo "class='nav-link'";
                                }
                            ?> href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-online_exam" aria-controls="submenu-result"><i class="fas fa-folder-open"></i><?php echo $this->lang->line('online_exam'); ?></a>
                        <div id="submenu-online_exam" class="collapse submenu">
                            <ul class="nav flex-column">

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/online_exam"><?php echo $this->lang->line('add_exam'); ?></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/online_exam/question"><?php echo $this->lang->line('add_question'); ?></a>
                                </li>


                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a <?php
                                if ($active == "task") {
                                    echo "class='nav-link active'";
                                } else {
                                    echo "class='nav-link'";
                                }
                            ?> href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-accounts" aria-controls="submenu-accounts">৳ </i><?php echo $this->lang->line('accounts'); ?></a>
                        <div id="submenu-accounts" class="collapse submenu">
                            <ul class="nav flex-column">


                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/fees/fees_type"><?php echo $this->lang->line('fees_type'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/fees/add_fees"><?php echo $this->lang->line('add_fees'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/fees/collect_fees"><?php echo $this->lang->line('collect_fees'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/fees/due_fees"><?php echo $this->lang->line('due_fees'); ?></a>
                                </li>



                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a <?php
                                if ($active == "expense") {
                                    echo "class='nav-link active'";
                                } else {
                                    echo "class='nav-link'";
                                }
                            ?> href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-expense" aria-controls="submenu-expense">৳ </i><?php echo $this->lang->line('expense'); ?></a>
                        <div id="submenu-expense" class="collapse submenu">
                            <ul class="nav flex-column">


                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/expense/expense/add_expense"><?php echo $this->lang->line('add_expense'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/expense/expense/search_expense"><?php echo $this->lang->line('search_expense'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/expense/expense"><?php echo $this->lang->line('expense_category'); ?></a>
                                </li>


                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a <?php
                                if ($active == "income") {
                                    echo "class='nav-link active'";
                                } else {
                                    echo "class='nav-link'";
                                }
                            ?> href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-income" aria-controls="submenu-income">৳ </i><?php echo $this->lang->line('income'); ?></a>
                        <div id="submenu-income" class="collapse submenu">
                            <ul class="nav flex-column">


                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/income/income/add_income"><?php echo $this->lang->line('add_income'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/income/income/search_income"><?php echo $this->lang->line('search_income'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/income/income"><?php echo $this->lang->line('income_category'); ?></a>
                                </li>


                            </ul>
                        </div>
                    </li>




                    <li class="nav-item">
                        <a <?php
                                if ($active == "task") {
                                    echo "class='nav-link active'";
                                } else {
                                    echo "class='nav-link'";
                                }
                            ?> href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-hrms" aria-controls="submenu-hrms"><i class=" fas fa-id-card"></i><?php echo $this->lang->line('hrms'); ?></a>
                        <div id="submenu-hrms" class="collapse submenu">
                            <ul class="nav flex-column">


                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/hrms/staff/staff_directory"><?php echo $this->lang->line('staff_directory'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>Admin/hrms/staff"><?php echo $this->lang->line('add_staff'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/hrms/staff/staff_attendence"><?php echo $this->lang->line('staff_attendence'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/hrms/staff/staff_late_attendence"><?php echo $this->lang->line('staff_late_attendence'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/hrms/staff/staff_attendence_report"><?php echo $this->lang->line('staff_attendence_report'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/hrms/staff/payroll"><?php echo $this->lang->line('payroll'); ?></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>Admin/hrms/leave"><?php echo $this->lang->line('leave_type'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/hrms/staff/apply_leave"><?php echo $this->lang->line('apply_leave'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/hrms/staff/approved_leave_request"><?php echo $this->lang->line('approve_leave_request'); ?></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>Admin/hrms/department"><?php echo $this->lang->line('department'); ?></a>
                                </li>


                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>Admin/hrms/designation"><?php echo $this->lang->line('designation'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>Admin/hrms/shift"><?php echo $this->lang->line('add_shift'); ?></a>
                                </li>


                            </ul>
                        </div>
                    </li>



                    <li class="nav-item">
                        <a <?php
                                if ($active == "task") {
                                    echo "class='nav-link active'";
                                } else {
                                    echo "class='nav-link'";
                                }
                            ?> href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-assets" aria-controls="submenu-assets"><i class=" fas fa-database"></i><?php echo $this->lang->line('assets'); ?></a>
                        <div id="submenu-assets" class="collapse submenu">
                            <ul class="nav flex-column">

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/assets/assets/add_assets"><?php echo $this->lang->line('add_assets'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/assets/assets/search_assets"><?php echo $this->lang->line('search_assets'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/assets/assets"><?php echo $this->lang->line('assets_category'); ?></a>
                                </li>



                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a <?php
                                if ($active == "task") {
                                    echo "class='nav-link active'";
                                } else {
                                    echo "class='nav-link'";
                                }
                            ?> href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-download" aria-controls="submenu-download"><i class=" fas fa-download"></i><?php echo $this->lang->line('download_center'); ?></a>
                        <div id="submenu-download" class="collapse submenu">
                            <ul class="nav flex-column">

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/download_center/content"><?php echo $this->lang->line('upload_content'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/download_center/content/assignment"><?php echo $this->lang->line('assignment'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/download_center/content/study_material"><?php echo $this->lang->line('study_material'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/download_center/content/syllabus"><?php echo $this->lang->line('syllabus'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/download_center/content/other_download"><?php echo $this->lang->line('other_downloads'); ?></a>
                                </li>



                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a <?php
                                if ($active == "homework") {
                                    echo "class='nav-link active'";
                                } else {
                                    echo "class='nav-link'";
                                }
                            ?> href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-homework" aria-controls="submenu-homework"><i class=" fas fa-download"></i><?php echo $this->lang->line('home_work'); ?></a>
                        <div id="submenu-homework" class="collapse submenu">
                            <ul class="nav flex-column">

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/homework/homework"><?php echo $this->lang->line('add_homework'); ?></a>
                                </li>





                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a <?php
                                if ($active == "task") {
                                    echo "class='nav-link active'";
                                } else {
                                    echo "class='nav-link'";
                                }
                            ?> href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-notice" aria-controls="submenu-notice"><i class="far fa-clipboard"></i><?php echo $this->lang->line('notice'); ?></a>
                        <div id="submenu-notice" class="collapse submenu">
                            <ul class="nav flex-column">

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/notice/notice_board"><?php echo $this->lang->line('upload_notice'); ?></a>
                                </li>




                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a <?php
                                if ($active == "certificates") {
                                    echo "class='nav-link active'";
                                } else {
                                    echo "class='nav-link'";
                                }
                            ?> href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-events" aria-controls="submenu-events"><i class="fas fa-newspaper"></i><?php echo $this->lang->line('events'); ?></a>
                        <div id="submenu-events" class="collapse submenu">
                            <ul class="nav flex-column">

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/events/fullcalendar"><?php echo $this->lang->line('calanderandevents'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/events/schoolcalendar"><?php echo $this->lang->line('schoolcalander'); ?></a>
                                </li>




                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a <?php
                                if ($active == "certificates") {
                                    echo "class='nav-link active'";
                                } else {
                                    echo "class='nav-link'";
                                }
                            ?> href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-certificates" aria-controls="submenu-certificates"><i class="fas fa-newspaper"></i><?php echo $this->lang->line('certificates'); ?></a>
                        <div id="submenu-certificates" class="collapse submenu">
                            <ul class="nav flex-column">

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/certificates/generate_id_card"><?php echo $this->lang->line('id_card_generate'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/certificates/design/staff_id_card"><?php echo $this->lang->line('staff_id_card'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/certificates/design/student_certificate_design"><?php echo $this->lang->line('student_certificate_design'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/certificates/design/student_marksheet_design"><?php echo $this->lang->line('student_marksheet_design'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/certificates/design/admit_card">Admit Card</a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a <?php
                                if ($active == "task") {
                                    echo "class='nav-link active'";
                                } else {
                                    echo "class='nav-link'";
                                }
                            ?> href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-settings" aria-controls="submenu-settings"><i class=" 
                                                                                                                                                                                      far fa-sun"></i><?php echo $this->lang->line('settings'); ?></a>
                        <div id="submenu-settings" class="collapse submenu">
                            <ul class="nav flex-column">

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/settings/general_settings"><?php echo $this->lang->line('general_settings'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/settings/access_control/create_access"><?php echo $this->lang->line('access_control'); ?></a>
                                </li>



                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a <?php
                                if ($active == "biomatric") {
                                    echo "class='nav-link active'";
                                } else {
                                    echo "class='nav-link'";
                                }
                            ?> href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-biomatric" aria-controls="submenu-biomatric"><i class=" fas fa-clipboard"></i><?php echo $this->lang->line('bioattendence'); ?></a>
                        <div id="submenu-biomatric" class="collapse submenu">
                            <ul class="nav flex-column">

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/BioAttendance"><?php echo $this->lang->line('relodebioattendence'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/BioAttendance/bioattendenceSummery"><?php echo $this->lang->line('bioattendenceReport'); ?></a>
                                </li>



                            </ul>
                        </div>
                    </li>


                    <li class="nav-item">
                        <a <?php
                                if ($active == "task") {
                                    echo "class='nav-link active'";
                                } else {
                                    echo "class='nav-link'";
                                }
                            ?> href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-reports" aria-controls="submenu-reports"><i class=" fas fa-clipboard"></i><?php echo $this->lang->line('reports'); ?></a>
                        <div id="submenu-reports" class="collapse submenu">
                            <ul class="nav flex-column">


                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/reports/login_info"><?php echo $this->lang->line('login_info'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>keep/view"><?php echo $this->lang->line('keep'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/reports/onlineexam_reports"><?php echo $this->lang->line('onlineexam_reports'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>student/student_download_center/other_download"><?php echo $this->lang->line('other_downloads'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/alumni/alumni_report"><?php echo $this->lang->line('alumni_report'); ?></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/finance/finance_report"><?php echo $this->lang->line('finance_report'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/exams/Result_report"><?php echo $this->lang->line('results_report'); ?></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/reports/ins_rep"><?php echo $this->lang->line('income_expense_report'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/BioAttendance/bioAttReport"><?php echo $this->lang->line('bioattReport'); ?></a>
                                </li>



                            </ul>
                        </div>
                    </li>
                <?php
                            } else if ($roles == 3) {
                ?>

                    <li class="nav-item">
                        <a <?php
                                if ($active == "student_information") {
                                    echo "class='nav-link active'";
                                } else {
                                    echo "class='nav-link'";
                                }
                            ?> href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-studentinfo" aria-controls="submenu-studentinfo"><i class="fas fa-info"></i><?php echo $this->lang->line('student_info'); ?></a>
                        <div id="submenu-studentinfo" class="collapse submenu">
                            <ul class="nav flex-column">

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/student/student_lists"><?php echo $this->lang->line('student_details'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/student/student_admission"><?php echo $this->lang->line('student_admission'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/student/student_attendence"><?php echo $this->lang->line('student_attendence'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/student/student_attendence_report"><?php echo $this->lang->line('student_attendence_report'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/student/student_late_attendence"><?php echo $this->lang->line('student_late_attendence'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>student/studentleave/approve_leave"><?php echo $this->lang->line('approve_leave'); ?></a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a <?php
                                if ($active == "academics") {
                                    echo "class='nav-link active'";
                                } else {
                                    echo "class='nav-link'";
                                }
                            ?> href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-academics" aria-controls="submenu-academics"><i class="fas fa-address-book"></i><?php echo $this->lang->line('academics'); ?></a>
                        <div id="submenu-academics" class="collapse submenu">
                            <ul class="nav flex-column">


                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>academics_version/version_book_upload/ebook_upload"><?php echo $this->lang->line('ebook_upload'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>academics_version/version_book_upload/lecture_video_upload"><?php echo $this->lang->line('lecture_video_upload'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>academics_version/version_book_upload/lecture_pdf_upload"><?php echo $this->lang->line('lecture_pdf_upload'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>academics_version/version_book_upload/lecture_power_point_upload"><?php echo $this->lang->line('lecture_power_point_upload'); ?></a>
                                </li>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>admin/academics/timetable/teachers_timetable"><?php echo $this->lang->line('timetable_teach'); ?></a>
                    </li>


                    </ul>
            </div>
            </li>
            <li class="nav-item">
                <a <?php
                                if ($active == "task") {
                                    echo "class='nav-link active'";
                                } else {
                                    echo "class='nav-link'";
                                }
                    ?> href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-result" aria-controls="submenu-result"><i class="fas fa-folder-open"></i><?php echo $this->lang->line('exams'); ?></a>
                <div id="submenu-result" class="collapse submenu">
                    <ul class="nav flex-column">




                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>admin/exams/insert_marks"><?php echo $this->lang->line('insert_marks'); ?></a>
                        </li>


                    </ul>
                </div>
            </li>



            <li class="nav-item">
                <a <?php
                                if ($active == "task") {
                                    echo "class='nav-link active'";
                                } else {
                                    echo "class='nav-link'";
                                }
                    ?> href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-hrms" aria-controls="submenu-hrms"><i class=" fas fa-id-card"></i><?php echo $this->lang->line('hrms'); ?></a>
                <div id="submenu-hrms" class="collapse submenu">
                    <ul class="nav flex-column">


                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>admin/hrms/staff/staff_directory"><?php echo $this->lang->line('staff_directory'); ?></a>
                        </li>




                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>admin/hrms/staff/apply_leave"><?php echo $this->lang->line('apply_leave'); ?></a>
                        </li>


                    </ul>
                </div>
            </li>



            <li class="nav-item">
                <a <?php
                                if ($active == "task") {
                                    echo "class='nav-link active'";
                                } else {
                                    echo "class='nav-link'";
                                }
                    ?> href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-download" aria-controls="submenu-download"><i class=" fas fa-download"></i><?php echo $this->lang->line('download_center'); ?></a>
                <div id="submenu-download" class="collapse submenu">
                    <ul class="nav flex-column">

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>admin/download_center/content"><?php echo $this->lang->line('upload_content'); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>admin/download_center/content/assignment"><?php echo $this->lang->line('assignment'); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>admin/download_center/content/study_material"><?php echo $this->lang->line('study_material'); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>admin/download_center/content/syllabus"><?php echo $this->lang->line('syllabus'); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>admin/download_center/content/other_download"><?php echo $this->lang->line('other_downloads'); ?></a>
                        </li>



                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a <?php
                                if ($active == "homework") {
                                    echo "class='nav-link active'";
                                } else {
                                    echo "class='nav-link'";
                                }
                    ?> href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-homework" aria-controls="submenu-homework"><i class=" fas fa-download"></i><?php echo $this->lang->line('home_work'); ?></a>
                <div id="submenu-homework" class="collapse submenu">
                    <ul class="nav flex-column">

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>admin/homework/homework"><?php echo $this->lang->line('add_homework'); ?></a>
                        </li>





                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a <?php
                                if ($active == "task") {
                                    echo "class='nav-link active'";
                                } else {
                                    echo "class='nav-link'";
                                }
                    ?> href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-notice" aria-controls="submenu-notice"><i class="far fa-clipboard"></i><?php echo $this->lang->line('my_notice'); ?></a>
                <div id="submenu-notice" class="collapse submenu">
                    <ul class="nav flex-column">

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>admin/notice/notice_board"><?php echo $this->lang->line('upload_notice'); ?></a>
                        </li>




                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a <?php
                                if ($active == "task") {
                                    echo "class='nav-link active'";
                                } else {
                                    echo "class='nav-link'";
                                }
                    ?> href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-reports" aria-controls="submenu-reports"><i class=" fas fa-clipboard"></i><?php echo $this->lang->line('reports'); ?></a>
                <div id="submenu-reports" class="collapse submenu">
                    <ul class="nav flex-column">


                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>admin/reports/login_info"><?php echo $this->lang->line('login_info'); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>keep/view"><?php echo $this->lang->line('keep'); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>admin/reports/onlineexam_reports"><?php echo $this->lang->line('onlineexam_reports'); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>student/student_download_center/other_download"><?php echo $this->lang->line('other_downloads'); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>admin/alumni/alumni_report"><?php echo $this->lang->line('alumni_report'); ?></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>admin/finance/finance_report"><?php echo $this->lang->line('finance_report'); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>admin/exams/Result_report"><?php echo $this->lang->line('results_report'); ?></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>admin/reports/ins_rep"><?php echo $this->lang->line('income_expense_report'); ?></a>
                        </li>



                    </ul>
                </div>
            </li>


        <?php
                            } else if ($roles == 5) {
        ?>

            <li class="nav-item">
                <a <?php
                                if ($active == "student_information") {
                                    echo "class='nav-link active'";
                                } else {
                                    echo "class='nav-link'";
                                }
                    ?> href="<?php echo base_url(); ?>student/student_view/student_profile" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fas fa-user-plus"></i><?php echo $this->lang->line('my_profile'); ?><span class="badge badge-success">6</span></a>

            </li>
            <li class="nav-item">
                <a <?php
                                if ($active == "class_routine") {
                                    echo "class='nav-link active'";
                                } else {
                                    echo "class='nav-link'";
                                }
                    ?> href="<?php echo base_url(); ?>student/student_view/class_routine" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fas fa-user-plus"></i><?php echo $this->lang->line('class_routine'); ?><span class="badge badge-success">6</span></a>

            </li>
            <li class="nav-item">
                <a <?php
                                if ($active == "live_class") {
                                    echo "class='nav-link active'";
                                } else {
                                    echo "class='nav-link'";
                                }
                    ?> href="<?php echo base_url(); ?>student/liveclass" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class=" fas fa-video"></i><?php echo $this->lang->line('live_class'); ?><span class="badge badge-success">6</span></a>

            </li>

            <!-- <li class="nav-item">
                                                            <a <?php
                                                                if ($active == "task") {
                                                                    echo "class='nav-link active'";
                                                                } else {
                                                                    echo "class='nav-link'";
                                                                }
                                                                ?> href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-result" aria-controls="submenu-result"><i class="fas fa-folder-open"></i><?php echo $this->lang->line('exams'); ?></a>
                                                            <div id="submenu-result" class="collapse submenu">
                                                                <ul class="nav flex-column">
                    
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" href="<?php echo base_url(); ?>admin/exams/marksGrade/add_grade"><?php echo $this->lang->line('exam_schedule'); ?></a>
                                                                    </li>
                    
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" href="<?php echo base_url(); ?>admin/exams/exam/create_exam"><?php echo $this->lang->line('exam_result'); ?></a>
                                                                    </li>
                    
                    
                                                                </ul>
                                                            </div>
                                                        </li> -->
            <li class="nav-item">
                <a <?php
                                if ($active == "online_exam") {
                                    echo "class='nav-link active'";
                                } else {
                                    echo "class='nav-link'";
                                }
                    ?> href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-online_exam1" aria-controls="submenu-result"><i class="fas fa-folder-open"></i><?php echo $this->lang->line('online_exam'); ?></a>
                <div id="submenu-online_exam1" class="collapse submenu">
                    <ul class="nav flex-column">

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>student/onlineexam"><?php echo $this->lang->line('online_exam'); ?></a>
                        </li>




                    </ul>
                </div>
            </li>


            <li class="nav-item">
                <a <?php
                                if ($active == "task") {
                                    echo "class='nav-link active'";
                                } else {
                                    echo "class='nav-link'";
                                }
                    ?> href="<?php echo base_url(); ?>student/student_view/student_fees" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="far fa-money-bill-alt"></i><?php echo $this->lang->line('fees'); ?><span class="badge badge-success">6</span></a>

            </li>
            <li class="nav-item">
                <a <?php
                                if ($active == "task") {
                                    echo "class='nav-link active'";
                                } else {
                                    echo "class='nav-link'";
                                }
                    ?> href="<?php echo base_url(); ?>student/student_view/student_attendence" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fas fa-calendar-check"></i><?php echo $this->lang->line('attendence'); ?><span class="badge badge-success">6</span></a>

            </li>
            <li class="nav-item">
                <a <?php
                                if ($active == "student_leave") {
                                    echo "class='nav-link active'";
                                } else {
                                    echo "class='nav-link'";
                                }
                    ?> href="<?php echo base_url(); ?>student/studentleave" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fas fa-calendar-check"></i><?php echo $this->lang->line('apply_leave'); ?><span class="badge badge-success">6</span></a>

            </li>




            <li class="nav-item">
                <a <?php
                                if ($active == "task") {
                                    echo "class='nav-link active'";
                                } else {
                                    echo "class='nav-link'";
                                }
                    ?> href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-download" aria-controls="submenu-download"><i class=" fas fa-download"></i><?php echo $this->lang->line('download_center'); ?></a>
                <div id="submenu-download" class="collapse submenu">
                    <ul class="nav flex-column">


                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>student/student_download_center/assignment"><?php echo $this->lang->line('assignment'); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>student/student_download_center/study_material"><?php echo $this->lang->line('study_material'); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>student/student_download_center/syllabus"><?php echo $this->lang->line('syllabus'); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>student/student_download_center/other_download"><?php echo $this->lang->line('other_downloads'); ?></a>
                        </li>



                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a <?php
                                if ($active == "homework") {
                                    echo "class='nav-link active'";
                                } else {
                                    echo "class='nav-link'";
                                }
                    ?> href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-homework" aria-controls="submenu-homework"><i class=" fas fa-download"></i><?php echo $this->lang->line('home_work'); ?></a>
                <div id="submenu-homework" class="collapse submenu">
                    <ul class="nav flex-column">

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>student/homework/homework"><?php echo $this->lang->line('add_homework'); ?></a>
                        </li>





                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a <?php
                                if ($active == "task") {
                                    echo "class='nav-link active'";
                                } else {
                                    echo "class='nav-link'";
                                }
                    ?> href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-notice" aria-controls="submenu-notice"><i class="far fa-clipboard"></i><?php echo $this->lang->line('my_notice'); ?></a>
                <div id="submenu-notice" class="collapse submenu">
                    <ul class="nav flex-column">

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>student/student_view/view_notice"><?php echo $this->lang->line('notice_board'); ?></a>
                        </li>




                    </ul>
                </div>
            </li>


        <?php
                            } else if ($roles == 6) {
        ?>

            <li class="nav-item">
                <a <?php
                                if ($active == "student_information") {
                                    echo "class='nav-link active'";
                                } else {
                                    echo "class='nav-link'";
                                }
                    ?> href="<?php echo base_url(); ?>student/student_view/student_profile_by_guardian" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fas fa-user-plus"></i><?php echo $this->lang->line('my_profile'); ?><span class="badge badge-success">6</span></a>

            </li>
            <li class="nav-item">
                <a <?php
                                if ($active == "class_routine") {
                                    echo "class='nav-link active'";
                                } else {
                                    echo "class='nav-link'";
                                }
                    ?> href="<?php echo base_url(); ?>student/student_view/class_routine" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fas fa-user-plus"></i><?php echo $this->lang->line('class_routine'); ?><span class="badge badge-success">6</span></a>

            </li>


            <!-- <li class="nav-item">
                                                            <a <?php
                                                                if ($active == "task") {
                                                                    echo "class='nav-link active'";
                                                                } else {
                                                                    echo "class='nav-link'";
                                                                }
                                                                ?> href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-result" aria-controls="submenu-result"><i class="fas fa-folder-open"></i><?php echo $this->lang->line('exams'); ?></a>
                                                            <div id="submenu-result" class="collapse submenu">
                                                                <ul class="nav flex-column">
                    
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" href="<?php echo base_url(); ?>admin/exams/marksGrade/add_grade"><?php echo $this->lang->line('exam_schedule'); ?></a>
                                                                    </li>
                    
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" href="<?php echo base_url(); ?>admin/exams/exam/create_exam"><?php echo $this->lang->line('exam_result'); ?></a>
                                                                    </li>
                    
                    
                                                                </ul>
                                                            </div>
                                                        </li> -->



            <li class="nav-item">
                <a <?php
                                if ($active == "task") {
                                    echo "class='nav-link active'";
                                } else {
                                    echo "class='nav-link'";
                                }
                    ?> href="<?php echo base_url(); ?>student/student_view/student_fees" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="far fa-money-bill-alt"></i><?php echo $this->lang->line('fees'); ?><span class="badge badge-success">6</span></a>

            </li>
            <li class="nav-item">
                <a <?php
                                if ($active == "task") {
                                    echo "class='nav-link active'";
                                } else {
                                    echo "class='nav-link'";
                                }
                    ?> href="<?php echo base_url(); ?>student/student_view/student_attendence" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fas fa-calendar-check"></i><?php echo $this->lang->line('attendence'); ?><span class="badge badge-success">6</span></a>

            </li>




            <li class="nav-item">
                <a <?php
                                if ($active == "task") {
                                    echo "class='nav-link active'";
                                } else {
                                    echo "class='nav-link'";
                                }
                    ?> href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-download" aria-controls="submenu-download"><i class=" fas fa-download"></i><?php echo $this->lang->line('download_center'); ?></a>
                <div id="submenu-download" class="collapse submenu">
                    <ul class="nav flex-column">


                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>student/student_download_center/assignment"><?php echo $this->lang->line('assignment'); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>student/student_download_center/study_material"><?php echo $this->lang->line('study_material'); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>student/student_download_center/syllabus"><?php echo $this->lang->line('syllabus'); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>student/student_download_center/other_download"><?php echo $this->lang->line('other_downloads'); ?></a>
                        </li>



                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a <?php
                                if ($active == "homework") {
                                    echo "class='nav-link active'";
                                } else {
                                    echo "class='nav-link'";
                                }
                    ?> href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-homework" aria-controls="submenu-homework"><i class=" fas fa-download"></i><?php echo $this->lang->line('home_work'); ?></a>
                <div id="submenu-homework" class="collapse submenu">
                    <ul class="nav flex-column">

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>student/homework/homework"><?php echo $this->lang->line('my_homework'); ?></a>
                        </li>





                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a <?php
                                if ($active == "task") {
                                    echo "class='nav-link active'";
                                } else {
                                    echo "class='nav-link'";
                                }
                    ?> href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-notice" aria-controls="submenu-notice"><i class="far fa-clipboard"></i><?php echo $this->lang->line('my_notice'); ?></a>
                <div id="submenu-notice" class="collapse submenu">
                    <ul class="nav flex-column">

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>student/student_view/view_notice"><?php echo $this->lang->line('notice_board'); ?></a>
                        </li>




                    </ul>
                </div>
            </li>


        <?php
                            }
        ?>
        <li class="nav-item ">
            <a <?php
                if ($active == "academics_version") {
                    echo "class='nav-link active'";
                } else {
                    echo "class='nav-link'";
                }
                ?> href="<?php echo base_url(); ?>academics_version/versions"><i class="fa fa-fw fa-book"></i><?php echo $this->lang->line('wis'); ?><span class="badge badge-success">6</span></a>

        </li>
        <li class="nav-item ">
            <a <?php
                if ($active == "message") {
                    echo "class='nav-link active'";
                } else {
                    echo "class='nav-link'";
                }
                ?> href="<?php echo base_url(); ?>communication/mailbox/inbox" aria-expanded="false" data-target="#submeneeu-2" aria-controls="submenu-chat"><i class="fa fa-envelope-open"></i><?php echo $this->lang->line('message'); ?><span class="badge badge-success">6</span></a>

        </li>

        </ul>
        </div>
        </nav>
    </div>
    </div>
    <!-- Keep Start -->
    <!-- Modal -->

    <!-- Keep end -->
    <!-- ============================================================== -->
    <!-- end left sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- wrapper  -->
    <!-- ============================================================== -->
    <input type="hidden" value="<?php echo strtotime(date('Y-m-d h:i:s')); ?>" id="rand" />

    <script>
        var Window;
        var random = $("#rand").val();
        // Function that open the new Window  
        function windowOpen() {

            Window = window.open(
                "<?php echo base_url(); ?>keep?v=" + random,
                "_blank", "width=400, height=450");
        }

        // function that Closes the open Window  
        function windowClose() {
            Window.close();
        }

        //function that blur the open Window 
        function windowBlur() {
            Window.blur();
        }

        //function that focus on open Window 
        function windowFocus() {
            Window.focus();
        }
        $(".keep-click").click(function() {
            var random = $("#rand").val();
            $.ajax({
                url: "<?php echo base_url(); ?>keep/insert",
                method: "POST",
                data: {
                    random: random
                },
                success: function(data) {
                    //$('#detail_cart').html(data);
                    //alert(data);

                }
            });

        });
    </script>


    <?php
    if (isset($content)) {
        echo $content;
    }
    ?>
    <!-- ============================================================== -->
    <!-- end wrapper  -->
    <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->

    <!-- bootstap bundle js -->
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="<?php echo base_url(); ?>assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/parsley/parsley.js"></script>

    <!-- main js -->
    <script src="<?php echo base_url(); ?>assets/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
    <script src="<?php echo base_url(); ?>assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="<?php echo base_url(); ?>assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="<?php echo base_url(); ?>assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="<?php echo base_url(); ?>assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/js/dashboard-ecommerce.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/select2/js/select2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datepicker/tempusdominus-bootstrap-4.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datepicker/datepicker.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/summernote/js/summernote-bs4.js"></script>
</body>

</html>

<script>
    function languagesChange(lan) {
        alert(lan);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>settings/setlanguage",
            data: {
                'lan': lan
            },
            success: function(data) {
                location.reload();
            }
        });
    }
</script>