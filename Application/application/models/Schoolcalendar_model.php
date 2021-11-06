<?php

class Schoolcalendar_model extends CI_Model
{

//  function resetFullday()
//  {
//     $sql="select END_EVENT-START_EVENT AS DIFFER,START_EVENT,TITLE from EVENTS";

//     $query = $this->db->query($sql);
//         $r= $query->result();
//         foreach($r as $vl)
//         {
//          if($vl->DIFFER>=1)
//          {

//             $data = array(
               
//                'START_EVENT'=>$vl->START_EVENT,
//                'END_EVENT'=>$vl->START_EVENT
//            );
//            $this->db->where('TITLE', $vl->TITLE);
//            $this->db->update('EVENTS', $data);
            
//          }
//         }    
//  }  

 function fetch_all_event(){
   
 // $this->resetFullday();
  $this->db->order_by('ID');
  return $this->db->get('SCHOOL_CALENDAR');


 }
 function check_event($date1,$date2)
 {
   // $sql="SELECT SCHOOL_CALENDAR.ID FROM SCHOOL_CALENDAR WHERE START_EVENT >= '$date1' AND
   // END_EVENT <= '$date2'";
  //$sql="SELECT SCHOOL_CALENDAR.ID FROM SCHOOL_CALENDAR  WHERE START_EVENT BETWEEN '$date1' AND '$date2'";
  $sql="SELECT SCHOOL_CALENDAR.ID FROM SCHOOL_CALENDAR  WHERE '$date1' BETWEEN START_EVENT AND END_EVENT";


  $query = $this->db->query($sql);
  if($query->row())
   {
      return true;
   }
   else
   {
      return false;
   }

 }
 function check_event2($date1,$date2)
 {
   // $sql="SELECT SCHOOL_CALENDAR.ID FROM SCHOOL_CALENDAR WHERE START_EVENT >= '$date1' AND
   // END_EVENT <= '$date2'";
  //$sql="SELECT SCHOOL_CALENDAR.ID FROM SCHOOL_CALENDAR  WHERE START_EVENT BETWEEN '$date1' AND '$date2'";
  $sql="SELECT SCHOOL_CALENDAR.ID FROM SCHOOL_CALENDAR  WHERE '$date2' BETWEEN START_EVENT AND END_EVENT";


  $query = $this->db->query($sql);
  if($query->row())
   {
      return true;
   }
   else
   {
      return false;
   }

 }
//  function get_maxid($table)
//  {
//    $sql="SELECT MAX(ID) AS MAX_ID FROM $table";
//    $query = $this->db->query($sql);
//    $r= $query->row();
//     return $r;
//  }
//  function customRollback($id1,$id2)
//  {
//     $sql="DELETE FROM STUDENT_ATTENDENCE WHERE ID >= $id1 AND
//     ID <= $id2";
//     if( $this->db->query($sql))
//     {
//        return true;
//     }
//  }

//  function count_in_range($id1,$id2)
//  {
//    $sql="SELECT COUNT(*) AS COUNTENTITY FROM STUDENT_ATTENDENCE WHERE ID >= $id1 AND
//    ID <= $id2";
//     $query = $this->db->query($sql);
//     $r= $query->row();
//      return $r;
//  }
 
 


 function insert_event($data)
 {
  
  if($this->db->insert('SCHOOL_CALENDAR', $data))
  {
     return true;
  }
  else
  {
     return false;
  }
 }


function get_students()
{
   $sql="SELECT ENROLL.*, STUDENTS.ADMISSION_NO FROM ENROLL,STUDENTS WHERE ENROLL.STUDENT_ID=STUDENTS.ID AND ENROLL.STATUS=1";
   $query = $this->db->query($sql);
   $r= $query->result();
    return $r;
}
 function get_offday_info()
{

$sql2="SELECT * FROM SCHOOL_CALENDAR WHERE ID=(SELECT MAX(ID) FROM SCHOOL_CALENDAR)";
  $query2 = $this->db->query($sql2);
  $r2= $query2->row();

  return $r2;
}
function get_offday_info_by_id($id)
{

$sql2="SELECT * FROM SCHOOL_CALENDAR WHERE ID=$id";
  $query2 = $this->db->query($sql2);
  $r2= $query2->row();

  return $r2;
}



//  function update_event($data, $id)
//  {
//   $this->db->where('ID', $id);
//   $this->db->update('SCHOOL_CALENDAR', $data);
//  }

 function delete_event($id)
 {
  $this->db->where('ID', $id);
  $this->db->delete('SCHOOL_CALENDAR');
 }

 function delete_attendence_eventWise($date1,$date2)
 {
   $sql= "DELETE FROM STUDENT_ATTENDENCE WHERE ATTENDENCE_DATE >= '$date1' AND
    ATTENDENCE_DATE <= '$date2'";
   if( $this->db->query($sql))
   {
      return true;
   }

 }

 function fetch_next_event($table){

    
    $sql="SELECT * FROM SCHOOL_CALENDAR 
    WHERE  START_EVENT >= trunc(sysdate) AND START_EVENT <= trunc(sysdate)+7";

        $query = $this->db->query($sql);
        $r= $query->result();
        
        return $r;
   }
}

?>
