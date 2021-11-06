<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Groups_management extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");
      $language = $this->session->userdata('language');
        $this->lang->load('auth', $language);
       if(! $this->session->userdata('authenticated')){
            redirect("login");
        }
    }


    public function index() {
        $data = array();
        $data['active'] = "groups";
        $data['title'] = "groups";
        $this->load->helper("form");
        $data['content'] = $this->load->view("admin/groups_new", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function insert() {
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("name", "Group Name", "required");

        if ($this->form_validation->run() == NULL) {
            $data = array();
            $data['active'] = "groups";
            $data['title'] = "groups";
            $this->load->helper("form");
            $data['content'] = $this->load->view("admin/groups_new", $data, TRUE);
            $this->load->view("admin/master", $data);
        } else {

            $data = array(
                "name" => $this->input->post("name"),
                "description" => $this->input->post("description")
            );
            if ($this->common_model->save_data("groups", $data)) {

                $sdata['msg'] = "Save Successful";
            } else {
                $sdata['msg'] = "Not Successfully Data Insert !!";
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "groups-management", "refresh");
        }
    }

}
