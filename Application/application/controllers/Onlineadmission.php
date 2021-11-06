<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Onlineadmission extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");
        $language = $this->session->userdata('language');
        $this->lang->load('auth', $language);
        // $mytype = $this->session->userdata("mytype");
    }

    public function index() {

        $data = array();
        $data['active'] = "wis";
        $data['title'] = "Walton Intelligent School";
        $this->load->helper("form");
        $data['allPdt2'] = $this->common_model->view_data("CLASSES", "", "CLASSES", "ASC");
        $data['allPdt1'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");

        $this->load->view("front/online_admission_new", $data);
    }
    
        public function insert() {

        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("fname", "Group Name", "required");

        if ($this->form_validation->run() == NULL) {
            $data = array();
            $data['active'] = "wis";
            $data['title'] = "Walton Intelligent School";
            $this->load->helper("form");
            $data['allPdt2'] = $this->common_model->view_data("CLASSES", "", "CLASSES", "ASC");
            $data['allPdt1'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");
    
            $this->load->view("front/online_admission_new", $data);
        } else {


               //---start image upload 
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


            $data = array(
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
                "FATHER_PHOTO" =>$dataInfo[1]['file_name'],
                "MOTHER_NAME" => $this->input->post("mother_name"),
                "MOTHER_PHONE" => $this->input->post("mother_phone"),
                "MOTHER_OCCUPATION" => $this->input->post("mother_occupation"),
                "MOTHER_PHOTO" =>  $dataInfo[2]['file_name'],
                "GUARDIAN_NAME" => $this->input->post("guardian_name"),
                "GUARDIAN_PHONE" => $this->input->post("guardian_phone"),
                "GUARDIAN_OCCUPATION" => $this->input->post("guardian_occupation"),
                "GUARDIAN_PHOTO" => $dataInfo[3]['file_name'],
                "GUARDIAN_PRESENT_ADDRESS" => $this->input->post("guardian_present_address"),
                "GUARDIAN_PERMANENT_ADDRESS" => $this->input->post("guardian_permanent_address"),
                "EMERGENCY_CONTACT" => $this->input->post("emergency_contact"),
                "ADMISSION_STATUS" => "No",
                "ADMISSION_TYPE" => "Online",
                "SECTION" => 41,
                "CLASS" => $this->input->post("class")
            );

           // print_r( $data);
           // exit();
            if ($this->common_model->save_data("ONLINE_ADMISSION", $data)) {

                $data['sId'] = $this->student_model->insert_id();
                /* print_r($data['sId']);
                  exit();
                 */
                $id = $data['sId'];




                $sdata['msg'] = "Save Successful and your Serial no is :" . $id->ID;

                //$sdata['msg'] = $data['sId'];
            } else {
                $sdata['msg'] = "Not Successfully Data Insert !!";
            }
            $this->session->set_userdata($sdata);
            redirect(base_url(), "refresh");
        }
    }
}