<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Fullcalendar extends CI_Controller {

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
  $data = array();
  $data['active'] = "eventcalendar";
  $data['title'] = "Event Calendar";
  $this->load->helper("form");
  //$this->fullcalendar_model->resetFullday();

  $data['content'] = $this->load->view("events/fullcalendar", $data, true);
        $this->load->view("admin/master", $data);

 }

 function load()
 {
     
  
  $event_data = $this->fullcalendar_model->fetch_all_event();

  
 
  foreach($event_data->result_array() as $row)
  {
    $sdate=$row['START_EVENT'];
    $edate=$row['END_EVENT'];
    $a=strval($sdate); 
    $b=strval($edate);
    //$aa=substr($a,0,18); str_replace(".000000","",$a)
    //$bb=substr($b,0,18); 
    $aa=str_replace(".000000","",$a);
    $bb=str_replace(".000000","",$b);
    $date1=date_create($aa);
    $date2=date_create($bb);
    $startdate=date_format($date1,"Y-m-d H:i:s");
    $enddate=date_format($date2,"Y-m-d H:i:s");
 
    //$diff = abs(strtotime($enddate) - strtotime($startdate));
   // $diff=date_diff($startdate,$enddate);
    
    
    
    $data[] = array(
     'id' => $row['ID'],
     'title' => $row['TITLE'],
     'start' => $startdate,
     'end' => $enddate
    );
  }

  echo json_encode($data);
 
  
 }


 function insert()
 {
//    echo"ho";
//    exit(); 
  if($this->input->post('title'))
  {
    $TITLE = $this->input->post('title');
    $START_EVENT= $this->input->post('start');
    $END_EVENT = $this->input->post('end');
     
    $date1 = $this->oracle_date_by_user($START_EVENT);
    $date2 = $this->oracle_date_by_user($END_EVENT);
    
   $data = array(
    'TITLE'  => $TITLE,
    'START_EVENT'=> $date1 ,
    'END_EVENT' => $date2
   );
  //  print_r($data);
  //  exit();
  
  $this->fullcalendar_model->insert_event($data);
   //$this->common_model->save_data("EVENTS",$data);
  }
 }

 function update()
 {
  if($this->input->post('id'))
  {
    $TITLE = $this->input->post('title');
    $START_EVENT= $this->input->post('start');
    $END_EVENT = $this->input->post('end');
    $date1 = $this->oracle_date_by_user($START_EVENT);
    $date2 = $this->oracle_date_by_user($END_EVENT);

   $data = array(
    'TITLE'   => $this->input->post('title'),
    'START_EVENT' => $date1,
    'END_EVENT'  => $date2
   );

   $this->fullcalendar_model->update_event($data, $this->input->post('id'));
  }
 }

 function delete()
 {
  if($this->input->post('id'))
  {
   $this->fullcalendar_model->delete_event($this->input->post('id'));
  }
 }

}

?>
