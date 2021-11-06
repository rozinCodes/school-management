<?php

use Svg\Tag\Ellipse;

defined('BASEPATH') or exit('No direct script access allowed');

class Insert_marks extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    date_default_timezone_set("Asia/Dhaka");
    $language = $this->session->userdata('language');
    $this->lang->load('auth', $language);
    // $mytype = $this->session->userdata("mytype");
    $roles = $this->session->userdata('roles');
    if (!($roles == 3)) {

      redirect(base_url() . "admin/login", "refresh");
      // redirect("login");
    }
  }

  public function index()
  {
   
    $roles = $this->session->userdata();
    if ($this->access_control_model->access("MENU_PERMISSIONS", $roles['id'], $roles['roles'], 5)) {
    
      $data = array();
      $data['active'] = "groups";
      $data['title'] = "groups";
      $this->load->helper("form");

    //for current session start
    $cur_session = array();
    $cur_session['ROLES_ID'] = $this->session->userdata('roles');
    $staff_id = $this->session->userdata('id');

    // print_r($cur_session['ID']);
    // exit();

    if ($cur_session['ROLES_ID'] == 3) {
      // $data['allclass']=$this->academics_model->view_all_class_from_teacher_assign("TEACHER_ASSIGN",$staff_id, "ID", "DESC");


      $data['allCls'] = $this->academics_model->view_class_distinct("TEACHER_ASSIGN", "", "ID", "asc");
      $data['allSec'] = $this->academics_model->view_section_distinct("TEACHER_ASSIGN", "", "ID", "desc");
      $data['allPdtexam'] = $this->common_model->view_data("EXAMS", "", "ID", "DESC");
      $data['allPdtsession'] = $this->common_model->view_data("SESSIONS", "", "ID", "desc");
      $data['content'] = $this->load->view("admin/exams/insert_marks", $data, TRUE);
      $this->load->view("admin/master", $data);
    }
   

      //print_r($data['allclass']);

      // print_r($data['allCls']);
      // print_r($data['allSec']);
      // print_r($data['allSub']);
      //print_r($staff_id );
      // exit();

    }
    else
    {
      
      redirect(base_url(), "refresh");
    }
    //end



    
  }

  public function get_student_for_result2()
  {
    $data = array();
    $data['active'] = "groups";
    $data['title'] = "Inser Result";
    $this->load->helper("form");
    $data['allCls'] = $this->academics_model->view_class_distinct("TEACHER_ASSIGN", "", "ID", "asc");
    $data['allSec'] = $this->academics_model->view_section_distinct("TEACHER_ASSIGN", "", "ID", "desc");


    $data['allPdtsession'] = $this->common_model->view_data("SESSIONS", "", "ID", "desc");
    $data['allPdtexam'] = $this->common_model->view_data("EXAMS", "", "ID", "DESC");
    $where = array(
      "CLASS_ID" => $this->input->post("class_name"),
      "SECTION_ID" => $this->input->post("section_name"),
      "SESSION_ID" => $this->input->post("session"),
      "STATUS" => 1,
    );
   
    $alstd = $this->student_model->get_student_class_list("ENROLL", $where);
    $data['allStd'] = $alstd;

    // echo"<pre>";
    // print_r($alstd);
    // exit();




    $alsub = $this->academics_model->view_subject_distinct_teacher_assign_wise($this->input->post("class_name"), $this->input->post("section_name"), $this->session->userdata('id'));
    $data['allSub'] = $alsub;
    //$data['allPdtmarks'] = $this->academics_model->view_marks("MARKS", "", "ID", "DESC");
    $data['exm_id'] = $this->input->post("exam_name");

    //echo($data['exm_id']);
    //  exit();
    $whexm = array(

      "EXAM_ID" => $this->input->post("exam_name"),
      "SESSIONS_ID" => $this->input->post("session")

    );
    $mrk = $this->academics_model->view_marks("MARKS", $whexm, "ID", "DESC");

    if ($mrk) {
      foreach ($mrk as $m) {
        foreach ($alstd as $s) {
          foreach ($alsub as $sb) {
            if ($m->STUDENT_ID == $s->STUDENT_ID && $m->SUBJECT_ID == $sb->SUBJECT_ID) {
              $data['allPdtmarks'] = $mrk;
            }
          }
        }
      }
    }
    // else
    // {
    //   echo"no mrks";
    //  // exit();
    // }
    // print_r( $data['allPdt2']);
    // exit();

    // print_r($data['allStd']);

    //  print_r($data['allPdtmarks']);

    // print_r($data['allSub']);
    // print_r($data['allSec']);
    //  exit();


    $data['content'] = $this->load->view("admin/exams/insert_marks", $data, TRUE);
    $this->load->view("admin/master", $data);
  }

  public function marks_insert()
  {
    
      $flag = 0;
      $flag2 = 0;
      $g_point = array();
      $status = array();

      $students = array();
      $marks = array();
      $sub_id = array();

      $subject_code = array();
      $stdt_admission_no = array();
      $class_id = array();
      $section_id = array();
      $session_id = array();

      $subject_code = $this->input->post("subcode");
      $section_id = $this->input->post("section_id");
      $class_id = $this->input->post("class_id");
      $stdt_admission_no = $this->input->post("stdt_admission_no");
      $session_id = $this->input->post("session_id");
      $staff_id = $this->input->post("staff_id");



      $sub_id = $this->input->post("sub_id");
      $students = $this->input->post("stdtid");
      $marks = $this->input->post("mark");
      $exam_name = $this->input->post("exam_id");

      if ($students) {
        $l = count($students);
      } else {
        $sdata['msg'] = "Not Insert Data !!";
        $this->session->set_userdata($sdata);
        redirect(base_url() . "admin/exams/insert_marks", "refresh");
      }

      // print_r($l);
      // $l2=count($sub_id);
      // print_r($l2);
      // exit();

      //  print_r($sub_id);
      //  print_r($students);
      // print_r($marks);
      // exit();


      // GPA ALCULATE START

      $gread = $this->common_model->view_data("MARKS_GRADE", "", "ID", "DESC");
      //  echo"<pre>";
      //  print_r($gread);
      //  echo"<pre>";
      //  exit();

      $pass_mark = $this->student_model->pass_mark("MARKS_GRADE")->PASS_MARK + 1;

      foreach ($gread as $g) {
        for ($x = 0; $x <= $l - 1; $x++) {
          //print_r($g->PERCENT_FROM);
          //print_r($marks[$x]." ");
          if ($marks[$x] == null) {
            $g_point[$x] = null;
          }
          if ($marks[$x] > 100 || $marks[$x] < 0) {
            $g_point[$x] = null;
            $marks[$x] = null;
            $flag2 = 1;
          }
          if ($marks[$x] >= $pass_mark) {
            $status[$x] = "Pass";
          } else {
            $status[$x] = "Fail";
          }


          if ($marks[$x] >= $g->PERCENT_FROM && $marks[$x] <= $g->PERCENT_UPTO) {


            $g_point[$x] = $g->GRADE_POINT;




            // print_r($marks[$x]." ");
          }
        }
      }
      //print_r($marks[$x]);
      // exit();

      // GPA CALCULATE END

      $mrk = $this->academics_model->view_marks("MARKS", "", "ID", "DESC");

      if ($mrk) {
        // //four sub2 start
        // $fsub=array("FOURTH_SUB"=>NULL);
        // $wh2 = array(
        //   "STUDENT_ID" => $students[$x],

        //   "CLASS_ID" => $class_id[$x],
        //   "SECTION_ID" => $section_id[$x],
        //   "SESSIONS_ID" => $session_id[$x],
        // );
        // $this->common_model->update("MARKS",$fsub, $wh2);
        // //four sub2 end


        for ($x = 0; $x <= $l - 1; $x++) {
          $flag = 0;


          //  if($students[$x]!=null&&$marks[$x]!=null&&$exam_name!=null&&$sub_id[$x]!=null)
          //   {
          $where = array(
            "STUDENT_ID" => $students[$x],
            "SUBJECT_ID" => $sub_id[$x],
            "EXAM_ID" => $exam_name,

            "SUBJECT_CODE" => $subject_code[$x],
            "ADMISSION_NO" => $stdt_admission_no[$x],
            "CLASS_ID" => $class_id[$x],
            "SECTION_ID" => $section_id[$x],
            "SESSIONS_ID" => $session_id[$x],
            "STAFF_ID" => $staff_id,

          );

          if ($this->common_model->view_data("MARKS", $where, "ID", "DESC")) {
            // four sub start

            $wh = array(
              "STUDENT_ID" => $students[$x],
              "SUBJECT_ID" => $sub_id[$x],
              "CLASS_ID" => $class_id[$x],
              "SECTION_ID" => $section_id[$x],
              "SESSION_ID" => $session_id[$x],
            );


            // exit();
            $r = $this->student_model->check_fourth_sub("FOUR_SUBJECT", $wh);

            if ($r) {
              if ($g_point[$x] > 2) {
                $g_point[$x] = $g_point[$x] - 2;
              } else {
                $g_point[$x] = 0;
              }

              $foutrhSubid = $r->SUBJECT_ID;
            } else {
              $foutrhSubid = null;
            }

            // four sub end
            $data = array(
              "STUDENT_ID" => $students[$x],
              "MARK" => $marks[$x],
              "EXAM_ID" => $exam_name,
              "SUBJECT_ID" => $sub_id[$x],

              "SUBJECT_CODE" => $subject_code[$x],
              "ADMISSION_NO" => $stdt_admission_no[$x],
              "CLASS_ID" => $class_id[$x],
              "SECTION_ID" => $section_id[$x],
              "SESSIONS_ID" => $session_id[$x],
              "STAFF_ID" => $staff_id,
              "G_POINT" => $g_point[$x],
              "STATUS" => $status[$x],
              "FOURTH_SUB" => $foutrhSubid,




            );
            if ($this->subject_model->edit("MARKS", $data, $where)) {
              $flag = 1;
            }
          } else {

            // four sub start

            $wh = array(
              "STUDENT_ID" => $students[$x],
              "SUBJECT_ID" => $sub_id[$x],
              "CLASS_ID" => $class_id[$x],
              "SECTION_ID" => $section_id[$x],
              "SESSION_ID" => $session_id[$x],
            );

            // exit();
            $r = $this->student_model->check_fourth_sub("FOUR_SUBJECT", $wh);
            if ($r) {
              if ($g_point[$x] > 2) {
                $g_point[$x] = $g_point[$x] - 2;
              } else {
                $g_point[$x] = 0;
              }

              $foutrhSubid = $r->SUBJECT_ID;
            } else {
              $foutrhSubid = null;
            }
            // four sub end
            $data = array(
              "STUDENT_ID" => $students[$x],
              "MARK" => $marks[$x],
              "EXAM_ID" => $exam_name,
              "SUBJECT_ID" => $sub_id[$x],

              "SUBJECT_CODE" => $subject_code[$x],
              "ADMISSION_NO" => $stdt_admission_no[$x],
              "CLASS_ID" => $class_id[$x],
              "SECTION_ID" => $section_id[$x],
              "SESSIONS_ID" => $session_id[$x],
              "STAFF_ID" => $staff_id,
              "G_POINT" => $g_point[$x],
              "STATUS" => $status[$x],
              "FOURTH_SUB" => $foutrhSubid,
            );
            if ($this->common_model->save_data("MARKS", $data)) {
              $flag = 1;
            }
          }




          // }

        }
      } else {
        // //four sub2 start
        // $fsub=array("FOURTH_SUB"=>NULL);
        // $wh2 = array(
        //   "STUDENT_ID" => $students[$x],

        //   "CLASS_ID" => $class_id[$x],
        //   "SECTION_ID" => $section_id[$x],
        //   "SESSIONS_ID" => $session_id[$x],
        // );
        // $this->common_model->update("MARKS",$fsub, $wh2);
        // //four sub2 end
        for ($x = 0; $x <= $l - 1; $x++) {
          $flag = 0;

          // four sub start

          $wh = array(
            "STUDENT_ID" => $students[$x],
            "SUBJECT_ID" => $sub_id[$x],
            "CLASS_ID" => $class_id[$x],
            "SECTION_ID" => $section_id[$x],
            "SESSION_ID" => $session_id[$x],
          );

          // exit();
          $r = $this->student_model->check_fourth_sub("FOUR_SUBJECT", $wh);

          if ($r) {
            if ($g_point[$x] > 2) {
              $g_point[$x] = $g_point[$x] - 2;
            } else {
              $g_point[$x] = 0;
            }

            $foutrhSubid = $r->SUBJECT_ID;
          } else {
            $foutrhSubid = null;
          }

          // four sub end

          //  if($students[$x]!=null&&$marks[$x]!=null&&$exam_name!=null&&$sub_id[$x]!=null)
          //   {

          $data = array(
            "STUDENT_ID" => $students[$x],
            "MARK" => $marks[$x],
            "EXAM_ID" => $exam_name,
            "SUBJECT_ID" => $sub_id[$x],

            "SUBJECT_CODE" => $subject_code[$x],
            "ADMISSION_NO" => $stdt_admission_no[$x],
            "CLASS_ID" => $class_id[$x],
            "SECTION_ID" => $section_id[$x],
            "SESSIONS_ID" => $session_id[$x],
            "STAFF_ID" => $staff_id,
            "G_POINT" => $g_point[$x],
            "STATUS" => $status[$x],
            "FOURTH_SUB" => $foutrhSubid,
          );


          if ($this->common_model->save_data("MARKS", $data)) {
            $flag = 1;
          }
          // }

        }
      }



      if ($flag == 1) {
        if ($flag2 == 1) {
          $sdata['msg'] = "Marks sheet contains invalid marks";
        } else {
          $sdata['msg'] = "Save Successful";
        }
      } else {
        $sdata['msg'] = "Not Successfully Data Insert !!";
      }

      $this->session->set_userdata($sdata);
      redirect(base_url() . "admin/exams/insert_marks", "refresh");
    
  }
}
