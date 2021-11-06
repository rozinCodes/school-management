<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Result_report extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    date_default_timezone_set("Asia/Dhaka");
    $language = $this->session->userdata('language');
    $this->lang->load('auth', $language);
    // $mytype = $this->session->userdata("mytype");
  }

  public function index()
  {
    $data = array();
    $data['active'] = "Results";
    $data['title'] = "Results";
    $this->load->helper("form");
    $data['allPdtcls'] = $this->common_model->view_data("CLASSES", "", "ID", "ASC");
    $data['allPdtsec'] = $this->common_model->view_data("SECTIONS", "", "ID", "ASC");
    $data['allPdtexam'] = $this->common_model->view_data("EXAMS", "", "ID", "ASC");
    $data['allPdtsession'] = $this->common_model->view_data("SESSIONS", "", "ID", "ASC");
    $data['allPdt4'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");

    $data['content'] = $this->load->view("admin/exams/result_report", $data, TRUE);
    $this->load->view("admin/master", $data);
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

  public function result()
  {

    $data = array();
    $data['active'] = "Results";
    $data['title'] = "Results";

    $this->load->helper("form");
    $data['allPdtcls'] = $this->common_model->view_data("CLASSES", "", "ID", "ASC");
    $data['allPdtsec'] = $this->common_model->view_data("SECTIONS", "", "ID", "ASC");
    $data['allPdtexam'] = $this->common_model->view_data("EXAMS", "", "ID", "ASC");
    $data['allPdtsession'] = $this->common_model->view_data("SESSIONS", "", "ID", "ASC");
    $data['allPdt4'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");

    $class_id = $this->input->post("class");
    $section_id = $this->input->post("section");
    $exam_id = $this->input->post("exam");
    $session_id = $this->input->post("session");

    // $where=array(
    //   "MARKS.CLASS_ID"=>$class_id,
    //   "MARKS.SECTION_ID"=>$section_id,
    //   "MARKS.EXAM_ID"=>$exam_id,
    //   "MARKS.SESSION_ID"=>$session_id
    // );
    $pass_mark = $this->student_model->pass_mark("MARKS_GRADE")->PASS_MARK + 1;


    $allPdtfail = $this->academics_model->view_fali_std_list($class_id, $session_id, $section_id, $exam_id, $pass_mark);

    // echo"<pre>";
    // print_r($allPdtfail);
    // exit();

    $allPdt = $this->academics_model->view_result($class_id, $session_id, $section_id, $exam_id);

  //  print_r(count($allPdt));
    
    $data['allPdt'] = $allPdt;


    if ($data['allPdt']) {

      foreach ($allPdt as $value) {
        if ($value->MARKS == null) {
          $items[] = "NOT INSERTED";
        }
         else{
          if ($this->failCheck($allPdtfail, $value->STUDENT_ID)) {
            $items[] = "FAIL";
          } else {
            $items[] = "PASS";
          }
         }



        
      }

      $data['dsf'] = $items;

      // echo "<pre>";
      // print_r($data['dsf']);
      // exit();



      $data['content'] = $this->load->view("admin/exams/result_report", $data, TRUE);
      $this->load->view("admin/master", $data);
    } else {

      $sdata['msg'] = "No Data Found";
      $this->session->set_userdata($sdata);
      redirect(base_url() . "admin/exams/Result_report", "refresh");
    }
  }

  public function result_details()
  {


    $data = array();
    $data['active'] = "Marks details";
    $data['title'] = "Marks Details";
    $this->load->helper("form");


    $view_id = ($this->uri->segment('6') - 999.234 / 2) / 1234.4354;

    $exm_id = ($this->uri->segment('7') - 999.234 / 2) / 1234.4354;
    
    $data['first_name'] = ($this->uri->segment('8'));

    $session_id=$this->uri->segment('9');


    // echo $view_id;
    // echo "///";
    // echo $exm_id;
    // exit();
    $data['count_exam'] = $this->common_model->view_data("EXAMS", "", "", "");
    $data['allPdt4'] = $this->student_model->marks_grads_max_min("MARKS_GRADE");
    $data['pass_mark'] = $this->student_model->pass_mark("MARKS_GRADE");
    $data['allPdt2'] = $this->academics_model->get_result_details_by_id("MARKS", $view_id, $exm_id,$session_id);
    $data['allPdt'] = $this->academics_model->enroll_student($view_id);
    // echo"<pre>";
    // print_r($data['allPdt2']);
    // exit();

    $data['content'] = $this->load->view("admin/exams/result_details", $data, TRUE);
    //$data['content'] = $this->load->view("admin/certificates/mark_sheet", $data, true);
    $this->load->view("admin/master", $data);
  }
  public function marksheetGenerate()
  {


    $data = array();
    $data['active'] = "Marks details";
    $data['title'] = "Marks Details";
    $this->load->helper("form");


    $view_id = ($this->uri->segment('6') - 999.234 / 2) / 1234.4354;

    $exm_id = ($this->uri->segment('7') - 999.234 / 2) / 1234.4354;
    
    $data['first_name'] = ($this->uri->segment('8'));

    $session_id=$this->uri->segment('9');


    // echo $view_id;
    // echo "///";
    // echo $exm_id;
    // exit();
    $data['count_exam'] = $this->common_model->view_data("EXAMS", "", "", "");
    $data['allPdt4'] = $this->student_model->marks_grads_max_min("MARKS_GRADE");
    $data['pass_mark'] = $this->student_model->pass_mark("MARKS_GRADE");
    $data['allPdt2'] = $this->academics_model->get_result_details_by_id("MARKS", $view_id, $exm_id,$session_id);
    $data['allPdt'] = $this->academics_model->enroll_student($view_id);
    // echo"<pre>";
    // print_r($data['allPdt2']);
    // exit();

    //$data['content'] = $this->load->view("admin/exams/result_details", $data, TRUE);
    $data['content'] = $this->load->view("admin/certificates/mark_sheet", $data, true);
    $this->load->view("admin/master", $data);
  }
}
