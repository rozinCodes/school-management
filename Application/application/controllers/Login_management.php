<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_management extends CI_Controller {

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
        $data['title'] = $this->lang->line('login_title');
        $this->load->helper("form");
        //   $data['content'] = $this->load->view("admin/category-new", $data, TRUE);
        $this->load->view("user/login", $data);
    }

    public function insert() {
        
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("username", "Username", "required");
		 $this->form_validation->set_rules("password", "Password", "required");

        if ($this->form_validation->run() == NULL) {
            $data = array();
            $data['active'] = "Login";
            $data['title'] = $this->lang->line('login_title');
            $this->load->helper("form");
            //   $data['content'] = $this->load->view("admin/category-new", $data, TRUE);
            $this->load->view("user/login", $data);
        } else {

            $username = $this->security->xss_clean($this->input->post("username"));
            $password = $this->security->xss_clean($this->input->post("password"));
            $general_info= $this->staff_model->get_general_setting("GENERAL_SETTINGS");
            $user = $this->common_model->login($username, $password);
            $guardian = $this->common_model->guardian_login($username, $password);
            // print_r($guardian );
            // exit();
           
            if ($user && $general_info) {
   
                if($this->input->post("remember")){
                    setcookie('username',$username,time()+60*60*7);
                     setcookie('password',$password,time()+60*60*7);
                }

                $userdata = array(
                    "id" => $user->ID,
                    "admission_no" => $user->ADMISSION_NO,
                    "fname" => $user->F_NAME,
                    "lame" => $user->L_NAME,
                    "photo" => $user->STUDENT_IMAGE,
                    "version" => $user->VERSION,
                    "school_name"=>$general_info->SCHOOL_NAME,
                    "logo"=>$general_info->SCHOOL_LOGO,
                      "roles" => $user->ROLES_ID,
                    "authenticated" => TRUE
                );
                //last login update
                //
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
                // if ($this->common_model->update("users", $data, array("id" => $user->id))) {
                $admission_date = date("d-m-Y H:i:s");
                $date2 = $this->oracle_date_by_user($admission_date);
                //sma_user_logins
                $data = array(
                    "IP_ADDRESS" => $_SERVER['REMOTE_ADDR'],
                    "USERNAME " => $user->F_NAME,
                     'DEVICE_NAME' => $platform,
                        'BROWSER' => $agent,
                    "LOGIN_TIME" => $date2,
                    "STAFF_ID" => $user->ID,
                    "ROLES" => $user->ROLES_ID,
                );
                $this->common_model->save_data("USER_LOGINS", $data);
                //  }
                $this->session->set_userdata($userdata);
                redirect("dashboard");
            }else if($guardian){

                    $userdata = array(
                        "id" => $guardian->ID,
                        "admission_no" => $guardian->ADMISSION_NO,
                        "student_id"=>$guardian->STUDENT_ID,
                        "roles" => $guardian->ROLES_ID,
                        "phone_no" => $guardian->PHONE_NO,
                        "authenticated" => TRUE
                    );
                    // print_r($userdata);
                    // exit();
                    $this->session->set_userdata($userdata);
                    redirect("dashboard");
                
            } else {
                $error = "Failed ";

                $this->session->set_userdata('error',$error);
               
                $this->session->userdata($error);
                
          
                
               // redirect("login");
                redirect(base_url() . "login");
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect("");
    }

}
