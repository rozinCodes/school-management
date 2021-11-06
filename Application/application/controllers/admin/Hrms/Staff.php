<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Staff extends CI_Controller {

    public function __construct() {

        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");
        $language = $this->session->userdata('language');
        $this->lang->load('auth', $language);
        if (!$this->session->userdata('authenticated')) {
            redirect("login");
        }
        $roles= $this->session->userdata('roles');
        if(!($roles==1 || $roles==2 || $roles==3)) {
        
            redirect(base_url() . "login", "refresh");
           // redirect("login");
        }


    }

    public function index() {
        $data = array();
        $data['active'] = "Staff";
        $data['title'] = "Staff";
        $this->load->helper("form");

        $data['allPdt'] = $this->common_model->view_data("LEAVE_TYPE", "", "ID", "DESC");

        $data['allPdt2'] = $this->common_model->view_data("ROLES", "", "ID", "DESC");
        $data['allPdt3'] = $this->common_model->view_data("STAFF_DESIGNATION", "", "ID", "DESC");
        $data['allPdt4'] = $this->common_model->view_data("STAFF_DEPARTMENT", "", "ID", "DESC");
        $data['allPdt5'] = $this->common_model->view_data("STAFF_SHIFT", "", "ID", "DESC");

        $data['content'] = $this->load->view("admin/hrms/add_staff", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function add_staff() {


        $flag = 0;
        $flag2 = 0;

        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("staff_email", "Add Staff", "required");

        if ($this->form_validation->run() == NULL) {
            $data = array();
            $data2 = array();
            $data['active'] = "Add Staff";
            $data['title'] = "Add Staff";
            $this->load->helper("form");
            $data['content'] = $this->load->view("admin/hrms/add_staff", $data, TRUE);
            $this->load->view("admin/master", $data);
        } else {


            //---start
            $dataInfo = array();
            $files = $_FILES;
            $cpt = count($_FILES['pic']['name']);
            for ($i = 0; $i < $cpt; $i++) {
                $_FILES['pic']['name'] = $files['pic']['name'][$i];
                $_FILES['pic']['type'] = $files['pic']['type'][$i];
                $_FILES['pic']['tmp_name'] = $files['pic']['tmp_name'][$i];
                $_FILES['pic']['error'] = $files['pic']['error'][$i];
                $_FILES['pic']['size'] = $files['pic']['size'][$i];


                $config['allowed_types'] = 'gif|jpg|jpeg|png';  //supported image
                $config['upload_path'] = "./uploads/staff/picture/";
                $config['encrypt_name'] = TRUE;
                $this->load->library('upload', $config);

                //$this->upload->do_upload("pic");   
                // $this->upload->initialize($this->set_upload_options());

                $this->upload->do_upload("pic");
                $dataInfo[] = $this->upload->data();
            }





            $STAFF_DATE_OF_BIRTH = $this->input->post("staff_dateofbirth");
            $STAFF_DATE_OF_JOINING = $this->input->post("staff_dateofjoin");
            //echo $STAFF_DATE_OF_BIRTH;
            //echo $STAFF_DATE_OF_JOINING;
            $timestamp1 = $this->oracle_only_date_by_user($STAFF_DATE_OF_BIRTH);
            $timestamp2 = $this->oracle_only_date_by_user($STAFF_DATE_OF_JOINING);

            $def_year = "1999";


            if ($this->staff_model->check_staff_id()) {



                $last_no = $this->staff_model->check_last_staff_id("STAFF_ID", "STAFF");


                $str = $last_no->STAFF_ID; ///admission number generate


                $arr1 = str_split($str);
                $r = $arr1[4] . $arr1[5] . $arr1[6] . $arr1[7] . $arr1[8];
                $r = $r + 1;
                /* start */
                $month = date("m");
                $year = date("Y");

                $a = $year / 10;
                $b = $a / 10;
                $c = ($a % 10);
                $d = ($year % 10);

                $s = sprintf("%05d", $r);
                $f = $def_year . $s;
            } else {


                $month = date("m");
                $year = date("Y");

                $a = $year / 10;
                $b = $a / 10;
                $c = ($a % 10);
                $d = ($year % 10);

                $s = sprintf("%05d", 0);
                $f = $def_year . $s;
                $f = $f + 1;
            }

            //$gen_pass = $this->staff_model->generateRandomString();
            //$enc_pass = $this->common_model->Encryptor('encrypt', $gen_pass);

            $staff_pass = $this->input->post("staff_password");
            $enc_pass = $this->common_model->Encryptor('encrypt', $staff_pass);




            $data = array(
                "STAFF_ID" => $f,
                "ROLES_ID" => $this->input->post("staff_role"),
                "DESIGNATION" => $this->input->post("staff_designation"),
                "DEPARTMENT" => $this->input->post("staff_department"),
                "FIRST_NAME" => $this->input->post("staff_f_name"),
                "LAST_NAME" => $this->input->post("staff_l_name"),
                "FATHER_NAME" => $this->input->post("staff_father_name"),
                "MOTHER_NAME" => $this->input->post("staff_mother_name"),
                "EMAIL" => $this->input->post("staff_email"),
                "GENDER" => $this->input->post("staff_gender"),
                "DATE_OF_BIRTH" => $timestamp1,
                "DATE_OF_JOINING" => $timestamp2,
                "PHONE" => $this->input->post("staff_phone_number"),
                "EMERGENCY_CONTACT" => $this->input->post("staff_emergency_number"),
                "MARITIAL_STATUS" => $this->input->post("staff_maritial_status"),
                "PHOTO" => $dataInfo[0]['file_name'],
                "CURRENT_ADDRESS" => $this->input->post("staff_current_address"),
                "PERMANENT_ADDRESS" => $this->input->post("staff_permenent_address"),
                "QUALIFICATION" => $this->input->post("staff_qualification"),
                "EXPERIENCE" => $this->input->post("staff_work_experience"),
                "BASIC_SALARY" => $this->input->post("staff_basic_salary"),
                "CONTRACT_TYPE" => $this->input->post("staff_contract_type"),
                "WORK_SHIFT" => $this->input->post("staff_shift"),
                "ACCOUNT_TITLE" => $this->input->post("staff_account_title"),
                "ACCOUNT_NUMBER" => $this->input->post("staff_bank_account_number"),
                "ACCOUNT_BANK_NAME" => $this->input->post("staff_bank_name"),
                "ACCOUNT_BRANCH_NAME" => $this->input->post("staff_branch_name"),
                "RESUME" => $dataInfo[1]['file_name'],
                "ACD_CERTIFICATES" => $dataInfo[2]['file_name'],
                "JOINING_LETTER" => $dataInfo[3]['file_name'],
                "SKILL_LEVEL" => $this->input->post("staff_skill_level"),
                "STATUS_INFO" => "ACTIVE",
                //"PASSWORD" => $this->staff_model->generateRandomString()
                "PASSWORD" => $enc_pass
            );

            if ($this->common_model->save_data("STAFF", $data)) {
                $flag = 1;
            }


            $leave_type = $this->input->post('leave_type');
            /* print_r($leave_type );
              exit(); */


            if ($flag == 1) {

                foreach ($leave_type as $key => $val) {
                    $flag2 = 0;
                    $data = array(
                        "STAFF_ID" => $this->staff_model->check_last_staff_id("STAFF_ID", "STAFF")->STAFF_ID,
                        "STAFF_TBL_ID" => $this->staff_model->check_last_staff_id("ID", "STAFF")->ID,
                        'LEAVE_TYPE_ID' => $key,
                        'ALLOTTED_LEAVE' => $leave_type[$key],
                        'REMAINING_LEAVE' => $leave_type[$key],
                    );


                    $this->common_model->save_data("STAFF_LEAVE_DETAILS", $data);
                    $flag2 = 1;
                }
            }


            if ($flag2 == 1) {

                $sdata['msg'] = "Save Successful";
            } else {
                $sdata['msg'] = "Not Successfully Data Insert !!";
            }

            $this->session->set_userdata($sdata);
            redirect(base_url() . "admin/hrms/staff", "refresh");
        }
    }

    public function staff_directory() {
         $roles = $this->session->userdata();
        if ($this->access_control_model->access("MENU_PERMISSIONS", $roles['id'], $roles['roles'], 4)) 
        {
          
        $data = array();
        $data['active'] = "groups";
        $data['title'] = "Student Details";
        $this->load->helper("form");

        $array['STAFF.ROLES_ID'] = $this->input->post("staff_role");
        //$array['STAFF.ACTIVE']= 1; 

        $data['allPdt2'] = $this->common_model->view_data("ROLES", "", "ID", "DESC");
        $data['allPdt'] = $this->staff_model->search_staff_by_role("STAFF", $array, "ID", "DESC");


        $data['content'] = $this->load->view("admin/hrms/staff_directory", $data, TRUE);
        $this->load->view("admin/master", $data);
        }
         else
         {
            redirect(base_url(), "refresh");
         }
          

    }

    public function search_staff_by_staff_id() {


        $data = array();
        $data['active'] = "groups";
        $data['title'] = "Student Details";
        $this->load->helper("form");

        $array['STAFF.STAFF_ID'] = $this->input->post("staff_id");
        //$array['STAFF.ACTIVE']= 1; 

        $data['allPdt2'] = $this->common_model->view_data("ROLES", "", "ID", "DESC");
        $data['allPdt'] = $this->staff_model->search_staff_by_staff_id("STAFF", $array, "ID", "DESC");


        $data['content'] = $this->load->view("admin/hrms/staff_directory", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function staff_details() {

        $data = array();
        $data['active'] = "Staff Details";
        $data['title'] = "Staff Details";
        $this->load->helper("form");

        $view_id = $this->uri->segment('5');
        
        
      

        $array = array("STAFF.ID" => $view_id);
        $array2 = $view_id;

        $data['allPdt'] = $this->staff_model->get_staff_details("STAFF", $array, "ID", "DESC");
        $data['allPdt2'] = $this->staff_model->get_staff_payroll_report("STAFF_PAYSLIP", $array2);
        $data['allPdt3'] = $this->staff_model->get_staff_payroll_report2("STAFF_PAYSLIP", $array2);
        $cur_session = array();
        $cur_session['ROLES_ID'] = $this->session->userdata('roles');
        $cur_session['ID'] = $this->session->userdata('id');
        $current_staff_id['get_staff'] = $this->student_model->get_staff_by_session("STAFF", $cur_session, "ID", "DESC");
        /* Current Sesssion Roles and ID End */
        $cur_staff_id_get = $current_staff_id['get_staff']->STAFF_ID;

        $array2 = array();
        $array2['STAFF_LEAVE_REQUEST.STAFF_ID'] = $cur_staff_id_get;
        $data['allPdt4'] = $this->staff_model->get_leave_history("STAFF_LEAVE_REQUEST", $array2, "ID", "DESC");
        $data['curr_staff_id'] = $view_id;

        $jan = "JAN";
        $dec = "DEC";

        $curr_year = date("Y");


        $start_year = "01" . "-" . $jan . "-" . $curr_year;
        $end_year = "31" . "-" . $dec . "-" . $curr_year;


        $data['allPdt5'] = $this->staff_model->get_details_attendence("STAFF_ATTENDENCE", $cur_staff_id_get, $start_year, $end_year);
        $data['allPdt6'] = $this->staff_model->get_total_attendance_details("STAFF_ATTENDENCE", $cur_staff_id_get);
        // print_r($data['allPdt6'] );
        // exit();

        $data['content'] = $this->load->view("admin/hrms/staff_details", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function staff_edit() {
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("staff_f_name", "Group Name", "required");

        if ($this->form_validation->run() == NULL) {


            $edit_id = $this->uri->segment('6');


            //echo 
            $data = array();

            $data['active'] = "groups";
            $data['edit'] = $edit_id;

            $data['title'] = "groups";

            $this->load->helper("form");

            /* print_r($data);
              echo $edit_id;
              exit(); */
            $array = array("STAFF.ID" => $edit_id);
            $array2 = array("STAFF_LEAVE_DETAILS.STAFF_TBL_ID" => $edit_id);
            $data['allPdt'] = $this->staff_model->view_leave_of_staff("LEAVE_TYPE", $array2, "ID", "DESC");
            $data['allPdt1'] = $this->staff_model->get_staff_details("STAFF", $array, "ID", "DESC");
            $data['allPdt2'] = $this->common_model->view_data("ROLES", "", "ID", "DESC");
            $data['allPdt3'] = $this->common_model->view_data("STAFF_DESIGNATION", "", "ID", "DESC");
            $data['allPdt4'] = $this->common_model->view_data("STAFF_DEPARTMENT", "", "ID", "DESC");
            $data['allPdt5'] = $this->common_model->view_data("STAFF_SHIFT", "", "ID", "DESC");

            //  print_r($data['allPdt']);
            //  exit();


            $data['content'] = $this->load->view("admin/hrms/add_staff", $data, TRUE);
            $this->load->view("admin/master", $data);
        } else {
            $flag = 0;
            $edit_id = $this->uri->segment('6');





            //---start
            $dataInfo = array();
            $files = $_FILES;
            $cpt = count($_FILES['pic']['name']);
            for ($i = 0; $i < $cpt; $i++) {
                $_FILES['pic']['name'] = $files['pic']['name'][$i];
                $_FILES['pic']['type'] = $files['pic']['type'][$i];
                $_FILES['pic']['tmp_name'] = $files['pic']['tmp_name'][$i];
                $_FILES['pic']['error'] = $files['pic']['error'][$i];
                $_FILES['pic']['size'] = $files['pic']['size'][$i];


                $config['allowed_types'] = 'gif|jpg|jpeg|png';  //supported image
                $config['upload_path'] = "./uploads/staff/picture/";
                $config['encrypt_name'] = TRUE;
                $this->load->library('upload', $config);

                //$this->upload->do_upload("pic");   
                // $this->upload->initialize($this->set_upload_options());

                $this->upload->do_upload("pic");
                $dataInfo[] = $this->upload->data();
            }





            $STAFF_DATE_OF_BIRTH = $this->input->post("staff_dateofbirth");
            $STAFF_DATE_OF_JOINING = $this->input->post("staff_dateofjoin");
            //echo $STAFF_DATE_OF_BIRTH;
            //echo $STAFF_DATE_OF_JOINING;
            $timestamp1 = $this->oracle_only_date_by_user($STAFF_DATE_OF_BIRTH);
            $timestamp2 = $this->oracle_only_date_by_user($STAFF_DATE_OF_JOINING);







            $data = array(
                "ROLES_ID" => $this->input->post("staff_role"),
                "DESIGNATION" => $this->input->post("staff_designation"),
                "DEPARTMENT" => $this->input->post("staff_department"),
                "FIRST_NAME" => $this->input->post("staff_f_name"),
                "LAST_NAME" => $this->input->post("staff_l_name"),
                "FATHER_NAME" => $this->input->post("staff_father_name"),
                "MOTHER_NAME" => $this->input->post("staff_mother_name"),
                "EMAIL" => $this->input->post("staff_email"),
                "GENDER" => $this->input->post("staff_gender"),
                "DATE_OF_BIRTH" => $timestamp1,
                "DATE_OF_JOINING" => $timestamp2,
                "PHONE" => $this->input->post("staff_phone_number"),
                "EMERGENCY_CONTACT" => $this->input->post("staff_emergency_number"),
                "MARITIAL_STATUS" => $this->input->post("staff_maritial_status"),
                "PHOTO" => $dataInfo[0]['file_name'],
                "CURRENT_ADDRESS" => $this->input->post("staff_current_address"),
                "PERMANENT_ADDRESS" => $this->input->post("staff_permenent_address"),
                "QUALIFICATION" => $this->input->post("staff_qualification"),
                "EXPERIENCE" => $this->input->post("staff_work_experience"),
                "BASIC_SALARY" => $this->input->post("staff_basic_salary"),
                "CONTRACT_TYPE" => $this->input->post("staff_contract_type"),
                "WORK_SHIFT" => $this->input->post("staff_shift"),
                "LOCATION" => $this->input->post("staff_location"),
                "ACCOUNT_TITLE" => $this->input->post("staff_account_title"),
                "ACCOUNT_NUMBER" => $this->input->post("staff_bank_account_number"),
                "ACCOUNT_BANK_NAME" => $this->input->post("staff_bank_name"),
                "ACCOUNT_BRANCH_NAME" => $this->input->post("staff_branch_name"),
                "RESUME" => $dataInfo[1]['file_name'],
                "ACD_CERTIFICATES" => $dataInfo[2]['file_name'],
                "JOINING_LETTER" => $dataInfo[3]['file_name'],
                "SKILL_LEVEL" => $this->input->post("staff_skill_level"),
                "STATUS_INFO" => "ACTIVE",
                    //"PASSWORD" => $this->staff_model->generateRandomString()
            );



            $leave_type = $this->input->post('leave_type');
            //print_r($leave_type);








            foreach ($leave_type as $key => $val) {




                $data2 = array(
                    'LEAVE_TYPE_ID' => $key,
                    'ALLOTTED_LEAVE' => $leave_type[$key],
                    'REMAINING_LEAVE' => $leave_type[$key],
                );
                if ($this->common_model->edit_leave_details("STAFF_LEAVE_DETAILS", $data2, $edit_id, $key)) {
                    $flag = 1;
                }
            }



            if ($this->common_model->edit("STAFF", $data, $edit_id) && $flag == 1) {

                $sdata['msg'] = "Edit Successful";
            } else {
                $sdata['msg'] = "Not Successfully Data Edit !!";
            }

            $this->session->set_userdata($sdata);
            redirect(base_url() . "admin/hrms/staff", "refresh");
        }
    }

    public function change_password() {

        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("confirm_password", "Group Name", "required");

        if ($this->form_validation->run() == NULL) {

            $data = array();

            $data['active'] = "groups";


            $data['title'] = "groups";

            $this->load->helper("form");
            $edit_id = $this->input->post("std_id");

            redirect(base_url() . "admin/hrms/staff/staff_details/$edit_id", "refresh");
        } else {

            $edit_id = $this->input->post("std_id");
            $old_pass = $this->input->post("old_password");
            $old_enc_pass = $this->common_model->Encryptor('encrypt', $old_pass);


            $get_existing_pass = $this->staff_model->check_existing_pass("STAFF", $edit_id, "ID", "DESC");
            //echo $get_existing_pass->PASSWORD . $old_pass ;


            if ($get_existing_pass->PASSWORD == $old_enc_pass) {

                $new_pass = $this->input->post("confirm_password");
                $new_enc_pass = $this->common_model->Encryptor('encrypt', $new_pass);

                $data = array(
                    "PASSWORD" => $new_enc_pass,
                );
                $edit_id = $this->input->post("std_id");





                if ($this->common_model->edit("STAFF", $data, $edit_id)) {



                    $sdata['msg'] = "Password Change  Successful";
                } else {
                    $sdata['msg'] = "Not Successfully Data Edit !!";
                }
            } else {

                $sdata['msg'] = "Old Password Does not Match  !!";
            }



            $edit_id = $this->input->post("std_id");
            $this->session->set_userdata($sdata);
            redirect(base_url() . "admin/hrms/staff/staff_details/$edit_id", "refresh");
        }
    }

    public function change_pass_view() {

        $data = array();
        $data['active'] = "Staff";
        $data['title'] = "Staff";
        $this->load->helper("form");



        $data['content'] = $this->load->view("admin/hrms/staff_change_pass", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function global_change_password() {

        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("confirm_password", "Change Pass", "required");

        if ($this->form_validation->run() == NULL) {

            $data = array();
            $data['active'] = "groups";
            $data['title'] = "Chnage Pass";

            $this->load->helper("form");
            $data['content'] = $this->load->view("admin/hrms/staff_change_pass", $data, TRUE);
            $this->load->view("admin/master", $data);
        } else {


            /* Current Sesssion Roles and ID start */

            $cur_session = array();
            $cur_session['ROLES_ID'] = $this->session->userdata('roles');
            $cur_session['ID'] = $this->session->userdata('id');



            $current_staff_id['get_staff'] = $this->student_model->get_staff_by_session("STAFF", $cur_session, "ID", "DESC");
            $staff_tbl_id = $current_staff_id['get_staff']->ID;



            /* Current Sesssion Roles and ID End */


            $old_pass = $this->input->post("old_password");
            $old_enc_pass = $this->common_model->Encryptor('encrypt', $old_pass);


            $get_existing_pass = $this->staff_model->check_existing_pass("STAFF", $staff_tbl_id, "ID", "DESC");
            //echo $get_existing_pass->PASSWORD . $old_pass ;


            if ($get_existing_pass->PASSWORD == $old_enc_pass) {

                $new_pass = $this->input->post("confirm_password");
                $new_enc_pass = $this->common_model->Encryptor('encrypt', $new_pass);

                $data = array(
                    "PASSWORD" => $new_enc_pass,
                );






                if ($this->common_model->edit("STAFF", $data, $staff_tbl_id)) {



                    $sdata['msg'] = "Password Change  Successfully";
                } else {
                    $sdata['msg'] = "Not Successfully Data Edit !!";
                }
            } else {

                $sdata['msg'] = "Old Password do not Match  !!";
            }




            $this->session->set_userdata($sdata);
            redirect(base_url() . "admin/hrms/staff/change_pass_view", "refresh");
        }
    }

    public function staff_attendence() {


        $array = array();



        $array['STAFF.ROLES_ID'] = $this->input->post("staff_role");
        $array['STAFF.ACTIVE'] = 1;

        $data = array();
        $data['active'] = "groups";
        $data['title'] = "Student Attendence";
        $this->load->helper("form");

        $data['allPdt2'] = $this->common_model->view_data("ROLES", "", "ID", "DESC");

        $data['allPdt3'] = $this->staff_model->search_staff_attendence("STAFF", $array, "ID", "DESC");


        /* Current Sesssion Roles and ID start */

        $cur_session = array();
        $cur_session['ROLES_ID'] = $this->session->userdata('roles');
        $cur_session['ID'] = $this->session->userdata('id');
        $data['get_staff'] = $this->student_model->get_staff_by_session("STAFF", $cur_session, "ID", "DESC");

        /* Current Sesssion Roles and ID End */


        $data['content'] = $this->load->view("admin/hrms/staff_attendence", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function staff_attendence_submit() {




        $succ = 0;

        $roles = $this->input->post("roles");
        $department = $this->input->post("department");
        $designation = $this->input->post("designation");



        /* Start -- For check Existing Attendence */
        $array = array();
        $array['STAFF_ATTENDENCE.STAFF_ID'] = $this->input->post("stf_id");
        $array['STAFF_ATTENDENCE.DEPARTMENT'] = $this->input->post("department");
        $array['STAFF_ATTENDENCE.DESIGNATION'] = $this->input->post("designation");
        $array['STAFF_ATTENDENCE.ROLES_ID'] = $this->input->post("roles");
        $atndence_date = $this->input->post("atnd_date");

        /* End -- For check Existing Attendence */


        /* $attendence_date= $this->input->post("atnd_date");
          $atnd_date=$this->oracle_only_date_by_user($attendence_date);

          $date1=$this->oracle_date($attendence_date);
          $date2=$this->oracle_onlydate($attendence_date); */

        $atn_sys_date = date("Y-m-d H:i:s");


        $date1 = $this->oracle_date($atn_sys_date);
        $date2 = $this->oracle_onlydate($atn_sys_date);




        $attendance_type = array();
        $attendance_type = $this->input->post("attendance");
        //print_r($this->input->post("attendance"));


        $atnd_data['check_attendence'] = $this->staff_model->check_staff_attendence("STAFF_ATTENDENCE", $array, $date2, "ID", "DESC");





        if ($atnd_data['check_attendence']) {


            echo '<script language="javascript">';
            echo 'alert("Already Attendence Done")';

            echo '</script>';
        } else {

            foreach ($attendance_type as $key => $val) {

                $atndce_type = $attendance_type[$key];
                $staff_id = $key;






                $data = array('ATTENDENCE_TYPE' => $atndce_type, 'DEPARTMENT' => $department, 'ATTENDENCE_DATE_TIME' => $date1, 'DESIGNATION' => $designation, 'STAFF_ID' => $staff_id, 'ROLES_ID' => $roles, 'ATTENDENCE_DATE' => $date2);


                if ($this->common_model->save_data("STAFF_ATTENDENCE", $data)) {
                    $succ = 1;
                }
            }
        }


        if ($succ == 1) {
            $sdata['msg'] = "Save Successful";
        } else {
            $sdata['msg'] = "Not Successful";
        }

        $this->session->set_userdata($sdata);
        redirect(base_url() . "admin/hrms/staff/staff_attendence", "refresh");
    }

    public function staff_late_attendence() {

        $array = array();

        $array['STAFF_ATTENDENCE.ROLES_ID'] = $this->input->post("staff_role");


        $atn_sys_date = date("Y-m-d h:i:s a");

        // $attendence_date= $this->input->post("atnd_date");


        $array['STAFF_ATTENDENCE.ATTENDENCE_DATE'] = $this->oracle_onlydate($atn_sys_date);
        //$date1=$this->oracle_date($attendence_date);


        $data = array();
        $data['active'] = "groups";
        $data['title'] = "Staff late Attendence";
        $this->load->helper("form");


        $cur_session = array();
        $cur_session['ROLES_ID'] = $this->session->userdata('roles');
        $cur_session['ID'] = $this->session->userdata('id');

        $data['get_staff'] = $this->student_model->get_staff_by_session("STAFF", $cur_session, "ID", "DESC");





        $data['allPdt2'] = $this->common_model->view_data("ROLES", "", "ID", "DESC");

        $data['allPdt3'] = $this->staff_model->search_staff_late_attendence("STAFF_ATTENDENCE", $array, "ID", "DESC");

        $data['content'] = $this->load->view("admin/hrms/staff_late_attendence", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function staff_late_attendence_submit() {


        $succ = 0;

        $array = array();


        $attendance_type = array();
        $attendance_type = $this->input->post("attendance");

        // $attendence_date= $this->input->post("atnd_date");
        $attendence_date = date("Y-m-d");
        $atn_dte_time= date('Y-m-d H:i:s');

        $convert_date_time = $this->oracle_date($atn_dte_time);

        $date1 = $this->oracle_onlydate($attendence_date);

        foreach ($attendance_type as $key => $val) {

            $atndce_type = $attendance_type[$key];
            $staff_id = $key;
            $array['STAFF_ID'] = $staff_id;

            $data = array('ATTENDENCE_TYPE' => $atndce_type,'ATTENDENCE_DATE_TIME'=>$convert_date_time);

            if ($this->staff_model->edit_staff_late_attendence("STAFF_ATTENDENCE", $data, $array, $date1)) {

                $succ = 1;
            }
        }




        if ($succ == 1) {
            $sdata['msg'] = "Save Successful";
        } else {
            $sdata['msg'] = "Not Successful";
        }

        $this->session->set_userdata($sdata);
        redirect(base_url() . "admin/hrms/staff/staff_late_attendence", "refresh");
    }

    public function staff_attendence_by_staff_id() {


        $array = array();
        $array['STAFF.STAFF_ID'] = $this->input->post("staff_id");
        $array['STAFF.ACTIVE'] = 1;




        $data = array();
        $data['active'] = "groups";
        $data['title'] = "groups";
        $this->load->helper("form");

        $data['allPdt3'] = $this->staff_model->search_staff_attendence_by_admission_no("STAFF", $array, "ID", "DESC");

        $data['content'] = $this->load->view("admin/hrms/staff_attendence", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function staff_late_attendence_by_id() {


        $array = array();
        $array['STAFF_ATTENDENCE.STAFF_ID'] = $this->input->post("staff_id");





        $data = array();
        $data['active'] = "groups";
        $data['title'] = "groups";
        $this->load->helper("form");

        $data['allPdt3'] = $this->staff_model->search_staff_late_attendence_by_admission_no("STAFF_ATTENDENCE", $array, "ID", "DESC");

        $data['content'] = $this->load->view("admin/hrms/staff_late_attendence", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function staff_attendence_report() {

        $array = array();
        $array['STAFF_ATTENDENCE.ROLES_ID'] = $this->input->post("staff_role");


        $from_date = $this->input->post("from_date");
        $to_date = $this->input->post("to_date");

        $f_date = $this->oracle_only_date_by_user($from_date);

        $t_date = $this->oracle_only_date_by_user($to_date);



        $data = array();
        $data['active'] = "groups";
        $data['title'] = "groups";
        $this->load->helper("form");

        $data['allPdt2'] = $this->common_model->view_data("ROLES", "", "ID", "DESC");

        $data['allPdt3'] = $this->staff_model->search_staff_attendence_report("STAFF_ATTENDENCE", $array, $f_date, $t_date, "ID", "DESC");
        // print_r($data['allPdt3']);
        // exit();

        $data['content'] = $this->load->view("admin/hrms/staff_attendence_report", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function student_attendence_report_by_staff_id() {


        $array = array();

        $array['STAFF_ATTENDENCE.STAFF_ID'] = $this->input->post("staff_id");

        $from_date = $this->input->post("from_date");
        $to_date = $this->input->post("to_date");

        $f_date = $this->oracle_only_date_by_user($from_date);
        $t_date = $this->oracle_only_date_by_user($to_date);


        $data['active'] = "groups";
        $data['title'] = "groups";
        $this->load->helper("form");
        ;
        $data['allPdt2'] = $this->common_model->view_data("ROLES", "", "ID", "DESC");

        $data['allPdt3'] = $this->staff_model->search_staff_attendence_report_by_staff_id("STAFF_ATTENDENCE", $array, $f_date, $t_date, "ID", "DESC");


        $data['content'] = $this->load->view("admin/hrms/staff_attendence_report", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function apply_leave() {


        $data = array();
        $data['active'] = "Staff";
        $data['title'] = "Apply Leave";
        $this->load->helper("form");


        /* Current Sesssion Roles and ID start */

        $cur_session = array();
        $cur_session['ROLES_ID'] = $this->session->userdata('roles');
        $cur_session['ID'] = $this->session->userdata('id');



        $current_staff_id['get_staff'] = $this->student_model->get_staff_by_session("STAFF", $cur_session, "ID", "DESC");


        /* Current Sesssion Roles and ID End */

        $cur_staff_id_get = $current_staff_id['get_staff']->STAFF_ID;

        $array = array();
        $array['STAFF_LEAVE_DETAILS.STAFF_ID'] = $cur_staff_id_get;

        $data['allPdt'] = $this->staff_model->get_available_leave("STAFF_LEAVE_DETAILS", $array, "ID", "DESC");

        $array2 = array();
        $array2['STAFF_LEAVE_REQUEST.STAFF_ID'] = $cur_staff_id_get;
        $data['allPdt3'] = $this->staff_model->get_leave_history("STAFF_LEAVE_REQUEST", $array2, "ID", "DESC");
       

        $data['content'] = $this->load->view("admin/hrms/staff_apply_leave", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function apply_leave_request() {

        $data = array();
        $data['active'] = "Staff";
        $data['title'] = "Apply Leave";
        $this->load->helper("form");


        /* Current Sesssion Roles and ID start */

        $cur_session = array();
        $cur_session['ROLES_ID'] = $this->session->userdata('roles');
        $cur_session['ID'] = $this->session->userdata('id');



        $current_staff_id['get_staff'] = $this->student_model->get_staff_by_session("STAFF", $cur_session, "ID", "DESC");


        /* Current Sesssion Roles and ID End */


        $cur_staff_id_get = $current_staff_id['get_staff']->STAFF_ID;

        $array = array();
        $array['STAFF_LEAVE_DETAILS.STAFF_ID'] = $cur_staff_id_get;

        $array2 = array();
        $array2['STAFF_LEAVE_REQUEST.STAFF_ID'] = $cur_staff_id_get;

        $data['allPdt'] = $this->staff_model->get_available_leave("STAFF_LEAVE_DETAILS", $array, "ID", "DESC");

        $from_date = $this->input->post("from_date");
        $to_date = $this->input->post("to_date");
        $applied_date = $this->input->post("apply_date");
        $remaining_leave = $this->input->post("available_leave");
        $remarks = $this->input->post("leave_remarks");
        $documents = $this->input->post("documents");

        $spplit_rem_leave = explode(" ", $remaining_leave);

        $rem_leave = $spplit_rem_leave[1];

        $leave_type_id = $spplit_rem_leave[0];


        $from_date_orcle = $this->oracle_only_date_by_user($from_date);
        $to_date_orcle = $this->oracle_only_date_by_user($to_date);
        $applied_date_orcl = $this->oracle_only_date_by_user($applied_date);

        $total_leave_days = $this->staff_model->diffrence_two_date_days($to_date_orcle, $from_date_orcle);


        $where = array(
            "STAFF_ID" => $cur_staff_id_get,
            "LEAVE_FROM<=" => $from_date_orcle,
            "LEAVE_TO" => $to_date_orcle,
            "LEAVE_TYPE_ID" => $leave_type_id,
                /* $this->db->where('ATTENDENCE_DATE >=',$from_date);
                  $this->db->where('ATTENDENCE_DATE<=',$to_date); */
        );


        $leave_request = array(
            "STAFF_ID" => $cur_staff_id_get,
            "LEAVE_FROM" => $from_date_orcle,
            "LEAVE_TO" => $to_date_orcle,
            "LEAVE_DAYS" => $total_leave_days + 1,
            "LEAVE_TYPE_ID" => $leave_type_id,
            "APPLIED_DATE" => $applied_date_orcl,
            "EMPLOYEE_REMARKS" => $remarks,
            "DOCUMENT_FILE" => $documents,
            "STATUS" => "pending",
        );

        if (!$this->common_model->check_unique("STAFF_LEAVE_REQUEST", $where)) {

            if ($from_date_orcle <= $to_date_orcle) {
                if ($rem_leave > $total_leave_days) {

                    if ($this->common_model->save_data("STAFF_LEAVE_REQUEST", $leave_request)) {

                        $sdata['msg'] = "Request Successful";
                    } else {
                        $sdata['msg'] = "Not  Successfully Saved";
                    }
                } else {
                    $sdata['msg'] = "You have no leave available yet";
                }
            } else {
                $sdata['msg'] = "Date is not valid";
            }
        } else {

            $sdata['msg'] = "Already applied this date";
        }






        $this->session->set_userdata($sdata);
        redirect(base_url() . "admin/hrms/staff/apply_leave", "refresh");
    }

    public function approved_leave_request() {

        $data = array();
        $data['active'] = "Staff";
        $data['title'] = "Apply Leave";
        $this->load->helper("form");


        /* Current Sesssion Roles and ID start */

        $cur_session = array();
        $cur_session['ROLES_ID'] = $this->session->userdata('roles');
        $cur_session['ID'] = $this->session->userdata('id');



        $current_staff_id['get_staff'] = $this->student_model->get_staff_by_session("STAFF", $cur_session, "ID", "DESC");


        /* Current Sesssion Roles and ID End */

        $cur_staff_id_get = $current_staff_id['get_staff']->STAFF_ID;

        $array = array();
        $array['STAFF_LEAVE_DETAILS.STAFF_ID'] = $cur_staff_id_get;

        $data['allPdt'] = $this->staff_model->get_available_leave("STAFF_LEAVE_DETAILS", $array, "ID", "DESC");

        $array2 = array();
        $array2['STAFF_LEAVE_REQUEST.STATUS'] = "pending";
        $data['allPdt3'] = $this->staff_model->need_approval_leave("STAFF_LEAVE_REQUEST", $array2, "ID", "DESC");



        $data['content'] = $this->load->view("admin/hrms/approve_leave_request", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function approved_leave_request_submit() {

        $data = array();
        $data['active'] = "Staff";
        $data['title'] = "Staff";
        $this->load->helper("form");


        $array = array(
            "STATUS" => $this->input->post("status"),
        );


        $id = $this->input->post("stf_req_id");

        $leave_type_id = $this->input->post("leave_type_id");
        $days = $this->input->post("days");

        $array2 = array(
            "LEAVE_TYPE_ID" => $this->input->post("leave_type_id"),
            "STAFF_ID" => $this->input->post("staff_id"),
        );


        $get_specific_row_leave_details = $this->staff_model->get_specific_row("STAFF_LEAVE_DETAILS", $array2);

        $rem_leave = $get_specific_row_leave_details->REMAINING_LEAVE;
        $rem_leave_id = $get_specific_row_leave_details->ID;

        // $upadte_date= array(

        //     "STAFF_ID" => $this->input->post("staff_id"),
        //     "STAFF_ID" => $this->input->post("l_from"),
        //     "STAFF_ID" => $this->input->post("l_to")

        // );
        
        
        $l_from=$this->input->post("leave_from");
        $l_to=$this->input->post("leave_to");
        $staff_id=$this->input->post("staff_id");

        $lve_from =$this->oracle_onlydate($l_from);
        $lve_to = $this->oracle_onlydate($l_to);

        $leave_from="'".$lve_from."'";
        $leave_to= "'".$lve_to."'";


        if(($this->input->post("status") == 'approved')){
        

            if ($this->common_model->update_attendance("STAFF_ATTENDENCE", $leave_from, $leave_to,$staff_id)) {



                $sdata['msg'] = "Change  Successful";
            } else {
                $sdata['msg'] = "Not Successfully  !!";
            }
            
        }



        if ($this->input->post("status") == 'disapprove') {
            $array3 = array("REMAINING_LEAVE" => $rem_leave);
        } else {
            $array3 = array("REMAINING_LEAVE" => $rem_leave - $days);
        }


        if ($rem_leave >= $days) {
            if ($this->common_model->edit("STAFF_LEAVE_REQUEST", $array, $id) && $this->common_model->edit("STAFF_LEAVE_DETAILS", $array3, $rem_leave_id)) {



                $sdata['msg'] = "Change  Successful";
            } else {
                $sdata['msg'] = "Not Successfully  !!";
            }
        } else {
            $arraydis = array(
                "STATUS" => "disapprove",
            );
            $this->common_model->edit("STAFF_LEAVE_REQUEST", $arraydis, $id);
            $sdata['msg'] = "Remaining Leave Cross Limit";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "admin/hrms/staff/approved_leave_request", "refresh");
    }

    public function payroll() {

        $roles = $this->session->userdata();
        if (!$this->access_control_model->access("MENU_PERMISSIONS", $roles['id'], $roles['roles'], 3)) 
        {
            redirect(base_url(), "refresh");
        }

        $data = array();
        $data['active'] = "Staff";
        $data['title'] = "Payroll";
        $this->load->helper("form");
        $array = array(
            'STAFF.ROLES_ID' => $this->input->post("staff_role"),
            'STAFF.ACTIVE' => 1,
            'STAFF_PAYSLIP.MONTH' => $this->input->post("month"),
            'STAFF_PAYSLIP.YEAR' => $this->input->post("year"),
        );
        $roles_id = $this->input->post("staff_role");
        $month = $this->input->post("month");
        $year = $this->input->post("year");

        $data['month'] = $month;
        $data['year'] = $year;
        $data['allPdt2'] = $this->common_model->view_data("ROLES", "", "ID", "DESC");
        $data['allPdt3'] = $this->staff_model->get_staff_for_payroll("STAFF", $roles_id, $month, $year);
        $data['content'] = $this->load->view("admin/hrms/staff_payroll", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function generate_payroll() {


        $data = array();
        $data['active'] = "Staff";
        $data['title'] = "Payroll";
        $this->load->helper("form");


        $array = array(
            'STAFF.STAFF_ID' => $view_id = $this->uri->segment('5'),
            'STAFF.ACTIVE' => 1,
        );
        $staff_id = $this->uri->segment('5');
        $month = $this->uri->segment('6');
        $year = $this->uri->segment('7');

        $start_date = "01" . "-" . $month . "-" . $year;




        $data['allPdt'] = $this->staff_model->get_staff_all_info_for_generate_payroll("STAFF", $array);


        $data['allPdt2'] = $this->staff_model->count_staff_attendence("STAFF_ATTENDENCE", $start_date, $staff_id);
        $data['month'] = $month;
        $data['year'] = $year;

        $data['content'] = $this->load->view("admin/hrms/generate_staff_payroll", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function save_generate_payroll() {


        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("staff_id", "Group Name", "required");

        if ($this->form_validation->run() == NULL) {

            $data = array();

            $data['active'] = "payroll";

            $data['title'] = "save_payroll";

            $this->load->helper("form");


            redirect(base_url() . "admin/hrms/staff/payroll", "refresh");
        } else {

            $sysDate = date("Y-m-d");
            $payment_date = $this->oracle_onlydate($sysDate);

            $data = array(
                "STAFF_ID" => $this->input->post("staff_id"),
                "TOTAL_ALLOWANCE" => $this->input->post("total_allowance"),
                "TOTAL_DEDUCTION" => $this->input->post("total_deduction"),
                "TAX" => $this->input->post("tax"),
                "NET_SALARY" => $this->input->post("net_salary"),
                "STATUS" => $this->input->post("status"),
                "MONTH" => $this->input->post("month"),
                "YEAR" => $this->input->post("year"),
                "ROLES_ID" => $this->input->post("staff_role"),
                "PAYMENT_METHOD" => $this->input->post("payment_type"),
                "PAYMENT_DATE" => $payment_date,
                "DEPARTMENT" => $this->input->post("staff_department"),
                "DESIGNATION" => $this->input->post("staff_designation"),
                "STAFF_TBL_ID" => $this->input->post("staff_tbl_id")
            );

            if ($this->common_model->save_data("STAFF_PAYSLIP", $data)) {


                $sdata['msg'] = "Save Successful";
            } else {
                $sdata['msg'] = "Not Successfully Data Insert !!";
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "admin/hrms/staff/payroll", "refresh");
        }
    }

    public function revert_payroll() {

        $staff_id = $this->uri->segment('6');
        $month = $this->uri->segment('7');
        $year = $this->uri->segment('8');

        $data = array(
            "STAFF_ID" => $staff_id,
            "MONTH" => $month,
            "YEAR" => $year
        );

        if ($this->staff_model->delete_payroll("STAFF_PAYSLIP", $data)) {

            $sdata['msg'] = "Delete Successful";
        } else {
            $sdata['msg'] = "Not Successfully Data Delete !!";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "admin/hrms/staff/payroll", "refresh");
    }

    public function view_payslip() {

        $data = array();
        $data['active'] = "Staff Details";
        $data['title'] = "View Payslip";
        $this->load->helper("form");

        $staff_id = $this->uri->segment('6');
        $month = $this->uri->segment('7');
        $year = $this->uri->segment('8');

        $array = array(
            "STAFF_PAYSLIP.STAFF_ID" => $staff_id,
            "MONTH" => $month,
            "YEAR" => $year
        );

        $data['month'] = $month;
        $data['year'] = $year;



        $data['allPdt'] = $this->staff_model->get_payslip_report("STAFF_PAYSLIP", $array);
        $data['allPdt2'] = $this->staff_model->get_school_info("GENERAL_SETTINGS", 1, "ID", "DESC");



        $data['content'] = $this->load->view("admin/hrms/staff_payslip", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function download() {

        $this->load->helper("download");

        $data = file_get_contents('uploads/staff/picture/1.txt ');
        force_download('1.txt', $data);
    }

}
