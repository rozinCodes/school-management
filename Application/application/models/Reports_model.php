<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reports_model extends CI_Model {
    
    
    public function onlineexam_reports($exam_title) {
        $this->db->select("ONLINEEXAM.*, ONLINEEXAM_RESULT.CORRECT_ANS , ONLINEEXAM_RESULT.WRONG_ANS ,STUDENTS.ADMISSION_NO, STUDENTS.F_NAME");
        $this->db->from("ONLINEEXAM");
        $this->db->join('ONLINEEXAM_ATTEMPTS', 'ONLINEEXAM_ATTEMPTS.ONLINEEXAM_ID = ONLINEEXAM.ID');
       $this->db->join('ONLINEEXAM_RESULT', 'ONLINEEXAM_RESULT.ONLINEEXAMID =ONLINEEXAM.ID ');
         $this->db->join('STUDENTS', 'ONLINEEXAM_RESULT.STUDENT_ID =STUDENTS.ID ');
        // $this->db->where('class_sections.class_id', $classid);
        $this->db->where("ONLINEEXAM.ID",$exam_title);
        $this->db->order_by('ONLINEEXAM.ID');
        return $this->db->get()->result();
    }

}