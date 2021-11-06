<?php

defined('BASEPATH') or exit('No direct script access allowed');

class testsqlserver extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");
        $language = $this->session->userdata('language');
        $this->lang->load('auth', $language);

        //$this->load->database('third', TRUE);

        // $mytype = $this->session->userdata("mytype");
    }

    public function index()
    {
        //DATA FROM MYSQL
        $data['allinfo'] = $this->test_model->get();
        print_r($data['allinfo']);

        //DATA FORM SQL SERVER
        $data['allinfo2'] = $this->test_model->get2();
        echo "<pre>";
        print_r($data['allinfo2']);

       // DATA FROM ORACLE
        $data['allinfo3'] = $this->test_model->get3();
        echo "<pre>";
        print_r($data['allinfo3']);
    }
    public function attendanceDataSqlServerToOracle()
    {
        $attenDataSqlSrv = $this->test_model->get2();
        // echo "<pre>";
         print_r($attenDataSqlSrv); 
    foreach($attenDataSqlSrv as $key){
       
        $wh=array(
            "STUDENT_ID"=>$key->nUserID,
            "STUDENT_REG_NO"=>$key->nUserID,
            "EVENT_TIME"=>$key->nDateTime,
            //"EVENT_TIME"=>date("h:m:s",$key->nDateTime),
            "ATTENDANCE_DATE"=>date("Y-m-d",$key->nDateTime),
        );
        $data=array(
            "STUDENT_ID"=>$key->nUserID,
            "STUDENT_REG_NO"=>$key->nUserID,
            "EVENT_TIME"=>$key->nDateTime,
            //"EVENT_TIME"=>date("h:m:s",$key->nDateTime),
            "ATTENDANCE_DATE"=>date("Y-m-d",$key->nDateTime),
        );
        // print_r($data);
        // exit();
        if(!$this->test_model->check_attendance("BIOMETRICS_ATTENDANCE",$wh))
        {
           // echo"hi";
            $this->common_model->save_data("BIOMETRICS_ATTENDANCE", $data);
        }
        // else
        // {
        //     echo "no hogh";
        // }


       
    }

    }

    function attendanceInterval()
    {  
        
        for (;;) {

                echo "<br> Line to show.";
               $this->attendanceDataSqlServerToOracle();
                ob_flush();
                flush();
                sleep(10);
            
        }
    }

    function getFirstAndLastAttendance()
    {
        $date=date("Y-m-d",978325996);
       $firstTime= $this->test_model->getFirstAttendance("BIOMETRICS_ATTENDANCE",$date);
      $lastTime=  $this->test_model->getLastAttendance("BIOMETRICS_ATTENDANCE",$date);
    
      print_r(date("h:m:s",$firstTime->INTIME));
      echo"--";
      print_r(date("h:m:s",$lastTime->EXITTIME));

    }

}
