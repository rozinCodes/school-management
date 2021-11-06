<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Result extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");
      $language = $this->session->userdata('language');
        $this->lang->load('auth', $language);
        // $mytype = $this->session->userdata("mytype");
    }


    public function index(){

     $data = array();
        $data['active'] = "groups";
        $data['title'] = "groups";
        $this->load->helper("form");
        $data['allPdtcls']= $this->common_model->view_data("CLASSES", "","ID","DESC");
        $data['allPdtsec']= $this->common_model->view_data("SECTIONS", "","ID","DESC");
        $data['allPdtsession']= $this->common_model->view_data("SESSIONS", "","ID","DESC");
       /* $where=array(
          "CLASS_ID"=>$this->input->post("class"),
          "SECTION_ID"=>$this->input->post("class"),
          "SESSION_ID"=>$this->input->post("class"),
          "ACTIVE"=>1,
        );*/

        //$data['allPdt2']=$this->student_model->Get_student_class_list("ENROLL",$where,"ID","DESC");



        //$data['allPdt']= $this->common_model->view_data("SUBJECTS", "","ID","DESC");
        //$data['allPdt2']= $this->common_model->view_data("STUDENTS", "","ID","DESC");
          /*print_r( $data['allPdt']);
           print_r( $data['allPdt2']);
           exit();*/

        $data['content'] = $this->load->view("admin/exams/create_result", $data, TRUE);
        $this->load->view("admin/master", $data);

  }
  public function get_student_for_result()
  {
    $data = array();
        $data['active'] = "groups";
        $data['title'] = "groups";
        $this->load->helper("form");
        $data['allPdtcls']= $this->common_model->view_data("CLASSES", "","ID","DESC");
        $data['allPdtsec']= $this->common_model->view_data("SECTIONS", "","ID","DESC");
        $data['allPdtsession']= $this->common_model->view_data("SESSIONS", "","ID","DESC");
        $data['allPdtexam']= $this->common_model->view_data("EXAMS", "","ID","DESC");

        $where=array(
          "CLASS_ID"=>$this->input->post("class"),
          "SECTION_ID"=>$this->input->post("section"),
          "SESSION_ID"=>$this->input->post("session"),
          "STATUS"=>1,
        );
        $where2=array(
           "CLASSESID"=>$this->input->post("class"),
        );
        $where3=array(
           "MARKS.CLASS_ID"=>$this->input->post("class"),
           "MARKS.SUBJECT_ID"=>101
           /*"MARKS.STUDENT_ID"=>101*/
        );

        
        $data['allPdt2']=$this->student_model->Get_student_class_list("ENROLL",$where,"ID","DESC");
       $data['allPdt']= $this->subject_model->get_subjects_classwise("SUBJECTS",$where2,"ID","DESC");
        //$data['allPdt']= $this->common_model->view_data("SUBJECTS","","ID","DESC");
        /*if($this->subject_model->check_marks("MARKS","","ID","DESC"))
        {
          
          $data['allPdt']= $this->subject_model->get_subjects_classwise_with_marks("MARKS",$where3,"ID","DESC");
          print_r($data['allPdt']);
          $ll=sizeof($data['allPdt']);
          echo $ll;
          exit();

        }
        else
        {
          
          $data['allPdt']= $this->subject_model->get_subjects_classwise("SUBJECTS",$where2,"ID","DESC");
        }*/
        
        $data['content'] = $this->load->view("admin/exams/create_result", $data, TRUE);
        $this->load->view("admin/master", $data);

  }

  

  public function create_result()
  {
    $flag=0;
    //$data['allPdt2']=$this->student_model->Get_student_class_list("ENROLL",$where,"ID","DESC");
    $students=array();
    $marks=array();
    $subjects=array();
    $stdt_admission_no=array();
    $class_id=array();
    $session_id=array();
    $sub_id=array();
    $sub_id= $this->input->post("sub_id");
    $session_id= $this->input->post("session_id");
    $class_id= $this->input->post("class_id");
    $stdt_admission_no= $this->input->post("stdt_admission_no");
    $students= $this->input->post("stdtid");
    $marks= $this->input->post("mark");
    $subjects= $this->input->post("subcode");
    /*print_r($students);
    print_r($marks);
    print_r($subjects);*/
    $l= count($students);

    /**/
    if(!$this->subject_model->check_marks("MARKS","","ID","DESC"))
    {
    for ($x = 0; $x <= $l-1; $x++)
    {
      $flag=0;
      $data=array(
        "STUDENT_ID"=>$students[$x],
        "SUBJECT_CODE"=>$subjects[$x],
        "MARK"=>$marks[$x],
        "ADMISSION_NO"=>$stdt_admission_no[$x],
        "CLASS_ID"=>$class_id[$x],
        "SESSIONS_ID"=>$session_id[$x],
        "SUBJECT_ID"=>$sub_id[$x],



      );



      if($this->common_model->save_data("MARKS", $data))
      {
        $flag=1;

      }

      echo($x);
    }
    }
    else
    {
      for ($x = 0; $x <= $l-1; $x++)
      {
        $where=array(
        "STUDENT_ID"=>$students[$x],
        "SUBJECT_CODE"=>$subjects[$x],
        "ADMISSION_NO"=>$stdt_admission_no[$x],
        "CLASS_ID"=>$class_id[$x],
        "SESSIONS_ID"=>$session_id[$x],
        "SUBJECT_ID"=>$sub_id[$x],
      );

      $data=array(
        "STUDENT_ID"=>$students[$x],
        "SUBJECT_CODE"=>$subjects[$x],
        "MARK"=>$marks[$x],
        "ADMISSION_NO"=>$stdt_admission_no[$x],
        "CLASS_ID"=>$class_id[$x],
        "SESSIONS_ID"=>$session_id[$x],
        "SUBJECT_ID"=>$sub_id[$x],
      );
      if($this->subject_model->edit("MARKS", $data,$where))
      {
         $flag=1;
      }
      echo($x);
      }
      

    }
    /**/
    

  
  

  }
 

}
