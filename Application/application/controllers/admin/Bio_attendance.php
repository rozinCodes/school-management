
<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Bio_attendance extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("UTC");
        $language = $this->session->userdata('language');
        $this->lang->load('auth', $language);

        //$this->load->database('third', TRUE);

        // $mytype = $this->session->userdata("mytype");
    }

    public function index()
    {
        $data = array();
        $data['active'] = "bioAttendance";
        $data['title'] = "bioAttendance";
        $this->load->helper("form");
        $data['totalCardExecute']=$this->bioAttendance_model->totalCardExecute("BIOMETRICS_ATTENDANCE");
        $data['todaysCardExecute']=$this->bioAttendance_model->totalCardExecuteToday("BIOMETRICS_ATTENDANCE");
        $data['totalNumberofCardExecuteToday']=$this->bioAttendance_model->totalNumberofCardExecuteToday("BIOMETRICS_ATTENDANCE");
        $data['totalNumberCardExecute']=$this->bioAttendance_model->totalNumberCardExecute("BIOMETRICS_ATTENDANCE");
        $data['content'] = $this->load->view("admin/bio_attendance_new", $data, TRUE);
        $this->load->view("admin/master", $data);
    }
	
	public function test(){
		    $attenDataSqlSrv = $this->bioAttendance_model->TestDataView();
         echo "<pre>";
         print_r($attenDataSqlSrv); 
		//echo "hello";
	}
	
	    public function attendance_load()
				{
					$allData = $this->bioAttendance_model->TestDataView();
        // echo "<pre>";
        // print_r($attenDataSqlSrv); 
        foreach ($allData as $value) {
/**
            $wh = array(
                "USER_ID" => $key->nUserID,
                "STUDENT_REG_NO" => $key->nUserID,
                "EVENT_TIME" => $key->nDateTime,
                "ATTENDANCE_DATE" => date("Y-m-d", $key->nDateTime),
            );
			**/
			$datetime_element=date_create($value->KqDate);
			
			$date=date_format($datetime_element,"Y-m-d");
			
			$dates=strtotime($date);
			
			$time_element=date_create($value->KqTime);
			
			$time=date_format($time_element,"H:i:s");
			$times=strtotime($time);
			//$date_element = $datetime_element.date("Y-m-d");
            $data = array(
                "CARD_ID" => $value->card_id,
                "TIME" => $times,
                "STATUS" => 1,
                "S_DATE" => $dates ,
            );

           // if (!$this->bioAttendance_model->check_attendance("BIO_ATTENDENCE", $wh)) {


                if ($this->common_model->save_data("BIO_ATTENDENCE", $data)) {
                   // $sdata['msg'] = "Save Successful";
                } else {
                   // $sdata['msg'] = "Not Successfully Data Insert !!";
                }
           // } else {
                //$sdata['msg'] = "Data Already Exist !!";
          //  }
        }




       // $this->session->set_userdata($sdata);
        redirect(base_url() . "admin/bio_attendance", "refresh");
    }
	
    public function attendanceDataSqlServerToOracle()
    {
        $attenDataSqlSrv = $this->bioAttendance_model->getattendanceDataSqlServerToOracle();
        // echo "<pre>";
        // print_r($attenDataSqlSrv); 
        foreach ($attenDataSqlSrv as $key) {

            $wh = array(
                "USER_ID" => $key->nUserID,
                "STUDENT_REG_NO" => $key->nUserID,
                "EVENT_TIME" => $key->nDateTime,
                "ATTENDANCE_DATE" => date("Y-m-d", $key->nDateTime),
            );
            $data = array(
                "USER_ID" => $key->nUserID,
                "STUDENT_REG_NO" => $key->nUserID,
                "EVENT_TIME" => $key->nDateTime,
                "ATTENDANCE_DATE" => date("Y-m-d", $key->nDateTime),
            );

            if (!$this->bioAttendance_model->check_attendance("BIOMETRICS_ATTENDANCE", $wh)) {


                if ($this->common_model->save_data("BIOMETRICS_ATTENDANCE", $data)) {
                   // $sdata['msg'] = "Save Successful";
                } else {
                   // $sdata['msg'] = "Not Successfully Data Insert !!";
                }
            } else {
                //$sdata['msg'] = "Data Already Exist !!";
            }
        }




       // $this->session->set_userdata($sdata);
        redirect(base_url() . "admin/BioAttendance", "refresh");
    }

   public function totalCardExecuteToday()
   {
   // $sid = 201100001;
    $data['todaysCardExecute']=$this->bioAttendance_model->totalCardExecuteToday("BIOMETRICS_ATTENDANCE");
    print_r( $data['todaysCardExecute']);
   }

   public function totalCardExecute()
   {
    
    $data['totalCardExecute']=$this->bioAttendance_model->totalCardExecute("BIOMETRICS_ATTENDANCE");
    echo"<pre>";
    print_r( $data['totalCardExecute']);
   }

    // function attendanceInterval()
    // {

    //     for (;;) {

    //         //  echo "<br> Line to show.";
    //         $this->attendanceDataSqlServerToOracle();
    //         ob_flush();
    //         flush();
    //         sleep(100);
    //     }
    // }

    function getFirstAndLastAttendance()
    {
        $sid = 201100001;

        $date = date("Y-m-d");
        $firstTime = $this->bioAttendance_model->getFirstAttendance("BIOMETRICS_ATTENDANCE", $date, $sid);
        $lastTime =  $this->bioAttendance_model->getLastAttendance("BIOMETRICS_ATTENDANCE", $date, $sid);

     
        echo date("Y/m/d H:i:s a",$firstTime->INTIME);
        echo"-";
        echo date("Y/m/d H:i:s a",$lastTime->EXITTIME);

        
         
    }
    public function bioattendenceSummery()
    {
        $data = array();
        $data['active'] = "attendanceSummert";
        $data['title'] = "attendanceSummert";
        $this->load->helper("form");
        $data['bioAttendanceReport']=$this->common_model->view_data("BIOATTENDENCEREPORT","","","");
        // $date = date("Y-m-d");
        // $data['bioAttendanceReportToday']=$this->bioAttendance_model->getFirstAndLastAttendance("BIOATTENDENCEREPORT", $date);
        // $data['bioAttendanceReportThismonth']=$this->bioAttendance_model->getFirstAndLastAttendance("BIOATTENDENCEREPORT", $date);

        $data['content'] = $this->load->view("admin/bioAttendanceSummery", $data, TRUE);
        $this->load->view("admin/master", $data);

    }

    public function loadBioattendenceReportfromOracle()
    {
       //    bioAttendence start
        //in and out time


        // $date = date("Y-m-d");
        // $firstAndlastTime = $this->bioAttendance_model->getFirstAndLastAttendance("BIOMETRICS_ATTENDANCE", $date);
       
        $firstAndlastTime = $this->bioAttendance_model->getFirstAndLastAttendance("BIOMETRICS_ATTENDANCE");


        // echo"<pre>";
        // print_r( $firstAndlastTime);
        // exit();

        foreach($firstAndlastTime as $key)
        {
            $wh = array(
                "USER_ID" => $key->USER_ID ,
                "REG_NO" =>$key->USER_ID ,
                // "INTIME" => $key->INTIME,
                // "OUTTIME" =>$key->EXITTIME ,
                "ATTENDANCE_DATE"=>date("Y-m-d", $key->INTIME),
            );
            $data2 = array(
                "USER_ID" => $key->USER_ID ,
                "REG_NO" =>$key->USER_ID ,
                "INTIME" => $key->INTIME,
                "OUTTIME" =>$key->EXITTIME ,
                "ATTENDANCE_DATE"=>date("Y-m-d", $key->INTIME),
            );


            if (!$this->bioAttendance_model->check_attendance("BIOATTENDENCEREPORT", $wh)) {


                $this->common_model->save_data("BIOATTENDENCEREPORT", $data2);
                   
               
            } 
            else
            {
                $this->common_model->editBioAttendance("BIOATTENDENCEREPORT", $data2,$wh);
            }

        }

        redirect(base_url() . "admin/BioAttendance/bioattendenceReport", "refresh");
    }


    public function bioAttReport()
    {

        //echo "ok";
       // exit();
        $data = array();
        $data['active'] = "attendanceReport";
        $data['title'] = "attendanceReport";
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("from_date", "Group Name", "required");

        
       
        
       
        if ($this->form_validation->run() == NULL) {
            $data = array();
            $data['active'] = "attendanceReport";
            $data['title'] = "attendanceReport";
            $this->load->helper("form");
            $data['content'] = $this->load->view("admin/bioattendenceReport", $data, TRUE);
            $this->load->view("admin/master", $data);
        } else {
            $from_date=$this->input->post("from_date");
            $to_date= $this->input->post("to_date");
            $userId=$this->input->post("userId");
            $studentInfo=$this->bioAttendance_model->getStudentInfo($userId);

            // print_r($studentInfo);
            // exit();

            if( $studentInfo)
            {
                $data['stdInfoDetails']=$this->bioAttendance_model->getStudentInfoDetails("STUDENTS",$studentInfo->STUDENT_ID);

                // print_r($data['stdInfoDetails']);
                // exit();

                $studentShift =  $this->bioAttendance_model->getStudentShift("STUDENT_SHIFT_ASSIGN", "STAFF_SHIFT", $studentInfo->CLASS_ID, $studentInfo->SECTION_ID, $studentInfo->SESSION_ID);
                $data['studentShift'] = $studentShift;
                $data['bioAttendanceReport']= $this->bioAttendance_model->getReportDayAndIdWise("BIOATTENDENCEREPORT",$from_date,$to_date,$userId);

           

             
          
                $data['content'] = $this->load->view("admin/bioattendenceReport", $data, TRUE);
                $this->load->view("admin/master", $data);
                
            }
            else
            {
                
                redirect(base_url() . "admin/BioAttendance/bioAttReport", "refresh");
            }
          
           

          
           
         
         
        }


       

      
    }

    
}
