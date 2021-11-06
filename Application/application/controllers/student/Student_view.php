<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student_view extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("UTC");
        $language = $this->session->userdata('language');
        $this->lang->load('auth', $language);
        if (!$this->session->userdata('authenticated')) {
            redirect("login");
        }
        // $roles= $this->session->userdata('roles');
        // if(!($roles==5)) {

        //     redirect(base_url() . "login", "refresh");
        //    // redirect("login");
        // }
    }



    public function student_profile()
    {



        $data = array();
        $data['active'] = "student_information";
        $data['title'] = "Student Profile";
        $this->load->helper("form");

        /* Current Sesssion Roles and ID start */
        $admission_no = $this->session->userdata('admission_no');
        $data['allPdt'] = $this->student_model->get_student_by_session("STUDENTS", $admission_no);



        /* Current Sesssion Roles and ID End */
        $cls = $data['allPdt']->CLASS_ID;
        $sec = $data['allPdt']->SECTION_ID;
        $sess = $data['allPdt']->SESSION_ID;


        $jan = "JAN";
        $dec = "DEC";
        $curr_year = date("Y");
        $curr_sess = $this->student_model->get_student_current_session("ENROLL", $cls, $sec, $sess);
        $s = $curr_sess->SESSION_NAME;
        //    print_r($s);
        //    exit();
        //$curr_year2 ="2019"; 


        $start_year = "01" . "-" . $jan . "-" . $curr_year;
        $end_year = "31" . "-" . $dec . "-" . $curr_year;

        $data['allPdt5'] = $this->student_model->get_details_std_attendence("STUDENT_ATTENDENCE", $admission_no, $start_year, $end_year);
        $data['allPdt6'] = $this->student_model->get_total_std_attendance_details("STUDENT_ATTENDENCE", $admission_no);
        $data['allPdt3'] = $this->student_model->get_specific_std_fees_details("ADD_FEES_AMOUNT", $admission_no);
        $data['count_exam'] = $this->common_model->view_data("EXAMS", "", "", "");
        $data['allPdt2'] = $this->student_model->get_specific_std_exam_info("MARKS", $admission_no, $s);
        $data['allPdt4'] = $this->student_model->marks_grads_max_min("MARKS_GRADE");
        $data['allPdt7'] = $this->student_model->count_all_marks("MARKS", $admission_no, $s);
        $data['pass_mark'] = $this->student_model->pass_mark("MARKS_GRADE");
        //    bioAttendence start
        //in and out time
        $date = date("Y-m-d");
        $firstTime = $this->bioAttendance_model->getFirstAttendance("BIOMETRICS_ATTENDANCE", $date, $admission_no);
        $lastTime =  $this->bioAttendance_model->getLastAttendance("BIOMETRICS_ATTENDANCE", $date, $admission_no);
        // print_r($firstTime);
        // print_r($lastTime);
        if ($firstTime->INTIME && $lastTime->EXITTIME) {

            
            
            $data['firstTime'] = $firstTime;
            $data['lastTime'] = $lastTime;


            // $data['firstTime']= $this->bioAttendance_model->getFirstAttendance("BIOMETRICS_ATTENDANCE", $date, $admission_no);
            // $data['lastTime'] =  $this->bioAttendance_model->getLastAttendance("BIOMETRICS_ATTENDANCE", $date, $admission_no);



            $intime = date("Y-m-d H:i:s", $data['firstTime']->INTIME);
            $outtime = date("Y-m-d H:i:s", $data['lastTime']->EXITTIME);

            //duration
            $to_time = strtotime("$intime");
            $from_time = strtotime("$outtime");
            $data['duration'] = gmdate("H:i:s", $from_time - $to_time);

            //status
            $studentShift =  $this->bioAttendance_model->getStudentShift("STUDENT_SHIFT_ASSIGN", "STAFF_SHIFT", $cls, $sec, $sess);
            $data['studentShift'] = $studentShift;


            $intime = date("H:i:s", $data['firstTime']->INTIME);
            $outtime = date("H:i:s", $data['lastTime']->EXITTIME);

            $intime2 = date("H:i", $data['firstTime']->INTIME); //local time to international time
            $outtime2 = date("H:i", $data['lastTime']->EXITTIME);
            //  echo $intime;
            //  echo $outtime2;
            //  exit();


            // condition sratrt
            if (strtotime($intime2) <= strtotime($studentShift->START_TIME) && strtotime($outtime2) >= strtotime($studentShift->END_TIME)) {
                $data['status'] = "Present";
               
                if (strtotime($intime2) == strtotime($outtime)) {
                    $data['status']  = "Partially Present";
                }
            }
            if (strtotime($intime2) >= strtotime($studentShift->START_TIME) && strtotime($outtime2) <= strtotime($studentShift->END_TIME)) {

                $data['status']  = "Late And EarlyGone";
              
            }

            if (strtotime($intime2) >= strtotime($studentShift->START_TIME) && strtotime($outtime2) >= strtotime($studentShift->END_TIME)) {
                $data['status']  = "Late";
               
            }
            if (strtotime($intime2) <= strtotime($studentShift->START_TIME) && strtotime($outtime2) <= strtotime($studentShift->END_TIME)) {
                $data['status']  = "EarlyGone";
              
            }
            if (strtotime($intime2) <= strtotime($studentShift->START_TIME) && strtotime($outtime2) <= strtotime($studentShift->START_TIME)) {
                $data['status']  = "Before Shift";
               
            }
            if (strtotime($intime2) >= strtotime($studentShift->END_TIME) && strtotime($outtime2) >= strtotime($studentShift->END_TIME)) {
                $data['status']  = "After Shift";
              
            }
           // $data['status']  = "STATUS";
            //condition end



            // if (strtotime($intime2) > strtotime($studentShift->START_TIME)) {
            //     $data['status'] = "Late";
            //     if (strtotime($outtime2) < strtotime($studentShift->END_TIME)) {
            //         $data['status'] = "Late & Early Gone";
            //     }
               
            // } else if (strtotime($outtime2) < strtotime($studentShift->END_TIME)) {
            //     $data['status'] = "Early Gone";
            //     if(strtotime($intime2) == strtotime($outtime2))
            //     {
            //         $data['status'] = "Present";
            //     }
            // } else {
            //     $data['status'] = "Present";
            // }
        } else {
            $studentShift =  $this->bioAttendance_model->getStudentShift("STUDENT_SHIFT_ASSIGN", "STAFF_SHIFT", $cls, $sec, $sess);
            $data['studentShift'] = $studentShift;
            $data['firstTime'] = null;
            $data['lastTime'] = null;
            $data['status'] = "No Update";
            $data['duration'] = "No Update";
        }


        // bioAttendenceEnd

        

        $data['content'] = $this->load->view("student/student_profile_view", $data, TRUE);
        $this->load->view("admin/master", $data);
    }



    public function student_profile_by_guardian()
    {

        $data = array();
        $data['active'] = "student_information";
        $data['title'] = "Student Profile";
        $this->load->helper("form");

        $student_id = $this->input->post("student_name");
        $userdata = array(
            "admission_no" => $student_id

        );

        if ($student_id) {
            $this->session->set_userdata($userdata);
            $admission_no = $this->session->userdata('admission_no');
        } else {
            $admission_no = $this->session->userdata('admission_no');
        }




        $data['allPdt'] = $this->student_model->get_student_by_session_std_id("STUDENTS", $admission_no);




        /* Current Sesssion Roles and ID End */
        $cls = $data['allPdt']->CLASS_ID;
        $sec = $data['allPdt']->SECTION_ID;
        $sess = $data['allPdt']->SESSION_ID;


        $jan = "JAN";
        $dec = "DEC";
        $curr_year = date("Y");
        $curr_sess = $this->student_model->get_student_current_session("ENROLL", $cls, $sec, $sess);
        $s = $curr_sess->SESSION_NAME;
        //    print_r($curr_sess);
        //    exit();
        //$curr_year2 ="2019"; 


        $start_year = "01" . "-" . $jan . "-" . $curr_year;
        $end_year = "31" . "-" . $dec . "-" . $curr_year;

        $data['allPdt5'] = $this->student_model->get_details_std_attendence("STUDENT_ATTENDENCE", $admission_no, $start_year, $end_year);
        $data['allPdt6'] = $this->student_model->get_total_std_attendance_details("STUDENT_ATTENDENCE", $admission_no);
        $data['allPdt3'] = $this->student_model->get_specific_std_fees_details("ADD_FEES_AMOUNT", $admission_no);
        $data['count_exam'] = $this->common_model->view_data("EXAMS", "", "", "");
        $data['allPdt2'] = $this->student_model->get_specific_std_exam_info("MARKS", $admission_no, $s);
        $data['allPdt4'] = $this->student_model->marks_grads_max_min("MARKS_GRADE");
        $data['allPdt7'] = $this->student_model->count_all_marks("MARKS", $admission_no, $s);
        $data['pass_mark'] = $this->student_model->pass_mark("MARKS_GRADE");



        $data['content'] = $this->load->view("student/student_profile_view", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function change_password_student()
    {
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("confirm_password", "Group Name", "required");

        if ($this->form_validation->run() == NULL) {
            $edit_id = $this->input->post("std_id");

            $data = array();

            $data['active'] = "groups";


            $data['title'] = "groups";

            $this->load->helper("form");
            $edit_id = $this->input->post("std_id");

            redirect(base_url() . "student/student_view/student_profile", "refresh");
        } else {

            $edit_id = $this->input->post("std_id");

            $old_pass = $this->input->post("old_password");


            $get_existing_pass = $this->student_model->check_std_existing_pass("ENROLL", $edit_id, "ID", "DESC");



            if ($get_existing_pass->PASSWORD == $old_pass) {



                $data = array(

                    "PASSWORD" => $this->input->post("confirm_password"),
                );
                $edit_id = $this->input->post("std_id");

                if ($this->common_model->edit("STUDENTS", $data, $edit_id)) {

                    $sdata['msg'] = "Password Change  Successful";
                } else {
                    $sdata['msg'] = "Not Successfully Data Edit !!";
                }
            } else {

                $sdata['msg'] = "Old Password Does not Match  !!";
            }
            $edit_id = $this->input->post("std_id");
            $this->session->set_userdata($sdata);
            redirect(base_url() . "student/student_view/student_profile", "refresh");
        }
    }

    public function change_pass_view()
    {

        $data = array();
        $data['active'] = "Staff";
        $data['title'] = "Staff";
        $this->load->helper("form");



        $data['content'] = $this->load->view("student/change_password", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function global_change_password()
    {

        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("confirm_password", "Change Pass", "required");

        if ($this->form_validation->run() == NULL) {

            $data = array();
            $data['active'] = "groups";
            $data['title'] = "Chnage Pass";

            $this->load->helper("form");
            $data['content'] = $this->load->view("student/student_view/change_pass_view", $data, TRUE);
            $this->load->view("admin/master", $data);
        } else {

            /* Current Sesssion Roles and ID start */
            $id = $this->session->userdata('id');
            /* Current Sesssion Roles and ID End */




            $old_pass = $this->input->post("old_password");

            $roles = $this->session->userdata('roles');
            if ($roles == 6) {
                $get_existing_pass = $this->student_model->check_existing_pass_guardian("GUARDIAN", $id);
            } else {
                $get_existing_pass = $this->student_model->check_existing_pass("STUDENTS", $id, "ID", "DESC");
            }




            if ($get_existing_pass->PASSWORD == $old_pass) {

                $new_pass = $this->input->post("confirm_password");


                $data = array(
                    "PASSWORD" => $new_pass,
                );

                if ($roles == 6) {
                    if ($this->common_model->edit("GUARDIAN", $data, $id)) {



                        $sdata['msg'] = "Password Change  Successfully";


                        redirect(base_url() . "login", $sdata, "refresh");
                    } else {
                        $sdata['msg'] = "Not Successfully Data Edit !!";
                    }
                } else {
                    if ($this->common_model->edit("STUDENTS", $data, $id)) {



                        $sdata['msg'] = "Password Change  Successfully";

                        redirect(base_url() . "login", "refresh");
                    } else {
                        $sdata['msg'] = "Not Successfully Data Edit !!";
                    }
                }

                // if ($this->common_model->edit("STUDENTS", $data, $id)) {



                //     $sdata['msg'] = "Password Change  Successfully";

                //     redirect(base_url() . "logout", "refresh");
                // } else {
                //     $sdata['msg'] = "Not Successfully Data Edit !!";
                // }
            } else {

                $sdata['msg'] = "Old Password do not Match  !!";
            }




            $this->session->set_userdata($sdata);
            redirect(base_url() . "student/student_view/change_pass_view", "refresh");
        }
    }

    public function student_fees()
    {

        $data = array();
        $data['active'] = "student_fees";
        $data['title'] = "Student Fees";
        $this->load->helper("form");

        $roles = $this->session->userdata('roles');

        if ($roles == 6) {
            $admission_no  = $this->session->userdata('admission_no');
            $data['allPdt'] = $this->student_model->get_student_by_session("STUDENTS", $admission_no);
        } else {
            /* Current Sesssion Roles and ID start */
            $admission_no = $this->session->userdata('admission_no');
            $data['allPdt'] = $this->student_model->get_student_by_session("STUDENTS", $admission_no);

            /* Current Sesssion Roles and ID End */
        }


        $data['allPdt3'] = $this->student_model->get_specific_std_fees_details("ADD_FEES_AMOUNT", $admission_no);

        $data['content'] = $this->load->view("student/student_fees", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function student_attendence()
    {
        $data = array();
        $data['active'] = "student_fees";
        $data['title'] = "Student Fees";
        $this->load->helper("form");

        $roles = $this->session->userdata('roles');

        if ($roles == 6) {
            $admission_no  = $this->session->userdata('admission_no');
            $data['allPdt'] = $this->student_model->get_student_by_session("STUDENTS", $admission_no);
        } else {
            /* Current Sesssion Roles and ID start */
            $admission_no = $this->session->userdata('admission_no');
            $data['allPdt'] = $this->student_model->get_student_by_session("STUDENTS", $admission_no);

            /* Current Sesssion Roles and ID End */
        }

        $jan = "JAN";
        $dec = "DEC";
        $curr_year = date("Y");

        $start_year = "01" . "-" . $jan . "-" . $curr_year;
        $end_year = "31" . "-" . $dec . "-" . $curr_year;

        $data['allPdt5'] = $this->student_model->get_details_std_attendence("STUDENT_ATTENDENCE", $admission_no, $start_year, $end_year);
        $data['allPdt6'] = $this->student_model->get_total_std_attendance_details("STUDENT_ATTENDENCE", $admission_no);



        $data['content'] = $this->load->view("student/student_attendence", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function view_notice()
    {

        $data = array();
        $data['active'] = "general_settings";
        $data['title'] = "General Settings";
        $this->load->helper("form");


        $data['allPdt'] = $this->common_model->view_data("ROLES", "", "ID", "DESC");

        $data['allPdt3'] = $this->notice_model->get_content("NOTICE_BOARD", "student", "ID", "DESC");

        // echo '<pre>';
        // print_r($data['allPdt3'] );
        // echo '</pre>';
        // exit();

        $data['content'] = $this->load->view("student/notice", $data, true);
        $this->load->view("admin/master", $data);
    }

    public function download($id)
    {
        if (!empty($id)) {
            //load download helper
            $this->load->helper('download');

            //get file info from database
            $fileInfo = $this->notice_model->getRows(array('ID' => $id));


            //file path
            $file = 'uploads/notice/files/' . $fileInfo['DOCUMENTS'];


            //download file from directory
            force_download($file, NULL);
        }
    }

    public function delete()
    {

        $id = $this->uri->segment('5');


        if ($this->download_center_model->delete_content("NOTICE_BOARD", $id)) {

            $sdata['msg'] = "Delete Successful";
        } else {
            $sdata['msg'] = "Not Successfully Data Delete !!";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "admin/notice/notice_board", "refresh");
    }

    public function class_routine()
    {
        $data = array();
        $data['active'] = "class_routine";
        $data['title'] = "Class Routine";
        $this->load->helper("form");
        /* Current Sesssion Roles and ID start */


        $roles = $this->session->userdata('roles');

        if ($roles == 6) {
            $admission_no  = $this->session->userdata('admission_no');
            $data['allPdt'] = $this->student_model->get_student_by_std_id("STUDENTS", $admission_no);
        } else {

            $admission_no = $this->session->userdata('admission_no');
            $data['allPdt'] = $this->student_model->get_student_by_session("STUDENTS", $admission_no);
        }

        $cls = $data['allPdt']->CLASS_ID;
        $sec = $data['allPdt']->SECTION_ID;
        $sess = $data['allPdt']->SESSION_ID;

        $data['allPdt2'] = $this->academics_model->get_class_routine("CLASS_ROUTINE", $cls, $sec, $sess);

        //  print_r($data['allPdt2']);
        //  exit();






        $data['content'] = $this->load->view("student/class_routine", $data, TRUE);
        $this->load->view("admin/master", $data);
    }
}
