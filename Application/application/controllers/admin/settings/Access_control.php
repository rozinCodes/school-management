<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Access_control extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    date_default_timezone_set("Asia/Dhaka");
    $language = $this->session->userdata('language');
    $this->lang->load('auth', $language);
    // $mytype = $this->session->userdata("mytype");
  }




  public function create_access()
  {

    $this->load->helper("form");
    $this->load->library("form_validation");
    $this->form_validation->set_rules("staff_name", "Group Name", "required");

    if ($this->form_validation->run() == NULL) {

      $data = array();

      $data['active'] = "groups";

      $data['title'] = "groups";

      $this->load->helper("form");
      $data['allPdtstaff'] = $this->common_model->view_data("STAFF", "", "ID", "DESC");
      $data['allPdtmanu'] = $this->common_model->view_data("MENU", "", "ID", "DESC");

      $data['allPdt'] = $this->access_control_model->view_access_control("MENU_PERMISSIONS");


      $data['content'] = $this->load->view("admin/settings/access_control", $data, TRUE);

      $this->load->view("admin/master", $data);
    } else {
      $staff_id = $this->input->post("staff_name");

      $staff = explode(".", $staff_id);


      $data = array(

        "STAFF_ID" => $staff[0],
        "ROLES_ID" => $staff[1],
        "PERMISSION_STATUS" => 1,
        "MENU_ID" => $this->input->post("menu")
      );

      if ($this->common_model->save_data("MENU_PERMISSIONS", $data)) {


        $sdata['msg'] = "Save Successful";
      } else {
        $sdata['msg'] = "Not Successfully Data Insert !!";
      }
      $this->session->set_userdata($sdata);
      redirect(base_url() . "admin/settings/access_control/create_access", "refresh");
    }
  }

  public function edit_create_access()
  {
    $permission_status = $this->uri->segment('7');
    if( $permission_status==1)
    {
      $data = array(

        "PERMISSION_STATUS" =>0,
  
      );
    }
    if( $permission_status==0)
    {
      $data = array(

        "PERMISSION_STATUS" =>1,
  
      );
    }

   
    $edit_id = $this->uri->segment('6');

    $this->common_model->edit("MENU_PERMISSIONS", $data, $edit_id);

    redirect(base_url() . "admin/settings/access_control/create_access", "refresh");
  }
}
