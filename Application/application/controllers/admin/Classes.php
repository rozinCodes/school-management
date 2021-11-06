<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Classes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");
        $language = $this->session->userdata('language');
        $this->lang->load('auth', $language);
        // $mytype = $this->session->userdata("mytype");
    }

    public function index() {
        $data = array();
        $data['active'] = "classes";
        $data['title'] = "classes";
        $this->load->helper("form");
		$sequence=1;
		$data['allCdt'] = $this->common_model->insert_id();
		
        $data['allPdt'] = $this->common_model->view_data("SECTIONS", "", "NAME", "ASC");
        $data['allSdt'] = $this->common_model->Class_Sections();
        $data['allPdt2'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");
        $data['content'] = $this->load->view("classes/classes-new", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function insert() {
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("name", "Name", "required");

        if ($this->form_validation->run() == NULL) {
            $data = array();
            $data['active'] = "classes";
            $data['title'] = "classes";
            $this->load->helper("form");
            $data['allPdt'] = $this->common_model->view_data("SECTIONS", "", "NAME", "ASC");
            $data['allSdt'] = $this->common_model->Class_Sections();
            $data['allPdt2'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");
            $data['content'] = $this->load->view("classes/classes-new", $data, TRUE);
            $this->load->view("admin/master", $data);
        } else {
				$date=date("Y-m-d");
            $data = array(
                "CLASSES" => $this->input->post("name"),
                "VERSIONSID" => $this->input->post("version"),
                "ACTIVE" => 1,
				"CREATED_AT"=>$this->oracle_onlydate($date)
            );
            
            if ($this->common_model->save_data("CLASSES", $data)) {
				$class_id=$this->common_model->insert_id();
								foreach ($class_id as $row)
					{
							$class_ids= $row->ID;
					}
			//	echo $class_id['ID'];
				
             
              $sections = $this->input->post('sections');
				

                for ($i = 0; $i < count($sections); $i++) {
                    $selData = $this->common_model->view_data("SECTIONS", array("ID" => $sections[$i]), "ID", "asc");
                    foreach ($selData as $data) {

                        $section_id = $data->ID;
                    }
                    $sections_array = array(
                        "CLASS_ID" => $class_ids,
                        "SECTION_ID" => $section_id,
                        "ACTIVE" => 1
                    );
                    $this->common_model->save_data('CLASS_SECTIONS', $sections_array);
                }


                $sdata['msg'] = "Save Successful";
            } else {
                $sdata['msg'] = "Not Successfully Data Insert !!";
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "admin/classes", "refresh");
        }
    }

    public function delete($id) {
        $dt = $this->common_model->view_data("CLASS_SECTIONS", array("CLASS_ID" => $id), "ID", "ASC");
        if ($dt) {
            $this->common_model->delete_data("CLASS_SECTIONS", array("CLASS_ID" => $id));
                      $this->common_model->delete_data("CLASSES", array("ID" => $id));
            $sdata['msg'] = "Delete Successfull";
        } else {
            $sdata['msg'] = "Delete Err";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "admin/classes", "refresh");
    }

}
