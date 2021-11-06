<?php

class Fullcalendar_model extends CI_Model
{

 function resetFullday()
 {
    $sql="select END_EVENT-START_EVENT AS DIFFER,START_EVENT,TITLE from EVENTS";

    $query = $this->db->query($sql);
        $r= $query->result();
        foreach($r as $vl)
        {
         if($vl->DIFFER>=1)
         {

            $data = array(
               
               'START_EVENT'=>$vl->START_EVENT,
               'END_EVENT'=>$vl->START_EVENT
           );
           $this->db->where('TITLE', $vl->TITLE);
           $this->db->update('EVENTS', $data);
           




            
         }
        }
        
       
 }  
 function fetch_all_event(){
   
 // $this->resetFullday();
  $this->db->order_by('ID');
  return $this->db->get('EVENTS');


 }

 function insert_event($data)
 {
  $this->db->insert('EVENTS', $data);
 }

 function update_event($data, $id)
 {
  $this->db->where('ID', $id);
  $this->db->update('EVENTS', $data);
 }

 function delete_event($id)
 {
  $this->db->where('ID', $id);
  $this->db->delete('EVENTS');
 }

 function fetch_next_event($table){

    
    $sql="SELECT * FROM EVENTS 
    WHERE  START_EVENT >= trunc(sysdate) AND START_EVENT <= trunc(sysdate)+7";

        $query = $this->db->query($sql);
        $r= $query->result();
        
        return $r;
   }
}

?>
