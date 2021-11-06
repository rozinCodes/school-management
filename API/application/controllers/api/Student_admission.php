<?php

require APPPATH.'libraries/REST_Controller.php';

class Student_admission extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        //load database
        $this->load->database();
        $this->load->model(array("api/student_model"));
        $this->load->model(array("api/common_model"));
        $this->load->library(array("form_validation"));
        $this->load->helper("security");
    }

    public function admission_post(){

    $admission_no = $this->security->xss_clean($this->input->post("admission_no"));
    $f_name = $this->security->xss_clean($this->input->post("f_name"));
   

    // form validation for inputs
    $this->form_validation->set_rules("admission_no", "admssion", "required");
   
    

    // checking form submittion have any error or not
    if($this->form_validation->run() === FALSE){

      // we have some errors
      $this->response(array(
        "status" => 0,
        "message" => "All fields are needed or filled form is not valid"
      ) , REST_Controller::HTTP_NOT_FOUND);
    }else{

      if(!empty($admission_no) && !empty($f_name)){
        // all values are available
        $student = array(
          "ADMISSION_NO" => $admission_no,
          "F_NAME" => $f_name,
          
        );

        if($this->common_model->save_data("STUDENTS",$student)){

          $this->response(array(
            "status" => 1,
            "message" => "Student has been created"
          ), REST_Controller::HTTP_OK);
        }else{

          $this->response(array(
            "status" => 0,
            "message" => "Failed to create student"
          ), REST_Controller::HTTP_OK);
        }
      }else{
        // we have some empty field
        $this->response(array(
          "status" => 0,
          "message" => "All fields are needed"
        ), REST_Controller::HTTP_OK);
      }
    }

    }


}