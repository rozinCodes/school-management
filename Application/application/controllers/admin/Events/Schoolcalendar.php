<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Schoolcalendar extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    date_default_timezone_set("Asia/Dhaka");
    $language = $this->session->userdata('language');
    $this->lang->load('auth', $language);
    if (!$this->session->userdata('authenticated')) {
      redirect("login");
    }
  }



  function index()
  {
    //  echo "ok";
    //  exit();
    $data = array();
    $data['active'] = "schoolcalendar";
    $data['title'] = "School Calendar";
    $this->load->helper("form");
    //$this->fullcalendar_model->resetFullday();

    $data['content'] = $this->load->view("events/schoolcalendar", $data, true);
    $this->load->view("admin/master", $data);
  }

  function load()
  {


    $event_data = $this->schoolcalendar_model->fetch_all_event();



    foreach ($event_data->result_array() as $row) {
      $sdate = $row['START_EVENT'];
      $edate = $row['END_EVENT'];
      $a = strval($sdate);
      $b = strval($edate);
      $aa = substr($a, 0, 18);
      $bb = substr($b, 0, 18);
      $date1 = date_create($aa);
      $date2 = date_create($bb);
      $startdate = date_format($date1, "Y-m-d");
      $enddate = date_format($date2, "Y-m-d");
      $enddate2 = date('Y-m-d', strtotime('+1 day', strtotime($enddate))); //SHOW KORANOR SOMY 1 ADD KORCE

      //$diff = abs(strtotime($enddate) - strtotime($startdate));
      // $diff=date_diff($startdate,$enddate);



      $data[] = array(
        'id' => $row['ID'],
        'title' => $row['TITLE'],
        'start' => $startdate,
        'end' => $enddate2
      );
    }

    echo json_encode($data);
  }


  function insert()
  {
    // $allholiday=$this->schoolcalendar_model->get_offday_info();
    // $startday=$allholiday->START_EVENT;
    // $endday=$allholiday->END_EVENT;
    // $onlystartday= explode(" ",$startday);
    // echo $startday;
    // echo $onlystartday[0];
    // exit();
    //    echo"ho";
    //    exit(); 
    $flag = 0;
    if ($this->input->post('title')) {
      $TITLE = $this->input->post('title');
      $START_EVENT = $this->input->post('start');
      $END_EVENT = $this->input->post('end');
      $END_EVENT2 = date('Y-m-d', strtotime('-1 day', strtotime($END_EVENT))); ///DATE 1 BASI PORTACELO TAI 1 SUBTRUCT KORCE AND SHOW KORANOR SOMY 1 ADD KORBO



      $date1 = $this->oracle_only_date_by_user($START_EVENT);
      $date2 = $this->oracle_only_date_by_user($END_EVENT2);


      $data = array(
        'TITLE'  => $TITLE,
        'START_EVENT' => $date1,
        'END_EVENT' => $date2
      );
      if ($this->schoolcalendar_model->check_event($date1, $date2) == FALSE && $this->schoolcalendar_model->check_event2($date1, $date2) == FALSE) {
        if ($this->schoolcalendar_model->insert_event($data)) {
          $flag = 1;
        }
      }
    }

    if ($flag == 1) {
      // start
      $allstudent = $this->schoolcalendar_model->get_students();
      $allholiday = $this->schoolcalendar_model->get_offday_info();

      $startday = $allholiday->START_EVENT;
      $endday = $allholiday->END_EVENT;

      $onlystartday = explode(" ", $startday);
      $onlyendday = explode(" ", $endday);

      $diff = strtotime($onlyendday[0]) - strtotime($onlystartday[0]);
      $fullDays  = floor($diff / (60 * 60 * 24));

      $day = strtotime($onlystartday[0]);


      for ($i = 1; $i <= $fullDays + 1; $i++) // fullDays +1 KPRA HOICA JANO 1 DAY BASI ATTENDENCE PORA COUSE 1 KOM BASI KORA HOICA INSERT AND SHOW AR SOMY
      {

        // $day2=date( "Y-m-d h:i:s a", $day);
        $day2 = date("Y-m-d", $day);
        $date2 = $this->oracle_only_date_by_user($day2);
        $day = strtotime('+1 day', $day);

        foreach ($allstudent as  $val) {
          $atndce_type = "HOLIDAY";
          $sid = $val->STUDENT_ID;
          $data = array('ATTENDENCE_TYPE' => $atndce_type, 'CLASSES' => $val->CLASS_ID, 'SECTION' => $val->SECTION_ID,  'ATTENDENCE_DATE' => $date2, 'SESSIONS' => $val->SESSION_ID, 'STUDENT_ID' => $sid, 'ADMISSION_NO' => $val->ADMISSION_NO);
          $this->common_model->save_data("STUDENT_ATTENDENCE", $data);
        }
      }
    }
  }







  // function test()
  // {
  //     // start
  //     $allstudent=$this->schoolcalendar_model->get_students();
  //     $allholiday=$this->schoolcalendar_model->get_offday_info();


  //     $startday=$allholiday->START_EVENT;
  //     $endday=$allholiday->END_EVENT;

  //     $onlystartday= explode(" ",$startday);
  //     $onlyendday= explode(" ",$endday);




  //     $diff = strtotime($onlyendday[0]) - strtotime($onlystartday[0]);
  //     $fullDays  = floor($diff/(60*60*24));  


  //     $day=strtotime($onlystartday[0]);
  //     // 
  //     $beforinsert=$this->schoolcalendar_model->get_maxid("STUDENT_ATTENDENCE");
  //     // 
  //     $c=0;
  //     for($i=1;$i<=$fullDays+1;$i++)// fullDays +1 KPRA HOICA JANO 1 DAY BASI ATTENDENCE PORA COUSE 1 KOM BASI KORA HOICA INSERT AND SHOW AR SOMY
  //     { 

  //       // $day2=date( "Y-m-d h:i:s a", $day);
  //       $day2=date( "Y-m-d", $day);
  //       $date2 = $this->oracle_only_date_by_user($day2);
  //       $day = strtotime('+1 day', $day);

  //       foreach ($allstudent as  $val) {          
  //         $atndce_type ="HOLIDAY";
  //         $sid = $val->STUDENT_ID;



  //         $data = array('ATTENDENCE_TYPE' => $atndce_type, 'CLASSES' => $val->CLASS_ID, 'SECTION' => $val->SECTION_ID,  'ATTENDENCE_DATE' => $date2, 'SESSIONS' => $val->SESSION_ID,'STUDENT_ID'=>$sid,'ADMISSION_NO' =>$val->ADMISSION_NO);


  //         if($this->common_model->save_data("STUDENT_ATTENDENCE", $data))
  //         {
  //           $c++;
  //         }




  //     }

  //     }
  //     $afterinsert=$this->schoolcalendar_model->get_maxid("STUDENT_ATTENDENCE");
  //     $diff=$afterinsert->MAX_ID-$beforinsert->MAX_ID;
  //     $count=$this->schoolcalendar_model->count_in_range($beforinsert->MAX_ID+1,$afterinsert->MAX_ID);
  //     echo $afterinsert->MAX_ID;
  //     echo ",";
  //     echo $beforinsert->MAX_ID;
  //     echo ",";
  //     echo $count->COUNTENTITY;
  //     echo"=";
  //     echo $c;

  //     if($c==$count->COUNTENTITY)
  //     {

  //       //$this->schoolcalendar_model->customRollback($beforinsert->MAX_ID+1,$afterinsert->MAX_ID);
  //       $maxscid=$this->schoolcalendar_model->get_maxid("SCHOOL_CALENDAR");

  //      $this->delete2($maxscid->MAX_ID);
  //     }



  // }



  function delete()
  {
    if ($this->input->post('id')) {

      // start delete attandance
      $id = $this->input->post('id');
      $allholiday = $this->schoolcalendar_model->get_offday_info_by_id($id);
      $startday = $allholiday->START_EVENT;
      $endday = $allholiday->END_EVENT;
      $onlystartday = explode(" ", $startday);
      $onlyendday = explode(" ", $endday);
      $day1 = strtotime($onlystartday[0]);
      $day2 = strtotime($onlyendday[0]);

      //$day11=date( "Y-m-d h:i:s a", $day1);
      $day11 = date("Y-m-d", $day1);
      $date1 = $this->oracle_only_date_by_user($day11);
      $day22 = date("Y-m-d", $day2);
      $date2 = $this->oracle_only_date_by_user($day22);

      $this->schoolcalendar_model->delete_attendence_eventWise($date1, $date2);

      // stop delete attendance
      $this->schoolcalendar_model->delete_event($id);
    }
  }
}
