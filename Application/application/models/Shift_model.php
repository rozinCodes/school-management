<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Shift_model extends CI_Model
{


    

    public function get_staff_shift($table){

       if($table=="TEACHER_SHIFT_ASSIGN")
       {
        
        $this->db->select('TEACHER_SHIFT_ASSIGN.*,STAFF.FIRST_NAME,STAFF_SHIFT.SHIFT_NAME,SESSIONS.SESSIONS');
        $this->db->from($table);
        $this->db->join('STAFF', 'TEACHER_SHIFT_ASSIGN.STAFF_ID = STAFF.ID');
        $this->db->join('STAFF_SHIFT', 'TEACHER_SHIFT_ASSIGN.SHIFT_ID = STAFF_SHIFT.ID');
        $this->db->join('SESSIONS', 'TEACHER_SHIFT_ASSIGN.SESSION_ID = SESSIONS.ID');
        $this->db->order_by("TEACHER_SHIFT_ASSIGN.ID");
        return $this->db->get()->result();
       }
       if($table=="STUDENT_SHIFT_ASSIGN")
       {
        //    echo"OK";
        //    exit();
        $this->db->select('STUDENT_SHIFT_ASSIGN.*,CLASSES.CLASSES,SECTIONS.NAME AS SECTIONS,STAFF_SHIFT.SHIFT_NAME,SESSIONS.SESSIONS,VERSIONS.VERSION');
        $this->db->from($table);
        $this->db->join('VERSIONS', 'STUDENT_SHIFT_ASSIGN.VERSION_ID = VERSIONS.ID');
        $this->db->join('CLASSES', 'STUDENT_SHIFT_ASSIGN.CLASS_ID = CLASSES.ID');
        $this->db->join('SECTIONS', 'STUDENT_SHIFT_ASSIGN.SECTION_ID = SECTIONS.ID');
        $this->db->join('STAFF_SHIFT', 'STUDENT_SHIFT_ASSIGN.SHIFT_ID = STAFF_SHIFT.ID');
        $this->db->join('SESSIONS', 'STUDENT_SHIFT_ASSIGN.SESSION_ID = SESSIONS.ID');
        $this->db->order_by("STUDENT_SHIFT_ASSIGN.ID");
        return $this->db->get()->result();
       }

            
    
            // $sql = " SELECT * FROM NOTICE_BOARD WHERE NOTICE_FOR='staff' OR NOTICE_FOR='all' ORDER BY NOTICE_BOARD.ID DESC " ;
            // $query = $this->db->query($sql);
            // return $query->result();
        
    }
   
}