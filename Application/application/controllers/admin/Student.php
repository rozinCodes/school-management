<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");
        $language = $this->session->userdata('language');
        $this->lang->load('auth', $language);
        // $mytype = $this->session->userdata("mytype");
    }





    public function student_admission()
    {

        $roles = $this->session->userdata();
        if ($this->access_control_model->access("MENU_PERMISSIONS", $roles['id'], $roles['roles'], 1)) {
        $data = array();
        $data['active'] = "student_information";
        $data['title'] = "Student Admission";
        $this->load->helper("form");

        $data['allPdt'] = $this->common_model->view_data("SECTIONS", "", "NAME", "ASC");
        $data['allPdt2'] = $this->common_model->view_data("CLASSES", "", "CLASSES", "ASC");
        $data['allPdt3'] = $this->common_model->view_data("SESSIONS", "", "SESSIONS", "ASC");
        $data['allPdt4'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");

        $data['allPdtStdinfo'] = $this->student_model->get_siblingsParant_info("GUARDIAN", "", "ID", "ASC");



        // print_r($data['allPdt2']);
        // exit();



        $data['content'] = $this->load->view("admin/student_admission", $data, TRUE);
        $this->load->view("admin/master", $data);
        }
        else
        {
            redirect(base_url(), "refresh");
        }
    }

    /*public function student_edit()
    {
        $data = array();
        $data['active'] = "Student Admission";
        $data['title'] = "Student Admission";
        $this->load->helper("form");
        
        $data['allPdt'] = $this->common_model->view_data("SECTIONS", "", "NAME", "ASC");
        $data['allPdt2'] = $this->common_model->view_data("CLASSES", "", "CLASSES", "ASC");
        $data['allPdt3'] = $this->common_model->view_data("SESSIONS", "", "SESSIONS", "ASC");



        $data['content'] = $this->load->view("admin/student_admission", $data, TRUE);
        $this->load->view("admin/master", $data);

    }*/

    public function student_edit()
    {


        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("fname", "Group Name", "required");

        if ($this->form_validation->run() == NULL) {


            $edit_id = $this->uri->segment('5');

            //echo 
            $data = array();

            $data['active'] = "groups";
            $data['edit'] = $edit_id;

            $data['title'] = "groups";

            $this->load->helper("form");

            /* print_r($data);
                echo $edit_id;
                exit();*/
            $array = array("STUDENT_ID" => $edit_id, "STATUS" => 1);


            $data['allPdt1'] = $this->student_model->get_std_details_by_id("ENROLL", $array, "ID", "DESC");

            // print_r($data['allPdt1']);
            // exit();



            $data['allPdt'] = $this->common_model->view_data("SECTIONS", "", "NAME", "ASC");
            $data['allPdt2'] = $this->common_model->view_data("CLASSES", "", "CLASSES", "ASC");
            $data['allPdt3'] = $this->common_model->view_data("SESSIONS", "", "SESSIONS", "ASC");
            $data['allPdt4'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");
            $data['content'] = $this->load->view("admin/student_admission", $data, TRUE);
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


                $config['allowed_types'] = strtolower('gif|jpg|jpeg|png');  //supported image
                $config['upload_path'] = "./uploads/students/picture/";
                $config['encrypt_name'] = TRUE;
                $this->load->library('upload', $config);

                //$this->upload->do_upload("pic");   

                // $this->upload->initialize($this->set_upload_options());

                $this->upload->do_upload("pic");
                $dataInfo[] = $this->upload->data();
            }


            $date_of_birth = $this->input->post("date_of_birth");
            $admission_date = $this->input->post("admission_date");

            $date1 = $this->oracle_onlydate($date_of_birth);
            $date2 = $this->oracle_onlydate($admission_date);



            $data = array(

                "ROLL_NO" => $this->input->post("roll_no"),
                "CLASS" => $this->input->post("class"),
                "SECTION" => $this->input->post("section"),
                "F_NAME" => $this->input->post("fname"),
                "L_NAME" => $this->input->post("lname"),
                "GENDER" => $this->input->post("gender"),
                "DATE_OF_BIRTH" => $date1,
                "RELIGION" => $this->input->post("religion"),
                "MOBILE_NO" => $this->input->post("mobile_no"),
                "EMAIL" => $this->input->post("email"),
                "ADMISSION_DATE" => $date2,
                "STUDENT_IMAGE" =>  $dataInfo[0]['file_name'],
                "BLOOD_GROUP" => $this->input->post("blood_group"),
                "PRESENT_ADDRESS" => $this->input->post("present_address"),
                "PERMANENT_ADDRESS" => $this->input->post("permanent_address"),
                "FATHER_NAME" => $this->input->post("father_name"),
                "FATHER_PHONE" => $this->input->post("father_phone"),
                "FATHER_OCCUPATION" => $this->input->post("father_occupation"),
                "FATHER_PHOTO" =>  $dataInfo[1]['file_name'],
                "MOTHER_NAME" => $this->input->post("mother_name"),
                "MOTHER_PHONE" => $this->input->post("mother_phone"),
                "MOTHER_OCCUPATION" => $this->input->post("mother_occupation"),
                "MOTHER_PHOTO" =>  $dataInfo[2]['file_name'],
                "GUARDIAN_NAME" => $this->input->post("guardian_name"),
                "GUARDIAN_PHONE" => $this->input->post("guardian_phone"),
                "GUARDIAN_OCCUPATION" => $this->input->post("guardian_occupation"),
                "GUARDIAN_PHOTO" =>  $dataInfo[3]['file_name'],
                "GUARDIAN_PRESENT_ADDRESS" => $this->input->post("guardian_present_address"),
                "GUARDIAN_PERMANENT_ADDRESS" => $this->input->post("guardian_permanent_address"),
                "EMERGENCY_CONTACT" => $this->input->post("emergency_contact"),
                "ADMISSION_STATUS" => $this->input->post("admission_status"),
                "ADMISSION_SESSION" => $this->input->post("admission_session"),
                "RELATION" => $this->input->post("gurdian_relation"),
                "ADMISSION_TYPE" => $this->input->post("admission_type"),
                "VERSION" => $this->input->post("version"),
                "PASSWORD" => rand(1000, 9999),
                "ROLES_ID" => 5



            );
            $edit_id = $this->uri->segment('5');

            $data2 = array(
                "CLASS_ID" => $this->input->post("class"),
                "SECTION_ID" => $this->input->post("section"),
                "ROLL" => $this->input->post("roll_no"),
                "SESSION_ID" => $this->input->post("admission_session"),
                "VERSION" => $this->input->post("version"),


            );


            foreach ($data as $item => $val) {

                if ($val != null) {
                    $dataa[$item] = $val;
                }
            }

            foreach ($data2 as $item => $val) {

                if ($val != null) {
                    $dataa2[$item] = $val;
                }
            }







            if ($this->common_model->edit("STUDENTS", $dataa, $edit_id) && $this->common_model->edit_enroll("ENROLL", $dataa2, $edit_id)) {



                $sdata['msg'] = "Edit Successful";
            } else {
                $sdata['msg'] = "Not Successfully Data Edit !!";
            }
            $this->session->set_userdata($sdata);

            redirect(base_url() . "admin/student/student_details/details/$edit_id", "refresh");
        }
    }


    public function student_details()
    {




        $data = array();
        $data['active'] = "Student details";
        $data['title'] = "Student Details";
        $this->load->helper("form");

        /*$array2=array("ADMISSION_NO"=>$ADMISSION_NO,"CLASS_ID"=>$STUDENT_CLASS,"SECTION_ID"=>$STUDENT_SECTION,"STATUS"=>1);

                
        $students=$this->student_model->get_student_by_class_section("STUDENTS",$array2,"ID","DESC",1);*/




        $view_id = $this->uri->segment('5');
        //$array=array("STUDENT_ID"=>$view_id,"CLASS_ID"=>$STUDENT_CLASS,"SECTION_ID"=>$STUDENT_SECTION,"STATUS"=>1);
        $array = array("ENROLL.STUDENT_ID" => $view_id, "STATUS" => 1);
        $data['allPdt'] = $this->student_model->get_std_details_by_id("ENROLL", $array, "ID", "DESC");
        //print_r($data['allPdt']);
        //exit();


        $data['allPdt4'] = $this->common_model->view_data("SECTIONS", "", "NAME", "ASC");
        $data['allPdt2'] = $this->common_model->view_data("CLASSES", "", "CLASSES", "ASC");
        $data['allPdt3'] = $this->common_model->view_data("SESSIONS", "", "SESSIONS", "ASC");
        $data['allPdt5'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");



        $data['content'] = $this->load->view("admin/student_details", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function student_lists()
    {

        $data = array();
        $data['active'] = "groups";
        $data['title'] = "Student Details";
        $this->load->helper("form");

        /*$array['STUDENTS.CLASS']= $this->input->post("class");
        $array['STUDENTS.SECTION']= $this->input->post("section");
        $array['SESSIONS.ID']= $this->input->post("session");*/
        $array['ENROLL.CLASS_ID'] = $this->input->post("class");
        $array['ENROLL.SECTION_ID'] = $this->input->post("section");
        $array['ENROLL.SESSION_ID'] = $this->input->post("session");
        $array['STATUS']=1;


        

        $data['allPdt'] = $this->common_model->view_data("SECTIONS", "", "NAME", "ASC");
        $data['allPdt2'] = $this->common_model->view_data("CLASSES", "", "ID", "ASC");
        $data['allPdt3'] = $this->common_model->view_data("SESSIONS", "", "SESSIONS", "ASC");
        $data['allPdt5'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");
        $data['allPdtclass'] = $this->student_model->Get_student_class_list("ENROLL", $array, "ID", "DESC");




        // $data['allPdt']= $this->common_model->view_data("STUDENTS", "","ID","DESC");
        $data['content'] = $this->load->view("admin/student_lists", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function student_list_by_admission_no()
    {

        

        $data = array();
        $data['active'] = "groups";
        $data['title'] = "Student Details";
        $this->load->helper("form");

        /*$array['STUDENTS.CLASS']= $this->input->post("class");
        $array['STUDENTS.SECTION']= $this->input->post("section");
        $array['SESSIONS.ID']= $this->input->post("session");*/
        $admission_no = $this->input->post("admission_no");
        $status = 1;



        //
        $data['allPdtclass'] = $this->student_model->student_details_by_admission_no("ENROLL", $admission_no,$status,"ID", "DESC");



        $data['content'] = $this->load->view("admin/student_lists", $data, TRUE);
        $this->load->view("admin/master", $data);
    }




    public function insert()
    {


        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("fname", "Student Admission", "required");

        if ($this->form_validation->run() == NULL) {
            $data = array();
            $data['active'] = "groups";
            $data['title'] = "groups";
            $this->load->helper("form");
            $data['content'] = $this->load->view("admin/student_admission", $data, TRUE);
            $this->load->view("admin/master", $data);
        } else {



            //---start
            $flag = 0;
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
                $config['upload_path'] = "./uploads/students/picture/";
                $config['encrypt_name'] = TRUE;
                $this->load->library('upload', $config);

                //$this->upload->do_upload("pic");   

                // $this->upload->initialize($this->set_upload_options());

                $this->upload->do_upload("pic");
                $dataInfo[] = $this->upload->data();
            }




            $date_of_birth = $this->input->post("date_of_birth");
            $admission_date = $this->input->post("admission_date");

            $date1 = $this->oracle_onlydate($date_of_birth);
            $date2 = $this->oracle_onlydate($admission_date);

            /*reg_number generate start*/

            if ($this->student_model->check_Admission_no()) {
                $last_no = $this->student_model->check_last_Admission_no();

                $str = $last_no->ADMISSION_NO; ///admission number generate


                $arr1 = str_split($str);
                $r = $arr1[4] . $arr1[5] . $arr1[6] . $arr1[7] . $arr1[8];
                $r = $r + 1;
                /*start*/
                $month = date("m");
                $year = date("Y");

                $a = $year / 10;
                $b = $a / 10;
                $c = ($a % 10);
                $d = ($year % 10);

                $s = sprintf("%05d", $r);
                $f = $c . $d . $month . $s;

                /*end*/
                //$data['allPdt4'] = $f;


            } else {
                $month = date("m");
                $year = date("Y");

                $a = $year / 10;
                $b = $a / 10;
                $c = ($a % 10);
                $d = ($year % 10);

                $s = sprintf("%05d", 0);
                $f = $c . $d . $month . $s;
                $f = $f + 1;
                //$data['allPdt4'] = $f;

            }


            //auto roll set start
            if ($this->student_model->check_roll_no()) {
                $wh = array(
                    "VERSION" => $this->input->post("version"),
                    "CLASS_ID" => $this->input->post("class"),
                    "SECTION_ID" => $this->input->post("section"),
                    "SESSION_ID" => $this->input->post("admission_session"),
                   // "STATUS" =>0,

                );
                if ($this->student_model->check_last_roll_no("ENROLL", $wh)) {
                    $last_roll = $this->student_model->check_last_roll_no("ENROLL", $wh)->ROLL + 1;
                } else {
                    $last_roll = 1;
                }
            }



            $data = array(
                "ADMISSION_NO" => $f,
                "ROLL_NO" => $last_roll,
                "CLASS" => $this->input->post("class"),
                "SECTION" => $this->input->post("section"),
                "F_NAME" => $this->input->post("fname"),
                "L_NAME" => $this->input->post("lname"),
                "GENDER" => $this->input->post("gender"),
                "DATE_OF_BIRTH" => $date1,
                "RELIGION" => $this->input->post("religion"),
                "MOBILE_NO" => $this->input->post("mobile_no"),
                "EMAIL" => $this->input->post("email"),
                "ADMISSION_DATE" => $date2,
                "STUDENT_IMAGE" =>  $dataInfo[0]['file_name'],
                "BLOOD_GROUP" => $this->input->post("blood_group"),
                "PRESENT_ADDRESS" => $this->input->post("present_address"),
                "PERMANENT_ADDRESS" => $this->input->post("permanent_address"),
                "FATHER_NAME" => $this->input->post("father_name"),
                "FATHER_PHONE" => $this->input->post("father_phone"),
                "FATHER_OCCUPATION" => $this->input->post("father_occupation"),
                "FATHER_PHOTO" =>  $dataInfo[1]['file_name'],
                "MOTHER_NAME" => $this->input->post("mother_name"),
                "MOTHER_PHONE" => $this->input->post("mother_phone"),
                "MOTHER_OCCUPATION" => $this->input->post("mother_occupation"),
                "MOTHER_PHOTO" =>  $dataInfo[2]['file_name'],
                "GUARDIAN_NAME" => $this->input->post("guardian_name"),
                "GUARDIAN_PHONE" => $this->input->post("guardian_phone"),
                "GUARDIAN_OCCUPATION" => $this->input->post("guardian_occupation"),
                "GUARDIAN_PHOTO" =>  $dataInfo[3]['file_name'],
                "GUARDIAN_PRESENT_ADDRESS" => $this->input->post("guardian_present_address"),
                "GUARDIAN_PERMANENT_ADDRESS" => $this->input->post("guardian_permanent_address"),
                "EMERGENCY_CONTACT" => $this->input->post("emergency_contact"),
                "ADMISSION_STATUS" => $this->input->post("admission_status"),
                "ADMISSION_SESSION" => $this->input->post("admission_session"),
                "RELATION" => $this->input->post("gurdian_relation"),
                "ADMISSION_TYPE" => $this->input->post("admission_type"),
                "PASSWORD" => rand(1000, 9999),
                "VERSION" => $this->input->post("version"),
                "GUARDIAN_ID" => $this->input->post("guar_id"),
                "SIBLING_ID" => $this->input->post("siblings_id"),
                "ROLES_ID" => 5



            );




            if ($this->common_model->save_data("STUDENTS", $data)) {
                $flag = 1;
            }

            $data2 = array(
                "CLASS_ID" => $this->input->post("class"),
                "SECTION_ID" => $this->input->post("section"),
                "ROLL" => $last_roll,
                "SESSION_ID" => $this->input->post("admission_session"),
                "STUDENT_ID" => $this->student_model->check_last_id()->ID,
                "VERSION" => $this->input->post("version")


            );
            // print_r($this->student_model->check_last_id()->ID+1);

            $guardian=array(
                "PASSWORD" => $this->input->post("guardian_password"),
                "STUDENT_ID" => $this->student_model->check_last_id()->ID,
                "ADMISSION_NO" => $this->student_model->check_last_Admission_no()->ADMISSION_NO,
                "PHONE_NO" => $this->input->post("guardian_phone"),
                "ROLES_ID"=>6

            );
        
         


            if ($flag == 1 && $this->common_model->save_data("GUARDIAN", $guardian)) {

                $flag=2;
                
                
            }



            if ($flag == 2 && $this->common_model->save_data("ENROLL", $data2)) {



                $sdata['msg'] = "Save Successful </br> and admission no is :  " . $f;
                // $sdata['msg'] = "Admission Number is".$f;
            } else {
                $sdata['msg'] = "Not Successfully Data Insert !!";
            }
           
            $this->session->set_userdata($sdata);
            redirect(base_url() . "studentAdmission", "refresh");
        }
    }


    public function student_attendence()
    {


        $array = array();
        $array['ENROLL.CLASS_ID'] = $this->input->post("class");
        $array['ENROLL.SECTION_ID'] = $this->input->post("section");
        $array['ENROLL.SESSION_ID'] = $this->input->post("session");
        $array['ENROLL.STATUS'] = 1;

        $data = array();
        $data['active'] = "groups";
        $data['title'] = "Student Attendence";
        $this->load->helper("form");
        $data['allPdt'] = $this->common_model->view_data("SECTIONS", "", "NAME", "ASC");
        $data['allPdt2'] = $this->common_model->view_data("CLASSES", "", "CLASSES", "ASC");
        $data['allPdt4'] = $this->common_model->view_data("SESSIONS", "", "SESSIONS", "ASC");
        $data['allPdt5'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");
        $data['allPdt3'] = $this->student_model->search_student_attendence("ENROLL", $array, "ID", "DESC");
        

        $cur_session = array();
        $cur_session['ROLES_ID'] = $this->session->userdata('roles');
        $cur_session['ID'] = $this->session->userdata('id');

        $data['get_staff'] = $this->student_model->get_staff_by_session("STAFF", $cur_session, "ID", "DESC");

        /*print_r($data['allPdt3']);
        exit();*/

        $data['content'] = $this->load->view("admin/student_attendence", $data, TRUE);
        $this->load->view("admin/master", $data);
    }
    public function save_student_attendence()
    {
        $succ = 0;

        $class = $this->input->post("class");
        $section = $this->input->post("section");
        $staff_id = $this->input->post("staff_id");
        $admission_session = $this->input->post("admission_session");
     

        /* Start -- For check Existing Attendence*/
        $array = array();
        $array['STUDENT_ATTENDENCE.STAFF_ID'] = $this->input->post("staff_id");
        $array['STUDENT_ATTENDENCE.CLASSES'] = $this->input->post("class");
        $array['STUDENT_ATTENDENCE.SECTION'] = $this->input->post("section");
        $array['STUDENT_ATTENDENCE.SESSIONS'] = $this->input->post("admission_session");
       
        $atndence_date = $this->input->post("atnd_date");

        /* End -- For check Existing Attendence*/


        $attendence_date = $this->input->post("atnd_date");
        $atnd_date = $this->oracle_only_date_by_user($attendence_date);


        /*$date1=$this->oracle_date($attendence_date);
        $date2=$this->oracle_onlydate($attendence_date);*/

        $atn_sys_date = date("Y-m-d h:i:s a");


        $date1 = $this->oracle_date($atn_sys_date);
        $date2 = $this->oracle_onlydate($atn_sys_date);


        $attendance_type = array();
        $attendance_type = $this->input->post("attendance");
        

        
        //print_r($this->input->post("attendance"));

        $atnd_data['check_attendence'] = $this->student_model->check_attendence("STUDENT_ATTENDENCE", $array, $date2, "ID", "DESC");

        if ($atnd_data['check_attendence']) {


            echo '<script language="javascript">';
            echo 'alert("Already Attendence Done")';

            echo '</script>';
        } else {
            
               
            // foreach( $attendance_type as $index => $attendance_type ) {
            //     echo '<option value="' . $attendance_type . '">' . $attendance_type2[$index] . '</option>';
            //  }

           
            foreach ($attendance_type as $key => $val) {
               
                $atndce_type = $val;

                $admission_no = $key;

                
                
               $index= explode('/',$admission_no);
            //    echo $index[0];
            //    echo"--";
            //    echo $index[1];
            //    exit();
            
                $data = array('ATTENDENCE_TYPE' => $atndce_type, 'CLASSES' => $class, 'ATTENDENCE_DATE_TIME' => $date1, 'SECTION' => $section, 'ADMISSION_NO' => $index[0], 'STAFF_ID' => $staff_id, 'ATTENDENCE_DATE' => $date2, 'SESSIONS' => $admission_session,'STUDENT_ID'=>$index[1]);


                if ($this->common_model->save_data("STUDENT_ATTENDENCE", $data)) {
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
        redirect(base_url() . "studentAttendence", "refresh");
    }


    public function student_attendence_report()
    {

        $array = array();
        $array['CLASS'] = $this->input->post("class");
        $array['SECTION'] = $this->input->post("section");



        $data = array();
        $data['active'] = "groups";
        $data['title'] = "groups";
        $this->load->helper("form");
        $data['allPdt'] = $this->common_model->view_data("SECTIONS", "", "NAME", "ASC");
        $data['allPdt2'] = $this->common_model->view_data("CLASSES", "", "ID", "ASC");
        $data['allPdt4'] = $this->common_model->view_data("SESSIONS", "", "SESSIONS", "ASC");
        $data['allPdt5'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");
        $data['content'] = $this->load->view("admin/student_attendence_report", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function get_student_attendence_report()
    {



        $array = array();
        $array['STUDENT_ATTENDENCE.CLASSES'] = $this->input->post("class");
        $array['STUDENT_ATTENDENCE.SECTION'] = $this->input->post("section");
        $array['SESSIONS.ID'] = $this->input->post("session");

        $from_date = $this->input->post("from_date");
        $to_date = $this->input->post("to_date");

        $f_date = $this->oracle_only_date_by_user($from_date);

        $t_date = $this->oracle_only_date_by_user($to_date);

        




        $data = array();
        $data['active'] = "groups";
        $data['title'] = "groups";
        $this->load->helper("form");
        $data['allPdt'] = $this->common_model->view_data("SECTIONS", "", "NAME", "ASC");
        $data['allPdt2'] = $this->common_model->view_data("CLASSES", "", "ID", "ASC");
        $data['allPdt4'] = $this->common_model->view_data("SESSIONS", "", "SESSIONS", "ASC");
        $data['allPdt5'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");
        $data['allPdt3'] = $this->student_model->search_student_attendence_report("STUDENT_ATTENDENCE", $array, $f_date, $t_date, "ID", "DESC");



        $data['content'] = $this->load->view("admin/student_attendence_report", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function get_student_attendence_report_by_admission_no()
    {

        $array = array();

        $array['STUDENT_ATTENDENCE.ADMISSION_NO'] = $this->input->post("search_admission");

        $from_date = $this->input->post("from_date");
        $to_date = $this->input->post("to_date");

        $f_date = $this->oracle_only_date_by_user($from_date);
        $t_date = $this->oracle_only_date_by_user($to_date);


        $data['active'] = "groups";
        $data['title'] = "groups";
        $this->load->helper("form");
        $data['allPdt'] = $this->common_model->view_data("SECTIONS", "", "NAME", "ASC");
        $data['allPdt2'] = $this->common_model->view_data("CLASSES", "", "CLASSES", "ASC");
        $data['allPdt4'] = $this->common_model->view_data("SESSIONS", "", "SESSIONS", "ASC");
        $data['allPdt3'] = $this->student_model->search_student_attendence_report_by_admission_no("STUDENT_ATTENDENCE", $array, $f_date, $t_date, "ID", "DESC");







        /*$this->load->library('pdf');
        $html = $this->load->view('admin/student_attendence_report', $data, true);
        
        $this->pdf->createPDF($html, 'mypdf', false);*/

        $data['content'] = $this->load->view("admin/student_attendence_report", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function student_late_attendence()
    {


        $array = array();
        $array['STUDENT_ATTENDENCE.CLASSES'] = $this->input->post("class");
        $array['STUDENT_ATTENDENCE.SECTION'] = $this->input->post("section");
        $array['STUDENT_ATTENDENCE.SESSIONS'] = $this->input->post("session");
        $array['STUDENT_ATTENDENCE.STAFF_ID'] = $this->input->post("staff_id");

        $attendence_date = $this->input->post("atnd_date");
        $array['STUDENT_ATTENDENCE.ATTENDENCE_DATE'] = $this->oracle_onlydate($attendence_date);
        //$date1=$this->oracle_date($attendence_date);


        $data = array();
        $data['active'] = "groups";
        $data['title'] = "groups";
        $this->load->helper("form");


        $cur_session = array();
        $cur_session['ROLES_ID'] = $this->session->userdata('roles');
        $cur_session['ID'] = $this->session->userdata('id');

        $data['get_staff'] = $this->student_model->get_staff_by_session("STAFF", $cur_session, "ID", "DESC");




        $data['allPdt'] = $this->common_model->view_data("SECTIONS", "", "NAME", "ASC");
        $data['allPdt2'] = $this->common_model->view_data("CLASSES", "", "CLASSES", "ASC");
        $data['allPdt4'] = $this->common_model->view_data("SESSIONS", "", "SESSIONS", "ASC");
        $data['allPdt5'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");
        $data['allPdt3'] = $this->student_model->search_student_late_attendence("STUDENT_ATTENDENCE", $array, "ID", "DESC");

        $data['content'] = $this->load->view("admin/student_late_attendence", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function student_attendence_by_admission_no()
    {

        $array = array();
        $array['STUDENTS.ADMISSION_NO'] = $this->input->post("admission_no");
        $array['ENROLL.STATUS'] = 1;




        $data = array();
        $data['active'] = "groups";
        $data['title'] = "groups";
        $this->load->helper("form");

        $cur_session = array();
        $cur_session['ROLES_ID'] = $this->session->userdata('roles');
        $cur_session['ID'] = $this->session->userdata('id');

        $data['get_staff'] = $this->student_model->get_staff_by_session("STAFF", $cur_session, "ID", "DESC");



        $data['allPdt'] = $this->common_model->view_data("SECTIONS", "", "NAME", "ASC");
        $data['allPdt2'] = $this->common_model->view_data("CLASSES", "", "CLASSES", "ASC");
        $data['allPdt4'] = $this->common_model->view_data("SESSIONS", "", "SESSIONS", "ASC");
        // $data['allPdt3']= $this->student_model->search_student_attendence_by_admission_no("STUDENT_ATTENDENCE",$array,"ID","DESC");
        $data['allPdt3'] = $this->student_model->search_student_attendence_by_admission_no("ENROLL", $array, "ID", "DESC");

        $data['content'] = $this->load->view("admin/student_attendence", $data, TRUE);
        $this->load->view("admin/master", $data);
    }



    public function student_late_attendence_submit()
    {

        $succ = 0;

        $array = array();

        $array['STAFF_ID'] = $this->input->post("staff_id");
        //$array['ADMISSION_NO']= $this->input->post("admission_no");
        //$array['ATTENDENCE_DATE']=$this->input->post("atnd_date");

        $attendance_type = array();
        $attendance_type = $this->input->post("attendance");

        // $attendence_date= $this->input->post("atnd_date");
        $attendence_date = date("Y-m-d");
        $atn_dte_time= date('Y-m-d H:i:s ');

        $convert_date_time = $this->oracle_date($atn_dte_time);
        $date1 = $this->oracle_onlydate($attendence_date);

        foreach ($attendance_type as $key => $val) {

            $atndce_type = $attendance_type[$key];
            $admission_no = $key;
            $array['ADMISSION_NO'] = $admission_no;

            $data = array('ATTENDENCE_TYPE' => $atndce_type,'ATTENDENCE_DATE_TIME'=>$convert_date_time);

            if ($this->student_model->edit_late_attendence("STUDENT_ATTENDENCE", $data, $array, $date1)) {

                $succ = 1;
            }
        }




        if ($succ == 1) {
            $sdata['msg'] = "Save Successful";
        } else {
            $sdata['msg'] = "Not Successful";
        }

        $this->session->set_userdata($sdata);
        redirect(base_url() . "admin/student/student_late_attendence", "refresh");
    }

    public function student_late_attendence_by_admission_no()
    {


        $array = array();
        $array['STUDENT_ATTENDENCE.ADMISSION_NO'] = $this->input->post("admission_no");
        $array['STUDENT_ATTENDENCE.STAFF_ID'] = $this->input->post("staff_id");
        //$array['STUDENT_ATTENDENCE.ATTENDENCE_DATE']= $this->input->post("admission_no");



        //$attendence_date= $this->input->post("atnd_date");
        $attendence_date = date("Y-m-d");


        $date1 = $this->oracle_onlydate($attendence_date);
        $array['STUDENT_ATTENDENCE.ATTENDENCE_DATE'] = $this->oracle_onlydate($attendence_date);






        $data = array();
        $data['active'] = "groups";
        $data['title'] = "groups";
        $this->load->helper("form");

        $cur_session = array();
        $cur_session['ROLES_ID'] = $this->session->userdata('roles');
        $cur_session['ID'] = $this->session->userdata('id');

        $data['get_staff'] = $this->student_model->get_staff_by_session("STAFF", $cur_session, "ID", "DESC");

        // $data['allPdt3']= $this->student_model->search_student_attendence_by_admission_no("STUDENT_ATTENDENCE",$array,"ID","DESC");
        $data['allPdt3'] = $this->student_model->search_student_late_attendence_by_admission_no("STUDENT_ATTENDENCE", $array, "ID", "DESC");

        $data['content'] = $this->load->view("admin/student_late_attendence", $data, TRUE);
        $this->load->view("admin/master", $data);
    }
    public function single_student_promot()
    {


        $CLASS_ID = $this->input->post("class");
        $SECTION_ID = $this->input->post("section");
        $ROLL = $this->input->post("roll_no");
        $STUDENT_ID = $this->input->post("student_id");
        $SESSION_ID = $this->input->post("session");
        $VERSION = $this->input->post("version");
        $data = array(
            'CLASS_ID' => $CLASS_ID, 'SECTION_ID' => $SECTION_ID, 'ROLL' => $ROLL, 'STUDENT_ID' => $STUDENT_ID, 'SESSION_ID' => $SESSION_ID, 'VERSION' => $VERSION

        );

        $where = array('STUDENT_ID' => $STUDENT_ID, 'STATUS' => 1);
        $data2 = array('STATUS' => 0);
        if ($this->common_model->edit_enroll2("ENROLL", $data2, $where)) {
            if ($this->common_model->save_data("ENROLL", $data)) {
                $sdata['msg'] = "Promote Successful";
            } else {
                $sdata['msg'] = "Promot Not Successful";
            }
        }


        $this->session->set_userdata($sdata);

        redirect(base_url() . "admin/student/student_details/details/$STUDENT_ID", "refresh");
    }



    public function change_password()
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

            redirect(base_url() . "admin/student/student_details/details/$edit_id", "refresh");
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
            redirect(base_url() . "admin/student/student_details/details/$edit_id", "refresh");
        }
    }
    public function failCheck($allPdtfail, $ID)
    {

        foreach ($allPdtfail as $valuefail) {
            if ($valuefail->STUDENT_ID == $ID) {
                return true;
                // break;
            }
        }
    }


    public function student_for_promote()
    {
        // $roles = $this->session->userdata('roles');
        // if($roles!=1||$roles!=2)
        // {
        //     redirect(base_url(), "refresh");
        // }

        $roles = $this->session->userdata();
        if ($this->access_control_model->access("MENU_PERMISSIONS", $roles['id'], $roles['roles'], 2)) {

        $data = array();
        $data['active'] = "student_information";
        $data['title'] = "Promote Students";
        $this->load->helper("form");


        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("version", "Name", "required");

        if ($this->form_validation->run() == NULL) {
            $data = array();
            $data['active'] = "classes";
            $data['title'] = "Promote Students";
            $this->load->helper("form");
            $data['allPdt1'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");
            $data['allPdt2'] = $this->common_model->view_data("CLASSES", "", "ID", "ASC");
            $data['allPdt3'] = $this->common_model->view_data("SECTIONS", "", "ID", "ASC");
            $data['allPdt4'] = $this->common_model->view_data("SESSIONS", "", "ID", "ASC");
            $data['allPdt5'] = $this->common_model->view_data("EXAMS", "", "ID", "ASC");




            $data['content'] = $this->load->view("admin/student_promote", $data, TRUE);
            $this->load->view("admin/master", $data);
        } else {

            $data['allPdt1'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");
            $data['allPdt2'] = $this->common_model->view_data("CLASSES", "", "ID", "ASC");
            $data['allPdt3'] = $this->common_model->view_data("SECTIONS", "", "ID", "ASC");
            $data['allPdt4'] = $this->common_model->view_data("SESSIONS", "", "ID", "ASC");
            $data['allPdt5'] = $this->common_model->view_data("EXAMS", "", "ID", "ASC");

            //$VERSION_ID = $this->input->post("version");
            $CLASS_ID = $this->input->post("class");
            $SECTION_ID = $this->input->post("section");
            $SESSION_ID = $this->input->post("session");
            $EXAM_ID = $this->input->post("exam_name");



            $pass_mark = $this->student_model->pass_mark("MARKS_GRADE")->PASS_MARK + 1;
            $allPdtfail = $this->academics_model->view_fali_std_list($CLASS_ID, $SESSION_ID, $SECTION_ID, $EXAM_ID, $pass_mark);
            $allPdt = $this->academics_model->view_result($CLASS_ID, $SESSION_ID, $SECTION_ID, $EXAM_ID);







            $data['allPdt'] = $allPdt;
            // echo "<pre>";
            // print_r($data['allPdt']);
            // echo "<pre>";
            // exit();


            if ($data['allPdt']) {

                foreach ($allPdt as $value) {
                    if ($value->MARKS == null) {
                        $items[] = "NOT INSERTED";
                    }
                    else
                    {
                        if ($this->failCheck($allPdtfail, $value->STUDENT_ID)) {
                            $items[] = "Fail";
                        } else {
                            $items[] = "Pass";
                        }
                    }



                   
                }

                $data['dsf'] = $items;



                $data['content'] = $this->load->view("admin/student_promote", $data, TRUE);
                $this->load->view("admin/master", $data);
            } else {

                $sdata['msg'] = "No Data Found";
                $this->session->set_userdata($sdata);
                redirect(base_url() . "admin/student/student_for_promote", "refresh");
            }
        }
    }
    else
    {
        redirect(base_url(), "refresh");
    }
}

    //   public function filterArray($array) 
    //   {
    //     $item=array();
    //     foreach($array as $key => $value)
    //     {
    //         if($value!=null)
    //         {
    //             $item[]=$value;
    //         }

    //     }
    //     return $item;
    //   }

    //   public function maxValueInArray($array)
    //     {
    //         $currentMax=$array[0];

    //             foreach($array as $key => $value)
    //             { 


    //                 if ($value >= $currentMax)
    //                 { 

    //                     $currentMax = $value;



    //                 }
    //             }


    //         return $currentMax;
    //     }

    //    public function makeMaxZero($max,$array)
    //    {   
    //        $item=array();
    //     foreach($array as $key => $value)
    //     {

    //          if($value==$max)
    //          {   
    //          $item[]=0;

    //          }

    //         else
    //          {
    //           $item[]=$value;
    //          }


    //     }
    //     return $item;
    //    }
    public function student_promote()
    {
        $STUDENT_ID = $this->input->post("promote");
        $MRKS = $this->input->post("marks");
        $VERSION_ID = $this->input->post("version_id");
        $CLASS_ID = $this->input->post("class_id");
        $SECTION_ID = $this->input->post("section_id");
        $SESSION_ID = $this->input->post("session_id");

        // print_r($STUDENT_ID);
        //  echo"/";
        // print_r($MRKS);
        // echo"/";
        // echo $VERSION_ID;
        // echo"/";
        // echo $CLASS_ID;
        // echo"/";
        // echo $SECTION_ID;
        // echo"/";
        // echo $SESSION_ID;
        // echo"/";


        // foreach ($STUDENT_ID as $key=>$value)
        // {
        //     foreach ($MRKS as $key2=>$value2)
        //     {
        //         if($key==$key2)
        //         {
        //             if($value=="Fail")
        //             {
        //                // echo "fail";
        //                // echo $value2;
        //                 $itemFail[]=$value2;

        //             }
        //             else
        //             {
        //                 $itemFail[]=null;
        //             }
        //             if($value=="Pass")
        //             {
        //             // echo "pass";
        //              //echo $value2;
        //              $itemsPass[]=$value2;
        //             }
        //             else
        //             {
        //                 $itemsPass[]=null;
        //             }
        //         }

        //     }


        // }

        // $pass= $this->filterArray($itemsPass);
        // $fail= $this->filterArray($itemFail);
        // print_r($STUDENT_ID);
        // print_r($MRKS);

      



        $flag=0;
        $i=1;
        foreach ($STUDENT_ID as $key => $value) {

            $where = array(
                'CLASS_ID' => $CLASS_ID,  'STUDENT_ID' => $key, 'SESSION_ID' => $SESSION_ID, 'VERSION' => $VERSION_ID,'STATUS' => 1

            );
           // $where = "CLASS_ID = $CLASS_ID AND STUDENT_ID = $key AND SESSION_ID = $SESSION_ID AMD VERSION = $VERSION_ID AND STATUS = '1'";

           // $where = "name='Joe' AND status='boss' OR status='active'";
        //    $R=$this->common_model->check_unique("ENROLL",$where);
        //    echo $R;
        //    exit();
            
           
           if(!$this->common_model->check_unique("ENROLL",$where))
           {
            $data = array(
                'CLASS_ID' => $CLASS_ID, 'SECTION_ID' => $SECTION_ID, 'ROLL' => $i, 'STUDENT_ID' => $key, 'SESSION_ID' => $SESSION_ID, 'VERSION' => $VERSION_ID

            );


            $where = array('STUDENT_ID' => $key, 'STATUS' => 1);
            $data2 = array('STATUS' => 0);
            if ($this->common_model->edit_enroll2("ENROLL", $data2, $where)) {
                if ($this->common_model->save_data("ENROLL", $data)) {
                      $flag++;
                } 
            }
            $i++;
           }
            
        }
        

        if($flag==count($STUDENT_ID))
        {
         $sdata['msg'] = "Promote Successful";
         $this->session->set_userdata($sdata);
         redirect(base_url() . "admin/student/student_for_promote", "refresh");
        }
        else
        {
         $sdata['msg'] = "Promote Not Successful";
         $this->session->set_userdata($sdata);
         redirect(base_url() . "admin/student/student_for_promote", "refresh");
        }

        ///start







        ///end


    }

    public function four_subject_assign()
    {
        $data = array();
        $data['active'] = "add_four_subject";
        $data['title'] = "Add Four Subject";
        $this->load->helper("form");


        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("version", "Name", "required");

        if ($this->form_validation->run() == NULL) {
            $data = array();
            $data['active'] = "add_four_subject";
            $data['title'] = "Add Four Subject";
            $this->load->helper("form");
            $data['allPdt1'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");
            $data['allPdt2'] = $this->common_model->view_data("CLASSES", "", "ID", "ASC");
            $data['allPdt3'] = $this->common_model->view_data("SECTIONS", "", "ID", "ASC");
            $data['allPdt4'] = $this->common_model->view_data("SESSIONS", "", "ID", "ASC");
            $data['allStd']= $this->student_model->get_students("STUDENTS", "","ID","DESC");
        
            $data['allStd_foursub']= $this->student_model->get_students_foursub_info("FOUR_SUBJECT");
            
            // print_r($data['allStd_foursub']);
            //  exit();

            $data['content'] = $this->load->view("admin/four_subject", $data, TRUE);
            $this->load->view("admin/master", $data);
        } else {
        

            $CLASS_ID = $this->input->post("class");
            $SECTION_ID = $this->input->post("section");
            $SESSION_ID = $this->input->post("session");
            $STUDENT_ID = $this->input->post("student_id");
            
            $data['allPdt1'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");
            $data['allPdt2'] = $this->common_model->view_data("CLASSES", "", "ID", "ASC");
            $data['allPdt3'] = $this->common_model->view_data("SECTIONS", "", "ID", "ASC");
            $data['allPdt4'] = $this->common_model->view_data("SESSIONS", "", "ID", "ASC");
            $data['allStd']= $this->student_model->get_students("STUDENTS", "","ID","DESC");
            $data['allSub']= $this->common_model->view_data("SUBJECTS", "","ID","DESC");
        
            $data['student']= $this->student_model->get_students_from_enroll($CLASS_ID,$SECTION_ID,$SESSION_ID,$STUDENT_ID);
        // print_r($data['student']);
        // exit();
            $data['content'] = $this->load->view("admin/four_subject", $data, TRUE);
            $this->load->view("admin/master", $data);
        }
    }

    public function add_four_subject()
    {
            $CLASS_ID = $this->input->post("class_id");
            $SECTION_ID = $this->input->post("section_id");
            $SESSION_ID = $this->input->post("session_id");
            $STUDENT_ID = $this->input->post("student_id");
            $SUBJECT_ID = $this->input->post("subject_id");

           $data=array( 
           "STUDENT_ID"=>$STUDENT_ID,
           "SUBJECT_ID"=>$SUBJECT_ID,
           "CLASS_ID"=>$CLASS_ID,
           "SECTION_ID"=>$SECTION_ID,
           "SESSION_ID"=>$SESSION_ID
           );

           $where=array( 
            "STUDENT_ID"=>$STUDENT_ID,
           // "SUBJECT_ID"=>$SUBJECT_ID,
            "CLASS_ID"=>$CLASS_ID,
            "SECTION_ID"=>$SECTION_ID,
            "SESSION_ID"=>$SESSION_ID
            );
if(!$this->common_model->check_unique("FOUR_SUBJECT",$where))
{
   if( $this->common_model->save_data("FOUR_SUBJECT", $data))
   {
    $sdata['msg'] = "Successfully Assign Four Subject";
   }
  
}
else
{
 $sdata['msg'] = "Unable To Assign Four Subject";
}
           
           $this->session->set_userdata($sdata);
           redirect(base_url() . "admin/student/four_subject_assign", "refresh");
 }

 public function delete_four_subject()
 {

    $delete_id = $this->uri->segment('5');
    $wh=array("ID"=>  $delete_id );
    $r= $this->common_model->view_data2("FOUR_SUBJECT",$wh,"","");
    $wh2 = array(
          "STUDENT_ID" => $r->STUDENT_ID,
          "SUBJECT_ID"=>$r->SUBJECT_ID,
           "CLASS_ID" => $r->CLASS_ID,
           "SECTION_ID" =>$r->SECTION_ID ,
           "SESSIONS_ID" => $r->SESSION_ID,
          // "FOURTH_SUB" => $r->SUBJECT_ID,
         );
        //  $R=$this->common_model->check_unique("MARKS",$wh2);
        //  print_r($R);
        //  exit();
         if($this->common_model->check_unique("MARKS",$wh2))    
         {
            $sdata['msg'] = "Not Successfully Data Delete !!";
            
         } 
         else {
            if ($this->common_model->delete("FOUR_SUBJECT", $delete_id)) {

                $sdata['msg'] = "Delete Successful";
            } 
           
            $this->session->set_userdata($sdata);
            redirect(base_url() . "admin/student/four_subject_assign", "refresh");
            
        }
        
        $this->session->set_userdata($sdata);
        redirect(base_url() . "admin/student/four_subject_assign", "refresh");
   
 }

}
