<?php

require APPPATH.'libraries/REST_Controller.php';

class Login extends REST_Controller
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
  

    public function admin_login_post(){

        $this->form_validation->set_rules("email", "Email", "required");

        if ($this->form_validation->run() == NULL) {
            // we have some errors
            $this->response(array(
                "status" => 0,
                "message" => "All fields are needed or filled form is not valid"
            ) , REST_Controller::HTTP_OK);
        } else {

            $email = $this->security->xss_clean($this->input->post("email"));
            $password = $this->security->xss_clean($this->input->post("password"));

            $user = $this->common_model->admin_login($email, $password);
            if ($user) {
                $userdata = array(
                    "id" => $user->ID,
                    "email" => $user->EMAIL,
                    "first_name" => $user->FIRST_NAME,
                    "photo" => $user->PHOTO,        
                    //"surname" => $user->surname,
                    "roles" => $user->ROLES_ID,
                    "authenticated" => TRUE
                );

                $this->response(array(
                    "status" => 1,
                    "message" => "Login Success"
                  ), REST_Controller::HTTP_OK);
            } else {
                // we have some empty field
        $this->response(array(
            "status" => 0,
            "message" => "Login credential does not match"
          ), REST_Controller::HTTP_OK);
            }
        }
    }
}