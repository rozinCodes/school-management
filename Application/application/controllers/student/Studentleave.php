<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Studentleave extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");
        $language = $this->session->userdata('language');
        $this->lang->load('auth', $language);
        // $mytype = $this->session->userdata("mytype");
    }

    public function index(){
        $data = array();
        $data['active'] = "student_leave";
        $data['title'] = "student_leave";
        $this->load->helper("form");
        $data['allPdt3']= $this->common_model->view_data("STUDENT_LEAVE", "","ID","DESC");
        $data['allTeacher']= $this->staff_model->get_teacher("STAFF", "","ID","DESC");
        
        // print_r($data['allTeacher']);
        // exit();
        $data['content'] = $this->load->view("student/student_leave", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function apply_leave() {

        $data = array();
        $data['active'] = "student_leave";
        $data['title'] = "Apply Leave";
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("teacher_id", "apply_leave", "required");

        if ($this->form_validation->run() == null) {
            $data = array();
            $data['active'] = "student_leae";
            $data['title'] = "Student Leave";
            $this->load->helper("form");
            $data['content'] = $this->load->view("student/student_leave", $data, true);
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


                $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|txt|csv|docx';  //supported image
                $config['upload_path'] = "./uploads/upload_content/files/";
                $config['encrypt_name'] = true;
                $this->load->library('upload', $config);

                //$this->upload->do_upload("pic");
                // $this->upload->initialize($this->set_upload_options());

                $this->upload->do_upload("pic");
                $dataInfo[] = $this->upload->data();
            }


            /* Current Sesssion Roles and ID start */

        
            $student_id= $this->session->userdata('id');
            $student_admission_no=$this->session->userdata('admission_no');
       
            /* Current Sesssion Roles and ID End */
            $teacher_id= $this->input->post("teacher_id");
            $from_date = $this->input->post("from_date");
            $to_date = $this->input->post("to_date");
            $applied_date = $this->input->post("apply_date");
            $remarks = $this->input->post("reason");
            $documents = $this->input->post("documents");


            $from_date_orcle = $this->oracle_only_date_by_user($from_date);
            $to_date_orcle = $this->oracle_only_date_by_user($to_date);
            $applied_date_orcl = $this->oracle_only_date_by_user($applied_date);

            $total_leave_days = $this->staff_model->diffrence_two_date_days($to_date_orcle, $from_date_orcle);

            $leave_request = array(
                "STUDENT_ID"=>$student_id,
                "TEACHER_ID" => $teacher_id,
                "FROM_DATE" => $from_date_orcle,
                "TO_DATE" => $to_date_orcle,
                "LEAVE_DAYS" => $total_leave_days + 1,
                "APPLIED_DATE" => $applied_date_orcl,
                "REASON" => $remarks,
                "DOCUMENTS_FILE" => $dataInfo[0]['file_name'],
                "ADMISSION_NO"=>$student_admission_no,
                "STATUS" => "pending",
            );

            if ($this->common_model->save_data("STUDENT_LEAVE", $leave_request)) {

                $sdata['msg'] = "Request Successful";
            } else {
                $sdata['msg'] = "Not  Successfully Saved";
            }

          
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "student/studentleave", "refresh");
    }

    public function approve_leave(){
        $data = array();
        $data['active'] = "student_leave";
        $data['title'] = "Student Leave";
        $this->load->helper("form");

        $staff_id = $this->session->userdata('staff_id');

        $array2 = array(
            "STUDENT_LEAVE.STATUS"=>"pending",
            "TEACHER_ID"=>$staff_id
        );
        $today_date=date("Y/m/d");
        $today = $this->oracle_only_date_by_user($today_date);
        // print_r($today);
        // exit();
       
        $data['allPdt3'] = $this->staff_model->need_approval_student_leave("STUDENT_LEAVE", $array2,"ID",$today);
       



        $data['content'] = $this->load->view("student/approve_leave", $data, TRUE);
        $this->load->view("admin/master", $data);
      
    }

    public function approved_student_leave_request_submit() {
        $data = array();
        $data['active'] = "student_leave";
        $data['title'] = "Student Leave";
        $this->load->helper("form");


        $array = array(
            "STATUS" => $this->input->post("status"),
        );


        // $s = $this->input->post("status");
        // print_r($s);
        // exit();
    
        $days = $this->input->post("days");

        // $array2 = array(
        //     "LEAVE_TYPE_ID" => $this->input->post("leave_type_id"),
        //     "STAFF_ID" => $this->input->post("staff_id"),
        // );


        $l_from=$this->input->post("leave_from");
        $l_to=$this->input->post("leave_to");
        $staff_id=$this->input->post("staff_id");
        $student_admission_no=$this->input->post("admission_no");

        $lve_from =$this->oracle_onlydate($l_from);
        $lve_to = $this->oracle_onlydate($l_to);

        $leave_from="'".$lve_from."'";
        $leave_to= "'".$lve_to."'";

   
        

        if ($this->common_model->update_student_leave_status("STUDENT_LEAVE", $array, $student_admission_no)) {
        

        // if($this->common_model->update_student_attendance){}

        


        if ((($this->input->post("status") == 'approved'))) {

            if($this->student_model->check_exists_attendance("STUDENT_ATTENDENCE", $leave_from, $leave_to, $student_admission_no)){

                if ($this->common_model->update_student_attendance("STUDENT_ATTENDENCE", $leave_from, $leave_to, $student_admission_no)) {
                    $sdata['msg'] = "Change  Successful";
                } else {
                    // Rollback transaction
                  
                    $sdata['msg'] = "Not Successfully  !!";
                }
            }
            
        }
    }


     
        $this->session->set_userdata($sdata);
        redirect(base_url() . "student/studentleave/approve_leave", "refresh");
    }
}