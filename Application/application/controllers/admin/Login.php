<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");
        $language = $this->session->userdata('language');
        $this->lang->load('auth', $language);
        // $mytype = $this->session->userdata("mytype");
    }

    public function index() {
        $data = array();
        $data['active'] = "Login";
        $data['title'] = "Login";
        $this->load->helper("form");
        //   $data['content'] = $this->load->view("admin/category-new", $data, TRUE);
        $this->load->view("admin/login", $data);
    }

    public function insert() {
        
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("email", "Email", "required");
  $this->form_validation->set_rules("password", "password", "required");
        if ($this->form_validation->run() == NULL) {
            $data = array();
            $data['active'] = "Login";
            $data['title'] = "Login";
            $this->load->helper("form");
            //   $data['content'] = $this->load->view("admin/category-new", $data, TRUE);
              $this->load->view("admin/login", $data);
        } else {

            $email = $this->security->xss_clean($this->input->post("email"));
            $password = $this->security->xss_clean($this->input->post("password"));



            $user = $this->common_model->admin_login($email, $password);
            if ($user) {
                
                if($this->input->post("remember")){
                    setcookie('email',$email,time()+60*60*7);
                     setcookie('password',$password,time()+60*60*7);
                }
                $userdata = array(
                    "id" => $user->ID,
                    "email" => $user->EMAIL,
                    "fname" => $user->FIRST_NAME,
                    "lame" => $user->Last_NAME,
                    "photo" => $user->PHOTO,
                    "staff_id" => $user->STAFF_ID,
                    //"surname" => $user->surname,
                    "roles" => $user->ROLES_ID,
                    "authenticated" => TRUE
                );




                //last login update
                $selPdt = $this->common_model->view_data("STAFF", array("ID" => $user->ID), "ID", "desc");
                $data = array(
                    "LAST_LOGIN" => time()
                );
                if ($this->common_model->update("STAFF", $data, array("ID" => $user->ID))) {

                    //device info

                    $ip = $this->input->ip_address();

                    if ($this->agent->is_browser()) {
                        $agent = $this->agent->browser() . ' ' . $this->agent->version();
                    } elseif ($this->agent->is_robot()) {
                        $agent = $this->agent->robot();
                    } elseif ($this->agent->is_mobile()) {

                        $agent = $this->agent->mobile();
                    } else {
                        $agent = 'Unidentified User Agent';
                    }

                    $platform = $this->agent->platform(); // Platform info (Windows, Linux, Mac, etc.)
                    //sma_user_logins
                    $admission_date = date("d-m-Y H:i:s");
                    $date2 = $this->oracle_date_by_user($admission_date);
                    $data = array(
                        "IP_ADDRESS" => $_SERVER['REMOTE_ADDR'],
                         "USERNAME " => $user->FIRST_NAME,
                        'DEVICE_NAME' => $platform,
                        'BROWSER' => $agent,
                        "LOGIN_TIME" => $date2,
                        "STAFF_ID" => $user->ID,
                        "ROLES" => $user->ROLES_ID,
                    );
                    $this->common_model->save_data("USER_LOGINS", $data);
                }



                $this->session->set_userdata($userdata);
                redirect("dashboard");
            } else {

                $error = "Failed";
                $this->session->set_userdata('error',$error);              
                $this->session->userdata($error);
                redirect(base_url() . "admin/login", "refresh");
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect("");
    }

}
